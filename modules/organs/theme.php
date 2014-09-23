<?php
/**
 * @Project NUKEVIET 3.0
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES ., JSC. All rights reserved
 * @Createdate Dec 3, 2010  11:23:15 AM 
 */

if ( ! defined( 'NV_IS_MOD_ORGAN' ) ) die( 'Stop!!!' );

function viewper ( $data_content )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info;
    $xtpl = new XTemplate( "viewper.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
    $xtpl->assign( 'LANG', $lang_module );
    $xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
    $xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
    $xtpl->assign( 'DATA', $data_content );
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}
function detail_per($data_content)
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info,$global_organ_rows,$my_head;
	if ( ! defined( 'SHADOWBOX' ) )
    {
        $my_head .= "<link rel=\"Stylesheet\" href=\"" . NV_BASE_SITEURL . "js/shadowbox/shadowbox.css\" />\n";
        $my_head .= "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL . "js/shadowbox/shadowbox.js\"></script>\n";
        $my_head .= "<script type=\"text/javascript\">Shadowbox.init({ handleOversize: \"drag\" });</script>";
        define( 'SHADOWBOX', true );
    }
    $xtpl = new XTemplate( "detaiper.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
    $xtpl->assign( 'LANG', $lang_module );
    $xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
    $xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
    if ( $data_content['birthday'] != 0 ) $data_content['birthday'] = date("d/m/Y",$data_content['birthday']);
    else { $data_content['birthday'] = ""; }
    if ( $data_content['dayinto'] > 0 ) $data_content['dayinto'] = date("d/m/Y",$data_content['dayinto']);
	else { $data_content['dayinto'] = ""; }
    if ( !empty($global_organ_rows[$data_content['organid']]) ) $data_content['ofogran'] = $global_organ_rows[$data_content['organid']]['title'];
    $xtpl->assign( 'DATA', $data_content );
    if ( !empty($data_content['photo'])) $xtpl->parse( 'main.photo' );
    $admin_link = "";
    if ( defined( 'NV_IS_MODADMIN' ) )
    { 
    	$admin_link = nv_link_edit_per($data_content['personid'])." " . nv_link_delete_per($data_content['personid']);
    }
    $xtpl->assign( 'admin_link', $admin_link );
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}
function vieworg_list ($organs_data,$person_data,$pages)
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info;
    $xtpl = new XTemplate( "vieworg_list.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
    $xtpl->assign( 'LANG', $lang_module );
    $xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
    $xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
    if ( !empty($organs_data ['website'])) 
    {
    	$temp = explode(";", $organs_data ['website']);
    	$organs_data ['website'] = "";
    	foreach ( $temp as $it )
    	{
    		$it = trim($it);
    		$organs_data ['website'] .= '<a href="http://'.$it.'">'.$it.'</a>&nbsp;&nbsp;';
    	}
    }
    if ( $organs_data ['view'] ) $xtpl->assign( 'DATA', $organs_data );
    if ( !empty($organs_data ['address'])) $xtpl->parse( 'main.address' );
    if ( !empty($organs_data ['phone'])) $xtpl->parse( 'main.phone' );
    if ( !empty($organs_data ['fax'])) $xtpl->parse( 'main.fax' );
    if ( !empty($organs_data ['website'])) 
    {
    	$xtpl->parse( 'main.website' );
    }
    if (!empty($person_data))
    {
    	foreach ( $person_data as $person )
    	{
    		$xtpl->assign( 'ROW', $person );
    		if ( !empty ( $person['photo'] ) ) $xtpl->parse( 'main.person.loop.img' );
    		$xtpl->parse( 'main.person.loop' );
    	}
    	$xtpl->parse( 'main.person' );
    	$xtpl->parse( 'main.tab_person' );
    }
    if ( !empty($organs_data ['about'])) 
    {
    	$xtpl->parse( 'main.about' );
    	$xtpl->parse( 'main.tab_about' );
    }
    $admin_link = "";
    if ( defined( 'NV_IS_MODADMIN' ) )
    { 
    	$admin_link = nv_link_edit_org($organs_data['organid'])." " . nv_link_delete_org($organs_data['organid']);
    }
    $xtpl->assign( 'admin_link', $admin_link );
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}
function vieworg_gird ($organs_data,$person_data,$html_pages)
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info;
    $xtpl = new XTemplate( "vieworg_gird.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
    $xtpl->assign( 'LANG', $lang_module );
    $xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
    $xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
    if ( !empty($organs_data ['website'])) 
    {
    	$temp = explode(";", $organs_data ['website']);
    	$organs_data ['website'] = "";
    	foreach ( $temp as $it )
    	{
    		$it = trim($it);
    		$organs_data ['website'] .= '<a href="http://'.$it.'">'.$it.'</a>&nbsp;&nbsp;';
    	}
    }
    if ( $organs_data ['view'] ) $xtpl->assign( 'DATA', $organs_data );
    if ( !empty($organs_data ['address'])) $xtpl->parse( 'main.address' );
    if ( !empty($organs_data ['phone'])) $xtpl->parse( 'main.phone' );
    if ( !empty($organs_data ['fax'])) $xtpl->parse( 'main.fax' );
    if ( !empty($organs_data ['website'])) 
    {
    	$xtpl->parse( 'main.website' );
    }
    if (!empty($person_data))
    {
    	foreach ( $person_data as $person )
    	{
    		$person['birthday'] = date("d/m/Y",$person['birthday']);
    		$xtpl->assign( 'ROW', $person );
    		if ( !empty ( $person['photo'] ) ) $xtpl->parse( 'main.person.loop.img' );
    		$xtpl->parse( 'main.person.loop' );
    	}
	    if (!empty($html_pages)) 
	    {
	    	$xtpl->assign( 'html_pages', $html_pages );
	    	$xtpl->parse( 'main.person.pages' );
	    }
    	$xtpl->parse( 'main.person' );
    	$xtpl->parse( 'main.tab_person' );
    }
    if ( !empty($organs_data ['about'])) 
    {
    	$xtpl->parse( 'main.about' );
    	$xtpl->parse( 'main.tab_about' );
    }
    $admin_link = "";
    if ( defined( 'NV_IS_MODADMIN' ) )
    { 
    	$admin_link = nv_link_edit_org($organs_data['organid'])." " . nv_link_delete_org($organs_data['organid']);
    }
    $xtpl->assign( 'admin_link', $admin_link );
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}
function vieworg_catelist ($array_content)
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info,$global_organ_rows;
    $xtpl = new XTemplate( "vieworg_catelist.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
    $xtpl->assign( 'LANG', $lang_module );
    $xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
    $xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
    if (!empty($array_content))
    {
    	foreach ( $array_content as $content )
    	{
    		if (!empty ($content['data']))
    		{
	    		$cate = $global_organ_rows[$content['id']];
	    		$xtpl->assign( 'CATE', $cate );
	    		
    			$i = 1;
	    		foreach ( $content['data'] as $person )
		    	{
		    		$person['birthday'] = date("d/m/Y",$person['birthday']);
		    		$person['no'] = $i;
		    		$xtpl->assign( 'ROW', $person );
		    		$xtpl->parse( 'main.cateloop.loop' );
		    		$i++;
		    	}
		    	$xtpl->parse( 'main.cateloop' );
    		}
    	}
    }
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

function searchresult ($person_data,$html_pages)
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info;
    $xtpl = new XTemplate( "viewsearch.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
    $xtpl->assign( 'LANG', $lang_module );
    $xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
    $xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

    if (!empty($person_data))
    {
    	foreach ( $person_data as $person )
    	{
    		$person['birthday'] = date("d/m/Y",$person['birthday']);
    		$xtpl->assign( 'ROW', $person );
    		if ( !empty ( $person['photo'] ) ) $xtpl->parse( 'main.loop.img' );
    		$xtpl->parse( 'main.loop' );
    	}
	    if (!empty($html_pages)) 
	    {
	    	$xtpl->assign( 'html_pages', $html_pages );
	    	$xtpl->parse( 'main.pages' );
	    }
    }
    else
    {
    	$xtpl->parse( 'main.nodata' );
    }
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

?>