<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if( ! defined( 'NV_ADMIN' ) ) die( 'Stop!!!' );

/**
 * Note:
 * 	- Module var is: $lang, $module_file, $module_data, $module_upload, $module_theme, $module_name
 * 	- Accept global var: $db, $db_config, $global_config
 */

$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_person (personid, name, photo, phone_ext, mobile, email, position, position_other, address, phone, birthday, place_birth, description, addtime, edittime, organid, weight, active, dayinto, dayparty, marital_status, professional, political) VALUES('4', 'Nguyễn Văn A', '', '', '', 'nguyenvana@gmail.com', 'Trưởng phòng', '', '', '', '-448407120', 'Quảng Bình', '', '1445394264', '1445394534', '2', '1', '1', '0', '0', 'Đã kết hôn', 'Đại học', 'Cao cấp')" );
$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (organid, parentid, title, alias, image, thumbnail, weight, orders, numsub, suborgan, lev, active, add_time, edit_time, address, email, phone, phone_ext, fax, website, numperson, description, view) VALUES('2', '0', 'Ban giám hiệu', 'Ban-giam-hieu', '', '', '1', '1', '0', '', '0', '1', '1445393727', '1445393727', '', '', '', '', '', '', '1', '', '1')" );