{extends $layout}

{block content}
<!-- Begin .section-category-holder -->
<div class="section-category-holder">
	<div class="wrapper">
		
		{include snippets/category-nav.php, main_categoires_style => $main_categoires_style, categories=>$categories}
		
		<!-- Begin .sub-category-list -->
		<{$open}>
		{$sub_categoires_style}
		</{$close}>
		<div class="sub-category-holder flexslider clearfix">
			<ul class="slides">
				{foreach $sub_categories as $category}
				<li>
					<div class="sub-item-holder">
						<div class="ad">
							<img src="{$category['detail']->ads}">
							<span><a href="{$category['detail']->link}">{$category['detail']->name}</a></span>
						</div>
						<div class="sub-cate-list sub-cate-person">
							<table>
								{var $i = 0}
								{var $j = 0}
								{var total = count($category['childs'])}

								{foreach $category['childs'] as $key=>$sub_category}
								
								{var $i++}
								{var $j++}

								{if $i ==1 }<tr>{/if}
								<td><div><a class="cate cate-{$sub_category->term_id}" href="{$sub_category->link}"><span>{$sub_category->name}</span></a></div></td>
								{if $i%4 == 0 or $total == $j}</tr>{/if}
								{if $i%4 == 0}
									{var $i = 0}
								{/if}

								{/foreach}
														
							</table>
						</div>
					</div>
				</li>
				
				{/foreach}
				
			</ul>
		</div>
				<!-- End .sub-category-list -->
	</div>
</div>
<!-- End .section-category-holder -->

{!$post->content}

<!-- End section-newest -->
<div class="section-newest">
	<div class="wrapper">
		<div class="newest-header">
			<h3>最近更新</h3>
			<span>{$newPostsTotal}项</span>
		</div>
		{var $i=1}
		{foreach $newPosts as $item}
		{var $optionsDir = $item->optionsDir}
		<div class="bs-item clearfix {if $i>5} item-hide {/if}">
			<div class="item-detail-top">
				<a href="{!$item->link}">
				<div class="item-detail-img-thumb">
					{if $item->thumbnailDir}
						<a href="{!$item->link}"><img src="{thumbnailResize $item->thumbnailDir, w => 62, h => 48}" alt="{__ 'Item thumbnail'}"></a>
					{else}
						<img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png">
					{/if}
				</div>
				<div class="item-detail-header clearfix">
					<a href="{$item->link}">
					<h3>{$item->post_title}</h3>
					{ifset $optionsDir['engName']}
					<h4>{!$optionsDir['engName']}</h4>
					{/ifset}
				</a>
				</div>
				</a>
			</div>
			<ul class="clearfix">
				{ifset $optionsDir['address']}
				<li class="item-detail-addr">{$optionsDir['address']}</li>
				{/ifset}

				{ifset $optionsDir['telephone']}
				<li class="item-detail-tel">{$optionsDir['telephone']}</li>
				{/ifset}
				
			</ul>
		</div>
		{var $i++}
		{/foreach}
		<div class="newest-more">
			<a href="{$homeUrl}?s=&locations=&page=newest">显示更多</a>
		</div>
	</div>
</div>
<!-- End section-newest -->

<!-- End section-contact-mobile -->
<div class="section-contact-mobile clearfix">
	<div class="wrapper">
		<ul>
			<li><a href="" class="help">帮助</a></li>
			<li><a href="" class="contact">联系我们</a></li>
			<li><a href="" class="feedback">用户反馈</a></li>
		</ul>
	</div>
	
</div>
<!-- End section-contact-mobile -->

<!-- End section-nesubscriptionwest -->
{include 'home-js.php'}
{/block}