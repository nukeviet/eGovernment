<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:32:04 AM
 */

if (!defined('NV_IS_MOD_ORGAN'))
    die('Stop!!!');

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

$per_page = $arr_config['per_page'];
$page = 1;

$oid = $nv_Request->get_int('oid', 'get', 0);
$q = $nv_Request->get_title('q', 'get', '');
$e = $nv_Request->get_title('e', 'get', '');
$p = $nv_Request->get_title('p', 'get', '');

$sql_search = array();
$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;

if (!empty($q)) {
    $sql_search[] = 'name LIKE \'%' . $db->dblikeescape($q) . '%\'';
    $base_url .= '&amp;q=' . urlencode($q);
}
if (!empty($e)) {
    $sql_search[] = 'email LIKE \'%' . $db->dblikeescape($e) . '%\'';
    $base_url .= '&amp;e=' . urlencode($e);
}
if (!empty($p)) {
    $sql_search[] = '(mobile LIKE \'%' . $db->dblikeescape($p) . '%\' OR phone LIKE \'%' . $db->dblikeescape($p) . '%\')';
    $base_url .= '&amp;q=' . urlencode($p);
}
if (!empty($oid)) {
    $sql_search[] = 'organid = ' . intval($oid);
    $base_url .= '&amp;oid=' . intval($oid);
}

if (!empty($sql_search)) {
    $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_person WHERE ' . implode(' AND ', $sql_search) . ' ORDER BY weight LIMIT ' . (($page - 1) * $per_page) . ',' . $per_page;
    $result = $db->query($sql);
    $result_all = $db->query('SELECT FOUND_ROWS()');
    $numf = $result_all->fetchColumn();
    $all_page = ($numf) ? $numf : 1;
    $person_data = array();
    while ($row = $result->fetch()) {
        if (!empty($row['photo']) and file_exists(NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/' . $row['photo'])) {
            $row['photo'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $row['photo'];
        } elseif (!empty($row['photo']) and file_exists(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['photo'])) {
            $row['photo'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['photo'];
        } else {
            $row['photo'] = NV_BASE_SITEURL . 'themes/' . $module_info['template'] . '/images/' . $module_info['module_theme'] . '/no-avatar.jpg';
        }
    
        $row['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=person/' . $global_organ_rows[$row['organid']]['alias'] . '-' . $row['organid'] . '/' . change_alias($row['name']) . '-' . $row['personid'];
        $person_data[] = $row;
    }
    
    $html_pages = nv_alias_page($page_title, $base_url, $all_page, $per_page, $page);
    $contents = searchresult($person_data, $html_pages);
} else {
    $contents = '';
}

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
