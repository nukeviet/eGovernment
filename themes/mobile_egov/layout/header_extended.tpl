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
            	<h1 class="">{SITE_NAME}</h1>
                <h2 class="">{SITE_DESCRIPTION}</h2>
            </div>
            <div class="logo">
                <!-- BEGIN: image -->
                <a title="{SITE_NAME} - {SITE_DESCRIPTION}" href="{THEME_SITE_HREF}"><img src="{LOGO_SRC}" width="{LOGO_WIDTH}" height="{LOGO_HEIGHT}" alt="{SITE_NAME}" /></a>
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
                
            </div>
		</div>
	</header>
    <div class="tip">
        <div id="tip" data-content=""></div>
    </div>
    <div class="wrap">
    	<section>
    		<div id="body">
                <!-- BEGIN: breadcrumbs -->
     		   <div class="breadcrumbs clearfix">
     		    	<div class="breadcrumbs-bg">
     		   			<span class="home-icon" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{THEME_SITE_HREF}" itemprop="url" title="{LANG.Home}"><span itemprop="title"><em class="fa fa-home fa-lg"></em></span></a></span>
    	    			<!--span class="load-bar"></span-->
    	    			<a class="toggle" onclick="showSubBreadcrumbs(this,event);"><em class="fa fa-angle-right"></em></a>
						<ol class="breadcrumb"></ol>
					</div>
    			</div>
	    		<ol class="sub-breadcrumbs"></ol>
	    		<ol class="temp-breadcrumbs hidden">
    	    		<!-- BEGIN: loop --><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{BREADCRUMBS.link}" itemprop="url" title="{BREADCRUMBS.title}"><span itemprop="title">{BREADCRUMBS.title}</span></a></li><!-- END: loop -->
				</ol>
    			<!-- END: breadcrumbs -->
    			[THEME_ERROR_INFO]