<?php
/**
 * @Project NUKEVIET 3.0
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES ., JSC. All rights reserved
 * @Createdate Dec 3, 2010  11:12:21 AM 
 */

if ( ! defined( 'NV_SYSTEM' ) ) die( 'Stop!!!' );

define( 'NV_IS_MOD_ORGAN', true );

global $global_organ_rows;
$global_organ_rows = array();
$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=vieworg";
$sql = "SELECT `organid`, `parentid`, `title`, `alias`, `numsub`, `suborgan`, `numperson`,`view` FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows" . " WHERE active=1 ORDER BY `order` ASC";
$result = $db->sql_query( $sql );
$array_cat_list = array();
while ( list( $organid_i, $parentid_i, $title_i, $alias_i, $numsub_i, $suborgan_i, $numperson_i, $view_i ) = $db->sql_fetchrow( $result ) )
{
    $link_i = $link . "/".$alias_i."-".$organid_i;
    $global_organ_rows[$organid_i] = array( 
        "organid_i" => $organid_i, "parentid" => $parentid_i, "title" => $title_i, "alias" => $alias_i, "link" => $link_i, "suborgan" => $suborgan_i , "numperson" => $numperson_i, "numsub" => $numsub_i,'view'=> $view_i
    );
}

function draw_menu_organ ( )
{
    global $global_organ_rows;
    $html = "";
    if ( ! empty( $global_organ_rows ) )
    {
        foreach ( $global_organ_rows as $organid => $organinfo )
        {
            if ( $organinfo['parentid'] == '0' )
            {
                $organinfo['title'] = nv_clean60($organinfo['title'],100);
                $link = ( $organinfo['view'] == 1 ) ? $organinfo['link'] : "#";
                $html .= "	<li><span class=\"folder\"><a href=\"".$link."\" id=\"".$organid."\">" . $organinfo['title'] . " (" . $organinfo['numsub'] . ")" . "</a></span>\n";
                if ( $organinfo['numsub'] > 0 )
                {
                    $html .= draw_sub( $organid);
                }
                $html .="</li>";
            }
        }
    }
    return $html;
}

function draw_sub ( $pid )
{
    global $global_organ_rows;
    $html = "<ul>";
    foreach ( $global_organ_rows as $organid => $organinfo )
    {
        if ( $organinfo['parentid'] == $pid )
        {
            $organinfo['title0'] = nv_clean60($organinfo['title'],100);
            $link = ( $organinfo['view'] == 1 ) ? $organinfo['link'] : "#";
        	$html .= "<li>\n";
            $html .= "	<span class=\"folder\"><a href=\"".$link."\" id=\"".$organid."\" title=\"".$organinfo['title']."\" onclick=\"openlink(this)\" >" . $organinfo['title0'] . " (" . $organinfo['numperson'] . ")" . "</a></span>\n";
        	if ( $organinfo['numsub'] > 0 )
            {
                $html .= draw_sub( $organid );
            }
            $html .= "</li>\n";
        }
    }
    $html .= "</ul>";
    return $html;
}
function nv_link_edit_org ( $id )
{
    global $lang_global, $module_name;
    $link = "<span class=\"edit_icon\"><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=addrow&amp;id=" . $id . "\">" . $lang_global['edit'] . "</a></span>";
    return $link;
}

function nv_link_delete_org ( $id )
{
    global $lang_global, $module_name,$lang_module;
    $link = "<span class=\"delete_icon\"><a href=\"javascript:void(0);\" onclick=\"nv_del_org(" . $id . ",'" . NV_BASE_ADMINURL . "','".$lang_module['del_config']."')\">" . $lang_global['delete'] . "</a></span>";
    return $link;
}
?>