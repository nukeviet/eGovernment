-- NUKEVIET 4.0
-- Module: Database
-- http://www.nukeviet.vn
--
-- Host: 127.0.0.1
-- Generation Time: June 27, 2017, 10:31 AM GMT
-- Server version: 5.5.5-10.1.21-MariaDB
-- PHP Version: 5.6.30

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
(1, 'ckeditor', 1, 'adobe,archives,audio,documents,flash,images,real,video|1|1|1', 'Administrator', 0, 0, 0, '', '11cd0cd0f06f8d3d8b19bb8d651eddd8', 1498555193, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0');


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
) ENGINE=MyISAM  AUTO_INCREMENT=4  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_banners_plans`
--

INSERT INTO `nv4_banners_plans` VALUES
(1, '', 'Quang cao giua trang', '', 'sequential', 575, 72, 1, 1), 
(2, '', 'Quang cao trai', '', 'sequential', 212, 800, 1, 1), 
(3, '', 'Quang cao Phai', '', 'random', 250, 500, 1, 1);


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
) ENGINE=MyISAM  AUTO_INCREMENT=4  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_banners_rows`
--

INSERT INTO `nv4_banners_rows` VALUES
(2, 'vinades', 2, 0, 'vinades.jpg', 'jpg', 'image/jpeg', 212, 400, '', '', 'http://vinades.vn', '_blank', '', 1498555144, 1498555144, 0, 0, 1, 2), 
(3, 'Quang cao giua trang', 1, 0, 'webnhanh.jpg', 'png', 'image/jpeg', 575, 72, '', '', 'http://webnhanh.vn', '_blank', '', 1498555144, 1498555144, 0, 0, 1, 1);


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
('sys', 'global', 'timestamp', '2'), 
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
('vi', 'global', 'cronjobs_next_time', '1498559766'), 
('vi', 'global', 'disable_site_content', 'Vì lý do kỹ thuật website tạm ngưng hoạt động. Thành thật xin lỗi các bạn vì sự bất tiện này!'), 
('vi', 'global', 'ssl_https_modules', ''), 
('vi', 'seotools', 'prcservice', ''), 
('vi', 'news', 'indexfile', 'viewcat_main_right'), 
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
('vi', 'news', 'instant_articles_username', ''), 
('vi', 'news', 'instant_articles_password', ''), 
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
('c_time', 'last', 0, 1498557926, 0), 
('total', 'hits', 1498557926, 3, 3), 
('year', '2017', 1498557926, 3, 3), 
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
('month', 'Jun', 1498557926, 3, 3), 
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
('day', '28', 0, 0, 0), 
('day', '29', 0, 0, 0), 
('day', '30', 0, 0, 0), 
('day', '31', 0, 0, 0), 
('dayofweek', 'Sunday', 0, 0, 0), 
('dayofweek', 'Monday', 0, 0, 0), 
('dayofweek', 'Tuesday', 1498557926, 3, 3), 
('dayofweek', 'Wednesday', 0, 0, 0), 
('dayofweek', 'Thursday', 0, 0, 0), 
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
('hour', '08', 0, 0, 0), 
('hour', '09', 0, 0, 0), 
('hour', '10', 0, 0, 0), 
('hour', '11', 0, 0, 0), 
('hour', '12', 0, 0, 0), 
('hour', '13', 0, 0, 0), 
('hour', '14', 0, 0, 0), 
('hour', '15', 0, 0, 0), 
('hour', '16', 1498555663, 1, 1), 
('hour', '17', 1498557926, 2, 2), 
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
('os', 'win10', 1498557926, 3, 3), 
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
('country', 'ZZ', 1498557926, 3, 3), 
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
(1, 1498555144, 5, 'online_expired_del.php', 'cron_online_expired_del', '', 0, 1, 1, 1498559466, 1, 'Xóa các dòng ghi trạng thái online đã cũ trong CSDL'), 
(2, 1498555144, 1440, 'dump_autobackup.php', 'cron_dump_autobackup', '', 0, 1, 1, 1498555187, 1, 'Tự động lưu CSDL'), 
(3, 1498555144, 60, 'temp_download_destroy.php', 'cron_auto_del_temp_download', '', 0, 1, 1, 1498559140, 1, 'Xóa các file tạm trong thư mục tmp'), 
(4, 1498555144, 30, 'ip_logs_destroy.php', 'cron_del_ip_logs', '', 0, 1, 1, 1498559140, 1, 'Xóa IP log files, Xóa các file nhật ký truy cập'), 
(5, 1498555144, 1440, 'error_log_destroy.php', 'cron_auto_del_error_log', '', 0, 1, 1, 1498555187, 1, 'Xóa các file error_log quá hạn'), 
(6, 1498555144, 360, 'error_log_sendmail.php', 'cron_auto_sendmail_error_log', '', 0, 1, 0, 0, 0, 'Gửi email các thông báo lỗi cho admin'), 
(7, 1498555144, 60, 'ref_expired_del.php', 'cron_ref_expired_del', '', 0, 1, 1, 1498559140, 1, 'Xóa các referer quá hạn'), 
(8, 1498555144, 60, 'check_version.php', 'cron_auto_check_version', '', 0, 1, 1, 1498559140, 1, 'Kiểm tra phiên bản NukeViet'), 
(9, 1498555144, 1440, 'notification_autodel.php', 'cron_notification_autodel', '', 0, 1, 1, 1498555187, 1, 'Xóa thông báo cũ');


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
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_logs`
--

INSERT INTO `nv4_logs` VALUES
(1, 'vi', 'siteinfo', 'Xóa toàn bộ nhật kí hệ thống', 'All', '', 1, 1498559501);


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
(0, 'module', 'nvtools', 0, 0, 'nvtools', 'nvtools', '4.0.24 1446612645', 1498555548, 'VINADES (contact@vinades.vn)', 'Công cụ xây dựng site'), 
(0, 'module', 'videoclips', 0, 1, 'videoclips', 'videoclips', '4.1.02 1497560120', 1498555548, 'VINADES (contact@vinades.vn)', 'Module playback of video-clips'), 
(0, 'theme', 'egov', 0, 0, 'egov', 'egov', '4.0.0 1498555740', 1498555740, 'VINADES (contact@vinades.vn)', 'egov');


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
) ENGINE=MyISAM  AUTO_INCREMENT=22  DEFAULT CHARSET=utf8;

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
(15, 'uploads/laws', 0, 0, 0, 0, 0), 
(16, 'uploads/videoclips', 0, 0, 0, 0, 0), 
(17, 'uploads/videoclips/icons', 0, 0, 0, 0, 0), 
(18, 'uploads/videoclips/images', 0, 0, 0, 0, 0), 
(19, 'uploads/videoclips/video', 0, 0, 0, 0, 0), 
(20, 'uploads/nvtools', 0, 0, 0, 0, 0), 
(21, 'uploads/nvtools/compiler', 0, 0, 0, 0, 0);


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
) ENGINE=MyISAM  AUTO_INCREMENT=51  DEFAULT CHARSET=utf8;

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
(45, 'egov', 'banners', 'global.banners.php', 'Quảng cáo cột phải', '', 'no_title', '[RIGHT]', 0, '1', 1, '6', 1, 2, 'a:1:{s:12:\"idplanbanner\";i:3;}'), 
(46, 'egov', 'voting', 'global.voting_random.php', 'Thăm dò ý kiến', '', 'primary', '[RIGHT]', 0, '1', 1, '6', 1, 3, ''), 
(47, 'egov', 'news', 'global.block_tophits.php', 'Tin xem nhiều', '', 'primary', '[RIGHT]', 0, '1', 1, '6', 1, 4, 'a:6:{s:10:\"number_day\";i:3650;s:6:\"numrow\";i:10;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:7:\"nocatid\";a:2:{i:0;i:10;i:1;i:11;}}'), 
(48, 'egov', 'theme', 'global.social.php', 'Social icon', '', 'no_title', '[SOCIAL_ICONS]', 0, '1', 1, '6', 1, 1, 'a:4:{s:8:\"facebook\";s:32:\"http://www.facebook.com/nukeviet\";s:11:\"google_plus\";s:32:\"https://www.google.com/+nukeviet\";s:7:\"youtube\";s:37:\"https://www.youtube.com/user/nukeviet\";s:7:\"twitter\";s:28:\"https://twitter.com/nukeviet\";}'), 
(49, 'egov', 'news', 'module.block_newscenter.php', 'Tin mới nhất', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 1, 'a:10:{s:6:\"numrow\";i:6;s:11:\"showtooltip\";i:1;s:16:\"tooltip_position\";s:6:\"bottom\";s:14:\"tooltip_length\";s:3:\"150\";s:12:\"length_title\";i:0;s:15:\"length_hometext\";i:0;s:17:\"length_othertitle\";i:60;s:5:\"width\";i:500;s:6:\"height\";i:0;s:7:\"nocatid\";a:0:{}}'), 
(50, 'egov', 'banners', 'global.banners.php', 'Quảng cáo giữa trang', '', 'no_title', '[TOP]', 0, '1', 1, '6', 0, 2, 'a:1:{s:12:\"idplanbanner\";i:1;}');


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
(45, 1, 2), 
(45, 38, 2), 
(45, 39, 2), 
(45, 40, 2), 
(45, 41, 2), 
(45, 47, 2), 
(45, 48, 2), 
(45, 49, 2), 
(45, 50, 2), 
(45, 60, 2), 
(45, 66, 2), 
(45, 64, 2), 
(45, 65, 2), 
(45, 63, 2), 
(45, 72, 2), 
(45, 71, 2), 
(45, 74, 2), 
(45, 69, 2), 
(45, 70, 2), 
(45, 77, 2), 
(45, 75, 2), 
(45, 4, 2), 
(45, 5, 2), 
(45, 6, 2), 
(45, 7, 2), 
(45, 8, 2), 
(45, 9, 2), 
(45, 10, 2), 
(45, 11, 2), 
(45, 12, 2), 
(45, 92, 2), 
(45, 93, 2), 
(45, 89, 2), 
(45, 84, 2), 
(45, 83, 2), 
(45, 90, 2), 
(45, 85, 2), 
(45, 94, 2), 
(45, 95, 2), 
(45, 87, 2), 
(45, 88, 2), 
(45, 51, 2), 
(45, 62, 2), 
(45, 54, 2), 
(45, 55, 2), 
(45, 31, 2), 
(45, 32, 2), 
(45, 33, 2), 
(45, 34, 2), 
(45, 35, 2), 
(45, 36, 2), 
(45, 37, 2), 
(45, 57, 2), 
(45, 58, 2), 
(45, 59, 2), 
(45, 19, 2), 
(45, 20, 2), 
(45, 21, 2), 
(45, 22, 2), 
(45, 23, 2), 
(45, 24, 2), 
(45, 25, 2), 
(45, 26, 2), 
(45, 27, 2), 
(45, 28, 2), 
(45, 29, 2), 
(45, 79, 2), 
(45, 82, 2), 
(45, 78, 2), 
(45, 61, 2), 
(46, 1, 3), 
(46, 38, 3), 
(46, 39, 3), 
(46, 40, 3), 
(46, 41, 3), 
(46, 47, 3), 
(46, 48, 3), 
(46, 49, 3), 
(46, 50, 3), 
(46, 60, 3), 
(46, 66, 3), 
(46, 64, 3), 
(46, 65, 3), 
(46, 63, 3), 
(46, 72, 3), 
(46, 71, 3), 
(46, 74, 3), 
(46, 69, 3), 
(46, 70, 3), 
(46, 77, 3), 
(46, 75, 3), 
(46, 4, 3), 
(46, 5, 3), 
(46, 6, 3), 
(46, 7, 3), 
(46, 8, 3), 
(46, 9, 3), 
(46, 10, 3), 
(46, 11, 3), 
(46, 12, 3), 
(46, 92, 3), 
(46, 93, 3), 
(46, 89, 3), 
(46, 84, 3), 
(46, 83, 3), 
(46, 90, 3), 
(46, 85, 3), 
(46, 94, 3), 
(46, 95, 3), 
(46, 87, 3), 
(46, 88, 3), 
(46, 51, 3), 
(46, 62, 3), 
(46, 54, 3), 
(46, 55, 3), 
(46, 31, 3), 
(46, 32, 3), 
(46, 33, 3), 
(46, 34, 3), 
(46, 35, 3), 
(46, 36, 3), 
(46, 37, 3), 
(46, 57, 3), 
(46, 58, 3), 
(46, 59, 3), 
(46, 19, 3), 
(46, 20, 3), 
(46, 21, 3), 
(46, 22, 3), 
(46, 23, 3), 
(46, 24, 3), 
(46, 25, 3), 
(46, 26, 3), 
(46, 27, 3), 
(46, 28, 3), 
(46, 29, 3), 
(46, 79, 3), 
(46, 82, 3), 
(46, 78, 3), 
(46, 61, 3), 
(47, 1, 4), 
(47, 38, 4), 
(47, 39, 4), 
(47, 40, 4), 
(47, 41, 4), 
(47, 47, 4), 
(47, 48, 4), 
(47, 49, 4), 
(47, 50, 4), 
(47, 60, 4), 
(47, 66, 4), 
(47, 64, 4), 
(47, 65, 4), 
(47, 63, 4), 
(47, 72, 4), 
(47, 71, 4), 
(47, 74, 4), 
(47, 69, 4), 
(47, 70, 4), 
(47, 77, 4), 
(47, 75, 4), 
(47, 4, 4), 
(47, 5, 4), 
(47, 6, 4), 
(47, 7, 4), 
(47, 8, 4), 
(47, 9, 4), 
(47, 10, 4), 
(47, 11, 4), 
(47, 12, 4), 
(47, 92, 4), 
(47, 93, 4), 
(47, 89, 4), 
(47, 84, 4), 
(47, 83, 4), 
(47, 90, 4), 
(47, 85, 4), 
(47, 94, 4), 
(47, 95, 4), 
(47, 87, 4), 
(47, 88, 4), 
(47, 51, 4), 
(47, 62, 4), 
(47, 54, 4), 
(47, 55, 4), 
(47, 31, 4), 
(47, 32, 4), 
(47, 33, 4), 
(47, 34, 4), 
(47, 35, 4), 
(47, 36, 4), 
(47, 37, 4), 
(47, 57, 4), 
(47, 58, 4), 
(47, 59, 4), 
(47, 19, 4), 
(47, 20, 4), 
(47, 21, 4), 
(47, 22, 4), 
(47, 23, 4), 
(47, 24, 4), 
(47, 25, 4), 
(47, 26, 4), 
(47, 27, 4), 
(47, 28, 4), 
(47, 29, 4), 
(47, 79, 4), 
(47, 82, 4), 
(47, 78, 4), 
(47, 61, 4), 
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
(48, 61, 1);


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


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
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_area`
--

INSERT INTO `nv4_vi_laws_area` VALUES
(1, 0, 'Giao-duc-1', 'Giáo dục', '', '', 1412265295, 1), 
(2, 0, 'Phap-quy-2', 'Pháp quy', '', '', 1412265295, 2);


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


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
) ENGINE=MyISAM  AUTO_INCREMENT=6  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_signer`
--

INSERT INTO `nv4_vi_laws_signer` VALUES
(1, 'Phạm Vũ Luận', '', 'Bộ trưởng', 1412265295), 
(2, 'Bùi Văn Ga', '', 'Thứ trưởng', 1412265295), 
(3, 'Nguyễn Thị Nghĩa', '', 'Thứ trưởng', 1412265295), 
(4, 'Nguyễn Vinh Hiển', '', 'Thứ trưởng', 1412265295), 
(5, 'Khác', '', '', 1412265295);


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
) ENGINE=MyISAM  AUTO_INCREMENT=5  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_laws_subject`
--

INSERT INTO `nv4_vi_laws_subject` VALUES
(1, 'Bo-GD-DT', 'Bộ GD&amp;ĐT', '', '', 0, 5, 1412265295, 1), 
(2, 'So-GD-DT', 'Sở GD&amp;ĐT', '', '', 0, 5, 1412265295, 2), 
(3, 'Phong-GD-DT', 'Phòng GD', '', '', 0, 5, 1412265295, 3), 
(4, 'Khac', 'Khác', '', '', 0, 5, 1412265295, 4);


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
) ENGINE=MyISAM  AUTO_INCREMENT=3  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_menu`
--

INSERT INTO `nv4_vi_menu` VALUES
(1, 'Top Menu'), 
(2, 'nvTool');


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
) ENGINE=MyISAM  AUTO_INCREMENT=34  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_menu_rows`
--

INSERT INTO `nv4_vi_menu_rows` VALUES
(1, 0, 1, 'Giới thiệu', '/index.php?language=vi&nv=about', '', '', '', 1, 1, 0, '8,9,10,11,12,13,14,15', '6', 'about', '', 1, '', 0, 1), 
(2, 0, 1, 'Tin Tức', '/index.php?language=vi&nv=news', '', '', '', 2, 10, 0, '16,17,18,19,20,21,22', '6', 'news', '', 1, '', 0, 1), 
(3, 0, 1, 'Thành viên', '/index.php?language=vi&nv=users', '', '', '', 3, 18, 0, '', '6', 'users', '', 1, '', 0, 1), 
(4, 0, 1, 'Thống kê', '/index.php?language=vi&nv=statistics', '', '', '', 4, 19, 0, '', '2', 'statistics', '', 1, '', 0, 1), 
(5, 0, 1, 'Thăm dò ý kiến', '/index.php?language=vi&nv=voting', '', '', '', 5, 20, 0, '', '6', 'voting', '', 1, '', 0, 1), 
(6, 0, 1, 'Tìm kiếm', '/index.php?language=vi&nv=seek', '', '', '', 6, 21, 0, '', '6', 'seek', '', 1, '', 0, 1), 
(7, 0, 1, 'Liên hệ', '/index.php?language=vi&nv=contact', '', '', '', 7, 22, 0, '', '6', 'contact', '', 1, '', 0, 1), 
(8, 1, 1, 'Giới thiệu về NukeViet', '/index.php?language=vi&nv=about&op=gioi-thieu-ve-nukeviet.html', '', '', '', 1, 2, 1, '', '6', 'about', 'gioi-thieu-ve-nukeviet', 1, '', 0, 1), 
(9, 1, 1, 'Giới thiệu về NukeViet CMS', '/index.php?language=vi&nv=about&op=gioi-thieu-ve-nukeviet-cms.html', '', '', '', 2, 3, 1, '', '6', 'about', 'gioi-thieu-ve-nukeviet-cms', 1, '', 0, 1), 
(10, 1, 1, 'Logo và tên gọi NukeViet', '/index.php?language=vi&nv=about&op=logo-va-ten-goi-nukeviet.html', '', '', '', 3, 4, 1, '', '6', 'about', 'logo-va-ten-goi-nukeviet', 1, '', 0, 1), 
(11, 1, 1, 'Giấy phép sử dụng NukeViet', '/index.php?language=vi&nv=about&op=giay-phep-su-dung-nukeviet.html', '', '', '', 4, 5, 1, '', '6,7', 'about', 'giay-phep-su-dung-nukeviet', 1, '', 0, 1), 
(12, 1, 1, 'Những tính năng của NukeViet CMS 4.0', '/index.php?language=vi&nv=about&op=nhung-tinh-nang-cua-nukeviet-cms-4-0.html', '', '', '', 5, 6, 1, '', '6', 'about', 'nhung-tinh-nang-cua-nukeviet-cms-4-0', 1, '', 0, 1), 
(13, 1, 1, 'Yêu cầu sử dụng NukeViet 4', '/index.php?language=vi&nv=about&op=Yeu-cau-su-dung-NukeViet-4.html', '', '', '', 6, 7, 1, '', '6', 'about', 'Yeu-cau-su-dung-NukeViet-4', 1, '', 0, 1), 
(14, 1, 1, 'Giới thiệu về Công ty cổ phần phát triển nguồn mở Việt Nam', '/index.php?language=vi&nv=about&op=gioi-thieu-ve-cong-ty-co-phan-phat-trien-nguon-mo-viet-nam.html', '', '', '', 7, 8, 1, '', '6', 'about', 'gioi-thieu-ve-cong-ty-co-phan-phat-trien-nguon-mo-viet-nam', 1, '', 0, 1), 
(15, 1, 1, 'Ủng hộ, hỗ trợ và tham gia phát triển NukeViet', '/index.php?language=vi&nv=about&op=ung-ho-ho-tro-va-tham-gia-phat-trien-nukeviet.html', '', '', '', 8, 9, 1, '', '6', 'about', 'ung-ho-ho-tro-va-tham-gia-phat-trien-nukeviet', 1, '', 0, 1), 
(16, 2, 1, 'Đối tác', '/index.php?language=vi&nv=news&op=Doi-tac', '', '', '', 1, 11, 1, '', '6', 'news', 'Doi-tac', 1, '', 0, 1), 
(17, 2, 1, 'Tuyển dụng', '/index.php?language=vi&nv=news&op=Tuyen-dung', '', '', '', 2, 12, 1, '', '6', 'news', 'Tuyen-dung', 1, '', 0, 1), 
(18, 2, 1, 'Rss', '/index.php?language=vi&nv=news&op=rss', '', '', '', 3, 13, 1, '', '6', 'news', 'rss', 1, '', 0, 1), 
(19, 2, 1, 'Đăng bài viết', '/index.php?language=vi&nv=news&op=content', '', '', '', 4, 14, 1, '', '6', 'news', 'content', 1, '', 0, 1), 
(20, 2, 1, 'Tìm kiếm', '/index.php?language=vi&nv=news&op=search', '', '', '', 5, 15, 1, '', '6', 'news', 'search', 1, '', 0, 1), 
(21, 2, 1, 'Tin tức', '/index.php?language=vi&nv=news&op=Tin-tuc', '', '', '', 6, 16, 1, '', '6', 'news', 'Tin-tuc', 1, '', 0, 1), 
(22, 2, 1, 'Sản phẩm', '/index.php?language=vi&nv=news&op=San-pham', '', '', '', 7, 17, 1, '', '6', 'news', 'San-pham', 1, '', 0, 1), 
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
(33, 0, 2, 'Copylang', '/index.php?language=vi&nv=nvtools&amp;op=copylang', '', '', '', 11, 11, 0, '', '6', 'nvtools', 'copylang', 1, '', 1, 1);


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
) ENGINE=MyISAM  AUTO_INCREMENT=96  DEFAULT CHARSET=utf8;

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
(95, 'thememodulecp', 'thememodulecp', 'Thememodulecp', '', 'nvtools', 1, 1, 9, '');


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
(95, 'main-right', 'egov');


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
('nvtools', 'nvtools', 'nvtools', 'nvtools', 'nvtools', 'nvtools', '', '', 1498555596, 1, 0, '', '', '', '', '6', 17, 1, '', 0, 0, 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_1`
--

DROP TABLE IF EXISTS `nv4_vi_news_1`;
CREATE TABLE `nv4_vi_news_1` (
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
) ENGINE=MyISAM  AUTO_INCREMENT=18  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_1`
--

INSERT INTO `nv4_vi_news_1` VALUES
(1, 1, '1,8,12', 0, 1, 'Quỳnh Nhi', 1, 1274989177, 1275318126, 1, 1274989140, 0, 2, 'Ra mắt công ty mã nguồn mở đầu tiên tại Việt Nam', 'Ra-mat-cong-ty-ma-nguon-mo-dau-tien-tai-Viet-Nam', 'Mã nguồn mở NukeViet vốn đã quá quen thuộc với cộng đồng CNTT Việt Nam trong mấy năm qua. Tuy chưa hoạt động chính thức, nhưng chỉ trong khoảng 5 năm gần đây, mã nguồn mở NukeViet đã được dùng phổ biến ở Việt Nam, áp dụng ở hầu hết các lĩnh vực, từ tin tức đến thương mại điện tử, từ các website cá nhân cho tới những hệ thống website doanh nghiệp.', 'nangly.jpg', 'Thành lập VINADES.,JSC', 1, 1, '6', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(6, 12, '1,12', 0, 1, 'Nguyễn Thế Hùng', 7, 1453192444, 1453192444, 1, 1453192444, 0, 2, 'Hãy trở thành nhà cung cấp dịch vụ của NukeViet&#33;', 'hay-tro-thanh-nha-cung-cap-dich-vu-cua-nukeviet', 'Nếu bạn là công ty hosting, là công ty thiết kế web có sử dụng mã nguồn NukeViet, là cơ sở đào tạo NukeViet hay là công ty bất kỳ có kinh doanh dịch vụ liên quan đến NukeViet... hãy cho chúng tôi biết thông tin liên hệ của bạn để NukeViet hỗ trợ bạn trong công việc kinh doanh nhé!', 'hoptac.jpg', '', 1, 1, '6', 1, 0, 14, 0, 0, 0, 0, '', 0), 
(10, 1, '1,9', 0, 1, '', 3, 1322685920, 1322686042, 1, 1322685920, 0, 2, 'Mã nguồn mở NukeViet giành giải ba Nhân tài đất Việt 2011', 'Ma-nguon-mo-NukeViet-gianh-giai-ba-Nhan-tai-dat-Viet-2011', 'Không có giải nhất và giải nhì, sản phẩm Mã nguồn mở NukeViet của VINADES.,JSC là một trong ba sản phẩm đã đoạt giải ba Nhân tài đất Việt 2011 - Lĩnh vực Công nghệ thông tin (Sản phẩm đã ứng dụng rộng rãi).', 'nukeviet-nhantaidatviet2011.jpg', 'Mã nguồn mở NukeViet giành giải ba Nhân tài đất Việt 2011', 1, 1, '6', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(11, 1, '1', 0, 1, '', 4, 1445309676, 1445309676, 1, 1445309520, 0, 2, 'NukeViet được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước', 'nukeviet-duoc-uu-tien-mua-sam-su-dung-trong-co-quan-to-chuc-nha-nuoc', 'Ngày 5/12/2014, Bộ trưởng Bộ TT&TT Nguyễn Bắc Son đã ký ban hành Thông tư 20/2014/TT-BTTTT (Thông tư 20) quy định về các sản phẩm phần mềm nguồn mở (PMNM) được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước. NukeViet (phiên bản 3.4.02 trở lên) là phần mềm được nằm trong danh sách này.', 'chuc-mung-nukeviet-thong-tu-20-bo-tttt.jpg', 'NukeViet được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(14, 1, '1,11', 0, 1, 'Trần Thị Thu', 0, 1445391118, 1445394180, 1, 1445391060, 0, 2, 'Chương trình thực tập sinh tại công ty VINADES', 'chuong-trinh-thuc-tap-sinh-tai-cong-ty-vinades', 'Cơ hội để những sinh viên năng động được học tập, trải nghiệm, thử thách sớm với những tình huống thực tế, được làm việc cùng các chuyên gia có nhiều kinh nghiệm của công ty VINADES.', 'thuc-tap-sinh.jpg', '', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(16, 1, '1', 0, 1, '', 0, 1445391182, 1445394133, 1, 1445391120, 0, 2, 'NukeViet được Bộ GD&amp;ĐT đưa vào Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016', 'nukeviet-duoc-bo-gd-dt-dua-vao-huong-dan-thuc-hien-nhiem-vu-cntt-nam-hoc-2015-2016', 'Trong Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016 của Bộ Giáo dục và Đào tạo, NukeViet được đưa vào các hạng mục: Tập huấn sử dụng phần mềm nguồn mở cho giáo viên và cán bộ quản lý giáo dục; Khai thác, sử dụng và dạy học; đặc biệt phần &quot;khuyến cáo khi sử dụng các hệ thống CNTT&quot; có chỉ rõ &quot;Không nên làm website mã nguồn đóng&quot; và &quot;Nên làm NukeViet: phần mềm nguồn mở&quot;.', 'nukeviet-cms.jpg', '', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(17, 1, '1,10', 0, 1, '', 0, 1445391217, 1445393997, 1, 1445391180, 0, 2, 'Hỗ trợ tập huấn và triển khai NukeViet cho các Phòng, Sở GD&amp;ĐT', 'ho-tro-tap-huan-va-trien-khai-nukeviet-cho-cac-phong-so-gd-dt', 'Trên cơ sở Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016 của Bộ Giáo dục và Đào tạo, Công ty cổ phần phát triển nguồn mở Việt Nam và các doanh nghiệp phát triển NukeViet trong cộng đồng NukeViet đang tích cực công tác hỗ trợ cho các phòng GD&ĐT, Sở GD&ĐT triển khai 2 nội dung chính: Hỗ trợ công tác đào tạo tập huấn hướng dẫn sử dụng NukeViet và Hỗ trợ triển khai NukeViet cho các trường, Phòng và Sở GD&ĐT', 'tap-huan-pgd-ha-dong-2015.jpg', 'Tập huấn triển khai NukeViet tại Phòng Giáo dục và Đào tạo Hà Đông - Hà Nội', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_10`
--

DROP TABLE IF EXISTS `nv4_vi_news_10`;
CREATE TABLE `nv4_vi_news_10` (
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
) ENGINE=MyISAM  AUTO_INCREMENT=18  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_10`
--

INSERT INTO `nv4_vi_news_10` VALUES
(17, 1, '1,10', 0, 1, '', 0, 1445391217, 1445393997, 1, 1445391180, 0, 2, 'Hỗ trợ tập huấn và triển khai NukeViet cho các Phòng, Sở GD&amp;ĐT', 'ho-tro-tap-huan-va-trien-khai-nukeviet-cho-cac-phong-so-gd-dt', 'Trên cơ sở Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016 của Bộ Giáo dục và Đào tạo, Công ty cổ phần phát triển nguồn mở Việt Nam và các doanh nghiệp phát triển NukeViet trong cộng đồng NukeViet đang tích cực công tác hỗ trợ cho các phòng GD&ĐT, Sở GD&ĐT triển khai 2 nội dung chính: Hỗ trợ công tác đào tạo tập huấn hướng dẫn sử dụng NukeViet và Hỗ trợ triển khai NukeViet cho các trường, Phòng và Sở GD&ĐT', 'tap-huan-pgd-ha-dong-2015.jpg', 'Tập huấn triển khai NukeViet tại Phòng Giáo dục và Đào tạo Hà Đông - Hà Nội', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_11`
--

DROP TABLE IF EXISTS `nv4_vi_news_11`;
CREATE TABLE `nv4_vi_news_11` (
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
) ENGINE=MyISAM  AUTO_INCREMENT=16  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_11`
--

INSERT INTO `nv4_vi_news_11` VALUES
(7, 11, '11', 0, 1, 'Phạm Quốc Tiến', 2, 1453192400, 1453192400, 1, 1453192400, 0, 2, 'Tuyển dụng lập trình viên PHP phát triển NukeViet', 'Tuyen-dung-lap-trinh-vien-PHP', 'Bạn đam mê nguồn mở? Bạn đang cần tìm một công việc phù hợp với thế mạnh của bạn về PHP và MySQL?. Hãy gia nhập VINADES.,JSC để xây dựng mã nguồn mở hàng đầu cho Việt Nam.', 'tuyendung-kythuat.jpg', 'Tuyển dụng', 1, 1, '6', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(8, 11, '11', 0, 1, 'Phạm Quốc Tiến', 0, 1445391089, 1445394192, 1, 1445391060, 0, 2, 'Tuyển dụng chuyên viên đồ hoạ phát triển NukeViet', 'Tuyen-dung-chuyen-vien-do-hoa', 'Bạn đam mê nguồn mở? Bạn là chuyên gia đồ họa? Chúng tôi sẽ giúp bạn hiện thực hóa ước mơ của mình với một mức lương đảm bảo. Hãy gia nhập VINADES.,JSC để xây dựng mã nguồn mở hàng đầu cho Việt Nam.', 'tuyendung-kythuat.jpg', 'Tuyển dụng', 1, 1, '6', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(9, 11, '11', 0, 1, 'Phạm Quốc Tiến', 0, 1445391090, 1445394193, 1, 1445391060, 0, 2, 'Tuyển dụng lập trình viên front-end (HTML/CSS/JS) phát triển NukeViet', 'Tuyen-dung-lap-trinh-vien-front-end-HTML-CSS-JS', 'Bạn đam mê nguồn mở? Bạn đang cần tìm một công việc phù hợp với thế mạnh của bạn về front-end (HTML/CSS/JS)?. Hãy gia nhập VINADES.,JSC để xây dựng mã nguồn mở hàng đầu cho Việt Nam.', 'tuyendung-kythuat.jpg', 'Tuyển dụng', 1, 1, '6', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(12, 11, '11', 0, 1, 'Vũ Bích Ngọc', 0, 1445391061, 1445394203, 1, 1445391000, 0, 2, 'Công ty VINADES tuyển dụng nhân viên kinh doanh', 'cong-ty-vinades-tuyen-dung-nhan-vien-kinh-doanh', 'Công ty cổ phần phát triển nguồn mở Việt Nam là đơn vị chủ quản của phần mềm mã nguồn mở NukeViet - một mã nguồn được tin dùng trong cơ quan nhà nước, đặc biệt là ngành giáo dục. Chúng tôi cần tuyển 05 nhân viên kinh doanh cho lĩnh vực này.', 'tuyen-dung-nvkd.png', '', 1, 1, '4', 1, 0, 0, 0, 0, 0, 0, '', 0), 
(14, 1, '1,11', 0, 1, 'Trần Thị Thu', 0, 1445391118, 1445394180, 1, 1445391060, 0, 2, 'Chương trình thực tập sinh tại công ty VINADES', 'chuong-trinh-thuc-tap-sinh-tai-cong-ty-vinades', 'Cơ hội để những sinh viên năng động được học tập, trải nghiệm, thử thách sớm với những tình huống thực tế, được làm việc cùng các chuyên gia có nhiều kinh nghiệm của công ty VINADES.', 'thuc-tap-sinh.jpg', '', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(15, 11, '11', 0, 1, 'Trần Thị Thu', 0, 1445391135, 1445394444, 1, 1445391120, 0, 2, 'Học việc tại công ty VINADES', 'hoc-viec-tai-cong-ty-vinades', 'Công ty cổ phần phát triển nguồn mở Việt Nam tạo cơ hội việc làm và học việc miễn phí cho những ứng viên có đam mê thiết kế web, lập trình PHP… được học tập và rèn luyện cùng đội ngũ lập trình viên phát triển NukeViet.', 'hoc-viec-tai-cong-ty-vinades.jpg', '', 1, 1, '4', 1, 0, 0, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_12`
--

DROP TABLE IF EXISTS `nv4_vi_news_12`;
CREATE TABLE `nv4_vi_news_12` (
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
) ENGINE=MyISAM  AUTO_INCREMENT=7  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_12`
--

INSERT INTO `nv4_vi_news_12` VALUES
(1, 1, '1,8,12', 0, 1, 'Quỳnh Nhi', 1, 1274989177, 1275318126, 1, 1274989140, 0, 2, 'Ra mắt công ty mã nguồn mở đầu tiên tại Việt Nam', 'Ra-mat-cong-ty-ma-nguon-mo-dau-tien-tai-Viet-Nam', 'Mã nguồn mở NukeViet vốn đã quá quen thuộc với cộng đồng CNTT Việt Nam trong mấy năm qua. Tuy chưa hoạt động chính thức, nhưng chỉ trong khoảng 5 năm gần đây, mã nguồn mở NukeViet đã được dùng phổ biến ở Việt Nam, áp dụng ở hầu hết các lĩnh vực, từ tin tức đến thương mại điện tử, từ các website cá nhân cho tới những hệ thống website doanh nghiệp.', 'nangly.jpg', 'Thành lập VINADES.,JSC', 1, 1, '6', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(6, 12, '1,12', 0, 1, 'Nguyễn Thế Hùng', 7, 1453192444, 1453192444, 1, 1453192444, 0, 2, 'Hãy trở thành nhà cung cấp dịch vụ của NukeViet&#33;', 'hay-tro-thanh-nha-cung-cap-dich-vu-cua-nukeviet', 'Nếu bạn là công ty hosting, là công ty thiết kế web có sử dụng mã nguồn NukeViet, là cơ sở đào tạo NukeViet hay là công ty bất kỳ có kinh doanh dịch vụ liên quan đến NukeViet... hãy cho chúng tôi biết thông tin liên hệ của bạn để NukeViet hỗ trợ bạn trong công việc kinh doanh nhé!', 'hoptac.jpg', '', 1, 1, '6', 1, 0, 14, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_2`
--

DROP TABLE IF EXISTS `nv4_vi_news_2`;
CREATE TABLE `nv4_vi_news_2` (
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
) ENGINE=MyISAM  AUTO_INCREMENT=19  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_2`
--

INSERT INTO `nv4_vi_news_2` VALUES
(18, 2, '2', 0, 1, 'VINADES', 0, 1453194455, 1453194455, 1, 1453194455, 0, 2, 'NukeViet 4.0 có gì mới?', 'nukeviet-4-0-co-gi-moi', 'NukeViet 4 là phiên bản NukeViet được cộng đồng đánh giá cao, hứa hẹn nhiều điểm vượt trội về công nghệ đến thời điểm hiện tại. NukeViet 4 thay đổi gần như hoàn toàn từ nhân hệ thống đến chức năng, giao diện người dùng. Vậy, có gì mới trong phiên bản này?', 'chuc-mung-nukeviet-thong-tu-20-bo-tttt.jpg', '', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_8`
--

DROP TABLE IF EXISTS `nv4_vi_news_8`;
CREATE TABLE `nv4_vi_news_8` (
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
) ENGINE=MyISAM  AUTO_INCREMENT=2  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_8`
--

INSERT INTO `nv4_vi_news_8` VALUES
(1, 1, '1,8,12', 0, 1, 'Quỳnh Nhi', 1, 1274989177, 1275318126, 1, 1274989140, 0, 2, 'Ra mắt công ty mã nguồn mở đầu tiên tại Việt Nam', 'Ra-mat-cong-ty-ma-nguon-mo-dau-tien-tai-Viet-Nam', 'Mã nguồn mở NukeViet vốn đã quá quen thuộc với cộng đồng CNTT Việt Nam trong mấy năm qua. Tuy chưa hoạt động chính thức, nhưng chỉ trong khoảng 5 năm gần đây, mã nguồn mở NukeViet đã được dùng phổ biến ở Việt Nam, áp dụng ở hầu hết các lĩnh vực, từ tin tức đến thương mại điện tử, từ các website cá nhân cho tới những hệ thống website doanh nghiệp.', 'nangly.jpg', 'Thành lập VINADES.,JSC', 1, 1, '6', 1, 0, 2, 0, 0, 0, 0, '', 0);


-- ---------------------------------------


--
-- Table structure for table `nv4_vi_news_9`
--

DROP TABLE IF EXISTS `nv4_vi_news_9`;
CREATE TABLE `nv4_vi_news_9` (
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
) ENGINE=MyISAM  AUTO_INCREMENT=11  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_9`
--

INSERT INTO `nv4_vi_news_9` VALUES
(10, 1, '1,9', 0, 1, '', 3, 1322685920, 1322686042, 1, 1322685920, 0, 2, 'Mã nguồn mở NukeViet giành giải ba Nhân tài đất Việt 2011', 'Ma-nguon-mo-NukeViet-gianh-giai-ba-Nhan-tai-dat-Viet-2011', 'Không có giải nhất và giải nhì, sản phẩm Mã nguồn mở NukeViet của VINADES.,JSC là một trong ba sản phẩm đã đoạt giải ba Nhân tài đất Việt 2011 - Lĩnh vực Công nghệ thông tin (Sản phẩm đã ứng dụng rộng rãi).', 'nukeviet-nhantaidatviet2011.jpg', 'Mã nguồn mở NukeViet giành giải ba Nhân tài đất Việt 2011', 1, 1, '6', 1, 0, 1, 0, 0, 0, 0, '', 0);


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
(1, 1, 1), 
(2, 17, 1), 
(2, 16, 2), 
(2, 15, 3), 
(2, 14, 4), 
(2, 12, 5), 
(2, 11, 6), 
(2, 1, 7), 
(2, 6, 8);


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
) ENGINE=MyISAM  AUTO_INCREMENT=13  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_cat`
--

INSERT INTO `nv4_vi_news_cat` VALUES
(1, 0, 'Tin tức', '', 'Tin-tuc', '', '', '', 0, 1, 1, 0, 'viewcat_main_right', 3, '8,12,9', 1, 4, 2, 0, '', '', '', 1274986690, 1274986690, '6'), 
(2, 0, 'Sản phẩm', '', 'San-pham', '', '', '', 0, 2, 5, 0, 'viewcat_page_new', 0, '', 1, 4, 2, 0, '', '', '', 1274986705, 1274986705, '6'), 
(8, 1, 'Thông cáo báo chí', '', 'thong-cao-bao-chi', '', '', '', 0, 1, 2, 1, 'viewcat_page_new', 0, '', 1, 4, 2, 0, '', '', '', 1274987105, 1274987244, '6'), 
(9, 1, 'Tin công nghệ', '', 'Tin-cong-nghe', '', '', '', 0, 3, 4, 1, 'viewcat_page_new', 0, '', 1, 4, 2, 0, '', '', '', 1274987212, 1274987212, '6'), 
(10, 0, 'Đối tác', '', 'Doi-tac', '', '', '', 0, 3, 9, 0, 'viewcat_page_new', 0, '', 1, 4, 2, 0, '', '', '', 1274987460, 1274987460, '6'), 
(11, 0, 'Tuyển dụng', '', 'Tuyen-dung', '', '', '', 0, 4, 12, 0, 'viewcat_page_new', 0, '', 1, 4, 2, 0, '', '', '', 1274987538, 1274987538, '6'), 
(12, 1, 'Bản tin nội bộ', '', 'Ban-tin-noi-bo', '', '', '', 0, 2, 3, 1, 'viewcat_page_new', 0, '', 1, 4, 2, 0, '', '', '', 1274987902, 1274987902, '6');


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
(1, '', '', '<p style=\"text-align: justify;\">Để chuyên nghiệp hóa việc phát hành mã nguồn mở NukeViet, Ban quản trị NukeViet quyết định thành lập doanh nghiệp chuyên quản NukeViet mang tên Công ty cổ phần Phát triển nguồn mở Việt Nam (Viết tắt là VINADES.,JSC), chính thức ra mắt vào ngày 25-2-2010 (trụ sở tại Hà Nội) nhằm phát triển, phổ biến hệ thống NukeViet tại Việt Nam.<br /> <br /> Theo ông Nguyễn Anh Tú, Chủ tịch HĐQT VINADES, công ty sẽ phát triển bộ mã nguồn NukeViet nhất quán theo con đường mã nguồn mở đã chọn, chuyên nghiệp và quy mô hơn bao giờ hết. Đặc biệt là hoàn toàn miễn phí đúng tinh thần mã nguồn mở quốc tế.<br /> <br /> NukeViet là một hệ quản trị nội dung mã nguồn mở (Opensource Content Management System) thuần Việt từ nền tảng PHP-Nuke và cơ sở dữ liệu MySQL. Người sử dụng thường gọi NukeViet là portal vì nó có khả năng tích hợp nhiều ứng dụng trên nền web, cho phép người sử dụng có thể dễ dàng xuất bản và quản trị các nội dung của họ lên internet hoặc intranet.<br /> <br /> NukeViet cung cấp nhiều dịch vụ và ứng dụng nhờ khả năng tăng cường tính năng thêm các module, block... tạo sự dễ dàng cài đặt, quản lý, ngay cả với những người mới tiếp cận với website. Người dùng có thể tìm hiểu thêm thông tin và tải về sản phẩm tại địa chỉ http://nukeviet.vn</p><blockquote> <p style=\"text-align: justify;\"> <em>Thông tin ra mắt công ty VINADES có thể tìm thấy trên trang 7 báo Hà Nội Mới ra ngày 25/02/2010 (<a href=\"http://hanoimoi.com.vn/newsdetail/Cong_nghe/309750/ra-mat-cong-ty-ma-nguon-mo-dau-tien-tai-viet-nam.htm\" target=\"_blank\">xem chi tiết</a>), Bản tin tiếng Anh của đài tiếng nói Việt Nam ngày 26/02/2010 (<a href=\"http://english.vovnews.vn/Home/First-opensource-company-starts-operation/20102/112960.vov\" target=\"_blank\">xem chi tiết</a>); trang 7 báo An ninh Thủ Đô số 2858 ra vào thứ 2 ngày 01/03/2010 và các trang tin tức, báo điện tử khác.</em></p></blockquote>', 'http://hanoimoi.com.vn/newsdetail/Cong_nghe/309750/ra-mat-cong-ty-ma-nguon-mo-dau-tien-tai-viet-nam.htm', 2, 0, 1, 1, 1, 0), 
(6, '', '', '<div style=\"text-align: justify;\">Tính đến năm 2015, ước tính có hơn 10.000 website đang sử dụng NukeViet. Nhu cầu triển khai NukeViet không chỉ dừng lại ở các cá nhân, doanh nghiệp, cơ sở giáo dục mà đã lan rộng ra khối chính phủ.</div><div style=\"text-align: justify;\"><br  />Cộng đồng NukeViet cũng đã lớn mạnh hơn trước. Nếu như đầu năm 2010, ngoài Công ty VINADES chỉ có một vài công ty cung cấp dịch vụ cho NukeViet nhưng không chuyên, thì theo thống kê năm 2015 đã có hàng trăm doanh nghiệp đang cung cấp dịch vụ có liên quan đến NukeViet như: đào tạo NukeViet, thiết kế web, phát triển phần mềm, cung cấp giao diện, module... trên nền tảng NukeViet. Đặc biệt có nhiều doanh nghiệp hoàn toàn cung cấp dịch vụ thiết kế web, cung cấp giao diện, module... sử dụng nền tảng NukeViet. Nhiều sản phẩm phái sinh từ NukeViet đã ra đời, NukeViet được phát triển thành nhiều phần mềm quản lý sử dụng trên mạng LAN hay trên internet, được phát triển thành các phần mềm dùng riêng hay sử dụng như một nền tảng để cung cấp dịch vụ online, thậm chí đã được thử nghiệm tích hợp vào trong các thiết bị phần cứng để bán cùng thiết bị (NukeViet Captive Portal - dùng để quản lý người dùng truy cập internet, tích hợp trong thiết bị quản lý wifi)...<br  /><br  />Tuy nhiên, cùng với những cơ hội, cộng đồng NukeViet đang đứng trước một thách thức mới. NukeViet cần tập hợp tất cả các doanh nghiệp, tổ chức và cá nhân đang cung cấp dịch vụ cho NukeViet và liên kết các đơn vị này với nhau để giúp nhau chuyên nghiệp hóa, cùng nhau chia sẻ những cơ hội kinh doanh và trở lên lớn mạnh hơn.<br  /><br  />Nếu cộng đồng NukeViet có 500 công ty siêu nhỏ chỉ 2-3 người và những công ty này đứng riêng rẽ như hiện nay thì NukeViet mãi bé nhỏ và sẽ không làm được việc gì. Nhưng nếu 500 công ty này biết nhau, cùng làm một số việc, cùng tham gia phát triển NukeViet, đó sẽ là sức mạnh rất lớn cho một phần mềm nguồn mở như NukeViet, và đó cũng là cơ hội rất lớn để các công ty nhỏ ấy trở lên chuyên nghiệp và vững mạnh.<br  /><br  />Cho dù bạn là doanh nghiệp hay một nhóm kinh doanh, cho dù bạn đang cung cấp bất kỳ dịch vụ có liên quan trực tiếp đến NukeViet như: đào tạo NukeViet, thiết kế web, phát triển phần mềm, cung cấp giao diện, module... hoặc gián tiếp có liên quan đến NukeViet (ví dụ các công ty hosting, các nhà cung cấp dịch vụ thanh toán điện tử...). Bạn đều là một thành phần quan trọng của NukeViet. Dù bạn là công ty to hay một nhóm nhỏ, hãy đăng ký vào danh sách các đối tác của NukeViet để thiết lập kênh liên lạc với các doanh nghiệp khác trong cộng đồng NukeViet và nhận sự hỗ trợ từ Ban Quản Trị NukeViet cũng như từ các cơ quan nhà nước đang có nhu cầu tìm kiếm các đơn vị cung ứng dịch vụ cho NukeViet.<br  /><br  />Hãy gửi email cho Ban Quản Trị NukeViet về địa chỉ: admin@nukeviet.vn để đăng ký vào danh sách các đơn vị hỗ trợ NukeViet.<br  /><br  />Tiêu đề email: Đăng ký vào danh sách các đơn vị cung cấp dịch vụ dựa trên NukeViet<br  />Nội dung email: Thông tin về đơn vị, dịch vụ cung cấp.<br  /><br  />Hoặc gửi yêu cầu tại đây: <a href=\"http://nukeviet.vn/vi/contact/\" target=\"_blank\">http://nukeviet.vn/vi/contact/</a><br  /><br  />Mọi yêu cầu sẽ được phản hồi trong vòng 24h. Trường hợp không nhận được phản hồi, hãy liên hệ với Ban Quản Trị NukeViet qua các kênh liên lạc khác như:<br  /><br  />- Diễn đàn doanh nghiệp NukeViet: <a href=\"http://forum.nukeviet.vn/viewforum.php?f=4\" target=\"_blank\">http://forum.nukeviet.vn/viewforum.php?f=4</a><br  />- Fanpage NukeViet trên FaceBook: <a href=\"http://fb.com/nukeviet/\" target=\"_blank\">http://fb.com/nukeviet/</a><br  /><br  />Vui lòng truy cập địa chỉ sau để xem danh sách các đơn vị: <a href=\"https://nukeviet.vn/vi/partner/\" target=\"_blank\">https://nukeviet.vn/vi/partner/</a></div>', 'http://vinades.vn/vi/news/thong-cao-bao-chi/Thu-moi-hop-tac-6/', 2, 0, 1, 1, 1, 0), 
(7, '', '', 'Công ty cổ phần phát triển nguồn mở Việt Nam (VINADES.,JSC) đang thu hút tuyển dụng nhân tài ở các vị trí:<ol><li><a href=\"/Tuyen-dung/Tuyen-dung-lap-trinh-vien-PHP-7.html\">Lập trình viên PHP và MySQL.</a></li><li><a href=\"/Tuyen-dung/Tuyen-dung-lap-trinh-vien-front-end-HTML-CSS-JS-9.html\">Lập trình viên front-end (HTML/CSS/JS).</a></li><li><a href=\"/Tuyen-dung/Tuyen-dung-chuyen-vien-do-hoa-8.html\">Chuyên Viên Đồ Hoạ.</a></li></ol><br />Tại VINADES.,JSC bạn sẽ được tham gia các dự án của công ty, tham gia xây dựng và phát triển bộ nhân hệ thống NukeViet, được học hỏi và trau dồi nâng cao kiến thức và kỹ năng cá nhân. Ngoài ra, nếu bạn đam mê về nguồn mở và có mong muốn cống hiến cho quá trình phát triển nguồn mở của Việt Nam nói riêng và của thế giới nói chung, thì đây là cơ hội lớn nhất để bạn đạt được mong muốn của mình. Tham gia công tác tại công ty là bạn đã góp phần xây dựng một cộng đồng nguồn mở chuyên nghiệp cho Việt Nam để vươn xa ra thế giới.<br /><br /><span style=\"font-size:16px;\"><strong>1. Vị trí dự tuyển:</strong></span> Lập trình viên PHP và MySQL<br /><br /><span style=\"font-size:16px;\"><strong>2. Mô tả công việc:</strong></span><ul><li>Phát triển hệ thống NukeViet.</li><li>Phân tích yêu cầu và lập trình riêng cho các dự án cụ thể.</li><li>Thực hiện các công đoạn để dưa website vào hoạt động như upload dữ liệu lên host, xử lý lỗi, sự cố liên quan.</li><li>Chịu trách nhiệm về chất lượng, trải nghiệm người dùng của sản phẩm trong khi sản phẩm hoạt động.</li><li>Thực hiện các công việc theo sự phân công của cấp trên.</li><li>Chịu trách nhiệm về chất lượng và tiến độ công việc.</li></ul><br /><span style=\"font-size:16px;\"><strong>3. Yêu cầu:</strong></span><ul><li>Nắm vững kiến thức hướng đối tượng, cấu trúc dữ liệu và giải thuật.</li><li>Có kinh nghiệm về PHP và các hệ cơ sở dữ liệu MySQL.…</li><li>Tư duy lập trình tốt, thiết kế CSDL chuẩn, biết xử lý nhanh các vấn đề khi phát sinh nghiệp vụ mới.</li><li>Sửa được các lỗi, nâng cấp tính năng cho các module đã có. 6. Viết module mới.</li><li>Biết đưa website lên host, xử lý lỗi, sự cố liên quan.</li><li>Chịu trách nhiệm về chất lượng và tiến độ công việc phụ trách.</li><li>Khả năng sáng tạo.</li><li>Đam mê công việc về lập trình web.</li></ul><br /><em><strong>Ưu tiên các ứng viên:</strong></em><ul><li>Có kiến thức cơ bản về quản trị website NukeViệt.</li><li>Sử dụng và nắm rõ các tính năng, block thường dùng của NukeViet.</li><li>Biết sử dụng git để quản lý source code (nếu ứng viên chưa biết công ty sẽ đào tạo thêm).</li><li>Có khả năng giao tiếp với khách hàng (Trực tiếp, điện thoại, email).</li><li>Có khả năng làm việc độc lập và làm việc theo nhóm.</li><li>Có tinh thần trách nhiệm cao và chủ động trong công việc.</li><li>Có khả năng trình bày ý tưởng.</li></ul><br /><span style=\"font-size:16px;\"><strong>4. Quyền lợi:</strong></span><ul><li>Lương thoả thuận, trả qua ATM.</li><li>Thưởng theo dự án, các ngày lễ tết.</li><li>Hưởng các chế độ khác theo quy định của công ty và pháp luật: Bảo hiểm y tế, bảo hiểm xã hội...</li></ul><br /><span style=\"font-size:16px;\"><strong>5. Thời gian làm việc:</strong></span> Toàn thời gian cố định hoặc làm online.<br /><br /><span style=\"font-size:16px;\"><strong>6. Hạn nộp hồ sơ:</strong></span> Không hạn chế, vui lòng kiểm tra tại <a href=\"http://vinades.vn/vi/news/Tuyen-dung/\">http://vinades.vn/vi/news/Tuyen-dung/</a><br /><br /><span style=\"font-size:16px;\"><strong>7. Cách thức đăng ký dự tuyển:</strong></span> Làm Hồ sơ xin việc<em><strong> (download tại đây: <strong><a href=\"http://vinades.vn/vi/download/Tai-lieu/Ban-khai-so-yeu-ly-lich-ky-thuat-vien/\" target=\"_blank\"><u>Mẫu lý lịch ứng viên</u></a></strong>)</strong></em> và gửi về hòm thư <a href=\"mailto:tuyendung@vinades.vn\">tuyendung@vinades.vn</a><br /><br /><span style=\"font-size:16px;\"><strong>8. Hồ sơ bao gồm:</strong></span><ul><li>Đơn xin việc: Tự biên soạn.</li><li>Thông tin ứng viên: Theo mẫu của VINADES.,JSC</li></ul>&nbsp;<p style=\"text-align: justify;\"><strong>Chi tiết vui lòng tham khảo tại:</strong> <a href=\"http://vinades.vn/vi/news/Tuyen-dung/\" target=\"_blank\">http://vinades.vn/vi/news/Tuyen-dung/</a><br /><br /><strong>Mọi thắc mắc vui lòng liên hệ:</strong></p><blockquote><p style=\"text-align: justify;\"><strong>Công ty cổ phần phát triển nguồn mở Việt Nam.</strong><br />Trụ sở chính: Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội.</p><div>- Tel: +84-4-85872007 - Fax: +84-4-35500914<br />- Email: <a href=\"mailto:contact@vinades.vn\">contact@vinades.vn</a> - Website: <a href=\"http://www.vinades.vn/\">http://www.vinades.vn</a></div></blockquote>', 'http://vinades.vn/vi/news/Tuyen-dung/', 2, 0, 1, 1, 1, 0), 
(8, '', '', 'Công ty cổ phần phát triển nguồn mở Việt Nam (VINADES.,JSC) đang thu hút tuyển dụng nhân tài ở các vị trí:<ol><li><a href=\"/Tuyen-dung/Tuyen-dung-lap-trinh-vien-PHP-7.html\">Lập trình viên PHP và MySQL.</a></li><li><a href=\"/Tuyen-dung/Tuyen-dung-lap-trinh-vien-front-end-HTML-CSS-JS-9.html\">Lập trình viên front-end (HTML/CSS/JS).</a></li><li><a href=\"/Tuyen-dung/Tuyen-dung-chuyen-vien-do-hoa-8.html\">Chuyên Viên Đồ Hoạ.</a></li></ol><br />Tại VINADES.,JSC bạn sẽ được tham gia các dự án của công ty, tham gia xây dựng và phát triển bộ nhân hệ thống NukeViet, được học hỏi và trau dồi nâng cao kiến thức và kỹ năng cá nhân. Ngoài ra, nếu bạn đam mê về nguồn mở và có mong muốn cống hiến cho quá trình phát triển nguồn mở của Việt Nam nói riêng và của thế giới nói chung, thì đây là cơ hội lớn nhất để bạn đạt được mong muốn của mình. Tham gia công tác tại công ty là bạn đã góp phần xây dựng một cộng đồng nguồn mở chuyên nghiệp cho Việt Nam để vươn xa ra thế giới.<br /><br /><span style=\"font-size:16px;\"><strong>1. Vị trí dự tuyển:</strong></span> Chuyên viên đồ hoạ.<br /><br /><span style=\"font-size:16px;\"><strong>2. Mô tả công việc:</strong></span><br /><br /><em><strong>Công việc chính:</strong></em><ul><li>Thiết kế layout, banner, logo website theo yêu cầu của dự án.</li><li>Đưa ra sản phẩm sáng tạo dựa trên ý tưởng của khách hàng.</li><li>Thực hiện các công việc theo sự phân công của cấp trên.</li><li>Chịu trách nhiệm về chất lượng và tiến độ công việc.</li></ul><br /><em><strong>Ngoài ra bạn cần có khả năng thực hiện các công việc sau:</strong></em><ul><li>Cắt và ghép giao diện cho hệ thống.</li><li>Valid CSS, xHTML.</li></ul><br /><span style=\"font-size:16px;\"><strong>3. Yêu cầu:</strong></span><ul><li>Sử dụng thành thạo phần mềm thiết kế: Photoshop ngoài ra cần biết cách sử dụng các phần mềm thiết kế khác là một lợi thế.</li><li>Có kiến thức cơ bản về thiết kế website: Am hiểu các dạng layout, thành phần của một website.</li><li>Có kinh nghiệm, kỹ năng thiết kế giao diện web, logo, banner.</li><li>Chịu trách nhiệm về chất lượng và tiến độ công việc phụ trách.</li><li>Khả năng sáng tạo, tính thẩm mỹ tốt</li><li>Đam mê công việc thiết kế và website.</li></ul><br /><em><strong>Ưu tiên các ứng viên:</strong></em><ul><li>Có kiến thức cơ bản về quản trị website NukeViệt</li><li>Am hiểu về Responsive và có thể thiết kế giao diện, layout trên mobile (Boostrap).</li><li>Sử dụng và nắm rõ các tính năng, block thường dùng của NukeViet.</li><li>Biết sử dụng git để quản lý source code (nếu ứng viên chưa biết công ty sẽ đào tạo thêm).</li><li>Sử dụng thành thạo HTML5, CSS3 &amp; Javascrip/Jquery và Xtemplate</li><li>Khả năng chuyển PSD sang NukeViet tốt.</li><li>Hiểu rõ và nắm chắc cách làm Theme/Template.</li><li>Có khả năng giao tiếp với khách hàng (Trực tiếp, điện thoại, email).</li><li>Có khả năng làm việc độc lập và làm việc theo nhóm.</li><li>Có tinh thần trách nhiệm cao và chủ động trong công việc.</li><li>Có khả năng trình bày ý tưởng</li></ul><br /><span style=\"font-size:16px;\"><strong>4. Quyền lợi:</strong></span><ul><li>Lương thoả thuận, trả qua ATM.</li><li>Thưởng theo dự án, các ngày lễ tết.</li><li>Hưởng các chế độ khác theo quy định của công ty và pháp luật: Bảo hiểm y tế, bảo hiểm xã hội...</li></ul><br /><span style=\"font-size:16px;\"><strong>5. Thời gian làm việc:</strong></span> Toàn thời gian cố định hoặc làm online.<br /><br /><span style=\"font-size:16px;\"><strong>6. Hạn nộp hồ sơ:</strong></span> Không hạn chế, vui lòng kiểm tra tại <a href=\"http://vinades.vn/vi/news/Tuyen-dung/\">http://vinades.vn/vi/news/Tuyen-dung/</a><br /><br /><span style=\"font-size:16px;\"><strong>7. Cách thức đăng ký dự tuyển:</strong></span> Làm Hồ sơ xin việc<em><strong> (download tại đây: <strong><a href=\"http://vinades.vn/vi/download/Tai-lieu/Ban-khai-so-yeu-ly-lich-ky-thuat-vien/\" target=\"_blank\"><u>Mẫu lý lịch ứng viên</u></a></strong>)</strong></em> và gửi về hòm thư <a href=\"mailto:tuyendung@vinades.vn\">tuyendung@vinades.vn</a><br /><br /><span style=\"font-size:16px;\"><strong>8. Hồ sơ bao gồm:</strong></span><ul><li>Đơn xin việc: Tự biên soạn.</li><li>Thông tin ứng viên: Theo mẫu của VINADES.,JSC</li></ul>&nbsp;<p style=\"text-align: justify;\"><strong>Chi tiết vui lòng tham khảo tại:</strong> <a href=\"http://vinades.vn/vi/news/Tuyen-dung/\" target=\"_blank\">http://vinades.vn/vi/news/Tuyen-dung/</a><br /><br /><strong>Mọi thắc mắc vui lòng liên hệ:</strong></p><blockquote><p style=\"text-align: justify;\"><strong>Công ty cổ phần phát triển nguồn mở Việt Nam.</strong><br />Trụ sở chính: Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội.</p><div>- Tel: +84-4-85872007 - Fax: +84-4-35500914<br />- Email: <a href=\"mailto:contact@vinades.vn\">contact@vinades.vn</a> - Website: <a href=\"http://www.vinades.vn/\">http://www.vinades.vn</a></div></blockquote>', '', 2, 0, 1, 1, 1, 0), 
(9, '', '', 'Công ty cổ phần phát triển nguồn mở Việt Nam (VINADES.,JSC) đang thu hút tuyển dụng nhân tài ở các vị trí:<ol><li><a href=\"/Tuyen-dung/Tuyen-dung-lap-trinh-vien-PHP-7.html\">Lập trình viên PHP và MySQL.</a></li><li><a href=\"/Tuyen-dung/Tuyen-dung-lap-trinh-vien-front-end-HTML-CSS-JS-9.html\">Lập trình viên front-end (HTML/CSS/JS).</a></li><li><a href=\"/Tuyen-dung/Tuyen-dung-chuyen-vien-do-hoa-8.html\">Chuyên Viên Đồ Hoạ.</a></li></ol><br />Tại VINADES.,JSC bạn sẽ được tham gia các dự án của công ty, tham gia xây dựng và phát triển bộ nhân hệ thống NukeViet, được học hỏi và trau dồi nâng cao kiến thức và kỹ năng cá nhân. Ngoài ra, nếu bạn đam mê về nguồn mở và có mong muốn cống hiến cho quá trình phát triển nguồn mở của Việt Nam nói riêng và của thế giới nói chung, thì đây là cơ hội lớn nhất để bạn đạt được mong muốn của mình. Tham gia công tác tại công ty là bạn đã góp phần xây dựng một cộng đồng nguồn mở chuyên nghiệp cho Việt Nam để vươn xa ra thế giới.<br /><br /><span style=\"font-size:16px;\"><strong>1. Vị trí dự tuyển:</strong></span> Lập trình viên front-end (HTML/ CSS/ JS)<br /><br /><span style=\"font-size:16px;\"><strong>2. Mô tả công việc:</strong></span><ul><li>Cắt, làm giao diện website từ bản thiết kế (sử dụng Photoshop) trên nền hệ thống NukeViet.</li><li>Tham gia vào việc phát triển Front-End các ứng dụng nền web.</li><li>Thực hiện các công đoạn để dưa website vào hoạt động như upload dữ liệu lên host, xử lý lỗi, sự cố liên quan.</li><li>Chịu trách nhiệm về chất lượng, trải nghiệm người dùng, thẩm mỹ của sản phẩm trong khi sản phẩm hoạt động Tham mưu, tư vấn về chất lượng, thẩm mỹ, trải nghiệm người dùng về các sản phẩm.</li><li>Đảm bảo website theo các tiêu chuẩn web (W3c, XHTML, CSS 3.0, Tableless, no inline style, … ).</li><li>Đảm bảo website hiển thị đúng trên tất cả các trình duyệt.</li><li>Đảm bảo website theo chuẩn “Responsive Web Design.</li><li>Đảm bảo việc đưa sản phẩm thiết kế đến người dùng cuối cùng một cách chính xác và đẹp.</li><li>Thực hiện các công việc theo sự phân công của cấp trên.</li><li>Chịu trách nhiệm về chất lượng và tiến độ công việc.</li></ul><br /><span style=\"font-size:16px;\"><strong>3. Yêu cầu:</strong></span><ul><li>Có kiến thức cơ bản về thiết kế website: Am hiểu các dạng layout, thành phần của một website.</li><li>Hiểu rõ và nắm chắc cách làm Theme/Template.</li><li>Sử dụng thành thạo HTML5, CSS3 &amp; Javascrip/Jquery và Xtemplate</li><li>Khả năng chuyển PSD sang NukeViet tốt.</li><li>Biết đưa website lên host, xử lý lỗi, sự cố liên quan.</li><li>Chịu trách nhiệm về chất lượng và tiến độ công việc phụ trách.</li><li>Khả năng sáng tạo, tính thẩm mỹ tốt.</li><li>Đam mê công việc về web.</li></ul><br /><em><strong>Ưu tiên các ứng viên:</strong></em><ul><li>Có kiến thức cơ bản về quản trị website NukeViệt.</li><li>Am hiểu về Responsive và có thể thiết kế giao diện, layout trên mobile (Boostrap).</li><li>Sử dụng và nắm rõ các tính năng, block thường dùng của NukeViet.</li><li>Biết sử dụng git để quản lý source code (nếu ứng viên chưa biết công ty sẽ đào tạo thêm).</li><li>Có khả năng giao tiếp với khách hàng (Trực tiếp, điện thoại, email).</li><li>Có khả năng làm việc độc lập và làm việc theo nhóm.</li><li>Có tinh thần trách nhiệm cao và chủ động trong công việc.</li><li>Có khả năng trình bày ý tưởng.</li></ul><br /><span style=\"font-size:16px;\"><strong>4. Quyền lợi:</strong></span><ul><li>Lương thoả thuận, trả qua ATM.</li><li>Thưởng theo dự án, các ngày lễ tết.</li><li>Hưởng các chế độ khác theo quy định của công ty và pháp luật: Bảo hiểm y tế, bảo hiểm xã hội...</li></ul><br /><span style=\"font-size:16px;\"><strong>5. Thời gian làm việc:</strong></span> Toàn thời gian cố định hoặc làm online.<br /><br /><span style=\"font-size:16px;\"><strong>6. Hạn nộp hồ sơ:</strong></span> Không hạn chế, vui lòng kiểm tra tại <a href=\"http://vinades.vn/vi/news/Tuyen-dung/\">http://vinades.vn/vi/news/Tuyen-dung/</a><br /><br /><span style=\"font-size:16px;\"><strong>7. Cách thức đăng ký dự tuyển:</strong></span> Làm Hồ sơ xin việc<em><strong> (download tại đây: <strong><a href=\"http://vinades.vn/vi/download/Tai-lieu/Ban-khai-so-yeu-ly-lich-ky-thuat-vien/\" target=\"_blank\"><u>Mẫu lý lịch ứng viên</u></a></strong>)</strong></em> và gửi về hòm thư <a href=\"mailto:tuyendung@vinades.vn\">tuyendung@vinades.vn</a><br /><br /><span style=\"font-size:16px;\"><strong>8. Hồ sơ bao gồm:</strong></span><ul><li>Đơn xin việc: Tự biên soạn.</li><li>Thông tin ứng viên: Theo mẫu của VINADES.,JSC</li></ul>&nbsp;<p style=\"text-align: justify;\"><strong>Chi tiết vui lòng tham khảo tại:</strong> <a href=\"http://vinades.vn/vi/news/Tuyen-dung/\" target=\"_blank\">http://vinades.vn/vi/news/Tuyen-dung/</a><br /><br /><strong>Mọi thắc mắc vui lòng liên hệ:</strong></p><blockquote><p style=\"text-align: justify;\"><strong>Công ty cổ phần phát triển nguồn mở Việt Nam.</strong><br />Trụ sở chính: Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội.</p><div>- Tel: +84-4-85872007 - Fax: +84-4-35500914<br />- Email: <a href=\"mailto:contact@vinades.vn\">contact@vinades.vn</a> - Website: <a href=\"http://www.vinades.vn/\">http://www.vinades.vn</a></div></blockquote>', '', 2, 0, 1, 1, 1, 0), 
(10, '', '', 'Cả hội trường như vỡ òa, rộn tiếng vỗ tay, tiếng cười nói chúc mừng các nhà khoa học, các nhóm tác giả đoạt Giải thưởng Nhân tài Đất Việt năm 2011. Năm thứ 7 liên tiếp, Giải thưởng đã phát hiện và tôn vinh nhiều tài năng của đất nước.<div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/01_b7d3f.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Sân khấu trước lễ trao giải.</span></div><div> &nbsp;</div><div align=\"center\"> &nbsp;</div><div align=\"left\"> Cơ cấu Giải thưởng của Nhân tài Đất Việt 2011 trong lĩnh vực CNTT bao gồm 2 hệ thống giải dành cho “Sản phẩm có tiềm năng ứng dụng” và “Sản phẩm đã ứng dụng rộng rãi trong thực tế”. Mỗi hệ thống giải sẽ có 1 giải Nhất, 1 giải Nhì và 1 giải Ba với trị giá giải thưởng tương đương là 100 triệu đồng, 50 triệu đồng và 30 triệu đồng cùng phần thưởng của các đơn vị tài trợ.</div><div align=\"center\"> &nbsp;</div><div align=\"center\"> <div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/03_f19bd.jpg\" width=\"350\" /></div> <div align=\"center\"> Nhiều tác giả, nhóm tác giả đến lễ trao giải từ rất sớm.</div></div><p> Giải thưởng Nhân tài Đất Việt 2011 trong lĩnh vực Khoa học Tự nhiên được gọi chính thức là Giải thưởng Khoa học Tự nhiên Việt Nam sẽ có tối đa 6 giải, trị giá 100 triệu đồng/giải dành cho các lĩnh vực: Toán học, Cơ học, Vật lý, Hoá học, Các khoa học về sự sống, Các khoa học về trái đất (gồm cả biển) và môi trường, và các lĩnh vực khoa học liên ngành hoặc đa ngành của hai hoặc nhiều ngành nói trên. Viện Khoa học và Công nghệ Việt Nam thành lập Hội đồng giám khảo gồm các nhà khoa học tự nhiên hàng đầu trong nước để thực hiện việc đánh giá và trao giải.</p><div> Sau thành công của việc trao Giải thưởng Nhân tài Đất Việt trong lĩnh vực Y dược năm 2010, Ban Tổ chức tiếp tục tìm kiếm những chủ nhân xứng đáng cho Giải thưởng này trong năm 2011.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/07_78b85.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Nguyên Tổng Bí thư BCH TW Đảng Cộng sản Việt Nam Lê Khả Phiêu tới&nbsp;dự Lễ trao giải.</span></div><div> &nbsp;</div><div> 45 phút trước lễ trao giải, không khí tại Cung Văn hóa Hữu nghị Việt - Xô đã trở nên nhộn nhịp. Sảnh phía trước Cung gần như chật kín. Rất đông bạn trẻ yêu thích công nghệ thông tin, sinh viên các trường đại học đã đổ về đây, cùng với đó là những bó hoa tươi tắn sẽ được dành cho các tác giả, nhóm tác giả đoạt giải.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/09_aef87.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Phó Chủ tịch nước CHXHCN Việt Nam Nguyễn Thị Doan.</span></div><div> &nbsp;</div><div> Các vị khách quý cũng đến từ rất sớm. Tới tham dự lễ trao giải năm nay có ông Lê Khả Phiêu, nguyên Tổng Bí thư BCH TW Đảng Cộng sản Việt Nam; bà Nguyễn Thị Doan, Phó Chủ tịch nước CHXHCN Việt Nam; ông Vũ Oanh, nguyên Ủy viên Bộ Chính trị, nguyên Chủ tịch Hội Khuyến học Việt Nam; ông Nguyễn Bắc Son, Bộ trưởng Bộ Thông tin và Truyền thông; ông Đặng Ngọc Tùng, Chủ tịch Tổng Liên đoàn lao động Việt Nam; ông Phạm Văn Linh, Phó trưởng ban Tuyên giáo Trung ương; ông Đỗ Trung Tá, Phái viên của Thủ tướng Chính phủ về CNTT, Chủ tịch Hội đồng Khoa học công nghệ quốc gia; ông Nguyễn Quốc Triệu, nguyên Bộ trưởng Bộ Y tế, Trưởng Ban Bảo vệ Sức khỏe TƯ; bà Cù Thị Hậu, Chủ tịch Hội người cao tuổi Việt Nam; ông Lê Doãn Hợp, nguyên Bộ trưởng Bộ Thông tin Truyền thông, Chủ tịch Hội thông tin truyền thông số…</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/08_ba46c.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Bộ trưởng Bộ Thông tin và Truyền thông Nguyễn Bắc Son.</span></div><div align=\"center\"> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/06_29592.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Giáo sư - Viện sỹ Nguyễn Văn Hiệu.</span></div><div align=\"center\"> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/04_051f2.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Nguyên Bộ trưởng Bộ Y tế Nguyễn Quốc Triệu.</span></div><div align=\"center\"> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/05_c7ea4.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Ông Vũ Oanh, nguyên Ủy viên Bộ Chính trị, nguyên Chủ tịch Hội Khuyến học Việt Nam.</span></div><p> Do tuổi cao, sức yếu hoặc bận công tác không đến tham dự lễ trao giải nhưng Đại tướng Võ Nguyên Giáp và Chủ tịch nước Trương Tấn Sang cũng gửi lẵng hoa đến chúc mừng lễ trao giải.</p><div> Đúng 20h, Lễ trao giải bắt đầu với bài hát “Nhân tài Đất Việt” do ca sỹ Thái Thùy Linh cùng ca sĩ nhí và nhóm múa biểu diễn. Các nhóm tác giả tham dự Giải thưởng năm 2011 và những tác giả của các năm trước từ từ bước ra sân khấu trong tiếng vỗ tay tán dương của khán giả.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/12_74abf.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> &nbsp;</div><div align=\"center\"> <div> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/PHN15999_3e629.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Tiết mục mở màn Lễ trao giải.</span></div><p> Trước Lễ trao giải Giải thưởng Nhân tài Đất Việt năm 2011, Đại tướng Võ Nguyên Giáp, Chủ tịch danh dự Hội Khuyến học Việt Nam, đã gửi thư chúc mừng, khích lệ Ban tổ chức Giải thưởng cũng như các nhà khoa học, các tác giả tham dự.</p><blockquote> <p> <em><span style=\"FONT-STYLE: italic\">Hà Nội, ngày 16 tháng 11 năm 2011</span></em></p> <div> <em>Giải thưởng “Nhân tài đất Việt” do Hội Khuyến học Việt Nam khởi xướng đã bước vào năm thứ bảy (2005 - 2011) với ba lĩnh vực: Công nghệ thông tin, Khoa học tự nhiên và Y dược.</em></div></blockquote><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/thuDaituong1_767f4.jpg\" style=\"MARGIN: 5px\" width=\"400\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Thư của Đại tướng Võ Nguyên Giáp gửi BTC Giải thưởng Nhân tài đất Việt.</span></div><blockquote> <p> <em>Tôi gửi lời chúc mừng các nhà khoa học và các thí sinh được nhận giải thưởng “Nhân tài đất Việt” năm nay.</em></p> <p> <em>Mong rằng, các sản phẩm và các công trình nghiên cứu được trao giải sẽ được tiếp tục hoàn thiện và được ứng dụng rộng rãi trong đời sống, đem lại hiệu quả kinh tế và xã hội thiết thực.</em></p> <p> <em>Nhân ngày “Nhà giáo Việt Nam”, chúc Hội Khuyến học Việt nam, chúc các thầy giáo và cô giáo, với tâm huyết và trí tuệ của mình, sẽ đóng góp xứng đáng vào công cuộc đổi mới căn bản và toàn diện nền giáo dục nước nhà, để cho nền giáo dục Việt Nam thực sự là cội nguồn của nguyên khí quốc gia, đảm bảo cho mọi nhân cách và tài năng đất Việt được vun đắp và phát huy vì sự trường tồn, sự phát triển tiến bộ và bền vững của đất nước trong thời đại toàn cầu hóa và hội nhập quốc tế.</em></p> <p> <em>Chào thân ái,</em></p> <p> <strong><em>Chủ tịch danh dự Hội Khuyến học Việt Nam</em></strong></p> <p> <strong><em>Đại tướng Võ Nguyên Giáp</em></strong></p></blockquote><p> Phát biểu khai mạc Lễ trao giải, Nhà báo Phạm Huy Hoàn, TBT báo điện tử Dân trí, Trưởng Ban tổ chức, bày tỏ lời cám ơn chân thành về những tình cảm cao đẹp và sự quan tâm chăm sóc của Đại tướng Võ Nguyên Giáp và Chủ tịch nước Trương Tấn Sang đã và đang dành cho Nhân tài Đất Việt.</p><div> Nhà báo Phạm Huy Hoàn nhấn mạnh, Giải thưởng Nhân tài Đất Việt suốt 7 năm qua đều nhận được sự quan tâm của các vị lãnh đạo Đảng, Nhà nước và của toàn xã hội. Tại Lễ trao giải, Ban tổ chức luôn có vinh dự được đón tiếp&nbsp;các vị lãnh đạo&nbsp; Đảng và Nhà nước đến dự và trực tiếp trao Giải thưởng.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/15_4670c.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Trưởng Ban tổ chức Phạm Huy Hoàn phát biểu khai mạc buổi lễ.</span></div><p> Năm 2011, Giải thưởng có 3 lĩnh vực được xét trao giải là CNTT, Khoa học tự nhiên và Y dược. Lĩnh&nbsp; vực CNTT đã đón nhận 204 sản phẩm tham dự từ mọi miền đất nước và cả nước ngoài như thí sinh Nguyễn Thái Bình từ bang California - Hoa Kỳ và một thí sinh ở Pháp cũng đăng ký tham gia.</p><div> “Cùng với lĩnh vực CNTT, năm nay, Hội đồng khoa học của Viện khoa học và công nghệ Việt Nam và Hội đồng khoa học - Bộ Y tế tiếp tục giới thiệu những nhà khoa học xuất&nbsp; sắc, có công trình nghiên cứu đem lại nhiều lợi ích cho xã hội trong lĩnh vực khoa học tự nhiên và lĩnh vực y dược. Đó là những bác sĩ tài năng, những nhà khoa học mẫn tuệ, những người đang ngày đêm thầm lặng cống hiến trí tuệ sáng tạo của mình cho xã hội trong công cuộc xây dựng đất nước.” - nhà báo Phạm Huy Hoàn nói.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/14_6e18f.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Nhà báo Phạm Huy Hoàn, TBT báo điện tử Dân trí, Trưởng BTC Giải thưởng và ông Phan Hoàng Đức, Phó TGĐ Tập đoàn VNPT nhận lẵng hoa chúc mừng của Đại tướng Võ Nguyên Giáp và Chủ tịch nước Trương Tấn Sang.</span></div><p> Cũng theo Trưởng Ban tổ chức Phạm Huy Hoàn, đến nay, vị Chủ tịch danh dự đầu tiên của Hội Khuyến học Việt Nam, Đại tướng Võ Nguyên Giáp, đã bước qua tuổi 100 nhưng vẫn luôn dõi theo và động viên từng bước phát triển của Giải thưởng Nhân tài Đất Việt. Đại tướng luôn quan tâm chăm sóc Giải thưởng ngay từ khi Giải thưởng&nbsp; mới ra đời cách đây 7 năm.</p><p> Trước lễ trao giải, Đại tướng Võ Nguyên Giáp đã gửi thư chúc mừng, động viên Ban tổ chức. Trong thư, Đại tướng viết: “Mong rằng, các sản phẩm và các công trình nghiên cứu được trao giải sẽ được tiếp tục hoàn thiện và được ứng dụng rộng rãi trong đời sống, đem lại hiệu quả kinh tế và xã hội thiết thực.</p><p> Sau phần khai mạc, cả hội trường hồi hội chờ đợi phút vinh danh các nhà khoa học và các tác giả, nhóm tác giả đoạt giải.</p><div> <span style=\"FONT-WEIGHT: bold\">* Giải thưởng Khoa học Tự nhiên Việt Nam </span>thuộc về 2 nhà khoa học GS.TS Trần Đức Thiệp và GS.TS Nguyễn Văn Đỗ - Viện Vật lý, Viện Khoa học công nghệ Việt Nam với công trình “Nghiên cứu cấu trúc hạt nhân và các phản ứng hạt nhân”.</div><div> &nbsp;</div><div align=\"center\"> <div> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/khtn_d4aae.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div></div><p> Hai nhà khoa học đã tiến hành thành công các nghiên cứu về phản ứng hạt nhân với nơtron, phản ứng quang hạt nhân, quang phân hạch và các phản ứng hạt nhân khác có cơ chế phức tạp trên các máy gia tốc như máy phát nơtron, Microtron và các máy gia tốc thẳng của Việt Nam và Quốc tế. Các nghiên cứu này đã góp phần làm sáng tỏ cấu trúc hạt nhân và cơ chế phản ứng hạt nhân, đồng thời cung cấp nhiều số liệu hạt nhân mới có giá trị cho Kho tàng số liệu hạt nhân.</p><p> GS.TS Trần Đức Thiệp và GS.TS Nguyễn Văn Đỗ đã khai thác hiệu quả hai máy gia tốc đầu tiên của Việt Nam là máy phát nơtron NA-3-C và Microtron MT-17 trong nghiên cứu cơ bản, nghiên cứu ứng dụng và đào tạo nhân lực. Trên cơ sở các thiết bị này, hai nhà khoa học đã tiến hành thành công những nghiên cứu cơ bản thực nghiệm đầu tiên về phản ứng hạt nhân ở Việt Nam; nghiên cứu và phát triển các phương pháp phân tích hạt nhân hiện đại và áp dụng thành công ở Việt Nam.</p><div> Bà Nguyễn Thị Doan, Phó Chủ tịch nước CHXHCNVN và Giáo sư - Viện sỹ Nguyễn Văn Hiệu trao giải thưởng cho 2 nhà khoa học.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/khtn2_e2865.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Phó Chủ tịch nước CHXHCNVN Nguyễn Thị Doan và Giáo sư - Viện sỹ Nguyễn Văn Hiệu trao giải thưởng cho 2 nhà khoa học GS.TS Trần Đức Thiệp và GS.TS Nguyễn Văn Đỗ.</span></div><p> GS.VS Nguyễn Văn Hiệu chia sẻ: “Cách đây không lâu, Chính phủ đã ký quyết định xây dựng nhà máy điện hạt nhân trong điều kiện đất nước còn nhỏ bé, nghèo khó và vì thế việc đào tạo nhân lực là nhiệm vụ số 1 hiện nay. Rất may, Việt Nam có 2 nhà khoa học cực kỳ tâm huyết và nổi tiếng trong cả nước cũng như trên thế giới. Hội đồng khoa học chúng tôi muốn xướng tên 2 nhà khoa học này để Chính phủ huy động cùng phát triển xây dựng nhà máy điện hạt nhân.”</p><p> GS.VS Hiệu nhấn mạnh, mặc dù điều kiện làm việc của 2 nhà khoa học không được quan tâm, làm việc trên những máy móc cũ kỹ được mua từ năm 1992 nhưng 2 ông vẫn xay mê cống hiến hết mình cho lĩnh Khoa học tự nhiên Việt Nam.</p><p> <span style=\"FONT-WEIGHT: bold\">* Giải thưởng Nhân tài Đất Việt trong lĩnh vực Y Dược:</span> 2 giải</p><div> <span style=\"FONT-WEIGHT: bold\">1.</span> Nhóm nghiên cứu của Bệnh viện Hữu nghị Việt - Đức với công trình <span style=\"FONT-STYLE: italic\">“Nghiên cứu triển khai ghép gan, thận, tim lấy từ người cho chết não”</span>.</div><div> &nbsp;</div><div align=\"center\"> <div> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/y_3dca2.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div></div><div> &nbsp;</div><div> Tại bệnh viện Việt Đức, tháng 4/2011, các ca ghép tạng từ nguồn cho là người bệnh chết não được triển khai liên tục. Với 4 người cho chết não hiến tạng, bệnh viện đã ghép tim cho một trường hợp,&nbsp;2 người được ghép gan, 8 người được ghép thận, 2 người được ghép van tim và tất cả các ca ghép này đều thành công, người bệnh được ghép đã có một cuộc sống tốt hơn với tình trạng sức khỏe ổn định.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/y2_cb5a1.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Nguyên Tổng Bí Ban chấp hành TW Đảng CSVN Lê Khả Phiêu và ông Vũ Văn Tiền, Chủ tịch Hội đồng quản trị Ngân hàng An Bình trao giải thưởng cho nhóm nghiên cứu của BV Hữu nghị Việt - Đức.</span></div><p> Công trong việc ghép tạng từ người cho chết não không chỉ thể hiện năng lực, trình độ, tay nghề của bác sĩ Việt Nam mà nó còn mang một ý nghĩa nhân văn to lớn, mang một thông điệp gửi đến những con người giàu lòng nhân ái với nghĩa cử cao đẹp đã hiến tạng để cứu sống những người bệnh khác.</p><p> <span style=\"FONT-WEIGHT: bold\">2.</span> Hội đồng ghép tim Bệnh viện Trung ương Huế với công trình nghiên cứu <span style=\"FONT-STYLE: italic\">“Triển khai ghép tim trên người lấy từ người cho chết não”</span>.</p><div> Đề tài được thực hiện dựa trên ca mổ ghép tim thành công lần đầu tiên ở Việt Nam của chính 100% đội ngũ y, bác sĩ của Bệnh viện Trung ương Huế đầu tháng 3/2011. Bệnh nhân được ghép tim thành công là anh Trần Mậu Đức (26 tuổi, ở phường Phú Hội, TP. Huế).</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/y3_7768c.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Hội đồng ghép tim BV Trung ương Huế nhận Giải thưởng Nhân tài Đất Việt.</span></div><p> Ghép tim từ người cho chết não đến người bị bệnh tim cần được ghép tim phải đảm bảo các yêu cầu: đánh giá chức năng các cơ quan; đánh giá tương hợp miễn dịch và phát hiện nguy cơ tiềm ẩn có thể xảy ra trong và sau khi ghép tim để từ đó có phương thức điều trị thích hợp. Có tới 30 xét nghiệm cận lâm sàng trung và cao cấp tiến hành cho cả người cho tim chết não và người sẽ nhận ghép tim tại hệ thống labo của bệnh viện.</p><p> ---------------------</p><p> <span style=\"FONT-WEIGHT: bold\">* Giải thưởng Nhân tài đất Việt Lĩnh vực Công nghệ thông tin.</span></p><p> <span style=\"FONT-STYLE: italic\">Hệ thống sản phẩm đã ứng dụng thực tế:</span></p><p> <span style=\"FONT-STYLE: italic\">Giải Nhất:</span> Không có.</p><p> <span style=\"FONT-STYLE: italic\">Giải Nhì:</span> Không có</p><p> <span style=\"FONT-STYLE: italic\">Giải Ba:</span> 3 giải, mỗi giải trị giá 30 triệu đồng.</p><div> <span style=\"FONT-WEIGHT: bold\">1.</span> <span style=\"FONT-STYLE: italic\">“Bộ cạc xử lý tín hiệu HDTV”</span> của nhóm HD Việt Nam.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/hdtv_13b10.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Nhóm HDTV Việt Nam lên nhận giải.</span></div><p> Đây là bộ cạc xử lý tín hiệu HDTV đầu tiên tại Việt Nam đạt tiêu chuẩn OpenGear. Bộ thiết bị bao gồm 2 sản phẩm là cạc khuếch đại phân chia tín hiệu HD DA và cạc xử lý tín hiệu HD FX1. Nhờ bộ cạc này mà người sử dụng cũng có thể điều chỉnh mức âm thanh hoặc video để tín hiệu của kênh tuân theo mức chuẩn và không phụ thuộc vào chương trình đầu vào.</p><div> <span style=\"FONT-WEIGHT: bold; FONT-STYLE: italic\">2.</span> <span style=\"FONT-STYLE: italic\">“Mã nguồn mở NukeViet”</span> của nhóm tác giả Công ty cổ phần phát triển nguồn mở Việt Nam (VINADES.,JSC).</div><div> &nbsp;</div><div align=\"center\"> <div> <img _fl=\"\" align=\"middle\" alt=\"NukeViet nhận giải ba Nhân tài đất Việt 2011\" src=\"/uploads/news/nukeviet-nhantaidatviet2011.jpg\" style=\"margin: 5px; width: 450px; height: 301px;\" /></div></div><p> NukeViet là CMS mã nguồn mở đầu tiên của Việt Nam có quá trình phát triển lâu dài nhất, có lượng người sử dụng đông nhất. Hiện NukeViet cũng là một trong những mã nguồn mở chuyên nghiệp đầu tiên của Việt Nam, cơ quan chủ quản của NukeViet là VINADES.,JSC - đơn vị chịu trách nhiệm phát triển NukeViet và triển khai NukeViet thành các ứng dụng cụ thể cho doanh nghiệp.</p><div> <span style=\"FONT-WEIGHT: bold\">3.</span> <span style=\"FONT-STYLE: italic\">“Hệ thống ngôi nhà thông minh homeON”</span> của nhóm Smart home group.</div><div> &nbsp;</div><div align=\"center\"> <div> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/PHN16132_82014.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div></div><p> Sản phẩm là kết quả từ những nghiên cứu miệt mài nhằm xây dựng một ngôi nhà thông minh, một cuộc sống xanh với tiêu chí: An toàn, tiện nghi, sang trọng và tiết kiệm năng lượng, hưởng ứng lời kêu gọi tiết kiệm năng lượng của Chính phủ.&nbsp;</p><p> <strong><span style=\"FONT-STYLE: italic\">* Hệ thống sản phẩm có tiềm năng ứng dụng:</span></strong></p><p> <span style=\"FONT-STYLE: italic\">Giải Nhất: </span>Không có.</p><div> <span style=\"FONT-STYLE: italic\">Giải Nhì:</span> trị giá 50 triệu đồng: <span style=\"FONT-STYLE: italic\">“Dịch vụ Thông tin và Tri thức du lịch ứng dụng cộng nghệ ngữ nghĩa - iCompanion”</span> của nhóm tác giả SIG.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/nhi_7eee0.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Nhóm tác giả SIG nhận giải Nhì Nhân tài đất Việt 2011 ở hệ thống sản phẩm có tiềm năng ứng dụng.</span></div><p> ICompanion là hệ thống thông tin đầu tiên ứng dụng công nghệ ngữ nghĩa trong lĩnh vực du lịch - với đặc thù khác biệt là cung cấp các dịch vụ tìm kiếm, gợi ý thông tin “thông minh” hơn, hướng người dùng và kết hợp khai thác các tính năng hiện đại của môi trường di động.</p><p> Đại diện nhóm SIG chia sẻ: “Tinh thần sáng tạo và lòng khát khao muốn được tạo ra các sản phẩm mới có khả năng ứng dụng cao trong thực tiễn luôn có trong lòng của những người trẻ Việt Nam. Cảm ơn ban tổ chức và những nhà tài trợ đã giúp chúng tôi có một sân chơi thú vị để khuyến khích và chắp cánh thực hiện ước mơ của mình. Xin cảm ơn trường ĐH Bách Khoa đã tạo ra một môi trường nghiên cứu và sáng tạo, gắn kết 5 thành viên trong nhóm.”</p><p> <span style=\"FONT-STYLE: italic\">Giải Ba:</span> 2 giải, mỗi giải trị giá 30 triệu đồng.</p><div> <span style=\"FONT-WEIGHT: bold\">1. </span><span style=\"FONT-STYLE: italic\">“Bộ điều khiển IPNET”</span> của nhóm IPNET</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/PHN16149_ed58d.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> <span style=\"FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Nhà báo Phạm Huy Hoàn, Trưởng Ban Tổ chức Giải thưởng NTĐV, Tổng Biên tập báo điện tử Dân trí và ông Tạ Hữu Thanh - Phó TGĐ Jetstar Pacific trao giải cho nhóm IPNET.</span></div><p> Bằng cách sử dụng kiến thức thiên văn học để tính giờ mặt trời lặn và mọc tại vị trí cần chiếu sáng được sáng định bởi kinh độ, vĩ độ cao độ, hàng ngày sản phẩm sẽ tính lại thời gian cần bật/tắt đèn cho phù hợp với giờ mặt trời lặn/mọc.</p><div> <span style=\"FONT-WEIGHT: bold\">2.</span> <span style=\"FONT-STYLE: italic\">“Hệ thống lập kế hoạch xạ trị ung thư quản lý thông tin bệnh nhân trên web - LYNX”</span> của nhóm LYNX.</div><div> &nbsp;</div><div align=\"center\"> <div> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/3tiem-nang_32fee.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div></div><p> Đây là loại phần mềm hoàn toàn mới ở Việt Nam, là hệ thống lập kế hoạch và quản lý thông tin của bệnh nhân ung thư qua Internet (LYNX) dựa vào nền tảng Silverlight của Microsoft và kiến thức chuyên ngành Vật lý y học. LYNX giúp ích cho các nhà khoa học, bác sĩ, kỹ sư vật lý, bệnh nhân và mọi thành viên trong việc quản lý và theo dõi hệ thống xạ trị ung thư một cách tổng thể. LYNX có thể được sử dụng thông qua các thiết bị như máy tính cá nhân, máy tính bảng… và các trình duyệt Internet Explorer, Firefox, Chrome…</p><div> Chương trình trao giải đã được truyền hình trực tiếp trên VTV2 - Đài Truyền hình Việt Nam và tường thuật trực&nbsp;tuyến trên báo điện tử Dân trí từ 20h tối 20/11/2011.</div><div> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/NVH0545_c898e.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/NVH0560_c995c.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> &nbsp;</div><div align=\"center\"> <img _fl=\"\" align=\"middle\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/File/2011/PHN16199_36a5c.jpg\" style=\"MARGIN: 5px\" width=\"450\" /></div><div align=\"center\"> &nbsp;</div><div align=\"center\"> <div align=\"center\"> <table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"90%\"> <tbody> <tr> <td> <div> <span style=\"FONT-WEIGHT: bold\"><span style=\"FONT-WEIGHT: normal; FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Khởi xướng từ năm 2005, Giải thưởng Nhân tài Đất Việt đã phát hiện và tôn vinh nhiều tài năng trong lĩnh vực CNTT-TT, Khoa học tự nhiên và Y dược, trở thành một sân chơi bổ ích cho những người yêu thích CNTT. Mỗi năm, Giải thưởng ngày càng thu hút số lượng tác giả và sản phẩm tham gia đông đảo và nhận được sự quan tâm sâu sắc của lãnh đạo Đảng, Nhà nước cũng như công chúng.</span></span></div> <div> <span style=\"FONT-WEIGHT: bold\">&nbsp;</span></div> <div> <span style=\"FONT-WEIGHT: bold\"><span style=\"FONT-WEIGHT: normal; FONT-SIZE: 10pt; FONT-FAMILY: Tahoma\">Đối tượng tham gia Giải thưởng trong lĩnh vực CNTT là những người Việt Nam ở mọi lứa tuổi, đang sinh sống trong cũng như ngoài nước. Năm 2006, Giải thưởng có sự tham gia của thí sinh đến từ 8 nước trên thế giới và 40 tỉnh thành của Việt Nam. Từ năm 2009, Giải thưởng được mở rộng sang lĩnh vực Khoa học tự nhiên, và năm 2010 là lĩnh vực Y dược, vinh danh những nhà khoa học trong các lĩnh vực này.</span>&nbsp;</span></div> <div> <span style=\"FONT-WEIGHT: bold\">&nbsp;</span></div> </td> </tr> </tbody> </table> </div></div>', '', 2, 0, 1, 1, 1, 0), 
(11, '', '', '<div style=\"text-align: justify;\">Có hiệu lực từ ngày 20/1/2015, Thông tư này thay thế cho Thông tư 41/2009/TT-BTTTT (Thông tư 41) ngày 30/12/2009 ban hành Danh mục các sản phẩm phần mềm nguồn mở đáp ứng yêu cầu sử dụng trong cơ quan, tổ chức nhà nước.<br /><br />Sản phẩm phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước trong Thông tư 41/2009/TT-BTTTT vừa được Bộ TT&amp;TT ban hành, là những&nbsp;sản phẩm đã đáp ứng các tiêu chí về tính năng kỹ thuật cũng như tính mở và bền vững, và NukeViet là một trong số đó.</div><p style=\"text-align: justify;\">Cụ thể, theo Thông tư 20, sản phẩm phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước phải đáp các tiêu chí về chức năng, tính năng kỹ thuật bao gồm: phần mềm có các chức năng, tính năng kỹ thuật phù hợp với các yêu cầu nghiệp vụ hoặc các quy định, hướng dẫn tương ứng về ứng dụng CNTT trong các cơ quan, tổ chức nhà nước; phần mềm đáp ứng được yêu cầu tương thích với hệ thống thông tin, cơ sở dữ liệu hiện có của các cơ quan, tổ chức.</p><p style=\"text-align: justify;\">Bên cạnh đó, các sản phẩm phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước còn phải đáp ứng tiêu chí về tính mở và tính bền vững của phần mềm. Cụ thể, phần mềm phải đảm bảo các quyền: tự do sử dụng phần mềm không phải trả phí bản quyền, tự do phân phối lại phần mềm, tự do sửa đổi phần mềm theo nhu cầu sử dụng, tự do phân phối lại phần mềm đã chỉnh sửa (có thể thu phí hoặc miễn phí); phần mềm phải có bản mã nguồn, bản cài đặt được cung cấp miễn phí trên mạng; có điểm ngưỡng thất bại PoF từ 50 điểm trở xuống và điểm mô hình độ chín nguồn mở OSMM từ 60 điểm trở lên.</p><p style=\"text-align: justify;\">Căn cứ những tiêu chuẩn trên, thông tư 20 quy định cụ thể Danh mục 31 sản phẩm thuộc 11 loại phần mềm được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước.&nbsp;NukeViet thuộc danh mục hệ quản trị nội dung nguồn mở. Chi tiết thông tư và danh sách 31 sản phẩm phần mềm nguồn mở được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước có&nbsp;<a href=\"http://vinades.vn/vi/download/van-ban-luat/Thong-tu-20-2014-TT-BTTTT/\" target=\"_blank\">tại đây</a>.</p><p style=\"text-align: justify;\">Thông tư 20/2014/TT-BTTTT quy định rõ: Các cơ quan, tổ chức nhà nước khi có nhu cầu sử dụng vốn nhà nước để đầu tư xây dựng, mua sắm hoặc thuê sử dụng các loại phần mềm có trong Danh mục hoặc các loại phần mềm trên thị trường đã có sản phẩm phần mềm nguồn mở tương ứng thỏa mãn các tiêu chí trên (quy định tại Điều 3 Thông tư 20) thì phải&nbsp;ưu tiên lựa chọn các sản phẩm phần mềm nguồn mở tương ứng, đồng thời phải thể hiện rõ sự ưu tiên này trong các tài liệu&nbsp;như thiết kế sơ bộ, thiết kế thi công, kế hoạch đấu thầu, kế hoạch đầu tư, hồ sơ mời thầu, yêu cầu chào hàng, yêu cầu báo giá hoặc các yêu cầu mua sắm khác.</p><p style=\"text-align: justify;\">Đồng thời,&nbsp;các cơ quan, tổ chức nhà nước phải đảm bảo không đưa ra các yêu cầu, điều kiện, tính năng kỹ thuật có thể dẫn đến việc loại bỏ các sản phẩm phần mềm nguồn mở&nbsp;trong các tài liệu như thiết kế sơ bộ, thiết kế thi công, kế hoạch đấu thầu, kế hoạch đầu tư, hồ sơ mời thầu, yêu cầu chào hàng, yêu cầu báo giá hoặc các yêu cầu mua sắm khác.</p><p style=\"text-align: justify;\">Như vậy, sau thông tư số 08/2010/TT-BGDĐT của Bộ GD&amp;ĐT ban hành ngày 01-03-2010 quy định về sử dụng phần mềm tự do mã nguồn mở trong các cơ sở giáo dục trong đó đưa NukeViet vào danh sách các mã nguồn mở được khuyến khích sử dụng trong giáo dục, thông tư 20/2014/TT-BTTTT đã mở đường cho NukeViet vào sử dụng cho các cơ quan, tổ chức nhà nước. Các đơn vị hỗ trợ triển khai NukeViet cho các cơ quan nhà nước có thể sử dụng quy định này để được ưu tiên triển khai cho các dự án website, cổng thông tin cho các cơ quan, tổ chức nhà nước.<br /><br />Thời gian tới, Công ty cổ phần phát triển nguồn mở Việt Nam (<a href=\"http://vinades.vn/\" target=\"_blank\">VINADES.,JSC</a>) - đơn vị chủ quản của NukeViet - sẽ cùng với Ban Quản Trị NukeViet tiếp tục hỗ trợ các doanh nghiệp đào tạo nguồn nhân lực chính quy phát triển NukeViet nhằm cung cấp dịch vụ ngày một tốt hơn cho chính phủ và các cơ quan nhà nước, từng bước xây dựng và hình thành liên minh các doanh nghiệp phát triển NukeViet, đưa sản phẩm phần mềm nguồn mở Việt không những phục vụ tốt thị trường Việt Nam mà còn từng bước tiến ra thị trường khu vực và các nước đang phát triển khác trên thế giới nhờ vào lợi thế phần mềm nguồn mở đang được chính phủ nhiều nước ưu tiên phát triển.</p>', 'mic.gov.vn', 2, 0, 1, 1, 1, 0), 
(12, '', '', '<div style=\"text-align: justify;\">Trong năm 2016, chúng tôi xác định là đơn vị sát cánh cùng các đơn vị giáo dục- là đơn vị xây dựng nhiều website cho ngành giáo dục nhất trên cả nước.<br  />Với phần mềm mã nguồn mở NukeViet hiện có nhiều lợi thế:<br  />+ Được Bộ giáo dục khuyến khích sử dụng.<br  />+ Được bộ thông tin truyền thông chỉ định sử dụng trong khối cơ quan nhà nước.<br  />+Được cục công nghệ thông tin ghi rõ tên sản phẩm NukeViet nên dùng theo hướng dẫn thực hiện CNTT 2015-2016.<br  />Chúng tôi cần các bạn góp phần xây dựng nền giáo dục nước nhà ngày càng phát triển.</div><div>&nbsp;</div><table align=\"left\" border=\"1\" cellpadding=\"20\" cellspacing=\"0\" class=\"table table-striped table-bordered table-hover\" style=\"width:100%;\" width=\"653\">	<tbody>		<tr>			<td style=\"width: 27.66%;\"><strong>Vị trí tuyển dụng:</strong></td>			<td style=\"width: 72.34%;\">Nhân viên kinh doanh</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Chức vụ:</strong></td>			<td style=\"width: 72.34%;\">Nhân viên</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Ngành nghề:</strong></td>			<td style=\"width: 72.34%;\"><strong>Sản phẩm:</strong><br  />			Cổng thông tin, website cho các phòng, sở giáo dục và đào tạo các trường học.</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Hình thức làm việc:</strong></td>			<td style=\"width: 72.34%;\">Toàn thời gian cố định</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Địa điểm làm việc:</strong></td>			<td style=\"width: 72.34%;\">Văn phòng công ty (Được đi công tác theo hợp đồng đã ký)</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Mức lương:</strong></td>			<td style=\"width: 72.34%;\">&nbsp;Lương cố định + Thưởng vượt doanh số + thưởng theo từng hợp đồng (từ 2-7%).</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Mô tả công việc:</strong></td>			<td style=\"width: 72.34%;\">Chúng tôi có khách hàng mục tiêu và danh sách khách hàng, công việc đòi hỏi ứng viên sử dụng thành thạo vi tính văn phòng, các phần mềm liên quan đến công việc và có laptop để phục vụ công việc.<br  />			- Sales Online, quảng bá ký kết, liên kết, với các đối tác qua INTERNET. Xây dưng mối quan hệ phát triển bền vững với các đối tác.<br  />			- Gọi điện, giới thiệu dịch vụ, sản phẩm của công ty đến đối tác.<br  />			- Xử lý các cuộc gọi của khách hàng liên quan đến, sản phẩm, dịch vụ công ty.<br  />			- Đàm phán, thương thuyết, ký kết hợp đồng với khách hàng đang có nhu cầu thiết kế website , SEO website , PR thương hiệu trên Internet&nbsp;<br  />			- Duy trì và chăm sóc mối quan hệ lâu dài với khách hàng, mở rộng khách hàng tiềm năng nhằm thúc đẩy doanh số bán hàng<br  />			- Hỗ trợ khách hàng khi được yêu cầu</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Số lượng cần tuyển:</strong></td>			<td style=\"width: 72.34%;\">05</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Quyền lợi được hưởng:</strong></td>			<td style=\"width: 72.34%;\">- Được đào tạo kĩ năng bán hàng, được công ty hỗ trợ tham gia khóa học bán hàng chuyên nghiệp.<br  />			- Lương cứng: 3.000.000 VNĐ+ hoa hồng dự án (2-7%/năm/hợp đồng). Lương trả qua ATM, được xét tăng lương 3 tháng một lần dựa trên doanh thu.<br  />			- Bậc lương xét trên năng lực bán hàng.<br  />			- Thưởng theo dự án, các ngày lễ tết.<br  />			- Hưởng các chế độ khác theo quy định của công ty và pháp luật: Bảo hiểm y tế, bảo hiểm xã hội.<br  />			- Cơ hội làm việc và gắn bó lâu dài trong công ty, được thưởng cổ phần nếu doanh thu tốt.</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Số năm kinh nghiệm:</strong></td>			<td style=\"width: 72.34%;\">Trên 6 tháng</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Yêu cầu bằng cấp:</strong></td>			<td style=\"width: 72.34%;\">Cao đẳng, Đại học</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Yêu cầu giới tính:</strong></td>			<td style=\"width: 72.34%;\">Không yêu cầu</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Yêu cầu độ tuổi:</strong></td>			<td style=\"width: 72.34%;\">Không yêu cầu</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Yêu cầu khác:</strong></td>			<td style=\"width: 72.34%;\">- Yêu thích và đam mê Internet Marketing, thích online, thương mại điện tử<br  />			- Giọng nói dễ nghe, không nói ngọng.<br  />			- Có khả năng giao tiếp qua điện thoại.<br  />			- Ngoại hình ưa nhìn là một lợi thế<br  />			- Có tính cẩn thận trong công việc, luôn cố gắng học hỏi.<br  />			- Kỹ năng sales online tốt.<br  />			-Trung thực, năng động, nhiệt tình,siêng năng, nhiệt huyết trong công việc.</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Hồ sơ bao gồm:</strong></td>			<td style=\"width: 72.34%;\"><strong>* Yêu cầu Hồ sơ:</strong><br  />			<strong>Cách thức đăng ký dự tuyển</strong>: Làm Hồ sơ xin việc (file mềm) và gửi về hòm thư <a href=\"mailto:tuyendung@vinades.vn\">tuyendung@vinades.vn</a><br  />			<br  />			<strong>Nội dung hồ sơ xin việc file mềm gồm</strong>:<br  />			<strong>+ Đơn xin việc:</strong>&nbsp;Theo hướng dẫn bên dưới.<br  />			<strong>+ Thông tin ứng viên:</strong>&nbsp;Theo mẫu của VINADES.,JSC <strong><em>(download tại đây:&nbsp;<a href=\"http://vinades.vn/vi/download/Tai-lieu/Ban-khai-so-yeu-ly-lich-kinh-doanh/\">Mẫu lý lịch ứng viên</a>)</em></strong><br  />			<strong>* Hồ sơ xin việc (Bản in thông thường) bao gồm</strong>:<br  />			- Giấy khám sức khoẻ của cơ quan y tế.<br  />			- Bản sao hộ khẩu (có công chứng)<br  />			- Bản sao giấy khai sinh (có công chứng)<br  />			- Bản sao quá trình học tập (bảng điểm tốt nghiệp), các văn -bằng chứng chỉ (có công chứng)<br  />			- Sơ yếu lý lịch có xác nhận của cơ quan công tác trước đó (nếu có) hoặc xác nhận của chính quyền địa phương nơi bạn đăng ký hộ khẩu thường trú.<br  />			- Thư giới thiệu (nếu có)<br  />			- Ảnh 4x6: 4 chiếc (đã bao gồm 1 chiếc gắn trên sơ yếu lý lịch).<br  />			<br  />			<strong>*Hướng dẫn</strong>:<br  />			- Với bản in của hồ sơ ứng tuyển, ứng viên sẽ phải nộp trước cho Ban tuyển dụng hoặc muộn nhất là mang theo khi có lịch phỏng vấn. Bản in sẽ không được trả lại ngay cả khi ứng viên không đạt yêu cầu.<br  />			- Nếu không thể bố trí thời gian phỏng vấn như sắp xếp của -Ban tuyển dụng, thí sinh cần thông báo ngay để được đổi lịch.<br  />			- Nếu có bất cứ thắc mắc gì bạn có thể liên hệ với Ms. Thu qua email: tuyendung@vinades.vn. Có thể gọi điện theo số điện thoại: 01255723353</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Hạn nộp hồ sơ:</strong></td>			<td style=\"width: 72.34%;\">Không hạn chế cho tới khi tuyển đủ.</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Hình thức nộp hồ sơ:</strong></td>			<td style=\"width: 72.34%;\">Qua Email</td>		</tr>		<tr>			<td colspan=\"2\" style=\"width:100.0%;\">			<h3>THÔNG TIN LIÊN HỆ</h3>			</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Điện thoại liên hệ:</strong></td>			<td style=\"width: 72.34%;\">01255723353- Ms. Thu</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Địa chỉ liên hệ:</strong></td>			<td style=\"width: 72.34%;\">Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội.</td>		</tr>		<tr>			<td style=\"width: 27.66%;\"><strong>Email liên hệ:</strong></td><td style=\"width: 72.34%;\">tuyendung@vinades.vn</td></tr></tbody></table>', '', 2, 0, 1, 1, 1, 0), 
(14, '', '', '<p style=\"text-align: justify;\">Nếu bạn yêu thích công nghệ, thích kinh doanh hoặc lập trình web và mong muốn trải nghiệm, học hỏi, thậm chí là đi làm ngay từ khi còn ngồi trên ghế nhà trường, hãy tham gia chương trình thực tập sinh tại công ty VINADES.</p><p style=\"text-align: justify;\">Công ty cổ phần phát triển nguồn mở Việt Nam (VINADES.,JSC) là đơn vị chịu trách nhiệm chính trong việc phát triển phần mềm NukeViet và có nhiệm vụ hỗ trợ cộng đồng người dùng NukeViet &#91;<u><a href=\"http://vinades.vn/vi/about/history/\" target=\"_blank\">xem thêm giới thiệu về lịch sử hình thành VINADES</a></u>&#93;. Là công ty được thành lập từ cộng đồng phần mềm nguồn mở, hàng năm công ty dành những vị trí đặc biệt cho các bạn sinh viên được học tập, trải nghiệm, làm việc tại công ty.<br  />&nbsp;</p><h2 style=\"text-align: justify;\"><b>C</b><b>ác vị trí thực tập</b></h2><ul>	<li style=\"text-align: justify;\"><strong>Kinh doanh:</strong> Cổng thông tin doanh nghiệp, Cổng thông tin giáo dục Edu Gate…</li>	<li style=\"text-align: justify;\"><strong>Kỹ thuật:</strong> Chuyên viên đồ họa, Lập trình viên…</li></ul><h2 style=\"text-align: justify;\"><b>Quyền lợi của thực tập sinh</b></h2><ul>	<li style=\"text-align: justify;\">Được&nbsp;tiếp xúc với văn hóa doanh nghiệp, trải nghiệm trong môi trường làm việc chuyên nghiệp, năng động.</li>	<li style=\"text-align: justify;\">Được&nbsp;giao tiếp và học hỏi kiến thức từ những SEO, các lập trình viên chính của đội code NukeViet; qua đó&nbsp;nâng cao không chỉ kỹ năng chuyên môn liên quan đến công việc mà còn các kỹ năng mềm trong quá trình làm việc hàng ngày.</li>	<li style=\"text-align: justify;\">Có cơ hội tìm hiểu, phát triển định hướng của bản thân.</li>	<li style=\"text-align: justify;\">Tham gia các chương trình ngoại khóa, các hoạt động nội bộ của công ty.</li>	<li style=\"text-align: justify;\">Cơ&nbsp;hội được học việc để trở thành nhân viên chính thức nếu có kết quả thực tập tốt.</li>	<li style=\"text-align: justify;\">Thực tập không hưởng lương nhưng có thể được trả thù lao cho một số công việc được giao theo đơn hàng.</li></ul><h2 style=\"text-align: justify;\"><b>Thời gian làm việc</b></h2><ul>	<li style=\"text-align: justify;\">Toàn thời gian cố định hoặc làm online.</li>	<li style=\"text-align: justify;\">Thời gian làm việc là:&nbsp;8:00 – 17:00, Thứ hai – Thứ sáu</li>	<li style=\"text-align: justify;\">Ngày làm việc và thời gian làm việc có thể thay đổi linh hoạt tùy thuộc vào điều kiện của ứng viên và tình hình thực tế.</li></ul><h2 style=\"text-align: justify;\"><b>Đối tượng và điều kiện ứng tuyển</b></h2><p style=\"text-align: justify;\">Tất cả các bạn sinh viên năm cuối/mới tốt nghiệp các trường CĐ - ĐH đáp ứng được những yêu cầu sau:</p><ul>	<li style=\"text-align: justify;\">Sinh viên khối ngành kinh tế: yêu thích marketing online, mong muốn thực tập trong lĩnh vực kinh doanh phần mềm.</li>	<li style=\"text-align: justify;\">Sinh viên khối ngành kỹ thuật: yêu thích thiết kế, lập trình web.</li></ul><p style=\"text-align: justify;\">Có kỹ năng giao tiếp và tư duy logic tốt, năng động và ham học hỏi.</p><p style=\"text-align: justify;\">Có máy tính xách tay để làm việc.</p><p style=\"text-align: justify;\">Ưu tiên các ứng viên đam mê phần mềm nguồn mở, đặc biệt là các ứng viên đã từng tham gia và có bài viết diễn đàn NukeViet (<a href=\"http://forum.nukeviet.vn/\">forum.nukeviet.vn</a>).</p><h2 style=\"text-align: justify;\"><b>Cách thức ứng tuyển</b></h2><p style=\"text-align: justify;\">Gửi bản mềm đơn đăng ký ứng tuyển tới:&nbsp;<a href=\"mailto:tuyendung@vinades.vn\">tuyendung@vinades.vn</a>;</p><p style=\"text-align: justify;\">Tiêu đề mail ghi rõ: &#91;Họ tên&#93; –Ứng tuyển thực tập &#91;Bộ phận ứng tuyển&#93;.</p><p style=\"text-align: justify;\">Ví dụ: Lê Văn Nam –&nbsp;Ứng tuyển thực tập sinh bộ phận đồ họa</p><p style=\"text-align: justify;\">Hồ sơ bản cứng cần chuẩn bị (sẽ gửi sau nếu đạt yêu cầu) gồm:</p><ul>	<li style=\"text-align: justify;\">Giấy khám sức khoẻ của cơ quan y tế</li>	<li style=\"text-align: justify;\">Bản sao giấy khai sinh (có công chứng).</li>	<li style=\"text-align: justify;\">Bản sao quá trình học tập (bảng điểm tốt nghiệp), các văn bằng chứng chỉ (có công chứng) nếu đã tốt nghiệp.</li>	<li style=\"text-align: justify;\">Sơ yếu lý lịch có xác nhận của cơ quan công tác trước đó (nếu có) hoặc xác nhận của chính quyền địa phương nơi bạn đăng ký hộ khẩu thường trú.</li>	<li style=\"text-align: justify;\">Chứng minh thư (photo không cần công chứng).</li>	<li style=\"text-align: justify;\">Thư giới thiệu (nếu có)</li>	<li style=\"text-align: justify;\">Ảnh 4x6: 4 chiếc (đã bao gồm 1 chiếc gắn trên sơ yếu lý lịch).</li></ul><p><br  /><strong>Chi tiết vui lòng tham khảo tại:</strong>&nbsp;<a href=\"http://vinades.vn/vi/news/Tuyen-dung/\" target=\"_blank\">http://vinades.vn/vi/news/Tuyen-dung/</a><br  /><br  /><strong>Mọi thắc mắc vui lòng liên hệ:</strong></p><blockquote><p><strong>Công ty cổ phần phát triển nguồn mở Việt Nam.</strong><br  />Trụ sở chính: Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội.<br  /><br  />- Tel: +84-4-85872007 - Fax: +84-4-35500914<br  />- Email:&nbsp;<a href=\"mailto:contact@vinades.vn\">contact@vinades.vn</a>&nbsp;- Website:&nbsp;<a href=\"http://www.vinades.vn/\">http://www.vinades.vn</a></p></blockquote>', '', 2, 0, 1, 1, 1, 0), 
(15, '', '', '<p style=\"text-align: justify;\">Công ty cổ phần phát triển nguồn mở Việt Nam (VINADES.,JSC) là đơn vị chịu trách nhiệm chính trong việc phát triển phần mềm NukeViet và có nhiệm vụ hỗ trợ cộng đồng người dùng NukeViet &#91;<u><a href=\"http://vinades.vn/vi/about/history/\" target=\"_blank\">xem thêm giới thiệu về lịch sử hình thành VINADES</a></u>&#93;.</p><p style=\"text-align: justify;\">Nếu bạn yêu thích phần mềm nguồn mở, triết lý của phần mềm tự do nguồn mở hoặc đơn giản là yêu NukeViet, hãy liên hệ ngay để gia nhập công ty VINADES, cùng chúng tôi phát triển NukeViet – Phần mềm nguồn mở Việt Nam – và tạo ra những sản phẩm web tuyệt vời cho cộng đồng.</p><h2 style=\"text-align: justify;\"><b>Các vị trí nhận học việc</b></h2><ul>	<li style=\"text-align: justify;\"><strong>Kinh doanh:</strong> Cổng thông tin doanh nghiệp, Cổng thông tin giáo dục Edu Gate…</li>	<li style=\"text-align: justify;\"><strong>Kỹ thuật:</strong> Chuyên viên đồ họa, Lập trình viên…</li></ul><h2 style=\"text-align: justify;\"><b>Quyền lợi của học viên</b></h2><ul>	<li style=\"text-align: justify;\">Được hưởng trợ cấp ăn trưa.</li>	<li style=\"text-align: justify;\">Được trợ cấp vé gửi xe.</li>	<li style=\"text-align: justify;\">Được hưởng lương khoán theo từng dự án (nếu có).</li>	<li style=\"text-align: justify;\">Được hỗ trợ học phí tham gia các khóa học nâng cao các kỹ năng (nếu có).</li>	<li style=\"text-align: justify;\">Được&nbsp;tiếp xúc với văn hóa doanh nghiệp, trải nghiệm trong môi trường làm việc chuyên nghiệp, năng động.</li>	<li style=\"text-align: justify;\">Được&nbsp;giao tiếp và học hỏi kiến thức từ những SEO, các lập trình viên chính của đội code NukeViet; qua đó&nbsp;nâng cao không chỉ kỹ năng chuyên môn liên quan đến công việc mà còn các kỹ năng mềm trong quá trình làm việc hàng ngày.</li>	<li style=\"text-align: justify;\">Tham gia các chương trình ngoại khóa, các hoạt động nội bộ của công ty.</li>	<li style=\"text-align: justify;\">Cơ&nbsp;hội ưu tiên (không cần qua thử việc) trở thành nhân viên chính thức nếu có kết quả học việc tốt.</li></ul><h2 style=\"text-align: justify;\"><b>Thời gian làm việc</b></h2><ul>	<li style=\"text-align: justify;\">Toàn thời gian cố định hoặc làm online.</li>	<li style=\"text-align: justify;\">Thời gian làm việc là:&nbsp;8:00 – 17:00, Thứ hai – Thứ sáu</li>	<li style=\"text-align: justify;\">Ngày làm việc và thời gian làm việc có thể thay đổi linh hoạt tùy thuộc vào điều kiện của ứng viên và tình hình thực tế.</li></ul><h2 style=\"text-align: justify;\"><b>Đối tượng</b></h2><p style=\"text-align: justify;\">Tất cả các bạn sinh viên năm cuối/mới tốt nghiệp các trường CĐ - ĐH đáp ứng được những yêu cầu sau:</p><ul>	<li style=\"text-align: justify;\">Sinh viên khối ngành kinh tế: yêu thích marketing online, mong muốn thực tập trong lĩnh vực kinh doanh phần mềm.</li>	<li style=\"text-align: justify;\">Sinh viên khối ngành kỹ thuật: yêu thích thiết kế, lập trình web.</li></ul><p style=\"text-align: justify;\">Có kỹ năng giao tiếp và tư duy logic tốt, năng động và ham học hỏi.</p><p style=\"text-align: justify;\">Ưu tiên các ứng viên đam mê phần mềm nguồn mở, đặc biệt là các ứng viên đã từng tham gia và có bài viết diễn đàn NukeViet (<a href=\"http://forum.nukeviet.vn/\">forum.nukeviet.vn</a>)</p><h2 style=\"text-align: justify;\"><b>Điều kiện</b></h2><p style=\"text-align: justify;\">Có máy tính xách tay để làm việc.</p><p style=\"text-align: justify;\">Ứng viên sẽ được ký hợp đồng học việc (có thời hạn cụ thể). Nếu được nhận vào làm việc chính thức, người lao động phải làm ở công ty ít nhất 2 năm, nếu không làm hoặc nghỉ trước thời hạn sẽ phải hoàn lại tiền đào tạo. Chi phí này được tính là 3.000.000 VND</p><p style=\"text-align: justify;\">Nếu được cử đi học, người lao động phải làm ở công ty ít nhất 2 năm, nếu không làm hoặc nghỉ trước thời hạn sẽ phải hoàn lại tiền học phí.</p><p style=\"text-align: justify;\">Thực hiện theo các quy định khác của công ty...</p><h2 style=\"text-align: justify;\"><b>Cách thức ứng tuyển</b></h2><p style=\"text-align: justify;\">Gửi bản mềm đơn đăng ký ứng tuyển tới:&nbsp;<a href=\"mailto:tuyendung@vinades.vn\">tuyendung@vinades.vn</a>;</p><p style=\"text-align: justify;\">Tiêu đề mail ghi rõ: &#91;Họ tên&#93; –Ứng tuyển học việc&#91;Bộ phận ứng tuyển&#93;;</p><p style=\"text-align: justify;\">Ví dụ: Lê Văn Nam –&nbsp;Ứng tuyển học việc bộ phận đồ họa</p><p style=\"text-align: justify;\">Hồ sơ bản cứng cần chuẩn bị (sẽ gửi sau nếu đạt yêu cầu) gồm:</p><ul>	<li style=\"text-align: justify;\">Giấy khám sức khoẻ của cơ quan y tế</li>	<li style=\"text-align: justify;\">Bản sao giấy khai sinh (có công chứng).</li>	<li style=\"text-align: justify;\">Bản sao quá trình học tập (bảng điểm tốt nghiệp), các văn bằng chứng chỉ (có công chứng) nếu đã tốt nghiệp.</li>	<li style=\"text-align: justify;\">Sơ yếu lý lịch có xác nhận của cơ quan công tác trước đó (nếu có) hoặc xác nhận của chính quyền địa phương nơi bạn đăng ký hộ khẩu thường trú.</li>	<li style=\"text-align: justify;\">Chứng minh thư (photo không cần công chứng).</li>	<li style=\"text-align: justify;\">Thư giới thiệu (nếu có)</li>	<li style=\"text-align: justify;\">Ảnh 4x6: 4 chiếc (đã bao gồm 1 chiếc gắn trên sơ yếu lý lịch).</li></ul><p style=\"text-align: justify;\"><br  /><strong>Chi tiết vui lòng tham khảo tại:</strong>&nbsp;<a href=\"http://vinades.vn/vi/news/Tuyen-dung/\" target=\"_blank\">http://vinades.vn/vi/news/Tuyen-dung/</a><br  /><br  /><strong>Mọi thắc mắc vui lòng liên hệ:</strong></p><blockquote><p style=\"text-align: justify;\"><strong>Công ty cổ phần phát triển nguồn mở Việt Nam.</strong><br  />Trụ sở chính: Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội.<br  /><br  />- Tel: +84-4-85872007 - Fax: +84-4-35500914<br  />- Email:&nbsp;<a href=\"mailto:contact@vinades.vn\">contact@vinades.vn</a>&nbsp;- Website:&nbsp;<a href=\"http://www.vinades.vn/\">http://www.vinades.vn</a></p></blockquote>', '', 2, 0, 1, 1, 1, 0), 
(16, '', '', '<div class=\"details-content clearfix\" id=\"bodytext\"><strong>Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016 của Bộ Giáo dục và Đào tạo có gì mới?</strong><br  /><br  />Trong các hướng dẫn thực hiện nhiệm vụ CNTT từ năm 2010 đến nay liên tục chỉ đạo việc đẩy mạnh công tác triển khai sử dụng phần mềm nguồn mở trong nhà trường và các cơ quan quản lý giáo dục. Tuy nhiên Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016 của Bộ Giáo dục và Đào tạo có nhiều thay đổi mạnh mẽ đáng chú ý, đặc biệt việc chỉ đạo triển khai các phần mềm nguồn mở vào trong các cơ sở quản lý giao dục được rõ ràng và cụ thể hơn rất nhiều.<br  /><br  />Một điểm thay đổi đáng chú ý đối với phần mềm nguồn mở, trong đó đã thay hẳn thuật ngữ &quot;phần mềm tự do mã nguồn mở&quot; hoặc &quot;phần mềm mã nguồn mở&quot; thành &quot;phần mềm nguồn mở&quot;, phản ánh xu thế sử dụng thuật ngữ phần mềm nguồn mở đã phổ biến trong cộng đồng nguồn mở thời gian vài năm trở lại đây.<br  /><br  /><strong>NukeViet - Phần mềm nguồn mở Việt - không chỉ được khuyến khích mà đã được hướng dẫn thực thi</strong><br  /><br  />Từ 5 năm trước, thông tư số 08/2010/TT-BGDĐT của Bộ GD&amp;ĐTquy định về sử dụng phần mềm tự do mã nguồn mở trong các cơ sở giáo dục, NukeViet đã được đưa vào danh sách các mã nguồn mở <strong>được khuyến khích sử dụng trong giáo dục</strong>. Tuy nhiên, việc sử dụng chưa được thực hiện một cách đồng bộ mà chủ yếu làm nhỏ lẻ rải rác tại một số trường, Phòng và Sở GD&amp;ĐT.<br  /><br  />Trong Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016 của Bộ Giáo dục và Đào tạo lần này, NukeViet&nbsp; không chỉ được khuyến khích mà đã được hướng dẫn thực thi, không những thế NukeViet còn được đưa vào hầu hết các nhiệm vụ chính, cụ thể:<div><div><div>&nbsp;</div>- <strong>Nhiệm vụ số 5</strong> &quot;<strong>Công tác bồi dưỡng ứng dụng CNTT cho giáo viên và cán bộ quản lý giáo dục</strong>&quot;, mục 5.1 &quot;Một số nội dung cần bồi dưỡng&quot; có ghi &quot;<strong>Tập huấn sử dụng phần mềm nguồn mở NukeViet.</strong>&quot;<br  />&nbsp;</div>- <strong>Nhiệm vụ số 10 &quot;Khai thác, sử dụng và dạy học bằng phần mềm nguồn mở</strong>&quot; có ghi: &quot;<strong>Khai thác và áp dụng phần mềm nguồn mở NukeViet trong giáo dục.&quot;</strong><br  />&nbsp;</div>- Phụ lục văn bản, có trong nội dung &quot;Khuyến cáo khi sử dụng các hệ thống CNTT&quot;, hạng mục số 3 ghi rõ &quot;<strong>Không nên làm website mã nguồn đóng&quot; và &quot;Nên làm NukeViet: phần mềm nguồn mở&quot;.</strong><br  />&nbsp;<div>Hiện giờ văn bản này đã được đăng lên website của Bộ GD&amp;ĐT: <a href=\"http://moet.gov.vn/?page=1.10&amp;view=983&amp;opt=brpage\" target=\"_blank\">http://moet.gov.vn/?page=1.10&amp;view=983&amp;opt=brpage</a></div><p><br  />Hoặc có thể tải về tại đây: <a href=\"http://vinades.vn/vi/download/van-ban-luat/Huong-dan-thuc-hien-nhiem-vu-CNTT-nam-hoc-2015-2016/\" target=\"_blank\">http://vinades.vn/vi/download/van-ban-luat/Huong-dan-thuc-hien-nhiem-vu-CNTT-nam-hoc-2015-2016/</a></p><blockquote><p><em>Trên cơ sở hướng dẫn của Bộ GD&amp;ĐT, Công ty cổ phần phát triển nguồn mở Việt Nam và các doanh nghiệp phát triển NukeViet trong cộng đồng NukeViet đang tích cực công tác hỗ trợ cho các phòng GD&amp;ĐT, Sở GD&amp;ĐT triển khai 2 nội dung chính: Hỗ trợ công tác đào tạo tập huấn hướng dẫn sử dụng NukeViet và Hỗ trợ triển khai NukeViet cho các trường, Phòng và Sở GD&amp;ĐT.<br  /><br  />Các Phòng, Sở GD&amp;ĐT có nhu cầu có thể xem thêm thông tin chi tiết tại đây: <a href=\"http://vinades.vn/vi/news/thong-cao-bao-chi/Ho-tro-trien-khai-dao-tao-va-trien-khai-NukeViet-cho-cac-Phong-So-GD-DT-264/\" target=\"_blank\">Hỗ trợ triển khai đào tạo và triển khai NukeViet cho các Phòng, Sở GD&amp;ĐT</a></em></p></blockquote></div>', '', 2, 0, 1, 1, 1, 0), 
(17, '', '', '<div class=\"details-content clearfix\" id=\"bodytext\"><span style=\"font-size:16px;\"><strong>Hỗ trợ công tác đào tạo tập huấn hướng dẫn sử dụng phần mềm nguồn mở NukeViet</strong></span><br  /><br  />Công tác hỗ trợ công tác đào tạo tập huấn hướng dẫn sử dụng phần mềm nguồn mở NukeViet sẽ được thực hiện bởi đội ngũ chuyên gia giàu kinh nghiệm về NukeViet được tuyển chọn từ lực lượng lập trình viên, chuyên viên kỹ thuật hiện đang tham gia phát triển và hỗ trợ về NukeViet từ Ban Quản Trị NukeViet và Công ty cổ phần phát triển nguồn mở Việt Nam và các đối tác thuộc Liên minh phần mềm giáo dục nguồn mở NukeViet.<br  /><br  />Với kinh nghiệm tập huấn đã được tổ chức thành công cho nhiều Phòng giáo dục và đào tạo, các chuyên gia về NukeViet sẽ giúp chuyển giao giáo trình, chương trình, kịch bản đào tạo cho các Phòng, Sở GD&amp;ĐT; hỗ trợ các giáo viên và cán bộ quản lý giáo dục sử dụng trong suốt thời gian sau đào tạo.<br  /><br  />Đặc biệt, đối với các đơn vị sử dụng NukeViet làm website và cổng thông tin đồng bộ theo quy mô cấp Phòng và Sở, cán bộ tập huấn của NukeViet sẽ có nhiều chương trình hỗ trợ khác như chương trình thi đua giữa các website sử dụng NukeViet trong cùng đơn vị cấp Phòng, Sở và trên toàn quốc; Chương trình báo cáo và giám sát và xếp hạng website hàng tháng; Chương trình tập huấn nâng cao trình độ sử dụng NukeViet hàng năm cho giáo viên và cán bộ quản lý giáo dục đang thực hiện công tác quản trị các hệ thống sử dụng nền tảng NukeViet.<br  /><br  /><span style=\"font-size:16px;\"><strong>Hỗ trợ triển khai NukeViet cho các trường, Phòng và Sở GD&amp;ĐT</strong></span><br  /><br  />Nhằm hỗ trợ triển khai NukeViet cho các trường, Phòng và Sở GD&amp;ĐT một cách toàn diện, đồng bộ và tiết kiệm, hiện tại, Liên minh phần mềm nguồn mở giáo dục NukeViet chuẩn bị ra mắt. Liên minh này do Công ty cổ phần phát triển nguồn mở Việt Nam đứng dầu và thực hiện việc điều phối công các hỗ trợ và phối hợp giữa các đơn vị trên toàn quốc. Thành viên của liên minh là các doanh nghiệp cung cấp sản phẩm và dịch vụ phần mềm hỗ trợ cho giáo dục (kể cả những đơn vị chỉ tham gia lập trình và những đơn vị chỉ tham gia khai thác thương mại). Liên minh sẽ cùng nhau làm việc để xây dựng một hệ thống phần mềm thống nhất cho giáo dục, có khả năng liên thông và kết nối với nhau, hoàn toàn dựa trên nền tảng phần mềm nguồn mở. Liên minh cũng hỗ trợ và phân phối phần mềm cho các đơn vị làm phần mềm trong ngành giáo dục với mục tiêu là tiết kiệm tối đa chi phí trong khâu thương mại, mang tới cơ hội cho các đơn vị làm phần mềm giáo dục mà không cần phải lo lắng về việc phân phối phần mềm. Các doanh nghiệp quan tâm đến cơ hội kinh doanh bằng phần mềm nguồn mở, muốn tìm hiểu và tham gia liên minh có thể đăng ký tại đây: <a href=\"http://edu.nukeviet.vn/lienminh-dangky.html\" target=\"_blank\">http://edu.nukeviet.vn/lienminh-dangky.html</a><br  /><br  />Liên minh phần mềm nguồn mở giáo dục NukeViet đang cung cấp giải pháp cổng thông tin chuyên dùng cho phòng và Sở GD&amp;ĐT (NukeViet Edu Gate) cung cấp dưới dạng dịch vụ công nghệ thông tin (theo mô hình của <a href=\"http://vinades.vn/vi/download/van-ban-luat/Quyet-dinh-80-ve-thue-dich-vu-CNTT/\" target=\"_blank\">Quyết định số 80/2014/QĐ-TTg của Thủ tướng Chính phủ</a>) có thể hỗ trợ cho các trường, Phòng và Sở GD&amp;ĐT triển khai NukeViet ngay lập tức.<br  /><br  />Giải pháp cổng thông tin chuyên dùng cho phòng và Sở GD&amp;ĐT (NukeViet Edu Gate) có tích hợp website các trường (liên thông 3 cấp: trường - phòng - sở) cho phép tích hợp hàng ngàn website của các trường cùng nhiều dịch vụ khác trên cùng một hệ thống giúp tiết kiệm chi phí đầu tư, chi phí triển khai và bảo trì hệ thống bởi toàn bộ hệ thống được vận hành bằng một phần mềm duy nhất. Ngoài giải pháp cổng thông tin giáo dục tích hợp, Liên minh phần mềm nguồn mở giáo dục NukeViet cũng đang phát triển một số&nbsp;sản phẩm phần mềm dựa trên phần mềm nguồn mở NukeViet và sẽ sớm ra mắt trong thời gian tới.<div><br  />Hiện nay,&nbsp;NukeViet Edu Gate cũng&nbsp;đã được triển khai rộng rãi và nhận được sự ủng hộ của&nbsp;nhiều Phòng, Sở GD&amp;ĐT trên toàn quốc.&nbsp;Các phòng, sở GD&amp;ĐT quan tâm đến giải pháp NukeViet Edu Gate có thể truy cập&nbsp;<a href=\"http://edu.nukeviet.vn/\" target=\"_blank\">http://edu.nukeviet.vn</a>&nbsp;để tìm hiểu thêm hoặc liên hệ:<br  /><br  /><span style=\"font-size:14px;\"><strong>Liên minh phần mềm nguồn mở giáo dục NukeViet</strong></span><br  />Đại diện: <strong>Công ty cổ phần phát triển nguồn mở Việt Nam (VINADES.,JSC)</strong><br  /><strong>Địa chỉ</strong>: Phòng 1706 - Tòa nhà CT2 Nàng Hương, 583 Nguyễn Trãi, Hà Nội<br  /><strong>Email</strong>: contact@vinades.vn, Tel: 04-85872007, <strong>Fax</strong>: 04-35500914,<br  /><strong>Hotline</strong>: 0904762534 (Mr. Hùng), 0936226385 (Ms. Ngọc),&nbsp;<span style=\"color: rgb(38, 38, 38); font-family: arial, sans-serif; font-size: 13px; line-height: 16px;\">0904719186 (Mr. Hậu)</span><br  />Các Phòng GD&amp;ĐT, Sở GD&amp;ĐT có thể đăng ký tìm hiểu, tổ chức hội thảo, tập huấn, triển khai NukeViet trực tiếp tại đây: <a href=\"http://edu.nukeviet.vn/dangky.html\" target=\"_blank\">http://edu.nukeviet.vn/dangky.html</a><br  /><br  /><span style=\"font-size:16px;\"><strong>Tìm hiểu về phương thức chuyển đổi các hệ thống website cổng thông tin sang NukeViet theo mô hình tích hợp liên thông từ trưởng, lên Phòng, Sở GD&amp;ĐT:</strong></span><br  /><br  />Đối với các Phòng, Sở GD&amp;ĐT, trường Nầm non, tiểu học, THCS, THPT... chưa có website, Liên minh phần mềm nguồn mở giáo dục NukeViet sẽ hỗ trợ triển khai NukeViet theo mô hình cổng thông tin liên cấp như quy định tại <a href=\"http://vinades.vn/vi/download/van-ban-luat/Thong-tu-quy-dinh-ve-ve-to-chuc-hoat-dong-su-dung-thu-dien-tu/\" target=\"_blank\">thông tư số <strong>53/2012/TT-BGDĐT</strong> của Bộ GD&amp;ĐT</a> ban hành ngày 20-12-2012 quy định về quy định về về tổ chức hoạt động, sử dụng thư điện tử và cổng thông tin điện tử tại sở giáo dục và đào tạo, phòng giáo dục và đào tạo và các cơ sở GDMN, GDPT và GDTX.<br  /><br  />Trường hợp các đơn vị có website và đang sử dụng NukeViet theo dạng rời rạc thì việc chuyển đổi và tích hợp các website NukeViet rời rạc vào NukeViet Edu Gate của Phòng và Sở có thể thực hiện dễ dàng và giữ nguyên toàn bộ dữ liệu.<br  /><br  />Trường hợp các đơn vị có website và nhưng không sử dụng NukeViet cũng có thể chuyển đổi sang sử dụng NukeViet để hợp nhất vào hệ thống cổng thông tin giáo dục cấp Phòng, Sở. Tuy nhiên mức độ và tỉ lệ dữ liệu được chuyển đổi thành công sẽ phụ thuộc vào tình hình thực tế của từng website.</div></div>', '', 2, 0, 1, 1, 1, 0), 
(18, '', '', '<p dir=\"ltr\" style=\"text-align: justify;\">Trải qua hơn 10 năm phát triển, từ một mã nguồn chỉ mang tính cá nhân, NukeViet đã phát triển thành công theo hướng cộng đồng. Năm 2010, NukeViet 3 ra đời đánh dấu một mốc lớn trong quá trình đi lên của NukeViet, phát triển theo hướng chuyên nghiệp với sự hậu thuẫn của Công ty cổ phần phát triển nguồn mở Việt Nam (VINADES.,JSC). NukeViet 3 đã và được sử dụng rộng rãi trong cộng đồng, từ các cổng thông tin tổ chức, hệ thống giáo dục, cho đến các website cá nhân, thương mại, mang lại các trải nghiệm vượt trội của mã nguồn thương hiệu Việt so với các mã nguồn nổi tiếng khác trên thế giới.<br  /><br  />Năm 2016, NukeViet 4 ra đời được xem là một cuộc cách mạng lớn trong chuỗi sự kiện phát triển NukeViet, cũng như xu thế công nghệ hiện tại. Hệ thống gần như được đổi mới hoàn toàn từ nhân hệ thống đến giao diện, nâng cao đáng kể hiệu suất và trải nghiệm người dùng.<br  /><br  /><span style=\"line-height: 1.6;\"><strong>Dưới đây là một số thay đổi của NukeViet 4.</strong></span><br  /><strong><span style=\"line-height: 1.6;\">Các thay đổi từ nhân hệ thống:</span></strong></p><ul>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Các công nghệ mới được áp dụng.</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Sử dụng composer để quản lý các thư viện PHP được cài vào hệ thống.</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Từng bước áp dụng &nbsp;các tiêu chuẩn viết code PHP theo khuyến nghị của <a href=\"http://www.php-fig.org/psr/\">http://www.php-fig.org/psr/</a></p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Sử dụng PDO để thay cho extension MySQL.</p>		</li>	</ul>	</li></ul><ul>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Tăng cường khả năng bảo mật</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Sau khi các chuyên giả bảo mật của HP gửi đánh giá, chúng tôi đã tối ưu NukeViet 4.0 để hệ thống an toàn hơn.</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Mã hóa các mật khẩu lưu trữ trong hệ thống: Các mật khẩu như FTP, SMTP,... đã được mã hóa, bảo mật thông tin người dùng.</p>		</li>	</ul>	</li></ul><ul>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Tối ưu SEO:</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">SEO được xem là một trong những ưu tiên hàng đầu được phát triển trong phiên bản này. NukeViet 4 tập trung tối ưu hóa SEO Onpage mạnh mẽ. Các công cụ hỗ trợ SEO được tập hợp lại qua module “Công cụ SEO”. Các chức năng được thêm mới:</p>		<ul>			<li dir=\"ltr\">			<p dir=\"ltr\" style=\"text-align: justify;\">Loại bỏ tên module khỏi URL khi không dùng đa ngôn ngữ</p>			</li>			<li dir=\"ltr\">			<p dir=\"ltr\" style=\"text-align: justify;\">Cho phép đổi đường dẫn module</p>			</li>			<li dir=\"ltr\">			<p dir=\"ltr\" style=\"text-align: justify;\">Thêm chức năng xác thực Google+ (Bản quyền tác giả)</p>			</li>			<li dir=\"ltr\">			<p dir=\"ltr\" style=\"text-align: justify;\">Thêm chức năng ping đến các công cụ tìm kiếm: Submit url mới đến google để việc hiển thị bài viết mới lên kết quả tìm kiếm nhanh chóng hơn.</p>			</li>			<li dir=\"ltr\">			<p dir=\"ltr\" style=\"text-align: justify;\">Hỗ trợ Meta OG của facebook</p>			</li>			<li dir=\"ltr\">			<p dir=\"ltr\" style=\"text-align: justify;\">Hỗ trợ chèn Meta GEO qua Cấu hình Meta-Tags</p>			</li>		</ul>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Cùng với đó, các module cũng được tối ưu hóa bằng các form hỗ trợ khai báo tiêu đề, mô tả (description), từ khóa (keywods) cho từng khu vực, từng trang. &nbsp;</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Với sự hỗ trợ tối đa này, người quản trị (admin) có thể tùy biến lại website theo phong cách SEO riêng biệt.</p>		</li>	</ul>	</li>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Thay đổi giao diện, sử dụng giao diện tuỳ biến</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Giao diện trong NukeViet 4 được làm mới, tương thích với nhiều màn hình hơn.</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Sử dụng thư viện bootstrap để việc phát triển giao diện thống nhất và dễ dàng hơn.</p>		</li>	</ul>	</li>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Hệ thống nhận thông báo:&nbsp;</strong><span style=\"line-height: 1.6;\">Có thể gọi đây là một tiện ích nhỏ, song nó rất hữu dụng để admin tương tác với hệ thống một cách nhanh chóng. Admin có thể nhận thông báo từ hệ thống (hoặc từ module) khi có sự kiện nào đó.</span></p>	</li></ul><p dir=\"ltr\" style=\"text-align: justify; margin-left: 40px;\"><strong>Ví dụ:</strong> Khi có khách gửi liên hệ (qua module contact) đến thì hệ thống xuất hiện biểu tượng thông báo “Có liên hệ mới” ở góc phải, Admin sẽ nhận được ngay lập tức thông báo khi người dùng đang ở Admin control panel (ACP).</p><ul>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Thay đổi cơ chế quản lý block:</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Nhận thấy việc hiển thị block ở lightbox trong NukeViet 3 dẫn đến một số bất tiện trong quá trình quản lý, NukeViet 4 đã thay thế cách hiển thị này ở dạng cửa sổ popup. Dễ nhận thấy sự thay đổi này khi admin thêm (hoặc sửa) một block nào đó.</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">“Cấu hình hiển thị block trên các thiết bị” cũng được đưa vào phần cấu hình block, admin có thể tùy chọn cho phép block hiển thị trên các thiết bị nào (tất cả thiết bị, thiết bị di động, máy tính bảng, thiết bị khác).<span style=\"line-height: 1.6;\">&nbsp;</span></p>		</li>	</ul>	</li></ul><ul>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Thêm ngôn ngữ tiếng Pháp:</strong> website cài đặt mới có sẵn 3 ngôn ngữ mặc định là Việt, Anh và Pháp.</p>	</li></ul><p dir=\"ltr\" style=\"text-align: justify;\"><strong>Các thay đổi của module:</strong></p><ul>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Module menu:</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Phương án quản lý menu được thay đổi hướng tới việc quản lý menu nhanh chóng, tiện lợi nhất cho admin. Admin có thể nạp nhanh menu theo các tùy chọn mà hệ thống cung cấp.</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Mẫu menu cũng được thay đổi, đa dạng và hiển thị tốt với các giao diện hiện đại.</p>		</li>	</ul>	</li>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Module contact (Liên hệ):</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Bổ sung các trường thông tin về bộ phận (Điện thoại, fax, email, các trường liên hệ khác,...).</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Admin có thể trả lời khách nhiều lần, hệ thống lưu lại lịch sử trao đổi đó.</p>		</li>	</ul>	</li>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Module users (Tài khoản):</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thay thế OpenID bằng thư viện OAuth - hỗ trợ tích hợp đăng nhập qua tài khoản mạng xã hội</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Cho phép đăng nhập 1 lần tài khoản người dùng NukeViet với Alfresco, Zimbra, Moodle, Koha</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thêm chức năng tùy biến trường dữ liệu thành viên</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thêm chức năng phân quyền sử dụng module users</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thêm cấu hình: Số ký tự username, độ phức tạp mật khẩu, tạo mật khảu ngẫu nhiên,....</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Cho phép sử dụng tên truy cập, hoặc email để đăng nhập</p>		</li>	</ul>	</li>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Module about:</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Module about ở NukeViet 3 được đổi tên thành module page</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thêm các cấu hình hỗ trợ SEO: Ảnh minh họa, chú thích ảnh minh họa, mô tả, từ khóa cho bài viết, hiển thị các công cụ tương tác với các mạng xã hội.</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thêm RSS</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Cấu hình phương án hiển thị các bài viết trên trang chính</p>		</li>	</ul>	</li>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\"><strong>Module news (Tin tức):</strong></p>	<ul>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thêm phân quyền cho người quản lý module, đến từng chủ đề</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thay đổi phương án lọc từ khóa bài viết, lọc từ khóa theo các từ khóa đã có trong tags thay vì đọc từ từ điển.</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Bổ sung các trạng thái bài viết</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thêm cấu hình mặc định hiển thị ảnh minh họa trên trang xem chi tiết bài viết</p>		</li>		<li dir=\"ltr\">		<p dir=\"ltr\" style=\"text-align: justify;\">Thêm các công cụ tương tác với mạng xã &nbsp;hội.</p>		</li>	</ul>	</li></ul><p dir=\"ltr\" style=\"text-align: justify;\"><strong>Quản lý Bình luận</strong></p><ul>	<li dir=\"ltr\">	<p dir=\"ltr\" style=\"text-align: justify;\">Các bình luận của các module sẽ được tích hợp quản lý tập trung để cấu hình.</p>	</li>	<li dir=\"ltr\" style=\"text-align: justify;\">Khi xây dựng mới module, Chỉ cần nhúng 1 đoạn mã vào. Tránh phải việc copy mã code gây khó khăn cho bảo trì.</li></ul>', '', 2, 0, 1, 1, 1, 0);


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
) ENGINE=MyISAM  AUTO_INCREMENT=19  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_rows`
--

INSERT INTO `nv4_vi_news_rows` VALUES
(1, 1, '1,8,12', 0, 1, 'Quỳnh Nhi', 1, 1274989177, 1275318126, 1, 1274989140, 0, 2, 'Ra mắt công ty mã nguồn mở đầu tiên tại Việt Nam', 'Ra-mat-cong-ty-ma-nguon-mo-dau-tien-tai-Viet-Nam', 'Mã nguồn mở NukeViet vốn đã quá quen thuộc với cộng đồng CNTT Việt Nam trong mấy năm qua. Tuy chưa hoạt động chính thức, nhưng chỉ trong khoảng 5 năm gần đây, mã nguồn mở NukeViet đã được dùng phổ biến ở Việt Nam, áp dụng ở hầu hết các lĩnh vực, từ tin tức đến thương mại điện tử, từ các website cá nhân cho tới những hệ thống website doanh nghiệp.', 'nangly.jpg', 'Thành lập VINADES.,JSC', 1, 1, '6', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(6, 12, '1,12', 0, 1, 'Nguyễn Thế Hùng', 7, 1453192444, 1453192444, 1, 1453192444, 0, 2, 'Hãy trở thành nhà cung cấp dịch vụ của NukeViet&#33;', 'hay-tro-thanh-nha-cung-cap-dich-vu-cua-nukeviet', 'Nếu bạn là công ty hosting, là công ty thiết kế web có sử dụng mã nguồn NukeViet, là cơ sở đào tạo NukeViet hay là công ty bất kỳ có kinh doanh dịch vụ liên quan đến NukeViet... hãy cho chúng tôi biết thông tin liên hệ của bạn để NukeViet hỗ trợ bạn trong công việc kinh doanh nhé!', 'hoptac.jpg', '', 1, 1, '6', 1, 0, 14, 0, 0, 0, 0, '', 0), 
(7, 11, '11', 0, 1, 'Phạm Quốc Tiến', 2, 1453192400, 1453192400, 1, 1453192400, 0, 2, 'Tuyển dụng lập trình viên PHP phát triển NukeViet', 'Tuyen-dung-lap-trinh-vien-PHP', 'Bạn đam mê nguồn mở? Bạn đang cần tìm một công việc phù hợp với thế mạnh của bạn về PHP và MySQL?. Hãy gia nhập VINADES.,JSC để xây dựng mã nguồn mở hàng đầu cho Việt Nam.', 'tuyendung-kythuat.jpg', 'Tuyển dụng', 1, 1, '6', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(8, 11, '11', 0, 1, 'Phạm Quốc Tiến', 0, 1445391089, 1445394192, 1, 1445391060, 0, 2, 'Tuyển dụng chuyên viên đồ hoạ phát triển NukeViet', 'Tuyen-dung-chuyen-vien-do-hoa', 'Bạn đam mê nguồn mở? Bạn là chuyên gia đồ họa? Chúng tôi sẽ giúp bạn hiện thực hóa ước mơ của mình với một mức lương đảm bảo. Hãy gia nhập VINADES.,JSC để xây dựng mã nguồn mở hàng đầu cho Việt Nam.', 'tuyendung-kythuat.jpg', 'Tuyển dụng', 1, 1, '6', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(9, 11, '11', 0, 1, 'Phạm Quốc Tiến', 0, 1445391090, 1445394193, 1, 1445391060, 0, 2, 'Tuyển dụng lập trình viên front-end (HTML/CSS/JS) phát triển NukeViet', 'Tuyen-dung-lap-trinh-vien-front-end-HTML-CSS-JS', 'Bạn đam mê nguồn mở? Bạn đang cần tìm một công việc phù hợp với thế mạnh của bạn về front-end (HTML/CSS/JS)?. Hãy gia nhập VINADES.,JSC để xây dựng mã nguồn mở hàng đầu cho Việt Nam.', 'tuyendung-kythuat.jpg', 'Tuyển dụng', 1, 1, '6', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(10, 1, '1,9', 0, 1, '', 3, 1322685920, 1322686042, 1, 1322685920, 0, 2, 'Mã nguồn mở NukeViet giành giải ba Nhân tài đất Việt 2011', 'Ma-nguon-mo-NukeViet-gianh-giai-ba-Nhan-tai-dat-Viet-2011', 'Không có giải nhất và giải nhì, sản phẩm Mã nguồn mở NukeViet của VINADES.,JSC là một trong ba sản phẩm đã đoạt giải ba Nhân tài đất Việt 2011 - Lĩnh vực Công nghệ thông tin (Sản phẩm đã ứng dụng rộng rãi).', 'nukeviet-nhantaidatviet2011.jpg', 'Mã nguồn mở NukeViet giành giải ba Nhân tài đất Việt 2011', 1, 1, '6', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(11, 1, '1', 0, 1, '', 4, 1445309676, 1445309676, 1, 1445309520, 0, 2, 'NukeViet được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước', 'nukeviet-duoc-uu-tien-mua-sam-su-dung-trong-co-quan-to-chuc-nha-nuoc', 'Ngày 5/12/2014, Bộ trưởng Bộ TT&TT Nguyễn Bắc Son đã ký ban hành Thông tư 20/2014/TT-BTTTT (Thông tư 20) quy định về các sản phẩm phần mềm nguồn mở (PMNM) được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước. NukeViet (phiên bản 3.4.02 trở lên) là phần mềm được nằm trong danh sách này.', 'chuc-mung-nukeviet-thong-tu-20-bo-tttt.jpg', 'NukeViet được ưu tiên mua sắm, sử dụng trong cơ quan, tổ chức nhà nước', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(12, 11, '11', 0, 1, 'Vũ Bích Ngọc', 0, 1445391061, 1445394203, 1, 1445391000, 0, 2, 'Công ty VINADES tuyển dụng nhân viên kinh doanh', 'cong-ty-vinades-tuyen-dung-nhan-vien-kinh-doanh', 'Công ty cổ phần phát triển nguồn mở Việt Nam là đơn vị chủ quản của phần mềm mã nguồn mở NukeViet - một mã nguồn được tin dùng trong cơ quan nhà nước, đặc biệt là ngành giáo dục. Chúng tôi cần tuyển 05 nhân viên kinh doanh cho lĩnh vực này.', 'tuyen-dung-nvkd.png', '', 1, 1, '4', 1, 0, 0, 0, 0, 0, 0, '', 0), 
(14, 1, '1,11', 0, 1, 'Trần Thị Thu', 0, 1445391118, 1445394180, 1, 1445391060, 0, 2, 'Chương trình thực tập sinh tại công ty VINADES', 'chuong-trinh-thuc-tap-sinh-tai-cong-ty-vinades', 'Cơ hội để những sinh viên năng động được học tập, trải nghiệm, thử thách sớm với những tình huống thực tế, được làm việc cùng các chuyên gia có nhiều kinh nghiệm của công ty VINADES.', 'thuc-tap-sinh.jpg', '', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(15, 11, '11', 0, 1, 'Trần Thị Thu', 0, 1445391135, 1445394444, 1, 1445391120, 0, 2, 'Học việc tại công ty VINADES', 'hoc-viec-tai-cong-ty-vinades', 'Công ty cổ phần phát triển nguồn mở Việt Nam tạo cơ hội việc làm và học việc miễn phí cho những ứng viên có đam mê thiết kế web, lập trình PHP… được học tập và rèn luyện cùng đội ngũ lập trình viên phát triển NukeViet.', 'hoc-viec-tai-cong-ty-vinades.jpg', '', 1, 1, '4', 1, 0, 0, 0, 0, 0, 0, '', 0), 
(16, 1, '1', 0, 1, '', 0, 1445391182, 1445394133, 1, 1445391120, 0, 2, 'NukeViet được Bộ GD&amp;ĐT đưa vào Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016', 'nukeviet-duoc-bo-gd-dt-dua-vao-huong-dan-thuc-hien-nhiem-vu-cntt-nam-hoc-2015-2016', 'Trong Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016 của Bộ Giáo dục và Đào tạo, NukeViet được đưa vào các hạng mục: Tập huấn sử dụng phần mềm nguồn mở cho giáo viên và cán bộ quản lý giáo dục; Khai thác, sử dụng và dạy học; đặc biệt phần &quot;khuyến cáo khi sử dụng các hệ thống CNTT&quot; có chỉ rõ &quot;Không nên làm website mã nguồn đóng&quot; và &quot;Nên làm NukeViet: phần mềm nguồn mở&quot;.', 'nukeviet-cms.jpg', '', 1, 1, '4', 1, 0, 1, 0, 0, 0, 0, '', 0), 
(17, 1, '1,10', 0, 1, '', 0, 1445391217, 1445393997, 1, 1445391180, 0, 2, 'Hỗ trợ tập huấn và triển khai NukeViet cho các Phòng, Sở GD&amp;ĐT', 'ho-tro-tap-huan-va-trien-khai-nukeviet-cho-cac-phong-so-gd-dt', 'Trên cơ sở Hướng dẫn thực hiện nhiệm vụ CNTT năm học 2015 - 2016 của Bộ Giáo dục và Đào tạo, Công ty cổ phần phát triển nguồn mở Việt Nam và các doanh nghiệp phát triển NukeViet trong cộng đồng NukeViet đang tích cực công tác hỗ trợ cho các phòng GD&ĐT, Sở GD&ĐT triển khai 2 nội dung chính: Hỗ trợ công tác đào tạo tập huấn hướng dẫn sử dụng NukeViet và Hỗ trợ triển khai NukeViet cho các trường, Phòng và Sở GD&ĐT', 'tap-huan-pgd-ha-dong-2015.jpg', 'Tập huấn triển khai NukeViet tại Phòng Giáo dục và Đào tạo Hà Đông - Hà Nội', 1, 1, '4', 1, 0, 2, 0, 0, 0, 0, '', 0), 
(18, 2, '2', 0, 1, 'VINADES', 0, 1453194455, 1453194455, 1, 1453194455, 0, 2, 'NukeViet 4.0 có gì mới?', 'nukeviet-4-0-co-gi-moi', 'NukeViet 4 là phiên bản NukeViet được cộng đồng đánh giá cao, hứa hẹn nhiều điểm vượt trội về công nghệ đến thời điểm hiện tại. NukeViet 4 thay đổi gần như hoàn toàn từ nhân hệ thống đến chức năng, giao diện người dùng. Vậy, có gì mới trong phiên bản này?', 'chuc-mung-nukeviet-thong-tu-20-bo-tttt.jpg', '', 1, 1, '4', 1, 0, 3, 0, 0, 0, 0, '', 0);


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
) ENGINE=MyISAM  AUTO_INCREMENT=5  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nv4_vi_news_sources`
--

INSERT INTO `nv4_vi_news_sources` VALUES
(1, 'Báo Hà Nội Mới', 'http://hanoimoi.com.vn', '', 1, 1274989177, 1274989177), 
(2, 'VINADES.,JSC', 'http://vinades.vn', '', 2, 1274989787, 1274989787), 
(3, 'Báo điện tử Dân Trí', 'http://dantri.com.vn', '', 3, 1322685396, 1322685396), 
(4, 'Bộ Thông tin và Truyền thông', 'http://http://mic.gov.vn', '', 4, 1445309676, 1445309676);


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
) ENGINE=MyISAM  AUTO_INCREMENT=43  DEFAULT CHARSET=utf8;

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
(7, 1, 'thương-mại-điện', '', '', 'thương mại điện'), 
(8, 0, 'điện-tử', '', '', 'điện tử'), 
(9, 13, 'nukeviet', '', '', 'nukeviet'), 
(10, 8, 'vinades', '', '', 'vinades'), 
(11, 3, 'lập-trình-viên', '', '', 'lập trình viên'), 
(12, 3, 'chuyên-viên-đồ-họa', '', '', 'chuyên viên đồ họa'), 
(13, 3, 'php', '', '', 'php'), 
(14, 2, 'mysql', '', '', 'mysql'), 
(15, 1, 'nhân-tài-đất-việt-2011', '', '', 'nhân tài đất việt 2011'), 
(16, 9, 'mã-nguồn-mở', '', '', 'mã nguồn mở'), 
(17, 2, 'nukeviet4', '', '', 'nukeviet4'), 
(18, 1, 'mail', '', '', 'mail'), 
(19, 1, 'fpt', '', '', 'fpt'), 
(20, 1, 'smtp', '', '', 'smtp'), 
(21, 1, 'bootstrap', '', '', 'bootstrap'), 
(22, 1, 'block', '', '', 'block'), 
(23, 1, 'modules', '', '', 'modules'), 
(24, 2, 'banner', '', '', 'banner'), 
(25, 1, 'liên-kết', '', '', 'liên kết'), 
(26, 2, 'hosting', '', '', 'hosting'), 
(27, 1, 'hỗ-trợ', '', '', 'hỗ trợ'), 
(28, 1, 'hợp-tác', '', '', 'hợp tác'), 
(29, 1, 'tốc-độ', '', '', 'tốc độ'), 
(30, 2, 'website', '', '', 'website'), 
(31, 1, 'bảo-mật', '', '', 'bảo mật'), 
(32, 4, 'giáo-dục', '', '', 'giáo dục'), 
(33, 1, 'edu-gate', '', '', 'edu gate'), 
(34, 2, 'lập-trình', '', '', 'lập trình'), 
(35, 1, 'logo', '', '', 'logo'), 
(36, 1, 'code', '', '', 'code'), 
(37, 1, 'thực-tập', '', '', 'thực tập'), 
(38, 1, 'kinh-doanh', '', '', 'kinh doanh'), 
(39, 1, 'nhân-viên', '', '', 'nhân viên'), 
(40, 1, 'bộ-gd&đt', '', '', 'Bộ GD&ĐT'), 
(41, 1, 'module', '', '', 'module'), 
(42, 1, 'php-nuke', '', '', 'php-nuke');


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
(1, 7, 'thương mại điện'), 
(1, 9, 'nukeviet'), 
(7, 10, 'vinades'), 
(7, 9, 'nukeviet'), 
(7, 11, 'lập trình viên'), 
(7, 12, 'chuyên viên đồ họa'), 
(7, 13, 'php'), 
(7, 14, 'mysql'), 
(10, 15, 'Nhân tài đất Việt 2011'), 
(10, 16, 'mã nguồn mở'), 
(10, 9, 'nukeviet'), 
(18, 17, 'nukeviet4'), 
(18, 9, 'nukeviet'), 
(18, 10, 'vinades'), 
(18, 13, 'php'), 
(18, 14, 'mysql'), 
(18, 18, 'mail'), 
(18, 19, 'fpt'), 
(18, 20, 'smtp'), 
(18, 21, 'bootstrap'), 
(18, 22, 'block'), 
(18, 23, 'modules'), 
(18, 16, 'mã nguồn mở'), 
(6, 16, 'mã nguồn mở'), 
(6, 9, 'nukeviet'), 
(6, 17, 'nukeviet4'), 
(6, 10, 'vinades'), 
(6, 24, 'banner'), 
(6, 25, 'liên kết'), 
(6, 26, 'hosting'), 
(6, 27, 'hỗ trợ'), 
(6, 28, 'hợp tác'), 
(17, 9, 'nukeviet'), 
(17, 32, 'giáo dục'), 
(17, 33, 'edu gate'), 
(15, 16, 'mã nguồn mở'), 
(15, 10, 'vinades'), 
(15, 9, 'nukeviet'), 
(15, 11, 'lập trình viên'), 
(15, 12, 'chuyên viên đồ họa'), 
(16, 9, 'nukeviet'), 
(16, 16, 'mã nguồn mở'), 
(16, 32, 'giáo dục'), 
(8, 10, 'vinades'), 
(8, 34, 'lập trình'), 
(8, 35, 'logo'), 
(8, 24, 'banner'), 
(8, 30, 'website'), 
(8, 36, 'code'), 
(8, 13, 'php'), 
(9, 16, 'mã nguồn mở'), 
(9, 10, 'vinades'), 
(9, 34, 'lập trình'), 
(9, 9, 'nukeviet'), 
(14, 37, 'thực tập'), 
(14, 10, 'vinades'), 
(14, 12, 'chuyên viên đồ họa'), 
(14, 11, 'lập trình viên'), 
(14, 9, 'nukeviet'), 
(14, 16, 'mã nguồn mở'), 
(12, 38, 'kinh doanh'), 
(12, 9, 'nukeviet'), 
(12, 32, 'giáo dục'), 
(12, 39, 'nhân viên'), 
(11, 16, 'mã nguồn mở'), 
(11, 9, 'nukeviet'), 
(11, 40, 'Bộ GD&ĐT'), 
(11, 32, 'giáo dục'), 
(1, 41, 'module'), 
(1, 16, 'mã nguồn mở'), 
(1, 42, 'php-nuke');


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


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