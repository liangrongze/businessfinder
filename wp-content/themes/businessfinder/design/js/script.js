
$j = jQuery.noConflict();

$j(document).ready(function() {

	if(!isResponsive()) {
		CustomizeMenu();
		RollUpMenu();
	} else {
		responsiveRollupMenu();
	}

	ItemDetailGallery();
	ContactOwnerBox();
	ClaimListingBox();
	ShowRegNotifications();
	ApplyLightbox();
	ApplyFancyboxVideo();
	//PrettySociableInit();
	CloseableComments();
	InitMisc();
	//ResponsiveMenu();
	//RollUpMenu();
	SubmenuClass();
	HoverZoomInit();
	WidgetsSize('footer-widgets');
	/*openAdvancedSearch();*/

	/* GRID GALLERY SHORTCODE :: START */
	// !!! order must be like this !!!
	gridGalleryShortcode();

    initTile();

    if($j('.portfolio').hasClass('item-detail')){
        directLink();
    } else if($j('.portfolio').hasClass('item-fancybox')) {
        itemFancybox();
    } else {
        if(parseInt($j(document).width()) < 500){
          directLink();
        } else {
          showTile();
        }
    }

    quicksand();

    categorySlider();

    tileHover();
    /* GRID GALLERY SHORTCODE :: END */

    $j('input, textarea').simplePlaceholder();

    langButtonClick();
	
	$j("#share").click(function (e){
		e.preventDefault();
		$j('#share-container').show();
		var left = ( $j(document).width() - 500 ) / 2; 
		$j('#share-container').css('left',left);
		$j('.share-bg').show();
	});
	
	$j('.share-close').click(function (e){
		e.preventDefault();
		$j('#share-container').hide();
		$j('.share-bg').hide();
	})

	$j("#business-card").click(function (e){
		e.preventDefault();
		$j('#business-card-container').show();
		var left = ( $j(document).width() - 500 ) / 2; 
		$j('#business-card-container').css('left',left);
		$j('.share-bg').show();
	});
	
	$j('.card-close').click(function (e){
		e.preventDefault();
		$j('#business-card-container').hide();
		
		$j('.share-bg').hide();
	})
	
});

function createSearchDropdowns () {
	var browserWidth = $j( window ).width();

	if ( browserWidth < 800 ) {
		$j('.holder-title').click(function(){
			
			$j('.holder-detail').toggle();
			var popup = $j(this).parent();
			if( $j(".holder-detail").is(':visible')){
				$j(this).addClass('active');
				$j(popup).addClass('active');				
			}else{
				$j(this).removeClass('active');
				$j(popup).removeClass('active');
			}
		});
		//  close
		$j('.holder-detail .close').click(function (){
			$j(".holder-detail").hide();
			$j('.holder-detail').parent().removeClass('active');
		});
			
		// checkbox action
		checkboxAction();
		
		$j('.action-title a').click(function (e){
			e.preventDefault();
			var target = $j(this).parent().parent().find('ul');
			clearChceckAction(target);
		})
			
		$j('.filter .expand').click(function (){
			if( $j(this).parent().find('.hide').is(':visible') ){
				$j(this).parent().find('.hide').hide();	
				$j(this).removeClass('up');
				$j(this).html('更多选项');
				
				/*
				$j(this).parent().parent().find('.collapse').each(function(){
					if( $j(this).find('input').is(':checked') ){
						$j(this).find('input').prop('checked', false);
						$j(this).find('.f-input').removeClass('active');
					}
				});		
				*/
			}else{
				$j(this).parent().find('.hide').show();	
				$j(this).addClass('up');
				$j(this).html('收起');
			}
		});
	}
	
	    $j("select").each(function (idx) {
	        var id = "dd" + $j(this).prop("id");
	        if ($j('#' + id).length == 0) {
	            var selectedText = $j('option:selected', this).text();
	            var dropdown = '<div class="wrapper-dropdown-2" id="' + id + '"><span class="selected">' + selectedText + '</span><ul class="dropdown">';
	            $j('option', $j(this)).each(function (idx) {
	                if ($j(this).text() != selectedText) {
	                    dropdown += '<li><a href="#">' + $j(this).html() + '</a></li>';
	                }
	            });
	            dropdown += '</ul></div>';

	            $j(this).after(dropdown);

	            var dd = new DropDown($j('#' + id));

	            $j(document).click(function () {
	                // all dropdowns
	                $j('.wrapper-dropdown-2').removeClass('active');
	            });
	        }
	    });
	
}

function clearChceckAction(obj){
	$j(obj).find('li').each(function (){
		if( $j(this).find('input').is(':checked') ){
			$j(this).find('input').prop('checked', false);
			$j(this).find('.f-input').removeClass('active');
		}
	})
	
}

function checkboxAction(){
	$j(".filter li").click(function (){
		if( $j(this).find('input').is(':checked')){
			$j(this).find('.f-input').removeClass('active');
			$j(this).find('input').prop('checked', false);
		}else{
			$j(this).find('.f-input').addClass('active');
			$j(this).find('input').prop('checked', true);
		}
	});
}
// Place any jQuery/helper plugins in here.
function DropDown(el) {
    this.dd = el;
    this.initEvents();
}

DropDown.prototype = {
    initEvents: function () {
        var obj = this;

        obj.dd.on('click', function (event) {
			event.preventDefault();
            var $selectedText = $j(event.target).closest('div').find('.selected'),
                $item = null;

            $j('.wrapper-dropdown-2').not($j(this)).removeClass('active');
            $j(this).toggleClass('active');
            event.stopPropagation();

            $item = $j(event.target);
            if ($item.is('a')) {
                $selectedText.text($item.text().trim());

                // set the <select>
                $item.closest("div").prev("select").find("option").removeAttr("selected");
                $j("option").filter(function () { return $j(this).text().trim() == $item.text().trim(); }).prop('selected', true);
            };
        });
    }
}


function HomeDisplayCategory(){
	var browserWidth = $j( window ).width();
	
	if ( browserWidth < 800 ) {
		$j('.sub-category-holder').flexslider({
			animation: "slide"
		});
		HomeLoadMore();
	}else{
		$j('.sub-category-holder').flexslider({
			animation: "slide",
			manualControls: '.main-category a'
		});
	}
	
	$j('.ads').flexslider({animation: "slide"});
}
function HomeLoadMore(){
	$j('.newest-more a').click(function (event){
		event.preventDefault();
		if( $j(".section-newest .item-hide").length > 0 ){
			$j(".section-newest .item-hide").each(function (){
				$j(this).removeClass('item-hide');
			});
		}else{
			var url = $j(this).attr('href');
			window.location.href = url;
		}
	});
}
function loadScript(callback) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
        'callback='+callback;
    document.body.appendChild(script);
}

var initEventPage = function () {

    setTimeout("loadScript('setupEventMap')", 1500);
	var browserWidth = $j( window ).width();
	if ( browserWidth > 800 ){
		$j(".carousel").carouFredSel({
		        auto: false,
		        circular: false,
		        infinite:false,
		        items: 6,
		        scroll: 1,
		        prev: { button: "a.prev" },
		        next: { button: "a.next" },
		        onCreate: function (data) {
		            if (data.items.length < 6) {
		                $j(".carousel-holder").css('padding-left','0');
		            }
		        }
		    });
	}else{
		$j('.m-slider').flexslider({
			animation: "fade",
			direction: "horizontal",
			startAt: 0,         
			slideshowSpeed: 6500,         
			animationSpeed: 600, 
			useCSS: false,
		});
	}
}

var setupEventMap = function () {
    var myLocation = $j(".map").data("location").split(",");
    var myLatlng = new google.maps.LatLng(parseFloat(myLocation[0]), parseFloat(myLocation[1]));
    var myZoom = parseInt(myLocation[2]);

    var mapOptions = {
        center: myLatlng,
        zoom: myZoom,
        disableDefaultUI: true,
        scrollwheel: true,
        navigationControl: true,
        draggable: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoomControl: true,
        zoomControlOptions: { style: google.maps.ZoomControlStyle.SMALL }
    }
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });

    google.maps.event.addListener(map, 'tilesloaded', function () {
        $j('#map-canvas').find('img').attr('nopin', 'nopin');
    });
}

function ItemDetailGallery() {

	$j("ul.item-gallery-thumbnails li.image").click(function(event) {
		var url = $j(this).data("large-url");
		$j(".item-gallery-large").attr("src",url);
	});

	// responsive jCarousel
	var	conShortcodeDiv = $j(".item-image"),
		li = conShortcodeDiv.find('ul li'),
		liWidth = li.width();
		liMargin = parseInt(li.css('margin-right')),
		liFullWidth = liWidth + liMargin;

	$j("ul.item-gallery-thumbnails").jcarousel({
		itemFallbackDimension: liFullWidth
	});
}

function ContactOwnerBox() {

	var button = $j("#contact-owner-button");

	var args = {
		social_tools:false,
		deeplinking: false,
		keyboard_shortcuts: false,
		changepicturecallback: function () {
			$j.prettyPhoto.changePage = function(){};
			$j(".pp_pic_holder").addClass("contact-owner-popup");


			var form = $j(".contact-owner-popup #contact-owner-form"),
				email = form.data("email");

			form.find(".contact-owner-send").click(function(event) {
				if ((form.find('.cowner-name').val()) && (form.find('.cowner-email').val()) && (form.find('.cowner-subject').val()) && (form.find('.cowner-message').val())) {
					$j.post(MyAjax.ajaxurl, {
						action: 'ait_contact_owner',
						nonce: MyAjax.ajaxnonce,
						name: form.find('.cowner-name').val(),
						from: form.find('.cowner-email').val(),
						to: email,
						subject: form.find('.cowner-subject').val(),
						message: form.find('.cowner-message').val()
					}, function(data, textStatus, xhr) {
						if(data == "success"){
							form.find('.messages > div').hide();
							form.find('.messages .success').show();
						} else {
							form.find('.messages > div').hide();
							form.find('.messages .error.server').text(data).show();
						}
					});
				} else {
					form.find('.messages > div').hide();
					form.find('.messages .error.validator').show();
				}
				return false;
			});

			$j('input, textarea').simplePlaceholder();

		}
	};

	// responsive
	if ($j(window).width() < 480) {
		args.default_width = 280;
	};

	button.prettyPhoto(args);

}

function ClaimListingBox() {

	var button = $j("#claim-listing-button");

	var args = {
		social_tools:false,
		deeplinking: false,
		keyboard_shortcuts: false,
		changepicturecallback: function () {
			$j.prettyPhoto.changePage = function(){};
			$j(".pp_pic_holder").addClass("claim-listing-popup");

			var form = $j(".claim-listing-popup #claim-listing-form");

			$j("#claim-listing-form .claim-listing-send").click(function(event) {

				if ((form.find('.claim-name').val()) && (form.find('.claim-email').val()) && (form.find('.claim-username').val()) && (form.find('.claim-message').val())) {
					$j.post(MyAjax.ajaxurl, {
						action: 'ait_new_claim',
						nonce: MyAjax.ajaxnonce,
						itemId: form.data('item-id'),
						name: form.find('.claim-name').val(),
						email: form.find('.claim-email').val(),
						number: form.find('.claim-number').val(),
						username: form.find('.claim-username').val(),
						message: form.find('.claim-message').val()
					}, function(data, textStatus, xhr) {
						if(data == "success"){
							form.find('.messages > div').hide();
							form.find('.messages .success').show();
						} else {
							form.find('.messages > div').hide();
							form.find('.messages .error.server').text(data).show();
						}
					});
				} else {
					form.find('.messages > div').hide();
					form.find('.messages .error.validator').show();
				}
				return false;
			});

			$j('input, textarea').simplePlaceholder();

		}
	};

	// responsive
	if ($j(window).width() < 480) {
		args.default_width = 280;
	};

	button.prettyPhoto(args);

}

function ShowRegNotifications() {
	$j("#ait-dir-register-notifications .close").click(function () {
		$j(this).parent().parent().slideUp(500,function () {
			$j(this).remove();
		});
	});
}

function SubmenuClass() {
	var menuLinks = $j('nav.mainmenu a');
	$j(menuLinks).each(function () {
		if($j(this).next().is('ul')){
			$j(this).addClass('has-submenu');
		}
	});
}

function responsiveRollupMenu() {
	$j('.menubut').toggle(function() {
		$j('.mainmenu').show();
	}, function() {
		$j('.mainmenu').hide();
	});

	if(isMobile('ipad') || isMobile('android')){
		$j('.menu').hover(function() {
			$j('.mainmenu').show();
		}, function() {
			$j('.mainmenu').hide();
		});
	}
}

function RollUpMenu(){
	$j("nav.mainmenu ul li").hover(function(){
		var submenu = $j(this).find('> ul');
		var submenuHeight = submenu.innerHeight();
		submenu.show().height(0).stop(true,true).animate({
			height: submenuHeight
		});
	}, function(){
		$j(this).find('> ul').hide();
	});
}

function CustomizeMenu(){
	$j(".mainmenu > ul > li").each(function(){
		if($j(this).has('ul').length){
			$j(this).addClass("parent");
		}
	});
}

function isResponsive(){
	result = false;
	if($j(window).width() <= 497){
		result = true;
	}
	return result;
}

function ResponsiveMenu() {

	// Save list menu and create select
	var mainNavigation = $j('nav.mainmenu').clone();
	$j('nav.mainmenu').append('<select class="responsive-menu"></select>');
	var selectMenu = $j('select.responsive-menu');
	$j(selectMenu).append('<option>Main Menu...</option>');

	// Loop through each first level list items
	$j(mainNavigation).children('ul').children('li').each(function() {

		// Save menu item's attributes
 		var href = $j(this).children('a').attr('href'),
			text = $j(this).children('a').text();

		// Create menu item's option
		$j(selectMenu).append('<option value="'+href+'">'+text+'</option>');

		// Check if there is a second level of menu
		if ($j(this).children('ul').length > 0) {

			// Loop through each second level list items
			$j(this).children('ul').children('li').each(function() {

				// Save menu item's attributes
				var href2 = $j(this).children('a').attr('href'),
					text2 = $j(this).children('a').text();

				// Create menu item's option
				$j(selectMenu).append('<option value="'+href2+'">--- '+text2+'</option>');

				// Check if there is a third level of menu
				if ($j(this).children('ul').length > 0) {

					// Loop through each third level list items
					$j(this).children('ul').children('li').each(function() {

						// Save menu item's attributes
						var href3 = $j(this).children('a').attr('href'),
							text3 = $j(this).children('a').text();
						// Create menu item's option
						$j(selectMenu).append('<option value="'+href3+'">------ '+text3+'</option>');

					}); 	// End of third level loop
				} 			// If there is third level
			}); 			// End of second level loop
		} 					// If there is second level
	}); 					// End of first level loop

	$j(selectMenu).change(function() {
		location = this.options[this.selectedIndex].value;
	});
}

function InitMisc() {
	$j('#content input, #content textarea').each(function() {
		var id 	 = $j(this).attr('id'),
			name = $j(this).attr('name');

		if(id == undefined) {
			id = "";
		}

		if( name == undefined ) {
			name = "";
		}

		if (id.length == 0 && name.length != 0) {
			$j(this).attr('id', name);
		}
	});

	$j('.wpcf7 label, #comments label').inFieldLabels();

	$j('.rule .top').click(function(event) {
		$j("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});

	$j('.sc-notification').children('a.close').click( function(event) {
		event.preventDefault();
		$j(this).parent().fadeOut('slow');
	});

	var more = $j('.more-link')
	if (more.not(':visible')) {
		more.parent().remove();
	};

}

function WidgetsSize(sidebar) {

	 $j('#'+sidebar+' .widget').each( function(index) {
	 	$j(this).addClass('col-' + (index + 1));
	 });
}

function HoverZoomInit() {
	//// Post images
	//$j('article .entry-thumbnail a').hoverZoom({overlayColor:'#ffffff',overlayOpacity: 0.8,zoom:0});

	// default wordpress gallery
	$j('.entry-content .gallery-item a').hoverZoom({overlayColor:'#333',overlayOpacity: 0.8,zoom:0});

	// ait-portfolio
	$j('.entry-content .ait-portfolio a').hoverZoom({overlayColor:'#333',overlayOpacity: 0.8,zoom:0});

	// schortcodes
	$j('.entry-content a.sc-image-link').hoverZoom({overlayColor:'#333',overlayOpacity: 0.8,zoom:0});

}

function CloseableComments() {
	var comments = $j('.closeable #comments'),
		commentlist = comments.find('.commentlist'),
		button 	 = comments.parent().find('.open-button');

	if(comments.children().length == 0) {

		$j('.closeable').remove();

	} else {

		button.show();

		if(button.hasClass('comments-closed') && commentlist.is(':visible')) {
			commentlist.hide();
		}

		button.click(function() {

			if (button.hasClass('comments-closed')) {

				commentlist.not(':animated').slideDown('slow') && button.removeClass('comments-closed').addClass('comments-opened');
				if(button.hasClass('item')){
					button.text('Close Reviews');
				} else {
					button.text('Close Comments');
				}

			} else if (button.hasClass('comments-opened')) {

				commentlist.not(':animated').slideUp('slow') && button.removeClass('comments-opened').addClass('comments-closed');
				if(button.hasClass('item')){
					button.text('Show Reviews');
				} else {
					button.text('Show Comments');
				}

			} else {

				commentlist.slideToggle();

			}
		});
	}
}

function ApplyLightbox(){
	// make galleries
	var selector = "a[href$='gif'], a[href$='jpg'], a[href$='png']",
		linksWithImages = $j(selector);
	// groups
	linksWithImages.attr('rel', 'prettyPhoto[]');
	$j(".widget_flickr").find(selector).attr('rel', 'prettyPhoto[flickr]');
	$j(".gallery").find(selector).attr('rel', 'prettyPhoto[gallery]');
	// apply pretty photo
	linksWithImages.prettyPhoto({
		allow_resize: true,
		default_width: window.innerWidth - 20,
		deeplinking: false,
		social_tools: '',
	});
}

function ApplyFancyboxVideo(){
	// AIT-Portfolio videos
	$j(".ait-portfolio a.video-type").click(function() {

		var address = this.href
		if(address.indexOf("youtube") != -1){
			// Youtube Video
			$j.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'title'			: this.title,
				'width'			: 680,
				'height'		: 495,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
					'wmode'		: 'transparent',
					'allowfullscreen'	: 'true'
				}
			});
		} else if (address.indexOf("vimeo") != -1){
			// Vimeo Video
			// parse vimeo ID
			var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
			var match = this.href.match(regExp);

			if (match){
			    $j.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'transitionIn'	: 'elastic',
					'transitionOut'	: 'elastic',
					'title'			: this.title,
					'width'			: 680,
					'height'		: 495,
					'href'			: "http://player.vimeo.com/video/"+match[2]+"?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff",
					'type'			: 'iframe'
				});
			} else {
			    alert("not a vimeo url");
			}
		}
		return false;
	});

	// Images shortcode
	$j("a.sc-image-link.video-type").click(function() {

		var address = this.href
		if(address.indexOf("youtube") != -1){
			// Youtube Video
			$j.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'title'			: this.title,
				'width'			: 680,
				'height'		: 495,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
					'wmode'		: 'transparent',
					'allowfullscreen'	: 'true'
				}
			});
		} else if (address.indexOf("vimeo") != -1){
			// Vimeo Video
			// parse vimeo ID
			var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
			var match = this.href.match(regExp);

			if (match){
			    $j.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'transitionIn'	: 'elastic',
					'transitionOut'	: 'elastic',
					'title'			: this.title,
					'width'			: 680,
					'height'		: 495,
					'href'			: "http://player.vimeo.com/video/"+match[2]+"?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff",
					'type'			: 'iframe'
				});
			} else {
			    alert("not a vimeo url");
			}
		}
		return false;
	});
}

function PrettySociableInit(){

	var homeUrl = $j("body").data("themeurl");

	$j.prettySociable({websites: {
		facebook : {
			'active': true,
			'encode':true, // If sharing is not working, try to turn to false
			'title': 'Facebook',
			'url': 'http://www.facebook.com/share.php?u=',
			'icon':homeUrl+'/design/img/prettySociable/large_icons/facebook.png',
			'sizes':{'width':70,'height':70}
		},
		twitter : {
			'active': true,
			'encode':true, // If sharing is not working, try to turn to false
			'title': 'Twitter',
			'url': 'http://twitter.com/home?status=',
			'icon':homeUrl+'/design/img/prettySociable/large_icons/twitter.png',
			'sizes':{'width':70,'height':70}
		},
		delicious : {
			'active': true,
			'encode':true, // If sharing is not working, try to turn to false
			'title': 'Delicious',
			'url': 'http://del.icio.us/post?url=',
			'icon':homeUrl+'/design/img/prettySociable/large_icons/delicious.png',
			'sizes':{'width':70,'height':70}
		},
		digg : {
			'active': true,
			'encode':true, // If sharing is not working, try to turn to false
			'title': 'Digg',
			'url': 'http://digg.com/submit?phase=2&url=',
			'icon':homeUrl+'/design/img/prettySociable/large_icons/digg.png',
			'sizes':{'width':70,'height':70}
		},
		linkedin : {
			'active': true,
			'encode':true, // If sharing is not working, try to turn to false
			'title': 'LinkedIn',
			'url': 'http://www.linkedin.com/shareArticle?mini=true&ro=true&url=',
			'icon':homeUrl+'/design/img/prettySociable/large_icons/linkedin.png',
			'sizes':{'width':70,'height':70}
		},
		reddit : {
			'active': true,
			'encode':true, // If sharing is not working, try to turn to false
			'title': 'Reddit',
			'url': 'http://reddit.com/submit?url=',
			'icon':homeUrl+'/design/img/prettySociable/large_icons/reddit.png',
			'sizes':{'width':70,'height':70}
		},
		stumbleupon : {
			'active': true,
			'encode':false, // If sharing is not working, try to turn to false
			'title': 'StumbleUpon',
			'url': 'http://stumbleupon.com/submit?url=',
			'icon':homeUrl+'/design/img/prettySociable/large_icons/stumbleupon.png',
			'sizes':{'width':70,'height':70}
		},
		tumblr : {
			'active': true,
			'encode':true, // If sharing is not working, try to turn to false
			'title': 'tumblr',
			'url': 'http://www.tumblr.com/share?v=3&u=',
			'icon':homeUrl+'/design/img/prettySociable/large_icons/tumblr.png',
			'sizes':{'width':70,'height':70}
		}
	}});

}

function isMobile(type){
	var result = false;
	var ua = navigator.userAgent.toLowerCase();
	var ismobile = ua.indexOf(type) > -1; //&& ua.indexOf("mobile");
	if(ismobile) {
	  result = true;
	}

	return result;
}

function langButtonClick(){
	if(isResponsive()){
		//if(isMobile('ipad') || isMobile('android')){
			$j('.lang-button').toggle(function(){
				$j(this).find('.lang-bubble').show();
			},function(){
				$j(this).find('.lang-bubble').hide();
			});
		//}
	} else {
		$j('.lang-button').hover(function(){
			$j(this).find('.lang-bubble').show();
		},function(){
			$j(this).find('.lang-bubble').hide();
		});
	}
	/*if(isMobile('ipad') || isMobile('android')){

	} else {
		$j('.lang-button').toggle(function(){
			$j(this).find('.lang-bubble').show();
		},function(){
			$j(this).find('.lang-bubble').hide();
		});
	}*/
}