/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 1 - 31 - 2010 5 : 12
 */

function user_validForm(a) {
    $('[type="submit"] .fa', $(a)).toggleClass('hidden');
    $('[type="submit"]', $(a)).prop('disabled', true);
    $.ajax({
        type: $(a).prop("method"),
        cache: !1,
        url: $(a).prop("action"),
        data: $(a).serialize(),
        dataType: "json",
        success: function(b) {
            $('[type="submit"] .fa', $(a)).toggleClass('hidden');
            $('[type="submit"]', $(a)).prop('disabled', false);
            if( b.status == "error" ) {
                alert(b.mess);
                $("[name=\"" + b.input + "\"]", a).focus();
            } else {
                location_href = script_name + "?" + nv_name_variable + "=" + nv_module_name + "&" + nv_fc_variable;
                if( b.admin_add == "yes" ) {
                    if (confirm( b.mess )) {
                        location_href = script_name + "?" + nv_name_variable + "=authors&" + nv_fc_variable + '=add&userid=' + b.username;
                    }
                }
                window.location.href = location_href;
            }
        }
    });
    return false
}

function nv_chang_question(qid) {
    var nv_timer = nv_settimeout_disable('id_weight_' + qid, 5000);
    var new_vid = $('#id_weight_' + qid).val();
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=question&nocache=' + new Date().getTime(), 'changeweight=1&qid=' + qid + '&new_vid=' + new_vid, function(res) {
        if (res != 'OK') {
            alert(nv_is_change_act_confirm[2]);
        }
        clearTimeout(nv_timer);
        nv_show_list_question();
    });
    return;
}

function nv_save_title(qid) {
    var new_title = document.getElementById('title_' + qid);
    var hidden_title = document.getElementById('hidden_' + qid);

    if (new_title.value == hidden_title.value) {
        return;
    }

    if (new_title.value == '') {
        alert(nv_content);
        new_title.focus();
        return false;
    }

    var nv_timer = nv_settimeout_disable('title_' + qid, 5000);
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=question&nocache=' + new Date().getTime(), 'edit=1&qid=' + qid + '&title=' + new_title.value, function(res) {
        if (res != 'OK') {
            alert(nv_is_change_act_confirm[2]);
        }
        clearTimeout(nv_timer);
        nv_show_list_question();
    });
    return;
}

function nv_show_list_question() {
    if (document.getElementById('module_show_list')) {
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=question&nocache=' + new Date().getTime(), 'qlist=1', function(res) {
            $("#module_show_list").html(res);
        });
    }
    return;
}

function nv_del_question(qid) {
    if (confirm(nv_is_del_confirm[0])) {
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=question&nocache=' + new Date().getTime(), 'del=1&qid=' + qid, function(res) {
            if (res == 'OK') {
                nv_show_list_question();
            } else {
                alert(nv_is_del_confirm[2]);
            }
        });
    }
    return false;
}

function nv_add_question() {
    var new_title = document.getElementById('new_title');

    if (new_title.value == '') {
        alert(nv_content);
        new_title.focus();
        return false;
    }

    var nv_timer = nv_settimeout_disable('new_title', 5000);

    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=question&nocache=' + new Date().getTime(), 'add=1&title=' + new_title.value, function(res) {
        if (res == 'OK') {
            nv_show_list_question();
        } else {
            alert(nv_content);
        }
    });
    return;
}

function nv_row_del(vid) {
    if (confirm(nv_is_del_confirm[0])) {
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=del&nocache=' + new Date().getTime(), 'userid=' + vid, function(res) {
            if (res == 'OK') {
                window.location.href = window.location.href;
            } else {
                var r_split = res.split("_");
                if (r_split[0] == 'ERROR') {
                    alert(r_split[1]);
                } else {
                    alert(nv_is_del_confirm[2]);
                }
            }

        });
    }
    return false;
}

function nv_set_official(vid) {
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=setofficial&nocache=' + new Date().getTime(), 'userid=' + vid, function(res) {
        if (res == 'OK') {
            window.location.href = window.location.href;
        } else {
            alert(res);
        }

    });
    return false;
}

function nv_waiting_row_del(uid) {
    if (confirm(nv_is_del_confirm[0])) {
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=user_waiting&nocache=' + new Date().getTime(), 'del=1&userid=' + uid, function(res) {
            if (res == 'OK') {
                window.location.href = window.location.href;
            } else {
                alert(nv_is_del_confirm[2]);
            }
        });
    }
    return false;
}

function nv_chang_status(vid) {
    var nv_timer = nv_settimeout_disable('change_status_' + vid, 5000);
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=setactive&nocache=' + new Date().getTime(), 'userid=' + vid, function(res) {
        if (res != 'OK') {
            alert(nv_is_change_act_confirm[2]);
            window.location.href = window.location.href;
        }
    });
    return;
}

function nv_group_change_status(group_id) {
    var nv_timer = nv_settimeout_disable('select_' + group_id, 5000);
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=groups_act&nocache=' + new Date().getTime(), 'group_id=' + group_id, function(res) {
        var r_split = res.split("_");
        var sl = document.getElementById('select_' + r_split[1]);
        if (r_split[0] != 'OK') {
            alert(nv_is_change_act_confirm[2]);
            if (sl.checked == true)
                sl.checked = false;
            else
                sl.checked = true;
            clearTimeout(nv_timer);
            sl.disabled = true;
            return;
        }
    });
    return;
}

function nv_group_del(group_id) {
    if (confirm(nv_is_del_confirm[0])) {
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=groups_del&nocache=' + new Date().getTime(), 'group_id=' + group_id, function(res) {
            var r_split = res.split("_");
            if (r_split[0] == 'OK') {
                window.location.href = strHref;
            } else {
                alert(nv_is_del_confirm[2]);
            }
        });
    }
    return false;
}

function nv_group_search_users(my_url) {
    var search_query = document.getElementById('search_query');
    var search_option = $("#search_option").val();
    var is_search = document.getElementById('is_search');
    is_search.value = 1;
    nv_settimeout_disable('search_click', 5000);
    search_query = rawurlencode(search_query.value);
    my_url = rawurldecode(my_url);
    $('#search_users_result').load(my_url + '&search_query=' + search_query + '&search_option=' + search_option + '&nocache=' + new Date().getTime());
    return;
}

function nv_group_add_user(group_id, userid) {
    var user_checkbox = document.getElementById('user_' + userid);
    if (confirm(nv_is_add_user_confirm[0])) {
        user_checkbox.disabled = true;
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=groups_add_user&nocache=' + new Date().getTime(), 'group_id=' + group_id + '&userid=' + userid, function(res) {
            var res2 = res.split("_");
            if (res2[0] != 'OK') {
                var user_checkbox = document.getElementById('user_' + userid);
                user_checkbox.disabled = false;
                user_checkbox.checked = false;
                alert(nv_is_add_user_confirm[2]);
                return false;
            } else {
                var count_user = document.getElementById('count_users_' + res2[1]).innerHTML;
                count_user = intval(count_user) + 1;
                document.getElementById('count_users_' + res2[1]).innerHTML = count_user;

                var is_search = document.getElementById('is_search').value;
                if (is_search != 0) {
                    var url2 = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=groups_search_users&group_id=' + res2[1];
                    url2 = rawurlencode(url2);
                    nv_group_search_users(url2, 'search_users_result');
                }

                var url3 = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=groups_users&group_id=' + res2[1];
                url3 = rawurlencode(url3);
                nv_urldecode_ajax(url3, 'list_users');
            }
        });
    } else {
        user_checkbox.checked = false;
    }
    return;
}

function nv_group_exclude_user(group_id, userid) {
    var user_checkbox2 = document.getElementById('exclude_user_' + userid);
    if (confirm(nv_is_exclude_user_confirm[0])) {
        user_checkbox2.disabled = true;
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=groups_exclude_user&nocache=' + new Date().getTime(), 'group_id=' + group_id + '&userid=' + userid, function(res) {
            var res3 = res.split("_");
            if (res3[0] != 'OK') {
                var user_checkbox2 = document.getElementById('exclude_user_' + userid);
                user_checkbox2.disabled = false;
                user_checkbox2.checked = false;
                alert(nv_is_exclude_user_confirm[2]);
                return false;
            } else {
                var count_user = document.getElementById('count_users_' + res3[1]).innerHTML;
                count_user = intval(count_user) - 1;
                document.getElementById('count_users_' + res3[1]).innerHTML = count_user;

                var is_search = document.getElementById('is_search').value;
                if (is_search != 0) {
                    var url2 = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=groups_search_users&id=' + res3[1];
                    url2 = rawurlencode(url2);
                    nv_group_search_users(url2, 'search_users_result');
                }

                var url3 = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=groups_users&group_id=' + res3[1];
                url3 = rawurlencode(url3);
                nv_urldecode_ajax(url3, 'list_users');
            }
        });
    } else {
        user_checkbox2.checked = false;
    }

    return;
}

function nv_genpass() {
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=user_add&nocache=' + new Date().getTime(), 'nv_genpass=1', function(res) {
        $("input[name='password1']").val(res);
        $("input[name='password2']").val(res);
    });
    return;
}

function nv_check_form(OForm) {
    var f_method = $("#f_method").val();
    var f_value = $("#f_value").val();
    if (f_method != '' && f_value != '') {
        OForm.submit();
    }
    return false;
}

$.toggleShowPassword = function (options) {
    var settings = $.extend({
        field: "#password",
        control: "#toggle_show_password"
    }, options);

    var control = $(settings.control);
    var field = $(settings.field);

    control.bind('click', function () {
        if (control.is(':checked')) {
            field.attr('type', 'text');
        } else {
            field.attr('type', 'password');
        }
    });
};

function nv_data_export(set_export) {
    $.ajax({
        type : "POST",
        url : "index.php?" + nv_name_variable + "=" + nv_module_name + "&" + nv_fc_variable + "=export&nocache=" + new Date().getTime(),
        data : "step=1&set_export=" + set_export + "&method=" + $("select[name=method]").val() + "&value=" + $("input[name=value]").val() + "&usactive=" + $("select[name=usactive]").val(),
        success : function(response) {
            if (response == "OK_GETFILE") {
                nv_data_export(0);
            } else if (response == "OK_COMPLETE") {
                $("#users").hide();
                alert(export_complete);
                window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=export&step=2';
            } else {
                $("#users").hide();
                alert(response);
                window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name;
            }
        }
    });
}

// User field
var items = ''; // fields.tpl
function nv_choice_fields_additem(placeholder) {
    items++;
    var newitem = '<tr class="text-center">';
    newitem += '    <td>' + items + '</td>';
    newitem += '    <td><input class="form-control w200 validalphanumeric" type="text" value="" name="field_choice[' + items + ']" placeholder="' + placeholder + '"></td>';
    newitem += '    <td><input class="form-control w300" type="text" value="" name="field_choice_text[' + items + ']"></td>';
    newitem += '    <td><input type="radio" value="' + items + '" name="default_value_choice"></td>';
    newitem += '    </tr>';
    $('#choiceitems').append(newitem);
}

function nv_show_list_field() {
    $('#module_show_list').html('<center><img alt="" src="' + nv_base_siteurl + 'assets/images/load_bar.gif"></center>').load(script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=fields&qlist=1&nocache=' + new Date().getTime());
    return;
}

function nv_chang_field(fid) {
    var nv_timer = nv_settimeout_disable('id_weight_' + fid, 5000);
    var new_vid = $('#id_weight_' + fid).val();
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=fields&nocache=' + new Date().getTime(), 'changeweight=1&fid=' + fid + '&new_vid=' + new_vid, function(res) {
        if (res != 'OK') {
            alert(nv_is_change_act_confirm[2]);
        }
        clearTimeout(nv_timer);
        nv_show_list_field();
    });
    return;
}

function nv_del_field(fid) {
    if (confirm(nv_is_del_confirm[0])) {
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=fields&nocache=' + new Date().getTime(), 'del=1&fid=' + fid, function(res) {
            if (res == 'OK') {
                nv_show_list_field();
            } else {
                alert(nv_is_del_confirm[2]);
            }
        });
    }
    return false;
}

function nv_edit_field(fid) {
    window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=fields&fid=' + fid;
}

function nv_load_current_date() {
    if ($("input[name=current_date]:checked").val() == 1) {
        $("input[name=default_date]").attr('disabled', 'disabled');
        $("input[name=default_date]").datepicker("destroy");
    } else {
        $("input[name=default_date]").datepicker({
            showOn : "both",
            dateFormat : "dd/mm/yy",
            changeMonth : true,
            changeYear : true,
            showOtherMonths : true,
            buttonImage : nv_base_siteurl + "assets/images/calendar.gif",
            buttonImageOnly : true
        });
        $("input[name=default_date]").removeAttr("disabled");
        $("input[name=default_date]").focus();
    }
}

function nv_users_check_choicetypes(elemnet) {
    var choicetypes_val = $(elemnet).val();
    if (choicetypes_val == "field_choicetypes_text") {
        $("#choiceitems").show();
        $("#choicesql").hide();
    } else {
        $("#choiceitems").hide();
        $("#choicesql").show();
        nv_load_sqlchoice('module', '');
    }
}

function control_theme_groups() {
    var ingroup = $('[name="group[]"]:checked').length,
        gdefault = $('[name="group_default"]:checked').val(),
        groups = []

    $('[name="group[]"]').each(function(){
        if ($(this).is(':checked') && ingroup > 1) {
            $('.group_default', $(this).parent().parent()).show()

            if (typeof gdefault == 'undefined') {
                gdefault = $(this).val()
                $('[name="group_default"]', $(this).parent().parent()).prop('checked', true)
            }
        } else {
            $('.group_default', $(this).parent().parent()).hide()
        }
        if ($(this).is(':checked')) {
            groups.push($(this).val())
        }
    })

    if (typeof gdefault != 'undefined' && $.inArray(gdefault, groups) == -1 && ingroup > 1) {
        $('[name="group_default"]').prop('checked', false)
        $('[name="group_default"]', $('[name="group[]"]:checked:first').parent().parent()).prop('checked', true)
    }
}

function nv_del_oauthall(userid) {
    if (confirm(nv_is_del_confirm[0])) {
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=edit_oauth&nocache=' + new Date().getTime(), 'delall=1&userid=' + userid, function(res) {
            if (res == 'OK') {
                window.location.href = window.location.href;
            } else {
                alert(nv_is_del_confirm[2]);
            }
        });
    }
    return false;
}

function nv_del_oauthone(opid, userid) {
    if (confirm(nv_is_del_confirm[0])) {
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=edit_oauth&nocache=' + new Date().getTime(), 'del=1&userid=' + userid + '&opid=' + opid, function(res) {
            if (res == 'OK') {
                window.location.href = window.location.href;
            } else {
                alert(nv_is_del_confirm[2]);
            }
        });
    }
    return false;
}

function nv_main_action(btn) {
    var fa = $('#users [name="idcheck[]"]');
    var setactive = 0;
    var listid = '';
    if (fa.length) {
        fa.each(function() {
            if ($(this).is(':checked')) {
                listid = listid + $(this).val() + ',';
            }
        });
    }

    if (listid != '') {
        var action = $('#mainuseropt').val();
        if (action == 'del') {
            if (confirm(nv_is_del_confirm[0])) {
                $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=del&nocache=' + new Date().getTime(), 'userid=' + listid, function(res) {
                    if (res == 'OK') {
                        window.location.href = window.location.href;
                    } else {
                        var r_split = res.split("_");
                        if (r_split[0] == 'ERROR') {
                            alert(r_split[1]);
                        } else {
                            alert(nv_is_del_confirm[2]);
                        }
                        btn.prop('disabled', false);
                    }

                });
            } else {
                btn.prop('disabled', false);
            }
        } else {
            if (action == 'active') {
                setactive = 1;
            }
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=setactive&nocache=' + new Date().getTime(), 'userid=' + listid + '&setactive=' + setactive, function(res) {
                if (res != 'OK') {
                    alert(nv_is_change_act_confirm[2]);
                    btn.prop('disabled', false);
                } else {
                    window.location.href = window.location.href;
                }
            });
        }
    } else {
        alert(btn.data('msgnocheck'));
        btn.prop('disabled', false);
    }
}

$(document).ready(function() {
    // List user main
    $('#mainusersaction').click(function() {
        $(this).prop('disabled', true);
        nv_main_action($(this));
    });

    // Edit user
    $("#btn_upload").click(function() {
        nv_open_browse( nv_base_siteurl  + "index.php?" + nv_name_variable  + "=" + nv_module_name + "&" + nv_fc_variable  + "=avatar/opener", "NVImg", 650, 430, "resizable=no,scrollbars=1,toolbar=no,location=no,status=no");
        return false;
    });
    $('#current-photo-btn').click(function() {
        $('#current-photo').hide();
        $('#photo_delete').val('1');
        $('#change-photo').show();
    });
    $('#imageresource').click(function() {
        $('#current-photo-btn').click();
        $("#btn_upload").click();
    });

    if ($.fn.validate){
        $('#form_user').validate({
            rules : {
                username : {
                    minlength : 5
                }
            }
        });

    }
    if ($.fn.datepicker){
        $(".datepicker").datepicker({
            showOn : "both",
            dateFormat : "dd/mm/yy",
            changeMonth : true,
            changeYear : true,
            showOtherMonths : true,
            buttonImage : nv_base_siteurl + "assets/images/calendar.gif",
            buttonImageOnly : true,
            yearRange: "-90:+90"
        });
        $("#birthday").datepicker({
            showOn : "both",
            dateFormat : "dd/mm/yy",
            changeMonth : true,
            changeYear : true,
            showOtherMonths : true,
            buttonImage : nv_base_siteurl + "assets/images/calendar.gif",
            buttonImageOnly : true,
            yearRange: "-99:+0",
            beforeShow: function() {
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 999999999);
                }, 0);
            }
        });
    }

    $('[name="group[]"]').change(function(){
        control_theme_groups()
    })
    $('[name="is_official"]').change(function(){
        control_theme_groups()
    })

    // Export user
    $("input[name=data_export]").click(function() {
        $("input[name=data_export]").attr("disabled", "disabled");
        $('#users').html('<center>' + export_note + '<br /><br /><img src="' + nv_base_siteurl + 'assets/images/load_bar.gif" alt="" /></center>');
        nv_data_export(1);
    });

    // Get userid
    $("#resultdata").delegate("thead a,.generatePage a", "click", function(e) {
        e.preventDefault()
        $("#resultdata").load($(this).attr("href"))
    });
    if ($.fn.datepicker){
        $("#last_loginfrom,#last_loginto,#regdatefrom,#regdateto").datepicker({
            showOn : "both",
            dateFormat : "dd.mm.yy",
            changeMonth : true,
            changeYear : true,
            showOtherMonths : true,
            buttonText : '',
            showButtonPanel : true,
            showOn : 'focus'
        });
    }
    $("#formgetuid").submit(function() {
        var a = $(this).attr("action");
        b = $(this).serialize();
        a = a + "&" + b + "&submit";
        $("#formgetuid input, #formgetuid select").attr("disabled", "disabled");
        $.ajax({
            type : "GET",
            url : a,
            success : function(c) {
                $("#resultdata").html(c);
                $("#formgetuid input, #formgetuid select").removeAttr("disabled")
            }
        });
        return !1
    });

    // User field
    $("input[name=field_type]").click(function() {
        var field_type = $("input[name='field_type']:checked").val();
        $("#textfields").hide();
        $("#numberfields").hide();
        $("#datefields").hide();
        $("#choicetypes").hide();
        $("#choiceitems").hide();
        $("#choicesql").hide();
        $("#editorfields").hide();
        if (field_type == 'textbox' || field_type == 'textarea' || field_type == 'editor') {
            if (field_type == 'textbox') {
                $("#li_alphanumeric").show();
                $("#li_email").show();
                $("#li_url").show();
            } else {
                $("#li_alphanumeric").hide();
                $("#li_email").hide();
                $("#li_url").hide();
                if (field_type == 'editor') {
                    $("#editorfields").show();
                }
            }
            $("#textfields").show();
        } else if (field_type == 'number') {
            $("#numberfields").show();
        } else if (field_type == 'date') {
            $("#datefields").show();
        } else {
            $("#choicetypes").show();
            $("#textfields").hide();
            $("#numberfields").hide();
            $("#datefields").hide();
            nv_users_check_choicetypes("select[name=choicetypes]");
        }
    });
    $("input[name=required],input[name=show_register]").click(function() {
        if ($("input[name='required']:checked").val() == 1) {
            $("input[name=show_register]").prop("checked", true);
        }
    });
    $("input[name=match_type]").click(function() {
        $("input[name=match_regex]").attr('disabled', 'disabled');
        $("input[name=match_callback]").attr('disabled', 'disabled');
        var match_type = $("input[name='match_type']:checked").val();
        var max_length = $("input[name=max_length]").val();
        if (match_type == 'number') {
            if (max_length == 255) {
                $("input[name=max_length]").val(11);
            }
        } else if (max_length == 11) {
            $("input[name=max_length]").val(255);
        }
        if (match_type == 'regex') {
            $("input[name=match_regex]").removeAttr("disabled");
        } else if (match_type == 'callback') {
            $("input[name=match_callback]").removeAttr("disabled");
        }
    });

    $("input[name=current_date]").click(function() {
        nv_load_current_date();
    });
    $("select[name=choicetypes]").change(function() {
        nv_users_check_choicetypes(this);
    });

    // Group
     $("[name='browse-image']").click(function(e) {
        e.preventDefault()
        var area = $(this).data('area'),
            path = $(this).data('path'),
            currentpath = $(this).data('currentpath'),
            type = "image"

        nv_open_browse(script_name + "?" + nv_name_variable + "=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type + "&currentpath=" + currentpath, "NVImg", 850, 420, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
    });
});