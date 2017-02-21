<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 18:49
 */

if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');

$personid = $nv_Request->get_int('id', 'post,get', 0);
$contents = $lang_module['del_lang_not_complete'];
$array_organid = array();
if ($personid > 0) {
    $array_organid[] = $db->query('SELECT organid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_person WHERE personid=' . $personid)->fetchColumn();
    $query = 'DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_person WHERE personid=' . $personid;
    if ($db->query($query)) {
        nv_fix_row_order();
        $contents = $lang_module['del_lang_complete'];
    }
} else {
    $listall = $nv_Request->get_string('listall', 'post,get');
    if (!empty($listall)) {
        $listall = implode(',', array_map('intval', explode(',', $listall)));
        
        $_query = $db->query('SELECT organid FROM ' . NV_PREFIXLANG . '_' . $module_data . '_person WHERE personid IN (' . $listall . ')');
        while ($_organid = $_query->fetchColumn()) {
            $array_organid[] = $_organid;
        }
        $sql = 'DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_person WHERE personid IN (' . $listall . ')';
        $result = $db->query($sql);
        
        $contents = $lang_module['del_lang_complete'];
    }
}
$array_organid = array_unique($array_organid);
foreach ($array_organid as $_organid) {
    nv_fix_organ($_organid);
    nv_fix_personweight($_organid);
}

$nv_Cache->delMod($module_name);
echo $contents;
exit();