<?php

/**
 * AIT WordPress Theme
 *
 * Copyright (c) 2012, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */

/**
 * Template Name: Business Single Product Template
 * Description: This template show content, top level categories list and alternative content defined in Directory general settings
 */

$latteParams['post'] = WpLatte::createPostEntity(
	$GLOBALS['wp_query']->post,
	array(
		'meta' => $GLOBALS['pageOptions'],
	)
);

/**
 * Fire!
 */
WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();
