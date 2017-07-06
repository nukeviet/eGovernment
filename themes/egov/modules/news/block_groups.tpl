<!-- BEGIN: main -->
<ul class="block_groups fix-block-groups">
	<!-- BEGIN: loop -->
	<li class="clearfix">
		<div class="row">
		<div class="col-md-24  fix-img-block-groups">
		<!-- BEGIN: img -->
		<a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank} ><img src="{ROW.thumb}" alt="{ROW.title}" width="{ROW.blockwidth}" class="img-thumbnail pull-left"/></a>
		<!-- END: img -->
		</div>
		<div class="clearfix col-md-24 fix-text-block-groups">
		<a {TITLE} class="show" href="{ROW.link}" {ROW.target_blank} data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="block_tooltip">{ROW.title_clean}</a>
		<div class="more-news" style="float:right"><a>Xem tiếp <i class="fa fa-caret-right" aria-hidden="true"></i></a></div>
		</div>
		</div>
	</li>
	<!-- END: loop -->
</ul>
<!-- BEGIN: tooltip -->
<script type="text/javascript">
$(document).ready(function() {$("[data-rel='block_tooltip'][data-content!='']").tooltip({
	placement: "{TOOLTIP_POSITION}",
	html: true,
	title: function(){return ( $(this).data('img') == '' ? '' : '<img class="img-thumbnail pull-left margin_image" src="' + $(this).data('img') + '" width="90" />' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<!-- END: tooltip -->
<!-- END: main -->