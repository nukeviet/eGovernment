<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2010 - 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 10 Dec 2011 06:46:54 GMT
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!nv_function_exists('nv_block_voting_select')) {
    /**
     * nv_block_voting_select_config()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_voting_select_config($module, $data_block, $lang_block)
    {
        global $nv_Cache, $site_mods;

        $html = '';
        $html .= '<tr>';
        $html .= '<td>' . $lang_block['vid'] . '</td>';
        $html .= '<td><select name="vid" class="w300 form-control">';
        $sql = 'SELECT vid, question,acceptcm, groups_view, publ_time, exp_time FROM ' . NV_PREFIXLANG . '_' . $site_mods['voting']['module_data'] . ' WHERE act=1';
        $list = $nv_Cache->db($sql, 'vid', $module);
        foreach ($list as $l) {
            $sel = ($data_block['vid'] == $l['vid']) ? ' selected' : '';
            $html .= "<option value=\"" . $l['vid'] . "\" " . $sel . ">" . $l['question'] . "</option>";
        }
        $html .= '</select></td>';
        $html .= '</tr>';
        return $html;
    }

    /**
     * nv_block_voting_select_config_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_voting_select_config_submit($module, $lang_block)
    {
        global $nv_Request;

        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['vid'] = $nv_Request->get_int('vid', 'post', 0);
        return $return;
    }

    /**
     * nv_block_voting_select()
     *
     * @param mixed $block_config
     * @param mixed $global_array_cat
     * @return
     */
    function nv_block_voting_select($block_config, $global_array_cat)
    {
        global $nv_Cache, $global_config, $site_mods, $module_name, $my_footer, $client_info, $lang_global;

        $module = $block_config['module'];
        $mod_data = $site_mods[$module]['module_data'];

        $sql = "SELECT vid, question, link, acceptcm, active_captcha, groups_view, publ_time, exp_time FROM " . NV_PREFIXLANG . "_" . $site_mods['voting']['module_data'] . " WHERE act=1";
        $list = $nv_Cache->db($sql, 'vid', 'voting');
        if (isset($list[$block_config['vid']])) {
            $current_voting = $list[$block_config['vid']];
            if ($current_voting['publ_time'] <= NV_CURRENTTIME and nv_user_in_groups($current_voting['groups_view'])) {
                $sql = "SELECT id, vid, title, url FROM " . NV_PREFIXLANG . "_" . $site_mods['voting']['module_data'] . "_rows WHERE vid = " . $block_config['vid'] . " ORDER BY id ASC";
                $list = $nv_Cache->db($sql, '', 'voting');

                if (empty($list)) {
                    return '';
                }

                include NV_ROOTDIR . '/modules/' . $site_mods['voting']['module_file'] . '/language/' . NV_LANG_INTERFACE . '.php';

                if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $site_mods['voting']['module_file'] . '/global.voting.tpl')) {
                    $block_theme = $global_config['module_theme'];
                } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $site_mods['voting']['module_file'] . '/global.voting.tpl')) {
                    $block_theme = $global_config['site_theme'];
                } else {
                    $block_theme = 'default';
                }

                if (file_exists(NV_ROOTDIR . '/themes/' . $block_theme . '/js/voting.js')) {
                    $my_footer .= "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL . "themes/" . $block_theme . "/js/voting.js\"></script>\n";
                }

                $action = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=voting";

                $voting_array = array(
                    'checkss' => md5($current_voting['vid'] . NV_CHECK_SESSION),
                    'accept' => $current_voting['acceptcm'],
                    'active_captcha' => ((int)$current_voting['active_captcha'] ? ($global_config['captcha_type'] == 2 ? 2 : 1) : 0),
                    'errsm' => $current_voting['acceptcm'] > 1 ? sprintf($lang_module['voting_warning_all'], $current_voting['acceptcm']) : $lang_module['voting_warning_accept1'],
                    'vid' => $current_voting['vid'],
                    'question' => (empty($current_voting['link'])) ? $current_voting['question'] : '<a target="_blank" href="' . $current_voting['link'] . '">' . $current_voting['question'] . '</a>',
                    'action' => $action,
                    'langresult' => $lang_module['voting_result'],
                    'langsubmit' => $lang_module['voting_hits']
                );

                $xtpl = new XTemplate('global.voting.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $site_mods['voting']['module_file']);
                $xtpl->assign('VOTING', $voting_array);
                $xtpl->assign('LANG', $lang_module);

                foreach ($list as $row) {
                    if (!empty($row['url'])) {
                        $row['title'] = '<a target="_blank" href="' . $row['url'] . '">' . $row['title'] . '</a>';
                    }
                    $xtpl->assign('RESULT', $row);
                    if ((int)$current_voting['acceptcm'] > 1) {
                        $xtpl->parse('main.resultn');
                    } else {
                        $xtpl->parse('main.result1');
                    }
                }

                if ($voting_array['active_captcha']) {
                    if ($global_config['captcha_type'] == 2) {
                        $xtpl->assign('RECAPTCHA_ELEMENT', 'recaptcha' . nv_genpass(8));
                        $xtpl->assign('N_CAPTCHA', $lang_global['securitycode1']);
                        $xtpl->parse('main.has_captcha.recaptcha');
                    } else {
                        $xtpl->assign('N_CAPTCHA', $lang_global['securitycode']);
                        $xtpl->assign('CAPTCHA_REFRESH', $lang_global['captcharefresh']);
                        $xtpl->assign('GFX_WIDTH', NV_GFX_WIDTH);
                        $xtpl->assign('GFX_HEIGHT', NV_GFX_HEIGHT);
                        $xtpl->assign('SRC_CAPTCHA', NV_BASE_SITEURL . 'index.php?scaptcha=captcha&t=' . NV_CURRENTTIME);
                        $xtpl->assign('GFX_MAXLENGTH', NV_GFX_NUM);
                        $xtpl->parse('main.has_captcha.basic');
                    }
                    $xtpl->parse('main.has_captcha');
                }

                $xtpl->parse('main');
                return $xtpl->text('main');
            }
        }
    }
}

if (defined('NV_SYSTEM')) {
    global $site_mods, $module_name, $global_array_cat;

    $module = $block_config['module'];
    if (isset($site_mods[$module])) {
        $content = nv_block_voting_select($block_config, $global_array_cat);
    }
}
