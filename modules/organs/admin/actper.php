<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 18:49
 */

if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');

$id = $nv_Request->get_int('id', 'post,get', 0);
$value = $nv_Request->get_int('value', 'post,get', 0);
$contents = $lang_module['active_change_not_complete'];
if ($id > 0) {
    list($personid, $organid) = $db->query('SELECT personid , organid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_person WHERE personid=' . $id)->fetch(3);
    if ($personid > 0 and $organid > 0 and (
        defined('NV_IS_ADMIN_MODULE') or (
            isset($array_organs_admin[$admin_info['admin_id']][$organid]) and
            !empty($array_organs_admin[$admin_info['admin_id']][$organid]['status_content'])
        )
    )) {
        $query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_person SET active=" . $value . " WHERE personid=" . $id;
        if ($db->query($query)) {
            $contents = $lang_module['active_change_complete'];
        }
    }
}
$nv_Cache->delMod($module_name);
echo $contents;