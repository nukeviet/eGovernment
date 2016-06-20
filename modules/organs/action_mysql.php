<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  11:10:39 AM
 */

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows;";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_person;";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config;";
$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (
  organid mediumint(11) unsigned NOT NULL AUTO_INCREMENT,
  parentid mediumint(11) unsigned NOT NULL DEFAULT '0',
  title varchar(250) NOT NULL,
  alias varchar(250) NOT NULL DEFAULT '',
  image varchar(255) NOT NULL DEFAULT '',
  thumbnail varchar(255) NOT NULL DEFAULT '',
  weight smallint(4) unsigned NOT NULL DEFAULT '0',
  orders int(8) NOT NULL DEFAULT '0',
  numsub int(8) NOT NULL DEFAULT '0',
  suborgan varchar(255) NOT NULL DEFAULT '',
  lev int(8) NOT NULL,
  active tinyint(1) unsigned NOT NULL DEFAULT '0',
  add_time int(11) unsigned NOT NULL DEFAULT '0',
  edit_time int(11) unsigned NOT NULL DEFAULT '0',
  address text NOT NULL,
  email text NOT NULL,
  phone varchar(50) NOT NULL,
  phone_ext char(12) NOT NULL,
  fax varchar(50) NOT NULL,
  website text NOT NULL,
  numperson int(8) NOT NULL,
  description mediumtext NOT NULL,
  view int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (organid),
  UNIQUE KEY alias (alias),
  KEY parentid (parentid)
) ENGINE=MyISAM ";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_person (
  personid int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  photo varchar(255) NOT NULL,
  phone_ext CHAR( 20 ) NOT NULL,
  mobile char(20) NOT NULL,
  email varchar(50) NOT NULL,
  position text NOT NULL,
  position_other text NOT NULL,
  address text NOT NULL,
  phone varchar(255) NOT NULL,
  birthday int(11) NOT NULL,
  place_birth varchar(255) NOT NULL,
  description mediumtext NOT NULL,
  addtime int(11) NOT NULL,
  edittime int(11) NOT NULL,
  organid int(11) NOT NULL,
  weight int(8) NOT NULL DEFAULT '0',
  active tinyint(2) NOT NULL DEFAULT '0',
  dayinto int(11) NOT NULL DEFAULT '0',
  dayparty int(11) NOT NULL DEFAULT '0',
  marital_status text NOT NULL,
  professional text NOT NULL,
  political text NOT NULL,
  PRIMARY KEY (personid)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (
 config_name varchar(30) NOT NULL,
 config_value varchar(255) NOT NULL,
 UNIQUE KEY config_name (config_name)
)ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config VALUES
('per_page', '10'),
('organ_view_type', '0'),
('organ_view_type_main', '0'),
('thumb_width', '80'),
('thumb_height', '100')
";
