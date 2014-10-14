<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:23:15 AM
 */

if( !defined( 'NV_IS_MOD_ORGAN' ) ) die( 'Stop!!!' );

function detail_per( $data_content )
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $global_organ_rows, $my_head, $arr_config;

	if( !defined( 'SHADOWBOX' ) )
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
	$xtpl->assign( 'WIDTH', $arr_config['thumb_width'] );

	if( $data_content['birthday'] != 0 )
		$data_content['birthday'] = date( "d/m/Y", $data_content['birthday'] );
	else
	{
		$data_content['birthday'] = "";
	}

	if( $data_content['dayinto'] > 0 )
		$data_content['dayinto'] = date( "d/m/Y", $data_content['dayinto'] );
	else
	{
		$data_content['dayinto'] = "";
	}

	if( !empty( $global_organ_rows[$data_content['organid']] ) )
	{
		$data_content['ofogran'] = $global_organ_rows[$data_content['organid']]['title'];
		$data_content['ofogran_url'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=vieworg/" . $global_organ_rows[$data_content['organid']]['alias'] . "-" . $data_content['organid'];
	}

	if( ! empty( $data_content['email'] ) )
	{
		$xtpl->parse( 'main.email' );
	}

	$xtpl->assign( 'DATA', $data_content );

	if( ! empty( $data_content['description'] ) )
	{
		$xtpl->parse( 'main.description' );
	}

	$admin_link = "";
	if( defined( 'NV_IS_MODADMIN' ) )
	{
		$admin_link = nv_link_edit_per( $data_content['personid'] ) . " " . nv_link_delete_per( $data_content['personid'] );
	}

	$xtpl->assign( 'admin_link', $admin_link );
	$xtpl->parse( 'main' );

	return $xtpl->text( 'main' );
}

function vieworg_list( $organs_data, $person_data, $html_pages )
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $arr_config;

	$xtpl = new XTemplate( "vieworg_list.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
	$xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
	$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
	$xtpl->assign( 'WIDTH', $arr_config['thumb_width'] );

	if( !empty( $organs_data['website'] ) )
	{
		$temp = explode( ";", $organs_data['website'] );
		$organs_data['website'] = "";
		foreach( $temp as $it )
		{
			$it = trim( $it );
			$organs_data['website'] .= '<a href="http://' . $it . '">' . $it . '</a>&nbsp;&nbsp;';
		}
	}

	if( $organs_data['view'] )
		$xtpl->assign( 'DATA', $organs_data );

	if( !empty( $organs_data['address'] ) )
		$xtpl->parse( 'main.address' );

	if( !empty( $organs_data['phone'] ) )
		$xtpl->parse( 'main.phone' );

	if( !empty( $organs_data['fax'] ) )
		$xtpl->parse( 'main.fax' );

	if( !empty( $organs_data['website'] ) )
	{
		$xtpl->parse( 'main.website' );
	}

	if( !empty( $person_data ) )
	{
		foreach( $person_data as $person )
		{
			$xtpl->assign( 'ROW', $person );
			$xtpl->parse( 'main.person.loop' );
		}
		$xtpl->parse( 'main.person' );
	}

	if( !empty( $organs_data['description'] ) )
	{
		$xtpl->parse( 'main.about' );
	}

	$admin_link = "";
	if( defined( 'NV_IS_MODADMIN' ) )
	{
		$admin_link = nv_link_edit_org( $organs_data['organid'] ) . " " . nv_link_delete_org( $organs_data['organid'] );
	}
	$xtpl->assign( 'admin_link', $admin_link );

	if( !empty( $html_pages ) )
	{
		$xtpl->assign( 'html_pages', $html_pages );
		$xtpl->parse( 'main.pages' );
	}

	$xtpl->parse( 'main' );
	return $xtpl->text( 'main' );
}

function vieworg_gird( $organs_data, $person_data, $html_pages )
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $arr_config;

	$xtpl = new XTemplate( "vieworg_gird.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
	$xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
	$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
	$xtpl->assign( 'WIDTH', $arr_config['thumb_width'] );
	$xtpl->assign( 'HEIGHT', $arr_config['thumb_height'] );

	if( !empty( $organs_data['website'] ) )
	{
		$temp = explode( ";", $organs_data['website'] );
		$organs_data['website'] = "";
		foreach( $temp as $it )
		{
			$it = trim( $it );
			$organs_data['website'] .= '<a href="http://' . $it . '">' . $it . '</a>&nbsp;&nbsp;';
		}
	}
	if( $organs_data['view'] )
		$xtpl->assign( 'DATA', $organs_data );
	if( !empty( $organs_data['address'] ) )
		$xtpl->parse( 'main.address' );
	if( !empty( $organs_data['phone'] ) )
		$xtpl->parse( 'main.phone' );
	if( !empty( $organs_data['fax'] ) )
		$xtpl->parse( 'main.fax' );
	if( !empty( $organs_data['website'] ) )
	{
		$xtpl->parse( 'main.website' );
	}

	if( !empty( $person_data ) )
	{
		foreach( $person_data as $person )
		{
			$person['birthday'] = date( "d/m/Y", $person['birthday'] );
			$xtpl->assign( 'ROW', $person );
			$xtpl->parse( 'main.person.loop' );
		}

		$xtpl->parse( 'main.person' );
	}

	if( !empty( $html_pages ) )
	{
		$xtpl->assign( 'html_pages', $html_pages );
		$xtpl->parse( 'main.pages' );
	}

	if( !empty( $organs_data['description'] ) )
	{
		$xtpl->parse( 'main.about' );
	}

	$admin_link = "";
	if( defined( 'NV_IS_MODADMIN' ) )
	{
		$admin_link = nv_link_edit_org( $organs_data['organid'] ) . " " . nv_link_delete_org( $organs_data['organid'] );
	}
	$xtpl->assign( 'admin_link', $admin_link );
	$xtpl->parse( 'main' );
	return $xtpl->text( 'main' );
}

function vieworg_catelist( $array_content )
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $global_organ_rows;
	$xtpl = new XTemplate( "vieworg_catelist.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
	$xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
	$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
	if( !empty( $array_content ) )
	{
		foreach( $array_content as $content )
		{
			if( !empty( $content['data'] ) )
			{
				$cate = $global_organ_rows[$content['id']];
				$xtpl->assign( 'CATE', $cate );

				$i = 1;
				foreach( $content['data'] as $person )
				{
					$person['birthday'] = date( "d/m/Y", $person['birthday'] );
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

function searchresult( $person_data, $html_pages )
{
	global $global_config, $module_name, $arr_config, $module_file, $lang_module, $module_config, $module_info;
	$xtpl = new XTemplate( "viewsearch.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
	$xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
	$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
	$xtpl->assign( 'WIDTH', $arr_config['thumb_width'] );
	$xtpl->assign( 'HEIGHT', $arr_config['thumb_height'] );

	if( !empty( $person_data ) )
	{
		foreach( $person_data as $person )
		{
			$person['birthday'] = date( "d/m/Y", $person['birthday'] );
			$xtpl->assign( 'ROW', $person );

			$xtpl->parse( 'main.loop' );
		}
		if( !empty( $html_pages ) )
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
