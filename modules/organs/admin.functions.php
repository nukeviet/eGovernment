<?php
/**
 * @Project NUKEVIET 3.0
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES ., JSC. All rights reserved
 * @Createdate Dec 3, 2010  11:11:28 AM 
 */

if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );

$submenu['addrow'] = $lang_module['addrow_title'];
$submenu['addper'] = $lang_module['addper_title'];
$allow_func = array( 
    'main', 'config', 'delrow', 'actrow', 'addrow', 'changeorgan', 'listper', 'actper', 'delper', 'changeper' , 'addper'
);

define( 'NV_IS_FILE_ADMIN', true );

//**//
function nv_fix_row_order ( $parentid = 0, $order = 0, $lev = 0 )
{
    global $db, $db_config, $lang_module, $lang_global, $module_name, $module_data, $op;
    $query = "SELECT `organid`, `parentid` FROM `" . NV_PREFIXLANG . "_" . $module_data . "_rows` WHERE `parentid`=" . $parentid . " ORDER BY `weight` ASC";
    $result = $db->sql_query( $query );
    $array_cat_order = array();
    while ( $row = $db->sql_fetchrow( $result ) )
    {
        $array_cat_order[] = $row['organid'];
    }
    $db->sql_freeresult();
    $weight = 0;
    if ( $parentid > 0 )
    {
        $lev ++;
    }
    else
    {
        $lev = 0;
    }
    foreach ( $array_cat_order as $catid_i )
    {
        $order ++;
        $weight ++;
        $sql = "UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "_rows` SET `weight`=" . $weight . ", `order`=" . $order . ", `lev`='" . $lev . "' WHERE `organid`=" . intval( $catid_i );
        $db->sql_query( $sql );
        $order = nv_fix_row_order( $catid_i, $order, $lev );
    }
    $numsubcat = $weight;
    if ( $parentid > 0 )
    {
        $sql = "UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "_rows` SET `numsub`=" . $numsubcat;
        if ( $numsubcat == 0 )
        {
            $sql .= ",`suborgan`=''";
        }
        else
        {
            $sql .= ",`suborgan`='" . implode( ",", $array_cat_order ) . "'";
        }
        $sql .= " WHERE `organid`=" . intval( $parentid );
        $db->sql_query( $sql );
    }
    return $order;
}

///////////////////////
function drawselect_number ( $select_name = "", $number_start = 0, $number_end = 1, $number_curent = 0, $func_onchange = "", $enable ="" )
{ 
    $html = "<select name=\"" . $select_name . "\" onchange=\"" . $func_onchange . "\" ".$enable.">";
    for ( $i = $number_start; $i < $number_end; $i ++ )
    {
        $select = ( $i == $number_curent ) ? "selected=\"selected\"" : "";
        $html .= "<option value=\"" . $i . "\"" . $select . ">" . $i . "</option>";
    }
    $html .= "</select>";
    return $html;
}

function nv_fix_organ ( $organid = 0 )
{
    global $db, $db_config, $lang_module, $lang_global, $module_name, $module_data, $op;
    $query = "SELECT count(*) FROM `" . NV_PREFIXLANG . "_" . $module_data . "_person` WHERE `organid`=" . $organid . "";
    $result = $db->sql_query( $query );
    $numperson = 0;
    list( $numperson ) = $db->sql_fetchrow( $result );
    $sql = "UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "_rows` SET `numperson`=" . $numperson . " WHERE `organid`=" . $organid . "";
    $db->sql_query( $sql );
}

function nv_fix_personweight ( $organid = 0 )
{
    global $db, $db_config, $lang_module, $lang_global, $module_name, $module_data, $op;
    $table = NV_PREFIXLANG . "_" . $module_data . "_person";
    /////////////////////////
    $query = "SELECT `personid` FROM `" . $table . "` WHERE `organid` =" . $organid . " ORDER BY `weight` ASC";
    $result = $db->sql_query( $query );
    $weight = 0;
    while ( $row = $db->sql_fetchrow( $result ) )
    {
        $weight ++;
        $sql = "UPDATE `" . $table . "` SET `weight`=" . $weight . " WHERE `personid`=" . intval( $row['personid'] );
        $db->sql_query( $sql );
    }
    //////////////////////////
}
function getall_organid_of_parent ($array_organs,$pid)
{
	$array_id = array();
	foreach ( $array_organs as $organid => $info )
	{
		if ( $pid == $info['parentid'] )
		{
			$array_id[]= $organid;
			if ( $info['numsub'] > 0 ) 
			{
				$temp_array = getall_organid_of_parent ($array_organs,$organid);
				$array_id = array_merge($array_id,$temp_array);
			}
		}
	}
	return $array_id;
}
function getall_numper_of_parent ($array_organs,$pid)
{
	$count = $array_organs[$pid]['numperson'];
	foreach ( $array_organs as $organid => $info )
	{
		if ( $info['parentid'] == $pid )
		{
			$count = $count + $info['numperson'];
			if ( $info['numsub'] > 0 ) 
			{
				$count = $count + getall_numper_of_parent ($array_organs,$organid);
			}
		}
	}
	return $count;
} 
function getall_organid_parent ($array_organs,$oid)
{
	$array_id = array();
	if ( $array_organs[$oid]['parentid'] > 0 )
	{
		$array_id[] = $array_organs[$oid]['parentid'];
		$temp_array = getall_organid_parent($array_organs,$array_organs[$oid]['parentid']);
		$array_id = array_merge($array_id,$temp_array);
	}
	return $array_id;
}
?>