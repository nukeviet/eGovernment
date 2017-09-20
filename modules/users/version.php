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
    'name' => 'Users',
    'modfuncs' => 'main,login,logout,register,lostpass,active,editinfo,avatar,lostactivelink,memberlist,groups',
    'submenu' => 'main,login,logout,register,lostpass,active,editinfo,lostactivelink,memberlist',
    'is_sysmod' => 1,
    'virtual' => 1,
    'version' => '4.2.01',
    'date' => 'Sat, 5 Aug 2017 13:00:00 GMT',
    'author' => 'VINADES <contact@vinades.vn>',
    'note' => ''
);