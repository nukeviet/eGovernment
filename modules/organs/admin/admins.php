<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 27-11-2010 14:43
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$page_title = $lang_module['admins'];
$module_admin = explode(',', $module_info['admins']);

// Xoa cac dieu hanh vien khong co quyen tai module
$is_refresh = false;
foreach ($array_organs_admin as $userid_i => $value) {
    if (!in_array($userid_i, $module_admin)) {
        $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_admins WHERE userid = ' . $userid_i);
        $is_refresh = true;
    }
}
// Nếu có thay đổi dữ liệu trong bảng thì load lại
if ($is_refresh) {
    $array_organs_admin = nv_organs_array_admins($module_data);
}

// Không có tài khoản quản lý module thì tạm dừng ở đây
if (empty($array_organs_admin)) {
    $contents = nv_theme_alert($lang_module['admin_no_user_title'], $lang_module['admin_no_user_content']);
    include NV_ROOTDIR . '/includes/header.php';
    echo nv_admin_theme($contents);
    include NV_ROOTDIR . '/includes/footer.php';
}

$orders = array(
    'userid',
    'username',
    'full_name',
    'email'
);

$orderby = $nv_Request->get_string('sortby', 'get', 'userid');
$ordertype = $nv_Request->get_string('sorttype', 'get', 'DESC');
if ($ordertype != 'ASC') {
    $ordertype = 'DESC';
}

$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
$userid = $nv_Request->get_int('userid', 'get', 0);
$array_permissions_mod = array(
    $lang_module['admin_organid'],
    $lang_module['admin_module'],
    $lang_module['admin_full_module']
);

// Lưu thông tin thiết lập quyền quản lý
if ($nv_Request->isset_request('submit', 'post') and $userid > 0) {
    $admin_module = $nv_Request->get_int('admin_module', 'post', 0);
    if ($admin_module == 1 or $admin_module == 2) {
        if (!defined('NV_IS_SPADMIN')) {
            $admin_module = 1;
        }
        $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_admins WHERE userid = ' . $userid);
        $db->query("INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . "_admins (
            userid, organid, admin, add_content, edit_content, status_content, del_content
        ) VALUES (
            '" . $userid . "', '0', '" . $admin_module . "', '1', '1', '1', '1'
        )");
    } else {
        $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_admins WHERE userid = ' . $userid);
        $array_admin = $nv_Request->get_typed_array('admin_content', 'post', 'int', array());
        $array_add_content = $nv_Request->get_typed_array('add_content', 'post', 'int', array());
        $array_edit_content = $nv_Request->get_typed_array('edit_content', 'post', 'int', array());
        $array_status_content = $nv_Request->get_typed_array('status_content', 'post', 'int', array());
        $array_del_content = $nv_Request->get_typed_array('del_content', 'post', 'int', array());

        // Lấy các cơ quan, tổ chức đa cấp
        $sql = 'SELECT organid, parentid, title, lev, suborgan FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rows ORDER BY orders ASC';
        $result = $db->query($sql);
        $array_organs = array();

        $array_parent_add = $array_parent_edit = $array_parent_status = $array_parent_del = $array_parent_admin = array();

        while ($row = $result->fetch()) {
            $admin_i = (in_array($row['organid'], $array_admin)) ? 1 : (!empty($array_parent_admin[$row['parentid']]) ? 1 : 0);
            if ($admin_i) {
                $add_content_i = $edit_content_i = $status_content_i = $del_content_i = 1;
            } else {
                $add_content_i = (in_array($row['organid'], $array_add_content)) ? 1 : (!empty($array_parent_add[$row['parentid']]) ? 1 : 0);
                $edit_content_i = (in_array($row['organid'], $array_edit_content)) ? 1 : (!empty($array_parent_edit[$row['parentid']]) ? 1 : 0);
                $status_content_i = (in_array($row['organid'], $array_status_content)) ? 1 : (!empty($array_parent_status[$row['parentid']]) ? 1 : 0);
                $del_content_i = (in_array($row['organid'], $array_del_content)) ? 1 : (!empty($array_parent_del[$row['parentid']]) ? 1 : 0);
                if (sizeof(array_filter(array($add_content_i, $edit_content_i, $status_content_i, $del_content_i))) == 4) {
                    $admin_i = 1;
                }
            }

            $array_parent_add[$row['organid']] = $add_content_i;
            $array_parent_edit[$row['organid']] = $edit_content_i;
            $array_parent_status[$row['organid']] = $status_content_i;
            $array_parent_del[$row['organid']] = $del_content_i;
            $array_parent_admin[$row['organid']] = $admin_i;

            $db->query("INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . "_admins (
                userid, organid, admin, add_content, edit_content, status_content, del_content
            ) VALUES (
                '" . $userid . "', '" . $row['organid'] . "', '" . $admin_i . "', '" . $add_content_i . "', '" . $edit_content_i . "', '" . $status_content_i . "', '" . $del_content_i . "'
            )");
        }
    }

    $base_url = str_replace('&amp;', '&', $base_url) . '&userid=' . $userid;
    nv_redirect_location($base_url);
}

$sql = 'SELECT * FROM ' . NV_USERS_GLOBALTABLE . ' WHERE userid IN (' . implode(',', array_keys($array_organs_admin)) . ')';
if (!empty($orderby) and in_array($orderby, $orders)) {
    $orderby_sql = $orderby != 'full_name' ? $orderby : ($global_config['name_show'] == 0 ? "concat(first_name,' ',last_name)" : "concat(last_name,' ',first_name)");
    $sql .= ' ORDER BY ' . $orderby_sql . ' ' . $ordertype;
    $base_url .= '&amp;sortby=' . $orderby . '&amp;sorttype=' . $ordertype;
}
$result = $db->query($sql);

$users_list = array();
while ($row = $result->fetch()) {
    $userid_i = (int) $row['userid'];
    $admin_module = (isset($array_organs_admin[$userid_i][0])) ? intval($array_organs_admin[$userid_i][0]['admin']) : 0;
    $admin_module_cat = $array_permissions_mod[$admin_module];
    $is_edit = true;
    if ($admin_module == 2 and !defined('NV_IS_SPADMIN')) {
        $is_edit = false;
    }

    $users_list[$row['userid']] = array(
        'userid' => $userid_i,
        'username' => (string) $row['username'],
        'full_name' => nv_show_name_user($row['first_name'], $row['last_name'], $row['username']),
        'email' => (string) $row['email'],
        'admin_module_cat' => $admin_module_cat,
        'is_edit' => $is_edit
    );
}

$head_tds = array();
$head_tds['userid']['title'] = $lang_module['admin_userid'];
$head_tds['userid']['href'] = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;sortby=userid&amp;sorttype=ASC';
$head_tds['username']['title'] = $lang_module['admin_username'];
$head_tds['username']['href'] = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;sortby=username&amp;sorttype=ASC';
$head_tds['full_name']['title'] = $global_config['name_show'] == 0 ? $lang_module['admin_lastname_firstname'] : $lang_module['firstname_lastname'];
$head_tds['full_name']['href'] = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;sortby=full_name&amp;sorttype=ASC';
$head_tds['email']['title'] = $lang_module['admin_email'];
$head_tds['email']['href'] = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;sortby=email&amp;sorttype=ASC';

foreach ($orders as $order) {
    if ($orderby == $order and $ordertype == 'ASC') {
        $head_tds[$order]['href'] = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;sortby=' . $order . '&amp;sorttype=DESC';
        $head_tds[$order]['title'] .= ' &darr;';
    } elseif ($orderby == $order and $ordertype == 'DESC') {
        $head_tds[$order]['href'] = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;sortby=' . $order . '&amp;sorttype=ASC';
        $head_tds[$order]['title'] .= ' &uarr;';
    }
}

$xtpl = new XTemplate('admin.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
foreach ($head_tds as $head_td) {
    $xtpl->assign('HEAD_TD', $head_td);
    $xtpl->parse('main.head_td');
}

foreach ($users_list as $u) {
    $xtpl->assign('CONTENT_TD', $u);
    if ($u['is_edit']) {
        $xtpl->assign('EDIT_URL', $base_url . '&amp;userid=' . $u['userid']);
        $xtpl->parse('main.xusers.is_edit');
    }
    $xtpl->parse('main.xusers');
}

if ($userid > 0 and $userid != $admin_info['userid']) {
    $admin_module = (isset($array_organs_admin[$userid][0])) ? intval($array_organs_admin[$userid][0]['admin']) : 0;
    $is_edit = true;
    if ($admin_module == 2 and !defined('NV_IS_SPADMIN')) {
        $is_edit = false;
    }

    if ($is_edit) {
        if (!defined('NV_IS_SPADMIN')) {
            unset($array_permissions_mod[2]);
        }

        foreach ($array_permissions_mod as $value => $text) {
            $u = array(
                'value' => $value,
                'text' => $text,
                'checked' => ($value == $admin_module) ? ' checked="checked"' : ''
            );
            $xtpl->assign('ADMIN_MODULE', $u);
            $xtpl->parse('main.edit.admin_module');
        }

        $xtpl->assign('ADMINDISPLAY', ($admin_module > 0) ? 'display:none;' : '');

        $sql = 'SELECT organid, parentid, title, lev, suborgan FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rows ORDER BY orders ASC';
        $result = $db->query($sql);

        $array_parent_add = $array_parent_edit = $array_parent_status = $array_parent_del = $array_parent_admin = array();

        while ($row = $result->fetch()) {
            $u = array();
            $u['organid'] = $row['organid'];
            $u['title'] = $row['title'];
            $u['lev'] = $row['lev'] * 20;
            $u['suborgan'] = $row['suborgan'];

            $u['checked_admin'] = (isset($array_organs_admin[$userid][$row['organid']]) and $array_organs_admin[$userid][$row['organid']]['admin'] == 1) ? ' checked="checked"' : '';
            $u['checked_add_content'] = (isset($array_organs_admin[$userid][$row['organid']]) and $array_organs_admin[$userid][$row['organid']]['add_content'] == 1) ? ' checked="checked"' : '';
            $u['checked_edit_content'] = (isset($array_organs_admin[$userid][$row['organid']]) and $array_organs_admin[$userid][$row['organid']]['edit_content'] == 1) ? ' checked="checked"' : '';
            $u['checked_status_content'] = (isset($array_organs_admin[$userid][$row['organid']]) and $array_organs_admin[$userid][$row['organid']]['status_content'] == 1) ? ' checked="checked"' : '';
            $u['checked_del_content'] = (isset($array_organs_admin[$userid][$row['organid']]) and $array_organs_admin[$userid][$row['organid']]['del_content'] == 1) ? ' checked="checked"' : '';

            $u['disabled_add'] = (!empty($array_parent_add[$row['parentid']]) or !empty($u['checked_admin'])) ? ' disabled="disabled"' : '';
            $u['disabled_edit'] = (!empty($array_parent_edit[$row['parentid']]) or !empty($u['checked_admin'])) ? ' disabled="disabled"' : '';
            $u['disabled_status'] = (!empty($array_parent_status[$row['parentid']]) or !empty($u['checked_admin'])) ? ' disabled="disabled"' : '';
            $u['disabled_del'] = (!empty($array_parent_del[$row['parentid']]) or !empty($u['checked_admin'])) ? ' disabled="disabled"' : '';
            $u['disabled_admin'] = !empty($array_parent_admin[$row['parentid']]) ? ' disabled="disabled"' : '';

            $array_parent_add[$row['organid']] = (empty($u['checked_add_content']) ? 0 : 1);
            $array_parent_edit[$row['organid']] = (empty($u['checked_edit_content']) ? 0 : 1);
            $array_parent_status[$row['organid']] = (empty($u['checked_status_content']) ? 0 : 1);
            $array_parent_del[$row['organid']] = (empty($u['checked_del_content']) ? 0 : 1);
            $array_parent_admin[$row['organid']] = (empty($u['checked_admin']) ? 0 : 1);

            $xtpl->assign('CONTENT', $u);
            $xtpl->parse('main.edit.loopOrgan');
        }
        $xtpl->assign('CAPTION_EDIT', $lang_module['admin_edit_user'] . ': ' . $users_list[$userid]['username']);
        $xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;userid=' . $userid);
        $xtpl->parse('main.edit');
    }
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
