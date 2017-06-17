<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:32:04 AM
 */

if (!defined('NV_IS_MOD_ORGAN')) die('Stop!!!');

$key_words = $module_info['keywords'];

//get pages
$pid = 0;
if (!empty($array_op[2])) {
    $temp = explode('-', $array_op[2]);
    if (!empty($temp)) {
        $pid = end($temp);
    }
}
//get id
$oid = 0;
if (!empty($array_op[1])) {
    $temp = explode('-', $array_op[1]);
    if (!empty($temp)) {
        $oid = end($temp);
    }
}

$data_content = array();
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_person WHERE personid=' . intval($pid) . ' AND active=1';
$result = $db->query($sql);
$data_content = $result->fetch();

if (empty($data_content)) {
    $redirect = "<meta http-equiv=\"Refresh\" content=\"3;URL=" . nv_url_rewrite(NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name, true) . "\" />";
    nv_info_die($lang_global['error_404_title'], $lang_global['error_404_title'], $lang_global['error_404_content'] . $redirect);
}

if (!empty($data_content['photo']) and file_exists(NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/' . $data_content['photo'])) {
    $data_content['photo_thumb'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $data_content['photo'];
} elseif (!empty($data_content['photo']) and file_exists(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $data_content['photo'])) {
    $data_content['photo_thumb'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $data_content['photo'];
} else {
    $data_content['photo_thumb'] = NV_BASE_SITEURL . 'themes/' . $module_info['template'] . '/images/' . $module_info['module_theme'] . '/no-avatar.jpg';
}
$data_content['imgsrc'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $data_content['photo'];

// thanh dieu huong
$parentid = $data_content['organid'];
while ($parentid > 0) {
    $array_cat_i = $global_organ_rows[$parentid];
    $array_mod_title[] = array(
        'catid' => $parentid,
        'title' => $array_cat_i['title'],
        'link' => $array_cat_i['link']
    );
    $parentid = $array_cat_i['parentid'];
}
sort($array_mod_title, SORT_NUMERIC);

$page_title = $data_content['name'];
$contents = detail_per($data_content);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';