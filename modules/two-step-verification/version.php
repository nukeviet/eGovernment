<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2010 - 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE')) {
    die('Stop!!!');
}

$module_version = array(
    'name' => 'Two-Step Verification',
    'modfuncs' => 'main,setup,confirm',
    'submenu' => 'main,setup,confirm',
    'is_sysmod' => 1,
    'virtual' => 0,
    'version' => '4.3.08',
    'date' => 'Saturday, December 28, 2019 16:00:00 GMT+07:00',
    'author' => 'VINADES <contact@vinades.vn>',
    'note' => 'Two-Step Verification'
);