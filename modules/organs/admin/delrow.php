<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-10-2010 18:49
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$id = $nv_Request->get_int( 'id', 'post,get', 0 );
$contents = $lang_module['del_lang_not_complete'];
if ( $id > 0 )
{
    $sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_rows` WHERE organid=" . intval( $id );
    $result = $db->sql_query( $sql );
    $row = $db->sql_fetchrow( $result, 2 );
    if ( ! empty( $row ) )
    {
        if ( $row['numsub'] == 0 && $row['numperson'] == 0 )
        {
            /////////////////////////////////////////////
            $query = "DELETE FROM `" . NV_PREFIXLANG . "_" . $module_data . "_rows` WHERE `organid`=" . intval( $id ) . "";
            if ( $db->sql_query( $query ) )
            {
                $db->sql_freeresult();
                nv_fix_row_order();
                $contents = $lang_module['del_lang_complete'];
            }
        }
        else
        {
        	$contents = $lang_module['del_lang_organ_error'];
        }
    }
}
nv_del_moduleCache( $module_name );

include ( NV_ROOTDIR . "/includes/header.php" );
echo $contents;
include ( NV_ROOTDIR . "/includes/footer.php" );

?>