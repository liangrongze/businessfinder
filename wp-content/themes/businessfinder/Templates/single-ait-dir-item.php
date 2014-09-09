{extends $layout}

{block content}
<!-- Begin .section-category-holder -->
<div class="section-category-holder">
	<div class="wrapper">
		{include snippets/category-nav.php, main_categoires_style => $main_categoires_style, categories=>$categories}
	</div>
</div>
<!-- End .section-category-holder -->
<!-- start .section-breadcrumb-holder -->
<div class="section-breadcrumb-holder">
	<div class="wrapper">
		<div class="breadcrumb left clearfix">
			<ul class="">
				<li class="left">
					<a href="{!$homeUrl}">
						<span class="underline">首页</span>
					</a> 
					<span class="divider"> &gt; </span>
				</li>
				{foreach $ancestors as $anc}
				<li class="left">
					<a href="{!$anc->link}">
						<span class="underline">{!$anc->name}</span>
					</a> 
					<span class="divider"> &gt; </span>
				</li>
				{/foreach}
				<li class="active">{!$term->name}</li>
			</ul>
		</div>
	</div>
</div>
<!-- End .section-breadcrumb-holder -->

<!-- start .section-banner -->
<div class="section-banner">
	<div class="wrapper">
		<div class="item-detail-thumbnail left">
			{if $post->thumbnailSrc}
				<img src="{thumbnailResize $post->thumbnailSrc, w => 960, h => 260}" alt="{__ 'Item image'}">
			{else}
				<img src="wp-content/themes/businessfinder/design/img/banner-example.jpg">
			{/if}
		</div>
	</div>
</div>
<!-- Emd .section-banner -->

<!-- start .business-detail-part-1 -->
<div class="business-detail-part-1">
	<div class="wrapper">
		<h1>{$post->title}</h1>
		<div class="addthis-toolbox addthis_default_style addthis_32x32_style">
		    <a class="addthis_button_google_plusone"></a>
			<a class="addthis_button_pinterest_pinit"></a>
			<a class="addthis_button_tweet"></a>
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
		</div>
	</div>
</div>
<!-- start .business-detail-part-1 -->

<!-- start .business-detail-part-2 -->
<div class="business-detail-part-2">
	<div class="wrapper">
		<div class="m-address">{$options['address']}</div>
		<div class="map" data-location="{$options['gpsLatitude']},{$options['gpsLongitude']},20">
			<div id="map-canvas" class="left" style=""></div>
			<div class="details left">
				<dl class="">
				            <dd class="address">{$options['address']}</dd>
							<dd class="address">{$options['telephone']}</dd>
 				            <dd class="website"><a href="{$options['web']}" target="_blank">{$options['web']}</a></dd>
		        </dl>
					<div class="sl">
						<a id="share" href="#">分享</a>
						<a id="business-card" href="#business-card-container">商家名片</a>
					</div>
			</div>
		</div>
		<div class="m-tel">联系电话：{$options['telephone']}</div>
	   <div class="clear"></div>
		<div class="desc">
			<article class="left">
			    <p>{!$post->content}</p>
			</article>
		</div>
	</div>
	<div class="share-bg" style="display:none;"></div>
	<div style="display:none;" id="share-container">
		<div>分享到</div> <a href="#" class="share-close"></a>
			<div class="addthis_sharing_toolbox"></div>
	</div>
	<div id="business-card-container" style="display:none;">
		<div>商家名片</div> <a href="#" class="card-close"></a>
		{if $options['businessCard']}
		<img src="{$options['businessCard']}">
		{else}
		<img src="wp-content/themes/businessfinder/design/img/card-default.png">
		{/if}
	</div>
</div>
<!-- start .business-detail-part-2 -->

{if $options['galleryEnable'] == true}
<div class="section-gallery">
	<div class="wrapper">
	  <h3>图片</h3>
	         <div class="carousel-holder">
	             <a class="prev" href="#">&nbsp;</a>
	             <div class="carousel">
					 {for $i=1; $i<21; $i++}
					 {var $name='gallery'.$i}
					 {if $options[$name] != ''}
	                     <a rel="caroufredsel" class="fancybox-media Image" href="{$options[$name]}">
	                         <img src="{thumbnailResize $options[$name], w => 160, h => 130}"  class="left" alt="" />
	                     </a>
					 {/if}
					{/for}
	             </div>
	             <div class="clearfix"></div>
	             <a class="next" href="#">&nbsp;</a>
	         </div>
			 <div class="flex-container m-slider">
				 <div class="flexslider span12">
					 <ul class="slides">
						 <li><img src="wp-content/themes/businessfinder/design/img/g-1.jpg" class="attachment-slider-double wp-post-image" alt=""></li>
						<li><img src="wp-content/themes/businessfinder/design/img/g-2.jpg" class="attachment-slider-double wp-post-image" alt=""></li>
						<li><img src="wp-content/themes/businessfinder/design/img/g-3.jpg" class="attachment-slider-double wp-post-image" alt=""></li>
						<li><img src="wp-content/themes/businessfinder/design/img/g-4.jpg" class="attachment-slider-double wp-post-image" alt=""></li>
						<li><img src="wp-content/themes/businessfinder/design/img/g-5.jpg" class="attachment-slider-double wp-post-image" alt=""></li>
						<li><img src="wp-content/themes/businessfinder/design/img/g-6.jpg" class="attachment-slider-double wp-post-image" alt=""></li>
						<li><img src="wp-content/themes/businessfinder/design/img/g-7.jpg" class="attachment-slider-double wp-post-image" alt=""></li>
						<li><img src="wp-content/themes/businessfinder/design/img/g-8.jpg" class="attachment-slider-double wp-post-image" alt=""></li>
					 </ul>
				 </div>
			 </div>
	</div>	
</div>
{/if}

<!-- start .business-related -->
{if isset($options['specialActive']) or isset($options['specialActive']) or isset($options['specialActive'])}
<div class="section-related">
	<div class="wrapper">
        <h3>商家优惠信息</h3>
        <div class="offers left">
			{ifset $options['specialActive']}
                <div class="offer left">
                    <div>
                        <h4>{$options['specialTitle']}</h4>
                        <span>
                            {$options['specialContent']}<span class="more">更多信息</span>
                        </span>
                    </div>
                    <div class="image"><img src="{thumbnailResize $options['specialImage'], w => 323, h => 198}" alt="{__ 'Item image'}"></div>
			</div>
			{/ifset}
			{ifset $options['specialActive2']}
                <div class="offer left">
                    <div>
                        <h4>{$options['specialTitle2']}</h4>
                        <span>
                            {$options['specialContent2']}<span class="more">更多信息</span>
                        </span>
                    </div>
                                        <div class="image"><img src="{thumbnailResize $options['specialImage2'], w => 323, h => 198}" alt="{__ 'Item image'}"></div>
			</div>
			{/ifset}
			{ifset $options['specialActive3']}
                <div class="offer left">
                    <div>
                        <h4>{$options['specialTitle3']}</h4>
                        <span>
                            {$options['specialContent3']}<span class="more">更多信息</span>
                        </span>
                    </div>
                                        <div class="image"><img src="{thumbnailResize $options['specialImage3'], w => 323, h => 198}" alt="{__ 'Item image'}"></div>
			</div>
			{/ifset}
        </div>
    </div>	    
</div>
{/if}
<!-- End .business-related -->

{include 'single-js.php'}
{/block}