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

        foreach ($site_mods as $title => $mod) {
            if ($mod['module_file'] == 'faq') {
                $html .= '<option value="' . $title . '"' . ($title == $data_block['modfaq'] ? ' selected="selected"' : '') . '>' . $mod['custom_title'] . '</option>';
            }
        }

        $html .= '</select>';
        $html .= '</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td>' . $lang_block['catfaq'] . '</td>';
        $html .= '<td><input type="text" name="config_catfaq" value="' . $data_block['catfaq'] . '" class="form-control w100"/></td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td>' . $lang_block['modopinion'] . '</td>';
        $html .= '<td>';
        $html .= '<select name="config_modopinion" class="form-control w300">';

        foreach ($site_mods as $title => $mod) {
            if ($mod['module_file'] == 'news') {
                $html .= '<option value="' . $title . '"' . ($title == $data_block['modopinion'] ? ' selected="selected"' : '') . '>' . $mod['custom_title'] . '</option>';
            }
        }

        $html .= '</select>';
        $html .= '</td>';
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
        $return['config']['modfaq'] = $nv_Request->get_title('config_modfaq', 'post', '');
        $return['config']['catfaq'] = $nv_Request->get_int('config_catfaq', 'post', 0);
        $return['config']['modopinion'] = $nv_Request->get_title('config_modopinion', 'post', '');
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
        global $global_config, $site_mods, $nv_Cache, $db_config, $module_config;

        if (isset($site_mods[$block_config['modfaq']]) and isset($site_mods[$block_config['modopinion']]) and !empty($block_config['catfaq'])) {
            if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.faq_opinion.tpl')) {
                $block_theme = $global_config['module_theme'];
            } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.faq_opinion.tpl')) {
                $block_theme = $global_config['site_theme'];
            } else {
                $block_theme = 'default';
            }

            include NV_ROOTDIR . '/themes/' . $block_theme . '/language/' . NV_LANG_INTERFACE . '.php';

            $xtpl = new XTemplate('global.faq_opinion.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
            $xtpl->assign('TEMPLATE', $block_theme);
            $xtpl->assign('CONFIG', $block_config);
            $xtpl->assign('LANG', $lang_block);

            $xtpl->assign('LINK_SENDFAQ', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $block_config['modfaq'] . '&amp;' . NV_OP_VARIABLE . '=insertqa');
            $xtpl->assign('LINK_LISTFAQ', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $block_config['modfaq'] . '&amp;' . NV_OP_VARIABLE . '=list');
            $xtpl->assign('LINK_MAINFAQ', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $block_config['modfaq']);

            $xtpl->assign('TAB1_TITLE', $site_mods[$block_config['modfaq']]['custom_title']);
            $xtpl->assign('TAB2_TITLE', $site_mods[$block_config['modopinion']]['custom_title']);

            // Link cat FAQ
            $faqAlias = '';
            $sql = "SELECT alias FROM " . NV_PREFIXLANG . "_" . $site_mods[$block_config['modfaq']]['module_data'] . "_categories WHERE id=" . $block_config['catfaq'] . " AND status=1";
            $list = $nv_Cache->db($sql, '', $block_config['modfaq']);
            if (!empty($list)) {
                $faqAlias = $list[0]['alias'];
            }
            if ($faqAlias) {
                $xtpl->assign('LINK_ANSWERFAQ', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $block_config['modfaq'] . '&amp;' . NV_OP_VARIABLE . '=' . $faqAlias);
            } else {
                $xtpl->assign('LINK_ANSWERFAQ', '');
            }

            // Lấy ý kiến người dân
            $show_no_image = $module_config[$block_config['modopinion']]['show_no_image'];
            $blockwidth = $module_config[$block_config['modopinion']]['blockwidth'];

            $module_array_cat = array();
            $sql = 'SELECT catid, parentid, title, alias, viewcat, subcatid, numlinks, description, status, keywords, groups_view FROM ' . NV_PREFIXLANG . '_' . $site_mods[$block_config['modopinion']]['module_data'] . '_cat WHERE status=1 OR status=2 ORDER BY sort ASC';
            $list = $nv_Cache->db($sql, 'catid', $block_config['modopinion']);
            if (!empty($list)) {
                foreach ($list as $l) {
                    $module_array_cat[$l['catid']] = $l;
                    $module_array_cat[$l['catid']]['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $block_config['modopinion'] . '&amp;' . NV_OP_VARIABLE . '=' . $l['alias'];
                }
            }

            if (!empty($module_array_cat)) {
                // Bài mới nhất
                $sql = "SELECT id, catid, title, alias, homeimgfile, homeimgthumb, hometext, publtime, external_link FROM
                " . NV_PREFIXLANG . "_" . $site_mods[$block_config['modopinion']]['module_data'] . "_rows WHERE status=1 ORDER BY publtime DESC LIMIT 0,1";
                $list = $nv_Cache->db($sql, '', $block_config['modopinion']);
                if (!empty($list)) {
                    $row = $list[0];

                    $row['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $block_config['modopinion'] . '&amp;' . NV_OP_VARIABLE . '=' . $module_array_cat[$row['catid']]['alias'] . '/' . $row['alias'] . '-' . $row['id'] . $global_config['rewrite_exturl'];
                    if ($row['homeimgthumb'] == 1) {
                        $row['thumb'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $site_mods[$block_config['modopinion']]['module_upload'] . '/' . $row['homeimgfile'];
                    } elseif ($row['homeimgthumb'] == 2) {
                        $row['thumb'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $site_mods[$block_config['modopinion']]['module_upload'] . '/' . $row['homeimgfile'];
                    } elseif ($row['homeimgthumb'] == 3) {
                        $row['thumb'] = $row['homeimgfile'];
                    } elseif (! empty($show_no_image)) {
                        $row['thumb'] = NV_BASE_SITEURL . $show_no_image;
                    } else {
                        $row['thumb'] = '';
                    }

                    $row['blockwidth'] = $blockwidth;

                    $xtpl->assign('OPINION', $row);

                    if (!empty($row['thumb'])) {
                        $xtpl->parse('main.opinion.thumb');
                    }

                    $xtpl->parse('main.opinion');
                }
            }

            $xtpl->parse('main');
            return $xtpl->text('main');
        }
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_block_global_faq_opinion($block_config);
}
