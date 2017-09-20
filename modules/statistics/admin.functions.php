<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 19 Apr 2015 11:35:18 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

//Ket noi ngon ngu cua module
if (file_exists(NV_ROOTDIR . '/modules/' . $module_file . '/language/' . NV_LANG_INTERFACE . '.php')) {
    require NV_ROOTDIR . '/modules/' . $module_file . '/language/' . NV_LANG_INTERFACE . '.php';
} elseif (file_exists(NV_ROOTDIR . '/modules/' . $module_file . '/language/' . NV_LANG_DATA . '.php')) {
    require NV_ROOTDIR . '/modules/' . $module_file . '/language/' . NV_LANG_DATA . '.php';
} elseif (file_exists(NV_ROOTDIR . '/modules/' . $module_file . '/language/en.php')) {
    require NV_ROOTDIR . '/modules/' . $module_file . '/language/en.php';
}

$allow_func = array(
    'main',
    'allbots',
    'allbrowsers',
    'allcountries',
    'allos',
    'allreferers',
    'referer'
);

$submenu['allbots'] = $lang_module['bot'];
$submenu['allbrowsers'] = $lang_module['browser'];
$submenu['allcountries'] = $lang_module['country'];
$submenu['allos'] = $lang_module['os'];
$submenu['allreferers'] = $lang_module['referer'];

$module_info['alias'] = array();
$module_info['alias']['allbots'] = 'allbots';
$module_info['alias']['allbrowsers'] = 'allbrowsers';
$module_info['alias']['allcountries'] = 'allcountries';
$module_info['alias']['allos'] = 'allos';
$module_info['alias']['allreferers'] = 'allreferers';

define('NV_IS_MOD_STATISTICS', true);

//Document
$array_url_instruction['main'] = 'https://wiki.nukeviet.vn/nukeviet4:admin:statistics';
$array_url_instruction['allbots'] = 'https://wiki.nukeviet.vn/nukeviet4:admin:statistics:allbots';
$array_url_instruction['allbrowsers'] = 'https://wiki.nukeviet.vn/nukeviet4:admin:statistics:allbrowsers';
$array_url_instruction['allcountries'] = 'https://wiki.nukeviet.vn/nukeviet4:admin:statistics:allcountries';
$array_url_instruction['allos'] = 'https://wiki.nukeviet.vn/nukeviet4:admin:statistics:allos';
$array_url_instruction['allreferers'] = 'https://wiki.nukeviet.vn/nukeviet4:admin:statistics:allreferers';

define('NV_BASE_MOD_URL', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);

$module_info['template'] = 'default';
if (file_exists(NV_ROOTDIR . '/themes/' . $module_info['template'] . '/css/' . $module_file . '.css')) {
    $my_head = "<link rel=\"StyleSheet\" href=\"" . NV_BASE_SITEURL . "themes/" . $module_info['template'] . "/css/" . $module_file . ".css\" type=\"text/css\" />\n";
}

require NV_ROOTDIR . '/modules/' . $module_file . '/theme.php';

function nv_site_theme($contents)
{
    return nv_admin_theme($contents);
}