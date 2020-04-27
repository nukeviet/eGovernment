<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 31/05/2010, 00:36
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (headers_sent() or connection_status() != 0 or connection_aborted()) {
    trigger_error('Warning: Headers already sent', E_USER_WARNING);
}

$iniSaveTime = 0;
$ini_list = ini_get_all(null, false);
$ini_server = in_array($server_name, $global_config['my_domains']) ? $server_name : $global_config['my_domains'][0];
$config_ini_file = NV_ROOTDIR . '/' . NV_DATADIR . '/config_ini.' . preg_replace('/[^a-zA-Z0-9\.\_]/', '', $ini_server) . '.php';
@include_once $config_ini_file;
if ($iniSaveTime + 86400 < NV_CURRENTTIME) {
    $content_config = "<?php" . "\n\n";
    $content_config .= NV_FILEHEAD . "\n\n";
    $content_config .= "if (!defined('NV_MAINFILE'))\n    die('Stop!!!');\n\n";

    //disable_classes
    $sys_info['disable_classes'] = (($disable_classes = ini_get('disable_classes')) != '' and $disable_classes != false) ? array_map('trim', preg_split("/[\s,]+/", $disable_classes)) : [];
    $content_config .= "\$sys_info['disable_classes'] = [" . ((!empty($sys_info['disable_classes'])) ? "'" . implode("', '", $sys_info['disable_classes']) . "'" : "") . "];\n";

    //disable_functions
    $sys_info['disable_functions'] = (($disable_functions = ini_get('disable_functions')) != '' and $disable_functions != false) ? array_map('trim', preg_split("/[\s,]+/", $disable_functions)) : [];
    if (extension_loaded('suhosin')) {
        $sys_info['disable_functions'] = array_merge($sys_info['disable_functions'], array_map('trim', preg_split("/[\s,]+/", ini_get('suhosin.executor.func.blacklist'))));
    }
    $content_config .= "\$sys_info['disable_functions'] = [" . ((!empty($sys_info['disable_functions'])) ? "'" . implode("', '", $sys_info['disable_functions']) . "'" : "") . "];\n";

    //ini_set_support
    $sys_info['ini_set_support'] = (function_exists('ini_set') and !in_array('ini_set', $sys_info['disable_functions'])) ? true : false;
    $content_config .= "\$sys_info['ini_set_support'] = " . ($sys_info['ini_set_support'] ? "true" : "false") . ";\n";

    //Kiem tra ho tro rewrite
    $_server_software = explode('/', $_SERVER['SERVER_SOFTWARE']);
    if (function_exists('apache_get_modules')) {
        $apache_modules = apache_get_modules();
        if (in_array('mod_rewrite', $apache_modules)) {
            $sys_info['supports_rewrite'] = 'rewrite_mode_apache';
        } else {
            $sys_info['supports_rewrite'] = false;
        }
    } elseif (strpos($_server_software[0], 'Microsoft-IIS') !== false and $_server_software[1] >= 7) {
        if (isset($_SERVER['IIS_UrlRewriteModule']) and class_exists('DOMDocument')) {
            $sys_info['supports_rewrite'] = 'rewrite_mode_iis';
        } else {
            $sys_info['supports_rewrite'] = false;
        }
    } elseif (strpos($_server_software[0], 'nginx') !== false) {
        $sys_info['supports_rewrite'] = 'nginx';
    } else {
        $_check_rewrite = file_get_contents(NV_MY_DOMAIN . NV_BASE_SITEURL . 'install/check.rewrite');
        if ($_check_rewrite == 'mod_rewrite works') {
            $sys_info['supports_rewrite'] = 'rewrite_mode_apache';
        } elseif (strpos($_server_software[0], 'Apache') !== false and strpos(PHP_SAPI, 'cgi-fcgi') !== false) {
            $sys_info['supports_rewrite'] = 'rewrite_mode_apache';
        }
    }
    $content_config .= "\$sys_info['supports_rewrite'] = " . (!empty($sys_info['supports_rewrite']) ? "'" . $sys_info['supports_rewrite'] . "'" : "false") . ";\n";

    //zlib_support
    $sys_info['zlib_support'] = (extension_loaded('zlib')) ? true : false;
    $content_config .= "\$sys_info['zlib_support'] = " . ($sys_info['zlib_support'] ? "true" : "false") . ";\n";

    //mb_support
    $sys_info['mb_support'] = (extension_loaded('mbstring')) ? true : false;
    $content_config .= "\$sys_info['mb_support'] = " . ($sys_info['mb_support'] ? "true" : "false") . ";\n";

    //iconv_support
    $sys_info['iconv_support'] = (extension_loaded('iconv')) ? true : false;
    $content_config .= "\$sys_info['iconv_support'] = " . ($sys_info['iconv_support'] ? "true" : "false") . ";\n";

    //allowed_set_time_limit
    $sys_info['allowed_set_time_limit'] = (function_exists('set_time_limit') and !in_array('set_time_limit', $sys_info['disable_functions'])) ? true : false;
    $content_config .= "\$sys_info['allowed_set_time_limit'] = " . ($sys_info['allowed_set_time_limit'] ? "true" : "false") . ";\n";

    //os
    $sys_info['os'] = strtoupper((function_exists('php_uname') and !in_array('php_uname', $sys_info['disable_functions']) and php_uname('s') != '') ? php_uname('s') : PHP_OS);
    $content_config .= "\$sys_info['os'] = '" . $sys_info['os'] . "';\n";

    //fileuploads_support
    $sys_info['fileuploads_support'] = (ini_get('file_uploads')) ? true : false;
    $content_config .= "\$sys_info['fileuploads_support'] = " . ($sys_info['fileuploads_support'] ? "true" : "false") . ";\n";

    //curl_support
    $sys_info['curl_support'] = (extension_loaded('curl') and (empty($sys_info['disable_functions']) or (!empty($sys_info['disable_functions']) and !preg_grep('/^curl\_/', $sys_info['disable_functions'])))) ? true : false;
    $content_config .= "\$sys_info['curl_support'] = " . ($sys_info['curl_support'] ? "true" : "false") . ";\n";

    //ftp_support
    $sys_info['ftp_support'] = (function_exists('ftp_connect') and !in_array('ftp_connect', $sys_info['disable_functions']) and function_exists('ftp_chmod') and !in_array('ftp_chmod', $sys_info['disable_functions']) and function_exists('ftp_mkdir') and !in_array('ftp_mkdir', $sys_info['disable_functions']) and function_exists('ftp_chdir') and !in_array('ftp_chdir', $sys_info['disable_functions']) and function_exists('ftp_nlist') and !in_array('ftp_nlist', $sys_info['disable_functions'])) ? true : false;
    $content_config .= "\$sys_info['ftp_support'] = " . ($sys_info['ftp_support'] ? "true" : "false") . ";\n";

    //Xac dinh tien ich mo rong lam viec voi string
    $sys_info['string_handler'] = $sys_info['mb_support'] ? 'mb' : ($sys_info['iconv_support'] ? 'iconv' : 'php');
    $content_config .= "\$sys_info['string_handler'] = '" . $sys_info['string_handler'] . "';\n";

    //support_cache
    $sys_info['support_cache'] = [];
    if (class_exists('Memcached')) {
        $sys_info['support_cache'][] = 'memcached';
    }
    if (class_exists('Memcache')) {
        $sys_info['support_cache'][] = 'memcache';
    }
    if (class_exists('Redis')) {
        $sys_info['support_cache'][] = 'redis';
    }
    $content_config .= "\$sys_info['support_cache'] = [" . ($sys_info['support_cache'] ? "'" . implode("', '", $sys_info['support_cache']) . "'" : "") . "];\n";

    //php_compress_methods
    $sys_info['php_compress_methods'] = [];
    if (function_exists('brotli_compress') and !in_array('brotli_compress', $sys_info['disable_functions'])) {
        $sys_info['php_compress_methods']['br'] = 'brotli_compress';
    }
    if (function_exists('gzdeflate') and !in_array('gzdeflate', $sys_info['disable_functions'])) {
        $sys_info['php_compress_methods']['deflate'] = 'gzdeflate';
    }
    if (function_exists('gzencode') and !in_array('gzencode', $sys_info['disable_functions'])) {
        $sys_info['php_compress_methods']['gzip'] = 'gzencode';
        $sys_info['php_compress_methods']['x-gzip'] = 'gzencode';
    }
    if (function_exists('gzcompress') and !in_array('gzcompress', $sys_info['disable_functions'])) {
        $sys_info['php_compress_methods']['compress'] = 'gzcompress';
        $sys_info['php_compress_methods']['x-compress'] = 'gzcompress';
    }
    $_compress_method = '';
    if (!empty($sys_info['php_compress_methods'])) {
        $_compress_method = [];
        foreach ($sys_info['php_compress_methods'] as $k => $f) {
            $_compress_method[] = "'" . $k . "' => '" . $f . "'";
        }
        $_compress_method = implode(", ", $_compress_method);
    }
    $content_config .= "\$sys_info['php_compress_methods'] = [" . $_compress_method . "];\n";

    //server_headers
    stream_context_set_default(array(
        'http' => array(
            'method' => "GET",
            'header' => "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\nAccept-Encoding: gzip, deflate, br\r\nUser-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:54.0) Gecko/20100101 Firefox/54.0\r\n"
        )
    ));
    $server_headers = get_headers(NV_MY_DOMAIN . NV_BASE_SITEURL . 'index.php?response_headers_detect=1', 1);
    unset($server_headers[0], $server_headers['Date'], $server_headers['Expires'], $server_headers['Last-Modified'], $server_headers['Connection'], $server_headers['Set-Cookie'], $server_headers['X-Page-Speed']);
    $sys_info['server_headers'] = [];
    $_temp = [];
    foreach ($server_headers as $k => $v) {
        $k = strtolower($k);
        $sys_info['server_headers'][$k] = $v;
        $_temp[] = "'" . addslashes($k) . "' => '" . addslashes($v) . "'";
    }
    $_temp = implode(",", $_temp);
    $content_config .= "\$sys_info['server_headers'] = [" . $_temp . "];\n";

    if ($sys_info['ini_set_support']) {
        ini_set('display_startup_errors', 0);
        ini_set('track_errors', 1);

        ini_set('log_errors', 0);
        ini_set('display_errors', 0);
        ini_set('display_errors', 0);

        if (strcasecmp($global_config['session_handler'], $ini_list['session.save_handler']) != 0) {
            if ($global_config['session_handler'] == 'memcached' and in_array('memcached', $sys_info['support_cache']) and defined('NV_MEMCACHED_HOST') and defined('NV_MEMCACHED_PORT') and NV_MEMCACHED_HOST != '' and NV_MEMCACHED_PORT != '') {
                if (ini_set('session.save_handler', 'memcached') !== false) {
                    if (ini_set('session.save_path', NV_MEMCACHED_HOST . ':' . NV_MEMCACHED_PORT) === false) {
                        ini_restore('session.save_handler');
                    }
                }
            } elseif ($global_config['session_handler'] == 'redis' and in_array('redis', $sys_info['support_cache']) and defined('NV_REDIS_HOST') and defined('NV_REDIS_PORT') and NV_REDIS_HOST != '' and NV_REDIS_PORT != '') {
                if (ini_set('session.save_handler', 'redis') !== false) {
                    if (ini_set('session.save_path', NV_REDIS_HOST . ':' . NV_REDIS_PORT) === false) {
                        ini_restore('session.save_handler');
                    }
                }
            }
        }

        if (!isset($_SESSION)) {
            if (strcasecmp(ini_get('session.save_handler'), 'memcached') == 0) {
                ini_set('memcached.sess_prefix', "nv");
                ini_set('memcached.sess_locking', '1');
                ini_set('memcached.sess_binary_protocol', 'Off');
            }

            ini_set('session.use_trans_sid', 0);
            ini_set('session.auto_start', 0);
            ini_set('session.use_cookies', 1);
            ini_set('session.use_only_cookies', 1);
            ini_set('session.cookie_httponly', 1);
            ini_set('session.gc_probability', 1);
            //Kha nang chay Garbage Collection - trinh xoa session da het han truoc khi bat dau session_start();
            ini_set('session.gc_divisor', 1000);
            //gc_probability / gc_divisor = phan tram (phan nghin) kha nang chay Garbage Collection
            ini_set('session.gc_maxlifetime', 3600);
            //thoi gian sau khi het han phien lam viec de Garbage Collection tien hanh xoa, 60 phut
            ini_set('session.cache_limiter', 'nocache');
        }

        ini_set('allow_url_fopen', 1);
        ini_set('user_agent', 'NV4');
        ini_set('default_charset', strtoupper($global_config['site_charset']));

        if ((int) ini_get('memory_limit') < 64) {
            ini_set('memory_limit', '64M');
        }

        ini_set('arg_separator.output', '&');
        ini_set('auto_detect_line_endings', 0);
    }

    //Neu he thong khong ho tro php se bao loi
    if (version_compare(PHP_VERSION, '5.6.0') < 0) {
        die('You are running an unsupported PHP version. Please upgrade to PHP 5.6 or higher before trying to install Nukeviet Portal');
    }

    //Neu he thong khong ho tro opendir se bao loi
    if (!(function_exists('opendir') and !in_array('opendir', $sys_info['disable_functions']))) {
        die('Opendir function is not supported');
    }

    //Neu he thong khong ho tro GD se bao loi
    if (!(extension_loaded('gd'))) {
        die('GD not installed');
    }

    //Neu he thong khong ho tro json se bao loi
    if (!extension_loaded('json')) {
        die('Json object not supported');
    }

    //Neu he thong khong ho tro xml se bao loi
    if (!extension_loaded('xml')) {
        die('Xml library not supported');
    }

    //Neu he thong khong ho tro mcrypt library se bao loi
    if (!function_exists('openssl_encrypt')) {
        die('Openssl library not available');
    }

    //Neu he thong khong ho tro session se bao loi
    if (!extension_loaded('session') or empty($ini_list['session.save_handler']) or ($ini_list['session.save_handler'] != 'files' and empty($ini_list['session.save_path']))) {
        die('Session object not supported');
    }

    $ini_list_new = ini_get_all(null, false);

    $diff = array_diff_assoc($ini_list_new, $ini_list);
    if (!empty($diff)) {
        $content_config .= "\n";
        foreach ($diff as $key => $value) {
            $content_config .= "ini_set('" . $key . "', '" . $value . "');\n";
        }
    }

    $content_config .= "\n";
    $content_config .= "\$iniSaveTime = " . NV_CURRENTTIME . ";";
    @file_put_contents($config_ini_file, $content_config . "\n", LOCK_EX);
}
