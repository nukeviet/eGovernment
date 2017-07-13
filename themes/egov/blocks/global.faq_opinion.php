<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2015 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Jan 10, 2011 6:04:30 PM
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

if (!nv_function_exists('nv_block_global_faq_opinion')) {
    /**
     * nv_block_config_faq_opinion()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_faq_opinion($module, $data_block, $lang_block)
    {
        global $site_mods;

        $html = '';
        $html .= '<tr>';
        $html .= '<td>' . $lang_block['modfaq'] . '</td>';
        $html .= '<td>';
        $html .= '<select name="config_modfaq" class="form-control w300">';

        foreach ($site_mods as $mod) {
            if ($mod['module_file'] == 'faq') {
                $html .= '<option value="' . $mod['module_file'] . '"' . ($mod['module_file'] == $data_block['site_description'] ? ' selected="selected"' : '') . '>' . $mod['module_file'] . '</option>';
            }
        }

        $html .= '</select>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>' . $lang_block['site_description'] . '</td>';
        $html .= '<td><input type="text" name="config_site_description" class="form-control w300" value="' . $data_block['site_description'] . '"/></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td><label><input type="checkbox" name="config_use_sitename" value="1"' . ($data_block['use_sitename'] ? ' checked="checked"' : '') . '/> ' . $lang_block['use_sitename'] . '</label></td>';
        $html .= '</tr>';
        return $html;
    }

    /**
     * nv_block_config_faq_opinion_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_faq_opinion_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['site_title'] = $nv_Request->get_title('config_site_title', 'post', '');
        $return['config']['site_description'] = $nv_Request->get_title('config_site_description', 'post', '');
        $return['config']['use_sitename'] = $nv_Request->get_int('config_use_sitename', 'post', 0);
        return $return;
    }

    /**
     * nv_block_global_faq_opinion()
     *
     * @param mixed $block_config
     * @return
     */
    function nv_block_global_faq_opinion($block_config)
    {
        global $global_config;

        if (!empty($block_config['use_sitename'])) {
            $block_config['site_description'] = $global_config['site_name'];
        }

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.faq_opinion.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.faq_opinion.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        $xtpl = new XTemplate('global.faq_opinion.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
        $xtpl->assign('TEMPLATE', $block_theme);
        $xtpl->assign('CONFIG', $block_config);

        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_block_global_faq_opinion($block_config);
}
