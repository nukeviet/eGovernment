-- NUKEVIET 4.0
-- Module: Database
-- http://www.nukeviet.vn
--
-- Host: 127.0.0.1
-- Generation Time: June 29, 2017, 10:36 AM GMT
-- Server version: 5.5.5-10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET SESSION `character_set_client`='utf8';
SET SESSION `character_set_results`='utf8';
SET SESSION `character_set_connection`='utf8';
SET SESSION `collation_connection`='utf8_general_ci';
SET NAMES 'utf8';
ALTER DATABASE DEFAULT CHARACTER SET `utf8` COLLATE `utf8_general_ci`;

--
-- Database: `egov_nukeviet`
--


-- ---------------------------------------


--
-- Table structure for table `nv4_authors`
--

DROP TABLE IF EXISTS `nv4_authors`;
CREATE TABLE `nv4_authors` (
  `admin_id` mediumint(8) unsigned NOT NULL,
  `editor` varchar(100) DEFAULT '',
  `lev` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `files_level` varchar(255) DEFAULT '',
  `position` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `edittime` int(11) NOT NULL DEFAULT '0',
  `is_suspend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `susp_reason` text,
  `check_num` varchar(40) NOT NULL,
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  `last_ip` varchar(45) DEFAULT '',
  `last_agent` varchar(255) DEFAULT '',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_authors`
--

INSERT INTO `nv4_authors` VALUES
(1, 'ckeditor', 1, 'adobe,archives,audio,documents,flash,images,real,video|1|1|1', 'Administrator', 0, 0, 0, '', '03c0f49cb8d98d93edce44b7efb5f34a', 1498721324, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/63.4.160 Chrome/57.4.2987.160 Safari/537.36');


-- ---------------------------------------


--
-- Table structure for table `nv4_authors_config`
--

DROP TABLE IF EXISTS `nv4_authors_config`;
CREATE TABLE `nv4_authors_config` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `keyname` varchar(32) DEFAULT NULL,
  `mask` tinyint(4) NOT NULL DEFAULT '0',
  `begintime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `notice` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `keyname` (`keyname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_authors_module`
--

DROP TABLE IF EXISTS `nv4_authors_module`;
CREATE TABLE `nv4_authors_module` (
  `mid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `module` varchar(50) NOT NULL,
  `lang_key` varchar(50) NOT NULL DEFAULT '',
  `weight` mediumint(8) NOT NULL DEFAULT '0',
  `act_1` tinyint(4) NOT NULL DEFAULT '0',
  `act_2` tinyint(4) NOT NULL DEFAULT '1',
  `act_3` tinyint(4) NOT NULL DEFAULT '1',
  `checksum` varchar(32) DEFAULT '',
  PRIMARY KEY (`mid`),
  UNIQUE KEY `module` (`module`)
) ENGINE=MyISAM  AUTO_INCREMENT=12  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_authors_module`
--

INSERT INTO `nv4_authors_module` VALUES
(1, 'siteinfo', 'mod_siteinfo', 1, 1, 1, 1, '4126cf0d85da9fa8a5344208940af28a'), 
(2, 'authors', 'mod_authors', 2, 1, 1, 1, 'e7cef979502668dd23666ac952f72db5'), 
(3, 'settings', 'mod_settings', 3, 1, 1, 0, 'd521d2f900666b931d68147242ade3fb'), 
(4, 'database', 'mod_database', 4, 1, 0, 0, 'c35124cd0c48c64785b738ed53fc7335'), 
(5, 'webtools', 'mod_webtools', 5, 1, 0, 0, '44c12075f58806d8797a5b9969f7b7fb'), 
(6, 'seotools', 'mod_seotools', 6, 1, 1, 0, '574e08fc140b4d50988e36cfa385565a'), 
(7, 'language', 'mod_language', 7, 1, 1, 0, '3b1845825c64801b1efeb3bc9928d1e0'), 
(8, 'modules', 'mod_modules', 8, 1, 1, 0, '4870cedbce0a055ae85fd7759680ff6f'), 
(9, 'themes', 'mod_themes', 9, 1, 1, 0, '09639c339643ecc198e9cf7f9730c87c'), 
(10, 'extensions', 'mod_extensions', 10, 1, 0, 0, '45a5c415c30cdda72bf60d5dc13d29c9'), 
(11, 'upload', 'mod_upload', 11, 1, 1, 1, '6fb80d88b8ad58ca4e5a3052c7455907');


-- ---------------------------------------


--
-- Table structure for table `nv4_banip`
--

DROP TABLE IF EXISTS `nv4_banip`;
CREATE TABLE `nv4_banip` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `ip` varchar(32) DEFAULT NULL,
  `mask` tinyint(4) NOT NULL DEFAULT '0',
  `area` tinyint(3) NOT NULL,
  `begintime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `notice` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_banners_click`
--

DROP TABLE IF EXISTS `nv4_banners_click`;
CREATE TABLE `nv4_banners_click` (
  `bid` mediumint(8) NOT NULL DEFAULT '0',
  `click_time` int(11) unsigned NOT NULL DEFAULT '0',
  `click_day` int(2) NOT NULL,
  `click_ip` varchar(15) NOT NULL,
  `click_country` varchar(10) NOT NULL,
  `click_browse_key` varchar(100) NOT NULL,
  `click_browse_name` varchar(100) NOT NULL,
  `click_os_key` varchar(100) NOT NULL,
  `click_os_name` varchar(100) NOT NULL,
  `click_ref` varchar(255) NOT NULL,
  KEY `bid` (`bid`),
  KEY `click_day` (`click_day`),
  KEY `click_ip` (`click_ip`),
  KEY `click_country` (`click_country`),
  KEY `click_browse_key` (`click_browse_key`),
  KEY `click_os_key` (`click_os_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_banners_clients`
--

DROP TABLE IF EXISTS `nv4_banners_clients`;
CREATE TABLE `nv4_banners_clients` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(60) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `reg_time` int(11) unsigned NOT NULL DEFAULT '0',
  `full_name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `yim` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `act` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `check_num` varchar(40) NOT NULL,
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  `last_ip` varchar(15) NOT NULL,
  `last_agent` varchar(255) NOT NULL,
  `uploadtype` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`),
  KEY `full_name` (`full_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_banners_plans`
--

DROP TABLE IF EXISTS `nv4_banners_plans`;
CREATE TABLE `nv4_banners_plans` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `blang` char(2) DEFAULT '',
  `title` varchar(250) NOT NULL,
  `description` text,
  `form` varchar(100) NOT NULL,
  `width` smallint(4) unsigned NOT NULL DEFAULT '0',
  `height` smallint(4) unsigned NOT NULL DEFAULT '0',
  `act` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `require_image` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  AUTO_INCREMENT=6  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_banners_plans`
--

INSERT INTO `nv4_banners_plans` VALUES
(1, '', 'Quang cao giua trang', '', 'sequential', 575, 72, 1, 1), 
(2, '', 'Quang cao trai', '', 'sequential', 212, 800, 1, 1), 
(3, '', 'Quang cao Phai', '', 'random', 250, 500, 1, 1), 
(4, '', 'Slider', '', 'sequential', 1080, 395, 1, 0), 
(5, '', 'Bản đồ hành chính', '', 'sequential', 255, 380, 1, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_banners_rows`
--

DROP TABLE IF EXISTS `nv4_banners_rows`;
CREATE TABLE `nv4_banners_rows` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `clid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL,
  `file_ext` varchar(100) NOT NULL,
  `file_mime` varchar(100) NOT NULL,
  `width` int(4) unsigned NOT NULL DEFAULT '0',
  `height` int(4) unsigned NOT NULL DEFAULT '0',
  `file_alt` varchar(255) DEFAULT '',
  `imageforswf` varchar(255) DEFAULT '',
  `click_url` varchar(255) DEFAULT '',
  `target` varchar(10) NOT NULL DEFAULT '_blank',
  `bannerhtml` mediumtext NOT NULL,
  `add_time` int(11) unsigned NOT NULL DEFAULT '0',
  `publ_time` int(11) unsigned NOT NULL DEFAULT '0',
  `exp_time` int(11) unsigned NOT NULL DEFAULT '0',
  `hits_total` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `act` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `clid` (`clid`)
) ENGINE=MyISAM  AUTO_INCREMENT=6  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_banners_rows`
--

INSERT INTO `nv4_banners_rows` VALUES
(2, 'vinades', 2, 0, 'vinades.jpg', 'jpg', 'image/jpeg', 212, 400, '', '', 'http://vinades.vn', '_blank', '', 1498555144, 1498555144, 0, 0, 1, 2), 
(3, 'Quang cao giua trang', 1, 0, 'webnhanh.jpg', 'png', 'image/jpeg', 575, 72, '', '', 'http://webnhanh.vn', '_blank', '', 1498555144, 1498555144, 0, 0, 1, 1), 
(4, 'slider1', 4, 0, 'slider1.jpg', 'jpg', 'image/jpeg', 1080, 395, '', '', '', '_blank', '', 1498721564, 1498721564, 0, 0, 1, 1), 
(5, 'hc1', 5, 0, 'bandohc.jpg', 'jpg', 'image/jpeg', 223, 284, '', '', '', '_blank', '', 1498725937, 1498725937, 0, 0, 1, 1);


-- ---------------------------------------


--
-- Table structure for table `nv4_config`
--

DROP TABLE IF EXISTS `nv4_config`;
CREATE TABLE `nv4_config` (
  `lang` varchar(3) NOT NULL DEFAULT 'sys',
  `module` varchar(50) NOT NULL DEFAULT 'global',
  `config_name` varchar(30) NOT NULL DEFAULT '',
  `config_value` text,
  UNIQUE KEY `lang` (`lang`,`module`,`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_config`
--

INSERT INTO `nv4_config` VALUES
('sys', 'site', 'closed_site', '0'), 
('sys', 'site', 'admin_theme', 'admin_default'), 
('sys', 'site', 'date_pattern', 'l, d/m/Y'), 
('sys', 'site', 'time_pattern', 'H:i'), 
('sys', 'site', 'online_upd', '1'), 
('sys', 'site', 'statistic', '1'), 
('sys', 'site', 'site_phone', ''), 
('sys', 'site', 'mailer_mode', ''), 
('sys', 'site', 'smtp_host', 'smtp.gmail.com'), 
('sys', 'site', 'smtp_ssl', '1'), 
('sys', 'site', 'smtp_port', '465'), 
('sys', 'site', 'smtp_username', 'user@gmail.com'), 
('sys', 'site', 'smtp_password', ''), 
('sys', 'site', 'googleAnalyticsID', ''), 
('sys', 'site', 'googleAnalyticsSetDomainName', '0'), 
('sys', 'site', 'googleAnalyticsMethod', 'classic'), 
('sys', 'site', 'googleMapsAPI', 'AIzaSyC8ODAzZ75hsAufVBSffnwvKfTOT6TnnNQ'), 
('sys', 'site', 'searchEngineUniqueID', ''), 
('sys', 'site', 'metaTagsOgp', '1'), 
('sys', 'site', 'pageTitleMode', 'pagetitle'), 
('sys', 'site', 'description_length', '170'), 
('sys', 'site', 'nv_unickmin', '4'), 
('sys', 'site', 'nv_unickmax', '20'), 
('sys', 'site', 'nv_upassmin', '8'), 
('sys', 'site', 'nv_upassmax', '32'), 
('sys', 'site', 'dir_forum', ''), 
('sys', 'site', 'nv_unick_type', '4'), 
('sys', 'site', 'nv_upass_type', '3'), 
('sys', 'site', 'allowmailchange', '1'), 
('sys', 'site', 'allowuserpublic', '1'), 
('sys', 'site', 'allowquestion', '0'), 
('sys', 'site', 'allowloginchange', '0'), 
('sys', 'site', 'allowuserlogin', '1'), 
('sys', 'site', 'allowuserloginmulti', '0'), 
('sys', 'site', 'allowuserreg', '2'), 
('sys', 'site', 'is_user_forum', '0'), 
('sys', 'site', 'openid_servers', ''), 
('sys', 'site', 'openid_processing', '0'), 
('sys', 'site', 'user_check_pass_time', '1800'), 
('sys', 'site', 'auto_login_after_reg', '1'), 
('sys', 'site', 'whoviewuser', '2'), 
('sys', 'define', 'nv_gfx_num', '6'), 
('sys', 'global', 'ssl_https', '0'), 
('sys', 'global', 'notification_active', '1'), 
('sys', 'global', 'notification_autodel', '15'), 
('sys', 'global', 'site_keywords', 'NukeViet, portal, mysql, php'), 
('sys', 'global', 'block_admin_ip', '0'), 
('sys', 'global', 'admfirewall', '0'), 
('sys', 'global', 'dump_autobackup', '1'), 
('sys', 'global', 'dump_backup_ext', 'gz'), 
('sys', 'global', 'dump_backup_day', '30'), 
('sys', 'global', 'gfx_chk', '3'), 
('sys', 'global', 'file_allowed_ext', 'adobe,archives,audio,documents,flash,images,real,video'), 
('sys', 'global', 'forbid_extensions', 'php,php3,php4,php5,phtml,inc'), 
('sys', 'global', 'forbid_mimes', ''), 
('sys', 'global', 'nv_max_size', '20971520'), 
('sys', 'global', 'upload_checking_mode', 'strong'), 
('sys', 'global', 'upload_alt_require', '1'), 
('sys', 'global', 'upload_auto_alt', '1'), 
('sys', 'global', 'useactivate', '2'), 
('sys', 'global', 'allow_sitelangs', 'vi'), 
('sys', 'global', 'read_type', '0'), 
('sys', 'global', 'rewrite_enable', '1'), 
('sys', 'global', 'rewrite_optional', '0'), 
('sys', 'global', 'rewrite_endurl', '/'), 
('sys', 'global', 'rewrite_exturl', '.html'), 
('sys', 'global', 'rewrite_op_mod', ''), 
('sys', 'global', 'autocheckupdate', '0'), 
('sys', 'global', 'autoupdatetime', '24'), 
('sys', 'global', 'gzip_method', '1'), 
('sys', 'global', 'authors_detail_main', '0'), 
('sys', 'global', 'spadmin_add_admin', '1'), 
('sys', 'global', 'timestamp', '3'), 
('sys', 'global', 'captcha_type', '1'), 
('sys', 'global', 'version', '4.1.02'), 
('sys', 'global', 'facebook_client_id', ''), 
('sys', 'global', 'facebook_client_secret', ''), 
('sys', 'global', 'google_client_id', ''), 
('sys', 'global', 'google_client_secret', ''), 
('sys', 'global', 'cookie_httponly', '1'), 
('sys', 'global', 'admin_check_pass_time', '1800'), 
('sys', 'global', 'cookie_secure', '0'), 
('sys', 'global', 'is_flood_blocker', '1'), 
('sys', 'global', 'max_requests_60', '40'), 
('sys', 'global', 'max_requests_300', '150'), 
('sys', 'global', 'is_login_blocker', '1'), 
('sys', 'global', 'login_number_tracking', '5'), 
('sys', 'global', 'login_time_tracking', '5'), 
('sys', 'global', 'login_time_ban', '1440'), 
('sys', 'global', 'nv_display_errors_list', '1'), 
('sys', 'global', 'display_errors_list', '1'), 
('sys', 'global', 'nv_auto_resize', '1'), 
('sys', 'global', 'dump_interval', '1'), 
('sys', 'global', 'cdn_url', ''), 
('sys', 'global', 'two_step_verification', '0'), 
('sys', 'global', 'recaptcha_sitekey', ''), 
('sys', 'global', 'recaptcha_secretkey', ''), 
('sys', 'global', 'recaptcha_type', 'image'), 
('sys', 'define', 'nv_gfx_width', '150'), 
('sys', 'define', 'nv_gfx_height', '40'), 
('sys', 'define', 'nv_max_width', '1500'), 
('sys', 'define', 'nv_max_height', '1500'), 
('sys', 'define', 'nv_live_cookie_time', '31104000'), 
('sys', 'define', 'nv_live_session_time', '0'), 
('sys', 'define', 'nv_anti_iframe', '0'), 
('sys', 'define', 'nv_anti_agent', '0'), 
('sys', 'define', 'nv_allowed_html_tags', 'embed, object, param, a, b, blockquote, br, caption, col, colgroup, div, em, h1, h2, h3, h4, h5, h6, hr, i, img, li, p, span, strong, s, sub, sup, table, tbody, td, th, tr, u, ul, ol, iframe, figure, figcaption, video, audio, source, track, code, pre'), 
('vi', 'global', 'site_domain', ''), 
('vi', 'global', 'site_name', 'Cổng Giao tiếp điện tử Thành Phố Hà Nội'), 
('vi', 'global', 'site_logo', ''), 
('vi', 'global', 'site_banner', ''), 
('vi', 'global', 'site_favicon', ''), 
('vi', 'global', 'site_description', 'Cổng GTĐT Hà Nội'), 
('vi', 'global', 'site_keywords', ''), 
('vi', 'global', 'theme_type', 'r,d,m'), 
('vi', 'global', 'site_theme', 'egov'), 
('vi', 'global', 'mobile_theme', 'mobile_default'), 
('vi', 'global', 'site_home_module', 'news'), 
('vi', 'global', 'switch_mobi_des', '1'), 
('vi', 'global', 'upload_logo', ''), 
('vi', 'global', 'upload_logo_pos', 'bottomRight'), 
('vi', 'global', 'autologosize1', '50'), 
('vi', 'global', 'autologosize2', '40'), 
('vi', 'global', 'autologosize3', '30'), 
('vi', 'global', 'autologomod', ''), 
('vi', 'global', 'name_show', '0'), 
('vi', 'global', 'cronjobs_next_time', '1498732902'), 
('vi', 'global', 'disable_site_content', 'Vì lý do kỹ thuật website tạm ngưng hoạt động. Thành thật xin lỗi các bạn vì sự bất tiện này!'), 
('vi', 'global', 'ssl_https_modules', ''), 
('vi', 'seotools', 'prcservice', ''), 
('vi', 'news', 'indexfile', 'viewcat_main_bottom'), 
('vi', 'news', 'per_page', '20'), 
('vi', 'news', 'st_links', '10'), 
('vi', 'news', 'homewidth', '100'), 
('vi', 'news', 'homeheight', '150'), 
('vi', 'news', 'blockwidth', '70'), 
('vi', 'news', 'blockheight', '75'), 
('vi', 'news', 'imagefull', '460'), 
('vi', 'news', 'copyright', 'Chú ý: Việc đăng lại bài viết trên ở website hoặc các phương tiện truyền thông khác mà không ghi rõ nguồn http://nukeviet.vn là vi phạm bản quyền'), 
('vi', 'news', 'showtooltip', '1'), 
('vi', 'news', 'tooltip_position', 'bottom'), 
('vi', 'news', 'tooltip_length', '150'), 
('vi', 'news', 'showhometext', '1'), 
('vi', 'news', 'timecheckstatus', '0'), 
('vi', 'news', 'config_source', '0'), 
('vi', 'news', 'show_no_image', ''), 
('vi', 'news', 'allowed_rating_point', '1'), 
('vi', 'news', 'facebookappid', ''), 
('vi', 'news', 'socialbutton', '1'), 
('vi', 'news', 'alias_lower', '1'), 
('vi', 'news', 'tags_alias', '0'), 
('vi', 'news', 'auto_tags', '0'), 
('vi', 'news', 'tags_remind', '1'), 
('vi', 'news', 'copy_news', '0'), 
('vi', 'news', 'structure_upload', 'Ym'), 
('vi', 'news', 'imgposition', '2'), 
('vi', 'news', 'htmlhometext', '0'), 
('vi', 'news', 'elas_use', '0'), 
('vi', 'news', 'elas_host', ''), 
('vi', 'news', 'elas_port', '9200'), 
('vi', 'news', 'elas_index', ''), 
('vi', 'news', 'instant_articles_active', '0'), 
('vi', 'news', 'instant_articles_template', 'default'), 
('vi', 'news', 'instant_articles_httpauth', '0'), 
('vi', 'news', 'instant_articles_username', 'admin'), 
('vi', 'news', 'instant_articles_password', 'kn-bouz4gbbuNFsh2Krr0Q,,'), 
('vi', 'news', 'instant_articles_livetime', '60'), 
('vi', 'news', 'instant_articles_gettime', '120'), 
('vi', 'news', 'instant_articles_auto', '1'), 
('vi', 'news', 'auto_postcomm', '1'), 
('vi', 'news', 'allowed_comm', '-1'), 
('vi', 'news', 'view_comm', '6'), 
('vi', 'news', 'setcomm', '4'), 
('vi', 'news', 'activecomm', '1'), 
('vi', 'news', 'emailcomm', '0'), 
('vi', 'news', 'adminscomm', ''), 
('vi', 'news', 'sortcomm', '0'), 
('vi', 'news', 'captcha', '1'), 
('vi', 'news', 'perpagecomm', '5'), 
('vi', 'news', 'timeoutcomm', '360'), 
('vi', 'page', 'auto_postcomm', '1'), 
('vi', 'page', 'allowed_comm', '-1'), 
('vi', 'page', 'view_comm', '6'), 
('vi', 'page', 'setcomm', '4'), 
('vi', 'page', 'activecomm', '0'), 
('vi', 'page', 'emailcomm', '0'), 
('vi', 'page', 'adminscomm', ''), 
('vi', 'page', 'sortcomm', '0'), 
('vi', 'page', 'captcha', '1'), 
('vi', 'page', 'perpagecomm', '5'), 
('vi', 'page', 'timeoutcomm', '360'), 
('vi', 'siteterms', 'auto_postcomm', '1'), 
('vi', 'siteterms', 'allowed_comm', '-1'), 
('vi', 'siteterms', 'view_comm', '6'), 
('vi', 'siteterms', 'setcomm', '4'), 
('vi', 'siteterms', 'activecomm', '0'), 
('vi', 'siteterms', 'emailcomm', '0'), 
('vi', 'siteterms', 'adminscomm', ''), 
('vi', 'siteterms', 'sortcomm', '0'), 
('vi', 'siteterms', 'captcha', '1'), 
('vi', 'siteterms', 'perpagecomm', '5'), 
('vi', 'siteterms', 'timeoutcomm', '360'), 
('vi', 'contact', 'bodytext', 'Để không ngừng nâng cao chất lượng dịch vụ và đáp ứng tốt hơn nữa các yêu cầu của Quý khách, chúng tôi mong muốn nhận được các thông tin phản hồi. Nếu Quý khách có bất kỳ thắc mắc hoặc đóng góp nào, xin vui lòng liên hệ với chúng tôi theo thông tin dưới đây. Chúng tôi sẽ phản hồi lại Quý khách trong thời gian sớm nhất.'), 
('sys', 'site', 'statistics_timezone', 'Asia/Bangkok'), 
('sys', 'site', 'site_email', 'webmaster@egov.nukeviet.dev'), 
('sys', 'global', 'error_set_logs', '1'), 
('sys', 'global', 'error_send_email', 'webmaster@egov.nukeviet.dev'), 
('sys', 'global', 'site_lang', 'vi'), 
('sys', 'global', 'my_domains', 'egov.nukeviet.dev'), 
('sys', 'global', 'cookie_prefix', 'nv4c_r4kJV'), 
('sys', 'global', 'session_prefix', 'nv4s_q5vJ67'), 
('sys', 'global', 'site_timezone', 'byCountry'), 
('sys', 'global', 'proxy_blocker', '0'), 
('sys', 'global', 'str_referer_blocker', '0'), 
('sys', 'global', 'lang_multi', '1'), 
('sys', 'global', 'lang_geo', '0'), 
('sys', 'global', 'ftp_server', 'localhost'), 
('sys', 'global', 'ftp_port', '21'), 
('sys', 'global', 'ftp_user_name', ''), 
('sys', 'global', 'ftp_user_pass', 'hDXTbp3-Q9qubVWqbTadZYQ1026d_kParm1Vqm02nWU,'), 
('sys', 'global', 'ftp_path', '/'), 
('sys', 'global', 'ftp_check_login', '0'), 
('vi', 'videoclips', 'idhomeclips', '0'), 
('vi', 'videoclips', 'auto_postcomm', '1'), 
('vi', 'videoclips', 'allowed_comm', '6'), 
('vi', 'videoclips', 'view_comm', '6'), 
('vi', 'videoclips', 'setcomm', '4'), 
('vi', 'videoclips', 'activecomm', '1'), 
('vi', 'videoclips', 'emailcomm', '0'), 
('vi', 'videoclips', 'adminscomm', ''), 
('vi', 'videoclips', 'sortcomm', '0'), 
('vi', 'videoclips', 'captcha', '1'), 
('vi', 'videoclips', 'perpagecomm', '5'), 
('vi', 'videoclips', 'timeoutcomm', '360');


-- ---------------------------------------


--
-- Table structure for table `nv4_cookies`
--

DROP TABLE IF EXISTS `nv4_cookies`;
CREATE TABLE `nv4_cookies` (
  `name` varchar(50) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `domain` varchar(100) NOT NULL DEFAULT '',
  `path` varchar(100) NOT NULL DEFAULT '',
  `expires` int(11) NOT NULL DEFAULT '0',
  `secure` tinyint(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `cookiename` (`name`,`domain`,`path`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_counter`
--

DROP TABLE IF EXISTS `nv4_counter`;
CREATE TABLE `nv4_counter` (
  `c_type` varchar(100) NOT NULL,
  `c_val` varchar(100) NOT NULL,
  `last_update` int(11) NOT NULL DEFAULT '0',
  `c_count` int(11) unsigned NOT NULL DEFAULT '0',
  `vi_count` int(11) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `c_type` (`c_type`,`c_val`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_counter`
--

INSERT INTO `nv4_counter` VALUES
('c_time', 'start', 0, 0, 0), 
('c_time', 'last', 0, 1498730827, 0), 
('total', 'hits', 1498730827, 29, 29), 
('year', '2017', 1498730827, 29, 29), 
('year', '2018', 0, 0, 0), 
('year', '2019', 0, 0, 0), 
('year', '2020', 0, 0, 0), 
('year', '2021', 0, 0, 0), 
('year', '2022', 0, 0, 0), 
('year', '2023', 0, 0, 0), 
('year', '2024', 0, 0, 0), 
('year', '2025', 0, 0, 0), 
('month', 'Jan', 0, 0, 0), 
('month', 'Feb', 0, 0, 0), 
('month', 'Mar', 0, 0, 0), 
('month', 'Apr', 0, 0, 0), 
('month', 'May', 0, 0, 0), 
('month', 'Jun', 1498730827, 29, 29), 
('month', 'Jul', 0, 0, 0), 
('month', 'Aug', 0, 0, 0), 
('month', 'Sep', 0, 0, 0), 
('month', 'Oct', 0, 0, 0), 
('month', 'Nov', 0, 0, 0), 
('month', 'Dec', 0, 0, 0), 
('day', '01', 0, 0, 0), 
('day', '02', 0, 0, 0), 
('day', '03', 0, 0, 0), 
('day', '04', 0, 0, 0), 
('day', '05', 0, 0, 0), 
('day', '06', 0, 0, 0), 
('day', '07', 0, 0, 0), 
('day', '08', 0, 0, 0), 
('day', '09', 0, 0, 0), 
('day', '10', 0, 0, 0), 
('day', '11', 0, 0, 0), 
('day', '12', 0, 0, 0), 
('day', '13', 0, 0, 0), 
('day', '14', 0, 0, 0), 
('day', '15', 0, 0, 0), 
('day', '16', 0, 0, 0), 
('day', '17', 0, 0, 0), 
('day', '18', 0, 0, 0), 
('day', '19', 0, 0, 0), 
('day', '20', 0, 0, 0), 
('day', '21', 0, 0, 0), 
('day', '22', 0, 0, 0), 
('day', '23', 0, 0, 0), 
('day', '24', 0, 0, 0), 
('day', '25', 0, 0, 0), 
('day', '26', 0, 0, 0), 
('day', '27', 1498557926, 3, 3), 
('day', '28', 1498644801, 8, 8), 
('day', '29', 1498730827, 18, 18), 
('day', '30', 0, 0, 0), 
('day', '31', 0, 0, 0), 
('dayofweek', 'Sunday', 0, 0, 0), 
('dayofweek', 'Monday', 0, 0, 0), 
('dayofweek', 'Tuesday', 1498557926, 3, 3), 
('dayofweek', 'Wednesday', 1498644801, 8, 8), 
('dayofweek', 'Thursday', 1498730827, 18, 18), 
('dayofweek', 'Friday', 0, 0, 0), 
('dayofweek', 'Saturday', 0, 0, 0), 
('hour', '00', 0, 0, 0), 
('hour', '01', 0, 0, 0), 
('hour', '02', 0, 0, 0), 
('hour', '03', 0, 0, 0), 
('hour', '04', 0, 0, 0), 
('hour', '05', 0, 0, 0), 
('hour', '06', 0, 0, 0), 
('hour', '07', 0, 0, 0), 
('hour', '08', 1498699897, 2, 2), 
('hour', '09', 1498703718, 4, 4), 
('hour', '10', 1498708689, 1, 1), 
('hour', '11', 1498710492, 2, 2), 
('hour', '12', 0, 0, 0), 
('hour', '13', 0, 0, 0), 
('hour', '14', 1498722871, 2, 2), 
('hour', '15', 1498726642, 2, 2), 
('hour', '16', 1498728987, 3, 3), 
('hour', '17', 1498730827, 2, 2), 
('hour', '18', 0, 0, 0), 
('hour', '19', 0, 0, 0), 
('hour', '20', 0, 0, 0), 
('hour', '21', 0, 0, 0), 
('hour', '22', 0, 0, 0), 
('hour', '23', 0, 0, 0), 
('bot', 'googlebot', 0, 0, 0), 
('bot', 'msnbot', 0, 0, 0), 
('bot', 'bingbot', 0, 0, 0), 
('bot', 'yahooslurp', 0, 0, 0), 
('bot', 'w3cvalidator', 0, 0, 0), 
('browser', 'opera', 0, 0, 0), 
('browser', 'operamini', 0, 0, 0), 
('browser', 'webtv', 0, 0, 0), 
('browser', 'explorer', 0, 0, 0), 
('browser', 'edge', 0, 0, 0), 
('browser', 'pocket', 0, 0, 0), 
('browser', 'konqueror', 0, 0, 0), 
('browser', 'icab', 0, 0, 0), 
('browser', 'omniweb', 0, 0, 0), 
('browser', 'firebird', 0, 0, 0), 
('browser', 'firefox', 1498557926, 3, 3), 
('browser', 'iceweasel', 0, 0, 0), 
('browser', 'shiretoko', 0, 0, 0), 
('browser', 'mozilla', 0, 0, 0), 
('browser', 'amaya', 0, 0, 0), 
('browser', 'lynx', 0, 0, 0), 
('browser', 'safari', 0, 0, 0), 
('browser', 'iphone', 0, 0, 0), 
('browser', 'ipod', 0, 0, 0), 
('browser', 'ipad', 0, 0, 0), 
('browser', 'chrome', 0, 0, 0), 
('browser', 'cococ', 0, 0, 0), 
('browser', 'android', 0, 0, 0), 
('browser', 'googlebot', 0, 0, 0), 
('browser', 'yahooslurp', 0, 0, 0), 
('browser', 'w3cvalidator', 0, 0, 0), 
('browser', 'blackberry', 0, 0, 0), 
('browser', 'icecat', 0, 0, 0), 
('browser', 'nokias60', 0, 0, 0), 
('browser', 'nokia', 0, 0, 0), 
('browser', 'msn', 0, 0, 0), 
('browser', 'msnbot', 0, 0, 0), 
('browser', 'bingbot', 0, 0, 0), 
('browser', 'netscape', 0, 0, 0), 
('browser', 'galeon', 0, 0, 0), 
('browser', 'netpositive', 0, 0, 0), 
('browser', 'phoenix', 0, 0, 0), 
('browser', 'Mobile', 0, 0, 0), 
('browser', 'bots', 0, 0, 0), 
('browser', 'Unknown', 0, 0, 0), 
('os', 'unknown', 0, 0, 0), 
('os', 'win', 0, 0, 0), 
('os', 'win10', 1498730827, 29, 29), 
('os', 'win8', 0, 0, 0), 
('os', 'win7', 0, 0, 0), 
('os', 'win2003', 0, 0, 0), 
('os', 'winvista', 0, 0, 0), 
('os', 'wince', 0, 0, 0), 
('os', 'winxp', 0, 0, 0), 
('os', 'win2000', 0, 0, 0), 
('os', 'apple', 0, 0, 0), 
('os', 'linux', 0, 0, 0), 
('os', 'os2', 0, 0, 0), 
('os', 'beos', 0, 0, 0), 
('os', 'iphone', 0, 0, 0), 
('os', 'ipod', 0, 0, 0), 
('os', 'ipad', 0, 0, 0), 
('os', 'blackberry', 0, 0, 0), 
('os', 'nokia', 0, 0, 0), 
('os', 'freebsd', 0, 0, 0), 
('os', 'openbsd', 0, 0, 0), 
('os', 'netbsd', 0, 0, 0), 
('os', 'sunos', 0, 0, 0), 
('os', 'opensolaris', 0, 0, 0), 
('os', 'android', 0, 0, 0), 
('os', 'irix', 0, 0, 0), 
('os', 'palm', 0, 0, 0), 
('country', 'AD', 0, 0, 0), 
('country', 'AE', 0, 0, 0), 
('country', 'AF', 0, 0, 0), 
('country', 'AG', 0, 0, 0), 
('country', 'AI', 0, 0, 0), 
('country', 'AL', 0, 0, 0), 
('country', 'AM', 0, 0, 0), 
('country', 'AN', 0, 0, 0), 
('country', 'AO', 0, 0, 0), 
('country', 'AQ', 0, 0, 0), 
('country', 'AR', 0, 0, 0), 
('country', 'AS', 0, 0, 0), 
('country', 'AT', 0, 0, 0), 
('country', 'AU', 0, 0, 0), 
('country', 'AW', 0, 0, 0), 
('country', 'AZ', 0, 0, 0), 
('country', 'BA', 0, 0, 0), 
('country', 'BB', 0, 0, 0), 
('country', 'BD', 0, 0, 0), 
('country', 'BE', 0, 0, 0), 
('country', 'BF', 0, 0, 0), 
('country', 'BG', 0, 0, 0), 
('country', 'BH', 0, 0, 0), 
('country', 'BI', 0, 0, 0), 
('country', 'BJ', 0, 0, 0), 
('country', 'BM', 0, 0, 0), 
('country', 'BN', 0, 0, 0), 
('country', 'BO', 0, 0, 0), 
('country', 'BR', 0, 0, 0), 
('country', 'BS', 0, 0, 0), 
('country', 'BT', 0, 0, 0), 
('country', 'BW', 0, 0, 0), 
('country', 'BY', 0, 0, 0), 
('country', 'BZ', 0, 0, 0), 
('country', 'CA', 0, 0, 0), 
('country', 'CD', 0, 0, 0), 
('country', 'CF', 0, 0, 0), 
('country', 'CG', 0, 0, 0), 
('country', 'CH', 0, 0, 0), 
('country', 'CI', 0, 0, 0), 
('country', 'CK', 0, 0, 0), 
('country', 'CL', 0, 0, 0), 
('country', 'CM', 0, 0, 0), 
('country', 'CN', 0, 0, 0), 
('country', 'CO', 0, 0, 0), 
('country', 'CR', 0, 0, 0), 
('country', 'CS', 0, 0, 0), 
('country', 'CU', 0, 0, 0), 
('country', 'CV', 0, 0, 0), 
('country', 'CY', 0, 0, 0), 
('country', 'CZ', 0, 0, 0), 
('country', 'DE', 0, 0, 0), 
('country', 'DJ', 0, 0, 0), 
('country', 'DK', 0, 0, 0), 
('country', 'DM', 0, 0, 0), 
('country', 'DO', 0, 0, 0), 
('country', 'DZ', 0, 0, 0), 
('country', 'EC', 0, 0, 0), 
('country', 'EE', 0, 0, 0), 
('country', 'EG', 0, 0, 0), 
('country', 'ER', 0, 0, 0), 
('country', 'ES', 0, 0, 0), 
('country', 'ET', 0, 0, 0), 
('country', 'EU', 0, 0, 0), 
('country', 'FI', 0, 0, 0), 
('country', 'FJ', 0, 0, 0), 
('country', 'FK', 0, 0, 0), 
('country', 'FM', 0, 0, 0), 
('country', 'FO', 0, 0, 0), 
('country', 'FR', 0, 0, 0), 
('country', 'GA', 0, 0, 0), 
('country', 'GB', 0, 0, 0), 
('country', 'GD', 0, 0, 0), 
('country', 'GE', 0, 0, 0), 
('country', 'GF', 0, 0, 0), 
('country', 'GH', 0, 0, 0), 
('country', 'GI', 0, 0, 0), 
('country', 'GL', 0, 0, 0), 
('country', 'GM', 0, 0, 0), 
('country', 'GN', 0, 0, 0), 
('country', 'GP', 0, 0, 0), 
('country', 'GQ', 0, 0, 0), 
('country', 'GR', 0, 0, 0), 
('country', 'GS', 0, 0, 0), 
('country', 'GT', 0, 0, 0), 
('country', 'GU', 0, 0, 0), 
('country', 'GW', 0, 0, 0), 
('country', 'GY', 0, 0, 0), 
('country', 'HK', 0, 0, 0), 
('country', 'HN', 0, 0, 0), 
('country', 'HR', 0, 0, 0), 
('country', 'HT', 0, 0, 0), 
('country', 'HU', 0, 0, 0), 
('country', 'ID', 0, 0, 0), 
('country', 'IE', 0, 0, 0), 
('country', 'IL', 0, 0, 0), 
('country', 'IN', 0, 0, 0), 
('country', 'IO', 0, 0, 0), 
('country', 'IQ', 0, 0, 0), 
('country', 'IR', 0, 0, 0), 
('country', 'IS', 0, 0, 0), 
('country', 'IT', 0, 0, 0), 
('country', 'JM', 0, 0, 0), 
('country', 'JO', 0, 0, 0), 
('country', 'JP', 0, 0, 0), 
('country', 'KE', 0, 0, 0), 
('country', 'KG', 0, 0, 0), 
('country', 'KH', 0, 0, 0), 
('country', 'KI', 0, 0, 0), 
('country', 'KM', 0, 0, 0), 
('country', 'KN', 0, 0, 0), 
('country', 'KR', 0, 0, 0), 
('country', 'KW', 0, 0, 0), 
('country', 'KY', 0, 0, 0), 
('country', 'KZ', 0, 0, 0), 
('country', 'LA', 0, 0, 0), 
('country', 'LB', 0, 0, 0), 
('country', 'LC', 0, 0, 0), 
('country', 'LI', 0, 0, 0), 
('country', 'LK', 0, 0, 0), 
('country', 'LR', 0, 0, 0), 
('country', 'LS', 0, 0, 0), 
('country', 'LT', 0, 0, 0), 
('country', 'LU', 0, 0, 0), 
('country', 'LV', 0, 0, 0), 
('country', 'LY', 0, 0, 0), 
('country', 'MA', 0, 0, 0), 
('country', 'MC', 0, 0, 0), 
('country', 'MD', 0, 0, 0), 
('country', 'MG', 0, 0, 0), 
('country', 'MH', 0, 0, 0), 
('country', 'MK', 0, 0, 0), 
('country', 'ML', 0, 0, 0), 
('country', 'MM', 0, 0, 0), 
('country', 'MN', 0, 0, 0), 
('country', 'MO', 0, 0, 0), 
('country', 'MP', 0, 0, 0), 
('country', 'MQ', 0, 0, 0), 
('country', 'MR', 0, 0, 0), 
('country', 'MT', 0, 0, 0), 
('country', 'MU', 0, 0, 0), 
('country', 'MV', 0, 0, 0), 
('country', 'MW', 0, 0, 0), 
('country', 'MX', 0, 0, 0), 
('country', 'MY', 0, 0, 0), 
('country', 'MZ', 0, 0, 0), 
('country', 'NA', 0, 0, 0), 
('country', 'NC', 0, 0, 0), 
('country', 'NE', 0, 0, 0), 
('country', 'NF', 0, 0, 0), 
('country', 'NG', 0, 0, 0), 
('country', 'NI', 0, 0, 0), 
('country', 'NL', 0, 0, 0), 
('country', 'NO', 0, 0, 0), 
('country', 'NP', 0, 0, 0), 
('country', 'NR', 0, 0, 0), 
('country', 'NU', 0, 0, 0), 
('country', 'NZ', 0, 0, 0), 
('country', 'OM', 0, 0, 0), 
('country', 'PA', 0, 0, 0), 
('country', 'PE', 0, 0, 0), 
('country', 'PF', 0, 0, 0), 
('country', 'PG', 0, 0, 0), 
('country', 'PH', 0, 0, 0), 
('country', 'PK', 0, 0, 0), 
('country', 'PL', 0, 0, 0), 
('country', 'PR', 0, 0, 0), 
('country', 'PS', 0, 0, 0), 
('country', 'PT', 0, 0, 0), 
('country', 'PW', 0, 0, 0), 
('country', 'PY', 0, 0, 0), 
('country', 'QA', 0, 0, 0), 
('country', 'RE', 0, 0, 0), 
('country', 'RO', 0, 0, 0), 
('country', 'RU', 0, 0, 0), 
('country', 'RW', 0, 0, 0), 
('country', 'SA', 0, 0, 0), 
('country', 'SB', 0, 0, 0), 
('country', 'SC', 0, 0, 0), 
('country', 'SD', 0, 0, 0), 
('country', 'SE', 0, 0, 0), 
('country', 'SG', 0, 0, 0), 
('country', 'SI', 0, 0, 0), 
('country', 'SK', 0, 0, 0), 
('country', 'SL', 0, 0, 0), 
('country', 'SM', 0, 0, 0), 
('country', 'SN', 0, 0, 0), 
('country', 'SO', 0, 0, 0), 
('country', 'SR', 0, 0, 0), 
('country', 'ST', 0, 0, 0), 
('country', 'SV', 0, 0, 0), 
('country', 'SY', 0, 0, 0), 
('country', 'SZ', 0, 0, 0), 
('country', 'TD', 0, 0, 0), 
('country', 'TF', 0, 0, 0), 
('country', 'TG', 0, 0, 0), 
('country', 'TH', 0, 0, 0), 
('country', 'TJ', 0, 0, 0), 
('country', 'TK', 0, 0, 0), 
('country', 'TL', 0, 0, 0), 
('country', 'TM', 0, 0, 0), 
('country', 'TN', 0, 0, 0), 
('country', 'TO', 0, 0, 0), 
('country', 'TR', 0, 0, 0), 
('country', 'TT', 0, 0, 0), 
('country', 'TV', 0, 0, 0), 
('country', 'TW', 0, 0, 0), 
('country', 'TZ', 0, 0, 0), 
('country', 'UA', 0, 0, 0), 
('country', 'UG', 0, 0, 0), 
('country', 'US', 0, 0, 0), 
('country', 'UY', 0, 0, 0), 
('country', 'UZ', 0, 0, 0), 
('country', 'VA', 0, 0, 0), 
('country', 'VC', 0, 0, 0), 
('country', 'VE', 0, 0, 0), 
('country', 'VG', 0, 0, 0), 
('country', 'VI', 0, 0, 0), 
('country', 'VN', 0, 0, 0), 
('country', 'VU', 0, 0, 0), 
('country', 'WS', 0, 0, 0), 
('country', 'YE', 0, 0, 0), 
('country', 'YT', 0, 0, 0), 
('country', 'YU', 0, 0, 0), 
('country', 'ZA', 0, 0, 0), 
('country', 'ZM', 0, 0, 0), 
('country', 'ZW', 0, 0, 0), 
('country', 'ZZ', 1498730827, 29, 29), 
('country', 'unkown', 0, 0, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_cronjobs`
--

DROP TABLE IF EXISTS `nv4_cronjobs`;
CREATE TABLE `nv4_cronjobs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `start_time` int(11) unsigned NOT NULL DEFAULT '0',
  `inter_val` int(11) unsigned NOT NULL DEFAULT '0',
  `run_file` varchar(255) NOT NULL,
  `run_func` varchar(255) NOT NULL,
  `params` varchar(255) DEFAULT NULL,
  `del` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_sys` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `act` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `last_time` int(11) unsigned NOT NULL DEFAULT '0',
  `last_result` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vi_cron_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `is_sys` (`is_sys`)
) ENGINE=MyISAM  AUTO_INCREMENT=10  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_cronjobs`
--

INSERT INTO `nv4_cronjobs` VALUES
(1, 1498555144, 5, 'online_expired_del.php', 'cron_online_expired_del', '', 0, 1, 1, 1498732602, 1, 'Xóa các dòng ghi trạng thái online đã cũ trong CSDL'), 
(2, 1498555144, 1440, 'dump_autobackup.php', 'cron_dump_autobackup', '', 0, 1, 1, 1498728987, 1, 'Tự động lưu CSDL'), 
(3, 1498555144, 60, 'temp_download_destroy.php', 'cron_auto_del_temp_download', '', 0, 1, 1, 1498732602, 1, 'Xóa các file tạm trong thư mục tmp'), 
(4, 1498555144, 30, 'ip_logs_destroy.php', 'cron_del_ip_logs', '', 0, 1, 1, 1498730827, 1, 'Xóa IP log files, Xóa các file nhật ký truy cập'), 
(5, 1498555144, 1440, 'error_log_destroy.php', 'cron_auto_del_error_log', '', 0, 1, 1, 1498728987, 1, 'Xóa các file error_log quá hạn'), 
(6, 1498555144, 360, 'error_log_sendmail.php', 'cron_auto_sendmail_error_log', '', 0, 1, 0, 0, 0, 'Gửi email các thông báo lỗi cho admin'), 
(7, 1498555144, 60, 'ref_expired_del.php', 'cron_ref_expired_del', '', 0, 1, 1, 1498732602, 1, 'Xóa các referer quá hạn'), 
(8, 1498555144, 60, 'check_version.php', 'cron_auto_check_version', '', 0, 1, 1, 1498732602, 1, 'Kiểm tra phiên bản NukeViet'), 
(9, 1498555144, 1440, 'notification_autodel.php', 'cron_notification_autodel', '', 0, 1, 1, 1498728987, 1, 'Xóa thông báo cũ');


-- ---------------------------------------


--
-- Table structure for table `nv4_extension_files`
--

DROP TABLE IF EXISTS `nv4_extension_files`;
CREATE TABLE `nv4_extension_files` (
  `idfile` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT 'other',
  `title` varchar(55) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `lastmodified` int(11) unsigned NOT NULL DEFAULT '0',
  `duplicate` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idfile`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_googleplus`
--

DROP TABLE IF EXISTS `nv4_googleplus`;
CREATE TABLE `nv4_googleplus` (
  `gid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `idprofile` varchar(25) NOT NULL DEFAULT '',
  `weight` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0',
  `edit_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`),
  UNIQUE KEY `idprofile` (`idprofile`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_language`
--

DROP TABLE IF EXISTS `nv4_language`;
CREATE TABLE `nv4_language` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `idfile` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `lang_key` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filelang` (`idfile`,`lang_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_language_file`
--

DROP TABLE IF EXISTS `nv4_language_file`;
CREATE TABLE `nv4_language_file` (
  `idfile` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(50) NOT NULL,
  `admin_file` varchar(200) NOT NULL DEFAULT '0',
  `langtype` varchar(50) NOT NULL,
  PRIMARY KEY (`idfile`),
  UNIQUE KEY `module` (`module`,`admin_file`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_logs`
--

DROP TABLE IF EXISTS `nv4_logs`;
CREATE TABLE `nv4_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(10) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `name_key` varchar(255) NOT NULL,
  `note_action` text NOT NULL,
  `link_acess` varchar(255) DEFAULT '',
  `userid` mediumint(8) unsigned NOT NULL,
  `log_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=262  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_logs`
--

INSERT INTO `nv4_logs` VALUES
(1, 'vi', 'siteinfo', 'Xóa toàn bộ nhật kí hệ thống', 'All', '', 1, 1498559501), 
(2, 'vi', 'login', '[admin] Đăng nhập', ' Client IP:127.0.0.1', '', 0, 1498613701), 
(3, 'vi', 'login', '[admin] Thoát khỏi tài khoản Quản trị', ' Client IP:127.0.0.1', '', 0, 1498613898), 
(4, 'vi', 'login', '[admin] Đăng nhập', ' Client IP:127.0.0.1', '', 0, 1498613911), 
(5, 'vi', 'news', 'Xóa bài viêt', 'Ra mắt công ty mã nguồn mở đầu tiên tại Việt Nam, Hãy trở thành nhà cung cấp dịch vụ của NukeViet&#33;, Tuyển dụng lập trình viên PHP phát triển NukeViet, Tuyển dụng chuyên viên đồ hoạ phát triển NukeViet, Tuyển dụng lập trình viên front-end (HTML/CSS/JS) phát triển NukeViet, Mã nguồn mở NukeViet giành giải ba Nhân tài đất Việt 2011, NukeViet được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước, Công ty VINADES tuyển dụng nhân viên kinh doanh, Chương trình thực tập sinh tại công ty VINADES, Học việc tại công ty VINADES, NukeViet được Bộ GD&amp;ĐT đưa vào Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016, Hỗ trợ tập huấn và triển khai NukeViet cho các Phòng, Sở GD&amp;ĐT, NukeViet 4.0 có gì mới?', '', 1, 1498615565), 
(6, 'vi', 'news', 'Xóa Chuyên mục và các bài viết', 'Tuyển dụng', '', 1, 1498615585), 
(7, 'vi', 'news', 'Xóa Chuyên mục và các bài viết', 'Đối tác', '', 1, 1498615589), 
(8, 'vi', 'news', 'Xóa Chuyên mục và các bài viết', 'Sản phẩm', '', 1, 1498615591), 
(9, 'vi', 'news', 'Xóa Chuyên mục và các bài viết', 'Tin công nghệ', '', 1, 1498615595), 
(10, 'vi', 'news', 'Xóa Chuyên mục và các bài viết', 'Bản tin nội bộ', '', 1, 1498615597), 
(11, 'vi', 'news', 'Xóa Chuyên mục và các bài viết', 'Thông cáo báo chí', '', 1, 1498615598), 
(12, 'vi', 'news', 'Xóa Chuyên mục và các bài viết', 'Tin tức', '', 1, 1498615601), 
(13, 'vi', 'news', 'Thêm chuyên mục', 'Tin tức', '', 1, 1498615615), 
(14, 'vi', 'news', 'Thêm chuyên mục', 'Thông tin kinh tế', '', 1, 1498615627), 
(15, 'vi', 'news', 'Thêm chuyên mục', 'Chiến lược', '', 1, 1498615636), 
(16, 'vi', 'news', 'Thêm chuyên mục', 'Quy hoạch', '', 1, 1498615641), 
(17, 'vi', 'news', 'Thêm chuyên mục', 'Công trình - đề tài', '', 1, 1498615657), 
(18, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/resize-of-dat.jpg', '', 1, 1498615703), 
(19, 'vi', 'news', 'Thêm bài viết', 'Phó Thủ tướng chỉ đạo xử lý vụ &quot;biến đất công thành tư&#039;', '', 1, 1498615731), 
(20, 'vi', 'news', 'log_add_source', ' ', '', 1, 1498615748), 
(21, 'vi', 'news', 'Sửa bài viết', 'Phó Thủ tướng chỉ đạo xử lý vụ &quot;biến đất công thành tư&#039;', '', 1, 1498615766), 
(22, 'vi', 'news', 'Sửa bài viết', 'Phó Thủ tướng chỉ đạo xử lý vụ &quot;biến đất công thành tư&#039;', '', 1, 1498615822), 
(23, 'vi', 'news', 'Sửa bài viết', 'Phó Thủ tướng chỉ đạo xử lý vụ &quot;biến đất công thành tư&#039;', '', 1, 1498615893), 
(24, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/nlmt.jpg', '', 1, 1498616086), 
(25, 'vi', 'news', 'Thêm bài viết', 'Tiết kiệm điện nhờ pin năng lượng mặt trời', '', 1, 1498616118), 
(26, 'vi', 'news', 'log_edit_source', 'sourceid 5', '', 1, 1498616135), 
(27, 'vi', 'news', 'Sửa bài viết', 'Tiết kiệm điện nhờ pin năng lượng mặt trời', '', 1, 1498616149), 
(28, 'vi', 'news', 'Sửa bài viết', 'Phó Thủ tướng chỉ đạo xử lý vụ &quot;biến đất công thành tư&#039;', '', 1, 1498616157), 
(29, 'vi', 'news', 'Thêm bài viết', 'Quy hoạch sông Hồng&#x3A; Hà Nội đề nghị đính chính', '', 1, 1498616238), 
(30, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/nqh_1356.jpg', '', 1, 1498616508), 
(31, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/nqh_1380.jpg', '', 1, 1498616530), 
(32, 'vi', 'news', 'Thêm bài viết', 'Thủ tướng hoan nghênh định hướng hợp tác giữa Hà Nội và Vientiane, Lào', '', 1, 1498616564), 
(33, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/ch-mc.jpg', '', 1, 1498616636), 
(34, 'vi', 'news', 'Thêm bài viết', 'Tăng 30 chuyến tàu phục vụ đợt cao điểm nghỉ lễ', '', 1, 1498616847), 
(35, 'vi', 'news', 'Thêm bài viết', 'Thông tin chỉ đạo, điều hành của Chính phủ, Thủ tướng Chính phủ', '', 1, 1498617454), 
(36, 'vi', 'news', 'Thêm bài viết', 'Hà Nội&#x3A; Xây bãi xe ngầm 5 tầng tại một số công viên', '', 1, 1498617632), 
(37, 'vi', 'news', 'Thêm bài viết', 'Hà Nội&#x3A; Thiết kế của ga S9 bảo đảm an toàn cho cộng đồng', '', 1, 1498617678), 
(38, 'vi', 'news', 'Thêm bài viết', 'Loại bỏ xe máy cũ nát&#x3A; Cần thiết nhưng phải có lộ trình', '', 1, 1498617732), 
(39, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/resize-of-61.jpg', '', 1, 1498617777), 
(40, 'vi', 'news', 'Thêm bài viết', 'Sớm đưa hai tuyến đường sắt đô thị vào hoạt động', '', 1, 1498617803), 
(41, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/resize-of-capnuoc.jpg', '', 1, 1498618182), 
(42, 'vi', 'news', 'Thêm bài viết', 'Điều chỉnh Quy hoạch cấp nước Hà Nội', '', 1, 1498618201), 
(43, 'vi', 'news', 'Thêm bài viết', 'Giao thông Thủ đô&#x3A; Kết nối tốt sẽ tạo ra động lực mới', '', 1, 1498619405), 
(44, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/5j3a0202.jpg', '', 1, 1498619439), 
(45, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/5j3a0064.jpg', '', 1, 1498619469), 
(46, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/5j3a0104.jpg', '', 1, 1498619527), 
(47, 'vi', 'news', 'Thêm bài viết', 'Rà soát, thực hiện nghiêm quy hoạch để có một Hà Nội đẹp hơn', '', 1, 1498619568), 
(48, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/1_92972.jpg', '', 1, 1498619676), 
(49, 'vi', 'news', 'Thêm bài viết', 'Hà Nội sẽ đầu tư nhiều bệnh viện ngang tầm quốc tế', '', 1, 1498619689), 
(50, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/hoang-thanh-thang-long-2.jpg', '', 1, 1498619745), 
(51, 'vi', 'news', 'Thêm bài viết', 'Bảo tồn Hoàng thành Thăng Long&#x3A; Không làm nhỏ lẻ', '', 1, 1498619763), 
(52, 'vi', 'news', 'Thêm bài viết', 'Xử nghiêm vụ lạm quyền tại quản lý thị trường Hà Nội', '', 1, 1498619831), 
(53, 'vi', 'news', 'Sửa bài viết', 'Xử nghiêm vụ lạm quyền tại quản lý thị trường Hà Nội', '', 1, 1498619837), 
(54, 'vi', 'news', 'Thêm bài viết', 'Hơn 7.600 tỷ đồng đầu tư thiết bị dự án đường sắt Nhổn-Ga Hà Nội', '', 1, 1498619875), 
(55, 'vi', 'news', 'Thêm chuyên mục', 'Lấy ý kiến người dân', '', 1, 1498620202), 
(56, 'vi', 'laws', 'Thêm Thể loại', 'Id: 10', '', 1, 1498622166), 
(57, 'vi', 'laws', 'Thêm Thể loại', 'Id: 11', '', 1, 1498622177), 
(58, 'vi', 'laws', 'Xóa thể loại', 'Id: 1', '', 1, 1498622195), 
(59, 'vi', 'laws', 'Xóa thể loại', 'Id: 2', '', 1, 1498622197), 
(60, 'vi', 'laws', 'Xóa thể loại', 'Id: 3', '', 1, 1498622199), 
(61, 'vi', 'laws', 'Xóa thể loại', 'Id: 4', '', 1, 1498622202), 
(62, 'vi', 'laws', 'Xóa thể loại', 'Id: 5', '', 1, 1498622204), 
(63, 'vi', 'laws', 'Xóa thể loại', 'Id: 6', '', 1, 1498622205), 
(64, 'vi', 'laws', 'Xóa thể loại', 'Id: 7', '', 1, 1498622206), 
(65, 'vi', 'laws', 'Xóa thể loại', 'Id: 8', '', 1, 1498622207), 
(66, 'vi', 'laws', 'Xóa thể loại', 'Id: 9', '', 1, 1498622208), 
(67, 'vi', 'laws', 'Thêm Thể loại', 'Id: 12', '', 1, 1498622220), 
(68, 'vi', 'laws', 'Thêm Thể loại', 'Id: 13', '', 1, 1498622228), 
(69, 'vi', 'laws', 'Thêm Thể loại', 'Id: 14', '', 1, 1498622237), 
(70, 'vi', 'laws', 'Thêm Thể loại', 'Id: 15', '', 1, 1498622258), 
(71, 'vi', 'laws', 'Xóa thể loại', 'Id: 10', '', 1, 1498622323), 
(72, 'vi', 'laws', 'Xóa thể loại', 'Id: 11', '', 1, 1498622325), 
(73, 'vi', 'modules', 'Cài lại module \"laws\"', '', '', 1, 1498622344), 
(74, 'vi', 'modules', 'Cài lại module \"laws\"', '', '', 1, 1498622362), 
(75, 'vi', 'laws', 'Xóa Lĩnh vực', 'Id: 1', '', 1, 1498622388), 
(76, 'vi', 'laws', 'Xóa Lĩnh vực', 'Id: 2', '', 1, 1498622390), 
(77, 'vi', 'laws', 'Thêm Lĩnh vực', 'Id: 3', '', 1, 1498622396), 
(78, 'vi', 'laws', 'Thêm Lĩnh vực', 'Id: 4', '', 1, 1498622412), 
(79, 'vi', 'laws', 'Thêm Lĩnh vực', 'Id: 5', '', 1, 1498622426), 
(80, 'vi', 'laws', 'Thêm Lĩnh vực', 'Id: 6', '', 1, 1498622456), 
(81, 'vi', 'laws', 'Thêm Lĩnh vực', 'Id: 7', '', 1, 1498622465), 
(82, 'vi', 'laws', 'Thêm người ký văn bản', 'Nguyễn Xuân Phúc', '', 1, 1498622806), 
(83, 'vi', 'laws', 'Thêm Cơ quan ban hành', 'Id: ', '', 1, 1498622892), 
(84, 'vi', 'upload', 'Upload file', 'uploads/laws/36.signed.pdf', '', 1, 1498622957), 
(85, 'vi', 'laws', 'Thêm Văn bản', 'Id: 1', '', 1, 1498622968), 
(86, 'vi', 'upload', 'Upload file', 'uploads/laws/60.signed.pdf', '', 1, 1498623084), 
(87, 'vi', 'laws', 'Thêm Văn bản', 'Id: 2', '', 1, 1498623094), 
(88, 'vi', 'upload', 'Upload file', 'uploads/laws/69.signed.pdf', '', 1, 1498623178), 
(89, 'vi', 'laws', 'Thêm Văn bản', 'Id: 3', '', 1, 1498623212), 
(90, 'vi', 'upload', 'Upload file', 'uploads/laws/17.signed_01.pdf', '', 1, 1498623300), 
(91, 'vi', 'laws', 'Thêm Văn bản', 'Id: 4', '', 1, 1498623306), 
(92, 'vi', 'upload', 'Upload file', 'uploads/laws/75.signed.pdf', '', 1, 1498623373), 
(93, 'vi', 'laws', 'Thêm Văn bản', 'Id: 5', '', 1, 1498623380), 
(94, 'vi', 'laws', 'Xóa Cơ quan ban hành', 'Id: 3', '', 1, 1498623434), 
(95, 'vi', 'laws', 'Xóa Cơ quan ban hành', 'Id: 2', '', 1, 1498623436), 
(96, 'vi', 'laws', 'Xóa Cơ quan ban hành', 'Id: 1', '', 1, 1498623439), 
(97, 'vi', 'laws', 'Thêm Cơ quan ban hành', 'Id: ', '', 1, 1498623447), 
(98, 'vi', 'laws', 'Xóa người ký văn bản', 'Nguyễn Vinh Hiển', '', 1, 1498623455), 
(99, 'vi', 'laws', 'Xóa người ký văn bản', 'Nguyễn Thị Nghĩa', '', 1, 1498623456), 
(100, 'vi', 'laws', 'Xóa người ký văn bản', 'Bùi Văn Ga', '', 1, 1498623457), 
(101, 'vi', 'laws', 'Xóa người ký văn bản', 'Phạm Vũ Luận', '', 1, 1498623458), 
(102, 'vi', 'laws', 'Thêm người ký văn bản', 'Trần Xuân Hà', '', 1, 1498623470), 
(103, 'vi', 'upload', 'Upload file', 'uploads/laws/40-btc.signed.pdf', '', 1, 1498623595), 
(104, 'vi', 'laws', 'Thêm Văn bản', 'Id: 6', '', 1, 1498623607), 
(105, 'vi', 'laws', 'Sửa Thông tin Văn bản', 'Id: 5', '', 1, 1498623614), 
(106, 'vi', 'laws', 'Sửa Thông tin Văn bản', 'Id: 4', '', 1, 1498623625), 
(107, 'vi', 'laws', 'Sửa Thông tin Văn bản', 'Id: 3', '', 1, 1498623631), 
(108, 'vi', 'laws', 'Sửa Thông tin Văn bản', 'Id: 2', '', 1, 1498623637), 
(109, 'vi', 'laws', 'Sửa Thông tin Văn bản', 'Id: 1', '', 1, 1498623643), 
(110, 'vi', 'laws', 'Thêm Cơ quan ban hành', 'Id: ', '', 1, 1498623770), 
(111, 'vi', 'laws', 'Thêm người ký văn bản', 'Bùi Văn Ga', '', 1, 1498623781), 
(112, 'vi', 'laws', 'Sửa người ký văn bản', '&nbsp;=&gt;&nbsp;Bùi Văn Ga', '', 1, 1498623820), 
(113, 'vi', 'laws', 'Sửa người ký văn bản', '&nbsp;=&gt;&nbsp;Nguyễn Xuân Phúc', '', 1, 1498623827), 
(114, 'vi', 'laws', 'Sửa người ký văn bản', '&nbsp;=&gt;&nbsp;Trần Xuân Hà', '', 1, 1498623853), 
(115, 'vi', 'upload', 'Upload file', 'uploads/laws/11-bgddt.signed.pdf', '', 1, 1498623927), 
(116, 'vi', 'laws', 'Thêm Văn bản', 'Id: 7', '', 1, 1498623931), 
(117, 'vi', 'upload', 'Upload file', 'uploads/laws/53.signed.pdf', '', 1, 1498624014), 
(118, 'vi', 'laws', 'Thêm Văn bản', 'Id: 8', '', 1, 1498624020), 
(119, 'vi', 'laws', 'Thêm Cơ quan ban hành', 'Id: ', '', 1, 1498624062), 
(120, 'vi', 'laws', 'Thêm người ký văn bản', 'Trương Quang Nghĩa', '', 1, 1498624091), 
(121, 'vi', 'upload', 'Upload file', 'uploads/laws/15-bgtvt.signed.pdf', '', 1, 1498624184), 
(122, 'vi', 'upload', 'Upload file', 'uploads/laws/15-kembgtvt.pdf', '', 1, 1498624194), 
(123, 'vi', 'laws', 'Thêm Văn bản', 'Id: 9', '', 1, 1498624204), 
(124, 'vi', 'upload', 'Upload file', 'uploads/laws/16-bgtvt.signed.pdf', '', 1, 1498624294), 
(125, 'vi', 'laws', 'Thêm Văn bản', 'Id: 10', '', 1, 1498624299), 
(126, 'vi', 'upload', 'Upload file', 'uploads/laws/11-btc.signed.pdf', '', 1, 1498624393), 
(127, 'vi', 'laws', 'Thêm Văn bản', 'Id: 11', '', 1, 1498624398), 
(128, 'vi', 'laws', 'Thêm Cơ quan ban hành', 'Id: ', '', 1, 1498624442), 
(129, 'vi', 'laws', 'Thêm người ký văn bản', 'Nguyễn Đức Chung', '', 1, 1498624471), 
(130, 'vi', 'upload', 'Upload file', 'uploads/laws/03-17.pdf', '', 1, 1498624560), 
(131, 'vi', 'laws', 'Thêm Văn bản', 'Id: 12', '', 1, 1498624576), 
(132, 'vi', 'laws', 'Thêm Cơ quan ban hành', 'Id: ', '', 1, 1498624616), 
(133, 'vi', 'laws', 'Thêm người ký văn bản', 'Doãn Mậu Diệp', '', 1, 1498624673), 
(134, 'vi', 'login', '[admin] Đăng nhập', ' Client IP:127.0.0.1', '', 0, 1498632596), 
(135, 'vi', 'laws', 'Thêm Văn bản', 'Id: 13', '', 1, 1498634269), 
(136, 'vi', 'upload', 'Upload file', 'uploads/laws/70.signed.pdf', '', 1, 1498635747), 
(137, 'vi', 'laws', 'Thêm Văn bản', 'Id: 14', '', 1, 1498635751), 
(138, 'vi', 'upload', 'Upload file', 'uploads/laws/11-bldtbxh.signed.pdf', '', 1, 1498635772), 
(139, 'vi', 'laws', 'Sửa Thông tin Văn bản', 'Id: 13', '', 1, 1498635782), 
(140, 'vi', 'upload', 'Upload file', 'uploads/laws/74.signed.pdf', '', 1, 1498635840), 
(141, 'vi', 'laws', 'Thêm Văn bản', 'Id: 15', '', 1, 1498635844), 
(142, 'vi', 'laws', 'Thêm Cơ quan ban hành', 'Id: ', '', 1, 1498636476), 
(143, 'vi', 'laws', 'Thêm người ký văn bản', 'Trần Tuấn Anh', '', 1, 1498636504), 
(144, 'vi', 'upload', 'Upload file', 'uploads/laws/39-bct.signed.pdf', '', 1, 1498636831), 
(145, 'vi', 'laws', 'Thêm Văn bản', 'Id: 16', '', 1, 1498636857), 
(146, 'vi', 'laws', 'Thêm Văn bản', 'Id: 17', '', 1, 1498636956), 
(147, 'vi', 'upload', 'Upload file', 'uploads/laws/21.signed.pdf', '', 1, 1498637063), 
(148, 'vi', 'laws', 'Thêm Văn bản', 'Id: 18', '', 1, 1498637067), 
(149, 'vi', 'upload', 'Upload file', 'uploads/laws/17btc.signed.pdf', '', 1, 1498637190), 
(150, 'vi', 'laws', 'Thêm Văn bản', 'Id: 19', '', 1, 1498637194), 
(151, 'vi', 'laws', 'Thêm người ký văn bản', 'Trịnh Đình Dũng', '', 1, 1498637291), 
(152, 'vi', 'upload', 'Upload file', 'uploads/laws/03-17_1.pdf', '', 1, 1498637425), 
(153, 'vi', 'upload', 'Xóa file', 'uploads/laws/03-17_1.pdf', '', 1, 1498637431), 
(154, 'vi', 'upload', 'Upload file', 'uploads/laws/07.signed_01.pdf', '', 1, 1498637440), 
(155, 'vi', 'laws', 'Thêm Văn bản', 'Id: 20', '', 1, 1498637444), 
(156, 'vi', 'laws', 'Thêm Lĩnh vực', 'Id: 8', '', 1, 1498637457), 
(157, 'vi', 'laws', 'Thêm Cơ quan ban hành', 'Id: ', '', 1, 1498637493), 
(158, 'vi', 'laws', 'Xóa Lĩnh vực', 'Id: 8', '', 1, 1498637501), 
(159, 'vi', 'laws', 'Sửa Thông tin Văn bản', 'Id: 20', '', 1, 1498637509), 
(160, 'vi', 'upload', 'Upload file', 'uploads/laws/20.signed.pdf', '', 1, 1498637647), 
(161, 'vi', 'upload', 'Upload file', 'uploads/laws/252.signed_01.pdf', '', 1, 1498637675), 
(162, 'vi', 'laws', 'Thêm Văn bản', 'Id: 21', '', 1, 1498637683), 
(163, 'vi', 'upload', 'Upload file', 'uploads/laws/15-17.signed.pdf', '', 1, 1498637754), 
(164, 'vi', 'laws', 'Thêm người ký văn bản', 'Nguyễn Thành Phong', '', 1, 1498637835), 
(165, 'vi', 'laws', 'Thêm Cơ quan ban hành', 'Id: ', '', 1, 1498637844), 
(166, 'vi', 'laws', 'Thêm Văn bản', 'Id: 22', '', 1, 1498637911), 
(167, 'vi', 'upload', 'Upload file', 'uploads/laws/40.signed.pdf', '', 1, 1498638082), 
(168, 'vi', 'laws', 'Thêm Văn bản', 'Id: 23', '', 1, 1498638119), 
(169, 'vi', 'laws', 'Thêm Lĩnh vực', 'Id: 9', '', 1, 1498642073), 
(170, 'vi', 'news', 'Thêm bài viết', 'Hơn 7.600 tỷ đồng đầu tư thiết bị dự án đường sắt Nhổn-Ga Hà Nội', '', 1, 1498642813), 
(171, 'vi', 'news', 'Thêm bài viết', 'Hà Nội triển khai các giải pháp cấp bách bảo vệ môi trường', '', 1, 1498642855), 
(172, 'vi', 'news', 'Thêm bài viết', 'Hà Nội&#x3A; Kiểm tra phản ánh về bất cập của thiết kế nhà ga ngầm', '', 1, 1498642911), 
(173, 'vi', 'news', 'Xóa bài viêt', 'Hơn 7.600 tỷ đồng đầu tư thiết bị dự án đường sắt Nhổn-Ga Hà Nội', '', 1, 1498642945), 
(174, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/resize-of-bat-dong-san-ha-noi.jpg', '', 1, 1498643121), 
(175, 'vi', 'news', 'Thêm bài viết', 'Hà Nội phải bố trí đủ quỹ đất xây dựng nhà ở xã hội', '', 1, 1498643148), 
(176, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/110246baoxaydung_t4_2.jpg', '', 1, 1498643238), 
(177, 'vi', 'news', 'Thêm bài viết', 'Tạo cơ chế tài chính mới góp phần thúc đẩy phát triển Thủ đô', '', 1, 1498643260), 
(178, 'vi', 'upload', 'Upload file', 'uploads/news/2017_06/thanhphovensonghong-f53ef-copy.jpg', '', 1, 1498643572), 
(179, 'vi', 'news', 'Thêm bài viết', 'Hà Nội quy hoạch công viên cây xanh kết hợp đô thị ven sông Hồng', '', 1, 1498643588), 
(180, 'vi', 'news', 'Sửa bài viết', 'Hà Nội quy hoạch công viên cây xanh kết hợp đô thị ven sông Hồng', '', 1, 1498643658), 
(181, 'vi', 'faq', 'log_add_cat', 'cat 1', '', 1, 1498644701), 
(182, 'vi', 'login', '[admin] Đăng nhập', ' Client IP:127.0.0.1', '', 0, 1498698024), 
(183, 'vi', 'news', 'Sửa bài viết', 'Hà Nội quy hoạch công viên cây xanh kết hợp đô thị ven sông Hồng', '', 1, 1498698095), 
(184, 'vi', 'news', 'Sửa bài viết', 'Phó Thủ tướng chỉ đạo xử lý vụ &quot;biến đất công thành tư&#039;', '', 1, 1498698100), 
(185, 'vi', 'news', 'Sửa bài viết', 'Tiết kiệm điện nhờ pin năng lượng mặt trời', '', 1, 1498698104), 
(186, 'vi', 'news', 'Sửa bài viết', 'Quy hoạch sông Hồng&#x3A; Hà Nội đề nghị đính chính', '', 1, 1498698109), 
(187, 'vi', 'news', 'Sửa bài viết', 'Thủ tướng hoan nghênh định hướng hợp tác giữa Hà Nội và Vientiane, Lào', '', 1, 1498698116), 
(188, 'vi', 'news', 'Sửa bài viết', 'Tăng 30 chuyến tàu phục vụ đợt cao điểm nghỉ lễ', '', 1, 1498698123), 
(189, 'vi', 'news', 'Sửa bài viết', 'Thông tin chỉ đạo, điều hành của Chính phủ, Thủ tướng Chính phủ', '', 1, 1498698130), 
(190, 'vi', 'news', 'Sửa bài viết', 'Hà Nội&#x3A; Thiết kế của ga S9 bảo đảm an toàn cho cộng đồng', '', 1, 1498698139), 
(191, 'vi', 'news', 'Sửa bài viết', 'Hà Nội&#x3A; Xây bãi xe ngầm 5 tầng tại một số công viên', '', 1, 1498699774), 
(192, 'vi', 'news', 'Sửa bài viết', 'Loại bỏ xe máy cũ nát&#x3A; Cần thiết nhưng phải có lộ trình', '', 1, 1498699785), 
(193, 'vi', 'news', 'Sửa bài viết', 'Sớm đưa hai tuyến đường sắt đô thị vào hoạt động', '', 1, 1498699791), 
(194, 'vi', 'news', 'Sửa bài viết', 'Điều chỉnh Quy hoạch cấp nước Hà Nội', '', 1, 1498699905), 
(195, 'vi', 'news', 'Sửa bài viết', 'Giao thông Thủ đô&#x3A; Kết nối tốt sẽ tạo ra động lực mới', '', 1, 1498699911), 
(196, 'vi', 'news', 'Sửa bài viết', 'Giao thông Thủ đô&#x3A; Kết nối tốt sẽ tạo ra động lực mới', '', 1, 1498699911), 
(197, 'vi', 'news', 'Sửa bài viết', 'Rà soát, thực hiện nghiêm quy hoạch để có một Hà Nội đẹp hơn', '', 1, 1498699926), 
(198, 'vi', 'news', 'Sửa bài viết', 'Hà Nội sẽ đầu tư nhiều bệnh viện ngang tầm quốc tế', '', 1, 1498699932), 
(199, 'vi', 'news', 'Sửa bài viết', 'Bảo tồn Hoàng thành Thăng Long&#x3A; Không làm nhỏ lẻ', '', 1, 1498699951), 
(200, 'vi', 'news', 'Sửa bài viết', 'Xử nghiêm vụ lạm quyền tại quản lý thị trường Hà Nội', '', 1, 1498699956), 
(201, 'vi', 'news', 'Sửa bài viết', 'Hơn 7.600 tỷ đồng đầu tư thiết bị dự án đường sắt Nhổn-Ga Hà Nội', '', 1, 1498699968), 
(202, 'vi', 'news', 'Sửa bài viết', 'Hà Nội triển khai các giải pháp cấp bách bảo vệ môi trường', '', 1, 1498699975), 
(203, 'vi', 'news', 'Sửa bài viết', 'Hà Nội&#x3A; Kiểm tra phản ánh về bất cập của thiết kế nhà ga ngầm', '', 1, 1498699993), 
(204, 'vi', 'news', 'Sửa bài viết', 'Hà Nội phải bố trí đủ quỹ đất xây dựng nhà ở xã hội', '', 1, 1498699996), 
(205, 'vi', 'news', 'Sửa bài viết', 'Tạo cơ chế tài chính mới góp phần thúc đẩy phát triển Thủ đô', '', 1, 1498699998), 
(206, 'vi', 'videoclips', 'Thêm thể loại mới', 'ID 1', '', 1, 1498700247), 
(207, 'vi', 'videoclips', 'Thêm video-clip', 'Id: 1', '', 1, 1498700589), 
(208, 'vi', 'news', 'Xóa Chuyên mục và các bài viết', 'Lấy ý kiến người dân', '', 1, 1498701438), 
(209, 'vi', 'modules', 'Thêm module ảo lay_y_kien_nguoi_dan', '', '', 1, 1498701479), 
(210, 'vi', 'modules', 'Thiết lập module mới lay-y-kien-nguoi-dan', '', '', 1, 1498701488), 
(211, 'vi', 'modules', 'Sửa module &ldquo;lay-y-kien-nguoi-dan&rdquo;', '', '', 1, 1498701501), 
(212, 'vi', 'lay-y-kien-nguoi-dan', 'Thêm Thể loại', 'Id: 1', '', 1, 1498702560), 
(213, 'vi', 'login', '[admin] Thoát khỏi tài khoản Quản trị', ' Client IP:127.0.0.1', '', 0, 1498705531), 
(214, 'vi', 'login', '[admin] Đăng nhập', ' Client IP:127.0.0.1', '', 0, 1498705602), 
(215, 'vi', 'videoclips', 'Thêm video-clip', 'Id: 2', '', 1, 1498705667), 
(216, 'vi', 'videoclips', 'Thêm video-clip', 'Id: 3', '', 1, 1498705694), 
(217, 'vi', 'login', '[admin] Thoát khỏi tài khoản Quản trị', ' Client IP:127.0.0.1', '', 0, 1498707678), 
(218, 'vi', 'login', '[admin] Đăng nhập', ' Client IP:127.0.0.1', '', 0, 1498708688), 
(219, 'vi', 'login', '[admin] Thoát khỏi tài khoản Quản trị', ' Client IP:127.0.0.1', '', 0, 1498708769), 
(220, 'vi', 'webtools', 'Dọn dẹp hệ thống', 'clearcache, clearfiletemp, clearerrorlogs, clearip_logs', '', 1, 1498708855), 
(221, 'vi', 'news', 'Sửa bài viết', 'Tạo cơ chế tài chính mới góp phần thúc đẩy phát triển Thủ đô', '', 1, 1498709455), 
(222, 'vi', 'news', 'Sửa chuyên mục', 'Thông tin kinh tế', '', 1, 1498709513), 
(223, 'vi', 'news', 'Sửa chuyên mục', 'Chiến lược', '', 1, 1498709520), 
(224, 'vi', 'news', 'Sửa chuyên mục', 'Quy hoạch', '', 1, 1498709530), 
(225, 'vi', 'news', 'Sửa chuyên mục', 'Công trình - đề tài', '', 1, 1498709538), 
(226, 'vi', 'news', 'Xóa Chuyên mục và các bài viết', 'Tin tức', '', 1, 1498709543), 
(227, 'vi', 'login', '[admin] Đăng nhập', ' Client IP:127.0.0.1', '', 0, 1498721324), 
(228, 'vi', 'banners', 'log_add_plan', 'planid 4', '', 1, 1498721544), 
(229, 'vi', 'banners', 'log_add_banner', 'bannerid 4', '', 1, 1498721564), 
(230, 'vi', 'themes', 'Thêm block', 'Name : global sliders', '', 1, 1498721578), 
(231, 'vi', 'themes', 'Thêm block', 'Name : module block newscenter', '', 1, 1498724322), 
(232, 'vi', 'banners', 'log_add_plan', 'planid 5', '', 1, 1498725931), 
(233, 'vi', 'banners', 'log_add_banner', 'bannerid 5', '', 1, 1498725937), 
(234, 'vi', 'themes', 'Sửa block', 'Name : Thăm dò ý kiến', '', 1, 1498725967), 
(235, 'vi', 'themes', 'Thêm block', 'Name : Thông tin kinh tế', '', 1, 1498729841), 
(236, 'vi', 'themes', 'Sửa block', 'Name : Thông tin kinh tế', '', 1, 1498729852), 
(237, 'vi', 'themes', 'Sửa block', 'Name : Thông tin kinh tế', '', 1, 1498729866), 
(238, 'vi', 'themes', 'Sửa block', 'Name : Thông tin kinh tế', '', 1, 1498729978), 
(239, 'vi', 'themes', 'Thêm block', 'Name : global superfish', '', 1, 1498730004), 
(240, 'vi', 'themes', 'Thêm block', 'Name : global html', '', 1, 1498730753), 
(241, 'vi', 'themes', 'Sửa block', 'Name : Tin tiêu điểm', '', 1, 1498730823), 
(242, 'vi', 'themes', 'Thêm block', 'Name : global block news cat', '', 1, 1498730857), 
(243, 'vi', 'themes', 'Thêm block', 'Name : global block news cat', '', 1, 1498730871), 
(244, 'vi', 'themes', 'Thêm block', 'Name : global block news cat', '', 1, 1498730885), 
(245, 'vi', 'themes', 'Sửa block', 'Name : global block news cat', '', 1, 1498730894), 
(246, 'vi', 'themes', 'Thêm block', 'Name : global block news cat', '', 1, 1498730910), 
(247, 'vi', 'menu', 'Delete menu item', 'Item ID 8', '', 1, 1498731248), 
(248, 'vi', 'menu', 'Delete menu item', 'Item ID 9', '', 1, 1498731248), 
(249, 'vi', 'menu', 'Delete menu item', 'Item ID 10', '', 1, 1498731248), 
(250, 'vi', 'menu', 'Delete menu item', 'Item ID 11', '', 1, 1498731248), 
(251, 'vi', 'menu', 'Delete menu item', 'Item ID 12', '', 1, 1498731248), 
(252, 'vi', 'menu', 'Delete menu item', 'Item ID 13', '', 1, 1498731248), 
(253, 'vi', 'menu', 'Delete menu item', 'Item ID 14', '', 1, 1498731248), 
(254, 'vi', 'menu', 'Delete menu item', 'Item ID 15', '', 1, 1498731248), 
(255, 'vi', 'menu', 'Delete menu item', 'Item ID 16', '', 1, 1498731248), 
(256, 'vi', 'menu', 'Delete menu item', 'Item ID 17', '', 1, 1498731248), 
(257, 'vi', 'menu', 'Delete menu item', 'Item ID 18', '', 1, 1498731248), 
(258, 'vi', 'menu', 'Delete menu item', 'Item ID 19', '', 1, 1498731248), 
(259, 'vi', 'menu', 'Delete menu item', 'Item ID 20', '', 1, 1498731248), 
(260, 'vi', 'menu', 'Delete menu item', 'Item ID 21', '', 1, 1498731248), 
(261, 'vi', 'menu', 'Delete menu item', 'Item ID 22', '', 1, 1498731248);


-- ---------------------------------------


--
-- Table structure for table `nv4_notification`
--

DROP TABLE IF EXISTS `nv4_notification`;
CREATE TABLE `nv4_notification` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `send_to` mediumint(8) unsigned NOT NULL,
  `send_from` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `area` tinyint(1) unsigned NOT NULL,
  `language` char(3) NOT NULL,
  `module` varchar(50) NOT NULL,
  `obid` int(11) unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `add_time` int(11) unsigned NOT NULL,
  `view` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_plugin`
--

DROP TABLE IF EXISTS `nv4_plugin`;
CREATE TABLE `nv4_plugin` (
  `pid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `plugin_file` varchar(50) NOT NULL,
  `plugin_area` tinyint(4) NOT NULL,
  `weight` tinyint(4) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `plugin_file` (`plugin_file`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_plugin`
--

INSERT INTO `nv4_plugin` VALUES
(1, 'qrcode.php', 1, 1), 
(2, 'cdn_js_css_image.php', 3, 1);


-- ---------------------------------------


--
-- Table structure for table `nv4_sessions`
--

DROP TABLE IF EXISTS `nv4_sessions`;
CREATE TABLE `nv4_sessions` (
  `session_id` varchar(50) DEFAULT NULL,
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL,
  `onl_time` int(11) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `session_id` (`session_id`),
  KEY `onl_time` (`onl_time`)
) ENGINE=MEMORY  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_sessions`
--

INSERT INTO `nv4_sessions` VALUES
('50f0af1rs9ruaiguplbvq91s2o', 1, 'admin', 1498732597);


-- ---------------------------------------


--
-- Table structure for table `nv4_setup_extensions`
--

DROP TABLE IF EXISTS `nv4_setup_extensions`;
CREATE TABLE `nv4_setup_extensions` (
  `id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT 'other',
  `title` varchar(55) NOT NULL,
  `is_sys` tinyint(1) NOT NULL DEFAULT '0',
  `is_virtual` tinyint(1) NOT NULL DEFAULT '0',
  `basename` varchar(50) NOT NULL DEFAULT '',
  `table_prefix` varchar(55) NOT NULL DEFAULT '',
  `version` varchar(50) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `author` text NOT NULL,
  `note` varchar(255) DEFAULT '',
  UNIQUE KEY `title` (`type`,`title`),
  KEY `id` (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_setup_extensions`
--

INSERT INTO `nv4_setup_extensions` VALUES
(0, 'module', 'siteterms', 0, 0, 'page', 'siteterms', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(19, 'module', 'banners', 1, 0, 'banners', 'banners', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(20, 'module', 'contact', 0, 1, 'contact', 'contact', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(1, 'module', 'news', 0, 1, 'news', 'news', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(21, 'module', 'voting', 0, 0, 'voting', 'voting', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(0, 'module', 'faq', 0, 1, 'faq', 'faq', '4.1.01 1492189200', 1498555548, 'VINADES (contact@vinades.vn)', ''), 
(284, 'module', 'seek', 1, 0, 'seek', 'seek', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(24, 'module', 'users', 1, 1, 'users', 'users', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(27, 'module', 'statistics', 0, 0, 'statistics', 'statistics', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(29, 'module', 'menu', 0, 0, 'menu', 'menu', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(283, 'module', 'feeds', 1, 0, 'feeds', 'feeds', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(282, 'module', 'page', 1, 1, 'page', 'page', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(281, 'module', 'comment', 1, 0, 'comment', 'comment', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(312, 'module', 'freecontent', 0, 1, 'freecontent', 'freecontent', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(327, 'module', 'two-step-verification', 1, 0, 'two-step-verification', 'two_step_verification', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(307, 'theme', 'default', 0, 0, 'default', 'default', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(311, 'theme', 'mobile_default', 0, 0, 'mobile_default', 'mobile_default', '4.1.02 1492966799', 1498555144, 'VINADES (contact@vinades.vn)', ''), 
(0, 'module', 'laws', 0, 1, 'laws', 'laws', '4.1.02 1491810212', 1498555548, 'VINADES (contact@vinades.vn)', 'Modules văn bản pháp luật'), 
(0, 'module', 'videoclips', 0, 1, 'videoclips', 'videoclips', '4.1.02 1497560120', 1498555548, 'VINADES (contact@vinades.vn)', 'Module playback of video-clips'), 
(0, 'theme', 'egov', 0, 0, 'egov', 'egov', '4.0.0 1498555740', 1498555740, 'VINADES (contact@vinades.vn)', 'egov'), 
(0, 'module', 'lay-y-kien-nguoi-dan', 0, 0, 'laws', 'lay_y_kien_nguoi_dan', '', 1498701479, '', '');


-- ---------------------------------------


--
-- Table structure for table `nv4_setup_language`
--

DROP TABLE IF EXISTS `nv4_setup_language`;
CREATE TABLE `nv4_setup_language` (
  `lang` char(2) NOT NULL,
  `setup` tinyint(1) NOT NULL DEFAULT '0',
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_setup_language`
--

INSERT INTO `nv4_setup_language` VALUES
('vi', 1, 1);


-- ---------------------------------------


--
-- Table structure for table `nv4_upload_dir`
--

DROP TABLE IF EXISTS `nv4_upload_dir`;
CREATE TABLE `nv4_upload_dir` (
  `did` mediumint(8) NOT NULL AUTO_INCREMENT,
  `dirname` varchar(250) DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `thumb_type` tinyint(4) NOT NULL DEFAULT '0',
  `thumb_width` smallint(6) NOT NULL DEFAULT '0',
  `thumb_height` smallint(6) NOT NULL DEFAULT '0',
  `thumb_quality` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`did`),
  UNIQUE KEY `name` (`dirname`)
) ENGINE=MyISAM  AUTO_INCREMENT=24  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_upload_dir`
--

INSERT INTO `nv4_upload_dir` VALUES
(0, '', 0, 3, 100, 150, 90), 
(1, 'uploads', 0, 0, 0, 0, 0), 
(3, 'uploads/banners', 0, 0, 0, 0, 0), 
(4, 'uploads/contact', 0, 0, 0, 0, 0), 
(6, 'uploads/menu', 0, 0, 0, 0, 0), 
(7, 'uploads/news', 0, 0, 0, 0, 0), 
(8, 'uploads/news/source', 0, 0, 0, 0, 0), 
(9, 'uploads/news/temp_pic', 0, 0, 0, 0, 0), 
(10, 'uploads/news/topics', 0, 0, 0, 0, 0), 
(11, 'uploads/page', 0, 0, 0, 0, 0), 
(12, 'uploads/siteterms', 0, 0, 0, 0, 0), 
(13, 'uploads/users', 0, 0, 0, 0, 0), 
(14, 'uploads/users/groups', 0, 0, 0, 0, 0), 
(15, 'uploads/laws', 1498622948, 0, 0, 0, 0), 
(16, 'uploads/videoclips', 0, 0, 0, 0, 0), 
(17, 'uploads/videoclips/icons', 0, 0, 0, 0, 0), 
(18, 'uploads/videoclips/images', 0, 0, 0, 0, 0), 
(19, 'uploads/videoclips/video', 0, 0, 0, 0, 0), 
(20, 'uploads/nvtools', 0, 0, 0, 0, 0), 
(21, 'uploads/nvtools/compiler', 0, 0, 0, 0, 0), 
(22, 'uploads/news/2017_06', 1498615696, 0, 0, 0, 0), 
(23, 'uploads/lay-y-kien-nguoi-dan', 0, 0, 0, 0, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_upload_file`
--

DROP TABLE IF EXISTS `nv4_upload_file`;
CREATE TABLE `nv4_upload_file` (
  `name` varchar(245) NOT NULL,
  `ext` varchar(10) NOT NULL DEFAULT '',
  `type` varchar(5) NOT NULL DEFAULT '',
  `filesize` int(11) NOT NULL DEFAULT '0',
  `src` varchar(255) NOT NULL DEFAULT '',
  `srcwidth` int(11) NOT NULL DEFAULT '0',
  `srcheight` int(11) NOT NULL DEFAULT '0',
  `sizes` varchar(50) NOT NULL DEFAULT '',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `mtime` int(11) NOT NULL DEFAULT '0',
  `did` int(11) NOT NULL DEFAULT '0',
  `title` varchar(245) NOT NULL DEFAULT '',
  `alt` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `did` (`did`,`title`),
  KEY `userid` (`userid`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_upload_file`
--

INSERT INTO `nv4_upload_file` VALUES
('resize-of-dat.jpg', 'jpg', 'image', 19095, 'assets/news/2017_06/resize-of-dat.jpg', 80, 60, '300|225', 1, 1498615703, 22, 'resize-of-dat.jpg', 'Resize of dat'), 
('nlmt.jpg', 'jpg', 'image', 176959, 'assets/news/2017_06/nlmt.jpg', 80, 60, '600|450', 1, 1498616087, 22, 'nlmt.jpg', 'nlmt'), 
('nqh_1356.jpg', 'jpg', 'image', 1256634, 'assets/news/2017_06/nqh_1356.jpg', 80, 57, '1500|1061', 1, 1498616509, 22, 'nqh_1356.jpg', 'NQH 1356'), 
('nqh_1380.jpg', 'jpg', 'image', 1386684, 'assets/news/2017_06/nqh_1380.jpg', 80, 54, '1500|1001', 1, 1498616531, 22, 'nqh_1380.jpg', 'NQH 1380'), 
('ch-mc.jpg', 'jpg', 'image', 11157, 'assets/news/2017_06/ch-mc.jpg', 80, 58, '263|192', 1, 1498616636, 22, 'ch-mc.jpg', 'chỉ mục'), 
('resize-of-61.jpg', 'jpg', 'image', 12886, 'assets/news/2017_06/resize-of-61.jpg', 80, 52, '250|163', 1, 1498617777, 22, 'resize-of-61.jpg', 'Resize of 61'), 
('resize-of-...jpg', 'jpg', 'image', 13591, 'assets/news/2017_06/resize-of-capnuoc.jpg', 80, 55, '250|171', 1, 1498618183, 22, 'resize-of-capnuoc.jpg', 'Resize of capnuoc'), 
('5j3a0202.jpg', 'jpg', 'image', 66013, 'assets/news/2017_06/5j3a0202.jpg', 80, 51, '451|285', 1, 1498619439, 22, '5j3a0202.jpg', '5J3A0202'), 
('5j3a0064.jpg', 'jpg', 'image', 63532, 'assets/news/2017_06/5j3a0064.jpg', 80, 54, '451|300', 1, 1498619469, 22, '5j3a0064.jpg', '5J3A0064'), 
('5j3a0104.jpg', 'jpg', 'image', 64885, 'assets/news/2017_06/5j3a0104.jpg', 80, 54, '452|300', 1, 1498619527, 22, '5j3a0104.jpg', '5J3A0104'), 
('1_92972.jpg', 'jpg', 'image', 51945, 'assets/news/2017_06/1_92972.jpg', 80, 60, '460|345', 1, 1498619677, 22, '1_92972.jpg', '1 92972'), 
('hoang-than...jpg', 'jpg', 'image', 91348, 'assets/news/2017_06/hoang-thanh-thang-long-2.jpg', 80, 54, '709|472', 1, 1498619745, 22, 'hoang-thanh-thang-long-2.jpg', 'hoang thanh thang long 2'), 
('36.signed.pdf', 'pdf', 'file', 1079425, 'assets/images/pdf.png', 32, 32, '|', 1, 1498622957, 15, '36.signed.pdf', '36 signed'), 
('60.signed.pdf', 'pdf', 'file', 308135, 'assets/images/pdf.png', 32, 32, '|', 1, 1498623084, 15, '60.signed.pdf', '60 signed'), 
('69.signed.pdf', 'pdf', 'file', 455470, 'assets/images/pdf.png', 32, 32, '|', 1, 1498623178, 15, '69.signed.pdf', '69 signed'), 
('17.signed_01.pdf', 'pdf', 'file', 256093, 'assets/images/pdf.png', 32, 32, '|', 1, 1498623300, 15, '17.signed_01.pdf', '17 signed 01'), 
('75.signed.pdf', 'pdf', 'file', 769839, 'assets/images/pdf.png', 32, 32, '|', 1, 1498623373, 15, '75.signed.pdf', '75 signed'), 
('40-btc.signed.pdf', 'pdf', 'file', 777317, 'assets/images/pdf.png', 32, 32, '|', 1, 1498623595, 15, '40-btc.signed.pdf', '40 BTC signed'), 
('11-bgddt.s...pdf', 'pdf', 'file', 766021, 'assets/images/pdf.png', 32, 32, '|', 1, 1498623927, 15, '11-bgddt.signed.pdf', '11 BGDDT signed'), 
('53.signed.pdf', 'pdf', 'file', 321766, 'assets/images/pdf.png', 32, 32, '|', 1, 1498624014, 15, '53.signed.pdf', '53 signed'), 
('15-bgtvt.s...pdf', 'pdf', 'file', 6156302, 'assets/images/pdf.png', 32, 32, '|', 1, 1498624184, 15, '15-bgtvt.signed.pdf', '15 BGTVT signed'), 
('15-kembgtvt.pdf', 'pdf', 'file', 6725054, 'assets/images/pdf.png', 32, 32, '|', 1, 1498624194, 15, '15-kembgtvt.pdf', '15 kemBGTVT'), 
('16-bgtvt.s...pdf', 'pdf', 'file', 250650, 'assets/images/pdf.png', 32, 32, '|', 1, 1498624294, 15, '16-bgtvt.signed.pdf', '16 BGTVT signed'), 
('11-btc.signed.pdf', 'pdf', 'file', 328120, 'assets/images/pdf.png', 32, 32, '|', 1, 1498624393, 15, '11-btc.signed.pdf', '11 BTC signed'), 
('03-17.pdf', 'pdf', 'file', 284971, 'assets/images/pdf.png', 32, 32, '|', 1, 1498624560, 15, '03-17.pdf', '03 17'), 
('70.signed.pdf', 'pdf', 'file', 493429, 'assets/images/pdf.png', 32, 32, '|', 1, 1498635747, 15, '70.signed.pdf', '70 signed'), 
('11-bldtbxh...pdf', 'pdf', 'file', 400867, 'assets/images/pdf.png', 32, 32, '|', 1, 1498635772, 15, '11-bldtbxh.signed.pdf', '11 BLDTBXH signed'), 
('74.signed.pdf', 'pdf', 'file', 717328, 'assets/images/pdf.png', 32, 32, '|', 1, 1498635840, 15, '74.signed.pdf', '74 signed'), 
('39-bct.signed.pdf', 'pdf', 'file', 174698, 'assets/images/pdf.png', 32, 32, '|', 1, 1498636831, 15, '39-bct.signed.pdf', '39 BCT signed'), 
('21.signed.pdf', 'pdf', 'file', 276272, 'assets/images/pdf.png', 32, 32, '|', 1, 1498637063, 15, '21.signed.pdf', '21 signed'), 
('17btc.signed.pdf', 'pdf', 'file', 299741, 'assets/images/pdf.png', 32, 32, '|', 1, 1498637190, 15, '17btc.signed.pdf', '17  BTC signed'), 
('07.signed_01.pdf', 'pdf', 'file', 604001, 'assets/images/pdf.png', 32, 32, '|', 1, 1498637440, 15, '07.signed_01.pdf', '07 signed 01'), 
('20.signed.pdf', 'pdf', 'file', 1700000, 'assets/images/pdf.png', 32, 32, '|', 1, 1498637647, 15, '20.signed.pdf', '20 signed'), 
('252.signed_01.pdf', 'pdf', 'file', 143094, 'assets/images/pdf.png', 32, 32, '|', 1, 1498637675, 15, '252.signed_01.pdf', '252 signed 01'), 
('15-17.signed.pdf', 'pdf', 'file', 1699583, 'assets/images/pdf.png', 32, 32, '|', 1, 1498637754, 15, '15-17.signed.pdf', '15 17 signed'), 
('40.signed.pdf', 'pdf', 'file', 655943, 'assets/images/pdf.png', 32, 32, '|', 1, 1498638082, 15, '40.signed.pdf', '40 signed'), 
('resize-of-...jpg', 'jpg', 'image', 29082, 'assets/news/2017_06/resize-of-bat-dong-san-ha-noi.jpg', 80, 60, '300|224', 1, 1498643121, 22, 'resize-of-bat-dong-san-ha-noi.jpg', 'Resize of bat dong san ha noi'), 
('110246baox...jpg', 'jpg', 'image', 77847, 'assets/news/2017_06/110246baoxaydung_t4_2.jpg', 80, 54, '500|333', 1, 1498643239, 22, '110246baoxaydung_t4_2.jpg', '110246baoxaydung t4 2'), 
('thanhphove...jpg', 'jpg', 'image', 34821, 'assets/news/2017_06/thanhphovensonghong-f53ef-copy.jpg', 80, 57, '428|300', 1, 1498643573, 22, 'thanhphovensonghong-f53ef-copy.jpg', 'thanhphovensonghong f53ef Copy');


-- ---------------------------------------


--
-- Table structure for table `nv4_users`
--

DROP TABLE IF EXISTS `nv4_users`;
CREATE TABLE `nv4_users` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL DEFAULT '',
  `md5username` char(32) NOT NULL DEFAULT '',
  `password` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `first_name` varchar(100) NOT NULL DEFAULT '',
  `last_name` varchar(100) NOT NULL DEFAULT '',
  `gender` char(1) DEFAULT '',
  `photo` varchar(255) DEFAULT '',
  `birthday` int(11) NOT NULL,
  `sig` text,
  `regdate` int(11) NOT NULL DEFAULT '0',
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL DEFAULT '',
  `passlostkey` varchar(50) DEFAULT '',
  `view_mail` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `remember` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `in_groups` varchar(255) DEFAULT '',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active2step` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `secretkey` varchar(20) DEFAULT '',
  `checknum` varchar(40) DEFAULT '',
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  `last_ip` varchar(45) DEFAULT '',
  `last_agent` varchar(255) DEFAULT '',
  `last_openid` varchar(255) DEFAULT '',
  `idsite` int(11) NOT NULL DEFAULT '0',
  `safemode` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `safekey` varchar(40) DEFAULT '',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `md5username` (`md5username`),
  UNIQUE KEY `email` (`email`),
  KEY `idsite` (`idsite`)
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_users`
--

INSERT INTO `nv4_users` VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '{SSHA512}QSDW1liPChGwpbYPToKwfiJJZh80PG7IrbQSe9K8i6o/KupLTyn5Iqt1q7OVpFsKxYuzY8GPlCmnWS3o6RC1sTJmMmQ=', 'thao@vinades.vn', 'admin', '', '', '', 0, '', 1498555184, 'sadsadas', 'dsadsadsds', '', 0, 1, '1', 1, 0, '', '', 1498555184, '', '', '', 0, 0, '');


-- ---------------------------------------


--
-- Table structure for table `nv4_users_backupcodes`
--

DROP TABLE IF EXISTS `nv4_users_backupcodes`;
CREATE TABLE `nv4_users_backupcodes` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `is_used` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `time_used` int(11) unsigned NOT NULL DEFAULT '0',
  `time_creat` int(11) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `userid` (`userid`,`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_users_config`
--

DROP TABLE IF EXISTS `nv4_users_config`;
CREATE TABLE `nv4_users_config` (
  `config` varchar(100) NOT NULL,
  `content` text,
  `edit_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`config`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_users_config`
--

INSERT INTO `nv4_users_config` VALUES
('access_admin', 'a:6:{s:12:\"access_addus\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:14:\"access_waiting\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:13:\"access_editus\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:12:\"access_delus\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:13:\"access_passus\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}s:13:\"access_groups\";a:3:{i:1;b:1;i:2;b:1;i:3;b:1;}}', 1352873462), 
('password_simple', '000000|1234|2000|12345|111111|123123|123456|11223344|654321|696969|1234567|12345678|87654321|123456789|23456789|1234567890|66666666|68686868|66668888|88888888|99999999|999999999|1234569|12345679|aaaaaa|abc123|abc123@|abc@123|admin123|admin123@|admin@123|nuke123|nuke123@|nuke@123|adobe1|adobe123|azerty|baseball|dragon|football|harley|iloveyou|jennifer|jordan|letmein|macromedia|master|michael|monkey|mustang|password|photoshop|pussy|qwerty|shadow|superman|hoilamgi|khongbiet|khongco|khongcopass', 1498555144), 
('deny_email', 'yoursite.com|mysite.com|localhost|xxx', 1498555144), 
('deny_name', 'anonimo|anonymous|god|linux|nobody|operator|root', 1498555144), 
('avatar_width', '80', 1498555144), 
('avatar_height', '80', 1498555144), 
('active_group_newusers', '0', 1498555144), 
('min_old_user', '16', 1498555144), 
('siteterms_vi', '<p> Để trở thành thành viên, bạn phải cam kết đồng ý với các điều khoản dưới đây. Chúng tôi có thể thay đổi lại những điều khoản này vào bất cứ lúc nào và chúng tôi sẽ cố gắng thông báo đến bạn kịp thời.<br /> <br /> Bạn cam kết không gửi bất cứ bài viết có nội dung lừa đảo, thô tục, thiếu văn hoá; vu khống, khiêu khích, đe doạ người khác; liên quan đến các vấn đề tình dục hay bất cứ nội dung nào vi phạm luật pháp của quốc gia mà bạn đang sống, luật pháp của quốc gia nơi đặt máy chủ của website này hay luật pháp quốc tế. Nếu vẫn cố tình vi phạm, ngay lập tức bạn sẽ bị cấm tham gia vào website. Địa chỉ IP của tất cả các bài viết đều được ghi nhận lại để bảo vệ các điều khoản cam kết này trong trường hợp bạn không tuân thủ.<br /> <br /> Bạn đồng ý rằng website có quyền gỡ bỏ, sửa, di chuyển hoặc khoá bất kỳ bài viết nào trong website vào bất cứ lúc nào tuỳ theo nhu cầu công việc.<br /> <br /> Đăng ký làm thành viên của chúng tôi, bạn cũng phải đồng ý rằng, bất kỳ thông tin cá nhân nào mà bạn cung cấp đều được lưu trữ trong cơ sở dữ liệu của hệ thống. Mặc dù những thông tin này sẽ không được cung cấp cho bất kỳ người thứ ba nào khác mà không được sự đồng ý của bạn, chúng tôi không chịu trách nhiệm về việc những thông tin cá nhân này của bạn bị lộ ra bên ngoài từ những kẻ phá hoại có ý đồ xấu tấn công vào cơ sở dữ liệu của hệ thống.</p>', 1274757129);


-- ---------------------------------------


--
-- Table structure for table `nv4_users_field`
--

DROP TABLE IF EXISTS `nv4_users_field`;
CREATE TABLE `nv4_users_field` (
  `fid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `field` varchar(25) NOT NULL,
  `weight` int(10) unsigned NOT NULL DEFAULT '1',
  `field_type` enum('number','date','textbox','textarea','editor','select','radio','checkbox','multiselect') NOT NULL DEFAULT 'textbox',
  `field_choices` text NOT NULL,
  `sql_choices` text NOT NULL,
  `match_type` enum('none','alphanumeric','email','url','regex','callback') NOT NULL DEFAULT 'none',
  `match_regex` varchar(250) NOT NULL DEFAULT '',
  `func_callback` varchar(75) NOT NULL DEFAULT '',
  `min_length` int(11) NOT NULL DEFAULT '0',
  `max_length` bigint(20) unsigned NOT NULL DEFAULT '0',
  `required` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `show_register` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `user_editable` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `show_profile` tinyint(4) NOT NULL DEFAULT '1',
  `class` varchar(50) NOT NULL,
  `language` text NOT NULL,
  `default_value` varchar(255) NOT NULL DEFAULT '',
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`),
  UNIQUE KEY `field` (`field`)
) ENGINE=MyISAM  AUTO_INCREMENT=8  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_users_field`
--

INSERT INTO `nv4_users_field` VALUES
(1, 'first_name', 1, 'textbox', '', '', 'none', '', '', 0, 100, 1, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:4:\"Tên\";i:1;s:0:\"\";}}', '', 1), 
(2, 'last_name', 2, 'textbox', '', '', 'none', '', '', 0, 100, 0, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:20:\"Họ và tên đệm\";i:1;s:0:\"\";}}', '', 1), 
(3, 'gender', 3, 'select', 'a:3:{s:1:\"N\";s:0:\"\";s:1:\"M\";s:0:\"\";s:1:\"F\";s:0:\"\";}', '', 'none', '', '', 0, 1, 0, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:12:\"Giới tính\";i:1;s:0:\"\";}}', '2', 1), 
(4, 'birthday', 4, 'date', 'a:1:{s:12:\"current_date\";i:0;}', '', 'none', '', '', 0, 0, 1, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:22:\"Ngày tháng năm sinh\";i:1;s:0:\"\";}}', '0', 1), 
(5, 'sig', 5, 'textarea', '', '', 'none', '', '', 0, 1000, 0, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:9:\"Chữ ký\";i:1;s:0:\"\";}}', '', 1), 
(6, 'question', 6, 'textbox', '', '', 'none', '', '', 3, 255, 1, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:22:\"Câu hỏi bảo mật\";i:1;s:0:\"\";}}', '', 1), 
(7, 'answer', 7, 'textbox', '', '', 'none', '', '', 3, 255, 1, 1, 1, 1, 'input', 'a:1:{s:2:\"vi\";a:2:{i:0;s:22:\"Trả lời câu hỏi\";i:1;s:0:\"\";}}', '', 1);


-- ---------------------------------------


--
-- Table structure for table `nv4_users_groups`
--

DROP TABLE IF EXISTS `nv4_users_groups`;
CREATE TABLE `nv4_users_groups` (
  `group_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `email` varchar(100) DEFAULT '',
  `description` text,
  `content` text,
  `group_type` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:Sys, 1:approval, 2:public',
  `group_color` varchar(10) NOT NULL,
  `group_avatar` varchar(255) NOT NULL,
  `require_2step_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `require_2step_site` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) NOT NULL,
  `exp_time` int(11) NOT NULL,
  `weight` int(11) unsigned NOT NULL DEFAULT '0',
  `act` tinyint(1) unsigned NOT NULL,
  `idsite` int(11) unsigned NOT NULL DEFAULT '0',
  `numbers` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `siteus` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `config` varchar(250) DEFAULT '',
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `ktitle` (`title`,`idsite`),
  KEY `exp_time` (`exp_time`)
) ENGINE=MyISAM  AUTO_INCREMENT=13  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_users_groups`
--

INSERT INTO `nv4_users_groups` VALUES
(1, 'Super admin', '', 'Super Admin', '', 0, '', '', 0, 0, 0, 1498555144, 0, 1, 1, 0, 1, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}'), 
(2, 'General admin', '', 'General Admin', '', 0, '', '', 0, 0, 0, 1498555144, 0, 2, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}'), 
(3, 'Module admin', '', 'Module Admin', '', 0, '', '', 0, 0, 0, 1498555144, 0, 3, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}'), 
(4, 'Users', '', 'Users', '', 0, '', '', 0, 0, 0, 1498555144, 0, 4, 1, 0, 1, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}'), 
(7, 'New Users', '', 'New Users', '', 0, '', '', 0, 0, 0, 1498555144, 0, 5, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}'), 
(5, 'Guest', '', 'Guest', '', 0, '', '', 0, 0, 0, 1498555144, 0, 6, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}'), 
(6, 'All', '', 'All', '', 0, '', '', 0, 0, 0, 1498555144, 0, 7, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}'), 
(10, 'NukeViet-Fans', '', 'Nhóm những người hâm mộ hệ thống NukeViet', '', 2, '', '', 0, 0, 1, 1498555144, 0, 8, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}'), 
(11, 'NukeViet-Admins', '', 'Nhóm những người quản lý website xây dựng bằng hệ thống NukeViet', '', 2, '', '', 0, 0, 0, 1498555144, 0, 9, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}'), 
(12, 'NukeViet-Programmers', '', 'Nhóm Lập trình viên hệ thống NukeViet', '', 1, '', '', 0, 0, 0, 1498555144, 0, 10, 1, 0, 0, 0, 'a:7:{s:17:\"access_groups_add\";i:1;s:17:\"access_groups_del\";i:1;s:12:\"access_addus\";i:0;s:14:\"access_waiting\";i:0;s:13:\"access_editus\";i:0;s:12:\"access_delus\";i:0;s:13:\"access_passus\";i:0;}');


-- ---------------------------------------


--
-- Table structure for table `nv4_users_groups_users`
--

DROP TABLE IF EXISTS `nv4_users_groups_users`;
CREATE TABLE `nv4_users_groups_users` (
  `group_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `is_leader` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `approved` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (`group_id`,`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_users_groups_users`
--

INSERT INTO `nv4_users_groups_users` VALUES
(1, 1, 1, 1, '0');


-- ---------------------------------------


--
-- Table structure for table `nv4_users_info`
--

DROP TABLE IF EXISTS `nv4_users_info`;
CREATE TABLE `nv4_users_info` (
  `userid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_users_info`
--

INSERT INTO `nv4_users_info` VALUES
(1);


-- ---------------------------------------


--
-- Table structure for table `nv4_users_openid`
--

DROP TABLE IF EXISTS `nv4_users_openid`;
CREATE TABLE `nv4_users_openid` (
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `opid` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`opid`),
  KEY `userid` (`userid`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_users_question`
--

DROP TABLE IF EXISTS `nv4_users_question`;
CREATE TABLE `nv4_users_question` (
  `qid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL DEFAULT '',
  `lang` char(2) NOT NULL DEFAULT '',
  `weight` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0',
  `edit_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`qid`),
  UNIQUE KEY `title` (`title`,`lang`)
) ENGINE=MyISAM  AUTO_INCREMENT=8  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_users_question`
--

INSERT INTO `nv4_users_question` VALUES
(1, 'Bạn thích môn thể thao nào nhất', 'vi', 1, 1274840238, 1274840238), 
(2, 'Món ăn mà bạn yêu thích', 'vi', 2, 1274840250, 1274840250), 
(3, 'Thần tượng điện ảnh của bạn', 'vi', 3, 1274840257, 1274840257), 
(4, 'Bạn thích nhạc sỹ nào nhất', 'vi', 4, 1274840264, 1274840264), 
(5, 'Quê ngoại của bạn ở đâu', 'vi', 5, 1274840270, 1274840270), 
(6, 'Tên cuốn sách &quot;gối đầu giường&quot;', 'vi', 6, 1274840278, 1274840278), 
(7, 'Ngày lễ mà bạn luôn mong đợi', 'vi', 7, 1274840285, 1274840285);


-- ---------------------------------------


--
-- Table structure for table `nv4_users_reg`
--

DROP TABLE IF EXISTS `nv4_users_reg`;
CREATE TABLE `nv4_users_reg` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `md5username` char(32) NOT NULL DEFAULT '',
  `password` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `gender` char(1) NOT NULL DEFAULT '',
  `birthday` int(11) NOT NULL,
  `sig` text,
  `regdate` int(11) unsigned NOT NULL DEFAULT '0',
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL DEFAULT '',
  `checknum` varchar(50) NOT NULL DEFAULT '',
  `users_info` text,
  `openid_info` text,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `login` (`username`),
  UNIQUE KEY `md5username` (`md5username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_blocks_groups`
--

DROP TABLE IF EXISTS `nv4_vi_blocks_groups`;
CREATE TABLE `nv4_vi_blocks_groups` (
  `bid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(55) NOT NULL,
  `module` varchar(55) NOT NULL,
  `file_name` varchar(55) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `template` varchar(55) DEFAULT NULL,
  `position` varchar(55) DEFAULT NULL,
  `exp_time` int(11) DEFAULT '0',
  `active` varchar(10) DEFAULT '1',
  `act` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `groups_view` varchar(255) DEFAULT '',
  `all_func` tinyint(4) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  `config` text,
  PRIMARY KEY (`bid`),
  KEY `theme` (`theme`),
  KEY `module` (`module`),
  KEY `position` (`position`),
  KEY `exp_time` (`exp_time`)
) ENGINE=MyISAM  AUTO_INCREMENT=60  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_blocks_groups`
--

INSERT INTO `nv4_vi_blocks_groups` VALUES
(1, 'default', 'news', 'module.block_newscenter.php', 'Tin mới nhất', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 1, 'a:10:{s:6:\"numrow\";i:6;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:12:\"length_title\";i:0;s:15:\"length_hometext\";i:0;s:17:\"length_othertitle\";i:60;s:5:\"width\";i:500;s:6:\"height\";i:0;s:7:\"nocatid\";a:0:{}}'), 
(2, 'default', 'banners', 'global.banners.php', 'Quảng cáo giữa trang', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 2, 'a:1:{s:12:\"idplanbanner\";i:1;}'), 
(3, 'default', 'news', 'global.block_category.php', 'Chủ đề', '', 'no_title', '[LEFT]', 0, '1', 1, '6', 0, 1, 'a:2:{s:5:\"catid\";i:0;s:12:\"title_length\";i:25;}'), 
(4, 'default', 'theme', 'global.module_menu.php', 'Module Menu', '', 'no_title', '[LEFT]', 0, '1', 1, '6', 0, 2, ''), 
(5, 'default', 'banners', 'global.banners.php', 'Quảng cáo cột trái', '', 'no_title', '[LEFT]', 0, '1', 1, '6', 1, 3, 'a:1:{s:12:\"idplanbanner\";i:2;}'), 
(6, 'default', 'statistics', 'global.counter.php', 'Thống kê', '', 'primary', '[LEFT]', 0, '1', 1, '6', 1, 4, ''), 
(8, 'default', 'banners', 'global.banners.php', 'Quảng cáo cột phải', '', 'no_title', '[RIGHT]', 0, '1', 1, '6', 1, 2, 'a:1:{s:12:\"idplanbanner\";i:3;}'), 
(9, 'default', 'voting', 'global.voting_random.php', 'Thăm dò ý kiến', '', 'primary', '[RIGHT]', 0, '1', 1, '6', 1, 3, ''), 
(10, 'default', 'news', 'global.block_tophits.php', 'Tin xem nhiều', '', 'primary', '[RIGHT]', 0, '1', 1, '6', 1, 4, 'a:6:{s:10:\"number_day\";i:3650;s:6:\"numrow\";i:10;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:7:\"nocatid\";a:2:{i:0;i:10;i:1;i:11;}}'), 
(11, 'default', 'theme', 'global.copyright.php', 'Copyright', '', 'no_title', '[FOOTER_SITE]', 0, '1', 1, '6', 1, 1, 'a:5:{s:12:\"copyright_by\";s:0:\"\";s:13:\"copyright_url\";s:0:\"\";s:9:\"design_by\";s:12:\"VINADES.,JSC\";s:10:\"design_url\";s:18:\"http://vinades.vn/\";s:13:\"siteterms_url\";s:39:\"/index.php?language=vi&amp;nv=siteterms\";}'), 
(12, 'default', 'contact', 'global.contact_form.php', 'Feedback', '', 'no_title', '[FOOTER_SITE]', 0, '1', 1, '6', 1, 2, ''), 
(13, 'default', 'theme', 'global.QR_code.php', 'QR code', '', 'no_title', '[QR_CODE]', 0, '1', 1, '6', 1, 1, 'a:3:{s:5:\"level\";s:1:\"M\";s:15:\"pixel_per_point\";i:4;s:11:\"outer_frame\";i:1;}'), 
(14, 'default', 'statistics', 'global.counter_button.php', 'Online button', '', 'no_title', '[QR_CODE]', 0, '1', 1, '6', 1, 2, ''), 
(15, 'default', 'users', 'global.user_button.php', 'Đăng nhập thành viên', '', 'no_title', '[PERSONALAREA]', 0, '1', 1, '6', 1, 1, ''), 
(16, 'default', 'theme', 'global.company_info.php', 'Công ty chủ quản', '', 'simple', '[COMPANY_INFO]', 0, '1', 1, '6', 1, 1, 'a:17:{s:12:\"company_name\";s:58:\"Công ty cổ phần phát triển nguồn mở Việt Nam\";s:15:\"company_address\";s:72:\"Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội\";s:16:\"company_sortname\";s:12:\"VINADES.,JSC\";s:15:\"company_regcode\";s:0:\"\";s:16:\"company_regplace\";s:0:\"\";s:21:\"company_licensenumber\";s:0:\"\";s:22:\"company_responsibility\";s:0:\"\";s:15:\"company_showmap\";i:1;s:20:\"company_mapcenterlat\";d:20.984516000000013;s:20:\"company_mapcenterlng\";d:105.795475;s:14:\"company_maplat\";d:20.984515999999999;s:14:\"company_maplng\";d:105.79547500000001;s:15:\"company_mapzoom\";i:17;s:13:\"company_phone\";s:56:\"+84-4-85872007[+84485872007]|+84-904762534[+84904762534]\";s:11:\"company_fax\";s:14:\"+84-4-35500914\";s:13:\"company_email\";s:18:\"contact@vinades.vn\";s:15:\"company_website\";s:17:\"http://vinades.vn\";}'), 
(17, 'default', 'menu', 'global.bootstrap.php', 'Menu Site', '', 'no_title', '[MENU_SITE]', 0, '1', 1, '6', 1, 1, 'a:2:{s:6:\"menuid\";i:2;s:12:\"title_length\";i:0;}'), 
(18, 'default', 'contact', 'global.contact_default.php', 'Contact Default', '', 'no_title', '[CONTACT_DEFAULT]', 0, '1', 1, '6', 1, 1, ''), 
(19, 'default', 'theme', 'global.social.php', 'Social icon', '', 'no_title', '[SOCIAL_ICONS]', 0, '1', 1, '6', 1, 1, 'a:4:{s:8:\"facebook\";s:32:\"http://www.facebook.com/nukeviet\";s:11:\"google_plus\";s:32:\"https://www.google.com/+nukeviet\";s:7:\"youtube\";s:37:\"https://www.youtube.com/user/nukeviet\";s:7:\"twitter\";s:28:\"https://twitter.com/nukeviet\";}'), 
(20, 'default', 'theme', 'global.menu_footer.php', 'Các chuyên mục chính', '', 'simple', '[MENU_FOOTER]', 0, '1', 1, '6', 1, 1, 'a:1:{s:14:\"module_in_menu\";a:8:{i:0;s:5:\"about\";i:1;s:4:\"news\";i:2;s:5:\"users\";i:3;s:7:\"contact\";i:4;s:6:\"voting\";i:5;s:7:\"banners\";i:6;s:4:\"seek\";i:7;s:5:\"feeds\";}}'), 
(22, 'mobile_default', 'menu', 'global.metismenu.php', 'Menu Site', '', 'no_title', '[MENU_SITE]', 0, '1', 1, '6', 1, 1, 'a:2:{s:6:\"menuid\";i:1;s:12:\"title_length\";i:0;}'), 
(23, 'mobile_default', 'users', 'global.user_button.php', 'Sign In', '', 'no_title', '[MENU_SITE]', 0, '1', 1, '6', 1, 2, ''), 
(24, 'mobile_default', 'contact', 'global.contact_default.php', 'Contact Default', '', 'no_title', '[SOCIAL_ICONS]', 0, '1', 1, '6', 1, 1, ''), 
(25, 'mobile_default', 'contact', 'global.contact_form.php', 'Feedback', '', 'no_title', '[SOCIAL_ICONS]', 0, '1', 1, '6', 1, 2, ''), 
(26, 'mobile_default', 'theme', 'global.social.php', 'Social icon', '', 'no_title', '[SOCIAL_ICONS]', 0, '1', 1, '6', 1, 3, 'a:4:{s:8:\"facebook\";s:32:\"http://www.facebook.com/nukeviet\";s:11:\"google_plus\";s:32:\"https://www.google.com/+nukeviet\";s:7:\"youtube\";s:37:\"https://www.youtube.com/user/nukeviet\";s:7:\"twitter\";s:28:\"https://twitter.com/nukeviet\";}'), 
(27, 'mobile_default', 'theme', 'global.QR_code.php', 'QR code', '', 'no_title', '[SOCIAL_ICONS]', 0, '1', 1, '6', 1, 4, 'a:3:{s:5:\"level\";s:1:\"L\";s:15:\"pixel_per_point\";i:4;s:11:\"outer_frame\";i:1;}'), 
(28, 'mobile_default', 'theme', 'global.copyright.php', 'Copyright', '', 'no_title', '[FOOTER_SITE]', 0, '1', 1, '6', 1, 1, 'a:5:{s:12:\"copyright_by\";s:0:\"\";s:13:\"copyright_url\";s:0:\"\";s:9:\"design_by\";s:12:\"VINADES.,JSC\";s:10:\"design_url\";s:18:\"http://vinades.vn/\";s:13:\"siteterms_url\";s:39:\"/index.php?language=vi&amp;nv=siteterms\";}'), 
(29, 'mobile_default', 'theme', 'global.menu_footer.php', 'Các chuyên mục chính', '', 'primary', '[MENU_FOOTER]', 0, '1', 1, '6', 1, 1, 'a:1:{s:14:\"module_in_menu\";a:9:{i:0;s:5:\"about\";i:1;s:4:\"news\";i:2;s:5:\"users\";i:3;s:7:\"contact\";i:4;s:6:\"voting\";i:5;s:7:\"banners\";i:6;s:4:\"seek\";i:7;s:5:\"feeds\";i:8;s:9:\"siteterms\";}}'), 
(30, 'mobile_default', 'theme', 'global.company_info.php', 'Công ty chủ quản', '', 'primary', '[COMPANY_INFO]', 0, '1', 1, '6', 1, 1, 'a:17:{s:12:\"company_name\";s:58:\"Công ty cổ phần phát triển nguồn mở Việt Nam\";s:15:\"company_address\";s:72:\"Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội\";s:16:\"company_sortname\";s:12:\"VINADES.,JSC\";s:15:\"company_regcode\";s:0:\"\";s:16:\"company_regplace\";s:0:\"\";s:21:\"company_licensenumber\";s:0:\"\";s:22:\"company_responsibility\";s:0:\"\";s:15:\"company_showmap\";i:1;s:20:\"company_mapcenterlat\";d:20.984516000000013;s:20:\"company_mapcenterlng\";d:105.795475;s:14:\"company_maplat\";d:20.984515999999999;s:14:\"company_maplng\";d:105.79547500000001;s:15:\"company_mapzoom\";i:17;s:13:\"company_phone\";s:56:\"+84-4-85872007[+84485872007]|+84-904762534[+84904762534]\";s:11:\"company_fax\";s:14:\"+84-4-35500914\";s:13:\"company_email\";s:18:\"contact@vinades.vn\";s:15:\"company_website\";s:17:\"http://vinades.vn\";}'), 
(31, 'egov', 'contact', 'global.contact_default.php', 'Contact Default', '', 'no_title', '[CONTACT_DEFAULT]', 0, '1', 1, '6', 1, 1, ''), 
(33, 'egov', 'theme', 'global.copyright.php', 'Copyright', '', 'no_title', '[FOOTER_SITE]', 0, '1', 1, '6', 1, 1, 'a:5:{s:12:\"copyright_by\";s:0:\"\";s:13:\"copyright_url\";s:0:\"\";s:9:\"design_by\";s:12:\"VINADES.,JSC\";s:10:\"design_url\";s:18:\"http://vinades.vn/\";s:13:\"siteterms_url\";s:39:\"/index.php?language=vi&nv=siteterms\";}'), 
(34, 'egov', 'contact', 'global.contact_form.php', 'Feedback', '', 'no_title', '[FOOTER_SITE]', 0, '1', 1, '6', 1, 2, ''), 
(35, 'egov', 'news', 'global.block_category.php', 'Chủ đề', '', 'no_title', '[LEFT]', 0, '1', 1, '6', 0, 1, 'a:2:{s:5:\"catid\";i:0;s:12:\"title_length\";i:25;}'), 
(36, 'egov', 'theme', 'global.module_menu.php', 'Module Menu', '', 'no_title', '[LEFT]', 0, '1', 1, '6', 0, 2, ''), 
(37, 'egov', 'banners', 'global.banners.php', 'Quảng cáo cột trái', '', 'no_title', '[LEFT]', 0, '1', 1, '6', 1, 3, 'a:1:{s:12:\"idplanbanner\";i:2;}'), 
(38, 'egov', 'statistics', 'global.counter.php', 'Thống kê', '', 'primary', '[LEFT]', 0, '1', 1, '6', 1, 4, ''), 
(39, 'egov', 'theme', 'global.menu_footer.php', 'Các chuyên mục chính', '', 'simple', '[MENU_FOOTER]', 0, '1', 1, '6', 1, 1, 'a:1:{s:14:\"module_in_menu\";a:8:{i:0;s:5:\"about\";i:1;s:4:\"news\";i:2;s:5:\"users\";i:3;s:7:\"contact\";i:4;s:6:\"voting\";i:5;s:7:\"banners\";i:6;s:4:\"seek\";i:7;s:5:\"feeds\";}}'), 
(40, 'egov', 'menu', 'global.bootstrap.php', 'Menu Site', '', 'no_title', '[MENU_SITE]', 0, '1', 1, '6', 1, 1, 'a:2:{s:6:\"menuid\";i:1;s:12:\"title_length\";i:0;}'), 
(41, 'egov', 'users', 'global.user_button.php', 'Đăng nhập thành viên', '', 'no_title', '[PERSONALAREA]', 0, '1', 1, '6', 1, 1, ''), 
(42, 'egov', 'theme', 'global.QR_code.php', 'QR code', '', 'no_title', '[QR_CODE]', 0, '1', 1, '6', 1, 1, 'a:3:{s:5:\"level\";s:1:\"M\";s:15:\"pixel_per_point\";i:4;s:11:\"outer_frame\";i:1;}'), 
(43, 'egov', 'statistics', 'global.counter_button.php', 'Online button', '', 'no_title', '[QR_CODE]', 0, '1', 1, '6', 1, 2, ''), 
(45, 'egov', 'banners', 'global.banners.php', 'Quảng cáo cột phải', '', 'no_title', '[RIGHT]', 0, '1', 1, '6', 1, 1, 'a:1:{s:12:\"idplanbanner\";i:3;}'), 
(46, 'egov', 'banners', 'global.banners.php', 'Thăm dò ý kiến', '', 'no_title', '[RIGHT]', 0, '1', 1, '6', 0, 2, 'a:1:{s:12:\"idplanbanner\";i:5;}'), 
(48, 'egov', 'theme', 'global.social.php', 'Social icon', '', 'no_title', '[SOCIAL_ICONS]', 0, '1', 1, '6', 1, 1, 'a:4:{s:8:\"facebook\";s:32:\"http://www.facebook.com/nukeviet\";s:11:\"google_plus\";s:32:\"https://www.google.com/+nukeviet\";s:7:\"youtube\";s:37:\"https://www.youtube.com/user/nukeviet\";s:7:\"twitter\";s:28:\"https://twitter.com/nukeviet\";}'), 
(49, 'egov', 'news', 'module.block_newscenter.php', 'Tin mới nhất', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 1, 'a:10:{s:6:\"numrow\";i:6;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:12:\"length_title\";i:0;s:15:\"length_hometext\";i:0;s:17:\"length_othertitle\";i:60;s:5:\"width\";i:500;s:6:\"height\";i:0;s:7:\"nocatid\";a:0:{}}'), 
(50, 'egov', 'banners', 'global.banners.php', 'Quảng cáo giữa trang', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 2, 'a:1:{s:12:\"idplanbanner\";i:1;}'), 
(51, 'egov', 'theme', 'global.sliders.php', 'global sliders', '', 'no_title', '[HEADER]', 0, '1', 1, '6', 0, 1, 'a:1:{s:12:\"idplanbanner\";i:4;}'), 
(52, 'egov', 'news', 'module.block_newscenter.php', 'module block newscenter', '', '', '[TOP]', 0, '1', 1, '6', 0, 3, 'a:10:{s:6:\"numrow\";i:5;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:12:\"length_title\";i:0;s:15:\"length_hometext\";i:0;s:17:\"length_othertitle\";i:0;s:5:\"width\";i:400;s:6:\"height\";i:0;s:7:\"nocatid\";a:0:{}}'), 
(53, 'egov', 'news', 'global.block_groups.php', 'Tin tiêu điểm', '/vi/news/groups/Tin-tieu-diem/', '', '[RIGHT_1]', 0, '1', 1, '6', 0, 1, 'a:6:{s:7:\"blockid\";i:1;s:6:\"numrow\";i:1;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";}'), 
(54, 'egov', 'menu', 'global.superfish.php', 'global superfish', '', '', '[BOTTOM]', 0, '1', 1, '6', 0, 1, 'a:2:{s:6:\"menuid\";i:3;s:12:\"title_length\";i:20;}'), 
(55, 'egov', 'page', 'global.html.php', 'global html', '', '', '[BOTTOM]', 0, '1', 1, '6', 0, 2, 'a:1:{s:11:\"htmlcontent\";s:18:\"Tin hoạt động\";}'), 
(56, 'egov', 'news', 'global.block_news_cat.php', 'global block news cat', '', '', '[NEWS_1]', 0, '1', 1, '6', 0, 1, 'a:6:{s:5:\"catid\";a:1:{i:0;s:2:\"14\";}s:6:\"numrow\";i:1;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";}'), 
(57, 'egov', 'news', 'global.block_news_cat.php', 'global block news cat', '', '', '[NEWS_2]', 0, '1', 1, '6', 0, 1, 'a:6:{s:5:\"catid\";a:1:{i:0;s:2:\"15\";}s:6:\"numrow\";i:1;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";}'), 
(58, 'egov', 'news', 'global.block_news_cat.php', 'global block news cat', '', '', '[NEWS_1]', 0, '1', 1, '6', 0, 2, 'a:6:{s:5:\"catid\";a:1:{i:0;s:2:\"16\";}s:6:\"numrow\";i:1;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";}'), 
(59, 'egov', 'news', 'global.block_news_cat.php', 'global block news cat', '', '', '[NEWS_2]', 0, '1', 1, '6', 0, 2, 'a:6:{s:5:\"catid\";a:1:{i:0;s:2:\"17\";}s:6:\"numrow\";i:1;s:12:\"title_length\";i:0;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";}');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_blocks_weight`
--

DROP TABLE IF EXISTS `nv4_vi_blocks_weight`;
CREATE TABLE `nv4_vi_blocks_weight` (
  `bid` mediumint(8) NOT NULL DEFAULT '0',
  `func_id` mediumint(8) NOT NULL DEFAULT '0',
  `weight` mediumint(8) NOT NULL DEFAULT '0',
  UNIQUE KEY `bid` (`bid`,`func_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_blocks_weight`
--

INSERT INTO `nv4_vi_blocks_weight` VALUES
(16, 1, 1), 
(16, 38, 1), 
(16, 39, 1), 
(16, 40, 1), 
(16, 41, 1), 
(16, 47, 1), 
(16, 48, 1), 
(16, 49, 1), 
(16, 50, 1), 
(16, 60, 1), 
(16, 63, 1), 
(16, 4, 1), 
(16, 5, 1), 
(16, 6, 1), 
(16, 7, 1), 
(16, 8, 1), 
(16, 9, 1), 
(16, 10, 1), 
(16, 11, 1), 
(16, 12, 1), 
(16, 51, 1), 
(16, 62, 1), 
(16, 54, 1), 
(16, 55, 1), 
(16, 31, 1), 
(16, 32, 1), 
(16, 33, 1), 
(16, 34, 1), 
(16, 35, 1), 
(16, 36, 1), 
(16, 37, 1), 
(16, 57, 1), 
(16, 58, 1), 
(16, 59, 1), 
(16, 19, 1), 
(16, 20, 1), 
(16, 21, 1), 
(16, 22, 1), 
(16, 23, 1), 
(16, 24, 1), 
(16, 25, 1), 
(16, 26, 1), 
(16, 27, 1), 
(16, 28, 1), 
(16, 29, 1), 
(16, 61, 1), 
(18, 1, 1), 
(18, 38, 1), 
(18, 39, 1), 
(18, 40, 1), 
(18, 41, 1), 
(18, 47, 1), 
(18, 48, 1), 
(18, 49, 1), 
(18, 50, 1), 
(18, 60, 1), 
(18, 63, 1), 
(18, 4, 1), 
(18, 5, 1), 
(18, 6, 1), 
(18, 7, 1), 
(18, 8, 1), 
(18, 9, 1), 
(18, 10, 1), 
(18, 11, 1), 
(18, 12, 1), 
(18, 51, 1), 
(18, 62, 1), 
(18, 54, 1), 
(18, 55, 1), 
(18, 31, 1), 
(18, 32, 1), 
(18, 33, 1), 
(18, 34, 1), 
(18, 35, 1), 
(18, 36, 1), 
(18, 37, 1), 
(18, 57, 1), 
(18, 58, 1), 
(18, 59, 1), 
(18, 19, 1), 
(18, 20, 1), 
(18, 21, 1), 
(18, 22, 1), 
(18, 23, 1), 
(18, 24, 1), 
(18, 25, 1), 
(18, 26, 1), 
(18, 27, 1), 
(18, 28, 1), 
(18, 29, 1), 
(18, 61, 1), 
(11, 1, 1), 
(11, 38, 1), 
(11, 39, 1), 
(11, 40, 1), 
(11, 41, 1), 
(11, 47, 1), 
(11, 48, 1), 
(11, 49, 1), 
(11, 50, 1), 
(11, 60, 1), 
(11, 63, 1), 
(11, 4, 1), 
(11, 5, 1), 
(11, 6, 1), 
(11, 7, 1), 
(11, 8, 1), 
(11, 9, 1), 
(11, 10, 1), 
(11, 11, 1), 
(11, 12, 1), 
(11, 51, 1), 
(11, 62, 1), 
(11, 54, 1), 
(11, 55, 1), 
(11, 31, 1), 
(11, 32, 1), 
(11, 33, 1), 
(11, 34, 1), 
(11, 35, 1), 
(11, 36, 1), 
(11, 37, 1), 
(11, 57, 1), 
(11, 58, 1), 
(11, 59, 1), 
(11, 19, 1), 
(11, 20, 1), 
(11, 21, 1), 
(11, 22, 1), 
(11, 23, 1), 
(11, 24, 1), 
(11, 25, 1), 
(11, 26, 1), 
(11, 27, 1), 
(11, 28, 1), 
(11, 29, 1), 
(11, 61, 1), 
(12, 1, 2), 
(12, 38, 2), 
(12, 39, 2), 
(12, 40, 2), 
(12, 41, 2), 
(12, 47, 2), 
(12, 48, 2), 
(12, 49, 2), 
(12, 50, 2), 
(12, 60, 2), 
(12, 63, 2), 
(12, 4, 2), 
(12, 5, 2), 
(12, 6, 2), 
(12, 7, 2), 
(12, 8, 2), 
(12, 9, 2), 
(12, 10, 2), 
(12, 11, 2), 
(12, 12, 2), 
(12, 51, 2), 
(12, 62, 2), 
(12, 54, 2), 
(12, 55, 2), 
(12, 31, 2), 
(12, 32, 2), 
(12, 33, 2), 
(12, 34, 2), 
(12, 35, 2), 
(12, 36, 2), 
(12, 37, 2), 
(12, 57, 2), 
(12, 58, 2), 
(12, 59, 2), 
(12, 19, 2), 
(12, 20, 2), 
(12, 21, 2), 
(12, 22, 2), 
(12, 23, 2), 
(12, 24, 2), 
(12, 25, 2), 
(12, 26, 2), 
(12, 27, 2), 
(12, 28, 2), 
(12, 29, 2), 
(12, 61, 2), 
(3, 4, 1), 
(3, 5, 1), 
(3, 6, 1), 
(3, 7, 1), 
(3, 8, 1), 
(3, 9, 1), 
(3, 10, 1), 
(3, 11, 1), 
(3, 12, 1), 
(4, 19, 1), 
(4, 20, 1), 
(4, 21, 1), 
(4, 22, 1), 
(4, 23, 1), 
(4, 24, 1), 
(4, 25, 1), 
(4, 26, 1), 
(4, 27, 1), 
(4, 28, 1), 
(4, 31, 1), 
(4, 32, 1), 
(4, 33, 1), 
(4, 34, 1), 
(4, 35, 1), 
(4, 36, 1), 
(4, 37, 1), 
(5, 1, 1), 
(5, 38, 1), 
(5, 39, 1), 
(5, 40, 1), 
(5, 41, 1), 
(5, 47, 1), 
(5, 48, 1), 
(5, 49, 1), 
(5, 50, 1), 
(5, 60, 1), 
(5, 63, 1), 
(5, 4, 2), 
(5, 5, 2), 
(5, 6, 2), 
(5, 7, 2), 
(5, 8, 2), 
(5, 9, 2), 
(5, 10, 2), 
(5, 11, 2), 
(5, 12, 2), 
(5, 51, 1), 
(5, 62, 1), 
(5, 54, 1), 
(5, 55, 1), 
(5, 31, 2), 
(5, 32, 2), 
(5, 33, 2), 
(5, 34, 2), 
(5, 35, 2), 
(5, 36, 2), 
(5, 37, 2), 
(5, 57, 1), 
(5, 58, 1), 
(5, 59, 1), 
(5, 19, 2), 
(5, 20, 2), 
(5, 21, 2), 
(5, 22, 2), 
(5, 23, 2), 
(5, 24, 2), 
(5, 25, 2), 
(5, 26, 2), 
(5, 27, 2), 
(5, 28, 2), 
(5, 29, 1), 
(5, 61, 1), 
(6, 1, 2), 
(6, 38, 2), 
(6, 39, 2), 
(6, 40, 2), 
(6, 41, 2), 
(6, 47, 2), 
(6, 48, 2), 
(6, 49, 2), 
(6, 50, 2), 
(6, 60, 2), 
(6, 63, 2), 
(6, 4, 3), 
(6, 5, 3), 
(6, 6, 3), 
(6, 7, 3), 
(6, 8, 3), 
(6, 9, 3), 
(6, 10, 3), 
(6, 11, 3), 
(6, 12, 3), 
(6, 51, 2), 
(6, 62, 2), 
(6, 54, 2), 
(6, 55, 2), 
(6, 31, 3), 
(6, 32, 3), 
(6, 33, 3), 
(6, 34, 3), 
(6, 35, 3), 
(6, 36, 3), 
(6, 37, 3), 
(6, 57, 2), 
(6, 58, 2), 
(6, 59, 2), 
(6, 19, 3), 
(6, 20, 3), 
(6, 21, 3), 
(6, 22, 3), 
(6, 23, 3), 
(6, 24, 3), 
(6, 25, 3), 
(6, 26, 3), 
(6, 27, 3), 
(6, 28, 3), 
(6, 29, 2), 
(6, 61, 2), 
(20, 1, 1), 
(20, 38, 1), 
(20, 39, 1), 
(20, 40, 1), 
(20, 41, 1), 
(20, 47, 1), 
(20, 48, 1), 
(20, 49, 1), 
(20, 50, 1), 
(20, 60, 1), 
(20, 63, 1), 
(20, 4, 1), 
(20, 5, 1), 
(20, 6, 1), 
(20, 7, 1), 
(20, 8, 1), 
(20, 9, 1), 
(20, 10, 1), 
(20, 11, 1), 
(20, 12, 1), 
(20, 51, 1), 
(20, 62, 1), 
(20, 54, 1), 
(20, 55, 1), 
(20, 31, 1), 
(20, 32, 1), 
(20, 33, 1), 
(20, 34, 1), 
(20, 35, 1), 
(20, 36, 1), 
(20, 37, 1), 
(20, 57, 1), 
(20, 58, 1), 
(20, 59, 1), 
(20, 19, 1), 
(20, 20, 1), 
(20, 21, 1), 
(20, 22, 1), 
(20, 23, 1), 
(20, 24, 1), 
(20, 25, 1), 
(20, 26, 1), 
(20, 27, 1), 
(20, 28, 1), 
(20, 29, 1), 
(20, 61, 1), 
(17, 1, 1), 
(17, 38, 1), 
(17, 39, 1), 
(17, 40, 1), 
(17, 41, 1), 
(17, 47, 1), 
(17, 48, 1), 
(17, 49, 1), 
(17, 50, 1), 
(17, 60, 1), 
(17, 63, 1), 
(17, 4, 1), 
(17, 5, 1), 
(17, 6, 1), 
(17, 7, 1), 
(17, 8, 1), 
(17, 9, 1), 
(17, 10, 1), 
(17, 11, 1), 
(17, 12, 1), 
(17, 51, 1), 
(17, 62, 1), 
(17, 54, 1), 
(17, 55, 1), 
(17, 31, 1), 
(17, 32, 1), 
(17, 33, 1), 
(17, 34, 1), 
(17, 35, 1), 
(17, 36, 1), 
(17, 37, 1), 
(17, 57, 1), 
(17, 58, 1), 
(17, 59, 1), 
(17, 19, 1), 
(17, 20, 1), 
(17, 21, 1), 
(17, 22, 1), 
(17, 23, 1), 
(17, 24, 1), 
(17, 25, 1), 
(17, 26, 1), 
(17, 27, 1), 
(17, 28, 1), 
(17, 29, 1), 
(17, 61, 1), 
(15, 1, 1), 
(15, 38, 1), 
(15, 39, 1), 
(15, 40, 1), 
(15, 41, 1), 
(15, 47, 1), 
(15, 48, 1), 
(15, 49, 1), 
(15, 50, 1), 
(15, 60, 1), 
(15, 63, 1), 
(15, 4, 1), 
(15, 5, 1), 
(15, 6, 1), 
(15, 7, 1), 
(15, 8, 1), 
(15, 9, 1), 
(15, 10, 1), 
(15, 11, 1), 
(15, 12, 1), 
(15, 51, 1), 
(15, 62, 1), 
(15, 54, 1), 
(15, 55, 1), 
(15, 31, 1), 
(15, 32, 1), 
(15, 33, 1), 
(15, 34, 1), 
(15, 35, 1), 
(15, 36, 1), 
(15, 37, 1), 
(15, 57, 1), 
(15, 58, 1), 
(15, 59, 1), 
(15, 19, 1), 
(15, 20, 1), 
(15, 21, 1), 
(15, 22, 1), 
(15, 23, 1), 
(15, 24, 1), 
(15, 25, 1), 
(15, 26, 1), 
(15, 27, 1), 
(15, 28, 1), 
(15, 29, 1), 
(15, 61, 1), 
(13, 1, 1), 
(13, 38, 1), 
(13, 39, 1), 
(13, 40, 1), 
(13, 41, 1), 
(13, 47, 1), 
(13, 48, 1), 
(13, 49, 1), 
(13, 50, 1), 
(13, 60, 1), 
(13, 63, 1), 
(13, 4, 1), 
(13, 5, 1), 
(13, 6, 1), 
(13, 7, 1), 
(13, 8, 1), 
(13, 9, 1), 
(13, 10, 1), 
(13, 11, 1), 
(13, 12, 1), 
(13, 51, 1), 
(13, 62, 1), 
(13, 54, 1), 
(13, 55, 1), 
(13, 31, 1), 
(13, 32, 1), 
(13, 33, 1), 
(13, 34, 1), 
(13, 35, 1), 
(13, 36, 1), 
(13, 37, 1), 
(13, 57, 1), 
(13, 58, 1), 
(13, 59, 1), 
(13, 19, 1), 
(13, 20, 1), 
(13, 21, 1), 
(13, 22, 1), 
(13, 23, 1), 
(13, 24, 1), 
(13, 25, 1), 
(13, 26, 1), 
(13, 27, 1), 
(13, 28, 1), 
(13, 29, 1), 
(13, 61, 1), 
(14, 1, 2), 
(14, 38, 2), 
(14, 39, 2), 
(14, 40, 2), 
(14, 41, 2), 
(14, 47, 2), 
(14, 48, 2), 
(14, 49, 2), 
(14, 50, 2), 
(14, 60, 2), 
(14, 63, 2), 
(14, 4, 2), 
(14, 5, 2), 
(14, 6, 2), 
(14, 7, 2), 
(14, 8, 2), 
(14, 9, 2), 
(14, 10, 2), 
(14, 11, 2), 
(14, 12, 2), 
(14, 51, 2), 
(14, 62, 2), 
(14, 54, 2), 
(14, 55, 2), 
(14, 31, 2), 
(14, 32, 2), 
(14, 33, 2), 
(14, 34, 2), 
(14, 35, 2), 
(14, 36, 2), 
(14, 37, 2), 
(14, 57, 2), 
(14, 58, 2), 
(14, 59, 2), 
(14, 19, 2), 
(14, 20, 2), 
(14, 21, 2), 
(14, 22, 2), 
(14, 23, 2), 
(14, 24, 2), 
(14, 25, 2), 
(14, 26, 2), 
(14, 27, 2), 
(14, 28, 2), 
(14, 29, 2), 
(14, 61, 2), 
(8, 1, 2), 
(8, 38, 2), 
(8, 39, 2), 
(8, 40, 2), 
(8, 41, 2), 
(8, 47, 2), 
(8, 48, 2), 
(8, 49, 2), 
(8, 50, 2), 
(8, 60, 2), 
(8, 63, 2), 
(8, 4, 2), 
(8, 5, 2), 
(8, 6, 2), 
(8, 7, 2), 
(8, 8, 2), 
(8, 9, 2), 
(8, 10, 2), 
(8, 11, 2), 
(8, 12, 2), 
(8, 51, 2), 
(8, 62, 2), 
(8, 54, 2), 
(8, 55, 2), 
(8, 31, 2), 
(8, 32, 2), 
(8, 33, 2), 
(8, 34, 2), 
(8, 35, 2), 
(8, 36, 2), 
(8, 37, 2), 
(8, 57, 2), 
(8, 58, 2), 
(8, 59, 2), 
(8, 19, 2), 
(8, 20, 2), 
(8, 21, 2), 
(8, 22, 2), 
(8, 23, 2), 
(8, 24, 2), 
(8, 25, 2), 
(8, 26, 2), 
(8, 27, 2), 
(8, 28, 2), 
(8, 29, 2), 
(8, 61, 2), 
(9, 1, 3), 
(9, 38, 3), 
(9, 39, 3), 
(9, 40, 3), 
(9, 41, 3), 
(9, 47, 3), 
(9, 48, 3), 
(9, 49, 3), 
(9, 50, 3), 
(9, 60, 3), 
(9, 63, 3), 
(9, 4, 3), 
(9, 5, 3), 
(9, 6, 3), 
(9, 7, 3), 
(9, 8, 3), 
(9, 9, 3), 
(9, 10, 3), 
(9, 11, 3), 
(9, 12, 3), 
(9, 51, 3), 
(9, 62, 3), 
(9, 54, 3), 
(9, 55, 3), 
(9, 31, 3), 
(9, 32, 3), 
(9, 33, 3), 
(9, 34, 3), 
(9, 35, 3), 
(9, 36, 3), 
(9, 37, 3), 
(9, 57, 3), 
(9, 58, 3), 
(9, 59, 3), 
(9, 19, 3), 
(9, 20, 3), 
(9, 21, 3), 
(9, 22, 3), 
(9, 23, 3), 
(9, 24, 3), 
(9, 25, 3), 
(9, 26, 3), 
(9, 27, 3), 
(9, 28, 3), 
(9, 29, 3), 
(9, 61, 3), 
(10, 1, 4), 
(10, 38, 4), 
(10, 39, 4), 
(10, 40, 4), 
(10, 41, 4), 
(10, 47, 4), 
(10, 48, 4), 
(10, 49, 4), 
(10, 50, 4), 
(10, 60, 4), 
(10, 63, 4), 
(10, 4, 4), 
(10, 5, 4), 
(10, 6, 4), 
(10, 7, 4), 
(10, 8, 4), 
(10, 9, 4), 
(10, 10, 4), 
(10, 11, 4), 
(10, 12, 4), 
(10, 51, 4), 
(10, 62, 4), 
(10, 54, 4), 
(10, 55, 4), 
(10, 31, 4), 
(10, 32, 4), 
(10, 33, 4), 
(10, 34, 4), 
(10, 35, 4), 
(10, 36, 4), 
(10, 37, 4), 
(10, 57, 4), 
(10, 58, 4), 
(10, 59, 4), 
(10, 19, 4), 
(10, 20, 4), 
(10, 21, 4), 
(10, 22, 4), 
(10, 23, 4), 
(10, 24, 4), 
(10, 25, 4), 
(10, 26, 4), 
(10, 27, 4), 
(10, 28, 4), 
(10, 29, 4), 
(10, 61, 4), 
(19, 1, 1), 
(19, 38, 1), 
(19, 39, 1), 
(19, 40, 1), 
(19, 41, 1), 
(19, 47, 1), 
(19, 48, 1), 
(19, 49, 1), 
(19, 50, 1), 
(19, 60, 1), 
(19, 63, 1), 
(19, 4, 1), 
(19, 5, 1), 
(19, 6, 1), 
(19, 7, 1), 
(19, 8, 1), 
(19, 9, 1), 
(19, 10, 1), 
(19, 11, 1), 
(19, 12, 1), 
(19, 51, 1), 
(19, 62, 1), 
(19, 54, 1), 
(19, 55, 1), 
(19, 31, 1), 
(19, 32, 1), 
(19, 33, 1), 
(19, 34, 1), 
(19, 35, 1), 
(19, 36, 1), 
(19, 37, 1), 
(19, 57, 1), 
(19, 58, 1), 
(19, 59, 1), 
(19, 19, 1), 
(19, 20, 1), 
(19, 21, 1), 
(19, 22, 1), 
(19, 23, 1), 
(19, 24, 1), 
(19, 25, 1), 
(19, 26, 1), 
(19, 27, 1), 
(19, 28, 1), 
(19, 29, 1), 
(19, 61, 1), 
(1, 4, 1), 
(2, 4, 2), 
(30, 1, 1), 
(30, 38, 1), 
(30, 39, 1), 
(30, 40, 1), 
(30, 41, 1), 
(30, 47, 1), 
(30, 48, 1), 
(30, 49, 1), 
(30, 50, 1), 
(30, 60, 1), 
(30, 63, 1), 
(30, 4, 1), 
(30, 5, 1), 
(30, 6, 1), 
(30, 7, 1), 
(30, 8, 1), 
(30, 9, 1), 
(30, 10, 1), 
(30, 11, 1), 
(30, 12, 1), 
(30, 51, 1), 
(30, 62, 1), 
(30, 54, 1), 
(30, 55, 1), 
(30, 31, 1), 
(30, 32, 1), 
(30, 33, 1), 
(30, 34, 1), 
(30, 35, 1), 
(30, 36, 1), 
(30, 37, 1), 
(30, 57, 1), 
(30, 58, 1), 
(30, 59, 1), 
(30, 19, 1), 
(30, 20, 1), 
(30, 21, 1), 
(30, 22, 1), 
(30, 23, 1), 
(30, 24, 1), 
(30, 25, 1), 
(30, 26, 1), 
(30, 27, 1), 
(30, 28, 1), 
(30, 29, 1), 
(30, 61, 1), 
(28, 1, 1), 
(28, 38, 1), 
(28, 39, 1), 
(28, 40, 1), 
(28, 41, 1), 
(28, 47, 1), 
(28, 48, 1), 
(28, 49, 1), 
(28, 50, 1), 
(28, 60, 1), 
(28, 63, 1), 
(28, 4, 1), 
(28, 5, 1), 
(28, 6, 1), 
(28, 7, 1), 
(28, 8, 1), 
(28, 9, 1), 
(28, 10, 1), 
(28, 11, 1), 
(28, 12, 1), 
(28, 51, 1), 
(28, 62, 1), 
(28, 54, 1), 
(28, 55, 1), 
(28, 31, 1), 
(28, 32, 1), 
(28, 33, 1), 
(28, 34, 1), 
(28, 35, 1), 
(28, 36, 1), 
(28, 37, 1), 
(28, 57, 1), 
(28, 58, 1), 
(28, 59, 1), 
(28, 19, 1), 
(28, 20, 1), 
(28, 21, 1), 
(28, 22, 1), 
(28, 23, 1), 
(28, 24, 1), 
(28, 25, 1), 
(28, 26, 1), 
(28, 27, 1), 
(28, 28, 1), 
(28, 29, 1), 
(28, 61, 1), 
(29, 1, 1), 
(29, 38, 1), 
(29, 39, 1), 
(29, 40, 1), 
(29, 41, 1), 
(29, 47, 1), 
(29, 48, 1), 
(29, 49, 1), 
(29, 50, 1), 
(29, 60, 1), 
(29, 63, 1), 
(29, 4, 1), 
(29, 5, 1), 
(29, 6, 1), 
(29, 7, 1), 
(29, 8, 1), 
(29, 9, 1), 
(29, 10, 1), 
(29, 11, 1), 
(29, 12, 1), 
(29, 51, 1), 
(29, 62, 1), 
(29, 54, 1), 
(29, 55, 1), 
(29, 31, 1), 
(29, 32, 1), 
(29, 33, 1), 
(29, 34, 1), 
(29, 35, 1), 
(29, 36, 1), 
(29, 37, 1), 
(29, 57, 1), 
(29, 58, 1), 
(29, 59, 1), 
(29, 19, 1), 
(29, 20, 1), 
(29, 21, 1), 
(29, 22, 1), 
(29, 23, 1), 
(29, 24, 1), 
(29, 25, 1), 
(29, 26, 1), 
(29, 27, 1), 
(29, 28, 1), 
(29, 29, 1), 
(29, 61, 1), 
(22, 1, 1), 
(22, 38, 1), 
(22, 39, 1), 
(22, 40, 1), 
(22, 41, 1), 
(22, 47, 1), 
(22, 48, 1), 
(22, 49, 1), 
(22, 50, 1), 
(22, 60, 1), 
(22, 63, 1), 
(22, 4, 1), 
(22, 5, 1), 
(22, 6, 1), 
(22, 7, 1), 
(22, 8, 1), 
(22, 9, 1), 
(22, 10, 1), 
(22, 11, 1), 
(22, 12, 1), 
(22, 51, 1), 
(22, 62, 1), 
(22, 54, 1), 
(22, 55, 1), 
(22, 31, 1), 
(22, 32, 1), 
(22, 33, 1), 
(22, 34, 1), 
(22, 35, 1), 
(22, 36, 1), 
(22, 37, 1), 
(22, 57, 1), 
(22, 58, 1), 
(22, 59, 1), 
(22, 19, 1), 
(22, 20, 1), 
(22, 21, 1), 
(22, 22, 1), 
(22, 23, 1), 
(22, 24, 1), 
(22, 25, 1), 
(22, 26, 1), 
(22, 27, 1), 
(22, 28, 1), 
(22, 29, 1), 
(22, 61, 1), 
(23, 1, 2), 
(23, 38, 2), 
(23, 39, 2), 
(23, 40, 2), 
(23, 41, 2), 
(23, 47, 2), 
(23, 48, 2), 
(23, 49, 2), 
(23, 50, 2), 
(23, 60, 2), 
(23, 63, 2), 
(23, 4, 2), 
(23, 5, 2), 
(23, 6, 2), 
(23, 7, 2), 
(23, 8, 2), 
(23, 9, 2), 
(23, 10, 2), 
(23, 11, 2), 
(23, 12, 2), 
(23, 51, 2), 
(23, 62, 2), 
(23, 54, 2), 
(23, 55, 2), 
(23, 31, 2), 
(23, 32, 2), 
(23, 33, 2), 
(23, 34, 2), 
(23, 35, 2), 
(23, 36, 2), 
(23, 37, 2), 
(23, 57, 2), 
(23, 58, 2), 
(23, 59, 2), 
(23, 19, 2), 
(23, 20, 2), 
(23, 21, 2), 
(23, 22, 2), 
(23, 23, 2), 
(23, 24, 2), 
(23, 25, 2), 
(23, 26, 2), 
(23, 27, 2), 
(23, 28, 2), 
(23, 29, 2), 
(23, 61, 2), 
(24, 1, 1), 
(24, 38, 1), 
(24, 39, 1), 
(24, 40, 1), 
(24, 41, 1), 
(24, 47, 1), 
(24, 48, 1), 
(24, 49, 1), 
(24, 50, 1), 
(24, 60, 1), 
(24, 63, 1), 
(24, 4, 1), 
(24, 5, 1), 
(24, 6, 1), 
(24, 7, 1), 
(24, 8, 1), 
(24, 9, 1), 
(24, 10, 1), 
(24, 11, 1), 
(24, 12, 1), 
(24, 51, 1), 
(24, 62, 1), 
(24, 54, 1), 
(24, 55, 1), 
(24, 31, 1), 
(24, 32, 1), 
(24, 33, 1), 
(24, 34, 1), 
(24, 35, 1), 
(24, 36, 1), 
(24, 37, 1), 
(24, 57, 1), 
(24, 58, 1), 
(24, 59, 1), 
(24, 19, 1), 
(24, 20, 1), 
(24, 21, 1), 
(24, 22, 1), 
(24, 23, 1), 
(24, 24, 1), 
(24, 25, 1), 
(24, 26, 1), 
(24, 27, 1), 
(24, 28, 1), 
(24, 29, 1), 
(24, 61, 1), 
(25, 1, 2), 
(25, 38, 2), 
(25, 39, 2), 
(25, 40, 2), 
(25, 41, 2), 
(25, 47, 2), 
(25, 48, 2), 
(25, 49, 2), 
(25, 50, 2), 
(25, 60, 2), 
(25, 63, 2), 
(25, 4, 2), 
(25, 5, 2), 
(25, 6, 2), 
(25, 7, 2), 
(25, 8, 2), 
(25, 9, 2), 
(25, 10, 2), 
(25, 11, 2), 
(25, 12, 2), 
(25, 51, 2), 
(25, 62, 2), 
(25, 54, 2), 
(25, 55, 2), 
(25, 31, 2), 
(25, 32, 2), 
(25, 33, 2), 
(25, 34, 2), 
(25, 35, 2), 
(25, 36, 2), 
(25, 37, 2), 
(25, 57, 2), 
(25, 58, 2), 
(25, 59, 2), 
(25, 19, 2), 
(25, 20, 2), 
(25, 21, 2), 
(25, 22, 2), 
(25, 23, 2), 
(25, 24, 2), 
(25, 25, 2), 
(25, 26, 2), 
(25, 27, 2), 
(25, 28, 2), 
(25, 29, 2), 
(25, 61, 2), 
(26, 1, 3), 
(26, 38, 3), 
(26, 39, 3), 
(26, 40, 3), 
(26, 41, 3), 
(26, 47, 3), 
(26, 48, 3), 
(26, 49, 3), 
(26, 50, 3), 
(26, 60, 3), 
(26, 63, 3), 
(26, 4, 3), 
(26, 5, 3), 
(26, 6, 3), 
(26, 7, 3), 
(26, 8, 3), 
(26, 9, 3), 
(26, 10, 3), 
(26, 11, 3), 
(26, 12, 3), 
(26, 51, 3), 
(26, 62, 3), 
(26, 54, 3), 
(26, 55, 3), 
(26, 31, 3), 
(26, 32, 3), 
(26, 33, 3), 
(26, 34, 3), 
(26, 35, 3), 
(26, 36, 3), 
(26, 37, 3), 
(26, 57, 3), 
(26, 58, 3), 
(26, 59, 3), 
(26, 19, 3), 
(26, 20, 3), 
(26, 21, 3), 
(26, 22, 3), 
(26, 23, 3), 
(26, 24, 3), 
(26, 25, 3), 
(26, 26, 3), 
(26, 27, 3), 
(26, 28, 3), 
(26, 29, 3), 
(26, 61, 3), 
(27, 1, 4), 
(27, 38, 4), 
(27, 39, 4), 
(27, 40, 4), 
(27, 41, 4), 
(27, 47, 4), 
(27, 48, 4), 
(27, 49, 4), 
(27, 50, 4), 
(27, 60, 4), 
(27, 63, 4), 
(27, 4, 4), 
(27, 5, 4), 
(27, 6, 4), 
(27, 7, 4), 
(27, 8, 4), 
(27, 9, 4), 
(27, 10, 4), 
(27, 11, 4), 
(27, 12, 4), 
(27, 51, 4), 
(27, 62, 4), 
(27, 54, 4), 
(27, 55, 4), 
(27, 31, 4), 
(27, 32, 4), 
(27, 33, 4), 
(27, 34, 4), 
(27, 35, 4), 
(27, 36, 4), 
(27, 37, 4), 
(27, 57, 4), 
(27, 58, 4), 
(27, 59, 4), 
(27, 19, 4), 
(27, 20, 4), 
(27, 21, 4), 
(27, 22, 4), 
(27, 23, 4), 
(27, 24, 4), 
(27, 25, 4), 
(27, 26, 4), 
(27, 27, 4), 
(27, 28, 4), 
(27, 29, 4), 
(27, 61, 4), 
(16, 66, 1), 
(16, 64, 1), 
(16, 65, 1), 
(18, 66, 1), 
(18, 64, 1), 
(18, 65, 1), 
(11, 66, 1), 
(11, 64, 1), 
(11, 65, 1), 
(12, 66, 2), 
(12, 64, 2), 
(12, 65, 2), 
(5, 66, 1), 
(5, 64, 1), 
(5, 65, 1), 
(6, 66, 2), 
(6, 64, 2), 
(6, 65, 2), 
(20, 66, 1), 
(20, 64, 1), 
(20, 65, 1), 
(17, 66, 1), 
(17, 64, 1), 
(17, 65, 1), 
(15, 66, 1), 
(15, 64, 1), 
(15, 65, 1), 
(13, 66, 1), 
(13, 64, 1), 
(13, 65, 1), 
(14, 66, 2), 
(14, 64, 2), 
(14, 65, 2), 
(8, 66, 2), 
(8, 64, 2), 
(8, 65, 2), 
(9, 66, 3), 
(9, 64, 3), 
(9, 65, 3), 
(10, 66, 4), 
(10, 64, 4), 
(10, 65, 4), 
(19, 66, 1), 
(19, 64, 1), 
(19, 65, 1), 
(30, 66, 1), 
(30, 64, 1), 
(30, 65, 1), 
(28, 66, 1), 
(28, 64, 1), 
(28, 65, 1), 
(29, 66, 1), 
(29, 64, 1), 
(29, 65, 1), 
(22, 66, 1), 
(22, 64, 1), 
(22, 65, 1), 
(23, 66, 2), 
(23, 64, 2), 
(23, 65, 2), 
(24, 66, 1), 
(24, 64, 1), 
(24, 65, 1), 
(25, 66, 2), 
(25, 64, 2), 
(25, 65, 2), 
(26, 66, 3), 
(26, 64, 3), 
(26, 65, 3), 
(27, 66, 4), 
(27, 64, 4), 
(27, 65, 4), 
(16, 72, 1), 
(16, 71, 1), 
(16, 74, 1), 
(16, 69, 1), 
(16, 70, 1), 
(16, 77, 1), 
(16, 75, 1), 
(18, 72, 1), 
(18, 71, 1), 
(18, 74, 1), 
(18, 69, 1), 
(18, 70, 1), 
(18, 77, 1), 
(18, 75, 1), 
(11, 72, 1), 
(11, 71, 1), 
(11, 74, 1), 
(11, 69, 1), 
(11, 70, 1), 
(11, 77, 1), 
(11, 75, 1), 
(12, 72, 2), 
(12, 71, 2), 
(12, 74, 2), 
(12, 69, 2), 
(12, 70, 2), 
(12, 77, 2), 
(12, 75, 2), 
(5, 72, 1), 
(5, 71, 1), 
(5, 74, 1), 
(5, 69, 1), 
(5, 70, 1), 
(5, 77, 1), 
(5, 75, 1), 
(6, 72, 2), 
(6, 71, 2), 
(6, 74, 2), 
(6, 69, 2), 
(6, 70, 2), 
(6, 77, 2), 
(6, 75, 2), 
(20, 72, 1), 
(20, 71, 1), 
(20, 74, 1), 
(20, 69, 1), 
(20, 70, 1), 
(20, 77, 1), 
(20, 75, 1), 
(17, 72, 1), 
(17, 71, 1), 
(17, 74, 1), 
(17, 69, 1), 
(17, 70, 1), 
(17, 77, 1), 
(17, 75, 1), 
(15, 72, 1), 
(15, 71, 1), 
(15, 74, 1), 
(15, 69, 1), 
(15, 70, 1), 
(15, 77, 1), 
(15, 75, 1), 
(13, 72, 1), 
(13, 71, 1), 
(13, 74, 1), 
(13, 69, 1), 
(13, 70, 1), 
(13, 77, 1), 
(13, 75, 1), 
(14, 72, 2), 
(14, 71, 2), 
(14, 74, 2), 
(14, 69, 2), 
(14, 70, 2), 
(14, 77, 2), 
(14, 75, 2), 
(8, 72, 2), 
(8, 71, 2), 
(8, 74, 2), 
(8, 69, 2), 
(8, 70, 2), 
(8, 77, 2), 
(8, 75, 2), 
(9, 72, 3), 
(9, 71, 3), 
(9, 74, 3), 
(9, 69, 3), 
(9, 70, 3), 
(9, 77, 3), 
(9, 75, 3), 
(10, 72, 4), 
(10, 71, 4), 
(10, 74, 4), 
(10, 69, 4), 
(10, 70, 4), 
(10, 77, 4), 
(10, 75, 4), 
(19, 72, 1), 
(19, 71, 1), 
(19, 74, 1), 
(19, 69, 1), 
(19, 70, 1), 
(19, 77, 1), 
(19, 75, 1), 
(30, 72, 1), 
(30, 71, 1), 
(30, 74, 1), 
(30, 69, 1), 
(30, 70, 1), 
(30, 77, 1), 
(30, 75, 1), 
(28, 72, 1), 
(28, 71, 1), 
(28, 74, 1), 
(28, 69, 1), 
(28, 70, 1), 
(28, 77, 1), 
(28, 75, 1), 
(29, 72, 1), 
(29, 71, 1), 
(29, 74, 1), 
(29, 69, 1), 
(29, 70, 1), 
(29, 77, 1), 
(29, 75, 1), 
(22, 72, 1), 
(22, 71, 1), 
(22, 74, 1), 
(22, 69, 1), 
(22, 70, 1), 
(22, 77, 1), 
(22, 75, 1), 
(23, 72, 2), 
(23, 71, 2), 
(23, 74, 2), 
(23, 69, 2), 
(23, 70, 2), 
(23, 77, 2), 
(23, 75, 2), 
(24, 72, 1), 
(24, 71, 1), 
(24, 74, 1), 
(24, 69, 1), 
(24, 70, 1), 
(24, 77, 1), 
(24, 75, 1), 
(25, 72, 2), 
(25, 71, 2), 
(25, 74, 2), 
(25, 69, 2), 
(25, 70, 2), 
(25, 77, 2), 
(25, 75, 2), 
(26, 72, 3), 
(26, 71, 3), 
(26, 74, 3), 
(26, 69, 3), 
(26, 70, 3), 
(26, 77, 3), 
(26, 75, 3), 
(27, 72, 4), 
(27, 71, 4), 
(27, 74, 4), 
(27, 69, 4), 
(27, 70, 4), 
(27, 77, 4), 
(27, 75, 4), 
(16, 79, 1), 
(16, 82, 1), 
(16, 78, 1), 
(18, 79, 1), 
(18, 82, 1), 
(18, 78, 1), 
(11, 79, 1), 
(11, 82, 1), 
(11, 78, 1), 
(12, 79, 2), 
(12, 82, 2), 
(12, 78, 2), 
(5, 79, 1), 
(5, 82, 1), 
(5, 78, 1), 
(6, 79, 2), 
(6, 82, 2), 
(6, 78, 2), 
(20, 79, 1), 
(20, 82, 1), 
(20, 78, 1), 
(17, 79, 1), 
(17, 82, 1), 
(17, 78, 1), 
(15, 79, 1), 
(15, 82, 1), 
(15, 78, 1), 
(13, 79, 1), 
(13, 82, 1), 
(13, 78, 1), 
(14, 79, 2), 
(14, 82, 2), 
(14, 78, 2), 
(8, 79, 2), 
(8, 82, 2), 
(8, 78, 2), 
(9, 79, 3), 
(9, 82, 3), 
(9, 78, 3), 
(10, 79, 4), 
(10, 82, 4), 
(10, 78, 4), 
(19, 79, 1), 
(19, 82, 1), 
(19, 78, 1), 
(30, 79, 1), 
(30, 82, 1), 
(30, 78, 1), 
(28, 79, 1), 
(28, 82, 1), 
(28, 78, 1), 
(29, 79, 1), 
(29, 82, 1), 
(29, 78, 1), 
(22, 79, 1), 
(22, 82, 1), 
(22, 78, 1), 
(23, 79, 2), 
(23, 82, 2), 
(23, 78, 2), 
(24, 79, 1), 
(24, 82, 1), 
(24, 78, 1), 
(25, 79, 2), 
(25, 82, 2), 
(25, 78, 2), 
(26, 79, 3), 
(26, 82, 3), 
(26, 78, 3), 
(27, 79, 4), 
(27, 82, 4), 
(27, 78, 4), 
(16, 92, 1), 
(16, 93, 1), 
(16, 89, 1), 
(16, 84, 1), 
(16, 83, 1), 
(16, 90, 1), 
(16, 85, 1), 
(16, 94, 1), 
(16, 95, 1), 
(16, 87, 1), 
(16, 88, 1), 
(18, 92, 1), 
(18, 93, 1), 
(18, 89, 1), 
(18, 84, 1), 
(18, 83, 1), 
(18, 90, 1), 
(18, 85, 1), 
(18, 94, 1), 
(18, 95, 1), 
(18, 87, 1), 
(18, 88, 1), 
(11, 92, 1), 
(11, 93, 1), 
(11, 89, 1), 
(11, 84, 1), 
(11, 83, 1), 
(11, 90, 1), 
(11, 85, 1), 
(11, 94, 1), 
(11, 95, 1), 
(11, 87, 1), 
(11, 88, 1), 
(12, 92, 2), 
(12, 93, 2), 
(12, 89, 2), 
(12, 84, 2), 
(12, 83, 2), 
(12, 90, 2), 
(12, 85, 2), 
(12, 94, 2), 
(12, 95, 2), 
(12, 87, 2), 
(12, 88, 2), 
(5, 92, 1), 
(5, 93, 1), 
(5, 89, 1), 
(5, 84, 1), 
(5, 83, 1), 
(5, 90, 1), 
(5, 85, 1), 
(5, 94, 1), 
(5, 95, 1), 
(5, 87, 1), 
(5, 88, 1), 
(6, 92, 2), 
(6, 93, 2), 
(6, 89, 2), 
(6, 84, 2), 
(6, 83, 2), 
(6, 90, 2), 
(6, 85, 2), 
(6, 94, 2), 
(6, 95, 2), 
(6, 87, 2), 
(6, 88, 2), 
(20, 92, 1), 
(20, 93, 1), 
(20, 89, 1), 
(20, 84, 1), 
(20, 83, 1), 
(20, 90, 1), 
(20, 85, 1), 
(20, 94, 1), 
(20, 95, 1), 
(20, 87, 1), 
(20, 88, 1), 
(17, 92, 1), 
(17, 93, 1), 
(17, 89, 1), 
(17, 84, 1), 
(17, 83, 1), 
(17, 90, 1), 
(17, 85, 1), 
(17, 94, 1), 
(17, 95, 1), 
(17, 87, 1), 
(17, 88, 1), 
(15, 92, 1), 
(15, 93, 1), 
(15, 89, 1), 
(15, 84, 1), 
(15, 83, 1), 
(15, 90, 1), 
(15, 85, 1), 
(15, 94, 1), 
(15, 95, 1), 
(15, 87, 1), 
(15, 88, 1), 
(13, 92, 1), 
(13, 93, 1), 
(13, 89, 1), 
(13, 84, 1), 
(13, 83, 1), 
(13, 90, 1), 
(13, 85, 1), 
(13, 94, 1), 
(13, 95, 1), 
(13, 87, 1), 
(13, 88, 1), 
(14, 92, 2), 
(14, 93, 2), 
(14, 89, 2), 
(14, 84, 2), 
(14, 83, 2), 
(14, 90, 2), 
(14, 85, 2), 
(14, 94, 2), 
(14, 95, 2), 
(14, 87, 2), 
(14, 88, 2), 
(8, 92, 2), 
(8, 93, 2), 
(8, 89, 2), 
(8, 84, 2), 
(8, 83, 2), 
(8, 90, 2), 
(8, 85, 2), 
(8, 94, 2), 
(8, 95, 2), 
(8, 87, 2), 
(8, 88, 2), 
(9, 92, 3), 
(9, 93, 3), 
(9, 89, 3), 
(9, 84, 3), 
(9, 83, 3), 
(9, 90, 3), 
(9, 85, 3), 
(9, 94, 3), 
(9, 95, 3), 
(9, 87, 3), 
(9, 88, 3), 
(10, 92, 4), 
(10, 93, 4), 
(10, 89, 4), 
(10, 84, 4), 
(10, 83, 4), 
(10, 90, 4), 
(10, 85, 4), 
(10, 94, 4), 
(10, 95, 4), 
(10, 87, 4), 
(10, 88, 4), 
(19, 92, 1), 
(19, 93, 1), 
(19, 89, 1), 
(19, 84, 1), 
(19, 83, 1), 
(19, 90, 1), 
(19, 85, 1), 
(19, 94, 1), 
(19, 95, 1), 
(19, 87, 1), 
(19, 88, 1), 
(30, 92, 1), 
(30, 93, 1), 
(30, 89, 1), 
(30, 84, 1), 
(30, 83, 1), 
(30, 90, 1), 
(30, 85, 1), 
(30, 94, 1), 
(30, 95, 1), 
(30, 87, 1), 
(30, 88, 1), 
(28, 92, 1), 
(28, 93, 1), 
(28, 89, 1), 
(28, 84, 1), 
(28, 83, 1), 
(28, 90, 1), 
(28, 85, 1), 
(28, 94, 1), 
(28, 95, 1), 
(28, 87, 1), 
(28, 88, 1), 
(29, 92, 1), 
(29, 93, 1), 
(29, 89, 1), 
(29, 84, 1), 
(29, 83, 1), 
(29, 90, 1), 
(29, 85, 1), 
(29, 94, 1), 
(29, 95, 1), 
(29, 87, 1), 
(29, 88, 1), 
(22, 92, 1), 
(22, 93, 1), 
(22, 89, 1), 
(22, 84, 1), 
(22, 83, 1), 
(22, 90, 1), 
(22, 85, 1), 
(22, 94, 1), 
(22, 95, 1), 
(22, 87, 1), 
(22, 88, 1), 
(23, 92, 2), 
(23, 93, 2), 
(23, 89, 2), 
(23, 84, 2), 
(23, 83, 2), 
(23, 90, 2), 
(23, 85, 2), 
(23, 94, 2), 
(23, 95, 2), 
(23, 87, 2), 
(23, 88, 2), 
(24, 92, 1), 
(24, 93, 1), 
(24, 89, 1), 
(24, 84, 1), 
(24, 83, 1), 
(24, 90, 1), 
(24, 85, 1), 
(24, 94, 1), 
(24, 95, 1), 
(24, 87, 1), 
(24, 88, 1), 
(25, 92, 2), 
(25, 93, 2), 
(25, 89, 2), 
(25, 84, 2), 
(25, 83, 2), 
(25, 90, 2), 
(25, 85, 2), 
(25, 94, 2), 
(25, 95, 2), 
(25, 87, 2), 
(25, 88, 2), 
(26, 92, 3), 
(26, 93, 3), 
(26, 89, 3), 
(26, 84, 3), 
(26, 83, 3), 
(26, 90, 3), 
(26, 85, 3), 
(26, 94, 3), 
(26, 95, 3), 
(26, 87, 3), 
(26, 88, 3), 
(27, 92, 4), 
(27, 93, 4), 
(27, 89, 4), 
(27, 84, 4), 
(27, 83, 4), 
(27, 90, 4), 
(27, 85, 4), 
(27, 94, 4), 
(27, 95, 4), 
(27, 87, 4), 
(27, 88, 4), 
(31, 1, 1), 
(31, 38, 1), 
(31, 39, 1), 
(31, 40, 1), 
(31, 41, 1), 
(31, 47, 1), 
(31, 48, 1), 
(31, 49, 1), 
(31, 50, 1), 
(31, 60, 1), 
(31, 66, 1), 
(31, 64, 1), 
(31, 65, 1), 
(31, 63, 1), 
(31, 72, 1), 
(31, 71, 1), 
(31, 74, 1), 
(31, 69, 1), 
(31, 70, 1), 
(31, 77, 1), 
(31, 75, 1), 
(31, 4, 1), 
(31, 5, 1), 
(31, 6, 1), 
(31, 7, 1), 
(31, 8, 1), 
(31, 9, 1), 
(31, 10, 1), 
(31, 11, 1), 
(31, 12, 1), 
(31, 92, 1), 
(31, 93, 1), 
(31, 89, 1), 
(31, 84, 1), 
(31, 83, 1), 
(31, 90, 1), 
(31, 85, 1), 
(31, 94, 1), 
(31, 95, 1), 
(31, 87, 1), 
(31, 88, 1), 
(31, 51, 1), 
(31, 62, 1), 
(31, 54, 1), 
(31, 55, 1), 
(31, 31, 1), 
(31, 32, 1), 
(31, 33, 1), 
(31, 34, 1), 
(31, 35, 1), 
(31, 36, 1), 
(31, 37, 1), 
(31, 57, 1), 
(31, 58, 1), 
(31, 59, 1), 
(31, 19, 1), 
(31, 20, 1), 
(31, 21, 1), 
(31, 22, 1), 
(31, 23, 1), 
(31, 24, 1), 
(31, 25, 1), 
(31, 26, 1), 
(31, 27, 1), 
(31, 28, 1), 
(31, 29, 1), 
(31, 79, 1), 
(31, 82, 1), 
(31, 78, 1), 
(31, 61, 1), 
(33, 1, 1), 
(33, 38, 1), 
(33, 39, 1), 
(33, 40, 1), 
(33, 41, 1), 
(33, 47, 1), 
(33, 48, 1), 
(33, 49, 1), 
(33, 50, 1), 
(33, 60, 1), 
(33, 66, 1), 
(33, 64, 1), 
(33, 65, 1), 
(33, 63, 1), 
(33, 72, 1), 
(33, 71, 1), 
(33, 74, 1), 
(33, 69, 1), 
(33, 70, 1), 
(33, 77, 1), 
(33, 75, 1), 
(33, 4, 1), 
(33, 5, 1), 
(33, 6, 1), 
(33, 7, 1), 
(33, 8, 1), 
(33, 9, 1), 
(33, 10, 1), 
(33, 11, 1), 
(33, 12, 1), 
(33, 92, 1), 
(33, 93, 1), 
(33, 89, 1), 
(33, 84, 1), 
(33, 83, 1), 
(33, 90, 1), 
(33, 85, 1), 
(33, 94, 1), 
(33, 95, 1), 
(33, 87, 1), 
(33, 88, 1), 
(33, 51, 1), 
(33, 62, 1), 
(33, 54, 1), 
(33, 55, 1), 
(33, 31, 1), 
(33, 32, 1), 
(33, 33, 1), 
(33, 34, 1), 
(33, 35, 1), 
(33, 36, 1), 
(33, 37, 1), 
(33, 57, 1), 
(33, 58, 1), 
(33, 59, 1), 
(33, 19, 1), 
(33, 20, 1), 
(33, 21, 1), 
(33, 22, 1), 
(33, 23, 1), 
(33, 24, 1), 
(33, 25, 1), 
(33, 26, 1), 
(33, 27, 1), 
(33, 28, 1), 
(33, 29, 1), 
(33, 79, 1), 
(33, 82, 1), 
(33, 78, 1), 
(33, 61, 1), 
(34, 1, 2), 
(34, 38, 2), 
(34, 39, 2), 
(34, 40, 2), 
(34, 41, 2), 
(34, 47, 2), 
(34, 48, 2), 
(34, 49, 2), 
(34, 50, 2), 
(34, 60, 2), 
(34, 66, 2), 
(34, 64, 2), 
(34, 65, 2), 
(34, 63, 2), 
(34, 72, 2), 
(34, 71, 2), 
(34, 74, 2), 
(34, 69, 2), 
(34, 70, 2), 
(34, 77, 2), 
(34, 75, 2), 
(34, 4, 2), 
(34, 5, 2), 
(34, 6, 2), 
(34, 7, 2), 
(34, 8, 2), 
(34, 9, 2), 
(34, 10, 2), 
(34, 11, 2), 
(34, 12, 2), 
(34, 92, 2), 
(34, 93, 2), 
(34, 89, 2), 
(34, 84, 2), 
(34, 83, 2), 
(34, 90, 2), 
(34, 85, 2), 
(34, 94, 2), 
(34, 95, 2), 
(34, 87, 2), 
(34, 88, 2), 
(34, 51, 2), 
(34, 62, 2), 
(34, 54, 2), 
(34, 55, 2), 
(34, 31, 2), 
(34, 32, 2), 
(34, 33, 2), 
(34, 34, 2), 
(34, 35, 2), 
(34, 36, 2), 
(34, 37, 2), 
(34, 57, 2), 
(34, 58, 2), 
(34, 59, 2), 
(34, 19, 2), 
(34, 20, 2), 
(34, 21, 2), 
(34, 22, 2), 
(34, 23, 2), 
(34, 24, 2), 
(34, 25, 2), 
(34, 26, 2), 
(34, 27, 2), 
(34, 28, 2), 
(34, 29, 2), 
(34, 79, 2), 
(34, 82, 2), 
(34, 78, 2), 
(34, 61, 2), 
(37, 1, 1), 
(37, 38, 1), 
(37, 39, 1), 
(37, 40, 1), 
(37, 41, 1), 
(37, 47, 1), 
(37, 48, 1), 
(37, 49, 1), 
(37, 50, 1), 
(37, 60, 1), 
(37, 66, 1), 
(37, 64, 1), 
(37, 65, 1), 
(37, 63, 1), 
(37, 72, 1), 
(37, 71, 1), 
(37, 74, 1), 
(37, 69, 1), 
(37, 70, 1), 
(37, 77, 1), 
(37, 75, 1), 
(37, 4, 1), 
(37, 5, 1), 
(37, 6, 1), 
(37, 7, 1), 
(37, 8, 1), 
(37, 9, 1), 
(37, 10, 1), 
(37, 11, 1), 
(37, 12, 1), 
(37, 92, 1), 
(37, 93, 1), 
(37, 89, 1), 
(37, 84, 1), 
(37, 83, 1), 
(37, 90, 1), 
(37, 85, 1), 
(37, 94, 1), 
(37, 95, 1), 
(37, 87, 1), 
(37, 88, 1), 
(37, 51, 1), 
(37, 62, 1), 
(37, 54, 1), 
(37, 55, 1), 
(37, 31, 1), 
(37, 32, 1), 
(37, 33, 1), 
(37, 34, 1), 
(37, 35, 1), 
(37, 36, 1), 
(37, 37, 1), 
(37, 57, 1), 
(37, 58, 1), 
(37, 59, 1), 
(37, 19, 1), 
(37, 20, 1), 
(37, 21, 1), 
(37, 22, 1), 
(37, 23, 1), 
(37, 24, 1), 
(37, 25, 1), 
(37, 26, 1), 
(37, 27, 1), 
(37, 28, 1), 
(37, 29, 1), 
(37, 79, 1), 
(37, 82, 1), 
(37, 78, 1), 
(37, 61, 1), 
(38, 1, 2), 
(38, 38, 2), 
(38, 39, 2), 
(38, 40, 2), 
(38, 41, 2), 
(38, 47, 2), 
(38, 48, 2), 
(38, 49, 2), 
(38, 50, 2), 
(38, 60, 2), 
(38, 66, 2), 
(38, 64, 2), 
(38, 65, 2), 
(38, 63, 2), 
(38, 72, 2), 
(38, 71, 2), 
(38, 74, 2), 
(38, 69, 2), 
(38, 70, 2), 
(38, 77, 2), 
(38, 75, 2), 
(38, 4, 2), 
(38, 5, 2), 
(38, 6, 2), 
(38, 7, 2), 
(38, 8, 2), 
(38, 9, 2), 
(38, 10, 2), 
(38, 11, 2), 
(38, 12, 2), 
(38, 92, 2), 
(38, 93, 2), 
(38, 89, 2), 
(38, 84, 2), 
(38, 83, 2), 
(38, 90, 2), 
(38, 85, 2), 
(38, 94, 2), 
(38, 95, 2), 
(38, 87, 2), 
(38, 88, 2), 
(38, 51, 2), 
(38, 62, 2), 
(38, 54, 2), 
(38, 55, 2), 
(38, 31, 2), 
(38, 32, 2), 
(38, 33, 2), 
(38, 34, 2), 
(38, 35, 2), 
(38, 36, 2), 
(38, 37, 2), 
(38, 57, 2), 
(38, 58, 2), 
(38, 59, 2), 
(38, 19, 2), 
(38, 20, 2), 
(38, 21, 2), 
(38, 22, 2), 
(38, 23, 2), 
(38, 24, 2), 
(38, 25, 2), 
(38, 26, 2), 
(38, 27, 2), 
(38, 28, 2), 
(38, 29, 2), 
(38, 79, 2), 
(38, 82, 2), 
(38, 78, 2), 
(38, 61, 2), 
(39, 1, 1), 
(39, 38, 1), 
(39, 39, 1), 
(39, 40, 1), 
(39, 41, 1), 
(39, 47, 1), 
(39, 48, 1), 
(39, 49, 1), 
(39, 50, 1), 
(39, 60, 1), 
(39, 66, 1), 
(39, 64, 1), 
(39, 65, 1), 
(39, 63, 1), 
(39, 72, 1), 
(39, 71, 1), 
(39, 74, 1), 
(39, 69, 1), 
(39, 70, 1), 
(39, 77, 1), 
(39, 75, 1), 
(39, 4, 1), 
(39, 5, 1), 
(39, 6, 1), 
(39, 7, 1), 
(39, 8, 1), 
(39, 9, 1), 
(39, 10, 1), 
(39, 11, 1), 
(39, 12, 1), 
(39, 92, 1), 
(39, 93, 1), 
(39, 89, 1), 
(39, 84, 1), 
(39, 83, 1), 
(39, 90, 1), 
(39, 85, 1), 
(39, 94, 1), 
(39, 95, 1), 
(39, 87, 1), 
(39, 88, 1), 
(39, 51, 1), 
(39, 62, 1), 
(39, 54, 1), 
(39, 55, 1), 
(39, 31, 1), 
(39, 32, 1), 
(39, 33, 1), 
(39, 34, 1), 
(39, 35, 1), 
(39, 36, 1), 
(39, 37, 1), 
(39, 57, 1), 
(39, 58, 1), 
(39, 59, 1), 
(39, 19, 1), 
(39, 20, 1), 
(39, 21, 1), 
(39, 22, 1), 
(39, 23, 1), 
(39, 24, 1), 
(39, 25, 1), 
(39, 26, 1), 
(39, 27, 1), 
(39, 28, 1), 
(39, 29, 1), 
(39, 79, 1), 
(39, 82, 1), 
(39, 78, 1), 
(39, 61, 1), 
(40, 1, 1), 
(40, 38, 1), 
(40, 39, 1), 
(40, 40, 1), 
(40, 41, 1), 
(40, 47, 1), 
(40, 48, 1), 
(40, 49, 1), 
(40, 50, 1), 
(40, 60, 1), 
(40, 66, 1), 
(40, 64, 1), 
(40, 65, 1), 
(40, 63, 1), 
(40, 72, 1), 
(40, 71, 1), 
(40, 74, 1), 
(40, 69, 1), 
(40, 70, 1), 
(40, 77, 1), 
(40, 75, 1), 
(40, 4, 1), 
(40, 5, 1), 
(40, 6, 1), 
(40, 7, 1), 
(40, 8, 1), 
(40, 9, 1), 
(40, 10, 1), 
(40, 11, 1), 
(40, 12, 1), 
(40, 92, 1), 
(40, 93, 1), 
(40, 89, 1), 
(40, 84, 1), 
(40, 83, 1), 
(40, 90, 1), 
(40, 85, 1), 
(40, 94, 1), 
(40, 95, 1), 
(40, 87, 1), 
(40, 88, 1), 
(40, 51, 1), 
(40, 62, 1), 
(40, 54, 1), 
(40, 55, 1), 
(40, 31, 1), 
(40, 32, 1), 
(40, 33, 1), 
(40, 34, 1), 
(40, 35, 1), 
(40, 36, 1), 
(40, 37, 1), 
(40, 57, 1), 
(40, 58, 1), 
(40, 59, 1), 
(40, 19, 1), 
(40, 20, 1), 
(40, 21, 1), 
(40, 22, 1), 
(40, 23, 1), 
(40, 24, 1), 
(40, 25, 1), 
(40, 26, 1), 
(40, 27, 1), 
(40, 28, 1), 
(40, 29, 1), 
(40, 79, 1), 
(40, 82, 1), 
(40, 78, 1), 
(40, 61, 1), 
(41, 1, 1), 
(41, 38, 1), 
(41, 39, 1), 
(41, 40, 1), 
(41, 41, 1), 
(41, 47, 1), 
(41, 48, 1), 
(41, 49, 1), 
(41, 50, 1), 
(41, 60, 1), 
(41, 66, 1), 
(41, 64, 1), 
(41, 65, 1), 
(41, 63, 1), 
(41, 72, 1), 
(41, 71, 1), 
(41, 74, 1), 
(41, 69, 1), 
(41, 70, 1), 
(41, 77, 1), 
(41, 75, 1), 
(41, 4, 1), 
(41, 5, 1), 
(41, 6, 1), 
(41, 7, 1), 
(41, 8, 1), 
(41, 9, 1), 
(41, 10, 1), 
(41, 11, 1), 
(41, 12, 1), 
(41, 92, 1), 
(41, 93, 1), 
(41, 89, 1), 
(41, 84, 1), 
(41, 83, 1), 
(41, 90, 1), 
(41, 85, 1), 
(41, 94, 1), 
(41, 95, 1), 
(41, 87, 1), 
(41, 88, 1), 
(41, 51, 1), 
(41, 62, 1), 
(41, 54, 1), 
(41, 55, 1), 
(41, 31, 1), 
(41, 32, 1), 
(41, 33, 1), 
(41, 34, 1), 
(41, 35, 1), 
(41, 36, 1), 
(41, 37, 1), 
(41, 57, 1), 
(41, 58, 1), 
(41, 59, 1), 
(41, 19, 1), 
(41, 20, 1), 
(41, 21, 1), 
(41, 22, 1), 
(41, 23, 1), 
(41, 24, 1), 
(41, 25, 1), 
(41, 26, 1), 
(41, 27, 1), 
(41, 28, 1), 
(41, 29, 1), 
(41, 79, 1), 
(41, 82, 1), 
(41, 78, 1), 
(41, 61, 1), 
(42, 1, 1), 
(42, 38, 1), 
(42, 39, 1), 
(42, 40, 1), 
(42, 41, 1), 
(42, 47, 1), 
(42, 48, 1), 
(42, 49, 1), 
(42, 50, 1), 
(42, 60, 1), 
(42, 66, 1), 
(42, 64, 1), 
(42, 65, 1), 
(42, 63, 1), 
(42, 72, 1), 
(42, 71, 1), 
(42, 74, 1), 
(42, 69, 1), 
(42, 70, 1), 
(42, 77, 1), 
(42, 75, 1), 
(42, 4, 1), 
(42, 5, 1), 
(42, 6, 1), 
(42, 7, 1), 
(42, 8, 1), 
(42, 9, 1), 
(42, 10, 1), 
(42, 11, 1), 
(42, 12, 1), 
(42, 92, 1), 
(42, 93, 1), 
(42, 89, 1), 
(42, 84, 1), 
(42, 83, 1), 
(42, 90, 1), 
(42, 85, 1), 
(42, 94, 1), 
(42, 95, 1), 
(42, 87, 1), 
(42, 88, 1), 
(42, 51, 1), 
(42, 62, 1), 
(42, 54, 1), 
(42, 55, 1), 
(42, 31, 1), 
(42, 32, 1), 
(42, 33, 1), 
(42, 34, 1), 
(42, 35, 1), 
(42, 36, 1), 
(42, 37, 1), 
(42, 57, 1), 
(42, 58, 1), 
(42, 59, 1), 
(42, 19, 1), 
(42, 20, 1), 
(42, 21, 1), 
(42, 22, 1), 
(42, 23, 1), 
(42, 24, 1), 
(42, 25, 1), 
(42, 26, 1), 
(42, 27, 1), 
(42, 28, 1), 
(42, 29, 1), 
(42, 79, 1), 
(42, 82, 1), 
(42, 78, 1), 
(42, 61, 1), 
(43, 1, 2), 
(43, 38, 2), 
(43, 39, 2), 
(43, 40, 2), 
(43, 41, 2), 
(43, 47, 2), 
(43, 48, 2), 
(43, 49, 2), 
(43, 50, 2), 
(43, 60, 2), 
(43, 66, 2), 
(43, 64, 2), 
(43, 65, 2), 
(43, 63, 2), 
(43, 72, 2), 
(43, 71, 2), 
(43, 74, 2), 
(43, 69, 2), 
(43, 70, 2), 
(43, 77, 2), 
(43, 75, 2), 
(43, 4, 2), 
(43, 5, 2), 
(43, 6, 2), 
(43, 7, 2), 
(43, 8, 2), 
(43, 9, 2), 
(43, 10, 2), 
(43, 11, 2), 
(43, 12, 2), 
(43, 92, 2), 
(43, 93, 2), 
(43, 89, 2), 
(43, 84, 2), 
(43, 83, 2), 
(43, 90, 2), 
(43, 85, 2), 
(43, 94, 2), 
(43, 95, 2), 
(43, 87, 2), 
(43, 88, 2), 
(43, 51, 2), 
(43, 62, 2), 
(43, 54, 2), 
(43, 55, 2), 
(43, 31, 2), 
(43, 32, 2), 
(43, 33, 2), 
(43, 34, 2), 
(43, 35, 2), 
(43, 36, 2), 
(43, 37, 2), 
(43, 57, 2), 
(43, 58, 2), 
(43, 59, 2), 
(43, 19, 2), 
(43, 20, 2), 
(43, 21, 2), 
(43, 22, 2), 
(43, 23, 2), 
(43, 24, 2), 
(43, 25, 2), 
(43, 26, 2), 
(43, 27, 2), 
(43, 28, 2), 
(43, 29, 2), 
(43, 79, 2), 
(43, 82, 2), 
(43, 78, 2), 
(43, 61, 2), 
(45, 1, 1), 
(45, 38, 1), 
(45, 39, 1), 
(45, 40, 1), 
(45, 41, 1), 
(45, 47, 1), 
(45, 48, 1), 
(45, 49, 1), 
(45, 50, 1), 
(45, 60, 1), 
(45, 66, 1), 
(45, 64, 1), 
(45, 65, 1), 
(45, 63, 1), 
(45, 72, 1), 
(45, 71, 1), 
(45, 74, 1), 
(45, 69, 1), 
(45, 70, 1), 
(45, 77, 1), 
(45, 75, 1), 
(45, 4, 1), 
(45, 5, 1), 
(45, 6, 1), 
(45, 7, 1), 
(45, 8, 1), 
(45, 9, 1), 
(45, 10, 1), 
(45, 11, 1), 
(45, 12, 1), 
(45, 92, 1), 
(45, 93, 1), 
(45, 89, 1), 
(45, 84, 1), 
(45, 83, 1), 
(45, 90, 1), 
(45, 85, 1), 
(45, 94, 1), 
(45, 95, 1), 
(45, 87, 1), 
(45, 88, 1), 
(45, 51, 1), 
(45, 62, 1), 
(45, 54, 1), 
(45, 55, 1), 
(45, 31, 1), 
(45, 32, 1), 
(45, 33, 1), 
(45, 34, 1), 
(45, 35, 1), 
(45, 36, 1), 
(45, 37, 1), 
(45, 57, 1), 
(45, 58, 1), 
(45, 59, 1), 
(45, 19, 1), 
(45, 20, 1), 
(45, 21, 1), 
(45, 22, 1), 
(45, 23, 1), 
(45, 24, 1), 
(45, 25, 1), 
(45, 26, 1), 
(45, 27, 1), 
(45, 28, 1), 
(45, 29, 1), 
(45, 79, 1), 
(45, 82, 1), 
(45, 78, 1), 
(45, 61, 1), 
(46, 4, 2), 
(48, 1, 1), 
(48, 38, 1), 
(48, 39, 1), 
(48, 40, 1), 
(48, 41, 1), 
(48, 47, 1), 
(48, 48, 1), 
(48, 49, 1), 
(48, 50, 1), 
(48, 60, 1), 
(48, 66, 1), 
(48, 64, 1), 
(48, 65, 1), 
(48, 63, 1), 
(48, 72, 1), 
(48, 71, 1), 
(48, 74, 1), 
(48, 69, 1), 
(48, 70, 1), 
(48, 77, 1), 
(48, 75, 1), 
(48, 4, 1), 
(48, 5, 1), 
(48, 6, 1), 
(48, 7, 1), 
(48, 8, 1), 
(48, 9, 1), 
(48, 10, 1), 
(48, 11, 1), 
(48, 12, 1), 
(48, 92, 1), 
(48, 93, 1), 
(48, 89, 1), 
(48, 84, 1), 
(48, 83, 1), 
(48, 90, 1), 
(48, 85, 1), 
(48, 94, 1), 
(48, 95, 1), 
(48, 87, 1), 
(48, 88, 1), 
(48, 51, 1), 
(48, 62, 1), 
(48, 54, 1), 
(48, 55, 1), 
(48, 31, 1), 
(48, 32, 1), 
(48, 33, 1), 
(48, 34, 1), 
(48, 35, 1), 
(48, 36, 1), 
(48, 37, 1), 
(48, 57, 1), 
(48, 58, 1), 
(48, 59, 1), 
(48, 19, 1), 
(48, 20, 1), 
(48, 21, 1), 
(48, 22, 1), 
(48, 23, 1), 
(48, 24, 1), 
(48, 25, 1), 
(48, 26, 1), 
(48, 27, 1), 
(48, 28, 1), 
(48, 29, 1), 
(48, 79, 1), 
(48, 82, 1), 
(48, 78, 1), 
(48, 61, 1), 
(16, 99, 1), 
(16, 98, 1), 
(16, 101, 1), 
(16, 96, 1), 
(16, 97, 1), 
(16, 104, 1), 
(16, 102, 1), 
(18, 99, 1), 
(18, 98, 1), 
(18, 101, 1), 
(18, 96, 1), 
(18, 97, 1), 
(18, 104, 1), 
(18, 102, 1), 
(11, 99, 1), 
(11, 98, 1), 
(11, 101, 1), 
(11, 96, 1), 
(11, 97, 1), 
(11, 104, 1), 
(11, 102, 1), 
(12, 99, 2), 
(12, 98, 2), 
(12, 101, 2), 
(12, 96, 2), 
(12, 97, 2), 
(12, 104, 2), 
(12, 102, 2), 
(5, 99, 1), 
(5, 98, 1), 
(5, 101, 1), 
(5, 96, 1), 
(5, 97, 1), 
(5, 104, 1), 
(5, 102, 1), 
(6, 99, 2), 
(6, 98, 2), 
(6, 101, 2), 
(6, 96, 2), 
(6, 97, 2), 
(6, 104, 2), 
(6, 102, 2), 
(20, 99, 1), 
(20, 98, 1), 
(20, 101, 1), 
(20, 96, 1), 
(20, 97, 1), 
(20, 104, 1), 
(20, 102, 1), 
(17, 99, 1), 
(17, 98, 1), 
(17, 101, 1), 
(17, 96, 1), 
(17, 97, 1), 
(17, 104, 1), 
(17, 102, 1), 
(15, 99, 1), 
(15, 98, 1), 
(15, 101, 1), 
(15, 96, 1), 
(15, 97, 1), 
(15, 104, 1), 
(15, 102, 1), 
(13, 99, 1), 
(13, 98, 1), 
(13, 101, 1), 
(13, 96, 1), 
(13, 97, 1), 
(13, 104, 1), 
(13, 102, 1), 
(14, 99, 2), 
(14, 98, 2), 
(14, 101, 2), 
(14, 96, 2), 
(14, 97, 2), 
(14, 104, 2), 
(14, 102, 2), 
(8, 99, 1), 
(8, 98, 1), 
(8, 101, 1), 
(8, 96, 1), 
(8, 97, 1), 
(8, 104, 1), 
(8, 102, 1), 
(9, 99, 2), 
(9, 98, 2), 
(9, 101, 2), 
(9, 96, 2), 
(9, 97, 2), 
(9, 104, 2), 
(9, 102, 2), 
(10, 99, 3), 
(10, 98, 3), 
(10, 101, 3), 
(10, 96, 3), 
(10, 97, 3), 
(10, 104, 3), 
(10, 102, 3), 
(19, 99, 1), 
(19, 98, 1), 
(19, 101, 1), 
(19, 96, 1), 
(19, 97, 1), 
(19, 104, 1), 
(19, 102, 1), 
(31, 99, 1), 
(31, 98, 1), 
(31, 101, 1), 
(31, 96, 1), 
(31, 97, 1), 
(31, 104, 1), 
(31, 102, 1), 
(33, 99, 1), 
(33, 98, 1), 
(33, 101, 1), 
(33, 96, 1), 
(33, 97, 1), 
(33, 104, 1), 
(33, 102, 1), 
(34, 99, 2), 
(34, 98, 2), 
(34, 101, 2), 
(34, 96, 2), 
(34, 97, 2), 
(34, 104, 2), 
(34, 102, 2), 
(37, 99, 1), 
(37, 98, 1), 
(37, 101, 1), 
(37, 96, 1), 
(37, 97, 1), 
(37, 104, 1), 
(37, 102, 1), 
(38, 99, 2), 
(38, 98, 2), 
(38, 101, 2), 
(38, 96, 2), 
(38, 97, 2), 
(38, 104, 2), 
(38, 102, 2), 
(39, 99, 1), 
(39, 98, 1), 
(39, 101, 1), 
(39, 96, 1), 
(39, 97, 1), 
(39, 104, 1), 
(39, 102, 1), 
(40, 99, 1), 
(40, 98, 1), 
(40, 101, 1), 
(40, 96, 1), 
(40, 97, 1), 
(40, 104, 1), 
(40, 102, 1), 
(41, 99, 1), 
(41, 98, 1), 
(41, 101, 1), 
(41, 96, 1), 
(41, 97, 1), 
(41, 104, 1), 
(41, 102, 1), 
(42, 99, 1), 
(42, 98, 1), 
(42, 101, 1), 
(42, 96, 1), 
(42, 97, 1), 
(42, 104, 1), 
(42, 102, 1), 
(43, 99, 2), 
(43, 98, 2), 
(43, 101, 2), 
(43, 96, 2), 
(43, 97, 2), 
(43, 104, 2), 
(43, 102, 2), 
(45, 99, 1), 
(45, 98, 1), 
(45, 101, 1), 
(45, 96, 1), 
(45, 97, 1), 
(45, 104, 1), 
(45, 102, 1), 
(48, 99, 1), 
(48, 98, 1), 
(48, 101, 1), 
(48, 96, 1), 
(48, 97, 1), 
(48, 104, 1), 
(48, 102, 1), 
(30, 99, 1), 
(30, 98, 1), 
(30, 101, 1), 
(30, 96, 1), 
(30, 97, 1), 
(30, 104, 1), 
(30, 102, 1), 
(28, 99, 1), 
(28, 98, 1), 
(28, 101, 1), 
(28, 96, 1), 
(28, 97, 1), 
(28, 104, 1), 
(28, 102, 1), 
(29, 99, 1), 
(29, 98, 1), 
(29, 101, 1), 
(29, 96, 1), 
(29, 97, 1), 
(29, 104, 1), 
(29, 102, 1), 
(22, 99, 1), 
(22, 98, 1), 
(22, 101, 1), 
(22, 96, 1), 
(22, 97, 1), 
(22, 104, 1), 
(22, 102, 1), 
(23, 99, 2), 
(23, 98, 2), 
(23, 101, 2), 
(23, 96, 2), 
(23, 97, 2), 
(23, 104, 2), 
(23, 102, 2), 
(24, 99, 1), 
(24, 98, 1), 
(24, 101, 1), 
(24, 96, 1), 
(24, 97, 1), 
(24, 104, 1), 
(24, 102, 1), 
(25, 99, 2), 
(25, 98, 2), 
(25, 101, 2), 
(25, 96, 2), 
(25, 97, 2), 
(25, 104, 2), 
(25, 102, 2), 
(26, 99, 3), 
(26, 98, 3), 
(26, 101, 3), 
(26, 96, 3), 
(26, 97, 3), 
(26, 104, 3), 
(26, 102, 3), 
(27, 99, 4), 
(27, 98, 4), 
(27, 101, 4), 
(27, 96, 4), 
(27, 97, 4), 
(27, 104, 4), 
(27, 102, 4), 
(51, 4, 1), 
(52, 4, 1), 
(53, 4, 1), 
(54, 4, 1), 
(55, 4, 2), 
(56, 4, 1), 
(57, 4, 1), 
(58, 4, 2), 
(59, 4, 2);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_comment`
--

DROP TABLE IF EXISTS `nv4_vi_comment`;
CREATE TABLE `nv4_vi_comment` (
  `cid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(55) NOT NULL,
  `area` int(11) NOT NULL DEFAULT '0',
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `post_time` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `post_name` varchar(100) NOT NULL,
  `post_email` varchar(100) NOT NULL,
  `post_ip` varchar(15) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `likes` mediumint(9) NOT NULL DEFAULT '0',
  `dislikes` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `mod_id` (`module`,`area`,`id`),
  KEY `post_time` (`post_time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_contact_department`
--

DROP TABLE IF EXISTS `nv4_vi_contact_department`;
CREATE TABLE `nv4_vi_contact_department` (
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
  `act` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` smallint(5) NOT NULL,
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `full_name` (`full_name`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_contact_department`
--

INSERT INTO `nv4_vi_contact_department` VALUES
(1, 'Phòng Chăm sóc khách hàng', 'Cham-soc-khach-hang', '', '(08) 38.000.000[+84838000000]', '08 38.000.001', 'customer@mysite.com', '', 'Bộ phận tiếp nhận và giải quyết các yêu cầu, đề nghị, ý kiến liên quan đến hoạt động chính của doanh nghiệp', '{\"viber\":\"myViber\",\"skype\":\"mySkype\",\"yahoo\":\"myYahoo\"}', 'Tư vấn|Khiếu nại, phản ánh|Đề nghị hợp tác', '1/1/1/0;', 1, 1, 1), 
(2, 'Phòng Kỹ thuật', 'Ky-thuat', '', '(08) 38.000.002[+84838000002]', '08 38.000.003', 'technical@mysite.com', '', 'Bộ phận tiếp nhận và giải quyết các câu hỏi liên quan đến kỹ thuật', '{\"viber\":\"myViber2\",\"skype\":\"mySkype2\",\"yahoo\":\"myYahoo2\"}', 'Thông báo lỗi|Góp ý cải tiến', '1/1/1/0;', 1, 2, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_contact_reply`
--

DROP TABLE IF EXISTS `nv4_vi_contact_reply`;
CREATE TABLE `nv4_vi_contact_reply` (
  `rid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reply_content` text,
  `reply_time` int(11) unsigned NOT NULL DEFAULT '0',
  `reply_aid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_contact_send`
--

DROP TABLE IF EXISTS `nv4_vi_contact_send`;
CREATE TABLE `nv4_vi_contact_send` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `cat` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `send_time` int(11) unsigned NOT NULL DEFAULT '0',
  `sender_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sender_name` varchar(100) NOT NULL,
  `sender_address` varchar(250) NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `sender_phone` varchar(20) DEFAULT '',
  `sender_ip` varchar(15) NOT NULL,
  `is_read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_reply` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sender_name` (`sender_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_contact_supporter`
--

DROP TABLE IF EXISTS `nv4_vi_contact_supporter`;
CREATE TABLE `nv4_vi_contact_supporter` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `departmentid` smallint(5) unsigned NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `others` text NOT NULL,
  `act` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `weight` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_faq`
--

DROP TABLE IF EXISTS `nv4_vi_faq`;
CREATE TABLE `nv4_vi_faq` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` mediumint(8) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `question` text NOT NULL,
  `answer` mediumtext NOT NULL,
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `pubtime` int(11) unsigned NOT NULL DEFAULT '0',
  `hitstotal` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  AUTO_INCREMENT=11  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_faq`
--

INSERT INTO `nv4_vi_faq` VALUES
(1, 1, 'Nghỉ hưu trước tuổi bị trừ tỷ lệ bao nhiêu?', 'Nghi-huu-truoc-tuoi-bi-tru-ty-le-bao-nhieu', 'Ông Lê Văn Hổ (Hà Nội) sinh ngày 4/5/1965, từ năm 1981 đến nay làm việc tại Công ty Bưu chính-Phát hành báo chí của tỉnh Bến Tre, trong đó từ năm 1981-1994 làm việc tại bộ phận khai thác phát hành báo chí, thuộc môi trường độc hại. Ngày 1/7/2018, ông Hổ muốn nghỉ hưu trước tuổi, vậy chế độ hưu của ông được tính thế nào?', '<p><em>Về vấn đề này, Bảo hiểm xã hội TP. Hà Nội trả lời như sau:</em></p><p>Ông Hổ sinh ngày 4/5/1965, từ năm 1981 đến nay ông làm việc ở Công ty Bưu chính-Phát hành báo chí của tỉnh Bến Tre. Đến tháng 7/2018 ông muốn nghỉ hưu trước tuổi. Do ông không nói rõ về thời gian tham gia BHXH từ tháng nào năm 1981 và đến tháng nào ông dừng tham gia BHXH tại Công ty, nên BHXH chưa có cơ sở&nbsp;để tính cụ thể tỷ lệ hưởng lương hưu hàng tháng cho ông.</p><p>Căn cứ theo Điều 16 Thông tư số 59/2015/TT-BLĐTBXH ngày 29/12/2015 của Bộ Lao động-THương binh và Xã hội quy định chi tiết và hướng dẫn thi hành một số&nbsp; điều của Luật BHXH về BHXH bắt buộc quy định về&nbsp; điều kiện hưởng lương hưu khi suy giảm khả năng lao động: Người lao động khi nghỉ việc có&nbsp;đủ 20 năm đóng BHXH trở lên được hưởng lương hưu với mức thấp hơn nếu thuộc một&nbsp;trong các trường hợp sau đây:</p><p>-&nbsp;Bị&nbsp;suy giảm khả năng lao động từ 61% đến 80% và đảm bảo điều kiện về tuổi đời theo bảng dưới đây:<br  />&nbsp;</p><table align=\"center\" border=\"1\" cellpadding=\"10\" cellspacing=\"1\" style=\"width:100%;\" width=\"100%\">	<tbody>		<tr>			<td align=\"center\"><strong>Năm nghỉ hưởng lương hưu</strong></td>			<td align=\"center\"><strong>Điều kiện về tuổi đời đối với nam</strong></td>		</tr>		<tr>			<td align=\"center\">2016</td>			<td align=\"center\">Đủ 51 tuổi</td>		</tr>		<tr>			<td align=\"center\">2017</td>			<td align=\"center\">Đủ 52 tuổi</td>		</tr>		<tr>			<td align=\"center\">2019</td>			<td align=\"center\">Đủ 53 tuổi</td>		</tr>		<tr>			<td align=\"center\">2019</td>			<td align=\"center\">Đủ 54 tuổi</td>		</tr>		<tr>			<td align=\"center\">Từ 2020 trở đi</td>			<td align=\"center\">Đủ 55 tuổi</td>		</tr>	</tbody></table><p><br  />- Bị suy giảm khả năng lao động từ 81% trở lên và nam đủ 50 tuổi, nữ&nbsp;đủ 45 tuổi.</p><p>-&nbsp;Bị&nbsp;suy giảm khả năng lao động từ 61% trở lên và có đủ 15 năm trở lên làm nghề hoặc công việc đặc biệt nặng nhọc, độc hại, nguy hiểm thuộc danh mục do Bộ Lao động - Thương binh và Xã hội, Bộ Y tế ban hành.</p><p>Như vậy, nếu đến tháng 7/2018 ông đủ&nbsp;điều kiện về hưu trước tuổi theo quy định trên thì mức hưởng lương hưu được tính như sau: Căn cứ theo Khoản 1, Khoản 2 Điều 7 Nghị&nbsp;định 115/2015/NĐ-CP và&nbsp; Điều 17 Thông tư 59/2015/TT-BLĐTBXH&nbsp; quy định về mức lương hưu hàng tháng: ... Tỷ lệ hưởng lương hưu hằng tháng của người lao động về hưu đủ tuổi theo quy định được tính như sau:…lao động nam nghỉ hưu từ ngày 1/1/2018 trở đi, tỷ lệ hưởng lương hưu hàng tháng được tính bằng 45% tương ứng với số năm đóng BHXH theo bảng dưới đây, sau đó cứ thêm mỗi năm đóng BHXH, được tính thêm 2%; mức tối đa bằng 75%.<br  />&nbsp;</p><table align=\"center\" border=\"1\" cellpadding=\"10\" cellspacing=\"1\" style=\"width:100%;\" width=\"100%\">	<tbody>		<tr>			<td align=\"center\"><strong>Năm nghỉ&nbsp; hưu</strong></td>			<td align=\"center\">			<p><strong>Số năm đóng BHXH tương ứng với tỷ lệ hưởng lương hưu 45%</strong></p>			</td>		</tr>		<tr>			<td align=\"center\">2018</td>			<td align=\"center\">16 năm</td>		</tr>		<tr>			<td align=\"center\">2019</td>			<td align=\"center\">17 năm</td>		</tr>		<tr>			<td align=\"center\">2020</td>			<td align=\"center\">18 năm</td>		</tr>		<tr>			<td align=\"center\">2021</td>			<td align=\"center\">19 năm</td>		</tr>		<tr>			<td align=\"center\">Từ 2022 trở đi</td>			<td align=\"center\">20 năm</td>		</tr>	</tbody></table><p><br  />Mức lương hưu hàng tháng của người lao động về hưu trước tuổi được tính như người lao động về hưu đủ tuổi, sau đó cứ mỗi năm nghỉ hưu trước tuổi theo quy định thì giảm 2%.</p>', 1, 2, 1498644755, 1, 1, 1498644844, 0), 
(2, 1, 'Thanh toán hợp đồng trọn gói có căn cứ theo khối lượng?', 'Thanh-toan-hop-dong-tron-goi-co-can-cu-theo-khoi-luong', 'Đối với hợp đồng thi công xây dựng theo hình thức trọn gói, khối lượng công việc thực tế nhà thầu đã thực hiện để hoàn thành theo thiết kế (nhiều hơn hay ít hơn khối lượng công việc nêu trong hợp đồng) không ảnh hưởng tới số tiền chủ đầu tư thanh toán cho nhà thầu.', '<p>Đơn vị của ông Mai Văn Trung (Quảng Ninh) ký một hợp đồng trọn gói trong lĩnh vực xây dựng. Đơn vị của ông đã thi công xong tất cả các hạng mục theo hồ sơ thiết kế thi công được duyệt, nhưng trong phần khối lượng có một số mục không có trong bản vẽ thiết kế (thực tế đơn vị cũng không thi công) và khối lượng thi công các hạng mục khác cũng ít hơn (nhiều hơn) so với thiết kế.</p><p>Ông Trung hỏi, đến khi quyết toán đơn vị của ông có được quyết toán toàn bộ khối lượng theo hợp đồng đã ký không? Nếu được thanh toán theo hợp đồng trọn gói thì căn cứ tài liệu nào?</p><p><em>Bộ Xây dựng trả lời vấn đề này như sau:</em></p><p>Việc thanh toán, quyết toán hợp đồng xây dựng phải phù hợp với nội dung hợp đồng đã ký giữa các bên và quy định của pháp luật có liên quan áp dụng cho hợp đồng.</p><p>Đối với hợp đồng thi công xây dựng theo hình thức giá hợp đồng trọn gói, khối lượng công việc thực tế nhà thầu đã thực hiện để hoàn thành theo thiết kế (nhiều hơn hay ít hơn khối lượng công việc nêu trong hợp đồng) không ảnh hưởng tới số tiền chủ đầu tư thanh toán cho nhà thầu.</p>', 2, 1, 1498644983, 1, 1, 1498644983, 0), 
(3, 1, 'Cấp thẻ BHYT thời hạn 6 tháng&#x3A; Đúng hay sai?', 'Cap-the-BHYT-thoi-han-6-thang-Dung-hay-sai', 'Ông Vũ Ngọc Hòa làm việc tại Trung tâm dạy nghề lái xe Anh Tuấn (Hà Nội), đóng đầy đủ các loại bảo hiểm, nhưng thẻ BHYT của ông Hòa chỉ có thời hạn 6 tháng. Ông Hòa hỏi, BHXH huyện cấp thẻ BHYT cho ông như vậy có đúng không?', '<ul>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Co-thoi-gian-lam-nhiem-vu-quoc-te-duoc-cap-the-BHYT/308734.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl01_lnkHeadline\">Có thời gian làm nhiệm vụ quốc tế được cấp...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Co-hai-the-BHYT-xu-ly-the-nao/308294.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl02_lnkHeadline\">Có hai thẻ BHYT, xử lý thế nào?</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Duoc-bo-sung-thoi-han-the-BHYT-cho-tre-den-ky-nhap-hoc/307994.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl03_lnkHeadline\">Được bổ sung thời hạn thẻ BHYT cho trẻ đến...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Gia-tri-su-dung-the-BHYT-theo-ho-gia-dinh/307031.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl04_lnkHeadline\">Giá trị sử dụng thẻ BHYT theo hộ gia đình</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Thoi-han-su-dung-the-BHYT-doi-voi-tre-chua-vao-lop-1/306211.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl05_lnkHeadline\">Thời hạn sử dụng thẻ BHYT đối với trẻ chưa...</a></li></ul><p><em>Về vấn đề này, BHXH &nbsp;TP. Hà Nội trả lời như sau:</em></p><p>Trung tâm dạy nghề lái xe Anh Tuấn đăng ký tham gia BHXH, BHYT, BHTN tại BHXH huyện Thạch Thất từ tháng 7/2017. Trong quá trình thực hiện thu nộp BHXH, BHYT, BHTN, Trung tâm là một trong số những đơn vị chưa thực hiện nghiệm túc việc thu nộp BHXH, BHYT, BHTN theo quy định (thường xuyên để nợ đọng BHXH, BHYT, BHTN).</p><p>Thực hiện Công văn số 2387/BHXH-QLT ngày 25/10/2016 của BHXH TP. Hà Nội về việc hướng dẫn cấp thẻ BHYT năm 2017, tại Mục 2 “về hồ sơ cấp thẻ BHYT năm 2017” có quy định “Giá trị sử dụng thẻ BHYT: Thẻ BHYT có giá trị sử dụng tùy đặc thù của từng đơn vị sử dụng lao động, cơ quan BHXH cấp thẻ BHYT có giá trị sử dụng 3 tháng, 6 tháng, 12 tháng, tối đa không quá một năm (theo năm tài chính)”.</p><p>Với đặc thù của đơn vị, BHXH huyện đã phát hành thẻ BHYT cho Trung tâm dạy nghề lái xe Anh Tuấn năm 2017 với giá trị thẻ có thời hạn 6 tháng là không sai quy định.</p><p>Khi cấp thẻ BHYT có giá trị 6 tháng năm 2017, BHXH huyện cũng đã hướng dẫn và&nbsp;đôn đốc đơn vị nộp tiền BHXH, BHYT, BHTN để tiếp tục gia hạn thẻ BHYT có giá trị 6 tháng cuối năm 2017.</p>', 3, 2, 1498645018, 1, 1, 1498645018, 0), 
(4, 1, 'Khai sai thuế, tự phát hiện có bị xử phạt?', 'Khai-sai-thue-tu-phat-hien-co-bi-xu-phat', 'Ông Trần Quang (Lâm Đồng) là hộ kinh doanh cá thể, chuyên kinh doanh gara ô tô, áp dụng thuế khoán ổn định và thuế theo hóa đơn xuất bán trong quý từ quý 1/2016. Đến nay, ông Quang phát hiện hộ kinh doanh của ông áp dụng thuế suất thuế GTGT và TNCN thấp hơn so với quy định.', '<ul>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Mua-hang-theo-hinh-thuc-tra-cham-khai-thue-the-nao/308812.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl01_lnkHeadline\">Mua hàng theo hình thức trả chậm, khai thuế thế...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/DN-phai-ke-khai-thue-tu-ngay-bat-dau-hoat-dong/291101.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl02_lnkHeadline\">DN phải kê khai thuế từ ngày bắt đầu hoạt...</a></li>	<li><a href=\"http://baochinhphu.vn/Doanh-nghiep-Co-quan-chuc-nang/Dieu-kien-doanh-nghiep-ke-khai-thue-theo-quy/246326.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl03_lnkHeadline\">Điều kiện doanh nghiệp kê khai thuế theo quý</a></li></ul>Qua&nbsp;Hệ thống tiếp nhận, trả lời kiến nghị của doanh nghiệp, ông Quang hỏi, trong trường hợp này hộ kinh doanh của ông có bị truy thu thuế GTGT và TNCN đối với hóa đơn đã sử dụng từ năm 2016 không và ngoài việc truy thu thì có bị phạt không? Căn cứ để truy thu và phạt với hộ cá thể có sử dụng hóa đơn quy định tại văn bản nào, truy thu trong vòng bao nhiêu năm?<p><em>Về vấn đề này, Tổng cục Thuế - Bộ Tài chính có ý kiến như sau:</em></p><p>Tại Điểm 1, 2 Điều 30 Luật Quản lý thuế số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=29975\">78/2006/QH11</a>&nbsp;ngày 29/11/2006 quy định về khai thuế, tính thuế như sau:</p><p>“Điều 30. Nguyên tắc khai thuế và tính thuế</p><p>1. Người nộp thuế phải khai chính xác, trung thực, đầy đủ các nội dung trong tờ khai thuế theo mẫu do Bộ Tài chính quy định và nộp đầy đủ các loại chứng từ, tài liệu quy định trong hồ sơ kê khai thuế với cơ quan quản lý thuế.</p><p>2. Người nộp thuế tự tính số phải nộp, trừ trường hợp việc tính thuế do cơ quan quản lý thuế thực hiện theo quy định của Chính phủ”.</p><p>Tại Điểm 1 Điều 34 Luật Quản lý thuế số 78/2006/QH11 quy định về việc bổ sung hồ sơ khai thuế như sau:</p><p>“Điều 34. Khai bổ sung hồ sơ khai thuế</p><p>1. Trước khi cơ quan thuế công bố quyết định kiểm tra thuế, thanh tra thuế tại trụ sở người nộp thuế, người nộp thuế phát hiện hồ sơ khai thuế đã nộp có sai sót gây ảnh hưởng đến số thuế phải nộp thì được khai bổ sung hồ sơ khai thuế”.</p><p>Khoản 3, Điều 6 Thông tư số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=180852\">92/2015/TT-BTC</a>&nbsp;ngày 15/6/2016 của Bộ Tài chính hướng dẫn, trường hợp cá nhân nộp thuế khoán sử dụng hóa đơn của cơ quan thuế thì thời hạn nộp hồ sơ khai thuế đối với doanh thu trên hóa đơn chậm nhất là ngày thứ 30 của quý tiếp theo quý phát sinh nghĩa vụ thuế.</p><p>Theo quy định tại Điều 26 Thông tư số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=171570\">156/2013/TT-BTC</a>&nbsp;ngày 6/11/2013 của Bộ Tài chính về thời hạn nộp thuế thì:</p><p>“1. Người nộp thuế có nghĩa vụ nộp thuế đầy đủ, đúng thời hạn vào ngân sách Nhà nước.</p><p>2. Thời hạn nộp thuế chậm nhất là ngày cuối cùng của thời hạn nộp hồ sơ khai thuế đối với trường hợp người nộp thuế tính thuế hoặc thời hạn nộp thuế ghi trên thông báo, quyết định, văn bản của cơ quan thuế hoặc cơ quan Nhà nước có thẩm quyền khác”.</p><p><strong>Xác định các hành vi vi phạm của người nộp thuế</strong></p><p>Điều 103 Luật Quản lý thuế số 78/2006/QH11 quy định hành vi vi phạm pháp luật về thuế của người nộp thuế gồm vi phạm các thủ tục thuế, chậm nộp tiền thuế, khai sai dẫn đến thiếu số tiền thuế phải nộp hoặc tăng số tiền thuế được hoàn; trốn thuế, gian lận thuế.</p><p>Khoản 32, Điều 1 Luật số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=164955\">21/2012/QH13</a>&nbsp;ngày 20/11/2012 Sửa đổi bổ sung một số điều của Luật Quản lý thuế quy định:</p><p>“Điều 1. Sửa đổi, bổ sung một số điều của Luật Quản lý thuế</p><p>32. Điều 106 được sửa đổi, bổ sung như sau:</p><p>Điều 106. Xử lý đối với việc chậm nộp tiền thuế…</p><p>2. Người nộp thuế khai sai dẫn đến làm thiếu số tiền phải nộp nếu tự giác khắc phục hậu quả bằng cách nộp đủ số tiền thuế phải nộp trước khi cơ quan có thẩm quyền phát hiện thì phải nộp tiền chậm nộp, nhưng không bị xử phạt vi phạm thủ tục hành chính thuế, thiếu thuế, trốn thuế…</p><p>3. Người nộp thuế tự xác định số tiền chậm nộp căn cứ vào số tiền thuế chậm nộp, số ngày chậm nộp và mức tiền chậm nộp theo quy định tại Khoản 1 điều này.</p><p>Trường hợp người nộp thuế không tự xác định hoặc xác định không đúng số tiền chậm nộp thì cơ quan quản lý thuế xác định số tiền chậm nộp và thông báo cho người nộp thuế biết.</p><p>4. Trường hợp sau 30 ngày, kể từ ngày hết thời hạn nộp thuế, người nộp thuế chưa nộp tiền thuế và tiền chậm nộp thì cơ quan quản lý thuế thông báo cho người nộp thuế biết số tiền thuế nợ và tiền chậm nộp…”.</p><p>Tại Khoản 3, Điều 3 Luật số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=184570\">106/2016/QH13</a>&nbsp;ngày 6/4/2016 Sửa đổi bổ sung một số điều của Luật Thuế GTGT, Luật Thuế tiêu thụ đặc biệt và Luật Quản lý thuế quy định, “người nộp thuế chậm nộp tiền thuế so với thời hạn quy định, thời hạn gia hạn nộp thuế, thời hạn ghi trong thông báo của cơ quan quản lý thuế, thời hạn trong quyết định xử lý của cơ quan quản lý thuế thì phải nộp đủ tiền thuế và tiền chậm nộp theo mức bằng 0,03%/ngày tính trên số tiền thuế chậm nộp.</p><p>Đối với các khoản nợ tiền thuế phát sinh trước ngày 1/7/2016 mà người nộp thuế chưa nộp vào ngân sách Nhà nước, kể cả khoản tiền nợ thuế được truy thu qua kết quả thanh tra, kiểm tra của cơ quan có thẩm quyền thì được chuyển sang áp dụng mức tính tiền chậm nộp theo quy định tại khoản này từ ngày 1/7/2016”.</p><p><strong>Các trường hợp không bị xử phạt hành chính</strong></p><p>Tại Khoản 2, Điều 5 Thông tư số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=171141\">166/2013/TT-BTC</a>&nbsp;quy định những trường hợp không xử phạt vi phạm hành chính về thuế là những trường hợp khai sai, người nộp thuế đã khai bổ sung hồ sơ khai thuế và đã nộp đủ số tiền thuế phải nộp, trước thời điểm cơ quan thuế công bố quyết định kiểm tra thuế, thanh tra thuế tại trụ sở người nộp thuế hoặc trước thời điểm cơ quan thuế phát hiện không qua thanh tra, kiểm tra tại trụ sở người nộp thuế hoặc trước thời điểm cơ quan có thẩm quyền khác phát hiện.</p><p>Khoản 33, Điều 1 Luật số 21/2012/QH13 quy định, “người nộp thuế đã phản ánh đầy đủ, trung thực các nghiệp vụ kinh tế làm phát sinh nghĩa vụ thuế trên sổ kế toán, hóa đơn, chứng từ nhưng khai sai dẫn đến thiếu số tiền thuế phải nộp hoặc tăng số tiền thuế được hoàn thì phải nộp đủ số tiền thuế đã khai thiếu, nộp lại số tiền thuế được hoàn cao hơn và bị xử phạt 20% số tiền thuế khai thiếu, số tiền thuế được hoàn cao hơn và tiền chậm nộp tính trên số tiền thuế thiếu hoặc số tiền thuế được hoàn cao hơn”.</p><p>Theo Khoản 35, Điều 1 Luật số 21/2012/QH13: “Điều 1. Sửa đổi, bổ sung một số điều của Luật quản lý thuế</p><p>35. Điều 110 được sửa đổi, bổ sung như sau:</p><p>Điều 110. Thời hiệu xử phạt vi phạm pháp luật về thuế</p><p>1. Đối với hành vi vi phạm thủ tục thuế, thời hiệu xử phạt là hai năm, kể từ ngày hành vi vi phạm được thực hiện.</p><p>2. Đối với hành vi trốn thuế, gian lận thuế chưa đến mức truy cứu trách nhiệm hình sự, hành vi khai thiếu số thuế phải nộp hoặc tăng số thuế được hoàn, thời hiệu xử phạt là 5 năm, kể từ ngày thực hiện hành vi vi phạm.</p><p>3. Quá thời hiệu xử phạt vi phạm pháp luật về thuế thì người nộp thuế không bị xử phạt nhưng vẫn phải nộp đủ số tiền thuế thiếu, số tiền thuế trốn, số tiền thuế gian lận, tiền chậm nộp vào ngân sách Nhà nước trong thời hạn 10 năm trở về trước, kể từ ngày phát hiện hành vi vi phạm.</p><p>Trường hợp người nộp thuế không đăng ký thuế thì phải nộp đủ số tiền thuế thiếu, số tiền thuế trốn, số tiền thuế gian lận, tiền chậm nộp cho toàn bộ thời gian trở về trước, kể từ ngày phát hiện hành vi vi phạm”.</p><p>Căn cứ vào các quy định hướng dẫn nêu trên, nếu ông Trần Quang tự phát hiện khai sai, dẫn đến thiếu số tiền thuế phải nộp và tự khai bổ sung hồ sơ khai thuế, nộp đủ số tiền thuế còn thiếu và nộp tiền chậm nộp theo quy định trước thời điểm cơ quan thuế hoặc cơ quan có thẩm quyền khác phát hiện thì ông Trần Quang không bị xử phạt vi phạm hành chính về thuế.</p><p>Bên cạnh đó, nếu ông Trần Quang không tự phát hiện khai sai, dẫn đến thiếu số tiền thuế phải nộp, mà do cơ quan thuế hoặc cơ quan có thẩm quyền khác phát hiện thì cơ quan có thẩm quyền ra quyết định truy thu số tiền thuế còn thiếu, tiền chậm nộp và xử phạt 20% số tiền thuế khai thiếu theo quy định.</p>', 4, 2, 1498645061, 1, 1, 1498645061, 0), 
(5, 1, 'Thí sinh tự do được bảo lưu và cộng điểm thế nào?', 'Thi-sinh-tu-do-duoc-bao-luu-va-cong-diem-the-nao', 'Thí sinh Nguyễn Thị My hỏi: Thí sinh tự do chưa tốt nghiệp được bảo lưu tối đa là bao nhiêu môn? Năm 2016, thí sinh có điểm khuyến khích do có giấy chứng nhận nghề thì năm nay thí sinh thi lại tốt nghiệp THPT, có thể tiếp tục sử dụng giấy chứng nhận nghề để được hưởng chế độ khuyến khích hay không?', '<ul>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Dieu-kien-bao-luu-diem-de-xet-tot-nghiep-THPT-2017/300759.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl01_lnkHeadline\">Điều kiện bảo lưu điểm để xét tốt nghiệp THPT...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Quy-dinh-ve-bao-luu-diem-thi-khi-truot-tot-nghiep/283122.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl02_lnkHeadline\">Quy định về bảo lưu điểm thi khi trượt tốt...</a></li></ul><p><em>Về vấn đề này, Bộ Giáo dục và Đào tạo trả lời như sau:</em></p><p>Quy chế thi THPT Quốc gia năm 2017 quy định:</p><p>Thí sinh dự thi đủ các môn quy định trong kỳ thi năm trước nhưng chưa tốt nghiệp THPT và không bị kỷ luật huỷ kết quả thi thì được bảo lưu điểm thi của các bài thi hoặc các môn thành phần của bài thi Khoa học tự nhiên, Khoa học xã hội đạt từ 5,0 điểm trở lên trong kỳ thi tổ chức năm tiếp ngay sau đó để xét công nhận tốt nghiệp THPT.</p><p>Học sinh có Giấy chứng nhận nghề do Sở Giáo dục và Đào tạo hoặc các cơ sở giáo dục đào tạo và dạy nghề do ngành giáo dục cấp trong thời gian học THPT, được bảo lưu trong toàn cấp học và được cộng vào điểm bài thi để xét công nhận tốt nghiệp THPT.</p>', 5, 2, 1498645109, 1, 1, 1498645109, 0), 
(6, 1, 'Có phải đóng BHXH trong thời gian tạm ngừng kinh doanh?', 'Co-phai-dong-BHXH-trong-thoi-gian-tam-ngung-kinh-doanh', 'Công ty TNHH TMDV Cánh Đồng Xanh (TPHCM) dự định tạm ngừng hoạt động kinh doanh 6 tháng đến 1 năm. Qua Hệ thống tiếp nhận, trả lời kiến nghị của doanh nghiệp, Công ty hỏi, Công ty cần phải làm những thủ tục gì và có phải đóng BHXH cho nhân viên trong thời gian tạm ngừng không?', '<ul>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Cac-benh-duoc-giai-quyet-huong-BHXH-mot-lan/308378.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl01_lnkHeadline\">Các bệnh được giải quyết hưởng BHXH một lần</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Duoc-lua-chon-bao-luu-hoac-nhan-tro-cap-BHXH-mot-lan/306873.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl02_lnkHeadline\">Được lựa chọn bảo lưu hoặc nhận trợ cấp BHXH...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Huong-BHXH-mot-lan-voi-nguoi-mac-benh-hiem-ngheo/300041.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl03_lnkHeadline\">Hưởng BHXH một lần với người mắc bệnh hiểm nghèo</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Can-cu-giai-quyet-huong-BHXH-mot-lan/299933.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl04_lnkHeadline\">Căn cứ giải quyết hưởng BHXH một lần</a></li></ul><p><em>Về vấn đề này, BHXH tỉnh An Giang trả lời như sau:</em></p><p><strong>Điều kiện hưởng BHXH một lần</strong></p><p>Tại Khoản 1, Điều 60 Luật BHXH số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=178127\">58/2014/QH13</a>&nbsp;và Khoản 1, Điều 1 Nghị quyết số 93/2015/QH13 ngày 22/6/2015 của Quốc hội quy định BHXH một lần:&nbsp;<em>“Trường hợp người lao động tham gia BHXH bắt buộc sau một năm nghỉ việc, người tham gia BHXH tự nguyện sau một năm không tiếp tục đóng BHXH mà chưa đủ 20 năm đóng BHXH khi có yêu cầu thì được nhận BHXH một lần”.</em></p><p>Đối với các trường hợp còn lại theo quy định (đủ tuổi hưởng lương hưu mà chưa đủ 20 năm đóng BHXH, ra nước ngoài định cư, bị mắc một trong những bệnh nguy hiểm đến tính mạng như: ung thư, bại liệt, xơ gan cổ chướng, phong, lao nặng, AIDS, và những bệnh khác theo quy định của Bộ Y tế…) thì không bị giới hạn bởi điều kiện nghỉ việc sau 1 năm mới được đề nghị hưởng BHXH một lần mà có thể đề nghị hưởng khi có đủ điều kiện và hồ sơ theo quy định.</p><p>Trường hợp đủ điều kiện hưởng BHXH một lần như quy định trên thì bà làm hồ sơ hưởng BHXH một lần theo quy định. Thời gian đóng BHXH đã hưởng chế độ BHXH một lần không dùng để tính hưởng chế độ BHXH nếu bà tham gia BHXH vào lần tiếp theo.</p><p><strong>Hồ sơ hưởng chế độ BHXH một lần</strong></p><p>Điều 20, Quyết định số 636/QĐ-BHXH ngày 22/4/2016 của BHXH Việt Nam quy định hồ sơ hưởng BHXH một lần, gồm:</p><p>- Sổ BHXH</p><p>- Đơn theo mẫu số 14-HSB (bản chính)</p><p>Người hưởng chế độ BHXH một lần nộp hồ sơ như trên tại BHXH nơi đăng ký thường trú hoặc tạm trú có thời hạn.</p><p>Trường hợp của bà có thể nộp hồ sơ đề nghị hưởng chế độ BHXH một lần tại cơ quan BHXH huyện nơi bà có hộ khẩu thường trú hoặc nơi tạm trú và đăng ký hình thức nhận tiền trợ cấp BHXH một lần là nhận tiền mặt hoặc nhận thông qua tài khoản cá nhân đều được.</p>', 6, 2, 1498645191, 1, 1, 1498645191, 0), 
(7, 1, 'Thẩm quyền cấp chứng nhận kinh doanh khí', 'Tham-quyen-cap-chung-nhan-kinh-doanh-khi', 'Kể từ ngày 15/5/2016 các quy định về kinh doanh khí và điều kiện kinh doanh khí thực hiện theo Nghị định số 19/2016/NĐ-CP. Theo đó, thẩm quyền cấp giấy chứng nhận đủ điều kiện kinh doanh khí dầu mỏ hóa lỏng cho cửa hàng bán LPG chai thuộc thẩm quyền của Sở Công Thương.', '<ul>	<li><a href=\"http://baochinhphu.vn/Chi-dao-quyet-dinh-cua-Chinh-phu-Thu-tuong-Chinh-phu/Muc-xu-phat-vi-pham-ve-dieu-kien-kinh-doanh-khi-dau-mo-hoa-long/307295.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl01_lnkHeadline\">Mức xử phạt vi phạm về điều kiện kinh doanh...</a></li>	<li><a href=\"http://baochinhphu.vn/Chinh-sach-moi/De-xuat-quy-dinh-moi-ve-kinh-doanh-khi/300365.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl02_lnkHeadline\">Đề xuất quy định mới về kinh doanh khí</a></li>	<li><a href=\"http://baochinhphu.vn/Doanh-nghiep-Co-quan-chuc-nang/Tiep-thu-kien-nghi-cua-DN-khi-sua-Nghi-dinh-ve-kinh-doanh-khi/300167.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl03_lnkHeadline\">Tiếp thu kiến nghị của DN khi sửa Nghị định...</a></li>	<li><a href=\"http://baochinhphu.vn/Chinh-sach-va-cuoc-song/Nghi-dinh-moi-ve-dieu-kien-kinh-doanh-khi/250139.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl04_lnkHeadline\">Nghị định mới về điều kiện kinh doanh khí</a></li></ul><p>Ông Trần Minh Nhựt (Cần Thơ) làm thủ tục đề nghị cấp giấy chứng nhận đủ điều kiện kinh doanh khí dầu mỏ hóa lỏng cho cửa hàng từ cuối tháng 12/2015, nhưng đến ngày 19/5/2016 ông mới có đầy đủ hồ sơ.<br  /><br  />Do Nghị định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=183969\">19/2016/NĐ-CP</a>&nbsp;về kinh doanh khí ban hành ngày 15/5/2016 nên Sở Công Thương Cần Thơ không tiếp nhận hồ sơ của ông Nhựt với lý do xin giấy đủ điều kiện phải theo quy định của Nghị định số 19/2016/NĐ-CP.&nbsp;<br  /><br  /><a href=\"http://doanhnghiep.chinhphu.vn/Danh-sach-kien-nghi.html\">Qua Hệ thống tiếp nhận, trả lời kiến nghị của doanh nghiệp</a>, ông Nhựt đề nghị cơ quan chức năng sớm giải quyết để cửa hàng được kinh doanh theo nguyện vọng.</p><p><em>Về vấn đề này, Bộ Công Thương có&nbsp;<a href=\"https://one.chinhphu.vn:7575/Uploaded/nguyenthithanhthuy/2017_06_26/tl-tran-minh-nhut_CQPJ.pdf\">ý kiến</a>&nbsp;như sau:</em></p><p>Nghị định số 19/2016/NĐ-CP về kinh doanh khí có hiệu lực thi hành kể từ ngày 15/5/2016 thay thế Nghị định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=91900\">107/2009/NĐ-CP</a>&nbsp;ngày 26/11/2009 của Chính phủ về kinh doanh khí dầu mỏ hóa lỏng và Điều 2 Nghị định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=153222\">118/2011/NĐ-CP</a>&nbsp;ngày 16/12/2011 của Chính phủ sửa đổi, bổ sung thủ tục hành chính trong lĩnh vực kinh doanh xăng dầu và khí dầu mỏ hóa lỏng.</p><p>Như vậy, kể từ ngày 15/5/2016 các quy định về kinh doanh khí và điều kiện kinh doanh khí thực hiện theo Nghị định số 19/2016/NĐ-CP.</p><p>Theo quy định tại Khoản 2, Điều 44 Nghị định số 19/2016/NĐ-CP, thẩm quyền cấp giấy chứng nhận đủ điều kiện kinh doanh khí dầu mỏ hóa lỏng cho cửa hàng bán LPG chai thuộc thẩm quyền của Sở Công Thương.</p><p>Hồ sơ, trình tự, thủ tục cấp theo quy định tại Điều 43 Nghị định số 19/2016/NĐ-CP.</p>', 7, 2, 1498645218, 1, 1, 1498645218, 0), 
(8, 1, 'Kết hôn với người VN ở nước ngoài cần giấy tờ gì?', 'Ket-hon-voi-nguoi-VN-o-nuoc-ngoai-can-giay-to-gi', 'Ông Nguyễn Mạnh Hùng (TPHCM) làm thủ tục đăng ký kết hôn với người Việt Nam định cư ở Mỹ. Tuy nhiên ông đang gặp vướng mắc về giấy tờ để hoàn thiện hồ sơ, ông đề nghị cơ quan có thẩm quyền xem xét, hướng dẫn.', '<ul>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Thu-tuc-dang-ky-ket-hon-voi-nguoi-nuoc-ngoai/293367.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl01_lnkHeadline\">Thủ tục đăng ký kết hôn với người nước ngoài</a></li>	<li><a href=\"http://baochinhphu.vn/Hoat-dong-Bo-nganh/Huong-dan-dang-ky-ket-hon-co-yeu-to-nuoc-ngoai/225823.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl02_lnkHeadline\">Hướng dẫn đăng ký kết hôn có yếu tố nước...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Co-duoc-uy-quyen-thuc-hien-viec-dang-ky-ket-hon/206230.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl03_lnkHeadline\">Có được ủy quyền thực hiện việc đăng ký kết...</a></li></ul><p>Căn cứ quy định tại Nghị định số 24/2013/NĐ-CP, ông Hùng đã chuẩn bị bộ hồ sơ để đăng ký kết hôn gồm: Công hàm độc thân, giấy khám sức khỏe, kết quả khám tâm thần tiền hôn nhân tại Mỹ. Tất cả đã được hợp pháp hóa lãnh sự và đóng dấu giáp lai của Đại sứ quán Việt Nam tại Mỹ.</p><p>Tuy nhiên, khi làm thủ tục tại bộ phận tư pháp Quận 7, TP. Hồ Chí Minh, chuyên viên tư pháp yêu cầu ông phải bổ sung bản photo hộ chiếu có phần nhập cảnh của người nữ, bản photo xác nhận tình trạng hôn nhân của ông Hùng và giấy khám sức khỏe tâm thần tại Việt Nam.</p><p>Theo ông Hùng, bộ hồ sơ của ông đã có kết quả khám tâm thần tiền hôn nhân tại Mỹ (bản tiếng Việt và tiếng Anh), đã được Đại sứ quán Việt Nam tại Mỹ xác nhận là hợp lệ thì việc yêu cầu phải có giấy khám sức khỏe tâm thần tại Việt Nam là không hợp lý.</p><p>Qua&nbsp;<a href=\"https://nguoidan.chinhphu.vn/web/quan-tri-he-thong/phan-anh-kien-nghi\">Hệ thống tiếp nhận, trả lời phản ánh, kiến nghị của người dân</a>, ông Hùng đề nghị giải đáp, yêu cầu của chuyên viên tư pháp Quận 7 có đúng quy định không?</p><p><em>Về vấn đề này, Bộ Tư pháp&nbsp;<a href=\"https://one.chinhphu.vn:7575/Uploaded/tranthuhang/2017_06_08/1818%20BTP%20tr%E1%BA%A3%20l%E1%BB%9Di%20PAKN%20c%E1%BB%A7a%20%C3%B4ng%20Nguy%E1%BB%85n%20M%E1%BA%A1nh%20H%C3%B9ng_2983010617133324.pdf\">trả lời</a>&nbsp;như sau:</em></p><p>Nghị định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=166469\">24/2013/NĐ-CP</a>&nbsp;ngày 28/3/2013 của Chính phủ quy định chi tiết thi hành một số điều của Luật Hôn nhân và gia đình về quan hệ hôn nhân và gia đình có yếu tố nước ngoài và các quy định về thủ tục đăng ký kết hôn có yếu tố nước ngoài tại Nghị định số&nbsp;<a href=\"unsaved://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=178372\">126/2014/NĐ-CP</a>&nbsp;ngày 31/12/2014 của Chính phủ đã hết hiệu lực thi hành.</p><p>Theo quy định của pháp luật hiện hành (Nghị định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=182158\">123/2015/NĐ-CP</a>&nbsp;ngày 15/11/2015 của Chính phủ quy định chi tiết một số điều và biện pháp thi hành&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=178129\">Luật Hộ tịch</a>) thì hồ sơ đăng ký kết hôn có yếu tố nước ngoài bao gồm các giấy tờ sau:</p><p>- Tờ khai đăng ký kết hôn theo mẫu, có đủ thông tin của hai bên nam, nữ. Hai bên nam, nữ có thể khai chung vào một Tờ khai đăng ký kết hôn.</p><p>- Giấy xác nhận của tổ chức y tế có thẩm quyền của Việt Nam hoặc nước ngoài xác nhận các bên kết hôn không mắc bệnh tâm thần hoặc bệnh khác mà không có khả năng nhận thức, làm chủ được hành vi của mình.</p><p>- Giấy tờ chứng minh tình trạng hôn nhân của người nước ngoài do cơ quan có thẩm quyền nước ngoài cấp, đối với công dân Việt Nam định cư ở nước ngoài chưa có quốc tịch nước ngoài thì giấy tờ chứng minh tình trạng hôn nhân do cơ quan có thẩm quyền nước ngoài hoặc cơ quan đại diện Việt Nam ở nước ngoài cấp còn giá trị sử dụng, xác nhận hiện tại người đó không có vợ hoặc không có chồng.</p><p>- Người nước ngoài, công dân Việt Nam định cư ở nước ngoài phải nộp bản sao hộ chiếu/giấy tờ có giá trị thay hộ chiếu hoặc xuất trình bản chính hộ chiếu/giấy tờ có giá trị thay hộ chiếu trong trường hợp trực tiếp nộp hồ sơ.</p><p>- Giấy xác nhận tình trạng hôn nhân của công dân Việt Nam cư trú trong nước (trong giai đoạn chuyển tiếp).</p><p>Pháp luật cũng quy định giấy tờ do cơ quan có thẩm quyền của nước ngoài cấp, công chứng hoặc xác nhận để sử dụng cho việc đăng ký hộ tịch tại Việt Nam phải được hợp pháp hóa lãnh sự, trừ trường hợp được miễn theo điều ước quốc tế mà Việt Nam là thành viên, giấy tờ bằng tiếng nước ngoài phải được dịch ra tiếng Việt và công chứng bản dịch hoặc chứng thực chữ ký người dịch theo quy định của pháp luật.</p><p>Theo quy định tại Khoản 1, Điều 3 Thông tư số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=183091\">15/2015/TT-BTP</a>&nbsp;ngày 16/11/2015 của Bộ Tư pháp thì khi tiếp nhận hồ sơ, người tiếp nhận có trách nhiệm kiểm tra ngay toàn bộ hồ sơ, nếu hồ sơ chưa đầy đủ, hoàn thiện thì hướng dẫn người nộp hồ sơ bổ sung, hoàn thiện theo quy định; trường hợp không thể bổ sung, hoàn thiện hồ sơ ngay thì phải lập văn bản hướng dẫn, trong đó nêu rõ loại giấy tờ, nội dung cần bổ sung, hoàn thiện, ký, ghi rõ họ, chữ đệm, tên của người tiếp nhận.</p><p>Do đó, nếu trong hồ sơ đăng ký kết hôn của ông Nguyễn Mạnh Hùng đã có đủ các giấy tờ nêu trên, giấy khám sức khỏe do cơ quan có thẩm quyền của Hoa Kỳ cấp đã được hợp pháp hóa lãnh sự thì yêu cầu của cán bộ tiếp nhận hồ sơ là không đúng quy định pháp luật. Bộ Tư pháp sẽ có văn bản đề nghị Sở Tư pháp TP. Hồ Chí Minh kiểm tra, xác minh thông tin ông Hùng phản ánh và chấn chỉnh sai phạm (nếu có).</p><strong>Chinh</strong>', 8, 2, 1498645262, 1, 1, 1498645262, 0), 
(9, 1, 'Thân nhân người có công được hưởng BHYT theo mức nào?', 'Than-nhan-nguoi-co-cong-duoc-huong-BHYT-theo-muc-nao', 'Ông Nguyễn Hữu Cần (TP. HCM) hỏi: Thân nhân người có công với cách mạng trường hợp nào thì được hưởng 95% BHYT? Người có công có tỉ lệ thương tật dưới 61% thì thân nhân của họ được hưởng BHYT ở mức nào?', '<ul>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Than-nhan-nguoi-co-cong-duoc-tro-cap-mot-lan/305532.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl01_lnkHeadline\">Thân nhân người có công được trợ cấp một lần</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/BHYT-voi-nguoi-co-cong-dang-huong-tro-cap-tuat/305495.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl02_lnkHeadline\">BHYT với người có công đang hưởng trợ cấp tuất</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Doi-the-BHYT-doi-voi-nguoi-co-cong-voi-cach-mang/304113.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl03_lnkHeadline\">Đổi thẻ BHYT đối với người có công với cách...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Nguoi-co-cong-da-tu-tran-than-nhan-co-duoc-ho-tro-sua-nha/301017.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl04_lnkHeadline\">Người có công đã từ trần, thân nhân có được...</a></li></ul><p><em>Về vấn đề này, BHXH TP. Hồ Chí Minh trả lời như sau:</em></p><p>Theo Luật sửa đổi, bổ sung một số điều của&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=175349\">Luật BHYT&nbsp;</a>(Luật số 46/2014/QH13, có hiệu lực thi hành từ ngày 1/1/2015);<strong>&nbsp;</strong>Thông tư liên tịch số 41/2014/TTLT-BYT-BTC ngày 24/11/2014 của liên Bộ Y tế, Bộ Tài chính hướng dẫn thực hiện BHYT;</p><p>Theo đó, thân nhân của người có công với cách mạng được ngân sách Nhà nước đóng BHYT và được quỹ BHYT thanh toán 95% chi phí khám chữa bệnh trong phạm vi được hưởng, gồm các đối tượng như sau: Cha đẻ, mẹ đẻ, vợ hoặc chồng, con từ trên 6 tuổi đến dưới 18 tuổi hoặc từ đủ 18 tuổi trở lên nếu còn tiếp tục đi học hoặc bị khuyết tật nặng, khuyết tật đặc biệt nặng của các đối tượng: Người hoạt động cách mạng trước ngày 1/1/1945; Người hoạt động cách mạng từ ngày 1/1/1945 đến ngày khởi nghĩa tháng 8/1945; Anh hùng Lực lượng vũ trang nhân dân, Anh hùng Lao động trong thời kỳ kháng chiến; Thương binh, bệnh binh suy giảm khả năng lao động từ 61% trở lên; Người hoạt động kháng chiến bị nhiễm chất độc hóa học suy giảm khả năng lao động từ 61% trở lên.</p><p>Như vậy, thân nhân của các đối tượng nêu trên được quỹ BHYT thanh toán 95% chi phí khám chữa bệnh. Trường hợp thân nhân của thương binh, bệnh binh suy giảm khả năng lao động dưới 61% hoặc người hoạt động kháng chiến bị nhiễm chất độc hóa học suy giảm khả năng lao động dưới 61% (trừ con đẻ từ trên 6 tuổi bị dị dạng, dị tật do hậu quả của chất độc hóa học không tự lực được trong sinh hoạt hoặc suy giảm khả năng tự lực trong sinh hoạt) nếu tham gia BHYT theo đối tượng khác thì có mức hưởng 80% chi phí khám chữa bệnh theo quy định.</p>', 9, 2, 1498645280, 1, 1, 1498645280, 0), 
(10, 1, 'Giáo viên vùng ĐBKK chuyển công tác, hưởng phụ cấp thế nào?', 'Giao-vien-vung-DBKK-chuyen-cong-tac-huong-phu-cap-the-nao', 'Ông Bùi Trọng Hữu làm giáo viên Trường THCS Vĩnh Hội Đông, huyện An Phú, tỉnh An Giang từ tháng 9/2006-7/2010. Từ tháng 8/2010, ông công tác tại Trường THCS Phú Hữu, huyện An Phú, đã hưởng đủ trợ cấp lần đầu và các khoản phụ cấp khi công tác tại vùng có điều kiện kinh tế-xã hội đặc biệt khó khăn.', '<ul>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Giao-vien-xin-viec-tai-vung-DBKK-co-duoc-tro-cap-lan-dau/306987.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl01_lnkHeadline\">Giáo viên xin việc tại vùng ĐBKK có được trợ...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Huong-dan-xac-dinh-vung-DBKK-duoc-uu-dai-giao-duc/296829.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl02_lnkHeadline\">Hướng dẫn xác định vùng ĐBKK được ưu đãi giáo...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Truong-hop-truy-thu-phu-cap-thu-hut-vung-DBKK/292752.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl03_lnkHeadline\">Trường hợp truy thu phụ cấp thu hút vùng ĐBKK</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Phu-cap-thu-hut-khi-dieu-dong-cong-tac-giua-cac-vung-DBKK/283614.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl04_lnkHeadline\">Phụ cấp thu hút khi điều động công tác giữa...</a></li>	<li><a href=\"http://baochinhphu.vn/Tra-loi-cong-dan/Cach-tinh-tro-cap-lan-dau-khi-cong-tac-tai-vung-DBKK/242144.vgp\" id=\"ctl00_leftContent_ND_ctl02_rptItems_ctl05_lnkHeadline\">Cách tính trợ cấp lần đầu khi công tác tại...</a></li></ul><p>Hiện tại ông Hữu còn được hưởng chế độ phụ cấp 70% lương và phụ cấp thâm niên nghề. Vừa qua, ông được Phòng Giáo dục – Đào tạo huyện An Phú điều động đến Trường THCS Nhơn Hội, xã Nhơn Hội, huyện An Phú cũng thuộc vùng kinh tế - xã hội khó khăn.</p><p>Ông Hữu hỏi, nếu đến công tác tại trường mới ông sẽ được hưởng chế độ phụ cấp như thế nào và có được trợ cấp lần đầu bằng 10 tháng lương cơ bản không?</p><p><em>Về vấn đề này, Sở Nội vụ An Giang có ý kiến như sau:</em></p><p>Theo hướng dẫn của Ủy ban dân tộc và Bộ Nội vụ, UBND tỉnh An Giang đã có Văn bản số 696/UBND-KGVX ngày 3/5/2017 về xác định địa bàn thụ hưởng chính sách quy định tại Nghị định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=98306\">116/2010/NĐ-CP</a>. Theo đó, ấp Tắc Trúc, xã Nhơn Hội, huyện An Phú không còn thuộc địa bàn thụ hưởng chính sách theo Nghị định số 116/2010/NĐ-CP.</p><p>Ngoài ra, theo Quyết định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=2&amp;_page=1&amp;mode=detail&amp;document_id=189609\">582/QĐ-TTg</a>&nbsp;ngày 28/4/2017 của Thủ tướng Chính phủ phê duyệt danh sách thôn đặc biệt khó khăn, xã khu vực III, khu vực II, khu vực I thuộc vùng dân tộc thiểu số và miền núi giai đoạn 2016 – 2020, thì ấp Tắc Trúc (không thuộc ấp đặc biệt khó khăn), xã Nhơn Hội (xã khu vực II) không còn thuộc địa bàn thụ hưởng chính sách theo Nghị định số 116/2010/NĐ-CP (và các chế độ chính sách tương tự theo Nghị định số 61/2006/NĐ-CP).</p><p>Trường hợp của ông Bùi Trọng Hữu khi chuyển công tác về Trường THCS Nhơn Hội, huyện An Phú thì không được hưởng 10 tháng lương cơ bản (do không còn thuộc địa bàn thụ hưởng chính sách theo Nghị định số 116/2010/NĐ-CP và Nghị định số 61/2006/NĐ-CP) và chỉ còn được hưởng phụ cấp đối với giáo viên như ưu đãi theo nghề, phụ cấp thâm niên và các phụ cấp khác theo quy định của pháp luật.</p>', 10, 2, 1498645298, 1, 1, 1498645298, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_faq_categories`
--

DROP TABLE IF EXISTS `nv4_vi_faq_categories`;
CREATE TABLE `nv4_vi_faq_categories` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` mediumint(8) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `groups_view` varchar(255) NOT NULL,
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `keywords` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_faq_categories`
--

INSERT INTO `nv4_vi_faq_categories` VALUES
(1, 0, 'Trả lời công dân', 'Tra-loi-cong-dan', '', '6', 1, 1, 'thanh toán,hợp đồng,căn cứ,khối lượng,thi công,xây dựng,thực tế,thực hiện,hoàn thành,thiết kế,ảnh hưởng,tới số,đơn vị,của ông,quảng ninh,lĩnh vực,tất cả,hồ sơ,số mục,quyết toán,toàn bộ');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_faq_config`
--

DROP TABLE IF EXISTS `nv4_vi_faq_config`;
CREATE TABLE `nv4_vi_faq_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_faq_config`
--

INSERT INTO `nv4_vi_faq_config` VALUES
('type_main', '0'), 
('user_post', '0');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_faq_tmp`
--

DROP TABLE IF EXISTS `nv4_vi_faq_tmp`;
CREATE TABLE `nv4_vi_faq_tmp` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` mediumint(8) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `question` text NOT NULL,
  `answer` mediumtext NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_laws_area`
--

DROP TABLE IF EXISTS `nv4_vi_laws_area`;
CREATE TABLE `nv4_vi_laws_area` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(249) NOT NULL,
  `title` varchar(249) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`,`parentid`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=10  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_area`
--

INSERT INTO `nv4_vi_laws_area` VALUES
(4, 0, 'Hanh-chinh', 'Hành chính', '', '', 1498622412, 2), 
(3, 0, 'Co-cau-to-chuc', 'Cơ cấu tổ chức', '', '', 1498622396, 1), 
(5, 0, 'Chinh-sach', 'Chính sách', '', '', 1498622426, 3), 
(6, 0, 'Thue-Le-phi', 'Thuế - Lệ phí', '', '', 1498622456, 4), 
(7, 0, 'Doanh-nghiep', 'Doanh nghiệp', '', '', 1498622465, 5), 
(9, 0, 'Dat-dai-Nha-o', 'Đất đai - Nhà ở', '', '', 1498642073, 6);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_laws_cat`
--

DROP TABLE IF EXISTS `nv4_vi_laws_cat`;
CREATE TABLE `nv4_vi_laws_cat` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(249) NOT NULL,
  `title` varchar(249) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `newday` tinyint(2) unsigned NOT NULL DEFAULT '5',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`,`parentid`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=10  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_cat`
--

INSERT INTO `nv4_vi_laws_cat` VALUES
(1, 0, 'Cong-van', 'Công văn', '', '', 5, 1412265295, 1), 
(2, 0, 'Thong-tu', 'Thông tư', '', '', 5, 1412265295, 2), 
(3, 0, 'Quyet-dinh', 'Quyết định', '', '', 5, 1412265295, 3), 
(4, 0, 'Nghi-dinh', 'Nghị định', '', '', 5, 1412265295, 4), 
(5, 0, 'Thong-bao', 'Thông báo', '', '', 5, 1412998152, 5), 
(6, 0, 'Huong-dan', 'Hướng dẫn', '', '', 5, 1412998170, 6), 
(7, 0, 'Bao-cao', 'Báo cáo', '', '', 5, 1412998182, 7), 
(8, 0, 'Chi-thi', 'Chỉ thị', '', '', 5, 1412998193, 8), 
(9, 0, 'Ke-hoach', 'Kế hoạch', '', '', 5, 1412998208, 9);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_laws_config`
--

DROP TABLE IF EXISTS `nv4_vi_laws_config`;
CREATE TABLE `nv4_vi_laws_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_config`
--

INSERT INTO `nv4_vi_laws_config` VALUES
('nummain', '50'), 
('numsub', '50'), 
('typeview', '0'), 
('down_in_home', '1'), 
('detail_other', 'a:1:{i:0;s:3:\"cat\";}'), 
('detail_hide_empty_field', '1'), 
('detail_show_link_cat', '1'), 
('detail_show_link_area', '1'), 
('detail_show_link_subject', '1'), 
('detail_show_link_signer', '1'), 
('detail_pdf_quick_view', '1'), 
('other_numlinks', '5');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_laws_row`
--

DROP TABLE IF EXISTS `nv4_vi_laws_row`;
CREATE TABLE `nv4_vi_laws_row` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `replacement` varchar(255) NOT NULL DEFAULT '',
  `relatement` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `cid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `sid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `sgid` smallint(4) unsigned NOT NULL DEFAULT '0',
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
  `publtime` int(11) NOT NULL DEFAULT '0',
  `startvalid` int(11) NOT NULL DEFAULT '0',
  `exptime` int(11) NOT NULL DEFAULT '0',
  `view_hits` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `download_hits` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `admin_add` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `admin_edit` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=24  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_row`
--

INSERT INTO `nv4_vi_laws_row` VALUES
(1, '', '', 'Quy định chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Bộ Tài nguyên và Môi trường', 'Quy-dinh-chuc-nang-nhiem-vu-quyen-han-va-co-cau-to-chuc-cua-Bo-Tai-nguyen-va-Moi-truong-1', '36&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Quy định chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Bộ Tài nguyên và Môi trường', '', 'quy định,nhiệm vụ,quyền hạn,tổ chức,tài nguyên', '6', '6', '36.signed.pdf', 1, 1498622968, 1498623643, 1491238800, 1491238800, 0, 1, 1, 1, 1), 
(7, '', '', 'Ban hành Quy chế xét tặng Giải thưởng &quot;Khoa học và công nghệ dành cho giảng viên trẻ trong các cơ sở giáo dục đại học&quot;', 'Ban-hanh-Quy-che-xet-tang-Giai-thuong-Khoa-hoc-va-cong-nghe-danh-cho-giang-vien-tre-trong-cac-co-so-giao-duc-dai-hoc-7', '11&#x002F;2017&#x002F;TT-BGDĐT', 2, 7, 8, '', 'Ban hành Quy chế xét tặng Giải thưởng &quot;Khoa học và công nghệ dành cho giảng viên trẻ trong các cơ sở giáo dục đại học&quot;', '', 'ban hành,quy chế,giải thưởng,khoa học,công nghệ,giảng viên,cơ sở,giáo dục', '6', '6', '11-bgddt.signed.pdf', 1, 1498623931, 0, 1493917200, 1497891600, 0, 1, 0, 1, 0), 
(2, '', '', 'Quy định chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Viện Hàn lâm Khoa học và Công nghệ Việt Nam', 'Quy-dinh-chuc-nang-nhiem-vu-quyen-han-va-co-cau-to-chuc-cua-Vien-Han-lam-Khoa-hoc-va-Cong-nghe-Viet-Nam-2', '60&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Quy định chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Viện Hàn lâm Khoa học và Công nghệ Việt Nam', '', 'quy định,nhiệm vụ,quyền hạn,tổ chức,khoa học,công nghệ', '6', '6', '60.signed.pdf', 1, 1498623094, 1498623637, 1494781200, 1500224400, 0, 1, 0, 1, 1), 
(3, '', '', 'Quy định chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Bộ Giáo dục và Đào tạo', 'Quy-dinh-chuc-nang-nhiem-vu-quyen-han-va-co-cau-to-chuc-cua-Bo-Giao-duc-va-Dao-tao-3', '69&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Quy định chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Bộ Giáo dục và Đào tạo', '', 'quy định,nhiệm vụ,quyền hạn,tổ chức,giáo dục', '6', '6', '69.signed.pdf', 1, 1498623212, 1498623631, 1495645200, 1495645200, 0, 1, 0, 1, 1), 
(4, '', '', 'Về tổ chức và hoạt động của Viện Khoa học An toàn và Vệ sinh lao động thuộc Tổng Liên đoàn Lao động Việt Nam', 'Ve-to-chuc-va-hoat-dong-cua-Vien-Khoa-hoc-An-toan-va-Ve-sinh-lao-dong-thuoc-Tong-Lien-doan-Lao-dong-Viet-Nam-4', '17&#x002F;2017&#x002F;QĐ-TTg', 3, 5, 6, '', 'Về tổ chức và hoạt động của Viện Khoa học An toàn và Vệ sinh lao động thuộc Tổng Liên đoàn Lao động Việt Nam', '', 'tổ chức,hoạt động,khoa học,an toàn,vệ sinh,lao động,tổng liên đoàn', '6', '6', '17.signed_01.pdf', 1, 1498623306, 1498623625, 1495990800, 1500051600, 0, 1, 0, 1, 1), 
(5, '', '', 'Quy định chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Bộ Y tế', 'Quy-dinh-chuc-nang-nhiem-vu-quyen-han-va-co-cau-to-chuc-cua-Bo-Y-te-5', '75&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Quy định chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Bộ Y tế', '', 'quy định,nhiệm vụ,quyền hạn,tổ chức', '6', '6', '75.signed.pdf', 1, 1498623380, 1498623614, 1497891600, 0, 0, 1, 0, 1, 1), 
(6, '', '', 'Quy định chế độ công tác phí, chế độ chi hội nghị', 'Quy-dinh-che-do-cong-tac-phi-che-do-chi-hoi-nghi-6', '40&#x002F;2017&#x002F;TT-BTC', 2, 6, 7, '', 'Quy định chế độ công tác phí, chế độ chi hội nghị', '', 'quy định,chế độ,công tác', '6', '6', '40-btc.signed.pdf', 1, 1498623607, 0, 1493312400, 1498842000, 0, 0, 0, 1, 0), 
(8, '', '', 'Quy định các loại giấy tờ hợp pháp về đất đai để cấp giấy phép xây dựng', 'Quy-dinh-cac-loai-giay-to-hop-phap-ve-dat-dai-de-cap-giay-phep-xay-dung-8', '53&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Quy định các loại giấy tờ hợp pháp về đất đai để cấp giấy phép xây dựng', '', 'quy định,giấy tờ,hợp pháp,giấy phép', '6', '6', '53.signed.pdf', 1, 1498624020, 0, 1494176400, 1498323600, 0, 0, 0, 1, 0), 
(9, '', '', 'Ban hành Quy chuẩn kỹ thuật quốc gia về phân cấp và đóng phương tiện thủy nội địa vỏ thép chở xô hóa chất nguy hiểm - Sửa đổi lần 1&#x3A;2016 QCVN 01&#x3A;2008&#x002F;BGTVT và Quy chuẩn kỹ thuật quốc gia về ngăn ngừa ô nhiễm do phương tiện thủy nội địa - ', 'Ban-hanh-Quy-chuan-ky-thuat-quoc-gia-ve-phan-cap-va-dong-phuong-tien-thuy-noi-dia-vo-thep-cho-xo-hoa-chat-nguy-hiem-Sua-doi-lan-1-2016-QCVN-01-2008-BGTVT-va-Quy-chuan-ky-thuat-quoc-gia-ve-ngan-ngua-o-nhiem-do-phuong-tien-thuy-noi-dia-Sua-doi-lan-2-201-9', '15&#x002F;2017&#x002F;TT-BGTVT', 2, 8, 9, '', 'Ban hành Quy chuẩn kỹ thuật quốc gia về phân cấp và đóng phương tiện thủy nội địa vỏ thép chở xô hóa chất nguy hiểm - Sửa đổi lần 1&#x3A;2016 QCVN 01&#x3A;2008&#x002F;BGTVT và Quy chuẩn kỹ thuật quốc gia về ngăn ngừa ô nhiễm do phương tiện thủy nội địa - Sửa đổi lần 2&#x3A;2016 QCVN 17&#x3A;2011&#x002F;BGTVT', '', 'ban hành,kỹ thuật,quốc gia,phân cấp,phương tiện,nội địa,hóa chất,nguy hiểm,sửa đổi,ngăn ngừa,ô nhiễm', '6', '6', '15-bgtvt.signed.pdf,15-kembgtvt.pdf', 1, 1498624204, 0, 1494781200, 1511802000, 0, 1, 1, 1, 0), 
(10, '', '', 'Hướng dẫn tuyến đường vận chuyển quá cảnh hàng hóa qua lãnh thổ Việt Nam', 'Huong-dan-tuyen-duong-van-chuyen-qua-canh-hang-hoa-qua-lanh-tho-Viet-Nam-10', '16&#x002F;2017&#x002F;TT-BGTVT', 2, 8, 9, '', 'Hướng dẫn tuyến đường vận chuyển quá cảnh hàng hóa qua lãnh thổ Việt Nam', '', 'hướng dẫn,tuyến đường,vận chuyển,quá cảnh,hàng hóa,lãnh thổ', '6', '6', '16-bgtvt.signed.pdf', 1, 1498624299, 0, 1495386000, 1500051600, 0, 1, 0, 1, 0), 
(11, '', '', 'Quy định về quản lý và sử dụng nguồn vốn ngân sách địa phương ủy thác qua Ngân hàng Chính sách xã hội để cho vay đối với người nghèo và các đối tượng chính sách khác', 'Quy-dinh-ve-quan-ly-va-su-dung-nguon-von-ngan-sach-dia-phuong-uy-thac-qua-Ngan-hang-Chinh-sach-xa-hoi-de-cho-vay-doi-voi-nguoi-ngheo-va-cac-doi-tuong-chinh-sach-khac-11', '11&#x002F;2017&#x002F;TT-BTC', 2, 6, 7, '', 'Quy định về quản lý và sử dụng nguồn vốn ngân sách địa phương ủy thác qua Ngân hàng Chính sách xã hội để cho vay đối với người nghèo và các đối tượng chính sách khác', '', 'quy định,quản lý,sử dụng,ngân sách,ủy thác,ngân hàng,xã hội', '6', '6', '11-btc.signed.pdf', 1, 1498624398, 0, 1486486800, 1490979600, 0, 1, 0, 1, 0), 
(12, '', '', 'Về việc quy định chính sách hỗ trợ khuyến khích sử dụng hình thức hỏa táng trên địa bàn thành phố Hà Nội.', 'Ve-viec-quy-dinh-chinh-sach-ho-tro-khuyen-khich-su-dung-hinh-thuc-hoa-tang-tren-dia-ban-thanh-pho-Ha-Noi-12', '03&#x002F;2017&#x002F;QĐ-UBND', 3, 9, 9, '', 'Về việc quy định chính sách hỗ trợ khuyến khích sử dụng hình thức hỏa táng trên địa bàn thành phố Hà Nội.', '', 'quy định,hỗ trợ,khuyến khích,sử dụng,hỏa táng,thành phố', '6', '6', '03-17.pdf', 1, 1498624576, 0, 1486659600, 0, 0, 1, 0, 1, 0), 
(13, '', '', 'Hướng dẫn thực hiện một số điều của Nghị định số 61&#x002F;2015&#x002F;NĐ-CP ngày 09 tháng 7 năm 2015 của Chính phủ quy định về chính sách hỗ trợ tạo việc làm và Quỹ quốc gia về việc làm về chính sách việc làm công', 'Huong-dan-thuc-hien-mot-so-dieu-cua-Nghi-dinh-so-61-2015-ND-CP-ngay-09-thang-7-nam-2015-cua-Chinh-phu-quy-dinh-ve-chinh-sach-ho-tro-tao-viec-lam-va-Quy-quoc-gia-ve-viec-lam-ve-chinh-sach-viec-lam-cong-13', '11&#x002F;2017&#x002F;TT-BLĐTBXH', 2, 10, 11, '', 'Hướng dẫn thực hiện một số điều của Nghị định số 61&#x002F;2015&#x002F;NĐ-CP ngày 09 tháng 7 năm 2015 của Chính phủ quy định về chính sách hỗ trợ tạo việc làm và Quỹ quốc gia về việc làm về chính sách việc làm công', '', 'hướng dẫn,thực hiện,nghị định,phủ quy,hỗ trợ,việc làm,quốc gia', '6', '6', '11-bldtbxh.signed.pdf', 1, 1498634269, 1498635782, 1492621200, 1497459600, 0, 0, 0, 1, 1), 
(14, '', '', 'Quy định mức trợ cấp, phụ cấp ưu đãi đối với người có công với cách mạng', 'Quy-dinh-muc-tro-cap-phu-cap-uu-dai-doi-voi-nguoi-co-cong-voi-cach-mang-14', '70&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Quy định mức trợ cấp, phụ cấp ưu đãi đối với người có công với cách mạng', '', 'quy định,trợ cấp,phụ cấp', '6', '6', '70.signed.pdf', 1, 1498635751, 0, 1496682000, 1500915600, 0, 1, 0, 1, 0), 
(15, '', '', 'Quy định cơ chế, chính sách đặc thù đối với Khu Công nghệ cao Hòa Lạc', 'Quy-dinh-co-che-chinh-sach-dac-thu-doi-voi-Khu-Cong-nghe-cao-Hoa-Lac-15', '74&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Quy định cơ chế, chính sách đặc thù đối với Khu Công nghệ cao Hòa Lạc', '', 'quy định,công nghệ', '6', '6', '74.signed.pdf', 1, 1498635844, 0, 1497891600, 1501866000, 0, 1, 0, 1, 0), 
(16, '', '', 'Quy định việc nhập khẩu thuốc lá nguyên liệu theo hạn ngạch thuế quan năm 2017', 'Quy-dinh-viec-nhap-khau-thuoc-la-nguyen-lieu-theo-han-ngach-thue-quan-nam-2017-16', '39&#x002F;2016&#x002F;TT-BCT', 2, 11, 12, '', 'Quy định việc nhập khẩu thuốc lá nguyên liệu theo hạn ngạch thuế quan năm 2017', '', 'quy định,nhập khẩu,thuốc lá,nguyên liệu,thuế quan', '6', '6', '39-bct.signed.pdf', 1, 1498636857, 0, 1483030800, 1483203600, 1514566800, 1, 0, 1, 0), 
(17, '', '', 'Quy định việc áp dụng hạn ngạch thuế quan nhập khẩu thuốc lá nguyên liệu và trứng gia cầm có xuất xứ từ các nước thành viên của Liên minh Kinh tế Á - Âu năm 2017, 2018 và 2019', 'Quy-dinh-viec-ap-dung-han-ngach-thue-quan-nhap-khau-thuoc-la-nguyen-lieu-va-trung-gia-cam-co-xuat-xu-tu-cac-nuoc-thanh-vien-cua-Lien-minh-Kinh-te-A-Au-nam-2017-2018-va-2019-17', '01&#x002F;2017&#x002F;TT-BCT', 2, 11, 12, '', 'Quy định việc áp dụng hạn ngạch thuế quan nhập khẩu thuốc lá nguyên liệu và trứng gia cầm có xuất xứ từ các nước thành viên của Liên minh Kinh tế Á - Âu năm 2017, 2018 và 2019', '', 'quy định,áp dụng,thuế quan,nhập khẩu,thuốc lá,nguyên liệu,gia cầm,xuất xứ,thành viên,liên minh,kinh tế', '6', '6', '', 1, 1498636956, 0, 1485190800, 1489424400, 1577725200, 1, 0, 1, 0), 
(18, '', '', 'Sửa đổi, bổ sung một số điều của Nghị định số 20&#x002F;2011&#x002F;NĐ-CP ngày 23 tháng 3 năm 2011 của Chính phủ quy định chi tiết và hướng dẫn thi hành Nghị quyết số 55&#x002F;2010&#x002F;QH12 ngày 24 tháng 11 năm 2010 của Quốc hội về miễn, giảm thuế sử ', 'Sua-doi-bo-sung-mot-so-dieu-cua-Nghi-dinh-so-20-2011-ND-CP-ngay-23-thang-3-nam-2011-cua-Chinh-phu-quy-dinh-chi-tiet-va-huong-dan-thi-hanh-Nghi-quyet-so-55-2010-QH12-ngay-24-thang-11-nam-2010-cua-Quoc-hoi-ve-mien-giam-thue-su-dung-dat-nong-nghiep-18', '21&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Sửa đổi, bổ sung một số điều của Nghị định số 20&#x002F;2011&#x002F;NĐ-CP ngày 23 tháng 3 năm 2011 của Chính phủ quy định chi tiết và hướng dẫn thi hành Nghị quyết số 55&#x002F;2010&#x002F;QH12 ngày 24 tháng 11 năm 2010 của Quốc hội về miễn, giảm thuế sử dụng đất nông nghiệp', '', 'sửa đổi,bổ sung,nghị định,phủ quy,chi tiết,hướng dẫn,thi hành,nghị quyết,quốc hội,giảm thuế,sử dụng', '6', '6', '21.signed.pdf', 1, 1498637067, 0, 1487869200, 0, 0, 0, 0, 1, 0), 
(19, '', '', 'Hướng dẫn thu, nộp, quản lý và sử dụng phí, lệ phí hàng hải', 'Huong-dan-thu-nop-quan-ly-va-su-dung-phi-le-phi-hang-hai-19', '17&#x002F;2017&#x002F;TT-BTC', 2, 6, 7, '', 'Hướng dẫn thu, nộp, quản lý và sử dụng phí, lệ phí hàng hải', '', 'hướng dẫn,quản lý,sử dụng,lệ phí', '6', '6', '17btc.signed.pdf', 1, 1498637194, 0, 1488214800, 1492448400, 0, 1, 0, 1, 0), 
(20, '', '', 'Về việc thu giá dịch vụ sử dụng đường bộ theo hình thức điện tử tự động không dừng', 'Ve-viec-thu-gia-dich-vu-su-dung-duong-bo-theo-hinh-thuc-dien-tu-tu-dong-khong-dung-20', '07&#x002F;2017&#x002F;QĐ-TTg', 3, 12, 13, '', 'Về việc thu giá dịch vụ sử dụng đường bộ theo hình thức điện tử tự động không dừng', '', 'sử dụng,đường bộ,tự động', '6', '6', '07.signed_01.pdf', 1, 1498637444, 1498637509, 1490547600, 1494781200, 0, 1, 0, 1, 1), 
(21, '', '', 'Quy định về quản lý thuế đối với doanh nghiệp có giao dịch liên kết', 'Quy-dinh-ve-quan-ly-thue-doi-voi-doanh-nghiep-co-giao-dich-lien-ket-21', '20&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Quy định về quản lý thuế đối với doanh nghiệp có giao dịch liên kết', '', 'quy định,quản lý,doanh nghiệp,giao dịch', '6', '6', '20.signed.pdf,252.signed_01.pdf', 1, 1498637683, 0, 1487869200, 1493571600, 0, 0, 0, 1, 0), 
(22, '', '', 'Ban hành Quy định về hỗ trợ doanh nghiệp đầu tư phát triển sản xuất lĩnh vực công nghiệp và công nghiệp hỗ trợ', 'Ban-hanh-Quy-dinh-ve-ho-tro-doanh-nghiep-dau-tu-phat-trien-san-xuat-linh-vuc-cong-nghiep-va-cong-nghiep-ho-tro-22', '15&#x002F;2017&#x002F;QĐ-UBND', 3, 13, 14, '', 'Ban hành Quy định về hỗ trợ doanh nghiệp đầu tư phát triển sản xuất lĩnh vực công nghiệp và công nghiệp hỗ trợ', '', 'ban hành,quy định,hỗ trợ,doanh nghiệp,phát triển,sản xuất,lĩnh vực,công nghiệp', '6', '6', '15-17.signed.pdf', 1, 1498637911, 0, 1489597200, 0, 0, 0, 0, 1, 0), 
(23, '', '', 'Về quản lý sản xuất, kinh doanh muối', 'Ve-quan-ly-san-xuat-kinh-doanh-muoi-23', '40&#x002F;2017&#x002F;NĐ-CP', 4, 5, 6, '', 'Về quản lý sản xuất, kinh doanh muối', '', 'quản lý,sản xuất,kinh doanh', '6', '6', '40.signed.pdf', 1, 1498638119, 0, 1491325200, 1495213200, 0, 0, 0, 1, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_laws_row_area`
--

DROP TABLE IF EXISTS `nv4_vi_laws_row_area`;
CREATE TABLE `nv4_vi_laws_row_area` (
  `row_id` int(10) unsigned NOT NULL,
  `area_id` smallint(4) unsigned NOT NULL,
  UNIQUE KEY `alias` (`row_id`,`area_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_row_area`
--

INSERT INTO `nv4_vi_laws_row_area` VALUES
(1, 3), 
(2, 3), 
(3, 3), 
(4, 3), 
(5, 3), 
(6, 4), 
(7, 4), 
(8, 4), 
(9, 4), 
(10, 4), 
(11, 5), 
(12, 5), 
(13, 5), 
(14, 5), 
(15, 5), 
(16, 6), 
(17, 6), 
(18, 6), 
(19, 6), 
(20, 6), 
(21, 7), 
(22, 7), 
(23, 7);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_laws_set_replace`
--

DROP TABLE IF EXISTS `nv4_vi_laws_set_replace`;
CREATE TABLE `nv4_vi_laws_set_replace` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `oid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `nid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_laws_signer`
--

DROP TABLE IF EXISTS `nv4_vi_laws_signer`;
CREATE TABLE `nv4_vi_laws_signer` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `offices` varchar(255) NOT NULL,
  `positions` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=15  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_signer`
--

INSERT INTO `nv4_vi_laws_signer` VALUES
(7, 'Trần Xuân Hà', 'Bộ Tài chính', 'Thứ trưởng', 1498623470), 
(8, 'Bùi Văn Ga', 'Bộ Giáo dục và Đào tạo', 'Thứ trưởng', 1498623781), 
(5, 'Khác', '', '', 1412265295), 
(6, 'Nguyễn Xuân Phúc', 'Chính phủ', 'Thủ Tướng', 1498622806), 
(9, 'Trương Quang Nghĩa', 'Bộ Giao thông Vận tải', 'Bộ trưởng', 1498624091), 
(10, 'Nguyễn Đức Chung', 'UBND TP Hà Nội', 'Chủ tịch', 1498624471), 
(11, 'Doãn Mậu Diệp', 'Bộ Lao động, Thương binh và Xã hội', 'Thứ trưởng', 1498624673), 
(12, 'Trần Tuấn Anh', 'Bộ Công Thương', 'Bộ trưởng', 1498636504), 
(13, 'Trịnh Đình Dũng', 'Thủ tướng Chính phủ', 'Phó Thủ tướng', 1498637291), 
(14, 'Nguyễn Thành Phong', 'UBND TPHCM', 'Chủ tịch', 1498637835);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_laws_subject`
--

DROP TABLE IF EXISTS `nv4_vi_laws_subject`;
CREATE TABLE `nv4_vi_laws_subject` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `numcount` int(10) NOT NULL DEFAULT '0',
  `numlink` tinyint(2) NOT NULL DEFAULT '5',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=14  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_subject`
--

INSERT INTO `nv4_vi_laws_subject` VALUES
(6, 'Bo-Tai-chinh', 'Bộ Tài chính', '', '', 3, 5, 1498623447, 3), 
(7, 'Bo-Giao-duc-va-Dao-tao', 'Bộ Giáo dục và Đào tạo', '', '', 1, 5, 1498623770, 4), 
(4, 'Khac', 'Khác', '', '', 0, 5, 1412265295, 1), 
(5, 'Chinh-phu', 'Chính phủ', '', '', 11, 5, 1498622892, 2), 
(8, 'Bo-Giao-thong-van-tai', 'Bộ Giao thông vận tải', '', '', 2, 5, 1498624062, 5), 
(9, 'UBND-TP-Ha-Noi', 'UBND TP Hà Nội', '', '', 1, 5, 1498624442, 6), 
(10, 'Bo-Lao-dong-Thuong-binh-va-Xa-hoi', 'Bộ Lao động, Thương binh và Xã hội', '', '', 1, 5, 1498624616, 7), 
(11, 'Bo-Cong-thuong', 'Bộ Công thương', '', '', 3, 5, 1498636476, 8), 
(12, 'Thu-tuong-Chinh-phu', 'Thủ tướng Chính phủ', '', '', 1, 5, 1498637493, 9), 
(13, 'UBND-TP-Ho-Chi-Minh', 'UBND TP Hồ Chí Minh', '', '', 1, 5, 1498637844, 10);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_lay_y_kien_nguoi_dan_area`
--

DROP TABLE IF EXISTS `nv4_vi_lay_y_kien_nguoi_dan_area`;
CREATE TABLE `nv4_vi_lay_y_kien_nguoi_dan_area` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(249) NOT NULL,
  `title` varchar(249) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`,`parentid`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_lay_y_kien_nguoi_dan_cat`
--

DROP TABLE IF EXISTS `nv4_vi_lay_y_kien_nguoi_dan_cat`;
CREATE TABLE `nv4_vi_lay_y_kien_nguoi_dan_cat` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(249) NOT NULL,
  `title` varchar(249) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `newday` tinyint(2) unsigned NOT NULL DEFAULT '5',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`,`parentid`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_lay_y_kien_nguoi_dan_cat`
--

INSERT INTO `nv4_vi_lay_y_kien_nguoi_dan_cat` VALUES
(1, 0, 'Lay-y-kien-nguoi-dan', 'Lấy ý kiến người dân', '', '', 5, 1498702560, 1);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_lay_y_kien_nguoi_dan_config`
--

DROP TABLE IF EXISTS `nv4_vi_lay_y_kien_nguoi_dan_config`;
CREATE TABLE `nv4_vi_lay_y_kien_nguoi_dan_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_lay_y_kien_nguoi_dan_config`
--

INSERT INTO `nv4_vi_lay_y_kien_nguoi_dan_config` VALUES
('nummain', '50'), 
('numsub', '50'), 
('typeview', '0'), 
('down_in_home', '1'), 
('detail_other', 'a:1:{i:0;s:3:\"cat\";}'), 
('detail_hide_empty_field', '1'), 
('detail_show_link_cat', '1'), 
('detail_show_link_area', '1'), 
('detail_show_link_subject', '1'), 
('detail_show_link_signer', '1'), 
('detail_pdf_quick_view', '1'), 
('other_numlinks', '5');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_lay_y_kien_nguoi_dan_row`
--

DROP TABLE IF EXISTS `nv4_vi_lay_y_kien_nguoi_dan_row`;
CREATE TABLE `nv4_vi_lay_y_kien_nguoi_dan_row` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `replacement` varchar(255) NOT NULL DEFAULT '',
  `relatement` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `cid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `sid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `sgid` smallint(4) unsigned NOT NULL DEFAULT '0',
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
  `publtime` int(11) NOT NULL DEFAULT '0',
  `startvalid` int(11) NOT NULL DEFAULT '0',
  `exptime` int(11) NOT NULL DEFAULT '0',
  `view_hits` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `download_hits` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `admin_add` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `admin_edit` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_lay_y_kien_nguoi_dan_row_area`
--

DROP TABLE IF EXISTS `nv4_vi_lay_y_kien_nguoi_dan_row_area`;
CREATE TABLE `nv4_vi_lay_y_kien_nguoi_dan_row_area` (
  `row_id` int(10) unsigned NOT NULL,
  `area_id` smallint(4) unsigned NOT NULL,
  UNIQUE KEY `alias` (`row_id`,`area_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_lay_y_kien_nguoi_dan_set_replace`
--

DROP TABLE IF EXISTS `nv4_vi_lay_y_kien_nguoi_dan_set_replace`;
CREATE TABLE `nv4_vi_lay_y_kien_nguoi_dan_set_replace` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `oid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `nid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_lay_y_kien_nguoi_dan_signer`
--

DROP TABLE IF EXISTS `nv4_vi_lay_y_kien_nguoi_dan_signer`;
CREATE TABLE `nv4_vi_lay_y_kien_nguoi_dan_signer` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `offices` varchar(255) NOT NULL,
  `positions` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_lay_y_kien_nguoi_dan_subject`
--

DROP TABLE IF EXISTS `nv4_vi_lay_y_kien_nguoi_dan_subject`;
CREATE TABLE `nv4_vi_lay_y_kien_nguoi_dan_subject` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `numcount` int(10) NOT NULL DEFAULT '0',
  `numlink` tinyint(2) NOT NULL DEFAULT '5',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `weight` (`weight`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_menu`
--

DROP TABLE IF EXISTS `nv4_vi_menu`;
CREATE TABLE `nv4_vi_menu` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  AUTO_INCREMENT=4  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_menu`
--

INSERT INTO `nv4_vi_menu` VALUES
(1, 'Top Menu'), 
(2, 'nvTool'), 
(3, 'Công báo - Lịch - Văn bản');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_menu_rows`
--

DROP TABLE IF EXISTS `nv4_vi_menu_rows`;
CREATE TABLE `nv4_vi_menu_rows` (
  `id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `parentid` mediumint(5) unsigned NOT NULL,
  `mid` smallint(5) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `icon` varchar(255) DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `note` varchar(255) DEFAULT '',
  `weight` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `lev` int(11) NOT NULL DEFAULT '0',
  `subitem` text,
  `groups_view` varchar(255) DEFAULT '',
  `module_name` varchar(255) DEFAULT '',
  `op` varchar(255) DEFAULT '',
  `target` tinyint(4) DEFAULT '0',
  `css` varchar(255) DEFAULT '',
  `active_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`,`mid`)
) ENGINE=MyISAM  AUTO_INCREMENT=46  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_menu_rows`
--

INSERT INTO `nv4_vi_menu_rows` VALUES
(37, 0, 1, 'Giới thiệu', '#', '', '', '', 1, 1, 0, '', '6', '0', '', 1, '', 0, 1), 
(38, 0, 1, 'Cơ cấu tổ chức', '#', '', '', '', 2, 2, 0, '', '6', '0', '', 1, '', 0, 1), 
(39, 0, 1, 'Tin Tức', '/index.php?language=vi&nv=news', '', '', '', 3, 3, 0, '', '6', 'news', '', 1, '', 0, 1), 
(40, 0, 1, 'Văn bản', '/index.php?language=vi&nv=laws', '', '', '', 4, 4, 0, '', '6', 'laws', '', 1, '', 0, 1), 
(41, 0, 1, 'Lịch làm việc', '#', '', '', '', 5, 5, 0, '', '6', '0', '', 1, '', 0, 1), 
(42, 0, 1, 'Dịch vụ công', '#', '', '', '', 6, 6, 0, '', '6', '0', '', 1, '', 0, 1), 
(43, 0, 1, 'Lấy ý kiến người dân', '#', '', '', '', 7, 7, 0, '', '6', '0', '', 1, '', 0, 1), 
(44, 0, 1, 'Hỏi đáp', '/index.php?language=vi&nv=faq', '', '', '', 8, 8, 0, '', '6', 'faq', '', 1, '', 0, 1), 
(45, 0, 1, 'Liên hệ', '/index.php?language=vi&nv=contact', '', '', '', 9, 9, 0, '', '6', 'contact', '', 1, '', 0, 1), 
(23, 0, 2, 'Main', '/index.php?language=vi&nv=nvtools&amp;op=main', '', '', '', 1, 1, 0, '', '6', 'nvtools', 'main', 1, '', 1, 1), 
(24, 0, 2, 'Theme', '/index.php?language=vi&nv=nvtools&amp;op=theme', '', '', '', 2, 2, 0, '', '6', 'nvtools', 'theme', 1, '', 1, 1), 
(25, 0, 2, 'Data', '/index.php?language=vi&nv=nvtools&amp;op=data', '', '', '', 3, 3, 0, '', '6', 'nvtools', 'data', 1, '', 1, 1), 
(26, 0, 2, 'Addfun', '/index.php?language=vi&nv=nvtools&amp;op=addfun', '', '', '', 4, 4, 0, '', '6', 'nvtools', 'addfun', 1, '', 1, 1), 
(27, 0, 2, 'Action', '/index.php?language=vi&nv=nvtools&amp;op=action', '', '', '', 5, 5, 0, '', '6', 'nvtools', 'action', 1, '', 1, 1), 
(28, 0, 2, 'Export_excel', '/index.php?language=vi&nv=nvtools&amp;op=export_excel', '', '', '', 6, 6, 0, '', '6', 'nvtools', 'export_excel', 1, '', 1, 1), 
(29, 0, 2, 'Block', '/index.php?language=vi&nv=nvtools&amp;op=block', '', '', '', 7, 7, 0, '', '6', 'nvtools', 'block', 1, '', 1, 1), 
(30, 0, 2, 'Themecopy', '/index.php?language=vi&nv=nvtools&amp;op=themecopy', '', '', '', 8, 8, 0, '', '6', 'nvtools', 'themecopy', 1, '', 1, 1), 
(31, 0, 2, 'Thememodulecp', '/index.php?language=vi&nv=nvtools&amp;op=thememodulecp', '', '', '', 9, 9, 0, '', '6', 'nvtools', 'thememodulecp', 1, '', 1, 1), 
(32, 0, 2, 'Compiler', '/index.php?language=vi&nv=nvtools&amp;op=compiler', '', '', '', 10, 10, 0, '', '6', 'nvtools', 'compiler', 1, '', 1, 1), 
(33, 0, 2, 'Copylang', '/index.php?language=vi&nv=nvtools&amp;op=copylang', '', '', '', 11, 11, 0, '', '6', 'nvtools', 'copylang', 1, '', 1, 1), 
(34, 0, 3, 'Công báo chính phủ', '#', '', '', '', 1, 1, 0, '', '6', '0', '', 1, '', 0, 1), 
(35, 0, 3, 'Lịch làm việc', '#', '', '', '', 2, 2, 0, '', '6', '0', '', 1, '', 0, 1), 
(36, 0, 3, 'Văn bản chỉ đạo điều hành', '#', '', '', '', 3, 3, 0, '', '6', '0', '', 1, '', 0, 1);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_modfuncs`
--

DROP TABLE IF EXISTS `nv4_vi_modfuncs`;
CREATE TABLE `nv4_vi_modfuncs` (
  `func_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `func_name` varchar(55) NOT NULL,
  `alias` varchar(55) NOT NULL DEFAULT '',
  `func_custom_name` varchar(255) NOT NULL,
  `func_site_title` varchar(255) NOT NULL DEFAULT '',
  `in_module` varchar(50) NOT NULL,
  `show_func` tinyint(4) NOT NULL DEFAULT '0',
  `in_submenu` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subweight` smallint(2) unsigned NOT NULL DEFAULT '1',
  `setting` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`func_id`),
  UNIQUE KEY `func_name` (`func_name`,`in_module`),
  UNIQUE KEY `alias` (`alias`,`in_module`)
) ENGINE=MyISAM  AUTO_INCREMENT=105  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_modfuncs`
--

INSERT INTO `nv4_vi_modfuncs` VALUES
(4, 'main', 'main', 'Main', '', 'news', 1, 0, 1, ''), 
(5, 'viewcat', 'viewcat', 'Viewcat', '', 'news', 1, 0, 2, ''), 
(6, 'topic', 'topic', 'Topic', '', 'news', 1, 0, 3, ''), 
(7, 'content', 'content', 'Content', '', 'news', 1, 1, 4, ''), 
(8, 'detail', 'detail', 'Detail', '', 'news', 1, 0, 5, ''), 
(9, 'tag', 'tag', 'Tag', '', 'news', 1, 0, 6, ''), 
(10, 'rss', 'rss', 'Rss', '', 'news', 1, 1, 7, ''), 
(11, 'search', 'search', 'Search', '', 'news', 1, 1, 8, ''), 
(12, 'groups', 'groups', 'Groups', '', 'news', 1, 0, 9, ''), 
(13, 'sitemap', 'sitemap', 'Sitemap', '', 'news', 0, 0, 0, ''), 
(14, 'print', 'print', 'Print', '', 'news', 0, 0, 0, ''), 
(15, 'rating', 'rating', 'Rating', '', 'news', 0, 0, 0, ''), 
(16, 'savefile', 'savefile', 'Savefile', '', 'news', 0, 0, 0, ''), 
(17, 'sendmail', 'sendmail', 'Sendmail', '', 'news', 0, 0, 0, ''), 
(18, 'instant-rss', 'instant-rss', 'Instant Articles RSS', '', 'news', 0, 0, 0, ''), 
(19, 'main', 'main', 'Main', '', 'users', 1, 0, 1, ''), 
(20, 'login', 'login', 'Đăng nhập', '', 'users', 1, 1, 2, ''), 
(21, 'register', 'register', 'Đăng ký', '', 'users', 1, 1, 3, ''), 
(22, 'lostpass', 'lostpass', 'Khôi phục mật khẩu', '', 'users', 1, 1, 4, ''), 
(23, 'active', 'active', 'Kích hoạt tài khoản', '', 'users', 1, 0, 5, ''), 
(24, 'lostactivelink', 'lostactivelink', 'Lostactivelink', '', 'users', 1, 0, 6, ''), 
(25, 'editinfo', 'editinfo', 'Thiếp lập tài khoản', '', 'users', 1, 1, 7, ''), 
(26, 'memberlist', 'memberlist', 'Danh sách thành viên', '', 'users', 1, 1, 8, ''), 
(27, 'avatar', 'avatar', 'Avatar', '', 'users', 1, 0, 9, ''), 
(28, 'logout', 'logout', 'Thoát', '', 'users', 1, 1, 10, ''), 
(29, 'groups', 'groups', 'Quản lý nhóm', '', 'users', 1, 0, 11, ''), 
(30, 'oauth', 'oauth', 'Oauth', '', 'users', 0, 0, 0, ''), 
(31, 'main', 'main', 'Main', '', 'statistics', 1, 0, 1, ''), 
(32, 'allreferers', 'allreferers', 'Theo đường dẫn đến site', '', 'statistics', 1, 1, 2, ''), 
(33, 'allcountries', 'allcountries', 'Theo quốc gia', '', 'statistics', 1, 1, 3, ''), 
(34, 'allbrowsers', 'allbrowsers', 'Theo trình duyệt', '', 'statistics', 1, 1, 4, ''), 
(35, 'allos', 'allos', 'Theo hệ điều hành', '', 'statistics', 1, 1, 5, ''), 
(36, 'allbots', 'allbots', 'Theo máy chủ tìm kiếm', '', 'statistics', 1, 1, 6, ''), 
(37, 'referer', 'referer', 'Đường dẫn đến site theo tháng', '', 'statistics', 1, 0, 7, ''), 
(38, 'main', 'main', 'Main', '', 'banners', 1, 0, 1, ''), 
(39, 'addads', 'addads', 'Addads', '', 'banners', 1, 0, 2, ''), 
(40, 'clientinfo', 'clientinfo', 'Clientinfo', '', 'banners', 1, 0, 3, ''), 
(41, 'stats', 'stats', 'Stats', '', 'banners', 1, 0, 4, ''), 
(42, 'cledit', 'cledit', 'Cledit', '', 'banners', 0, 0, 0, ''), 
(43, 'click', 'click', 'Click', '', 'banners', 0, 0, 0, ''), 
(44, 'clinfo', 'clinfo', 'Clinfo', '', 'banners', 0, 0, 0, ''), 
(45, 'logininfo', 'logininfo', 'Logininfo', '', 'banners', 0, 0, 0, ''), 
(46, 'viewmap', 'viewmap', 'Viewmap', '', 'banners', 0, 0, 0, ''), 
(47, 'main', 'main', 'main', '', 'comment', 1, 0, 1, ''), 
(48, 'post', 'post', 'post', '', 'comment', 1, 0, 2, ''), 
(49, 'like', 'like', 'Like', '', 'comment', 1, 0, 3, ''), 
(50, 'delete', 'delete', 'Delete', '', 'comment', 1, 0, 4, ''), 
(51, 'main', 'main', 'Main', '', 'page', 1, 0, 1, ''), 
(52, 'sitemap', 'sitemap', 'Sitemap', '', 'page', 0, 0, 0, ''), 
(53, 'rss', 'rss', 'Rss', '', 'page', 0, 0, 0, ''), 
(54, 'main', 'main', 'Main', '', 'siteterms', 1, 0, 1, ''), 
(55, 'rss', 'rss', 'Rss', '', 'siteterms', 1, 0, 2, ''), 
(56, 'sitemap', 'sitemap', 'Sitemap', '', 'siteterms', 0, 0, 0, ''), 
(57, 'main', 'main', 'Main', '', 'two-step-verification', 1, 0, 1, ''), 
(58, 'confirm', 'confirm', 'Confirm', '', 'two-step-verification', 1, 0, 2, ''), 
(59, 'setup', 'setup', 'Setup', '', 'two-step-verification', 1, 0, 3, ''), 
(60, 'main', 'main', 'Main', '', 'contact', 1, 0, 1, ''), 
(61, 'main', 'main', 'Main', '', 'voting', 1, 0, 1, ''), 
(62, 'main', 'main', 'Main', '', 'seek', 1, 0, 1, ''), 
(63, 'main', 'main', 'Main', '', 'feeds', 1, 0, 1, ''), 
(64, 'insertqa', 'insertqa', 'Insertqa', '', 'faq', 1, 0, 2, ''), 
(65, 'list', 'list', 'List', '', 'faq', 1, 0, 3, ''), 
(66, 'main', 'main', 'Main', '', 'faq', 1, 0, 1, ''), 
(67, 'rss', 'rss', 'Rss', '', 'faq', 0, 0, 0, ''), 
(68, 'sitemap', 'sitemap', 'Sitemap', '', 'faq', 0, 0, 0, ''), 
(69, 'area', 'area', 'Area', '', 'laws', 1, 1, 4, ''), 
(70, 'cat', 'cat', 'Cat', '', 'laws', 1, 1, 5, ''), 
(71, 'detail', 'detail', 'Detail', '', 'laws', 1, 1, 2, ''), 
(72, 'main', 'main', 'Main', '', 'laws', 1, 1, 1, ''), 
(73, 'rss', 'rss', 'Rss', '', 'laws', 0, 0, 0, ''), 
(74, 'search', 'search', 'Search', '', 'laws', 1, 1, 3, ''), 
(75, 'signer', 'signer', 'Signer', '', 'laws', 1, 1, 7, ''), 
(76, 'sitemap', 'sitemap', 'Sitemap', '', 'laws', 0, 0, 0, ''), 
(77, 'subject', 'subject', 'Subject', '', 'laws', 1, 1, 6, ''), 
(78, 'detail', 'detail', 'Detail', '', 'videoclips', 1, 0, 3, ''), 
(79, 'main', 'main', 'Main', '', 'videoclips', 1, 1, 1, ''), 
(80, 'rss', 'rss', 'Rss', '', 'videoclips', 0, 0, 0, ''), 
(81, 'sitemap', 'sitemap', 'Sitemap', '', 'videoclips', 0, 0, 0, ''), 
(82, 'topic', 'topic', 'Topic', '', 'videoclips', 1, 0, 2, ''), 
(83, 'action', 'action', 'Action', '', 'nvtools', 1, 1, 5, ''), 
(84, 'addfun', 'addfun', 'Addfun', '', 'nvtools', 1, 1, 4, ''), 
(85, 'block', 'block', 'Block', '', 'nvtools', 1, 1, 7, ''), 
(86, 'checktable', 'checktable', 'Checktable', '', 'nvtools', 0, 0, 0, ''), 
(87, 'compiler', 'compiler', 'Compiler', '', 'nvtools', 1, 1, 10, ''), 
(88, 'copylang', 'copylang', 'Copylang', '', 'nvtools', 1, 1, 11, ''), 
(89, 'data', 'data', 'Data', '', 'nvtools', 1, 1, 3, ''), 
(90, 'export_excel', 'export_excel', 'Export_excel', '', 'nvtools', 1, 1, 6, ''), 
(91, 'js', 'js', 'Js', '', 'nvtools', 0, 0, 0, ''), 
(92, 'main', 'main', 'Main', '', 'nvtools', 1, 1, 1, ''), 
(93, 'theme', 'theme', 'Theme', '', 'nvtools', 1, 1, 2, ''), 
(94, 'themecopy', 'themecopy', 'Themecopy', '', 'nvtools', 1, 1, 8, ''), 
(95, 'thememodulecp', 'thememodulecp', 'Thememodulecp', '', 'nvtools', 1, 1, 9, ''), 
(96, 'area', 'area', 'Area', '', 'lay-y-kien-nguoi-dan', 1, 1, 4, ''), 
(97, 'cat', 'cat', 'Cat', '', 'lay-y-kien-nguoi-dan', 1, 1, 5, ''), 
(98, 'detail', 'detail', 'Detail', '', 'lay-y-kien-nguoi-dan', 1, 1, 2, ''), 
(99, 'main', 'main', 'Main', '', 'lay-y-kien-nguoi-dan', 1, 1, 1, ''), 
(100, 'rss', 'rss', 'Rss', '', 'lay-y-kien-nguoi-dan', 0, 0, 0, ''), 
(101, 'search', 'search', 'Search', '', 'lay-y-kien-nguoi-dan', 1, 1, 3, ''), 
(102, 'signer', 'signer', 'Signer', '', 'lay-y-kien-nguoi-dan', 1, 1, 7, ''), 
(103, 'sitemap', 'sitemap', 'Sitemap', '', 'lay-y-kien-nguoi-dan', 0, 0, 0, ''), 
(104, 'subject', 'subject', 'Subject', '', 'lay-y-kien-nguoi-dan', 1, 1, 6, '');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_modthemes`
--

DROP TABLE IF EXISTS `nv4_vi_modthemes`;
CREATE TABLE `nv4_vi_modthemes` (
  `func_id` mediumint(8) DEFAULT NULL,
  `layout` varchar(100) DEFAULT NULL,
  `theme` varchar(100) DEFAULT NULL,
  UNIQUE KEY `func_id` (`func_id`,`layout`,`theme`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_modthemes`
--

INSERT INTO `nv4_vi_modthemes` VALUES
(0, 'left-main-right', 'default'), 
(0, 'main', 'mobile_default'), 
(0, 'main-right', 'egov'), 
(4, 'left-main-right', 'default'), 
(4, 'main', 'mobile_default'), 
(4, 'main-right', 'egov'), 
(5, 'left-main-right', 'default'), 
(5, 'main', 'mobile_default'), 
(5, 'main-right', 'egov'), 
(6, 'left-main-right', 'default'), 
(6, 'main', 'mobile_default'), 
(6, 'main-right', 'egov'), 
(7, 'left-main-right', 'default'), 
(7, 'main', 'mobile_default'), 
(7, 'main-right', 'egov'), 
(8, 'left-main-right', 'default'), 
(8, 'main', 'mobile_default'), 
(8, 'main-right', 'egov'), 
(9, 'left-main-right', 'default'), 
(9, 'main', 'mobile_default'), 
(9, 'main-right', 'egov'), 
(10, 'left-main-right', 'default'), 
(10, 'main-right', 'egov'), 
(11, 'left-main-right', 'default'), 
(11, 'main', 'mobile_default'), 
(11, 'main-right', 'egov'), 
(12, 'left-main-right', 'default'), 
(12, 'main', 'mobile_default'), 
(12, 'main-right', 'egov'), 
(19, 'left-main-right', 'default'), 
(19, 'main', 'mobile_default'), 
(19, 'main-right', 'egov'), 
(20, 'left-main-right', 'default'), 
(20, 'main', 'mobile_default'), 
(20, 'main-right', 'egov'), 
(21, 'left-main-right', 'default'), 
(21, 'main', 'mobile_default'), 
(21, 'main-right', 'egov'), 
(22, 'left-main-right', 'default'), 
(22, 'main', 'mobile_default'), 
(22, 'main-right', 'egov'), 
(23, 'left-main-right', 'default'), 
(23, 'main', 'mobile_default'), 
(23, 'main-right', 'egov'), 
(24, 'left-main-right', 'default'), 
(24, 'main', 'mobile_default'), 
(24, 'main-right', 'egov'), 
(25, 'left-main', 'default'), 
(25, 'main', 'mobile_default'), 
(25, 'main-right', 'egov'), 
(26, 'left-main-right', 'default'), 
(26, 'main', 'mobile_default'), 
(26, 'main-right', 'egov'), 
(27, 'left-main-right', 'default'), 
(27, 'main-right', 'egov'), 
(28, 'left-main-right', 'default'), 
(28, 'main', 'mobile_default'), 
(28, 'main-right', 'egov'), 
(29, 'left-main', 'default'), 
(29, 'main', 'mobile_default'), 
(29, 'main-right', 'egov'), 
(31, 'left-main', 'default'), 
(31, 'main', 'mobile_default'), 
(31, 'main-right', 'egov'), 
(32, 'left-main', 'default'), 
(32, 'main', 'mobile_default'), 
(32, 'main-right', 'egov'), 
(33, 'left-main', 'default'), 
(33, 'main', 'mobile_default'), 
(33, 'main-right', 'egov'), 
(34, 'left-main', 'default'), 
(34, 'main', 'mobile_default'), 
(34, 'main-right', 'egov'), 
(35, 'left-main', 'default'), 
(35, 'main', 'mobile_default'), 
(35, 'main-right', 'egov'), 
(36, 'left-main', 'default'), 
(36, 'main', 'mobile_default'), 
(36, 'main-right', 'egov'), 
(37, 'left-main', 'default'), 
(37, 'main', 'mobile_default'), 
(37, 'main-right', 'egov'), 
(38, 'left-main-right', 'default'), 
(38, 'main', 'mobile_default'), 
(38, 'main-right', 'egov'), 
(39, 'left-main-right', 'default'), 
(39, 'main', 'mobile_default'), 
(39, 'main-right', 'egov'), 
(40, 'left-main-right', 'default'), 
(40, 'main', 'mobile_default'), 
(40, 'main-right', 'egov'), 
(41, 'left-main-right', 'default'), 
(41, 'main', 'mobile_default'), 
(41, 'main-right', 'egov'), 
(47, 'left-main-right', 'default'), 
(47, 'main', 'mobile_default'), 
(47, 'main-right', 'egov'), 
(48, 'left-main-right', 'default'), 
(48, 'main', 'mobile_default'), 
(48, 'main-right', 'egov'), 
(49, 'left-main-right', 'default'), 
(49, 'main', 'mobile_default'), 
(49, 'main-right', 'egov'), 
(50, 'left-main-right', 'default'), 
(50, 'main', 'mobile_default'), 
(50, 'main-right', 'egov'), 
(51, 'left-main', 'default'), 
(51, 'main', 'mobile_default'), 
(51, 'main-right', 'egov'), 
(54, 'left-main-right', 'default'), 
(54, 'main', 'mobile_default'), 
(54, 'main-right', 'egov'), 
(55, 'left-main-right', 'default'), 
(55, 'main', 'mobile_default'), 
(55, 'main-right', 'egov'), 
(57, 'left-main-right', 'default'), 
(57, 'main', 'mobile_default'), 
(57, 'main-right', 'egov'), 
(58, 'left-main-right', 'default'), 
(58, 'main', 'mobile_default'), 
(58, 'main-right', 'egov'), 
(59, 'left-main-right', 'default'), 
(59, 'main', 'mobile_default'), 
(59, 'main-right', 'egov'), 
(60, 'left-main', 'default'), 
(60, 'main', 'mobile_default'), 
(60, 'main-right', 'egov'), 
(61, 'left-main', 'default'), 
(61, 'main', 'mobile_default'), 
(61, 'main-right', 'egov'), 
(62, 'left-main-right', 'default'), 
(62, 'main', 'mobile_default'), 
(62, 'main-right', 'egov'), 
(63, 'left-main-right', 'default'), 
(63, 'main', 'mobile_default'), 
(63, 'main-right', 'egov'), 
(64, 'left-main-right', 'default'), 
(64, 'main', 'mobile_default'), 
(64, 'main-right', 'egov'), 
(65, 'left-main-right', 'default'), 
(65, 'main', 'mobile_default'), 
(65, 'main-right', 'egov'), 
(66, 'left-main-right', 'default'), 
(66, 'main', 'mobile_default'), 
(66, 'main-right', 'egov'), 
(67, 'left-main-right', 'default'), 
(68, 'left-main-right', 'default'), 
(69, 'left-main-right', 'default'), 
(69, 'main', 'mobile_default'), 
(69, 'main-right', 'egov'), 
(70, 'left-main-right', 'default'), 
(70, 'main', 'mobile_default'), 
(70, 'main-right', 'egov'), 
(71, 'left-main-right', 'default'), 
(71, 'main', 'mobile_default'), 
(71, 'main-right', 'egov'), 
(72, 'left-main-right', 'default'), 
(72, 'main', 'mobile_default'), 
(72, 'main-right', 'egov'), 
(73, 'left-main-right', 'default'), 
(74, 'left-main-right', 'default'), 
(74, 'main', 'mobile_default'), 
(74, 'main-right', 'egov'), 
(75, 'left-main-right', 'default'), 
(75, 'main', 'mobile_default'), 
(75, 'main-right', 'egov'), 
(76, 'left-main-right', 'default'), 
(77, 'left-main-right', 'default'), 
(77, 'main', 'mobile_default'), 
(77, 'main-right', 'egov'), 
(78, 'left-main-right', 'default'), 
(78, 'main', 'mobile_default'), 
(78, 'main-right', 'egov'), 
(79, 'left-main-right', 'default'), 
(79, 'main', 'mobile_default'), 
(79, 'main-right', 'egov'), 
(80, 'left-main-right', 'default'), 
(81, 'left-main-right', 'default'), 
(82, 'left-main-right', 'default'), 
(82, 'main', 'mobile_default'), 
(82, 'main-right', 'egov'), 
(83, 'left-main-right', 'default'), 
(83, 'main', 'mobile_default'), 
(83, 'main-right', 'egov'), 
(84, 'left-main-right', 'default'), 
(84, 'main', 'mobile_default'), 
(84, 'main-right', 'egov'), 
(85, 'left-main-right', 'default'), 
(85, 'main', 'mobile_default'), 
(85, 'main-right', 'egov'), 
(86, 'left-main-right', 'default'), 
(87, 'left-main-right', 'default'), 
(87, 'main', 'mobile_default'), 
(87, 'main-right', 'egov'), 
(88, 'left-main-right', 'default'), 
(88, 'main', 'mobile_default'), 
(88, 'main-right', 'egov'), 
(89, 'left-main-right', 'default'), 
(89, 'main', 'mobile_default'), 
(89, 'main-right', 'egov'), 
(90, 'left-main-right', 'default'), 
(90, 'main', 'mobile_default'), 
(90, 'main-right', 'egov'), 
(91, 'left-main-right', 'default'), 
(92, 'left-main-right', 'default'), 
(92, 'main', 'mobile_default'), 
(92, 'main-right', 'egov'), 
(93, 'left-main-right', 'default'), 
(93, 'main', 'mobile_default'), 
(93, 'main-right', 'egov'), 
(94, 'left-main-right', 'default'), 
(94, 'main', 'mobile_default'), 
(94, 'main-right', 'egov'), 
(95, 'left-main-right', 'default'), 
(95, 'main', 'mobile_default'), 
(95, 'main-right', 'egov'), 
(96, 'left-main-right', 'default'), 
(96, 'main', 'mobile_default'), 
(96, 'main-right', 'egov'), 
(97, 'left-main-right', 'default'), 
(97, 'main', 'mobile_default'), 
(97, 'main-right', 'egov'), 
(98, 'left-main-right', 'default'), 
(98, 'main', 'mobile_default'), 
(98, 'main-right', 'egov'), 
(99, 'left-main-right', 'default'), 
(99, 'main', 'mobile_default'), 
(99, 'main-right', 'egov'), 
(100, 'main-right', 'egov'), 
(101, 'left-main-right', 'default'), 
(101, 'main', 'mobile_default'), 
(101, 'main-right', 'egov'), 
(102, 'left-main-right', 'default'), 
(102, 'main', 'mobile_default'), 
(102, 'main-right', 'egov'), 
(103, 'main-right', 'egov'), 
(104, 'left-main-right', 'default'), 
(104, 'main', 'mobile_default'), 
(104, 'main-right', 'egov');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_modules`
--

DROP TABLE IF EXISTS `nv4_vi_modules`;
CREATE TABLE `nv4_vi_modules` (
  `title` varchar(50) NOT NULL,
  `module_file` varchar(50) NOT NULL DEFAULT '',
  `module_data` varchar(50) NOT NULL DEFAULT '',
  `module_upload` varchar(50) NOT NULL DEFAULT '',
  `module_theme` varchar(50) NOT NULL DEFAULT '',
  `custom_title` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL DEFAULT '',
  `admin_title` varchar(255) NOT NULL DEFAULT '',
  `set_time` int(11) unsigned NOT NULL DEFAULT '0',
  `main_file` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `admin_file` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `theme` varchar(100) DEFAULT '',
  `mobile` varchar(100) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `keywords` text,
  `groups_view` varchar(255) NOT NULL,
  `weight` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `act` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `admins` varchar(255) DEFAULT '',
  `rss` tinyint(4) NOT NULL DEFAULT '1',
  `sitemap` tinyint(4) NOT NULL DEFAULT '1',
  `gid` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_modules`
--

INSERT INTO `nv4_vi_modules` VALUES
('news', 'news', 'news', 'news', 'news', 'Tin Tức', '', '', 1498555144, 1, 1, '', '', '', '', '6', 1, 1, '', 1, 1, 0), 
('users', 'users', 'users', 'users', 'users', 'Thành viên', '', 'Tài khoản', 1498555144, 1, 1, '', '', '', '', '6', 5, 1, '', 0, 1, 0), 
('contact', 'contact', 'contact', 'contact', 'contact', 'Liên hệ', '', '', 1498555144, 1, 1, '', '', '', '', '6', 6, 1, '', 0, 1, 0), 
('statistics', 'statistics', 'statistics', 'statistics', 'statistics', 'Thống kê', '', '', 1498555144, 1, 1, '', '', '', 'online, statistics', '6', 7, 1, '', 0, 1, 0), 
('voting', 'voting', 'voting', 'voting', 'voting', 'Thăm dò ý kiến', '', '', 1498555144, 1, 1, '', '', '', '', '6', 8, 1, '', 1, 1, 0), 
('banners', 'banners', 'banners', 'banners', 'banners', 'Quảng cáo', '', '', 1498555144, 1, 1, '', '', '', '', '6', 9, 1, '', 0, 1, 0), 
('seek', 'seek', 'seek', 'seek', 'seek', 'Tìm kiếm', '', '', 1498555144, 1, 0, '', '', '', '', '6', 10, 1, '', 0, 1, 0), 
('menu', 'menu', 'menu', 'menu', 'menu', 'Menu Site', '', '', 1498555144, 0, 1, '', '', '', '', '6', 11, 1, '', 0, 1, 0), 
('feeds', 'feeds', 'feeds', 'feeds', 'feeds', 'RSS-feeds', '', 'RSS-feeds', 1498555144, 1, 1, '', '', '', '', '6', 12, 1, '', 0, 1, 0), 
('page', 'page', 'page', 'page', 'page', 'Page', '', '', 1498555144, 1, 1, '', '', '', '', '6', 13, 1, '', 1, 1, 0), 
('comment', 'comment', 'comment', 'comment', 'comment', 'Bình luận', '', 'Quản lý bình luận', 1498555144, 0, 1, '', '', '', '', '6', 14, 1, '', 0, 1, 0), 
('siteterms', 'page', 'siteterms', 'siteterms', 'page', 'Điều khoản sử dụng', '', '', 1498555144, 1, 1, '', '', '', '', '6', 15, 1, '', 1, 1, 0), 
('two-step-verification', 'two-step-verification', 'two_step_verification', 'two_step_verification', 'two-step-verification', 'Xác thực hai bước', '', '', 1498555144, 1, 0, '', '', '', '', '6', 16, 1, '', 0, 1, 0), 
('faq', 'faq', 'faq', 'faq', 'faq', 'Hỏi đáp', '', '', 1498555557, 1, 1, '', '', '', '', '6', 4, 1, '', 1, 1, 0), 
('laws', 'laws', 'laws', 'laws', 'laws', 'Văn bản', '', '', 1498555574, 1, 1, '', '', '', '', '6', 2, 1, '', 1, 1, 0), 
('videoclips', 'videoclips', 'videoclips', 'videoclips', 'videoclips', 'Videoclips', '', '', 1498555586, 1, 1, '', '', '', '', '6', 3, 1, '', 1, 1, 0), 
('nvtools', 'nvtools', 'nvtools', 'nvtools', 'nvtools', 'nvtools', '', '', 1498555596, 1, 0, '', '', '', '', '6', 17, 2, '', 0, 0, 0), 
('lay-y-kien-nguoi-dan', 'laws', 'lay_y_kien_nguoi_dan', 'lay-y-kien-nguoi-dan', 'laws', 'Lấy ý kiến người dân', '', '', 1498701488, 1, 1, '', '', '', '', '6', 18, 1, '', 1, 1, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_14`
--

DROP TABLE IF EXISTS `nv4_vi_news_14`;
CREATE TABLE `nv4_vi_news_14` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `edittime` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `publtime` int(11) unsigned NOT NULL DEFAULT '0',
  `exptime` int(11) unsigned NOT NULL DEFAULT '0',
  `archive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT '0',
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `total_rating` int(11) NOT NULL DEFAULT '0',
  `click_rating` int(11) NOT NULL DEFAULT '0',
  `instant_active` tinyint(1) NOT NULL DEFAULT '0',
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM  AUTO_INCREMENT=36  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_14`
--

INSERT INTO `nv4_vi_news_14` VALUES
(22, 14, '14', 0, 1, 'Đức Tuân', 5, 1498616564, 1498698116, 1, 1498616220, 0, 2, 'Thủ tướng hoan nghênh định hướng hợp tác giữa Hà Nội và Vientiane, Lào', 'thu-tuong-hoan-nghenh-dinh-huong-hop-tac-giua-ha-noi-va-vientiane-lao', 'Chiều 27/3, tại Trụ sở Chính phủ, Thủ tướng Nguyễn Xuân Phúc đã tiếp Ủy viên Bộ Chính trị Đảng Nhân dân cách mạng Lào, Bí thư Thành ủy, Đô trưởng Thủ đô Vientiane Sinlavong Khoutphaythoune.', '2017_06/nqh_1356.jpg', 'NQH 1356', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(23, 14, '14', 0, 1, 'BP', 5, 1498616847, 1498698123, 1, 1498616580, 0, 2, 'Tăng 30 chuyến tàu phục vụ đợt cao điểm nghỉ lễ', 'tang-30-chuyen-tau-phuc-vu-dot-cao-diem-nghi-le', 'Nhằm đáp ứng nhu cầu đi lại của người dân trong dịp nghỉ lễ Giỗ Tổ Hùng Vương và dịp lễ 30/4, 1/5, ngành đường sắt dự kiến sẽ tăng thêm hơn 30 chuyến tàu từ Bắc vào Nam để phục vụ đợt cao điểm này', '2017_06/ch-mc.jpg', 'chỉ mục', 1, 1, '4', 1, 0, 4, 0, 0, 0, 0, '', 0), 
(33, 14, '14', 0, 1, '', 5, 1498619763, 1498699951, 1, 1498619700, 0, 2, 'Bảo tồn Hoàng thành Thăng Long&#x3A; Không làm nhỏ lẻ', 'bao-ton-hoang-thanh-thang-long-khong-lam-nho-le', 'Chủ tịch UBND TP. Hà Nội khẳng định Hà Nội đã chuẩn bị sẵn nguồn vốn cho dự án quan trọng này, phấn đấu đến năm 2020, Hoàng thành Thăng Long cơ bản được đầu tư bảo tồn.', '2017_06/hoang-thanh-thang-long-2.jpg', '', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(35, 14, '14', 0, 1, '', 5, 1498619875, 1498699968, 1, 1498619820, 0, 2, 'Hơn 7.600 tỷ đồng đầu tư thiết bị dự án đường sắt Nhổn-Ga Hà Nội', 'hon-7-600-ty-dong-dau-tu-thiet-bi-du-an-duong-sat-nhon-ga-ha-noi', 'Dự án đường sắt Nhổn-Ga Hà Nội sẽ có 10 đoàn tàu, mỗi đoàn 4 toa với sức chứa khoảng 900 khách, tốc độ tối đa là 80 km/h.', '', '', 0, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(34, 14, '14', 0, 1, 'Thanh Hằng', 5, 1498619831, 1498699956, 1, 1498619760, 0, 2, 'Xử nghiêm vụ lạm quyền tại quản lý thị trường Hà Nội', 'xu-nghiem-vu-lam-quyen-tai-quan-ly-thi-truong-ha-noi', 'Thủ tướng Chính phủ Nguyễn Xuân Phúc vừa yêu cầu xử lý nghiêm các đơn vị, cá nhân có sai phạm trong vụ việc kiểm tra sản phẩm xúc xích nhãn hiệu Viet Foods.', '', '', 0, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_15`
--

DROP TABLE IF EXISTS `nv4_vi_news_15`;
CREATE TABLE `nv4_vi_news_15` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `edittime` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `publtime` int(11) unsigned NOT NULL DEFAULT '0',
  `exptime` int(11) unsigned NOT NULL DEFAULT '0',
  `archive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT '0',
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `total_rating` int(11) NOT NULL DEFAULT '0',
  `click_rating` int(11) NOT NULL DEFAULT '0',
  `instant_active` tinyint(1) NOT NULL DEFAULT '0',
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM  AUTO_INCREMENT=33  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_15`
--

INSERT INTO `nv4_vi_news_15` VALUES
(29, 15, '15', 0, 1, 'Phương Nhi', 5, 1498618201, 1498699905, 1, 1498617780, 0, 2, 'Điều chỉnh Quy hoạch cấp nước Hà Nội', 'dieu-chinh-quy-hoach-cap-nuoc-ha-noi', 'Phó Thủ tướng Trịnh Đình Dũng đồng ý về nguyên tắc chủ trương điều chỉnh Quy hoạch cấp nước Hà Nội đến năm 2030, tầm nhìn đến năm 2050.', '2017_06/resize-of-capnuoc.jpg', 'Resize of capnuoc', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(28, 15, '15', 0, 1, 'Phương Nhi', 5, 1498617803, 1498699791, 1, 1498617720, 0, 2, 'Sớm đưa hai tuyến đường sắt đô thị vào hoạt động', 'som-dua-hai-tuyen-duong-sat-do-thi-vao-hoat-dong', 'Phó Thủ tướng Trịnh Đình Dũng yêu cầu các Bộ, cơ quan, đơn vị khẩn trương bảo đảm chất lượng, an toàn và tiến độ triển khai dự án, sớm đưa hai tuyến đường sắt đô thị Cát Linh - Hà Đông và Nhổn - ga Hà Nội vào hoạt động, góp phần giảm ùn tắc giao thông trên địa bàn Thành phố.', '2017_06/resize-of-61.jpg', 'Resize of 61', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(27, 15, '15', 0, 1, 'Phan Trang', 5, 1498617732, 1498699785, 1, 1498617660, 0, 2, 'Loại bỏ xe máy cũ nát&#x3A; Cần thiết nhưng phải có lộ trình', 'loai-bo-xe-may-cu-nat-can-thiet-nhung-phai-co-lo-trinh', 'Thực tế, việc thu hồi xe máy cũ, nát đã được các bộ, ngành, đặc biệt là Bộ GTVT xúc tiến với &quot;Đề án kiểm soát khí thải xe gắn máy&quot; từ khá lâu nhưng đến nay vẫn chưa thể thành hiện thực do chưa thống nhất được phương án, lộ trình triển khai cụ thể', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(24, 15, '15', 0, 1, '', 5, 1498617454, 1498698130, 1, 1498617420, 0, 2, 'Thông tin chỉ đạo, điều hành của Chính phủ, Thủ tướng Chính phủ', 'thong-tin-chi-dao-dieu-hanh-cua-chinh-phu-thu-tuong-chinh-phu', 'Thông cáo báo chí của VPCP về thông tin chỉ đạo, điều hành của Chính phủ, Thủ tướng Chính phủ ngày 27/2/2017', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(30, 15, '15', 0, 1, 'Phan Trang', 5, 1498619405, 1498699911, 1, 1498619340, 0, 2, 'Giao thông Thủ đô&#x3A; Kết nối tốt sẽ tạo ra động lực mới', 'giao-thong-thu-do-ket-noi-tot-se-tao-ra-dong-luc-moi', 'Cần chú ý kết nối giao thông đô thị trung tâm Hà Nội với các đô thị vệ tinh. Kết nối tốt sẽ tạo ra động lực mới, khu vực nào chưa phát triển thì cần giao thông kết nối để hấp dẫn nhà đầu tư hơn và giảm áp lực cho nội đô', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(32, 15, '15', 0, 1, '', 5, 1498619689, 1498699932, 1, 1498619640, 0, 2, 'Hà Nội sẽ đầu tư nhiều bệnh viện ngang tầm quốc tế', 'ha-noi-se-dau-tu-nhieu-benh-vien-ngang-tam-quoc-te', 'Hà Nội sẽ đầu tư nguồn ngân sách lớn để phát triển ngành y tế. Đến năm 2019 sẽ đưa Bệnh viện (BV) Saint Paul đạt tiêu chuẩn quốc tế.', '2017_06/1_92972.jpg', '', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_16`
--

DROP TABLE IF EXISTS `nv4_vi_news_16`;
CREATE TABLE `nv4_vi_news_16` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `edittime` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `publtime` int(11) unsigned NOT NULL DEFAULT '0',
  `exptime` int(11) unsigned NOT NULL DEFAULT '0',
  `archive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT '0',
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `total_rating` int(11) NOT NULL DEFAULT '0',
  `click_rating` int(11) NOT NULL DEFAULT '0',
  `instant_active` tinyint(1) NOT NULL DEFAULT '0',
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM  AUTO_INCREMENT=32  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_16`
--

INSERT INTO `nv4_vi_news_16` VALUES
(19, 16, '16', 0, 1, 'Minh Hiển', 5, 1498615731, 1498698100, 1, 1498615620, 0, 2, 'Phó Thủ tướng chỉ đạo xử lý vụ &quot;biến đất công thành tư&#039;', 'pho-thu-tuong-chi-dao-xu-ly-vu-bien-dat-cong-thanh-tu', 'Phó Thủ tướng Thường trực Trương Hòa Bình vừa có ý kiến chỉ đạo về việc xử lý vi phạm trong lĩnh vực đất đai tại xã Tiên Dương, huyện Đông Anh, thành phố Hà Nội theo nội dung phản ánh của báo Thanh tra số 53 ra ngày 1/7/2016 với bài &quot;Biến đất công thành tư, Chủ tịch huyện thoát tội&quot;.', '2017_06/resize-of-dat.jpg', 'Resize of dat', 1, 1, '4', 1, 0, 4, 0, 0, 0, 0, '', 0), 
(26, 16, '16', 0, 1, '', 5, 1498617678, 1498698139, 1, 1498617600, 0, 2, 'Hà Nội&#x3A; Thiết kế của ga S9 bảo đảm an toàn cho cộng đồng', 'ha-noi-thiet-ke-cua-ga-s9-bao-dam-an-toan-cho-cong-dong', 'Thực hiện chỉ đạo của UBND TP. Hà Nội, Sở Quy hoạch – Kiến trúc đã có thông tin phản hồi kiến nghị của ông Trần Dũng Sơn về bất hợp lý trong thiết kế hệ thống thông gió Nhà ga ngầm S9 thuộc Dự án Đường sắt đô thị Nhổn – ga Hà Nội đoạn qua phường Ngọc Khánh, quận Ba Đình.', '', '', 0, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(31, 16, '16', 0, 1, 'Xuân Tuyến', 5, 1498619568, 1498699926, 1, 1498619400, 0, 2, 'Rà soát, thực hiện nghiêm quy hoạch để có một Hà Nội đẹp hơn', 'ra-soat-thuc-hien-nghiem-quy-hoach-de-co-mot-ha-noi-dep-hon', 'Kết luận cuộc làm việc với lãnh đạo các Bộ, ngành và UBND TP. Hà Nội về quy hoạch phát triển kết cấu hạ tầng kinh tế kỹ thuật của Thủ đô, Phó Thủ tướng Trịnh Đình Dũng yêu cầu Hà Nội, các Bộ, ngành cần rà soát lại quy hoạch để điều chỉnh, hoàn thiện, đồng thời nghiêm túc thực hiện theo quy hoạch để có một Thủ đô giàu đẹp, văn minh.', '2017_06/5j3a0202.jpg', '5J3A0202', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(25, 16, '16', 0, 1, '', 5, 1498617632, 1498699774, 1, 1498617600, 0, 2, 'Hà Nội&#x3A; Xây bãi xe ngầm 5 tầng tại một số công viên', 'ha-noi-xay-bai-xe-ngam-5-tang-tai-mot-so-cong-vien', 'Lãnh đạo Thành phố Hà Nội thống nhất quy mô dự án bãi đỗ xe ngầm tại công viên Thống Nhất, công viên Nhân Chính cùng với quy mô 5 tầng gồm một tầng thương mại và 4 tầng để xe.', '', '', 0, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_17`
--

DROP TABLE IF EXISTS `nv4_vi_news_17`;
CREATE TABLE `nv4_vi_news_17` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `edittime` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `publtime` int(11) unsigned NOT NULL DEFAULT '0',
  `exptime` int(11) unsigned NOT NULL DEFAULT '0',
  `archive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT '0',
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `total_rating` int(11) NOT NULL DEFAULT '0',
  `click_rating` int(11) NOT NULL DEFAULT '0',
  `instant_active` tinyint(1) NOT NULL DEFAULT '0',
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM  AUTO_INCREMENT=42  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_17`
--

INSERT INTO `nv4_vi_news_17` VALUES
(20, 17, '17', 0, 1, 'Bích Phương', 5, 1498616118, 1498698104, 1, 1498616040, 0, 2, 'Tiết kiệm điện nhờ pin năng lượng mặt trời', 'tiet-kiem-dien-nho-pin-nang-luong-mat-troi', 'Kết quả sau thời gian thử nghiệm lắp đặt hệ thống pin mặt trời cho Trung tâm sửa chữa điện nóng Yên Nghĩa (thuộc Công ty Lưới điện cao thế Hà Nội) cho thấy lượng điện năng tiết kiệm được đáng kể, khoảng hơn 2.000 kWh/tháng', '2017_06/nlmt.jpg', '', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(40, 17, '17', 0, 1, 'Nguyễn Hoàng', 5, 1498643260, 1498709455, 1, 1498643160, 0, 2, 'Tạo cơ chế tài chính mới góp phần thúc đẩy phát triển Thủ đô', 'tao-co-che-tai-chinh-moi-gop-phan-thuc-day-phat-trien-thu-do', 'Chiều 20/12, Ủy ban Thường vụ Quốc hội (UBTVQH) đã xem xét, cho ý kiến về dự thảo Nghị định của Chính phủ quy định về một số cơ chế, chính sách tài chính-ngân sách đặc thù đối với Hà Nội.', '2017_06/110246baoxaydung_t4_2.jpg', '', 1, 1, '4', 1, 0, 4, 0, 0, 0, 0, '', 0), 
(41, 17, '17', 0, 1, 'PV', 5, 1498643588, 1498698095, 1, 1482217320, 0, 2, 'Hà Nội quy hoạch công viên cây xanh kết hợp đô thị ven sông Hồng', 'ha-noi-quy-hoach-cong-vien-cay-xanh-ket-hop-do-thi-ven-song-hong', 'Thực hiện ý kiến chỉ đạo của UBND TP. Hà Nội về việc lập quy hoạch hai bên sông Hồng theo định hướng xây dựng công viên kết hợp với đô thị, Sở Quy hoạch-Kiến trúc Hà Nội sẽ thực hiện theo hướng mời tư vấn quốc tế nghiên cứu quy hoạch hai bên sông Hồng.', '2017_06/thanhphovensonghong-f53ef-copy.jpg', 'thanhphovensonghong f53ef Copy', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(38, 17, '17', 0, 1, '', 5, 1498642911, 1498699993, 1, 1498642860, 0, 2, 'Hà Nội&#x3A; Kiểm tra phản ánh về bất cập của thiết kế nhà ga ngầm', 'ha-noi-kiem-tra-phan-anh-ve-bat-cap-cua-thiet-ke-nha-ga-ngam', 'Qua Cổng TTĐT Chính phủ, ông Trần Dũng Sơn (TP. Hà Nội) phản ánh bất hợp lý trong thiết kế Nhà ga ngầm S9 thuộc Dự án Đường sắt đô thị Nhổn – ga Hà Nội đoạn qua phường Ngọc Khánh, quận Ba Đình và đề nghị cơ quan có thẩm quyền xem xét điều chỉnh.', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(21, 17, '17', 0, 1, '', 5, 1498616238, 1498698109, 1, 1498616160, 0, 2, 'Quy hoạch sông Hồng&#x3A; Hà Nội đề nghị đính chính', 'quy-hoach-song-hong-ha-noi-de-nghi-dinh-chinh', 'Chánh văn phòng kiêm Người phát ngôn của UBND thành phố Hà Nội đề nghị các cơ quan báo chí đính chính thông tin; đăng tải bài viết trên cơ sở được kiểm chứng từ người có trách nhiệm phát ngôn của UBND Thành phố Hà Nội, tránh việc giật tít để dư luận hiểu sai, làm ảnh hưởng đến tình hình an ninh chính trị của thành phố Hà Nội nói riêng và cả nước nói chung.', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(39, 17, '17', 0, 1, 'Minh Hiển', 5, 1498643148, 1498699996, 1, 1498643100, 0, 2, 'Hà Nội phải bố trí đủ quỹ đất xây dựng nhà ở xã hội', 'ha-noi-phai-bo-tri-du-quy-dat-xay-dung-nha-o-xa-hoi', 'Phó Thủ tướng Trịnh Đình Dũng vừa có ý kiến chỉ đạo về chủ trương nộp bằng tiền theo giá đất đối với quỹ nhà ở xã hội thuộc Dự án khu đô thị mới Tây Mỗ - Đại Mỗ tại các phường Tây Mỗ, Đại Mỗ, quận Nam Từ Liêm, Hà Nội và Dự án khu chức năng đô thị tại 233 - 233B - 235 Nguyễn Trãi, quận Thanh Xuân, Hà Nội.', '2017_06/resize-of-bat-dong-san-ha-noi.jpg', 'Resize of bat dong san ha noi', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(37, 17, '17', 0, 1, 'PV', 5, 1498642855, 1498699975, 1, 1498642800, 0, 2, 'Hà Nội triển khai các giải pháp cấp bách bảo vệ môi trường', 'ha-noi-trien-khai-cac-giai-phap-cap-bach-bao-ve-moi-truong', 'Với mục tiêu tạo chuyển biến căn bản trong công tác bảo vệ môi trường đến năm 2020, UBND TP. Hà Nội đã đưa ra những nhiệm vụ và giải pháp cấp bách.', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_admins`
--

DROP TABLE IF EXISTS `nv4_vi_news_admins`;
CREATE TABLE `nv4_vi_news_admins` (
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catid` smallint(5) NOT NULL DEFAULT '0',
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `add_content` tinyint(4) NOT NULL DEFAULT '0',
  `pub_content` tinyint(4) NOT NULL DEFAULT '0',
  `edit_content` tinyint(4) NOT NULL DEFAULT '0',
  `del_content` tinyint(4) NOT NULL DEFAULT '0',
  `app_content` tinyint(4) NOT NULL DEFAULT '0',
  UNIQUE KEY `userid` (`userid`,`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_block`
--

DROP TABLE IF EXISTS `nv4_vi_news_block`;
CREATE TABLE `nv4_vi_news_block` (
  `bid` smallint(5) unsigned NOT NULL,
  `id` int(11) unsigned NOT NULL,
  `weight` int(11) unsigned NOT NULL,
  UNIQUE KEY `bid` (`bid`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_block`
--

INSERT INTO `nv4_vi_news_block` VALUES
(2, 27, 13), 
(2, 19, 21), 
(2, 20, 20), 
(2, 21, 19), 
(2, 22, 18), 
(2, 23, 17), 
(2, 24, 16), 
(2, 26, 14), 
(2, 25, 15), 
(2, 28, 12), 
(2, 29, 11), 
(2, 30, 10), 
(2, 31, 9), 
(2, 32, 8), 
(2, 33, 7), 
(1, 34, 1), 
(2, 35, 6), 
(2, 39, 3), 
(2, 37, 5), 
(2, 38, 4), 
(2, 40, 2), 
(2, 41, 1);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_block_cat`
--

DROP TABLE IF EXISTS `nv4_vi_news_block_cat`;
CREATE TABLE `nv4_vi_news_block_cat` (
  `bid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `adddefault` tinyint(4) NOT NULL DEFAULT '0',
  `numbers` smallint(5) NOT NULL DEFAULT '10',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `weight` smallint(5) NOT NULL DEFAULT '0',
  `keywords` text,
  `add_time` int(11) NOT NULL DEFAULT '0',
  `edit_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`),
  UNIQUE KEY `title` (`title`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_block_cat`
--

INSERT INTO `nv4_vi_news_block_cat` VALUES
(1, 0, 4, 'Tin tiêu điểm', 'Tin-tieu-diem', '', 'Tin tiêu điểm', 1, '', 1279945710, 1279956943), 
(2, 1, 4, 'Tin mới nhất', 'Tin-moi-nhat', '', 'Tin mới nhất', 2, '', 1279945725, 1279956445);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_cat`
--

DROP TABLE IF EXISTS `nv4_vi_news_cat`;
CREATE TABLE `nv4_vi_news_cat` (
  `catid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL,
  `titlesite` varchar(250) DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `description` text,
  `descriptionhtml` text,
  `image` varchar(255) DEFAULT '',
  `viewdescription` tinyint(2) NOT NULL DEFAULT '0',
  `weight` smallint(5) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(5) NOT NULL DEFAULT '0',
  `lev` smallint(5) NOT NULL DEFAULT '0',
  `viewcat` varchar(50) NOT NULL DEFAULT 'viewcat_page_new',
  `numsubcat` smallint(5) NOT NULL DEFAULT '0',
  `subcatid` varchar(255) DEFAULT '',
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `numlinks` tinyint(2) unsigned NOT NULL DEFAULT '3',
  `newday` tinyint(2) unsigned NOT NULL DEFAULT '2',
  `featured` int(11) NOT NULL DEFAULT '0',
  `ad_block_cat` varchar(255) NOT NULL DEFAULT '',
  `keywords` text,
  `admins` text,
  `add_time` int(11) unsigned NOT NULL DEFAULT '0',
  `edit_time` int(11) unsigned NOT NULL DEFAULT '0',
  `groups_view` varchar(255) DEFAULT '',
  PRIMARY KEY (`catid`),
  UNIQUE KEY `alias` (`alias`),
  KEY `parentid` (`parentid`)
) ENGINE=MyISAM  AUTO_INCREMENT=19  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_cat`
--

INSERT INTO `nv4_vi_news_cat` VALUES
(14, 0, 'Thông tin kinh tế', '', 'thong-tin-kinh-te', '', '', '', 0, 1, 1, 0, 'viewcat_page_new', 0, '', 0, 5, 2, 0, '', '', '', 1498615627, 1498709513, '6'), 
(15, 0, 'Chiến lược', '', 'chien-luoc', '', '', '', 0, 2, 2, 0, 'viewcat_page_new', 0, '', 0, 5, 2, 0, '', '', '', 1498615636, 1498709520, '6'), 
(16, 0, 'Quy hoạch', '', 'quy-hoach', '', '', '', 0, 3, 3, 0, 'viewcat_page_new', 0, '', 0, 5, 2, 0, '', '', '', 1498615641, 1498709530, '6'), 
(17, 0, 'Công trình - đề tài', '', 'cong-trinh-de-tai', '', '', '', 0, 4, 4, 0, 'viewcat_page_new', 0, '', 0, 5, 2, 0, '', '', '', 1498615657, 1498709538, '6');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_config_post`
--

DROP TABLE IF EXISTS `nv4_vi_news_config_post`;
CREATE TABLE `nv4_vi_news_config_post` (
  `group_id` smallint(5) NOT NULL,
  `addcontent` tinyint(4) NOT NULL,
  `postcontent` tinyint(4) NOT NULL,
  `editcontent` tinyint(4) NOT NULL,
  `delcontent` tinyint(4) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_config_post`
--

INSERT INTO `nv4_vi_news_config_post` VALUES
(1, 0, 0, 0, 0), 
(2, 0, 0, 0, 0), 
(3, 0, 0, 0, 0), 
(4, 0, 0, 0, 0), 
(7, 0, 0, 0, 0), 
(5, 0, 0, 0, 0), 
(10, 0, 0, 0, 0), 
(11, 0, 0, 0, 0), 
(12, 0, 0, 0, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_detail`
--

DROP TABLE IF EXISTS `nv4_vi_news_detail`;
CREATE TABLE `nv4_vi_news_detail` (
  `id` int(11) unsigned NOT NULL,
  `titlesite` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `bodyhtml` longtext NOT NULL,
  `sourcetext` varchar(255) DEFAULT '',
  `imgposition` tinyint(1) NOT NULL DEFAULT '1',
  `copyright` tinyint(1) NOT NULL DEFAULT '0',
  `allowed_send` tinyint(1) NOT NULL DEFAULT '0',
  `allowed_print` tinyint(1) NOT NULL DEFAULT '0',
  `allowed_save` tinyint(1) NOT NULL DEFAULT '0',
  `gid` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_detail`
--

INSERT INTO `nv4_vi_news_detail` VALUES
(41, '', '', 'Để thực hiện được quy hoạch, Sở Quy hoạch-Kiến trúc sẽ tham mưu, đề xuất UBND TP. Hà Nội ban hành quyết định thành lập Ban chỉ đạo tổ chức lập quy hoạch dọc hai bên sông Hồng.&nbsp;<br  /><br  />Đồng thời, phối hợp với Viện Quy hoạch xây dựng Hà Nội chủ trì, phối hợp với các đơn vị tư vấn nước ngoài có năng lực, kinh nghiệm, đã nghiên cứu lập quy hoạch đô thị hai bên bờ sông để thực hiện đồ án quy hoạch, trình thẩm định, phê duyệt theo quy định.&nbsp;<br  /><br  />Sở cũng cho biết, phương án lựa chọn phải có tính khả thi cao nhất khi triển khai đầu tư xây dựng; bảo đảm hiệu quả giữa khai thác đô thị, tạo nguồn lực tài chính để đầu tư trị thủy; nghiên cứu khai thác bãi giữa, xây dựng công viên cây xanh kết hợp đô thị hai bên sông...&nbsp;<br  /><br  />Trước đó, UBND TP. Hà Nội đã phối hợp với Thủ đô Seoul của Hàn Quốc thực hiện ý tưởng quy hoạch thành phố ven sông Hồng.&nbsp;<br  /><br  />Theo ý tưởng quy hoạch, thành phố ven sông Hồng giai đoạn 1 sẽ trở thành trục không gian chính của Hà Nội với những cao ốc tài chính quốc tế, chung cư cao cấp, công viên đô thị ven bờ sông.&nbsp;<br  /><br  />Ý tưởng quy hoạch do phía Hàn Quốc đưa ra có phạm vi 4.200 ha đất và mặt nước, trải dài 40 km sông Hồng đoạn qua Hà Nội. Dự kiến, vốn đầu tư dự án trên 7 tỷ USD.', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(38, '', '', '<p>Theo phản ánh của ông Sơn, trong thiết kế Nhà ga ngầm S9, Dự án Đường sắt đô thị Nhổn – ga Hà Nội đoạn qua phường Ngọc Khánh, quận Ba Đình, hệ thống thông gió, thông hơi của Nhà ga được đặt xen kẽ trong khu dân cư. Ông Sơn cho rằng thiết kế như vậy là bất hợp lý, ảnh hưởng lớn đến sinh hoạt, sức khỏe của người dân.</p><p>Đại diện các hộ dân tổ 20 và 22 phường Ngọc Khánh, ông Sơn đề nghị cơ quan có thẩm quyền xem xét, có phương án điều chỉnh thiết kế hệ thống thông gió, thông hơi nêu trên.</p><p>Về vấn đề này, UBND TP. Hà Nội&nbsp;giao&nbsp;Sở Quy hoạch - Kiến trúc chủ trì, phối hợp với Ban quản lý Đường sắt đô thị Hà Nội và UBND quận Ba Đình làm rõ nội dung đơn thư, xem xét, giải quyết theo thẩm quyền quy định của pháp luật.</p><p><em>Cổng TTĐT Chính phủ sẽ tiếp tục thông tin về vấn đề này khi nhận được kết quả giải quyết của cơ quan chức năng.</em></p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(39, '', '', '<p>Phó Thủ tướng yêu cầu UBND thành phố Hà Nội phải quy hoạch, bố trí đủ quỹ đất tương ứng tại khu vực lân cận của Dự án khu đô thị mới Tây Mỗ - Đại Mỗ tại các phường Tây Mỗ, Đại Mỗ và khu vực lân cận thuộc quận Nam Từ Liêm và các khu vực khác trên địa bàn Thành phố để xây dựng nhà ở xã hội, tổ chức lập dự án để đầu tư hoặc huy động các nhà đầu tư thực hiện theo quy hoạch trên, đồng thời phải sử dụng khoản tiền thu được từ quỹ đất xây dựng nhà ở xã hội để đầu tư xây dựng nhà ở xã hội trên địa bàn, đáp ứng nhu cầu về nhà ở xã hội trong khu vực và trên địa bàn Thành phố.</p><p>Phó Thủ tướng đồng ý đề nghị của UBND thành phố Hà Nội và Bộ Xây dựng, Bộ Tài nguyên và Môi trường, Bộ Kế hoạch và Đầu tư về việc cho phép Nhà đầu tư được nộp bằng tiền theo giá đất đối với quỹ nhà ở xã hội tại Dự án khu đô thị mới Tây Mỗ - Đại Mỗ tại các phường Tây Mỗ, Đại Mỗ, quận Nam Từ Liêm, thành phố Hà Nội và Dự án khu chức năng đô thị tại 233 - 233B - 235 Nguyễn Trãi, quận Thanh Xuân, thành phố Hà Nội.</p><p>Việc nộp tiền sử dụng đất thực hiện theo quy định tại Nghị định số&nbsp;<a href=\"http://vanban.chinhphu.vn/portal/page/portal/chinhphu/hethongvanban?class_id=1&amp;_page=1&amp;mode=detail&amp;document_id=174348\">45/2014/NĐ-CP</a>&nbsp;ngày 15/5/2014 của Chính phủ (giá đất được xác định theo cơ chế thị trường trên cơ sở mục đích sử dụng đất của Dự án được cấp có thẩm quyền phê duyệt tại thời điểm nộp tiền theo quy định của pháp luật về đất đai).</p><p>Phó Thủ tướng giao UBND thành phố Hà Nội làm rõ về quy hoạch và bố trí quỹ đất cho các Dự án trước đây chưa bố trí 20% quỹ đất xây dựng nhà ở xã hội theo quy định của Luật Nhà ở trên địa bàn Thành phố, báo cáo Thủ tướng Chính phủ trong tháng 1/2017.</p>', 'http://baochinhphu.vn', 1, 0, 1, 1, 1, 0), 
(40, '', '', 'Tờ trình xin ý kiến về dự thảo Nghị định của Chính phủ quy định về một số cơ chế, chính sách tài chính-ngân sách đặc thù đối với Thủ đô Hà Nội của Chính phủ cho biết: Thực hiện Nghị quyết số 15-NQ/TW ngày 15/12/2000 của Bộ Chính trị khoá VIII về nhiệm vụ, phương hướng phát triển Thủ đô Hà Nội trong thời kỳ 2001-2010&nbsp;và quy định tại Điều 75 của Luật Ngân sách Nhà nước năm 2002: ‘‘Chính phủ quy định cơ chế đặc thù đối với Thủ đô Hà Nội, TPHCM, báo cáo UBTVQH cho ý kiến trước khi thực hiện và báo cáo Quốc hội tại kỳ họp gần nhất’’, Bộ Tài chính đã phối hợp với các bộ, cơ quan Trung ương và UBND TP. Hà Nội trình Chính phủ, xin ý kiến UBTVQH ban hành Nghị định số 123/2004/NĐ-CP ngày 18/5/2004 quy định về một số cơ chế tài chính-ngân sách đặc thù đối với Thủ đô Hà Nội và Nghị định số 112/2015/NĐ-CP ngày 3/11/2015 sửa đổi, bổ sung Điều 5 Nghị định số 123/2004/NĐ-CP.<p>Qua hơn 10 năm tổ chức thực hiện, dưới sự giám sát của Quốc hội, HĐND TP. Hà Nội, sự chỉ đạo sát sao của Chính phủ, sự nỗ lực của các bộ, ngành và UBND Thành phố, cơ chế tài chính-ngân sách đặc thù đối với Thủ đô Hà Nội đã đi vào cuộc sống và đạt được nhiều kết quả quan trọng, góp phần huy động mọi nguồn lực tạo bước đột phá về tăng cường đầu tư đồng bộ kết cấu hạ tầng, nhất là giao thông và hạ tầng kỹ thuật khung, làm cơ sở để đẩy nhanh tiến trình xây dựng Thủ đô văn minh, hiện đại, tạo động lực thúc đẩy tăng trưởng kinh tế, đáp ứng yêu cầu phát triển kinh tế-xã hội, ổn định chính trị, nâng cao đời sống nhân dân, bảo đảm quốc phòng, an ninh, trật tự an toàn xã hội.</p><p>Theo Tờ trình, căn cứ Nghị quyết số 11-NQ/TW ngày 6/1/2012 của Bộ Chính trị về phương hướng, nhiệm vụ phát triển Thủ đô Hà Nội giai đoạn 2011-2020: &quot;Huy động tối đa mọi nguồn lực tạo bước đột phá về tăng cường đầu tư đồng bộ kết cấu hạ tầng, nhất là giao thông và hạ tầng kỹ thuật khung làm cơ sở để đẩy nhanh tiến trình xây dựng Thủ đô văn minh, hiện đại”; trên cơ sở Luật Thủ đô và Khoản 2 Điều 74 Luật Ngân sách Nhà nước năm 2015: ‘‘Thành phố Hà Nội thực hiện một số cơ chế, chính sách tài chính-ngân sách đặc thù theo quy định của Luật Thủ đô”, để khắc phục những hạn chế và đáp ứng các yêu cầu mới đặt ra trong quá trình tiếp tục đổi mới cơ chế quản lý kinh tế, cải cách hành chính cần thiết phải ban hành Nghị định mới thay thế Nghị định 123 và Nghị định 112 một cách căn bản, toàn diện và phù hợp với Luật Ngân sách Nhà nước năm 2015 và Luật Thủ đô.</p><p>Mục tiêu xây dựng Nghị định là: Bảo đảm tuân thủ Luật Ngân sách Nhà nước năm 2015, Luật Thủ đô, phù hợp với chủ trương, chính sách của Đảng, Nhà nước và thống nhất với các luật hiện hành. Kế thừa và phát huy những mặt tích cực của Nghị định 123 và Nghị định 112; đẩy mạnh cải cách hành chính; tăng cường giám sát việc huy động, phân bổ, sử dụng vốn vay, trả nợ, quản lý rủi ro; bảo đảm an toàn nợ công; góp phần thúc đẩy kinh tế phát triển bền vững.</p><p>Các mục tiêu cụ thể là: Tăng cường quyền hạn và trách nhiệm của HĐND, UBND Thành phố trong lĩnh vực quản lý ngân sách Nhà nước.</p><p>Đáp ứng yêu cầu đổi mới cơ chế quản lý kinh tế, phù hợp với cơ chế kinh tế thị trường định hướng xã hội chủ nghĩa, có sự điều tiết của Nhà nước.</p><p>Nâng cao hiệu quả quản lý ngân sách Nhà nước, tạo động lực phát triển các nguồn lực, phân bổ ngân sách tập trung, hợp lý phục vụ mục tiêu phát triển kinh tế-xã hội Thủ đô Hà Nội, khắc phục những tồn tại của Nghị định số 123/2004/NĐ-CP và Nghị định số 112/2015/NĐ-CP.</p><p>Dự thảo Nghị định bao gồm 4 chương, với 12 điều, quy định cụ thể về phạm vi điều chỉnh; đối tượng áp dụng; quản lý ngân sách Thủ đô Hà Nội; huy động các nguồn tài chính cho đầu tư phát triển Thủ đô Hà Nội;...</p><p>Báo cáo thẩm tra của Ủy ban Tài chính-Ngân sách của Quốc hội đối với dự thảo Nghị quyết nhấn mạnh, trong quá trình thực hiện Nghị định 123, Nghị định 112 , Hà Nội đã đạt được một số kết quả trong việc thu hút nguồn lực đầu tư phát triển kinh tế-xã hội; kết cấu hạ tầng, nhiều dự án, công trình lớn đã được xây dựng...</p><p>Tuy nhiên, so với nhu cầu vốn đầu tư phát triển kinh tế-xã hội của Hà Nội giai đoạn 2016-2020 thì cơ chế đặc thù về tài chính-ngân sách hiện hành tạo nguồn lực cho Thành phố khá thấp. Mặc dù Hà Nội đã được Trung ương bổ sung và hỗ trợ khác khá cao, nhưng vẫn chưa đáp ứng được nhu cầu của Thành phố. Mặt khác, một số quy định về cơ chế tài chính cho Hà Nội trong Luật Thủ đô có hiệu lực từ năm 2013 và Luật Ngân sách Nhà nước năm 2015 có hiệu lực từ 1/1/2017 nhưng đến nay chưa được Chính phủ hướng dẫn.</p><p>Vì vậy, để hướng dẫn chi tiết quy định về cơ chế tài chính-ngân sách đặc thù cho Thủ đô Hà Nội theo quy định của hai Luật này, Ủy ban Tài chính-Ngân sách nhất trí với đề nghị của Chính phủ về sự cần thiết ban hành nghị định thay thế Nghị định 123 và Nghị định 112 đối với Hà Nội nhằm tạo cơ chế tài chính-ngân sách mới, góp phần động viên nguồn lực, bảo đảm sự phát triển của Thành phố.</p><p>Khẳng định sự cần thiết xây dựng và ban hành Nghị định, trong thảo luận tại phiên họp, các ủy viên UBTVQH đã tập trung đóng góp nhiều ý kiến đối với các vấn đề liên quan trong dự thảo Nghị định về định mức chi và bội chi ngân sách của Hà Nội; mức dư nợ; về bổ sung có mục tiêu từ tăng thu ngân sách Trung ương; công tác quản lý ngân sách Thủ đô; quy định huy động các nguồn vốn khác cho đầu tư phát triển;…</p><p>Phát biểu kết thúc thảo luận về nội dung này, Phó Chủ tịch Quốc hội Phùng Quốc Hiển nhấn mạnh, UBTVQH thống nhất đề nghị Chính phủ ban hành Nghị định của Chính phủ quy định về một số cơ chế, chính sách tài chính-ngân sách đặc thù đối với Thủ đô Hà Nội, song phải bảo đảm bám sát Điều 74 của Luật Ngân sách Nhà nước và Điều 21 của Luật Thủ đô cho đúng thẩm quyền và cần có đột phá, tạo lợi thế hơn so với các quy định trước đây.</p><p>“Tinh thần là Nghị định của Chính phủ phải ở mức độ nổi trội hơn, đột phá hơn và có lợi thế hơn cho Hà Nội. Nếu Nghị định mà ban hành ra lại thành ra khó hơn, không bảo đảm các nguồn lực cho phát triển Thành phố thì chúng ta không bảo đảm thực hiện được đúng tinh thần chỉ đạo của Bộ Chính trị trong chỉ đạo phát triển Thủ đô cũng như vùng Thủ đô”, Phó Chủ tịch Quốc hội Phùng Quốc Hiển phát biểu, đồng thời cho biết, sau phiên họp này, trên cơ sở các ý kiến phát biểu, thống nhất, UBTVQH sẽ có văn bản thông báo ý kiến gửi tới Chính phủ về dự thảo Nghị quyết.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(37, '', '', 'y cảm cần được bảo vệ. Các quy định về bảo vệ môi trường sẽ được sửa đổi, bổ sung theo hướng ngăn chặn các dự án đầu tư sử dụng công nghệ lạc hậu, loại hình sản xuất có nguy cơ gây ô nhiễm môi trường cao; hoàn thiện các cơ chế, chính sách liên quan đến sản xuất sạch hơn… Cùng với đó là đẩy mạnh thanh kiểm tra, xử lý vi phạm; tăng cường điều tra, kiểm kê nguồn thải, kiểm soát các hoạt động nhập khẩu phế liệu làm nguyên liệu sản xuất, hoạt động vận chuyển và xử lý chất thải…&nbsp;<br  /><br  />Hà Nội yêu cầu tất cả các đối tượng có quy mô xả thải lưu lượng lớn theo quy định của pháp luật phải lắp đặt các thiết bị kiểm soát, giám sát hoạt động xả thải và truyền số liệu trực tiếp về Sở Tài nguyên và Môi trường Hà Nội. Dự kiến, trong năm 2017, Trung tâm điều hành và quản lý dữ liệu môi trường sẽ hoàn thành, đưa vào vận hành để truyền số liệu quan trắc tự động trực tiếp về Sở nhằm kiểm soát, giám sát các hoạt động xả thải theo quy định của pháp luật.<br  /><br  />Bên cạnh đó, Hà Nội tập trung xử lý triệt để, di dời các cơ sở gây ô nhiễm môi trường nghiêm trọng ra khỏi khu dân cư, chuyển vào các khu công nghiệp; không để phát sinh thêm cơ sở gây ô nhiễm môi trường nghiêm trọng trên địa bàn. Thành phố xác định rõ cơ chế, chính sách, các nhiệm vụ, giải pháp cụ thể có tính khả thi cao, phù hợp với nguồn lực, khả năng thực tế.&nbsp;<br  /><br  />Theo kế hoạch, Thành phố sẽ tổ chức rà soát, điều chỉnh trình Thủ tướng Chính phủ phê duyệt lại Quy hoạch quản lý chất thải rắn Thủ đô Hà Nội đến năm 2030, tầm nhìn đến năm 2050, bảo đảm phù hợp với tình hình thực tế phát triển kinh tế-xã hội; rà soát quy mô, công suất xử lý đối với khu xử lý tập trung áp dụng công nghệ hiện đại, đảm bảo hiệu quả kinh tế. Đồng thời, giảm dần tỷ lệ rác thải chôn lấp sau xử lý xuống còn khoảng 30% (năm 2020), khoảng 10-15% (năm 2050)…&nbsp;<br  /><br  />Bảo vệ môi trường trên địa bàn Hà Nội được xác định là một trong những nhiệm vụ bức thiết, được chỉ đạo thực hiện quyết liệt. Tuy nhiên, từ thực tiễn quản lý, triển khai cho thấy, TP. Hà Nội còn thiếu tư duy quy hoạch môi trường; quản lý môi trường đô thị còn chưa đồng bộ; lực lượng và năng lực chuyên môn của cán bộ quản lý về môi trường tại nhiều đơn vị còn yếu; nhận thức, ý thức bảo vệ môi trường của cộng đồng còn hạn chế, nhất là doanh nghiệp và người dân. Vì vậy, tình trạng ô nhiễm môi trường trên địa bàn có xu hướng gia tăng, trong khi Hà Nội vẫn chưa có các quy định riêng về công cụ và chế tài xử lý các vi phạm môi trường, dù đã có Luật Thủ đô.&nbsp;<br  /><br  />Báo động về tình trạng ô nhiễm môi trường hiện nay của Hà Nội là ô nhiễm không khí (bụi và khí độc khu vực nội thành, các công trường xây dựng, khu vực làng nghề, khu công nghiệp, đốt rơm sau thu hoạch); ô nhiễm nước mặt trong các hồ đô thị, các sông và kênh thoát nước, ô nhiễm nước ngầm; ô nhiễm chất thải rắn, rác thải sinh hoạt không phân loại tại các đô thị; ô nhiễm môi trường tại các bãi rác; ô nhiễm rác thải sinh hoạt tại các khu vực dân cư nông thôn...', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(29, '', '', '<p>Phó Thủ tướng yêu cầu UBND thành phố Hà Nội cập nhật Dự án đầu tư xây dựng mở rộng nhà máy nước Bắc Thăng Long - Vân Trì và Dự án đầu tư xây dựng Trạm cấp nước Dương Nội - Hà Đông vào Đồ án điều chỉnh Quy hoạch cấp nước Hà Nội; đồng thời thực hiện việc lập, thẩm định và trình duyệt đồ án Điều chỉnh Quy hoạch cấp nước Hà Nội theo đúng quy định pháp luật về quy hoạch xây dựng, đáp ứng nhu cầu cấp nước trước mắt và lâu dài cho Thủ đô Hà Nội.</p><p>Thành phố Hà Nội phấn đấu đến năm 2020, 100% nhân dân Thủ đô được sử dụng nước sạch đạt tiêu chuẩn của Bộ Y tế; đẩy mạnh công tác đầu tư cấp nước sạch theo hình thức xã hội hóa; áp dụng công nghệ cao trong lĩnh vực đầu tư cấp nước sạch; đầu tư xây dựng hệ thống cấp nước sạch (bao gồm các nhà máy và hệ thống mạng cấp nước) đồng bộ, phù hợp với Quy hoạch chung, các Quy hoạch ngành và Quy hoạch phân khu đô thị của Thành phố.</p><p>Để thực hiện thắng lợi các mục tiêu trên, UBND thành phố đã đề xuất điều chỉnh Quy hoạch cấp nước Thủ đô Hà Nội đến năm 2030, tầm nhìn đến năm 2050.</p>', 'http://baochinhphu.vn', 1, 0, 1, 1, 1, 0), 
(30, '', '', '<p>g đoạn Vành đai 3 đi bằng cầu qua hồ Linh Đàm để khép kín.</p><p>Vành đai 3,5 (Nam sông Hồng) chiều dài khoảng 44 km đến nay đã cơ bản hoàn thiện. Năm 2017 tiếp tục thực hiện đoạn nối từ Đại lộ Thăng Long-Quốc lộ 32 và đoạn từ Phúc La-Văn Phú đến cao tốc Pháp Vân-Cầu Giẽ; đoạn từ Quốc lộ 32-cầu Thượng Cát-Đường 5 kéo dài đầu tư theo hình thức PPP.</p><p>“Như vậy, đến năm 2020 sẽ đầu từ đồng bộ đoạn đường từ Đường 5 kéo dài đến Quốc lộ 6”, ông Nguyễn Đức Chung, Chủ tịch UBND TP. Hà Nội cho biết.</p><p>Vành đai 4 triển khai đầu tư&nbsp;đoạn từ Phúc La-Văn Phú&nbsp;đến cao tốc Pháp Vân-Cầu Giẽ và từ cao tốc Hà Nội-Lào Cai (Km3+650) đến Quốc lộ 32 (Km19+500)</p><p>Về các công trình đường sắt đô thị, thành phố hiện đang tập trung xây dựng hoàn thành tuyến đường sắt đô thị đoạn Nhổn-ga Hà Nội và tiếp tục triển khai các tuyến gồm: Dự án tuyến đường sắt đô thị (tuyến 2) đoạn Nam Thăng Long-Trần Hưng Đạo, đoạn Trần Hưng Đạo-Thượng Đình; tuyến đường sắt đô thị Hà Nội (tuyến 3) đoạn Ga Hà Nội-Hoàng Mai; tuyến đường sắt đô thị đoạn Nam Thăng Long-Nội Bài.</p><p>Khẳng định đầu tư kết cấu hạ tầng là một trong 3 khâu đột phá, ông Nguyễn Đức Chung cho biết Hà Nội đã và đang nỗ lực lựa chọn các các dự án trọng điểm để đầu tư cũng như huy động nguồn vốn xã hội hoá mạnh mẽ để thực hiện các dự án quan trọng này.</p><p>Phấu đấu đến cuối năm 2017, Hà Nội sẽ hoàn thành tuyến đường vành đai 3; đến năm 2019 là các tuyến vành đai 1, 2. Đối với các dự án xây thêm 5 cây cầu mới để kết nối với các tỉnh thành, vùng kinh tế khác, Hà Nội hiện đã có đủ các nhà đầu tư BT và thành phố đã bố trí đủ đất đối ứng. Khi hoàn thành các tuyến này sẽ cơ bản kết nối đồng bộ hệ thống giao thông, tạo động lực phát triển.</p><p>“Tuy nhiên, nếu không có cơ chế đặc thù thì các dự án này khó thực hiện bởi vốn đầu tư rất lớn... Thành phố đã nhận được đề xuất của 3 tập đoàn lớn trong nước tham gia xây dựng tuyến metro. Cụ thể là Tổng công ty Xây dựng Lũng Lô, Tập đoàn Vingroup và Tập đoàn Xuân Thành...”, ông Chung cho biết.</p><p>Chủ tịch UBND TP. Hà Nội cũng chia sẻ, vấn đề&nbsp;mấu chốt hiện nay là cơ chế, “nếu Chính phủ cho phép cơ chế đặc thù, Hà Nội sẽ bảo đảm đúng tiến độ đề ra. Bên cạnh đó, nếu thi công nhanh và quản lý tốt thì sẽ không có tình trạng tăng vốn, hiệu quả dự án sẽ cao hơn”.</p><p>Lắng nghe các đề xuất, kiến nghị của TP. Hà Nội, Phó Thủ tướng Chính phủ Trịnh Đình Dũng đánh giá, Thủ đô đang thay đổi hàng ngày, các công trình hạ tầng cấp bách được đầu tư và nhiều công trình được đưa vào khai thác sử dụng đã góp phần hạn chế ùn tắc giao thông...</p><p>“Cần chú ý kết nối giao thông đô thị trung tâm Hà Nội với các đô thị vệ tinh. Kết nối tốt sẽ tạo ra động lực mới, khu vực nào chưa phát triển thì cần giao thông kết nối để hấp dẫn nhà đầu tư hơn và giảm áp lực cho nội đô”, Phó Thủ tướng nói.</p><p>Bên cạnh đó, Phó Thủ tướng yêu cầu đẩy nhanh thi công 2 tuyến Nhổn-Ga Hà Nội, Cát Linh-Hà Đông đồng thời nghiên cứu kết nối 2 tuyến đường sắt quốc gia để tạo ra kết nối đồng bộ song hành với tìm nguồn vốn để thực hiện các tuyến đường sắt đô thị còn lại.</p><p>“Hà Nội chủ động tìm nguồn vốn để thực hiện 6 tuyến đường sắt đô thị còn lại là cách làm chủ động, đáng biểu dương. Tuy nhiên, nếu nhà đầu tư nội tham gia phải bảo đảm được an toàn khi thi công theo đúng tiêu chí nhanh, rẻ và an toàn”, Phó Thủ tướng nhấn mạnh.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(31, '', '', 'Theo Phó Thủ tướng Trịnh Đình Dũng, thời gian ngắn vừa qua, Thủ&nbsp;đô Hà Nội đã có thay đổi rất tích cực cả về cảnh quan và cơ sở hạ tầng. Thành phố cũng đã có nhiều giải pháp, đưa vào sử dụng nhiều công trình quan trọng góp phần giảm ùn tắc giao thông. Cùng với đó là việc đưa vào sử dụng những công trình cấp nước, điện, xử lý chất thải… đã cải thiện môi trường, nâng cao chất lượng đời sống người dân.<p>“Hà Nội đang thay đổi hàng ngày”, Phó Thủ tướng nói với góc nhìn của một công dân Thủ đô.</p><p>Tuy nhiên theo Phó Thủ tướng, sự&nbsp;“hấp dẫn” của Hà Nội càng thu hút nhiều người đến sinh sống và làm việc, do đó càng khiến trách nhiệm của các nhà quản lý&nbsp;đô thị nặng nề hơn. Theo Phó Thủ tướng, xu hướng dịch chuyển dân cư từ vùng nông thôn, từ các đô thị nhỏ hơn về Hà Nội ngày càng gia tăng, tạo ra thách thức lớn về hệ thống hạ tầng. Do đó, mặc dù&nbsp;đã&nbsp;được quan tâm, ưu tiên đầu tư cải thiện hệ thống hạ tầng, nhưng vẫn không đáp ứng được đòi hỏi của người dân.</p><p>“Đây là một thách thức lớn, do đó một mặt phải có giải pháp để kiểm soát phát triển đô thị theo đúng quy hoạch, kế hoạch thực hiện, đáp ứng được sự phát triển của Thủ đô. Mặt khác, phải có giải pháp để quản lý, xây dựng đô thị trong đó trọng tâm là quản lý, đầu tư, phát triển hệ thống hạ tầng nói chung để bảo đảm chất lượng của đô thị tốt hơn”, Phó Thủ tướng nói.</p><p>Bên cạnh đó, Phó Thủ tướng Trịnh Đình Dũng cũng “điểm danh” những mặt còn hạn chế trong phát triển kết cấu hạ tầng kinh tế - xã hội tại Thủ đô. Cụ thể như ách tắc giao thông ngày càng nghiêm trọng hơn; ngay tại Thủ đô vẫn còn tình trạng thiếu nước sạch cho sinh hoạt, còn phải dùng nước giếng ngầm; ô nhiễm môi trường ngày càng có xu hướng gia tăng; tỉ lệ nước thải sinh hoạt qua xử lý còn rất ít; việc đầu tư xây dựng các công trình xử lý chất thải rắn còn chậm; xử lý ô nhiễm môi trường còn hạn chế; còn nhiều lúng túng trong đầu tư xây dựng nghĩa trang, chưa đáp ứng đòi hỏi của người dân…&nbsp;<br  />&nbsp;</p><div style=\"text-align:center\"><img alt=\"5J3A0064\" height=\"300\" src=\"/uploads/news/2017_06/5j3a0064.jpg\" width=\"451\" /></div><div style=\"text-align: center;\">Kiểm tra thực địa Dự án Cầu vượt đường An Dương và đường Nghi Tàm sau khi điều chỉnh kết cấu đê, Phó Thủ tướng Trịnh đình Dũng nêu 4 yêu cầu: Tuyệt đối an toàn, giúp giảm ùn tắc, đảm bảo thẩm mỹ, nâng cao chất lượng cuộc sống người dân. Ảnh: VGP/Xuân Tuyến</div>&nbsp;<p>“Tất cả những vấn đề này ảnh hưởng rất lớn đến phát triển kinh tế - xã hội của Thủ đô, làm giảm chất lượng cuộc sống của người dân, đòi hỏi chúng ta phải tập trung tháo gỡ”, Phó Thủ tướng nói.</p><p>Phó Thủ tướng cho rằng, tuy Hà Nội đã rất tích cực, quyết liệt, nhưng rõ ràng cần có sự vào cuộc của Chính phủ, các Bộ, ngành, thậm chí cả các địa phương để cùng phối hợp.</p><p>“Quy hoạch vùng Thủ đô để phân công hợp tác, gánh vác trách nhiệm cho nhau. Bản thân các địa phương cũng phải có khả năng giúp Hà Nội chia sẻ trách nhiệm, chẳng hạn như giảm tải nghĩa trang, công viên. Đây là trách nhiệm chung”, Phó Thủ tướng nói.</p><p><strong>Đồng bộ từ xây dựng quy hoạch, lên kế hoạch thực hiện</strong></p><p>Theo Phó Thủ tướng Trịnh Đình Dũng, cái “gốc” của vấn đề phát triển hạ tầng của Hà Nội hiện nay là phải giải quyết đồng bộ từ quy hoạch phát triển đô thị đến tổ chức thực hiện quy hoạch đó.</p><p>Phó Thủ tướng Trịnh Đình Dũng cho rằng, quy hoạch chung xây dựng đô thị, quy hoạch phân khu đô thị đã có nhưng cần rà soát, điều chỉnh lại cho phù hợp.</p><p>“Tập trung rà soát lại tất cả các quy hoạch hạ tầng kĩ thuật, không chủ quan. Một số quy hoạch phân khu vẫn còn tình trạng chồng lấn. Những vùng nông thôn mới được đô thị hoá cần cố gắng giữ những công viên, khoảng đệm để giữ lại những giá trị văn hoá, tập quán sinh hoạt của khu vực đó, nếu không người dân nông thôn sẽ vô cùng khó khăn khi quá trình đô thị hóa xảy ra”, Phó Thủ tướng nói.</p><p>Phó Thủ tướng phân tích thêm: Quy hoạch là một quá trình, sau một thời gian, trình độ, nhận thức xã hội phát triển, do đó cần rà soát điều chỉnh bổ sung cho phù hợp. Điều chỉnh quy hoạch không phải là “xấu”, mà sẽ là tích cực nếu mục tiêu nhằm đáp ứng lợi ích của quốc gia, của người dân. Không ngại điều chỉnh quy hoạch nếu đó là vì lợi ích của người dân.</p><p>Phó Thủ tướng Trịnh Đình Dũng yêu cầu cần hết sức chú ý kết nối giao thông đô thị trung tâm Hà Nội với các đô thị vệ tinh bởi kết nối tốt sẽ tạo ra động lực mới ở các đô thị vệ tinh như Bắc sông Hồng, Nam Hà Nội. Khu vực nào chưa phát triển thì cần ưu tiên kết nối giao thông để tạo ra những vùng động lực mới, hấp dẫn hơn, giảm áp lực cho đô thị chính.</p><p>Trong đầu tư, cần chọn ra các dự án trọng điểm cấp bách (51 dự án), nếu cần thiết có thể xem xét bổ sung thêm, từ đó có kế hoạch đầu tư, xây dựng cơ chế huy động nguồn lực cho đầu tư phát triển. Phó Thủ tướng Trịnh Đình Dũng nhất trí với Hà Nội về việc cần ưu tiên đầu tư các công trình cấp bách, các nút kết nối giao thông nội thành lẫn kết nối giao thông đối ngoại, các tuyến giao thông đồng mức, các tuyến đường vành đai, đường xuyên tâm.</p><p>Phó Thủ tướng Trịnh Đình Dũng cũng đề nghị cần kiểm soát chặt chẽ quá trình đầu tư xây dựng, không vì làm nhanh mà thiếu kiểm soát. “Tiến độ phải nhanh, nhưng chất lượng công trình phải tốt, tránh thất thoát, lãng phí. Không phải cứ đấu thầu là tốt, nếu đấu thầu mà thông thầu thì hậu quả còn lớn hơn nhiều. Chọn thầu nhưng kiểm soát chặt chẽ thì vẫn nâng cao hiệu quả sử dụng vốn đầu tư”, Phó Thủ tướng nói.</p><p><strong>4 yêu cầu đối với việc “hạ” cốt đê đoạn An Dương</strong></p><p>Về việc thay đổi kết cấu đê tả sông Hồng đoạn An Dương, Phó Thủ tướng Trịnh Đình Dũng nhấn mạnh 4 yêu cầu tiên quyết. Đó là yêu cầu phải đảm bảo an toàn chống lũ cho Thủ đô Hà Nội, góp phần giảm ùn tắc giao thông, tạo ra một công trình kiến trúc đẹp, đồng thời góp phần nâng cao đời sống cho người dân trong khu vực.</p><p>“Yêu cầu Hà Nội, Bộ NN&amp;PTNT thành lập cơ quan thẩm định, mời các nhà khoa học uy tín nhất tham gia. Sau khi đã được thẩm định, phải công bố để người dân đồng tình”, Phó Thủ tướng nhấn mạnh.</p><p>Về hệ thống đường sắt, Phó Thủ tướng đề nghị TP. Hà Nội cần phối hợp chặt chẽ với Bộ GTVT để quản lý tốt 6 tuyến đường hiện có, đồng thời nghiên cứu đầu tư, nâng cấp, cải tạo. Đối với đường sắt đô thị, cần đẩy nhanh thi công hai tuyến đang đầu tư, đồng thời nghiên cứu để kết nối với hệ thống đường sắt quốc gia. Bên cạnh đó, cần tích cực tìm nguồn vốn để triển khai các dự án còn lại của hệ thống đường sắt đô thị. “Nếu giải quyết được đồng bộ hệ thống đường sắt đô thị thì sẽ vô cùng khó khăn, do đó việc làm sao giảm đầu tư, huy động nội lực để làm là nhiệm vụ quan trọng. Cần kêu gọi các nhà đầu tư lớn đầu tư công nghệ mới, bảo đảm nhanh, rẻ, an toàn”, Phó Thủ tướng đồng tình với đề xuất của Chủ tịch UBND TP. Hà Nội Nguyễn Đức Chung.</p><p>Về giao thông đường thuỷ, Phó Thủ tướng lưu ý Hà Nội cần chú ý kết hợp với phát triển du lịch, phát triển du lịch nhưng vẫn đảm bảo thoát lũ.</p><p>Phó Thủ tướng Trịnh Đình Dũng nhấn mạnh yêu cầu phải cung cấp đủ điện cho sản xuất và sinh hoạt;&nbsp; bảo đảm an toàn; bảo đảm mỹ quan. Những khu đô thị mới bắt buộc phải hạ ngầm đường điện một cách khoa học để có thể quản lý, vận hành an toàn, đảm bảo mỹ quan.</p><div style=\"text-align:center\"><img alt=\"5J3A0104\" height=\"300\" src=\"/uploads/news/2017_06/5j3a0104.jpg\" width=\"452\" /></div><div style=\"text-align: center;\"><br  />Giải quyết những kiến nghị của Hà Nội, Phó Thủ tướng Trịnh Đình Dũng nhấn mạnh nguyên tắc: Thủ tướng Chính phủ đã rất đồng tình việc phải tạo cho Hà Nội có cơ chế chính sách tốt nhất để phát triển đô thị, đáp ứng nhu cầu của người dân, giải quyết hiệu quả những vấn đề cấp bách đang đòi hỏi. Ảnh: VGP/Xuân Tuyến</div>&nbsp;<p>Về hạ tầng cấp nước, yêu cầu đặt ra là có đủ nước sạch, bảo đảm nước sạch đảm bảo vệ sinh, giá hợp lý ở mức người dân chấp nhận được. “Khuyến khích đầu tư xã hội nhưng phải đảm bảo kiểm soát chặt về giá. Muốn vậy, phải rà soát, điều chỉnh, bổ sung quy hoạch cấp nước”, Phó Thủ tướng nói.</p><p>Về&nbsp;quy hoạch thoát nước, Phó Thủ tướng đề nghị phải tăng thêm diện tích hồ chứa cục bộ tại các khu đô thị mới, các khu vực sản xuất. Vừa kết hợp cảnh quan môi trường, vừa điều tiết nước khi có mưa lớn chắc chắn sẽ hạn chế rất nhiều tình trạng ngập úng.</p><p>Phó Thủ tướng cũng nêu yêu cầu trong xử lý chất thải rắn cần phải sử dụng công nghệ mới, đảm bảo hiệu quả nhưng phù hợp với điều kiện Việt Nam. Các Bộ TN&amp;MT, KH&amp;CN, Xây dựng cần phối hợp chặt chẽ với Thành phố. Đề nghị sớm xây dựng định mức cơ chế để huy động đầu tư trong lĩnh vực này, làm tốt công tác bồi thường, giải phóng mặt bằng.</p><p>Phó Thủ tướng yêu cầu phải rà soát quy hoạch để vừa có nghĩa trang tập trung, vừa có nghĩa trang phân tán, phù hợp với đặc thù của Hà Nội. Cần phải quy hoạch một cách rất thực tế, đảm bảo yêu cầu đa dạng của người dân.</p><p>Phó Thủ tướng cũng đề nghị phải quan tâm đến việc xây dựng công viên, cây xanh ở các khu đô thị mới, trồng thêm cây xanh tại các khu đô thị hiện hữu.</p><p>Giải quyết những kiến nghị của Hà Nội, Phó Thủ tướng Trịnh Đình Dũng nhấn mạnh nguyên tắc: Thủ tướng Chính phủ đã rất đồng tình việc phải tạo cho Hà Nội có cơ chế chính sách tốt nhất để phát triển đô thị, đáp ứng nhu cầu của người dân, giải quyết hiệu quả những vấn đề cấp bách đang đòi hỏi. Trên cơ sở đó, Phó Thủ tướng đã đồng ý xử lý nhiều kiến nghị của Thành phố, đồng thời giao các Bộ, ngành cùng phối hợp chặt chẽ, rà soát để xử lý hiệu quả những vấn đề còn vướng mắc.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(32, '', '', 'Ngoài ra, Thành phố sẽ tập trung xây dựng BV Tim, Phụ sản, Nhi Hà Nội theo tiêu chuẩn châu Âu. Các BV tuyến huyện Sơn Tây, Ba Vì, Thường Tín cũng được đầu tư đồng bộ, đáp ứng nhu cầu khám chữa bệnh ngày càng cao của người dân Thủ đô.<p>Đây là thông tin được Chủ tịch UBND TP. Hà Nội Nguyễn Đức Chung cho biết tại lễ mít tinh kỷ niệm 62 năm Ngày Thầy thuốc Việt Nam, do Sở Y tế Hà Nội tổ chức ngày 23/2.</p><p>Cùng với việc đầu tư từ nguồn ngân sách, kêu gọi xã hội hóa để phát triển cơ sở vật chất, trang thiết bị, Hà Nội cũng sẽ tạo điều kiện cho ngành y tế trong việc phát triển nguồn nhân lực chất lượng cao thông qua đào tạo chuyên môn cho các bác sĩ bằng nhiều loại hình đào tạo ở trong nước, nước ngoài, mời chuyên gia, đào tạo tại chỗ, liên kết... đáp ứng yêu cầu trong tình hình mới.</p><p>Cũng theo ông Nguyễn Đức Chung, thời gian tới ngành y tế Hà Nội và các ngành chức năng của Thành phố phải tập trung thực hiện nghiên cứu điều chỉnh lại Quy hoạch phát triển ngành y tế Thủ đô đến năm 2025, tầm nhìn đến 2030. Mục tiêu là phải bảo đảm phân bố các BV thuận lợi cho người dân tiếp cận dịch vụ y tế.</p><p>Đánh giá cao những thành tích mà ngành y tế Hà Nội đã đạt được trong thời gian qua, tại buổi lễ, Bộ trưởng Bộ Y tế Nguyễn Thị Kim Tiến cũng lưu ý nhiệm vụ trong thời gian tới của ngành còn rất nặng nề. Bộ trưởng đề nghị ngành y tế cả nước nói chung, của Hà Nội nói riêng cần tiếp tục quyết liệt đổi mới toàn diện hơn nữa.</p><p>Bộ trưởng nhấn mạnh, Hà Nội phải hướng về y tế cơ sở và chăm sóc sức khỏe ban đầu cho nhân dân. Bên cạnh đó, phải đổi mới thái độ, phong cách phục vụ của nhân viên y tế hướng tới hài lòng người bệnh gắn với chất lượng dịch vụ khám chữa bệnh. Đổi mới cơ chế tài chính cũng là nhiệm vụ thời gian tới của ngành y…</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(33, '', '', 'Ngày 17/1&nbsp; Hội đồng Tư vấn khoa học nghiên cứu bảo tồn khu di tích Cổ Loa - Thành cổ Hà Nội tổ chức hội nghị tổng kết công tác năm 2016 và bàn bạc nhiệm vụ năm 2017.<br  /><br  />Năm 2017, Hội đồng sẽ tiếp tục tập trung vào công tác tư vấn trong việc thực hiện những cam kết của Thủ tướng Chính phủ với UNESCO đối với di sản Hoàng thành Thăng Long-Hà Nội, trong đó chú trọng công tác nhất thể hóa quản lý khu di sản và tư vấn nội dung Báo cáo theo yêu cầu của Trung tâm Di sản Thế giới (Báo cáo 6 năm về việc áp dụng Công ước Di sản thế giới).<br  /><br  />Đặc biệt, Hội đồng sẽ triển khai các hoạt động để tư vấn các đề án nghiên cứu, bảo tồn và phát huy giá trị khu di sản Hoàng thành Thăng Long và khu di tích Cổ Loa như: Đề án nghiên cứu phương án khôi phục không gian điện Kính Thiên; đề cương nhiệm vụ nghiên cứu, thể nghiệm tổ chức lễ hội Đèn Quảng Chiếu; các hoạt động tuyên truyền, giới thiệu, tổ chức trưng bày chuyên đề, triển lãm... và các hoạt động văn hóa phi vật thể như thể nghiệm tổ chức các lễ hội, các nghi lễ tại Hoàng thành Thăng Long.<br  /><br  />Tại hội nghị, ông Nguyễn Đức Chung, Chủ tịch UBND TP. Hà Nội nhấn mạnh về phương án bảo tồn Hoàng thành Thăng Long. Theo đó, cần xây dựng một dự án đầu tư tổng thể, không làm các dự án nhỏ lẻ. Bên cạnh đó, Thành phố sẽ làm việc với Bộ Quốc phòng để Bộ sớm bàn giao nốt mặt bằng và làm việc với Viện Hàn lâm Khoa học xã hội để chuẩn bị bàn giao các hiện vật đã được khai quật.<br  /><br  />Ông Nguyễn Đức Chung khẳng định Hà Nội đã chuẩn bị sẵn nguồn vốn cho dự án quan trọng này, phấn đấu đến năm 2020, Hoàng thành Thăng Long cơ bản được đầu tư bảo tồn; trở thành điểm nhấn văn hoá, du lịch, nơi ý nghĩa để tổ chức các hoạt động chính trị xã hội của Thủ đô.<br  /><br  />Các giáo sư thành viên Hội đồng đều bày tỏ đồng tình với cách làm mà Chủ tịch UBND TP. Hà Nội đưa ra và đánh giá cách làm này sẽ sớm đẩy nhanh tiến độ các dự án bảo tồn di sản.&nbsp;<br  /><br  />Theo Giáo sư Sử học Phan Huy Lê, các nhà khảo cổ nổi tiếng thế giới đều đánh giá Hoàng thành Thăng Long là di sản văn hoá của thế giới rất đặc biệt. Bên cạnh đó, di tích Cổ Loa cũng là kinh đô lớn bậc nhất ở Đông Nam Á thời cổ đại... “Đầu tư tổng thể là cách làm khoa học và sẽ phải bắt tay ngay vào việc mới bảo đảm được tiến độ, chất lượng công việc”, Giáo sư Phan Huy Lê nói.<br  />&nbsp;', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(34, '', '', 'Trước đó, ngày 19/5/2016, Thủ tướng Chính phủ nhận được đơn kêu cứu khẩn cấp của Vietfoods về việc Đội quản lý thị trường số 14 Hà Nội lạm quyền, tùy tiện kiểm tra, tạm giữ và thông tin cho các cơ quan báo chí sản phẩm mang nhãn hiệu Viet Foods chứa chất cấm, gây ung thư không có căn cứ pháp luật, gây tổn hại đến thương hiệu và thiệt hại cho nhà sản xuất.<p>Đến đầu tháng 6, Thủ tướng Chính phủ Nguyễn Xuân Phúc đã giao Bộ Công Thương chủ trì, cùng Bộ Y tế và UBND thành phố Hà Nội khẩn trương kiểm tra, xem xét, giải quyết nội dung phản ánh, kiến nghị của Viet Foods.</p><p>Nay, sau khi xem xét báo cáo của Bộ Công Thương và Bộ Y tế, Thủ tướng yêu cầu UBND thành phố Hà Nội chỉ đạo các cơ quan chức năng xử lý nghiêm các đơn vị, cá nhân có sai phạm trong vụ việc kiểm tra sản phẩm xúc xích nhãn hiệu Viet Foods xảy ra tại Đội quản lý thị trường số 14 thuộc Chi cục Quản lý thị trường Hà Nội theo đúng quy định của pháp luật.</p><p>Đồng thời, Thủ tướng yêu cầu Bộ Công Thương chỉ đạo tăng cường bồi dưỡng kiến thức pháp luật, hướng dẫn nghiệp vụ cho cán bộ, công chức quản lý thị trường, tránh xảy ra sai phạm trong thực thi nhiệm vụ.</p><p>Được biết, sau khi có ý kiến chỉ đạo của Thủ tướng hồi tháng 6, Đội quản lý thị trường số 14 Hà Nội đã có công văn về việc hủy bỏ biên bản vi phạm hành chính và không xử lý vi phạm hành chính đối với lô hàng xúc xích nhãn hiệu Viet Foods.</p><p>Tuy nhiên Viet Foods cho biết hậu quả từ thông tin xuất phát từ Chi cục Quản lý thị trường Hà Nội đã ảnh hưởng hết sức nghiêm trọng đến hoạt động sản xuất kinh doanh của Công ty. Nhiều doanh nghiệp khác cũng bị ảnh hưởng.&nbsp;</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(35, '', '', 'Sáng 17/1, Ban Quản lý đường sắt đô thị Hà Nội cùng liên danh nhà thầu của Pháp đã ký hợp đồng gói thầu CP06 thuộc dự án tuyến đường sắt đô thị thí điểm TP. Hà Nội (Nhổn-Ga Hà Nội).<p>Hợp đồng này giá trị khoảng 7.667 tỷ đồng (bao gồm các loại thuế, phí) do Chính phủ Pháp tài trợ, thời gian thực hiện trong 47 tháng.</p><p>Gói thầu CP06 gồm 6 hạng mục, trong đó gần 3.000 tỷ đồng để tư vấn, thiết kế, sản xuất và lắp đặt 10 đoàn tàu, mỗi đoàn tàu 4 toa với sức chứa khoảng 900 khách, tốc độ tối đa là 80 km/h. Ngoài ra, gói thầu còn có các hạng mục như khu depot, thiết bị đầu vào, vé, đường ray...</p><p>Khi gói thầu CP06 được hoàn thành, cùng với các gói thầu khác của dự án, Hà Nội sẽ có một phương thức vận tải công cộng hoàn toàn mới, theo tiêu chuẩn tiên tiến; đáp ứng nhu cầu đi lại dọc theo hành lang Đông Tây, từ vùng ngoại vi vào trung tâm Thành phố; góp phần nâng cao năng lực vận tải hành khách công cộng.</p><p>Phát biểu tại lễ ký kết, Chủ tịch UBND TP. Hà Nội Nguyễn Đức Chung cho biết, tuyến đường sắt đô thị Nhổn-Ga Hà Nội là một dự án giao thông rất quan trọng của Thủ đô: “Khi dự án hoàn thành sẽ giúp giảm tải áp lực, cải thiện tình hình ùn tắc và thay đổi diện mạo giao thông Hà Nội”.</p><p>Tuyến đường sắt đô thị thí điểm TP. Hà Nội đi qua quận Bắc Từ Liêm, Nam Từ Liêm, Cầu Giấy, Ba Đình, Đống Đa, Hoàn Kiếm, có chiều dài 12,5 km, với 8,5 km đi trên cao, 4 km đi ngầm; 8 ga trên cao, 4 ga ngầm và 1 khu depot tại Nhổn. Dự án bao gồm 9 gói thầu chính, trong đó có 5 gói thầu xây lắp và 4 gói thầu hệ thống thiết bị đường sắt đô thị.</p><p>Được khởi công xây dựng từ tháng 9/2010 và dự kiến hoàn thành vào tháng 9/2017, tuy nhiên, thời gian hoàn thành có thể phải lùi đến năm 2021. Đến nay dự án có tổng mức đầu tư gần 36.000 tỷ đồng.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(28, '', '', '<p>Trên địa bàn Hà Nội, hiện đang thi công Dự án đường sắt đô thị Hà Nội, tuyến số 2A, đoạn Cát Linh - Hà Đông, Dự án đường sắt đô thị Hà Nội, tuyến số 3, đoạn Nhổn - ga Hà Nội. Đây là hai dự án đường sắt đô thị đầu tiên được triển khai, là hai công trình quan trọng của Hà Nội và cả nước, luôn được Chính phủ, Thủ tướng Chính phủ hết sức quan tâm tháo gỡ khó khăn, vướng mắc để sớm được hoàn thành, đưa vào khai thác, sử dụng, góp phần giảm ùn tắc giao thông tại Thủ đô.</p><p>Qua kiểm tra, Dự án đường sắt đô thị Hà Nội, tuyến số 2A, đoạn Cát Linh - Hà Đông đã hoàn thành 90% khối lượng xây lắp. Dự án đường sắt đô thị Hà Nội, tuyến số 3, đoạn Nhổn - ga Hà Nội đến nay đã hoàn thành khoảng 30% khối lượng xây lắp. Về tiến độ, dù đã nhiều lần được điều chỉnh nhưng cả hai dự án đều chậm so với yêu cầu nên ảnh hưởng đến việc giảm ùn tắc giao thông tại Thủ đô Hà Nội.</p><p>&nbsp;</p><p><strong><strong>Vận hành thử nghiệm tuyến Cát Linh - Hà Đông vào ngày 30/9/2017</strong></strong></p><p>&nbsp;</p><p>Để bảo đảm chất lượng, an toàn và tiến độ triển khai dự án, sớm đưa hai tuyến đường sắt đô thị Cát Linh - Hà Đông và Nhổn - ga Hà Nội vào hoạt động, góp phần giảm ùn tắc giao thông trên địa bàn Thành phố, Phó Thủ tướng yêu cầu các Bộ, cơ quan, đơn vị khẩn trương thực hiện một số nhiệm vụ.&nbsp;<br  /><br  />Đối với đoạn Cát Linh - Hà Đông, Bộ Giao thông vận tải tiếp tục chỉ đạo Ban Quản lý dự án Đường sắt và các nhà thầu đẩy nhanh tiến độ thực hiện dự án; bảo đảm: phần xây lắp, trang trí kiến trúc khu Depot hoàn thành trước ngày 31/3/2017; phần lắp đặt thiết bị hoàn thành trước ngày 31/7/2017; đóng điện toàn tuyến trước ngày 1/9/2017; vận hành thử nghiệm toàn tuyến Cát Linh - Hà Đông theo đúng kế hoạch vào ngày 30/9/2017.<br  /><br  />Bộ Giao thông vận tải chỉ đạo tuyển chọn tư vấn nước ngoài độc lập, có đủ năng lực đánh giá an toàn hệ thống trước và trong quá trình vận hành chạy thử. Thực hiện tổng kiểm tra toàn bộ công trình trước khi chạy thử để bảo đảm tuyệt đối an toàn.<br  /><br  />Còn đối với đoạn Nhổn - ga Hà Nội, UBND thành phố Hà Nội chỉ đạo quyết liệt, xử lý dứt điểm các khó khăn trong công tác giải phóng mặt bằng, đấu thầu... Đặc biệt, đối với 4 km đường ngầm, cần tập trung giải quyết triệt để các vướng mắc để sớm hoàn thành công tác giải phóng mặt bằng tại 4 ga ngầm; chỉ đạo sát sao các cơ quan, đơn vị liên quan phối hợp chặt chẽ trong quá trình thi công, bảo đảm chất lượng, tuyệt đối an toàn và tiến độ theo đúng kế hoạch.&nbsp;<br  /><br  /><strong>Thực hiện nghiêm ngặt về an toàn lao động</strong><br  /><br  />Phó Thủ tướng yêu cầu các đơn vị phải bảo đảm tuyệt đối an toàn cho người lao động; đặc biệt bảo đảm an toàn cho người và các phương tiện tham gia giao thông. Trong quá trình thi công, Bộ Giao thông vận tải và UBND thành phố Hà Nội chỉ đạo thực hiện nghiêm ngặt quy định về an toàn lao động, an toàn giao thông, vệ sinh môi trường và phòng cháy, chữa cháy gắn với bảo đảm chất lượng công trình.</p><p>Về bảo đảm chất lượng công trình, Phó Thủ tướng yêu cầu Bộ Xây dựng tiếp tục rà soát, hoàn thiện các tiêu chuẩn, quy chuẩn kỹ thuật, định mức dự toán xây dựng phù hợp với tính chất đặc thù của các dự án đường sắt đô thị. Hội đồng nghiệm thu Nhà nước các công trình xây dựng tăng cường hướng dẫn, kiểm tra chất lượng và công tác quản lý chất lượng, đảm bảo công trình được thi công đáp ứng yêu cầu thiết kế; thực hiện nghiệm thu và kiểm tra công tác nghiệm thu của chủ đầu tư, các nhà thầu theo đúng quy định pháp luật.</p><p>Về kiến trúc công trình, Bộ Giao thông vận tải và UBND thành phố Hà Nội lưu ý chất lượng kiến trúc công trình; đặc biệt, phải coi công trình nhà ga đường sắt đô thị là công trình văn hóa, cần bảo đảm thẩm mỹ, văn hóa và tiện lợi nhất cho hành khách.</p><p>Phó Thủ tướng yêu cầu các Bộ, ngành và Ủy ban nhân dân thành phố Hà Nội cần chủ động nghiên cứu cơ chế huy động nguồn lực xã hội trong nước hoặc nước ngoài thông qua các hình thức đối tác công - tư để triển khai đầu tư xây dựng các tuyến đường sắt đô thị còn lại theo quy hoạch; tạo điều kiện cho doanh nghiệp Việt Nam tham gia triển khai dự án, nhằm nâng cao tỷ lệ nội địa hóa, giảm chi phí xây dựng, phát triển năng lực doanh nghiệp trong nước.</p>', 'http://baochinhphu.vn', 1, 0, 1, 1, 1, 0), 
(27, '', '', 'Ông Nguyễn Hữu Trí, Phó Cục trưởng Cục Đăng kiểm Việt Nam (Bộ GTVT) thông tin, Đề án kiểm soát khí thải xe mô tô, xe gắn máy được Thủ tướng Chính phủ phê duyệt năm 2010. Cục Đăng kiểm đã nghiên cứu, thử nghiệm, tiến hành các công việc chuẩn bị.<br  /><br  />Tuy nhiên đây là một Đề án lớn mang tính xã hội phức tạp. Các tổ chức, cá nhân đều thống nhất chủ trương phải kiểm soát khí thải xe mô tô, xe gắn máy nhưng chưa thống nhất được phương án, lộ trình triển khai cụ thể. Do có ảnh hưởng xã hội lớn, đặc biệt là người lao động có thu nhập thấp sử dụng xe máy cũ có chất lượng thấp, ông Nguyễn Hữu Trí cho hay.<p>Trong khi đó, giao thông công cộng chưa đáp ứng được nhu cầu đi lại, số lượng xe mô tô, xe gắn máy tham gia giao thông tiếp tục tăng lên nhanh chóng càng gây khó khăn cho công tác triển khai thực hiện.</p><p>Bên cạnh đó, quy định kiểm soát khí thải xe mô tô, xe gắn máy cũng chưa được quy định bắt buộc trong Luật Giao thông đường bộ. Do tính phức tạp đó, cần tiếp tục nghiên cứu khả thi quy định về áp dụng tiêu chuẩn khí thải và kiểm định khí thải đối với xe mô tô trong quá trình xây dựng Luật Giao thông đường bộ sửa đổi tới đây.</p><p>Nhìn nhận vấn đề &nbsp;này, Bộ GTVT cho rằng, mô tô, xe gắn máy vẫn đang là phương tiện giao thông chủ yếu của người dân, đáp ứng gần 90% nhu cầu đi lại trong thành phố khi giao thông công cộng mới chỉ đáp ứng được không quá 10% nhu cầu. Bên cạnh đó, đa số người sử dụng chưa nhận thức rõ mức độ ảnh hưởng, tác hại của khí thải mô tô, xe gắn máy và tác dụng, sự cần thiết phải kiểm tra khí thải, bảo dưỡng, sửa chữa để bảo đảm độ bền, hiệu quả hoạt động, giảm khí thải độc hại, tiết kiệm nhiên liệu.</p><p>Ngay cơ quan chức năng cũng còn nhiều ý kiến chưa đồng thuận với chủ trương về giá kiểm tra khí thải trực tiếp từ người sử dụng mô tô, xe gắn máy. Mặc dù mức giá kiểm tra khí thải theo đánh giá của Bộ GTVT là rất nhỏ so với chi phí nhiên liệu.</p><p><strong>Hà Nội nghiên cứu phương án thu hồi</strong><strong>&nbsp;xe cũ nát</strong></p><p>Mới đây, Chủ tịch UBND TP. Hà Nội Nguyễn Đức Chung cho biết Hà Nội sẽ nghiên cứu phương án để thu hồi xe máy quá cũ nát, tiềm ẩn nguy cơ cao gây mất ATGT và ô nhiễm môi trường.</p><p>Ông Nguyễn Đức Chung cho hay Thành phố dự kiến đến kỳ họp HĐND vào tháng 6/2017 sẽ trình chương trình liên quan đến hạn chế xe máy, sau đó sẽ trình Chính phủ. Tinh thần đề xuất theo hướng sẽ bỏ ra một khoản tiền hỗ trợ và có biện pháp thu hồi các xe máy, ô tô đã quá hạn sử dụng, ông Nguyễn Đức chung khẳng định.</p><p>Về đề xuất của Hà Nội, ông Nguyễn Hữu Trí (Phó Cục trưởng Cục Đăng kiểm Việt Nam ) nhìn nhận, đây là đề xuất tốt để bảo vệ môi trường và ATGT. Tuy nhiên, đề xuất này chỉ có thể thực hiện được khi sửa Luật Giao thông đường bộ.</p><p>Theo ông Trí, trong quá trình bàn thảo về sửa đổi Luật Giao thông đường bộ, đã có những ý kiến đề xuất cần phân cấp cho địa phương quy định điều kiện hoạt động của môtô, xe máy tùy theo đặc thù của từng địa phương, thay vì quy định chung cho cả nước. Số lượng xe máy ở Hà Nội nhiều hơn hẳn so với các tỉnh miền núi, nguy cơ ô nhiễm do xe máy gây ra tại Hà Nội nhiều hơn thì Hà Nội phải chủ động xây dựng quy định về điều kiện hoạt động của xe máy. Còn tại những tỉnh ít xe máy và xe máy là phương tiện chính của người dân, nhất là người nghèo, trong khi vận tải công cộng chưa đủ khả năng đáp ứng, thì có thể xem xét quy định về điều kiện hoạt động của xe máy khác với Hà Nội.</p><p>Hiện nay, cả nước có khoảng 40 triệu xe máy, trong số này, có những xe được đưa vào hoạt động từ những năm 80-90 của thế kỷ trước nhưng hiện vẫn đang lưu thông. Những xe này nếu không được bảo dưỡng tốt sẽ ảnh hưởng lớn đến ATGT và môi trường đô thị.</p><p>“Quyết định số 16/2015/QĐ-TTg ngày 22/5/2015 của Thủ tướng Chính phủ về thu hồi, xử lý sản phẩm thải bỏ, quy định, từ 1/1/2018, xe mô tô, xe máy hết thời hạn sử dụng sẽ phải thu hồi, thải bỏ. Tuy nhiên đến nay lại chưa có quy định nào về niên hạn sử dụng của xe gắn máy nên cũng sẽ chưa thể triển khai được Quyết định nói trên. Đồng thời, nếu quy định niên hạn cho xe máy nên áp dụng theo lộ trình để không ảnh hưởng đến việc đi lại của người dân”, ông Trí cho hay.</p><p>PGS.TS Bùi Xuân Cậy (Đại học GTVT Hà Nội) cũng đồng tình với đề xuất thu hồi xe máy cũ nát của Hà Nội để giảm ô nhiễm môi trường, tai nạn giao thông. Tuy nhiên, ông Bùi Xuân Cậy cũng băn khoăn về việc ô tô còn có thể đăng kiểm nhưng với xe máy cũ, hết niên hạn sử dụng có thu hồi được hay không lại là vấn đề khó.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(25, '', '', '<p>Văn phòng UBND TP. Hà Nội vừa ban hành Thông báo số 112 về kết luận của tập thể lãnh đạo Thành phố tại cuộc họp về tiến độ triển khai các dự án bãi đỗ xe ngầm trên địa bàn.</p><p>Theo đó, lãnh đạo Hà Nội nhất trí quy mô dự án bãi xe ngầm tại công viên Thống Nhất, rộng 10.000 m2, gồm tầng hầm một có chức năng thương mại, dịch vụ; 4 tầng còn lại để xe. Lãnh đạo Thành phố cũng chỉ đạo việc “nghiên cứu thêm để xe ngầm từ cổng chính công viên đến hồ”.</p><p>Ngoài dự án bãi xe ngầm tại công viên Thống Nhất, lãnh đạo Hà Nội cũng thống nhất quy mô 5 tầng tương tự đối với dự án bãi xe ngầm ở Nhà thi đấu Quần Ngựa, Công viên Nhân Chính.</p><p>Riêng với bãi xe ngầm trước Quảng trường Cách mạng 19/8 và vườn hoa Cổ Tân, Thành phố giao Sở Quy hoạch và Kiến trúc làm việc với Sở Văn hóa, Thể thao và Du Lịch xác định ranh giới bảo vệ di tích lịch sử được xếp hạng, tổng hợp phương án quy hoạch, đầu tư, báo cáo xin ý kiến lãnh đạo Thành ủy.<br  /><br  />Sở Kế hoạch và Đầu tư chủ trì, phối hợp với Sở Tài chính, Sở Tài nguyên và Môi trường, Sở Xây dựng, Cục Thuế Hà Nội nghiên cứu xây dựng cơ chế đặc thù khuyến khích các nhà đầu tư thực hiện dự án xây dựng bãi xe ngầm: giá trông giữ xe, kết hợp giữ bãi đỗ xe và trung tâm thương mại, tiền sử dụng đất, nghiên cứu phương án cho phép Nhà đầu tư bán tối đa 30% số lượng chỗ đỗ xe; đề xuất, báo cáo UBND Thành phố trước ngày 31/3.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(26, '', '', 'Theo đó, trong quá trình nghiên cứu lập tổng mặt bằng ga S9, thuộc dự án đầu tư xây dựng tuyến đường sắt đô thị thí điểm TP. Hà Nội (đoạn Nhổn - ga Hà Nội) và triển khai thực hiện dự án, các cơ quan liên quan của TP. Hà Nội đã nhận được các kiến nghị của các hộ dân tổ 31 và tổ 36 phường Ngọc Khánh, quận Ba Đình đề nghị nghiên cứu xem xét điều chỉnh phần kiến trúc nổi các công trình kỹ thuật (giếng thông gió) tại dải phía Nam phố Kim Mã bố trí di chuyển về phía Bắc tại khu vực bãi đỗ xe Ngọc Khánh để tránh giải phóng mặt bằng, không làm ảnh hưởng đến cuộc sống của các hộ dân hiện có tại khu vực phía Nam phố Kim Mã. UBND TP. Hà Nội đã giao các cơ quan chuyên môn phối hợp với chủ đầu tư và các đơn vị tư vấn dự án xem xét và nghiên cứu kỹ lưỡng các giải pháp thay thế.<br  /><br  />Tuy nhiên, các đơn vị tư vấn kỹ thuật của dự án (Công ty Systra - Cộng hòa Pháp), đơn vị tư vấn thẩm tra (Công ty Sener - Tây Ban Nha) và tư vấn độc lập (Công ty Idom - Tây Ban Nha) sau quá trình nghiên cứu, xem xét khẳng định, phương án quy hoạch tổng mặt bằng như đề xuất đã được phê duyệt là tối ưu nhất về chức năng, thời gian thi công, giải pháp kỹ thuật và công nghệ; an toàn trong vận hành khai thác và sử dụng; chi phí vận hành bảo trì kinh tế nhất; khối lượng giải phóng mặt bằng nhà dân ít nhất; tiết kiệm năng lượng đáp ứng tiêu chí thân thiện với môi trường...<br  /><br  />Di dời giếng thông gió nhà ga sẽ gây rủi ro cho toàn dự án<br  /><br  />Việc di dời các giếng thông gió theo kiến nghị của một số hộ dân sẽ làm thay đổi thiết kế kỹ thuật được duyệt, ảnh hưởng đến các gói thầu của Dự án và sẽ gây hậu quả rủi ro cho toàn bộ dự án.<br  /><br  />UBND TP. Hà Nội đã xem xét kỹ các báo cáo của các cơ quan chuyên môn, tư vấn dự án và đã thống nhất giữ nguyên vị trí giếng thông gió theo thiết kế tổng mặt bằng đã được phê duyệt.<br  /><br  />Về việc áp dụng Quy chuẩn kỹ thuật Quốc gia công trình ngầm đô thị QCVN 08:2009 BXD cho thiết kế các giếng thông gió nhà ga ngầm thuộc tuyến đường sắt đô thị thí điểm TP. Hà Nội, đoạn Nhổn - ga Hà Nội:<br  /><br  />Trong quá trình xem xét phê duyệt tổng mặt bằng các ga ngầm thuộc dự án, UBND TP. Hà Nội đã có văn bản và hồ sơ gửi Bộ Xây dựng để xin ý kiến thỏa thuận. Bộ Xây dựng đã xem xét và thống nhất phương án thiết kế quy hoạch tổng mặt bằng tỷ lệ 1/500 tuyến hầm và ga ngầm (tại Văn bản 2162/BXD-HĐXD ngày 28/10/2010).<br  /><br  />Riêng đối với nội dung về sự phù hợp của thiết kế giếng thông gió ga ngầm đối với Quy chuẩn Quốc gia công trình ngầm đô thị QCVN 08:2009/BXD, sau khi có phản ánh của người dân, tại Văn bản số 3051/BXD-KHCN ngày 25/11/2014 Bộ Xây dựng đã có nêu rõ:<br  /><br  />&quot;Đối với các vị trí giếng thông gió đề nghị Ban quản lý đường sắt đô thị Hà Nội nghiên cứu mở rộng phạm vi giải phóng mặt bằng để bảo đảm khoảng cách từ các giếng thông gió đến nhà dân lân cận đáp ứng các quy định theo Khoản 5.8.7 của QCVN 08:2009/BXD.<br  /><br  />Trường hợp trong thực tế không thể giải phóng được mặt bằng, đề nghị Ban quản lý đường sắt đô thị Hà Nội cần nghiên cứu các giải pháp kỹ thuật và biện pháp xử lý bảo đảm an toàn môi trường và an toàn cộng đồng đối với các vị trí đặt giếng thông gió và phải giải thích cho người dân&quot;.<br  /><br  />Ngoài ra, tại Văn bản số 213/BXD-KHCN ngày 13/2/2017, Bộ Xây dựng cũng có ý kiến: &quot;Trong trường hợp vì lý do khách quan, không bảo đảm khoảng cách từ các giếng đến cửa sổ của nhà và công trình lân cận, chủ đầu tư chỉ đạo các đơn vị tư vấn thiết kế, nhà thầu thi công và các đơn vị liên quan nghiên cứu áp dụng các giải pháp khoa học kỹ thuật nhằm bảo đảm khai thác vận hành công trình đáp ứng các tiêu chí môi trường và thỏa mãn yêu cầu của các quy định hiện hành...&quot;.<br  /><br  />Thiết kế đã bảo đảm an toàn cho cộng đồng<br  /><br  />Về việc bảo đảm điều kiện an toàn môi trường, an toàn cộng đồng, đơn vị Tư vấn Systra đã có Văn bản số PIC-MLT-01760-15-V khẳng định, thiết kế giếng thông gió của ga S9 được phê duyệt đã bảo đảm an toàn môi trường và an toàn cộng đồng, tuân thủ các nội dung chỉ đạo của Bộ Xây dựng tại Văn bản số 3051/BXD-KHCN, đồng thời, tuân thủ QCVN 08:2009/BXD.<br  /><br  />Như vậy, hồ sơ thiết kế quy hoạch nhà ga S9 đã được các cơ quan liên quan và các cấp có thẩm quyền xem xét kỹ lưỡng, đánh giá khách quan và đã xét tới điều kiện đô thị chật hẹp, giải pháp bố trí mặt bằng đã xem xét giảm thiểu tối đa khối lượng giải phóng mặt bằng nhà dân và áp dụng các giải pháp kỹ thuật an toàn để bảo đảm đáp ứng yêu cầu của các Quy chuẩn, tiêu chuẩn, quy định của pháp luật hiện hành.<br  /><br  />Dự án đầu tư xây dựng tuyến đường sắt đô thị thí điểm TP. Hà Nội (đoạn Nhổn - ga Hà Nội) là dự án trọng điểm của Thành phố đang được gấp rút triển khai thực hiện nhằm đáp ứng nhu cầu giao thông đi lại của người dân Thủ đô.<br  /><br  />Sở Quy hoạch - Kiến trúc đề nghị ông Trần Dũng Sơn chấp hành quy định pháp luật, ủng hộ và tạo điều kiện thuận lợi để Dự án sớm hoàn thành góp phần phát triển kinh tế xã hội của Thủ đô.', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(23, '', '', 'Tổng công ty Đường sắt Việt Nam (VNR) sẽ tổ chức chạy thêm một số đôi tàu khách trên các tuyến trong các ngày 5, 6/4 và từ ngày 27/4 -2/5. Ngoài các đôi tàu chạy hằng ngày, Công ty Vận tải đường sắt Sài Gòn cho chạy thêm 8 đoàn tàu khu đoạn Sài Gòn-Nha Trang gồm các mác hiệu SNT3, SNT4, SNT6, SNT7, SNT8, SNT9, SNT10 và SNT11.<p>Trong đó, chiều Sài Gòn-Nha Trang tổ chức chạy các tàu: SNT4, SNT6, SNT8, SNT10. Các ga đón tiễn khách là Sài Gòn, Biên Hòa, Tháp Chàm, Nha Trang (riêng tàu SNT10 không đón trả khách ga Biên Hòa). Chiều Nha Trang-Sài Gòn, tổ chức chạy các tàu: SNT3, SNT7, SNT9, SNT11. Các ga đón tiễn khách gồm Nha Trang, Tháp Chàm, Biên Hòa, Sài Gòn (riêng tàu SNT11 không đón trả khách tại ga Tháp Chàm).</p><p>Tuyến Sài Gòn-Quy Nhơn, dự kiến chạy thêm 4 đoàn tàu mang mác hiệu SQN2, SQN3, SQN5 và SQN6.</p><p>Trước đó, Công ty Vận tải đường sắt Sài Gòn đưa vào khai thác tàu chất lượng cao, hiện đại chạy tuyến Sài Gòn-Nha Trang từ ngày 20/2 và trên tuyến Sài Gòn-Phan Thiết từ 20/3 được hành khách đánh giá cao.</p><p>Trong đợt nghỉ lễ 30/4 với 4 ngày (từ 27/4-2/5), Công ty Vận tải đường sắt Hà Nội cũng tổ chức chạy thêm 20 đoàn tàu khách trên các tuyến, đặc biệt là đến các điểm du lịch để phục vụ người dân đi lại.&nbsp;<br  /><br  />Cụ thể, tuyến Hà Nội-Thanh Hóa chạy thêm đôi tàu TH1/TH2; tuyến Hà Nội-Vinh chạy các tàu NA3/NA4, NA7/NA8, NA9/10, NA11/12 và NA13; tuyến Hà Nội-Đồng Hới chạy các mác tàu: QB1/QB2, QB3/QB4; tuyến Hà Nội-Đà Nẵng chạy đôi tàu SE17/18; tuyến Hà Nội-Lào Cai chạy tàu SP7/SP8; tuyến Hà Nội-Hải Phòng chạy tàu LP10.</p><p>Dịp nghỉ lễ này, khi đi trên các đoàn tàu tuyến Hà Nội-Sài Gòn, hành khách sẽ được hưởng mức giá giảm từ 6%-12% đối với các đoàn khách có số lượng từ 10 người trở lên với cự ly trên 1.300 km.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(24, '', '', '<strong>Chế độ đối với quân nhân chuyên nghiệp phục viên, nghỉ hưu</strong><p>Chính phủ ban hành Nghị định quy định chi tiết và hướng dẫn thi hành một số điều về chế độ, chính sách của Luật Quân nhân chuyên nghiệp, công nhân và viên chức quốc phòng (gọi tắt là Luật).</p><p>Nghị định này quy định chi tiết và hướng dẫn thi hành về chế độ, chính sách đối với quân nhân chuyên nghiệp nghỉ hưu, phục viên; công nhân và viên chức quốc phòng nghỉ hưu; quân nhân chuyên nghiệp, công nhân và viên chức quốc phòng phục vụ trong quân đội hy sinh, từ trần; quy đổi thời gian để tính hưởng chế độ trợ cấp một lần; chế độ bảo hiểm y tế đối với thân nhân của công nhân, viên chức quốc phòng phục vụ trong quân đội.</p><p>Về chế độ, chính sách đối với quân nhân chuyên nghiệp phục viên Nghị định quy định quân nhân chuyên nghiệp phục viên theo Điểm a, c Khoản 3 Điều 40 của Luật được trợ cấp tạo việc làm bằng 06 tháng tiền lương cơ sở theo quy định của Chính phủ tại thời điểm phục viên; được hỗ trợ đào tạo nghề hoặc giới thiệu việc làm tại các tổ chức giới thiệu việc làm của các bộ, ngành, đoàn thể, địa phương và các tổ chức kinh tế-xã hội khác. Bên cạnh đó, được hưởng trợ cấp phục viên một lần, cứ mỗi năm công tác được trợ cấp bằng 1 tháng tiền lương của tháng liền kề trước khi phục viên; được hưởng chế độ bảo hiểm xã hội một lần hoặc bảo lưu thời gian tham gia bảo hiểm xã hội theo quy định hiện hành của pháp luật về bảo hiểm xã hội. Quân nhân chuyên nghiệp phục viên cũng được ưu tiên cộng điểm trong thi tuyển hoặc xét tuyển công chức theo quy định tại Điều 5 Nghị định số 24/2010/NĐ-CP ngày 15/3/2010 của Chính phủ quy định về tuyển dụng, sử dụng và quản lý công chức; hoặc được ưu tiên khi xác định người trúng tuyển trong kỳ thi tuyển viên chức theo quy định tại khoản 2 Điều 10 Nghị định số 29/2012/NĐ-CP ngày 12/4/2012 của Chính phủ về tuyển dụng, sử dụng và quản lý viên chức.</p><p>Về chế độ, chính sách đối với quân nhân chuyên nghiệp nghỉ hưu theo Điểm a, b Khoản 1 Điều 40 của Luật, Nghị định hướng dẫn quân nhân chuyên nghiệp đủ điều kiện nghỉ hưu theo quy định của pháp luật về bảo hiểm xã hội và theo quy định tại Khoản 1 Điều 22 của Luật được hưởng chế độ bảo hiểm xã hội theo quy định hiện hành của pháp luật về bảo hiểm xã hội.</p><p>Quân nhân chuyên nghiệp nghỉ hưu trước hạn tuổi cao nhất theo cấp bậc quân hàm quy định tại Khoản 2 Điều 17 của Luật do thay đổi tổ chức biên chế theo quyết định của cấp có thẩm quyền mà quân đội không còn nhu cầu bố trí sử dụng thì không bị trừ tỉ lệ lương hưu do nghỉ hưu trước tuổi và ngoài hưởng chế độ bảo hiểm xã hội, chế độ ưu đãi người có công với cách mạng (nếu có) theo quy định hiện hành, còn được hưởng chế độ trợ cấp một lần như sau: 1- Được trợ cấp 3 tháng tiền lương cho mỗi năm nghỉ hưu trước tuổi; 2- Được trợ cấp bằng 5 tháng tiền lương cho 20 năm đầu công tác. Từ năm thứ 21 trở đi, cứ mỗi năm công tác được trợ cấp bằng 1/2 tháng tiền lương.</p><p><strong>Phê duyệt Hiệp định tránh đánh thuế hai lần với Hoa Kỳ</strong></p><p>Chính phủ vừa ban hành Nghị quyết phê duyệt Hiệp định và Nghị định thư giữa Chính phủ nước Cộng hòa xã hội chủ nghĩa Việt Nam và Chính phủ Hợp chúng quốc Hoa Kỳ về tránh đánh thuế hai lần và ngăn ngừa việc trốn lậu thuế đối với các loại thuế đánh vào thu nhập.</p><p>Chính phủ yêu cầu Bộ Ngoại giao làm các thủ tục đối ngoại, công bố và lưu chiểu Hiệp định và Nghị định thư theo quy định của pháp luật. Bộ Tài chính chủ trì, phối hợp với các bộ, cơ quan liên quan tổ chức triển khai thực hiện sau khi Hiệp định và Nghị định thư có hiệu lực.</p><p><strong>Báo cáo Thủ tướng phản ánh về chi phí hệ thống bảo hiểm xã hội</strong></p><p>Gần đây, báo chí có phản ánh về chi phí hệ thống bảo hiểm xã hội quá lớn và phải tính đến giải pháp kéo dài tuổi hưu để bảo đảm an toàn cho Quỹ bảo hiểm xã hội.</p><p>Về việc này, Thủ tướng Chính phủ Nguyễn Xuân Phúc yêu cầu Bộ Lao động-Thương binh và Xã hội, Bảo hiểm Xã hội Việt Nam nghiên cứu, báo cáo Thủ tướng Chính phủ về thông tin báo nêu trên.</p><p><strong>Nhân sự Ngân hàng Chính sách xã hội</strong></p><p>Tại Quyết định 263/QĐ-TTg, Thủ tướng Chính phủ bổ nhiệm ông Đỗ Văn Chiến, Ủy viên Trung ương Đảng, Bộ trưởng, Chủ nhiệm Ủy ban Dân tộc kiêm giữ chức vụ Ủy viên Hội đồng quản trị Ngân hàng Chính sách xã hội thay ông Sơn Phước Hoan đã nghỉ hưu.</p><p><strong>Khung chính sách hỗ trợ tái định cư cao tốc Mỹ Thuận-Cần Thơ</strong></p><p>Thủ tướng Chính phủ vừa phê duyệt Khung chính sách về bồi thường, hỗ trợ, tái định cư Dự án đầu tư xây dựng công trình đường cao tốc Mỹ Thuận-Cần Thơ, giai đoạn 1.</p><p>Thủ tướng Chính phủ giao Bộ Giao thông vận tải tiếp tục phối hợp với UBND các tỉnh Vĩnh Long và Đồng Tháp hoàn thiện Khung chính sách, bảo đảm phù hợp với quy định tại Nghị định số 47/2014/NĐ-CP ngày 15/5/2014 của Chính phủ quy định về bồi thường, hỗ trợ, tái định cư khi Nhà nước thu hồi đất; chịu trách nhiệm chỉ đạo thực hiện Khung chính sách đã được phê duyệt theo đúng quy định của pháp luật.</p><p><strong>Cơ chế quản lý tài chính 5 dự án cao tốc do VEC làm chủ đầu tư</strong></p><p>Phó Thủ tướng Vương Đình Huệ vừa có ý kiến chỉ đạo về cơ chế quản lý tài chính trong thời gian khai thác, thu phí 5 dự án đường cao tốc do Tổng công ty phát triển đường cao tốc Việt Nam (VEC) làm chủ đầu tư.</p><p>Cụ thể, Phó Thủ tướng giao Bộ Giao thông vận tải chủ trì, phối hợp với Bộ Kế hoạch và Đầu tư, Bộ Tài chính và các cơ quan liên quan trình cấp có thẩm quyền xem xét, quyết định cụ thể cơ chế quản lý tài sản và cơ cấu nguồn vốn của 5 dự án đầu tư đường cao tốc do VEC làm chủ đầu tư để làm cơ sở ban hành Quy chế quản lý tài chính trong thời gian khai thác, thu phí đối với các dự án này.</p><p>Trên cơ sở đó, Bộ Giao thông vận tải trình Thủ tướng Chính phủ quyết định ban hành Quy chế quản lý tài chính trong thời gian khai thác, thu phí 5 dự án đường cao tốc do VEC làm chủ đầu tư theo đúng trình tự, thủ tục của Luật ban hành văn bản quy phạm pháp luật.</p><p><strong>Ban Chỉ đạo liên ngành Hội nhập quốc tế về kinh tế có 11 thành viên</strong></p><p>Phó Thủ tướng Vương Đình Huệ-Trưởng Ban Chỉ đạo liên ngành Hội nhập quốc tế về kinh tế vừa ký quyết định phê duyệt danh sách Ban Chỉ đạo này.</p><p>Theo quyết định, Bộ trưởng Bộ Công Thương Trần Tuấn Anh làm Phó Trưởng Ban.</p><p>Ủy viên Ban Chỉ đạo gồm: Thứ trưởng Bộ Công Thương Đỗ Thắng Hải (kiêm Tổng Thư ký); Phó Chủ nhiệm Văn phòng Chính phủ Nguyễn Sỹ Hiệp; Phó Thống đốc Ngân hàng Nhà nước Việt Nam Nguyễn Thị Hồng; Thứ trưởng Bộ Tài chính Trần Xuân Hà; Thứ trưởng Bộ Kế hoạch và Đầu tư Nguyễn Thế Phương; Thứ trưởng Bộ Nông nghiệp và Phát triển nông thôn Lê Quốc Doanh; Thứ trưởng Bộ Khoa học và Công nghệ Trần Quốc Khánh; Thứ trưởng Bộ Tài nguyên và Môi trường Nguyễn Linh Ngọc; Thứ trưởng Bộ Công Thương Trần Quốc Khánh, Trưởng đoàn Đàm phán Chính phủ về kinh tế và thương mại quốc tế.</p><p><strong>Chuẩn bị xây dựng đường bộ cao tốc Bắc-Nam</strong></p><p>Văn phòng Chính phủ vừa có thông báo kết luận của Phó Thủ tướng Trịnh Đình Dũng tại cuộc họp về chuẩn bị đầu tư Dự án đầu tư xây dựng công trình đường bộ cao tốc Bắc-Nam.</p><p>Thông báo kết luận nêu rõ, đây là dự án quan trọng quốc gia, vì vậy cần thực hiện bảo đảm chặt chẽ, đúng quy định, trình Thủ tướng Chính phủ, Chính phủ để trình Quốc hội thông qua chủ trương đầu tư, đáp ứng tiến độ yêu cầu.</p><p>Mục tiêu chính và yêu cầu đối với Dự án là hình thành tuyến đường bộ cao tốc Bắc-Nam đáp ứng năng lực vận tải lớn, tốc độ cao và an toàn; kết nối các trung tâm kinh tế, xã hội từ Hà Nội đến Thành phố Hồ Chí Minh, qua 20 tỉnh, thành phố; kết nối các khu kinh tế, khu công nghiệp, cảng biển nhằm phát triển kinh tế-xã hội những khu vực có đường cao tốc chạy qua nói riêng và cả đất nước nói chung; giảm thiểu áp lực và khai thác có hiệu quả hơn tuyến Quốc lộ 1; phù hợp với nguồn lực của đất nước, định hướng quy hoạch phát triển hạ tầng, trong đó có hạ tầng giao thông vận tải.</p><p>Về phương án đầu tư, Phó Thủ tướng Trịnh Đình Dũng giao Bộ Giao thông vận tải chỉ đạo Tư vấn hoàn thiện 2 phương án (Nhà nước hỗ trợ 63.000 tỷ đồng và 70.000 tỷ đồng), báo cáo Thủ tướng Chính phủ, Chính phủ quyết định trước khi trình Quốc hội. Nguồn vốn hỗ trợ của Nhà nước dành chủ yếu cho giải phóng mặt bằng và một phần cho đầu tư, phần còn lại (khoảng 70% tổng mức đầu tư) huy động từ nguồn xã hội hóa.</p><p>Để bảo đảm tiến độ triển khai Dự án, Phó Thủ tướng yêu cầu Bộ Kế hoạch và Đầu tư khẩn trương trình Thủ tướng Chính phủ thành lập Hội đồng thẩm định Nhà nước để thẩm định Dự án theo quy định. Bộ trưởng Bộ Kế hoạch và Đầu tư làm Chủ tịch Hội đồng, các thành viên là lãnh đạo các bộ, ngành theo quy định, mời thêm các chuyên gia có kinh nghiệm về kinh tế, kỹ thuật.</p><p>Bộ Giao thông vận tải chỉ đạo tư vấn chủ động lập các dự án đầu tư thành phần để triển khai xây dựng ngay sau khi Quốc hội thông qua chủ trương đầu tư toàn tuyến.</p><p>Bộ Giao thông vận tải phối hợp với Bộ Kế hoạch và Đầu tư, Bộ Tài chính và Ngân hàng Nhà nước Việt Nam hoàn thiện cơ chế đặc thù, trong đó có cơ chế huy động vốn đầu tư xã hội hóa, trình Chính phủ, Quốc hội phê duyệt theo thẩm quyền.</p><p><strong>Sớm đưa hai tuyến đường sắt đô thị vào hoạt động</strong></p><p>Phó Thủ tướng Trịnh Đình Dũng yêu cầu các bộ, cơ quan, đơn vị khẩn trương bảo đảm chất lượng, an toàn và tiến độ triển khai dự án, sớm đưa hai tuyến đường sắt đô thị Cát Linh-Hà Đông và Nhổn-ga Hà Nội vào hoạt động, góp phần giảm ùn tắc giao thông trên địa bàn Thành phố.</p><p>Trên địa bàn Hà Nội, hiện đang thi công Dự án đường sắt đô thị Hà Nội, tuyến số 2A, đoạn Cát Linh-Hà Đông, Dự án đường sắt đô thị Hà Nội, tuyến số 3, đoạn Nhổn-ga Hà Nội. Đây là hai dự án đường sắt đô thị đầu tiên được triển khai, là hai công trình quan trọng của Hà Nội và cả nước, luôn được Chính phủ, Thủ tướng Chính phủ hết sức quan tâm tháo gỡ khó khăn, vướng mắc để sớm được hoàn thành, đưa vào khai thác, sử dụng, góp phần giảm ùn tắc giao thông tại Thủ đô.</p><p>Qua kiểm tra, Dự án đường sắt đô thị Hà Nội, tuyến số 2A, đoạn Cát Linh-Hà Đông đã hoàn thành 90% khối lượng xây lắp. Dự án đường sắt đô thị Hà Nội, tuyến số 3, đoạn Nhổn-ga Hà Nội đến nay đã hoàn thành khoảng 30% khối lượng xây lắp. Về tiến độ, dù đã nhiều lần được điều chỉnh nhưng cả hai dự án đều chậm so với yêu cầu nên ảnh hưởng đến việc giảm ùn tắc giao thông tại Thủ đô Hà Nội.</p><p>Để bảo đảm chất lượng, an toàn và tiến độ triển khai dự án, sớm đưa hai tuyến đường sắt đô thị Cát Linh-Hà Đông và Nhổn-ga Hà Nội vào hoạt động, góp phần giảm ùn tắc giao thông trên địa bàn Thành phố, Phó Thủ tướng yêu cầu các bộ, cơ quan, đơn vị khẩn trương thực hiện một số nhiệm vụ.</p><p>Đối với đoạn Cát Linh-Hà Đông, Bộ Giao thông vận tải tiếp tục chỉ đạo Ban Quản lý dự án Đường sắt và các nhà thầu đẩy nhanh tiến độ thực hiện dự án; bảo đảm: phần xây lắp, trang trí kiến trúc khu Depot hoàn thành trước ngày 31/3/2017; phần lắp đặt thiết bị hoàn thành trước ngày 31/7/2017; đóng điện toàn tuyến trước ngày 1/9/2017; vận hành thử nghiệm toàn tuyến Cát Linh-Hà Đông theo đúng kế hoạch vào ngày 30/9/2017.</p><p>Bộ Giao thông vận tải chỉ đạo tuyển chọn tư vấn nước ngoài độc lập, có đủ năng lực đánh giá an toàn hệ thống trước và trong quá trình vận hành chạy thử. Thực hiện tổng kiểm tra toàn bộ công trình trước khi chạy thử để bảo đảm tuyệt đối an toàn.</p><p>Còn đối với đoạn Nhổn-ga Hà Nội, UBND thành phố Hà Nội chỉ đạo quyết liệt, xử lý dứt điểm các khó khăn trong công tác giải phóng mặt bằng, đấu thầu... Đặc biệt, đối với 4 km đường ngầm, cần tập trung giải quyết triệt để các vướng mắc để sớm hoàn thành công tác giải phóng mặt bằng tại 4 ga ngầm; chỉ đạo sát sao các cơ quan, đơn vị liên quan phối hợp chặt chẽ trong quá trình thi công, bảo đảm chất lượng, tuyệt đối an toàn và tiến độ theo đúng kế hoạch.</p><p>Phó Thủ tướng cũng yêu cầu các đơn vị phải bảo đảm tuyệt đối an toàn cho người lao động; đặc biệt bảo đảm an toàn cho người và các phương tiện tham gia giao thông. Trong quá trình thi công, Bộ Giao thông vận tải và UBND thành phố Hà Nội chỉ đạo thực hiện nghiêm ngặt quy định về an toàn lao động, an toàn giao thông, vệ sinh môi trường và phòng cháy, chữa cháy gắn với bảo đảm chất lượng công trình.</p><p>Về bảo đảm chất lượng công trình, Bộ Xây dựng tiếp tục rà soát, hoàn thiện các tiêu chuẩn, quy chuẩn kỹ thuật, định mức dự toán xây dựng phù hợp với tính chất đặc thù của các dự án đường sắt đô thị. Hội đồng nghiệm thu Nhà nước các công trình xây dựng tăng cường hướng dẫn, kiểm tra chất lượng và công tác quản lý chất lượng, bảo đảm công trình được thi công đáp ứng yêu cầu thiết kế; thực hiện nghiệm thu và kiểm tra công tác nghiệm thu của chủ đầu tư, các nhà thầu theo đúng quy định pháp luật.</p><p>Về kiến trúc công trình, Bộ Giao thông vận tải và UBND thành phố Hà Nội lưu ý chất lượng kiến trúc công trình; đặc biệt, phải coi công trình nhà ga đường sắt đô thị là công trình văn hóa, cần bảo đảm thẩm mỹ, văn hóa và tiện lợi nhất cho hành khách.</p><p>Phó Thủ tướng yêu cầu các bộ, ngành và UBND thành phố Hà Nội cần chủ động nghiên cứu cơ chế huy động nguồn lực xã hội trong nước hoặc nước ngoài thông qua các hình thức đối tác công-tư để triển khai đầu tư xây dựng các tuyến đường sắt đô thị còn lại theo quy hoạch; tạo điều kiện cho doanh nghiệp Việt Nam tham gia triển khai dự án, nhằm nâng cao tỷ lệ nội địa hóa, giảm chi phí xây dựng, phát triển năng lực doanh nghiệp trong nước./.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(19, '', '', '<p>Trước đó, báo Thanh tra số 53 ra ngày 01/7/2016 có bài &quot;Biến đất công thành tư, Chủ tịch huyện thoát tội&quot; phản ánh việc ông Lê Công Lộc tự ý san lấp gần 1.000 m2 đất nông nghiệp thuê của thôn Lễ Pháp, xã Tiên Dương, huyện Đông Anh, Thành phố Hà Nội và được Chủ tịch UBND huyện Đông Anh cấp &quot;sổ đỏ&quot; đất ở lâu dài do bố mẹ để lại.</p><p>Vụ việc bị phát giác, Cơ quan Cảnh sát điều tra, Công an Thành phố Hà Nội đã khởi tố vụ án &quot;Lợi dụng chức vụ quyền hạn trong khi thi hành công vụ&quot; nhưng chỉ có một số cán bộ xã Tiên Dương bị truy tố, làm cho người dân bức xúc, cho rằng sai phạm là nghiêm trọng, có hệ thống, có sự bao che cho số cán bộ huyện Đông Anh có liên quan.</p><p>Theo báo cáo của Ủy ban nhân dân thành phố Hà Nội và báo cáo của Công an thành phố Hà Nội thì hành vi của các ông Tô Văn Minh (nguyên Chủ tịch Ủy ban nhân dân huyện Đông Anh), Nguyễn Tuấn Đức (cán bộ Văn phòng đăng ký đất đai huyện Đông Anh), Đỗ Quốc Đính (nguyên Giám đốc Văn phòng đăng ký đất đai huyện Đông Anh) và Phạm Văn Châm (Chủ tịch Ủy ban nhân dân huyện Đông Anh) có dấu hiệu &quot;Tội thiếu trách nhiệm gây hậu quả nghiêm trọng&quot; (Điều 285 Bộ luật hình sự năm 1999). Nếu các đối tượng nêu trên tư lợi thì có dấu hiệu &quot;Tội lợi dụng chức vụ quyền hạn trong khi thi hành công vụ&quot; (Điều 281 Bộ luật hình sự năm 1999).</p><p>Để đảm bảo kỷ cương pháp luật và sự bình đẳng, công bằng trong tuân thủ pháp luật, Phó Thủ tướng Trương Hòa Bình đã yêu cầu Chủ tịch Ủy ban nhân dân thành phố Hà Nội chỉ đạo Công an thành phố Hà Nội điều tra làm rõ các hành vi vi phạm của các đối tượng nêu trên và xem xét hành vi vi phạm của ông Lê Công Lộc để xử lý nghiêm, đúng pháp luật.</p><p>Trên cơ sở báo cáo của Ủy ban nhân dân thành phố Hà Nội, Phó Thủ tướng chỉ đạo một số trường hợp, cơ quan điều tra đã xác định hành vi có dấu hiệu &quot;Tội thiếu trách nhiệm gây hậu quả nghiêm trọng&quot; nhưng chỉ xử lý hành chính là không đúng quy định của pháp luật. Yêu cầu Chủ tịch Ủy ban nhân dân thành phố Hà Nội thực hiện nghiêm túc, đầy đủ ý kiến chỉ đạo của Thủ tướng Chính phủ tại văn bản số 7718/VPCP-V.I ngày 15/6/2016 của Văn phòng Chính phủ, báo cáo kết quả điều tra, xử lý vụ án lên Thủ tướng Chính phủ.<br  />&nbsp;</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(20, '', '', 'Trước yêu cầu đổi mới công nghệ cũng như đòi hỏi từ thực tế phải tiết kiệm điện, tăng hiệu quả sản xuất kinh doanh, Tổng công ty Điện lực Hà Nội (EVN Hà Nội) đã lắp đặt hệ thống pin mặt trời cho Trung tâm sửa chữa điện nóng (hotline) Yên Nghĩa (thuộc Công ty Lưới điện cao thế Hà Nội). Thời gian sử dụng bước đầu cho kết quả khả quan, tiệt kiệm đáng kể điện năng và được EVN Hà Nội nhân rộng.<p>Cuối năm 2016, khi khánh thành Trung tâm sửa chữa điện nóng cũng là lúc EVN Hà Nội cho lắp đặt 78 tấm pin 260 Wp. Để vận hành những tấm pin trên, EVN Hà Nội cho triển khai thêm hệ thống kích điện từ 48V lên 220 V xoay chiều. Nhờ đó, sản lượng điện từ những tấm pin đã đạt được mức tối đa, bình quân mỗi ngày &quot;nhà máy điện&quot; sản xuất được trên 49,9 kWh điện.</p><p>Kỹ sự Anh Dương Anh Tùng, người lắp đặt, theo dõi hoạt động của hệ thống tấm pin năng lượng mặt trời tại Trung tâm nói trên cho biết, sản lượng điện tùy thuộc vào thời tiết, những ngày nắng nóng sẽ sản xuất nhiều điện năng hơn ngày thời tiết râm mát.</p><p>Vào ban ngày, lượng ánh sáng lớn, hệ pin không những sản xuất ra điện đáp ứng việc sử dụng trong sinh hoạt của tại Trung tâm mà còn dư thừa điện năng. Với việc dư thừa điện này, lãnh đạo đơn vị đã yêu cầu các kỹ sư nghiên cứu và đưa điện thành công lên hệ thống điện lưới quốc gia, tránh việc lãng phí điện năng.</p><p>Kỹ sư Tùng còn cho biết tổng mức đầu tư của hệ thống pin năng lượng mặt trời là dưới 800 triệu đồng, theo đó mỗi tháng đơn vị tiết kiệm được khoảng hơn 2.151 kWh điện, tương đương 4-5 triệu đồng.</p><p>Theo Giám đốc Công ty Lưới điện cao thế Hà Nội Phạm Đại Nghĩa, hiện nay mái nhà của nhiều đơn vị, doanh nghiệp rất phù hợp với việc lắp đặt hệ thống pin năng lượng mặt trời để sản xuất điện. Việc lắp hệ thống này sẽ giảm đáng kể điện năng trong một tháng, góp phần giảm áp lực vì thiếu điện sinh hoạt và sản xuất vào mùa nắng nóng.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(21, '', '', '<p>Ngày 21/3, tại buổi giao ban báo chí Thành ủy Hà Nội, ông Phạm Quý Tiên, Chánh Văn phòng kiêm Người phát ngôn UBND thành phố Hà Nội cho biết, cho đến thời điểm hiện tại, thành phố Hà Nội chưa đồng ý cho một đơn vị tư vấn nước ngoài nào tham gia lập Quy hoạch phân khu đô thị sông Hồng.</p><p>Theo đó, thực hiện quy hoạch chung xây dựng Thủ đô được Thủ tướng Chính phủ phê duyệt tại Quyết định số 1259/QĐ-TTg ngày 26/7/2011; Quy hoạch phòng chống lũ và quy hoạch đê điều hệ thống sông Hồng, sông Thái Bình được Thủ tướng Chính phủ phê duyệt tại Quyết định số 257/QĐ-TTg ngày 18/2/2016, UBND thành phố Hà Nội đã giao cho Viện Quy hoạch Xây dựng Hà Nội triển khai lập các quy hoạch phân khu; trong đó, có Quy hoạch phân khu đô thị sông Hồng (Quy hoạch dọc hai bên bờ sông Hồng).</p><p>Trên cơ sở đề xuất của 3 nhà đầu tư gồm: Công ty cổ phần Tập đoàn Mặt trời, Tập đoàn Vingroup – CTCP và Công ty cổ phần Xuất nhập khẩu Tổng hợp Hà Nội đề xuất Thành phố chấp thuận được tự nguyện đóng góp tài chính cho việc nghiên cứu trị thủy, quy hoạch phân khu đô thị sông Hồng, Thành phố đã có chủ trương tiếp nhận tài trợ của 3 đơn vị trên. Đồng thời giao Viện Quy hoạch Xây dựng Hà Nội phối hợp với 3 nhà đầu tư lựa chọn các đơn vị tư vấn trong và ngoài nước có đủ điều kiện, năng lực, kinh nghiệm để nghiên cứu, đưa ra ý tưởng, phương án thực hiện đồ án.</p><p>UBND Thành phố đã chỉ đạo Sở Quy hoạch – Kiến trúc là đơn vị đầu mối chủ trì phối hợp với Viện Quy hoạch xây dựng Hà Nội và các sở, ngành, đơn vị liên quan tập hợp toàn bộ các tài liệu, thông tin liên quan phục vụ cho công tác nghiên cứu, lập đồ án Quy hoạch hai bên bờ sông Hồng gồm: Các hồ sơ thiết kế quy hoạch, kiến trúc, xây dựng của các đơn vị tư vấn trước đây đã nghiên cứu liên quan dọc hai bên sông Hồng; thông tin về chỉ số thủy văn, chiều dài đê-đường; thực trạng cơ sở hạ tầng, dân số hai bên bờ sông Hồng, diện tích đất đai; đánh giá sự thay đổi của mực nước sông, sau khi có hệ thống thủy điện được xây dựng trên thượng nguồn các sông Đà và sông Lô trong thời gian vừa qua.</p><p>Các chỉ số thông tin trên đều là những tài liệu công khai, được công bố rộng rãi tại các đề tài nghiên cứu, tài liệu chuyên ngành và phương tiện thông tin đại chúng, không liên quan đến lĩnh vực an ninh, quốc phòng. Hệ thống tài liệu, thông tin này sẽ được sử dụng để phục vụ cho các nhà tư vấn nghiên cứu, đưa ra ý tưởng thực hiện đồ án quy hoạch.</p><p>UBND Thành phố đã đưa ra những tiêu chí, yêu cầu chặt chẽ đảm bảo việc đưa ý tưởng vào thực tiễn. Sau khi các nhà đầu tư, tư vấn trình bày ý tưởng thực hiện đồ án quy hoạch, Thành phố sẽ tiến hành xem xét, lựa chọn những ý tưởng đảm bảo tính khả thi, đảm bảo các tiêu chí, yêu cầu đặt ra, báo cáo cơ quan có thẩm quyền thì mới cho phép triển khai nghiên cứu thực hiện đồ án.</p><p>&quot;Đến thời điểm hiện tại, Thành phố chưa quyết định lựa chọn đơn vị tư vấn nước ngoài nào tham gia thực hiện lập đồ án Quy hoạch dọc hai bên bờ sông Hồng&quot;, ông Phạm Qúy Tiên khẳng định.</p><p>Thời gian qua việc một số cơ quan báo chí đăng tải thông tin với tít bài “Viện Thiết kế Trung Quốc lập quy hoạch hai bên bờ sông Hồng” và nội dung như vậy là chưa đúng.</p><p>Chánh văn phòng UBND thành phố Hà Nội đề nghị các cơ quan báo chí đính chính thông tin; đăng tải bài viết trên cơ sở được kiểm chứng từ người có trách nhiệm phát ngôn của UBND thành phố Hà Nội, tránh việc giật tít để dư luận hiểu sai, làm ảnh hưởng đến tình hình an ninh chính trị của thành phố Hà Nội nói riêng và cả nước nói chung./.</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0), 
(22, '', '', 'Tại buổi tiếp, hoan nghênh Đô trưởng Sinlavong Khoutphaythoune sang thăm Việt Nam, làm việc với thành phố Hà Nội, Thủ tướng cho rằng, chuyến thăm có ý nghĩa quan trọng nhằm tăng cường hợp tác giữa hai Thủ đô Hà Nội, Vientiane.<p>Thủ tướng bày tỏ vui mừng trước việc quan hệ hai Đảng, hai Nhà nước ngày càng gắn bó và thời gian qua, hai nước thường xuyên duy trì hoạt động trao đổi Đoàn, từ cấp cao đến các bộ, ngành và các địa phương.</p><p>Thủ tướng đánh giá cao kết quả và định hướng hợp tác giữa hai Thủ đô Hà Nội, Vientiane trên các lĩnh vực và mong muốn hai bên tiếp tục triển khai những hoạt động trao đổi, hợp tác, giao lưu chia sẻ kinh nghiệm, hỗ trợ lẫn nhau cùng phát triển.&nbsp;</p><p>Thông báo với Thủ tướng về những thành tựu trong hợp tác giữa hai thành phố Hà Nội, Vientiane, Đô trưởng Sinlavong Khoutphaythoune cho biết, trên cơ sở tình đồng chí anh em, lãnh đạo hai bên đã ký kết Biên bản ghi nhớ thúc đẩy hợp tác trong tương lai.<br  /><br  />&nbsp;</p><div style=\"text-align:center\"><img alt=\"NQH 1380\" height=\"1001\" src=\"/uploads/news/2017_06/nqh_1380.jpg\" width=\"1500\" /></div>&nbsp;<p>Đô trưởng Sinlavong Khoutphaythoune bày tỏ mong muốn quá trình hợp tác giữa hai Thủ đô luôn được sự quan tâm, ủng hộ của Thủ tướng Nguyễn Xuân Phúc. Nhân dịp này, Đô trưởng Thủ đô Vientiane Sinlavong Khoutphaythoune trân trọng cảm ơn Đảng, Nhà nước và nhân dân Việt Nam, Đảng bộ, chính quyền và nhân dân Hà Nội đã luôn quan tâm, hỗ trợ Thủ đô Vientiane trong phát triển.</p><p>Đô trưởng Sinlavong Khoutphaythoune khẳng định sẽ làm hết sức mình góp phần thúc đẩy quan hệ Lào-Việt Nam, tuyên truyền cho thế hệ trẻ hai nước hiểu được tình cảm, sự gắn bó giữa hai Đảng, Nhà nước, nhân dân hai nước và hai Thủ đô.</p><p>Đồng tình với các kiến nghị, đề xuất của Đô trưởng Thủ đô Vientiane Sinlavong Khoutphaythoune, Thủ tướng nhấn mạnh, quan hệ hợp tác giữa các bộ, ngành, địa phương là một yếu tố có ý nghĩa rất quan trọng trong việc thúc đẩy quan hệ hợp tác giữa hai Đảng, hai Nhà nước Việt Nam, Lào. Vì vậy các bộ, ngành và địa phương hai nước, trong đó có hai Thủ đô Hà Nội, Vientiane, cần gương mẫu đi đầu trong việc xúc tiến các chương trình hợp tác, nhất là hỗ trợ, hợp tác về kỹ thuật để xây dựng Thủ đô thông minh, xanh, sạch, đẹp.</p><p>Thủ tướng mong muốn hai bên tăng cường trao đổi, chia sẻ những điều kiện đặc thù và bài học kinh nghiệm trong tiến trình xây dựng và phát triển Thủ đô, đặc biệt là coi trọng hàng đầu công tác quy hoạch. Thủ tướng khẳng định, Chính phủ Việt Nam và Thủ đô Hà Nội sẽ làm hết sức mình đóng góp vào việc xây dựng và phát triển Thủ đô&nbsp;<br  />&nbsp;</p>', 'http://baochinhphu.vn', 2, 0, 1, 1, 1, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_logs`
--

DROP TABLE IF EXISTS `nv4_vi_news_logs`;
CREATE TABLE `nv4_vi_news_logs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `sid` mediumint(8) NOT NULL DEFAULT '0',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL,
  `set_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_rows`
--

DROP TABLE IF EXISTS `nv4_vi_news_rows`;
CREATE TABLE `nv4_vi_news_rows` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `listcatid` varchar(255) NOT NULL DEFAULT '',
  `topicid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author` varchar(250) DEFAULT '',
  `sourceid` mediumint(8) NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `edittime` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `publtime` int(11) unsigned NOT NULL DEFAULT '0',
  `exptime` int(11) unsigned NOT NULL DEFAULT '0',
  `archive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` text NOT NULL,
  `homeimgfile` varchar(255) DEFAULT '',
  `homeimgalt` varchar(255) DEFAULT '',
  `homeimgthumb` tinyint(4) NOT NULL DEFAULT '0',
  `inhome` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowed_comm` varchar(255) DEFAULT '',
  `allowed_rating` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `external_link` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hitscm` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `total_rating` int(11) NOT NULL DEFAULT '0',
  `click_rating` int(11) NOT NULL DEFAULT '0',
  `instant_active` tinyint(1) NOT NULL DEFAULT '0',
  `instant_template` varchar(100) NOT NULL DEFAULT '',
  `instant_creatauto` tinyint(1) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM  AUTO_INCREMENT=42  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_rows`
--

INSERT INTO `nv4_vi_news_rows` VALUES
(32, 15, '15', 0, 1, '', 5, 1498619689, 1498699932, 1, 1498619640, 0, 2, 'Hà Nội sẽ đầu tư nhiều bệnh viện ngang tầm quốc tế', 'ha-noi-se-dau-tu-nhieu-benh-vien-ngang-tam-quoc-te', 'Hà Nội sẽ đầu tư nguồn ngân sách lớn để phát triển ngành y tế. Đến năm 2019 sẽ đưa Bệnh viện (BV) Saint Paul đạt tiêu chuẩn quốc tế.', '2017_06/1_92972.jpg', '', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(33, 14, '14', 0, 1, '', 5, 1498619763, 1498699951, 1, 1498619700, 0, 2, 'Bảo tồn Hoàng thành Thăng Long&#x3A; Không làm nhỏ lẻ', 'bao-ton-hoang-thanh-thang-long-khong-lam-nho-le', 'Chủ tịch UBND TP. Hà Nội khẳng định Hà Nội đã chuẩn bị sẵn nguồn vốn cho dự án quan trọng này, phấn đấu đến năm 2020, Hoàng thành Thăng Long cơ bản được đầu tư bảo tồn.', '2017_06/hoang-thanh-thang-long-2.jpg', '', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(31, 16, '16', 0, 1, 'Xuân Tuyến', 5, 1498619568, 1498699926, 1, 1498619400, 0, 2, 'Rà soát, thực hiện nghiêm quy hoạch để có một Hà Nội đẹp hơn', 'ra-soat-thuc-hien-nghiem-quy-hoach-de-co-mot-ha-noi-dep-hon', 'Kết luận cuộc làm việc với lãnh đạo các Bộ, ngành và UBND TP. Hà Nội về quy hoạch phát triển kết cấu hạ tầng kinh tế kỹ thuật của Thủ đô, Phó Thủ tướng Trịnh Đình Dũng yêu cầu Hà Nội, các Bộ, ngành cần rà soát lại quy hoạch để điều chỉnh, hoàn thiện, đồng thời nghiêm túc thực hiện theo quy hoạch để có một Thủ đô giàu đẹp, văn minh.', '2017_06/5j3a0202.jpg', '5J3A0202', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(30, 15, '15', 0, 1, 'Phan Trang', 5, 1498619405, 1498699911, 1, 1498619340, 0, 2, 'Giao thông Thủ đô&#x3A; Kết nối tốt sẽ tạo ra động lực mới', 'giao-thong-thu-do-ket-noi-tot-se-tao-ra-dong-luc-moi', 'Cần chú ý kết nối giao thông đô thị trung tâm Hà Nội với các đô thị vệ tinh. Kết nối tốt sẽ tạo ra động lực mới, khu vực nào chưa phát triển thì cần giao thông kết nối để hấp dẫn nhà đầu tư hơn và giảm áp lực cho nội đô', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(29, 15, '15', 0, 1, 'Phương Nhi', 5, 1498618201, 1498699905, 1, 1498617780, 0, 2, 'Điều chỉnh Quy hoạch cấp nước Hà Nội', 'dieu-chinh-quy-hoach-cap-nuoc-ha-noi', 'Phó Thủ tướng Trịnh Đình Dũng đồng ý về nguyên tắc chủ trương điều chỉnh Quy hoạch cấp nước Hà Nội đến năm 2030, tầm nhìn đến năm 2050.', '2017_06/resize-of-capnuoc.jpg', 'Resize of capnuoc', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(28, 15, '15', 0, 1, 'Phương Nhi', 5, 1498617803, 1498699791, 1, 1498617720, 0, 2, 'Sớm đưa hai tuyến đường sắt đô thị vào hoạt động', 'som-dua-hai-tuyen-duong-sat-do-thi-vao-hoat-dong', 'Phó Thủ tướng Trịnh Đình Dũng yêu cầu các Bộ, cơ quan, đơn vị khẩn trương bảo đảm chất lượng, an toàn và tiến độ triển khai dự án, sớm đưa hai tuyến đường sắt đô thị Cát Linh - Hà Đông và Nhổn - ga Hà Nội vào hoạt động, góp phần giảm ùn tắc giao thông trên địa bàn Thành phố.', '2017_06/resize-of-61.jpg', 'Resize of 61', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(27, 15, '15', 0, 1, 'Phan Trang', 5, 1498617732, 1498699785, 1, 1498617660, 0, 2, 'Loại bỏ xe máy cũ nát&#x3A; Cần thiết nhưng phải có lộ trình', 'loai-bo-xe-may-cu-nat-can-thiet-nhung-phai-co-lo-trinh', 'Thực tế, việc thu hồi xe máy cũ, nát đã được các bộ, ngành, đặc biệt là Bộ GTVT xúc tiến với &quot;Đề án kiểm soát khí thải xe gắn máy&quot; từ khá lâu nhưng đến nay vẫn chưa thể thành hiện thực do chưa thống nhất được phương án, lộ trình triển khai cụ thể', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(25, 16, '16', 0, 1, '', 5, 1498617632, 1498699774, 1, 1498617600, 0, 2, 'Hà Nội&#x3A; Xây bãi xe ngầm 5 tầng tại một số công viên', 'ha-noi-xay-bai-xe-ngam-5-tang-tai-mot-so-cong-vien', 'Lãnh đạo Thành phố Hà Nội thống nhất quy mô dự án bãi đỗ xe ngầm tại công viên Thống Nhất, công viên Nhân Chính cùng với quy mô 5 tầng gồm một tầng thương mại và 4 tầng để xe.', '', '', 0, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(26, 16, '16', 0, 1, '', 5, 1498617678, 1498698139, 1, 1498617600, 0, 2, 'Hà Nội&#x3A; Thiết kế của ga S9 bảo đảm an toàn cho cộng đồng', 'ha-noi-thiet-ke-cua-ga-s9-bao-dam-an-toan-cho-cong-dong', 'Thực hiện chỉ đạo của UBND TP. Hà Nội, Sở Quy hoạch – Kiến trúc đã có thông tin phản hồi kiến nghị của ông Trần Dũng Sơn về bất hợp lý trong thiết kế hệ thống thông gió Nhà ga ngầm S9 thuộc Dự án Đường sắt đô thị Nhổn – ga Hà Nội đoạn qua phường Ngọc Khánh, quận Ba Đình.', '', '', 0, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(24, 15, '15', 0, 1, '', 5, 1498617454, 1498698130, 1, 1498617420, 0, 2, 'Thông tin chỉ đạo, điều hành của Chính phủ, Thủ tướng Chính phủ', 'thong-tin-chi-dao-dieu-hanh-cua-chinh-phu-thu-tuong-chinh-phu', 'Thông cáo báo chí của VPCP về thông tin chỉ đạo, điều hành của Chính phủ, Thủ tướng Chính phủ ngày 27/2/2017', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(23, 14, '14', 0, 1, 'BP', 5, 1498616847, 1498698123, 1, 1498616580, 0, 2, 'Tăng 30 chuyến tàu phục vụ đợt cao điểm nghỉ lễ', 'tang-30-chuyen-tau-phuc-vu-dot-cao-diem-nghi-le', 'Nhằm đáp ứng nhu cầu đi lại của người dân trong dịp nghỉ lễ Giỗ Tổ Hùng Vương và dịp lễ 30/4, 1/5, ngành đường sắt dự kiến sẽ tăng thêm hơn 30 chuyến tàu từ Bắc vào Nam để phục vụ đợt cao điểm này', '2017_06/ch-mc.jpg', 'chỉ mục', 1, 1, '4', 1, 0, 4, 0, 0, 0, 0, '', 0), 
(22, 14, '14', 0, 1, 'Đức Tuân', 5, 1498616564, 1498698116, 1, 1498616220, 0, 2, 'Thủ tướng hoan nghênh định hướng hợp tác giữa Hà Nội và Vientiane, Lào', 'thu-tuong-hoan-nghenh-dinh-huong-hop-tac-giua-ha-noi-va-vientiane-lao', 'Chiều 27/3, tại Trụ sở Chính phủ, Thủ tướng Nguyễn Xuân Phúc đã tiếp Ủy viên Bộ Chính trị Đảng Nhân dân cách mạng Lào, Bí thư Thành ủy, Đô trưởng Thủ đô Vientiane Sinlavong Khoutphaythoune.', '2017_06/nqh_1356.jpg', 'NQH 1356', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(20, 17, '17', 0, 1, 'Bích Phương', 5, 1498616118, 1498698104, 1, 1498616040, 0, 2, 'Tiết kiệm điện nhờ pin năng lượng mặt trời', 'tiet-kiem-dien-nho-pin-nang-luong-mat-troi', 'Kết quả sau thời gian thử nghiệm lắp đặt hệ thống pin mặt trời cho Trung tâm sửa chữa điện nóng Yên Nghĩa (thuộc Công ty Lưới điện cao thế Hà Nội) cho thấy lượng điện năng tiết kiệm được đáng kể, khoảng hơn 2.000 kWh/tháng', '2017_06/nlmt.jpg', '', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(21, 17, '17', 0, 1, '', 5, 1498616238, 1498698109, 1, 1498616160, 0, 2, 'Quy hoạch sông Hồng&#x3A; Hà Nội đề nghị đính chính', 'quy-hoach-song-hong-ha-noi-de-nghi-dinh-chinh', 'Chánh văn phòng kiêm Người phát ngôn của UBND thành phố Hà Nội đề nghị các cơ quan báo chí đính chính thông tin; đăng tải bài viết trên cơ sở được kiểm chứng từ người có trách nhiệm phát ngôn của UBND Thành phố Hà Nội, tránh việc giật tít để dư luận hiểu sai, làm ảnh hưởng đến tình hình an ninh chính trị của thành phố Hà Nội nói riêng và cả nước nói chung.', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(19, 16, '16', 0, 1, 'Minh Hiển', 5, 1498615731, 1498698100, 1, 1498615620, 0, 2, 'Phó Thủ tướng chỉ đạo xử lý vụ &quot;biến đất công thành tư&#039;', 'pho-thu-tuong-chi-dao-xu-ly-vu-bien-dat-cong-thanh-tu', 'Phó Thủ tướng Thường trực Trương Hòa Bình vừa có ý kiến chỉ đạo về việc xử lý vi phạm trong lĩnh vực đất đai tại xã Tiên Dương, huyện Đông Anh, thành phố Hà Nội theo nội dung phản ánh của báo Thanh tra số 53 ra ngày 1/7/2016 với bài &quot;Biến đất công thành tư, Chủ tịch huyện thoát tội&quot;.', '2017_06/resize-of-dat.jpg', 'Resize of dat', 1, 1, '4', 1, 0, 4, 0, 0, 0, 0, '', 0), 
(34, 14, '14', 0, 1, 'Thanh Hằng', 5, 1498619831, 1498699956, 1, 1498619760, 0, 2, 'Xử nghiêm vụ lạm quyền tại quản lý thị trường Hà Nội', 'xu-nghiem-vu-lam-quyen-tai-quan-ly-thi-truong-ha-noi', 'Thủ tướng Chính phủ Nguyễn Xuân Phúc vừa yêu cầu xử lý nghiêm các đơn vị, cá nhân có sai phạm trong vụ việc kiểm tra sản phẩm xúc xích nhãn hiệu Viet Foods.', '', '', 0, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(35, 14, '14', 0, 1, '', 5, 1498619875, 1498699968, 1, 1498619820, 0, 2, 'Hơn 7.600 tỷ đồng đầu tư thiết bị dự án đường sắt Nhổn-Ga Hà Nội', 'hon-7-600-ty-dong-dau-tu-thiet-bi-du-an-duong-sat-nhon-ga-ha-noi', 'Dự án đường sắt Nhổn-Ga Hà Nội sẽ có 10 đoàn tàu, mỗi đoàn 4 toa với sức chứa khoảng 900 khách, tốc độ tối đa là 80 km/h.', '', '', 0, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0), 
(39, 17, '17', 0, 1, 'Minh Hiển', 5, 1498643148, 1498699996, 1, 1498643100, 0, 2, 'Hà Nội phải bố trí đủ quỹ đất xây dựng nhà ở xã hội', 'ha-noi-phai-bo-tri-du-quy-dat-xay-dung-nha-o-xa-hoi', 'Phó Thủ tướng Trịnh Đình Dũng vừa có ý kiến chỉ đạo về chủ trương nộp bằng tiền theo giá đất đối với quỹ nhà ở xã hội thuộc Dự án khu đô thị mới Tây Mỗ - Đại Mỗ tại các phường Tây Mỗ, Đại Mỗ, quận Nam Từ Liêm, Hà Nội và Dự án khu chức năng đô thị tại 233 - 233B - 235 Nguyễn Trãi, quận Thanh Xuân, Hà Nội.', '2017_06/resize-of-bat-dong-san-ha-noi.jpg', 'Resize of bat dong san ha noi', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(37, 17, '17', 0, 1, 'PV', 5, 1498642855, 1498699975, 1, 1498642800, 0, 2, 'Hà Nội triển khai các giải pháp cấp bách bảo vệ môi trường', 'ha-noi-trien-khai-cac-giai-phap-cap-bach-bao-ve-moi-truong', 'Với mục tiêu tạo chuyển biến căn bản trong công tác bảo vệ môi trường đến năm 2020, UBND TP. Hà Nội đã đưa ra những nhiệm vụ và giải pháp cấp bách.', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(38, 17, '17', 0, 1, '', 5, 1498642911, 1498699993, 1, 1498642860, 0, 2, 'Hà Nội&#x3A; Kiểm tra phản ánh về bất cập của thiết kế nhà ga ngầm', 'ha-noi-kiem-tra-phan-anh-ve-bat-cap-cua-thiet-ke-nha-ga-ngam', 'Qua Cổng TTĐT Chính phủ, ông Trần Dũng Sơn (TP. Hà Nội) phản ánh bất hợp lý trong thiết kế Nhà ga ngầm S9 thuộc Dự án Đường sắt đô thị Nhổn – ga Hà Nội đoạn qua phường Ngọc Khánh, quận Ba Đình và đề nghị cơ quan có thẩm quyền xem xét điều chỉnh.', '', '', 0, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(40, 17, '17', 0, 1, 'Nguyễn Hoàng', 5, 1498643260, 1498709455, 1, 1498643160, 0, 2, 'Tạo cơ chế tài chính mới góp phần thúc đẩy phát triển Thủ đô', 'tao-co-che-tai-chinh-moi-gop-phan-thuc-day-phat-trien-thu-do', 'Chiều 20/12, Ủy ban Thường vụ Quốc hội (UBTVQH) đã xem xét, cho ý kiến về dự thảo Nghị định của Chính phủ quy định về một số cơ chế, chính sách tài chính-ngân sách đặc thù đối với Hà Nội.', '2017_06/110246baoxaydung_t4_2.jpg', '', 1, 1, '4', 1, 0, 4, 0, 0, 0, 0, '', 0), 
(41, 17, '17', 0, 1, 'PV', 5, 1498643588, 1498698095, 1, 1482217320, 0, 2, 'Hà Nội quy hoạch công viên cây xanh kết hợp đô thị ven sông Hồng', 'ha-noi-quy-hoach-cong-vien-cay-xanh-ket-hop-do-thi-ven-song-hong', 'Thực hiện ý kiến chỉ đạo của UBND TP. Hà Nội về việc lập quy hoạch hai bên sông Hồng theo định hướng xây dựng công viên kết hợp với đô thị, Sở Quy hoạch-Kiến trúc Hà Nội sẽ thực hiện theo hướng mời tư vấn quốc tế nghiên cứu quy hoạch hai bên sông Hồng.', '2017_06/thanhphovensonghong-f53ef-copy.jpg', 'thanhphovensonghong f53ef Copy', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_sources`
--

DROP TABLE IF EXISTS `nv4_vi_news_sources`;
CREATE TABLE `nv4_vi_news_sources` (
  `sourceid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `logo` varchar(255) DEFAULT '',
  `weight` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) unsigned NOT NULL,
  `edit_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`sourceid`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  AUTO_INCREMENT=6  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_sources`
--

INSERT INTO `nv4_vi_news_sources` VALUES
(1, 'Báo Hà Nội Mới', 'http://hanoimoi.com.vn', '', 1, 1274989177, 1274989177), 
(2, 'VINADES.,JSC', 'http://vinades.vn', '', 2, 1274989787, 1274989787), 
(3, 'Báo điện tử Dân Trí', 'http://dantri.com.vn', '', 3, 1322685396, 1322685396), 
(4, 'Bộ Thông tin và Truyền thông', 'http://http://mic.gov.vn', '', 4, 1445309676, 1445309676), 
(5, 'Báo Chính Phủ', 'http://baochinhphu.vn', '', 5, 1498615748, 1498616135);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_tags`
--

DROP TABLE IF EXISTS `nv4_vi_news_tags`;
CREATE TABLE `nv4_vi_news_tags` (
  `tid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `numnews` mediumint(8) NOT NULL DEFAULT '0',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `description` text,
  `keywords` varchar(255) DEFAULT '',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=59  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_tags`
--

INSERT INTO `nv4_vi_news_tags` VALUES
(1, 0, 'nguồn-mở', '', '', 'nguồn mở'), 
(2, 0, 'quen-thuộc', '', '', 'quen thuộc'), 
(3, 0, 'cộng-đồng', '', '', 'cộng đồng'), 
(4, 0, 'việt-nam', '', '', 'việt nam'), 
(5, 0, 'hoạt-động', '', '', 'hoạt động'), 
(6, 0, 'tin-tức', '', '', 'tin tức'), 
(7, 0, 'thương-mại-điện', '', '', 'thương mại điện'), 
(8, 0, 'điện-tử', '', '', 'điện tử'), 
(9, 1, 'nukeviet', '', '', 'nukeviet'), 
(10, 1, 'vinades', '', '', 'vinades'), 
(11, 0, 'lập-trình-viên', '', '', 'lập trình viên'), 
(12, 0, 'chuyên-viên-đồ-họa', '', '', 'chuyên viên đồ họa'), 
(13, 0, 'php', '', '', 'php'), 
(14, 0, 'mysql', '', '', 'mysql'), 
(15, 0, 'nhân-tài-đất-việt-2011', '', '', 'nhân tài đất việt 2011'), 
(16, 0, 'mã-nguồn-mở', '', '', 'mã nguồn mở'), 
(17, 0, 'nukeviet4', '', '', 'nukeviet4'), 
(18, 0, 'mail', '', '', 'mail'), 
(19, 0, 'fpt', '', '', 'fpt'), 
(20, 0, 'smtp', '', '', 'smtp'), 
(21, 0, 'bootstrap', '', '', 'bootstrap'), 
(22, 0, 'block', '', '', 'block'), 
(23, 0, 'modules', '', '', 'modules'), 
(24, 0, 'banner', '', '', 'banner'), 
(25, 0, 'liên-kết', '', '', 'liên kết'), 
(26, 1, 'hosting', '', '', 'hosting'), 
(27, 0, 'hỗ-trợ', '', '', 'hỗ trợ'), 
(28, 0, 'hợp-tác', '', '', 'hợp tác'), 
(29, 1, 'tốc-độ', '', '', 'tốc độ'), 
(30, 1, 'website', '', '', 'website'), 
(31, 1, 'bảo-mật', '', '', 'bảo mật'), 
(32, 0, 'giáo-dục', '', '', 'giáo dục'), 
(33, 0, 'edu-gate', '', '', 'edu gate'), 
(34, 0, 'lập-trình', '', '', 'lập trình'), 
(35, 0, 'logo', '', '', 'logo'), 
(36, 0, 'code', '', '', 'code'), 
(37, 0, 'thực-tập', '', '', 'thực tập'), 
(38, 0, 'kinh-doanh', '', '', 'kinh doanh'), 
(39, 0, 'nhân-viên', '', '', 'nhân viên'), 
(40, 0, 'bộ-gd&đt', '', '', 'Bộ GD&ĐT'), 
(41, 0, 'module', '', '', 'module'), 
(42, 0, 'php-nuke', '', '', 'php-nuke'), 
(43, 2, 'chính-phủ', '', '', 'Chính phủ'), 
(44, 1, 'phó-thủ-tướng', '', '', 'Phó Thủ tướng'), 
(45, 1, 'trương-hòa-bình', '', '', 'Trương Hòa Bình'), 
(46, 1, 'đất-công', '', '', 'đất công'), 
(47, 1, 'sổ-đỏ', '', '', 'sổ đỏ'), 
(48, 1, 'cảnh-sát', '', '', 'cảnh sát'), 
(49, 1, 'điều-tra', '', '', 'điều tra'), 
(50, 2, 'đất-đai', '', '', 'đất đai'), 
(51, 1, 'thủ-tướng', '', '', 'Thủ tướng'), 
(52, 1, 'hà-nội', '', '', 'Hà Nội'), 
(53, 1, 'quy-hoạch-sông-hồng', '', '', 'quy hoạch Sông Hồng'), 
(54, 1, 'xây-dựng', '', '', 'xây dựng'), 
(55, 1, 'kiến-trúc', '', '', 'kiến trúc'), 
(56, 1, 'vận-tải', '', '', 'vận tải'), 
(57, 1, 'đường-sắt', '', '', 'đường sắt'), 
(58, 1, 'nghỉ-lễ', '', '', 'nghỉ lễ');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_tags_id`
--

DROP TABLE IF EXISTS `nv4_vi_news_tags_id`;
CREATE TABLE `nv4_vi_news_tags_id` (
  `id` int(11) NOT NULL,
  `tid` mediumint(9) NOT NULL,
  `keyword` varchar(65) NOT NULL,
  UNIQUE KEY `id_tid` (`id`,`tid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_tags_id`
--

INSERT INTO `nv4_vi_news_tags_id` VALUES
(21, 43, 'Chính phủ'), 
(19, 50, 'đất đai'), 
(19, 49, 'điều tra'), 
(19, 48, 'cảnh sát'), 
(19, 47, 'sổ đỏ'), 
(19, 46, 'đất công'), 
(19, 43, 'Chính phủ'), 
(19, 44, 'Phó Thủ tướng'), 
(19, 45, 'Trương Hòa Bình'), 
(21, 50, 'đất đai'), 
(21, 55, 'kiến trúc'), 
(21, 51, 'Thủ tướng'), 
(21, 52, 'Hà Nội'), 
(21, 53, 'quy hoạch Sông Hồng'), 
(21, 54, 'xây dựng'), 
(23, 56, 'vận tải'), 
(23, 57, 'đường sắt'), 
(23, 58, 'nghỉ lễ');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_tmp`
--

DROP TABLE IF EXISTS `nv4_vi_news_tmp`;
CREATE TABLE `nv4_vi_news_tmp` (
  `id` mediumint(8) unsigned NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT '0',
  `time_edit` int(11) NOT NULL,
  `time_late` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_tmp`
--

INSERT INTO `nv4_vi_news_tmp` VALUES
(31, 1, 1498700203, 1498700629, '127.0.0.1'), 
(35, 1, 1498709748, 1498726542, '127.0.0.1');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_topics`
--

DROP TABLE IF EXISTS `nv4_vi_news_topics`;
CREATE TABLE `nv4_vi_news_topics` (
  `topicid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `weight` smallint(5) NOT NULL DEFAULT '0',
  `keywords` text,
  `add_time` int(11) NOT NULL DEFAULT '0',
  `edit_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`topicid`),
  UNIQUE KEY `title` (`title`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_topics`
--

INSERT INTO `nv4_vi_news_topics` VALUES
(1, 'NukeViet 4', 'NukeViet-4', '', 'NukeViet 4', 1, 'NukeViet 4', 1445396011, 1445396011);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_page`
--

DROP TABLE IF EXISTS `nv4_vi_page`;
CREATE TABLE `nv4_vi_page` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `image` varchar(255) DEFAULT '',
  `imagealt` varchar(255) DEFAULT '',
  `imageposition` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `description` text,
  `bodytext` mediumtext NOT NULL,
  `keywords` text,
  `socialbutton` tinyint(4) NOT NULL DEFAULT '0',
  `activecomm` varchar(255) DEFAULT '',
  `layout_func` varchar(100) DEFAULT '',
  `gid` mediumint(9) NOT NULL DEFAULT '0',
  `weight` smallint(4) NOT NULL DEFAULT '0',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) NOT NULL DEFAULT '0',
  `edit_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hot_post` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_page_config`
--

DROP TABLE IF EXISTS `nv4_vi_page_config`;
CREATE TABLE `nv4_vi_page_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_page_config`
--

INSERT INTO `nv4_vi_page_config` VALUES
('viewtype', '0'), 
('facebookapi', ''), 
('per_page', '20'), 
('news_first', '0'), 
('related_articles', '5'), 
('copy_page', '0');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_referer_stats`
--

DROP TABLE IF EXISTS `nv4_vi_referer_stats`;
CREATE TABLE `nv4_vi_referer_stats` (
  `host` varchar(250) NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  `month01` int(11) NOT NULL DEFAULT '0',
  `month02` int(11) NOT NULL DEFAULT '0',
  `month03` int(11) NOT NULL DEFAULT '0',
  `month04` int(11) NOT NULL DEFAULT '0',
  `month05` int(11) NOT NULL DEFAULT '0',
  `month06` int(11) NOT NULL DEFAULT '0',
  `month07` int(11) NOT NULL DEFAULT '0',
  `month08` int(11) NOT NULL DEFAULT '0',
  `month09` int(11) NOT NULL DEFAULT '0',
  `month10` int(11) NOT NULL DEFAULT '0',
  `month11` int(11) NOT NULL DEFAULT '0',
  `month12` int(11) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `host` (`host`),
  KEY `total` (`total`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_searchkeys`
--

DROP TABLE IF EXISTS `nv4_vi_searchkeys`;
CREATE TABLE `nv4_vi_searchkeys` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `skey` varchar(250) NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  `search_engine` varchar(50) NOT NULL,
  KEY `id` (`id`),
  KEY `skey` (`skey`),
  KEY `search_engine` (`search_engine`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_siteterms`
--

DROP TABLE IF EXISTS `nv4_vi_siteterms`;
CREATE TABLE `nv4_vi_siteterms` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `image` varchar(255) DEFAULT '',
  `imagealt` varchar(255) DEFAULT '',
  `imageposition` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `description` text,
  `bodytext` mediumtext NOT NULL,
  `keywords` text,
  `socialbutton` tinyint(4) NOT NULL DEFAULT '0',
  `activecomm` varchar(255) DEFAULT '',
  `layout_func` varchar(100) DEFAULT '',
  `gid` mediumint(9) NOT NULL DEFAULT '0',
  `weight` smallint(4) NOT NULL DEFAULT '0',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) NOT NULL DEFAULT '0',
  `edit_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hitstotal` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hot_post` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_siteterms`
--

INSERT INTO `nv4_vi_siteterms` VALUES
(1, 'Chính sách bảo mật (Quyền riêng tư)', 'privacy', '', '', 0, 'Tài liệu này cung cấp cho bạn (người truy cập và sử dụng website) chính sách liên quan đến bảo mật và quyền riêng tư của bạn', '<strong><a id=\"index\" name=\"index\"></a>Danh mục</strong><br /> <a href=\"#1\">Điều 1: Thu thập thông tin</a><br /> <a href=\"#2\">Điều 2: Lưu trữ &amp; Bảo vệ thông tin</a><br /> <a href=\"#3\">Điều 3: Sử dụng thông tin </a><br /> <a href=\"#4\">Điều 4: Tiếp nhận thông tin từ các đối tác </a><br /> <a href=\"#5\">Điều 5: Chia sẻ thông tin với bên thứ ba</a><br /> <a href=\"#6\">Điều 6: Thay đổi chính sách bảo mật</a>  <hr  /> <h2 style=\"text-align: justify;\"><a id=\"1\" name=\"1\"></a>Điều 1: Thu thập thông tin</h2>  <h3 style=\"text-align: justify;\">1.1. Thu thập tự động:</h3>  <div style=\"text-align: justify;\">Hệ thống này được xây dựng bằng mã nguồn NukeViet. Như mọi website hiện đại khác, chúng tôi sẽ thu thập địa chỉ IP và các thông tin web tiêu chuẩn khác của bạn như: loại trình duyệt, các trang bạn truy cập trong quá trình sử dụng dịch vụ, thông tin về máy tính &amp; thiết bị mạng v.v… cho mục đích phân tích thông tin phục vụ việc bảo mật và giữ an toàn cho hệ thống.</div>  <h3 style=\"text-align: justify;\">1.2. Thu thập từ các khai báo của chính bạn:</h3>  <div style=\"text-align: justify;\">Các thông tin do bạn khai báo cho chúng tôi trong quá trình làm việc như: đăng ký tài khoản, liên hệ với chúng tôi... cũng sẽ được chúng tôi lưu trữ phục vụ công việc chăm sóc khách hàng sau này.</div>  <h3 style=\"text-align: justify;\">1.3. Thu thập thông tin thông qua việc đặt cookies:</h3>  <p style=\"text-align: justify;\">Như mọi website hiện đại khác, khi bạn truy cập website, chúng tôi (hoặc các công cụ theo dõi hoặc thống kê hoạt động của website do các đối tác cung cấp) sẽ đặt một số File dữ liệu gọi là Cookies lên đĩa cứng hoặc bộ nhớ máy tính của bạn.</p>  <p style=\"text-align: justify;\">Một trong số những Cookies này có thể tồn tại lâu để thuận tiện cho bạn trong quá trình sử dụng, ví dụ như: lưu Email của bạn trong trang đăng nhập để bạn không phải nhập lại v.v…</p>  <h3 style=\"text-align: justify;\">1.4. Thu thập và lưu trữ thông tin trong quá khứ:</h3>  <p style=\"text-align: justify;\">Bạn có thể thay đổi thông tin cá nhân của mình bất kỳ lúc nào bằng cách sử dụng chức năng tương ứng. Tuy nhiên chúng tôi sẽ lưu lại những thông tin bị thay đổi để chống các hành vi xóa dấu vết gian lận.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"2\" name=\"2\"></a>Điều 2: Lưu trữ &amp; Bảo vệ thông tin</h2>  <div style=\"text-align: justify;\">Hầu hết các thông tin được thu thập sẽ được lưu trữ tại cơ sở dữ liệu của chúng tôi.<br /> <br /> Chúng tôi bảo vệ dữ liệu cá nhân của các bạn bằng các hình thức như: mật khẩu, tường lửa, mã hóa cùng các hình thức thích hợp khác và chỉ cấp phép việc truy cập và xử lý dữ liệu cho các đối tượng phù hợp, ví dụ chính bạn hoặc các nhân viên có trách nhiệm xử thông tin với bạn thông qua các bước xác định danh tính phù hợp.<br /> <br /> Mật khẩu của bạn được lưu trữ và bảo vệ bằng phương pháp mã hoá trong cơ sở dữ liệu của hệ thống, vì thế nó rất an toàn. Tuy nhiên, chúng tôi khuyên bạn không nên dùng lại mật khẩu này trên các website khác. Mật khẩu của bạn là cách duy nhất để bạn đăng nhập vào tài khoản thành viên của mình trong website này, vì thế hãy cất giữ nó cẩn thận. Trong mọi trường hợp bạn không nên cung cấp thông tin mật khẩu cho bất kỳ người nào dù là người của chúng tôi, người của NukeViet hay bất kỳ người thứ ba nào khác trừ khi bạn hiểu rõ các rủi ro khi để lộ mật khẩu. Nếu quên mật khẩu, bạn có thể sử dụng chức năng “<a href=\"/users/lostpass/\">Quên mật khẩu</a>” trên website. Để thực hiện việc này, bạn cần phải cung cấp cho hệ thống biết tên thành viên hoặc địa chỉ Email đang sử dụng của mình trong tài khoản, sau đó hệ thống sẽ tạo ra cho bạn mật khẩu mới và gửi đến cho bạn để bạn vẫn có thể đăng nhập vào tài khoản thành viên của mình.  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p> </div>  <h2 style=\"text-align: justify;\"><a id=\"3\" name=\"3\"></a>Điều 3: Sử dụng thông tin</h2>  <p style=\"text-align: justify;\">Thông tin thu thập được sẽ được chúng tôi sử dụng để:</p>  <div style=\"text-align: justify;\">- Cung cấp các dịch vụ hỗ trợ &amp; chăm sóc khách hàng.</div>  <div style=\"text-align: justify;\">- Thực hiện giao dịch thanh toán &amp; gửi các thông báo trong quá trình giao dịch.</div>  <div style=\"text-align: justify;\">- Xử lý khiếu nại, thu phí &amp; giải quyết sự cố.</div>  <div style=\"text-align: justify;\">- Ngăn chặn các hành vi có nguy cơ rủi ro, bị cấm hoặc bất hợp pháp và đảm bảo tuân thủ đúng chính sách “Thỏa thuận người dùng”.</div>  <div style=\"text-align: justify;\">- Đo đạc, tùy biến &amp; cải tiến dịch vụ, nội dung và hình thức của website.</div>  <div style=\"text-align: justify;\">- Gửi bạn các thông tin về chương trình Marketing, các thông báo &amp; chương trình khuyến mại.</div>  <div style=\"text-align: justify;\">- So sánh độ chính xác của thông tin cá nhân của bạn trong quá trình kiểm tra với bên thứ ba.</div>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"4\" name=\"4\"></a>Điều 4: Tiếp nhận thông tin từ các đối tác</h2>  <div style=\"text-align: justify;\">Khi sử dụng các công cụ giao dịch và thanh toán thông qua internet, chúng tôi có thể tiếp nhận thêm các thông tin về bạn như địa chỉ username, Email, số tài khoản ngân hàng... Chúng tôi kiểm tra những thông tin này với cơ sở dữ liệu người dùng của mình nhằm xác nhận rằng bạn có phải là khách hàng của chúng tôi hay không nhằm giúp việc thực hiện các dịch vụ cho bạn được thuận lợi.<br /> <br /> Các thông tin tiếp nhận được sẽ được chúng tôi bảo mật như những thông tin mà chúng tôi thu thập được trực tiếp từ bạn.</div>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2><a id=\"5\" name=\"5\"></a>Điều 5: Chia sẻ thông tin với bên thứ ba</h2>  <p style=\"text-align: justify;\">Chúng tôi sẽ không chia sẻ thông tin cá nhân, thông tin tài chính... của bạn cho các bên thứ 3 trừ khi được sự đồng ý của chính bạn hoặc khi chúng tôi buộc phải tuân thủ theo các quy định pháp luật hoặc khi có yêu cầu từ cơ quan công quyền có thẩm quyền.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2><a id=\"6\" name=\"6\"></a>Điều 6: Thay đổi chính sách bảo mật</h2>  <p style=\"text-align: justify;\">Chính sách Bảo mật này có thể thay đổi theo thời gian. Chúng tôi sẽ không giảm quyền của bạn theo Chính sách Bảo mật này mà không có sự đồng ý rõ ràng của bạn. Chúng tôi sẽ đăng bất kỳ thay đổi Chính sách Bảo mật nào trên trang này và, nếu những thay đổi này quan trọng, chúng tôi sẽ cung cấp thông báo nổi bật hơn (bao gồm, đối với một số dịch vụ nhất định, thông báo bằng email về các thay đổi của Chính sách Bảo mật).</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <p style=\"text-align: right;\">Chính sách bảo mật mặc định này được xây dựng cho <a href=\"http://nukeviet.vn\" target=\"_blank\">NukeViet CMS</a>, được tham khảo từ website <a href=\"http://webnhanh.vn/vi/thiet-ke-web/detail/Chinh-sach-bao-mat-Quyen-rieng-tu-Privacy-Policy-2147/\">webnhanh.vn</a></p>', '', 0, '4', '', 0, 1, 1, 1498555144, 1498555144, 1, 0, 0), 
(2, 'Điều khoản và điều kiện sử dụng', 'terms-and-conditions', '', '', 0, 'Đây là các điều khoản và điều kiện áp dụng cho website này. Truy cập và sử dụng website tức là bạn đã đồng ý với các quy định này.', '<div style=\"text-align: justify;\">Cảm ơn bạn đã sử dụng. Xin vui lòng đọc các Điều khoản một cách cẩn thận, và <a href=\"/contact/\">liên hệ</a> với chúng tôi nếu bạn có bất kỳ câu hỏi. Bằng việc truy cập hoặc sử dụng website của chúng tôi, bạn đồng ý bị ràng buộc bởi các <a href=\"/siteterms/terms-and-conditions.html\">Điều khoản và điều kiện</a> sử dụng cũng như <a href=\"/siteterms/privacy.html\">Chính sách bảo mật</a> của chúng tôi. Nếu không đồng ý với các quy định này, bạn vui lòng ngưng sử dụng website.<br /> <br /> <strong><a id=\"index\" name=\"index\"></a>Danh mục</strong><br /> <a href=\"#1\">Điều 1: Điều khoản liên quan đến phần mềm vận hành website</a><br /> <a href=\"#2\">Điều 2: Giới hạn cho việc sử dụng Website và các tài liệu trên website</a><br /> <a href=\"#3\">Điều 3: Sử dụng thương hiệu</a><br /> <a href=\"#4\">Điều 4: Các hành vi bị nghiêm cấm</a><br /> <a href=\"#5\">Điều 5: Các đường liên kết đến các website khác</a><br /> <a href=\"#6\">Điều 6: Từ chối bảo đảm</a><br /> <a href=\"#7\">Điều 7: Luật áp dụng và cơ quan giải quyết tranh chấp</a><br /> <a href=\"#8\">Điều 8: Thay đổi điều khoản và điều kiện sử dụng</a></div>  <hr  /> <h2 style=\"text-align: justify;\"><a id=\"1\" name=\"1\"></a>Điều khoản liên quan đến phần mềm vận hành website</h2>  <p style=\"text-align: justify;\">- Website của chúng tôi sử dụng hệ thống NukeViet, là giải pháp về website/ cổng thông tin nguồn mở được phát hành theo giấy phép bản quyền phần mềm tự do nguồn mở “<a href=\"http://www.gnu.org/licenses/old-licenses/gpl-2.0.html\" target=\"_blank\">GNU General Public License</a>” (viết tắt là GNU/GPL hay GPL) và có thể tải về miễn phí tại trang web <a href=\"http://www.nukeviet.vn\" target=\"_blank\">www.nukeviet.vn</a>.<br /> - Website này do chúng tôi sở hữu, điều hành và duy trì. NukeViet (hiểu ở đây là “hệ thống NukeViet” (bao gồm nhân hệ thống NukeViet và các sản phẩm phái sinh như NukeViet CMS, NukeViet Portal, <a href=\"http://edu.nukeviet.vn\" target=\"_blank\">NukeViet Edu Gate</a>...), “www.nukeviet.vn”, “tổ chức NukeViet”, “ban điều hành NukeViet”, &quot;Ban Quản Trị NukeViet&quot; và nói chung là những gì liên quan đến NukeViet...) không liên quan gì đến việc chúng tôi điều hành website cũng như quy định bạn được phép làm và không được phép làm gì trên website này.<br /> - Hệ thống NukeViet là bộ mã nguồn được phát triển để xây dựng các website/ cổng thông tin trên mạng. Chúng tôi (chủ sở hữu, điều hành và duy trì website này) không hỗ trợ và khẳng định hay ngụ ý về việc có liên quan đến NukeViet. Để biết thêm nhiều thông tin về NukeViet, hãy ghé thăm website của NukeViet tại địa chỉ: <a href=\"http://nukeviet.vn\" target=\"_blank\">http://nukeviet.vn</a>.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"2\" name=\"2\"></a>Giới hạn cho việc sử dụng Website và các tài liệu trên website</h2>  <p style=\"text-align: justify;\">- Tất cả các quyền liên quan đến tất cả tài liệu và thông tin được hiển thị và/ hoặc được tạo ra sẵn cho Website này (ví dụ như những tài liệu được cung cấp để tải về) được quản lý, sở hữu hoặc được cho phép sử dụng bởi chúng tôi hoặc chủ sở hữu tương ứng với giấy phép tương ứng. Việc sử dụng các tài liệu và thông tin phải được tuân thủ theo giấy phép tương ứng được áp dụng cho chúng.<br /> - Ngoại trừ các tài liệu được cấp phép rõ ràng dưới dạng giấy phép tư liệu mở&nbsp;Creative Commons (gọi là giấy phép CC) cho phép bạn khai thác và chia sẻ theo quy định của giấy phép tư liệu mở, đối với các loại tài liệu không ghi giấy phép rõ ràng thì bạn không được phép sử dụng (bao gồm nhưng không giới hạn việc sao chép, chỉnh sửa toàn bộ hay một phần, đăng tải, phân phối, cấp phép, bán và xuất bản) bất cứ tài liệu nào mà không có sự cho phép trước bằng văn bản của chúng tôi ngoại trừ việc sử dụng cho mục đích cá nhân, nội bộ, phi thương mại.<br /> - Một số tài liệu hoặc thông tin có những điều khoản và điều kiện áp dụng riêng cho chúng không phải là giấy phép tư liệu mở, trong trường hợp như vậy, bạn được yêu cầu phải chấp nhận các điều khoản và điều kiện đó khi truy cập vào các tài liệu và thông tin này.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"3\" name=\"3\"></a>Sử dụng thương hiệu</h2>  <p style=\"text-align: justify;\">- VINADES.,JSC, NukeViet và thương hiệu gắn với NukeViet (ví dụ NukeViet CMS, NukeViet Portal, NukeViet Edu Gate...), logo công ty VINADES thuộc sở hữu của Công ty cổ phần phát triển nguồn mở Việt Nam.<br /> - Những tên sản phẩm, tên dịch vụ khác, logo và/ hoặc những tên công ty được sử dụng trong Website này là những tài sản đã được đăng ký độc quyền và được giữ bản quyền bởi những người sở hữu và/ hoặc người cấp phép tương ứng.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"4\" name=\"4\"></a>Các hành vi bị nghiêm cấm</h2>  <p style=\"text-align: justify;\">Người truy cập website này không được thực hiện những hành vi dưới đây khi sử dụng website:<br /> - Xâm phạm các quyền hợp pháp (bao gồm nhưng không giới hạn đối với các quyền riêng tư và chung) của người khác.<br /> - Gây ra sự thiệt hại hoặc bất lợi cho người khác.<br /> - Làm xáo trộn trật tự công cộng.<br /> - Hành vi liên quan đến tội phạm.<br /> - Tải lên hoặc phát tán thông tin riêng tư của tổ chức, cá nhân khác mà không được sự chấp thuận của họ.<br /> - Sử dụng Website này vào mục đích thương mại mà chưa được sự cho phép của chúng tôi.<br /> - Nói xấu, làm nhục, phỉ báng người khác.<br /> - Tải lên các tập tin chứa virus hoặc các tập tin bị hư mà có thể gây thiệt hại đến sự vận hành của máy tính khác.<br /> - Những hoạt động có khả năng ảnh hưởng đến hoạt động bình thường của website.<br /> - Những hoạt động mà chúng tôi cho là không thích hợp.<br /> - Những hoạt động bất hợp pháp hoặc bị cấm bởi pháp luật hiện hành.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"5\" name=\"5\"></a>Các đường liên kết đến các website khác</h2>  <p style=\"text-align: justify;\">- Các website của các bên thứ ba (không phải các trang do chúng tôi quản lý) được liên kết đến hoặc từ website này (&quot;Các website khác&quot;) được điều hành và duy trì hoàn toàn độc lập bởi các bên thứ ba đó và không nằm trong quyền điều khiển và/hoặc giám sát của chúng tôi. Việc truy cập các website khác phải được tuân thủ theo các điều khoản và điều kiện quy định bởi ban điều hành của website đó.<br /> - Chúng tôi không chịu trách nhiệm cho sự mất mát hoặc thiệt hại do việc truy cập và sử dụng các website bên ngoài, và bạn phải chịu mọi rủi ro khi truy cập các website đó.<br /> - Không có nội dung nào trong Website này thể hiện như một sự đảm bảo của chúng tôi về nội dung của các website khác và các sản phẩm và/ hoặc các dịch vụ xuất hiện và/ hoặc được cung cấp tại các website khác.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"6\" name=\"6\"></a>Từ chối bảo đảm</h2>  <p style=\"text-align: justify;\">NGOẠI TRỪ PHẠM VI BỊ CẤM THEO LUẬT PHÁP HIỆN HÀNH, CHÚNG TÔI SẼ:<br /> - KHÔNG CHỊU TRÁCH NHIỆM HAY BẢO ĐẢM, MỘT CÁCH RÕ RÀNG HAY NGỤ Ý, BAO GỒM SỰ BẢO ĐẢM VỀ TÍNH CHÍNH XÁC, MỨC ĐỘ TIN CẬY, HOÀN THIỆN, PHÙ HỢP CHO MỤC ĐÍCH CỤ THỂ, SỰ KHÔNG XÂM PHẠM QUYỀN CỦA BÊN THỨ 3 VÀ/HOẶC TÍNH AN TOÀN CỦA NỘI DỤNG WEBSITE NÀY, VÀ NHỮNG TUYÊN BỐ, ĐẢM BẢO CÓ LIÊN QUAN.<br /> - KHÔNG CHỊU TRÁCH NHIỆM CHO BẤT KỲ SỰ THIỆT HẠI HAY MẤT MÁT PHÁT SINH TỪ VIỆC TRUY CẬP VÀ SỬ DỤNG WEBSITE HAY VIỆC KHÔNG THỂ SỬ DỤNG WEBSITE.<br /> - CHÚNG TÔI CÓ THỂ THAY ĐỔI VÀ/HOẶC THAY THẾ NỘI DUNG CỦA WEBSITE NÀY, HOẶC TẠM HOÃN HOẶC NGƯNG CUNG CẤP CÁC DỊCH VỤ QUA WEBSITE NÀY VÀO BẤT KỲ THỜI ĐIỂM NÀO MÀ KHÔNG CẦN THÔNG BÁO TRƯỚC. CHÚNG TÔI SẼ KHÔNG CHỊU TRÁCH NHIỆM CHO BẤT CỨ THIỆT HẠI NÀO PHÁT SINH DO SỰ THAY ĐỔI HOẶC THAY THẾ NỘI DUNG CỦA WEBSITE.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"7\" name=\"7\"></a>Luật áp dụng và cơ quan giải quyết tranh chấp</h2>  <p style=\"text-align: justify;\">- Các Điều Khoản và Điều Kiện này được điều chỉnh và giải thích theo luật của Việt Nam trừ khi có điều khoản khác được cung cấp thêm. Tất cả tranh chấp phát sinh liên quan đến website này và các Điều Khoản và Điều Kiện sử dụng này sẽ được giải quyết tại các tòa án ở Việt Nam.<br /> - Nếu một phần nào đó của các Điều Khoản và Điều Kiện bị xem là không có giá trị, vô hiệu, hoặc không áp dụng được vì lý do nào đó, phần đó được xem như là phần riêng biệt và không ảnh hưởng đến tính hiệu lực của phần còn lại.<br /> - Trong trường hợp có sự mâu thuẫn giữa bản Tiếng Anh và bản Tiếng Việt của bản Điều Khoản và Điều Kiện này, bản Tiếng Việt sẽ được ưu tiên áp dụng.</p>  <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p>  <h2 style=\"text-align: justify;\"><a id=\"8\" name=\"8\"></a>Thay đổi điều khoản và điều kiện sử dụng</h2>  <div style=\"text-align: justify;\">Điều khoản và điều kiện sử dụng có thể thay đổi theo thời gian. Chúng tôi bảo lưu quyền thay đổi hoặc sửa đổi bất kỳ điều khoản và điều kiện cũng như các quy định khác, bất cứ lúc nào và theo ý mình. Chúng tôi sẽ có thông báo trên website khi có sự thay đổi. Tiếp tục sử dụng trang web này sau khi đăng các thay đổi tức là bạn đã chấp nhận các thay đổi đó. <p style=\"text-align: right;\"><a href=\"#index\">Trở lại danh mục</a></p> </div>', '', 0, '4', '', 0, 2, 1, 1498555144, 1498555144, 1, 0, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_siteterms_config`
--

DROP TABLE IF EXISTS `nv4_vi_siteterms_config`;
CREATE TABLE `nv4_vi_siteterms_config` (
  `config_name` varchar(30) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_siteterms_config`
--

INSERT INTO `nv4_vi_siteterms_config` VALUES
('viewtype', '0'), 
('facebookapi', ''), 
('per_page', '20'), 
('news_first', '0'), 
('related_articles', '5'), 
('copy_page', '0');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_videoclips_clip`
--

DROP TABLE IF EXISTS `nv4_vi_videoclips_clip`;
CREATE TABLE `nv4_vi_videoclips_clip` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(250) NOT NULL DEFAULT '',
  `hometext` mediumtext NOT NULL,
  `bodytext` mediumtext NOT NULL,
  `keywords` mediumtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `internalpath` varchar(255) NOT NULL,
  `externalpath` mediumtext NOT NULL,
  `comm` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM  AUTO_INCREMENT=4  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_videoclips_clip`
--

INSERT INTO `nv4_vi_videoclips_clip` VALUES
(1, 1, 'Suất đầu tư đường cao tốc Việt Nam không cao hơn thế giớiChuyên mục&#x3A; Kỳ họp thứ ba Quốc hội khóa XIV', 'Suat-dau-tu-duong-cao-toc-Viet-Nam-khong-cao-hon-the-gioiChuyen-muc-Ky-hop-thu-ba-Quoc-hoi-khoa-XIV', 'Chuyên mục&#x3A; Kỳ họp thứ ba Quốc hội khóa XIV 15&#x002F;06&#x002F;2017', '', 'thứ ba,quốc hội', '', '', 'http://media.chinhphu.vn/video/suat-dau-tu-duong-cao-toc-viet-nam-khong-cao-hon-the-gioi-7890', 1, 1, 1498700589), 
(2, 1, 'Giải quyết phát sinh nợ đọng xây dựng cơ bản', 'Giai-quyet-phat-sinh-no-dong-xay-dung-co-ban', 'Chuyên mục&#x3A; Kỳ họp thứ ba Quốc hội khóa XIV 15&#x002F;06&#x002F;2017', '', 'thứ ba,quốc hội', '', '', 'http://media.chinhphu.vn/video/giai-quyet-phat-sinh-no-dong-xay-dung-co-ban-7889', 1, 1, 1498705667), 
(3, 1, 'Trách nhiệm của Bộ KH&amp;ĐT với các dự án trọng điểm Quốc gia', 'Trach-nhiem-cua-Bo-KH-DT-voi-cac-du-an-trong-diem-Quoc-gia', 'Chuyên mục&#x3A; Kỳ họp thứ ba Quốc hội khóa XIV 15&#x002F;06&#x002F;2017', '', 'thứ ba,quốc hội', '', '', 'http://media.chinhphu.vn/video/trach-nhiem-cua-bo-kh-dt-voi-cac-du-an-trong-diem-quoc-gia-7888', 1, 1, 1498705694);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_videoclips_hit`
--

DROP TABLE IF EXISTS `nv4_vi_videoclips_hit`;
CREATE TABLE `nv4_vi_videoclips_hit` (
  `cid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `view` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `liked` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `unlike` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `broken` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `view` (`view`),
  KEY `liked` (`liked`),
  KEY `unlike` (`unlike`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_videoclips_hit`
--

INSERT INTO `nv4_vi_videoclips_hit` VALUES
(1, 1, 0, 0, 0), 
(2, 0, 0, 0, 0), 
(3, 0, 0, 0, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_videoclips_topic`
--

DROP TABLE IF EXISTS `nv4_vi_videoclips_topic`;
CREATE TABLE `nv4_vi_videoclips_topic` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` mediumint(8) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `weight` smallint(4) unsigned NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `keywords` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_videoclips_topic`
--

INSERT INTO `nv4_vi_videoclips_topic` VALUES
(1, 0, 'Dân hỏi - Bộ Trưởng trả lời', 'Dan-hoi-Bo-Truong-tra-loi', '', 1, '', 1, '');


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_voting`
--

DROP TABLE IF EXISTS `nv4_vi_voting`;
CREATE TABLE `nv4_vi_voting` (
  `vid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(333) NOT NULL,
  `link` varchar(255) DEFAULT '',
  `acceptcm` int(2) NOT NULL DEFAULT '1',
  `active_captcha` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `groups_view` varchar(255) DEFAULT '',
  `publ_time` int(11) unsigned NOT NULL DEFAULT '0',
  `exp_time` int(11) unsigned NOT NULL DEFAULT '0',
  `act` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`),
  UNIQUE KEY `question` (`question`)
) ENGINE=MyISAM  AUTO_INCREMENT=4  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_voting`
--

INSERT INTO `nv4_vi_voting` VALUES
(2, 'Bạn biết gì về NukeViet 4?', '', 1, 0, 1, '6', 1275318563, 0, 1), 
(3, 'Lợi ích của phần mềm nguồn mở là gì?', '', 1, 0, 1, '6', 1275318563, 0, 1);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_voting_rows`
--

DROP TABLE IF EXISTS `nv4_vi_voting_rows`;
CREATE TABLE `nv4_vi_voting_rows` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `vid` smallint(5) unsigned NOT NULL,
  `title` varchar(245) NOT NULL DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `hitstotal` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `vid` (`vid`,`title`)
) ENGINE=MyISAM  AUTO_INCREMENT=14  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_voting_rows`
--

INSERT INTO `nv4_vi_voting_rows` VALUES
(5, 2, 'Một bộ sourcecode cho web hoàn toàn mới.', '', 0), 
(6, 2, 'Mã nguồn mở, sử dụng miễn phí.', '', 0), 
(7, 2, 'Sử dụng HTML5, CSS3 và hỗ trợ Ajax', '', 0), 
(8, 2, 'Tất cả các ý kiến trên', '', 0), 
(9, 3, 'Liên tục được cải tiến, sửa đổi bởi cả thế giới.', '', 0), 
(10, 3, 'Được sử dụng miễn phí không mất tiền.', '', 0), 
(11, 3, 'Được tự do khám phá, sửa đổi theo ý thích.', '', 0), 
(12, 3, 'Phù hợp để học tập, nghiên cứu vì được tự do sửa đổi theo ý thích.', '', 0), 
(13, 3, 'Tất cả các ý kiến trên', '', 0);