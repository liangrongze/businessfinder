{extends $layout}

{block content}
<!-- Begin .section-category-holder -->
<div class="section-category-holder">
	<div class="wrapper">
		{include 'snippets/category-nav.php'}
	</div>
</div>
<!-- End .section-category-holder -->

<!-- Begin .section-category-form -->
<div class="section-category-form clearfix">
	<div class="wrapper">
		<!-- Begin .category-form-holder -->
		<div class="category-form-holder categoty-food-form-holder">
			<div class="category-title">
				<h1>生活|饮食</h1>
			</div>
			<div class="category-form">
				<div class="item-search right">
					<input type="submit" value="{__ '搜索'}" class="item-searchsubmit">
				</div>
				<div class="categoty-location right">
					<select id="location">
						<option>按区域搜索</option>
						<option>Abc</option>
						<option>Abcd</option>
						<option>Abcdedf</option>
						<option>Abc</option>
						<option>Abcd</option>
						<option>Abcdedf</option>
						<option>Abc</option>
						<option>Abcd</option>
						<option>Abcdedf</option>
					</select>
				</div>
				<div class="categoty-options right">
					<select id="type">
						<option>按饭店类型搜索</option>
						<option>四川美食</option>
						<option>粤菜</option>
						<option>西餐牛排</option>
						<option>泰国餐厅</option>
					</select>
				</div>
				
				
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
			<div class="bs-item clearfix">
					<div class="item-detail-img-feature left">
						<img src="wp-content/themes/businessfinder/design/img/item-feature.png">
					</div>
					<div class="item-detail-header left clearfix">
						<div class="thumb-and-name">
							<div class="img-thumb left">
								<a href="?page_id=8561"><img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png"></a>
							</div>
							<div class="detail left">
								<a href="?page_id=8561">
								<h3>飓风酒吧餐厅</h3>
								<h4>Huricans' Grill & Bar Bondi Beach</h4>
								</a>
							</div>
						</div>
						<div class="desc-and-contact clearfix">
							<div class="desc">
								拥有全资格的牛排餐厅和酒吧。提供优质牛肉牛排、
								排骨、鸡肉和海鲜。让你在闲暇之余享受美味充实的
								感觉。本店招牌餐点为烤猪肋骨和香葱面包。
							</div>
							<ul class="clearfix">
								<li class="item-detail-addr">130 Rosoe Street, Bondi Beach, NSW 2026</li>
								<li class="item-detail-tel">(02) 9876 0987</li>
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
			
			<div class="bs-item clearfix">
					<div class="item-detail-img-feature left">
						<img src="wp-content/themes/businessfinder/design/img/item-feature.png">
					</div>
					<div class="item-detail-header left clearfix">
						<div class="thumb-and-name">
							<div class="img-thumb left">
								<a href="?page_id=8561"><img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png"></a>
							</div>
							<div class="detail left">
								<a href="?page_id=8561">
								<h3>飓风酒吧餐厅</h3>
								<h4>Huricans' Grill & Bar Bondi Beach</h4>
								</a>
							</div>
						</div>
						<div class="desc-and-contact clearfix">
							<div class="desc">
								拥有全资格的牛排餐厅和酒吧。提供优质牛肉牛排、
								排骨、鸡肉和海鲜。让你在闲暇之余享受美味充实的
								感觉。本店招牌餐点为烤猪肋骨和香葱面包。
							</div>
							<ul class="clearfix">
								<li class="item-detail-addr">130 Rosoe Street, Bondi Beach, NSW 2026</li>
								<li class="item-detail-tel">(02) 9876 0987</li>
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
			<div class="bs-item clearfix">
					<div class="item-detail-img-feature left">
						<img src="wp-content/themes/businessfinder/design/img/item-feature.png">
					</div>
					<div class="item-detail-header left clearfix">
						<div class="thumb-and-name">
							<div class="img-thumb left">
								<a href="?page_id=8561"><img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png"></a>
							</div>
							<div class="detail left">
								<a href="?page_id=8561">
								<h3>飓风酒吧餐厅</h3>
								<h4>Huricans' Grill & Bar Bondi Beach</h4>
								</a>
							</div>
						</div>
						<div class="desc-and-contact clearfix">
							<div class="desc">
								拥有全资格的牛排餐厅和酒吧。提供优质牛肉牛排、
								排骨、鸡肉和海鲜。让你在闲暇之余享受美味充实的
								感觉。本店招牌餐点为烤猪肋骨和香葱面包。
							</div>
							<ul class="clearfix">
								<li class="item-detail-addr">130 Rosoe Street, Bondi Beach, NSW 2026</li>
								<li class="item-detail-tel">(02) 9876 0987</li>
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
			<div class="bs-item clearfix">
					<div class="item-detail-img-feature left">
						<img src="wp-content/themes/businessfinder/design/img/item-feature.png">
					</div>
					<div class="item-detail-header left clearfix">
						<div class="thumb-and-name">
							<div class="img-thumb left">
								<a href="?page_id=8561"><img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png"></a>
							</div>
							<div class="detail left">
								<a href="?page_id=8561">
								<h3>飓风酒吧餐厅</h3>
								<h4>Huricans' Grill & Bar Bondi Beach</h4>
								</a>
							</div>
						</div>
						<div class="desc-and-contact clearfix">
							<div class="desc">
								拥有全资格的牛排餐厅和酒吧。提供优质牛肉牛排、
								排骨、鸡肉和海鲜。让你在闲暇之余享受美味充实的
								感觉。本店招牌餐点为烤猪肋骨和香葱面包。
							</div>
							<ul class="clearfix">
								<li class="item-detail-addr">130 Rosoe Street, Bondi Beach, NSW 2026</li>
								<li class="item-detail-tel">(02) 9876 0987</li>
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
			<div class="bs-item clearfix">
					<div class="item-detail-img-feature left">
						<img src="wp-content/themes/businessfinder/design/img/item-feature.png">
					</div>
					<div class="item-detail-header left clearfix">
						<div class="thumb-and-name">
							<div class="img-thumb left">
								<a href="?page_id=8561"><img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png"></a>
							</div>
							<div class="detail left">
								<a href="?page_id=8561">
								<h3>飓风酒吧餐厅</h3>
								<h4>Huricans' Grill & Bar Bondi Beach</h4>
								</a>
							</div>
						</div>
						<div class="desc-and-contact clearfix">
							<div class="desc">
								拥有全资格的牛排餐厅和酒吧。提供优质牛肉牛排、
								排骨、鸡肉和海鲜。让你在闲暇之余享受美味充实的
								感觉。本店招牌餐点为烤猪肋骨和香葱面包。
							</div>
							<ul class="clearfix">
								<li class="item-detail-addr">130 Rosoe Street, Bondi Beach, NSW 2026</li>
								<li class="item-detail-tel">(02) 9876 0987</li>
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
			<div class="bs-item clearfix">
					<div class="item-detail-img-feature left">
						<img src="wp-content/themes/businessfinder/design/img/item-feature.png">
					</div>
					<div class="item-detail-header left clearfix">
						<div class="thumb-and-name">
							<div class="img-thumb left">
								<a href="?page_id=8561"><img src="wp-content/themes/businessfinder/design/img/bs-thumb-1.png"></a>
							</div>
							<div class="detail left">
								<a href="?page_id=8561">
								<h3>飓风酒吧餐厅</h3>
								<h4>Huricans' Grill & Bar Bondi Beach</h4>
								</a>
							</div>
						</div>
						<div class="desc-and-contact clearfix">
							<div class="desc">
								拥有全资格的牛排餐厅和酒吧。提供优质牛肉牛排、
								排骨、鸡肉和海鲜。让你在闲暇之余享受美味充实的
								感觉。本店招牌餐点为烤猪肋骨和香葱面包。
							</div>
							<ul class="clearfix">
								<li class="item-detail-addr">130 Rosoe Street, Bondi Beach, NSW 2026</li>
								<li class="item-detail-tel">(02) 9876 0987</li>
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
		</div>
		<div class="list-banner">
			
		</div>
	</div>
</div>
{include 'cate-items-js.php'}
{/block}