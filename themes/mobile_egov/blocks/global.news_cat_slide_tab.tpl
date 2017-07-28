<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/owl.carousel.min.js"></script>
<link media="screen" type="text/css" rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/owl.carousel.css" />
<link media="screen" type="text/css" rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/owl.theme.css" />
<link media="screen" type="text/css" rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/owl.transitions.css" />
<link media="screen" type="text/css" rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/owl.news.css" />

<div id="tabs">
    <div class="mtab">
        <ul>
            <!-- BEGIN: loopcat_tab -->
            <li><h2><a href="#tabs-{CATINFO.catid}"<!-- BEGIN: active --> class="active"<!-- END: active --> data-toggle="newtabslide">{CATINFO.title}</a></h2></li>
            <!-- END: loopcat_tab -->
        </ul>
    </div>
    <!-- BEGIN: loopcat -->
    <div id="tabs-{CATINFO.catid}">
        <ul class="clearfix">
            <!-- BEGIN: item -->
        	<li class="clearfix">
                <div class="row">
                    <!-- BEGIN: loop -->
                    <div class="ibg clearfix">
                		<!-- BEGIN: img -->
                        <div class="img pull-left">
                    		<a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank} ><img src="{ROW.thumb}" alt="{ROW.title}"/></a>
                            <div class="text-muted">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{ROW.publtime}
                            </div>
                        </div>
                		<!-- END: img -->
                        <div class="ct">
                    		<h3><a {TITLE} class="show" href="{ROW.link}" {ROW.target_blank} data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="cattitlebox">{ROW.title_clean}</a></h3>
                            <div class="htext">{ROW.hometext_clean}</div>
                            <a href="{ROW.link}" class="more">{LANG.new_viewdetail}</a>
                        </div>
                    </div>
            	   <!-- END: loop -->
                </div>
        	</li>
            <!-- END: item -->
        </ul>
    </div>
    <!-- END: loopcat -->
</div>

<script type="text/javascript">
$( function() {
    $( "#tabs" ).tabs();
} );
</script>

<!-- END: main -->