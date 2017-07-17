<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/25/2010 18:6
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (! nv_function_exists('nv_page_list')) {
    function nv_block_config_page_list($module, $data_block, $lang_block)
    {
        $html = '';
        $html .= '<tr>';
        $html .= '	<td>' . $lang_block['title_length'] . '</td>';
        $html .= '	<td><input type="text" class="form-control w200" name="config_title_length" size="5" value="' . $data_block['title_length'] . '"/></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '	<td>' . $lang_block['numrow'] . '</td>';
        $html .= '	<td><input type="text" name="config_numrow" class="form-control w200" size="5" value="' . $data_block['numrow'] . '"/></td>';
        $html .= '</tr>';
        return $html;
    }

    function nv_block_config_page_list_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['title_length'] = $nv_Request->get_int('config_title_length', 'post', 24);
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 5);
        return $return;
    }

    /**
     * nv_page_list()
     *
     * @return
     */
    function nv_page_list($block_config)
    {
        global $nv_Cache, $global_config, $site_mods, $db;
        $module = $block_config['module'];

        if (! isset($site_mods[$module])) {
            return '';
        }

        $db->sqlreset()
            ->select('id, title, alias, description')
            ->from(NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'])
            ->where('status = 1')
            ->order('weight ASC')
            ->limit($block_config['numrow']);

        $list = $nv_Cache->db($db->sql(), 'id', $module);

        if (!empty($list)) {
            if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/page/block.page_list.tpl')) {
                $block_theme = $global_config['module_theme'];
            } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/page/block.page_list.tpl')) {
                $block_theme = $global_config['site_theme'];
            } else {
                $block_theme = 'default';
            }

            $xtpl = new XTemplate('block.page_list.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/page');

            foreach ($list as $l) {
                $l['title_clean60'] = nv_clean60($l['title'], $block_config['title_length']);
                $l['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $l['alias'] . $global_config['rewrite_exturl'];
                $xtpl->assign('ROW', $l);
                $xtpl->parse('main.loop');
            }

            $xtpl->parse('main');
            return $xtpl->text('main');
        } else {
            return '';
        }
    }
}
if (defined('NV_SYSTEM')) {
    $content = nv_page_list($block_config);
}
