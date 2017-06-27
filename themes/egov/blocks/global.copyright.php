<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Jan 17, 2011 11:34:27 AM
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (! nv_function_exists('nv_copyright_info')) {
    function nv_copyright_info_config()
    {
        global $lang_global, $data_block;

        $html = '<tr>';
        $html .= '<td>' . $lang_global['copyright_by'] . '</td>';
        $html .= '<td><input type="text" name="copyright_by" value="' . nv_htmlspecialchars($data_block['copyright_by']) . '" size="80"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>' . $lang_global['copyright_url'] . '</td>';
        $html .= '<td><input type="text" name="copyright_url" value="' . nv_htmlspecialchars($data_block['copyright_url']) . '" size="80"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>' . $lang_global['design_by'] . '</td>';
        $html .= '<td><input type="text" name="design_by" value="' . nv_htmlspecialchars($data_block['design_by']) . '" size="80"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>' . $lang_global['design_url'] . '</td>';
        $html .= '<td><input type="text" name="design_url" value="' . nv_htmlspecialchars($data_block['design_url']) . '" size="80"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>' . $lang_global['siteterms_url'] . '</td>';
        $html .= '<td><input type="text" name="siteterms_url" value="' . nv_htmlspecialchars($data_block['siteterms_url']) . '" size="80"></td>';
        $html .= '</tr>';

        return $html;
    }

    function nv_copyright_info_submit()
    {
        global $nv_Request;

        $return = array();
        $return['error'] = array();
        $return['config']['copyright_by'] = $nv_Request->get_title('copyright_by', 'post');
        $return['config']['copyright_url'] = $nv_Request->get_title('copyright_url', 'post');
        $return['config']['design_by'] = $nv_Request->get_title('design_by', 'post');
        $return['config']['design_url'] = $nv_Request->get_title('design_url', 'post');
        $return['config']['siteterms_url'] = $nv_Request->get_title('siteterms_url', 'post');
        return $return;
    }

    /**
     * nv_menu_theme_default_footer()
     *
     * @param mixed $block_config
     * @return
     */
    function nv_copyright_info($block_config)
    {
        global $global_config, $lang_global;

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.copyright.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.copyright.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        $xtpl = new XTemplate('global.copyright.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
        $xtpl->assign('LANG', $lang_global);

        if (empty($block_config['copyright_by'])) {
            $block_config['copyright_by'] = $global_config['site_name'];
        }
        if (empty($block_config['copyright_url'])) {
            $block_config['copyright_url'] = "http://" . $global_config['my_domains'][0];
        }

        $xtpl->assign('DATA', $block_config);
        $xtpl->parse('main.copyright_by.copyright_url');
        $xtpl->parse('main.copyright_by.copyright_url2');
        $xtpl->parse('main.copyright_by');

        if (! empty($block_config['design_by'])) {
            if (! empty($block_config['design_url'])) {
                $xtpl->parse('main.design_by.design_url');
                $xtpl->parse('main.design_by.design_url2');
            }
            $xtpl->parse('main.design_by');
        }
        if (! empty($block_config['siteterms_url'])) {
            $xtpl->parse('main.siteterms_url');
        }
        if (defined('NV_IS_SPADMIN')) {
            $xtpl->parse('main.memory_time_usage');
        }
        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_copyright_info($block_config);
}
