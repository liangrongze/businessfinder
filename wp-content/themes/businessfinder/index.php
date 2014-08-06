<?php

/**
 * AIT WordPress Theme
 *
 * Copyright (c) 2012, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */

// directory search

$latteParams['page'] = ( isset($_GET['page']) AND in_array($_GET['page'],array('newest')) ) ? $_GET['page'] : 'newest';
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
	case "newest":
	$latteParams['posts'] = getNewestItems(100000);
	$latteParams['postsTotal'] = countNewestItems();
	break;
}
WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();

