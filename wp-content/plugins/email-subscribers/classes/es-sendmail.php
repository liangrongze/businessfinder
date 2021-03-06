<?php
class es_cls_sendmail
{
	public static function es_prepare_optin($type= "", $id = 0, $idlist = "")
	{
		$subscribers = array();
		switch($type)
		{
			case 'group':
				$subscribers = es_cls_dbquery::es_view_subscriber_bulk($idlist);
				es_cls_sendmail::es_sendmail("optin", $template = 0, $subscribers, $action = "optin-group");
				break;
				
			case 'single':
				$subscribers = es_cls_dbquery::es_view_subscriber_search($search = "", $id);
				es_cls_sendmail::es_sendmail("optin", $template = 0, $subscribers, $action = "optin-single");
				break;
		}
		return true;
	}
	
	public static function es_prepare_welcome($id = 0)
	{
		$subscribers = array();
		$subscribers = es_cls_dbquery::es_view_subscriber_search("", $id);
		es_cls_sendmail::es_sendmail("welcome", $template = 0, $subscribers, $action = "welcome", 0);
	}
	
	public static function es_prepare_notification( $post_status, $original_post_status, $post_id )
	{ 
		if( ( $post_status == 'publish' ) && ( $original_post_status != 'publish' ) ) 
		{
			$notification = array();
			$notification = es_cls_notification::es_notification_prepare($post_id);
			if ( count($notification) > 0 )
			{
				$template = $notification[0]["es_note_templ"];
				$subscribers = array();
				$subscribers = es_cls_notification::es_notification_subscribers($notification);
				if ( count($subscribers) > 0 )
				{
					es_cls_sendmail::es_sendmail("notification", $template, $subscribers, "notification", $post_id);
				}
			}
		}
	}
	
	public static function es_prepare_newsletter_manual($template, $recipients)
	{
		$subscribers = array();
		$subscribers = es_cls_dbquery::es_view_subscriber_manual($recipients);	
		es_cls_sendmail::es_sendmail("newsletter", $template, $subscribers, "manual", 0);
	}
	
	public static function es_sendmail($type = "", $template = 0, $subscribers = array(), $action = "", $post_id = 0)
	{
		$data = array();
		$htmlmail = true;
		$wpmail = true;
		$unsublink = "";
		$unsubtext = "";
		$sendguid = "";
		$viewstatus = "";
		$viewstslink = "";
		$adminmail = "";
		$adminmailsubject = "";
		$adminmailcontant = "";
		$reportmail = "";
		$currentdate = date('Y-m-d G:i:s');
		$cacheid = es_cls_common::es_generate_guid(100);
		$replacefrom = array("<ul><br />", "</ul><br />", "<li><br />", "</li><br />", "<ol><br />", "</ol><br />", "</h2><br />", "</h1><br />");
		$replaceto = array("<ul>", "</ul>", "<li>" ,"</li>", "<ol>", "</ol>", "</h2>", "</h1>");
		
		$settings = es_cls_settings::es_setting_select(1);
		$adminmail = $settings['es_c_adminemail'];
		$es_c_adminmailoption = $settings['es_c_adminmailoption'];
		
		if( trim($settings['es_c_fromname']) == "" || trim($settings['es_c_fromemail']) == '' )
		{
			get_currentuserinfo();
			$sender_name = $user_login;
			$sender_email = $user_email;
		}
		else
		{
			$sender_name = $settings['es_c_fromname'];
			$sender_email = $settings['es_c_fromemail'];
		}
		
		if( $settings['es_c_mailtype'] == "WP HTML MAIL" || $settings['es_c_mailtype'] == "PHP HTML MAIL" )  
		{
			$htmlmail = true;
		}
		else
		{
			$htmlmail = false;
		}
		
		if( $settings['es_c_mailtype'] == "WP HTML MAIL" || $settings['es_c_mailtype'] == "WP PLAINTEXT MAIL" )  
		{
			$wpmail = true;
		}
		else
		{
			$wpmail = false;
		}
		
		$headers  = "From: \"$sender_name\" <$sender_email>\n";
		$headers .= "Return-Path: <" . $sender_email . ">\n";
		$headers .= "Reply-To: \"" . $sender_name . "\" <" . $sender_email . ">\n";
		$headers .= "X-Mailer: PHP" . phpversion() . "\n";
		
		if($htmlmail)
		{
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: " . get_bloginfo('html_type') . "; charset=\"". get_bloginfo('charset') . "\"\n";
			$headers .= "Content-type: text/html\r\n"; 
		}
		else
		{
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: text/plain; charset=\"". get_bloginfo('charset') . "\"\n";
		}
		
		switch($type)
		{
			case 'optin':
				$subject = stripslashes($settings['es_c_optinsubject']);
				$content = stripslashes($settings['es_c_optincontent']);
				break;
				
			case 'welcome':
				$subject = stripslashes($settings['es_c_usermailsubject']);
				$content = stripslashes($settings['es_c_usermailcontant']);
				break;
				
			case 'newsletter':
				$template = es_cls_compose::es_template_select($template);
				$subject = stripslashes($template['es_templ_heading']);
				$content = stripslashes($template['es_templ_body']);
				break;
				
			case 'notification':
				$template = es_cls_compose::es_template_select($template);
				$subject = stripslashes($template['es_templ_heading']);
				$content = stripslashes($template['es_templ_body']);
				$post_title  = "";
				$post_excerpt  = "";
				$post_link  = "";
				$post_thumbnail  = "";
				$post_thumbnail_link  = "";
				$post = get_post($post_id);
				$excerpt_length = 50; // Change this value to increase the content length in newsletter.
				$post_title = $post->post_title;
				$subject = str_replace('###POSTTITLE###', $post_title, $subject);
				$post_link = get_permalink($post_id);
				$post_date = $post->post_modified;			
				
				// Get full post
				$post_full = $post->post_content;
				$post_full = wpautop($post_full);
				
				// Get post excerpt
				$the_excerpt = $post->post_content;
				$the_excerpt = strip_tags(strip_shortcodes($the_excerpt));
				$words = explode(' ', $the_excerpt, $excerpt_length + 1);
				if(count($words) > $excerpt_length)
				{
					array_pop($words);
					array_push($words, '...');
					$the_excerpt = implode(' ', $words);
				}

				if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail($post_id)))
				{
					$post_thumbnail = get_the_post_thumbnail($post_id, 'thumbnail');
				}
				
				if($post_thumbnail <> "")
				{
					$post_thumbnail_link = "<a href='".$post_link."' target='_blank'>".$post_thumbnail."</a>";
				}
				
				if($post_link <> "")
				{
					$post_link = "<a href='".$post_link."' target='_blank'>".$post_link."</a>";
				}
				
				$content = str_replace('###POSTTITLE###', $post_title, $content);
				$content = str_replace('###POSTLINK###', $post_link, $content);
				$content = str_replace('###POSTIMAGE###', $post_thumbnail_link, $content);
				$content = str_replace('###POSTDESC###', $the_excerpt, $content);
				$content = str_replace('###POSTFULL###', $post_full, $content);
				$content = str_replace('###DATE###', $post_date, $content);
				break;
		}
		if ( $settings['es_c_mailtype'] == "WP HTML MAIL" || $settings['es_c_mailtype'] == "PHP HTML MAIL" )
		{
			$content = str_replace("\r\n", "<br />", $content);
		}
		else
		{
			$content = str_replace("<br />", "\r\n", $content);
		}
		
		if($type == "newsletter" || $type == "notification")
		{
			$sendguid = es_cls_common::es_generate_guid(60);
			$url = home_url('/');
			$viewstatus = '<img src="'.$url.'?es=viewstatus&delvid=###DELVIID###" width="1" height="1" />';
			es_cls_sentmail::es_sentmail_ins($sendguid, $qstring = 0, $action, $currentdate, $enddt = "", count($subscribers), $content);
		}
		
		$count = 1;
		if(count($subscribers) > 0)
		{
			foreach ($subscribers as $subscriber)
			{
				$to = $subscriber['es_email_mail'];
				$name = $subscriber['es_email_name'];
				if($name == "")
				{
					$name = $to;
				}
				
				switch($type)
				{
					case 'optin':
						$content_send = str_replace("###NAME###", $name, $content);
						$content_send = str_replace("###EMAIL###", $to, $content_send);
						$optinlink = $settings['es_c_optinlink'];
						$optinlink = str_replace("###DBID###", $subscriber["es_email_id"], $optinlink);
						$optinlink = str_replace("###EMAIL###", $subscriber["es_email_mail"], $optinlink);
						$optinlink = str_replace("###GUID###", $subscriber["es_email_guid"], $optinlink);
						$optinlink  = $optinlink . "&cache=".$cacheid;
						$content_send = str_replace("###LINK###", $optinlink , $content_send);
						break;
						
					case 'welcome':
						$content_send = str_replace("###NAME###", $name , $content);
						$content_send = str_replace("###EMAIL###", $to, $content_send);
						
						$adminmailsubject = stripslashes($settings['es_c_adminmailsubject']);	
						$adminmailcontant = stripslashes($settings['es_c_adminmailcontant']);
						$adminmailcontant = str_replace("###NAME###", $name , $adminmailcontant);
						$adminmailcontant = str_replace("###EMAIL###", $to, $adminmailcontant);
						if ( $settings['es_c_mailtype'] == "WP HTML MAIL" || $settings['es_c_mailtype'] == "PHP HTML MAIL" )
						{
							$adminmailcontant = nl2br($adminmailcontant);
							$content_send = str_replace($replacefrom, $replaceto, $content_send);
						}
						else
						{
							$adminmailcontant = str_replace("<br />", "\r\n", $adminmailcontant);
							$adminmailcontant = str_replace("<br>", "\r\n", $adminmailcontant);
						}	
						break;
						
					case 'newsletter':
						$unsublink = $settings['es_c_unsublink'];				
						$unsublink = str_replace("###DBID###", $subscriber["es_email_id"], $unsublink);
						$unsublink = str_replace("###EMAIL###", $subscriber["es_email_mail"], $unsublink);
						$unsublink = str_replace("###GUID###", $subscriber["es_email_guid"], $unsublink);
						$unsublink  = $unsublink . "&cache=".$cacheid;
						
						$unsubtext = stripslashes($settings['es_c_unsubtext']);
						$unsubtext = str_replace("###LINK###", $unsublink , $unsubtext);
						if ( $settings['es_c_mailtype'] == "WP HTML MAIL" || $settings['es_c_mailtype'] == "PHP HTML MAIL" )
						{
							$unsubtext = '<br><br>' . $unsubtext;
						}
						else
						{
							$unsubtext = '\n\n' . $unsubtext;
						}
						
						$returnid = es_cls_delivery::es_delivery_ins($sendguid, $subscriber["es_email_id"], $subscriber["es_email_mail"]);
						$viewstslink = str_replace("###DELVIID###", $returnid, $viewstatus);
						$content_send = str_replace("###EMAIL###", $subscriber["es_email_mail"], $content);
						$content_send = str_replace("###NAME###", $subscriber["es_email_name"], $content_send);	
						
						if ( $settings['es_c_mailtype'] == "WP HTML MAIL" || $settings['es_c_mailtype'] == "PHP HTML MAIL" )
						{
							$content_send = nl2br($content_send);
							$content_send = str_replace($replacefrom, $replaceto, $content_send);
						}
						else
						{
							$content_send = str_replace("<br />", "\r\n", $content_send);
							$content_send = str_replace("<br>", "\r\n", $content_send);
						}
						break;
						
					case 'notification':  // notification mail to subscribers
						$unsublink = $settings['es_c_unsublink'];				
						$unsublink = str_replace("###DBID###", $subscriber["es_email_id"], $unsublink);
						$unsublink = str_replace("###EMAIL###", $subscriber["es_email_mail"], $unsublink);
						$unsublink = str_replace("###GUID###", $subscriber["es_email_guid"], $unsublink);
						$unsublink  = $unsublink . "&cache=".$cacheid;
						$unsubtext = stripslashes($settings['es_c_unsubtext']);
						$unsubtext = str_replace("###LINK###", $unsublink , $unsubtext);
						if ( $settings['es_c_mailtype'] == "WP HTML MAIL" || $settings['es_c_mailtype'] == "PHP HTML MAIL" )
						{
							$unsubtext = '<br><br>' . $unsubtext;
						}
						else
						{
							$unsubtext = '\n\n' . $unsubtext;
						}
						
						$returnid = es_cls_delivery::es_delivery_ins($sendguid, $subscriber["es_email_id"], $subscriber["es_email_mail"]);
						$viewstslink = str_replace("###DELVIID###", $returnid, $viewstatus);
						
						$content_send = str_replace("###EMAIL###", $subscriber["es_email_mail"], $content);
						$content_send = str_replace("###NAME###", $subscriber["es_email_name"], $content_send);	
						
						if ( $settings['es_c_mailtype'] == "WP HTML MAIL" || $settings['es_c_mailtype'] == "PHP HTML MAIL" )
						{
							$content_send = nl2br($content_send);
							$content_send = str_replace($replacefrom, $replaceto, $content_send);
						}
						else
						{
							$content_send = str_replace("<br />", "\r\n", $content_send);
							$content_send = str_replace("<br>", "\r\n", $content_send);
						}
						break;
				}
				
				if($wpmail) 
				{
					wp_mail($to, $subject, $content_send . $unsubtext . $viewstslink, $headers);
					if($type == "welcome" && $adminmail <> "" && $es_c_adminmailoption == "YES")
					{
						wp_mail($adminmail, $adminmailsubject, $adminmailcontant, $headers);
					}
				}
				else
				{
					mail($to ,$subject, $content_send . $unsubtext . $viewstslink, $headers);
					if($type == "welcome" && $adminmail <> "" && $es_c_adminmailoption == "YES")
					{
						mail($adminmail, $adminmailsubject, $adminmailcontant, $headers);
					}
				}
				$count = $count + 1;
			}
		}
		
		if( $type == "newsletter" || $type == "notification" )
		{
			$count = $count - 1;
			es_cls_sentmail::es_sentmail_ups($sendguid);
			if($adminmail <> "")
			{
				$subject = es_cls_common::es_sent_report_subject();
				if($htmlmail)
				{
					$reportmail = es_cls_common::es_sent_report_html();
				}
				else
				{
					$reportmail = es_cls_common::es_sent_report_plain();
				}
				$enddate = date('Y-m-d G:i:s');
				$reportmail = str_replace("###COUNT###", $count, $reportmail);	
				$reportmail = str_replace("###UNIQUE###", $sendguid, $reportmail);	
				$reportmail = str_replace("###STARTTIME###", $currentdate, $reportmail);	
				$reportmail = str_replace("###ENDTIME###", $enddate, $reportmail);
				if($wpmail) 
				{
					wp_mail($adminmail, $subject, $reportmail, $headers);
				}
				else
				{
					mail($adminmail ,$subject, $reportmail, $headers);
				}
			}
		}
	}
}
?>