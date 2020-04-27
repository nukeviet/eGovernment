<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/27/2010 4:6
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

$array_except_flood_site = $array_except_flood_admin = array();
$ip_exclusion = false;
if (file_exists(NV_ROOTDIR . '/' . NV_DATADIR . '/efloodip.php')) {
    include NV_ROOTDIR . '/' . NV_DATADIR . '/efloodip.php' ;
}

foreach ($array_except_flood_site as $e => $f) {
    if ($f['begintime'] < NV_CURRENTTIME and ($f['endtime'] == 0 or $f['endtime'] > NV_CURRENTTIME) and (preg_replace($f['mask'], '', NV_CLIENT_IP) == preg_replace($f['mask'], '', $e))) {
        $ip_exclusion = true;
        break;
    }
}

if (!$ip_exclusion) {
    $rules = array('60' => $global_config['max_requests_60'], '300' => $global_config['max_requests_300']);

    $flb = new NukeViet\Core\Blocker(NV_ROOTDIR . '/' . NV_LOGS_DIR . '/ip_logs', NV_CLIENT_IP);
    $flb->trackFlood($rules);

    if ($flb->is_flooded) {
        // Nếu recaptcha được kích hoạt, dùng nó để xác nhận khi bị chặn
        $captchaPass = (!empty($global_config['captcha_type']) and $global_config['captcha_type'] == 2);
        if ($captchaPass) {
            if ($nv_Request->isset_request('captcha_pass_flood', 'post')) {
                $tokend = $nv_Request->get_title('tokend', 'post', '');
                $captcha_txt = $nv_Request->get_title('g-recaptcha-response', 'post', '');
                $redirect = $nv_Request->get_title('redirect', 'post', '');

                if ($tokend === NV_CHECK_SESSION and nv_capcha_txt($captcha_txt)) {
                    $flb->resetTrackFlood();

                    $redirect = nv_redirect_decrypt($redirect);
                    if (empty($redirect)) {
                        nv_redirect_location(NV_BASE_SITEURL);
                    }
                    nv_redirect_location($redirect);
                }
            }
        }

        include NV_ROOTDIR . '/includes/header.php';

        if (!defined('NV_IS_AJAX') and file_exists(NV_ROOTDIR . '/' . NV_ASSETS_DIR . '/tpl/flood_blocker.tpl')) {
            $xtpl = new XTemplate('flood_blocker.tpl', NV_ROOTDIR . '/' . NV_ASSETS_DIR . '/tpl');
            $xtpl->assign('GLANG', $lang_global);
            $xtpl->assign('PAGE_TITLE', $lang_global['flood_page_title']);
            $xtpl->assign('IMG_SRC', NV_BASE_SITEURL . NV_ASSETS_DIR . '/images/load_bar.gif');
            $xtpl->assign('IMG_WIDTH', 33);
            $xtpl->assign('IMG_HEIGHT', 8);
            $xtpl->assign('FLOOD_BLOCKER_INFO1', $lang_global['flood_info1']);
            $xtpl->assign('FLOOD_BLOCKER_INFO2', $lang_global['flood_info2']);
            $xtpl->assign('FLOOD_BLOCKER_INFO3', $lang_global['sec']);
            $xtpl->assign('FLOOD_BLOCKER_TIME', $flb->flood_block_time);

            if ($captchaPass) {
                $xtpl->assign('TOKEND', NV_CHECK_SESSION);
                $xtpl->assign('SITE_KEY', $global_config['recaptcha_sitekey']);
                $xtpl->assign('CATPCHA_TYPE', $global_config['recaptcha_type']);
                $xtpl->assign('CATPCHA_LANG', NV_LANG_INTERFACE);
                $xtpl->assign('REDIRECT', nv_redirect_encrypt($client_info['selfurl']));
                $xtpl->parse('main.captchapass');
            }

            $xtpl->parse('main');
            echo $xtpl->text('main');
            exit();
        } else {
            trigger_error($lang_global['flood_info1'], 256);
        }
    }

    unset($rules, $flb);
}

unset($ip_exclusion, $e, $f, $array_except_flood_site, $array_except_flood_admin);
