<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010 11:33:22 AM
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

if( $nv_Request->isset_request( 'submit', 'post' ) )
{
	$array_config['per_page'] = $nv_Request->get_int( 'per_page', 'post', 10 );
	$array_config['organ_view_type'] = $nv_Request->get_int( 'organ_view_type', 'post', 0 );
	$array_config['organ_view_type_main'] = $nv_Request->get_int( 'organ_view_type_main', 'post', 1 );
	$array_config['thumb_width'] = $nv_Request->get_int( 'thumb_width', 'post', 80 );
	$array_config['thumb_height'] = $nv_Request->get_int( 'thumb_height', 'post', 100 );
//print_r($array_config);die;
	foreach( $array_config as $config_name => $config_value )
	{
		$query = "REPLACE INTO " . NV_PREFIXLANG . "_" . $module_data . "_config VALUES (" . $db->quote( $config_name ) . "," . $db->quote( $config_value ) . ")";
		$db->query( $query );//echo($query.'<br>');
	}//die;
	$nv_Cache->delMod( $module_name );

	Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op );
	die();
}

$sql = "SELECT config_name, config_value FROM " . NV_PREFIXLANG . "_" . $module_data . "_config";
$result = $db->query( $sql );
while( list( $c_config_name, $c_config_value ) = $result->fetch( 3 ) )
{
	$array_config[$c_config_name] = $c_config_value;
}

$array_config['is_cus'] = ! empty( $array_config['is_cus'] ) ? " checked=\"checked\"" : "";

$xtpl = new XTemplate( "config.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'DATA', $array_config );

$arr_organ_view = array( $lang_module['config_organ_view_0'], $lang_module['config_organ_view_1'] );
foreach( $arr_organ_view as $id => $organ )
{
	$xtpl->assign( 'VIEW_TYPE', array( 'key' => $id, 'title' => $organ, 'selected' => $id == $array_config['organ_view_type'] ? 'selected="selected"' : '' ) );
	$xtpl->parse( 'main.view_type' );
}

$arr_organ_view_main = array( $lang_module['config_organ_view_main_0'], $lang_module['config_organ_view_main_1'] );
//print_r($array_config);die;
foreach( $arr_organ_view_main as $id => $organ )
{//die($array_config['organ_view_type_main'].'');
	$xtpl->assign( 'VIEW_TYPE_MAIN', array( 'key' => $id, 'title' => $organ, 'selected' => $id == $array_config['organ_view_type_main'] ? 'selected="selected"' : '' ) );
	$xtpl->parse( 'main.view_type_main' );
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

$page_title = $lang_module['config'];

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );