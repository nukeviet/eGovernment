<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 18:49
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$id = $nv_Request->get_int( 'id', 'post,get', 0 );
$value = $nv_Request->get_int( 'value', 'post,get', 0 );
$contents = $lang_module['active_change_not_complete']; 
if ( $id > 0 )
{
	$query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_rows SET active=" . $value . " WHERE organid=".$id;
	if ( $db->query( $query ) )
    {
        //$xxx->closeCursor();
        $contents = $lang_module['active_change_complete'];
    }
}
$nv_Cache->delMod( $module_name );
echo $contents;