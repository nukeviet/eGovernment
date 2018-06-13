<!-- BEGIN: main -->
<!-- BEGIN: viewdescription -->
<div class="news_column">
	<div class="alert alert-info clearfix">
		<h3>{CONTENT.title}</h3>
		<!-- BEGIN: image -->
		<img alt="{CONTENT.title}" src="{HOMEIMG1}" width="{IMGWIDTH1}" class="img-thumbnail pull-left imghome" />
		<!-- END: image -->
		<p class="text-justify">{CONTENT.description}</p>
	</div>
</div>
<!-- END: viewdescription -->

<!-- BEGIN: featuredloop -->
<div class="news_column">
    <div class="panel panel-default">
		<div class="panel-body featured">
			<!-- BEGIN: image -->
			<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}><img  alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="150px" class="img-thumbnail pull-left imghome" /></a>
			<!-- END: image -->
			<h2>
				<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}>{CONTENT.title}</a>
			</h2>
			<div class="text-muted">
				<ul class="list-unstyled list-inline">
					<li>
						<em class="fa fa-clock-o">&nbsp;</em> {CONTENT.publtime}
					</li>
					<li>
						<em class="fa fa-eye">&nbsp;</em> {LANG.view}: {CONTENT.hitstotal}
					</li>
					<!-- BEGIN: comment -->
					<li>
						<em class="fa fa-comment-o">&nbsp;</em> {LANG.total_comment}: {CONTENT.hitscm}
					</li>
					<!-- END: comment -->
				</ul>
			</div>
			<div class="text-justify">
				{CONTENT.hometext}
			</div>
			<!-- BEGIN: adminlink -->
			<p class="text-right">
				{ADMINLINK}
			</p>
			<!-- END: adminlink -->
		</div>
	</div>
</div>
<!-- END: featuredloop -->

<div class="row news_column news_grid">
    <!-- BEGIN: viewcatloop -->
    <div class="col-sm-12 col-md-8">
        <div class="thumbnail clearfix">
            <a title="{CONTENT.title}" href="{CONTENT.link}" {CONTENT.target_blank}><img alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="{IMGWIDTH1}" class="img-thumbnail"/></a>
            <div class="caption text-center">
                <h4><a class="show" href="{CONTENT.link}" {CONTENT.target_blank} <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext_clean}" data-img="" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">{CONTENT.title}</a></h4>
                <span>{ADMINLINK}</span>
            </div>
        </div>
    </div>
    <!-- END: viewcatloop -->
</div>

<!-- BEGIN: generate_page -->
<div class="text-center">
	{GENERATE_PAGE}
</div>
<!-- END: generate_page -->
<script type="text/javascript">
var catGridColTimer;
$.scrollbarWidth=function(){var a,b,c;if(c===undefined){a=$('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body');b=a.children();c=b.innerWidth()-b.height(99).innerWidth();a.remove()}return c};
function fixColumnHeight() {
	var winW = $(document).width() + $.scrollbarWidth();
	var numcols = 0;
	if (winW < 768) {
		// Mobile - 1 cột
		$('.news_grid .thumbnail').height('auto');
	} else if (winW < 992) {
		// Tablet - 2 cột
		numcols = 2;
	} else {
		// Desktop - 3 cột
		numcols = 3;
	}
	if (numcols > 0) {
		var lastKey = $('.news_grid .thumbnail').length - 1;
        $.each($('.news_grid .thumbnail'), function(k, v) {
            if (k % numcols == 0 || k == lastKey) {
                $($('.news_grid .thumbnail')[k]).height('auto');
                $($('.news_grid .thumbnail')[k+1]).height('auto');
                var height1 = $($('.news_grid .thumbnail')[k]).height();
                var height2 = $($('.news_grid .thumbnail')[k+1]).height();
                if (typeof height2 == "undefined") {
                	height2 = 0;
                }
                var height3;
                var height = (height1 > height2 ? height1 : height2);
                if (numcols > 2) {
                	$($('.news_grid .thumbnail')[k+2]).height('auto');
                	height3 = $($('.news_grid .thumbnail')[k+2]).height();
                    if (typeof height3 == "undefined") {
                    	height3 = 0;
                    }
                	height = (height > height3 ? height : height3);
                	$($('.news_grid .thumbnail')[k+2]).height(height);
                }
                $($('.news_grid .thumbnail')[k]).height(height);
                $($('.news_grid .thumbnail')[k+1]).height(height);
            }
        });
	}
}
$(window).on('load', function() {
    catGridColTimer = setTimeout(function(){
       fixColumnHeight();
    }, 100)
});
$(function(){
    $(window).resize(function(){
        clearTimeout(catGridColTimer);
        catGridColTimer = setTimeout(function(){
           fixColumnHeight();
        }, 100);
    });
});
</script>
<!-- END: main -->