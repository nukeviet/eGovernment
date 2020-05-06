<noscript>
    <div class="alert alert-danger">{LANG.nojs}</div>
</noscript>
<div id="mobilePage">
    <header class="first-child">
        <div id="header" class="clearfix">
            <div class="display-table fl">
                <div>
                    <div>
                        <span data-toggle="winHelp"><em class="fa fa-bars fa-lg pointer mbt"></em></span>
                    </div>
                </div>
                <div class="ftip">
                    <div id="ftip" data-content=""></div>
                </div>
            </div>
            <div class="site-name-gov">
                [TEXT_BANNER]
                <h1 class="hidden">{SITE_NAME}</h1>
                <h2 class="hidden">{SITE_DESCRIPTION}</h2>
            </div>
            <div class="logo">
                <a title="{SITE_NAME} - {SITE_DESCRIPTION}" href="{THEME_SITE_HREF}"><img src="{LOGO_SRC}" width="{LOGO_WIDTH}" height="{LOGO_HEIGHT}" alt="{SITE_NAME}" /></a>
            </div>
        </div>
    </header>
    <div class="tip">
        <div id="tip" data-content=""></div>
    </div>
    <div class="wrap">
        <section>
            <div id="body">
               <div class="row bottomheader">
                   <div class="col-xs-16">
                        <!-- BEGIN: breadcrumbs -->
                        <div class="breadcrumbs clearfix">
                             <div class="breadcrumbs-bg">
                                <span class="home-icon"><a href="{THEME_SITE_HREF}" title="{LANG.Home}"><span><em class="fa fa-home fa-lg"></em></span></a></span>
                                <!--span class="load-bar"></span-->
                                <a class="toggle" onclick="showSubBreadcrumbs(this,event);"><em class="fa fa-angle-right"></em></a>
                                <ol class="breadcrumb"></ol>
                            </div>
                        </div>
                        <ol class="sub-breadcrumbs"></ol>
                        <ol class="temp-breadcrumbs hidden" itemscope itemtype="https://schema.org/BreadcrumbList">
                            <!-- BEGIN: loop --><li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="{BREADCRUMBS.link}" itemprop="item" title="{BREADCRUMBS.title}"><span itemprop="name">{BREADCRUMBS.title}</span></a><i class="hidden" itemprop="position" content="{BREADCRUMBS.position}"></i></li><!-- END: loop -->
                        </ol>
                        <!-- END: breadcrumbs -->
                    </div>
                    <div class="col-xs-8">
                        <div class="headerSearchs">
                            <div class="input-group">
                                <input type="text" class="form-control" maxlength="{NV_MAX_SEARCH_LENGTH}" placeholder="{LANG.search}..."><span class="input-group-btn"><button type="button" class="btn btn-info" onclick="headerSearchSubmit(this);" data-url="{THEME_SEARCH_URL}" data-minlength="{NV_MIN_SEARCH_LENGTH}" data-click="y"><em class="fa fa-search fa-lg"></em></button></span>
                            </div>
                        </div>
                    </div>
                </div>
                [THEME_ERROR_INFO]
