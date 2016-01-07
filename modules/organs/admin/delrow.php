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
$contents = $lang_module['del_lang_not_complete'];
if ( $id > 0 )
{
    $sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows WHERE organid=" . intval( $id );
    $result = $db->query( $sql );
    $row = $result->fetch();
    if ( ! empty( $row ) )
    {
        if ( $row['numsub'] == 0 && $row['numperson'] == 0 )
        {
            /////////////////////////////////////////////
            $query = "DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows WHERE organid=" . intval( $id ) . "";
            if ( $db->query( $query ) )
            {
                //$xxx->closeCursor();
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
$nv_Cache->delMod( $module_name );

include NV_ROOTDIR . '/includes/header.php';
echo $contents;
include NV_ROOTDIR . '/includes/footer.php';