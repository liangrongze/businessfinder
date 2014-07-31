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
								<td><div><a class="cate cate-{$sub_category->term_id}" href="{$sub_categoty->link}"><span>{$sub_category->name}</span></a></div></td>
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

<!-- Begin .section-ad-contact -->
<div class="section-ad-contact clearfix">
	<div class="wrapper">
		{!$post->content}
	</div>
</div>
<!-- End section-ad-contact -->

<!-- End section-newest -->
<div class="section-newest">
	<div class="wrapper">
		<div class="newest-header">
			<h3>最近更新</h3>
			<span>186项</span>
		</div>
		<div class="bs-item clearfix">
			<div class="item-detail-top">
				<a href="?page_id=8561">
				<div class="item-detail-img-thumb">
					<img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png">
				</div>
				<div class="item-detail-header clearfix">
					<h3>飓风酒吧餐厅</h3>
					<h4>Huricans' Grill & Bar Bondi Beach</h4>
				</div>
				</a>
			</div>
			<ul class="clearfix">
				<li class="item-detail-addr">130 Rosoe Street, Bondi Beach, NSW 2026</li>
				<li class="item-detail-tel">(02) 9876 0987</li>
			</ul>
		</div>
		<div class="bs-item clearfix">
			<div class="item-detail-top">
				<a href="?page_id=8561">
				<div class="item-detail-img-thumb">
					<img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png">
				</div>
				<div class="item-detail-header clearfix">
					<h3>飓风酒吧餐厅</h3>
					<h4>Huricans' Grill & Bar Bondi Beach</h4>
				</div>
				</a>
			</div>
			<ul class="clearfix">
				<li class="item-detail-addr">130 Rosoe Street, Bondi Beach, NSW 2026</li>
				<li class="item-detail-tel">(02) 9876 0987</li>
			</ul>
		</div>
		<div class="newest-more">
			<a href="">显示更多</a>
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

<!-- End section-subscription -->
<div class="section-subscription clearfix">
	<div class="wrapper">
		<div>
			<p>
				<label>现在订阅我们的E－MAIL<br />即可得到更多优惠信息</label>
				<span class="s-button"><input value="订阅" type="submit"></span>
				<span class="s-email"><input type="text" name=""></span>
				
			</p>
		</div>
	</div>
</div>
<!-- End section-nesubscriptionwest -->
{include 'home-js.php'}
{/block}