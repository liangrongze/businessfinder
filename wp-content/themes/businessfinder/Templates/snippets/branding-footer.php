<div id="site-generator" class="wrapper">
	<div class="social-holder">
		<ul class="social">
            <li><a class="twitter" href="https://twitter.com/BusinessFinder" target="_blank"></a></li>
			<li><a class="facebook" href="http://www.facebook.com/BusinessFinder" target="_blank"></a></li>
			<li><a class="youtube" href="http://youtube.com/user/BusinessFinder" target="_blank"></a></li>
            <li><a class="instagram" href="http://instagram.com/BusinessFinder" target="_blank"></a></li>
		</ul>
	</div>
	<div class="foot-menu clearfix">
		{menu 'theme_location' => 'footer-menu', 'fallback_cb' => 'default_page_menu', 'container' => 'nav', 'container_class' => '', 'menu_class' => 'menu' }
		<div class="foot-logo">
			{if !empty($themeOptions->general->logo_img)}
			<a class="trademark" href="{$homeUrl}">
				<img src="{linkTo $themeOptions->general->logo_img}" alt="{$themeOptions->general->logo_text}" />
			</a>
			{else}
			<a href="{$homeUrl}">
				<span>{$themeOptions->general->logo_text}</span>
			</a>
			{/if}
		</div>
	</div>
	<div class="foot-text clearfix">
		<p>How did Darling Harbour come to life, how has it grown up and what was here before? From the Gadigal people, the original inhabitants of Sydney Cove, to a time of great industry, Darling Harbour has a thousand stories to tell.</p>
	</div>
</div>