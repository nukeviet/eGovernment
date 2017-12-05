<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 24 Sep 2014 01:48:53 GMT
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');

global $array_organs_admin;

if (!function_exists('nv_organs_array_admins')) {
    /**
     * nv_organs_array_admins()
     *
     * @param mixed $module_data
     * @return
     */
    function nv_organs_array_admins($module_data)
    {
        global $db_slave;

        $array = array();
        $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_admins ORDER BY userid ASC';
        $result = $db_slave->query($sql);

        while ($row = $result->fetch()) {
            $array[$row['userid']][$row['organid']] = $row;
        }

        return $array;
    }
}

$is_refresh = false;
$array_organs_admin = nv_organs_array_admins($module_data);

if (!empty($module_info['admins'])) {
    $module_admin = explode(',', $module_info['admins']);
    foreach ($module_admin as $userid_i) {
        if (!isset($array_organs_admin[$userid_i])) {
            $db->query('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_admins (
                userid, organid, admin, add_content, edit_content, status_content, del_content
            ) VALUES (
                ' . $userid_i . ', 0, 1, 1, 1, 1, 1
            )');
            $is_refresh = true;
        }
    }
}
if ($is_refresh) {
    $array_organs_admin = nv_organs_array_admins($module_data);
}

$NV_IS_ADMIN_MODULE = false;
$NV_IS_ADMIN_FULL_MODULE = false;
if (defined('NV_IS_SPADMIN')) {
    $NV_IS_ADMIN_MODULE = true;
    $NV_IS_ADMIN_FULL_MODULE = true;
} else {
    if (isset($array_organs_admin[$admin_info['admin_id']][0])) {
        $NV_IS_ADMIN_MODULE = true;
        if (intval($array_organs_admin[$admin_info['admin_id']][0]['admin']) == 2) {
            $NV_IS_ADMIN_FULL_MODULE = true;
        }
    }
}

$submenu['listper'] = $lang_module['organ_persons_list'];
$submenu['addper'] = $lang_module['addper_title'];

if ($NV_IS_ADMIN_MODULE) {
    $submenu['addrow'] = $lang_module['addrow_title'];
}

if ($NV_IS_ADMIN_FULL_MODULE) {
    $submenu['admins'] = $lang_module['admins'];
    $submenu['config'] = $lang_module['config'];
}
