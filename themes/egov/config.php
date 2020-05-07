<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 17 Apr 2014 04:03:46 GMT
 */

if (!defined('NV_IS_FILE_THEMES')) {
    die('Stop!!!');
}

$config_value = 0;
if ($nv_Request->isset_request('submit', 'post')) {

    $config_value = $nv_Request->get_int('color_default', 'post', 0);
    if (isset($module_config['themes'][$selectthemes])) {
        $sth = $db->prepare("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value= :config_value WHERE config_name = :config_name AND lang = '" . NV_LANG_DATA . "' AND module='themes'");
    } else {
        $sth = $db->prepare("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . NV_LANG_DATA . "', 'themes', :config_name, :config_value)");
    }

    $sth->bindParam(':config_name', $selectthemes, PDO::PARAM_STR);
    $sth->bindParam(':config_value', $config_value, PDO::PARAM_STR, strlen($config_value));
    $sth->execute();
    $nv_Cache->delMod('settings');
    $gfonts = new NukeViet\Client\Gfonts();
    $gfonts->destroyAll();
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&selectthemes=' . $selectthemes . '&rand=' . nv_genpass());
} else {
    $config_value = $db->query('SELECT config_value FROM ' . NV_CONFIG_GLOBALTABLE . ' WHERE `module` = "themes"')->fetchColumn();
}
if (!empty($config_value)) {
    $module_config['themes'][$selectthemes] = $config_value;
}

$xtpl = new XTemplate('config.tpl', NV_ROOTDIR . '/themes/' . $selectthemes . '/system');
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('NV_ADMIN_THEME', $global_config['admin_theme']);
$xtpl->assign('SELECTTHEMES', $selectthemes);
$xtpl->assign('UPLOADS_DIR', NV_UPLOADS_DIR . '/' . $module_upload);

if (isset($config_value)) {
    $xtpl->assign('THEME_COLOR_CHECKED_1', ($config_value == 1) ? ' checked="checked"' : '');
    $xtpl->assign('THEME_COLOR_CHECKED_2', ($config_value == 2) ? ' checked="checked"' : '');
    $xtpl->assign('THEME_COLOR_CHECKED_3', ($config_value == 3) ? ' checked="checked"' : '');
    $xtpl->assign('THEME_COLOR_CHECKED_4', ($config_value == 4) ? ' checked="checked"' : '');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');
