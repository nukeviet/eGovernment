<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  12:57:52 PM 
 */

if ( ! defined( 'NV_IS_MOD_ORGAN' ) ) die( 'Stop!!!' );

if ( ! function_exists( 'nv_block_2lev_org' ) )
{
    function nv_block_2lev_org ()
    {
        global $lang_module, $module_name, $module_data, $module_file, $module_config, $module_info;
        $xtpl = new XTemplate( "block_listorg.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
        $xtpl->assign( 'LANG', $lang_module );
        $xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
        $xtpl->assign( 'MENU', draw_menu_organ() );
        $xtpl->parse( 'main' );
        return $xtpl->text( 'main' );
    }
}
$content = nv_block_2lev_org();