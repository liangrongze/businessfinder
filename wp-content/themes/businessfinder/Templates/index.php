{extends $layout}

{block content}
<!-- Begin .section-category-holder -->
<div class="section-category-holder">
	<div class="wrapper">
		Newest items
	</div>
</div>
<!-- End .section-category-holder -->

<!-- End section-newest -->
<div class="section-list">
	<div class="wrapper">
		<div class="list">

			{foreach $posts as $item}
			{var $optionsDir = $item->optionsDir}
			<div class="bs-item clearfix">
					<div class="item-detail-img-feature left">
						{if $item->thumbnailDir}
							<a href="{!$item->link}"><img src="{thumbnailResize $item->thumbnailDir, w => 280, h => 196}" alt="{__ 'Item thumbnail'}"></a>
						{else}
							<img src="wp-content/themes/businessfinder/design/img/item-feature.png">
						{/if}
						
					</div>
					<div class="item-detail-header left clearfix">
						<div class="thumb-and-name">
							<div class="img-thumb left">
							{if $optionsDir['logo']}
								<a href="{!$item->link}"><img src="{thumbnailResize $optionsDir['logo'], w => 61, h => 42}"></a>
							{else}
								<a href="{!$item->link}"><img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png"></a>
							{/if}
							</div>
							<div class="detail left">
								<a href="{!$item->link}">
								<h3>{$item->post_title}</h3>
								{ifset $optionsDir['engName']}
								<h4>{!$optionsDir['engName']}</h4>
								{/ifset}
								</a>
							</div>
						</div>
						<div class="clear"></div>
						<div class="desc-and-contact clearfix">
							<div class="desc">
								{!$item->excerptDir}
							</div>
							<ul class="clearfix">
								
								{ifset $optionsDir['address']}
								<li class="item-detail-addr">{$optionsDir['address']}</li>
								{/ifset}

								{ifset $optionsDir['telephone']}
								<li class="item-detail-tel">{$optionsDir['telephone']}</li>
								{/ifset}

							</ul>
							<div class="phone-email clearfix">
								<ul>
									<li><a href="?page_id=8561">发邮件</a></li>
									<li><a href="?page_id=8561">发信息</a></li>
								</ul>
							</div>
						</div>
						
					</div>
			</div>
			{/foreach}
		</div>
		<div class="list-banner">
			
		</div>
	</div>
</div>
{include 'cate-items-js.php'}
{/block}