            </div>
        </section>
        <nav class="footerNav2">
        </nav>
        <!-- Footer fixed -->
        <footer id="footer">
          	<div class="color-text-footer margin-footer-site">
            	[FOOTER_SITE]
            </div>
            <div class="footer2 clearfix">
            	[FOOTER_SITE_2]
                <p class="text-center">© Bản quyền thuộc về VINADES.,JSC.  Mã nguồn <a href="https://nukeviet.vn/">NukeViet CMS</a>.  Thiết kế bởi <a href="https://vinades.vn/">VINADES.,JSC</a>.   |  <a href="/siteterms/terms-and-conditions.html">Điều khoản sử dụng</a></p>
                <!-- BEGIN: theme_type -->
                <div class="theme-change margin-bottom-lg">
                    <!-- BEGIN: loop -->
                        <!-- BEGIN: other -->
                        <a href="{STHEME_TYPE}" rel="nofollow" title="{STHEME_INFO}"><em class="fa fa-{STHEME_ICON} fa-lg"></em></a>
                        <!-- END: other -->
                    <!-- END: loop -->
                </div>
                <!-- END: theme_type -->
                <div class="bttop">
                    <a class="pointer"><em class="fa fa-eject fa-lg"></em></a>
                </div>
            </div>
        </footer>
        
    </div>
</div>
<!-- Help window -->
<div id="winHelp">
    <div class="winHelp">
        <div class="clearfix">
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