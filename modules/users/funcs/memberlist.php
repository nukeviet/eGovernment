<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2010 - 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT
 */

if (! defined('NV_IS_MOD_USER')) {
    die('Stop!!!');
}

$page_title = $module_info['funcs'][$op]['func_site_title'];
$key_words = $module_info['keywords'];
$mod_title = $lang_module['listusers'];

if (!nv_user_in_groups($global_config['whoviewuser'])) {
    header('Location: ' . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name));
    die();
}

// Them vao tieu de
$array_mod_title[] = array(
    'catid' => 0,
    'title' => $lang_module['listusers'],
    'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op
);

// Xem chi tiet thanh vien
if (isset($array_op[1]) and ! empty($array_op[1])) {
    $md5 = '';
    unset($matches);
    if (preg_match('/^(.*)\-([a-z0-9]{32})$/', $array_op[1], $matches)) {
        $md5 = $matches[2];
    }

    if (! empty($md5)) {
        $stmt = $db->prepare('SELECT * FROM ' . NV_MOD_TABLE . ' WHERE md5username = :md5' . (defined('NV_IS_ADMIN') ? '' : ' AND active=1'));
        $stmt->bindParam(':md5', $md5, PDO::PARAM_STR);
        $stmt->execute();
        $item = $stmt->fetch();

        if (! empty($item)) {
            if (change_alias($item['username']) != $matches[1]) {
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
            }

            // Them vao tieu de
            $array_mod_title[] = array(
                'catid' => 0,
                'title' => $item['username'],
                'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '/' . change_alias($item['username']) . '-' . $item['md5username']
            );

            $array_field_config = array();
            $result_field = $db->query('SELECT * FROM ' . NV_MOD_TABLE . '_field WHERE user_editable = 1 ORDER BY weight ASC');
            while ($row_field = $result_field->fetch()) {
                $language = unserialize($row_field['language']);
                $row_field['title'] = (isset($language[NV_LANG_DATA])) ? $language[NV_LANG_DATA][0] : $row['field'];
                $row_field['description'] = (isset($language[NV_LANG_DATA])) ? nv_htmlspecialchars($language[NV_LANG_DATA][1]) : '';

                if (! empty($row_field['field_choices'])) {
                    $row_field['field_choices'] = unserialize($row_field['field_choices']);
                } elseif (! empty($row_field['sql_choices'])) {
                    $row_field['sql_choices'] = explode('|', $row_field['sql_choices']);
                    $sql = 'SELECT ' . $row_field['sql_choices'][2] . ', ' . $row_field['sql_choices'][3] . ' FROM ' . $row_field['sql_choices'][1];
                    $result = $db->query($sql);

                    $weight = 0;
                    while (list($key, $val) = $result->fetch(3)) {
                        $row_field['field_choices'][$key] = $val;
                    }
                }
                $array_field_config[] = $row_field;
            }

            $sql = 'SELECT * FROM ' . NV_MOD_TABLE . '_info WHERE userid=' . $item['userid'];
            $result = $db->query($sql);
            $custom_fields = $result->fetch();

            // Kiểm tra quyền sửa, xóa user của admin
            $item['is_admin'] = false;
            $item['allow_edit'] = false;
            $item['allow_delete'] = false;

            if (defined('NV_IS_ADMIN') and ($global_config['idsite'] == 0 or $item['idsite'] == $global_config['idsite'])) {
                $access_admin = unserialize($global_users_config['access_admin']);

                $check_admin = $db->query('SELECT admin_id, lev FROM ' . NV_AUTHORS_GLOBALTABLE . ' WHERE admin_id=' . $item['userid'])->fetch();

                if (isset($access_admin['access_editus'][$admin_info['level']]) and $access_admin['access_editus'][$admin_info['level']] == 1 and (empty($check_admin) or $admin_info['userid'] == $item['userid'] or defined('NV_IS_GODADMIN') or (defined('NV_IS_SPADMIN') and !($check_admin['lev'] == 1 or $check_admin['lev'] == 2)))) {
                    $item['is_admin'] = true;
                    $item['allow_edit'] = true;
                    $item['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=edit&amp;userid=' . $item['userid'];
                }
                if (isset($access_admin['access_delus'][$admin_info['level']]) and $access_admin['access_delus'][$admin_info['level']] == 1 and empty($check_admin)) {
                    $item['is_admin'] = true;
                    $item['allow_delete'] = true;
                    $item['link_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=del&amp;nocache=' . NV_CURRENTTIME;
                    $item['link_delete_callback'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name;
                }

                unset($access_admin, $check_admin);
            }

            $contents = nv_memberslist_detail_theme($item, $array_field_config, $custom_fields);
        } else {
            nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
        }
    }

    include NV_ROOTDIR . '/includes/header.php';
    echo nv_site_theme($contents);
    include NV_ROOTDIR . '/includes/footer.php';
} else {
    //danh sach thanh vien
    $orderby = $nv_Request->get_string('orderby', 'get', 'username');
    $sortby = $nv_Request->get_string('sortby', 'get', 'DESC');
    $page = $nv_Request->get_int('page', 'get', 1);

    // Kiem tra du lieu hop chuan
    if ((! empty($orderby) and ! in_array($orderby, array( 'username', 'gender', 'regdate' ))) or (! empty($sortby) and ! in_array($sortby, array( 'DESC', 'ASC' )))) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
    }

    $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&orderby=' . $orderby . '&sortby=' . $sortby;

    $per_page = 25;
    $array_order = array(
        'username' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&orderby=username&sortby=' . $sortby,
        'gender' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&orderby=gender&sortby=' . $sortby,
        'regdate' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&orderby=regdate&sortby=' . $sortby
    );

    foreach ($array_order as $key => $link) {
        if ($orderby == $key) {
            $sortby_new = ($sortby == 'DESC') ? 'ASC' : 'DESC';
            $array_order_new[$key] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&orderby=' . $key . '&sortby=' . $sortby_new;
        } else {
            $array_order_new[$key] = $link;
        }
    }

    $db->sqlreset()
        ->select('COUNT(*)')
        ->from(NV_MOD_TABLE)
        ->where((defined('NV_IS_ADMIN') ? '' : 'active=1'));

    $num_items = $db->query($db->sql())->fetchColumn();

    $db->select('userid, username, md5username, first_name, last_name, photo, gender, regdate')
        ->order($orderby . ' ' . $sortby)
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);

    $result = $db->query($db->sql());

    $users_array = array();

    while ($item = $result->fetch()) {
        $item['full_name'] = nv_show_name_user($item['first_name'], $item['last_name']);
        if (! empty($item['photo']) and file_exists(NV_ROOTDIR . '/' . $item['photo'])) {
            $item['photo'] = NV_BASE_SITEURL . $item['photo'];
        } else {
            $item['photo'] = NV_BASE_SITEURL . 'themes/' . $module_info['template'] . '/images/' . $module_file . '/no_avatar.png';
        }

        $item['regdate'] = nv_date('d/m/Y', $item['regdate']);
        $item['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=memberlist/' . change_alias($item['username']) . '-' . $item['md5username'];
        $item['gender'] = ($item['gender'] == 'M') ? $lang_module['male'] : ($item['gender'] == 'F' ? $lang_module['female'] : $lang_module['na']);

        $users_array[$item['userid']] = $item;
    }
    $result->closeCursor();

    // Khong cho dat trang tuy tien
    if (empty($users_array) and $page > 0) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
    }

    // Them vao tieu de trang
    if (! empty($orderby)) {
        $page_title .= ' ' . sprintf($lang_module['listusers_sort_by'], $lang_module['listusers_sort_by_' . $orderby], $lang_module['listusers_order_' . $sortby]);
    }

    // Tieu de khi phan trang
    if ($page > 1) {
        $page_title .= ' ' . NV_TITLEBAR_DEFIS . ' ' . sprintf($lang_module['page'], ceil($page / $per_page));
    }

    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);

    unset($result, $item);

    $contents = nv_memberslist_theme($users_array, $array_order_new, $generate_page);
}

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
