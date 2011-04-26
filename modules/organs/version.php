<?php
/**
 * @Project NUKEVIET 3.0
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES ., JSC. All rights reserved
 * @Createdate Dec 3, 2010  11:24:58 AM 
 */

$module_version = array( 
    "name" => "Organs", //
    "modfuncs" => "main, vieworg, person, viewsearch", //
    "submenu" => "", //
	"is_sysmod" => 0, //
    "virtual" => 1, //
    "version" => "3.0.01", //
    "date" => "Fri, 7 May 2010 09:47:15 GMT", //
    "author" => "VINADES (contact@vinades.vn)", //
    "note" => "", 
    "uploads_dir" => array( 
        $module_name, $module_name . "/thumb", $module_name . "/" . date( "Y_m" ) 
    ) 
);

?>