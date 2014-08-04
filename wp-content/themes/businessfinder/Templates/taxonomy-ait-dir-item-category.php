{extends $layout}

{block content}
<!-- Begin .section-category-holder -->
<div class="section-category-holder">
	<div class="wrapper">
		{include snippets/category-nav.php, main_categoires_style => $main_categoires_style, categories=>$categories}
	</div>
</div>
<!-- End .section-category-holder -->

<!-- Begin .section-category-form -->
<div class="section-category-form clearfix">
	<div class="wrapper">
		<!-- Begin .category-form-holder -->
		<div class="category-form-holder categoty-food-form-holder">
			<div class="category-title">
				<h1>{!$term->name}</h1>
			</div>
			<div class="category-form">
				<form action="{$term->link}">
				<div class="item-search right">
					<input type="submit" value="{__ '搜索'}" class="item-searchsubmit">
				</div>
				<div class="categoty-location right">
					<select id="locations" name="locations">
						<option>按区域搜索</option>
						{if count($hLocations) > 0}
						{foreach $hLocations as $hL}
						{var $selected = $location == $hL->term_id ? 'selected' : ''}
						<option {$selected} value="{$hL->term_id}">{!$hL->name}</option>
						{if count($hL->children)}
						{foreach $hL->children as $l}
						{var $selected = $location == $l->term_id ? 'selected' : ''}
						<option {$selected} value="{$l->term_id}">--{!$l->name}</option>
						{/foreach}
						{/if}
						{/foreach}
						{/if}
					</select>
				</div>
				<div class="categoty-options right">
					<select id="ait-dir-item-category" name="ait-dir-item-category">
						<option value="{$term->slug}">按饭店类型搜索</option>
						{if count($subcategories) > 0}
						{foreach $subcategories as $category}
						{var $selected = $curent_category == $category->term_id ? 'selected' : ''}
						<option {$selected} value="{$category->slug}">{!$category->name}</option>
						{/foreach}
						{/if}
					</select>
				</div>
			</form>
			</div>
		</div>
		<!-- Begin .category-form-holder -->
		<div class="category-food-mobile-holder">
			<div class="holder-title">
				<div><span>精确搜索</span></div>
			</div>
			<div class="holder-detail">
				<a class="close">close</a>
				<div class="action-title"><span>搜索筛选标签</span><a href="">清除搜索选项</a></div>
				<div class="action clearfix"><span class="t">按照</span><select><option>相关联项</option><option>相关联项</option></select><a href="">搜索</a></div>
				<div class="filter clearfix">
					<div class="action-title"><span>地点区域</span><a href="">清除搜索选项</a></div>
					<ul>
						<li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
						<li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
						<li class="collapse">
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
						<li class="collapse">
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
					</ul>
					<div class="expand clearfix">更多选项</div>
				</div>
				<div class="filter clearfix">
					<div class="action-title"><span>地点区域</span><a href="">清除搜索选项</a></div>
					<ul>
						<li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
						<li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
						<li class="collapse">
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
						<li class="collapse">
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
					</ul>
					<div class="expand clearfix">更多选项</div>
				</div>
				<div class="filter clearfix">
					<div class="action-title"><span>地点区域</span><a href="">清除搜索选项</a></div>
					<ul>
						<li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
						<li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li><li>
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
						<li class="collapse">
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
						<li class="collapse">
							<span class="f-input"><input type="checkbox"><label></label></span> 
							<span class="f-value">Sydney</span>
							<span class="f-num">150</span>
						</li>
					</ul>
					<div class="expand clearfix">更多选项</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End section-category-form -->

<!-- End section-newest -->
<div class="section-list">
	<div class="wrapper">
		<div class="list">

			{foreach $items as $item}
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