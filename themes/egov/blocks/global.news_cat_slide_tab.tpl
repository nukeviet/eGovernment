<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/jquery.jcarousel.min.js"></script>

<div class="newstab-slide">
    <div class="box-icon-title box-icon-titles" id="style-3">
        <ul class="mtab">
            <!-- BEGIN: loopcat_tab -->
            <li><h2><a href="#newstabhomejcarousel-{CATINFO.catid}"<!-- BEGIN: active --> class="active"<!-- END: active --> data-toggle="newtabslide">{CATINFO.title}</a></h2></li>
            <!-- END: loopcat_tab -->
        </ul>
    </div>
    <div class="newstabhomejcarousel-wraper">
        <!-- BEGIN: loopcat -->
        <div class="newstabhomejcarousel-ctn" id="newstabhomejcarousel-{CATINFO.catid}">
            <div class="newstabhomejcarousel-items">
                <ul class="mnav">
                    <li class="prev"><a href="#prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                    <li class="next"><a href="#next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                </ul>
                <div class="newstabhomejcarousel clearfix">
                    <ul class="clearfix">
                        <!-- BEGIN: item -->
                    	<li class="clearfix">
                            <div class="clearfix">
                                <div class="row">
                                    <!-- BEGIN: loop -->
                                    <div class="col-xs-24 col-sm-15 col-md-12">
                                        <div class="ibg clearfix">
                                           <div class="height-tabs">
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
                                                </div>
                                            </div>
                                            <div class="backgroup-viewdetail"><a href="{ROW.link}" class="more">{LANG.new_viewdetail}</a></div>
                                        </div>
                                    </div>
                            	   <!-- END: loop -->
                                </div>
                            </div>
                    	</li>
                        <!-- END: item -->
                    </ul>
                </div>
                <p class="jcarousel-pagination"></p>
            </div>
        </div>
        <!-- END: loopcat -->
    </div>
</div>

<script type="text/javascript">
$(function() {
    var timerset;
    $('.newstabhomejcarousel-items').each(function(k, v) {
        var jcarousel = $('.newstabhomejcarousel', $(this));
        var jcarouselcontrolnext = $('.mnav .next a', $(this));
        var jcarouselcontrolprev = $('.mnav .prev a', $(this));
        var jcarouselpagination = $('.jcarousel-pagination', $(this));

        jcarousel.jcarousel({
            wrap: 'circular',
        }).jcarouselAutoscroll({
            interval: 5000,
            target: '+=1',
            autostart: true
        });

        jcarouselcontrolprev
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        jcarouselcontrolnext
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselControl({
                target: '+=1'
            });

        jcarouselpagination
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
        setTimeout(function() {
            var maxH = 0;
            $('div.ct', jcarousel).each(function() {
                if (maxH < $(this).height()) {
                    maxH = $(this).height();
                }
            });
            $('div.ct', jcarousel).height(maxH);
        }, 100);
    });
    setTimeout(function() {
        $('.newstabhomejcarousel-ctn').hide();
        $('.newstabhomejcarousel-ctn:first').show();
        $('.newstabhomejcarousel-ctn').css({
            'position': 'relative'
        });
    }, 150);
});
</script>





<!-- BEGIN: tooltip -->
<script type="text/javascript">
$(document).ready(function() {$("[data-rel='cattitlebox'][data-content!='']").tooltip({
	placement: "{TOOLTIP_POSITION}",
	html: true,
	title: function(){return ( $(this).data('img') == '' ? '' : '<img class="img-thumbnail pull-left margin_image" src="' + $(this).data('img') + '" width="90" />' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<!-- END: tooltip -->

<!-- END: main -->