<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:33:22 AM 
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['list_person'];
$per_page = 20;
$page = $nv_Request->get_int( 'page', 'get', 1 );
$organid = $nv_Request->get_int( 'pid', 'get', 0 );

$base_url = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "&pid=" . $organid;

$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows ORDER BY orders ASC ";
$result = $db->query( $sql );
$array_organs = array();
while ( $row = $result->fetch() )
{
    $array_organs[$row['organid']] = $row;
}

if ( ! empty( $array_organs[$organid] ) )
{
    $array_id = getall_organid_parent( $array_organs, $organid );
    $temp_title = "";
    foreach ( $array_id as $id_i )
    {
        $link = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=listper&amp;pid=" . $id_i;
        $temp_title .= "<a href=\"" . $link . "\">" . $array_organs[$id_i]['title'] . "</a>" . " -> ";
    }
    $page_title = $lang_module['list_person'] . $lang_module['main_sub'] . $temp_title . $array_organs[$organid]['title'];
}

$list_chid = getall_organid_of_parent( $array_organs, $organid );
$list_chid_str = $organid;
if ( ! empty( $list_chid ) ) $list_chid_str = $list_chid_str . ',' . implode( ',', $list_chid );

$xtpl = new XTemplate( "listper.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );

$sql = "SELECT SQL_CALC_FOUND_ROWS t1.* FROM " . NV_PREFIXLANG . "_" . $module_data . "_person t1 inner join " . NV_PREFIXLANG . "_" . $module_data . "_rows t2 on t1.organid = t2.organid WHERE t1.organid IN (" . $list_chid_str . ") ORDER BY t2.orders,t1.weight LIMIT " . ( $page - 1 ) * $per_page . "," . $per_page;
$result = $db->query( $sql );

$result_all = $db->query( "SELECT FOUND_ROWS()" );
$numf = $result_all->fetchColumn();
$all_page = ( $numf ) ? $numf : 1;

$i = ( $page - 1 ) * $per_page + 1;
while ( $row = $result->fetch() )
{
    $ck_yes = "";
    $ck_no = "";
    ///////////////////////////////////////////////
    $class = ( $i % 2 ) ? " class=\"second\"" : "";
    if ( $row['active'] == '1' )
    {
        $ck_yes = "selected=\"selected\"";
        $ck_no = "";
    }
    else
    {
        $ck_yes = "";
        $ck_no = "selected=\"selected\"";
    }
    $row['num_no'] = $i;
    $xtpl->assign( 'CHECK_NO', $ck_no );
    $xtpl->assign( 'CHECK_YES', $ck_yes );
    $xtpl->assign( 'class', $class );
    $enable = ( $row['organid'] != $organid ) ? "disabled=\"disabled\"" : "";
    $row['link_edit'] = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=addper&amp;id=" . $row['personid'];
    $row['link_del'] = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=delper&amp;id=" . $row['personid'] . "&amp;oid=" . $organid;
    if ( empty( $list_chid ) ) 
	{
		$row['select_weight'] = drawselect_number( $row['personid'], 1, $all_page + 1, $row['weight'], "nv_chang_person('" . $row['personid'] . "',this,url_change_weight,url_back);", $enable );
	}
	else {
		$row['select_weight'] = $i;
	}
    
    $xtpl->assign( 'ROW', $row );
	
    $xtpl->parse( 'main.row' );
    $i ++;
}
$xtpl->assign( 'URL_BACK', NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "&pid=" . $organid );
$xtpl->assign( 'URL_DELALL', NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=delper&oid=" . $organid );
$xtpl->assign( 'URL_CHANGE', NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=actper" );
$xtpl->assign( 'URL_CHANGE_WEIGHT', NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=changeper" );
$xtpl->assign( 'URL_ADD', NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=addper" . "&amp;pid=" . $organid );

$xtpl->assign( 'PAGES', nv_generate_page( $base_url, $all_page, $per_page, $page ) );
$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';