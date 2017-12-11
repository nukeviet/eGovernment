<!-- BEGIN: main -->
<script type="text/javascript">
    var url_change = '{URL_CHANGE}';
    var url_change_weight = '{URL_CHANGE_WEIGHT}';
    var url_back = '{URL_BACK}';
</script>

<div class="form-group">
    <a href="{URL_ADD}" class="btn btn-primary">{LANG.add}</a>
</div>

<table class="table table-striped table-bordered table-hover">
    <colgroup>
        <col class="w100" />
        <col span="2" />
        <col span="2" class="w150" />
    </colgroup>
    <thead>
        <tr>
            <th class="text-center">{LANG.organ_person_posi}</th>
            <th>{LANG.organ_name}</th>
            <th>{LANG.organ_persons}</th>
            <th>{LANG.organ_active}</th>
            <th class="text-center">{LANG.functions}</th>
        </tr>
    </thead>
    <!-- BEGIN: generate_page -->
    <tfoot>
        <tr class="text-center">
            <td colspan="5">{PAGES}</td>
        </tr>
    </tfoot>
    <!-- END: generate_page -->
    <!-- BEGIN: row -->
    <tr>
        <td class="text-center"> {ROW.select_weight} </td>
        <td><a href="{ROW.link_row}" title="{ROW.title}" class="add_icon">{ROW.title} </a><strong>({ROW.numsub})</strong></td>
        <td><a href="{ROW.link_per}" title="{LANG.oran_persons_list}" class="add_icon">{LANG.organ_persons_list} </a><strong>({ROW.number_per})</strong></td>
        <td class="text-center">
            <select class="form-control" name="active" id="{ROW.organid}" onchange="ChangeActive(this,url_change)">
                <option {CHECK_NO} value="0">{LANG.active_no}</option>
                <option {CHECK_YES} value="1">{LANG.active_yes}</option>
            </select>
        </td>
        <td class="text-center"><em class="fa fa-edit fa-lg">&nbsp;</em><a href="{ROW.link_edit}" title="">{LANG.edit}</a>&nbsp; - <em class="fa fa-trash-o">&nbsp;</em><a href="{ROW.link_del}" class="delete" title="">{LANG.del}</a></td>
    </tr>
    <!-- END: row -->
</table>

<script type="text/javascript">delete_one('delete', '{LANG.del_confirm}', url_back);</script>
<!-- END: main -->