<!-- BEGIN: main -->
<script type="text/javascript">
	var url_change = '{URL_CHANGE}';
	var url_change_weight = '{URL_CHANGE_WEIGHT}';
	var url_back = '{URL_BACK}';
</script>
  <table summary="" class="tab1">
      <thead>
        <tr>
          <td width="10px" align="center">{LANG.organ_person_posi}</td>
          <td><strong>{LANG.organ_name}</strong></td>
          <td><strong>{LANG.organ_persons}</strong></td>
          <td><strong>{LANG.organ_active}</strong></td>
          <td width="120px" align="center"><strong>{LANG.functions}</strong></td>
        </tr>
      </thead>
      <!-- BEGIN: row -->
      <tr {bg}>
        <td align="center">
        	{ROW.select_weight}
        </td>
        <td><a href="{ROW.link_row}" title="{ROW.title}" class="add_icon">{ROW.title} </a><strong>({ROW.numsub})</strong></td>
        <td><a href="{ROW.link_per}" title="{LANG.oran_persons_list}" class="add_icon">{LANG.organ_persons_list} </a><strong>({ROW.number_per})</strong></td>
        <td align="center" width="80">
        	<select name="active" id="{ROW.organid}" onchange="ChangeActive(this,url_change)">
            	<option {CHECK_NO} value="0">{LANG.active_no}</option>
                <option {CHECK_YES} value="1">{LANG.active_yes}</option>
            </select>
        </td>
        <td align="center">
          <span class="edit_icon"><a href="{ROW.link_edit}" title="">{LANG.edit}</a></span>&nbsp;
          <span class="delete_icon"><a href="{ROW.link_del}" class="delete" title="">{LANG.del}</a></span>
        </td>
      </tr>
      <!-- END: row -->
  </table>
  
  <table summary="" class="tab1">
      <thead>
        <tr>
          <td width="80">
				<a href="{URL_ADD}" class="add_icon">{LANG.add}</a>
          </td>
          <td>
				{PAGES}
          </td>
        </tr>
      </thead>
  </table>
<script type="text/javascript">
	delete_one('delete','{LANG.del_confirm}',url_back);
</script>
<!-- END: main -->