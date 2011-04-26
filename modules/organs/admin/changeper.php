<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 2-10-2010 18:49
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$personid = $nv_Request->get_int( 'personid', 'post', 0 );
$new_weight = $nv_Request->get_int( 'w', 'post', 0 );
$content = "NO_" . $personid;
$table = NV_PREFIXLANG . "_" . $module_data . "_person";
list( $personid, $organid, $old_weight ) = $db->sql_fetchrow( $db->sql_query( "SELECT `personid` , `organid`, `weight` FROM `" . $table . "` WHERE `personid`=" . intval( $personid ) . "" ) );
if ( $personid > 0 )
{
    list( $personid_swap ) = $db->sql_fetchrow( $db->sql_query( "SELECT `personid` FROM `" . $table . "` WHERE `organid` = ". intval($organid) ." AND `weight` = " .intval($new_weight) ) );
    $sql = "UPDATE `" . $table . "` SET `weight`=" . $new_weight . " WHERE `personid`=" . intval( $personid );
    $db->sql_query( $sql );
    $sql = "UPDATE `" . $table . "` SET `weight`=" . $old_weight . " WHERE `personid`=" . intval( $personid_swap );
    $db->sql_query( $sql );
    $content = "OK_" . $personid;
    nv_del_moduleCache( $module_name );
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo $content;
include ( NV_ROOTDIR . "/includes/footer.php" );

?>