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
$per_page = 30;

//get pages
$page = 0;
if ( ! empty( $array_op[2] ) )
{
    $temp = explode( '-', $array_op[2] );
    if ( ! empty( $temp ) )
    {
        $page = end( $temp );
    }
}
//get id
$id = 0;
if ( ! empty( $array_op[1] ) )
{
    $temp = explode( '-', $array_op[1] );
    if ( ! empty( $temp ) )
    {
        $id = end( $temp );
    }
}
$person_data = $organs_data = array();

$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows WHERE organid=" . intval( $id );
$result = $db->query( $sql );
$organs_data = $result->fetch();

if ( empty( $organs_data ) )
{
    $redirect = "<meta http-equiv=\"Refresh\" content=\"3;URL=" . nv_url_rewrite( NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name, true ) . "\" />";
    nv_info_die( $lang_global['error_404_title'], $lang_global['error_404_title'], $lang_global['error_404_content'] . $redirect );
}

$base_url = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "/" . $organs_data['alias'] . "-" . $organs_data['organid'];
if ( $organs_data['numperson'] > 0 )
{
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . NV_PREFIXLANG . "_" . $module_data . "_person WHERE organid=" . intval( $id ) . " AND active=1 ORDER BY weight LIMIT " . $page . "," . $per_page . "";
    $result = $db->query( $sql );
    $result_all = $db->query( "SELECT FOUND_ROWS()" );
    $numf = $result_all->fetchColumn();
    $all_page = ( $numf ) ? $numf : 1;
    while ( $row = $result->fetch() )
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
    $html_pages = nv_ograns_page( $base_url, $all_page, $per_page, $page );
    //$contents = vieworg_list( $organs_data,$person_data,$pages );
    $contents = vieworg_gird( $organs_data, $person_data, $html_pages );
}
elseif ( $organs_data['numsub'] > 0 )
{
    $array_content = array();
    foreach ( $global_organ_rows as $organid => $organinfo )
    {
        if ( $organinfo['parentid'] == $id )
        {
            $person_data = array();
            $sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_person WHERE organid=" . intval( $organinfo['organid'] ) . " AND active=1 ORDER BY weight LIMIT 5";
            $result = $db->query( $sql );
            while ( $row = $result->fetch() )
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
            $array_content[] = array( "id" => $organinfo['organid'], "data" => $person_data );
            unset( $person_data );
        }
    }
    $contents = vieworg_catelist( $array_content );
}
else
{
    $contents = "<center>" . $lang_module['vieworg_nodata'] . "</center>";
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';