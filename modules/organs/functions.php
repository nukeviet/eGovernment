<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:12:21 AM
 */

if( ! defined( 'NV_SYSTEM' ) ) die( 'Stop!!!' );

define( 'NV_IS_MOD_ORGAN', true );

global $global_organ_rows;
$global_organ_rows = array();
$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=vieworg";
$sql = "SELECT organid, parentid, title, alias, description, numsub, suborgan, numperson,view,lev, email, phone, fax FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows" . " WHERE active=1 ORDER BY orders ASC";
$result = $db->query( $sql );
$array_cat_list = array();
while( list( $organid_i, $parentid_i, $title_i, $alias_i, $description, $numsub_i, $suborgan_i, $numperson_i, $view_i, $lev_i, $email, $phone, $fax ) = $result->fetch( 3 ) )
{
	$link_i = $link . "/" . $alias_i . "-" . $organid_i;
	$global_organ_rows[$organid_i] = array(
		"organid" => $organid_i,
		"parentid" => $parentid_i,
		"title" => $title_i,
		"alias" => $alias_i,
		"description" => $description,
		"link" => $link_i,
		"suborgan" => $suborgan_i,
		"numperson" => $numperson_i,
		"numsub" => $numsub_i,
		'view' => $view_i,
		'lev' => $lev_i,
		'email' => $email,
		'phone' => $phone,
		'fax' => $fax 
	);
}

$arr_config = array();
$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_config ";
$result = $db->query( $sql );
while( $r = $result->fetch() )
{
	$arr_config[$r['config_name']] = $r['config_value'];
}

function nv_link_edit_org( $id )
{
	global $lang_global, $module_name;
	$link = "<em class=\"fa fa-edit fa-lg\">&nbsp;</em><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=addrow&amp;id=" . $id . "\">" . $lang_global['edit'] . "</a>";
	return $link;
}

function nv_link_delete_org( $id )
{
	global $lang_global, $module_name, $lang_module;
	$link = "<em class=\"fa fa-trash-o fa-lg\">&nbsp;</em><a href=\"javascript:void(0);\" onclick=\"nv_del_org(" . $id . ",'" . NV_BASE_ADMINURL . "','" . $lang_module['del_config'] . "')\">" . $lang_global['delete'] . "</a>";
	return $link;
}

function nv_link_edit_per( $id )
{
	global $lang_global, $module_name;
	$link = "<em class=\"fa fa-edit fa-lg\">&nbsp;</em><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=addper&amp;id=" . $id . "\">" . $lang_global['edit'] . "</a>";
	return $link;
}

function nv_link_delete_per( $id )
{
	global $lang_global, $module_name, $lang_module;
	$link = "<em class=\"fa fa-trash-o fa-lg\">&nbsp;</em><a href=\"javascript:void(0);\" onclick=\"nv_del_per(" . $id . ",'" . NV_BASE_ADMINURL . "','" . $lang_module['del_config'] . "')\">" . $lang_global['delete'] . "</a>";
	return $link;
}

function getparentid( $id )
{
	global $global_organ_rows;
	if( $id == 0 ) return 0;
	elseif( $id > 0 )
	{
		$pid = $global_organ_rows[$id]['parentid'];
		if( $pid == 0 ) return $id;
		elseif( $pid > 0 )
		{
			$pid = getparentid( $pid );
			return $pid;
		}
	}
	return 0;
}

function nv_ograns_page( $base_url, $num_items, $per_page, $start_item, $add_prevnext_text = true )
{
	global $lang_global;
	$total_pages = ceil( $num_items / $per_page );
	if( $total_pages == 1 ) return '';
	@$on_page = floor( $start_item / $per_page ) + 1;
	$page_string = "";
	if( $total_pages > 10 )
	{
		$init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;
		for( $i = 1; $i <= $init_page_max; $i++ )
		{
			$href = "href=\"" . $base_url . "/page-" . ( ( $i - 1 ) * $per_page ) . "\"";
			$page_string .= ( $i == $on_page ) ? "<strong>" . $i . "</strong>" : "<a " . $href . ">" . $i . "</a>";
			if( $i < $init_page_max ) $page_string .= ", ";
		}
		if( $total_pages > 3 )
		{
			if( $on_page > 1 && $on_page < $total_pages )
			{
				$page_string .= ( $on_page > 5 ) ? " ... " : ", ";
				$init_page_min = ( $on_page > 4 ) ? $on_page : 5;
				$init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;
				for( $i = $init_page_min - 1; $i < $init_page_max + 2; $i++ )
				{
					$href = "href=\"" . $base_url . "/page-" . ( ( $i - 1 ) * $per_page ) . "\"";
					$page_string .= ( $i == $on_page ) ? "<strong>" . $i . "</strong>" : "<a " . $href . ">" . $i . "</a>";
					if( $i < $init_page_max + 1 )
					{
						$page_string .= ", ";
					}
				}
				$page_string .= ( $on_page < $total_pages - 4 ) ? " ... " : ", ";
			}
			else
			{
				$page_string .= " ... ";
			}
			
			for( $i = $total_pages - 2; $i < $total_pages + 1; $i++ )
			{
				$href = "href=\"" . $base_url . "/page-" . ( ( $i - 1 ) * $per_page ) . "\"";
				$page_string .= ( $i == $on_page ) ? "<strong>" . $i . "</strong>" : "<a " . $href . ">" . $i . "</a>";
				if( $i < $total_pages )
				{
					$page_string .= ", ";
				}
			}
		}
	}
	else
	{
		for( $i = 1; $i < $total_pages + 1; $i++ )
		{
			$href = "href=\"" . $base_url . "/page-" . ( ( $i - 1 ) * $per_page ) . "\"";
			$page_string .= ( $i == $on_page ) ? "<strong>" . $i . "</strong>" : "<a " . $href . ">" . $i . "</a>";
			if( $i < $total_pages )
			{
				$page_string .= ", ";
			}
		}
	}
	if( $add_prevnext_text )
	{
		if( $on_page > 1 )
		{
			$href = "href=\"" . $base_url . "/page-" . ( ( $on_page - 2 ) * $per_page ) . "\"";
			$page_string = "&nbsp;&nbsp;<span><a " . $href . ">" . $lang_global['pageprev'] . "</a></span>&nbsp;&nbsp;" . $page_string;
		}
		if( $on_page < $total_pages )
		{
			$href = "href=\"" . $base_url . "/page-" . ( $on_page * $per_page ) . "\"";
			$page_string .= "&nbsp;&nbsp;<span><a " . $href . ">" . $lang_global['pagenext'] . "</a></span>";
		}
	}
	return $page_string;
}

function getall_numper_of_parent( $array_organs, $pid )
{
	$count = $array_organs[$pid]['numperson'];
	foreach( $array_organs as $organid => $info )
	{
		if( $info['parentid'] == $pid )
		{
			$count = $count + $info['numperson'];
			if( $info['numsub'] > 0 )
			{
				$count = $count + getall_numper_of_parent( $array_organs, $organid );
			}
		}
	}
	return $count;
} 