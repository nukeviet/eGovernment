<?php
/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-10-2010 18:49
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$id = $nv_Request->get_int( 'id', 'post,get', 0 );
$value = $nv_Request->get_int( 'value', 'post,get', 0 );
$contents = $lang_module['active_change_not_complete']; 
if ( $id > 0 )
{
	$query = "UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "_rows` SET `active`=" . $value . " WHERE organid=".$id;
	if ( $db->sql_query( $query ) )
    {
        $db->sql_freeresult();
        $contents = $lang_module['active_change_complete'];
    }
}
nv_del_moduleCache( $module_name );
echo $contents;
?>