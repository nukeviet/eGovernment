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
            <li><h2>
                    <a href="#tabs-{CATINFO.catid}"
                        <!-- BEGIN: active --> class="active"<!-- END: active --> data-toggle="newtabslide">{CATINFO.title}
                    </a>
                </h2></li>
            <!-- END: loopcat_tab -->
        </ul>
    </div>
    <!-- BEGIN: loopcat -->
    <div id="tabs-{CATINFO.catid}">
        <!-- BEGIN: item -->
        <div class="content_cat_slider_tab">
            <!-- BEGIN: loop -->
            <div class="clearfix">
                <h3>
                    <a {TITLE} href="{ROW.link}" {ROW.target_blank}>{ROW.title_clean}</a>
                </h3>
                <!-- BEGIN: img -->
                <a href="{ROW.link}" title="{ROW.title}"{ROW.target_blank} ><img src="{ROW.thumb}" alt="{ROW.title}" /></a>
                
                    <div class="text-muted">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{ROW.publtime}
                    </div>
                
                <!-- END: img -->
                <p class="htext">{ROW.hometext_clean}</p>
            </div>
            <!-- END: loop -->
            <!-- BEGIN: loop2 -->
            <div class="ibg clearfix">
                <h4>
                    <i class="fa fa-stop" aria-hidden="true"></i><a href="{ROW.link}" {ROW.target_blank}>{ROW.title_clean}</a>
                </h4>
            </div>
            <!-- END: loop2 -->
        </div>
        <!-- END: item -->
    </div>
    <!-- END: loopcat -->
</div>
<script type="text/javascript">
$( function() {
    $( "#tabs" ).tabs();
} );
</script>
<!-- END: main -->