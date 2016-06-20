<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 14/4/2011, 19:29
 */

if (!defined('NV_IS_MOD_SITEMAP'))
    die('Stop!!!');

if (!nv_function_exists('catalog_organ_viewsub')) {
    function catalog_organ_viewsub($list_sub)
    {
        global $db_config, $db, $site_mods, $mName;
        $sublinks_i = array();
        if (empty($list_sub))
            return "";
        else {
            $sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $site_mods[$mName]['module_data'] . "_rows WHERE organid IN(" . $list_sub . ") ORDER BY weight ASC";
            $result = $db->query($sql);
            while ($row = $result->fetch()) {
                $array_sub = (!empty($row['suborgan'])) ? catalog_organ_viewsub($row['suborgan']) : array();
                $sublinks_i[] = array( //
                    'title' => $row['title'], //
                    'link' => NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $mName . "&amp;" . NV_OP_VARIABLE . '=vieworg/' . $row['alias'] . '-' . $row['organid'], //
                    'subs' => $array_sub //
                );
            }
            return $sublinks_i;
        }
    }
}

$sublinks = array();

$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $site_mods[$mName]['module_data'] . "_rows WHERE parentid = 0 ORDER BY weight ASC";
$result = $db->query($sql);

while ($row = $result->fetch()) {
    $array_sub = (!empty($row['suborgan'])) ? catalog_organ_viewsub($row['suborgan']) : array();
    $sublinks[] = array( //
        'title' => $row['title'], //
        'link' => NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $mName . "&amp;" . NV_OP_VARIABLE . '=vieworg/' . $row['alias'] . '-' . $row['organid'], //
        'subs' => $array_sub //
    );
}
