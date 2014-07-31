<{$open}>
{$main_categoires_style}
</{$close}>
			<!-- Begin .main-category-list -->
				<div class="main-category-list clearfix">
					<nav class="main-category">
						{foreach $categories as $category}
							<a title="{!$category->name}" href="{!$category->link}" class="cate-{!$category->term_id}"><div></div></a>
						{/foreach}
					</nav>
				</div>