<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/9/2010 23:25
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

if (!nv_function_exists('nv_block_sbirthday')) {

    function nv_block_config_block_sbirthday($module, $data_block, $lang_block)
    {
        global $db, $language_array;
        return '<div class="form-group"><label class="control-label col-sm-6">' . $lang_block['title_tip'] . '</label><div class="col-sm-18"><input type="text" class="form-control" name="config_title_tip" value="' . $data_block["title_tip"] . '"/></div></div>';
    }

    function nv_block_config_block_sbirthday_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['title_tip'] = $nv_Request->get_title('config_title_tip', 'post', '');
        return $return;
    }

    function nv_block_birthday_organ($list_organ, $organid)
    {
        $array_cat[] = $list_organ[$organid]['title'];
        $parentid = $list_organ[$organid]['parentid'];
        if ($parentid > 0) {
            $temp = nv_block_birthday_organ($list_organ, $parentid);
            foreach ($temp as $title) {
                $array_cat[] = $title;
            }
        }

        return $array_cat;
    }

    function nv_block_sbirthday($block_config)
    {
        global $module_array_cat, $module_info, $lang_module, $site_mods, $nv_Cache;
        $module = $block_config['module'];
        $mod_data = $site_mods[$module]['module_data'];
        $mod_file = $site_mods[$module]['module_file'];
        //$sql = "SELECT name, position, organid FROM " . NV_PREFIXLANG . "_" . $mod_data . "_person WHERE FROM_UNIXTIME(birthday,'%m-%d')='" . date( "m-d", NV_CURRENTTIME ) . "'";
        $sql = "SELECT name, position, organid FROM " . NV_PREFIXLANG . "_" . $mod_data . "_person WHERE DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(0), INTERVAL birthday SECOND),'%m-%d')='" . date("m-d", NV_CURRENTTIME) . "'";
        $list = $nv_Cache->db($sql, 'person', $module);
        $i = 1;
        if (!empty($list)) {
            $sql = "SELECT organid, parentid, title FROM " . NV_PREFIXLANG . "_" . $mod_data . "_rows";
            $list_organ = $nv_Cache->db($sql, 'organid', $module);

            if (file_exists(NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $mod_file . "/block_birthday.tpl")) {
                $block_theme = $module_info['template'];
            } else {
                $block_theme = "default";
            }
            $array_birthday = array();
            global $array_cat;
            $xtpl = new XTemplate("block_birthday.tpl", NV_ROOTDIR . "/themes/" . $block_theme . "/modules/" . $mod_file . "");
            foreach ($list as $l) {
                $array_cat = array();
                $temp = nv_block_birthday_organ($list_organ, $l['organid']);
                $array_birthday[] = $block_config['title_tip'] . " " . $l['name'] . " (" . $l['position'] . " - " . implode(" - ", $temp) . ")";
            }
            $xtpl->assign('BLOCK_CONTENT', implode("; ", $array_birthday));
            $xtpl->parse('main');
            return $xtpl->text('main');
        }
        return "";
    }
}

if (defined('NV_SYSTEM')) {
    global $site_mods, $module_name;
    $module = $block_config['module'];
    if (isset($site_mods[$module])) {
        $content = nv_block_sbirthday($block_config);
    }
}
