<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @copyright 2009
 * @License GNU/GPL version 2 or any later version
 * @Createdate 12/31/2009 0:51
 */
if (!defined('NV_IS_MOD_FAQ')) {
    die('Stop!!!');
}

/**
 * theme_main_faq()
 * 
 * @param mixed $list_cats
 * @return
 */
function theme_main_faq($list_cats)
{
    global $global_config, $lang_module, $lang_global, $module_info, $module_name;
    
    $xtpl = new XTemplate("main_page.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('WELCOME', $lang_module['faq_welcome']);
    $xtpl->parse('main.welcome');
    
    foreach ($list_cats as $cat) {
        if (!$cat['parentid']) {
            $cat['link'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $cat['alias'];
            $cat['name'] = "<a href=\"" . $cat['link'] . "\">" . $cat['title'] . "</a>";
            $xtpl->assign('SUBCAT', $cat);
            if (!empty($cat['description'])) {
                $xtpl->parse('main.subcats.li.description');
            }
            $xtpl->parse('main.subcats.li');
        }
    }
    $xtpl->parse('main.subcats');
    
    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * theme_cat_faq()
 * 
 * @param mixed $list_cats
 * @param mixed $catid
 * @param mixed $faq
 * @return
 */
function theme_cat_faq($list_cats, $catid, $faq)
{
    global $global_config, $lang_module, $lang_global, $module_info, $module_name;
    
    $xtpl = new XTemplate("main_page.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    
    if (!empty($list_cats[$catid]['description'])) {
        $xtpl->assign('WELCOME', $list_cats[$catid]['description']);
        $xtpl->parse('main.welcome');
    }
    
    if (!empty($list_cats[$catid]['subcats'])) {
        foreach ($list_cats[$catid]['subcats'] as $subcat) {
            $cat = $list_cats[$subcat];
            $cat['link'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $cat['alias'];
            $cat['name'] = "<a href=\"" . $cat['link'] . "\">" . $cat['title'] . "</a>";
            $xtpl->assign('SUBCAT', $cat);
            if (!empty($cat['description'])) {
                $xtpl->parse('main.subcats.li.description');
            }
            $xtpl->parse('main.subcats.li');
        }
        $xtpl->parse('main.subcats');
    }
    
    if (!empty($faq)) {
        foreach ($faq as $row) {
            $xtpl->assign('ROW', $row);
            $xtpl->parse('main.is_show_row.row');
        }
        
        $xtpl->assign('IMG_GO_TOP_SRC', NV_BASE_SITEURL . 'themes/' . $module_info['template'] . '/images/' . $module_info['module_theme'] . '/');
        
        foreach ($faq as $row) {
            $xtpl->assign('ROW', $row);
            $xtpl->parse('main.is_show_row.detail');
        }
        
        $xtpl->parse('main.is_show_row');
    }
    
    $xtpl->parse('main');
    return $xtpl->text('main');
}
