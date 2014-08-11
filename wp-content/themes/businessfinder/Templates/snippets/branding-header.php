{ifset $registerErrors}
<div id="ait-dir-register-notifications" class="error">
	<div class="message wrapper">
	{!$registerErrors}
	<div class="close"></div>
	</div>
</div>
{/ifset}

{ifset $registerMessages}
<div id="ait-dir-register-notifications" class="info">
	<div class="message wrapper">
	{!$registerMessages}
	<div class="close"></div>
	</div>
</div>
{/ifset}

{ifset $themeOptions->advertising->showBox1}
<div id="advertising-box-1" class="advertising-box">
	<div class="wrapper">
		<div>{!$themeOptions->advertising->box1Content}</div>
	 </div>
</div>
{/ifset}

<!-- <div class="topbar"></div>-->
<header id="bf_branding">
	<div class="wrapper header-holder">
		<div id="logo" class="left">
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
		{menu 'theme_location' => 'primary-menu', 'fallback_cb' => 'default_page_menu', 'container' => 'nav', 'container_class' => 'menu-container right', 'menu_class' => 'menu' }
	</div>
	
	<div id="directory-search" class="regular-search"
	data-interactive="{ifset $themeOptions->search->enableInteractiveSearch}yes{else}no{/ifset}">
		<div class="wrapper">
			<form action="{$homeUrl}" id="dir-search-form" method="get" class="dir-searchform">
				<div class="first-row clearfix">
					<div class="basic-search-form clearfix">
						<div id="dir-search-inputs">
							<div id="dir-holder">
								<div class="dir-holder-wrap">
								<input type="text" name="s" id="dir-searchinput-text" placeholder="{__ '本地生意类型或名字'}" class="dir-searchinput"{ifset $s} value="{$s}"{/ifset}>
								<div class="reset-ajax"></div>

								</div>
							</div>

							<input type="text" id="dir-searchinput-location" placeholder="{__ '所在地区／邮政编码'}" {ifset $location} value="{$location->name}"{/ifset}>
							<input type="text" name="locations" id="dir-searchinput-location-id" value="0" style="display: none;">

						</div>

						<div id="dir-search-button">
							<input type="submit" value="{__ '现在寻找'}" class="dir-searchsubmit">
						</div>
					</div>
				</div>

				<div class="advanced-search">

				</div>

			</form>
		</div>
	</div>
	<div class="container color-line" style="width:100%;">
		<div class="row">
			<div class="color-1"></div>
			<div class="color-2"></div>
			<div class="color-3"></div>
			<div class="color-4"></div>
			<div class="color-5"></div>
			<div class="color-6"></div>
			<div class="color-7"></div>
			<div class="color-8"></div>
			<div class="color-9"></div>
			<div class="color-10"></div>
			<div class="color-11"></div>
			<div class="color-12"></div>
		</div>
	</div>
</header>
<div class="blackopacity"></div>