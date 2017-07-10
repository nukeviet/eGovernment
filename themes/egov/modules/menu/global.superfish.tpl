<!-- BEGIN: tree -->
<li>
	<a title="{MENUTREE.note}" href="{MENUTREE.link}" class="sf-with-ul"{MENUTREE.target}><strong>{MENUTREE.title}</strong></a>
	<!-- BEGIN: tree_content -->
	<ul>
		{TREE_CONTENT}
	</ul>
	<!-- END: tree_content -->
</li>
<!-- END: tree -->
<!-- BEGIN: main -->
<div class="style_nav">
	<ul id="sample-menu-4" class="sf-menu sf-navbar sf-js-enabled sf-shadow">
		<!-- BEGIN: loopcat1 -->
		<li {CAT1.class} class="col-md-6 fix-superfish-menu">
			<a title="{CAT1.note}" class="sf-with-ul fix-title-superfish-menu" href="{CAT1.link}"{CAT1.target}><strong>{CAT1.title}</strong></a>
			<!-- BEGIN: cat2 -->
			<ul class="fix-sub-superfish-menu">
				{HTML_CONTENT}
			</ul>
			<!-- END: cat2 -->
		</li>
		<!-- END: loopcat1 -->
	</ul>
</div>
<div class="clear"></div>
<!-- END: main -->
