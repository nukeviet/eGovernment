            </div>
        </section>
        <nav class="footerNav2">
        </nav>
        <!-- Footer fixed -->
        <footer id="footer">
          	<div class="color-text-footer margin-footer-site">
            	[FOOTER_SITE]
            </div>
            <div class="footer2">
            	[FOOTER_SITE_2]
            </div>
        </footer>
        
    </div>
</div>
<!-- Help window -->
<div id="winHelp">
    <div class="winHelp">
        <div class="clearfix">
            <div class="padding"></div>
            <!-- Search form -->
			<div id="headerSearch" class="">
			<div class="headerSearch container-fluid margin-bottom">
			    <div class="input-group">
			        <input type="text" onkeypress="headerSearchKeypress(event);" class="form-control" maxlength="{NV_MAX_SEARCH_LENGTH}" placeholder="{LANG.search}...">
			        <span class="input-group-btn"><button type="button" onclick="headerSearchSubmit(this);" class="btn btn-info" data-url="{THEME_SEARCH_URL}" data-minlength="{NV_MIN_SEARCH_LENGTH}" data-click="y"><em class="fa fa-search fa-lg"></em></button></span>
			    </div>
			</div>
			</div>
			<div class="title-menu">
				<h2><em class="fa fa-bars fa-lg"></em>Danh mục</h2>
			</div>
			[MENU_SITE]
            <div class="padding margin-bottom-lg">
                <!-- BEGIN: theme_type -->
                <div class="theme-change margin-bottom-lg">
                    {LANG.theme_type_chose2}:
                    <!-- BEGIN: loop -->
                        <!-- BEGIN: other -->
                        <span><a href="{STHEME_TYPE}" rel="nofollow" title="{STHEME_INFO}">{STHEME_TITLE}</a></span>
                        <!-- END: other -->
                    <!-- END: loop -->
                </div>
                <!-- END: theme_type -->
            </div>
        </div>
    </div>
</div>
<!-- SiteModal Required!!! -->
<div id="sitemodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <em class="fa fa-spinner fa-spin">&nbsp;</em>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>