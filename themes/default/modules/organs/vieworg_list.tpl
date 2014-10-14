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

		<!-- BEGIN: about -->
		<p>
			{DATA.description}
		</p>
		<!-- END: about -->

		<p class="text-center">
			{admin_link}
		</p>

		<!-- BEGIN: person -->
		<hr />
		<!-- BEGIN: loop -->
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<colgroup>
					<col width="170" />
					<col />
					<col width="110" />
				</colgroup>
				<tbody>
					<tr>
						<td>{ROW.position}</td>
						<td><strong><a href="{ROW.link}" title="{ROW.name}" >{ROW.name}</a></strong></td>
						<td rowspan="5" style="text-align: center; vertical-align: middle"><!-- BEGIN: img --><a href="{ROW.link}" title="{ROW.name}"><img src="{ROW.photo}" class="img-thumbnail" style="max-width: {WIDTH}px" alt="{ROW.name}"></a><!-- END: img --></td>
					</tr>
					<tr>
						<td>{LANG.vieworg_professional}</td>
						<td>{ROW.professional}</td>
					</tr>
					<tr>
						<td>{LANG.vieworg_phone}</td>
						<td>{ROW.phone}</td>
					</tr>
					<tr>
						<td>{LANG.vieworg_email}</td>
						<td><a href="mailto:{ROW.email}">{ROW.email}</a></td>
					</tr>
					<tr>
						<td>{LANG.viewper_address}</td>
						<td>{ROW.address}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<hr />
		<!-- END: loop -->
		<!-- END: person -->
	</div>
</div>

<!-- BEGIN: pages -->
<div class="text-center">
	{html_pages}
</div>
<!-- END: pages -->

<!-- END: main -->

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
			<!-- BEGIN: loop -->
			<div class="row">
				<div class="col-xs-12 col-md-8">
					<ul style="padding: 0">
						<li>
							<strong><a href="javascript:void(0)" onclick="viewper('{ROW.personid}')" >{ROW.name}</a></strong>
						</li>
						<li>
							{LANG.vieworg_position}: {ROW.position}
						</li>
						<li>
							{LANG.vieworg_phone}: {ROW.phone}
						</li>
						<li>
							{LANG.vieworg_email}: <a href="mailto:{ROW.email}">{ROW.email}</a>
						</li>
						<li>
							{LANG.viewper_address}: {ROW.address}
						</li>
					</ul>
				</div>
				<div class="col-xs-12 col-md-4">
					<!-- BEGIN: img -->
					<a href="{ROW.link}" title="{ROW.name}"><img src="{ROW.photo}" alt="{ROW.name}"></a>
					<!-- END: img -->
				</div>
				<div class="col-xs-12">
					<div id="viewper_{ROW.personid}">
						&nbsp;
					</div>
				</div>
			</div>
			<hr />
			<!-- END: loop -->
		</div>

		<!-- BEGIN: pages -->
		<div class="text-center">
			{html_pages}
		</div>
		<!-- END: pages -->

		<!-- END: person -->
	</div>
</div>