<!-- BEGIN: main -->
<div id="edit">
	<!-- BEGIN: error -->
	<div class="alert alert-danger">{error}</div>
	<!-- END: error -->

	<form action="" method="post">
		<input type="hidden" name ="organid" value="{DATA.organid}" />
		<input type="hidden" name ="parentid_old" value="{DATA.parentid_old}" />
		<input name="save" type="hidden" value="1" />
		<table class="table table-striped table-bordered table-hover">
			<tbody>
				<tr>
					<td><strong>{LANG.organ_name}</strong> <span class="red">(*)</span></td>
					<td>
						<input class="form-control w400" name="title" type="text" value="{DATA.title}" maxlength="255" />
					</td>
				</tr>
				<tr>
					<td><strong>{LANG.organ_alias}</strong></td>
					<td>
						<input class="form-control w400" title="{LANG.alias}" type="text" name="alias" value="{DATA.alias}" style="display: inline" maxlength="255" id="id_alias" disabled="disabled"/>
						&nbsp;<i class="fa fa-refresh fa-lg icon-pointer" onclick="nv_get_alias('id_alias');">&nbsp;</i>
					</td>
				</tr>
				<tr>
					<td><strong>{LANG.organ_other_title}</strong></td>
					<td>
					<select class="form-control w200" name="parentid">
						<option value="0">{LANG.organ_nothing_title}</option>
						<!-- BEGIN: parent_loop -->
						<option value="{ROW.organid}" {ROW.select}>{ROW.title}</option>
						<!-- END: parent_loop -->
					</select></td>
				</tr>
				<tr class="form-inline">
					<td><strong>{LANG.organ_phone_title}: </strong></td>
					<td>
					<input class="form-control w200" name="phone" type="text" value="{DATA.phone}" maxlength="255" />
					<strong>{LANG.phone_ext_title} : </strong>
					<input class="form-control" style="width: 100px" name="phone_ext" type="text" value="{DATA.phone_ext}" maxlength="255" />
					</td>
				</tr>
				<tr>
					<td><strong>{LANG.organ_fax_title}: </strong></td>
					<td>
					<input class="form-control w400" name="fax" type="text" value="{DATA.fax}" maxlength="255" />
					</td>
				</tr>
				<tr>
					<td><strong>{LANG.organ_email_title}: </strong></td>
					<td>
					<input class="form-control w400" name="email" type="text" value="{DATA.email}" maxlength="255" />
					</td>
				</tr>
				<tr>
					<td><strong>{LANG.organ_website_title}: </strong></td>
					<td>
						<input class="form-control" style="width: 400px" name="website" type="text" value="{DATA.website}" maxlength="255" />
						<span class="help-block">eg : www.domain1.vn; www.domain2.vn</span> 
					</td>
				</tr>
				<tr>
					<td><strong>{LANG.organ_address_title} : </strong></td>
					<td>
					<input class="form-control" style="width: 400px" name="address" type="text" value="{DATA.address}" maxlength="255" />
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-striped table-bordered table-hover" style="margin:0; margin-top:2px">
			<tbody>
				<tr>
					<td><strong>{LANG.organ_description_title} </strong></td>
				</tr>
				<tr>
					<td>{NV_EDITOR}</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-striped table-bordered table-hover" style="margin-top:2px;">
			<tbody>
				<tr>
					<td><strong>{LANG.view_active_title}</strong></td>
					<td>
					<input type="checkbox" name="view" value="1" {DATA.view_check}>
					{LANG.view_active_title_note} </td>
				</tr>
			</tbody>
		</table>
		<center>
			<input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}"/>
		</center>
		<br>
	</form>
</div>

<script type="text/javascript">
//<![CDATA[
function nv_get_alias(id) {
	var title = strip_tags($("[name='title']").val());
	if (title != '') {
		$.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=addrow&nocache=' + new Date().getTime(), 'get_alias_title=' + encodeURIComponent(title), function(res) {
			$("#" + id).val(strip_tags(res));
		});
	}
	return false;
}
//]]>
</script>

<!-- BEGIN: auto_get_alias -->
<script type="text/javascript">
	$("[name='title']").change(function() {
		nv_get_alias('id_alias');
	}); 
</script>
<!-- END: auto_get_alias -->
<!-- END: main -->