<!-- BEGIN: main -->
<div class="panel panel-primary">
	<div class="panel-heading">
		{LANG.infor_person}
	</div>
	<div class="panel-body">
		<div class="text-center">
			<!-- BEGIN: photo -->
			<a href="javascript:void(0)" id="photo" data-width="{DATA.imginfo.width}"><img src="{DATA.photo_thumb}" class="img-thumbnail" style="max-width: {WIDTH}px" /></a>
			<div class="modal fade" id="idmodals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">{DATA.name}</h4>
						</div>
						<div class="modal-body">
							<img src="{DATA.imgsrc}" alt="{DATA.name}" />
						</div>
					</div>
				</div>
			</div>
			<!-- END: photo -->
			<!-- BEGIN: no_photo -->
			<img src="{DATA.photo}" class="img-thumbnail" style="max-width: {WIDTH}px" />
			<!-- END: no_photo -->
			<br />
			<br />
		</div>
		
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
					<!-- BEGIN: position_other -->
					<tr>
						<td>{LANG.vieworg_position_other}</td>
						<td>{DATA.position_other}</td>
					</tr>
					<!-- END: position_other -->
					<tr>
						<td>{LANG.vieworg_ofogran}</td>
						<td><a href="{DATA.ofogran_url}" title="{DATA.ofogran}">{DATA.ofogran}</a></td>
					</tr>
					<tr>
						<td>{LANG.vieworg_birthday}</td>
						<td> {DATA.birthday} <!-- BEGIN: place_birth --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						{LANG.vieworg_place_birth}: {DATA.place_birth} <!-- END: place_birth --></td>
					</tr>
					<!-- BEGIN: dayparty -->
					<tr>
						<td>{LANG.vieworg_dayparty}</td>
						<td>{DATA.dayparty}</td>
					</tr>
					<!-- END: dayparty -->
		
					<!-- BEGIN: dayinto -->
					<tr>
						<td>{LANG.vieworg_dayinto}</td>
						<td>{DATA.dayinto}</td>
					</tr>
					<!-- END: dayinto -->
		
					<!-- BEGIN: email -->
					<tr>
						<td>{LANG.vieworg_email}</td>
						<td><a href="mailto:{DATA.email}" title="Mail to {DATA.email}">{DATA.email}</a></td>
					</tr>
					<!-- END: email -->
		
					<!-- BEGIN: phone -->
					<tr>
						<td>{LANG.vieworg_phone}</td>
						<td>{DATA.phone}</td>
					</tr>
					<!-- END: phone -->
		
					<!-- BEGIN: mobile -->
					<tr>
						<td>{LANG.vieworg_mobile}</td>
						<td>{DATA.mobile}</td>
					</tr>
					<!-- END: mobile -->
		
					<!-- BEGIN: phone_ext -->
					<tr>
						<td>{LANG.vieworg_phone_ext}</td>
						<td>{DATA.phone_ext}</td>
					</tr>
					<!-- END: phone_ext -->
		
					<!-- BEGIN: marital_status -->
					<tr>
						<td>{LANG.vieworg_marital_status}</td>
						<td>{DATA.marital_status}</td>
					</tr>
					<!-- END: marital_status -->
		
					<!-- BEGIN: address -->
					<tr>
						<td>{LANG.viewper_address}</td>
						<td>{DATA.address}</td>
					</tr>
					<!-- END: address -->
		
					<!-- BEGIN: professional -->
					<tr>
						<td>{LANG.vieworg_professional}</td>
						<td>{DATA.professional}</td>
					</tr>
					<!-- END: professional -->
		
					<!-- BEGIN: political -->
					<tr>
						<td>{LANG.vieworg_political}</td>
						<td>{DATA.political}</td>
					</tr>
					<!-- END: political -->
		
					<!-- BEGIN: description -->
					<tr>
						<td colspan="2">{DATA.description}</td>
					</tr>
					<!-- END: description -->
				</tbody>
			</table>
		</div>
		
		<div class="text-center">
			{admin_link}
		</div>
		<br />
	</div>
</div>
<!-- END: main -->