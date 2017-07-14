<!-- BEGIN: submenu -->
<ul class="dropdown-menu">
	<!-- BEGIN: loop -->
    <li <!-- BEGIN: submenu -->class="dropdown-submenu"<!-- END: submenu -->>
        <!-- BEGIN: icon -->
        <img src="{SUBMENU.icon}" />&nbsp;
        <!-- END: icon -->
        <a href="{SUBMENU.link}" title="{SUBMENU.note}" {SUBMENU.target}>{SUBMENU.title_trim}</a>
        <!-- BEGIN: item -->
        {SUB}
        <!-- END: item -->
    </li>
    <!-- END: loop -->
</ul>
<!-- END: submenu -->

<!-- BEGIN: main -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-site-default">
			<span class="sr-only">&nbsp;</span>
			<span class="icon-bar">&nbsp;</span>
			<span class="icon-bar">&nbsp;</span>
			<span class="icon-bar">&nbsp;</span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="menu-site-default">
        <ul class="nav navbar-nav">
			<li>
				<a class="home" title="{LANG.Home}" href="{THEME_SITE_HREF}"><em class="fa fa-lg fa-home">&nbsp;</em><span class="visible-xs-inline-block"> {LANG.Home}</span></a>
			</li>
			<!-- BEGIN: top_menu -->
            <li {TOP_MENU.current} rol="presentation">
                <!-- BEGIN: icon -->
                <img src="{TOP_MENU.icon}" />&nbsp;
                <!-- END: icon -->
                <a class="dropdown-toggle" {TOP_MENU.dropdown_data_toggle} href="{TOP_MENU.link}" role="button" aria-expanded="false" title="{TOP_MENU.note}" {TOP_MENU.target}>{TOP_MENU.title_trim}<!-- BEGIN: has_sub --> <strong class="caret">&nbsp;</strong><!-- END: has_sub --></a>
                <!-- BEGIN: sub -->
                {SUB}
                <!-- END: sub -->
			</li>
			<!-- END: top_menu -->
        </ul>
        <div class="pull-right">
            <a data-toggle="mycollapse" href="#toggleearch" id="toggleearchbtn"><i class="fa fa-search"></i></a>
        </div>
        <div class="collapse" id="toggleearch">
            <form method="get" action="{THEME_SEARCH_URL}" id="siteformsearch" data-minlen="{NV_MIN_SEARCH_LENGTH}" data-maxlen="{NV_MAX_SEARCH_LENGTH}">
                <!-- BEGIN: no_rewrite -->
                <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}"/>
                <input type="hidden" name="{NV_NAME_VARIABLE}" value="seek"/>
                <!-- END: no_rewrite -->
                <input type="text" class="form-control" name="q"/>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="conner-left">&nbsp;</div>
        <div class="conner-right">&nbsp;</div>
    </div>
</div>
<script type="text/javascript" data-show="after">
$(function(){
    checkWidthMenu();
    $(window).resize(checkWidthMenu);
});
</script>
<!-- END: main -->
