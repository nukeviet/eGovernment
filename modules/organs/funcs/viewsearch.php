<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:32:04 AM
 */

if ( ! defined( 'NV_IS_MOD_ORGAN' ) ) die( 'Stop!!!' );
$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];

$per_page = $arr_config['per_page'];

//get pages
$page = 0;

$query = '';
$q = $nv_Request->get_string( 'q', 'get', '' );
if ( !empty ($q)) $query .= ' WHERE name like '%' . $db->dblikeescape( $q ) . '%' ';

$oid = $nv_Request->get_int( 'oid', 'get', 0 );
if ( $oid > 0 && empty ($q))
{
	$query .= ' WHERE organid = ' . intval( $oid ) . ' ';
}
elseif( $oid > 0 && !empty ($q) )
{
	$query .= ' AND organid = ' . intval( $oid ) . ' ';
}

$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&oid='.$oid+'&q='.$q;

$sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_person '.$query.' ORDER BY weight LIMIT ' . $page . ',' . $per_page . '';
$result = $db->query( $sql );
$result_all = $db->query( 'SELECT FOUND_ROWS()' );
$numf = $result_all->fetchColumn();
$all_page = ( $numf ) ? $numf : 1;
$person_data = array();
while ( $row = $result->fetch() )
{
   	if( !empty( $row['photo'] ) and file_exists( NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/' . $row['photo'] ) )
	{
		$row['photo'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $row['photo'];
	}
	elseif( !empty( $row['photo'] ) and file_exists( NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['photo'] ) )
	{
		$row['photo'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['photo'];
	}
	else
	{
		$row['photo'] = NV_BASE_SITEURL . 'themes/' . $global_config['site_theme'] . '/images/' . $module_file . '/no-avatar.jpg';
	}

    $row['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=person/' . $global_organ_rows[$row['organid']]['alias'] . '-' . $row['organid'] . '/' . change_alias( $row['name'] ) . '-' . $row['personid'];
    $person_data[] = $row;
}
$html_pages = nv_alias_page( $page_title, $base_url, $all_page, $per_page, $page );
$contents = searchresult( $person_data,$html_pages );

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';