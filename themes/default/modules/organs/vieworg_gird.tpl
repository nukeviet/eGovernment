<!-- BEGIN: main -->
<div class="panel panel-primary">
	<div class="panel-heading">
		{DATA.title}
	</div>
	<div class="panel-body">
		<ul style="padding: 0">
			<!-- BEGIN: address -->
			<li>
				<strong>{LANG.vieworg_address}:</strong> {DATA.address}
			</li>
			<!-- END: address -->
			<!-- BEGIN: phone -->
			<li>
				<strong>{LANG.vieworg_phone}:</strong> {DATA.phone}
			</li>
			<!-- END: phone -->
			<!-- BEGIN: fax -->
			<li>
				<strong>{LANG.vieworg_fax}:</strong> {DATA.fax}
			</li>
			<!-- END: fax -->
			<!-- BEGIN: website -->
			<li>
				<strong>{LANG.vieworg_website}:</strong> {DATA.website}
			</li>
			<!-- END: website -->
		</ul>
		<p class="text-center">
			{admin_link}
		</p>
	</div>
	<div class="panel-footer">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<!-- BEGIN: tab_about -->
			<li class="active">
				<a href="#about" role="tab" data-toggle="tab">{LANG.vieworg_about}</a>
			</li>
			<!-- END: tab_about -->
			<!-- BEGIN: tab_person -->
			<li>
				<a href="#vieworg_person" role="tab" data-toggle="tab">{LANG.vieworg_person}</a>
			</li>
			<!-- END: tab_person -->
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<!-- BEGIN: about -->
			<div class="tab-pane active" id="about">
				{DATA.description}
			</div>
			<!-- END: about -->
			<!-- BEGIN: person -->
			<div class="tab-pane" id="vieworg_person">
				<div class="row">
					<!-- BEGIN: loop -->
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<!-- BEGIN: img -->
							<a href="{ROW.link}" title="{ROW.name}"><img src="{ROW.photo}" height="100" alt="{ROW.name}"></a>
							<!-- END: img -->
							<div class="caption text-center">
								<h3><a href="{ROW.link}" title="{ROW.name}">{ROW.name}</a></h3>
								<p>
									{ROW.position}<br />
									{ROW.birthday}
								</p>
							</div>
						</div>
					</div>
					<!-- END: loop -->
				</div>
			</div>
			
			<!-- BEGIN: pages -->
			<div class="text-center">
				{html_pages}
			</div>
			<!-- END: pages -->
			
			<!-- END: person -->
		</div>
	</div>
</div>
<!-- END: main -->