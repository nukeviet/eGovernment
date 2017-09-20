<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:33:22 AM
 */

if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');

$page_title = $lang_module['main'];

$per_page = 20;
$page = $nv_Request->get_int('page', 'get', 0);
$parentid = $nv_Request->get_int('pid', 'get', 0);

$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&pid=' . $parentid;
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rows ORDER BY orders ASC ';
$result = $db->query($sql);
$array_organs = array();
while ($row = $result->fetch()) {
    $array_organs[$row['organid']] = $row;
}

if (!empty($array_organs[$parentid])) {
    $array_id = getall_organid_parent($array_organs, $parentid);
    $temp_title = '';
    foreach ($array_id as $id_i) {
        $link = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main&amp;pid=' . $id_i;
        $temp_title .= '<a href="' . $link . '">' . $array_organs[$id_i]['title'] . '</a>' . ' -> ';
    }
    $page_title = $lang_module['main'] . $lang_module['main_sub'] . $temp_title . $array_organs[$parentid]['title'];
}

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);

$sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rows WHERE parentid=' . intval($parentid) . ' ORDER BY weight ASC LIMIT ' . $page . ',' . $per_page;
$result = $db->query($sql);

$result_all = $db->query('SELECT FOUND_ROWS()');
$numf = $result_all->fetchColumn();
$all_page = ($numf) ? $numf : 1;

$i = $page + 1;
while ($row = $result->fetch()) {
    $ck_yes = '';
    $ck_no = '';
    
    if ($row['active'] == '1') {
        $ck_yes = 'selected="selected"';
        $ck_no = '';
    } else {
        $ck_yes = '';
        $ck_no = 'selected="selected"';
    }
    $row['num_no'] = $i;
    $xtpl->assign('CHECK_NO', $ck_no);
    $xtpl->assign('CHECK_YES', $ck_yes);
    $row['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=addrow&amp;id=' . $row['organid'];
    $row['link_del'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=delrow&amp;id=' . $row['organid'];
    $row['link_row'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;pid=' . $row['organid'];
    $row['link_per'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=listper&amp;pid=' . $row['organid'];
    $row['select_weight'] = drawselect_number($row['organid'], 1, $all_page + 1, $row['weight'], "nv_chang_organs('" . $row['organid'] . "',this,url_change_weight,url_back);");
    $row['number_per'] = getall_numper_of_parent($array_organs, $row['organid']);
    $xtpl->assign('ROW', $row);
    $xtpl->parse('main.row');
    $i++;
}
$xtpl->assign('URL_BACK', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&pid=' . $parentid);
$xtpl->assign('URL_DELALL', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=delrow');
$xtpl->assign('URL_CHANGE', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=actrow');
$xtpl->assign('URL_CHANGE_WEIGHT', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=changeorgan');
$xtpl->assign('URL_ADD', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=addrow' . '&amp;pid=' . $parentid);

$xtpl->assign('PAGES', nv_generate_page($base_url, $all_page, $per_page, $page));
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';