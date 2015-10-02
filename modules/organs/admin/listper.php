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

$page = $nv_Request->get_int( 'page', 'get', 1 );
$organid = $nv_Request->get_int( 'pid', 'get', 0 );

$where = '';
$base_url = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "&pid=" . $organid;

$array_search = array(
	'q' => $nv_Request->get_title( 'q', 'get', '' ),
	'organid' => $nv_Request->get_int( 'organid', 'get', 0 ),
	'active' => $nv_Request->get_int( 'active', 'get', '-1' ),
	'per_page' => $nv_Request->get_int( 'per_page', 'get', '20' )
);
$per_page = $array_search['per_page'];

if( !empty( $array_search['q'] ) )
{
	$base_url .= '&q=' . $array_search['q'];
	$where .= ' AND t1.name LIKE "%' . $array_search['q'] . '%" OR t1.phone_ext LIKE "%' . $array_search['q'] . '%" OR t1.mobile LIKE "%' . $array_search['q'] . '%" OR t1.email LIKE "%' . $array_search['q'] . '%" OR t1.position LIKE "%' . $array_search['q'] . '%" OR t1.position_other LIKE "%' . $array_search['q'] . '%" OR t1.address LIKE "%' . $array_search['q'] . '%" OR t1.phone LIKE "%' . $array_search['q'] . '%" OR t1.description LIKE "%' . $array_search['q'] . '%"';
}
if( !empty( $array_search['organid'] ) )
{
	$base_url .= '&organid=' . $array_search['organid'];
	$where .= ' AND t1.organid=' . $array_search['organid'];
}
if( $array_search['active'] >= 0 )
{
	$base_url .= '&active=' . $array_search['active'];
	$where .= ' AND t1.active=' . $array_search['active'];
}
$base_url .= '&per_page=' . $array_search['per_page'];

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
$xtpl->assign( 'GLANG', $lang_global );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );
$xtpl->assign( 'SEARCH', $array_search );

$sql = "SELECT SQL_CALC_FOUND_ROWS t1.* FROM " . NV_PREFIXLANG . "_" . $module_data . "_person t1 inner join " . NV_PREFIXLANG . "_" . $module_data . "_rows t2 on t1.organid = t2.organid WHERE t1.organid IN (" . $list_chid_str . ") " . $where . " ORDER BY t2.orders,t1.weight LIMIT " . ( $page - 1 ) * $per_page . "," . $per_page;
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
    $row['link_view'] = nv_url_rewrite(NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=person/" . $array_organs[$row['organid']]['alias'] . "-" . $row['organid'] . "/" . change_alias( $row['name'] ) . "-" . $row['personid'], true);
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

if( !empty( $array_organs ) )
{
	foreach( $array_organs as $organid => $value )
	{
		$value['space'] = '';
		if( $value['lev'] > 0 )
		{
			for( $i = 1; $i <= $value['lev']; $i++ )
			{
				$value['space'] .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
		}
		$value['selected'] = $organid == $array_search['organid'] ? ' selected="selected"' : '';

		$xtpl->assign( 'ORGANS', $value );
		$xtpl->parse( 'main.organs' );
	}
}

$array_active = array(
	'1' => $lang_global['yes'],
	'0' => $lang_global['no']
);
foreach( $array_active as $key => $value )
{
	$sl = $array_search['active'] == $key ? 'selected="selected"' : '';
	$xtpl->assign( 'ACTIVE', array( 'key' => $key, 'value' => $value, 'selected' => $sl ) );
	$xtpl->parse( 'main.active' );
}

for( $i = 5; $i <= 100; $i+=5 )
{
	$sl = $array_search['per_page'] == $i ? 'selected="selected"' : '';
	$xtpl->assign( 'PER_PAGE', array( 'key' => $i, 'selected' => $sl ) );
	$xtpl->parse( 'main.per_page' );
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';