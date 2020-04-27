<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 12/31/2009 0:51
 */

if (! defined('NV_IS_MOD_NEWS')) {
    die('Stop!!!');
}

/**
 * viewcat_grid_new()
 *
 * @param mixed $array_catpage
 * @param mixed $catid
 * @param mixed $generate_page
 * @return
 */
function viewcat_grid_new($array_catpage, $catid, $generate_page)
{
    global $module_name, $lang_module, $module_upload, $module_config, $module_info, $global_array_cat, $global_array_cat, $catid, $page;
    $xtpl = new XTemplate('viewcat_grid.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('IMGWIDTH1', $module_config[$module_name]['homewidth']);
    if ($catid > 0 and (($global_array_cat[$catid]['viewdescription'] and $page == 1) or $global_array_cat[$catid]['viewdescription'] == 2)) {
        $xtpl->assign('CONTENT', $global_array_cat[$catid]);
        if ($global_array_cat[$catid]['image']) {
            $xtpl->assign('HOMEIMG1', NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $global_array_cat[$catid]['image']);
            $xtpl->parse('main.viewdescription.image');
        }
        $xtpl->parse('main.viewdescription');
    }

    if (! empty($catid)) {
        $xtpl->assign('CAT', $global_array_cat[$catid]);
        $xtpl->parse('main.cattitle');
    }

    $a = 0;
    foreach ($array_catpage as $array_row_i) {
        $newday = $array_row_i['publtime'] + (86400 * $array_row_i['newday']);
        $array_row_i['publtime'] = nv_date('d/m/Y h:i:s A', $array_row_i['publtime']);
        $xtpl->clear_autoreset();
        $xtpl->assign('CONTENT', $array_row_i);
        ++$a;
        if ($a == 1) {
            if (defined('NV_IS_MODADMIN')) {
                $xtpl->assign('ADMINLINK', nv_link_edit_page($array_row_i['id']) . " " . nv_link_delete_page($array_row_i['id']));
                $xtpl->parse('main.featuredloop.adminlink');
            }

            if ($array_row_i['imghome'] != '') {
                $xtpl->assign('HOMEIMG1', $array_row_i['imghome']);
                $xtpl->assign('HOMEIMGALT1', ! empty($array_row_i['homeimgalt']) ? $array_row_i['homeimgalt'] : $array_row_i['title']);
                $xtpl->parse('main.featuredloop.image');
            }

            if ($newday >= NV_CURRENTTIME) {
                $xtpl->parse('main.featuredloop.newday');
            }

            $xtpl->set_autoreset();
            $xtpl->parse('main.featuredloop');
        } else {
            if (defined('NV_IS_MODADMIN')) {
                $xtpl->assign('ADMINLINK', nv_link_edit_page($array_row_i['id']) . " " . nv_link_delete_page($array_row_i['id']));
                $xtpl->parse('main.viewcatloop.adminlink');
            }

            if ($array_row_i['imghome'] != '') {
                $xtpl->assign('HOMEIMG1', $array_row_i['imghome']);
                $xtpl->assign('HOMEIMGALT1', ! empty($array_row_i['homeimgalt']) ? $array_row_i['homeimgalt'] : $array_row_i['title']);
                $xtpl->parse('main.viewcatloop.image');
            }

            if ($newday >= NV_CURRENTTIME) {
                $xtpl->parse('main.viewcatloop.newday');
            }

            $xtpl->set_autoreset();
            $xtpl->parse('main.viewcatloop');
        }
    }

    if (! empty($generate_page)) {
        $xtpl->assign('GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * viewcat_list_new()
 *
 * @param mixed $array_catpage
 * @param mixed $catid
 * @param mixed $page
 * @param mixed $generate_page
 * @return
 */
function viewcat_list_new($array_catpage, $catid, $page, $generate_page)
{
    global $module_name, $lang_module, $module_upload, $module_config, $module_info, $global_array_cat;

    $xtpl = new XTemplate('viewcat_list.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('IMGWIDTH1', $module_config[$module_name]['homewidth']);

    if ($catid > 0 and (($global_array_cat[$catid]['viewdescription'] and $page == 0) or $global_array_cat[$catid]['viewdescription'] == 2)) {
        $xtpl->assign('CONTENT', $global_array_cat[$catid]);
        if ($global_array_cat[$catid]['image']) {
            $xtpl->assign('HOMEIMG1', NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $global_array_cat[$catid]['image']);
            $xtpl->parse('main.viewdescription.image');
        }
        $xtpl->parse('main.viewdescription');
    }

    $a = $page;
    foreach ($array_catpage as $array_row_i) {
        $newday = $array_row_i['publtime'] + (86400 * $array_row_i['newday']);
        $array_row_i['publtime'] = nv_date('d/m/Y h:i:s A', $array_row_i['publtime']);
        $xtpl->clear_autoreset();
        $xtpl->assign('NUMBER', ++$a);
        $xtpl->assign('CONTENT', $array_row_i);

        if (defined('NV_IS_MODADMIN')) {
            $xtpl->assign('ADMINLINK', nv_link_edit_page($array_row_i['id']) . " " . nv_link_delete_page($array_row_i['id']));
            $xtpl->parse('main.viewcatloop.adminlink');
        }

        if ($array_row_i['imghome'] != '') {
            $xtpl->assign('HOMEIMG1', $array_row_i['imghome']);
            $xtpl->assign('HOMEIMGALT1', ! empty($array_row_i['homeimgalt']) ? $array_row_i['homeimgalt'] : $array_row_i['title']);
            $xtpl->parse('main.viewcatloop.image');
        }

        if ($newday >= NV_CURRENTTIME) {
            $xtpl->parse('main.viewcatloop.newday');
        }

        $xtpl->set_autoreset();
        $xtpl->parse('main.viewcatloop');
    }
    if (! empty($generate_page)) {
        $xtpl->assign('GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * viewcat_page_new()
 *
 * @param mixed $array_catpage
 * @param mixed $array_cat_other
 * @param mixed $generate_page
 * @return
 */
function viewcat_page_new($array_catpage, $array_cat_other, $generate_page)
{
    global $global_array_cat, $module_upload, $lang_module, $module_config, $module_info, $global_array_cat, $catid, $page;

    $xtpl = new XTemplate('viewcat_page.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    if ($catid > 0 and (($global_array_cat[$catid]['viewdescription'] and $page == 1) or $global_array_cat[$catid]['viewdescription'] == 2)) {
        $xtpl->assign('CONTENT', $global_array_cat[$catid]);
        if ($global_array_cat[$catid]['image']) {
            $xtpl->assign('HOMEIMG1', NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $global_array_cat[$catid]['image']);
            $xtpl->parse('main.viewdescription.image');
        }
        $xtpl->parse('main.viewdescription');
    }
    $a = 0;
    foreach ($array_catpage as $array_row_i) {
        $newday = $array_row_i['publtime'] + (86400 * $array_row_i['newday']);
        $array_row_i['publtime'] = nv_date('d/m/Y', $array_row_i['publtime']);
        $array_row_i['listcatid'] = explode(',', $array_row_i['listcatid']);
        $array_row_i['hometext'] = nv_clean60(strip_tags($array_row_i['hometext']), 120);
        $num_cat = sizeof($array_row_i['listcatid']);

        $n = 1;
        foreach ($array_row_i['listcatid'] as $listcatid) {
            $listcat = array(
                'title' => $global_array_cat[$listcatid]['title'],
                "link" => $global_array_cat[$listcatid]['link']
            );
            $xtpl->assign('CAT', $listcat);
            (($n < $num_cat) ? $xtpl->parse('main.viewcatloop.cat.comma') : '');
            $xtpl->parse('main.viewcatloop.cat');
            ++$n;
        }
        if ($a == 0) {
            $xtpl->clear_autoreset();
            $xtpl->assign('CONTENT', $array_row_i);

            if (defined('NV_IS_MODADMIN')) {
                $xtpl->assign('ADMINLINK', nv_link_edit_page($array_row_i['id']) . " " . nv_link_delete_page($array_row_i['id']));
                $xtpl->parse('main.viewcatloop.featured.adminlink');
            }

            if ($array_row_i['imghome'] != '') {
                $xtpl->assign('HOMEIMG1', $array_row_i['imghome']);
                $xtpl->assign('HOMEIMGALT1', ! empty($array_row_i['homeimgalt']) ? $array_row_i['homeimgalt'] : $array_row_i['title']);
                $xtpl->parse('main.viewcatloop.featured.image');
            }

            if ($newday >= NV_CURRENTTIME) {
                $xtpl->parse('main.viewcatloop.featured.newday');
            }

            $xtpl->parse('main.viewcatloop.featured');
        } else {
            $xtpl->clear_autoreset();
            $xtpl->assign('CONTENT', $array_row_i);

            if (defined('NV_IS_MODADMIN')) {
                $xtpl->assign('ADMINLINK', nv_link_edit_page($array_row_i['id']) . " " . nv_link_delete_page($array_row_i['id']));
                $xtpl->parse('main.viewcatloop.news.adminlink');
            }

            if ($array_row_i['imghome'] != '') {
                $xtpl->assign('HOMEIMG1', $array_row_i['imghome']);
                $xtpl->assign('HOMEIMGALT1', ! empty($array_row_i['homeimgalt']) ? $array_row_i['homeimgalt'] : $array_row_i['title']);
                $xtpl->parse('main.viewcatloop.news.image');
            }

            if ($newday >= NV_CURRENTTIME) {
                $xtpl->parse('main.viewcatloop.news.newday');
            }

            $xtpl->set_autoreset();
            $xtpl->parse('main.viewcatloop.news');
        }
        ++$a;
    }
    $xtpl->parse('main.viewcatloop');
    if (! empty($array_cat_other)) {
        $xtpl->assign('ORTHERNEWS', $lang_module['other']);

        foreach ($array_cat_other as $array_row_i) {
            $newday = $array_row_i['publtime'] + (86400 * $array_row_i['newday']);
            $array_row_i['publtime'] = nv_date("d/m/Y", $array_row_i['publtime']);
            $xtpl->assign('RELATED', $array_row_i);
            if ($newday >= NV_CURRENTTIME) {
                $xtpl->parse('main.related.loop.newday');
            }
            $xtpl->parse('main.related.loop');
        }

        $xtpl->parse('main.related');
    }

    if (! empty($generate_page)) {
        $xtpl->assign('GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * viewcat_top()
 *
 * @param mixed $array_catcontent
 * @param mixed $generate_page
 * @return
 */
function viewcat_top($array_catcontent, $generate_page)
{
    global  $module_upload, $lang_module, $module_config, $module_info, $global_array_cat, $catid, $page;

    $xtpl = new XTemplate('viewcat_top.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);

    if ($catid > 0 and (($global_array_cat[$catid]['viewdescription'] and $page == 1) or $global_array_cat[$catid]['viewdescription'] == 2)) {
        $xtpl->assign('CONTENT', $global_array_cat[$catid]);
        if ($global_array_cat[$catid]['image']) {
            $xtpl->assign('HOMEIMG1', NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $global_array_cat[$catid]['image']);
            $xtpl->parse('main.viewdescription.image');
        }
        $xtpl->parse('main.viewdescription');
    }

    // Cac bai viet phan dau
    if (! empty($array_catcontent)) {
        $a = 0;
        foreach ($array_catcontent as $key => $array_catcontent_i) {
            $newday = $array_catcontent_i['publtime'] + (86400 * $array_catcontent_i['newday']);
            $array_catcontent_i['publtime'] = nv_date('d/m/Y', $array_catcontent_i['publtime']);
            $xtpl->assign('CONTENT', $array_catcontent_i);

            if ($a == 0) {
                if ($array_catcontent_i['imghome'] != '') {
                    $xtpl->assign('HOMEIMG0', $array_catcontent_i['imghome']);
                    $xtpl->assign('HOMEIMGALT0', $array_catcontent_i['homeimgalt']);
                    $xtpl->parse('main.catcontent.image');
                }

                if (defined('NV_IS_MODADMIN')) {
                    $xtpl->assign('ADMINLINK', nv_link_edit_page($array_catcontent_i['id']) . " " . nv_link_delete_page($array_catcontent_i['id']));
                    $xtpl->parse('main.catcontent.adminlink');
                }
                if ($newday >= NV_CURRENTTIME) {
                    $xtpl->parse('main.catcontent.newday');
                }
                $xtpl->parse('main.catcontent');
            } else {
                if ($newday >= NV_CURRENTTIME) {
                    $xtpl->parse('main.catcontentloop.newday');
                }
                $xtpl->parse('main.catcontentloop');
            }
            ++$a;
        }
    }
    // Het cac bai viet phan dau
    if (! empty($generate_page)) {
        $xtpl->assign('GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * viewsubcat_main()
 *
 * @param mixed $viewcat
 * @param mixed $array_cat
 * @return
 */
function viewsubcat_main($viewcat, $array_cat)
{
    global $module_name, $global_array_cat, $lang_module, $module_info;

    $xtpl = new XTemplate($viewcat . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);

    // Hien thi cac chu de con
    foreach ($array_cat as $key => $array_row_i) {
        if (isset($array_cat[$key]['content'])) {
            $array_row_i['rss'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $module_info['alias']['rss'] . "/" . $array_row_i['alias'];
            $xtpl->assign('CAT', $array_row_i);
            $catid = intval($array_row_i['catid']);

            if ($array_row_i['subcatid'] != '') {
                $_arr_subcat = explode(',', $array_row_i['subcatid']);
                foreach ($_arr_subcat as $catid_i) {
                    if ($global_array_cat[$catid_i]['status'] == 1) {
                        $xtpl->assign('SUBCAT', $global_array_cat[$catid_i]);
                        $xtpl->parse('main.listcat.subcat.loop');
                    }
                }
                $xtpl->parse('main.listcat.subcat');
            }

            $a = 0;
            foreach ($array_cat[$key]['content'] as $array_row_i) {
                $newday = $array_row_i['publtime'] + (86400 * $array_row_i['newday']);
                $array_row_i['publtime'] = nv_date('d/m/Y H:i', $array_row_i['publtime']);
                $array_row_i['hometext'] = nv_clean60(strip_tags($array_row_i['hometext']), 120);
                ++$a;

                if ($a == 1) {
                    if ($newday >= NV_CURRENTTIME) {
                        $xtpl->parse('main.listcat.newday');
                    }
                    $xtpl->assign('CONTENT', $array_row_i);

                    if ($array_row_i['imghome'] != "") {
                        $xtpl->assign('HOMEIMG', $array_row_i['imghome']);
                        $xtpl->assign('HOMEIMGALT', ! empty($array_row_i['homeimgalt']) ? $array_row_i['homeimgalt'] : $array_row_i['title']);
                        $xtpl->parse('main.listcat.image');
                    }

                    if (defined('NV_IS_MODADMIN')) {
                        $xtpl->assign('ADMINLINK', nv_link_edit_page($array_row_i['id']) . " " . nv_link_delete_page($array_row_i['id']));
                        $xtpl->parse('main.listcat.adminlink');
                    }
                } else {
                    if ($newday >= NV_CURRENTTIME) {
                        $xtpl->assign('CLASS', 'icon_new_small');
                    } else {
                        $xtpl->assign('CLASS', 'icon_list');
                    }
                    $xtpl->assign('OTHER', $array_row_i);
                    $xtpl->parse('main.listcat.related.loop');
                }

                if ($a > 1) {
                    $xtpl->assign('WCT', 'col-md-16 ');
                } else {
                    $xtpl->assign('WCT', '');
                }

                $xtpl->set_autoreset();
            }

            if ($a > 1) {
                $xtpl->parse('main.listcat.related');
            }

            $xtpl->parse('main.listcat');
        }
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * viewcat_two_column()
 *
 * @param mixed $array_content
 * @param mixed $array_catpage
 * @return
 */
function viewcat_two_column($array_content, $array_catpage)
{
    global $module_name, $module_upload, $module_upload, $module_config, $module_info, $lang_module, $global_array_cat, $catid, $page;

    $xtpl = new XTemplate('viewcat_two_column.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('IMGWIDTH0', $module_config[$module_name]['homewidth']);
    if ($catid >0 and (($global_array_cat[$catid]['viewdescription'] and $page == 1) or $global_array_cat[$catid]['viewdescription'] == 2)) {
        $xtpl->assign('CONTENT', $global_array_cat[$catid]);
        if ($global_array_cat[$catid]['image']) {
            $xtpl->assign('HOMEIMG1', NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $global_array_cat[$catid]['image']);
            $xtpl->parse('main.viewdescription.image');
        }
        $xtpl->parse('main.viewdescription');
    }
    //Bai viet o phan dau
    if (! empty($array_content)) {
        foreach ($array_content as $key => $array_content_i) {
            $newday = $array_content_i['publtime'] + (86400 * $array_content_i['newday']);
            $array_content_i['publtime'] = nv_date('d/m/Y h:i:s A', $array_content_i['publtime']);
            $xtpl->assign('NEWSTOP', $array_content_i);

            if ($key == 0) {
                if ($array_content_i['imghome'] != "") {
                    $xtpl->assign('HOMEIMG0', $array_content_i['imghome']);
                    $xtpl->assign('HOMEIMGALT0', $array_content_i['homeimgalt']);
                    $xtpl->parse('main.catcontent.content.image');
                }

                if (defined('NV_IS_MODADMIN')) {
                    $xtpl->assign('ADMINLINK', nv_link_edit_page($array_content_i['id']) . " " . nv_link_delete_page($array_content_i['id']));
                    $xtpl->parse('main.catcontent.content.adminlink');
                }

                if ($newday >= NV_CURRENTTIME) {
                    $xtpl->parse('main.catcontent.content.newday');
                }
                $xtpl->parse('main.catcontent.content');
            } else {
                if ($newday >= NV_CURRENTTIME) {
                    $xtpl->parse('main.catcontent.other.newday');
                }
                $xtpl->parse('main.catcontent.other');
            }
        }

        $xtpl->parse('main.catcontent');
    }

    //Theo chu de
    $a = 0;

    foreach ($array_catpage as $key => $array_catpage_i) {
        $number_content = isset($array_catpage[$key]['content']) ? sizeof($array_catpage[$key]['content']) : 0;

        if ($number_content > 0) {
            $array_catpage_i['rss'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $module_info['alias']['rss'] . "/" . $array_catpage_i['alias'];

            $xtpl->assign('CAT', $array_catpage_i);
            $xtpl->assign('ID', ($a + 1));

            $array_content_i = $array_catpage_i['content'][0];
            $newday = $array_content_i['publtime'] + (86400 * $array_content_i['newday']);
            $array_content_i['hometext'] = nv_clean60(strip_tags($array_content_i['hometext']), 200);
            $array_content_i['publtime'] = nv_date('d/m/Y h:i:s A', $array_content_i['publtime']);

            $xtpl->assign('CONTENT', $array_content_i);

            if ($array_content_i['imghome'] != '') {
                $xtpl->assign('HOMEIMG01', $array_content_i['imghome']);
                $xtpl->assign('HOMEIMGALT01', ! empty($array_content_i['homeimgalt']) ? $array_content_i['homeimgalt'] : $array_content_i['title']);
                $xtpl->parse('main.loopcat.content.image');
            }

            if (defined('NV_IS_MODADMIN')) {
                $xtpl->assign('ADMINLINK', nv_link_edit_page($array_content_i['id']) . " " . nv_link_delete_page($array_content_i['id']));
                $xtpl->parse('main.loopcat.content.adminlink');
            }

            if ($newday >= NV_CURRENTTIME) {
                $xtpl->parse('main.loopcat.content.newday');
            }

            $xtpl->parse('main.loopcat.content');

            if ($number_content > 1) {
                for ($index = 1; $index < $number_content; ++$index) {
                    if ($newday >= NV_CURRENTTIME) {
                        $xtpl->parse('main.loopcat.other.newday');
                        $xtpl->assign('CLASS', 'icon_new_small');
                    } else {
                        $xtpl->assign('CLASS', 'icon_list');
                    }

                    $xtpl->assign('CONTENT', $array_catpage_i['content'][$index]);
                    $xtpl->parse('main.loopcat.other');
                }
            }

            if ($a % 2) {
                $xtpl->parse('main.loopcat.clear');
            }

            $xtpl->parse('main.loopcat');
            ++$a;
        }
    }

    //Theo chu de
    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * detail_theme()
 *
 * @param mixed $news_contents
 * @param mixed $array_keyword
 * @param mixed $related_new_array
 * @param mixed $related_array
 * @param mixed $topic_array
 * @param mixed $content_comment
 * @return
 */
function detail_theme($news_contents, $array_keyword, $related_new_array, $related_array, $topic_array, $content_comment)
{
    global $global_config, $module_info, $lang_module, $module_name, $module_config, $lang_global, $admin_info, $client_info;

    $xtpl = new XTemplate('detail.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG_GLOBAL', $lang_global);
    $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
    $xtpl->assign('TEMPLATE', $global_config['module_theme']);
    $xtpl->assign('LANG', $lang_module);

    // Khai báo dữ liệu có cấu trúc
    $news_contents['number_edittime'] = (empty($news_contents['edittime']) or $news_contents['edittime'] < $news_contents['number_publtime']) ? $news_contents['number_publtime'] : $news_contents['edittime'];

    $xtpl->assign('SCHEMA_AUTHOR', empty($news_contents['author']) ? $news_contents['post_name'] : $news_contents['author']);
    $xtpl->assign('SCHEMA_DATEPUBLISHED', date('c', $news_contents['number_publtime']));
    $xtpl->assign('SCHEMA_DATEPUBLISHED', date('c', $news_contents['number_edittime']));
    $xtpl->assign('SCHEMA_ORGLOGO', NV_MAIN_DOMAIN . NV_BASE_SITEURL . $global_config['site_logo']);
    $xtpl->assign('SCHEMA_ORGNAME', $global_config['site_name']);
    $xtpl->assign('SCHEMA_URL', $news_contents['link']);

    if (preg_match('/^' . nv_preg_quote(NV_BASE_SITEURL) . '/i', $news_contents['homeimgfile'])) {
        $xtpl->assign('SCHEMA_IMAGE', NV_MAIN_DOMAIN . $news_contents['homeimgfile']);
    } elseif (nv_is_url($news_contents['homeimgfile'])) {
        $xtpl->assign('SCHEMA_IMAGE', $news_contents['homeimgfile']);
    } else {
        $xtpl->assign('SCHEMA_IMAGE', NV_BASE_SITEURL. 'themes/' . $module_info['template'] . '/images/no_image.gif');
    }

    $news_contents['addtime'] = nv_date('d/m/Y h:i:s', $news_contents['addtime']);

    $xtpl->assign('NEWSID', $news_contents['id']);
    $xtpl->assign('NEWSCHECKSS', $news_contents['newscheckss']);
    $xtpl->assign('DETAIL', $news_contents);
    $xtpl->assign('SELFURL', $client_info['selfurl']);

    if ($news_contents['allowed_send'] == 1) {
        $xtpl->assign('URL_SENDMAIL', $news_contents['url_sendmail']);
        $xtpl->parse('main.allowed_send');
    }

    if ($news_contents['allowed_print'] == 1) {
        $xtpl->assign('URL_PRINT', $news_contents['url_print']);
        $xtpl->parse('main.allowed_print');
    }

    if ($news_contents['allowed_save'] == 1) {
        $xtpl->assign('URL_SAVEFILE', $news_contents['url_savefile']);
        $xtpl->parse('main.allowed_save');
    }

    if ($news_contents['allowed_rating'] == 1) {
        $xtpl->assign('LANGSTAR', $news_contents['langstar']);
        $xtpl->assign('STRINGRATING', $news_contents['stringrating']);
        $xtpl->assign('NUMBERRATING', $news_contents['numberrating']);

        if ($news_contents['disablerating'] == 1) {
            $xtpl->parse('main.allowed_rating.disablerating');
        }

        if ($news_contents['numberrating'] >= $module_config[$module_name]['allowed_rating_point']) {
            $xtpl->parse('main.allowed_rating.data_rating');
        }

        $xtpl->parse('main.allowed_rating');
    }

    if ($news_contents['showhometext']) {
        if (! empty($news_contents['image']['src'])) {
            if ($news_contents['image']['position'] == 1) {
                $xtpl->parse('main.showhometext.imgthumb');
            } elseif ($news_contents['image']['position'] == 2) {
                $xtpl->parse('main.showhometext.imgfull');
            }
        }

        $xtpl->parse('main.showhometext');
    }

    if (!empty($news_contents['files'])) {
        foreach ($news_contents['files'] as $file) {
            $xtpl->assign('FILE', $file);

            if ($file['ext'] == 'pdf') {
                $xtpl->parse('main.files.loop.show_quick_viewpdf');
                $xtpl->parse('main.files.loop.content_quick_viewpdf');
            }elseif (preg_match('/^png|jpe|jpeg|jpg|gif|bmp|ico|tiff|tif|svg|svgz$/', $file['ext'])) {
                $xtpl->parse('main.files.loop.show_quick_viewimg');
            }else{
                $xtpl->parse('main.files.loop.show_quick_viewpdf');
                $xtpl->parse('main.files.loop.content_quick_viewdoc');
            }
            $xtpl->parse('main.files.loop');
        }
        $xtpl->parse('main.files');
    }

    if (! empty($news_contents['post_name'])) {
        $xtpl->parse('main.post_name');
    }

    if (! empty($news_contents['author']) or ! empty($news_contents['source'])) {
        if (! empty($news_contents['author'])) {
            $xtpl->parse('main.author.name');
        }

        if (! empty($news_contents['source'])) {
            $xtpl->parse('main.author.source');
        }

        $xtpl->parse('main.author');
    }
    if ($news_contents['copyright'] == 1) {
        if (! empty($module_config[$module_name]['copyright'])) {
            $xtpl->assign('COPYRIGHT', $module_config[$module_name]['copyright']);
            $xtpl->parse('main.copyright');
        }
    }

    if (! empty($array_keyword)) {
        $t = sizeof($array_keyword) - 1;
        foreach ($array_keyword as $i => $value) {
            $xtpl->assign('KEYWORD', $value['keyword']);
            $xtpl->assign('LINK_KEYWORDS', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=tag/' . urlencode($value['alias']));
            $xtpl->assign('SLASH', ($t == $i) ? '' : ', ');
            $xtpl->parse('main.keywords.loop');
        }
        $xtpl->parse('main.keywords');
    }

    if (defined('NV_IS_MODADMIN')) {
        $xtpl->assign('ADMINLINK', nv_link_edit_page($news_contents['id']) . ' ' . nv_link_delete_page($news_contents['id'], 1));
        $xtpl->parse('main.adminlink');
    }

    if ($module_config[$module_name]['socialbutton']) {
        global $meta_property;

        if (! empty($module_config[$module_name]['facebookappid'])) {
            $meta_property['fb:app_id'] = $module_config[$module_name]['facebookappid'];
            $meta_property['og:locale'] = (NV_LANG_DATA == 'vi') ? 'vi_VN' : 'en_US';
        }

        $xtpl->parse('main.socialbutton');
    }

    if (! empty($related_new_array)) {
        foreach ($related_new_array as $key => $related_new_array_i) {
            $newday = $related_new_array_i['time'] + (86400 * $related_new_array_i['newday']);
            if ($newday >= NV_CURRENTTIME) {
                $xtpl->parse('main.related_new.loop.newday');
            }
            $related_new_array_i['time'] = nv_date('d/m/Y', $related_new_array_i['time']);
            $xtpl->assign('RELATED_NEW', $related_new_array_i);
            $xtpl->parse('main.related_new.loop');
        }
        unset($key);
        $xtpl->parse('main.related_new');
    }

    if (! empty($related_array)) {
        foreach ($related_array as $related_array_i) {
            $newday = $related_array_i['time'] + (86400 * $related_array_i['newday']);
            if ($newday >= NV_CURRENTTIME) {
                $xtpl->parse('main.related.loop.newday');
            }
            $related_array_i['time'] = nv_date('d/m/Y', $related_array_i['time']);
            $xtpl->assign('RELATED', $related_array_i);
            $xtpl->parse('main.related.loop');
        }
        $xtpl->parse('main.related');
    }

    if (! empty($topic_array)) {
        foreach ($topic_array as $key => $topic_array_i) {
            $newday = $topic_array_i['time'] + (86400 * $topic_array_i['newday']);
            if ($newday >= NV_CURRENTTIME) {
                $xtpl->parse('main.topic.loop.newday');
            }
            $topic_array_i['time'] = nv_date('d/m/Y', $topic_array_i['time']);
            $xtpl->assign('TOPIC', $topic_array_i);
            $xtpl->parse('main.topic.loop');
        }
        $xtpl->parse('main.topic');
    }

    if (!empty($content_comment)) {
        $xtpl->assign('CONTENT_COMMENT', $content_comment);
        $xtpl->parse('main.comment');
    }

    if ($news_contents['status'] != 1) {
        $xtpl->parse('main.no_public');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * no_permission()
 *
 * @return
 */
function no_permission()
{
    global $module_info, $lang_module;

    $xtpl = new XTemplate('detail.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);

    $xtpl->assign('NO_PERMISSION', $lang_module['no_permission']);
    $xtpl->parse('no_permission');
    return $xtpl->text('no_permission');
}

/**
 * topic_theme()
 *
 * @param mixed $topic_array
 * @param mixed $topic_other_array
 * @param mixed $generate_page
 * @param mixed $page_title
 * @param mixed $description
 * @param mixed $topic_image
 * @return
 */
function topic_theme($topic_array, $topic_other_array, $generate_page, $page_title, $description, $topic_image)
{
    global $lang_module, $module_info, $module_name, $module_config, $topicid;

    $xtpl = new XTemplate('topic.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('TOPPIC_TITLE', $page_title);
    $xtpl->assign('IMGWIDTH1', $module_config[$module_name]['homewidth']);
    if (! empty($description)) {
        $xtpl->assign('TOPPIC_DESCRIPTION', $description);
        if (!empty($topic_image)) {
            $xtpl->assign('HOMEIMG1', $topic_image);
            $xtpl->parse('main.topicdescription.image');
        }
        $xtpl->parse('main.topicdescription');
    }
    if (! empty($topic_array)) {
        foreach ($topic_array as $topic_array_i) {
            $xtpl->assign('TOPIC', $topic_array_i);
            $xtpl->assign('TIME', date('H:i', $topic_array_i['publtime']));
            $xtpl->assign('DATE', date('d/m/Y', $topic_array_i['publtime']));

            if (! empty($topic_array_i['src'])) {
                $xtpl->parse('main.topic.homethumb');
            }

            if ($topicid and defined('NV_IS_MODADMIN')) {
                $xtpl->assign('ADMINLINK', nv_link_edit_page($topic_array_i['id']) . ' ' . nv_link_delete_page($topic_array_i['id']));
                $xtpl->parse('main.topic.adminlink');
            }

            $xtpl->parse('main.topic');
        }
    }

    if (! empty($topic_other_array)) {
        foreach ($topic_other_array as $topic_other_array_i) {
            $topic_other_array_i['publtime'] = nv_date('H:i d/m/Y', $topic_other_array_i['publtime']);

            $xtpl->assign('TOPIC_OTHER', $topic_other_array_i);
            $xtpl->parse('main.other.loop');
        }

        $xtpl->parse('main.other');
    }

    if (! empty($generate_page)) {
        $xtpl->assign('GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * sendmail_themme()
 *
 * @param mixed $sendmail
 * @return
 */
function sendmail_themme($sendmail)
{
    global $module_info, $global_config, $lang_module, $lang_global;

    $xtpl = new XTemplate('sendmail.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('SENDMAIL', $sendmail);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);

    if ($global_config['gfx_chk'] > 0) {
        if ($global_config['captcha_type'] == 2) {
            $xtpl->assign('RECAPTCHA_ELEMENT', 'recaptcha' . nv_genpass(8));
            $xtpl->assign('N_CAPTCHA', $lang_global['securitycode1']);
            $xtpl->parse('main.content.recaptcha');
        } else {
            $xtpl->assign('GFX_NUM', NV_GFX_NUM);
            $xtpl->assign('CAPTCHA_REFRESH', $lang_global['captcharefresh']);
            $xtpl->assign('CAPTCHA_REFR_SRC', NV_BASE_SITEURL . NV_ASSETS_DIR . '/images/refresh.png');
            $xtpl->assign('N_CAPTCHA', $lang_global['securitycode']);
            $xtpl->assign('GFX_WIDTH', NV_GFX_WIDTH);
            $xtpl->assign('GFX_HEIGHT', NV_GFX_HEIGHT);
            $xtpl->parse('main.content.captcha');
        }
    }

    $xtpl->parse('main.content');

    if (! empty($sendmail['result'])) {
        $xtpl->assign('RESULT', $sendmail['result']);
        $xtpl->parse('main.result');

        if ($sendmail['result']['check'] == true) {
            $xtpl->parse('main.close');
        }
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * news_print()
 *
 * @param mixed $result
 * @return
 */
function news_print($result)
{
    global $module_info, $lang_module;

    $xtpl = new XTemplate('print.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('CONTENT', $result);
    $xtpl->assign('LANG', $lang_module);

    if (! empty($result['image']['width'])) {
        if ($result['image']['position'] == 1) {
            if (! empty($result['image']['note'])) {
                $xtpl->parse('main.image.note');
            }

            $xtpl->parse('main.image');
        } elseif ($result['image']['position'] == 2) {
            if ($result['image']['note'] > 0) {
                $xtpl->parse('main.imagefull.note');
            }

            $xtpl->parse('main.imagefull');
        }
    }

    if ($result['copyright'] == 1) {
        $xtpl->parse('main.copyright');
    }

    if (! empty($result['author']) or ! empty($result['source'])) {
        if (! empty($result['author'])) {
            $xtpl->parse('main.author.name');
        }

        if (! empty($result['source'])) {
            $xtpl->parse('main.author.source');
        }

        $xtpl->parse('main.author');
    }

    if ($result['status'] != 1) {
        $xtpl->parse('main.no_public');
    }
    $xtpl->parse('main');
    return $xtpl->text('main');
}

// Search
/**
 * search_theme()
 *
 * @param mixed $key
 * @param mixed $check_num
 * @param mixed $date_array
 * @param mixed $array_cat_search
 * @return
 */
function search_theme($key, $check_num, $date_array, $array_cat_search)
{
    global $module_name, $module_info, $lang_module, $module_name;

    $xtpl = new XTemplate('search.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
    $xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
    $xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('BASE_URL_SITE', NV_BASE_SITEURL . 'index.php');
    $xtpl->assign('TO_DATE', $date_array['to_date']);
    $xtpl->assign('FROM_DATE', $date_array['from_date']);
    $xtpl->assign('KEY', $key);
    $xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
    $xtpl->assign('OP_NAME', 'search');

    foreach ($array_cat_search as $search_cat) {
        $xtpl->assign('SEARCH_CAT', $search_cat);
        $xtpl->parse('main.search_cat');
    }

    for ($i = 0; $i <= 3; ++$i) {
        if ($check_num == $i) {
            $xtpl->assign('CHECK' . $i, 'selected=\'selected\'');
        } else {
            $xtpl->assign('CHECK' . $i, '');
        }
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * search_result_theme()
 *
 * @param mixed $key
 * @param mixed $numRecord
 * @param mixed $per_pages
 * @param mixed $page
 * @param mixed $array_content
 * @param mixed $catid
 * @return
 */
function search_result_theme($key, $numRecord, $per_pages, $page, $array_content, $catid)
{
    global $module_info, $lang_module, $module_name, $global_array_cat, $module_config, $global_config;

    $xtpl = new XTemplate('search.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('KEY', $key);
    $xtpl->assign('IMG_WIDTH', $module_config[$module_name]['homewidth']);
    $xtpl->assign('TITLE_MOD', $lang_module['search_modul_title']);

    if (! empty($array_content)) {
        foreach ($array_content as $value) {
            $catid_i = $value['catid'];

            $xtpl->assign('LINK', $global_array_cat[$catid_i]['link'] . '/' . $value['alias'] . "-" . $value['id'] . $global_config['rewrite_exturl']);
            $xtpl->assign('TITLEROW', strip_tags(BoldKeywordInStr($value['title'], $key)));
            $xtpl->assign('CONTENT', BoldKeywordInStr(strip_tags($value['hometext']), $key) . "...");
            $xtpl->assign('TIME', date('d/m/Y h:i:s A', $value['publtime']));
            $xtpl->assign('AUTHOR', BoldKeywordInStr($value['author'], $key));
            $xtpl->assign('SOURCE', BoldKeywordInStr(GetSourceNews($value['sourceid']), $key));

            if (! empty($value['homeimgfile'])) {
                $xtpl->assign('IMG_SRC', $value['homeimgfile']);
                $xtpl->parse('results.result.result_img');
            }

            $xtpl->parse('results.result');
        }
    }

    if ($numRecord == 0) {
        $xtpl->assign('KEY', $key);
        $xtpl->assign('INMOD', $lang_module['search_modul_title']);
        $xtpl->parse('results.noneresult');
    }

    if ($numRecord > $per_pages) {
        // show pages

        $url_link = $_SERVER['REQUEST_URI'];
        if (strpos($url_link, '&page=') > 0) {
            $url_link = substr($url_link, 0, strpos($url_link, '&page='));
        } elseif (strpos($url_link, '?page=') > 0) {
            $url_link = substr($url_link, 0, strpos($url_link, '?page='));
        }
        $_array_url = array( 'link' => $url_link, 'amp' => '&page=' );
        $generate_page = nv_generate_page($_array_url, $numRecord, $per_pages, $page);

        $xtpl->assign('VIEW_PAGES', $generate_page);
        $xtpl->parse('results.pages_result');
    }

    $xtpl->assign('NUMRECORD', $numRecord);
    $xtpl->assign('MY_DOMAIN', NV_MY_DOMAIN);

    $xtpl->parse('results');
    return $xtpl->text('results');
}

/**
 * nv_theme_viewpdf()
 *
 * @param mixed $file_url
 * @return
 */
function nv_theme_viewpdf($file_url)
{
    global $lang_module, $lang_global;
    $xtpl = new XTemplate('viewer.tpl', NV_ROOTDIR . '/' . NV_ASSETS_DIR . '/js/pdf.js');
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('PDF_JS_DIR', NV_BASE_SITEURL . NV_ASSETS_DIR . '/js/pdf.js/');
    $xtpl->assign('PDF_URL', $file_url);
    $xtpl->parse('main');
    return $xtpl->text('main');
}
