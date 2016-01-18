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

$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_person (personid, name, photo, phone_ext, mobile, email, position, position_other, address, phone, birthday, place_birth, description, addtime, edittime, organid, weight, active, dayinto, dayparty, marital_status, professional, political) VALUES('1', 'Nguyễn Văn A', '', '', '', 'nguyenvana@gmail.com', 'Trưởng phòng', '', '', '', '-448407120', 'Quảng Bình', '', '1445394264', '1445394534', '1', '1', '1', '0', '0', 'Đã kết hôn', 'Đại học', 'Cao cấp')" );
$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (organid, parentid, title, alias, image, thumbnail, weight, orders, numsub, suborgan, lev, active, add_time, edit_time, address, email, phone, phone_ext, fax, website, numperson, description, view) VALUES (1, 0, 'Ban giám hiệu', 'Ban-giam-hieu', '', '', 1, 1, 0, '', 0, 1, 1442804405, 1442822308, '', '', '', '', '', '', 1, '', 1)");
$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (organid, parentid, title, alias, image, thumbnail, weight, orders, numsub, suborgan, lev, active, add_time, edit_time, address, email, phone, phone_ext, fax, website, numperson, description, view) VALUES (7, 0, 'Tổ chuyên môn', 'To-chuyen-mon', '', '', 2, 2, 0, '', 0, 1, 1442822363, 1442822363, '', '', '', '', '', '', 0, '', 1)" );
$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (organid, parentid, title, alias, image, thumbnail, weight, orders, numsub, suborgan, lev, active, add_time, edit_time, address, email, phone, phone_ext, fax, website, numperson, description, view) VALUES (8, 0, 'Ban chỉ huy liên đội', 'Ban-chi-huy-lien-doi', '', '', 3, 3, 0, '', 0, 1, 1442829290, 1442829290, '', '', '', '', '', '', 0, '', 1)" );
$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (organid, parentid, title, alias, image, thumbnail, weight, orders, numsub, suborgan, lev, active, add_time, edit_time, address, email, phone, phone_ext, fax, website, numperson, description, view) VALUES (3, 0, 'Chi bộ Đảng', 'Chi-bo-Dang', '', '', 5, 5, 0, '', 0, 1, 1442822317, 1442822317, '', '', '', '', '', '', 0, '', 1)" );
$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (organid, parentid, title, alias, image, thumbnail, weight, orders, numsub, suborgan, lev, active, add_time, edit_time, address, email, phone, phone_ext, fax, website, numperson, description, view) VALUES (4, 0, 'BCH Công Đoàn', 'BCH-Cong-Doan', '', '', 4, 4, 0, '', 0, 1, 1442822325, 1442822325, '', '', '', '', '', '', 0, '', 1)" );
$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (organid, parentid, title, alias, image, thumbnail, weight, orders, numsub, suborgan, lev, active, add_time, edit_time, address, email, phone, phone_ext, fax, website, numperson, description, view) VALUES (5, 0, 'Đoàn thanh niên', 'Doan-thanh-nien', '', '', 6, 6, 0, '', 0, 1, 1442822334, 1442822334, '', '', '', '', '', '', 0, '', 1)" );
$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (organid, parentid, title, alias, image, thumbnail, weight, orders, numsub, suborgan, lev, active, add_time, edit_time, address, email, phone, phone_ext, fax, website, numperson, description, view) VALUES (6, 0, 'Thường trực hội cha mẹ học sinh', 'Thuong-truc-hoi-cha-me-hoc-sinh', '', '', 7, 7, 0, '', 0, 1, 1442822345, 1442829333, '', '', '', '', '', '', 0, '', 1)" );
