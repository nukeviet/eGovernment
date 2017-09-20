<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 4/12/2010, 17:25
 */

define('NV_MAINFILE', true);
define('NV_ROOTDIR', pathinfo(str_replace(DIRECTORY_SEPARATOR, '/', __file__), PATHINFO_DIRNAME));

require NV_ROOTDIR . '/includes/constants.php';
require NV_ROOTDIR . '/' . NV_DATADIR . '/config_global.php';

$cache_file = NV_ROOTDIR . '/' . NV_DATADIR . '/robots.php';
if (file_exists($cache_file)) {
    $createTime = filemtime($cache_file);
    include $cache_file;
    $robots_data = unserialize($cache);
    $robots_other = unserialize($cache_other);
} else {
    $createTime = gmmktime(0, 0, 0, date('m'), 1, date('Y'));

    $robots_data = array();
    $robots_data['/' . NV_DATADIR . '/'] = 0;
    $robots_data['/includes/'] = 0;
    $robots_data['/install/'] = 0;
    $robots_data['/modules/'] = 0;
    $robots_data['/robots.php'] = 0;
    $robots_data['/web.config'] = 0;

    $robots_other = array();
}

$host = (isset($_GET['action']) and ! empty($_GET['action'])) ? $_GET['action'] : $_SERVER['HTTP_HOST'];

$maxAge = 2592000;
$expTme = $createTime + $maxAge;
$hash = $createTime . '-' . md5($host);

header('Etag: "' . $hash . '"');

if (isset($_SERVER['HTTP_IF_NONE_MATCH']) and stripslashes($_SERVER['HTTP_IF_NONE_MATCH']) == '"' . $hash . '"') {
    http_response_code(304);
    header('Content-Length: 0');
    exit();
}

$base_siteurl = pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME);
if ($base_siteurl == '\\' or $base_siteurl == '/') {
    $base_siteurl = '';
}
if (! empty($base_siteurl)) {
    $base_siteurl = str_replace('\\', '/', $base_siteurl);
}
if (! empty($base_siteurl)) {
    $base_siteurl = preg_replace('/[\/]+$/', '', $base_siteurl);
}
if (! empty($base_siteurl)) {
    $base_siteurl = preg_replace('/^[\/]*(.*)$/', '/\\1', $base_siteurl);
    $base_siteurl = preg_replace('#/index\.php(.*)$#', '', $base_siteurl);
}
$base_siteurl .= '/';

$contents = array();
$contents[] = 'User-agent: *';
foreach ($robots_data as $key => $value) {
    if ($value == 0) {
        $contents[] = 'Disallow: ' . $key;
    } elseif ($value == 2) {
        $contents[] = 'Allow: ' . $key;
    }
}
foreach ($robots_other as $key => $value) {
    if ($value == 0) {
        $contents[] = 'Disallow: ' . $key;
    } elseif ($value == 2) {
        $contents[] = 'Allow: ' . $key;
    }
}
$contents[] = 'Sitemap: http' . ($global_config['ssl_https'] == 1 ? 's' : '') . '://' . $host . $base_siteurl . 'sitemap.xml';
$contents = implode("\n", $contents);

header('Content-Type: text/plain; charset=utf-8');
header('Cache-Control: public; max-age=' . $maxAge);
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $createTime) . ' GMT');
header('expires: ' . gmdate('D, d M Y H:i:s', $expTme) . ' GMT');
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');

print_r($contents);