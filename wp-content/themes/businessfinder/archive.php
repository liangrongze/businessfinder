<?php

/**
 * AIT WordPress Theme
 *
 * Copyright (c) 2012, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */

// directory search

$term = $GLOBALS['wp_query']->queried_object;
$latteParams['curent_category'] = $term->term_id;

$query_categories = intval($_GET['ait-dir-item-category']) ? array(intval($_GET['ait-dir-item-category'])) : array($term->term_id);

if( $_GET['category'] ){
	$query_categories = array();
	foreach($_GET['category'] AS $_t){
		$query_categories[] = $_t;
	}
}


// If is child category ,term must be parent category
if( $term->parent != 0)
	$term = get_term_by('id',$term->parent, 'ait-dir-item-category');
$subcategories =  get_terms( 'ait-dir-item-category', array('parent' => intval($term->term_id), 'hide_empty' => false) );

$sublocations = get_terms( 'ait-dir-item-location', array('number' => 999999999999999 ,'hide_empty' => false) );
$hLocations = array();
aitSortTermsHierarchicaly($sublocations, $hLocations);
$latteParams['location'] = $_GET['locations'];

$categories = get_terms('ait-dir-item-category', array(
	'hide_empty'		=> false,
	'orderby'			=> 'id',
	'parent' => 0
));


$items = getItems(0,0,0,0, trim($_GET['tag']));

if (empty($items)) 
	$latteParams['dirSearchNotFound'] = true;

// add subcategory links
foreach ($subcategories as $category) {
	$category->link = get_term_link(intval($category->term_id), 'ait-dir-item-category');
	$category->count = countItems($category->term_id);
}

foreach($hLocations as $location){
	$location->count = countItems($latteParams['curent_category'],$location->term_id);
}
// add items details
foreach ($items as $item) {
	$item->link = get_permalink($item->ID);
	$image = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'full' );
	if($image !== false){
		$item->thumbnailDir = getRealThumbnailUrl($image[0]);
	} else {
		$item->thumbnailDir = getRealThumbnailUrl($aitThemeOptions->directory->defaultItemImage);
	}
	$item->optionsDir = get_post_meta($item->ID, '_ait-dir-item', true);
}

$latteParams['term'] = $term;
$latteParams['subcategories'] = $subcategories;
$latteParams['items'] = $items;
$latteParams['isDirTaxonomy'] = true;


foreach($categories as $category){
	$category->link = get_term_link(intval($category->term_id), 'ait-dir-item-category');
}
$latteParams['main_categoires_style'] = render_main_category_style($categories);
$latteParams['open'] = 'style';
$latteParams['close'] = 'style';
$latteParams['categories'] = $categories;
$latteParams['hLocations'] = $hLocations;


WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();

