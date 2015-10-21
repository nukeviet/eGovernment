<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:32:04 AM
 */

if ( ! defined( 'NV_IS_MOD_ORGAN' ) ) die( 'Stop!!!' );

$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];

$array_content = array();
foreach ( $global_organ_rows as $organid => $organinfo )
{
    if ( $organinfo['parentid'] == 0 )
    {
    	$lid = '';
		$lid .= $organid;

		if( $organinfo['numsub'] > 0 )
		{
			$lid .= ',' . $organinfo['suborgan'];
		}

        $person_data = array();
        $sql = "SELECT t1.* FROM " . NV_PREFIXLANG . "_" . $module_data . "_person t1 inner join " . NV_PREFIXLANG . "_" . $module_data . "_rows t2 on t1.organid = t2.organid WHERE t1.organid IN (" . $lid . ") AND t1.active=1 ORDER BY t2.orders,t1.weight";
        $result = $db->query( $sql );
        while ( $row = $result->fetch() )
        {
        	if( !empty( $row['photo'] ) and file_exists( NV_ROOTDIR . NV_BASE_SITEURL . NV_ASSETS_DIR . '/' . $module_upload . '/' . $row['photo'] ) )
			{
				$row['photo'] = NV_BASE_SITEURL . NV_ASSETS_DIR . '/' . $module_upload . '/' . $row['photo'];
			}
			elseif( !empty( $row['photo'] ) and file_exists( NV_ROOTDIR . NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['photo'] ) )
			{
				$row['photo'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['photo'];
			}
			else
			{
				$row['photo'] = NV_BASE_SITEURL . 'themes/' . $global_config['site_theme'] . '/images/' . $module_file . '/no-avatar.jpg';
			}

            $row['link'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=person/" . $global_organ_rows[$organid]['alias'] . "-" . $organid . "/" . change_alias( $row['name'] ) . "-" . $row['personid'];
            $person_data[] = $row;
        }
        $array_content[] = array(
            "id" => $organinfo['organid'], "suborgan" => $organinfo['suborgan'], "data" => $person_data
        );
        unset( $person_data );
    }
}
$contents = vieworg_catelist( $array_content );

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';