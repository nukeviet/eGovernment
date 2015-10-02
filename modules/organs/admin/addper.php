<?php
/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:33:22 AM
 */

if( !defined( 'NV_IS_FILE_ADMIN' ) )
	die( 'Stop!!!' );

$page_title = $lang_module['addper_title'];
$month_dir_module = nv_mkdir( NV_UPLOADS_REAL_DIR . '/' . $module_upload, date( "Y_m" ), true );

$data = array(
	"personid" => 0,
	"name" => '',
	"photo" => '',
	"email" => '',
	"position" => '',
	"address" => '',
	"phone" => '',
	"phone_ext" => "",
	"birthday" => "",
	"place_birth" => "",
	"description" => '',
	"addtime" => 0,
	"edittime" => 0,
	"organid" => 0,
	"weight" => 0,
	"active" => 1,
	"marital_status" => "",
	"mobile" => "",
	"dayinto" => "",
	"dayparty" => "",
	"position_other" => "",
	"professional" => "",
	"political" => ""
);
$table_name = NV_PREFIXLANG . "_" . $module_data . "_person";

$base_url = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op;

////////////////////////////
$data['organid'] = $nv_Request->get_int( 'pid', 'get', 0 );
$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows WHERE organid=" . intval( $data['organid'] );
$result = $db->query( $sql );
$row = $result->fetch( );

if( !empty( $row ) )
{
	$page_title = $lang_module['addper_title'] . $lang_module['main_sub'] . $row['title'];
}

/*error*/
$error = "";
/**begin get data post**/
if( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
	$data['organid'] = $nv_Request->get_int( 'organid', 'post', 0 );
	$data['organid_old'] = $nv_Request->get_int( 'organid_old', 'post', 0 );
	$data['name'] = $nv_Request->get_title( 'name', 'post', '', 1 );
	$data['description'] = $nv_Request->get_editor( 'description', 'post' );
	$data['address'] = $nv_Request->get_title( 'address', 'post', '', 1 );
	$data['phone'] = $nv_Request->get_title( 'phone', 'post', '', 1 );
	$data['phone_ext'] = $nv_Request->get_title( 'phone_ext', 'post', '', 1 );
	$data['mobile'] = $nv_Request->get_title( 'mobile', 'post', '', 1 );
	$data['email'] = $nv_Request->get_title( 'email', 'post', '', 1 );
	$data['photo'] = $nv_Request->get_title( 'photo', 'post', '' );
	$data['position'] = $nv_Request->get_title( 'position', 'post', '', 1 );
	$data['position_other'] = $nv_Request->get_title( 'position_other', 'post', '', 1 );
	$data['marital_status'] = $nv_Request->get_title( 'marital_status', 'post', '', 1 );
	$data['professional'] = $nv_Request->get_title( 'professional', 'post', '', 1 );
	$data['political'] = $nv_Request->get_title( 'political', 'post', '', 1 );
	$data['place_birth'] = $nv_Request->get_title( 'place_birth', 'post', '', 1 );
	$birthday = $nv_Request->get_string( 'birthday', 'post', '' );
	if( !empty( $birthday ) and !preg_match( "/^([0-9]{1,2})\\/([0-9]{1,2})\/([0-9]{4})$/", $birthday ) )
		$birthday = "";
	if( empty( $birthday ) )
	{
		$data['birthday'] = 0;
	}
	else
	{
		$phour = date( 'H' );
		$pmin = date( 'i' );
		unset( $m );
		preg_match( "/^([0-9]{1,2})\\/([0-9]{1,2})\/([0-9]{4})$/", $birthday, $m );
		$data['birthday'] = mktime( $phour, $pmin, 0, $m[2], $m[1], $m[3] );
	}

	$dayinto = $nv_Request->get_string( 'dayinto', 'post', '' );
	if( !empty( $dayinto ) and !preg_match( "/^([0-9]{1,2})\\/([0-9]{1,2})\/([0-9]{4})$/", $dayinto ) )
		$dayinto = "";
	if( empty( $dayinto ) )
	{
		$data['dayinto'] = 0;
	}
	else
	{
		$phour = date( 'H' );
		$pmin = date( 'i' );
		unset( $m );
		preg_match( "/^([0-9]{1,2})\\/([0-9]{1,2})\/([0-9]{4})$/", $dayinto, $m );
		$data['dayinto'] = mktime( $phour, $pmin, 0, $m[2], $m[1], $m[3] );
	}

	$dayparty = $nv_Request->get_string( 'dayparty', 'post', '' );
	if( !empty( $dayparty ) and !preg_match( "/^([0-9]{1,2})\\/([0-9]{1,2})\/([0-9]{4})$/", $dayparty ) )
		$dayparty = "";
	if( empty( $dayparty ) )
	{
		$data['dayparty'] = 0;
	}
	else
	{
		$phour = date( 'H' );
		$pmin = date( 'i' );
		unset( $m );
		preg_match( "/^([0-9]{1,2})\\/([0-9]{1,2})\/([0-9]{4})$/", $dayparty, $m );
		$data['dayparty'] = mktime( $phour, $pmin, 0, $m[2], $m[1], $m[3] );
	}

	//* check error*//
	if( empty( $data['name'] ) )
	{
		$error = $lang_module['error_person_title'];
	}
	//elseif( empty( $data['birthday'] ) )
	//{
		//$error = $lang_module['error_organ_birthday'];
	//}
	elseif( empty( $data['position'] ) )
	{
		$error = $lang_module['error_organ_position'];
	}
	elseif( !empty( $data['email'] ) )
	{
		if( nv_check_valid_email( $data['email'] ) != '' )
		{
			$error = $lang_module['error_organ_emal'];
		}
	}

	/**action with none error**/
	if( empty( $error ) )
	{
		$id = $nv_Request->get_int( 'id', 'get', 0 );
		// Xu ly anh minh ha
		if( !nv_is_url( $data['photo'] ) and file_exists( NV_DOCUMENT_ROOT . $data['photo'] ) )
		{
			$lu = strlen( NV_BASE_SITEURL . NV_UPLOADS_DIR . "/" . $module_upload . "/" );
			$data['photo'] = substr( $data['photo'], $lu );
		}
		elseif( !nv_is_url( $data['photo'] ) )
		{
			$data['photo'] = "";
		}
		if( $id == 0 )// insert data
		{
			$weight = $db->query( "SELECT max(weight) FROM " . $table_name . " WHERE organid=" . $db->quote( $data['organid'] ) . "" )->fetchColumn( );
			$weight = intval( $weight ) + 1;
			$sql = "INSERT INTO " . $table_name . " (personid, name, photo, email, position,position_other ,address, phone,phone_ext ,mobile, birthday, place_birth, description, addtime, edittime, organid, weight, active,dayinto,dayparty,marital_status,professional, political )
         			VALUES (
         				NULL,
         				" . $db->quote( $data['name'] ) . ",
         				" . $db->quote( $data['photo'] ) . ",
         				" . $db->quote( $data['email'] ) . ",
         				" . $db->quote( $data['position'] ) . ",
         				" . $db->quote( $data['position_other'] ) . ",
         				" . $db->quote( $data['address'] ) . ",
         				" . $db->quote( $data['phone'] ) . ",
         				" . $db->quote( $data['phone_ext'] ) . ",
         				" . $db->quote( $data['mobile'] ) . ",
         				" . intval( $data['birthday'] ) . ",
         				" . $db->quote(  $data['place_birth'] ) . ",
         				" . $db->quote( $data['description'] ) . ",
         				UNIX_TIMESTAMP(),
         				UNIX_TIMESTAMP(),
         				" . intval( $data['organid'] ) . ",
         				" . intval( $weight ) . ",
         				" . intval( $data['active'] ) . ",
         				" . intval( $data['dayinto'] ) . ",
         				" . intval( $data['dayparty'] ) . ",
         				" . $db->quote( $data['marital_status'] ) . ",
         				" . $db->quote( $data['professional'] ) . ",
         				" . $db->quote( $data['political'] ) . "
         			)";
			$newcatid = intval( $db->insert_id( $sql ) );
			if( $newcatid > 0 )
			{
				nv_insert_logs( NV_LANG_DATA, $module_name, 'log_add_catalog', "id " . $newcatid, $admin_info['userid'] );
				//$xxx->closeCursor();
				nv_fix_organ( $data['organid'] );
				nv_del_moduleCache( $module_name );
				Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=listper&pid=" . $data['organid'] . "" );
				die( );
			}
			else
			{
				$error = $lang_module['errorsave'];
			}
		}
		else// update data
		{
			$query = "UPDATE " . $table_name . "
            		  SET organid = " . $db->quote( $data['organid'] ) . ",
            		  	  name = " . $db->quote( $data['name'] ) . ",
            		  	  active = " . intval( $data['active'] ) . ",
            		  	  description = " . $db->quote( $data['description'] ) . ",
            		  	  address = " . $db->quote( $data['address'] ) . ",
            		  	  email = " . $db->quote( $data['email'] ) . ",
            		  	  phone = " . $db->quote( $data['phone'] ) . ",
            		  	  mobile = " . $db->quote( $data['mobile'] ) . ",
            		  	  photo = " . $db->quote( $data['photo'] ) . ",
            		  	  phone_ext = " . $db->quote( $data['phone_ext'] ) . ",
            		  	  position = " . $db->quote( $data['position'] ) . ",
            		  	  position_other = " . $db->quote( $data['position_other'] ) . ",
            		  	  marital_status = " . $db->quote( $data['marital_status'] ) . ",
            		  	  birthday = " . intval( $data['birthday'] ) . ",
            		  	  place_birth = " . $db->quote( $data['place_birth'] ) . ",
            		  	  dayinto = " . intval( $data['dayinto'] ) . ",
            		  	  dayparty = " . intval( $data['dayparty'] ) . ",
            		  	  professional = " . $db->quote( $data['professional'] ) . ",
            		  	  political = " . $db->quote( $data['political'] ) . ",
            		  	  edittime = UNIX_TIMESTAMP()
            		  WHERE personid = " . intval( $id ) . "";

			if( $db->query( $query ) )
			{
				nv_insert_logs( NV_LANG_DATA, $module_name, 'log_edit_catalog', "id " . $id, $admin_info['userid'] );
				//$xxx->closeCursor();
				if( $data['organid'] != $data['organid_old'] )
				{
					$weight = $db->query( "SELECT max(weight) FROM " . $table_name . " WHERE organid=" . $db->quote( $data['organid'] ) . "" )->fetchColumn( );
					$weight = intval( $weight ) + 1;
					$sql = "UPDATE " . $table_name . " SET weight=" . $weight . " WHERE organid=" . intval( $id );
					$db->query( $sql );
					nv_fix_personweight( $data['organid_old'] );
					nv_fix_personweight( $data['organid'] );
					nv_fix_organ( $data['organid_old'] );
				}
				nv_fix_organ( $data['organid'] );
				nv_del_moduleCache( $module_name );
				Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=listper&pid=" . $data['organid'] . "" );
				die( );
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
if( $id > 0 && $nv_Request->get_int( 'save', 'post' ) == 0 )// insert data
{
	$sql = "SELECT * FROM " . $table_name . " WHERE personid=" . intval( $id );
	$result = $db->query( $sql );
	$data = $result->fetch( );
	$data['organid_old'] = $data['organid'];
	if( !empty( $data['description'] ) )
		$data['description'] = nv_htmlspecialchars( $data['description'] );

	if( !empty( $data['photo'] ) and file_exists( NV_UPLOADS_REAL_DIR . "/" . $module_upload . "/" . $data['photo'] ) )
	{
		$data['photo'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . "/" . $module_upload . "/" . $data['photo'];
	}
	$data['birthday'] = (!empty( $data['birthday'] )) ? date( "d/m/Y", $data['birthday'] ) : "";
	$data['dayinto'] = (!empty( $data['dayinto'] )) ? date( "d/m/Y", $data['dayinto'] ) : "";
	$data['dayparty'] = (!empty( $data['dayparty'] )) ? date( "d/m/Y", $data['dayparty'] ) : "";
}

$xtpl = new XTemplate( "addper.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
$xtpl->assign( 'NV_LANG_INTERFACE', NV_LANG_INTERFACE );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'module_name', $module_name );
$xtpl->assign( 'NV_UPLOADS_DIR', NV_UPLOADS_DIR );
$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
$xtpl->assign( 'UPLOAD_CURRENT', NV_UPLOADS_DIR . '/' . $module_upload . '/' . date( "Y_m" ) );

/* begin set input select parentid */
$sql = "SELECT organid, title, lev FROM " . NV_PREFIXLANG . "_" . $module_data . "_rows ORDER BY orders ASC";
$result = $db->query( $sql );
$array_cat_list = array( );
if( $result->rowCount( ) == 0 )
{
	Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=addrow" );
	die( );
}
while( $row = $result->fetch( ) )
{
	$xtitle = "";
	if( $row['lev'] > 0 )
	{
		for( $i = 1; $i <= $row['lev']; $i++ )
		{
			$xtitle .= "---";
		}
	}
	$row['title'] = $xtitle . $row['title'];
	$row['select'] = ($data['organid'] == $row['organid']) ? "selected=\"selected\"" : "";
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.parent_loop' );
}

/*end set input select parentid*/

/**begin set NV_EDITOR**/
if( defined( 'NV_EDITOR' ) )
{
	require_once (NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php');
}
if( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
	$edits = nv_aleditor( 'description', '100%', '300px', $data['description'] );
}
else
{
	$edits = "<textarea style=\"width: 100%\" name=\"description\" id=\"description\" cols=\"20\" rows=\"15\">" . $data['description'] . "</textarea>";
}
$xtpl->assign( 'NV_EDITOR', $edits );
/**end set NV_EDITOR**/

if( !empty( $error ) )
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );
}
$xtpl->assign( 'DATA', $data );
$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';