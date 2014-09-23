<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-10-2010 18:49
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$id = $nv_Request->get_int( 'id', 'post,get', 0 );
$oid = $nv_Request->get_int( 'oid', 'post,get', 0 );
$contents = $lang_module['del_lang_not_complete'];
if ( $id > 0 )
{
    /////////////////////////////////////////////
    $query = "DELETE FROM `" . NV_PREFIXLANG . "_" . $module_data . "_person` WHERE `personid`=" . intval( $id ) . "";
    if ( $db->sql_query( $query ) )
    {
        $db->sql_freeresult();
        nv_fix_row_order();
        $contents = $lang_module['del_lang_complete'];
    }
}
else
{
	$listall = $nv_Request->get_string( 'listall', 'post,get' );
    if (!empty($listall))
    {
    	$sql = "DELETE FROM `" . NV_PREFIXLANG . "_" . $module_data . "_person` WHERE `personid` IN (" . $listall . ")";
	    $result = $db->sql_query( $sql );
	    $contents = $lang_module['del_lang_complete'];
    }
}
nv_fix_organ ($oid);
nv_fix_personweight ( $oid );
nv_del_moduleCache( $module_name );

echo $contents;
exit();

?>