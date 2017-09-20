<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 20 Sep 2017 03:34:37 GMT
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

$sys_info['disable_classes']=array();
$sys_info['disable_functions']=array();
$sys_info['ini_set_support']= true;
$sys_info['supports_rewrite']= 'rewrite_mode_apache';
$sys_info['zlib_support']= true;
$sys_info['mb_support']= true;
$sys_info['iconv_support']= true;
$sys_info['allowed_set_time_limit']= true;
$sys_info['os']= 'WINDOWS NT';
$sys_info['fileuploads_support']= true;
$sys_info['curl_support']= true;
$sys_info['ftp_support']= true;
$sys_info['string_handler']= 'mb';
$sys_info['support_cache'] = array();
$sys_info['php_compress_methods'] = array('deflate' => 'gzdeflate','gzip' => 'gzencode','x-gzip' => 'gzencode','compress' => 'gzcompress','x-compress' => 'gzcompress');
$sys_info['server_headers'] = array('server'=>'Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19','x-powered-by'=>'PHP/5.6.19','content-length'=>'0','content-type'=>'text/html; charset=UTF-8');

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
ini_set('log_errors', '0');
ini_set('session.cookie_httponly', '1');
ini_set('session.gc_maxlifetime', '3600');
ini_set('track_errors', '1');
ini_set('user_agent', 'NV4');

$iniSaveTime = 1505878477;