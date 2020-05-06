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
                    <div class="banner">
                        <!-- BEGIN: site_banner_image -->
                        <img alt="{SITE_NAME}" src="{SITE_BANNER}" />
                        <!-- END: site_banner_image -->
                    </div>
                    <div class="logo col-xs-24 col-sm-4 col-md-3">
                        <a title="{SITE_NAME}" href="{THEME_SITE_HREF}"><img src="{LOGO_SRC}" width="{LOGO_WIDTH}" height="{LOGO_HEIGHT}" alt="{SITE_NAME}" /></a>
                        <!-- BEGIN: site_name_h1 -->
                        <h1>{SITE_NAME}</h1>
                        <h2>{SITE_DESCRIPTION}</h2>
                        <!-- END: site_name_h1 -->
                        <!-- BEGIN: site_name_span -->
                        <span class="site_name">{SITE_NAME}</span>
                        <span class="site_description">{SITE_DESCRIPTION}</span>
                        <!-- END: site_name_span -->
                    </div>
                    <div class="col-xs-24 col-sm-20 col-md-21">
                        <div class="sitebannertext">
                            [TEXT_BANNER]
                        </div>
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
                                        <ul class="temp-breadcrumbs hidden" itemscope itemtype="https://schema.org/BreadcrumbList">
                                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="{THEME_SITE_HREF}" itemprop="item" title="{LANG.Home}"><span itemprop="name">{LANG.Home}</span></a><i class="hidden" itemprop="position" content="1"></i></li>
                                            <!-- BEGIN: loop --><li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="{BREADCRUMBS.link}" itemprop="item" title="{BREADCRUMBS.title}"><span class="txt" itemprop="name">{BREADCRUMBS.title}</span></a><i class="hidden" itemprop="position" content="{BREADCRUMBS.position}"></i></li><!-- END: loop -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- END: breadcrumbs -->
                [THEME_ERROR_INFO]
