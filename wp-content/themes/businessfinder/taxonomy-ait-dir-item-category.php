<?php

$term = $GLOBALS['wp_query']->queried_object;
$latteParams['curent_category'] = $term->term_id;

$categories = intval($_GET['ait-dir-item-category']) ? intval($_GET['ait-dir-item-category']) : $term->term_id;

// If is child category ,term must be parent category
if( $term->parent != 0)
	$term = get_term_by('id',$term->parent, 'ait-dir-item-category');
$subcategories =  get_terms( 'ait-dir-item-category', array('parent' => intval($term->term_id), 'hide_empty' => false) );


$items = getItems($categories,intval($_GET['locations']));

if (empty($items)) 
	$latteParams['dirSearchNotFound'] = true;

// add subcategory links
foreach ($subcategories as $category) {
	$category->link = get_term_link(intval($category->term_id), 'ait-dir-item-category');
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

$sublocations = get_terms( 'ait-dir-item-location', array('number' => 999999999999999 ,'hide_empty' => false) );
$hLocations = array();
aitSortTermsHierarchicaly($sublocations, $hLocations);
$latteParams['location'] = $_GET['locations'];

$categories = get_terms('ait-dir-item-category', array(
	'hide_empty'		=> false,
	'orderby'			=> 'term_id',
	'parent' => 0
));

foreach($categories as $category){
	$category->link = get_term_link(intval($category->term_id), 'ait-dir-item-category');
}
$latteParams['main_categoires_style'] = render_main_category_style($categories);
$latteParams['open'] = 'style';
$latteParams['close'] = 'style';
$latteParams['categories'] = $categories;
$latteParams['hLocations'] = $hLocations;

WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();