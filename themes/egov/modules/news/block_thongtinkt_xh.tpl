<!-- BEGIN: main -->
<ul class="block_groups">
	<!-- BEGIN: loop -->
	<li class="clearfix">
	<div class="row">
		<!-- BEGIN: img -->
		<div class="col-md-10 fix-img-thongtinkt-xh">
			<a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank} ><img src="{ROW.thumb}" alt="{ROW.title}" width="{ROW.blockwidth}" class="img-thumbnail pull-left"/></a>
			<div class="more-news"><a href="{ROW.link}">{LANG.new_viewnext} <i class="fa fa-caret-right" aria-hidden="true"></i></a></div>
		</div>
		<!-- END: img -->
		<div class="col-md-14">
			<h3 class="margin-bottom"><a {TITLE} class="show" href="{ROW.link}" {ROW.target_blank} data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="tooltipktxh">{ROW.title_clean}</a></h3>
            <div>{ROW.hometext_clean}</div>
		</div>
	</div>
	</li>
	<!-- END: loop -->
</ul>
<!-- BEGIN: tooltip -->
<script type="text/javascript">
$(document).ready(function() {$("[data-rel='tooltipktxh'][data-content!='']").tooltip({
	placement: "{TOOLTIP_POSITION}",
	html: true,
	title: function(){return ( $(this).data('img') == '' ? '' : '<img class="img-thumbnail pull-left margin_image" src="' + $(this).data('img') + '" width="90" />' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<!-- END: tooltip -->
<!-- END: main -->