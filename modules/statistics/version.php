<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 05/07/2010 09:47
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE')) {
    die('Stop!!!');
}

$module_version = array(
    'name' => 'Statistics',
    'modfuncs' => 'main,allreferers,allcountries,allbrowsers,allos,allbots,referer',
    'change_alias' => 'allreferers,allcountries,allbrowsers,allos,allbots,referer',
    'submenu' => 'main,allreferers,allcountries,allbrowsers,allos,allbots',
    'layoutdefault' => 'body:main,allreferers,allcountries,allbrowsers,allos,allbots',
    'is_sysmod' => 0,
    'virtual' => 2,
    'version' => '4.3.08',
    'date' => 'Saturday, December 28, 2019 16:00:00 GMT+07:00',
    'author' => 'VINADES <contact@vinades.vn>',
    'note' => ''
);