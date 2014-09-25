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
				<form action="{$homeUrl}">
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
						<option value="{$term->slug}">按类型搜索</option>
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
			<form action="{$homeUrl}" method="">
				<input type="hidden" name="ait-dir-item-category" value="{$term->slug}">

			<div class="holder-title">
				<div><span>精确搜索</span></div>
			</div>
			{var $hideFlag = 5}
			{var $i = 1}
			{var $j = 1}
			<div class="holder-detail">
				<a class="close">close</a>
				<div class="action-title"><span>搜索筛选标签</span><a href="">清除搜索选项</a></div>
				<div class="action clearfix"><span class="t">按照</span><select><option>相关联项</option><option>相关联项</option></select><input class="b-submit" type="submit" value="搜索"></div>
				<div class="filter clearfix">
					<div class="action-title"><span>分类搜索</span><a href="">清除搜索选项</a></div>
					<ul>
						{foreach $subcategories as $c}
						{if $c->count > 0}
						<li {if $i>$hideFlag } class="hide" {/if} >
							<span class="f-input"><input type="checkbox" name="category[]" value="{$c->term_id}"><label></label></span> 
							<span class="f-value">{$c->name}</span>
							<span class="f-num">{$c->count}</span>
						</li>
						{var $i++}
						{/if}
						{/foreach}
					</ul>
					{if $i>$hideFlag }
					<div class="expand clearfix">更多选项</div>
					{/if}
				</div>
				<div class="filter clearfix">
					<div class="action-title"><span>地点区域</span><a href="">清除搜索选项</a></div>
					<ul>
						{foreach $hLocations as $location}
						{if $location->count>0}
						<li  {if $j>$hideFlag } class="hide" {/if}>
							<span class="f-input"><input type="checkbox" name="location[]" value="{$location->term_id}"><label></label></span> 
							<span class="f-value">{$location->name}</span>
							<span class="f-num">{$location->count}</span>
						</li>
						{var $j++}
						{/if}
						{/foreach}
					</ul>
					{if $i>$hideFlag }
					<div class="expand clearfix">更多选项</div>
					{/if}
				</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
<!-- End section-category-form -->

<!-- End section-newest -->
<div class="section-list">
	<div class="wrapper">
		<div class="list">
			{if count($items)>0}
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
			{else}
			<div class="item-empty">暂没商家，请重新选择。</div>
			{/if}
			<nav class="paginate-links">
				{paginateLinks true}
			</nav>
		</div>
		<div class="list-banner">
			{dynamicSidebar sidebar-item}
		</div>
	</div>
</div>
{include 'cate-items-js.php'}
{/block}