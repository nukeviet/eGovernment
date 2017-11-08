<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:24:58 AM
 */

$module_version = array(
    'name' => 'Organs',
    'modfuncs' => 'main, vieworg, person, viewsearch',
    'submenu' => '',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '4.3.00',
    'date' => 'Fri, June 16, 2017 9:15:30 AM',
    'author' => 'VINADES (contact@vinades.vn)',
    'note' => '',
    'uploads_dir' => array(
        $module_name,
        $module_name . '/' . date('Y_m')
    )
);
