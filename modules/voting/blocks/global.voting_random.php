<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/25/2010 18:6
 */

if (!defined('NV_SYSTEM')) {
    die('Stop!!!');
}

if (!nv_function_exists('nv_block_voting')) {
    /**
     * nv_block_voting()
     *
     * @return
     */
    function nv_block_voting()
    {
        global $nv_Cache, $db, $my_footer, $site_mods, $global_config, $lang_global;

        $content = '';

        if (!isset($site_mods['voting'])) {
            return '';
        }

        $sql = 'SELECT vid, question, link, acceptcm, active_captcha, groups_view, publ_time, exp_time FROM ' . NV_PREFIXLANG . '_' . $site_mods['voting']['module_data'] . ' WHERE act=1';

        $list = $nv_Cache->db($sql, 'vid', 'voting');

        if (empty($list)) {
            return '';
        }

        $allowed = array();
        $is_update = array();

        $a = 0;
        foreach ($list as $row) {
            if ($row['exp_time'] > 0 and $row['exp_time'] < NV_CURRENTTIME) {
                $is_update[] = $row['vid'];
            } elseif ($row['publ_time'] <= NV_CURRENTTIME and nv_user_in_groups($row['groups_view'])) {
                $allowed[$a] = $row;
                ++$a;
            }
        }

        if (!empty($is_update)) {
            $is_update = implode(',', $is_update);

            $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $site_mods['voting']['module_data'] . ' SET act=0 WHERE vid IN (' . $is_update . ')';
            $db->query($sql);

            $nv_Cache->delMod('voting');
        }

        if ($allowed) {
            --$a;
            $rand = rand(0, $a);
            $current_voting = $allowed[$rand];

            $sql = 'SELECT id, vid, title, url FROM ' . NV_PREFIXLANG . '_' . $site_mods['voting']['module_data'] . '_rows WHERE vid = ' . $current_voting['vid'] . ' ORDER BY id ASC';

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

            $action = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=voting';

            $voting_array = array(
                'checkss' => md5($current_voting['vid'] . NV_CHECK_SESSION),
                'accept' => (int)$current_voting['acceptcm'],
                'active_captcha' => ((int)$current_voting['active_captcha'] ? ($global_config['captcha_type'] == 2 ? 2 : 1) : 0),
                'errsm' => (int)$current_voting['acceptcm'] > 1 ? sprintf($lang_module['voting_warning_all'], (int)$current_voting['acceptcm']) : $lang_module['voting_warning_accept1'],
                'vid' => $current_voting['vid'],
                'question' => (empty($current_voting['link'])) ? $current_voting['question'] : '<a target="_blank" href="' . $current_voting['link'] . '">' . $current_voting['question'] . '</a>',
                'action' => $action,
                'langresult' => $lang_module['voting_result'],
                'langsubmit' => $lang_module['voting_hits']
            );

            $xtpl = new XTemplate('global.voting.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $site_mods['voting']['module_file']);
            $xtpl->assign('LANG', $lang_module);
            $xtpl->assign('VOTING', $voting_array);

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
            $content = $xtpl->text('main');
        }

        return $content;
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_block_voting();
}
