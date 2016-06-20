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

if (!function_exists('nv_block_parentorg')) {
    function nv_block_parentorg()
    {
        global $lang_module, $module_name, $module_data, $module_file, $module_config, $module_info, $global_organ_rows;
        $organid = 0;
        if (!empty($global_organ_rows)) {
            $xtpl = new XTemplate("block_parent.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file);
            $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
            $xtpl->assign('LANG', $lang_module);
            foreach ($global_organ_rows as $organid => $organinfo) {
                if ($organinfo['parentid'] == '0') {
                    $xtpl->assign('ROW', $organinfo);
                    $xtpl->parse('main.loop');
                }
                $xtitle = "";
                if ($organinfo['lev'] > 0) {
                    for ($i = 1; $i <= $organinfo['lev']; $i++) {
                        $xtitle .= "&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                }
                $organinfo['xtitle'] = $xtitle . $organinfo['title'];
                $organinfo['select'] = ($organinfo['organid'] == $organid) ? "selected=\"selected\"" : "";
                $xtpl->assign('PAR', $organinfo);
                $xtpl->parse('main.parent_loop');
            }
            $xtpl->parse('main');
            return $xtpl->text('main');
        }
        return "";
    }
}

$content = nv_block_parentorg();
