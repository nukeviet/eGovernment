<!-- BEGIN: main -->
{FILE "header_only.tpl"}
{FILE "header_extended.tpl"}
<div class="row">
		[HEADER]
</div>
<div class="row">
	<div class="col-sm-16 col-md-18 fix-more-padding">
		[TOP]
	</div>
	<div class="col-sm-8 col-md-6 fix-more-padding">
		[RIGHT]
	</div>
</div>
<div class="row">
	<div class="col-sm-16 col-md-18 fix-more-padding">
		{MODULE_CONTENT}
		[BOTTOM]
		<div class="row">
			<div class="col-sm-12 col-md-12">[NEWS_1]</div>
			<div class="col-sm-12 col-md-12">[NEWS_2]</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12">[NEWS_3]</div>
			<div class="col-sm-12 col-md-12">[NEWS_4]</div>
		</div>
	</div>
	<div class="col-sm-8 col-md-6 fix-more-padding">
		[RIGHT_1]
	</div>
</div>
<div class="row">
		[FOOTER]
</div>
<div class="row">
		[FOOTER_2]
</div>
{FILE "footer_extended.tpl"}
{FILE "footer_only.tpl"}
<!-- END: main -->