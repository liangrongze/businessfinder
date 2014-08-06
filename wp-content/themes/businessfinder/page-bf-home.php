<?php

/**
 * AIT WordPress Theme
 *
 * Copyright (c) 2012, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */

/**
 * Template Name: Business Homepage Template
 * Description: This template show content, top level categories list and alternative content defined in Directory general settings
 */

$latteParams['post'] = WpLatte::createPostEntity(
	$GLOBALS['wp_query']->post,
	array(
		'meta' => $GLOBALS['pageOptions'],
	)
);

$categories = get_terms('ait-dir-item-category', array(
	'hide_empty'		=> false,
	'orderby'			=> 'name',
	'parent' => 0
));

$latteParams['main_categoires_style'] = render_main_category_style($categories);
$latteParams['open'] = 'style';
$latteParams['close'] = 'style';
$latteParams['categories'] = $categories;

$sub_categories = get_terms('ait-dir-item-category', array(
	'hide_empty'		=> false,
	'orderby'			=> 'name',
));

// format main category
$temp = array();
foreach($categories AS $category){
	$category->ads = getRealThumbnailUrl(getCategoryMeta("ads", intval($category->term_id)));
	$category->link = get_term_link(intval($category->term_id), 'ait-dir-item-category');
	$temp[$category->term_id]['detail'] = $category;
	$temp[$category->term_id]['childs'] = array();
}

foreach($sub_categories AS $sub_category){
	
	$sub_category->icon = getRealThumbnailUrl(getCategoryMeta("icon", intval($sub_category->term_id)));
	$sub_category->icon_hover = getRealThumbnailUrl(getCategoryMeta("hover", intval($sub_category->term_id)));
	$sub_category->link = get_term_link(intval($category->term_id), 'ait-dir-item-category');
	foreach($temp AS $key=>$_t){
		if($key ==  $sub_category->parent){
			if( !array_key_exists($sub_category->term_id, $temp[$sub_category->parent]['childs']) ){
				$temp[$sub_category->parent]['childs'][$sub_category->term_id] = $sub_category;
			}	
		}
	}
}

$latteParams['sub_categories'] = $temp;

$latteParams['sub_categoires_style'] = render_sub_category_style($sub_categories);

// for mobile view
$latteParams['newPosts'] = getNewestItems(10);
$latteParams['newPostsTotal'] = countNewestItems();

/**
 * Fire!
 */
WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();
