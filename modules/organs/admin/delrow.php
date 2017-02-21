<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 18:49
 */

if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');

$organid = $nv_Request->get_int('id', 'post,get', 0);
$contents = $lang_module['del_lang_not_complete'];
if ($organid > 0) {
    $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rows WHERE organid=' . $organid;
    $row = $db->query($sql)->fetch();
    if (!empty($row)) {
        $sql = 'SELECT count(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_person WHERE organid=' . $organid;
        $_numperson = $db->query($sql)->fetchColumn();
        if ($row['numsub'] == 0 && empty($_numperson)) {
            $query = 'DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rows WHERE organid=' . $organid;
            if ($db->query($query)) {
                nv_fix_row_order();
                $nv_Cache->delMod($module_name);
                $contents = $lang_module['del_lang_complete'];
            }
        } else {
            $contents = $lang_module['del_lang_organ_error'];
        }
    }
}

include NV_ROOTDIR . '/includes/header.php';
echo $contents;
include NV_ROOTDIR . '/includes/footer.php';