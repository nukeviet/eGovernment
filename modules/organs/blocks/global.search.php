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

if (!nv_function_exists('nv_block_orgsearch')) {
    /**
     * nv_block_config_orgsearch()
     * 
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_orgsearch($module, $data_block, $lang_block)
    {
        $html = '';

        $html .= '<tr>';
        $html .= '<td>' . $lang_block['display_layout'] . '</td>';
        $html .= '<td>';
        $html .= '<select class="form-control w300" name="config_display_layout">';

        $array_display_layout = array('h', 'v');
        foreach ($array_display_layout as $display_layout) {
            $html .= '<option value="' . $display_layout . '"' . ($display_layout == $data_block['display_layout'] ? ' selected="selected"' : '') . '>' . $lang_block['display_layout_' . $display_layout] . '</option>';
        }

        $html .= '</select>';
        $html .= '</td>';
        $html .= '</tr>';

        return $html;
    }

    /**
     * nv_block_config_orgsearch_submit()
     * 
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_orgsearch_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['display_layout'] = $nv_Request->get_title('config_display_layout', 'post', '');
        return $return;
    }

    /**
     * nv_block_orgsearch()
     * 
     * @param mixed $block_config
     * @return
     */
    function nv_block_orgsearch($block_config)
    {
        global $module_info, $module_name, $site_mods, $global_config, $nv_Request;
        
        $module = $block_config['module'];
        $mod_file = $site_mods[$module]['module_file'];
        
        if (file_exists(NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $mod_file . "/block_search.tpl")) {
            $block_theme = $module_info['template'];
        } else {
            $block_theme = "default";
        }
        
        if ($module_name == $module) {
            global $lang_module;
        } else {
            include NV_ROOTDIR . '/modules/' . $mod_file . '/language/' . NV_LANG_INTERFACE . '.php';
        }

        $xtpl = new XTemplate("block_search.tpl", NV_ROOTDIR . "/themes/" . $block_theme . "/modules/" . $mod_file);
        $xtpl->assign('LANG', $lang_module);

        $data = array();

        if (!$global_config['rewrite_enable']) {
            $data['action'] = NV_BASE_SITEURL . 'index.php';
        } else {
            $data['action'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=viewsearch', true);
        }
        
        $data['q'] = $nv_Request->get_title('q', 'get', '');
        $data['p'] = $nv_Request->get_title('p', 'get', '');
        $data['e'] = $nv_Request->get_title('e', 'get', '');
        
        $xtpl->assign('DATA', $data);
        
        if (!$global_config['rewrite_enable']) {
            $xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
            $xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
            $xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
            $xtpl->assign('MODULE_NAME', $module);
            $xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
            $xtpl->assign('OP', 'viewsearch');
            $xtpl->parse('main.no_rewrite');
        }
        
        $xtpl->parse('main.layout' . $block_config['display_layout']);
        
        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    global $site_mods, $module_name;
    $module = $block_config['module'];
    if (isset($site_mods[$module])) {
        $content = nv_block_orgsearch($block_config);
    }
}
