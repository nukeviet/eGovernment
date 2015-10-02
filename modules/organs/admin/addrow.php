<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:33:22 AM
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

if( $nv_Request->isset_request( 'get_alias_title', 'post' ) )
{
	$alias = $nv_Request->get_title( 'get_alias_title', 'post', '' );
	$alias = change_alias( $alias );
	
	$stmt = $db->prepare( 'SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rows where alias = :alias' );
	$stmt->bindParam( ':alias', $alias, PDO::PARAM_STR );
	$stmt->execute( );
	if( $stmt->fetchColumn( ) )
	{
		$weight = $db->query( 'SELECT MAX(organid) FROM ' . NV_PREFIXLANG . '_' . $module_data.'_rows' )->fetchColumn( );
		$weight = intval( $weight ) + 1;
		$alias = $alias . '-' . $weight;
	}
	
	die( $alias );
}


$page_title = $lang_module['addrow_title'];
$data = array(
    "organid" => 0, "parentid" => 0, "parentid_old" => 0, "title" => "", "alias" => "", "image" => "", "thumbnail" => "", "weight" => 0, "numsub" => 0, "suborgan" => 0, "lev" => 0, "active" => 1, "add_time" => 0, "edit_time" => 0, "address" => "", "email" => "", "phone" => "", "fax" => "", "website" => "", "numperson" => 0, "description" => "" , "view" => 1
);
$table_name = NV_PREFIXLANG . "_" . $module_data . "_rows";

$base_url = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op;

////////////////////////////
$data['parentid'] = $nv_Request->get_int( 'pid', 'get', 0 );
$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows WHERE organid=".intval($data['parentid']);
$result = $db->query( $sql );
$row = $result->fetch();

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
    $data['title'] = $nv_Request->get_title( 'title', 'post', '', 1 );
    $alias = $nv_Request->get_title( 'alias', 'post', '', 1 );
    $data['alias'] = ( $alias != "" ) ? change_alias( $alias ) : change_alias( $data['title'] );
    $data['description'] = $nv_Request->get_editor( 'description', '', NV_ALLOWED_HTML_TAGS );
    $data['address'] = $nv_Request->get_title( 'address', 'post', '', 1 );
    $data['phone'] = $nv_Request->get_title( 'phone', 'post', '', 1 );
    $data['phone_ext'] = $nv_Request->get_title( 'phone_ext', 'post', '', 1 );
    $data['email'] = $nv_Request->get_title( 'email', 'post', '', 1 );
    $data['fax'] = $nv_Request->get_title( 'fax', 'post', '', 1 );
    $data['website'] = $nv_Request->get_string( 'website', 'post', '', 1 );
    $data['website'] = str_replace("http://", "", $data['website']);
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
            $weight = $db->query( "SELECT max(weight) FROM " . $table_name . " WHERE parentid=" . $db->quote( $data['parentid'] ) . "" )->fetchColumn();
            $weight = intval( $weight ) + 1;
            $sql = "INSERT INTO " . $table_name . " (organid, parentid, title, alias, image, thumbnail, weight, orders, numsub, suborgan, lev, active, add_time, edit_time, address, email, phone,phone_ext ,fax, website, numperson, description,view )
         			VALUES (
         				NULL,
         				" . intval( $data['parentid'] ) . ",
         				" . $db->quote( $data['title'] ) . ",
         				" . $db->quote( $data['alias'] ) . ",
         				" . $db->quote( $data['image'] ) . ",
         				" . $db->quote( $data['thumbnail'] ) . ",
         				" . intval( $weight ) . ",
         				0,
         				0,
         				'',
         				0,
         				" . intval( $data['active'] ) . ",
         				UNIX_TIMESTAMP(),
         				UNIX_TIMESTAMP(),
         				" . $db->quote( $data['address'] ) . ",
         				" . $db->quote( $data['email'] ) . ",
         				" . $db->quote( $data['phone'] ) . ",
         				" . $db->quote( $data['phone_ext'] ) .",
         				" . $db->quote( $data['fax'] ) . ",
         				" . $db->quote( $data['website'] ) . ",
         				0,
         				" . $db->quote( $data['description'] ) . ",
         				".intval($data['view'])."
         			)";
            $newcatid = intval( $db->insert_id( $sql ) );
            if ( $newcatid > 0 )
            {
                nv_insert_logs( NV_LANG_DATA, $module_name, 'log_add_catalog', "id " . $newcatid, $admin_info['userid'] );
                //$xxx->closeCursor();
                nv_fix_row_order();
                nv_del_moduleCache( $module_name );
                Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main&pid=" . $data['parentid'] . "" );
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
            		  SET parentid = " . $db->quote( $data['parentid'] ) . ",
            		  	  title = " . $db->quote( $data['title'] ) . ",
            		  	  alias = " . $db->quote( $data['alias'] ) . ",
            		  	  active = " . intval( $data['active'] ) . ",
            		  	  description = " . $db->quote( $data['description'] ) . ",
            		  	  address = " . $db->quote( $data['address'] ) . ",
            		  	  email = " . $db->quote( $data['email'] ) . ",
            		  	  phone = " . $db->quote( $data['phone'] ) . ",
            		  	  phone_ext = " . $db->quote( $data['phone_ext'] ) . ",
            		  	  fax = " . $db->quote( $data['fax'] ) . ",
            		  	  website = " . $db->quote( $data['website'] ) . ",
            		  	  view = " . intval( $data['view'] ) . ",
            		  	  edit_time = UNIX_TIMESTAMP()
            		  WHERE organid = " . intval($id) . "";

            if ( $db->query( $query ) )
            {
                nv_insert_logs( NV_LANG_DATA, $module_name, 'log_edit_catalog', "id " . $id, $admin_info['userid'] );
                //$xxx->closeCursor();
                if ( $data['parentid'] != $data['parentid_old'] )
                {
                    $weight = $db->query( "SELECT max(weight) FROM " . $table_name . " WHERE parentid=" . $db->quote( $data['parentid'] ) . "" )->fetchColumn();
                    $weight = intval( $weight ) + 1;
                    $sql = "UPDATE " . $table_name . " SET weight=" . $weight . " WHERE organid=" . intval( $id );
                    $db->query( $sql );
                    nv_fix_row_order();
                }
                nv_del_moduleCache( $module_name );
                Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main&pid=" . $data['parentid'] . "" );
                die();
            }
            else
            {
                $error = $lang_module['errorsave'];
            }
            //$xxx->closeCursor();
        }
    }
}
/**end get data post**/
$id = $nv_Request->get_int( 'id', 'get', 0 );
if ( $id > 0 && $nv_Request->get_int( 'save', 'post' ) == 0) // insert data
{
    $sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows WHERE organid=" . intval( $id );
    $result = $db->query( $sql );
    $data = $result->fetch();
    $data['parentid_old'] = $data['parentid'];
}

$xtpl = new XTemplate( "addrow.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
/* begin set input select parentid */
$sql = "SELECT organid, title, lev FROM " . $table_name . " WHERE organid !='" . $data['organid'] . "' ORDER BY orders ASC";
$result = $db->query( $sql );
$array_cat_list = array();
while ( $row = $result->fetch() )
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

$data['view_check'] = ( $data['view'] == 1 ) ? "checked=\"checked\"" : "";
if ( ! empty( $error ) )
{
    $xtpl->assign( 'error', $error );
    $xtpl->parse( 'main.error' );
}
$xtpl->assign( 'DATA', $data );

if( $id == 0 )
{
	
	$xtpl->parse( 'main.auto_get_alias' );
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';