<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 07 May 2020 07:25:55 GMT
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

$sample_base_siteurl = '/';
$sql_create_table = array();


$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_authors_oauth`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_authors_oauth` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) unsigned NOT NULL COMMENT 'ID của quản trị',
  `oauth_server` varchar(50) NOT NULL COMMENT 'Eg: facebook, google...',
  `oauth_uid` varchar(50) NOT NULL COMMENT 'ID duy nhất ứng với server',
  `oauth_email` varchar(50) NOT NULL COMMENT 'Email',
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_id` (`admin_id`,`oauth_server`,`oauth_uid`),
  KEY `oauth_email` (`oauth_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci COMMENT='Bảng lưu xác thực 2 bước từ oauth của admin'";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_banip`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_banip` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `ip` varchar(32) DEFAULT NULL,
  `mask` tinyint(4) NOT NULL DEFAULT 0,
  `area` tinyint(3) NOT NULL,
  `begintime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `notice` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_banners_plans`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_banners_plans` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `blang` char(2) DEFAULT '',
  `title` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `form` varchar(100) NOT NULL,
  `width` smallint(4) unsigned NOT NULL DEFAULT 0,
  `height` smallint(4) unsigned NOT NULL DEFAULT 0,
  `act` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `require_image` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `uploadtype` varchar(255) NOT NULL DEFAULT '',
  `uploadgroup` varchar(255) NOT NULL DEFAULT '',
  `exp_time` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  AUTO_INCREMENT=7  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_plans` (`id`, `blang`, `title`, `description`, `form`, `width`, `height`, `act`, `require_image`, `uploadtype`, `uploadgroup`, `exp_time`) VALUES (1, '', 'Quang cao giua trang', '', 'sequential', 575, 72, 1, 1, '', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_plans` (`id`, `blang`, `title`, `description`, `form`, `width`, `height`, `act`, `require_image`, `uploadtype`, `uploadgroup`, `exp_time`) VALUES (2, '', 'Quang cao trai', '', 'sequential', 212, 800, 1, 1, '', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_plans` (`id`, `blang`, `title`, `description`, `form`, `width`, `height`, `act`, `require_image`, `uploadtype`, `uploadgroup`, `exp_time`) VALUES (3, '', 'Quang cao Phai', '', 'random', 250, 500, 1, 1, '', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_plans` (`id`, `blang`, `title`, `description`, `form`, `width`, `height`, `act`, `require_image`, `uploadtype`, `uploadgroup`, `exp_time`) VALUES (4, '', 'Slider', '', 'sequential', 1080, 395, 1, 0, '', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_plans` (`id`, `blang`, `title`, `description`, `form`, `width`, `height`, `act`, `require_image`, `uploadtype`, `uploadgroup`, `exp_time`) VALUES (5, '', 'Bản đồ hành chính', '', 'sequential', 230, 313, 1, 0, '', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_plans` (`id`, `blang`, `title`, `description`, `form`, `width`, `height`, `act`, `require_image`, `uploadtype`, `uploadgroup`, `exp_time`) VALUES (6, '', 'Liên kết', '', 'sequential', 230, 94, 1, 0, '', '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_banners_rows`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_banners_rows` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `clid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `file_name` varchar(255) NOT NULL,
  `file_ext` varchar(100) NOT NULL,
  `file_mime` varchar(100) NOT NULL,
  `width` int(4) unsigned NOT NULL DEFAULT 0,
  `height` int(4) unsigned NOT NULL DEFAULT 0,
  `file_alt` varchar(255) DEFAULT '',
  `imageforswf` varchar(255) DEFAULT '',
  `click_url` varchar(255) DEFAULT '',
  `target` varchar(10) NOT NULL DEFAULT '_blank',
  `bannerhtml` mediumtext NOT NULL,
  `add_time` int(11) unsigned NOT NULL DEFAULT 0,
  `publ_time` int(11) unsigned NOT NULL DEFAULT 0,
  `exp_time` int(11) unsigned NOT NULL DEFAULT 0,
  `hits_total` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `act` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `weight` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `clid` (`clid`)
) ENGINE=MyISAM  AUTO_INCREMENT=11  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_rows` (`id`, `title`, `pid`, `clid`, `file_name`, `file_ext`, `file_mime`, `width`, `height`, `file_alt`, `imageforswf`, `click_url`, `target`, `bannerhtml`, `add_time`, `publ_time`, `exp_time`, `hits_total`, `act`, `weight`) VALUES (2, 'vinades', 2, 0, 'vinades.jpg', 'jpg', 'image/jpeg', 212, 400, '', '', 'http://vinades.vn', '_blank', '', 1546504163, 1546504163, 0, 0, 1, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_rows` (`id`, `title`, `pid`, `clid`, `file_name`, `file_ext`, `file_mime`, `width`, `height`, `file_alt`, `imageforswf`, `click_url`, `target`, `bannerhtml`, `add_time`, `publ_time`, `exp_time`, `hits_total`, `act`, `weight`) VALUES (3, 'Quang cao giua trang', 1, 0, 'webnhanh.jpg', 'png', 'image/jpeg', 575, 72, '', '', 'http://webnhanh.vn', '_blank', '', 1546504163, 1546504163, 0, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_rows` (`id`, `title`, `pid`, `clid`, `file_name`, `file_ext`, `file_mime`, `width`, `height`, `file_alt`, `imageforswf`, `click_url`, `target`, `bannerhtml`, `add_time`, `publ_time`, `exp_time`, `hits_total`, `act`, `weight`) VALUES (4, 'slider1', 4, 0, 'slider1.jpg', 'jpg', 'image/jpeg', 1080, 395, '', '', '', '_blank', '', 1498721564, 1498721564, 0, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_rows` (`id`, `title`, `pid`, `clid`, `file_name`, `file_ext`, `file_mime`, `width`, `height`, `file_alt`, `imageforswf`, `click_url`, `target`, `bannerhtml`, `add_time`, `publ_time`, `exp_time`, `hits_total`, `act`, `weight`) VALUES (5, 'hc1', 5, 1, 'bandohc.jpg', 'jpg', 'image/jpeg', 230, 312, '', '', '', '_blank', '', 1498725937, 1498725900, 0, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_rows` (`id`, `title`, `pid`, `clid`, `file_name`, `file_ext`, `file_mime`, `width`, `height`, `file_alt`, `imageforswf`, `click_url`, `target`, `bannerhtml`, `add_time`, `publ_time`, `exp_time`, `hits_total`, `act`, `weight`) VALUES (6, 'Văn bản chỉ đạo điều hành', 6, 0, 'qc1.jpg', 'jpg', 'image/jpeg', 249, 102, '', '', 'http://egov-demo.nukeviet.vn/laws/', '_blank', '', 1498791748, 1498791748, 0, 2, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_rows` (`id`, `title`, `pid`, `clid`, `file_name`, `file_ext`, `file_mime`, `width`, `height`, `file_alt`, `imageforswf`, `click_url`, `target`, `bannerhtml`, `add_time`, `publ_time`, `exp_time`, `hits_total`, `act`, `weight`) VALUES (7, 'Dịch vụ công trực tuyến', 6, 0, 'qc2.jpg', 'jpg', 'image/jpeg', 249, 102, '', '', 'http://www.chinhphu.vn/portal/page/portal/chinhphu/congdan/dichvucong', '_blank', '', 1498791768, 1498791768, 0, 2, 1, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_rows` (`id`, `title`, `pid`, `clid`, `file_name`, `file_ext`, `file_mime`, `width`, `height`, `file_alt`, `imageforswf`, `click_url`, `target`, `bannerhtml`, `add_time`, `publ_time`, `exp_time`, `hits_total`, `act`, `weight`) VALUES (8, 'Thủ tục hành chính', 6, 0, 'qc3.jpg', 'jpg', 'image/jpeg', 250, 93, '', '', 'http://csdl.thutuchanhchinh.vn/Pages/trang-chu.aspx', '_blank', '', 1498791775, 1498791775, 0, 1, 1, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_rows` (`id`, `title`, `pid`, `clid`, `file_name`, `file_ext`, `file_mime`, `width`, `height`, `file_alt`, `imageforswf`, `click_url`, `target`, `bannerhtml`, `add_time`, `publ_time`, `exp_time`, `hits_total`, `act`, `weight`) VALUES (9, 'Trả lời cử chi', 6, 0, 'qc4.jpg', 'jpg', 'image/jpeg', 249, 95, '', '', 'http://media.chinhphu.vn/video/chuyen-muc-dan-hoi--bo-truong-tra-loi-4', '_blank', '', 1498791789, 1498791789, 0, 2, 1, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_banners_rows` (`id`, `title`, `pid`, `clid`, `file_name`, `file_ext`, `file_mime`, `width`, `height`, `file_alt`, `imageforswf`, `click_url`, `target`, `bannerhtml`, `add_time`, `publ_time`, `exp_time`, `hits_total`, `act`, `weight`) VALUES (10, 'Slider 2 123', 4, 1, 'slider1.jpg', 'jpg', 'image/jpeg', 1080, 395, '', '', '', '_blank', '', 1500953093, 1500953040, 0, 0, 1, 2)";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'closed_site', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'admin_theme', 'admin_default')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'date_pattern', 'l, d/m/Y')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'time_pattern', 'H:i')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'online_upd', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'statistic', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'site_phone', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'mailer_mode', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'smtp_host', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'smtp_ssl', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'smtp_port', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'verify_peer_ssl', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'verify_peer_name_ssl', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'smtp_username', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'smtp_password', 'FZCCtcnHY50lm3nE5HeKYg,,')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'googleAnalyticsID', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'googleAnalyticsSetDomainName', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'googleAnalyticsMethod', 'classic')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'cors_restrict_domains', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'searchEngineUniqueID', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'metaTagsOgp', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'pageTitleMode', 'pagetitle')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'description_length', '170')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'nv_unickmin', '4')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'nv_unickmax', '20')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'nv_upassmin', '8')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'nv_upassmax', '32')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'dir_forum', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'nv_unick_type', '4')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'nv_upass_type', '3')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'allowmailchange', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'allowuserpublic', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'allowquestion', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'allowloginchange', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'allowuserlogin', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'allowuserloginmulti', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'allowuserreg', '2')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'is_user_forum', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'openid_servers', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'openid_processing', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'user_check_pass_time', '1800')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'auto_login_after_reg', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'whoviewuser', '2')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'ssl_https', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'facebook_client_id', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'facebook_client_secret', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'google_client_id', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'google_client_secret', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_gfx_num', '6')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'notification_active', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'notification_autodel', '15')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'site_keywords', 'NukeViet, portal, mysql, php')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'block_admin_ip', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'admfirewall', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'dump_autobackup', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'dump_backup_ext', 'gz')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'dump_backup_day', '30')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'gfx_chk', '3')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'file_allowed_ext', 'adobe,archives,audio,documents,flash,images,real,video')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'forbid_extensions', 'php,php3,php4,php5,phtml,inc')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'forbid_mimes', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'nv_max_size', '20971520')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'upload_checking_mode', 'mild')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'upload_alt_require', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'upload_auto_alt', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'upload_chunk_size', '1048576')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'useactivate', '2')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'allow_sitelangs', 'vi')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'read_type', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'rewrite_enable', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'rewrite_optional', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'rewrite_endurl', '/')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'rewrite_exturl', '.html')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'rewrite_op_mod', 'news')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'autocheckupdate', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'autoupdatetime', '24')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'gzip_method', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'authors_detail_main', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'spadmin_add_admin', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'timestamp', '1588735385')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'captcha_type', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'version', '1.2.00')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'cookie_httponly', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'admin_check_pass_time', '1800')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'cookie_secure', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'is_flood_blocker', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'max_requests_60', '40')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'max_requests_300', '150')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'is_login_blocker', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'login_number_tracking', '5')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'login_time_tracking', '5')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'login_time_ban', '1440')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'nv_display_errors_list', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'display_errors_list', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'nv_auto_resize', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'dump_interval', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'cdn_url', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'two_step_verification', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'recaptcha_sitekey', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'recaptcha_secretkey', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'recaptcha_type', 'image')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_gfx_width', '150')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_gfx_height', '40')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_max_width', '1500')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_max_height', '1500')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_live_cookie_time', '31104000')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_live_session_time', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_anti_iframe', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_anti_agent', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_allowed_html_tags', 'embed, object, param, a, b, blockquote, br, caption, col, colgroup, div, em, h1, h2, h3, h4, h5, h6, hr, i, img, li, p, span, strong, s, sub, sup, table, tbody, td, th, tr, u, ul, ol, iframe, figure, figcaption, video, audio, source, track, code, pre, svg, defs, filter, dropshadow, fegaussianblur, sourcealpha, stddeviation, result, blur, feoffset, in, dx, dy, offsetblur, feflood, fecomposite, offsetcolor, operator, feblend, sourcegraphic, in2, g, transform, rect, x, y, rx, ry, xmlns, fill, stroke, translate, opacity, height, width, all, foreignobject, font, face, path, d, visibility, style, lineargradient, x1, x2, y1, y2, id, stop, offset, script, type')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'define', 'nv_debug', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'site_domain', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'site_logo', 'uploads/logo.png')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'site_banner', 'uploads/banner_1.jpg')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'site_favicon', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'site_description', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'site_keywords', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'theme_type', 'r,d,m')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'site_theme', 'egov')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'preview_theme', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'mobile_theme', 'mobile_egov')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'site_home_module', 'news')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'switch_mobi_des', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'upload_logo', 'uploads/logo_nukevietegov.png')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'upload_logo_pos', 'bottomRight')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'autologosize1', '50')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'autologosize2', '40')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'autologosize3', '30')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'autologomod', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'name_show', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'cronjobs_next_time', '1588836436')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'disable_site_content', 'Vì lý do kỹ thuật website tạm ngưng hoạt động. Thành thật xin lỗi các bạn vì sự bất tiện này!')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'seotools', 'prcservice', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'auto_postcomm', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'allowed_comm', '-1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'view_comm', '6')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'setcomm', '4')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'activecomm', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'emailcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'adminscomm', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'sortcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'captcha', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'perpagecomm', '5')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'timeoutcomm', '360')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'allowattachcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'about', 'alloweditorcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'indexfile', 'viewcat_two_column')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'per_page', '20')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'st_links', '10')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'homewidth', '170')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'homeheight', '170')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'blockwidth', '70')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'blockheight', '75')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'imagefull', '600')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'copyright', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'showtooltip', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'tooltip_position', 'bottom')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'tooltip_length', '150')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'showhometext', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'timecheckstatus', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'config_source', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'show_no_image', 'uploads/no-image.jpg')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'allowed_rating_point', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'facebookappid', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'socialbutton', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'alias_lower', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'tags_alias', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'auto_tags', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'tags_remind', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'keywords_tag', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'copy_news', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'structure_upload', 'Ym')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'imgposition', '2')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'htmlhometext', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'order_articles', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'elas_use', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'elas_host', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'elas_port', '9200')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'elas_index', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'instant_articles_active', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'instant_articles_template', 'default')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'instant_articles_httpauth', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'instant_articles_username', 'admin')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'instant_articles_password', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'instant_articles_livetime', '60')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'instant_articles_gettime', '120')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'instant_articles_auto', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'auto_postcomm', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'allowed_comm', '-1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'view_comm', '6')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'setcomm', '4')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'activecomm', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'emailcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'adminscomm', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'sortcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'captcha', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'perpagecomm', '5')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'timeoutcomm', '360')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'allowattachcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'alloweditorcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'frontend_edit_alias', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'frontend_edit_layout', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'contact', 'bodytext', 'Để không ngừng nâng cao chất lượng dịch vụ và đáp ứng tốt hơn nữa các yêu cầu của Quý khách, chúng tôi mong muốn nhận được các thông tin phản hồi. Nếu Quý khách có bất kỳ thắc mắc hoặc đóng góp nào, xin vui lòng liên hệ với chúng tôi theo thông tin dưới đây. Chúng tôi sẽ phản hồi lại Quý khách trong thời gian sớm nhất.')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'contact', 'sendcopymode', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'auto_postcomm', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'allowed_comm', '-1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'view_comm', '6')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'setcomm', '4')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'activecomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'emailcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'adminscomm', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'sortcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'captcha', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'perpagecomm', '5')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'timeoutcomm', '360')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'allowattachcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'page', 'alloweditorcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'auto_postcomm', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'allowed_comm', '-1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'view_comm', '6')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'setcomm', '4')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'activecomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'emailcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'adminscomm', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'sortcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'captcha', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'perpagecomm', '5')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'timeoutcomm', '360')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'allowattachcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'siteterms', 'alloweditorcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'freecontent', 'next_execute', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'view_comm', '6')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'statistics_timezone', 'Asia/Bangkok')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'site_email', 'admin@nukeviet.vn')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'error_set_logs', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'error_send_email', 'admin@nukeviet.vn')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'site_lang', 'vi')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'my_domains', 'egovernment-update.nukeviet4.my')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'site_timezone', 'byCountry')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'proxy_blocker', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'str_referer_blocker', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'lang_geo', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'ftp_server', 'localhost')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'ftp_port', '21')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'ftp_user_name', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'ftp_user_pass', 'hDXTbp3-Q9qubVWqbTadZYQ1026d_kParm1Vqm02nWU,')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'ftp_path', '/')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'ftp_check_login', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'facebook_client_id', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'facebook_client_secret', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'google_client_id', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'google_client_secret', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'allowed_comm', '6')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'auto_postcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'setcomm', '4')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'activecomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'emailcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'adminscomm', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'sortcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'captcha', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'perpagecomm', '5')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'timeoutcomm', '360')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'view_comm', '6')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'allowed_comm', '6')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'auto_postcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'setcomm', '4')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'activecomm', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'emailcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'adminscomm', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'sortcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'captcha', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'perpagecomm', '5')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'timeoutcomm', '360')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'allowattachcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'laws', 'alloweditorcomm', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'allowattachcomm', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'opinions', 'alloweditorcomm', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'news', 'identify_cat_change', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'cors_valid_domains', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'referer_blocker', '1')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('vi', 'global', 'user_allowed_theme', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'private_site', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'admin_2step_opt', 'code')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'admin_2step_default', 'code')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'nv_overflow_size', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'sender_name', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'sender_email', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'reply_name', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'reply_email', '')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'force_sender', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'force_reply', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'notify_email_error', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'max_user_admin', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'max_user_number', '0')";
$sql_create_table[] = "REPLACE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'users_special', '0')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_cronjobs`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_cronjobs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `start_time` int(11) unsigned NOT NULL DEFAULT 0,
  `inter_val` int(11) unsigned NOT NULL DEFAULT 0,
  `inter_val_type` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '0: Lặp lại sau thời điểm bắt đầu thực tế, 1:lặp lại sau thời điểm bắt đầu trong CSDL',
  `run_file` varchar(255) NOT NULL,
  `run_func` varchar(255) NOT NULL,
  `params` varchar(255) DEFAULT NULL,
  `del` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `is_sys` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `act` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `last_time` int(11) unsigned NOT NULL DEFAULT 0,
  `last_result` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `vi_cron_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `is_sys` (`is_sys`)
) ENGINE=MyISAM  AUTO_INCREMENT=10  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_cronjobs` (`id`, `start_time`, `inter_val`, `inter_val_type`, `run_file`, `run_func`, `params`, `del`, `is_sys`, `act`, `last_time`, `last_result`, `vi_cron_name`) VALUES (1, 1546504163, 5, 0, 'online_expired_del.php', 'cron_online_expired_del', '', 0, 1, 1, 1588836136, 1, 'Xóa các dòng ghi trạng thái online đã cũ trong CSDL')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_cronjobs` (`id`, `start_time`, `inter_val`, `inter_val_type`, `run_file`, `run_func`, `params`, `del`, `is_sys`, `act`, `last_time`, `last_result`, `vi_cron_name`) VALUES (2, 1546504163, 1440, 0, 'dump_autobackup.php', 'cron_dump_autobackup', '', 0, 1, 1, 1588836136, 1, 'Tự động lưu CSDL')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_cronjobs` (`id`, `start_time`, `inter_val`, `inter_val_type`, `run_file`, `run_func`, `params`, `del`, `is_sys`, `act`, `last_time`, `last_result`, `vi_cron_name`) VALUES (3, 1546504163, 60, 0, 'temp_download_destroy.php', 'cron_auto_del_temp_download', '', 0, 1, 1, 1588836136, 1, 'Xóa các file tạm trong thư mục tmp')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_cronjobs` (`id`, `start_time`, `inter_val`, `inter_val_type`, `run_file`, `run_func`, `params`, `del`, `is_sys`, `act`, `last_time`, `last_result`, `vi_cron_name`) VALUES (4, 1546504163, 30, 0, 'ip_logs_destroy.php', 'cron_del_ip_logs', '', 0, 1, 1, 1588836136, 1, 'Xóa IP log files, Xóa các file nhật ký truy cập')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_cronjobs` (`id`, `start_time`, `inter_val`, `inter_val_type`, `run_file`, `run_func`, `params`, `del`, `is_sys`, `act`, `last_time`, `last_result`, `vi_cron_name`) VALUES (5, 1546504163, 1440, 0, 'error_log_destroy.php', 'cron_auto_del_error_log', '', 0, 1, 1, 1588836136, 1, 'Xóa các file error_log quá hạn')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_cronjobs` (`id`, `start_time`, `inter_val`, `inter_val_type`, `run_file`, `run_func`, `params`, `del`, `is_sys`, `act`, `last_time`, `last_result`, `vi_cron_name`) VALUES (6, 1546504163, 360, 0, 'error_log_sendmail.php', 'cron_auto_sendmail_error_log', '', 0, 1, 0, 0, 0, 'Gửi email các thông báo lỗi cho admin')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_cronjobs` (`id`, `start_time`, `inter_val`, `inter_val_type`, `run_file`, `run_func`, `params`, `del`, `is_sys`, `act`, `last_time`, `last_result`, `vi_cron_name`) VALUES (7, 1546504163, 60, 0, 'ref_expired_del.php', 'cron_ref_expired_del', '', 0, 1, 1, 1588836136, 1, 'Xóa các referer quá hạn')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_cronjobs` (`id`, `start_time`, `inter_val`, `inter_val_type`, `run_file`, `run_func`, `params`, `del`, `is_sys`, `act`, `last_time`, `last_result`, `vi_cron_name`) VALUES (8, 1546504163, 60, 0, 'check_version.php', 'cron_auto_check_version', '', 0, 1, 1, 1588836136, 1, 'Kiểm tra phiên bản NukeViet')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_cronjobs` (`id`, `start_time`, `inter_val`, `inter_val_type`, `run_file`, `run_func`, `params`, `del`, `is_sys`, `act`, `last_time`, `last_result`, `vi_cron_name`) VALUES (9, 1546504163, 1440, 0, 'notification_autodel.php', 'cron_notification_autodel', '', 0, 1, 1, 1588836136, 1, 'Xóa thông báo cũ')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_extension_files`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_extension_files` (
  `idfile` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT 'other',
  `title` varchar(55) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `lastmodified` int(11) unsigned NOT NULL DEFAULT 0,
  `duplicate` smallint(4) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`idfile`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_ips`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_ips` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) unsigned NOT NULL DEFAULT 0,
  `ip` varchar(39) NOT NULL DEFAULT '',
  `mask` tinyint(4) unsigned NOT NULL DEFAULT 0,
  `area` tinyint(3) NOT NULL,
  `begintime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `notice` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`,`type`)
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_ips` (`id`, `type`, `ip`, `mask`, `area`, `begintime`, `endtime`, `notice`) VALUES (1, 1, '127.0.0.1', 0, 1, 1588734706, 0, '')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_language`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_language` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `idfile` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `langtype` varchar(50) NOT NULL DEFAULT 'lang_module',
  `lang_key` varchar(50) NOT NULL,
  `lang_en` text DEFAULT NULL,
  `update_en` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filelang` USING BTREE (`idfile`,`lang_key`,`langtype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_language_file`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_language_file` (
  `idfile` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(50) NOT NULL,
  `admin_file` varchar(200) NOT NULL DEFAULT '0',
  `langtype` varchar(50) NOT NULL DEFAULT 'lang_module',
  `author_en` text DEFAULT NULL,
  PRIMARY KEY (`idfile`),
  UNIQUE KEY `module` (`module`,`admin_file`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_notification`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_notification` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_view_allowed` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT 'Cấp quản trị được xem: 0,1,2',
  `logic_mode` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '0: Cấp trên xem được cấp dưới, 1: chỉ cấp hoặc người được chỉ định',
  `send_to` varchar(250) NOT NULL DEFAULT '' COMMENT 'danh sách id người nhận, phân cách bởi dấu phảy',
  `send_from` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `area` tinyint(1) unsigned NOT NULL,
  `language` char(3) NOT NULL,
  `module` varchar(50) NOT NULL,
  `obid` int(11) unsigned NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `add_time` int(11) unsigned NOT NULL,
  `view` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `send_to` (`send_to`),
  KEY `admin_view_allowed` (`admin_view_allowed`),
  KEY `logic_mode` (`logic_mode`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_plugin`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_plugin` (
  `pid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `plugin_file` varchar(50) NOT NULL,
  `plugin_area` tinyint(4) NOT NULL,
  `weight` tinyint(4) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `plugin_file` (`plugin_file`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_plugin` (`pid`, `plugin_file`, `plugin_area`, `weight`) VALUES (1, 'qrcode.php', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_plugin` (`pid`, `plugin_file`, `plugin_area`, `weight`) VALUES (2, 'cdn_js_css_image.php', 3, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_setup_extensions`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_setup_extensions` (
  `id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(10) NOT NULL DEFAULT 'other',
  `title` varchar(55) NOT NULL,
  `is_sys` tinyint(1) NOT NULL DEFAULT 0,
  `is_virtual` tinyint(1) NOT NULL DEFAULT 0,
  `basename` varchar(50) NOT NULL DEFAULT '',
  `table_prefix` varchar(55) NOT NULL DEFAULT '',
  `version` varchar(50) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT 0,
  `author` text NOT NULL,
  `note` varchar(255) DEFAULT '',
  UNIQUE KEY `title` (`type`,`title`),
  KEY `id` (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (0, 'module', 'siteterms', 0, 0, 'page', 'siteterms', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (19, 'module', 'banners', 1, 0, 'banners', 'banners', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (20, 'module', 'contact', 0, 1, 'contact', 'contact', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (1, 'module', 'news', 0, 1, 'news', 'news', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (21, 'module', 'voting', 0, 0, 'voting', 'voting', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (28, 'module', 'faq', 0, 1, 'faq', 'faq', '4.3.04 1546504163', 1498555548, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (284, 'module', 'seek', 1, 0, 'seek', 'seek', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (24, 'module', 'users', 1, 1, 'users', 'users', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (27, 'module', 'statistics', 0, 0, 'statistics', 'statistics', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (29, 'module', 'menu', 0, 0, 'menu', 'menu', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (283, 'module', 'feeds', 1, 0, 'feeds', 'feeds', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (282, 'module', 'page', 1, 1, 'page', 'page', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (281, 'module', 'comment', 1, 0, 'comment', 'comment', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (312, 'module', 'freecontent', 0, 1, 'freecontent', 'freecontent', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (327, 'module', 'two-step-verification', 1, 0, 'two-step-verification', 'two_step_verification', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (307, 'theme', 'default', 0, 0, 'default', 'default', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (311, 'theme', 'mobile_default', 0, 0, 'mobile_default', 'mobile_default', '4.4.00 1588150800', 1546504163, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (254, 'module', 'laws', 0, 1, 'laws', 'laws', '4.3.04 1546504163', 1498555548, 'VINADES (contact@vinades.vn)', 'Modules văn bản pháp luật')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (391, 'theme', 'egov', 0, 0, 'egov', 'egov', '4.3.04 1546504163', 1510912800, 'VINADES (contact@vinades.vn)', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (0, 'module', 'about', 0, 0, 'page', 'about', '4.4.00 1588150800', 1500862887, '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (374, 'module', 'organs', 0, 1, 'organs', 'organs', '4.3.04 1546504163', 1506565060, 'VINADES (contact@vinades.vn)', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (0, 'module', 'co-cau-to-chuc', 0, 0, 'organs', 'co_cau_to_chuc', '4.3.04 1546504163', 1506565068, '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (0, 'module', 'opinions', 0, 0, 'laws', 'opinions', '4.3.04 1546504163', 1506570465, '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (392, 'theme', 'mobile_egov', 0, 0, 'mobile_egov', 'mobile_egov', '4.3.04 1546504163', 1510912800, 'VINADES (contact@vinades.vn)', 'Đây là giao diện mặc định cho mobile')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_extensions` (`id`, `type`, `title`, `is_sys`, `is_virtual`, `basename`, `table_prefix`, `version`, `addtime`, `author`, `note`) VALUES (64, 'module', 'videoclips', 0, 1, 'videoclips', 'videoclips', '4.3.04 1546504163', 1510884305, 'VINADES (contact@vinades.vn)', 'Module playback of video-clips')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_setup_language`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_setup_language` (
  `lang` char(2) NOT NULL,
  `setup` tinyint(1) NOT NULL DEFAULT 0,
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_setup_language` (`lang`, `setup`, `weight`) VALUES ('vi', 1, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_backupcodes`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_backupcodes` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `is_used` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `time_used` int(11) unsigned NOT NULL DEFAULT 0,
  `time_creat` int(11) unsigned NOT NULL DEFAULT 0,
  UNIQUE KEY `userid` (`userid`,`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_config`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_config` (
  `config` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `edit_time` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`config`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('access_admin', 'a:6:{s:12:\"access_addus\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:14:\"access_waiting\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:13:\"access_editus\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:12:\"access_delus\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:13:\"access_passus\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:13:\"access_groups\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}}', 1352873462)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('password_simple', '000000|1234|2000|12345|111111|123123|123456|11223344|654321|696969|1234567|12345678|87654321|123456789|23456789|1234567890|66666666|68686868|66668888|88888888|99999999|999999999|1234569|12345679|aaaaaa|abc123|abc123@|abc@123|admin123|admin123@|admin@123|nuke123|nuke123@|nuke@123|adobe1|adobe123|azerty|baseball|dragon|football|harley|iloveyou|jennifer|jordan|letmein|macromedia|master|michael|monkey|mustang|password|photoshop|pussy|qwerty|shadow|superman|hoilamgi|khongbiet|khongco|khongcopass', 1546504163)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('deny_email', 'yoursite.com|mysite.com|localhost|xxx', 1546504163)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('deny_name', 'anonimo|anonymous|god|linux|nobody|operator|root', 1546504163)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('avatar_width', '80', 1546504163)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('avatar_height', '80', 1546504163)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('active_group_newusers', '0', 1546504163)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('min_old_user', '16', 1546504163)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('siteterms_vi', '<p> Để trở thành thành viên, bạn phải cam kết đồng ý với các điều khoản dưới đây. Chúng tôi có thể thay đổi lại những điều khoản này vào bất cứ lúc nào và chúng tôi sẽ cố gắng thông báo đến bạn kịp thời.<br /> <br /> Bạn cam kết không gửi bất cứ bài viết có nội dung lừa đảo, thô tục, thiếu văn hoá; vu khống, khiêu khích, đe doạ người khác; liên quan đến các vấn đề tình dục hay bất cứ nội dung nào vi phạm luật pháp của quốc gia mà bạn đang sống, luật pháp của quốc gia nơi đặt máy chủ của website này hay luật pháp quốc tế. Nếu vẫn cố tình vi phạm, ngay lập tức bạn sẽ bị cấm tham gia vào website. Địa chỉ IP của tất cả các bài viết đều được ghi nhận lại để bảo vệ các điều khoản cam kết này trong trường hợp bạn không tuân thủ.<br /> <br /> Bạn đồng ý rằng website có quyền gỡ bỏ, sửa, di chuyển hoặc khoá bất kỳ bài viết nào trong website vào bất cứ lúc nào tuỳ theo nhu cầu công việc.<br /> <br /> Đăng ký làm thành viên của chúng tôi, bạn cũng phải đồng ý rằng, bất kỳ thông tin cá nhân nào mà bạn cung cấp đều được lưu trữ trong cơ sở dữ liệu của hệ thống. Mặc dù những thông tin này sẽ không được cung cấp cho bất kỳ người thứ ba nào khác mà không được sự đồng ý của bạn, chúng tôi không chịu trách nhiệm về việc những thông tin cá nhân này của bạn bị lộ ra bên ngoài từ những kẻ phá hoại có ý đồ xấu tấn công vào cơ sở dữ liệu của hệ thống.</p>', 1274757129)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_config` (`config`, `content`, `edit_time`) VALUES ('active_editinfo_censor', '0', 1588735322)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_edit`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_edit` (
  `userid` mediumint(8) unsigned NOT NULL,
  `lastedit` int(11) unsigned NOT NULL DEFAULT 0,
  `info_basic` text NOT NULL,
  `info_custom` text NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_field`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_field` (
  `fid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `field` varchar(25) NOT NULL,
  `weight` int(10) unsigned NOT NULL DEFAULT 1,
  `field_type` enum('number','date','textbox','textarea','editor','select','radio','checkbox','multiselect') NOT NULL DEFAULT 'textbox',
  `field_choices` text NOT NULL,
  `sql_choices` text NOT NULL,
  `match_type` enum('none','alphanumeric','email','url','regex','callback') NOT NULL DEFAULT 'none',
  `match_regex` varchar(250) NOT NULL DEFAULT '',
  `func_callback` varchar(75) NOT NULL DEFAULT '',
  `min_length` int(11) NOT NULL DEFAULT 0,
  `max_length` bigint(20) unsigned NOT NULL DEFAULT 0,
  `required` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `show_register` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `user_editable` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `show_profile` tinyint(4) NOT NULL DEFAULT 1,
  `class` varchar(50) NOT NULL,
  `language` text NOT NULL,
  `default_value` varchar(255) NOT NULL DEFAULT '',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`fid`),
  UNIQUE KEY `field` (`field`)
) ENGINE=MyISAM  AUTO_INCREMENT=8  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_field` (`fid`, `field`, `weight`, `field_type`, `field_choices`, `sql_choices`, `match_type`, `match_regex`, `func_callback`, `min_length`, `max_length`, `required`, `show_register`, `user_editable`, `show_profile`, `class`, `language`, `default_value`, `is_system`) VALUES (1, 'first_name', 1, 'textbox', '', '', 'none', '', '', 0, 100, 1, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:4:\"Tên\";i:1;s:0:\"\";}}', '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_field` (`fid`, `field`, `weight`, `field_type`, `field_choices`, `sql_choices`, `match_type`, `match_regex`, `func_callback`, `min_length`, `max_length`, `required`, `show_register`, `user_editable`, `show_profile`, `class`, `language`, `default_value`, `is_system`) VALUES (2, 'last_name', 2, 'textbox', '', '', 'none', '', '', 0, 100, 0, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:20:\"Họ và tên đệm\";i:1;s:0:\"\";}}', '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_field` (`fid`, `field`, `weight`, `field_type`, `field_choices`, `sql_choices`, `match_type`, `match_regex`, `func_callback`, `min_length`, `max_length`, `required`, `show_register`, `user_editable`, `show_profile`, `class`, `language`, `default_value`, `is_system`) VALUES (3, 'gender', 3, 'select', 'a:3:{s:1:\"N\";s:0:\"\";s:1:\"M\";s:0:\"\";s:1:\"F\";s:0:\"\";}', '', 'none', '', '', 0, 1, 0, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:12:\"Giới tính\";i:1;s:0:\"\";}}', '2', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_field` (`fid`, `field`, `weight`, `field_type`, `field_choices`, `sql_choices`, `match_type`, `match_regex`, `func_callback`, `min_length`, `max_length`, `required`, `show_register`, `user_editable`, `show_profile`, `class`, `language`, `default_value`, `is_system`) VALUES (4, 'birthday', 4, 'date', 'a:1:{s:12:\"current_date\";i:0;}', '', 'none', '', '', 0, 0, 1, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:22:\"Ngày tháng năm sinh\";i:1;s:0:\"\";}}', '0', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_field` (`fid`, `field`, `weight`, `field_type`, `field_choices`, `sql_choices`, `match_type`, `match_regex`, `func_callback`, `min_length`, `max_length`, `required`, `show_register`, `user_editable`, `show_profile`, `class`, `language`, `default_value`, `is_system`) VALUES (5, 'sig', 5, 'textarea', '', '', 'none', '', '', 0, 1000, 0, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:9:\"Chữ ký\";i:1;s:0:\"\";}}', '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_field` (`fid`, `field`, `weight`, `field_type`, `field_choices`, `sql_choices`, `match_type`, `match_regex`, `func_callback`, `min_length`, `max_length`, `required`, `show_register`, `user_editable`, `show_profile`, `class`, `language`, `default_value`, `is_system`) VALUES (6, 'question', 6, 'textbox', '', '', 'none', '', '', 3, 255, 1, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:22:\"Câu hỏi bảo mật\";i:1;s:0:\"\";}}', '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_field` (`fid`, `field`, `weight`, `field_type`, `field_choices`, `sql_choices`, `match_type`, `match_regex`, `func_callback`, `min_length`, `max_length`, `required`, `show_register`, `user_editable`, `show_profile`, `class`, `language`, `default_value`, `is_system`) VALUES (7, 'answer', 7, 'textbox', '', '', 'none', '', '', 3, 255, 1, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:22:\"Trả lời câu hỏi\";i:1;s:0:\"\";}}', '', 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_groups`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_groups` (
  `group_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `email` varchar(100) DEFAULT '',
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `group_type` tinyint(4) unsigned NOT NULL DEFAULT 0 COMMENT '0:Sys, 1:approval, 2:public',
  `group_color` varchar(10) NOT NULL,
  `group_avatar` varchar(255) NOT NULL,
  `require_2step_admin` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `require_2step_site` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `add_time` int(11) NOT NULL,
  `exp_time` int(11) NOT NULL,
  `weight` int(11) unsigned NOT NULL DEFAULT 0,
  `act` tinyint(1) unsigned NOT NULL,
  `idsite` int(11) unsigned NOT NULL DEFAULT 0,
  `numbers` mediumint(9) unsigned NOT NULL DEFAULT 0,
  `siteus` tinyint(4) unsigned NOT NULL DEFAULT 0,
  `config` varchar(250) DEFAULT '',
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `ktitle` (`title`,`idsite`),
  KEY `exp_time` (`exp_time`)
) ENGINE=MyISAM  AUTO_INCREMENT=13  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (1, 'Super admin', '', 'Super Admin', '', 0, '', '', 0, 0, 0, 1546504163, 0, 1, 1, 0, 1, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (2, 'General admin', '', 'General Admin', '', 0, '', '', 0, 0, 0, 1546504163, 0, 2, 1, 0, 4, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (3, 'Module admin', '', 'Module Admin', '', 0, '', '', 0, 0, 0, 1546504163, 0, 3, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (4, 'Users', '', 'Users', '', 0, '', '', 0, 0, 0, 1546504163, 0, 4, 1, 0, 1, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (7, 'New Users', '', 'New Users', '', 0, '', '', 0, 0, 0, 1546504163, 0, 5, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (5, 'Guest', '', 'Guest', '', 0, '', '', 0, 0, 0, 1546504163, 0, 6, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (6, 'All', '', 'All', '', 0, '', '', 0, 0, 0, 1546504163, 0, 7, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (10, 'NukeViet-Fans', '', 'Nhóm những người hâm mộ hệ thống NukeViet', '', 2, '', '', 0, 0, 1, 1546504163, 0, 8, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (11, 'NukeViet-Admins', '', 'Nhóm những người quản lý website xây dựng bằng hệ thống NukeViet', '', 2, '', '', 0, 0, 0, 1546504163, 0, 9, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups` (`group_id`, `title`, `email`, `description`, `content`, `group_type`, `group_color`, `group_avatar`, `require_2step_admin`, `require_2step_site`, `is_default`, `add_time`, `exp_time`, `weight`, `act`, `idsite`, `numbers`, `siteus`, `config`) VALUES (12, 'NukeViet-Programmers', '', 'Nhóm Lập trình viên hệ thống NukeViet', '', 1, '', '', 0, 0, 0, 1546504163, 0, 10, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_groups_users`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_groups_users` (
  `group_id` smallint(5) unsigned NOT NULL DEFAULT 0,
  `userid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `is_leader` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `approved` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `data` text NOT NULL,
  `time_requested` int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'Thời gian yêu cầu tham gia',
  `time_approved` int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'Thời gian duyệt yêu cầu tham gia',
  PRIMARY KEY (`group_id`,`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_groups_users` (`group_id`, `userid`, `is_leader`, `approved`, `data`, `time_requested`, `time_approved`) VALUES (1, 1, 1, 1, '0', 0, 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_info`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_info` (
  `userid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_info` (`userid`) VALUES (1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_openid`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_openid` (
  `userid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `openid` varchar(255) NOT NULL DEFAULT '',
  `opid` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`opid`),
  KEY `userid` (`userid`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_question`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_question` (
  `qid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL DEFAULT '',
  `lang` char(2) NOT NULL DEFAULT '',
  `weight` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `add_time` int(11) unsigned NOT NULL DEFAULT 0,
  `edit_time` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`qid`),
  UNIQUE KEY `title` (`title`,`lang`)
) ENGINE=MyISAM  AUTO_INCREMENT=17  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_question` (`qid`, `title`, `lang`, `weight`, `add_time`, `edit_time`) VALUES (1, 'Bạn thích môn thể thao nào nhất', 'vi', 1, 1274840238, 1274840238)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_question` (`qid`, `title`, `lang`, `weight`, `add_time`, `edit_time`) VALUES (2, 'Món ăn mà bạn yêu thích', 'vi', 2, 1274840250, 1274840250)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_question` (`qid`, `title`, `lang`, `weight`, `add_time`, `edit_time`) VALUES (3, 'Thần tượng điện ảnh của bạn', 'vi', 3, 1274840257, 1274840257)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_question` (`qid`, `title`, `lang`, `weight`, `add_time`, `edit_time`) VALUES (4, 'Bạn thích nhạc sỹ nào nhất', 'vi', 4, 1274840264, 1274840264)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_question` (`qid`, `title`, `lang`, `weight`, `add_time`, `edit_time`) VALUES (5, 'Quê ngoại của bạn ở đâu', 'vi', 5, 1274840270, 1274840270)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_question` (`qid`, `title`, `lang`, `weight`, `add_time`, `edit_time`) VALUES (6, 'Tên cuốn sách &quot;gối đầu giường&quot;', 'vi', 6, 1274840278, 1274840278)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_users_question` (`qid`, `title`, `lang`, `weight`, `add_time`, `edit_time`) VALUES (7, 'Ngày lễ mà bạn luôn mong đợi', 'vi', 7, 1274840285, 1274840285)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_users_reg`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_users_reg` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `md5username` char(32) NOT NULL DEFAULT '',
  `password` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `gender` char(1) NOT NULL DEFAULT '',
  `birthday` int(11) NOT NULL,
  `sig` text DEFAULT NULL,
  `regdate` int(11) unsigned NOT NULL DEFAULT 0,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL DEFAULT '',
  `checknum` varchar(50) NOT NULL DEFAULT '',
  `users_info` text DEFAULT NULL,
  `openid_info` text DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `login` (`username`),
  UNIQUE KEY `md5username` (`md5username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_about`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_about` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `image` varchar(255) DEFAULT '',
  `imagealt` varchar(255) DEFAULT '',
  `imageposition` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `bodytext` mediumtext NOT NULL,
  `keywords` text DEFAULT NULL,
  `socialbutton` tinyint(4) NOT NULL DEFAULT 0,
  `activecomm` varchar(255) DEFAULT '',
  `layout_func` varchar(100) DEFAULT '',
  `weight` smallint(4) NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `add_time` int(11) NOT NULL DEFAULT 0,
  `edit_time` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hot_post` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_about` (`id`, `title`, `alias`, `image`, `imagealt`, `imageposition`, `description`, `bodytext`, `keywords`, `socialbutton`, `activecomm`, `layout_func`, `weight`, `admin_id`, `add_time`, `edit_time`, `status`, `hitstotal`, `hot_post`) VALUES (1, 'Giới thiệu chung', 'Gioi-thieu-chung', '', '', 0, '', '<style type=\"text/css\"> </style> &quot;Giới thiệu thông tin chung về đơn vị ở đây&quot;.', 'giới thiệu', 1, '4', '', 1, 1, 1502358889, 1502358889, 1, 6, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_about` (`id`, `title`, `alias`, `image`, `imagealt`, `imageposition`, `description`, `bodytext`, `keywords`, `socialbutton`, `activecomm`, `layout_func`, `weight`, `admin_id`, `add_time`, `edit_time`, `status`, `hitstotal`, `hot_post`) VALUES (2, 'Sự hình thành và phát triển', 'Su-hinh-thanh-va-phat-trien', '', '', 0, '', '<style type=\"text/css\"> </style> &quot;Lịch sử hình thành và phát triển của đơn vị&quot;.', '', 1, '4', '', 2, 1, 1502358901, 1502358901, 1, 1, 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_about_config`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_about_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_about_config` (`config_name`, `config_value`) VALUES ('viewtype', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_about_config` (`config_name`, `config_value`) VALUES ('facebookapi', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_about_config` (`config_name`, `config_value`) VALUES ('per_page', '20')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_about_config` (`config_name`, `config_value`) VALUES ('news_first', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_about_config` (`config_name`, `config_value`) VALUES ('related_articles', '5')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_about_config` (`config_name`, `config_value`) VALUES ('copy_page', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_about_config` (`config_name`, `config_value`) VALUES ('alias_lower', '0')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_blocks_groups`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_blocks_groups` (
  `bid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(55) NOT NULL,
  `module` varchar(55) NOT NULL,
  `file_name` varchar(55) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `template` varchar(55) DEFAULT NULL,
  `position` varchar(55) DEFAULT NULL,
  `exp_time` int(11) DEFAULT 0,
  `active` varchar(10) DEFAULT '1',
  `act` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `groups_view` varchar(255) DEFAULT '',
  `all_func` tinyint(4) NOT NULL DEFAULT 0,
  `weight` int(11) NOT NULL DEFAULT 0,
  `config` text DEFAULT NULL,
  PRIMARY KEY (`bid`),
  KEY `theme` (`theme`),
  KEY `module` (`module`),
  KEY `position` (`position`),
  KEY `exp_time` (`exp_time`)
) ENGINE=MyISAM  AUTO_INCREMENT=129  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (1, 'default', 'news', 'module.block_newscenter.php', 'Tin mới nhất', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 1, 'a:10:{s:6:\"numrow\";i:6;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:12:\"length_title\";i:0;s:15:\"length_hometext\";i:0;s:17:\"length_othertitle\";i:60;s:5:\"width\";i:500;s:6:\"height\";i:0;s:7:\"nocatid\";a:0:{}}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (2, 'default', 'banners', 'global.banners.php', 'Quảng cáo giữa trang', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 2, 'a:1:{s:12:\"idplanbanner\";i:1;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (3, 'default', 'news', 'global.block_category.php', 'Chủ đề', '', 'no_title', '[LEFT]', 0, '1', 1, '6', 0, 1, 'a:2:{s:5:\"catid\";i:0;s:12:\"title_length\";i:25;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (4, 'default', 'theme', 'global.module_menu.php', 'Module Menu', '', 'no_title', '[LEFT]', 0, '1', 1, '6', 0, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (5, 'default', 'banners', 'global.banners.php', 'Quảng cáo cột trái', '', 'no_title', '[LEFT]', 0, '1', 1, '6', 1, 3, 'a:1:{s:12:\"idplanbanner\";i:2;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (6, 'default', 'statistics', 'global.counter.php', 'Thống kê', '', 'primary', '[LEFT]', 0, '1', 1, '6', 1, 4, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (8, 'default', 'banners', 'global.banners.php', 'Quảng cáo cột phải', '', 'no_title', '[RIGHT]', 0, '1', 1, '6', 1, 2, 'a:1:{s:12:\"idplanbanner\";i:3;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (9, 'default', 'voting', 'global.voting_random.php', 'Thăm dò ý kiến', '', 'primary', '[RIGHT]', 0, '1', 1, '6', 1, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (10, 'default', 'news', 'global.block_tophits.php', 'Tin xem nhiều', '', 'primary', '[RIGHT]', 0, '1', 1, '6', 1, 4, 'a:6:{s:10:\"number_day\";i:3650;s:6:\"numrow\";i:10;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:7:\"nocatid\";a:2:{i:0;i:10;i:1;i:11;}}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (11, 'default', 'theme', 'global.copyright.php', 'Copyright', '', 'no_title', '[FOOTER_SITE]', 0, '1', 1, '6', 1, 1, 'a:5:{s:12:\"copyright_by\";s:0:\"\";s:13:\"copyright_url\";s:0:\"\";s:9:\"design_by\";s:12:\"VINADES.,JSC\";s:10:\"design_url\";s:18:\"http://vinades.vn/\";s:13:\"siteterms_url\";s:39:\"/index.php?language=vi&amp;nv=siteterms\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (12, 'default', 'contact', 'global.contact_form.php', 'Feedback', '', 'no_title', '[FOOTER_SITE]', 0, '1', 1, '6', 1, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (13, 'default', 'theme', 'global.QR_code.php', 'QR code', '', 'no_title', '[QR_CODE]', 0, '1', 1, '6', 1, 1, 'a:3:{s:5:\"level\";s:1:\"M\";s:15:\"pixel_per_point\";i:4;s:11:\"outer_frame\";i:1;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (14, 'default', 'statistics', 'global.counter_button.php', 'Online button', '', 'no_title', '[QR_CODE]', 0, '1', 1, '6', 1, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (15, 'default', 'users', 'global.user_button.php', 'Đăng nhập thành viên', '', 'no_title', '[PERSONALAREA]', 0, '1', 1, '6', 1, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (16, 'default', 'theme', 'global.company_info.php', 'Công ty chủ quản', '', 'simple', '[COMPANY_INFO]', 0, '1', 1, '6', 1, 1, 'a:17:{s:12:\"company_name\";s:58:\"Công ty cổ phần phát triển nguồn mở Việt Nam\";s:15:\"company_address\";s:72:\"Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội\";s:16:\"company_sortname\";s:12:\"VINADES.,JSC\";s:15:\"company_regcode\";s:0:\"\";s:16:\"company_regplace\";s:0:\"\";s:21:\"company_licensenumber\";s:0:\"\";s:22:\"company_responsibility\";s:0:\"\";s:15:\"company_showmap\";i:1;s:20:\"company_mapcenterlat\";d:20.984516000000013;s:20:\"company_mapcenterlng\";d:105.795475;s:14:\"company_maplat\";d:20.984515999999999;s:14:\"company_maplng\";d:105.79547500000001;s:15:\"company_mapzoom\";i:17;s:13:\"company_phone\";s:56:\"+84-4-85872007[+84485872007]|+84-904762534[+84904762534]\";s:11:\"company_fax\";s:14:\"+84-4-35500914\";s:13:\"company_email\";s:18:\"contact@vinades.vn\";s:15:\"company_website\";s:17:\"http://vinades.vn\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (17, 'default', 'menu', 'global.bootstrap.php', 'Menu Site', '', 'no_title', '[MENU_SITE]', 0, '1', 1, '6', 1, 1, 'a:2:{s:6:\"menuid\";i:2;s:12:\"title_length\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (18, 'default', 'contact', 'global.contact_default.php', 'Contact Default', '', 'no_title', '[CONTACT_DEFAULT]', 0, '1', 1, '6', 1, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (19, 'default', 'theme', 'global.social.php', 'Social icon', '', 'no_title', '[SOCIAL_ICONS]', 0, '1', 1, '6', 1, 1, 'a:4:{s:8:\"facebook\";s:32:\"http://www.facebook.com/nukeviet\";s:11:\"google_plus\";s:32:\"https://www.google.com/+nukeviet\";s:7:\"youtube\";s:37:\"https://www.youtube.com/user/nukeviet\";s:7:\"twitter\";s:28:\"https://twitter.com/nukeviet\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (20, 'default', 'theme', 'global.menu_footer.php', 'Các chuyên mục chính', '', 'simple', '[MENU_FOOTER]', 0, '1', 1, '6', 1, 1, 'a:1:{s:14:\"module_in_menu\";a:8:{i:0;s:5:\"about\";i:1;s:4:\"news\";i:2;s:5:\"users\";i:3;s:7:\"contact\";i:4;s:6:\"voting\";i:5;s:7:\"banners\";i:6;s:4:\"seek\";i:7;s:5:\"feeds\";}}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (100, 'egov', 'theme', 'global.bootstrap.php', 'global bootstrap', '', 'no_title', '[MENU_SITE]', 0, '1', 1, '6', 1, 1, 'a:4:{s:6:\"menuid\";i:1;s:12:\"title_length\";i:0;s:13:\"submenu_width\";i:200;s:8:\"wraptext\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (101, 'egov', 'menu', 'global.menutop.php', 'global menutop', '', 'no_title', '[MENU_TOP]', 0, '1', 1, '6', 1, 1, 'a:2:{s:6:\"menuid\";i:7;s:12:\"title_length\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (102, 'egov', 'theme', 'global.text_banner.php', 'global text banner', '', 'no_title', '[TEXT_BANNER]', 0, '1', 1, '6', 1, 1, 'a:3:{s:10:\"site_title\";s:30:\"Cổng thông tin điện tử\";s:16:\"site_description\";s:17:\"UBND Thành Phố\";s:12:\"use_sitename\";i:1;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (103, 'egov', 'theme', 'global.sliders.php', 'global sliders', '', 'no_title', '[HEADER]', 0, '1', 1, '6', 0, 1, 'a:1:{s:12:\"idplanbanner\";i:4;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (104, 'egov', 'theme', 'global.news_center.php', 'global news center', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 1, 'a:11:{s:9:\"selectmod\";s:4:\"news\";s:6:\"numrow\";i:4;s:11:\"showtooltip\";i:0;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:12:\"length_title\";i:0;s:15:\"length_hometext\";i:0;s:17:\"length_othertitle\";i:0;s:5:\"width\";i:320;s:6:\"height\";i:0;s:7:\"nocatid\";a:0:{}}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (105, 'egov', 'banners', 'global.banners.php', 'BẢN ĐỒ HÀNH CHÍNH', '', 'map_title', '[RIGHT]', 0, '1', 1, '6', 0, 1, 'a:1:{s:12:\"idplanbanner\";i:5;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (106, 'egov', 'menu', 'global.slimmenu.php', 'global slimmenu', '', 'no_title', '[NEWS_1]', 0, '1', 1, '6', 0, 1, 'a:2:{s:6:\"menuid\";i:3;s:12:\"title_length\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (107, 'egov', 'theme', 'global.news_cat_slide_tab.php', 'global news cat slide tab', '', 'no_title', '[NEWS_1]', 0, '1', 1, '6', 0, 2, 'a:7:{s:9:\"selectmod\";s:4:\"news\";s:5:\"catid\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"6\";}s:6:\"numrow\";i:8;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:0;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (108, 'egov', 'theme', 'global.news_cat_titlebox.php', 'CHỈ ĐẠO', '', 'icon_title', '[NEWS_5]', 0, '1', 1, '6', 0, 1, 'a:8:{s:9:\"selectmod\";s:4:\"news\";s:5:\"catid\";a:1:{i:0;s:1:\"2\";}s:6:\"numrow\";i:5;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:0;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:9:\"show_type\";i:1;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (109, 'egov', 'theme', 'global.laws.php', 'Văn bản mới', '', 'icon_title', '[NEWS_6]', 0, '1', 1, '6', 0, 1, 'a:10:{s:9:\"selectmod\";s:4:\"laws\";s:6:\"numrow\";i:5;s:12:\"title_length\";i:0;s:9:\"show_code\";i:1;s:9:\"direction\";s:2:\"up\";s:8:\"duration\";i:10000;s:12:\"pauseOnHover\";i:1;s:10:\"duplicated\";i:1;s:5:\"order\";i:1;s:11:\"textdisplay\";s:39:\"Văn bản - Chỉ đạo điều hành\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (110, 'egov', 'menu', 'global.slimmenu.php', 'global slimmenu', '', 'no_title', '[FOOTER_2]', 0, '1', 1, '6', 1, 1, 'a:2:{s:6:\"menuid\";i:4;s:12:\"title_length\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (111, 'egov', 'menu', 'global.superfish.php', 'global metismenu', '', 'no_title', '[MENU_FOOTER]', 0, '1', 1, '6', 1, 1, 'a:2:{s:6:\"menuid\";i:6;s:12:\"title_length\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (112, 'egov', 'theme', 'global.news_groups.php', 'Thủ tướng chính phủ', '/index.php?language=vi&nv=news&op=groups/thu-tuong-chinh-phu', 'no_title', '[RIGHT_1]', 0, '1', 1, '6', 0, 3, 'a:8:{s:9:\"selectmod\";s:4:\"news\";s:7:\"blockid\";i:2;s:6:\"numrow\";i:1;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:0;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:9:\"show_type\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (113, 'egov', 'theme', 'global.news_groups.php', 'Lãnh đạo, Chỉ đạo', '/index.php?language=vi&nv=news&op=groups/lanh-dao-chi-dao', 'panel_primary', '[RIGHT_1]', 0, '1', 1, '6', 0, 4, 'a:8:{s:9:\"selectmod\";s:4:\"news\";s:7:\"blockid\";i:1;s:6:\"numrow\";i:4;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:0;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:9:\"show_type\";i:1;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (114, 'egov', 'banners', 'global.banners.php', 'global banners', '', 'no_title', '[RIGHT_1]', 0, '1', 1, '6', 1, 5, 'a:1:{s:12:\"idplanbanner\";i:6;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (115, 'egov', 'voting', 'global.voting.php', 'Thăm dò ý kiến', '', 'border_title', '[RIGHT_1]', 0, '1', 1, '6', 1, 6, 'a:1:{s:3:\"vid\";i:3;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (116, 'egov', 'statistics', 'global.counter.php', 'Thống kê truy cập', '', 'border_title', '[RIGHT_1]', 0, '1', 1, '6', 1, 7, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (117, 'egov', 'laws', 'module.block_search.php', 'Tìm kiếm văn bản', '', 'border_title', '[RIGHT_1]', 0, '1', 1, '6', 0, 1, 'a:2:{s:5:\"style\";s:8:\"vertical\";s:14:\"search_advance\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (118, 'egov', 'news', 'global.block_category.php', 'Danh mục', '', 'panel_primary_left', '[RIGHT_1]', 0, '1', 1, '6', 0, 2, 'a:2:{s:5:\"catid\";i:0;s:12:\"title_length\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (119, 'egov', 'contact', 'global.department.php', 'global department', '', 'no_title', '[FOOTER_SITE]', 0, '1', 1, '6', 1, 1, 'a:1:{s:12:\"departmentid\";i:1;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (120, 'mobile_egov', 'contact', 'global.department.php', 'global department', '', 'no_title', '[FOOTER_SITE]', 0, '1', 1, '6', 1, 1, 'a:1:{s:12:\"departmentid\";i:1;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (121, 'mobile_egov', 'theme', 'global.news_center.php', 'global news center', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 1, 'a:11:{s:9:\"selectmod\";s:4:\"news\";s:6:\"numrow\";i:4;s:11:\"showtooltip\";i:0;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:12:\"length_title\";i:0;s:15:\"length_hometext\";i:0;s:17:\"length_othertitle\";i:0;s:5:\"width\";i:400;s:6:\"height\";i:0;s:7:\"nocatid\";a:0:{}}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (122, 'mobile_egov', 'theme', 'global.news_cat_slide_tab.php', 'global news cat slide tab', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 2, 'a:7:{s:9:\"selectmod\";s:4:\"news\";s:5:\"catid\";a:2:{i:0;s:1:\"6\";i:1;s:1:\"7\";}s:6:\"numrow\";i:8;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:0;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (123, 'mobile_egov', 'theme', 'global.text_banner.php', 'global text banner', '', 'no_title', '[TEXT_BANNER]', 0, '1', 1, '6', 1, 1, 'a:3:{s:10:\"site_title\";s:30:\"Cổng thông tin điện tử\";s:16:\"site_description\";s:17:\"UBND Thành Phố\";s:12:\"use_sitename\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (124, 'mobile_egov', 'menu', 'global.metismenu.php', 'global metismenu', '', 'no_title', '[MENU_SITE]', 0, '1', 1, '6', 1, 1, 'a:2:{s:6:\"menuid\";i:1;s:12:\"title_length\";i:0;}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (125, 'egov', 'page', 'global.html.php', 'global html', '', 'no_title', '[COPYRIGHT]', 0, '1', 1, '6', 1, 1, 'a:1:{s:11:\"htmlcontent\";s:407:\"<div style=\"text-align: center;\">© 2017 - Bản quyền&nbsp;thuộc về UBND Thành Phố.<br  />Ghi rõ nguồn &quot;UBND Thành Phố&quot; và dẫn đến URL nguồn tin khi phát hành lại thông tin từ website này.<br  /><a href=\"/siteterms/terms-and-conditions.html\">Điều khoản sử dụng</a> | <a href=\"/siteterms/privacy.html\">Chính sách bảo mật (Quyền riêng tư)</a></div>\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (127, 'egov', 'theme', 'global.btns_tool.php', 'global btns tool', '', 'no_title', '[SITE_BTN_TOOL]', 0, '1', 1, '6', 1, 1, 'a:3:{s:8:\"facebook\";s:33:\"https://www.facebook.com/nukeviet\";s:11:\"google_plus\";s:32:\"https://www.google.com/+nukeviet\";s:7:\"twitter\";s:28:\"https://twitter.com/nukeviet\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_groups` (`bid`, `theme`, `module`, `file_name`, `title`, `link`, `template`, `position`, `exp_time`, `active`, `act`, `groups_view`, `all_func`, `weight`, `config`) VALUES (128, 'egov', 'opinions', 'module.block_search.php', 'Tìm kiếm', '', 'no_title', '[RIGHT_1]', 0, '1', 1, '6', 0, 8, 'a:2:{s:5:\"style\";s:8:\"vertical\";s:14:\"search_advance\";i:0;}')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_blocks_weight`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_blocks_weight` (
  `bid` mediumint(8) NOT NULL DEFAULT 0,
  `func_id` mediumint(8) NOT NULL DEFAULT 0,
  `weight` mediumint(8) NOT NULL DEFAULT 0,
  UNIQUE KEY `bid` (`bid`,`func_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 1, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 38, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 39, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 40, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 41, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 47, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 48, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 49, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 50, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 60, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 63, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 5, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 6, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 7, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 8, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 9, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 10, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 11, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 12, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 51, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 62, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 54, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 55, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 31, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 32, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 33, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 34, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 35, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 36, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 37, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 57, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 58, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 59, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 19, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 20, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 21, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 22, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 23, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 24, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 25, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 26, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 27, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 28, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 29, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 61, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (3, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (3, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (3, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (3, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (3, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (3, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (3, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (3, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (3, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (4, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 5, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 6, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 7, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 8, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 9, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 10, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 11, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 12, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 31, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 32, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 33, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 34, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 35, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 36, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 37, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 19, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 20, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 21, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 22, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 23, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 24, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 25, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 26, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 27, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 28, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 1, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 38, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 39, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 40, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 41, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 47, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 48, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 49, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 50, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 60, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 63, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 4, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 5, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 6, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 7, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 8, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 9, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 10, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 11, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 12, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 51, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 62, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 54, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 55, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 31, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 32, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 33, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 34, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 35, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 36, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 37, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 57, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 58, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 59, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 19, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 20, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 21, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 22, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 23, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 24, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 25, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 26, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 27, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 28, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 29, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 61, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 1, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 38, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 39, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 40, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 41, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 47, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 48, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 49, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 50, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 60, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 63, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 5, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 6, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 7, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 8, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 9, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 10, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 11, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 12, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 51, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 62, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 54, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 55, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 31, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 32, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 33, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 34, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 35, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 36, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 37, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 57, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 58, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 59, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 19, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 20, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 21, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 22, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 23, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 24, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 25, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 26, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 27, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 28, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 29, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 61, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 1, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 38, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 39, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 40, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 41, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 47, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 48, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 49, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 50, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 60, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 63, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 5, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 6, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 7, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 8, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 9, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 10, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 11, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 12, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 51, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 62, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 54, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 55, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 31, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 32, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 33, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 34, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 35, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 36, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 37, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 57, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 58, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 59, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 19, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 20, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 21, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 22, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 23, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 24, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 25, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 26, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 27, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 28, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 29, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 61, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 1, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 38, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 39, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 40, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 41, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 47, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 48, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 49, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 50, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 60, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 63, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 4, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 5, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 6, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 7, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 8, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 9, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 10, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 11, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 12, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 51, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 62, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 54, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 55, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 31, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 32, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 33, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 34, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 35, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 36, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 37, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 57, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 58, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 59, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 19, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 20, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 21, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 22, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 23, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 24, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 25, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 26, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 27, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 28, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 29, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 61, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 1, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 38, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 39, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 40, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 41, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 47, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 48, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 49, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 50, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 60, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 63, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 4, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 5, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 6, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 7, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 8, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 9, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 10, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 11, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 12, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 51, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 62, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 54, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 55, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 31, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 32, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 33, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 34, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 35, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 36, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 37, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 57, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 58, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 59, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 19, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 20, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 21, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 22, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 23, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 24, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 25, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 26, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 27, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 28, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 29, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 61, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (1, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (2, 4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 66, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 64, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 65, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 66, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 64, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 65, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 66, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 64, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 65, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 66, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 64, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 65, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 66, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 64, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 65, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 66, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 64, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 65, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 66, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 64, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 65, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 66, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 64, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 65, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 66, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 64, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 65, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 66, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 64, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 65, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 66, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 64, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 65, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 66, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 64, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 65, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 66, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 64, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 65, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 66, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 64, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 65, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 66, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 64, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 65, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 72, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 71, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 74, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 69, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 70, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 77, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 75, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 72, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 71, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 74, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 69, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 70, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 77, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 75, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 72, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 71, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 74, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 69, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 70, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 77, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 75, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 72, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 71, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 74, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 69, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 70, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 77, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 75, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 72, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 71, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 74, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 69, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 70, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 77, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 75, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 72, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 71, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 74, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 69, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 70, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 77, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 75, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 79, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 82, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 78, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 79, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 82, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 78, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 79, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 82, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 78, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 79, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 82, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 78, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 79, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 82, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 78, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 79, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 82, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 78, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 79, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 82, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 78, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 79, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 82, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 78, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 79, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 82, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 78, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 79, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 82, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 78, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 79, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 82, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 78, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 79, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 82, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 78, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 79, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 82, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 78, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 79, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 82, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 78, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 79, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 82, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 78, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 92, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 93, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 89, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 84, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 83, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 90, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 85, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 94, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 95, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 87, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 88, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 92, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 93, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 89, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 84, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 83, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 90, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 85, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 94, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 95, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 87, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 88, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 92, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 93, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 89, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 84, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 83, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 90, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 85, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 94, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 95, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 87, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 88, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 92, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 93, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 89, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 84, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 83, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 90, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 85, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 94, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 95, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 87, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 88, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 92, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 93, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 89, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 84, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 83, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 90, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 85, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 94, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 95, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 87, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 88, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 92, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 93, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 89, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 84, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 83, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 90, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 85, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 94, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 95, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 87, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 88, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 92, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 93, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 89, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 84, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 83, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 90, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 85, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 94, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 95, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 87, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 88, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 92, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 93, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 89, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 84, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 83, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 90, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 85, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 94, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 95, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 87, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 88, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 92, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 93, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 89, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 84, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 83, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 90, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 85, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 94, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 95, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 87, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 88, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 92, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 93, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 89, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 84, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 83, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 90, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 85, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 94, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 95, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 87, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 88, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 92, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 93, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 89, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 84, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 83, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 90, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 85, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 94, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 95, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 87, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 88, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 92, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 93, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 89, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 84, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 83, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 90, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 85, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 94, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 95, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 87, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 88, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 92, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 93, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 89, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 84, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 83, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 90, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 85, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 94, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 95, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 87, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 88, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 92, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 93, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 89, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 84, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 83, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 90, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 85, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 94, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 95, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 87, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 88, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 92, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 93, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 89, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 84, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 83, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 90, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 85, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 94, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 95, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 87, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 88, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 99, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 98, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 101, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 96, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 97, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 104, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 102, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 99, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 98, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 101, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 96, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 97, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 104, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 102, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 99, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 98, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 101, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 96, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 97, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 104, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 102, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 99, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 98, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 101, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 96, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 97, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 104, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 102, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 99, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 98, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 101, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 96, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 97, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 104, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 102, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 99, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 98, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 101, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 96, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 97, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 104, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 102, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 126, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 109, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 119, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 118, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 107, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 106, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 114, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 105, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 117, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 112, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 109, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 119, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 118, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 107, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 106, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 114, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 105, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 117, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 112, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 109, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 119, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 118, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 107, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 106, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 114, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 105, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 117, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 112, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 109, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 119, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 118, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 107, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 106, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 114, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 105, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 117, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 112, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 109, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 119, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 118, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 107, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 106, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 114, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 105, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 117, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 112, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 120, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 121, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 120, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 121, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 120, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 121, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 120, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 121, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 120, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 121, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 123, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 124, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 123, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 124, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 123, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 124, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 123, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 124, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 123, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 124, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 127, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 126, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 127, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 126, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 127, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 126, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 127, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 126, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 127, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 129, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 130, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 129, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 130, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 129, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 130, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 129, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 130, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 129, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 130, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (103, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (104, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (105, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (106, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (107, 4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (108, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (109, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (112, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (113, 4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 4, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 5, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 6, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 12, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 8, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 11, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 7, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 9, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 10, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 120, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 121, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 126, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 127, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 72, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 71, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 74, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 69, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 70, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 77, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 75, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 109, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 119, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 118, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 107, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 106, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 114, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 105, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 117, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 112, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 129, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 130, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 19, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 20, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 21, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 22, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 23, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 24, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 25, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 26, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 27, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 28, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 29, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 60, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 31, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 32, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 33, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 34, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 35, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 36, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 37, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 61, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 38, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 39, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 40, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 41, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 62, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 63, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 51, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 47, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 48, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 49, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 50, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 54, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 55, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 57, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 58, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 59, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 123, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 124, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 4, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 5, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 6, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 12, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 8, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 11, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 7, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 9, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 10, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 120, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 121, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 126, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 127, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 72, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 71, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 74, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 69, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 70, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 77, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 75, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 109, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 119, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 118, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 107, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 106, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 114, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 105, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 117, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 112, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 19, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 20, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 21, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 22, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 23, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 24, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 25, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 26, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 27, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 28, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 29, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 60, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 31, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 32, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 33, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 34, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 35, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 36, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 37, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 61, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 38, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 39, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 40, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 41, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 62, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 63, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 51, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 47, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 48, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 49, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 50, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 54, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 55, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 57, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 58, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 59, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 4, 5)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 5, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 6, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 12, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 8, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 11, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 7, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 9, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 10, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 120, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 121, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 126, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 127, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 72, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 71, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 74, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 69, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 70, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 77, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 75, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 109, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 119, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 118, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 107, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 106, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 114, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 105, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 117, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 112, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 129, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 130, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 19, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 20, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 21, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 22, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 23, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 24, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 25, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 26, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 27, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 28, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 29, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 60, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 31, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 32, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 33, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 34, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 35, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 36, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 37, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 61, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 38, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 39, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 40, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 41, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 62, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 63, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 51, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 47, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 48, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 49, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 50, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 54, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 55, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 57, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 58, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 59, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 123, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 124, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (117, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (117, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (117, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (117, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (117, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (117, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (117, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (118, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (121, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (122, 4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 129, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 130, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 123, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 124, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 126, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 127, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 4, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 109, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 119, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 118, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 107, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 106, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 114, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 105, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 117, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 112, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 132, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 134, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 133, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 136, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 132, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 134, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 133, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 136, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 132, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 134, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 133, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 136, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 132, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 134, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 133, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 136, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 132, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 134, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 133, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 136, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 132, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 134, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 133, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 136, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 132, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 134, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 133, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 136, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 140, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 139, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 142, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 137, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 138, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 145, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 143, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 140, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 139, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 142, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 137, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 138, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 145, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 143, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 140, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 139, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 142, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 137, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 138, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 145, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 143, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 140, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 139, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 142, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 137, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 138, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 145, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 143, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 140, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 139, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 142, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 137, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 138, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 145, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 143, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 140, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 140, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 139, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 142, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 137, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 138, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 145, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 143, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 140, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 139, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 142, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 137, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 138, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 145, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 143, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (16, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (18, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (11, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (12, 146, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (5, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (6, 146, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (20, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (17, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (15, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (13, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (14, 146, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (8, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (9, 146, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (10, 146, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (19, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (125, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (119, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (100, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (101, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (114, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (115, 146, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (116, 146, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (127, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (102, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (120, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (124, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (123, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (111, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 120, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 121, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 5, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 12, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 8, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 11, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 7, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 9, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 10, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 132, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 134, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 133, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 136, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 72, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 71, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 74, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 69, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 70, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 77, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 75, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 140, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 139, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 142, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 137, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 138, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 145, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 143, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 146, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 19, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 20, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 21, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 22, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 23, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 24, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 25, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 26, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 27, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 28, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 29, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 60, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 31, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 32, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 33, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 34, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 35, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 36, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 37, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 61, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 38, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 39, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 40, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 41, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 62, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 63, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 51, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 47, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 48, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 49, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 50, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 54, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 55, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 57, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 58, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (110, 59, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_blocks_weight` (`bid`, `func_id`, `weight`) VALUES (128, 140, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_admins`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_admins` (
  `userid` int(11) unsigned NOT NULL DEFAULT 0,
  `organid` int(11) NOT NULL DEFAULT 0,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `add_content` tinyint(4) NOT NULL DEFAULT 0,
  `edit_content` tinyint(4) NOT NULL DEFAULT 0,
  `status_content` tinyint(4) NOT NULL DEFAULT 0,
  `del_content` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_config`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_config` (`config_name`, `config_value`) VALUES ('per_page', '10')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_config` (`config_name`, `config_value`) VALUES ('organ_view_type', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_config` (`config_name`, `config_value`) VALUES ('organ_view_type_main', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_config` (`config_name`, `config_value`) VALUES ('thumb_width', '80')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_config` (`config_name`, `config_value`) VALUES ('thumb_height', '100')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_config` (`config_name`, `config_value`) VALUES ('email_require', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_config` (`config_name`, `config_value`) VALUES ('phone_require', '0')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person` (
  `personid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `phone_ext` char(20) NOT NULL,
  `mobile` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` text NOT NULL,
  `position_other` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `birthday` int(11) NOT NULL,
  `place_birth` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `addtime` int(11) NOT NULL,
  `edittime` int(11) NOT NULL,
  `organid` int(11) NOT NULL,
  `weight` int(8) NOT NULL DEFAULT 0,
  `active` tinyint(2) NOT NULL DEFAULT 0,
  `dayinto` int(11) NOT NULL DEFAULT 0,
  `dayparty` int(11) NOT NULL DEFAULT 0,
  `marital_status` text NOT NULL,
  `professional` text NOT NULL,
  `political` text NOT NULL,
  PRIMARY KEY (`personid`)
) ENGINE=MyISAM  AUTO_INCREMENT=19  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person` (`personid`, `name`, `photo`, `phone_ext`, `mobile`, `email`, `position`, `position_other`, `address`, `phone`, `birthday`, `place_birth`, `description`, `addtime`, `edittime`, `organid`, `weight`, `active`, `dayinto`, `dayparty`, `marital_status`, `professional`, `political`) VALUES (16, 'Phạm Văn M', '', '', '&#40;028&#41; 38.000', 'bbt@mysite.com', 'Chủ tịch', '', '', '', 0, '', '', 1506649196, 1506649196, 24, 1, 1, 0, 0, '', '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person` (`personid`, `name`, `photo`, `phone_ext`, `mobile`, `email`, `position`, `position_other`, `address`, `phone`, `birthday`, `place_birth`, `description`, `addtime`, `edittime`, `organid`, `weight`, `active`, `dayinto`, `dayparty`, `marital_status`, `professional`, `political`) VALUES (17, 'Nguyễn Thị Minh P', '', '', '&#40;028&#41; 38.000', 'bbt@mysite.com', 'Phó chủ tịch', '', '', '', 0, '', '', 1506649233, 1506649233, 24, 2, 1, 0, 0, '', '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person` (`personid`, `name`, `photo`, `phone_ext`, `mobile`, `email`, `position`, `position_other`, `address`, `phone`, `birthday`, `place_birth`, `description`, `addtime`, `edittime`, `organid`, `weight`, `active`, `dayinto`, `dayparty`, `marital_status`, `professional`, `political`) VALUES (15, 'Nguyễn Xuân B', '', '', '&#40;028&#41; 38.000', 'bbt@mysite.com', 'Phó Chủ tịch UBND', '', '', '', 0, '', '', 1506649132, 1506649132, 23, 2, 1, 0, 0, '', '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person` (`personid`, `name`, `photo`, `phone_ext`, `mobile`, `email`, `position`, `position_other`, `address`, `phone`, `birthday`, `place_birth`, `description`, `addtime`, `edittime`, `organid`, `weight`, `active`, `dayinto`, `dayparty`, `marital_status`, `professional`, `political`) VALUES (14, 'Lê Khắc N', '', '', '&#40;028&#41; 38.000', 'bbt@mysite.com', 'Chủ tịch UBND', '', '', '', 0, '', '', 1506649065, 1506649065, 23, 1, 1, 0, 0, '', '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person` (`personid`, `name`, `photo`, `phone_ext`, `mobile`, `email`, `position`, `position_other`, `address`, `phone`, `birthday`, `place_birth`, `description`, `addtime`, `edittime`, `organid`, `weight`, `active`, `dayinto`, `dayparty`, `marital_status`, `professional`, `political`) VALUES (13, 'Nguyễn Đình B', '', '', '&#40;028&#41; 38.000', 'bbt@mysite.com', 'Phó Chủ tịch Hội đồng nhân dân', '', '', '', 0, '', '', 1506648984, 1506648984, 22, 2, 1, 0, 0, '', '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person` (`personid`, `name`, `photo`, `phone_ext`, `mobile`, `email`, `position`, `position_other`, `address`, `phone`, `birthday`, `place_birth`, `description`, `addtime`, `edittime`, `organid`, `weight`, `active`, `dayinto`, `dayparty`, `marital_status`, `professional`, `political`) VALUES (12, 'Lê Hoàng L', '', '', '&#40;028&#41; 38.000', 'bbt@mysite.com', 'Chủ tịch Hội đồng nhân dân', '', '', '', 0, '', '', 1506648915, 1506648915, 22, 1, 1, 0, 0, '', '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person` (`personid`, `name`, `photo`, `phone_ext`, `mobile`, `email`, `position`, `position_other`, `address`, `phone`, `birthday`, `place_birth`, `description`, `addtime`, `edittime`, `organid`, `weight`, `active`, `dayinto`, `dayparty`, `marital_status`, `professional`, `political`) VALUES (11, 'Nguyễn Thị N', '', '', '&#40;028&#41; 38.000', 'bbt@mysite.com', 'Phó Bí thư', '', '', '', 0, '', '', 1506648738, 1506648738, 15, 2, 1, 0, 0, '', '', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_person` (`personid`, `name`, `photo`, `phone_ext`, `mobile`, `email`, `position`, `position_other`, `address`, `phone`, `birthday`, `place_birth`, `description`, `addtime`, `edittime`, `organid`, `weight`, `active`, `dayinto`, `dayparty`, `marital_status`, `professional`, `political`) VALUES (10, 'Lê Văn T', '', '', '&#40;028&#41; 38.000', 'bbt@mysite.com', 'Bí thư', '', '', '', 0, '', '', 1506648686, 1506648924, 15, 1, 1, 0, 0, '', '', '')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (
  `organid` mediumint(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` mediumint(11) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `thumbnail` varchar(255) NOT NULL DEFAULT '',
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  `orders` int(8) NOT NULL DEFAULT 0,
  `numsub` int(8) NOT NULL DEFAULT 0,
  `suborgan` varchar(255) NOT NULL DEFAULT '',
  `lev` int(8) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `add_time` int(11) unsigned NOT NULL DEFAULT 0,
  `edit_time` int(11) unsigned NOT NULL DEFAULT 0,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `phone_ext` char(12) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `website` text NOT NULL,
  `numperson` int(8) NOT NULL,
  `description` mediumtext NOT NULL,
  `view` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`organid`),
  UNIQUE KEY `alias` (`alias`),
  KEY `parentid` (`parentid`)
) ENGINE=MyISAM  AUTO_INCREMENT=25  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (21, 15, 'Ban Nội chính', 'Ban-Noi-chinh', '', '', 6, 7, 0, '', 1, 1, 1506648421, 1506648421, '', '', '', '', '', '', 0, '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (22, 0, 'Hội đồng nhân dân', 'Hoi-dong-nhan-dan', '', '', 4, 10, 0, '', 0, 1, 1506648501, 1506649424, '', '', '', '', '', '', 2, '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (16, 15, 'Văn phòng', 'Van-phong', '', '', 1, 2, 0, '', 1, 1, 1506648342, 1506648342, '', '', '', '', '', '', 0, '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (18, 15, 'Ban Tuyên giáo', 'Ban-Tuyen-giao', '', '', 3, 4, 0, '', 1, 1, 1506648375, 1506648375, '', '', '', '', '', '', 0, '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (17, 15, 'Ban tổ chức', 'Ban-to-chuc', '', '', 2, 3, 0, '', 1, 1, 1506648357, 1506648357, '', '', '', '', '', '', 0, '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (20, 15, 'Ủy ban Kiểm tra', 'Uy-ban-Kiem-tra', '', '', 5, 6, 0, '', 1, 1, 1506648405, 1506648405, '', '', '', '', '', '', 0, '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (19, 15, 'Ban Dân vận', 'Ban-Dan-van', '', '', 4, 5, 0, '', 1, 1, 1506648385, 1506648385, '', '', '', '', '', '', 0, '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (15, 0, 'Thành ủy', 'Thanh-uy', '', '', 1, 1, 6, '16,17,18,19,20,21', 0, 1, 1506648301, 1506648301, '', '', '', '', '', '', 2, '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (23, 0, 'Ủy ban nhân dân', 'Uy-ban-nhan-dan', '', '', 2, 8, 0, '', 0, 1, 1506648516, 1506648516, '', '', '', '', '', '', 2, '', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_co_cau_to_chuc_rows` (`organid`, `parentid`, `title`, `alias`, `image`, `thumbnail`, `weight`, `orders`, `numsub`, `suborgan`, `lev`, `active`, `add_time`, `edit_time`, `address`, `email`, `phone`, `phone_ext`, `fax`, `website`, `numperson`, `description`, `view`) VALUES (24, 0, 'Ủy ban Mặt trận tổ quốc', 'Uy-ban-Mat-tran-to-quoc', '', '', 3, 9, 0, '', 0, 1, 1506648546, 1506648546, '', '', '', '', '', '', 2, '', 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_comment`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_comment` (
  `cid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(55) NOT NULL,
  `area` int(11) NOT NULL DEFAULT 0,
  `id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `pid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `content` text NOT NULL,
  `attach` varchar(255) NOT NULL DEFAULT '',
  `post_time` int(11) unsigned NOT NULL DEFAULT 0,
  `userid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `post_name` varchar(100) NOT NULL,
  `post_email` varchar(100) NOT NULL,
  `post_ip` varchar(39) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `likes` mediumint(9) NOT NULL DEFAULT 0,
  `dislikes` mediumint(9) NOT NULL DEFAULT 0,
  PRIMARY KEY (`cid`),
  KEY `mod_id` (`module`,`area`,`id`),
  KEY `post_time` (`post_time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_contact_department`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_contact_department` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `others` text NOT NULL,
  `cats` text NOT NULL,
  `admins` text NOT NULL,
  `act` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `weight` smallint(5) NOT NULL,
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `full_name` (`full_name`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=4  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_contact_department` (`id`, `full_name`, `alias`, `image`, `phone`, `fax`, `email`, `address`, `note`, `others`, `cats`, `admins`, `act`, `weight`, `is_default`) VALUES (1, 'Ban biên tập Cổng thông tin điện tử UBND thành phố', 'ban-bien-tap', '', '&#40;028&#41; 38.000.000&#91;+842838000000&#93;', '&#40;028&#41; 38.000.001', 'bbt@mysite.com', '', 'Bộ phận tiếp nhận và giải quyết các yêu cầu, đề nghị, ý kiến liên quan đến hoạt động chính của doanh nghiệp', '[]', 'Gửi góp ý|Gửi câu hỏi', '1/1/1/0;5/1/1/0', 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_contact_department` (`id`, `full_name`, `alias`, `image`, `phone`, `fax`, `email`, `address`, `note`, `others`, `cats`, `admins`, `act`, `weight`, `is_default`) VALUES (3, 'Webmaster', 'webmaster', '', '&#40;024&#41; 38.000.000&#91;02438000000&#93;', '&#40;024&#41; 38.000.001', 'webmaster@mysite.com', '', '', '[]', 'Liên hệ với webmaster', '1/1/1/0;5/1/1/0', 1, 2, 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_contact_reply`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_contact_reply` (
  `rid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `reply_content` text DEFAULT NULL,
  `reply_time` int(11) unsigned NOT NULL DEFAULT 0,
  `reply_aid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`rid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_contact_send`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_contact_send` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `cat` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `send_time` int(11) unsigned NOT NULL DEFAULT 0,
  `sender_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `sender_name` varchar(100) NOT NULL,
  `sender_address` varchar(250) NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `sender_phone` varchar(20) DEFAULT '',
  `sender_ip` varchar(39) NOT NULL DEFAULT '',
  `is_read` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `is_reply` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `sender_name` (`sender_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_contact_supporter`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_contact_supporter` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `departmentid` smallint(5) unsigned NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `others` text NOT NULL,
  `act` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `weight` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_faq`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_faq` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` mediumint(8) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL,
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  AUTO_INCREMENT=7  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq` (`id`, `catid`, `title`, `alias`, `question`, `answer`, `weight`, `status`, `addtime`) VALUES (1, 1, 'Không cấp lại bản chính văn bằng, chứng chỉ', 'Khong-cap-lai-ban-chinh-van-bang-chung-chi', 'Ông Nguyễn Ngọc Khương (Hải Dương) là học sinh trường THPT Nguyễn Bỉnh Khiêm niên học 2001-2004. Ông Khương bị mất bằng tốt nghiệp THPT và muốn xin cấp lại. Vậy, thủ tục cấp lại bằng tốt nghiệp như thế nào? Ông Khương hiện đi làm xa thì có thể nhờ chị gái làm thủ tục không, nếu được thì cần những giấy tờ gì?', '<p><em>Về vấn đề này, Bộ Giáo dục và Đào tạo trả lời như sau:</em></p><p>Khoản 3 Điều 2 Quy chế văn bằng, chứng chỉ của hệ thống giáo dục quốc dân ban hành kèm theo Quyết định số 33/2007/QĐ-BGDĐT ngày 20/6/2007 của Bộ Giáo dục và Đào tạo quy định bản chính văn bằng, chứng chỉ chỉ cấp một lần, không cấp lại.</p><p>Người bị mất bản chính văn bằng, chứng chỉ chỉ được cấp lại bản sao văn bằng, chứng chỉ từ sổ gốc.</p><p>Người yêu cầu cấp bản sao văn bằng, chứng chỉ từ sổ gốc có thể trực tiếp yêu cầu hoặc gửi yêu cầu của mình đến cơ quan có thẩm quyền cấp bản sao văn bằng, chứng chỉ từ sổ gốc qua bưu điện. Không hạn chế số lượng bản sao yêu cầu được cấp.</p>', 1, 1, 1506574376)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq` (`id`, `catid`, `title`, `alias`, `question`, `answer`, `weight`, `status`, `addtime`) VALUES (2, 0, 'Nhiều hộ sống cùng một địa chỉ, tách hộ khẩu thế nào?', 'Nhieu-ho-song-cung-mot-dia-chi-tach-ho-khau-the-nao', 'Gia đình bà Lâm Tú Anh (Hà Nội) có 3 hộ sống chung. Bà hỏi, gia đình bà có thể tách riêng mỗi hộ 1 sổ hộ khẩu được không? Nếu được thì có quy định về số lượng sổ hộ khẩu trong cùng một chỗ ở hợp pháp không?', '<p><em>Về vấn đề này, Bộ Công an &nbsp;trả lời như sau:</em></p><p>Điều 27&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=29515\">Luật Cư trú</a>&nbsp;quy định về trường hợp có cùng một chỗ ở hợp pháp được tách sổ hộ khẩu bao gồm: Người có năng lực hành vi dân sự đầy đủ và có nhu cầu tách sổ hộ khẩu; người ở chung một chỗ ở hợp pháp nhưng không có quan hệ gia đình là ông, bà, cha, mẹ, vợ, chồng, con và anh, chị, em ruột, cháu ruột nếu có đủ điều kiện quy định tại Điều 19, Điều 20 Luật Cư trú và được chủ hộ đồng ý cho nhập vào sổ hộ khẩu gia đình, sổ hộ khẩu cá nhân, khi người này muốn tách sổ hộ khẩu phải được chủ hộ đồng ý bằng văn bản.</p><p>Thủ tục tách sổ hộ khẩu bao gồm:</p><p>- Sổ hộ khẩu.</p><p>- Phiếu báo thay đổi hộ khẩu, nhân khẩu.</p><p>- Ý kiến đồng ý của chủ hộ nếu thuộc trường hợp quy định tại Điểm b, Khoản 1 Điều 27 Luật Cư trú là: Người ở chung một chỗ ở hợp pháp nhưng không có quan hệ gia đình là ông, bà, cha, mẹ, vợ, chồng, con và anh, chị, em ruột, cháu ruột nếu có đủ điều kiện quy định tại Điều 19, Điều 20 Luật Cư trú và được chủ hộ đồng ý cho nhập vào sổ hộ khẩu gia đình, sổ hộ khẩu cá nhân, khi người này muốn tách sổ hộ khẩu phải được chủ hộ đồng ý bằng văn bản.</p><p>Công dân được tách sổ hộ khẩu khi có đầy đủ điều kiện, thủ tục theo quy định của Luật Cư trú và các văn bản hướng dẫn thi hành. Nếu còn vấn đề gì vướng mắc đề nghị bà Lâm Tú Anh đến cơ quan Công an nơi đăng ký cư trú để được hướng dẫn cụ thể.</p>', 1, 1, 1506574492)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq` (`id`, `catid`, `title`, `alias`, `question`, `answer`, `weight`, `status`, `addtime`) VALUES (3, 0, 'Điều kiện cấp chứng chỉ năng lực xây dựng làm khó DN nhỏ?', 'Dieu-kien-cap-chung-chi-nang-luc-xay-dung-lam-kho-DN-nho', 'Nếu đăng ký cấp chứng chỉ năng lực hoạt động xây dựng hạng III, DN cần tới tối thiểu 3 người chủ trì và 5 người trong bộ máy. Như vậy, để được cấp chứng chỉ năng lực cấp III với 3 chuyên ngành thì DN cần đến 24 người và phải trả lương, đóng BHXH cho 24 nhân sự, điều này quá khó khăn đối với DN nhỏ.', '<p><em>Về vấn đề này, Bộ Xây dựng có&nbsp;<a href=\"http://baodientu.chinhphu.vn/Uploaded/lethithuyan/2017_09_26/tl_savico_VQRY.PDF\">ý kiến</a>&nbsp;như sau:</em></p><p>Công trình xây dựng là loại sản phẩm hàng hóa đặc thù được hình thành trong tương lai, chất lượng và an toàn của công trình (liên quan đến an toàn cộng đồng) phụ thuộc chủ yếu vào năng lực của cá nhân, tổ chức tham gia vào các hoạt động xây dựng như lập quy hoạch xây dựng, khảo sát, thiết kế, thi công,… để tạo ra công trình. Do đó, năng lực của các tổ chức, cá nhân tham gia các hoạt động xây dựng được pháp luật quy định và quản lý chặt chẽ.</p><p>Theo quy định của pháp luật về xây dựng hiện hành, năng lực của tổ chức được đánh giá trên cơ sở xem xét một cách tổng thể các tiêu chí về nhân sự, kinh nghiệm thực hiện công việc, tài chính, quy trình quản lý chất lượng và khả năng huy động máy móc thiết bị.</p><p>Đối với các doanh nghiệp nhỏ hoặc mới thành lập hoàn toàn có thể đề nghị cấp chứng chỉ năng lực hoạt động xây dựng cấp III vì Nghị định số 59/2015/NĐ-CP ngày 18/6/2015 của Chính phủ về quản lý dự án đầu tư xây dựng chỉ yêu cầu tối thiểu về nhân sự của tổ chức, không yêu cầu về kinh nghiệm thực hiện công việc, tài chính,…</p><p>Trường hợp tổ chức chưa đủ điều kiện cấp chứng chỉ năng lực (kể cả hạng III) thì theo quy định tại Khoản 2, Điều 10 Thông tư số 17/2016/TT-BXD ngày 30/6/2016 của Bộ Xây dựng đã quy định tổ chức này được tham gia các hoạt động xây dựng đối với dự án chỉ yêu cầu lập báo cáo kinh tế - kỹ thuật đầu tư xây dựng công trình quy mô cấp IV; dự án sửa chữa, cải tạo, bảo trì công trình quy mô cấp IV.</p>', 2, 1, 1506574656)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq` (`id`, `catid`, `title`, `alias`, `question`, `answer`, `weight`, `status`, `addtime`) VALUES (4, 0, 'Đóng trùng BHXH giữa hai công ty, giải quyết thế nào?', 'Dong-trung-BHXH-giua-hai-cong-ty-giai-quyet-the-nao', 'Công ty của bà Phạm Thị Huệ (Hà Nội) có trường hợp người lao động làm việc tại 1 công ty khác đến tháng 9/2010 và chốt sổ BHXH vào tháng này. Tháng 10/2010, người lao động này chuyển sang công ty của bà Huệ, nhưng kế toán khai đóng BHXH từ tháng 9/2010.<br /><br />Hiện công ty của bà Huệ đang làm thủ tục cấp lại sổ BHXH do bị mất, trong quá trình cấp lại sổ BHXH, cơ quan BHXH báo trường hợp của người lao động này bị trùng 1 tháng đóng BHXH giữa 2 công ty nên phải làm thủ tục thoái trùng.<br /><br />Bà Huệ hỏi, vậy công ty của bà cần chuẩn bị giấy tờ gì để giải quyết và làm thủ tục cấp lại sổ BHXH cho người lao động trên?', '<p><em>Về vấn đề này, BHXH TP. Hà Nội trả lời như sau:</em></p><p>Tại Điều 2&nbsp;Quyết định số 1111/QĐ-BHXH có quy định,<em>&nbsp;</em>“Hoàn trả: Là việc cơ quan BHXH chuyển trả lại số tiền được xác định là không phải tiền đóng hoặc đóng thừa, đóng trùng BHXH, BHYT, BHTN cho cơ quan, đơn vị, cá nhân đã nộp cho cơ quan BHXH…”.</p><p>Như vậy, theo quy định trên, khi người lao động bị đóng trùng BHXH thì cơ quan BHXH có nghĩa vụ hoàn trả lại số tiền đã đóng trùng đó.</p><p>Ngoài ra, tại Khoản 2, Điều 63 Quyết định số 1111/QĐ-BHXH quy định: “Một người có từ 2 sổ BHXH trở lên ghi thời gian đóng BHXH trùng nhau thì cơ quan BHXH hướng dẫn người lao động lựa chọn 1 sổ BHXH để tiếp tục ghi quá trình đóng BHXH, BHTN hoặc giải quyết các chế độ BHXH, BHTN. Các sổ BHXH còn lại thu hồi và thực hiện hoàn trả cho đơn vị, người lao động theo quy định tại Điểm 3.3, Khoản 3, Điều 48.</p><p>Trường hợp sổ BHXH bị thu hồi mà đơn vị đề nghị cấp sổ BHXH đã giải thể thì thực hiện giải quyết chế độ trợ cấp một lần cho người lao động. Khi thu hồi sổ BHXH, đồng thời phải thu hồi các khoản trợ cấp BHXH đã chi trả trước đó (nếu có)”.</p><p>Với thủ tục thoái thu gồm: Công văn của đơn vị; danh sách lao động tham gia BHXH, BHYT, BHTN (D02-TS); sổ BHXH.</p><p>Sau đó, công ty cũ của người lao động sẽ có trách nhiệm&nbsp;làm thoái thu đồng thời chốt sổ BHXH.</p>', 3, 1, 1506574809)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq` (`id`, `catid`, `title`, `alias`, `question`, `answer`, `weight`, `status`, `addtime`) VALUES (5, 2, 'Hưởng quyền lợi BHYT theo đối tượng tham gia', 'Huong-quyen-loi-BHYT-theo-doi-tuong-tham-gia', 'Bố đẻ của bà Nguyễn Phương muốn tán sỏi thận nội soi bằng laser tại Bệnh viện Bình Dân, nhưng bố bà đăng ký khám chữa bệnh BHYT tại Bệnh viện Thống Nhất. Bà Phương hỏi, bố bà có được BHYT chi trả không? Việc chuyển viên trong trường hợp này có đúng tuyến không?', '<p><em>Về vấn đề này, BHXH &nbsp;trả lời như sau:</em></p><p>Trường hợp bố của bà được Bệnh viện Thống Nhất chuyển tuyến đến bệnh viện Bình Dân để tán sỏi qua nội soi thì sẽ được hưởng 100% chi phí khám chữa bệnh đúng tuyến nhân mức quyền lợi được hưởng (80%, 95%, 100% tùy theo đối tượng tham gia BHYT). Các chi phí dịch vụ, chi phí ngoài quy định, chi phí đồng chi trả bố của bà phải tự thanh toán với cơ sở khám chữa bệnh.</p>', 1, 1, 1506574893)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq` (`id`, `catid`, `title`, `alias`, `question`, `answer`, `weight`, `status`, `addtime`) VALUES (6, 2, 'Tự chuyển viện để phẫu thuật, hưởng BHYT thế nào?', 'Tu-chuyen-vien-de-phau-thuat-huong-BHYT-the-nao', 'Bà nội của ông Hữu Trọng (Nghệ An) có thẻ BHYT đối tượng người có công với cách mạng. Bà của ông đã đi khám tại bệnh viện tuyến tỉnh, sau đó đến bệnh viện tại TP. Hà Nội để khám lại. Hiện bà của ông muốn được phẫu thuật ở bệnh viện tại TP. Hà Nội.<br />Gia đình ông Trọng đã xin giấy chuyển viện của bệnh viện tuyến tỉnh nhưng không được chấp thuận, trường hợp muốn có giấy chuyển viện thì gia đình phải chịu phí 3 triệu đồng.<br /><br />Ông Trọng hỏi, bệnh viện tuyến tỉnh thực hiện như vậy có đúng không? Bà của ông phẫu thuật tại bệnh viện ở TP. Hà Nội mà không có giấy chuyển tuyến thì có được hưởng 100% BHYT không?', '<p><em>Về vấn đề này, BHXH Việt Nam trả lời như sau:</em></p><p>Khi vượt quá khả năng chuyên môn, cơ sở khám, chữa bệnh có trách nhiệm phải chuyển người bệnh lên cơ sở tuyến trên để được khám và điều trị.</p><p>Việc chuyển tuyến thuộc thẩm quyền và trách nhiệm của cơ sở khám, chữa bệnh và người bệnh không phải chi trả bất cứ chi phí nào. Đối với bệnh viện thu phí khi cấp giấy chuyển tuyến, đề nghị ông phản ánh với Sở Y tế để được giải quyết.</p><p>Để được hưởng đầy đủ quyền lợi BHYT khi điều trị tại Hà Nội, người bệnh cần xuất trình Giấy chuyển tuyến của cơ sở khám, chữa bệnh tuyến dưới chuyển đến.</p><p>Trường hợp bà của ông tự đi mổ tại Hà Nội không có giấy chuyển tuyến thì chỉ được hưởng 60% chi phí điều trị nội trú tại cơ sở khám, chữa bệnh tuyến tỉnh và 40% chi phí điều trị nội trú tại cơ sở khám, chữa bệnh tuyến trung ương.</p>', 2, 1, 1506575035)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_faq_categories`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_faq_categories` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` mediumint(8) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `groups_view` varchar(255) NOT NULL,
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `keywords` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=4  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq_categories` (`id`, `parentid`, `title`, `alias`, `description`, `groups_view`, `weight`, `status`, `keywords`) VALUES (1, 0, 'Giáo dục và đào tạo', 'Giao-duc-va-dao-tao', '', '6', 1, 1, 'văn bằng,chứng chỉ,học sinh,nguyễn bỉnh khiêm,tốt nghiệp,thủ tục,như thế,đi làm,có thể,giấy tờ,vấn đề,giáo dục,đào tạo,trả lời,quy chế,hệ thống,quốc dân,ban hành,quyết định,quy định,bản sao')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq_categories` (`id`, `parentid`, `title`, `alias`, `description`, `groups_view`, `weight`, `status`, `keywords`) VALUES (2, 0, 'Dân sinh', 'Dan-sinh', '', '6', 2, 1, 'quyền lợi,tham gia,bình dân,đăng ký,thống nhất,trường hợp,vấn đề,chi phí,tùy theo,quy định,thanh toán,cơ sở,phẫu thuật,thế nào,của ông,cách mạng,sau đó,hà nội,chấp thuận,gia đình,thực hiện')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq_categories` (`id`, `parentid`, `title`, `alias`, `description`, `groups_view`, `weight`, `status`, `keywords`) VALUES (3, 0, 'Kinh Tế', 'Kinh-Te', '', '6', 3, 1, '')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_faq_config`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_faq_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_faq_config` (`config_name`, `config_value`) VALUES ('type_main', '1')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_faq_tmp`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_faq_tmp` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` mediumint(8) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `question` text NOT NULL,
  `answer` mediumtext NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `userid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_freecontent_blocks`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_freecontent_blocks` (
  `bid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_freecontent_blocks` (`bid`, `title`, `description`) VALUES (1, 'Sản phẩm', 'Sản phẩm của công ty cổ phần phát triển nguồn mở Việt Nam - VINADES.,JSC')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_freecontent_rows`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_freecontent_rows` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `bid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '',
  `target` varchar(10) NOT NULL DEFAULT '' COMMENT '_blank|_self|_parent|_top',
  `image` varchar(255) NOT NULL DEFAULT '',
  `start_time` int(11) NOT NULL DEFAULT 0,
  `end_time` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '0: In-Active, 1: Active, 2: Expired',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=6  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_freecontent_rows` (`id`, `bid`, `title`, `description`, `link`, `target`, `image`, `start_time`, `end_time`, `status`) VALUES (1, 1, 'Hệ quản trị nội dung NukeViet', '<ul>
	<li>Giải thưởng Nhân tài đất Việt 2011, 10.000+ website đang sử dụng</li>
	<li>Được Bộ GD&amp;ĐT khuyến khích sử dụng trong các cơ sở giáo dục</li>
	<li>Bộ TT&amp;TT quy định ưu tiên sử dụng trong cơ quan nhà nước</li>
</ul>', 'http://vinades.vn/vi/san-pham/nukeviet/', '_blank', 'cms.jpg', 1503374420, 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_freecontent_rows` (`id`, `bid`, `title`, `description`, `link`, `target`, `image`, `start_time`, `end_time`, `status`) VALUES (2, 1, 'Cổng thông tin doanh nghiệp', '<ul>
	<li>Tích hợp bán hàng trực tuyến</li>
	<li>Tích hợp các nghiệp vụ quản lý (quản lý khách hàng, quản lý nhân sự, quản lý tài liệu)</li>
</ul>', 'http://vinades.vn/vi/san-pham/Cong-thong-tin-doanh-nghiep-NukeViet-portal/', '_blank', 'portal.jpg', 1503374420, 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_freecontent_rows` (`id`, `bid`, `title`, `description`, `link`, `target`, `image`, `start_time`, `end_time`, `status`) VALUES (3, 1, 'Cổng thông tin Phòng giáo dục, Sở giáo dục', '<ul>
	<li>Tích hợp chung website hàng trăm trường</li>
	<li>Tích hợp các ứng dụng trực tuyến (Tra điểm SMS, Tra cứu văn bằng, Học bạ điện tử ...)</li>
</ul>', 'http://vinades.vn/vi/san-pham/Cong-thong-tin-giao-duc-NukeViet-Edugate/', '_blank', 'edugate.jpg', 1503374420, 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_freecontent_rows` (`id`, `bid`, `title`, `description`, `link`, `target`, `image`, `start_time`, `end_time`, `status`) VALUES (4, 1, 'Tòa soạn báo điện tử chuyên nghiệp', '<ul>
	<li>Bảo mật đa tầng, phân quyền linh hoạt</li>
	<li>Hệ thống bóc tin tự động, đăng bài tự động, cùng nhiều chức năng tiên tiến khác...</li>
</ul>', 'http://vinades.vn/vi/san-pham/Toa-soan-bao-dien-tu/', '_blank', 'toa-soan-dien-tu.jpg', 1503374420, 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_freecontent_rows` (`id`, `bid`, `title`, `description`, `link`, `target`, `image`, `start_time`, `end_time`, `status`) VALUES (5, 1, 'Giải pháp bán hàng trực tuyến', '<ul><li>Tích hợp các tính năng cơ bản bán hàng trực tuyến</li><li>Tích hợp với các cổng thanh toán, ví điện tử trên toàn quốc</li></ul>', 'http://vinades.vn', '_blank', 'shop.jpg', 1503374420, 0, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_admins`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_admins` (
  `userid` int(11) unsigned NOT NULL DEFAULT 0,
  `subjectid` smallint(4) NOT NULL DEFAULT 0,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `add_content` tinyint(4) NOT NULL DEFAULT 0,
  `edit_content` tinyint(4) NOT NULL DEFAULT 0,
  `del_content` tinyint(4) NOT NULL DEFAULT 0,
  UNIQUE KEY `userid` (`userid`,`subjectid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_area`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_area` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `alias` varchar(249) NOT NULL,
  `title` varchar(249) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`,`parentid`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_area` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `addtime`, `weight`) VALUES (1, 0, 'Van-ban-chi-dao-dieu-hanh', 'Văn bản chỉ đạo điều hành', '', '', 1502359548, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_area` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `addtime`, `weight`) VALUES (2, 0, 'Van-ban-phap-quy', 'Văn bản pháp quy', '', '', 1502359553, 2)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_cat`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_cat` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `alias` varchar(249) NOT NULL,
  `title` varchar(249) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `newday` tinyint(2) unsigned NOT NULL DEFAULT 5,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`,`parentid`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=5  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (1, 0, 'Cong-van', 'Công văn', '', '', 5, 1502359512, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (2, 0, 'Van-ban', 'Văn bản', '', '', 5, 1502359523, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (3, 0, 'Thong-tu', 'Thông tư', '', '', 5, 1502359531, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (4, 0, 'Nghi-dinh', 'Nghị định', '', '', 5, 1502359542, 4)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_config`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('nummain', '50')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('numsub', '50')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('typeview', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('down_in_home', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('detail_other', 'a:1:{i:0;s:3:\"cat\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('detail_hide_empty_field', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('detail_show_link_cat', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('detail_show_link_area', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('detail_show_link_subject', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('detail_show_link_signer', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('detail_pdf_quick_view', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('other_numlinks', '5')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_config` (`config_name`, `config_value`) VALUES ('title_show_type', '0')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_examine`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_examine` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `weight` smallint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_row`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_row` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `replacement` varchar(255) NOT NULL DEFAULT '',
  `relatement` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `cid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `sid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `approval` tinyint(1) DEFAULT NULL,
  `sgid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `note` text NOT NULL,
  `introtext` text NOT NULL,
  `bodytext` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `groups_view` varchar(255) NOT NULL,
  `groups_download` varchar(255) NOT NULL,
  `files` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `addtime` int(11) NOT NULL,
  `edittime` int(11) NOT NULL,
  `publtime` int(11) NOT NULL DEFAULT 0,
  `start_comm_time` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `end_comm_time` int(11) DEFAULT NULL,
  `startvalid` int(11) NOT NULL DEFAULT 0,
  `exptime` int(11) NOT NULL DEFAULT 0,
  `view_hits` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `download_hits` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `admin_add` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `admin_edit` mediumint(8) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=17  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (1, '', '', 'Công văn số 4622&#x002F;BGDĐT-CNTT về việc hướng dẫn thực hiện nhiệm vụ CNTT năm học 2016 – 2017', 'Cong-van-so-4622-BGDDT-CNTT-ve-viec-huong-dan-thuc-hien-nhiem-vu-CNTT-nam-hoc-2016-2017-1', '4622&#x002F;BGDĐT-CNTT', 1, 1, NULL, 1, '', 'Công văn số 4622&#x002F;BGDĐT-CNTT về việc hướng dẫn thực hiện nhiệm vụ CNTT năm học 2016 – 2017', '', 'khai thác,sử dụng,tự do,quán triệt,triển khai,thông tư,quy định,cơ sở,tăng cường,nhà trường,danh sách,ban hành,nghiên cứu,áp dụng,hệ thống,xây dựng,thông tin', '6', '6', 'demo.pdf', 1, 1502359836, 1502811964, 1478538000, NULL, NULL, NULL, 0, 0, 12, 2, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (10, '', '', 'Thông tư số 01&#x002F;2011&#x002F;TT-BTTTT của Bộ Thông tin và Truyền thông &#x3A; Công bố Danh mục tiêu chuẩn kỹ thuật về ứng dụng công nghệ thông tin trong cơ quan nhà nước', 'Thong-tu-so-01-2011-TT-BTTTT-cua-Bo-Thong-tin-va-Truyen-thong-Cong-bo-Danh-muc-tieu-chuan-ky-thuat-ve-ung-dung-cong-nghe-thong-tin-trong-co-quan-nha-nuoc-10', '01&#x002F;2011&#x002F;TT-BTTTT', 3, 4, NULL, 6, '', 'Công bố Danh mục tiêu chuẩn kỹ thuật <br />về ứng dụng công nghệ thông tin trong cơ quan nhà nước', '', 'công bố,danh mục,tiêu chuẩn,kỹ thuật,ứng dụng,công nghệ,thông tin,cơ quan', '6', '6', 'demo.pdf', 1, 1502416130, 0, 1294074000, NULL, NULL, NULL, 0, 0, 1, 0, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (2, '', '', 'Thông tư số 08&#x002F;2010&#x002F;TT-BGDĐT của Bộ Giáo dục và Đào tạo &#x3A; Quy định về sử dụng phần mềm tự do mã nguồn mở trong các cơ sở giáo dục', 'Thong-tu-so-08-2010-TT-BGDDT-cua-Bo-Giao-duc-va-Dao-tao-Quy-dinh-ve-su-dung-phan-mem-tu-do-ma-nguon-mo-trong-cac-co-so-giao-duc-2', '08&#x002F;2010&#x002F;TT-BGDĐT', 3, 1, NULL, 2, '', 'Thông tư số 08&#x002F;2010&#x002F;TT-BGDĐT của Bộ Giáo dục và Đào tạo &#x3A; Quy định về sử dụng phần mềm tự do mã nguồn mở trong các cơ sở giáo dục', '', 'giáo dục,đào tạo,cộng hoà,xã hội,chủ nghĩa,độc lập,tự do,hạnh phúc,hà nội,sử dụng,cơ sở,công nghệ,thông tin,nghị định,phủ quy,nhiệm vụ,quyền hạn,tổ chức,ứng dụng,hoạt động,cơ quan', '6', '6', 'demo.pdf', 1, 1502359989, 1502812204, 1267376400, NULL, NULL, NULL, 0, 0, 3, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (3, '', '', 'Công văn số 310&#x002F;BTTTT-ƯDCNTT ngày 10&#x002F;02&#x002F;2012 của Bộ Thông tin và Truyền thông về việc hướng dẫn áp dụng bộ tiêu chí đánh giá cổng thông tin điện tử của cơ quan nhà nước', 'Cong-van-so-310-BTTTT-UDCNTT-ngay-10-02-2012-cua-Bo-Thong-tin-va-Truyen-thong-ve-viec-huong-dan-ap-dung-bo-tieu-chi-danh-gia-cong-thong-tin-dien-tu-cua-co-quan-nha-nuoc-3', '310&#x002F;BTTTT-ƯDCNTT', 1, 2, NULL, 3, '', 'Văn bản hướng dẫn áp dụng bộ tiêu chí đánh giá cổng thông tin điện tử của cơ quan nhà nước', '', 'hướng dẫn,áp dụng,tiêu chí,đánh giá,thông tin,cơ quan', '6', '6', 'demo.pdf', 1, 1502414679, 0, 1328806800, NULL, NULL, NULL, 0, 0, 4, 0, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (4, '', '', 'Thông tư 20&#x002F;2014&#x002F;TT-BTTTT của Bộ TT&amp;TT ban hành ngày 05&#x002F;12&#x002F;2014 quy định về các sản phẩm phần mềm nguồn mở &#40;PMNM&#41; được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước.', 'Thong-tu-20-2014-TT-BTTTT-cua-Bo-TT-TT-ban-hanh-ngay-05-12-2014-quy-dinh-ve-cac-san-pham-phan-mem-nguon-mo-PMNM-duoc-uu-tien-mua-sam-su-dung-trong-co-quan-to-chuc-nha-nuoc-4', '20&#x002F;2014&#x002F;TT-BTTTT', 3, 2, NULL, 4, '', 'Thông tư Quy định về các sản phẩm phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước', '', 'thông tư,quy định,sản phẩm,ưu tiên,mua sắm,sử dụng,cơ quan,tổ chức', '6', '6', 'demo.pdf', 1, 1502414811, 0, 1417712400, NULL, NULL, NULL, 1421686800, 0, 1, 0, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (5, '', '', 'Nghị định số 43&#x002F;2011&#x002F;NĐ-CP ngày 13&#x002F;6&#x002F;2011 của Chính phủ Quy định về việc cung cấp thông tin và dịch vụ công trực tuyến trên trang thông tin điện tử hoặc cổng thông tin điện tử của cơ quan Nhà nước', 'Nghi-dinh-so-43-2011-ND-CP-ngay-13-6-2011-cua-Chinh-phu-Quy-dinh-ve-viec-cung-cap-thong-tin-va-dich-vu-cong-truc-tuyen-tren-trang-thong-tin-dien-tu-hoac-cong-thong-tin-dien-tu-cua-co-quan-Nha-nuoc-5', '43&#x002F;2011&#x002F;NĐ-CP', 4, 3, NULL, 5, '', 'Quy định về việc cung cấp thông tin và dịch vụ công trực tuyến trên trang thông tin điện tử hoặc cổng thông tin điện tử của cơ quan nhà nước', '', 'cộng hòa,xã hội,chủ nghĩa,độc lập,tự do,hạnh phúc,hà nội,thông tin,cơ quan,tổ chức,công nghệ,đề nghị,phạm vi,quy định,sau đây,bảo đảm,hoạt động,tổng cục,tương đương,ủy ban,nhân dân', '6', '6', 'demo.pdf', 1, 1502415038, 1502812086, 1307898000, NULL, NULL, NULL, 0, 0, 2, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (6, '', '', 'Văn bản số 1654&#x002F;BTTTT-UDCNTT của Bộ TT&amp;TT ban hành ngày 27&#x002F;05&#x002F;2008 Hướng dẫn các yêu cầu cơ bản về chức năng, tính năng kỹ thuật cho các dự án dùng chung theo Quyết định số 43&#x002F;2008&#x002F;QĐ-TTg &#40;Cổng thông tin điện tử&', 'Van-ban-so-1654-BTTTT-UDCNTT-cua-Bo-TT-TT-ban-hanh-ngay-27-05-2008-Huong-dan-cac-yeu-cau-co-ban-ve-chuc-nang-tinh-nang-ky-thuat-cho-cac-du-an-dung-chung-theo-Quyet-dinh-so-43-2008-QD-TTg-Cong-thong-tin-dien-tu-6', '1654&#x002F;BTTTT-UDCNTT', 2, 2, NULL, 6, '', 'Hướng dẫn các yêu cầu cơ bản về chức năng, tính năng kỹ thuật cho các dự án dùng chung theo Quyết định số 43&#x002F;2008&#x002F;QĐ-TTg &#40;Cổng thông tin điện tử&#41;', '', 'hướng dẫn,yêu cầu,cơ bản,tính năng,kỹ thuật,dự án,quyết định,thông tin', '6', '6', 'demo.pdf', 1, 1502415180, 0, 1211821200, NULL, NULL, NULL, 0, 0, 1, 0, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (7, '', '', 'Văn bản số&#x3A; 1790&#x002F;BTTTT-VNCERT ngày 20&#x002F;06&#x002F;2011 của Bộ TT&amp;TT về việc tăng cường công tác đảm bảo an toàn thông tin cho cổng&#x002F;trang thông tin điện tử', 'Van-ban-so-1790-BTTTT-VNCERT-ngay-20-06-2011-cua-Bo-TT-TT-ve-viec-tang-cuong-cong-tac-dam-bao-an-toan-thong-tin-cho-cong-trang-thong-tin-dien-tu-7', '1790&#x002F;BTTTT-VNCERT', 2, 2, NULL, 6, '', 'V&#x002F;v tăng cường công tác đảm bảo an toàn thông tin cho cổng&#x002F;trang thông tin điện tử', '', 'tăng cường,công tác,đảm bảo,an toàn,thông tin', '6', '6', 'demo.pdf', 1, 1502415276, 0, 1308502800, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (8, '', '', 'Văn bản số 2132&#x002F;BTTTT-VNCERT, ngày 18&#x002F;7&#x002F;2011, của Bộ Thông tin và Truyền thông về việc hướng dẫn bảo đảm an toàn thông tin cho các cổng&#x002F;trang thông tin điện tử', 'Van-ban-so-2132-BTTTT-VNCERT-ngay-18-7-2011-cua-Bo-Thong-tin-va-Truyen-thong-ve-viec-huong-dan-bao-dam-an-toan-thong-tin-cho-cac-cong-trang-thong-tin-dien-tu-8', '2132&#x002F;BTTTT-VNCERT', 2, 2, NULL, 6, '', 'Hướng dẫn đảm bảo an toàn thông tin cho các Cổng&#x002F;Trang thông tin điện tử', '', 'hướng dẫn,đảm bảo,an toàn,thông tin', '6', '6', 'demo.pdf', 1, 1502415396, 0, 1310922000, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (9, '', '', 'Thông tư số 24&#x002F;2011&#x002F;TT-BTTTT ngày 20&#x002F;9&#x002F;2011 của Bộ Thông tin và Truyền thông quy định về việc tạo lập, sử dụng và lưu trữ dữ liệu đặc tả trên trang thông tin điện tử hoặc cổng thông tin điện tử của cơ quan nhà nước', 'Thong-tu-so-24-2011-TT-BTTTT-ngay-20-9-2011-cua-Bo-Thong-tin-va-Truyen-thong-quy-dinh-ve-viec-tao-lap-su-dung-va-luu-tru-du-lieu-dac-ta-tren-trang-thong-tin-dien-tu-hoac-cong-thong-tin-dien-tu-cua-co-quan-nha-nuoc-9', '24&#x002F;2011&#x002F;TT-BTTTT', 3, 4, NULL, 7, '', 'Quy định về việc tạo lập, sử dụng và lưu trữ dữ liệu đặc tả trên trang thông tin điện tử hoặc cổng thông tin điện tử của cơ quan nhà nước', '', 'thông tin,thông số,cộng hoà,xã hội,chủ nghĩa,độc lập,tự do,hạnh phúc,hà nội,thông tư,quy định,tạo lập,sử dụng,lưu trữ,cơ quan,nhà nước,căn cứ,công nghệ,nghị định,ứng dụng,hoạt động', '6', '6', 'demo.pdf', 1, 1502415529, 1502812030, 1316451600, NULL, NULL, NULL, 0, 0, 5, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (11, '', '', 'Nghị Định ứng dụng công nghệ thông tin trong hoạt động của cơ quan nhà nước CHÍNH PHỦ', 'Nghi-Dinh-ung-dung-cong-nghe-thong-tin-trong-hoat-dong-cua-co-quan-nha-nuoc-CHINH-PHU-11', '64&#x002F;2007&#x002F;NĐ-CP', 4, 4, NULL, 7, '', 'Ứng dụng công nghệ thông tin trong hoạt động của cơ quan nhà nước CHÍNH PHỦ', '', 'cộng hoà,xã hội,chủ nghĩa,độc lập,tự do,hạnh phúc,hà nội,nghị định,ứng dụng,công nghệ,thông tin,hoạt động,cơ quan,nhà nước,căn cứ,tổ chức,giao dịch,đề nghị,bưu chính,viễn thông,quy định', '6', '6', 'demo.pdf', 1, 1502416239, 1502812358, 1176138000, NULL, NULL, NULL, 0, 0, 1, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (12, '', '', 'Thông tư 26&#x002F;2009&#x002F;TT-BTTTT Quy định về việc cung cấp thông tin và đảm bảo khả năng truy nhập thuận tiện đối với trang thông tin điện tử của Nhà nước', 'Thong-tu-26-2009-TT-BTTTT-Quy-dinh-ve-viec-cung-cap-thong-tin-va-dam-bao-kha-nang-truy-nhap-thuan-tien-doi-voi-trang-thong-tin-dien-tu-cua-Nha-nuoc-12', '26&#x002F;2009&#x002F;TT-BTTTT', 3, 2, NULL, 8, '', 'Quy định về việc cung cấp thông tin và đảm bảo khả năng truy nhập thuận tiện đối với trang thông tin điện tử của Nhà nước', '', 'thông tin', '6', '6', 'demo.pdf', 1, 1502416406, 0, 1248973200, NULL, NULL, NULL, 1252947600, 0, 0, 0, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (13, '', '', 'Thông tư số 19&#x002F;2011&#x002F;TT-BTTTT của Bộ Thông tin và Truyền thông &#x3A; Quy định về áp dụng tiêu chuẩn định dạng tài liệu mở trong cơ quan nhà nước', 'Thong-tu-so-19-2011-TT-BTTTT-cua-Bo-Thong-tin-va-Truyen-thong-Quy-dinh-ve-ap-dung-tieu-chuan-dinh-dang-tai-lieu-mo-trong-co-quan-nha-nuoc-13', '19&#x002F;2011&#x002F;TT-BTTTT', 3, 4, NULL, 6, '', 'Quy định về áp dụng tiêu chuẩn định dạng tài liệu mở trong cơ quan nhà nước', '', 'quy định,áp dụng,tiêu chuẩn,tài liệu,cơ quan', '6', '6', 'demo.pdf', 1, 1502416491, 0, 1309453200, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (14, '', '', 'Thông tư 28&#x002F;2009&#x002F;TT-BTTTT quy định việc áp dụng tiêu chuẩn, công nghệ hỗ trợ người khuyết tật tiếp cận, sử dụng công nghệ thông tin và truyền thông', 'Thong-tu-28-2009-TT-BTTTT-quy-dinh-viec-ap-dung-tieu-chuan-cong-nghe-ho-tro-nguoi-khuyet-tat-tiep-can-su-dung-cong-nghe-thong-tin-va-truyen-thong-14', '28&#x002F;2009&#x002F;TT-BTTTT', 3, 4, NULL, 7, '', 'Quy định về việc áp dụng tiêu chuẩn, công nghệ hỗ trợ người khuyết tật tiếp cận, sử dụng công nghệ thông tin và truyền thông', '', 'thông tin,thông số,cộng hoà,xã hội,chủ nghĩa,độc lập,tự do,hạnh phúc,hà nội,thông tư,quy định,áp dụng,tiêu chuẩn,công nghệ,hỗ trợ,tiếp cận,sử dụng,căn cứ,nghị định,phủ quy,nhiệm vụ', '6', '6', 'demo.pdf', 1, 1502416578, 1502812261, 1252861200, NULL, NULL, NULL, 0, 0, 3, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (15, '', '', 'Quyết định số 80&#x002F;2014&#x002F;QĐ-TTg của Thủ tướng Chính phủ&#x3A; Quy định thí điểm về thuê dịch vụ công nghệ thông tin trong cơ quan nhà nước', 'Quyet-dinh-so-80-2014-QD-TTg-cua-Thu-tuong-Chinh-phu-Quy-dinh-thi-diem-ve-thue-dich-vu-cong-nghe-thong-tin-trong-co-quan-nha-nuoc-15', '80&#x002F;2014&#x002F;QĐ-TTg', 2, 3, NULL, 5, '', 'Quy định thí điểm về thuê dịch vụ công nghệ thông tin trong cơ quan nhà nước', '', 'quy định,thí điểm,công nghệ,thông tin,cơ quan', '6', '6', 'demo.pdf', 1, 1502416668, 1502770009, 1419872400, NULL, NULL, NULL, 1423933200, 0, 5, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (16, '', '', 'Nghị định số 72&#x002F;2013&#x002F;NĐ-CP của Chính phủ &#x3A; Quản lý, cung cấp, sử dụng dịch vụ Internet và thông tin trên mạng', 'Nghi-dinh-so-72-2013-ND-CP-cua-Chinh-phu-Quan-ly-cung-cap-su-dung-dich-vu-Internet-va-thong-tin-tren-mang-16', '72&#x002F;2013&#x002F;NĐ-CP', 4, 3, NULL, 5, '', 'Quản lý, cung cấp, sử dụng dịch vụ Internet và thông tin trên mạng', '', 'quản lý,sử dụng,thông tin', '6', '6', 'demo.pdf', 1, 1502416748, 0, 1373821200, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_row_area`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_row_area` (
  `row_id` int(10) unsigned NOT NULL,
  `area_id` smallint(4) unsigned NOT NULL,
  UNIQUE KEY `alias` (`row_id`,`area_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (2, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (3, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (5, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (6, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (7, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (8, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (9, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (10, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (11, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (12, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (13, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (14, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (15, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_row_area` (`row_id`, `area_id`) VALUES (16, 2)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_set_replace`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_set_replace` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `oid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `nid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_signer`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_signer` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `offices` varchar(255) NOT NULL,
  `positions` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=9  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (1, 'Phạm Mạnh Hùng', '', '', 1502359701)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (2, 'Phạm Vũ Luận', '', '', 1502359879)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (3, 'Nguyễn Thành Phúc', '', 'Cục trưởng Cục ứng dụng CNTT', 1502414600)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (4, 'Nguyễn Bắc Son', '', 'Bộ trưởng Bộ Thông tin và Truyền thông', 1502414717)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (5, 'Nguyễn Tấn Dũng', '', 'THỦ TƯỚNG', 1502414907)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (6, 'Nguyễn Minh Hồng', '', 'Thứ trưởng Bộ Thông tin và Truyền thông', 1502415109)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (7, 'Khác', '', '', 1502415450)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (8, 'Lê Doãn Hợp', '', 'Bộ trưởng Bộ Thông tin và Truyền thông', 1502416327)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_laws_subject`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_laws_subject` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `numcount` int(10) NOT NULL DEFAULT 0,
  `numlink` tinyint(2) NOT NULL DEFAULT 5,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=5  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (1, 'Bo-GDDT', 'Bộ GDĐT', '', '', 2, 5, 1502359649, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (2, 'Bo-Thong-tin-va-Truyen-thong', 'Bộ Thông tin và Truyền thông', '', '', 6, 5, 1502414470, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (3, 'TM-CHINH-PHU', 'TM. CHÍNH PHỦ', '', '', 3, 5, 1502414952, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_laws_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (4, 'Khac', 'Khác', '', '', 5, 5, 1502415470, 4)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_menu`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_menu` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  AUTO_INCREMENT=9  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu` (`id`, `title`) VALUES (1, 'Menu chính')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu` (`id`, `title`) VALUES (3, 'Công báo - Lịch - Văn bản')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu` (`id`, `title`) VALUES (4, 'Góp ý - Lấy ý kiến của dân')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu` (`id`, `title`) VALUES (6, 'Menu &#40;Chân trang Website&#41;')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu` (`id`, `title`) VALUES (7, 'Menu &#40;Đăng nhập&#41;')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_menu_rows`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_menu_rows` (
  `id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `parentid` mediumint(5) unsigned NOT NULL,
  `mid` smallint(5) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `icon` varchar(255) DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `note` varchar(255) DEFAULT '',
  `weight` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lev` int(11) NOT NULL DEFAULT 0,
  `subitem` text DEFAULT NULL,
  `groups_view` varchar(255) DEFAULT '',
  `module_name` varchar(255) DEFAULT '',
  `op` varchar(255) DEFAULT '',
  `target` tinyint(4) DEFAULT 0,
  `css` varchar(255) DEFAULT '',
  `active_type` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`,`mid`)
) ENGINE=MyISAM  AUTO_INCREMENT=154  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (74, 0, 7, 'Liên kết', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=page&op=thong-bao.html', '', '', '', 4, 4, 0, '', '6', 'page', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (73, 0, 7, 'Sơ đồ cổng', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=feeds', '', '', '', 3, 3, 0, '', '6', 'feeds', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (72, 53, 6, 'Đoàn thanh niên Việt Nam', 'http://doanthanhnien.vn', '', '', '', 4, 17, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (152, 144, 6, 'Đảng Cộng sản Việt Nam', 'http://www.dangcongsan.vn/', '', '', '', 1, 20, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (70, 53, 6, 'Ngân hàng chính sách xã hội', 'http://vbsp.org.vn/', '', '', '', 3, 16, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (37, 0, 1, 'Giới thiệu', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=about', '', '', '', 1, 1, 0, '143,142', '6', 'about', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (38, 0, 1, 'Cơ cấu tổ chức', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=co-cau-to-chuc', '', '', '', 2, 4, 0, '', '6', 'co-cau-to-chuc', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (39, 0, 1, 'Tin Tức', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news', '', '', '', 3, 5, 0, '112,113,114,115,116,117,118,119,120', '6', 'news', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (40, 0, 1, 'Văn bản', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=laws', '', '', '', 4, 15, 0, '124,125,126,127', '6', 'laws', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (41, 0, 1, 'Lịch làm việc', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=page&op=thong-bao.html', '', '', '', 5, 20, 0, '', '6', 'page', 'thong-bao.html', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (42, 0, 1, 'Dịch vụ công', 'http://www.chinhphu.vn/portal/page/portal/chinhphu/congdan/dichvucong', '', '', '', 6, 21, 0, '', '6', 'page', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (43, 0, 1, 'Lấy ý kiến người dân', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=opinions', '', '', '', 7, 22, 0, '', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (44, 0, 1, 'Hỏi đáp', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=faq', '', '', '', 8, 23, 0, '138,139', '6', 'faq', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (45, 0, 1, 'Liên hệ', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=contact', '', '', '', 9, 26, 0, '', '6', 'contact', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (46, 0, 4, 'Lấy ý kiến người dân', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=opinions', 'lay-y-kien.png', '', '', 1, 1, 0, '', '6', 'opinions', '', 1, 'col-sm-12 col-md-5', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (47, 0, 4, 'Lấy ý kiến dự thảo văn bản', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=opinions', 'y-kien-du-thao.png', '', '', 2, 2, 0, '', '6', 'opinions', '', 1, 'col-sm-12 col-md-7 imgonright', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (48, 0, 4, 'Đường dây nóng', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=page&op=thongbao.html', 'duong-day-nong.png', '', 'Sở&#x002F; Ban ngành&#x002F; Quận&#x002F; Huyện', 3, 3, 0, '', '6', 'page', '', 1, 'col-sm-12 col-md-5 hasnote', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (49, 0, 4, 'Chỉ dẫn thủ tục hành chính', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=page&op=thongbao.html', 'chi-dan-thu-tuc.png', '', 'Hỗ trợ trực tuyến qua điện thoại', 4, 4, 0, '', '6', 'page', '', 1, 'col-sm-12 col-md-7 imgonright hasnote', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (50, 0, 6, 'Sở &#x002F; Ban ngành', '#', '', '', '', 1, 1, 0, '54,55,56,57,153', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (52, 0, 6, 'Bộ &#x002F; ngành', '#', '', '', '', 2, 7, 0, '63,64,65,66,67', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (53, 0, 6, 'Đoàn hội', '#', '', '', '', 3, 13, 0, '72,70,68,69,151', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (54, 50, 6, 'Sở công thương', '#', '', '', '', 4, 5, 1, '', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (55, 50, 6, 'Sở khoa học và công nghệ', '#', '', '', '', 2, 3, 1, '', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (56, 50, 6, 'Sở NN&amp;PT Nông thôn', '#', '', '', '', 3, 4, 1, '', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (57, 50, 6, 'Sở tài chính', '#', '', '', '', 5, 6, 1, '', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (146, 144, 6, 'Báo điện tử Chính phủ', 'http://baochinhphu.vn/', '', '', '', 3, 22, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (145, 144, 6, 'Cổng thông tin Chính Phủ', 'http://chinhphu.vn/', '', '', '', 2, 21, 1, '', '6', 'page', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (144, 0, 6, 'Liên kết Website', '#', '', '', '', 4, 19, 0, '152,146,145,147,148', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (63, 52, 6, 'Bộ Nông Nghiệp', 'http://www.mard.gov.vn/', '', '', '', 1, 8, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (64, 52, 6, 'Bộ Giáo Dục', 'http://pbc.moet.gov.vn/', '', '', '', 2, 9, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (65, 52, 6, 'Bộ Tài Chính', 'http://vbpq.mof.gov.vn/', '', '', '', 3, 10, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (66, 52, 6, 'Bộ Giao thông vận tải', 'http://mt.gov.vn/', '', '', '', 4, 11, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (67, 52, 6, 'Bộ Y tế', 'http://moh.gov.vn/', '', '', '', 5, 12, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (68, 53, 6, 'Liên hiệp các hội KHKT', 'http://www.vusta.vn/', '', '', '', 1, 14, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (69, 53, 6, 'LH Các tổ chức hữu nghị', 'http://www.vietpeace.org.vn/', '', '', '', 2, 15, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (143, 37, 1, 'Sự hình thành và phát triển', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=about&op=Su-hinh-thanh-va-phat-trien.html', '', '', '', 2, 3, 1, '', '6', 'about', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (142, 37, 1, 'Giới thiệu chung', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=about&op=Gioi-thieu-chung.html', '', '', '', 1, 2, 1, '', '6', 'about', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (141, 0, 7, 'RSS', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=feeds', 'rss_1.png', '', '', 2, 2, 0, '', '6', 'feeds', '', 1, 'li-second-display', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (140, 0, 7, 'Thành viên', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=users', 'user_1.png', '', '', 1, 1, 0, '', '6', 'users', '', 1, 'li-first-menu', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (34, 0, 3, 'CÔNG BÁO CHÍNH PHỦ', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=laws&op=Cong-van', 'icon1.png', '', '', 1, 1, 0, '', '6', 'laws', 'Cong-van', 1, 'col-sm-12 col-md-8', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (35, 0, 3, 'LỊCH LÀM VIỆC', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=page&op=thong-bao.html', 'icon2.png', '', '', 2, 2, 0, '', '6', 'page', 'thong-bao.html', 1, 'col-sm-12 col-md-8', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (36, 0, 3, 'VĂN BẢN - CHỈ ĐẠO ĐIỀU HÀNH', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=laws', 'icon3.png', '', '', 3, 3, 0, '', '6', 'laws', '', 1, 'col-sm-12 col-md-8', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (118, 39, 1, 'Mua sắm - mời thầu', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news&amp;op=mua-sam-moi-thau', '', '', '', 7, 12, 1, '', '6', 'news', 'mua-sam-moi-thau', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (117, 39, 1, 'Kế hoạch', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news&amp;op=ke-hoach', '', '', '', 6, 11, 1, '', '6', 'news', 'ke-hoach', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (116, 39, 1, 'Chiến lược - Quy hoạch', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news&amp;op=chien-luoc-quy-hoach', '', '', '', 5, 10, 1, '', '6', 'news', 'chien-luoc-quy-hoach', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (138, 44, 1, 'Các câu hỏi thường gặp', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=faq', '', '', '', 1, 24, 1, '', '6', 'faq', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (139, 44, 1, 'Gửi câu hỏi', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=contact&op=ban-bien-tap', '', '', '', 2, 25, 1, '', '6', 'contact', 'ban-bien-tap', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (127, 40, 1, 'Nghị định', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=laws&amp;op=Nghi-dinh', '', '', '', 4, 19, 1, '', '6', 'laws', 'Nghi-dinh', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (124, 40, 1, 'Công văn', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=laws&amp;op=Cong-van', '', '', '', 1, 16, 1, '', '6', 'laws', 'Cong-van', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (125, 40, 1, 'Văn bản', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=laws&amp;op=Van-ban', '', '', '', 2, 17, 1, '', '6', 'laws', 'Van-ban', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (126, 40, 1, 'Thông tư', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=laws&amp;op=Thong-tu', '', '', '', 3, 18, 1, '', '6', 'laws', 'Thong-tu', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (120, 39, 1, 'Thông tin Thống kê', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news&amp;op=thong-tin-thong-ke', '', '', '', 9, 14, 1, '', '6', 'news', 'thong-tin-thong-ke', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (119, 39, 1, 'Công trình - Đề tài', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news&amp;op=cong-trinh-de-tai', '', '', '', 8, 13, 1, '', '6', 'news', 'cong-trinh-de-tai', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (115, 39, 1, 'Thông tin kinh tế - xã hội', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news&amp;op=thong-tin-kinh-te-xa-hoi', '', '', '', 4, 9, 1, '', '6', 'news', 'thong-tin-kinh-te-xa-hoi', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (114, 39, 1, 'Thông tin tuyên truyền', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news&amp;op=thong-tin-tuyen-truyen', '', '', '', 3, 8, 1, '', '6', 'news', 'thong-tin-tuyen-truyen', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (113, 39, 1, 'Chỉ đạo điều hành', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news&amp;op=chi-dao-dieu-hanh', '', '', '', 2, 7, 1, '', '6', 'news', 'chi-dao-dieu-hanh', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (112, 39, 1, 'Tin hoạt động', '" . NV_BASE_SITEURL . "index.php?language=vi&nv=news&amp;op=tin-hoat-dong', '', '', '', 1, 6, 1, '', '6', 'news', 'tin-hoat-dong', 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (147, 144, 6, 'Thông tấn xã Việt Nam', 'http://www.vnagency.com.vn/', '', '', '', 4, 23, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (148, 144, 6, 'Đài tiếng nói Việt Nam', 'http://www.vovnews.vn/', '', '', '', 5, 24, 1, '', '6', '0', '', 2, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (153, 50, 6, 'Sở Giáo Dục và Đào Tạo', '#', '', '', '', 1, 2, 1, '', '6', '0', '', 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_menu_rows` (`id`, `parentid`, `mid`, `title`, `link`, `icon`, `image`, `note`, `weight`, `sort`, `lev`, `subitem`, `groups_view`, `module_name`, `op`, `target`, `css`, `active_type`, `status`) VALUES (151, 53, 6, 'Hội tin học Việt Nam', 'http://vaip.org.vn', '', '', '', 5, 18, 1, '', '6', '0', '', 2, '', 0, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_modfuncs`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_modfuncs` (
  `func_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `func_name` varchar(55) NOT NULL,
  `alias` varchar(55) NOT NULL DEFAULT '',
  `func_custom_name` varchar(255) NOT NULL,
  `func_site_title` varchar(255) NOT NULL DEFAULT '',
  `in_module` varchar(50) NOT NULL,
  `show_func` tinyint(4) NOT NULL DEFAULT 0,
  `in_submenu` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `subweight` smallint(2) unsigned NOT NULL DEFAULT 1,
  `setting` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`func_id`),
  UNIQUE KEY `func_name` (`func_name`,`in_module`),
  UNIQUE KEY `alias` (`alias`,`in_module`)
) ENGINE=MyISAM  AUTO_INCREMENT=150  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (4, 'main', 'main', 'Main', '', 'news', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (5, 'viewcat', 'viewcat', 'Viewcat', '', 'news', 1, 0, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (6, 'topic', 'topic', 'Topic', '', 'news', 1, 0, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (7, 'content', 'content', 'Content', '', 'news', 1, 1, 7, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (8, 'detail', 'detail', 'Detail', '', 'news', 1, 0, 5, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (9, 'tag', 'tag', 'Tag', '', 'news', 1, 0, 8, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (10, 'rss', 'rss', 'Rss', '', 'news', 1, 1, 9, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (11, 'search', 'search', 'Search', '', 'news', 1, 1, 6, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (12, 'groups', 'groups', 'Groups', '', 'news', 1, 0, 4, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (13, 'sitemap', 'sitemap', 'Sitemap', '', 'news', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (14, 'print', 'print', 'Print', '', 'news', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (15, 'rating', 'rating', 'Rating', '', 'news', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (16, 'savefile', 'savefile', 'Savefile', '', 'news', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (17, 'sendmail', 'sendmail', 'Sendmail', '', 'news', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (18, 'instant-rss', 'instant-rss', 'Instant Articles RSS', '', 'news', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (19, 'main', 'main', 'Main', '', 'users', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (20, 'login', 'login', 'Đăng nhập', '', 'users', 1, 1, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (21, 'register', 'register', 'Đăng ký', '', 'users', 1, 1, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (22, 'lostpass', 'lostpass', 'Khôi phục mật khẩu', '', 'users', 1, 1, 4, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (23, 'active', 'active', 'Kích hoạt tài khoản', '', 'users', 1, 0, 5, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (24, 'lostactivelink', 'lostactivelink', 'Lostactivelink', '', 'users', 1, 0, 6, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (25, 'editinfo', 'editinfo', 'Thiếp lập tài khoản', '', 'users', 1, 1, 7, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (26, 'memberlist', 'memberlist', 'Danh sách thành viên', '', 'users', 1, 1, 8, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (27, 'avatar', 'avatar', 'Avatar', '', 'users', 1, 0, 9, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (28, 'logout', 'logout', 'Thoát', '', 'users', 1, 1, 10, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (29, 'groups', 'groups', 'Quản lý nhóm', '', 'users', 1, 0, 11, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (30, 'oauth', 'oauth', 'Oauth', '', 'users', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (31, 'main', 'main', 'Main', '', 'statistics', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (32, 'allreferers', 'allreferers', 'Theo đường dẫn đến site', '', 'statistics', 1, 1, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (33, 'allcountries', 'allcountries', 'Theo quốc gia', '', 'statistics', 1, 1, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (34, 'allbrowsers', 'allbrowsers', 'Theo trình duyệt', '', 'statistics', 1, 1, 4, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (35, 'allos', 'allos', 'Theo hệ điều hành', '', 'statistics', 1, 1, 5, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (36, 'allbots', 'allbots', 'Theo máy chủ tìm kiếm', '', 'statistics', 1, 1, 6, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (37, 'referer', 'referer', 'Đường dẫn đến site theo tháng', '', 'statistics', 1, 0, 7, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (38, 'main', 'main', 'Main', '', 'banners', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (39, 'addads', 'addads', 'Addads', '', 'banners', 1, 0, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (40, 'clientinfo', 'clientinfo', 'Clientinfo', '', 'banners', 1, 0, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (41, 'stats', 'stats', 'Stats', '', 'banners', 1, 0, 4, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (42, 'cledit', 'cledit', 'Cledit', '', 'banners', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (43, 'click', 'click', 'Click', '', 'banners', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (44, 'clinfo', 'clinfo', 'Clinfo', '', 'banners', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (45, 'logininfo', 'logininfo', 'Logininfo', '', 'banners', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (46, 'viewmap', 'viewmap', 'Viewmap', '', 'banners', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (47, 'main', 'main', 'main', '', 'comment', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (48, 'post', 'post', 'post', '', 'comment', 1, 0, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (49, 'like', 'like', 'Like', '', 'comment', 1, 0, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (50, 'delete', 'delete', 'Delete', '', 'comment', 1, 0, 4, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (51, 'main', 'main', 'Main', '', 'page', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (52, 'sitemap', 'sitemap', 'Sitemap', '', 'page', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (53, 'rss', 'rss', 'Rss', '', 'page', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (54, 'main', 'main', 'Main', '', 'siteterms', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (55, 'rss', 'rss', 'Rss', '', 'siteterms', 1, 0, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (56, 'sitemap', 'sitemap', 'Sitemap', '', 'siteterms', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (57, 'main', 'main', 'Main', '', 'two-step-verification', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (58, 'confirm', 'confirm', 'Confirm', '', 'two-step-verification', 1, 0, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (59, 'setup', 'setup', 'Setup', '', 'two-step-verification', 1, 0, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (60, 'main', 'main', 'Main', '', 'contact', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (61, 'main', 'main', 'Main', '', 'voting', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (62, 'main', 'main', 'Main', '', 'seek', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (63, 'main', 'main', 'Main', '', 'feeds', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (69, 'area', 'area', 'Area', '', 'laws', 1, 1, 4, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (70, 'cat', 'cat', 'Cat', '', 'laws', 1, 1, 5, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (71, 'detail', 'detail', 'Detail', '', 'laws', 1, 1, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (72, 'main', 'main', 'Main', '', 'laws', 1, 1, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (73, 'rss', 'rss', 'Rss', '', 'laws', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (74, 'search', 'search', 'Search', '', 'laws', 1, 1, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (75, 'signer', 'signer', 'Signer', '', 'laws', 1, 1, 7, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (76, 'sitemap', 'sitemap', 'Sitemap', '', 'laws', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (77, 'subject', 'subject', 'Subject', '', 'laws', 1, 1, 6, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (148, 'sitemap', 'sitemap', 'Sitemap', '', 'faq', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (147, 'rss', 'rss', 'Rss', '', 'faq', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (146, 'main', 'main', 'Main', '', 'faq', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (120, 'main', 'main', 'Main', '', 'about', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (121, 'rss', 'rss', 'Rss', '', 'about', 1, 0, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (122, 'sitemap', 'sitemap', 'Sitemap', '', 'about', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (133, 'person', 'person', 'Person', '', 'co-cau-to-chuc', 1, 0, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (132, 'main', 'main', 'Main', '', 'co-cau-to-chuc', 1, 0, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (134, 'vieworg', 'vieworg', 'Vieworg', '', 'co-cau-to-chuc', 1, 0, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (135, 'viewper', 'viewper', 'Viewper', '', 'co-cau-to-chuc', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (136, 'viewsearch', 'viewsearch', 'Viewsearch', '', 'co-cau-to-chuc', 1, 0, 4, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (137, 'area', 'area', 'Area', '', 'opinions', 1, 1, 4, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (138, 'cat', 'cat', 'Cat', '', 'opinions', 1, 1, 5, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (139, 'detail', 'detail', 'Detail', '', 'opinions', 1, 1, 2, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (140, 'main', 'main', 'Main', '', 'opinions', 1, 1, 1, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (141, 'rss', 'rss', 'Rss', '', 'opinions', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (142, 'search', 'search', 'Search', '', 'opinions', 1, 1, 3, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (143, 'signer', 'signer', 'Signer', '', 'opinions', 1, 1, 7, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (144, 'sitemap', 'sitemap', 'Sitemap', '', 'opinions', 0, 0, 0, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (145, 'subject', 'subject', 'Subject', '', 'opinions', 1, 1, 6, '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modfuncs` (`func_id`, `func_name`, `alias`, `func_custom_name`, `func_site_title`, `in_module`, `show_func`, `in_submenu`, `subweight`, `setting`) VALUES (149, 'down', 'down', 'Down', '', 'comment', 0, 0, 5, '')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_modthemes`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_modthemes` (
  `func_id` mediumint(8) DEFAULT NULL,
  `layout` varchar(100) DEFAULT NULL,
  `theme` varchar(100) DEFAULT NULL,
  UNIQUE KEY `func_id` (`func_id`,`layout`,`theme`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (0, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (0, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (0, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (4, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (4, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (4, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (5, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (5, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (5, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (6, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (6, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (6, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (7, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (7, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (7, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (8, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (8, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (8, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (9, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (9, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (9, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (10, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (10, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (10, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (11, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (11, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (11, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (12, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (12, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (12, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (19, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (19, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (19, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (20, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (20, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (20, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (21, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (21, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (21, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (22, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (22, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (22, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (23, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (23, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (23, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (24, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (24, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (24, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (25, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (25, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (25, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (26, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (26, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (26, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (27, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (27, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (27, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (28, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (28, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (28, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (29, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (29, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (29, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (31, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (31, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (31, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (32, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (32, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (32, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (33, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (33, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (33, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (34, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (34, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (34, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (35, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (35, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (35, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (36, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (36, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (36, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (37, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (37, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (37, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (38, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (38, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (38, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (39, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (39, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (39, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (40, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (40, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (40, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (41, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (41, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (41, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (47, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (47, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (47, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (48, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (48, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (48, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (49, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (49, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (49, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (50, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (50, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (50, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (51, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (51, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (51, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (54, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (54, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (54, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (55, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (55, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (55, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (57, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (57, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (57, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (58, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (58, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (58, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (59, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (59, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (59, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (60, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (60, 'main', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (60, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (61, 'left-main', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (61, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (61, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (62, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (62, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (62, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (63, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (63, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (63, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (69, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (69, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (69, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (70, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (70, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (70, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (71, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (71, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (71, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (72, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (72, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (72, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (73, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (74, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (74, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (74, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (75, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (75, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (75, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (76, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (77, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (77, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (77, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (120, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (120, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (120, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (121, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (121, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (121, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (122, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (132, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (132, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (132, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (133, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (133, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (133, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (134, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (134, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (134, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (135, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (136, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (136, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (136, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (137, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (137, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (137, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (138, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (138, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (138, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (139, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (139, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (139, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (140, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (140, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (140, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (141, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (142, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (142, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (142, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (143, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (143, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (143, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (144, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (145, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (145, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (145, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (146, 'left-main-right', 'default')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (146, 'main', 'mobile_egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (146, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (147, 'main-right', 'egov')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modthemes` (`func_id`, `layout`, `theme`) VALUES (148, 'main-right', 'egov')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_modules`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_modules` (
  `title` varchar(50) NOT NULL,
  `module_file` varchar(50) NOT NULL DEFAULT '',
  `module_data` varchar(50) NOT NULL DEFAULT '',
  `module_upload` varchar(50) NOT NULL DEFAULT '',
  `module_theme` varchar(50) NOT NULL DEFAULT '',
  `custom_title` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL DEFAULT '',
  `admin_title` varchar(255) NOT NULL DEFAULT '',
  `set_time` int(11) unsigned NOT NULL DEFAULT 0,
  `main_file` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `admin_file` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `theme` varchar(100) DEFAULT '',
  `mobile` varchar(100) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `keywords` text DEFAULT NULL,
  `groups_view` varchar(255) NOT NULL,
  `weight` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `act` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `admins` varchar(255) DEFAULT '',
  `rss` tinyint(4) NOT NULL DEFAULT 1,
  `sitemap` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('news', 'news', 'news', 'news', 'news', 'Tin Tức', '', '', 1546504163, 1, 1, '', '', '', '', '6', 2, 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('users', 'users', 'users', 'users', 'users', 'Thành viên', '', 'Tài khoản', 1546504163, 1, 1, '', '', '', '', '6', 7, 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('contact', 'contact', 'contact', 'contact', 'contact', 'Liên hệ', '', '', 1546504163, 1, 1, '', '', '', '', '6', 8, 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('statistics', 'statistics', 'statistics', 'statistics', 'statistics', 'Thống kê', '', '', 1546504163, 1, 1, '', '', '', 'online, statistics', '6', 9, 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('voting', 'voting', 'voting', 'voting', 'voting', 'Thăm dò ý kiến', '', '', 1546504163, 1, 1, '', '', '', '', '6', 10, 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('banners', 'banners', 'banners', 'banners', 'banners', 'Quảng cáo', '', '', 1546504163, 1, 1, '', '', '', '', '6', 11, 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('seek', 'seek', 'seek', 'seek', 'seek', 'Tìm kiếm', '', '', 1546504163, 1, 0, '', '', '', '', '6', 12, 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('menu', 'menu', 'menu', 'menu', 'menu', 'Menu Site', '', '', 1546504163, 0, 1, '', '', '', '', '6', 13, 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('feeds', 'feeds', 'feeds', 'feeds', 'feeds', 'RSS-feeds', '', 'RSS-feeds', 1546504163, 1, 1, '', '', '', '', '6', 14, 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('page', 'page', 'page', 'page', 'page', 'Page', '', '', 1546504163, 1, 1, '', '', '', '', '6', 15, 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('comment', 'comment', 'comment', 'comment', 'comment', 'Bình luận', '', 'Quản lý bình luận', 1546504163, 0, 1, '', '', '', '', '6', 16, 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('siteterms', 'page', 'siteterms', 'siteterms', 'page', 'Điều khoản sử dụng', '', '', 1546504163, 1, 1, '', '', '', '', '6', 17, 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('two-step-verification', 'two-step-verification', 'two_step_verification', 'two_step_verification', 'two-step-verification', 'Xác thực hai bước', '', '', 1546504163, 1, 0, '', '', '', '', '6', 18, 1, '', 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('laws', 'laws', 'laws', 'laws', 'laws', 'Văn bản', '', '', 1498555574, 1, 1, '', '', '', '', '6', 4, 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('faq', 'faq', 'faq', 'faq', 'faq', 'Các câu hỏi thường gặp', '', 'Các câu hỏi thường gặp', 1506573330, 1, 1, '', '', '', '', '6', 6, 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('about', 'page', 'about', 'about', 'page', 'Giới thiệu', '', '', 1500862891, 1, 1, '', '', '', '', '6', 1, 1, '', 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('co-cau-to-chuc', 'organs', 'co_cau_to_chuc', 'co-cau-to-chuc', 'organs', 'Cơ cấu tổ chức', '', '', 1506565073, 1, 1, '', '', '', '', '6', 3, 1, '', 0, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_modules` (`title`, `module_file`, `module_data`, `module_upload`, `module_theme`, `custom_title`, `site_title`, `admin_title`, `set_time`, `main_file`, `admin_file`, `theme`, `mobile`, `description`, `keywords`, `groups_view`, `weight`, `act`, `admins`, `rss`, `sitemap`) VALUES ('opinions', 'laws', 'opinions', 'opinions', 'laws', 'Lấy ý kiến người dân', '', 'Lấy ý kiến người dân', 1506570476, 1, 1, '', '', '', '', '6', 5, 1, '', 1, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_1`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_1` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_1` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (1, 1, '1', 0, 1, 'Lưu Thủy', 1, 1502357163, 1502357163, 1, 8, 1494840180, 0, 2, 'Nghiên cứu, phát triển sản phẩm CNTT phục vụ Chính phủ điện tử', 'nghien-cuu-phat-trien-san-pham-cntt-phuc-vu-chinh-phu-dien-tu', 'Bộ Khoa học và Công nghệ đã ban hành Quyết định số 1090/QĐ-BKHCN và 1100/QĐ-BKHCN phê duyệt Danh mục nhiệm vụ khoa học và công nghệ đặt hàng thuộc Chương trình khoa học và công nghệ trọng điểm cấp quốc gia giai đoạn 2016 - 2020: &quot;Nghiên cứu công nghệ và phát triển sản phẩm công nghệ thông tin phục vụ Chính phủ điện tử&quot;', '2017_08/hinh-minh-hoa.jpg', 'Hình minh họa', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_10`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_10` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) unsigned NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=18  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_10` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (17, 1, '1,10', 0, 1, '', 0, 1445391217, 1445393997, 1, 10, 1445391180, 0, 2, 'Hỗ trợ tập huấn và triển khai NukeViet cho các Phòng, Sở GD&amp;ĐT', 'ho-tro-tap-huan-va-trien-khai-nukeviet-cho-cac-phong-so-gd-dt', 'Trên cơ sở Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016 của Bộ Giáo dục và Đào tạo, Công ty cổ phần phát triển nguồn mở Việt Nam và các doanh nghiệp phát triển NukeViet trong cộng đồng NukeViet đang tích cực công tác hỗ trợ cho các phòng GD&ĐT, Sở GD&ĐT triển khai 2 nội dung chính: Hỗ trợ công tác đào tạo tập huấn hướng dẫn sử dụng NukeViet và Hỗ trợ triển khai NukeViet cho các trường, Phòng và Sở GD&ĐT', 'tap-huan-pgd-ha-dong-2015.jpg', 'Tập huấn triển khai NukeViet tại Phòng Giáo dục và Đào tạo Hà Đông - Hà Nội', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_11`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_11` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) unsigned NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=16  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_11` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (12, 11, '11', 0, 1, 'Vũ Bích Ngọc', 0, 1445391061, 1445394203, 1, 4, 1445391000, 0, 2, 'Công ty VINADES tuyển dụng nhân viên kinh doanh', 'cong-ty-vinades-tuyen-dung-nhan-vien-kinh-doanh', 'Công ty cổ phần phát triển nguồn mở Việt Nam là đơn vị chủ quản của phần mềm mã nguồn mở NukeViet - một mã nguồn được tin dùng trong cơ quan nhà nước, đặc biệt là ngành giáo dục. Chúng tôi cần tuyển 05 nhân viên kinh doanh cho lĩnh vực này.', 'tuyen-dung-nvkd.png', '', 1, 1, '4', 1, 0, 0, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_11` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (8, 11, '11', 0, 1, 'Phạm Quốc Tiến', 0, 1445391089, 1445394192, 1, 5, 1445391060, 0, 2, 'Tuyển dụng chuyên viên đồ hoạ phát triển NukeViet', 'Tuyen-dung-chuyen-vien-do-hoa', 'Bạn đam mê nguồn mở? Bạn là chuyên gia đồ họa? Chúng tôi sẽ giúp bạn hiện thực hóa ước mơ của mình với một mức lương đảm bảo. Hãy gia nhập VINADES.,JSC để xây dựng mã nguồn mở hàng đầu cho Việt Nam.', 'tuyendung-kythuat.jpg', 'Tuyển dụng', 1, 1, '6', 1, 0, 0, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_11` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (9, 11, '11', 0, 1, 'Phạm Quốc Tiến', 0, 1445391090, 1445394193, 1, 6, 1445391060, 0, 2, 'Tuyển dụng lập trình viên front-end (HTML/CSS/JS) phát triển NukeViet', 'Tuyen-dung-lap-trinh-vien-front-end-HTML-CSS-JS', 'Bạn đam mê nguồn mở? Bạn đang cần tìm một công việc phù hợp với thế mạnh của bạn về front-end (HTML/CSS/JS)?. Hãy gia nhập VINADES.,JSC để xây dựng mã nguồn mở hàng đầu cho Việt Nam.', 'tuyendung-kythuat.jpg', 'Tuyển dụng', 1, 1, '6', 1, 0, 0, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_11` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (14, 1, '1,11', 0, 1, 'Trần Thị Thu', 0, 1445391118, 1445394180, 1, 7, 1445391060, 0, 2, 'Chương trình thực tập sinh tại công ty VINADES', 'chuong-trinh-thuc-tap-sinh-tai-cong-ty-vinades', 'Cơ hội để những sinh viên năng động được học tập, trải nghiệm, thử thách sớm với những tình huống thực tế, được làm việc cùng các chuyên gia có nhiều kinh nghiệm của công ty VINADES.', 'thuc-tap-sinh.jpg', '', 1, 1, '4', 1, 0, 0, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_11` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (15, 11, '11', 0, 1, 'Trần Thị Thu', 0, 1445391135, 1445394444, 1, 8, 1445391120, 0, 2, 'Học việc tại công ty VINADES', 'hoc-viec-tai-cong-ty-vinades', 'Công ty cổ phần phát triển nguồn mở Việt Nam tạo cơ hội việc làm và học việc miễn phí cho những ứng viên có đam mê thiết kế web, lập trình PHP… được học tập và rèn luyện cùng đội ngũ lập trình viên phát triển NukeViet.', 'hoc-viec-tai-cong-ty-vinades.jpg', '', 1, 1, '4', 1, 0, 0, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_11` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (7, 11, '11', 0, 1, 'Phạm Quốc Tiến', 2, 1453192400, 1453192400, 1, 11, 1453192400, 0, 2, 'Tuyển dụng lập trình viên PHP phát triển NukeViet', 'Tuyen-dung-lap-trinh-vien-PHP', 'Bạn đam mê nguồn mở? Bạn đang cần tìm một công việc phù hợp với thế mạnh của bạn về PHP và MySQL?. Hãy gia nhập VINADES.,JSC để xây dựng mã nguồn mở hàng đầu cho Việt Nam.', 'tuyendung-kythuat.jpg', 'Tuyển dụng', 1, 1, '6', 1, 0, 0, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_12`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_12` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) unsigned NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=7  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_12` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (1, 1, '1,8,12', 0, 1, 'Quỳnh Nhi', 1, 1274989177, 1275318126, 1, 1, 1274989140, 0, 2, 'Ra mắt công ty mã nguồn mở đầu tiên tại Việt Nam', 'Ra-mat-cong-ty-ma-nguon-mo-dau-tien-tai-Viet-Nam', 'Mã nguồn mở NukeViet vốn đã quá quen thuộc với cộng đồng CNTT Việt Nam trong mấy năm qua. Tuy chưa hoạt động chính thức, nhưng chỉ trong khoảng 5 năm gần đây, mã nguồn mở NukeViet đã được dùng phổ biến ở Việt Nam, áp dụng ở hầu hết các lĩnh vực, từ tin tức đến thương mại điện tử, từ các website cá nhân cho tới những hệ thống website doanh nghiệp.', 'nangly.jpg', 'Thành lập VINADES.,JSC', 1, 1, '6', 1, 0, 2, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_12` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (6, 12, '1,12', 0, 1, 'Nguyễn Thế Hùng', 7, 1453192444, 1453192444, 1, 12, 1453192444, 0, 2, 'Hãy trở thành nhà cung cấp dịch vụ của NukeViet&#33;', 'hay-tro-thanh-nha-cung-cap-dich-vu-cua-nukeviet', 'Nếu bạn là công ty hosting, là công ty thiết kế web có sử dụng mã nguồn NukeViet, là cơ sở đào tạo NukeViet hay là công ty bất kỳ có kinh doanh dịch vụ liên quan đến NukeViet... hãy cho chúng tôi biết thông tin liên hệ của bạn để NukeViet hỗ trợ bạn trong công việc kinh doanh nhé!', 'hoptac.jpg', '', 1, 1, '6', 1, 0, 13, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_2`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_2` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=5  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_2` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (2, 2, '2', 0, 1, 'Lê Sơn', 1, 1502357608, 1502444887, 1, 9, 1496136540, 0, 2, 'Quyết tâm cao để đẩy mạnh CCHC thực chất, hiệu quả hơn', 'quyet-tam-cao-de-day-manh-cchc-thuc-chat-hieu-qua-hon', 'Đây là chỉ đạo của Ủy viên Bộ Chính trị, Phó Thủ tướng Thường trực Trương Hòa Bình, Trưởng Ban Chỉ đạo Cải cách hành chính (CCHC) của Chính phủ tại Hội nghị trực tuyến toàn quốc sơ kết công tác 6 tháng đầu năm 2017 của Ban Chỉ đạo, tại Trụ sở Chính phủ, chiều 30/5.', '2017_08/ptt1.jpg', 'Phó Thủ tướng Thường trực Trương Hòa Bình phát biểu chỉ đạo tại hội nghị. Ảnh&#x3A; VGP&#x002F;Lê Sơn', 1, 1, '4', 1, 0, 8, 0, 5, 1, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_2` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (4, 2, '2', 0, 1, 'Phương Nhi', 1, 1502358021, 1502444881, 1, 7, 1494495540, 0, 2, '11 lĩnh vực quan trọng cần ưu tiên bảo đảm an toàn thông tin mạng', '11-linh-vuc-quan-trong-can-uu-tien-bao-dam-an-toan-thong-tin-mang', 'Theo Quyết định số 632/QĐ-TTg của Thủ tướng Chính phủ, có 11 lĩnh vực quan trọng cần ưu tiên bảo đảm an toàn thông tin mạng.', '2017_08/image002.jpg', '', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_2` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (3, 2, '2,3', 0, 1, '', 2, 1502357918, 1502811208, 1, 1, 1419327360, 0, 2, 'NukeViet được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước', 'nukeviet-duoc-uu-tien-mua-sam-su-dung-trong-co-quan-to-chuc-nha-nuoc', 'Ngày 5/12/2014, Bộ trưởng Bộ TT&TT Nguyễn Bắc Son đã ký ban hành Thông tư 20/2014/TT-BTTTT (Thông tư 20) quy định về các sản phẩm phần mềm nguồn mở (PMNM) được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước. NukeViet (phiên bản 3.4.02 trở lên) là phần mềm được nằm trong danh sách này.', '2017_08/chuc-mung-nukeviet-thong-tu-20-bo-tttt.jpg', '', 1, 1, '4', 1, 0, 11, 0, 10, 2, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_3`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_3` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=13  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_3` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (5, 3, '3', 0, 1, 'Nguyễn Thế Hùng', 3, 1502358170, 1504152071, 1, 4, 1490780460, 0, 2, '“Điểm mặt” 9 nhầm lẫn thường gặp về phần mềm nguồn mở', 'diem-mat-9-nham-lan-thuong-gap-ve-phan-mem-nguon-mo', 'Mặc dù sử dụng phần mềm nguồn mở đã trở thành một xu hướng tất yếu song đến nay vẫn còn không ít người vẫn nhầm lẫn về phần mềm nguồn mở, đặc biệt là khi so sánh phần mềm nguồn mở với phần mềm nguồn đóng.', '2017_08/phan_mem_nguon_mo.jpg', 'Tại Việt Nam, cộng đồng phần mềm nguồn mở Việt Nam đã bước đầu được hình thành và ngày càng lớn mạnh &#40;Ảnh minh họa. Nguồn&#x3A; Internet&#41;', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_3` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (6, 3, '3', 0, 1, 'Đinh Thị Thanh Vân', 4, 1502358287, 1502358287, 1, 3, 1486028580, 0, 2, 'Bộ Thông tin và Truyền thông ban hành Phương pháp đánh giá mức độ ứng dụng công nghệ thông tin của cơ quan nhà nước năm 2016', 'bo-thong-tin-va-truyen-thong-ban-hanh-phuong-phap-danh-gia-muc-do-ung-dung-cong-nghe-thong-tin-cua-co-quan-nha-nuoc-nam-2016', 'Ngày 19/01/2017, Bộ Thông tin và Truyền thông đã ban hành Quyết định số 62/QĐ-BTTTT về việc Phê duyệt Phương pháp đánh giá mức độ ứng dụng công nghệ thông tin của cơ quan nhà nước năm 2016.', '', '', 0, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_3` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (9, 6, '3,4,6', 0, 1, 'Hà Chính', 1, 1502358576, 1502802497, 1, 10, 1497606480, 0, 2, 'Hậu TPP&#x3A; Việt Nam có tới 6 kế hoạch phòng xa', 'hau-tpp-viet-nam-co-toi-6-ke-hoach-phong-xa', 'Theo các nhà quan sát nước ngoài, “Việt Nam đã khôn khoan không bỏ hết trứng vào giỏ TPP” và Việt Nam không chỉ có “kế hoạch B” mà còn có cả kế hoạch C, D, E, F và G sau khi Hoa Kỳ rút khỏi Hiệp định này.', '', '', 0, 1, '4', 1, 0, 8, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_3` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (3, 2, '2,3', 0, 1, '', 2, 1502357918, 1502811208, 1, 1, 1419327360, 0, 2, 'NukeViet được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước', 'nukeviet-duoc-uu-tien-mua-sam-su-dung-trong-co-quan-to-chuc-nha-nuoc', 'Ngày 5/12/2014, Bộ trưởng Bộ TT&TT Nguyễn Bắc Son đã ký ban hành Thông tư 20/2014/TT-BTTTT (Thông tư 20) quy định về các sản phẩm phần mềm nguồn mở (PMNM) được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước. NukeViet (phiên bản 3.4.02 trở lên) là phần mềm được nằm trong danh sách này.', '2017_08/chuc-mung-nukeviet-thong-tu-20-bo-tttt.jpg', '', 1, 1, '4', 1, 0, 11, 0, 10, 2, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_3` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (12, 3, '3', 0, 1, '', 3, 1510831228, 1510831964, 1, 12, 1510830840, 0, 2, 'NukeViet bất ngờ tung ra phiên bản phần mềm Cổng thông tin cho cơ quan nhà nước', 'nukeviet-bat-ngo-tung-ra-phien-ban-phan-mem-cong-thong-tin-cho-co-quan-nha-nuoc', 'Mới ra mắt phiên bản NukeViet CMS 4.3 chưa lâu, phần mềm nguồn mở “made in Vietnam” NukeViet vừa bất ngờ tung ra phiên bản phần mềm Cổng thông tin dành riêng cho cơ quan nhà nước có tên gọi là NukeViet eGovernment.', 'nukeviet-egovernment.jpg', 'Ảnh chụp giao diện NukeViet Egovernment 1.0', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_4`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_4` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=10  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_4` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (7, 4, '4', 0, 1, 'Thành Đạt', 1, 1502358418, 1502444898, 1, 5, 1491644700, 0, 2, 'Cách mạng 4.0 và bàn tay Chính phủ', 'cach-mang-4-0-va-ban-tay-chinh-phu', '“Để bắt kịp cách mạng công nghiệp lần thứ 4 cần phải có bàn tay mạnh mẽ từ Chính phủ”, quan điểm được nhiều chuyên gia đưa ra tại diễn đàn &quot;Cuộc cách mạng công nghiệp 4.0 - Được và mất&quot; vừa được tổ chức chiều 7/4.', '2017_08/cach-mang-4.0.jpg', 'Diễn đàn &quot;Cuộc cách mạng công nghiệp 4.0 - Được và mất&quot;', 1, 1, '4', 1, 0, 0, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_4` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (9, 6, '3,4,6', 0, 1, 'Hà Chính', 1, 1502358576, 1502802497, 1, 10, 1497606480, 0, 2, 'Hậu TPP&#x3A; Việt Nam có tới 6 kế hoạch phòng xa', 'hau-tpp-viet-nam-co-toi-6-ke-hoach-phong-xa', 'Theo các nhà quan sát nước ngoài, “Việt Nam đã khôn khoan không bỏ hết trứng vào giỏ TPP” và Việt Nam không chỉ có “kế hoạch B” mà còn có cả kế hoạch C, D, E, F và G sau khi Hoa Kỳ rút khỏi Hiệp định này.', '', '', 0, 1, '4', 1, 0, 8, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_5`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_5` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=9  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_5` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (8, 5, '5', 0, 1, 'Minh Hiển', 1, 1502358510, 1502444892, 1, 6, 1493977620, 0, 2, 'Thủ tướng chỉ thị tăng cường năng lực tiếp cận cuộc Cách mạng CN lần thứ 4', 'thu-tuong-chi-thi-tang-cuong-nang-luc-tiep-can-cuoc-cach-mang-cn-lan-thu-4', 'Thủ tướng Chính phủ Nguyễn Xuân Phúc vừa ký Chỉ thị 16/CT-TTg về việc tăng cường năng lực tiếp cận cuộc Cách mạng công nghiệp lần thứ 4', '2017_08/cntt.jpg', 'Ảnh minh họa', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_6`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_6` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=10  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_6` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (9, 6, '3,4,6', 0, 1, 'Hà Chính', 1, 1502358576, 1502802497, 1, 10, 1497606480, 0, 2, 'Hậu TPP&#x3A; Việt Nam có tới 6 kế hoạch phòng xa', 'hau-tpp-viet-nam-co-toi-6-ke-hoach-phong-xa', 'Theo các nhà quan sát nước ngoài, “Việt Nam đã khôn khoan không bỏ hết trứng vào giỏ TPP” và Việt Nam không chỉ có “kế hoạch B” mà còn có cả kế hoạch C, D, E, F và G sau khi Hoa Kỳ rút khỏi Hiệp định này.', '', '', 0, 1, '4', 1, 0, 8, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_7`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_7` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=11  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_7` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (10, 7, '7', 0, 1, 'Chinhphu.vn', 1, 1502358714, 1510804474, 1, 11, 1499680260, 0, 2, 'Thời gian đánh giá hồ sơ dự thầu theo nghị định hay thông tư?', 'thoi-gian-danh-gia-ho-so-du-thau-theo-nghi-dinh-hay-thong-tu', 'Trường hợp gói thầu có quy mô nhỏ thì thời gian đánh giá hồ sơ dự thầu tối đa là 25 ngày, kể từ ngày mở thầu đến khi bên mời thầu có tờ trình đề nghị phê duyệt kết quả lựa chọn nhà thầu.', '', '', 0, 1, '4', 1, 0, 5, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_8`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_8` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=12  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_8` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (11, 8, '8', 0, 1, 'MK', 1, 1502358784, 1502358784, 1, 2, 1481449920, 0, 2, 'Tuyên dương 34 công trình sáng tạo trẻ', 'tuyen-duong-34-cong-trinh-sang-tao-tre', 'Tối 10/12, tại thành phố Vĩnh Yên, tỉnh Vĩnh Phúc, Trung ương Đoàn Thanh niên Cộng sản Hồ Chí Minh tổ chức tuyên dương và trao giải cho 34 công trình, đề tài, giải pháp sáng tạo trẻ năm 2016.', '2017_08/sang-tao-tre.jpg', 'Ảnh Dân trí', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_9`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_9` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_admins`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_admins` (
  `userid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `catid` smallint(5) NOT NULL DEFAULT 0,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `add_content` tinyint(4) NOT NULL DEFAULT 0,
  `pub_content` tinyint(4) NOT NULL DEFAULT 0,
  `edit_content` tinyint(4) NOT NULL DEFAULT 0,
  `del_content` tinyint(4) NOT NULL DEFAULT 0,
  `app_content` tinyint(4) NOT NULL DEFAULT 0,
  UNIQUE KEY `userid` (`userid`,`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_block`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_block` (
  `bid` smallint(5) unsigned NOT NULL,
  `id` int(11) unsigned NOT NULL,
  `weight` int(11) unsigned NOT NULL,
  UNIQUE KEY `bid` (`bid`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_block` (`bid`, `id`, `weight`) VALUES (1, 4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_block` (`bid`, `id`, `weight`) VALUES (1, 2, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_block` (`bid`, `id`, `weight`) VALUES (2, 8, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_block` (`bid`, `id`, `weight`) VALUES (2, 7, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_block_cat`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_block_cat` (
  `bid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `adddefault` tinyint(4) NOT NULL DEFAULT 0,
  `numbers` smallint(5) NOT NULL DEFAULT 10,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `weight` smallint(5) NOT NULL DEFAULT 0,
  `keywords` text DEFAULT NULL,
  `add_time` int(11) NOT NULL DEFAULT 0,
  `edit_time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`bid`),
  UNIQUE KEY `title` (`title`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_block_cat` (`bid`, `adddefault`, `numbers`, `title`, `alias`, `image`, `description`, `weight`, `keywords`, `add_time`, `edit_time`) VALUES (1, 0, 4, 'Lãnh đạo, Chỉ đạo', 'lanh-dao-chi-dao', '', '', 1, '', 1502444849, 1502444849)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_block_cat` (`bid`, `adddefault`, `numbers`, `title`, `alias`, `image`, `description`, `weight`, `keywords`, `add_time`, `edit_time`) VALUES (2, 0, 4, 'Thủ tướng chính phủ', 'thu-tuong-chinh-phu', '', '', 2, '', 1502444862, 1502444862)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_cat`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_cat` (
  `catid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL,
  `titlesite` varchar(250) DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `descriptionhtml` text DEFAULT NULL,
  `image` varchar(255) DEFAULT '',
  `viewdescription` tinyint(2) NOT NULL DEFAULT 0,
  `weight` smallint(5) unsigned NOT NULL DEFAULT 0,
  `sort` smallint(5) NOT NULL DEFAULT 0,
  `lev` smallint(5) NOT NULL DEFAULT 0,
  `viewcat` varchar(50) NOT NULL DEFAULT 'viewcat_page_new',
  `numsubcat` smallint(5) NOT NULL DEFAULT 0,
  `subcatid` varchar(255) DEFAULT '',
  `numlinks` tinyint(2) unsigned NOT NULL DEFAULT 3,
  `newday` tinyint(2) unsigned NOT NULL DEFAULT 2,
  `featured` int(11) NOT NULL DEFAULT 0,
  `ad_block_cat` varchar(255) NOT NULL DEFAULT '',
  `keywords` text DEFAULT NULL,
  `admins` text DEFAULT NULL,
  `add_time` int(11) unsigned NOT NULL DEFAULT 0,
  `edit_time` int(11) unsigned NOT NULL DEFAULT 0,
  `groups_view` varchar(255) DEFAULT '',
  `status` smallint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`catid`),
  UNIQUE KEY `alias` (`alias`),
  KEY `parentid` (`parentid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  AUTO_INCREMENT=10  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_cat` (`catid`, `parentid`, `title`, `titlesite`, `alias`, `description`, `descriptionhtml`, `image`, `viewdescription`, `weight`, `sort`, `lev`, `viewcat`, `numsubcat`, `subcatid`, `numlinks`, `newday`, `featured`, `ad_block_cat`, `keywords`, `admins`, `add_time`, `edit_time`, `groups_view`, `status`) VALUES (1, 0, 'Tin hoạt động', '', 'tin-hoat-dong', '', '', '', 0, 1, 1, 0, 'viewcat_page_new', 0, '', 1, 2, 0, '', '', '', 1502356995, 1502356995, '6', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_cat` (`catid`, `parentid`, `title`, `titlesite`, `alias`, `description`, `descriptionhtml`, `image`, `viewdescription`, `weight`, `sort`, `lev`, `viewcat`, `numsubcat`, `subcatid`, `numlinks`, `newday`, `featured`, `ad_block_cat`, `keywords`, `admins`, `add_time`, `edit_time`, `groups_view`, `status`) VALUES (2, 0, 'Chỉ đạo điều hành', '', 'chi-dao-dieu-hanh', '', '', '', 0, 2, 2, 0, 'viewcat_page_new', 0, '', 1, 2, 0, '', '', '', 1502357340, 1502357340, '6', 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_cat` (`catid`, `parentid`, `title`, `titlesite`, `alias`, `description`, `descriptionhtml`, `image`, `viewdescription`, `weight`, `sort`, `lev`, `viewcat`, `numsubcat`, `subcatid`, `numlinks`, `newday`, `featured`, `ad_block_cat`, `keywords`, `admins`, `add_time`, `edit_time`, `groups_view`, `status`) VALUES (3, 0, 'Thông tin tuyên truyền', '', 'thong-tin-tuyen-truyen', '', '', '', 0, 3, 3, 0, 'viewcat_page_new', 0, '', 1, 2, 0, '', '', '', 1502358086, 1502358086, '6', 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_cat` (`catid`, `parentid`, `title`, `titlesite`, `alias`, `description`, `descriptionhtml`, `image`, `viewdescription`, `weight`, `sort`, `lev`, `viewcat`, `numsubcat`, `subcatid`, `numlinks`, `newday`, `featured`, `ad_block_cat`, `keywords`, `admins`, `add_time`, `edit_time`, `groups_view`, `status`) VALUES (4, 0, 'Thông tin kinh tế - xã hội', '', 'thong-tin-kinh-te-xa-hoi', '', '', '', 0, 4, 4, 0, 'viewcat_page_new', 0, '', 1, 2, 0, '', '', '', 1502358337, 1502358337, '6', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_cat` (`catid`, `parentid`, `title`, `titlesite`, `alias`, `description`, `descriptionhtml`, `image`, `viewdescription`, `weight`, `sort`, `lev`, `viewcat`, `numsubcat`, `subcatid`, `numlinks`, `newday`, `featured`, `ad_block_cat`, `keywords`, `admins`, `add_time`, `edit_time`, `groups_view`, `status`) VALUES (5, 0, 'Chiến lược - Quy hoạch', '', 'chien-luoc-quy-hoach', '', '', '', 0, 5, 5, 0, 'viewcat_page_new', 0, '', 1, 2, 0, '', '', '', 1502358445, 1502358445, '6', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_cat` (`catid`, `parentid`, `title`, `titlesite`, `alias`, `description`, `descriptionhtml`, `image`, `viewdescription`, `weight`, `sort`, `lev`, `viewcat`, `numsubcat`, `subcatid`, `numlinks`, `newday`, `featured`, `ad_block_cat`, `keywords`, `admins`, `add_time`, `edit_time`, `groups_view`, `status`) VALUES (6, 0, 'Kế hoạch', '', 'ke-hoach', '', '', '', 0, 6, 6, 0, 'viewcat_page_new', 0, '', 1, 2, 0, '', '', '', 1502358532, 1502358532, '6', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_cat` (`catid`, `parentid`, `title`, `titlesite`, `alias`, `description`, `descriptionhtml`, `image`, `viewdescription`, `weight`, `sort`, `lev`, `viewcat`, `numsubcat`, `subcatid`, `numlinks`, `newday`, `featured`, `ad_block_cat`, `keywords`, `admins`, `add_time`, `edit_time`, `groups_view`, `status`) VALUES (7, 0, 'Mua sắm - mời thầu', '', 'mua-sam-moi-thau', '', '', '', 0, 7, 7, 0, 'viewcat_page_new', 0, '', 1, 2, 0, '', '', '', 1502358668, 1502358668, '6', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_cat` (`catid`, `parentid`, `title`, `titlesite`, `alias`, `description`, `descriptionhtml`, `image`, `viewdescription`, `weight`, `sort`, `lev`, `viewcat`, `numsubcat`, `subcatid`, `numlinks`, `newday`, `featured`, `ad_block_cat`, `keywords`, `admins`, `add_time`, `edit_time`, `groups_view`, `status`) VALUES (8, 0, 'Công trình - Đề tài', '', 'cong-trinh-de-tai', '', '', '', 0, 8, 8, 0, 'viewcat_page_new', 0, '', 1, 2, 0, '', '', '', 1502358729, 1502358729, '6', 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_cat` (`catid`, `parentid`, `title`, `titlesite`, `alias`, `description`, `descriptionhtml`, `image`, `viewdescription`, `weight`, `sort`, `lev`, `viewcat`, `numsubcat`, `subcatid`, `numlinks`, `newday`, `featured`, `ad_block_cat`, `keywords`, `admins`, `add_time`, `edit_time`, `groups_view`, `status`) VALUES (9, 0, 'Thông tin Thống kê', '', 'thong-tin-thong-ke', '', '', '', 0, 9, 9, 0, 'viewcat_page_new', 0, '', 1, 2, 0, '', '', '', 1502358797, 1502358797, '6', 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_config_post`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_config_post` (
  `group_id` smallint(5) NOT NULL,
  `addcontent` tinyint(4) NOT NULL,
  `postcontent` tinyint(4) NOT NULL,
  `editcontent` tinyint(4) NOT NULL,
  `delcontent` tinyint(4) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_config_post` (`group_id`, `addcontent`, `postcontent`, `editcontent`, `delcontent`) VALUES (4, 0, 0, 0, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_config_post` (`group_id`, `addcontent`, `postcontent`, `editcontent`, `delcontent`) VALUES (7, 0, 0, 0, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_config_post` (`group_id`, `addcontent`, `postcontent`, `editcontent`, `delcontent`) VALUES (5, 0, 0, 0, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_config_post` (`group_id`, `addcontent`, `postcontent`, `editcontent`, `delcontent`) VALUES (10, 0, 0, 0, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_config_post` (`group_id`, `addcontent`, `postcontent`, `editcontent`, `delcontent`) VALUES (11, 0, 0, 0, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_config_post` (`group_id`, `addcontent`, `postcontent`, `editcontent`, `delcontent`) VALUES (12, 0, 0, 0, 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_detail`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_detail` (
  `id` int(11) unsigned NOT NULL,
  `titlesite` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `bodyhtml` longtext NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `sourcetext` varchar(255) DEFAULT '',
  `files` text DEFAULT NULL,
  `imgposition` tinyint(1) NOT NULL DEFAULT 1,
  `layout_func` varchar(100) DEFAULT '',
  `copyright` tinyint(1) NOT NULL DEFAULT 0,
  `allowed_send` tinyint(1) NOT NULL DEFAULT 0,
  `allowed_print` tinyint(1) NOT NULL DEFAULT 0,
  `allowed_save` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (1, '', '', '<p>Cụ thể, nhiệm vụ 1: Nghiên cứu, phát triển một số dịch vụ hỗ trợ và quản lý du khách nhằm phát triển du lịch bền vững theo định hướng thành phố thông minh và Chính phủ điện tử. Định hướng mục tiêu là nghiên cứu, đề xuất kiến trúc tổng thể hệ thống dịch vụ hỗ trợ và quản lý du khách với định hướng thành phố thông minh và chính phủ điện tử; xây dựng, triển khai thử nghiệm hệ thống thông tin cung cấp một số dịch vụ hỗ trợ du khách nhằm phát triển du lịch bền vững.</p><p>Nhiệm vụ 2: Nghiên cứu, thiết kế, chế tạo hệ thống KIOSK chuyên dụng cho chính phủ điện tử. Định hướng mục tiêu là làm chủ công nghệ thiết kế, chế tạo hệ thống KIOSK chuyên dụng hỗ trợ cung cấp dịch vụ hành chính công. Đồng thời, thiết kế, chế tạo mẫu KIOSK để triển khai một số dịch vụ hành chính công.</p><p>Nhiệm vụ 3: Nghiên cứu, xây dựng hệ thống công nghệ thông tin thử nghiệm thu thập dữ liệu và phân tích một số chỉ số hiệu năng thực hiện (KPI) của đô thị thông minh phù hợp với điều kiện của Việt Nam nhằm phục vụ cho hoạt động của cơ quan quản lý nhà nước. Định hướng mục tiêu là xây dựng thí điểm hệ thống công nghệ thông tin giúp cho cơ quan quản lý nhà nước trong một số lĩnh vực nắm bắt được dữ liệu về một số chỉ số hiệu năng thực hiện của đô thị để làm cơ sở xây dựng bộ tiêu chí công nghệ thông tin đánh giá đô thị thông minh tại Việt Nam; đề xuất được bộ chỉ số đánh giá KPI sự phát triển của đô thị thông minh phù hợp với Việt Nam giai đoạn 2018 - 2023.</p><p>Nhiệm vụ 4: Nghiên cứu, phát triển hệ thống phân tích vết truy cập dịch vụ cho phép phát hiện, cảnh báo hành vi bất thường và nguy cơ mất an toàn thông tin trong Chính phủ điện tử. Định hướng mục tiêu là nghiên cứu, đề xuất giải pháp thu thập và phân tích vết truy cập các máy chủ tại các cơ quan cấp Tỉnh/Thành phố/Bộ, nhằm trích xuất các thông tin có giá trị hỗ trợ phát hiện, cảnh báo hành vi bất thường và đảm bảo an toàn thông tin. Đồng thời, xây dựng, phát triển hệ thống phân tích nhật ký vết truy cập dịch vụ hỗ trợ phát hiện, cảnh báo hành vi bất thường và nguy cơ mất an toàn thông tin và triển khai thử nghiệm tại cơ quan cấp Tỉnh/Thành phố/Bộ.</p><p>Nhiệm vụ 5: Nghiên cứu, phát triển tích hợp hệ thống hỗ trợ giám sát, quản lý, vận hành an toàn cho hệ thống mạng và hạ tầng cung cấp dịch vụ công trực tuyến. Định hướng mục tiêu là làm chủ công nghệ chế tạo thiết bị phần cứng, phát triển phần mềm chuyên dụng, tích hợp hệ thống hỗ trợ giám sát, quản lý đảm bảo vận hành an toàn và an ninh thông tin cho các hệ thống mạng và hạ tầng cung cấp dịch vụ công trực tuyến tại các cơ quan nhà nước.</p><p>Các tổ chức và cá nhân tham gia tuyển chọn cần chuẩn bị hồ sơ theo các yêu cầu của Thông tư 10/2014/TT-BKHCN và 23/2014/TT-BKHCN và các biểu mẫu bổ sung tại Quyết định số 950/QĐ-BKHCN ngày 25/4/2016. Thời hạn nộp hồ sơ trước 17h00 ngày 22/6/2017 tại Văn phòng Bộ, Bộ Khoa học và Công nghệ, 113 Trần Duy Hưng, Cầu Giấy, Hà Nội.</p><p>Quy trình tuyển chọn tổ chức và cá nhân thực hiện nhiệm vụ khoa học và công nghệ cấp quốc gia được thực hiện theo hướng dẫn tại Thông tư số 10/2014/TT-BKHCN và Thông tư số 23/2014/TT-BKHCN về việc sữa đổi, bổ sung một số điều Thông tư số 10/2014/TT-BKHCN</p>', '', 'http://baochinhphu.vn/Khoa-hoc-Cong-nghe/Nghien-cuu-phat-trien-san-pham-CNTT-phuc-vu-Chinh-phu-dien-tu/305966.vgp', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (2, '', '', 'Theo Bộ trưởng Bộ Nội vụ Lê Vĩnh Tân, Phó Trưởng Ban Chỉ đạo CCHC của Chính phủ, thời gian qua, các bộ, ngành, địa phương đã tập trung xây dựng, ban hành và triển khai các văn bản pháp luật, kiểm tra văn bản, hệ thống hoá văn bản quy phạm pháp luật.<p>Theo đó, đã trình Chính phủ đã ban hành 69 nghị định để điều chỉnh các quan hệ kinh tế-xã hội, góp phần từng bước hoàn thiện thể chế kinh tế thị trường định hướng XHCN, nâng cao hiệu lực, hiệu quả quản lý nhà Nước.</p><p>Công tác theo dõi tình hình thi hành pháp luật đã được các bộ, ngành quan tâm. Trọng tâm là theo dõi thi hành pháp luật về hỗ trợ doanh nghiệp khởi nghiệp và phát triển nhằm cụ thể hoá chủ trương của Chính phủ, Thủ tướng Chính phủ về xây dựng Chính phủ kiến tạo, phát triển để phục vụ nhân dân, tạo điều kiện tối đa cho doanh nghiệp hoạt động sản xuất, kinh doanh.</p><p>Công tác cải cách thủ tục hành chính (TTHC) và thực hiện cơ chế một cửa, một cửa liên thông được các bộ, ngành, địa phương tiếp tục đẩy mạnh, cắt giảm và đơn giản hoá TTHC, trọng tâm là các TTHC như thuế, bảo hiểm xã hội, cấp phép xây dựng, tiếp cận điện năng, đăng ký quyền sở hữu, sử dụng tài sản, thông quan hàng hoá quan biên giới.</p><p>Cơ chế một cửa, một cửa liên thông tiếp tục được triển khai có hiệu quả, góp phần nâng cao chất lượng giải quyết TTHC cho người dân, doanh nghiệp theo hướng công khai, minh bạch, thuận lợi. Việc triển khai mô hình trung tâm hành chính công cấp tỉnh, cấp huyện tại một số địa phương bước đầu tạo chuyển biến tích cực trong giải quyết TTHC cho người dân, tổ chức.</p><p>Về xây dựng và nâng cao chất lượng đội ngũ công chức, các bộ, ngành, địa phương xây dựng và hoàn thiện bản mô tả công việc và khung năng lực cho từng vị trí việc làm, tạo cơ sở cho việc tuyển dụng, bổ nhiệm, sử dụng, quản lý công chức, đồng thời, triển khai chính sách tinh giản biên chế. Trong 5 tháng đầu năm 2017 cả nước đã tinh giản được 5.062 biên chế, nâng tổng số đối tượng được giải quyết tinh giản từ năm 2015 đến nay là 22.673 người.</p><p>Về công tác hiện đại hoá hành chính, các bộ, ngành, địa phương đã đầu tư, nâng cấp hạ tầng kỹ thuật để triển khai đồng bộ các nhiệm vụ ứng dụng công nghệ thông tin. Triển khai có hiệu quả việc kết nối liên thông phần mềm quản lý văn bản của các bộ, ngành, địa phương với Văn phòng Chính phủ đã giúp hình thành hệ thống quản lý văn bản điện tử thống nhất, thông suốt từ Trung ương đến địa phương.</p><p>Bộ trưởng Lê Vĩnh Tân cho hay, đến nay các bộ, ngành đã triển khai thực hiện cung cấp trực tuyến mức độ 3 và 4 với 63/82 dịch vụ công theo danh mục được phê duyệt trong năm 2016, đạt tỷ lệ 77%, góp phần tiết kiệm thời gian, cắt giảm chi phí và nâng cao tính công khai, minh bạch, giảm sách nhiễu nhân dân khi thực hiện TTHC.</p><p>Về phương hướng, nhiệm vụ 6 tháng cuối năm 2017, Ban Chỉ đạo xác định một số nhiệm vụ lớn sau: Tiếp tục triển khai đồng bộ các nội dung CCHC theo quy định tại các nghị định, quyết định của Chính phủ, Thủ tướng Chính phủ. Đẩy mạnh thực hiện, hoàn thành các nhiệm vụ CCHC của Ban Chỉ đạo, bảo đảm chất lượng, tiến độ.</p><p>Đồng thời, tiếp tục đẩy mạnh cải cách thể chế, trọng tâm là hoàn thiện thể chế về công chức, viên chức, liên quan đến doanh nghiệp. Đẩy mạnh rà soát, cắt giảm và đơn giản hoá TTHC; đẩy nhanh tiến độ phê duyệt bản mô tả công việc và vị trí việc làm trong từng cơ quan; kiện toàn chức năng, nhiệm vụ của các bộ, ngành, địa phương.</p><p>Đẩy mạnh tự chủ trong các đơn vị sự nghiệp công lập; khẩn trương ban hành kiến trúc Chính phủ điện tử cấp bộ, cấp tỉnh theo quy định. Duy trì, cải tiến hệ thống quản lý chất lượng theo TCVN ISO 9001:2008. Các thành viên Ban Chỉ đạo tăng cường kiểm tra việc thực hiện nhiệm vụ với trọng tâm là công tác tuyển dụng, bổ nhiệm, sử dụng cán bộ, chấp hành kỷ luật…<br  />&nbsp;</p><div style=\"text-align:center\"><figure class=\"image\" style=\"display:inline-block\"><img alt=\"Ảnh: VGP/Lê Sơn\" height=\"235\" src=\"" . NV_BASE_SITEURL . "uploads/news/2017_08/ptt.jpg\" width=\"400\" /><figcaption>Ảnh: VGP/Lê Sơn</figcaption></figure></div><p>Phát biểu chỉ đạo tại Hội nghị, Phó Thủ tướng Thường trực Chính phủ Trương Hoà Bình biểu dương, đánh giá cao kết quả công tác CCHC của các bộ, ngành, địa phương trong những tháng đầu năm 2017.</p><p>Phó Thủ tướng Thường trực nêu rõ, bước vào nhiệm kỳ mới, Chính phủ đã chủ trương “đổi mới mạnh mẽ công tác chỉ đạo, điều hành CCHC, bảo đảm sự gắn kết chặt chẽ, đồng bộ giữa CCHC với xây dựng Chính phủ điện tử và kiểm soát TTHC”. Theo đó, Thủ tướng đã ban hành nhiều văn bản chỉ đạo, điều hành về CCHC, thành lập Tổ công tác của Thủ tướng đôn đốc việc thực hiện các ý kiến chỉ đạo của Thủ tướng, kiện toàn Hội đồng Tư vấn cải cách TTHC.</p><p>Qua đó, trong 6 tháng đầu năm 2017, các bộ, ngành, địa phương đã ban hành kịp thời các văn bản nhằm quán triệt và tổ chức thực hiện công tác CCHC, kiểm soát TTHC. Công tác xây dựng và hoàn thiện thể chế đã có bước chuyển biến tích cực, Chính phủ đã cơ bản chấm dứt được tình trạng nợ đọng văn bản quy định chi tiết thi hành luật.</p><p>“Một số kết quả nổi bật trong công tác CCHC như TTHC ngày càng thống nhất, đồng bộ, đơn giản, thuận lợi, công khai, minh bạch, nhiều nội dung cải cách trọng tâm, có tác động trực tiếp tới sản xuất, kinh doanh và đời sống nhân dân. Hệ thống thể chế bảo đảm cho việc giải quyết TTHC tại các cơ quan Nhà nước tiếp tục được hoàn thiện, đáp ứng những yêu cầu mới của sự phát triển kinh tế-xã hội, hội nhập quốc tế”, Phó Thủ tướng Thường trực nhấn mạnh.</p><p>Theo Phó Thủ tướng, Văn phòng Chính phủ đã rà soát, xác định các dịch vụ hành chính công có thể cung cấp trực tuyến ở mức độ 3, 4 và đưa vào vận hành, khai thác hệ thống tiếp nhận, trả lời kiến nghị của doanh nghiệp và người dân trên Cổng Thông tin điện tử Chính phủ.</p><p>Cụ thể, hệ thống thông tin phản ánh kiến nghị của doanh nghiệp đã tiếp nhận 586 phản ánh, kiến nghị của các doanh nghiệp, hiệp hội. Văn phòng Chính phủ đã phân loại, chuyển 489 kiến nghị tới các bộ, ngành, địa phương để xử lý theo thẩm quyền, trả lời doanh nghiệp và công khai trên Cổng Thông tin điện tử Chính phủ.</p><p>Hệ thống thông tin tiếp nhận, trả lời kiến nghị của người dân đã tiếp nhận 766 phản ánh, kiến nghị thuộc phạm vi xử lý, đã gửi các bộ, ngành, địa phương xem xét, xử lý 199 phản ánh, kiến nghị.</p><p>Các lĩnh vực như thuế, công thương, giao thông vận tải, bảo hiểm y tế, triển khai cơ chế một cửa, một cửa liên thông có nhiều chuyển biến tích cực. “Những địa phương có điều kiện tương tự như Quảng Ninh cần đề xuất việc xây dựng mô hình thí điểm trung tâm hành chính công cấp tỉnh để Bộ Nội vụ tổng hợp và báo cáo cấp có thẩm quyền. Khi có được mô hình này rồi cần có kết nối với Cổng Thông tin điện tử của tỉnh và Cổng Thông tin điện tử Chính phủ, tạo sự đồng bộ và thuận lợi cho người dân trong việc tiếp cận với cơ quan hành chính Nhà nước”, Phó Thủ tướng Thường trực chỉ đạo.</p><p>Bên cạnh đó, Phó Thủ tướng Thường trực cũng chỉ rõ những hạn chế, yếu kém cần khắc phục như cải cách nhưng vẫn còn rườm rà, bất cập, gây khó khăn cho doanh nghiệp, nhất là quy định liên quan đến kiểm tra chuyên ngành. Ứng dụng CNTT trong giải quyết TTHC chưa đồng bộ. Triển khai dịch vụ công trực tuyến mức độ 3,4 nhiều nơi còn hình thức. Các trung tâm hành chính công cấp tỉnh chưa có mô hình thống nhất…</p><p>Về phương hướng, nhiệm vụ thời gian tới, Phó Thủ tướng Thường trực đề nghị các bộ, ngành, địa phương tập trung vào một số nhiệm vụ: Đề cao trách nhiệm cá nhân người đứng đầu trong thực hiện nhiệm vụ CCHC trên cơ sở kế hoạch và mục tiêu đề ra. Thực hiện có hiệu quả nhiệm vụ CCHC, kiểm soát TTHC được Chính phủ, Thủ tướng Chính phủ giao cho trong lĩnh vực quản lý nhà nước của mình.</p><p>Đẩy nhanh tiến độ xây dựng, phê duyệt bản mô tả công việc và khung năng lực vị trí việc làm của từng cá nhân trong cơ quan; xây dựng Chính phủ điện tử gắn với CCHC, Văn phòng Chính phủ và các bộ, ngành, địa phương thực hiện nghiêm, có hiệu quả Quy chế tiếp nhận, xử lý phản ánh, kiến nghị của cá nhân, tổ chức trên Cổng Thông tin điện tử Chính phủ để kịp thời tháo gỡ khó khăn cho doanh nghiệp và người dân.</p><p>Trong quý III/2017, Văn phòng Chính phủ trình Chính phủ ban hành Nghị định về cơ chế một cửa, một cửa liên thông trong giải quyết TTHC tại cơ quan hành chính Nhà nước các cấp, bảo đảm gắn kết chặt chẽ giữa cải cách TTHC với xây dựng Chính phủ điện tử.</p><p>Phát huy vai trò của Tổ công tác của Thủ tướng tại các bộ, ngành, địa phương trong việc đôn đốc, kiểm tra việc thực hiện chỉ đạo của Chính phủ, Thủ tướng Chính phủ.</p><p>Căn cứ kết quả Chỉ số CCHC hằng năm của Bộ Nội vụ công bố, các ngành, địa phương cần tập trung chỉ đạo, rà soát, xác định rõ những điểm mạnh, yếu kém trong CCHC của đơn vị mình…</p><p>Về hoạt động của Ban Chỉ đạo, Phó Thủ tướng Thường trực đề nghị các thành viên Ban Chỉ đạo có trách nhiệm tổ chức thực hiện các nhiệm vụ được giao theo kế hoạch, tăng cường việc chỉ đạo, kiểm tra thực hiện CCHC thuộc phạm vi, lĩnh vực do mình quản lý tại bộ, ngành, địa phương. Bộ Nội vụ cần tích cực đôn đốc các thành viên Ban Chỉ đạo thực hiện nghiêm túc các nhiệm vụ được phân công, tham mưu cho Chính phủ ban hành các giải pháp nâng cao hiệu quả CCHC.</p><p>“Tôi đề nghị chúng ta cần đồng tâm, hiệp lực, thống nhất trong phối hợp hành động và thực hiện với quyết tâm cao để đẩy mạnh cải cách thực chất, hiệu quả, góp phần xây dựng nền hành chính kiến tạo, phát triển, hoạt động hiệu lực, hiệu quả phục vụ nhân dân, thúc đẩy phát triển kinh tế-xã hội và hội nhập kinh tế của đất nước”, Phó Thủ tướng Thường trực nhấn mạnh.</p>', '', 'http://baochinhphu.vn/Thoi-su/Quyet-tam-cao-de-day-manh-CCHC-thuc-chat-hieu-qua-hon/307446.vgp', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (3, '', '', 'Có hiệu lực từ ngày 20/1/2015, Thông tư này thay thế cho Thông tư 41/2009/TT-BTTTT (Thông tư 41) ngày 30/12/2009 ban hành Danh mục các sản phẩm phần mềm nguồn mở đáp ứng yêu cầu sử dụng trong cơ quan, tổ chức nhà nước.<br  /><br  />Sản phẩm phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước trong Thông tư 41/2009/TT-BTTTT vừa được Bộ TT&amp;TT ban hành, là những&nbsp;<strong>sản phẩm đã đáp ứng các tiêu chí về tính năng kỹ thuật cũng như tính mở và bền vững</strong>, và NukeViet là một trong số đó.<p>Cụ thể, theo Thông tư 20, sản phẩm phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước phải đáp các tiêu chí về chức năng, tính năng kỹ thuật bao gồm: phần mềm có các chức năng, tính năng kỹ thuật phù hợp với các yêu cầu nghiệp vụ hoặc các quy định, hướng dẫn tương ứng về ứng dụng CNTT trong các cơ quan, tổ chức nhà nước; phần mềm đáp ứng được yêu cầu tương thích với hệ thống thông tin, cơ sở dữ liệu hiện có của các cơ quan, tổ chức.</p><p>Bên cạnh đó, các sản phẩm phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước còn phải đáp ứng tiêu chí về tính mở và tính bền vững của phần mềm. Cụ thể, phần mềm phải đảm bảo các quyền: tự do sử dụng phần mềm không phải trả phí bản quyền, tự do phân phối lại phần mềm, tự do sửa đổi phần mềm theo nhu cầu sử dụng, tự do phân phối lại phần mềm đã chỉnh sửa (có thể thu phí hoặc miễn phí); phần mềm phải có bản mã nguồn, bản cài đặt được cung cấp miễn phí trên mạng; có điểm ngưỡng thất bại PoF từ 50 điểm trở xuống và điểm mô hình độ chín nguồn mở OSMM từ 60 điểm trở lên.</p><p>Căn cứ những tiêu chuẩn trên, thông tư 20 quy định cụ thể Danh mục 31 sản phẩm thuộc 11 loại phần mềm được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước.&nbsp;<strong>NukeViet thuộc danh mục hệ quản trị nội dung nguồn mở</strong>. Chi tiết thông tư và danh sách 31 sản phẩm phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước có&nbsp;<a href=\"https://vinades.vn/vi/download/van-ban-luat/Thong-tu-20-2014-TT-BTTTT/\" target=\"_blank\">tại đây</a>.</p><p><strong>Thông tư 20/2014/TT-BTTTT quy định rõ</strong>: Các cơ quan, tổ chức nhà nước khi có nhu cầu sử dụng vốn nhà nước để đầu tư xây dựng, mua sắm hoặc thuê sử dụng các loại phần mềm có trong Danh mục hoặc các loại phần mềm trên thị trường đã có sản phẩm phần mềm nguồn mở tương ứng thỏa mãn các tiêu chí trên (quy định tại Điều 3 Thông tư 20) thì phải&nbsp;<strong>ưu tiên lựa chọn các sản phẩm phần mềm nguồn mở tương ứng, đồng thời phải thể hiện rõ sự ưu tiên này trong các tài liệu&nbsp;</strong>như thiết kế sơ bộ, thiết kế thi công, kế hoạch đấu thầu, kế hoạch đầu tư, hồ sơ mời thầu, yêu cầu chào hàng, yêu cầu báo giá hoặc các yêu cầu mua sắm khác.</p><p>Đồng thời,&nbsp;<strong>các cơ quan, tổ chức nhà nước phải đảm bảo không đưa ra các yêu cầu, điều kiện, tính năng kỹ thuật có thể dẫn đến việc loại bỏ các sản phẩm phần mềm nguồn mở&nbsp;</strong>trong các tài liệu như thiết kế sơ bộ, thiết kế thi công, kế hoạch đấu thầu, kế hoạch đầu tư, hồ sơ mời thầu, yêu cầu chào hàng, yêu cầu báo giá hoặc các yêu cầu mua sắm khác.</p><p>Như vậy, sau thông tư số 08/2010/TT-BGDĐT của Bộ GD&amp;ĐT ban hành ngày 01-03-2010 quy định về sử dụng phần mềm tự do mã nguồn mở trong các cơ sở giáo dục trong đó đưa NukeViet vào danh sách các mã nguồn mở được khuyến khích sử dụng trong giáo dục, thông tư 20/2014/TT-BTTTT đã mở đường cho NukeViet vào sử dụng cho các cơ quan, tổ chức nhà nước. Các đơn vị hỗ trợ triển khai NukeViet cho các cơ quan nhà nước có thể sử dụng quy định này để được ưu tiên triển khai cho các dự án website, cổng thông tin cho các cơ quan, tổ chức nhà nước.</p>', '', 'mic.gov.vn', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (5, '', '', '<h2><strong>Phần mềm nguồn mở là phần mềm... không bản quyền</strong></h2><p>Việc không ít người cho rằng “Phần mềm nguồn mở là phần mềm... không bản quyền, phần mềm nguồn đóng có bản quyền” là hoàn toàn sai lầm. Bởi lẽ, cho dù là phần mềm nguồn đóng hay mở, chúng đều có thể là những phần mềm bản quyền. Các chương trình nguồn mở không phải là những chương trình không giấy phép. Ngược lại, chính giấy phép của chúng đã làm chúng thành nguồn mở.</p><p>Khi một nhà phát triển viết một chương trình, anh ta giữ quyền tác giả, hay bản quyền (copyright). Trong một số trường hợp, có thể hãng làm việc của anh ta nắm giữ các quyền đó. Và bản quyền này có thể được bán, như một tài sản phi vật chất, từ hãng này qua hãng khác.</p><p>Người giữ bản quyền được quyền tự do định ra chương trình của người đó có thể được sử dụng như thế nào: có thể giữ riêng cho mình, nghiêm cấm bất kỳ ai sử dụng nó; có thể bán những quyền của mình cho một người khác; có thể dùng quyền tác giả qui định những điều kiện áp đặt cho việc sử dụng chương trình của mình; hay viết ra các điều kiện trong những điều khoản của giấy phép sử dụng.</p><p>Có thể khẳng định, tất cả các phần mềm, dù nguồn đóng hay nguồn mở, chúng đều có chủ sở hữu và không phải là thứ “chẳng thuộc về ai”. Trong một số trường hợp, chủ sở hữu của phần mềm nguồn mở có thể là một quỹ phi lợi nhuận, một hãng thương mại thông thường hoặc cũng có thể là sở hữu của nhiều đồng tác giả, đặc biệt trong trường hợp hệ quả của những đóng góp về sau.</p><p>Về cơ bản, phần mềm nguồn đóng hay nguồn mở chủ yếu khác nhau về giấy phép. Trong đó phần mềm nguồn đóng thì hạn chế các quyền can thiệp vào mã nguồn, còn phần mềm nguồn mở thì đảm bảo các quyền đó (tác giả phải từ bỏ một số quyền cho người sử dụng có nhiều quyền hơn).</p><h3><strong>Phần mềm nguồn mở thì mọi thứ liên quan đều miễn phí</strong></h3><p>Nhận định trên cũng là một cách hiểu sai. Bởi lẽ, để được coi là phần mềm tự do nguồn mở, điều kiện cần là mã nguồn phải được chia sẻ tự do. Tuy nhiên điều đó không đồng nghĩa rằng bản thân các ứng dụng được miễn phí hoàn toàn.</p><p>Trên thực tế, không phải tất cả nhưng có nhiều công ty kiếm tiền từ các dự án phần mềm tự do nguồn mở của họ. Thông thường, các nhà cung cấp có xu hướng cung cấp kèm theo các dịch vụ như hỗ trợ (ví dụ trường hợp của Wordpress); bổ sung tính năng (ví dụ trường hợp của NukeViet); hoặc tạo ra một phiên bản cộng đồng miễn phí (một phiên bản cộng đồng với giấy phép nguồn ở và một phiên bản thương mại với giấy phép không phải nguồn mở).</p><p>Ví dụ cho trường hợp kể trên&nbsp;là hệ điều hành Redhat hoặc phần mềm máy chủ thư điện tử và công cụ cộng tác&nbsp;Zimbra - cung cấp cả phiên bản nguồn mở miễn phí, kèm theo mã nguồn đầy đủ và phiên bản thương mại với nhiều tính năng hơn nhưng khả năng tiếp cận mã nguồn hạn chế hơn.</p><p>Ngoài ra, trên thế giới một số trường hợp, nhà cung cấp trông chờ nguồn tài trợ là chính, ví dụ như Drupal, Joomla...</p><p><strong>Phần mềm miễn phí và phần mềm nguồn mở là giống nhau</strong></p><p>Phần mềm nguồn mở (Open-Source Software) hoặc phần mềm tự do (Free Software) thì được sử dụng mã nguồn miễn phí, nhưng phần mềm miễn phí (freeware) và phần mềm chia sẻ (shareware) thì chưa chắc đã được tiếp cận mã nguồn phần mềm.</p><p>Cũng cần giải thích thêm rằng, không phải cứ truyền bá mã nguồn là làm cho một chương trình trở thành nguồn mở, mà phải là quyền -&nbsp;được ghi rõ trong giấy phép, tự do sử dụng, sửa đổi và phân phối lại chúng.</p><h4><strong>Dùng phần mềm nguồn mở thì&nbsp;không được hỗ trợ</strong></h4><p>Quan niệm cho rằng phần mềm nguồn mở không được hỗ trợ vì nó thuộc về cộng đồng, mà cộng đồng tức là... không ai cả là không đúng, vì phần mềm nguồn mở chỉ miễn phí bản quyền, bạn sẽ phải trả phí nếu muốn sử dụng các dịch vụ hỗ trợ.</p><p>Thực tế, có một số phần mềm chính đơn vị phát triển phần mềm sẽ cung cấp dịch vụ hỗ trợ; nhưng cũng có một số phần mềm, các đơn vị hỗ trợ hoàn toàn độc lập với đơn vị phát triển phần mềm.</p><p>Bên cạnh đó, một số trường hợp, cả đơn vị phát triển phần mềm và các đơn vị khác (không phát triển phần mềm) nhưng đều tham gia cung cấp dịch vụ triển khai, hỗ trợ người sử dụng phần mềm. Điều này tạo sự cạnh tranh cao hơn nhiều so với phần mềm nguồn đóng, người sử dụng có quyền lựa chọn đa dạng hơn, cạnh tranh hơn và do đó về mặt lý thuyết là có thể tốt hơn.</p><p><strong>Phần mềm tự do nguồn mở chỉ dành cho người biết lập trình</strong></p><br  /><p>Đây cũng là cách hiểu không đúng. Bởi lẽ trên thực tế có thể bạn đang sử dụng rất nhiều phần mềm nguồn mở mà không cần biết gì về lập trình, ví dụ như trình duyệt Google Chrome hoặc Cờ Rôm+ (của Việt Nam) được tạo từ phần mềm nguồn mở Chromium; trình duyệt FireFox, bộ gõ Unikey hoặc hệ điều hành Android cũng là những phần mềm nguồn mở...</p><p>Tất cả những phần mềm nguồn mở này&nbsp;vẫn đang&nbsp;hiện hữu hàng ngày và được nhiều người sử dụng dù họ không biết gì về lập trình.</p><p><strong>Sử dụng phần mềm nguồn mở dễ vi phạm luật sở hữu trí tuệ</strong></p><p>Quan niệm cho rằng “sử dụng phần mềm nguồn mở dễ vi phạm luật sở hữu trí tuệ hơn phần mềm nguồn đóng” cũng là một sự hiểu lầm. Như đã trình bày ở trên, dù là phần mềm nguồn đóng hay mở, chúng đều có thể là những phần mềm bản quyền và ngược lại. Vì thế, cho dù là phần mềm nguồn đóng hay nguồn mở, chúng đều có thể vi phạm luật sở hữu trí tuệ nếu có chứa thành phần không bản quyền.</p><p>Tuy nhiên, vì phần mềm nguồn mở được công khai toàn bộ mã nguồn, cho nên việc này dễ kiểm tra hơn phần mềm nguồn đóng, do đó thông thường các đơn vị làm phần mềm nguồn mở “không dại gì” vi phạm luật sở hữu trí tuệ.</p><p>Trên thực tế, đã từng có các vụ kiện và trong một vụ án quốc tế, tòa án đã phán quyết về việc sử dụng phần mềm tự do nguồn mở không vi phạm pháp luật sở hữu trí tuệ khi xử SCO bị thu kiện tại tòa án. Trong khi đó, cũng từng có một số phần mềm nguồn đóng bị “tẩy chay” vì vi phạm giấy phép phần mềm nguồn mở (sao chép mà không ghi rõ nguồn gốc).</p><p><strong>Phần mềm nguồn mở ít được sử dụng</strong></p><p>Thực tế, phần mềm nguồn mở được sử dụng rất phổ biến trên thế giới cũng như ở Việt. Cụ thể, theo thống kê của Computerworlduk.com, có tới 485/500 hệ thống siêu máy tính là phần mềm nguồn mở; điện toán đám mây, phần mềm nguồn mở chiếm 79%; các máy chủ web, phần mềm nguồn mở chiếm 65%; các hệ thống di động, phần mềm nguồn mở chiếm 83.6%...</p><p><strong>Phần mềm nguồn mở thì không đảm bảo an toàn thông tin</strong></p><p>Việc có không ít người cho rằng phần mềm nguồn mở thì không đảm bảo an toàn thông tin do mã nguồn ai cũng biết là một sự nhầm lẫn. Cần phân biệt “bảo mật” và “an toàn, an ninh thông tin” vì hai khái niệm này khác nhau. “Bảo mật” mã nguồn (giấu kín mã nguồn như phần mềm nguồn đóng) không có nghĩa là đảm bảo an toàn, an ninh thông tin hơn phần mềm nguồn mở.</p><p>Trong lĩnh vực phát triển phần mềm, theo nhận định của các chuyên gia, cùng với nguồn lực như nhau, phần mềm phát triển theo phương pháp phát triển phần mềm nguồn mở sẽ tốt hơn và đạt mức an toàn an ninh cao hơn nhiều so với phần mềm phát triển theo phương pháp phát triển phần mềm nguồn đóng.</p><p>Trên thực tế, nhiều nước trên thế giới đã công nhận phần mềm nguồn mở an toàn hơn phần mềm nguồn đóng và giúp giảm phụ thuộc tình trạng độc quyền cho nên nhiều nước trên thế giới. Việt Nam cũng đã có những chính sách khuyến khích sử dụng và phát triển phần mềm nguồn mở.</p><p><strong>Phần mềm nguồn mở làm hạn chế khả năng sáng tạo</strong></p><p>Phần mềm nguồn mở trên thực tế được thế giới phát động triển khai nhằm tăng khả năng sáng tạo và triết lý mở đã lan tỏa tới các lĩnh vực có liên quan như dữ liệu mở (Open Data), tài nguyên giáo dục mở (OER - Open Educational Resources), phần cứng nguồn mở (Open Hardware)… đã giúp tốc độ sáng tạo tăng lên nhiều lần.</p><p>Đến nay, phần mềm nguồn mở cũng không còn bị các công ty phần mềm nguồn đóng coi là “ung nhọt”. Các doanh nghiệp phần mềm truyền thống theo đuổi mô hình phần mềm nguồn đóng trên thế giới quen chống đối mô hình phát triển phần mềm nguồn mở cũng thay đổi 180 độ trước những lợi ích không thể chối cãi của phần mềm nguồn mở, điển hình là Microsoft.</p><p>Nếu như vào năm 2001, Steve Ballmer - CEO của Microsoft đã ví hệ điều hành Linux là “căn bệnh ung thư”, bởi hệ điều hành này đang xâm chiếm thị phần với Windows trên thị trường máy tính cá nhân, thì vào năm 2012, Microsoft thành lập công ty con là Microsoft Open Technology chuyên phát triển phần mềm nguồn mở. Tiếp đó, vào tháng 6/2016, Microsoft công bố phần mềm nguồn mở .NET Core 1.0, và gần đây nhất là Microsoft gia nhập và thậm chí còn là thành viên bạch kim của Linux Foundation - tổ chức đứng sau phát triển hệ điều hành và hỗ trợ chi phí cho các dự án mã nguồn mở.</p><p>Những động thái trên của Microsoft làm giới công nghệ đi hết từ bất ngờ này đến bất ngờ khác. Tuy nhiên, những người am hiểu lợi ích của phần mềm nguồn mở thì không hề bất ngờ, bởi một trong những thứ dẫn dắt cho sự phát triển mạnh mẽ của phần mềm nguồn mở chính là lợi ích kinh tế. Bên cạnh đó, phần mềm nguồn mở là phương thức giúp thúc đẩy sáng tạo, đổi mới khoa học công nghệ thông qua việc hội tụ và tích lũy tri thức cộng đồng, qua việc cống hiến tài sản trí tuệ của các tổ chức và cá nhân những người tham gia thành tài sản chung cho cộng đồng nguồn mở.</p><p>Bên cạnh đó, nhiều phong trào trên thế giới cũng đã chỉ ra rằng: bảo hộ độc quyền, cấp văn bằng độc quyền sáng chế và bảo hộ độc quyền cho phần mềm đang làm giảm khả năng sáng tạo vì nó sinh ra những “quỷ lùn sáng chế” hay “bẫy sáng chế”.</p><p>&quot;Patent Troll&quot; (tạm dịch là “quỷ lùn sáng chế” hay “bẫy sáng chế”) là thuật ngữ chỉ sự cạnh tranh không lành mạnh về bằng sáng chế. Cụm từ này thường sử dụng để ám chỉ những tổ chức hay cá nhân dùng các bằng sáng chế do mình nắm giữ (có thể do mua lại chứ không phải do mình làm ra) để đem đi kiện các công ty khác vi phạm đến bằng sáng chế đó của mình, mục đích là để triệt hạ các đối thủ cạnh tranh hoặc đòi trả phí vi phạm bản quyền, chứ&nbsp;không phải là để bảo vệ quyền sở hữu trí tuệ của bản thân họ. Việc này làm các nhà sản xuất và các doanh nghiệp nhỏ không dám sáng tạo &amp; cung cấp những sản phẩm, dịch vụ mới.</p>', '', 'http://ictnews.vn/cntt/nuoc-manh-cntt/diem-mat-9-nham-lan-thuong-gap-ve-phan-mem-nguon-mo-150933.ict', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (4, '', '', '<p>11 lĩnh vực quan trọng cần ưu tiên bảo đảm an toàn thông tin mạng và cơ quan chủ trì từng lĩnh vực gồm: 1- Lĩnh vực giao thông (Bộ Giao thông vận tải); 2- Lĩnh vực năng lượng (Bộ Công Thương); 3- Lĩnh vực tài nguyên và môi trường (Bộ Tài nguyên và Môi trường); 4- Lĩnh vực thông tin (Bộ Thông tin và Truyền thông); 5- Lĩnh vực y tế (Bộ Y tế); 6- Lĩnh vực tài chính (Bộ Tài chính); 7- Lĩnh vực ngân hàng (Ngân hàng Nhà nước); 8- Lĩnh vực quốc phòng (Bộ Quốc phòng); 9- Lĩnh vực an ninh, trật tự an toàn xã hội (Bộ Công an); 10- Lĩnh vực đô thị (UBND Thành phố Hà Nội, Thành phố Hồ Chí Minh); 11- Lĩnh vực chỉ đạo, điều hành của Chính phủ (Văn phòng Chính phủ).</p><p>Thủ tướng Chính phủ cũng ban hành Danh mục hệ thống thống tin quan trọng quốc gia thuộc lĩnh vực thông tin và lĩnh vực chỉ đạo, điều hành của Chính phủ.</p><p>Cụ thể, lĩnh vực thông tin gồm hệ thống: Hệ thống máy chủ tên miền quốc gia Việt Nam “.vn”; Hệ thống quản lý, điều khiển, khai thác, vận hành vệ tinh viễn thông; Hệ thống quản lý, điều khiển, khai thác, vận hành mạng đường trục băng rộng; Hệ thống quản lý chuyển mạch quốc tế; Hệ thống truyền dẫn và cáp quang biển quốc tế, cáp quang đất liền quốc tế.</p><p>Lĩnh vực chỉ đạo, điều hành của Chính phủ gồm: Mạng truyền số liệu chuyên dùng phục vụ các cơ quan Đảng, Nhà nước; Hệ thống quản lý văn bản 4 cấp chính quyền.</p><p>Thủ tướng Chính phủ yêu cầu cơ quan chủ trì từng lĩnh vực phải phối hợp với các Bộ: Thông tin và Truyền thông, Công an, Quốc phòng xây dựng tiêu chí cụ thể xác định hệ thống thông tin quan trọng quốc gia thuộc lĩnh vực quản lý, trên cơ sở đó xây dựng danh mục hệ thống thông tin quan trọng quốc gia gửi Bộ Thông tin và Truyền thông để thẩm định theo quy định; chủ trì hoặc phối hợp với chủ quản hệ thống thông tin định kỳ hàng năm thực hiện rà soát, đánh giá, xác định hệ thống thông tin quan trọng quốc gia thuộc phạm vi quản lý; đề xuất sửa đổi, bổ sung vào Danh mục hệ thống thông tin quan trọng quốc gia trước ngày 30/11 hàng năm.</p>', '', 'http://baochinhphu.vn/Chi-dao-quyet-dinh-cua-Chinh-phu-Thu-tuong-Chinh-phu/11-linh-vuc-quan-trong-can-uu-tien-bao-dam-an-toan-thong-tin-mang/305635.vgp', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (6, '', '', '<p>Quyết định được ban hành nhằm đánh giá, xếp hạng mức độ ứng dụng công nghệ thông tin của cơ quan nhà nước.</p><p>Nội dung đánh giá bao gồm 06 hạng mục là: (1) Hạ tầng kỹ thuật công nghệ thông tin; (2) Ứng dụng công nghệ thông tin trong hoạt động của cơ quan; (3) Trang/Cổng thông tin điện tử; (4) Cung cấp dịch vụ công trực tuyến; (5) Cơ chế, chính sách và các quy định cho ứng dụng công nghệ thông tin; (6) Nhân lực cho ứng dụng công nghệ thông tin.</p><p>Việc xếp hạng được thực hiện theo từng hạng mục, cụ thể như sau:</p><p>- Mức độ theo từng hạng mục của cơ quan nhà nước được xác định căn cứ vào chỉ số hạng mục của từng cơ quan để xếp theo thứ tự từ cao đến thấp và xác định mức độ Tốt, Khá, Trung bình.</p><p>- Việc đánh giá, xếp hạng được thực hiện theo 03 nhóm cơ quan bao gồm: &nbsp;Nhóm các Bộ, cơ quan ngang Bộ; Nhóm các cơ quan thuộc Chính phủ và Nhóm các tỉnh, thành phố trực thuộc Trung ương.</p><p>Việc tổ chức triển khai đánh giá, xếp hạng được thực hiện theo quy trình như sau:</p><p>- Cơ quan triển khai đánh giá (Cục Tin học hóa) tổng hợp số liệu từ báo cáo của các Bộ, ngành địa phương theo quy định của Thông tư số 06/2013/TT-BTTTT của năm 2015 (báo cáo gửi về vào đầu năm 2016); cập nhật số liệu theo báo cáo tổng kết về ứng dụng công nghệ thông tin của các Bộ, ngành, địa phương năm 2016 nếu có. Kiểm tra, đánh giá sơ bộ số liệu.</p><p>- Cục Tin học hóa gửi số liệu tổng hợp cho từng cơ quan để xác nhận (xác nhận lần 1, để tránh sai sót trong nhập, cập nhật số liệu);</p><p>- Cục Tin học hóa tổ chức kiểm tra, đánh giá;</p><p>- Cục Tin học hóa gửi xác nhận lại số liệu lần 2 (để thống nhất số liệu đưa vào xếp hạng);</p><p>- Cục Tin học hóa cập nhật số liệu, đánh giá, xếp hạng.</p><p>- Cục Tin học hóa hoàn thiện báo cáo đánh giá, xếp hạng, trình lãnh đạo Bộ phê duyệt.</p><p>Kế hoạch triển khai: Quý 1 năm 2017.</p><p>Nội dung Quyết định phê duyệt Phương pháp và Phương pháp đánh giá chi tiết mức độ ứng dụng công nghệ thông tin của cơ quan nhà nước năm 2016 xem và tải về tại đây:</p><p>1. Quyết định số&nbsp;<a href=\"http://aita.gov.vn/Uploaded/QD_62_BTTTT_Phe%20duyet%20PP%20danh%20gia%20UDCNTT%20CQNN%202016.PDF\">62/QĐ-BTTTT</a>&nbsp;ngày 19/01/2017 của Bộ Thông tin và Truyền thông phê duyệt Phương pháp.</p><p>2. Phương pháp chi tiết ban hành kèm theo Quyết định số 62/QĐ-BTTTT:</p><p>-&nbsp;<a href=\"http://aita.gov.vn/Uploaded/Phuong%20phap_Danh%20gia%20UDCNTT%20CQNN%202016.PDF\">Phương pháp đánh giá mức độ ứng dụng công nghệ thông tin của cơ quan nhà nước năm 2016</a></p><p>- Các Phụ lục kèm theo Phương pháp:</p><p>+&nbsp;<a href=\"http://aita.gov.vn/Uploaded/Phu%20luc%201_Phuongphap_DanhgiaWebsite_DVCTT.pdf\">Phụ lục 1:&nbsp;</a><a href=\"http://aita.gov.vn/Uploaded/Phu%20luc%201_Phuongphap_DanhgiaWebsite_DVCTT.pdf\">Phương pháp đánh giá đối với hạng mục Trang/Cổng thông tin điện tử và cung cấp dịch vụ công trực tuyến;</a></p><p>+&nbsp;<a href=\"http://aita.gov.vn/Uploaded/Phu%20luc%202_Phuongphap_DanhgiaUDCNTT2016_Bo_ngang%20Bo.pdf\">Phụ lục 2:&nbsp;</a><a href=\"http://aita.gov.vn/Uploaded/Phu%20luc%202_Phuongphap_DanhgiaUDCNTT2016_Bo_ngang%20Bo.pdf\">Cách tính điểm đánh giá mức độ ứng dụng công nghệ thông tin các Bộ, cơ quan ngang Bộ;</a></p><p>+&nbsp;<a href=\"http://aita.gov.vn/Uploaded/Phu%20luc%203_Phuongphap_DanhgiaUDCNTT2016_thuoc%20CP.pdf\">Phụ lục 3:&nbsp;</a><a href=\"http://aita.gov.vn/Uploaded/Phu%20luc%203_Phuongphap_DanhgiaUDCNTT2016_thuoc%20CP.pdf\">Cách tính điểm đánh giá mức độ ứng dụng công nghệ thông tin các cơ quan thuộc Chính phủ;</a></p><p>+&nbsp;<a href=\"http://aita.gov.vn/Uploaded/Phu%20luc%204_Phuongphap_DanhgiaUDCNTT2016_Dia%20phuong.pdf\">Phụ lục 4:&nbsp;</a><a href=\"http://aita.gov.vn/Uploaded/Phu%20luc%204_Phuongphap_DanhgiaUDCNTT2016_Dia%20phuong.pdf\">Tiêu chí và Cách tính điểm đánh giá mức độ ứng dụng công nghệ thông tin các tỉnh, thành phố trực thuộc Trung ương.</a></p>', '', 'http://aita.gov.vn/tin-tuc/2083/bo-thong-tin-va-truyen-thong-ban-hanh-phuong-phap-danh-gia-muc-do-ung-dung-cong-nghe-thong-tin-cua-c', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (7, '', '', '<p>Chuyên gia kinh tế Lê Đăng Doanh cho rằng, hiện nay mô hình tăng trưởng của Việt Nam đã đến giới hạn tự nhiên và cuộc cách mạng công nghiệp 4.0 là một động lực lớn để Việt Nam thay đổi.</p><p>Theo ông Doanh, mỗi một doanh nghiệp bằng sự sáng tạo và năng động có thể đi vào cách mạng công nghiệp 4.0 theo cách của mình. Như một cửa hàng hoàn toàn có thể vận dụng công nghệ 4.0 để kết nối khách hàng để kiểm tra, bảo trì bảo dưỡng sản phẩm, hay một hiệu phở cũng có thể thực hiện 4.0 như có cần giao phở tới tận nhà hay không.</p><p>Vì thế, cách mạng công nghiệp 4.0 không phải là thứ gì cao siêu trên trời, mà từ nông nghiệp, đến người bán hàng, đến tiệm phở, đến ngân hàng… hoàn toàn có thể thực hiện ngay cách mạng 4.0. Mặc dù vậy, theo ông, để “đón sóng” được cách mạng 4.0 cần sự thay đổi chính sách, cơ chế, cần sự tái cơ cấu đổi mới mạnh mẽ từ Chính phủ.</p><p>Chuyên gia Võ Trí Thành cũng cho rằng, để “đón” và bắt kịp được cách mạng công nghiệp 4.0 cần bốn yếu tố. Thứ nhất là thể chế và lãnh đạo, trong đó vai trò người đứng đầu rất quan trọng; thứ hai là hệ thống giáo dục, đào tạo, kỹ năng mới và nhân lực số; thứ ba là thể chế thúc đẩy sáng tạo và trong sáng tạo thì doanh nghiệp phải là trung tâm – tức tính thực dụng phải rất cao; và thứ tư là an ninh mạng, an ninh kết nối.</p><p>Dưới góc nhìn của một chuyên gia công nghệ, Chủ tịch Hiệp hội Internet Việt Nam, ông Vũ Hoàng Liên, cho rằng, cuộc cách mạng thứ ba Việt Nam đã không bắt kịp, cuộc cách mạng thứ tư thì thách thức lớn hơn. Nếu để phát triển tự nhiên thì trước sau cũng tốt lên, cũng tịnh tiến, nhưng khoảng cách giữa Việt Nam và các nước không biết có rút ngắn được hay không.</p><p>Vì thế, theo ông Liên, muốn bắt kịp 4.0 phải có sự đột biến. Nhưng chỉ có Nhà nước mới có thể thúc đẩy tạo ra những đột biến. “Để bắt kịp cách mạng công nghiệp lần thứ 4, chúng ta có thể bắt kịp về tiêu dùng, tuy nhiên, để bắt kịp về sáng tạo và sản xuất thì cần phải có bàn tay mạnh mẽ từ Chính phủ”, ông nói.</p><p>Đại diện cho Hiệp hội phần mềm và dịch vụ&nbsp;công nghệ thông tin&nbsp;Việt Nam (VINASA), Phó chủ tịch Mai Duy Quang, cho rằng, Chính phủ phải tạo hành lang để doanh nghiệp, start-up công nghệ phát triển, đồng thời hỗ trợ doanh nghiệp truyền thống phát triển mạnh hơn.</p><p>“Khi cuộc cách mạng mới bắt đầu, không phải Chính phủ nào cũng nói về cuộc cách mạng này nhiều như ở Việt Nam. Cuộc cách mạng này không phải cuộc cách mạng của các “đại gia” mà là cuộc cách mạng của mọi người, trong đó có thể có những nhóm rất bé, chỉ có vài người nhưng những nhóm nhỏ đó sẽ thay đổi tương lai, diện mạo của các ngành kinh tế”, Chủ tịch FPT Trương Gia Bình, đưa ra một góc nhìn khác.</p><p>Theo TS Lê Đăng Doanh, “cuộc cách mạng công nghiệp 4.0 sẽ tạo cơ hội chưa từng thấy cho kinh tế Việt Nam, nhưng cũng đòi hỏi Chính phủ phải thay đổi nhiều chính sách để thành công”.</p><p>Tại phiên họp Chính phủ thường kỳ tháng 3/2017 ngày 3/4, Chính phủ đã ghi nhận và đánh giá cao nội dung Báo cáo chuyên đề về cuộc cách mạng công nghiệp&nbsp;lần thứ tư&nbsp;của Bộ Khoa học và Công nghệ và các chuyên gia Hiệp hội phần mềm và dịch vụ công nghệ thông tin Việt Nam (VINASA).</p><p>Chính phủ quyết nghị, cuộc cách mạng công nghiệp lần thứ 4 là xu hướng phát triển dựa trên nền tảng số hóa và kết nối, có quy mô tác động mạnh mẽ tới mọi mặt của đời sống kinh tế - xã hội, làm thay đổi phương thức và lực lượng sản xuất trong tương lai, có thể mang lại cho Việt Nam nhiều cơ hội để đẩy nhanh công nghiệp hóa, hiện đại hóa đồng thời cũng đưa đến thách thức đối với quá trình phát triển.</p><p>“Việt Nam cần chủ động có định hướng, giải pháp thiết thực để nắm bắt cơ hội, giảm thiểu các tác động tiêu cực của cuộc cách mạng công nghiệp lần thứ 4, trước hết là có bước đột phá về công nghệ thông tin”, Nghị quyết phiên họp Chính phủ nêu rõ và giao Bộ Khoa học và Công nghệ chủ trì, phối hợp với Bộ Thông tin và Truyền thông, Bộ Giáo dục và Đào tạo, các bộ, cơ quan liên quan và VINASA xây dựng dự thảo Chỉ thị về tăng cường năng lực tiếp cận cuộc cách mạng công nghiệp lần thứ 4, trình Thủ tướng Chính phủ trong tháng 4 năm 2017.</p><p>Thủ tướng Nguyễn Xuân Phúc đề nghị các Bộ trưởng phải nhận thức rõ, tập trung hơn vào việc này, “tránh tình trạng chỗ nào cũng nói cách mạng công nghiệp 4.0 nhưng hỏi làm gì cho bản thân bộ mình, ngành mình thì không ai biết rõ ràng”.</p><p>Trong quá trình thực hiện cách mạng công nghiệp 4.0, Thủ tướng nhấn mạnh tiếp tục thực hiện các chỉ đạo của Chính phủ về thúc đẩy môi trường kinh doanh lành mạnh, tạo điều kiện cho mọi thành phần kinh tế cùng phát triển, để nâng cao năng lực cạnh tranh quốc gia.</p><table align=\"center\">	<tbody>		<tr>			<td>Một khảo sát được thực hiện với 2.000 doanh nghiệp thuộc Hiệp hội Doanh nghiệp vừa và nhỏ Hà Nội cho thấy có đến 85% thể hiện sự quan tâm đến cuộc cách mạng công nghiệp 4.0.			<p>Trong 85% doanh nghiệp thể hiện sự quan tâm này, có 55% doanh nghiệp đánh giá cuộc cách mạng công nghiệp 4.0 sẽ có tác động rất lớn đến nền kinh tế Việt Nam; 23% đánh giá tác động bình thường;&nbsp;11% đánh giá không tác động lắm và 10% đánh giá không tác động; 6% không biết.</p>			<p>Nhưng về chiến lược, có đến 79% doanh nghiệp trong số này trả lời rằng họ... chưa làm gì để đón sóng cuộc cách mạng công nghiệp 4.0. 55% doanh nghiệp cũng cho biết đang tìm hiểu, nghiên cứu, 19% doanh nghiệp đã xây dựng kế hoạch, và chỉ có 12% doanh nghiệp đang triển khai.</p>			<p>Đối với các doanh nghiệp không quan tâm đến cuộc cách mạng 4.0, 67% doanh nghiệp cho hay, họ không thấy liên quan và ảnh hưởng nhiều đến doanh nghiệp; 56% cho rằng lĩnh vực hoạt động của doanh nghiệp không bị tác động nhiều; 76% doanh nghiệp cho rằng chưa hiểu rõ bản chất cuộc cách mạng công nghiệp 4.0. Trong khi đó, có đến 54% chưa có nhu cầu quan tâm.</p>			</td>		</tr>	</tbody></table>', '', 'http://baochinhphu.vn/Kinh-te/Cach-mang-40-va-ban-tay-Chinh-phu/302653.vgp', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (8, '', '', '<p>Chỉ thị nêu rõ, cuộc Cách mạng công nghiệp lần thứ 4 với xu hướng phát triển dựa trên nền tảng tích hợp cao độ của hệ thống kết nối số hóa - vật lý - sinh học với sự đột phá của Internet vạn vật và Trí tuệ nhân tạo đang làm thay đổi căn bản nền sản xuất của thế giới. Cách mạng công nghiệp lần thứ 4 với đặc điểm là tận dụng một cách triệt để sức mạnh lan toả của số hoá và công nghệ thông tin. Làn sóng công nghệ mới này đang diễn ra với tốc độ khác nhau tại các quốc gia trên thế giới, nhưng đang tạo ra tác động mạnh mẽ, ngày một gia tăng tới mọi mặt của đời sống kinh tế - xã hội, dẫn đến việc thay đổi phương thức và lực lượng sản xuất của xã hội.</p><p>Để chủ động nắm bắt cơ hội, đưa ra các giải pháp thiết thực&nbsp;tận dụng tối đa các lợi thế, đồng thời giảm thiểu những tác động tiêu cực của cuộc Cách mạng công nghiệp lần thứ 4 đối với Việt Nam, Thủ tướng Chính phủ yêu cầu Bộ trưởng, Thủ trưởng cơ quan ngang bộ, cơ quan thuộc Chính phủ, các cơ quan Trung ương, Chủ tịch UBND các tỉnh, thành phố trực thuộc Trung ương trong thời gian từ nay đến năm 2020 tập trung chỉ đạo, tổ chức thực hiện có hiệu quả các giải pháp, nhiệm vụ.</p><p>Cụ thể, tập trung thúc đẩy phát triển, tạo sự bứt phá thực sự về hạ tầng, ứng dụng và nhân lực công nghệ thông tin - truyền thông. Phát triển hạ tầng kết nối số và bảo đảm an toàn, an ninh mạng tạo điều kiện cho người dân và doanh nghiệp dễ dàng, bình đẳng trong tiếp cận các cơ hội phát triển nội dung số.</p><p>Đồng thời tiếp tục đẩy mạnh việc thực hiện các Nghị quyết số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=509&amp;_page=1&amp;mode=detail&amp;document_id=188180\">19-2017/NQ-CP</a>&nbsp;ngày 06/02/2017, số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=509&amp;_page=1&amp;mode=detail&amp;document_id=184664\">35/NQ-CP</a>&nbsp;ngày 16/5/2016 và số 36a/NQ-CP ngày 14/10/2015 của Chính phủ nhằm cải thiện môi trường cạnh tranh kinh doanh để thúc đẩy sự phát triển của doanh nghiệp, tạo điều kiện cho doanh nghiệp nhanh chóng hấp thụ và phát triển được các công nghệ sản xuất mới. Các bộ, ngành cần khẩn trương triển khai xây dựng chính phủ điện tử; tiếp tục chủ động rà soát, bãi bỏ các điều kiện kinh doanh không còn phù hợp; sửa đổi các quy định quản lý chuyên ngành đối với hàng hóa xuất khẩu, nhập khẩu theo hướng đơn giản hóa và hiện đại hoá thủ tục hành chính.</p><p>Bên cạnh đó rà soát lại các chiến lược, chương trình hành động, đề xuất xây dựng kế hoạch và các nhiệm vụ trọng tâm để triển khai phù hợp với xu thế phát triển của cách mạng công nghiệp lần thứ 4. Xây dựng chiến lược chuyển đổi số, nền quản trị thông minh, ưu tiên phát triển công nghiệp công nghệ số, nông nghiệp thông minh, du lịch thông minh, đô thị thông minh. Rà soát, lựa chọn phát triển sản phẩm chủ lực, sản phẩm cạnh tranh chiến lược của quốc gia bám sát các công nghệ sản xuất mới, tích hợp những công nghệ mới để tập trung đầu tư phát triển.</p><p>Thủ tướng Chính phủ cũng yêu cầu tập trung thúc đẩy hệ sinh thái khởi nghiệp đổi mới sáng tạo quốc gia theo hướng xây dựng các cơ chế, chính sách cụ thể, phù hợp để phát triển mạnh mẽ doanh nghiệp khởi nghiệp sáng tạo như: Có cơ chế tài chính thúc đẩy hoạt động nghiên cứu khoa học và phát triển công nghệ của doanh nghiệp với tôn chỉ doanh nghiệp là trung tâm; đổi mới cơ chế đầu tư, tài trợ nghiên cứu khoa học và phát triển công nghệ; có chính sách để phát triển mạnh mẽ doanh nghiệp khởi nghiệp sáng tạo; kết nối cộng đồng khoa học và công nghệ người Việt Nam ở nước ngoài và cộng đồng trong nước.</p><p>Thay đổi mạnh mẽ các chính sách, nội dung, phương pháp giáo dục và dạy nghề nhằm tạo ra nguồn nhân lực có khả năng tiếp nhận các xu thế công nghệ sản xuất mới, trong đó cần tập trung vào thúc đẩy đào tạo về khoa học, công nghệ, kỹ thuật và toán học (STEM), ngoại ngữ, tin học trong chương trình giáo dục phổ thông; đẩy mạnh tự chủ đại học, dạy nghề; thí điểm quy định về đào tạo nghề, đào tạo đại học đối với một số ngành đặc thù. Biến thách thức dân số cùng giá trị dân số vàng thành lợi thế trong hội nhập và phân công lao động quốc tế.</p><p><strong>Tập trung phát triển hạ tầng công nghệ thông tin</strong></p><p>Thủ tướng Chính phủ giao Bộ Thông tin và Truyền thông tập trung thúc đẩy phát triển hạ tầng công nghệ thông tin, có chính sách khuyến khích doanh nghiệp đầu tư, phát triển, kinh doanh công nghệ mới. Đẩy mạnh ứng dụng công nghệ thông tin - truyền thông đáp ứng yêu cầu hiện đại hóa công nghệ thông tin - truyền thông trong phạm vi cả nước, bảo đảm an toàn, đồng bộ, kết nối liên ngành và liên vùng. Trong đó, các doanh nghiệp viễn thông chú trọng hoàn thiện mạng truyền thông di động 4G, bảo đảm cung cấp dịch vụ ổn định trong toàn quốc từ năm 2018; có chính sách tiếp cận, nghiên cứu và phát triển 5G, đáp ứng yêu cầu Internet kết nối vạn vật trong thời gian sớm nhất.</p><p>Tập trung phát triển một số lĩnh vực, sản phẩm trọng điểm về công nghiệp công nghệ thông tin - truyền thông có vai trò then chốt trong cuộc Cách mạng công nghiệp lần thứ 4; ưu tiên, chú trọng phát triển nhân lực công nghệ thông tin, đặc biệt là nhân lực về an toàn, an ninh thông tin; chỉ đạo các cơ quan thông tin báo chí, truyền thông định hướng dư luận, giúp cho các tổ chức và người dân có nhận thức đúng về Cuộc cách mạng công nghiệp lần thứ 4.</p><p>Bộ Khoa học và Công nghệ tập trung thúc đẩy hệ sinh thái khởi nghiệp đổi mới sáng tạo quốc gia để phát triển mạnh mẽ doanh nghiệp khởi nghiệp sáng tạo. Chủ trì, phối hợp các bộ, ngành, địa phương triển khai có kết quả Đề án Hỗ trợ hệ sinh thái khởi nghiệp đổi mới sáng tạo quốc gia đến năm 2025 đã được Thủ tướng Chính phủ phê duyêt tại Quyết định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=2&amp;_page=1&amp;mode=detail&amp;document_id=184702\">844/QĐ-TTg</a>&nbsp;ngày 18/5/2016.</p><p>Tập trung xây dựng, thúc đẩy các hoạt động ứng dụng, nghiên cứu phát triển, chuyển giao các công nghệ chủ chốt của cuộc Cách mạng công nghiệp lần thứ 4. Xây dựng và trình Thủ tướng Chính phủ phê duyệt Đề án “Hệ Tri thức Việt số hoá” trong Quý II/2017.</p><p>Bộ Khoa học và Công nghệ chủ trì, phối hợp với các bộ, ngành, địa phương liên quan kết nối các chương trình, nhiệm vụ khoa học và công nghệ để tăng cường năng lực tiếp cận cuộc Cách mạng công ngiệp lần thứ 4. Trong đó, tập trung thực hiện có hiệu quả các Chương trình khoa học và công nghệ quốc gia về Toán học, Vật lý, Khoa học cơ bản; các chương trình Đổi mới công nghệ, Phát triển công nghệ cao, Sản phẩm quốc gia, Nâng cao năng suất chất lượng sản phẩm hàng hóa của doanh nghiệp, Sở hữu trí tuệ, Công nghiệp sinh học….</p><p>Thủ tướng Chính phủ giao Bộ Giáo dục và Đào tạo thúc đẩy triển khai giáo dục về khoa học, công nghệ, kỹ thuật và toán học (STEM) trong chương trình giáo dục phổ thông; tổ chức thí điểm tại một số trường phổ thông ngay từ năm học 2017 - 2018. Nâng cao năng lực nghiên cứu, giảng dạy trong các cơ sở giáo dục đại học; tăng cường giáo dục những kỹ năng, kiến thức cơ bản, tư duy sáng tạo, khả năng thích nghi với những yêu cầu của cuộc Cách mạng công nghiệp lần thứ 4.</p><p>Bộ Lao động - Thương binh và Xã hội đổi mới đào tạo, dạy nghề trong hệ thống các trường đào tạo nghề theo hướng phát triển nguồn nhân lực, chuyển đổi nghề nghiệp có kỹ năng phù hợp, có thể tiếp thu, làm chủ và khai thác vận hành hiệu quả những tiến bộ công nghệ của Cách mạng công nghiệp thứ 4; nghiên cứu, đề xuất các chính sách, giải pháp khắc phục, giảm thiểu tác động, ảnh hưởng của Cách mạng công nghiệp lần thứ 4 tới cơ cấu thị trường lao động, an sinh xã hội; báo cáo Thủ tướng Chính phủ trong tháng 12 năm 2017.</p><p><strong>Khuyến khích doanh nghiệp đầu tư đổi mới công nghệ</strong></p><p>Thủ tướng Chính phủ giao Bộ Tài chính tập trung xây dựng các cơ chế, chính sách về thuế, tài chính nhằm khuyến khích doanh nghiệp đầu tư cho các hoạt động đổi mới công nghệ, nghiên cứu phát triển và đầu tư kinh doanh trong lĩnh vực công nghệ thông tin và các công nghệ tiên tiến khác. Tiếp tục rà soát, khẩn trương thực hiện triệt để Nghị quyết số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=2&amp;_page=1&amp;mode=detail&amp;document_id=184816\">41/NQ-CP</a>&nbsp;ngày 26 tháng 5 năm 2016 của Chính phủ về chính sách ưu đãi thuế thúc đẩy việc phát triển và ứng dụng công nghệ thông tin tại Việt Nam.</p><p>Viện Hàn lâm Khoa học và Công nghệ Việt Nam,Viện Hàn lâm Khoa học xã hội Việt Nam nghiên cứu, đánh giá xu hướng vận động của cuộc Cách mạng công nghiệp lần thứ 4, kịp thời báo cáo Thủ tướng Chính phủ làm cơ sở chỉ đạo các bộ, ngành, địa phương xây dựng các nhiệm vụ, chiến lược, quy hoạch phát triển ngành, vùng, địa phương.</p><p>Viện Hàn lâm Khoa học và Công nghệ Việt Nam nắm bắt các xu thế phát triển khoa học và công nghệ; chủ trì, tổ chức triển khai các hướng nghiên cứu khoa học và công nghệ mũi nhọn, tiếp cận xu hướng công nghệ tiên tiến, hiện đại của Cách mạng công nghiệp lần thứ 4; trong đó bao gồm các nghiên cứu về công nghệ thông tin, vật lý, sinh học, trí tuệ nhân tạo, vật liệu,...</p><p>Thủ tướng Chính phủ yêu cầu UBND các tỉnh, thành phố trực thuộc Trung ương rà soát, quy hoạch phát triển vùng, địa phương; đề xuất xây dựng kế hoạch và các nhiệm vụ trọng tâm để triển khai phù hợp với xu thế phát triển của cách mạng công nghiệp lần thứ 4; rà soát các sản phẩm, lựa chọn sản phẩm chủ lực, phù hợp để tập trung đầu tư phát triển. Đẩy mạnh việc thực hiện một số nhiệm vụ cụ thể đã được Thủ tướng Chính phủ giao như: xây dựng thí điểm mô hình thành phố thông minh, đầu tư xây dựng và phát triển nông nghiệp công nghệ cao (tỉnh Bắc Ninh); thí điểm phổ cập kiến thức khoa học và công nghệ đến người dân qua điện thoại di động (tỉnh Bắc Giang); triển khai mô hình nông nghiệp ứng dụng công nghệ cao, phát triển sản phẩm chủ lực của tỉnh hướng tới quy mô sản xuất hàng hóa có sản lượng và chất lượng cao (tỉnh Hà Nam).</p><p>Hội đồng quốc gia về phát triển bền vững và nâng cao năng lực cạnh tranh lồng ghép nội dung triển khai Cuộc cách mạng công nghiệp lần thứ 4 trong quá trình tham mưu cho Chính phủ, Thủ tướng Chính phủ.</p>', '', 'http://baochinhphu.vn/Chi-dao-quyet-dinh-cua-Chinh-phu-Thu-tuong-Chinh-phu/Thu-tuong-chi-thi-tang-cuong-nang-luc-tiep-can-cuoc-Cach-mang-CN-lan-thu-4/305132.vgp', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (9, '', '', '<p>Các chính sách toàn cầu tác động tới việc thu hút đầu tư tư nhân tại Việt Nam như thế nào, đây là một vấn đề được đề cập tại Diễn đàn Doanh nghiệp Việt Nam (VBF) ngày 16/6 tại Hà Nội.</p><p>Diễn đàn do Phòng Thương mại và Công nghiệp Việt Nam (VCCI), Bộ Kế hoạch và Đầu tư, Ngân hàng Thế giới tổ chức, với sự tham dự của Phó Thủ tướng Chính phủ Vương Đình Huệ.</p><p><strong>Không bỏ trứng vào một giỏ</strong></p><p>Theo báo cáo của nhóm công tác đầu tư và thương mại của Diễn đàn, thì “Việt Nam đã khôn ngoan khi không bỏ hết trứng vào cái giỏ TPP”.</p><p>Ông Fred Burke, Trưởng nhóm công tác, cho rằng “trên thực tế, chúng ta có thể nói rằng Việt Nam không chỉ có kế hoạch B, mà còn có cả kế hoạch C, D, E, F và G” khi chính quyền mới của Hoa Kỳ ngay lập tức rút khỏi TPP.</p><p>Việt Nam là một ví dụ điển hình về các lợi ích tiềm năng trong thương mại toàn cầu, khi phát triển nhanh chóng từ một quốc gia gần như không có bất kỳ hoạt động thương mại nào vào năm 1990 để trở thành một quốc gia xuất khẩu hàng đầu đáng kể nhất của thế giới, ông Fred Burke nói thêm.</p><p>Các lĩnh vực xuất khẩu cụ thể mà nhóm công tác nhắc tới là may mặc, giày dép, hải sản, các sản phẩm nông nghiệp như gạo, cà phê, đồ nội thất và gần đây còn có các sản phẩm điện tử và phần mềm.</p><p>Sau khi TPP bị dừng, Việt Nam có hàng loạt lựa chọn. Trong đó, ông Fred Burke cho rằng kế hoạch B là Hiệp định Thuận lợi hóa Thương mại - hiệp định đa phương duy nhất trong vòng đàm phán Doha trong khuôn khổ WTO được ký kết, thông qua thành công và có hiệu lực từ 22/2/2017.</p><p>Tuy nhiên, Việt Nam phải chuẩn bị rất nhiều để thực thi hiệp định này bao gồm cả việc khởi động Ủy ban Quốc gia về Tạo thuận lợi thương mại và việc ký Hiệp định song phương về Hợp tác Hải quan với các đối tác thương mại chính. WTO ước tính rằng chỉ riêng hiệp định này cũng có thể làm giảm đến 20% các chi phí cho chuỗi cung ứng toàn cầu, giúp cho các quốc gia thực hiện hiệp định trở nên cạnh tranh hơn trên các thị trường toàn cầu.</p><p><strong>Kế hoạch C</strong></p><p>Tiếp theo, “Kế hoạch C” là tiếp tục thực hiện các cam kết của Việt Nam và các thỏa thuận khi gia nhập WTO năm 2007. Điều này sẽ bao gồm việc hoàn tất một số việc chưa hoàn thành như loại bỏ các thủ tục hành chính không cần thiết và gây phiền hà đối với việc kinh doanh và phân phối các sản phẩm nước ngoài.</p><p>Theo nhóm công tác, việc thực hiện các cam kết WTO khác đã mang lại những thay đổi đáng kể đối với nền kinh tế và xã hội Việt Nam, cải thiện đời sống người tiêu dùng nói riêng cũng như các doanh nghiệp phụ thuộc vào việc tiếp cận chuỗi cung ứng hàng hóa và dịch vụ toàn cầu để duy trì tính cạnh tranh trong nền kinh tế toàn cầu.</p><p>Còn&nbsp;<strong>Kế hoạch D</strong>&nbsp;là theo đuổi lộ trình của Cộng đồng Kinh tế ASEAN đối với hội nhập khu vực. Theo ông Fred Burke, Việt Nam đã trở thành quốc gia ASEAN xuất khẩu hàng đầu vào Hoa Kỳ cũng như dẫn đầu trong công cuộc cải cách và phát triển. Chính ASEAN được kỳ vọng sẽ trở thành nhà xuất khẩu lớn thứ ba trên thế giới vào năm 2018.</p><p>Điều này tạo các cơ hội thực sự cho các doanh nghiệp Việt Nam thử sức mình tại các thị trường dễ tiếp cận và thân thiện “gần sân nhà”. Việc tiếp tục hài hòa hoá các quy định thủ tục, miễn thị thực cho các thể nhân, và các động thái khác để giúp việc lưu chuyển vốn, hàng hoá và dịch vụ tự do hơn trong khu vực ASEAN để góp phần thắt chặt mối liên kết đặc biệt của ASEAN với tư cách là một hiệp hội kinh tế.</p><p>Trong khi đó, Hiệp định Thương mại Tự do (FTA) giữa ASEAN và Trung Quốc cũng tiếp tục cho phép Việt Nam nhập khẩu các nguyên liệu thô, linh kiện và các thiết bị từ Trung Quốc để lắp ráp các sản phẩm tại Việt Nam cho các thị trường quốc tế ở mức giá cạnh tranh.</p><p><strong>Kế hoạch E: TPP 11</strong></p><p>Trong khi đó, Kế hoạch E bao gồm việc theo đuổi các thoả thuận song phương và đa phương đang chờ ký kết, như FTA Việt Nam - EU, “TPP-11”, RCEP và các hiệp định đang chờ ký kết khác</p><p>Đứng đầu trong danh sách hiện nay là TPP 11 (tức là TPP không có Hoa Kỳ). Các cuộc họp giữa các quốc gia TPP 11 đều có triển vọng và một nghiên cứu đáng tin cậy bậc nhất từ Canada cho rằng hiệp định đó sẽ đem lại các lợi ích đáng kể.</p><p>Các hiệp định thương mại quốc tế khác đang chờ ký kết và có thể chẳng bao lâu nữa sẽ được hiện thực hoá bao gồm Hiệp định Thương mại Tự do Việt Nam - EU (&quot;EVFTA&quot;) đã được ký và đang chờ 27 Nghị viện châu Âu phê chuẩn và Hiệp định Đối tác Kinh tế Toàn diện Khu vực (&quot;RCEP&quot;), là khối thương mại khổng lồ bao gồm Trung Quốc và Ấn Độ cũng như hầu hết các nước Đông Nam Á và Australia nhưng không có Hoa Kỳ.</p><p>“Không có hiệp định nào trên đây loại trừ lẫn nhau. Trên thực tế, các hiệp định này bổ sung cho nhau để “lập nên một khối vững mạnh hơn toàn bộ các phần hợp thành”. Nhiều cơ hội thương mại hơn dẫn đến việc tập hợp các nguồn lực mang tính cạnh tranh hơn và Việt Nam cần tiếp tục chiến lược đa phương của mình để nắm bắt càng nhiều cơ hội như vậy càng tốt”, nhóm công tác nhận định.</p><p><strong>Kế hoạch F - Tiếp tục cải cách trong nước</strong></p><p>“Kế hoạch F” bao gồm việc tiếp tục các cải cách kinh tế và hành chính trong nước mà Việt Nam cần để duy trì tính cạnh tranh và xây dựng nhằm giảm nghèo và tiến lên một tầm cao mới trong việc phát triển kinh tế.</p><p>Cụ thể, tiếp tục các cải cách thủ tục hành chính để nâng cao vai trò của nhà nước trong việc hỗ trợ các ngành công nghiệp để cạnh tranh trên phạm vi toàn cầu, đầu tư hiệu quả hơn vào các cơ sở hạ tầng và cổ phần hóa các doanh nghiệp nhà nước để cắt giảm nguồn vốn mà các doanh nghiệp này rút ra khỏi nền kinh tế.</p><p>Nghị quyết 35 đã hỗ trợ rất nhiều đối với vấn đề này và tinh thần của văn bản quan trọng này cần được thực hiện một cách kiên quyết hơn nữa.</p><p><strong>Kế hoạch G - FTA song phương với Hoa Kỳ</strong></p><p>Mặc dù đã rút khỏi TPP, Hoa Kỳ vẫn tuyên bố quan tâm đến việc theo đuổi Hiệp định Thương mại tự do song phương với Việt Nam.</p><p>Theo ông Fred Burke, cũng là điều dễ hiểu khi các nhóm lợi ích kinh doanh Mỹ sẽ đòi hỏi việc gia tăng tiếp cận thị trường như một phần của thỏa thuận FTA và chính quyền Trump mong muốn thể hiện được lợi ích từ hoạt động xuất khẩu ngay lập tức cho Hoa Kỳ.</p><p>Việt Nam có thể biến điều này thành cơ hội để tăng tốc lộ trình để tiếp cận thị trường lẫn nhau tại thị trường Mỹ. Trong khi thỏa thuận song phương có thể không phải là phương án hiệu quả và hữu hiệu nhất, miễn là hai bên có sẵn nguồn nhân lực (các chuyên gia đàm phán có kinh nghiệm) thì thỏa thuận song phương đó có thể phù hợp và bổ sung cho các sáng kiến thương mại khác đã được đề cập ở trên.</p><p>“Nhìn chung, Việt Nam đang ở một vị trí thuận lợi để gặt hái các thành quả bằng cách thực hiện chiến lược hội nhập toàn cầu của mình bất kể việc Hoa Kỳ rút khỏi TPP, dựa trên số lượng các sáng kiến song phương, đa phương và nội địa mà Việt Nam đang theo đuổi”, nhóm công tác nhận định.</p>', '', 'http://baochinhphu.vn/Kinh-te/Hau-TPP-Viet-Nam-co-toi-6-ke-hoach-phong-xa/308856.vgp', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (10, '', '', '<p>Ông Phùng Thành (TP. Hà Nội) tham khảo Điểm d, Khoản 2, Điều 64 Nghị định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=174689\">63/2014/NĐ-CP</a>&nbsp;thì “Thời gian đánh giá hồ sơ dự thầu tối đa là 25 ngày, kể từ ngày mở thầu đến khi bên mời thầu có tờ trình đề nghị phê duyệt kết quả lựa chọn nhà thầu kèm theo báo cáo về kết quả lựa chọn nhà thầu”.</p><p>Tuy nhiên, Điều 4 Thông tư số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=183090\">23/2015/TT-BKHĐT</a>&nbsp;ngày 21/12/2015 của Bộ Kế hoạch và Đầu tư quy định chi tiết lập báo cáo đánh giá hồ sơ dự thầu lại hướng dẫn: “Thời gian đánh giá hồ sơ dự thầu tối đa là 45 ngày đối với đấu thầu trong nước, 60 ngày đối với đấu thầu quốc tế, kể từ ngày có thời điểm đóng thầu đến ngày bên mời thầu trình chủ đầu tư phê duyệt kết quả lựa chọn nhà thầu.</p><p>Thời gian đánh giá hồ sơ dự thầu không bao gồm thời gian thẩm định, phê duyệt, kể cả thời gian thẩm định kết quả đánh giá hồ sơ đề xuất về kỹ thuật đối với gói thầu áp dụng phương thức một giai đoạn hai túi hồ sơ. Trường hợp cần thiết, có thể kéo dài thời gian đánh giá hồ sơ dự thầu nhưng không quá 20 ngày và phải bảo đảm tiến độ thực hiện dự án”.</p><p>Ông Thành muốn hỏi, quy định về thời gian đánh giá hồ sơ dự thầu áp dụng theo Nghị định hay Thông tư?</p><p><em>Bộ Kế hoạch và Đầu tư trả lời vấn đề này như sau:</em></p><p>Điểm g, Khoản 1, Điều 12&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=171415\">Luật Đấu thầu</a>&nbsp;quy định, thời gian đánh giá hồ sơ dự thầu tối đa là 45 ngày đối với đấu thầu trong nước, kể từ ngày có thời điểm đóng thầu đến ngày bên mời thầu trình chủ đầu tư phê duyệt kết quả lựa chọn nhà thầu.</p><p>Thời gian đánh giá hồ sơ dự thầu tối đa là 60 ngày đối với đấu thầu quốc tế, kể từ ngày có thời điểm đóng thầu đến ngày bên mời thầu trình chủ đầu tư phê duyệt kết quả lựa chọn nhà thầu.</p><p>Trường hợp cần thiết, có thể kéo dài thời gian đánh giá hồ sơ dự thầu, hồ sơ đề xuất nhưng không quá 20 ngày và phải bảo đảm tiến độ thực hiện dự án.</p><p>Đối với trường hợp của ông Thành hỏi, thời gian đánh giá hồ sơ dự thầu phải tuân thủ theo quy định nêu trên.</p><p>Trường hợp gói thầu có quy mô nhỏ thì thời gian đánh giá hồ sơ dự thầu tối đa là 25 ngày, kể từ ngày mở thầu đến khi bên mời thầu có tờ trình đề nghị phê duyệt kết quả lựa chọn nhà thầu theo quy định tại Điểm d, Khoản 2, Điều 64 Nghị định số 63/2014/NĐ-CP của Chính phủ.</p>', '', 'http://baochinhphu.vn/Tra-loi-cong-dan/Thoi-gian-danh-gia-ho-so-du-thau-theo-nghi-dinh-hay-thong-tu/310779.vgp', '', 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (11, '', '', '<p>Tại Festival “Sáng tạo trẻ” toàn quốc lần thứ IX năm 2016, Ban tổ chức đã nhận được 219 hồ sơ đề cử của 44 Tỉnh Đoàn, Thành Đoàn, Đoàn trực thuộc. Trong 219 hồ sơ có 128 là các đề tài, giải pháp sáng tạo, chiếm 58,4%; 39 sản phẩm sáng tạo, chiếm 17,8% và 52 công trình sáng tạo, chiếm 23,7%.</p><p>Có 34 hồ sơ tiêu biểu xuất sắc được lựa chọn để tuyên dương, khen thưởng. Đây là các công trình, sản phẩm đã được ứng dụng vào thực tế lao động, sản xuất, học tập hoặc được đánh giá có khả năng áp dụng hiệu quả vào đời sống kinh tế - xã hội.</p><p>Một số công trình, sản phẩm nổi bật như: Sáng kiến “Cải tiến hệ đà giáo thi công khối cạnh trụ công trình cầu sông Rút, Quảng Ninh” của tác giả Nguyễn Văn Trường, nhân viên phòng kỹ thuật thi công Công ty Cổ phần cầu 12 Cienco 1, được áp dụng trong thực tế làm lợi 6,144 tỷ đồng.</p><p>Sản phẩm “Thiết bị giao tiếp thông minh dành cho người khuyết tật MultiGlass” của tác giả Lê Anh Tiến, Kỹ sư Công ty VP9 Việt Nam đạt Giải nhất ý tưởng triển lãm sản phẩm công nghệ Đại học Bách khoa Đà Nẵng 2015.</p><p>Đề tài “Hệ thống cảnh báo xâm nhập mặn - Ứng phó với biến đổi khí hậu” của tác giả Dương Duy Minh, học sinh Trường THPT Lê Anh Xuân đạt giải Nhì cuộc thi khoa học kỹ thuật cấp quốc gia dành cho học sinh trung học năm học 2015-2016...</p>', '', 'http://baochinhphu.vn/Khoa-hoc-Cong-nghe/Tuyen-duong-34-cong-trinh-sang-tao-tre/293873.vgp', NULL, 2, '', 0, 1, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_detail` (`id`, `titlesite`, `description`, `bodyhtml`, `keywords`, `sourcetext`, `files`, `imgposition`, `layout_func`, `copyright`, `allowed_send`, `allowed_print`, `allowed_save`) VALUES (12, '', '', '<div id=\"\"><p style=\"\">Phiên bản thử nghiệm đầu tiên của phần mềm Cổng thông tin dành riêng cho cơ quan nhà nước là NukeViet eGovernment 1.0 beta 1 đã được phát hành vào ngày 24/8 vừa qua.</p><p style=\"\">Nhóm các doanh nghiệp phát triển NukeViet đã thông tin về việc ra mắt phiên bản phần mềm Cổng thông tin dành riêng cho các cơ quan nhà nước từ hơn 1 năm trước, khi NukeViet ra mắt phần mềm vận hành website NukeViet CMS phiên bản 4.0. Tuy nhiên, thời điểm đó tên gọi của phần mềm mới chưa được công bố.</p><p style=\"\">Hiện tại, chưa có nhiều thông tin về NukeViet eGovernment. Nhưng dựa trên phiên bản thử nghiệm đã được phát hành thì NukeViet eGovernment cũng được phát hành theo giấy phép nguồn mở GNU/GPL như <a href=\"http://ictnews.vn/the-gioi-so/thu-thuat/huong-dan-cach-tu-xay-dung-website-voi-phien-ban-nukeviet-cms-4-2-moi-ra-mat-157734.ict\" target=\"_blank\">NukeViet CMS</a>.</p><p style=\"\">Thông báo ngắn gọn của nhà phát hành trước khi phiên bản phần mềm này được phát hành 2 ngày cho hay, Công ty cổ phần phát triển nguồn mở Việt Nam (VINADES) phối hợp với các doanh nghiệp thành viên trong cộng đồng NukeViet cho ra mắt phiên bản phần mềm NukeViet eGovernment là phiên bản NukeViet chuyên dùng cho các cơ quan nhà nước và chính quyền địa phương.</p><p style=\"\">Cũng trong thông báo này, nhóm phát triển cho biết mục đích ra đời của NukeViet eGovernment là thúc đẩy việc triển khai, ứng dụng cổng thông tin đi vào hiệu quả, khai thác tối đa lợi ích “cộng hưởng” của phần mềm nguồn mở, tăng tính kế thừa, và đặc biệt là mong muốn mang đến cho các cơ quan nhà nước và chính quyền các địa phương những trang web, cổng thông tin có khả năng nâng cấp liên tục, tức thời và không bao giờ phải “đập đi làm lại”.</p><p style=\"\">Hiện mã nguồn của phần mềm đã được công bố, các đơn vị quan tâm có thể tải về và thử nghiệm. Tuy nhiên, theo khuyến nghị của nhóm phát hành phần mềm thì phiên bản NukeViet eGovernment 1.0 beta là phiên bản dùng thử để kiểm tra lỗi, các đơn vị không nên sử dụng cho hệ thống chạy thật vì sẽ không có hỗ trợ nâng cấp.</p></div><p style=\"\">Các phiên bản thử nghiệm mới sẽ được phát hành hàng tuần cho đến khi bản chính thức ra mắt, và các đơn vị nên chờ bản chính thức để có thể sử dụng. Dự kiến, ngày phát hành phiên bản thử nghiệm tiếp theo của eGovernment là 31/8/2017.</p><p style=\"\">Bản đóng gói cài đặt của phần mềm cũng đã được phát hành tại địa chỉ website egov.nukeviet.vn, trang demo sản phẩm có địa chỉ egov-demo.nukeviet.vn, độc giả quan tâm có thể truy cập các website này để thử nghiệm phần mềm.</p><p style=\"\">Như vậy, NukeViet đã chính thức đánh dấu việc cung cấp phần mềm chuyên biệt cho các cơ quan nhà nước, thay thế cho việc các cơ qua nhà nước vẫn phải sử dụng phần mềm NukeViet CMS để triển khai các website, trang thông tin điện tử như trước đây.</p><p style=\"\">NukeViet eGovernment cũng trở thành phần mềm Cổng thông tin điện tử nguồn mở đầu tiên của Việt Nam dành cho khối cơ quan nhà nước mà mã nguồn được phát triển hoàn toàn bởi người Việt, không dựa trên các nền tảng của nước ngoài như Liferay hay Gatein Portal.</p><p style=\"\">Trước đó, tại Thông tư 20/2014/TT-BTTTT ban hành ngày 5/12/2014, NukeViet đã được Bộ TT&amp;TT đưa vào <a href=\"http://ictnews.vn/cntt/phan-mem/31-phan-mem-nguon-mo-duoc-uu-tien-dung-trong-co-quan-nha-nuoc-121978.ict\" target=\"_blank\">danh mục sản phẩm</a> phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước, ở nhóm sản phẩm quản trị nội dung web.</p><p style=\"\">Đại diện nhà phát hành NukeViet eGovernment khẳng định, trong bối cảnh ứng dụng cổng thông tin điện tử cho các cơ quan nhà nước ngày càng trở nên phổ biến nhưng lại đang tồn tại nhiều bất cập như tình trạng không được nâng cấp và bảo trì thường xuyên đã để lại những lỗ hổng bảo mật gây mất an toàn an ninh thông tin, sự ra đời một sản phẩm hoàn toàn do các kỹ sư Việt Nam làm chủ sẽ giúp các cơ quan nhà nước có thêm lựa chọn để sử dụng.</p><p style=\"\">“Đặc biệt, sản phẩm được phát hành dưới dạng phần mềm nguồn mở, ngoài việc tùy biến để sử dụng, các đơn vị còn có thể tham gia phát triển và đóng góp ngược cho mã nguồn gốc, điều mà không thể xảy ra với các phần mềm độc quyền”, đại diện nhà phát hành chia sẻ</p>', '', 'http://ictnews.vn/cntt/nghi-quyet-36nqtw/nukeviet-bat-ngo-tung-ra-phien-ban-phan-mem-cong-thong-tin-cho-co-quan-nha-nuoc-158033.ict#&gid=1&pid=1', '', 2, '', 0, 1, 1, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_logs`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_logs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `sid` mediumint(8) NOT NULL DEFAULT 0,
  `userid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `note` varchar(255) NOT NULL,
  `set_time` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_rows`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_rows` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT 0,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `edittime` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) NOT NULL DEFAULT 0,
  `publtime` int(11) unsigned NOT NULL DEFAULT 0,
  `exptime` int(11) unsigned NOT NULL DEFAULT 0,
  `archive` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT 0,
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `total_rating` int(11) NOT NULL DEFAULT 0,
  `click_rating` int(11) NOT NULL DEFAULT 0,
  `instant_active` tinyint(1) NOT NULL DEFAULT 0,
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `topicid` (`topicid`),
  KEY `admin_id` (`admin_id`),
  KEY `author` (`author`),
  KEY `title` (`title`),
  KEY `addtime` (`addtime`),
  KEY `edittime` (`edittime`),
  KEY `publtime` (`publtime`),
  KEY `exptime` (`exptime`),
  KEY `status` (`status`),
  KEY `instant_active` (`instant_active`),
  KEY `instant_creatauto` (`instant_creatauto`)
) ENGINE=MyISAM  AUTO_INCREMENT=13  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (1, 1, '1', 0, 1, 'Lưu Thủy', 1, 1502357163, 1502357163, 1, 8, 1494840180, 0, 2, 'Nghiên cứu, phát triển sản phẩm CNTT phục vụ Chính phủ điện tử', 'nghien-cuu-phat-trien-san-pham-cntt-phuc-vu-chinh-phu-dien-tu', 'Bộ Khoa học và Công nghệ đã ban hành Quyết định số 1090/QĐ-BKHCN và 1100/QĐ-BKHCN phê duyệt Danh mục nhiệm vụ khoa học và công nghệ đặt hàng thuộc Chương trình khoa học và công nghệ trọng điểm cấp quốc gia giai đoạn 2016 - 2020: &quot;Nghiên cứu công nghệ và phát triển sản phẩm công nghệ thông tin phục vụ Chính phủ điện tử&quot;', '2017_08/hinh-minh-hoa.jpg', 'Hình minh họa', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (2, 2, '2', 0, 1, 'Lê Sơn', 1, 1502357608, 1502444887, 1, 9, 1496136540, 0, 2, 'Quyết tâm cao để đẩy mạnh CCHC thực chất, hiệu quả hơn', 'quyet-tam-cao-de-day-manh-cchc-thuc-chat-hieu-qua-hon', 'Đây là chỉ đạo của Ủy viên Bộ Chính trị, Phó Thủ tướng Thường trực Trương Hòa Bình, Trưởng Ban Chỉ đạo Cải cách hành chính (CCHC) của Chính phủ tại Hội nghị trực tuyến toàn quốc sơ kết công tác 6 tháng đầu năm 2017 của Ban Chỉ đạo, tại Trụ sở Chính phủ, chiều 30/5.', '2017_08/ptt1.jpg', 'Phó Thủ tướng Thường trực Trương Hòa Bình phát biểu chỉ đạo tại hội nghị. Ảnh&#x3A; VGP&#x002F;Lê Sơn', 1, 1, '4', 1, 0, 8, 0, 5, 1, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (3, 2, '2,3', 0, 1, '', 2, 1502357918, 1502811208, 1, 1, 1419327360, 0, 2, 'NukeViet được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước', 'nukeviet-duoc-uu-tien-mua-sam-su-dung-trong-co-quan-to-chuc-nha-nuoc', 'Ngày 5/12/2014, Bộ trưởng Bộ TT&TT Nguyễn Bắc Son đã ký ban hành Thông tư 20/2014/TT-BTTTT (Thông tư 20) quy định về các sản phẩm phần mềm nguồn mở (PMNM) được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước. NukeViet (phiên bản 3.4.02 trở lên) là phần mềm được nằm trong danh sách này.', '2017_08/chuc-mung-nukeviet-thong-tu-20-bo-tttt.jpg', '', 1, 1, '4', 1, 0, 11, 0, 10, 2, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (4, 2, '2', 0, 1, 'Phương Nhi', 1, 1502358021, 1502444881, 1, 7, 1494495540, 0, 2, '11 lĩnh vực quan trọng cần ưu tiên bảo đảm an toàn thông tin mạng', '11-linh-vuc-quan-trong-can-uu-tien-bao-dam-an-toan-thong-tin-mang', 'Theo Quyết định số 632/QĐ-TTg của Thủ tướng Chính phủ, có 11 lĩnh vực quan trọng cần ưu tiên bảo đảm an toàn thông tin mạng.', '2017_08/image002.jpg', '', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (5, 3, '3', 0, 1, 'Nguyễn Thế Hùng', 3, 1502358170, 1504152071, 1, 4, 1490780460, 0, 2, '“Điểm mặt” 9 nhầm lẫn thường gặp về phần mềm nguồn mở', 'diem-mat-9-nham-lan-thuong-gap-ve-phan-mem-nguon-mo', 'Mặc dù sử dụng phần mềm nguồn mở đã trở thành một xu hướng tất yếu song đến nay vẫn còn không ít người vẫn nhầm lẫn về phần mềm nguồn mở, đặc biệt là khi so sánh phần mềm nguồn mở với phần mềm nguồn đóng.', '2017_08/phan_mem_nguon_mo.jpg', 'Tại Việt Nam, cộng đồng phần mềm nguồn mở Việt Nam đã bước đầu được hình thành và ngày càng lớn mạnh &#40;Ảnh minh họa. Nguồn&#x3A; Internet&#41;', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (6, 3, '3', 0, 1, 'Đinh Thị Thanh Vân', 4, 1502358287, 1502358287, 1, 3, 1486028580, 0, 2, 'Bộ Thông tin và Truyền thông ban hành Phương pháp đánh giá mức độ ứng dụng công nghệ thông tin của cơ quan nhà nước năm 2016', 'bo-thong-tin-va-truyen-thong-ban-hanh-phuong-phap-danh-gia-muc-do-ung-dung-cong-nghe-thong-tin-cua-co-quan-nha-nuoc-nam-2016', 'Ngày 19/01/2017, Bộ Thông tin và Truyền thông đã ban hành Quyết định số 62/QĐ-BTTTT về việc Phê duyệt Phương pháp đánh giá mức độ ứng dụng công nghệ thông tin của cơ quan nhà nước năm 2016.', '', '', 0, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (7, 4, '4', 0, 1, 'Thành Đạt', 1, 1502358418, 1502444898, 1, 5, 1491644700, 0, 2, 'Cách mạng 4.0 và bàn tay Chính phủ', 'cach-mang-4-0-va-ban-tay-chinh-phu', '“Để bắt kịp cách mạng công nghiệp lần thứ 4 cần phải có bàn tay mạnh mẽ từ Chính phủ”, quan điểm được nhiều chuyên gia đưa ra tại diễn đàn &quot;Cuộc cách mạng công nghiệp 4.0 - Được và mất&quot; vừa được tổ chức chiều 7/4.', '2017_08/cach-mang-4.0.jpg', 'Diễn đàn &quot;Cuộc cách mạng công nghiệp 4.0 - Được và mất&quot;', 1, 1, '4', 1, 0, 0, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (8, 5, '5', 0, 1, 'Minh Hiển', 1, 1502358510, 1502444892, 1, 6, 1493977620, 0, 2, 'Thủ tướng chỉ thị tăng cường năng lực tiếp cận cuộc Cách mạng CN lần thứ 4', 'thu-tuong-chi-thi-tang-cuong-nang-luc-tiep-can-cuoc-cach-mang-cn-lan-thu-4', 'Thủ tướng Chính phủ Nguyễn Xuân Phúc vừa ký Chỉ thị 16/CT-TTg về việc tăng cường năng lực tiếp cận cuộc Cách mạng công nghiệp lần thứ 4', '2017_08/cntt.jpg', 'Ảnh minh họa', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (9, 6, '3,4,6', 0, 1, 'Hà Chính', 1, 1502358576, 1502802497, 1, 10, 1497606480, 0, 2, 'Hậu TPP&#x3A; Việt Nam có tới 6 kế hoạch phòng xa', 'hau-tpp-viet-nam-co-toi-6-ke-hoach-phong-xa', 'Theo các nhà quan sát nước ngoài, “Việt Nam đã khôn khoan không bỏ hết trứng vào giỏ TPP” và Việt Nam không chỉ có “kế hoạch B” mà còn có cả kế hoạch C, D, E, F và G sau khi Hoa Kỳ rút khỏi Hiệp định này.', '', '', 0, 1, '4', 1, 0, 8, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (10, 7, '7', 0, 1, 'Chinhphu.vn', 1, 1502358714, 1510804474, 1, 11, 1499680260, 0, 2, 'Thời gian đánh giá hồ sơ dự thầu theo nghị định hay thông tư?', 'thoi-gian-danh-gia-ho-so-du-thau-theo-nghi-dinh-hay-thong-tu', 'Trường hợp gói thầu có quy mô nhỏ thì thời gian đánh giá hồ sơ dự thầu tối đa là 25 ngày, kể từ ngày mở thầu đến khi bên mời thầu có tờ trình đề nghị phê duyệt kết quả lựa chọn nhà thầu.', '', '', 0, 1, '4', 1, 0, 5, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (11, 8, '8', 0, 1, 'MK', 1, 1502358784, 1502358784, 1, 2, 1481449920, 0, 2, 'Tuyên dương 34 công trình sáng tạo trẻ', 'tuyen-duong-34-cong-trinh-sang-tao-tre', 'Tối 10/12, tại thành phố Vĩnh Yên, tỉnh Vĩnh Phúc, Trung ương Đoàn Thanh niên Cộng sản Hồ Chí Minh tổ chức tuyên dương và trao giải cho 34 công trình, đề tài, giải pháp sáng tạo trẻ năm 2016.', '2017_08/sang-tao-tre.jpg', 'Ảnh Dân trí', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_rows` (`id`, `catid`, `listcatid`, `topicid`, `admin_id`, `author`, `sourceid`, `addtime`, `edittime`, `status`, `weight`, `publtime`, `exptime`, `archive`, `title`, `alias`, `hometext`, `homeimgfile`, `homeimgalt`, `homeimgthumb`, `inhome`, `allowed_comm`, `allowed_rating`, `external_link`, `hitstotal`, `hitscm`, `total_rating`, `click_rating`, `instant_active`, `instant_template`, `instant_creatauto`) VALUES (12, 3, '3', 0, 1, '', 3, 1510831228, 1510831964, 1, 12, 1510830840, 0, 2, 'NukeViet bất ngờ tung ra phiên bản phần mềm Cổng thông tin cho cơ quan nhà nước', 'nukeviet-bat-ngo-tung-ra-phien-ban-phan-mem-cong-thong-tin-cho-co-quan-nha-nuoc', 'Mới ra mắt phiên bản NukeViet CMS 4.3 chưa lâu, phần mềm nguồn mở “made in Vietnam” NukeViet vừa bất ngờ tung ra phiên bản phần mềm Cổng thông tin dành riêng cho cơ quan nhà nước có tên gọi là NukeViet eGovernment.', 'nukeviet-egovernment.jpg', 'Ảnh chụp giao diện NukeViet Egovernment 1.0', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_sources`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_sources` (
  `sourceid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `logo` varchar(255) DEFAULT '',
  `weight` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `add_time` int(11) unsigned NOT NULL,
  `edit_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`sourceid`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  AUTO_INCREMENT=5  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_sources` (`sourceid`, `title`, `link`, `logo`, `weight`, `add_time`, `edit_time`) VALUES (1, 'baochinhphu.vn', 'http://baochinhphu.vn', '', 1, 1502357163, 1502357163)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_sources` (`sourceid`, `title`, `link`, `logo`, `weight`, `add_time`, `edit_time`) VALUES (2, 'mic.gov.vn', '', '', 2, 1502357918, 1502357918)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_sources` (`sourceid`, `title`, `link`, `logo`, `weight`, `add_time`, `edit_time`) VALUES (3, 'ictnews.vn', 'http://ictnews.vn', '', 3, 1502358170, 1502358170)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_news_sources` (`sourceid`, `title`, `link`, `logo`, `weight`, `add_time`, `edit_time`) VALUES (4, 'aita.gov.vn', 'http://aita.gov.vn', '', 4, 1502358287, 1502358287)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_tags`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_tags` (
  `tid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `numnews` mediumint(8) NOT NULL DEFAULT 0,
  `alias` varchar(250) NOT NULL DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `description` text DEFAULT NULL,
  `keywords` varchar(255) DEFAULT '',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_tags_id`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_tags_id` (
  `id` int(11) NOT NULL,
  `tid` mediumint(9) NOT NULL,
  `keyword` varchar(65) NOT NULL,
  UNIQUE KEY `id_tid` (`id`,`tid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_tmp`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_tmp` (
  `id` mediumint(8) unsigned NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `time_edit` int(11) NOT NULL,
  `time_late` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_news_topics`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_news_topics` (
  `topicid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `weight` smallint(5) NOT NULL DEFAULT 0,
  `keywords` text DEFAULT NULL,
  `add_time` int(11) NOT NULL DEFAULT 0,
  `edit_time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`topicid`),
  UNIQUE KEY `title` (`title`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_admins`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_admins` (
  `userid` int(11) unsigned NOT NULL DEFAULT 0,
  `subjectid` smallint(4) NOT NULL DEFAULT 0,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `add_content` tinyint(4) NOT NULL DEFAULT 0,
  `edit_content` tinyint(4) NOT NULL DEFAULT 0,
  `del_content` tinyint(4) NOT NULL DEFAULT 0,
  UNIQUE KEY `userid` (`userid`,`subjectid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_area`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_area` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `alias` varchar(249) NOT NULL,
  `title` varchar(249) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`,`parentid`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_area` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `addtime`, `weight`) VALUES (1, 0, 'Giao-duc-1', 'Giáo dục', '', '', 1412265295, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_area` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `addtime`, `weight`) VALUES (2, 0, 'Phap-quy-2', 'Pháp quy', '', '', 1412265295, 2)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_cat`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_cat` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `alias` varchar(249) NOT NULL,
  `title` varchar(249) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `newday` tinyint(2) unsigned NOT NULL DEFAULT 5,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`,`parentid`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=10  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (1, 0, 'Cong-van', 'Công văn', '', '', 5, 1412265295, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (2, 0, 'Thong-tu', 'Thông tư', '', '', 5, 1412265295, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (3, 0, 'Quyet-dinh', 'Quyết định', '', '', 5, 1412265295, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (4, 0, 'Nghi-dinh', 'Nghị định', '', '', 5, 1412265295, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (5, 0, 'Thong-bao', 'Thông báo', '', '', 5, 1412998152, 5)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (6, 0, 'Huong-dan', 'Hướng dẫn', '', '', 5, 1412998170, 6)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (7, 0, 'Bao-cao', 'Báo cáo', '', '', 5, 1412998182, 7)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (8, 0, 'Chi-thi', 'Chỉ thị', '', '', 5, 1412998193, 8)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_cat` (`id`, `parentid`, `alias`, `title`, `introduction`, `keywords`, `newday`, `addtime`, `weight`) VALUES (9, 0, 'Ke-hoach', 'Kế hoạch', '', '', 5, 1412998208, 9)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_config`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('nummain', '50')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('numsub', '50')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('typeview', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('down_in_home', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('detail_other', 'a:1:{i:0;s:3:\"cat\";}')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('detail_hide_empty_field', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('detail_show_link_cat', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('detail_show_link_area', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('detail_show_link_subject', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('detail_show_link_signer', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('detail_pdf_quick_view', '1')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_config` (`config_name`, `config_value`) VALUES ('other_numlinks', '5')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_examine`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_examine` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `weight` smallint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_row`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_row` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `replacement` varchar(255) NOT NULL DEFAULT '',
  `relatement` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `cid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `sid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `approval` tinyint(1) DEFAULT NULL,
  `sgid` smallint(4) unsigned NOT NULL DEFAULT 0,
  `note` text NOT NULL,
  `introtext` text NOT NULL,
  `bodytext` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `groups_view` varchar(255) NOT NULL,
  `groups_download` varchar(255) NOT NULL,
  `files` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `addtime` int(11) NOT NULL,
  `edittime` int(11) NOT NULL,
  `publtime` int(11) NOT NULL DEFAULT 0,
  `start_comm_time` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `end_comm_time` int(11) DEFAULT NULL,
  `startvalid` int(11) NOT NULL DEFAULT 0,
  `exptime` int(11) NOT NULL DEFAULT 0,
  `view_hits` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `download_hits` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `admin_add` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `admin_edit` mediumint(8) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=8  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (1, '', '', 'Dự thảo Thông tư quy định tiêu chuẩn chức danh nghề nghiệp viên chức tư vấn viên dịch vụ việc làm', 'Du-thao-Thong-tu-quy-dinh-tieu-chuan-chuc-danh-nghe-nghiep-vien-chuc-tu-van-vien-dich-vu-viec-lam-1', '&#x002F;2017&#x002F;TT-BLĐTB&amp;XH', 2, 5, NULL, 1, '', 'Bộ Lao động - Thương binh và Xã hội đang soạn thảo dự thảo Thông tư quy định tiêu chuẩn chức danh nghề nghiệp viên chức tư vấn viên dịch vụ việc làm. Cổng TTĐT Chính phủ xin giới thiệu toàn văn và đề nghị các cơ quan, tổ chức, cá nhân trong và ngoài nước nghiên cứu, đóng góp ý kiến', '', 'lao động,thương binh,xã hội,soạn thảo,thông tư,quy định,tiêu chuẩn,nghề nghiệp,viên chức,tư vấn,việc làm,giới thiệu,đề nghị,cơ quan,tổ chức,cá nhân,nghiên cứu', '6', '6', 'demo.pdf', 1, 1506571390, 1506571490, 0, 1504198800, NULL, 1514653200, 0, 0, 5, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (2, '', '', 'Dự thảo Luật đơn vị hành chính - kinh tế đặc biệt', 'Du-thao-Luat-don-vi-hanh-chinh-kinh-te-dac-biet-2', '&#x002F;2017&#x002F;BKH&amp;DT', 2, 2, NULL, 5, '', 'Bộ Kế hoạch và Đầu tư đang soạn thảo dự thảo Luật đơn vị hành chính - kinh tế đặc biệt. Cổng TTĐT Chính phủ xin giới thiệu toàn văn và đề nghị các cơ quan, tổ chức, cá nhân trong và ngoài nước nghiên cứu, đóng góp ý kiến.', '', 'kế hoạch,soạn thảo,đơn vị,kinh tế,đặc biệt,giới thiệu,đề nghị,cơ quan,tổ chức,cá nhân,nghiên cứu', '6', '6', 'demo.pdf', 1, 1506571915, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (3, '', '', 'Dự thảo Thông tư Sửa đổi Thông tư số 279&#x002F;2016&#x002F;TT-BTC ngày 14&#x002F;11&#x002F;2016 của Bộ Tài chính quy định mức thu, chế độ thu, nộp, quản lý và sử dụng phí trong công tác an toàn vệ sinh thực phẩm', 'Du-thao-Thong-tu-Sua-doi-Thong-tu-so-279-2016-TT-BTC-ngay-14-11-2016-cua-Bo-Tai-chinh-quy-dinh-muc-thu-che-do-thu-nop-quan-ly-va-su-dung-phi-trong-cong-tac-an-toan-ve-sinh-thuc-pham-3', '279&#x002F;2016&#x002F;TT-BTC', 1, 3, NULL, 1, '', 'Bộ Tài chính đang soạn thảo dự thảo Thông tư Sửa đổi Thông tư số 279&#x002F;2016&#x002F;TT-BTC ngày 14&#x002F;11&#x002F;2016  của Bộ Tài chính quy định mức thu, chế độ thu, nộp, quản lý  và sử dụng phí trong công tác an toàn vệ sinh thực phẩm. Cổng TTĐT Chính phủ xin giới thiệu toàn văn và đề nghị các cơ quan, tổ chức, cá nhân trong và ngoài nước nghiên cứu, đóng góp ý kiến.', '', 'tài chính,soạn thảo,thông tư,sửa đổi,quy định,chế độ,quản lý,sử dụng,công tác,an toàn,vệ sinh,thực phẩm,giới thiệu,đề nghị,cơ quan,tổ chức,cá nhân,nghiên cứu', '6', '6', 'demo.pdf', 1, 1506572019, 1506572047, 0, 1504198800, NULL, 0, 0, 0, 1, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (4, '', '', 'Dự thảo Nghị định quy định việc sắp xếp lại tài sản công', 'Du-thao-Nghi-dinh-quy-dinh-viec-sap-xep-lai-tai-san-cong-4', '279&#x002F;2016&#x002F;TT-BTC', 4, 3, NULL, 5, '', 'Bộ Tài chính đang soạn thảo dự thảo Thông tư Sửa đổi Thông tư số 279&#x002F;2016&#x002F;TT-BTC ngày 14&#x002F;11&#x002F;2016  của Bộ Tài chính quy định mức thu, chế độ thu, nộp, quản lý  và sử dụng phí trong công tác an toàn vệ sinh thực phẩm. Cổng TTĐT Chính phủ xin giới thiệu toàn văn và đề nghị các cơ quan, tổ chức, cá nhân trong và ngoài nước nghiên cứu, đóng góp ý kiến.', '', 'tài chính,soạn thảo,thông tư,sửa đổi,quy định,chế độ,quản lý,sử dụng,công tác,an toàn,vệ sinh,thực phẩm,giới thiệu,đề nghị,cơ quan,tổ chức,cá nhân,nghiên cứu', '6', '6', 'demo.pdf', 1, 1506572225, 0, 0, 0, NULL, 1519750800, 0, 0, 1, 1, 1, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (5, '', '', 'Dự thảo Nghị định sửa đổi, bổ sung một số quy định về cán bộ, công chức và người hoạt động không chuyên trách ở xã, phường, thị trấn', 'Du-thao-Nghi-dinh-sua-doi-bo-sung-mot-so-quy-dinh-ve-can-bo-cong-chuc-va-nguoi-hoat-dong-khong-chuyen-trach-o-xa-phuong-thi-tran-5', '&#x002F;2017&#x002F;BNV', 4, 6, NULL, 5, '', 'Bộ Nội vụ đang soạn thảo dự thảo Nghị định sửa đổi, bổ sung một số quy định về cán bộ, công chức và người hoạt động không chuyên trách ở xã, phường, thị trấn. Cổng TTĐT Chính phủ xin giới thiệu toàn văn và đề nghị các cơ quan, tổ chức, cá nhân trong và ngoài nước nghiên cứu, đóng góp ý kiến.', '', 'nội vụ,soạn thảo,nghị định,sửa đổi,bổ sung,quy định,cán bộ,hoạt động,chuyên trách,thị trấn,giới thiệu,đề nghị,cơ quan,tổ chức,cá nhân,nghiên cứu', '6', '6', 'demo.pdf', 1, 1506572426, 1506572464, 0, 1496250000, NULL, 1517418000, 0, 0, 0, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (6, '', '', 'Dự thảo Thông tư sửa đổi, bổ sung một số điều của Thông tư 36&#x002F;2014&#x002F;TT-NHNN ngày 20&#x002F;11&#x002F;2014 của Thống đốc Ngân hàng Nhà nước quy định các giới hạn, tỷ lệ bảo đảm an toàn trong hoạt động của TCTD, chi nhánh ngân hàng nước ngoài', 'Du-thao-Thong-tu-sua-doi-bo-sung-mot-so-dieu-cua-Thong-tu-36-2014-TT-NHNN-ngay-20-11-2014-cua-Thong-doc-Ngan-hang-Nha-nuoc-quy-dinh-cac-gioi-han-ty-le-bao-dam-an-toan-trong-hoat-dong-cua-TCTD-chi-nhanh-ngan-hang-nuoc-ngoai-6', '36&#x002F;2014&#x002F;TT-NHNN', 2, 3, 0, 5, '', 'Ngân hàng Nhà nước đang soạn thảo dự thảo Thông tư sửa đổi, bổ sung một số điều của Thông tư 36&#x002F;2014&#x002F;TT-NHNN ngày 20&#x002F;11&#x002F;2014 của Thống đốc Ngân hàng Nhà nước quy định các giới hạn, tỷ lệ bảo đảm an toàn trong hoạt động của TCTD, chi nhánh ngân hàng nước ngoài. Cổng TTĐT Chính phủ xin giới thiệu toàn văn và đề nghị các cơ quan, tổ chức, cá nhân trong và ngoài nước nghiên cứu, đóng góp ý kiến.', '', 'ngân hàng,nhà nước,soạn thảo,thông tư,sửa đổi,bổ sung,thống đốc,quy định,giới hạn,tỷ lệ,bảo đảm,an toàn,hoạt động,giới thiệu,đề nghị,cơ quan,tổ chức,cá nhân,nghiên cứu', '6', '6', 'demo.pdf', 1, 1506572619, 1510830862, 0, 1504198800, 0, 1538240400, 0, 0, 0, 0, 1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row` (`id`, `replacement`, `relatement`, `title`, `alias`, `code`, `cid`, `sid`, `approval`, `sgid`, `note`, `introtext`, `bodytext`, `keywords`, `groups_view`, `groups_download`, `files`, `status`, `addtime`, `edittime`, `publtime`, `start_comm_time`, `eid`, `end_comm_time`, `startvalid`, `exptime`, `view_hits`, `download_hits`, `admin_add`, `admin_edit`) VALUES (7, '', '', 'Dự thảo Thông tư hướng dẫn phòng và xử trí phản vệ', 'Du-thao-Thong-tu-huong-dan-phong-va-xu-tri-phan-ve-7', '&#x002F;2017&#x002F;BYT', 2, 4, 0, 5, '', 'Bộ Y tế đang soạn thảo dự thảo Thông tư hướng dẫn phòng và xử trí phản vệ. Cổng TTĐT Chính phủ xin giới thiệu toàn văn và đề nghị các cơ quan, tổ chức, cá nhân trong và ngoài nước nghiên cứu, đóng góp ý kiến.', '', 'y tế,soạn thảo,thông tư,hướng dẫn,xử trí,giới thiệu,đề nghị,cơ quan,tổ chức,cá nhân,nghiên cứu', '6', '6', 'demo.pdf', 1, 1506572792, 1510830855, 0, 1483203600, 0, 1504198800, 0, 0, 0, 0, 1, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_row_area`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_row_area` (
  `row_id` int(10) unsigned NOT NULL,
  `area_id` smallint(4) unsigned NOT NULL,
  UNIQUE KEY `alias` (`row_id`,`area_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row_area` (`row_id`, `area_id`) VALUES (1, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row_area` (`row_id`, `area_id`) VALUES (2, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row_area` (`row_id`, `area_id`) VALUES (3, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row_area` (`row_id`, `area_id`) VALUES (4, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row_area` (`row_id`, `area_id`) VALUES (5, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row_area` (`row_id`, `area_id`) VALUES (6, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_row_area` (`row_id`, `area_id`) VALUES (7, 2)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_set_replace`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_set_replace` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `oid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `nid` mediumint(8) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_signer`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_signer` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `offices` varchar(255) NOT NULL,
  `positions` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=6  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (1, 'Phạm Vũ Luận', '', 'Bộ trưởng', 1412265295)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (2, 'Bùi Văn Ga', '', 'Thứ trưởng', 1412265295)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (3, 'Nguyễn Thị Nghĩa', '', 'Thứ trưởng', 1412265295)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (4, 'Nguyễn Vinh Hiển', '', 'Thứ trưởng', 1412265295)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_signer` (`id`, `title`, `offices`, `positions`, `addtime`) VALUES (5, 'Khác', '', '', 1412265295)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_opinions_subject`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_opinions_subject` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `numcount` int(10) NOT NULL DEFAULT 0,
  `numlink` tinyint(2) NOT NULL DEFAULT 5,
  `addtime` int(11) unsigned NOT NULL DEFAULT 0,
  `weight` smallint(4) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=7  DEFAULT CHARSET=utf8mb4  COLLATE=utf8mb4_unicode_ci";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (1, 'Bo-GD-DT', 'Bộ GD&amp;ĐT', '', '', 1, 5, 1412265295, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (2, 'Bo-Ke-hoach-va-Dau-tu', 'Bộ Kế hoạch và Đầu tư', '', '', 1, 5, 1412265295, 2)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (3, 'Bo-tai-chinh', 'Bộ tài chính', '', '', 3, 5, 1412265295, 3)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (4, 'Khac', 'Khác', '', '', 1, 5, 1412265295, 6)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (5, 'Phong-LDTB-XH', 'Phòng LĐTB&amp;XH', '', '', 1, 5, 1506571413, 4)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_opinions_subject` (`id`, `alias`, `title`, `introduction`, `keywords`, `numcount`, `numlink`, `addtime`, `weight`) VALUES (6, 'Bo-noi-vu', 'Bộ nội vụ', '', '', 1, 5, 1506572448, 5)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_page`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_page` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `image` varchar(255) DEFAULT '',
  `imagealt` varchar(255) DEFAULT '',
  `imageposition` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `bodytext` mediumtext NOT NULL,
  `keywords` text DEFAULT NULL,
  `socialbutton` tinyint(4) NOT NULL DEFAULT 0,
  `activecomm` varchar(255) DEFAULT '',
  `layout_func` varchar(100) DEFAULT '',
  `weight` smallint(4) NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `add_time` int(11) NOT NULL DEFAULT 0,
  `edit_time` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hot_post` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=6  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_page` (`id`, `title`, `alias`, `image`, `imagealt`, `imageposition`, `description`, `bodytext`, `keywords`, `socialbutton`, `activecomm`, `layout_func`, `weight`, `admin_id`, `add_time`, `edit_time`, `status`, `hitstotal`, `hot_post`) VALUES (5, 'Thông báo', 'thong-bao', '', '', 0, '', '<strong>Chỉ dẫn cho người quản trị website:</strong><br  /> <br  /> Các liên kết đến bài viết này có nghĩa là menu bạn vừa truy cập là mục cần phải có cho website của các cơ quan nhà nước (căn cứ theo các quy định hiện hành về website/ cổng thông tin).<br  /> <br  /> Với NukeViet eGovernment bạn có nhiều cách để hoàn hiện các hạng mục này, bằng cách sử dụng các chức năng có sẵn trên phiên bản NukeViet eGovernment mặc định hoặc cài thêm các module có trên <a href=\"https://nukeviet.vn/vi/store/\">NukeViet Store</a><br  /> <br  /> Để có thể tìm kiếm và cài đặt các module liên quan tới NukeViet eGovernment, bạn có thể truy cập địa chỉ: <a href=\"https://nukeviet.vn/vi/store/egovernment/\" target=\"_blank\">https://nukeviet.vn/vi/store/egovernment/</a>', '', 1, '4', '', 1, 1, 1502769405, 1510830086, 1, 18, 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_page_config`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_page_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_page_config` (`config_name`, `config_value`) VALUES ('viewtype', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_page_config` (`config_name`, `config_value`) VALUES ('facebookapi', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_page_config` (`config_name`, `config_value`) VALUES ('per_page', '20')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_page_config` (`config_name`, `config_value`) VALUES ('news_first', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_page_config` (`config_name`, `config_value`) VALUES ('related_articles', '5')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_page_config` (`config_name`, `config_value`) VALUES ('copy_page', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_page_config` (`config_name`, `config_value`) VALUES ('alias_lower', '0')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_referer_stats`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_referer_stats` (
  `host` varchar(250) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `month01` int(11) NOT NULL DEFAULT 0,
  `month02` int(11) NOT NULL DEFAULT 0,
  `month03` int(11) NOT NULL DEFAULT 0,
  `month04` int(11) NOT NULL DEFAULT 0,
  `month05` int(11) NOT NULL DEFAULT 0,
  `month06` int(11) NOT NULL DEFAULT 0,
  `month07` int(11) NOT NULL DEFAULT 0,
  `month08` int(11) NOT NULL DEFAULT 0,
  `month09` int(11) NOT NULL DEFAULT 0,
  `month10` int(11) NOT NULL DEFAULT 0,
  `month11` int(11) NOT NULL DEFAULT 0,
  `month12` int(11) NOT NULL DEFAULT 0,
  `last_update` int(11) NOT NULL DEFAULT 0,
  UNIQUE KEY `host` (`host`),
  KEY `total` (`total`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_referer_stats` (`host`, `total`, `month01`, `month02`, `month03`, `month04`, `month05`, `month06`, `month07`, `month08`, `month09`, `month10`, `month11`, `month12`, `last_update`) VALUES ('mail-tester.com', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1500888181)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_referer_stats` (`host`, `total`, `month01`, `month02`, `month03`, `month04`, `month05`, `month06`, `month07`, `month08`, `month09`, `month10`, `month11`, `month12`, `last_update`) VALUES ('ami.responsivedesign.is', 2, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 1502702492)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_referer_stats` (`host`, `total`, `month01`, `month02`, `month03`, `month04`, `month05`, `month06`, `month07`, `month08`, `month09`, `month10`, `month11`, `month12`, `last_update`) VALUES ('l.facebook.com', 4, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 1503026849)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_referer_stats` (`host`, `total`, `month01`, `month02`, `month03`, `month04`, `month05`, `month06`, `month07`, `month08`, `month09`, `month10`, `month11`, `month12`, `last_update`) VALUES ('localhost', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1503128875)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_searchkeys`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_searchkeys` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `skey` varchar(250) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `search_engine` varchar(50) NOT NULL,
  KEY `id` (`id`),
  KEY `skey` (`skey`),
  KEY `search_engine` (`search_engine`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_siteterms`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_siteterms` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `image` varchar(255) DEFAULT '',
  `imagealt` varchar(255) DEFAULT '',
  `imageposition` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `bodytext` mediumtext NOT NULL,
  `keywords` text DEFAULT NULL,
  `socialbutton` tinyint(4) NOT NULL DEFAULT 0,
  `activecomm` varchar(255) DEFAULT '',
  `layout_func` varchar(100) DEFAULT '',
  `weight` smallint(4) NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `add_time` int(11) NOT NULL DEFAULT 0,
  `edit_time` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `hot_post` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_siteterms` (`id`, `title`, `alias`, `image`, `imagealt`, `imageposition`, `description`, `bodytext`, `keywords`, `socialbutton`, `activecomm`, `layout_func`, `weight`, `admin_id`, `add_time`, `edit_time`, `status`, `hitstotal`, `hot_post`) VALUES (1, 'Chính sách bảo mật (Quyền riêng tư)', 'privacy', '', '', 0, 'Tài liệu này cung cấp cho bạn (người truy cập và sử dụng website) chính sách liên quan đến bảo mật và quyền riêng tư của bạn', '<strong><a id=\"index\" name=\"index\"></a>Danh mục</strong><br /> <a href=\"#1\">Điều 1: Thu thập thông tin</a><br /> <a href=\"#2\">Điều 2: Lưu trữ &amp; Bảo vệ thông tin</a><br /> <a href=\"#3\">Điều 3: Sử dụng thông tin </a><br /> <a href=\"#4\">Điều 4: Tiếp nhận thông tin từ các đối tác </a><br /> <a href=\"#5\">Điều 5: Chia sẻ thông tin với bên thứ ba</a><br /> <a href=\"#6\">Điều 6: Thay đổi chính sách bảo mật</a>  <hr  /> <h2 style=\"text-align: justify;\"><a id=\"1\" name=\"1\"></a>Điều 1: Thu thập thông tin</h2>  <h3 style=\"text-align: justify;\">1.1. Thu thập tự động:</h3>  <div style=\"text-align: justify;\">Hệ thống này được xây dựng bằng mã nguồn NukeViet. Như mọi website hiện đại khác, chúng tôi sẽ thu thập địa chỉ IP và các thông tin web tiêu chuẩn khác của bạn như: loại trình duyệt, các trang bạn truy cập trong quá trình sử dụng dịch vụ, thông tin về máy tính &amp; thiết bị mạng v.v… cho mục đích phân tích thông tin phục vụ việc bảo mật và giữ an toàn cho hệ thống.</div>  <h3 style=\"text-align: justify;\">1.2. Thu thập từ các khai báo của chính bạn:</h3>  <div style=\"text-align: justify;\">Các thông tin do bạn khai báo cho chúng tôi trong quá trình làm việc như: đăng ký tài khoản, liên hệ với chúng tôi... cũng sẽ được chúng tôi lưu trữ phục vụ công việc chăm sóc khách hàng sau này.</div>  <h3 style=\"text-align: justify;\">1.3. Thu thập thông tin thông qua việc đặt cookies:</h3>  <p style=\"text-align: justify;\">Như mọi website hiện đại khác, khi bạn truy cập website, chúng tôi (hoặc các công cụ theo dõi hoặc thống kê hoạt động của website do các đối tác cung cấp) sẽ đặt một số File dữ liệu gọi là Cookies lên đĩa cứng hoặc bộ nhớ máy tính của bạn.</p>  <p style=\"text-align: justify;\">Một trong số những Cookies này có thể tồn tại lâu để thuận tiện cho bạn trong quá trình sử dụng, ví dụ như: lưu Email của bạn trong trang đăng nhập để bạn không phải nhập lại v.v…</p>  <h3 style=\"text-align: justify;\">1.4. Thu thập và lưu trữ thông tin trong quá khứ:</h3>  <p style=\"text-align: justify;\">Bạn có thể thay đổi thông tin cá nhân của mình bất kỳ lúc nào bằng cách sử dụng chức năng tương ứng. Tuy nhiên chúng tôi sẽ lưu lại những thông tin bị thay đổi để chống các hành vi xóa dấu vết gian lận.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"2\" name=\"2\"></a>Điều 2: Lưu trữ &amp; Bảo vệ thông tin</h2>  <div style=\"text-align: justify;\">Hầu hết các thông tin được thu thập sẽ được lưu trữ tại cơ sở dữ liệu của chúng tôi.<br /> <br /> Chúng tôi bảo vệ dữ liệu cá nhân của các bạn bằng các hình thức như: mật khẩu, tường lửa, mã hóa cùng các hình thức thích hợp khác và chỉ cấp phép việc truy cập và xử lý dữ liệu cho các đối tượng phù hợp, ví dụ chính bạn hoặc các nhân viên có trách nhiệm xử thông tin với bạn thông qua các bước xác định danh tính phù hợp.<br /> <br /> Mật khẩu của bạn được lưu trữ và bảo vệ bằng phương pháp mã hoá trong cơ sở dữ liệu của hệ thống, vì thế nó rất an toàn. Tuy nhiên, chúng tôi khuyên bạn không nên dùng lại mật khẩu này trên các website khác. Mật khẩu của bạn là cách duy nhất để bạn đăng nhập vào tài khoản thành viên của mình trong website này, vì thế hãy cất giữ nó cẩn thận. Trong mọi trường hợp bạn không nên cung cấp thông tin mật khẩu cho bất kỳ người nào dù là người của chúng tôi, người của NukeViet hay bất kỳ người thứ ba nào khác trừ khi bạn hiểu rõ các rủi ro khi để lộ mật khẩu. Nếu quên mật khẩu, bạn có thể sử dụng chức năng “<a href=\"" . NV_BASE_SITEURL . "users/lostpass/\">Quên mật khẩu</a>” trên website. Để thực hiện việc này, bạn cần phải cung cấp cho hệ thống biết tên thành viên hoặc địa chỉ Email đang sử dụng của mình trong tài khoản, sau đó hệ thống sẽ tạo ra cho bạn mật khẩu mới và gửi đến cho bạn để bạn vẫn có thể đăng nhập vào tài khoản thành viên của mình.  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p> </div>  <h2 style=\"text-align: justify;\"><a id=\"3\" name=\"3\"></a>Điều 3: Sử dụng thông tin</h2>  <p style=\"text-align: justify;\">Thông tin thu thập được sẽ được chúng tôi sử dụng để:</p>  <div style=\"text-align: justify;\">- Cung cấp các dịch vụ hỗ trợ &amp; chăm sóc khách hàng.</div>  <div style=\"text-align: justify;\">- Thực hiện giao dịch thanh toán &amp; gửi các thông báo trong quá trình giao dịch.</div>  <div style=\"text-align: justify;\">- Xử lý khiếu nại, thu phí &amp; giải quyết sự cố.</div>  <div style=\"text-align: justify;\">- Ngăn chặn các hành vi có nguy cơ rủi ro, bị cấm hoặc bất hợp pháp và đảm bảo tuân thủ đúng chính sách “Thỏa thuận người dùng”.</div>  <div style=\"text-align: justify;\">- Đo đạc, tùy biến &amp; cải tiến dịch vụ, nội dung và hình thức của website.</div>  <div style=\"text-align: justify;\">- Gửi bạn các thông tin về chương trình Marketing, các thông báo &amp; chương trình khuyến mại.</div>  <div style=\"text-align: justify;\">- So sánh độ chính xác của thông tin cá nhân của bạn trong quá trình kiểm tra với bên thứ ba.</div>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"4\" name=\"4\"></a>Điều 4: Tiếp nhận thông tin từ các đối tác</h2>  <div style=\"text-align: justify;\">Khi sử dụng các công cụ giao dịch và thanh toán thông qua internet, chúng tôi có thể tiếp nhận thêm các thông tin về bạn như địa chỉ username, Email, số tài khoản ngân hàng... Chúng tôi kiểm tra những thông tin này với cơ sở dữ liệu người dùng của mình nhằm xác nhận rằng bạn có phải là khách hàng của chúng tôi hay không nhằm giúp việc thực hiện các dịch vụ cho bạn được thuận lợi.<br /> <br /> Các thông tin tiếp nhận được sẽ được chúng tôi bảo mật như những thông tin mà chúng tôi thu thập được trực tiếp từ bạn.</div>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2><a id=\"5\" name=\"5\"></a>Điều 5: Chia sẻ thông tin với bên thứ ba</h2>  <p style=\"text-align: justify;\">Chúng tôi sẽ không chia sẻ thông tin cá nhân, thông tin tài chính... của bạn cho các bên thứ 3 trừ khi được sự đồng ý của chính bạn hoặc khi chúng tôi buộc phải tuân thủ theo các quy định pháp luật hoặc khi có yêu cầu từ cơ quan công quyền có thẩm quyền.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2><a id=\"6\" name=\"6\"></a>Điều 6: Thay đổi chính sách bảo mật</h2>  <p style=\"text-align: justify;\">Chính sách Bảo mật này có thể thay đổi theo thời gian. Chúng tôi sẽ không giảm quyền của bạn theo Chính sách Bảo mật này mà không có sự đồng ý rõ ràng của bạn. Chúng tôi sẽ đăng bất kỳ thay đổi Chính sách Bảo mật nào trên trang này và, nếu những thay đổi này quan trọng, chúng tôi sẽ cung cấp thông báo nổi bật hơn (bao gồm, đối với một số dịch vụ nhất định, thông báo bằng email về các thay đổi của Chính sách Bảo mật).</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <p style=\"text-align: right;\">Chính sách bảo mật mặc định này được xây dựng cho <a href=\"http://nukeviet.vn\" target=\"_blank\">NukeViet CMS</a>, được tham khảo từ website <a href=\"http://webnhanh.vn/vi/thiet-ke-web/detail/Chinh-sach-bao-mat-Quyen-rieng-tu-Privacy-Policy-2147/\">webnhanh.vn</a></p>', '', 0, '4', '', 1, 1, 1546504163, 1546504163, 1, 4, 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_siteterms` (`id`, `title`, `alias`, `image`, `imagealt`, `imageposition`, `description`, `bodytext`, `keywords`, `socialbutton`, `activecomm`, `layout_func`, `weight`, `admin_id`, `add_time`, `edit_time`, `status`, `hitstotal`, `hot_post`) VALUES (2, 'Điều khoản và điều kiện sử dụng', 'terms-and-conditions', '', '', 0, 'Đây là các điều khoản và điều kiện áp dụng cho website này. Truy cập và sử dụng website tức là bạn đã đồng ý với các quy định này.', '<div style=\"text-align: justify;\">Cảm ơn bạn đã sử dụng. Xin vui lòng đọc các Điều khoản một cách cẩn thận, và <a href=\"" . NV_BASE_SITEURL . "contact/\">liên hệ</a> với chúng tôi nếu bạn có bất kỳ câu hỏi. Bằng việc truy cập hoặc sử dụng website của chúng tôi, bạn đồng ý bị ràng buộc bởi các <a href=\"" . NV_BASE_SITEURL . "siteterms/terms-and-conditions.html\">Điều khoản và điều kiện</a> sử dụng cũng như <a href=\"" . NV_BASE_SITEURL . "siteterms/privacy.html\">Chính sách bảo mật</a> của chúng tôi. Nếu không đồng ý với các quy định này, bạn vui lòng ngưng sử dụng website.<br /> <br /> <strong><a id=\"index\" name=\"index\"></a>Danh mục</strong><br /> <a href=\"#1\">Điều 1: Điều khoản liên quan đến phần mềm vận hành website</a><br /> <a href=\"#2\">Điều 2: Giới hạn cho việc sử dụng Website và các tài liệu trên website</a><br /> <a href=\"#3\">Điều 3: Sử dụng thương hiệu</a><br /> <a href=\"#4\">Điều 4: Các hành vi bị nghiêm cấm</a><br /> <a href=\"#5\">Điều 5: Các đường liên kết đến các website khác</a><br /> <a href=\"#6\">Điều 6: Từ chối bảo đảm</a><br /> <a href=\"#7\">Điều 7: Luật áp dụng và cơ quan giải quyết tranh chấp</a><br /> <a href=\"#8\">Điều 8: Thay đổi điều khoản và điều kiện sử dụng</a></div>  <hr  /> <h2 style=\"text-align: justify;\"><a id=\"1\" name=\"1\"></a>Điều khoản liên quan đến phần mềm vận hành website</h2>  <p style=\"text-align: justify;\">- Website của chúng tôi sử dụng hệ thống NukeViet, là giải pháp về website/ cổng thông tin nguồn mở được phát hành theo giấy phép bản quyền phần mềm tự do nguồn mở “<a href=\"http://www.gnu.org/licenses/old-licenses/gpl-2.0.html\" target=\"_blank\">GNU General Public License</a>” (viết tắt là GNU/GPL hay GPL) và có thể tải về miễn phí tại trang web <a href=\"http://www.nukeviet.vn\" target=\"_blank\">www.nukeviet.vn</a>.<br /> - Website này do chúng tôi sở hữu, điều hành và duy trì. NukeViet (hiểu ở đây là “hệ thống NukeViet” (bao gồm nhân hệ thống NukeViet và các sản phẩm phái sinh như NukeViet CMS, NukeViet Portal, <a href=\"http://edu.nukeviet.vn\" target=\"_blank\">NukeViet Edu Gate</a>...), “www.nukeviet.vn”, “tổ chức NukeViet”, “ban điều hành NukeViet”, &quot;Ban Quản Trị NukeViet&quot; và nói chung là những gì liên quan đến NukeViet...) không liên quan gì đến việc chúng tôi điều hành website cũng như quy định bạn được phép làm và không được phép làm gì trên website này.<br /> - Hệ thống NukeViet là bộ mã nguồn được phát triển để xây dựng các website/ cổng thông tin trên mạng. Chúng tôi (chủ sở hữu, điều hành và duy trì website này) không hỗ trợ và khẳng định hay ngụ ý về việc có liên quan đến NukeViet. Để biết thêm nhiều thông tin về NukeViet, hãy ghé thăm website của NukeViet tại địa chỉ: <a href=\"http://nukeviet.vn\" target=\"_blank\">http://nukeviet.vn</a>.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"2\" name=\"2\"></a>Giới hạn cho việc sử dụng Website và các tài liệu trên website</h2>  <p style=\"text-align: justify;\">- Tất cả các quyền liên quan đến tất cả tài liệu và thông tin được hiển thị và/ hoặc được tạo ra sẵn cho Website này (ví dụ như những tài liệu được cung cấp để tải về) được quản lý, sở hữu hoặc được cho phép sử dụng bởi chúng tôi hoặc chủ sở hữu tương ứng với giấy phép tương ứng. Việc sử dụng các tài liệu và thông tin phải được tuân thủ theo giấy phép tương ứng được áp dụng cho chúng.<br /> - Ngoại trừ các tài liệu được cấp phép rõ ràng dưới dạng giấy phép tư liệu mở&nbsp;Creative Commons (gọi là giấy phép CC) cho phép bạn khai thác và chia sẻ theo quy định của giấy phép tư liệu mở, đối với các loại tài liệu không ghi giấy phép rõ ràng thì bạn không được phép sử dụng (bao gồm nhưng không giới hạn việc sao chép, chỉnh sửa toàn bộ hay một phần, đăng tải, phân phối, cấp phép, bán và xuất bản) bất cứ tài liệu nào mà không có sự cho phép trước bằng văn bản của chúng tôi ngoại trừ việc sử dụng cho mục đích cá nhân, nội bộ, phi thương mại.<br /> - Một số tài liệu hoặc thông tin có những điều khoản và điều kiện áp dụng riêng cho chúng không phải là giấy phép tư liệu mở, trong trường hợp như vậy, bạn được yêu cầu phải chấp nhận các điều khoản và điều kiện đó khi truy cập vào các tài liệu và thông tin này.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"3\" name=\"3\"></a>Sử dụng thương hiệu</h2>  <p style=\"text-align: justify;\">- VINADES.,JSC, NukeViet và thương hiệu gắn với NukeViet (ví dụ NukeViet CMS, NukeViet Portal, NukeViet Edu Gate...), logo công ty VINADES thuộc sở hữu của Công ty cổ phần phát triển nguồn mở Việt Nam.<br /> - Những tên sản phẩm, tên dịch vụ khác, logo và/ hoặc những tên công ty được sử dụng trong Website này là những tài sản đã được đăng ký độc quyền và được giữ bản quyền bởi những người sở hữu và/ hoặc người cấp phép tương ứng.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"4\" name=\"4\"></a>Các hành vi bị nghiêm cấm</h2>  <p style=\"text-align: justify;\">Người truy cập website này không được thực hiện những hành vi dưới đây khi sử dụng website:<br /> - Xâm phạm các quyền hợp pháp (bao gồm nhưng không giới hạn đối với các quyền riêng tư và chung) của người khác.<br /> - Gây ra sự thiệt hại hoặc bất lợi cho người khác.<br /> - Làm xáo trộn trật tự công cộng.<br /> - Hành vi liên quan đến tội phạm.<br /> - Tải lên hoặc phát tán thông tin riêng tư của tổ chức, cá nhân khác mà không được sự chấp thuận của họ.<br /> - Sử dụng Website này vào mục đích thương mại mà chưa được sự cho phép của chúng tôi.<br /> - Nói xấu, làm nhục, phỉ báng người khác.<br /> - Tải lên các tập tin chứa virus hoặc các tập tin bị hư mà có thể gây thiệt hại đến sự vận hành của máy tính khác.<br /> - Những hoạt động có khả năng ảnh hưởng đến hoạt động bình thường của website.<br /> - Những hoạt động mà chúng tôi cho là không thích hợp.<br /> - Những hoạt động bất hợp pháp hoặc bị cấm bởi pháp luật hiện hành.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"5\" name=\"5\"></a>Các đường liên kết đến các website khác</h2>  <p style=\"text-align: justify;\">- Các website của các bên thứ ba (không phải các trang do chúng tôi quản lý) được liên kết đến hoặc từ website này (&quot;Các website khác&quot;) được điều hành và duy trì hoàn toàn độc lập bởi các bên thứ ba đó và không nằm trong quyền điều khiển và/hoặc giám sát của chúng tôi. Việc truy cập các website khác phải được tuân thủ theo các điều khoản và điều kiện quy định bởi ban điều hành của website đó.<br /> - Chúng tôi không chịu trách nhiệm cho sự mất mát hoặc thiệt hại do việc truy cập và sử dụng các website bên ngoài, và bạn phải chịu mọi rủi ro khi truy cập các website đó.<br /> - Không có nội dung nào trong Website này thể hiện như một sự đảm bảo của chúng tôi về nội dung của các website khác và các sản phẩm và/ hoặc các dịch vụ xuất hiện và/ hoặc được cung cấp tại các website khác.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"6\" name=\"6\"></a>Từ chối bảo đảm</h2>  <p style=\"text-align: justify;\">NGOẠI TRỪ PHẠM VI BỊ CẤM THEO LUẬT PHÁP HIỆN HÀNH, CHÚNG TÔI SẼ:<br /> - KHÔNG CHỊU TRÁCH NHIỆM HAY BẢO ĐẢM, MỘT CÁCH RÕ RÀNG HAY NGỤ Ý, BAO GỒM SỰ BẢO ĐẢM VỀ TÍNH CHÍNH XÁC, MỨC ĐỘ TIN CẬY, HOÀN THIỆN, PHÙ HỢP CHO MỤC ĐÍCH CỤ THỂ, SỰ KHÔNG XÂM PHẠM QUYỀN CỦA BÊN THỨ 3 VÀ/HOẶC TÍNH AN TOÀN CỦA NỘI DỤNG WEBSITE NÀY, VÀ NHỮNG TUYÊN BỐ, ĐẢM BẢO CÓ LIÊN QUAN.<br /> - KHÔNG CHỊU TRÁCH NHIỆM CHO BẤT KỲ SỰ THIỆT HẠI HAY MẤT MÁT PHÁT SINH TỪ VIỆC TRUY CẬP VÀ SỬ DỤNG WEBSITE HAY VIỆC KHÔNG THỂ SỬ DỤNG WEBSITE.<br /> - CHÚNG TÔI CÓ THỂ THAY ĐỔI VÀ/HOẶC THAY THẾ NỘI DUNG CỦA WEBSITE NÀY, HOẶC TẠM HOÃN HOẶC NGƯNG CUNG CẤP CÁC DỊCH VỤ QUA WEBSITE NÀY VÀO BẤT KỲ THỜI ĐIỂM NÀO MÀ KHÔNG CẦN THÔNG BÁO TRƯỚC. CHÚNG TÔI SẼ KHÔNG CHỊU TRÁCH NHIỆM CHO BẤT CỨ THIỆT HẠI NÀO PHÁT SINH DO SỰ THAY ĐỔI HOẶC THAY THẾ NỘI DUNG CỦA WEBSITE.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"7\" name=\"7\"></a>Luật áp dụng và cơ quan giải quyết tranh chấp</h2>  <p style=\"text-align: justify;\">- Các Điều Khoản và Điều Kiện này được điều chỉnh và giải thích theo luật của Việt Nam trừ khi có điều khoản khác được cung cấp thêm. Tất cả tranh chấp phát sinh liên quan đến website này và các Điều Khoản và Điều Kiện sử dụng này sẽ được giải quyết tại các tòa án ở Việt Nam.<br /> - Nếu một phần nào đó của các Điều Khoản và Điều Kiện bị xem là không có giá trị, vô hiệu, hoặc không áp dụng được vì lý do nào đó, phần đó được xem như là phần riêng biệt và không ảnh hưởng đến tính hiệu lực của phần còn lại.<br /> - Trong trường hợp có sự mâu thuẫn giữa bản Tiếng Anh và bản Tiếng Việt của bản Điều Khoản và Điều Kiện này, bản Tiếng Việt sẽ được ưu tiên áp dụng.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"8\" name=\"8\"></a>Thay đổi điều khoản và điều kiện sử dụng</h2>  <div style=\"text-align: justify;\">Điều khoản và điều kiện sử dụng có thể thay đổi theo thời gian. Chúng tôi bảo lưu quyền thay đổi hoặc sửa đổi bất kỳ điều khoản và điều kiện cũng như các quy định khác, bất cứ lúc nào và theo ý mình. Chúng tôi sẽ có thông báo trên website khi có sự thay đổi. Tiếp tục sử dụng trang web này sau khi đăng các thay đổi tức là bạn đã chấp nhận các thay đổi đó. <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p> </div>', '', 0, '4', '', 2, 1, 1546504163, 1546504163, 1, 6, 0)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_siteterms_config`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_siteterms_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_siteterms_config` (`config_name`, `config_value`) VALUES ('viewtype', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_siteterms_config` (`config_name`, `config_value`) VALUES ('facebookapi', '')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_siteterms_config` (`config_name`, `config_value`) VALUES ('per_page', '20')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_siteterms_config` (`config_name`, `config_value`) VALUES ('news_first', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_siteterms_config` (`config_name`, `config_value`) VALUES ('related_articles', '5')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_siteterms_config` (`config_name`, `config_value`) VALUES ('copy_page', '0')";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_siteterms_config` (`config_name`, `config_value`) VALUES ('alias_lower', '0')";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_voting`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_voting` (
  `vid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(333) NOT NULL,
  `link` varchar(255) DEFAULT '',
  `acceptcm` int(2) NOT NULL DEFAULT 1,
  `active_captcha` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `groups_view` varchar(255) DEFAULT '',
  `publ_time` int(11) unsigned NOT NULL DEFAULT 0,
  `exp_time` int(11) unsigned NOT NULL DEFAULT 0,
  `act` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`vid`),
  UNIQUE KEY `question` (`question`)
) ENGINE=MyISAM  AUTO_INCREMENT=4  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting` (`vid`, `question`, `link`, `acceptcm`, `active_captcha`, `admin_id`, `groups_view`, `publ_time`, `exp_time`, `act`) VALUES (2, 'Bạn biết gì về NukeViet 4?', '', 1, 0, 1, '6', 1275318563, 0, 1)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting` (`vid`, `question`, `link`, `acceptcm`, `active_captcha`, `admin_id`, `groups_view`, `publ_time`, `exp_time`, `act`) VALUES (3, 'Lợi ích của phần mềm nguồn mở là gì?', '', 1, 0, 1, '6', 1275318563, 0, 1)";

$sql_create_table[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_vi_voting_rows`";
$sql_create_table[] = "CREATE TABLE `" . $db_config['prefix'] . "_vi_voting_rows` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `vid` smallint(5) unsigned NOT NULL,
  `title` varchar(245) NOT NULL DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `hitstotal` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vid` (`vid`,`title`)
) ENGINE=MyISAM  AUTO_INCREMENT=14  DEFAULT CHARSET=utf8";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting_rows` (`id`, `vid`, `title`, `url`, `hitstotal`) VALUES (5, 2, 'Một bộ sourcecode cho web hoàn toàn mới.', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting_rows` (`id`, `vid`, `title`, `url`, `hitstotal`) VALUES (6, 2, 'Mã nguồn mở, sử dụng miễn phí.', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting_rows` (`id`, `vid`, `title`, `url`, `hitstotal`) VALUES (7, 2, 'Sử dụng HTML5, CSS3 và hỗ trợ Ajax', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting_rows` (`id`, `vid`, `title`, `url`, `hitstotal`) VALUES (8, 2, 'Tất cả các ý kiến trên', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting_rows` (`id`, `vid`, `title`, `url`, `hitstotal`) VALUES (9, 3, 'Liên tục được cải tiến, sửa đổi bởi cả thế giới.', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting_rows` (`id`, `vid`, `title`, `url`, `hitstotal`) VALUES (10, 3, 'Được sử dụng miễn phí không mất tiền.', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting_rows` (`id`, `vid`, `title`, `url`, `hitstotal`) VALUES (11, 3, 'Được tự do khám phá, sửa đổi theo ý thích.', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting_rows` (`id`, `vid`, `title`, `url`, `hitstotal`) VALUES (12, 3, 'Phù hợp để học tập, nghiên cứu vì được tự do sửa đổi theo ý thích.', '', 0)";
$sql_create_table[] = "INSERT INTO `" . $db_config['prefix'] . "_vi_voting_rows` (`id`, `vid`, `title`, `url`, `hitstotal`) VALUES (13, 3, 'Tất cả các ý kiến trên', '', 0)";
