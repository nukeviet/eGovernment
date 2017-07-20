    <noscript>
		<div class="alert alert-danger">{LANG.nojs}</div>
	</noscript>
    <div class="body-bg">
	<div class="sitemenu-bg">
        <div class="sitemenu-ct">
            <div class="sitemenu-ctl">&nbsp;</div>
            <div class="sitemenu-ctr">&nbsp;</div>
        </div>
    </div>
	<div class="wraper bg-shadow-body">
		<header>
			<div class="container">
				<div id="header" class="row">
				    <div class="logo col-xs-24 col-sm-24 col-md-16">
                        <!-- BEGIN: image -->
                        <a title="{SITE_NAME}" href="{THEME_SITE_HREF}"><img src="{LOGO_SRC}" width="{LOGO_WIDTH}" height="{LOGO_HEIGHT}" alt="{SITE_NAME}" /></a>
                        <!-- END: image -->
                        <!-- BEGIN: swf -->
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="{LOGO_WIDTH}" height="{LOGO_HEIGHT}" >
                   	        <param name="wmode" value="transparent" />
                           	<param name="movie" value="{LOGO_SRC}" />
                           	<param name="quality" value="high" />
                           	<param name="menu" value="false" />
                           	<param name="seamlesstabbing" value="false" />
                           	<param name="allowscriptaccess" value="samedomain" />
                           	<param name="loop" value="true" />
                           	<!--[if !IE]> <-->
                           	<object type="application/x-shockwave-flash" width="{LOGO_WIDTH}" height="{LOGO_HEIGHT}" data="{LOGO_SRC}" >
                                <param name="wmode" value="transparent" />
                                <param name="pluginurl" value="http://www.adobe.com/go/getflashplayer" />
                                <param name="loop" value="true" />
                                <param name="quality" value="high" />
                                <param name="menu" value="false" />
                                <param name="seamlesstabbing" value="false" />
                                <param name="allowscriptaccess" value="samedomain" />
                       	    </object>
                            <!--> <![endif]-->
                        </object>
                        <!-- END: swf -->
                        <!-- BEGIN: site_name_h1 -->
                        <h1>{SITE_NAME}</h1>
                        <h2>{SITE_DESCRIPTION}</h2>
                        <!-- END: site_name_h1 -->
                        <!-- BEGIN: site_name_span -->
                        <span class="site_name">{SITE_NAME}</span>
                        <span class="site_description">{SITE_DESCRIPTION}</span>
                        <!-- END: site_name_span -->
                        <div class="sitebannertext">
                            [TEXT_BANNER]
                        </div>
                    </div>
                    <div class="col-xs-24 col-sm-24 col-md-8">
                        [HEAD_RIGHT]
                    </div>
				</div>
			</div>
		</header>
		<nav class="second-nav" id="menusite">
			<div class="bg clearfix">
				<div class="menuctwrap">
                    [MENU_SITE]
                </div>
			</div>
		</nav>
		<nav class="header-nav">
			<div class="container">
				<div class="float-right">
					<div class="language">[LANGUAGE]</div>
					<div class="menutop-fix">[MENU_TOP]</div>
					<div class="rss-fix">[RSS]</div>
					<div class="user-fix">[USER]</div>
					<div id="tip" data-content="">
						<div class="bg"></div>
					</div>
				</div>
			</div>
		</nav>
		<section>
			<div class="container<!-- BEGIN: nothome --> dissmisshome<!-- END: nothome -->" id="body">
                <!-- BEGIN: breadcrumbs -->
                <nav class="third-nav">
    				<div class="row">
                        <div class="bg">
                        <div class="clearfix">
                            <div class="col-xs-24 col-sm-24 col-md-24">
                                <div class="breadcrumbs-wrap">
                                	<div class="display">
                                		<a class="show-subs-breadcrumbs hidden" href="#" onclick="showSubBreadcrumbs(this, event);"><em class="fa fa-lg fa-angle-right"></em></a>
		                                <div class="breadcrumbs-bg">
                                            <ul class="breadcrumbs list-none"></ul>
                                        </div>
									</div>
									<ul class="subs-breadcrumbs"></ul>
	                                <ul class="temp-breadcrumbs hidden">
	                                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{THEME_SITE_HREF}" itemprop="url" title="{LANG.Home}"><span itemprop="title">{LANG.Home}</span></a></li>
	                                    <!-- BEGIN: loop --><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{BREADCRUMBS.link}" itemprop="url" title="{BREADCRUMBS.title}"><span class="txt" itemprop="title">{BREADCRUMBS.title}</span></a></li><!-- END: loop -->
	                                </ul>
								</div>
                            </div>
                        </div>
                        </div>
                    </div>
                </nav>
                <!-- END: breadcrumbs -->
                [THEME_ERROR_INFO]
