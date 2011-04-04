<?php
/**
 * @Project NUKEVIET 3.0
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES ., JSC. All rights reserved
 * @Createdate Dec 3, 2010  11:33:22 AM 
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['addrow_title'];
$data = array( 
    "organid" => 0, "parentid" => 0, "parentid_old" => 0, "title" => "", "alias" => "", "image" => "", "thumbnail" => "", "weight" => 0, "numsub" => 0, "suborgan" => 0, "lev" => 0, "active" => 1, "add_time" => 0, "edit_time" => 0, "address" => "", "email" => "", "phone" => "", "fax" => "", "website" => "", "numperson" => 0, "description" => "" , "view" => 1 
);
$table_name = NV_PREFIXLANG . "_" . $module_data . "_rows";

$base_url = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op;

////////////////////////////
$data['parentid'] = $nv_Request->get_int( 'pid', 'get', 0 );
$sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_rows` WHERE organid=".intval($data['parentid']);
$result = $db->sql_query( $sql );
$row = $db->sql_fetchrow( $result, 2 );

if (!empty($row)) {
	$page_title = $lang_module['addrow_title'] . $lang_module['main_sub'] . $row['title']; 
}

/*error*/
$error = "";
/**begin get data post**/
if ( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
    $data['parentid'] = $nv_Request->get_int( 'parentid', 'post', 0 );
    $data['parentid_old'] = $nv_Request->get_int( 'parentid_old', 'post', 0 );
    $data['title'] = filter_text_input( 'title', 'post', '', 1 );
    $data['alias'] = ( $data['title'] != "" ) ? change_alias( $data['title'] ) : "";
    $data['description'] = $nv_Request->get_string( 'description', 'post', '' );
    $data['description'] = nv_nl2br( nv_htmlspecialchars( strip_tags( $data['description'] ) ), '' );
    $data['address'] = filter_text_input( 'address', 'post', '', 1 );
    $data['phone'] = filter_text_input( 'phone', 'post', '', 1 );
    $data['email'] = filter_text_input( 'email', 'post', '', 1 );
    $data['fax'] = filter_text_input( 'fax', 'post', '', 1 );
    $data['website'] = $nv_Request->get_string( 'website', 'post', '', 1 );
    $data['website'] = str_replace("http://", "", $data['website']);
    $data['active'] = $nv_Request->get_int( 'active', 'post', 0 );
    $data['view'] = $nv_Request->get_int( 'view', 'post', 0 );
    //* check error*//
    if ( empty( $data['title'] ) )
    {
        $error = $lang_module['error_organ_title'];
    }
    elseif ( ! empty( $data['email'] ) )
    {
        if ( nv_check_valid_email( $data['email']) != '' )
        {
            $error = $lang_module['error_organ_emal'];
        }
    }
    /**action with none error**/
    if ( empty( $error ) )
    {
        $id = $nv_Request->get_int( 'id', 'get', 0 );
        if ( $id == 0 ) // insert data
        {
            list( $weight ) = $db->sql_fetchrow( $db->sql_query( "SELECT max(`weight`) FROM " . $table_name . " WHERE `parentid`=" . $db->dbescape( $data['parentid'] ) . "" ) );
            $weight = intval( $weight ) + 1;
            $sql = "INSERT INTO " . $table_name . " (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `order`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `fax`, `website`, `numperson`, `description`,`view` ) 
         			VALUES (
         				NULL, 
         				" . intval( $data['parentid'] ) . ",
         				" . $db->dbescape( $data['title'] ) . ",
         				" . $db->dbescape( $data['alias'] ) . ",
         				" . $db->dbescape( $data['image'] ) . ",
         				" . $db->dbescape( $data['thumbnail'] ) . ",
         				" . intval( $weight ) . ",
         				0, 
         				0,
         				'', 
         				0, 
         				" . intval( $data['active'] ) . ",
         				UNIX_TIMESTAMP(), 
         				UNIX_TIMESTAMP(), 
         				" . $db->dbescape( $data['address'] ) . ",
         				" . $db->dbescape( $data['email'] ) . ",
         				" . $db->dbescape( $data['phone'] ) . ",
         				" . $db->dbescape( $data['fax'] ) . ",
         				" . $db->dbescape( $data['website'] ) . ",
         				0,
         				" . $db->dbescape( $data['description'] ) . ",
         				".intval($data['view'])."
         			)";
            $newcatid = intval( $db->sql_query_insert_id( $sql ) );
            if ( $newcatid > 0 )
            {
                nv_insert_logs( NV_LANG_DATA, $module_name, 'log_add_catalog', "id " . $newcatid, $admin_info['userid'] );
                $db->sql_freeresult();
                nv_fix_row_order();
                nv_del_moduleCache( $module_name );
                Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main&pid=" . $data['parentid'] . "" );
                die();
            }
            else
            {
                $error = $lang_module['errorsave'];
            }
        }
        else // update data
        {
            $query = "UPDATE " . $table_name . " 
            		  SET `parentid` = " . $db->dbescape( $data['parentid'] ) . ",
            		  	  `title` = " . $db->dbescape( $data['title'] ) . ", 
            		  	  `alias` = " . $db->dbescape( $data['alias'] ) . ",
            		  	  `active` = " . intval( $data['active'] ) . ",
            		  	  `description` = " . $db->dbescape( $data['description'] ) . ", 
            		  	  `address` = " . $db->dbescape( $data['address'] ) . ", 
            		  	  `email` = " . $db->dbescape( $data['email'] ) . ", 
            		  	  `phone` = " . $db->dbescape( $data['phone'] ) . ", 
            		  	  `fax` = " . $db->dbescape( $data['fax'] ) . ", 
            		  	  `website` = " . $db->dbescape( $data['website'] ) . ",
            		  	  `view` = " . intval( $data['view'] ) . ",
            		  	  `edit_time` = UNIX_TIMESTAMP() 
            		  WHERE `organid` = " . intval($id) . "";
            $db->sql_query( $query );
            if ( $db->sql_affectedrows() > 0 )
            {
                nv_insert_logs( NV_LANG_DATA, $module_name, 'log_edit_catalog', "id " . $id, $admin_info['userid'] );
                $db->sql_freeresult();
                if ( $data['parentid'] != $data['parentid_old'] )
                {
                    list( $weight ) = $db->sql_fetchrow( $db->sql_query( "SELECT max(`weight`) FROM " . $table_name . " WHERE `parentid`=" . $db->dbescape( $data['parentid'] ) . "" ) );
                    $weight = intval( $weight ) + 1;
                    $sql = "UPDATE " . $table_name . " SET `weight`=" . $weight . " WHERE `organid`=" . intval( $id );
                    $db->sql_query( $sql );
                    nv_fix_row_order();
                }
                nv_del_moduleCache( $module_name );
                Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main&pid=" . $data['parentid'] . "" );
                die();
            }
            else
            {
                $error = $lang_module['errorsave'];
            }
            $db->sql_freeresult();
        }
    }
}
/**end get data post**/
$id = $nv_Request->get_int( 'id', 'get', 0 );
if ( $id > 0 && $nv_Request->get_int( 'save', 'post' ) == 0) // insert data
{
    $sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_rows` WHERE organid=" . intval( $id );
    $result = $db->sql_query( $sql );
    $data = $db->sql_fetchrow( $result, 2 );
    $data['parentid_old'] = $data['parentid'];
}

$xtpl = new XTemplate( "addrow.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
/* begin set input select parentid */
$sql = "SELECT organid, title, lev FROM " . $table_name . " WHERE `organid` !='" . $data['organid'] . "' ORDER BY `order` ASC";
$result = $db->sql_query( $sql );
$array_cat_list = array();
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
    $xtitle = "";
    if ( $row['lev'] > 0 )
    {
        for ( $i = 1; $i <= $row['lev']; $i ++ )
        {
            $xtitle .= "---";
        }
    }
    $row['title'] = $xtitle . $row['title'];
    $row['select'] = ( $data['parentid'] == $row['organid'] ) ? "selected=\"selected\"" : "";
    $xtpl->assign( 'ROW', $row );
    $xtpl->parse( 'main.parent_loop' );
}

/*end set input select parentid*/

/**begin set NV_EDITOR**/
if ( defined( 'NV_EDITOR' ) )
{
    require_once ( NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php' );
}
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
    $edits = nv_aleditor( 'description', '100%', '300px', $data['description'] );
}
else
{
    $edits = "<textarea style=\"width: 100%\" name=\"description\" id=\"description\" cols=\"20\" rows=\"15\">" . $data['description'] . "</textarea>";
}
$xtpl->assign( 'NV_EDITOR', $edits );
/**end set NV_EDITOR**/

/*begin set active*/
$data['active_check'] = ( $data['active'] == 1 ) ? "checked=\"checked\"" : "";
/*end set active*/
$data['view_check'] = ( $data['view'] == 1 ) ? "checked=\"checked\"" : "";
if ( ! empty( $error ) )
{
    $xtpl->assign( 'error', $error );
    $xtpl->parse( 'main.error' );
}
$xtpl->assign( 'DATA', $data );
$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
?>