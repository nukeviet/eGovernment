<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  12:57:52 PM 
 */

if (!defined('NV_IS_MOD_ORGAN'))
    die('Stop!!!');

if (!function_exists('nv_block_cateorg')) {
    function nv_block_cateorg()
    {
        global $module_name, $module_data, $module_config, $module_info, $global_organ_rows, $array_op;
        $pid = 0;
        if (!empty($array_op[1])) {
            $temp = explode('-', $array_op[1]);
            if (!empty($temp)) {
                $pid = end($temp);
            }
        }
        if ($pid == 0) {
            foreach ($global_organ_rows as $organid => $organinfo) {
                if ($organinfo['numsub'] > 0) {
                    $pid = $organid;
                    break;
                }
            }
        }
        $pid = getparentid($pid);
        if (!empty($global_organ_rows) && !empty($global_organ_rows[$pid])) {
            $xtpl = new XTemplate("block_cateorg.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_info['module_theme']);
            $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
            $xtpl->assign('title', $global_organ_rows[$pid]['title']);
            foreach ($global_organ_rows as $organid => $organinfo) {
                if ($organinfo['parentid'] == $pid) {
                    $xtpl->assign('ROW', $organinfo);
                    $xtpl->parse('main.loop');
                }
            }
            $xtpl->parse('main');
            return $xtpl->text('main');
        }
        return "";
    }
}

$content = nv_block_cateorg();
