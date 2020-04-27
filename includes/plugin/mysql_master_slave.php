<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 07 Mar 2015 03:43:56 GMT
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

/*
 * Note Config: add code to file config.php
 * $db_config['slave'] = array();
 * $db_config['slave'][1]['dbhost'] = 'ip1_mysql_slave';
 * $db_config['slave'][1]['dbport'] = '';
 * $db_config['slave'][1]['dbuname'] = 'dbuname_slave';
 * $db_config['slave'][1]['dbpass'] = 'dbpass_slave';
 * // config mysql slave 2
 * $db_config['slave'][2]['dbhost'] = 'ip2_mysql_slave';
 * $db_config['slave'][2]['dbport'] = '';
 * $db_config['slave'][2]['dbuname'] = 'dbuname_slave';
 * $db_config['slave'][2]['dbpass'] = 'dbpass_slave';
 * // config mysql slave 3
 * $db_config['slave'][3]['dbhost'] = 'ip3_mysql_slave';
 * $db_config['slave'][3]['dbport'] = '';
 * $db_config['slave'][3]['dbuname'] = 'dbuname_slave';
 * $db_config['slave'][3]['dbpass'] = 'dbpass_slave';*
 */
if (empty($db_config['slave'])) {
    $db_slave = $db;
} else {
    $i = rand(1, sizeof($db_config['slave']));
    $db_config_slave = $db_config['slave'][$i];
    $db_config_slave['dbname'] = $db_config['dbname'];
    $db_config_slave['dbtype'] = $db_config['dbtype'];
    $db_config_slave['collation'] = $db_config['collation'];
    $db_config_slave['charset'] = $db_config['charset'];
    $db_config_slave['persistent'] = $db_config['persistent'];

    $db_slave = new NukeViet\Core\Database($db_config_slave);
    if (empty($db_slave->connect)) {
        trigger_error('Sorry! Could not connect to data server slave ' . $db_config_slave['dbhost']);
        $db_slave = $db;
    }
}
