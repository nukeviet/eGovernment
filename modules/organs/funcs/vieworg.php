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

$temp = explode('-',$array_op[1]);
if (!empty($temp))
{
	$id = end ($temp); 
}
else
{
	$id = 0;
}
$person_data = $organs_data = array();

$sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_rows` WHERE organid=" . intval( $id );
$result = $db->sql_query( $sql );
$organs_data = $db->sql_fetchrow( $result, 2 );
if ( empty ( $organs_data )) die('Stop!!!');
else 
{
	$sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_person` WHERE organid=" . intval( $id );
	$result = $db->sql_query( $sql );
	while ( $row = $db->sql_fetchrow( $result, 2 ))
	{
		$person_data[] = $row;
	}
}

$contents = vieworg( $organs_data,$person_data );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>