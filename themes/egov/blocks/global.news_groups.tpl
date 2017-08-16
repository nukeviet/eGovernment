<!-- BEGIN: main -->

<!-- BEGIN: type1 -->
<ul class="news-groups-smimghome">
	<!-- BEGIN: loop -->
	<li class="clearfix">
		<!-- BEGIN: img -->
		<a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank} ><img src="{ROW.thumb}" alt="{ROW.title}" width="50" class="img-thumbnail pull-left"/></a>
		<!-- END: img -->
		<h3><a {TITLE} class="show" href="{ROW.link}" {ROW.target_blank} data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="catgtitlebox">{ROW.title_clean}</a></h3>
	</li>
	<!-- END: loop -->
</ul>
<!-- END: type1 -->

<!-- BEGIN: type0 -->
<div class="news-groups-bigimghome">
    <!-- BEGIN: loop -->
    <div class="ite clearfix">
        <!-- BEGIN: img -->
		<div class="img">
            <a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank} ><img src="{ROW.thumb}" alt="{ROW.title}" width="{ROW.blockwidth}"/></a>
        </div>
		<!-- END: img -->
		<h3><a {TITLE} class="show" href="{ROW.link}" {ROW.target_blank} data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="catgtitlebox">{ROW.title_clean}</a></h3>
        <a href="{ROW.link}" class="more pull-right">{LANG.new_viewnext}&nbsp;<i class="fa fa-caret-right" aria-hidden="true"></i></a>
    </div>
    <!-- END: loop -->
</div>
<!-- END: type0 -->

<!-- BEGIN: tooltip -->
<script type="text/javascript">
$(document).ready(function() {$("[data-rel='catgtitlebox'][data-content!='']").tooltip({
	placement: "{TOOLTIP_POSITION}",
	html: true,
	title: function(){return ( $(this).data('img') == '' ? '' : '<img class="img-thumbnail pull-left margin_image" src="' + $(this).data('img') + '" width="90" />' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<!-- END: tooltip -->

<!-- END: main -->