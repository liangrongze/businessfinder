<!doctype html>

<!--[if IE 8]><html class="no-js oldie ie8 ie" lang="{$site->language}"><![endif]-->
<!--[if IE 9]><html class="no-js oldie ie9 ie" lang="{$site->language}"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="{$site->language}" style="background-image:url(wp-content/themes/businessfinder/design/img/home-bg.png); background-repeat:no-repeat; background-position:top center;background-attachment:fixed;background-color:white"><!--<![endif]-->

	<head>
		<meta charset="{$site->charset}">
		{mobileDetectionScript}
		<meta name="Author" content="AitThemes.com, http://www.ait-themes.com">

		<title>{title}</title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="{$site->pingbackUrl}">

		{head}

		<link id="ait-style" rel="stylesheet" type="text/css" media="all" href="{less}">

		<script>
		  'article aside footer header nav section time'.replace(/\w+/g,function(n){ document.createElement(n) })
		</script>

		<script type="text/javascript">
		jQuery(document).ready(function($) {

			{ifset $themeOptions->search->searchCategoriesHierarchical}
			var categories = [ {!$categoriesHierarchical} ];
			{else}
			var categories = [
			{foreach $categories as $cat}
				{ value: {$cat->term_id}, label: {$cat->name} }{if !($iterator->last)},{/if}
			{/foreach}
			];
			{/ifset}
			
			{ifset $themeOptions->search->searchLocationsHierarchical}
			var locations = [ {!$locationsHierarchical} ];
			{else}
			var locations = [
			{foreach $locations as $loc}
				{ value: {$loc->term_id}, label: {$loc->name} }{if !($iterator->last)},{/if}
			{/foreach}
			];
			{/ifset}

			// var catInput = $( "#dir-searchinput-category" ),
				// catInputID = $( "#dir-searchinput-category-id" ),
			var	locInput = $( "#dir-searchinput-location" ),
				locInputID = $( "#dir-searchinput-location-id" );
				/*
			catInput.autocomplete({
				minLength: 0,
				source: categories,
				focus: function( event, ui ) {
					var val = ui.item.label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					catInput.val( val );
					return false;
				},
				select: function( event, ui ) {
					var val = ui.item.label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					catInput.val( val );
					catInputID.val( ui.item.value );
					return false;
				}
			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li>" )
					.data( "item.autocomplete", item )
					.append( "<a>" + item.label + "</a>" )
					.appendTo( ul );
			};
				
			var catList = catInput.autocomplete( "widget" );
			catList.niceScroll({ autohidemode: false });

			catInput.click(function(){
				catInput.val('');
				catInputID.val('0');
				catInput.autocomplete( "search", "" );
			});
*/
			locInput.autocomplete({
				minLength: 0,
				source: locations,
				focus: function( event, ui ) {
					var val = ui.item.label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					locInput.val( val );
					return false;
				},
				select: function( event, ui ) {
					var val = ui.item.label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					locInput.val( val );
					locInputID.val( ui.item.value );
					return false;
				}
			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li>" )
					.data( "item.autocomplete", item )
					.append( "<a>" + item.label + "</a>" )
					.appendTo( ul );
			};
			var locList = locInput.autocomplete( "widget" );
			locList.niceScroll({ autohidemode: false });

			locInput.click(function(){
				locInput.val('');
				locInputID.val('0');
				locInput.autocomplete( "search", "" );
			});


			{ifset $_GET['dir-search']}
			// fill inputs with search parameters
			$('#dir-searchinput-text').val({$searchTerm});
			catInputID.val({$_GET["categories"]});
			for(var i=0;i<categories.length;i++){
				if(categories[i].value == {$_GET["categories"]}) {
					var val = categories[i].label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					catInput.val(val);
				}
			}
			locInputID.val({$_GET["locations"]});
			for(var i=0;i<locations.length;i++){
				if(locations[i].value == {$_GET["locations"]}) {
					var val = locations[i].label.replace(/&amp;/g, "&");
						val = val.replace(/&nbsp;/g, " ");
					locInput.val(val);
				}
			}
			{/ifset}

		});
		</script>

	</head>

	<body <?php body_class('ait-businessfinder'); ?> data-themeurl="{$themeUrl}">

		<div id="page" class="hfeed header-type-{$headerType}" >

			{include 'snippets/branding-header.php'}

