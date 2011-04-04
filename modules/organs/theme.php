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

function vieworg ($organs_data,$person_data)
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info;
    $xtpl = new XTemplate( "vieworg.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
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
    		if ( file_exists( NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_name . '/' . $person['photo'] ) )
    		{
    			$person['photo'] = NV_BASE_SITEURL.NV_UPLOADS_DIR.'/'.$module_name.'/'.$person['photo'];
    		}
    		else
    		{
    			$person['photo'] = "";
    		}
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
?>