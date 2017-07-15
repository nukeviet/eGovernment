<!-- BEGIN: main -->

<!-- BEGIN: textdisplay -->
<div class="titlebox">
    <h2>{TEXTDISPLAY}</h2>
</div>
<!-- END: textdisplay -->

<div class="block-law marquee" <!-- BEGIN: marquee_data -->data-direction='{DATA.direction}' data-duration='{DATA.duration}' data-pauseOnHover="{DATA.pauseOnHover}" data-duplicated="{DATA.duplicated}" style="height: 285px; overflow: hidden;"<!-- END: marquee_data --> >
	<!-- BEGIN: loop -->
	<div class="m-bottom item">
		<h3 class="law-code">
			<a href="{ROW.link}" title="{ROW.title}">{ROW.code}</a>
			<!-- BEGIN: newday -->
			<span class="icon_new"></span>
			<!-- END: newday -->
		</h3>
		<p class="law-title">{ROW.title}</p>
		<!-- BEGIN: code -->
		<em class="text-muted law-view">{LANG.view_hits}: {ROW.view_hits} | {LANG.download_hits}:{ROW.download_hits}</em>
		<!-- END: code -->
	</div>
	<!-- END: loop -->
</div>
<!-- BEGIN: marquee_js -->
<script type='text/javascript' src='{NV_BASE_SITEURL}themes/{TEMPLATE}/js/laws_jquery.marquee.js'></script>
<script type="text/javascript">
	$('.marquee').marquee();
</script>
<!-- END: marquee_js -->

<div class="clearfix text-right">
    <a href="{MODULE_LINK}" class="more">{MLANG.new_viewnext}&nbsp;<i class="fa fa-caret-right" aria-hidden="true"></i></a>
</div>

<!-- END: main -->