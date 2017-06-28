<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Tue, 27 Jun 2017 09:19:44 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) )
{
	die( 'Stop!!!' );
}

$db_config['dbhost'] = '127.0.0.1';
$db_config['dbport'] = '';
$db_config['dbname'] = 'egov_nukeviet';
$db_config['dbsystem'] = 'egov_nukeviet';
$db_config['dbuname'] = 'egov_nukeviet';
$db_config['dbpass'] = 'IyeXh41v2rvN6JXVGwGx';
$db_config['dbtype'] = 'mysql';
$db_config['collation'] = 'utf8_general_ci';
$db_config['charset'] = 'utf8';
$db_config['persistent'] = false;
$db_config['prefix'] = 'nv4';

$global_config['site_domain'] = '';
$global_config['name_show'] = 0;
$global_config['idsite'] = 0;
$global_config['sitekey'] = '6eba99679d1e1b0486f3cd5365c1f87a';// Do not change sitekey!
$global_config['hashprefix'] = '{SSHA512}';
$global_config['cached'] = 'files';
$global_config['session_handler'] = 'files';
$global_config['extension_setup'] = 3; // 0: No, 1: Upload, 2: NukeViet Store, 3: Upload + NukeViet Store