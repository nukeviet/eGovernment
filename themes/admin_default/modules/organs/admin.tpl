<!-- BEGIN: main -->
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="header">
            <!-- BEGIN: head_td -->
            <th><a href="{HEAD_TD.href}">{HEAD_TD.title}</a></th>
            <!-- END: head_td -->
            <td style="text-align: center"><strong>{LANG.admin_permissions}</strong></td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
        <!-- BEGIN: xusers -->
        <tr>
            <td>{CONTENT_TD.userid}</td>
            <td>{CONTENT_TD.username}</td>
            <td>{CONTENT_TD.full_name}</td>
            <td><a href="mailto:{CONTENT_TD.email}">{CONTENT_TD.email}</a></td>
            <td>{CONTENT_TD.admin_module_cat}</td>
            <td class="text-center">
                <!-- BEGIN: is_edit --><a href="{EDIT_URL}" class="btn btn-default btn-xs"><i class="fa fa-edit fa-fw"></i>{LANG.admin_edit}</a><!-- END: is_edit -->
            </td>
        </tr>
        <!-- END: xusers -->
    </tbody>
</table>
<!-- BEGIN: edit -->
<form method="post" enctype="multipart/form-data" action="{FORM_ACTION}">
    <table class="table table-striped table-bordered table-hover">
        <caption>{CAPTION_EDIT}</caption>
        <tr>
            <td>{LANG.admin_permissions}</td>
            <td>
                <!-- BEGIN: admin_module -->
                <label class="org-admin-module"><input name="admin_module" value="{ADMIN_MODULE.value}" type="radio"{ADMIN_MODULE.checked}> {ADMIN_MODULE.text}</label>
                <!-- END: admin_module -->
            </td>
        </tr>
        <tbody id="id_admin_module" style="{ADMINDISPLAY}">
            <tr>
                <td colspan="2">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">{LANG.organ_name}</th>
                                <th class="text-center">{LANG.admin_permissions_add}</th>
                                <th class="text-center">{LANG.admin_permissions_edit}</th>
                                <th class="text-center">{LANG.admin_permissions_status}</th>
                                <th class="text-center">{LANG.admin_permissions_del}</th>
                                <th class="text-center">{LANG.admin_permissions_admin}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- BEGIN: loopOrgan -->
                            <tr>
                                <td><div style="margin-left:{CONTENT.lev}px;">{CONTENT.title}</div></td>
                                <td class="text-center"><input data-toggle="cbtnone" data-id="{CONTENT.organid}" data-subs="{CONTENT.suborgan}" data-mode="add" type="checkbox" name="add_content[]" value="{CONTENT.organid}"{CONTENT.checked_add_content}{CONTENT.disabled_add}></td>
                                <td class="text-center"><input data-toggle="cbtnone" data-id="{CONTENT.organid}" data-subs="{CONTENT.suborgan}" data-mode="edit" type="checkbox" name="edit_content[]" value="{CONTENT.organid}"{CONTENT.checked_edit_content}{CONTENT.disabled_edit}></td>
                                <td class="text-center"><input data-toggle="cbtnone" data-id="{CONTENT.organid}" data-subs="{CONTENT.suborgan}" data-mode="status" type="checkbox" name="status_content[]" value="{CONTENT.organid}"{CONTENT.checked_status_content}{CONTENT.disabled_status}></td>
                                <td class="text-center"><input data-toggle="cbtnone" data-id="{CONTENT.organid}" data-subs="{CONTENT.suborgan}" data-mode="del" type="checkbox" name="del_content[]" value="{CONTENT.organid}"{CONTENT.checked_del_content}{CONTENT.disabled_del}></td>
                                <td class="text-center"><input data-toggle="cbtnall" data-id="{CONTENT.organid}" data-subs="{CONTENT.suborgan}" data-mode="admin" type="checkbox" name="admin_content[]" value="{CONTENT.organid}"{CONTENT.checked_admin}{CONTENT.disabled_admin}></td>
                            </tr>
                            <!-- END: loopOrgan -->
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="text-center"><input class="btn btn-primary" type="submit" value="{LANG.save}" name="submit"></td>
            </tr>
        </tfoot>
    </table>
</form>
<script type="text/javascript">
function controlCbtnOrgan(cbtn, c, d) {
    var subs = $(cbtn).data('subs');
    var mode = $(cbtn).data('mode');
    var toggle = $(cbtn).data('toggle');
    var checked = $(cbtn).is(':checked');
    var isControl = false;
    if (typeof c != "undefined") {
        isControl = true;
        if (c) {
            $(cbtn).prop('checked', true);
        } else {
            $(cbtn).prop('checked', false);
        }
    }
    if (typeof d != "undefined") {
        isControl = true;
        if (d) {
            $(cbtn).prop('disabled', true);
        } else {
            $(cbtn).prop('disabled', false);
        }
    }
    if (subs != '') {
        subs = subs.split(',');
        for (var i = 0, j = subs.length; i < j; i++) {
            var subI = $('[data-toggle="' + toggle + '"][data-id="' + subs[i] + '"][data-mode="' + mode + '"]');
            if (!isControl) {
                var ctrChecked = false;
                var ctrDisabled = false;
                if (checked) {
                    ctrChecked = true;
                    ctrDisabled = true;
                }
                controlCbtnOrgan(subI, ctrChecked, ctrDisabled);
            } else {
                controlCbtnOrgan(subI, c, d);
            }
        }
    }
}
$(document).ready(function() {
    var tp = $('input[name=admin_module]:checked').val();
    if (tp == 0) {
        $("#id_admin_module").show();
    } else {
        $("#id_admin_module").hide();
    }
    $("input[name=admin_module]").click(function() {
        var type = $(this).val();
        if (type == 0) {
            $("#id_admin_module").show();
        } else {
            $("#id_admin_module").hide();
        }
    });
    $('[data-toggle="cbtnone"]').change(function() {
        controlCbtnOrgan(this);
    });
    $('[data-toggle="cbtnall"]').change(function() {
        controlCbtnOrgan(this);
        var checked = $(this).is(':checked');
        controlCbtnOrgan($('[data-toggle="cbtnone"][data-id="' + $(this).data('id') + '"][data-mode="add"]'), checked, checked);
        controlCbtnOrgan($('[data-toggle="cbtnone"][data-id="' + $(this).data('id') + '"][data-mode="edit"]'), checked, checked);
        controlCbtnOrgan($('[data-toggle="cbtnone"][data-id="' + $(this).data('id') + '"][data-mode="status"]'), checked, checked);
        controlCbtnOrgan($('[data-toggle="cbtnone"][data-id="' + $(this).data('id') + '"][data-mode="del"]'), checked, checked);
    });
});
</script>
<!-- END: edit -->
<!-- END: main -->