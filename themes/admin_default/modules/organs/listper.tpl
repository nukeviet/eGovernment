<!-- BEGIN: main -->
<script type="text/javascript">
	var url_change = '{URL_CHANGE}';
	var url_change_weight = '{URL_CHANGE_WEIGHT}';
	var url_back = '{URL_BACK}'; 
</script>

<form name="listper">
	<table class="table table-striped table-bordered table-hover">
		<colgroup>
			<col class="w50" />
			<col class="w100" />
			<col span="2" />
			<col span="2" class="w150" />
		</colgroup>
		<thead>
			<tr>
				<th class="text-center">
				<input name="check_all[]" type="checkbox" value="yes" onclick="nv_checkAll(this.form, 'idcheck[]', 'check_all[]',this.checked);" />
				</th>
				<th class="text-center">{LANG.organ_person_posi}</th>
				<th>{LANG.organ_person_name}</th>
				<th>{LANG.organ_address}</th>
				<th>{LANG.organ_active}</th>
				<th class="text-center">{LANG.functions}</th>
			</tr>
		</thead>
		<tfoot>
			<tr class="text-center">
				<td colspan="6">{PAGES}</td>
			</tr>
		</tfoot>
		<!-- BEGIN: row -->
		<tr>
			<td class="text-center">
				<input type="checkbox" onclick="nv_UncheckAll(this.form, 'idcheck[]', 'check_all[]', this.checked);" value="{ROW.personid}" name="idcheck[]" />
			</td>
			<td class="text-center"> {ROW.select_weight} </td>
			<td>{ROW.name}</td>
			<td>{ROW.address}</td>
			<td class="text-center" width="80">
			<select class="form-control" name="active" id="{ROW.personid}" onchange="ChangeActive(this,url_change)">
				<option {CHECK_NO} value="0">{LANG.active_no}</option>
				<option {CHECK_YES} value="1">{LANG.active_yes}</option>
			</select></td>
			<td class="text-center">
				<em class="fa fa-edit fa-lg">&nbsp;</em><a href="{ROW.link_edit}" title="">{LANG.edit}</a>&nbsp; - 
				<em class="fa fa-trash-o fa-lg">&nbsp;</em><a href="{ROW.link_del}" class="delete" title="">{LANG.del}</a>
			</td>
		</tr>
		<!-- END: row -->
	</table>
</form>

<div class="form-group">
	<a class="btn btn-danger deleteall" href="{URL_DELALL}">{LANG.delete_select}</a>
	<a href="{URL_ADD}" class="btn btn-primary">{LANG.add}</a>
</div>

<script type="text/javascript">
	delete_one('delete', '{LANG.del_confirm}', url_back);
	delete_all('idcheck[]', 'deleteall', '{LANG.del_confirm}', '{LANG.del_lang_error}', '{URL_DELALL}', url_back);
</script>
<!-- END: main -->