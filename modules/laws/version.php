<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 27 Jul 2011 14:55:22 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$module_version = array(
	"name" => "Laws",
	"modfuncs" => "main,detail,search,area,cat,subject,signer",
	"submenu" => "main,detail,search,area,cat,subject,signer",
	'change_alias' => 'detail',
	"is_sysmod" => 0,
	"virtual" => 1,
	"version" => "4.1.02",
	"date" => "Mon, 10 Apr 2017 07:43:32 GMT",
	"author" => "VINADES (contact@vinades.vn)",
	"uploads_dir" => array($module_upload),
	"note" => "Modules văn bản pháp luật"
);