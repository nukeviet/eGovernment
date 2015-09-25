<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  12:57:52 PM
 */

if( ! defined( 'NV_IS_MOD_ORGAN' ) ) die( 'Stop!!!' );

if( ! function_exists( 'nv_block_2lev_org' ) )
{

	function draw_menu_organ()
	{
		global $global_organ_rows;
		$html = "";
		if( ! empty( $global_organ_rows ) )
		{
			foreach( $global_organ_rows as $organid => $organinfo )
			{
				if( $organinfo['parentid'] == '0' )
				{
					$organinfo['title'] = nv_clean60( $organinfo['title'], 100 );
					$link = ( $organinfo['view'] == 1 ) ? $organinfo['link'] : "#";
					$html .= "	<li><span class=\"folder\"><a href=\"" . $link . "\" id=\"" . $organid . "\">" . $organinfo['title'] . "</a></span>\n";
					if( $organinfo['numsub'] > 0 )
					{
						$html .= draw_sub( $organid );
					}
					$html .= "</li>";
				}
			}
		}
		return $html;
	}

	function draw_sub( $pid )
	{
		global $global_organ_rows;
		$html = "<ul>";
		foreach( $global_organ_rows as $organid => $organinfo )
		{
			if( $organinfo['parentid'] == $pid )
			{
				$organinfo['title0'] = nv_clean60( $organinfo['title'], 100 );
				$link = ( $organinfo['view'] == 1 ) ? $organinfo['link'] : "#";
				$num = 0;
				$num = $organinfo['numsub'] > 0 ? $organinfo['numsub'] : $organinfo['numperson'];
				$html .= "<li>\n";
				$html .= "	<span class=\"folder\"><a href=\"" . $link . "\" id=\"" . $organid . "\" title=\"" . $organinfo['title'] . "\" onclick=\"openlink(this)\" >" . $organinfo['title0'] . "</a></span>\n";
				if( $organinfo['numsub'] > 0 )
				{
					$html .= draw_sub( $organid );
				}
				$html .= "</li>\n";
			}
		}
		$html .= "</ul>";
		return $html;
	}

	function nv_block_2lev_org()
	{
		global $lang_module, $module_name, $module_data, $module_file, $module_config, $module_info;
		
		$xtpl = new XTemplate( "block_listorg.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'MENU', draw_menu_organ() );
		$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
		
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
}
$content = nv_block_2lev_org();