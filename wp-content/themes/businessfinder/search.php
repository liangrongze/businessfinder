<?php

/**
 * AIT WordPress Theme
 *
 * Copyright (c) 2012, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */
$latteParams['page'] = 'index';

/*
$categories = get_terms('ait-dir-item-category', array(
	'hide_empty'		=> false,
	'orderby'			=> 'name',
	'parent' => 0
));

$latteParams['main_categoires_style'] = render_main_category_style($categories);
$latteParams['open'] = 'style';
$latteParams['close'] = 'style';
$latteParams['categories'] = $categories;
*/

switch($latteParams['page']){
	
	default:
	$latteParams['s'] = $_GET['s'];
	$latteParams['location'] = get_term_by('id',$_GET['locations'], 'ait-dir-item-location');;
	$latteParams['postsTotal'] = countItems(0,intval($_GET['locations']),trim($_GET['s']));
	$latteParams['posts'] = getItems(0,intval($_GET['locations']),trim($_GET['s']));
	
	
	break;
}
WPLatte::createTemplate('index.php', $latteParams)->render();