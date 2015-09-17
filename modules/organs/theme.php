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
	{
		$data_content['dayinto'] = date( "d/m/Y", $data_content['dayinto'] );
	}

	if( $data_content['dayparty'] > 0 )
	{
		$data_content['dayparty'] = date( "d/m/Y", $data_content['dayparty'] );
	}

	if( !empty( $global_organ_rows[$data_content['organid']] ) )
	{
		$data_content['ofogran'] = $global_organ_rows[$data_content['organid']]['title'];
		$data_content['ofogran_url'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=vieworg/" . $global_organ_rows[$data_content['organid']]['alias'] . "-" . $data_content['organid'];
	}

	$xtpl->assign( 'DATA', $data_content );

	if( $data_content['dayparty'] > 0 )
	{
		$xtpl->parse( 'main.dayparty' );
	}

	if( $data_content['dayinto'] > 0 )
	{
		$xtpl->parse( 'main.dayinto' );
	}

	if( !empty( $data_content['description'] ) )
	{
		$xtpl->parse( 'main.description' );
	}

	if( !empty( $data_content['position_other'] ) )
	{
		$xtpl->parse( 'main.position_other' );
	}

	if( !empty( $data_content['email'] ) )
	{
		$xtpl->parse( 'main.email' );
	}

	if( !empty( $data_content['phone'] ) )
	{
		$xtpl->parse( 'main.phone' );
	}

	if( !empty( $data_content['phone_ext'] ) )
	{
		$xtpl->parse( 'main.phone_ext' );
	}

	if( !empty( $data_content['mobile'] ) )
	{
		$xtpl->parse( 'main.mobile' );
	}

	if( !empty( $data_content['marital_status'] ) )
	{
		$xtpl->parse( 'main.marital_status' );
	}

	if( !empty( $data_content['address'] ) )
	{
		$xtpl->parse( 'main.address' );
	}

	if( !empty( $data_content['professional'] ) )
	{
		$xtpl->parse( 'main.professional' );
	}

	if( !empty( $data_content['political'] ) )
	{
		$xtpl->parse( 'main.political' );
	}

	if( !empty( $data_content['place_birth'] ) )
	{
		$xtpl->parse( 'main.place_birth' );
	}

	if( $data_content['photo'] )
	{
		$xtpl->parse( 'main.photo' );
	}
	else
	{
		$xtpl->parse( 'main.no_photo' );
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

function vieworg_catelist( $array_content, $suborg = array() )
{
	global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $global_organ_rows, $arr_config, $array_op;

	if( $arr_config['organ_view_type_main'] == 0 )
	{
		$xtpl = new XTemplate( 'vieworg_catelist_full.tpl', NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'WIDTH', $arr_config['thumb_width'] );
		if( !empty( $array_content ) )
		{
			$id = 0;
			if( !empty( $array_op[1] ) )
			{
				$temp = explode( '-', $array_op[1] );
				if( !empty( $temp ) )
				{
					$id = end( $temp );
				}
				$vieworg = $global_organ_rows[$id];
				$xtpl->assign( 'VIEWORG', $vieworg );
				if( !empty( $vieworg['email'] ) )
					$xtpl->parse( 'main.vieworg.email' );
				if( !empty( $vieworg['phone'] ) )
					$xtpl->parse( 'main.vieworg.phone' );
				if( !empty( $vieworg['fax'] ) )
					$xtpl->parse( 'main.vieworg.fax' );
				if( !empty( $vieworg['description'] ) )
					$xtpl->parse( 'main.vieworg.description' );

				$xtpl->parse( 'main.vieworg' );
			}
			//print_r($suborg); die($html_suborg);
			if( !empty( $suborg ) )
			{
				foreach( $suborg as $key => $value )
				{
					$xtpl->assign( 'suborg', $value );
					$xtpl->parse( 'main.suborg.loop' );
				}
				$xtpl->parse( 'main.suborg' );
			}

			foreach( $array_content as $content )
			{
				$suborganid = explode( ',', $content['suborgan'] );
				if( !empty( $content['suborgan'] ) )
				{
					foreach( $suborganid as $sid )
					{
						$xtpl->assign( 'SUBORGAN', $global_organ_rows[$sid] );
						$xtpl->parse( 'main.cateloop.suborgan.loop' );
					}
					$xtpl->parse( 'main.cateloop.suborgan' );
				}

				if( !empty( $content['data'] ) )
				{
					$cate = $global_organ_rows[$content['id']];
					$xtpl->assign( 'CATE', $cate );
					if( !empty( $cate['email'] ) )
						$xtpl->parse( 'main.cateloop.email' );
					if( !empty( $cate['phone'] ) )
						$xtpl->parse( 'main.cateloop.phone' );
					if( !empty( $cate['fax'] ) )
						$xtpl->parse( 'main.cateloop.fax' );
					$i = 1;
					$org_item = '';
					foreach( $content['data'] as $person )
					{
						if( $person['organid'] != $org_item and empty( $array_op[1] ) and count( $suborganid) > 1 )
						{
							$org_item = $person['organid'];
							$cat = $global_organ_rows[$org_item];
							$xtpl->assign( 'CAT', $cat );
							if( !empty( $cat['email'] ) )
								$xtpl->parse( 'main.cateloop.loop.cat.email' );
							$xtpl->parse( 'main.cateloop.loop.cat' );
						}

						$person['birthday'] = date( "d/m/Y", $person['birthday'] );
						$person['no'] = $i;
						if( !empty( $person['position_other'] ) )
							$person['position_other'] = '</br>' . $person['position_other'];
						if( !empty( $person['professional'] ) )
							$person['professional'] = '</br>' . $person['professional'];
						$xtpl->assign( 'ROW', $person );
						if( !empty( $person['email'] ) )
							$xtpl->parse( 'main.cateloop.loop.email' );
						if( !empty( $person['mobile'] ) or !empty( $person['phone'] ) or !empty( $person['phone_ext'] ) )
							$xtpl->parse( 'main.cateloop.loop.phone' );
						if( !empty( $person['phone_ext'] ) )
							$xtpl->parse( 'main.cateloop.loop.br1' );
						if( !empty( $person['phone'] ) )
							$xtpl->parse( 'main.cateloop.loop.br2' );
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
	else
	{
		$xtpl = new XTemplate( 'vieworg_catelist.tpl', NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
		if( !empty( $array_content ) )
		{
			foreach( $array_content as $content )
			{
				if( !empty( $content['suborgan'] ) )
				{
					$suborganid = explode( ',', $content['suborgan'] );
					foreach( $suborganid as $sid )
					{
						$xtpl->assign( 'SUBORGAN', $global_organ_rows[$sid] );
						$xtpl->parse( 'main.cateloop.suborgan.loop' );
					}
					$xtpl->parse( 'main.cateloop.suborgan' );
				}

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
