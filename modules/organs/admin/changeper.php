<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 18:49
 */

if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');

$personid = $nv_Request->get_int('personid', 'post', 0);
$new_weight = $nv_Request->get_int('w', 'post', 0);
$content = 'NO_' . $personid;
$table = NV_PREFIXLANG . '_' . $module_data . '_person';
list ($personid, $organid, $old_weight) = $db->query('SELECT personid , organid, weight FROM ' . $table . ' WHERE personid=' . $personid . '')->fetch(3);
if ($personid > 0) {
    $personid_swap = $db->query('SELECT personid FROM ' . $table . ' WHERE organid = ' . intval($organid) . ' AND weight = ' . $new_weight)->fetchColumn();
    $sql = 'UPDATE ' . $table . ' SET weight=' . $new_weight . ' WHERE personid=' . intval($personid);
    $db->query($sql);
    
    $sql = 'UPDATE ' . $table . ' SET weight=' . $old_weight . ' WHERE personid=' . intval($personid_swap);
    $db->query($sql);
    nv_fix_personweight($organid);
    
    $content = 'OK_' . $personid;
    $nv_Cache->delMod($module_name);
}

include NV_ROOTDIR . '/includes/header.php';
echo $content;
include NV_ROOTDIR . '/includes/footer.php';