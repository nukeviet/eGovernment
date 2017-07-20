<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 04 May 2014 12:41:32 GMT
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (! nv_function_exists('nv_menu_theme_btnstool')) {
    function nv_menu_theme_btnstool_config($module, $data_block, $lang_block)
    {
        $html = '<tr>';
        $html .= '	<td>' . $lang_block['facebook'] . '</td>';
        $html .= '	<td><input type="text" name="config_facebook" class="form-control" value="' . $data_block['facebook'] . '"/></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '	<td>' . $lang_block['google_plus'] . '</td>';
        $html .= '	<td><input type="text" name="config_google_plus" class="form-control" value="' . $data_block['google_plus'] . '"/></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '	<td>' . $lang_block['twitter'] . '</td>';
        $html .= '	<td><input type="text" name="config_twitter" class="form-control" value="' . $data_block['twitter'] . '"/></td>';
        $html .= '</tr>';
        return $html;
    }

    function nv_menu_theme_btnstool_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config']['facebook'] = $nv_Request->get_title('config_facebook', 'post');
        $return['config']['google_plus'] = $nv_Request->get_title('config_google_plus', 'post');
        $return['config']['twitter'] = $nv_Request->get_title('config_twitter', 'post');
        return $return;
    }

    function nv_menu_theme_btnstool($block_config)
    {
        global $global_config, $site_mods, $lang_global, $module_file, $op;

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.btns_tool.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.btns_tool.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        include NV_ROOTDIR . '/themes/' . $block_theme . '/language/' . NV_LANG_INTERFACE . '.php';

        $xtpl = new XTemplate('global.btns_tool.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
        $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
        $xtpl->assign('LANG', $lang_global);
        $xtpl->assign('MLANG', $lang_module);
        $xtpl->assign('BLOCK_THEME', $block_theme);
        $xtpl->assign('DATA', $block_config);

        $numitems = 1;

        if (! empty($block_config['facebook'])) {
            $xtpl->parse('main.facebook');
            $numitems++;
        }
        if (! empty($block_config['google_plus'])) {
            $xtpl->parse('main.google_plus');
            $numitems++;
        }
        if (! empty($block_config['twitter'])) {
            $xtpl->parse('main.twitter');
            $numitems++;
        }
        if (isset($site_mods['feeds'])) {
            $xtpl->assign('FEEDS_HREF', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=feeds');
            $xtpl->parse('main.feeds');
            $numitems++;
        }

        if ($module_file == 'news' and $op == 'detail') {
            $xtpl->parse('main.fontsize');
            $numitems++;
        }

        $xtpl->assign('NUMITEMS', $numitems);

        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_menu_theme_btnstool($block_config);
}
