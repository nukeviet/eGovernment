<?php
/**
 * @Project NUKEVIET 3.0
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES ., JSC. All rights reserved
 * @Createdate Dec 3, 2010  11:32:04 AM 
 */

if ( ! defined( 'NV_IS_MOD_ORGAN' ) ) die( 'Stop!!!' );
$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];
$per_page = 30;
//get pages
$page = 0;

$query = "";
$q = $nv_Request->get_string( 'q', 'get', '' );
if ( !empty ($q)) $query .= " WHERE `name` like '%" . $db->dblikeescape( $q ) . "%' ";

$oid = $nv_Request->get_int( 'oid', 'get', 0 );
if ( $oid > 0 && empty ($q)) 
{ 
	$query .= " WHERE `organid` = " . intval( $oid ) . " ";
}
elseif( $oid > 0 && !empty ($q) )
{
	$query .= " AND `organid` = " . intval( $oid ) . " ";
}

$base_url = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "&oid=".$oid+"&q=".$q;

$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_person` ".$query." ORDER BY `weight` LIMIT " . $page . "," . $per_page . "";
$result = $db->sql_query( $sql );
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $numf ) = $db->sql_fetchrow( $result_all );
$all_page = ( $numf ) ? $numf : 1;
$person_data = array();
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
    if ( ! empty( $row['photo'] ) )
    {
        $urlimg = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_name . '/' . $row['photo'];
        $imageinfo = nv_ImageInfo( $urlimg, 200, true, NV_UPLOADS_REAL_DIR . '/' . $module_name . '/thumb' );
        $row['photo'] = $imageinfo['src'];
    }
    $row['link'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=person/" . $global_organ_rows[$row['organid']]['alias'] . "-" . $row['organid'] . "/" . change_alias( $row['name'] ) . "-" . $row['personid'];
    $person_data[] = $row;
}
$html_pages = nv_ograns_page( $base_url, $all_page, $per_page, $page );
$contents = searchresult( $person_data,$html_pages );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>