<!-- BEGIN: main -->
<ul class="block_tophits">
	<!-- BEGIN: newloop -->
	<li class="clearfix">
	<div class="row padding-bottom">
		<div class="col-md-8">
		<!-- BEGIN: imgblock -->
		<a title="{blocknews.title}" href="{blocknews.link}" {blocknews.target_blank}><img src="{blocknews.imgurl}" alt="{blocknews.title}" width="{blocknews.width}" class="img-thumbnail pull-left"/></a>
		<!-- END: imgblock -->
		</div>
		<div class="col-md-16">
		<a {TITLE} class="show" href="{blocknews.link}" {blocknews.target_blank} data-content="{blocknews.hometext_clean}" data-img="{blocknews.imgurl}" data-rel="block_news_tooltip">{blocknews.title}</a>
		</div>
	</div>
	</li>
	<!-- END: newloop -->
</ul>
<!-- BEGIN: tooltip -->
<script type="text/javascript">
$(document).ready(function() {$("[data-rel='block_news_tooltip'][data-content!='']").tooltip({
	placement: "{TOOLTIP_POSITION}",
	html: true,
	title: function(){return ( $(this).data('img') == '' ? '' : '<img class="img-thumbnail pull-left margin_image" src="' + $(this).data('img') + '" width="90" />' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<!-- END: tooltip -->
<!-- END: main -->