<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-6-2010 0:30
 */

if (! defined('NV_IS_MOD_FAQ')) {
    die('Stop!!!');
}
//List faq
$listcats = array();
$listcats[0] = array(
    'id' => 0, //
    'name' => $lang_module['nocat'], //
    'title' => $lang_module['nocat'], //
    'selected' => 0 == 0 ? " selected=\"selected\"" : "" //
);
$listcats = $listcats + nv_listcats(0);
$page_title = $lang_module['faq_manager'];

$page = $nv_Request->get_int('page', 'get', 0);
$per_page = 30;
//List bài viết đã được duyệt
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . NV_PREFIXLANG . "_" . $module_data . "";
$base_url = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name."&". NV_OP_VARIABLE . "=viewlist";
$userid = $nv_Request->get_int('userid', 'get', 0);
$where='';
if($userid!=0) {
	$where .="userid=".$userid;
}
if ($nv_Request->isset_request("catid", "get")) {
    $catid = $nv_Request->get_int('catid', 'get', 0);
    if (! $catid or ! isset($listcats[$catid])) {
        Header('Location: ' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name."&". NV_OP_VARIABLE . "=viewlist");
        exit();
    }

    $caption = sprintf($lang_module['faq_list_by_cat'], $listcats[$catid]['title']);
	if($where!='') {
		$sql .= " WHERE ".$where." AND catid=" . $catid . " ORDER BY weight ASC";
	}
	else {
		$sql .= " WHERE catid=" . $catid . " ORDER BY weight ASC";
	}
    $base_url .= "&amp;catid=" . $catid;

    define('NV_IS_CAT', true);
} else {
    $caption = $lang_module['faq_manager'];
    $sql .= " ORDER BY id DESC";
}

$sql .= " LIMIT " . $page . ", " . $per_page;
$query = $db->query($sql);

$result = $db->query("SELECT FOUND_ROWS()");
$all_page = $result->fetchColumn();
$array_accept = array();
$generate_page_accept='';
if ($all_page) {
	while ($row = $query->fetch()) {
	    $array_accept[$row['id']] = array( //
	        'id' => ( int )$row['id'], //
	        'title' => $row['title'], //
	        'cattitle' => $listcats[$row['catid']]['title'], //
	        'link' => $row['title'],
	        );
	}
	$generate_page_accept = nv_generate_page($base_url, $all_page, $per_page, $page);
}
//list bài viết chưa được duyệt
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . NV_PREFIXLANG . "_" . $module_data . "_tmp";
$base_url = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name."&". NV_OP_VARIABLE . "=viewlist";
$userid = $nv_Request->get_int('userid', 'get', 0);
$where='';
if($userid!=0) {
	$where .="userid=".$userid;
}

if ($nv_Request->isset_request("catid", "get")) {
    $catid = $nv_Request->get_int('catid', 'get', 0);
    if (! $catid or ! isset($listcats[$catid])) {
        Header('Location: ' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name."&". NV_OP_VARIABLE . "=viewlist");
        exit();
    }
    $caption = sprintf($lang_module['faq_list_by_cat'], $listcats[$catid]['title']);
    if($where!='') {
		$sql .= " WHERE ".$where." AND catid=" . $catid . " ORDER BY weight ASC";
	}
	else {
		$sql .= " WHERE catid=" . $catid . " ORDER BY weight ASC";
	}
    $base_url .= "&amp;catid=" . $catid;

    define('NV_IS_CAT', true);
} else {
    $caption = $lang_module['faq_manager'];
}

$sql .= " LIMIT " . $page . ", " . $per_page;

$query = $db->query($sql);

$result = $db->query("SELECT FOUND_ROWS()");
$all_page = $result->fetchColumn();

$array_not_accept = array();
$generate_page_not_accept='';
if ($all_page) {
	while ($row = $query->fetch()) {
	    $array_not_accept[$row['id']] = array( //
	        'id' => ( int )$row['id'], //
	        'title' => $row['title'], //
	        'cattitle' => $listcats[$row['catid']]['title'], //
	        );
	}
	$generate_page_not_accept = nv_generate_page($base_url, $all_page, $per_page, $page);
}
//Xoa
if ($nv_Request->isset_request('del', 'post')) {
    if (! defined('NV_IS_AJAX')) {
        die('Wrong URL');
    }

    $id = $nv_Request->get_int('id', 'post', 0);

    if (empty($id)) {
        die('NO');
    }

    $sql = "SELECT COUNT(*) AS count, catid FROM " . NV_PREFIXLANG . "_" . $module_data .  "_tmp WHERE id=" . $id;
    $result = $db->query($sql);
    list($count, $catid) = $result->fetch(3);

    if ($count != 1) {
        die('NO');
    }

    $sql = "DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_tmp WHERE id=" . $id;
    $db->query($sql);

    nv_update_keywords($catid);
    die('OK');
}
$contents=theme_viewlist_faq($array_accept,$generate_page_accept,$array_not_accept,$generate_page_not_accept);
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

