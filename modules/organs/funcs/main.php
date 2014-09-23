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
$id = 0;
foreach ( $global_organ_rows as $organid => $organinfo )
{
	if ($organinfo ['numsub'] > 0)
	{
		$id = $organid; break;
	}
}
$array_content = array();
foreach ( $global_organ_rows as $organid => $organinfo )
{
    if ( $organinfo['parentid'] == $id )
    {
        $person_data = array();
        $sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_person` WHERE `organid`=" . intval( $organinfo['organid'] ) . " AND `active`=1 ORDER BY `weight` LIMIT 5";
        $result = $db->sql_query( $sql );
        while ( $row = $db->sql_fetchrow( $result, 2 ) )
        {
            if ( ! empty( $row['photo'] ) )
            {
                $urlimg = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_name . '/' . $row['photo'];
                $imageinfo = nv_ImageInfo( $urlimg, 200, true, NV_UPLOADS_REAL_DIR . '/' . $module_name . '/thumb' );
                $row['photo'] = $imageinfo['src'];
            }
            $row['link'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=person/" . $global_organ_rows[$id]['alias'] . "-" . $id . "/" . change_alias( $row['name'] ) . "-" . $row['personid'];
            $person_data[] = $row;
        }
        $array_content[] = array( 
            "id" => $organinfo['organid'], "data" => $person_data 
        );
        unset( $person_data );
    }
}
$contents = vieworg_catelist( $array_content );	


include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>