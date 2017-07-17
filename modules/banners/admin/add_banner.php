<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/12/2010 12:11
 */

if (! defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$page_title = $lang_module['add_banner'];

$contents = array();
$contents['upload_blocked'] = '';
$contents['file_allowed_ext'] = array();

if (preg_match('/images/', NV_ALLOW_FILES_TYPE)) {
    $contents['file_allowed_ext'][] = 'images';
}

if (preg_match('/flash/', NV_ALLOW_FILES_TYPE)) {
    $contents['file_allowed_ext'][] = 'flash';
}

if (empty($contents['file_allowed_ext'])) {
    $contents['upload_blocked'] = $lang_module['upload_blocked'];

    include NV_ROOTDIR . '/includes/header.php';
    echo nv_admin_theme(nv_add_banner_theme($contents));
    include NV_ROOTDIR . '/includes/footer.php';
}

$sql = 'SELECT id,login,full_name FROM ' . NV_BANNERS_GLOBALTABLE. '_clients ORDER BY login ASC';
$result = $db->query($sql);

$clients = array();
while ($row = $result->fetch()) {
    $clients[$row['id']] = $row['full_name'] . ' (' . $row['login'] . ')';
}

$plans = array();
$plans_form = array();
$sql = 'SELECT id, title, blang, form, require_image FROM ' . NV_BANNERS_GLOBALTABLE. '_plans ORDER BY blang, title ASC';
$result = $db->query($sql);
while ($row = $result->fetch()) {
    $plans[$row['id']] = $row['title'] . ' (' . (! empty($row['blang']) ? $language_array[$row['blang']]['name'] : $lang_module['blang_all']) . ')';
    $require_image[$row['id']] = $row['require_image'];
    $plans_form[$row['id']] = $row['form'];
}

if (empty($plans)) {
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=add_plan');
}

$error = '';

if ($nv_Request->get_int('save', 'post') == '1') {
    $title = nv_htmlspecialchars(strip_tags($nv_Request->get_string('title', 'post', '')));
    $pid = $nv_Request->get_int('pid', 'post', 0);
    $clid = $nv_Request->get_int('clid', 'post', 0);
    $file_alt = nv_htmlspecialchars(strip_tags($nv_Request->get_string('file_alt', 'post', '')));
    $target = $nv_Request->get_string('target', 'post', '');
    if (! isset($targets[$target])) {
        $target = '_blank';
    }
    $bannerhtml = $nv_Request->get_editor('bannerhtml', '', NV_ALLOWED_HTML_TAGS);
    $click_url = strip_tags($nv_Request->get_string('click_url', 'post', ''));
    $publ_date = strip_tags($nv_Request->get_string('publ_date', 'post', ''));
    $exp_date = strip_tags($nv_Request->get_string('exp_date', 'post', ''));

    if (! empty($publ_date) and ! preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $publ_date)) {
        $publ_date = '';
    }
    if (! empty($exp_date) and ! preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $exp_date)) {
        $exp_date = '';
    }

    if (! empty($clid) and ! isset($clients[$clid])) {
        $clid = 0;
    }
    if ($click_url == 'http://') {
        $click_url = '';
    }

	$sql = 'SELECT require_image FROM ' . NV_BANNERS_GLOBALTABLE. '_plans where id = ' . $pid;
	$result = $db->query($sql);
	$array_require_image = $result->fetchAll();

	if (empty($title)) {
        $error = $lang_module['title_empty'];
    } elseif (empty($pid) or ! isset($plans[$pid])) {
        $error = $lang_module['plan_not_selected'];
    } elseif (! empty($click_url) and ! nv_is_url($click_url)) {
        $error = $lang_module['click_url_invalid'];
    } elseif (! is_uploaded_file($_FILES['banner']['tmp_name']) && $array_require_image[0]['require_image'] == 1 ) {
    	$error = $lang_module['file_upload_empty'];
    } else {
    	if (empty($publ_date)) {
            $publtime = NV_CURRENTTIME;
        } else {
            unset($m);
            preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $publ_date, $m);
            $publtime = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
            if ($publtime < NV_CURRENTTIME) {
                $publtime = NV_CURRENTTIME;
            }
        }

        if (empty($exp_date)) {
            $exptime = 0;
        } else {
            unset($m);
            preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $exp_date, $m);
            $exptime = mktime(23, 59, 59, $m[2], $m[1], $m[3]);
        }

        if ($exptime != 0 and $exptime <= $publtime) {
            $exptime = $publtime;
        }

        $_weight = 0;
        if ($plans_form[$pid] == 'sequential') {
            $_weight = $db->query('SELECT MAX(weight) FROM ' . NV_BANNERS_GLOBALTABLE. '_rows WHERE pid=' . $pid)->fetchColumn();
            $_weight = intval($_weight) + 1;
        }
    	if (! is_uploaded_file($_FILES['banner']['tmp_name'])){
    		$file_name = 'no_image';
            $file_ext = 'no_image';
            $file_mime = 'no_image';
            $width = 0;
            $height = 0;
			$_sql = "INSERT INTO " . NV_BANNERS_GLOBALTABLE. "_rows ( title, pid, clid, file_name, file_ext, file_mime, width, height, file_alt, imageforswf, click_url, target, bannerhtml, add_time, publ_time, exp_time, hits_total, act, weight) VALUES
					( :title, " . $pid . ", " . $clid . ", :file_name, :file_ext, :file_mime,
					" . $width . ", " . $height . ", :file_alt, '', :click_url, :target, :bannerhtml, " . NV_CURRENTTIME . ", " . $publtime . ", " . $exptime . ",
					0, 1, " . $_weight . ")";

	            $data_insert = array();
	            $data_insert['title'] = $title;
	            $data_insert['file_name'] = $file_name;
	            $data_insert['file_ext'] = $file_ext;
	            $data_insert['file_mime'] = $file_mime;
	            $data_insert['file_alt'] = $file_alt;
	            $data_insert['click_url'] = $click_url;
	            $data_insert['target'] = $target;
	            $data_insert['bannerhtml'] = $bannerhtml;
	            $id = $db->insert_id($_sql, 'id', $data_insert);
    	}else{
    		$upload = new NukeViet\Files\Upload($contents['file_allowed_ext'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);
	        $upload_info = $upload->save_file($_FILES['banner'], NV_UPLOADS_REAL_DIR . '/' . NV_BANNER_DIR, false);
	        @unlink($_FILES['banner']['tmp_name']);

	        if (! empty($upload_info['error'])) {
	            $error = $upload_info['error'];
	        } else {
	            @chmod($upload_info['name'], 0644);
	            $file_name = $upload_info['basename'];
	            $file_ext = $upload_info['ext'];
	            $file_mime = $upload_info['mime'];
	            $width = $upload_info['img_info'][0];
	            $height = $upload_info['img_info'][1];


	            $_sql = "INSERT INTO " . NV_BANNERS_GLOBALTABLE. "_rows ( title, pid, clid, file_name, file_ext, file_mime, width, height, file_alt, imageforswf, click_url, target, bannerhtml, add_time, publ_time, exp_time, hits_total, act, weight) VALUES
					( :title, " . $pid . ", " . $clid . ", :file_name, :file_ext, :file_mime,
					" . $width . ", " . $height . ", :file_alt, '', :click_url, :target, :bannerhtml, " . NV_CURRENTTIME . ", " . $publtime . ", " . $exptime . ",
					0, 1, " . $_weight . ")";

	            $data_insert = array();
	            $data_insert['title'] = $title;
	            $data_insert['file_name'] = $file_name;
	            $data_insert['file_ext'] = $file_ext;
	            $data_insert['file_mime'] = $file_mime;
	            $data_insert['file_alt'] = $file_alt;
	            $data_insert['click_url'] = $click_url;
	            $data_insert['target'] = $target;
	            $data_insert['bannerhtml'] = $bannerhtml;
	            $id = $db->insert_id($_sql, 'id', $data_insert);
	        }
    	}
		nv_insert_logs(NV_LANG_DATA, $module_name, 'log_add_banner', 'bannerid ' . $id, $admin_info['userid']);
        nv_CreateXML_bannerPlan();
        $op2 = ($file_ext == 'swf') ? 'edit_banner' : 'info_banner';
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op2 . '&id=' . $id);
    }
} else {
    $pid = $clid = 0;
    $title = $file_alt = $click_url = $exp_date = '';
    $target = '_blank';
    $bannerhtml = '';
    $publ_date = date('d/m/Y', NV_CURRENTTIME);

    if ($nv_Request->get_bool('pid', 'get') and isset($plans[$nv_Request->get_int('pid', 'get')])) {
        $pid = $nv_Request->get_int('pid', 'get');
    }

    if ($nv_Request->get_bool('clid', 'get') and isset($clients[$nv_Request->get_int('clid', 'get')])) {
        $clid = $nv_Request->get_int('clid', 'get');
    }
}

$contents['info'] = (! empty($error)) ? $error : $lang_module['add_banner_info'];
$contents['is_error'] = (! empty($error)) ? 1 : 0;
$contents['file_allowed_ext'] = implode(', ', $contents['file_allowed_ext']);
$contents['submit'] = $lang_module['add_banner'];
$contents['action'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=add_banner';
$contents['title'] = array( $lang_module['title'], 'title', $title, 255 );
$contents['plan'] = array( $lang_module['in_plan'], 'pid', $plans, $pid, $row, $require_image );
$contents['client'] = array( $lang_module['of_client'], 'clid', $clients, $clid );
$contents['upload'] = array( sprintf($lang_module['upload'], $contents['file_allowed_ext']), 'banner' );
$contents['file_alt'] = array( $lang_module['file_alt'], 'file_alt', $file_alt, 255 );
$contents['click_url'] = array( $lang_module['click_url'], 'click_url', $click_url, 255 );
$contents['target'] = array( $lang_module['target'], 'target', $targets, $target );
$contents['publ_date'] = array( $lang_module['publ_date'], 'publ_date', $publ_date, 10 );
$contents['exp_date'] = array( $lang_module['exp_date'], 'exp_date', $exp_date, 10 );
$contents['bannerhtml'] = htmlspecialchars(nv_editor_br2nl($bannerhtml));

if (defined('NV_EDITOR')) {
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}

if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $contents['bannerhtml'] = nv_aleditor('bannerhtml', '100%', '300px', $contents['bannerhtml']);
} else {
    $contents['bannerhtml'] = '<textarea style="width:100%;height:300px" name="bannerhtml">' . $contents['bannerhtml'] . '</textarea>';
}
$contents['bannerhtml'] = array($lang_module['bannerhtml'], $contents['bannerhtml']);

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme(nv_add_banner_theme($contents));
include NV_ROOTDIR . '/includes/footer.php';