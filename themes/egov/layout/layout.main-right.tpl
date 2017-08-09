<!-- BEGIN: main -->
{FILE "header_only.tpl"}
{FILE "header_extended.tpl"}
<!-- BEGIN: home -->
<div class="row bg-body-new">
	[HEADER]
</div>
<div class="row shadow-bg-1 bg-body-new">
	<div class="col-sm-16 col-md-18 fix-more-padding">
		[TOP]
	</div>
	<div class="col-sm-8 col-md-6 fix-more-padding">
		[RIGHT]
	</div>
</div>
<!-- END: home -->
<div class="row shadow-bg bg-body-new">
	<div class="col-sm-16 col-md-18 fix-more-padding">
        <div>[NEWS_1]</div>
		<div class="border-bottom-news">
			{MODULE_CONTENT}
			[BOTTOM]
		</div>
        <!-- BEGIN: home_bottom -->
		<div class="row">
			<div class="col-sm-12 col-md-12 padding-right-tintuc-thongtinkt">[NEWS_5]</div>
			<div class="col-sm-12 col-md-12 padding-left-tintuc-thongtinkt">[NEWS_6]</div>
		</div>
        <!-- END: home_bottom -->
	</div>
	<div class="col-sm-8 col-md-6 fix-more-padding">
		[RIGHT_1]
	</div>
</div>
<div class="row shadow-bg bg-body-new">
	[FOOTER]
</div>
<div class="row shadow-bg-2 bg-body-new">
	[FOOTER_2]
</div>
{FILE "footer_extended.tpl"}
{FILE "footer_only.tpl"}
<!-- END: main -->