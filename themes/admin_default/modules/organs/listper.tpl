<!-- BEGIN: main -->
<script type="text/javascript">
    var url_change = '{URL_CHANGE}';
    var url_change_weight = '{URL_CHANGE_WEIGHT}';
    var url_back = '{URL_BACK}';
</script>

<div class="well">
    <form action="{NV_BASE_ADMINURL}index.php" method="get">
        <input type="hidden" name="{NV_LANG_VARIABLE}"  value="{NV_LANG_DATA}" />
        <input type="hidden" name="{NV_NAME_VARIABLE}"  value="{MODULE_NAME}" />
        <input type="hidden" name="{NV_OP_VARIABLE}"  value="{OP}" />

        <div class="row">
            <div class="col-xs-24 col-md-6">
                <div class="form-group">
                    <input class="form-control" type="text" value="{SEARCH.q}" name="q" maxlength="255" placeholder="{LANG.search_keywords}" />
                </div>
            </div>
            <div class="col-xs-24 col-md-6">
                <div class="form-group">
                    <select class="form-control" name="organid">
                        <option value="0">---{LANG.organ_c}---</option>
                        <!-- BEGIN: organs -->
                        <option value="{ORGANS.organid}" {ORGANS.selected}>{ORGANS.space}{ORGANS.title}</option>
                        <!-- END: organs -->
                    </select>
                </div>
            </div>
            <div class="col-xs-24 col-md-4">
                <div class="form-group">
                    <select class="form-control" name="active">
                        <option value="-1">---{LANG.organ_active}---</option>
                        <!-- BEGIN: active -->
                        <option value="{ACTIVE.key}" {ACTIVE.selected}>{ACTIVE.value}</option>
                        <!-- END: active -->
                    </select>
                </div>
            </div>
            <div class="col-xs-24 col-md-4">
                <div class="form-group">
                    <select class="form-control" name="per_page">
                        <option value="20">---{LANG.per_page}---</option>
                        <!-- BEGIN: per_page -->
                        <option value="{PER_PAGE.key}" {PER_PAGE.selected}>{PER_PAGE.key}</option>
                        <!-- END: active -->
                    </select>
                </div>
            </div>
            <div class="col-xs-24 col-md-4">
                <div class="form-group">
                    <input type="submit" name="search" value="{LANG.search}" class="btn btn-primary" />
                </div>
            </div>
        </div>
    </form>
</div>

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
                <th class="text-center">{LANG.num}</th>
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
            <td> <a href="{ROW.link_view}" title="{ROW.name}">{ROW.name} </a></td>
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