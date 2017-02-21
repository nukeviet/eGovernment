<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 18:49
 */

if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');

$organid = $nv_Request->get_int('oid', 'post', 0);
$new_weight = $nv_Request->get_int('w', 'post', 0);
$content = 'NO_' . $organid;
$table = NV_PREFIXLANG . '_' . $module_data . '_rows';
list ($organid, $parentid, $numsub) = $db->query('SELECT organid, parentid, numsub FROM ' . $table . ' WHERE organid=' . $organid)->fetch(3);
if ($organid > 0) {
    $query = 'SELECT organid FROM ' . $table . ' WHERE organid!=' . $organid . ' AND parentid=' . $parentid . ' ORDER BY weight ASC';
    $result = $db->query($query);
    $weight = 0;
    while ($row = $result->fetch()) {
        $weight++;
        if ($weight == $new_weight) $weight++;
        $sql = 'UPDATE ' . $table . ' SET weight=' . $weight . ' WHERE organid=' . intval($row['organid']);
        $db->query($sql);
    }
    $sql = 'UPDATE ' . $table . ' SET weight=' . $new_weight . ' WHERE organid=' . $organid;
    $db->query($sql);
    nv_fix_row_order();
    $content = 'OK_' . $parentid;
    $nv_Cache->delMod($module_name);
}

include NV_ROOTDIR . '/includes/header.php';
echo $content;
include NV_ROOTDIR . '/includes/footer.php';