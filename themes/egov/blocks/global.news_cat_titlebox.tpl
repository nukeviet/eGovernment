<!-- BEGIN: main -->

<!-- BEGIN: loopcat1 -->
<div class="titlebox">
    <h2><a href="{CATINFO.link}">{CATINFO.title}</a></h2>
</div>
<ul class="clearfix">
	<!-- BEGIN: loop -->
	<li class="clearfix">
		<!-- BEGIN: img -->
		<a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank} ><img src="{ROW.thumb}" alt="{ROW.title}" width="{ROW.blockwidth}" class="img-thumbnail pull-left"/></a>
		<!-- END: img -->
		<h3><a {TITLE} class="show" href="{ROW.link}" {ROW.target_blank} data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="cattitlebox">{ROW.title_clean}</a></h3>
	</li>
	<!-- END: loop -->
</ul>
<div class="clearfix text-right">
    <a href="{CATINFO.link}" class="more">{LANG.new_viewnext}&nbsp;<i class="fa fa-caret-right" aria-hidden="true"></i></a>
</div>
<!-- END: loopcat1 -->

<!-- BEGIN: loopcat0 -->
<div class="news-catbox-single clearfix">
    <h2>{CATINFO.title}</h2>
    <ul class="clearfix">
    	<!-- BEGIN: loop -->
    	<li class="clearfix">
    		<!-- BEGIN: img -->
    		<a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank} ><img src="{ROW.thumb}" alt="{ROW.title}" width="{ROW.blockwidth}" class="img-thumbnail pull-left"/></a>
    		<!-- END: img -->
    		<h3><a {TITLE} class="show" href="{ROW.link}" {ROW.target_blank} data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="cattitlebox">{ROW.title_clean}</a></h3>
            <div class="htext">{ROW.hometext_clean}</div>
            <a href="{ROW.link}" class="more pull-right">{LANG.new_viewnext}&nbsp;<i class="fa fa-caret-right" aria-hidden="true"></i></a>
    	</li>
    	<!-- END: loop -->
    </ul>
</div>
<!-- END: loopcat0 -->

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