<!-- BEGIN: main -->

<!-- BEGIN: photo -->
<div class="text-center">
	<a href="{DATA.imgsrc}" rel="shadowbox"><img src="{DATA.photo}" class="img-thumbnail" /></a><br /><br />
</div>
<!-- END: photo -->

<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
		<colgroup>
			<col width="200" />
		</colgroup>
		<tbody>
			<tr>
				<td>{LANG.vieworg_name}</td>
				<td>{DATA.name}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_position}</td>
				<td>{DATA.position}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_position_other}</td>
				<td>{DATA.position_other}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_ofogran}</td>
				<td>{DATA.ofogran}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_mobile_title}</td>
				<td>{DATA.mobile}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_birthday}</td>
				<td>{DATA.birthday}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_dayinto}</td>
				<td>{DATA.dayinto}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_email}</td>
				<td><a href="mailto:{ROW.email}" title="Mail to {DATA.email}">{DATA.email}</a></td>
			</tr>
			<tr>
				<td>{LANG.vieworg_phone}</td>
				<td>{DATA.phone}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_phone_ext}</td>
				<td>{DATA.phone_ext}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_marital_status}</td>
				<td>{DATA.marital_status}</td>
			</tr>
			<tr>
				<td>{LANG.viewper_address}</td>
				<td>{DATA.address}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_phone}</td>
				<td>{DATA.phone}</td>
			</tr>
			<tr>
				<td>{LANG.vieworg_professional}</td>
				<td>{DATA.professional}</td>
			</tr>
			<tr>
				<td colspan="2">{DATA.description}</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="text-center">{admin_link}</div><br />

<!-- END: main -->