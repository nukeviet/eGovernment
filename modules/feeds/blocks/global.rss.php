<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Jan 10, 2011 6:04:54 PM
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!nv_function_exists('nv_block_data_config_rss')) {

    /**
     * nv_block_data_config_rss()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     *
     */
    function nv_block_data_config_rss($module, $data_block, $lang_block)
    {
        global $lang_module;

        $return = '';

        $html = "<input name=\"config_url\" type=\"text\" value=\"" . $data_block['url'] . "\" style=\"width:500px\"/>";
        $return .= '<tr><td>' . $lang_block['url'] . '</td><td>' . $html . '</td></tr>';

        $html = "<select name=\"config_number\">\n";
        for ($index = 1; $index <= 50; ++$index) {
            $sel = ($index == $data_block['number']) ? ' selected' : '';
            $html .= "<option value=\"" . $index . "\" " . $sel . ">" . $index . "</option>\n";
        }
        $html .= "</select>\n";
        $return .= '<tr><td>' . $lang_block['number'] . '</td><td>' . $html . '</td></tr>';

        $data_block['title_length'] = isset($data_block['title_length']) ? intval($data_block['title_length']) : 0;
        $html = "<select name=\"config_title_length\">\n";
        for ($index = 0; $index <= 255; ++$index) {
            $sel = ($index == $data_block['title_length']) ? ' selected' : '';
            $html .= "<option value=\"" . $index . "\" " . $sel . ">" . $index . "</option>\n";
        }
        $html .= "</select>\n";
        $return .= '<tr><td>' . $lang_block['title_length'] . '</td><td>' . $html . '</td></tr>';

        $sel = (intval($data_block['isdescription']) == 1) ? "checked=\"checked\"" : "";
        $html = "<input type=\"checkbox\" name=\"config_isdescription\" value=\"1\" " . $sel . " /> " . $lang_module['block_yes'] . "</td>\n";
        $return .= '<tr><td>' . $lang_block['isdescription'] . '</td><td>' . $html . '</td></tr>';

        $sel = (intval($data_block['ishtml']) == 1) ? "checked=\"checked\"" : "";
        $html = "<input type=\"checkbox\" name=\"config_ishtml\" value=\"1\" " . $sel . " /> " . $lang_module['block_yes'] . "</td>\n";
        $return .= '<tr><td>' . $lang_block['ishtml'] . '</td><td>' . $html . '</td></tr>';

        $sel = (intval($data_block['ispubdate']) == 1) ? "checked=\"checked\"" : "";
        $html = "<input type=\"checkbox\" name=\"config_ispubdate\" value=\"1\" " . $sel . " /> " . $lang_module['block_yes'] . "</td>\n";
        $return .= '<tr><td>' . $lang_block['ispubdate'] . '</td><td>' . $html . '</td></tr>';

        $sel = (intval($data_block['istarget']) == 1) ? "checked=\"checked\"" : "";
        $html = "<input type=\"checkbox\" name=\"config_istarget\" value=\"1\" " . $sel . " /> " . $lang_module['block_yes'] . "</td>\n";

        $return .= '<tr><td>' . $lang_block['istarget'] . '</td><td>' . $html . '</td></tr>';

        return $return;
    }

    /**
     * nv_block_data_config_rss_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     *
     */
    function nv_block_data_config_rss_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['url'] = $nv_Request->get_title('config_url', 'post', '', 0);
        $return['config']['number'] = $nv_Request->get_int('config_number', 'post', 0);
        $return['config']['isdescription'] = $nv_Request->get_int('config_isdescription', 'post', 0);
        $return['config']['ishtml'] = $nv_Request->get_int('config_ishtml', 'post', 0);
        $return['config']['ispubdate'] = $nv_Request->get_int('config_ispubdate', 'post', 0);
        $return['config']['istarget'] = $nv_Request->get_int('config_istarget', 'post', 0);
        $return['config']['title_length'] = $nv_Request->get_int('config_title_length', 'post', 0);
        if (!nv_is_url($return['config']['url'])) {
            $return['error'][] = $lang_block['error_url'];
        }
        return $return;
    }

    /**
     * nv_get_rss()
     *
     * @param mixed $url
     * @return
     *
     */
    function nv_get_rss($url)
    {
        global $global_config, $nv_Cache;
        $array_data = array();
        $cache_file = NV_LANG_DATA . '_' . md5($url) . '_' . NV_CACHE_PREFIX . '.cache';
        if (($cache = $nv_Cache->getItem('rss', $cache_file, 3600)) != false) {
            $array_data = unserialize($cache);
        } else {
            $getContent = new NukeViet\Client\UrlGetContents($global_config);
            $xml_source = $getContent->get($url);
            $allowed_html_tags = array_map('trim', explode(',', NV_ALLOWED_HTML_TAGS));
            $allowed_html_tags = '<' . implode('><', $allowed_html_tags) . '>';
            if ($xml = simplexml_load_string($xml_source)) {
                $a = 0;
                if (isset($xml->channel)) {
                    foreach ($xml->channel->item as $item) {
                        $array_data[$a]['title'] = strip_tags($item->title);
                        $array_data[$a]['description'] = strip_tags($item->description, $allowed_html_tags);
                        $array_data[$a]['link'] = strip_tags($item->link);
                        $array_data[$a]['pubDate'] = nv_date('l - d/m/Y H:i', strtotime($item->pubDate));
                        ++$a;
                    }
                } elseif (isset($xml->entry)) {
                    foreach ($xml->entry as $item) {
                        $urlAtt = $item->link->attributes();
                        $url = $urlAtt['href'];
                        $array_data[$a]['title'] = strip_tags($item->title);
                        $array_data[$a]['description'] = strip_tags($item->content, $allowed_html_tags);
                        $array_data[$a]['link'] = strip_tags($urlAtt['href']);
                        $array_data[$a]['pubDate'] = nv_date('l - d/m/Y H:i', strtotime($item->updated));
                        ++$a;
                    }
                }
            }
            $cache = serialize($array_data);
            $nv_Cache->setItem('rss', $cache_file, $cache);
        }
        return $array_data;
    }

    /**
     * nv_block_global_rss()
     *
     * @param mixed $block_config
     * @return
     *
     */
    function nv_block_global_rss($block_config)
    {
        global $global_config;

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/feeds/global.rss.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/feeds/global.rss.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        $a = 1;
        $xtpl = new XTemplate('global.rss.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/feeds');
        $array_rrs = nv_get_rss($block_config['url']);
        $title_length = isset($block_config['title_length']) ? intval($block_config['title_length']) : 0;
        foreach ($array_rrs as $item) {
            if ($a <= $block_config['number']) {
                $item['description'] = ($block_config['ishtml']) ? $item['description'] : strip_tags($item['description']);
                $item['target'] = ($block_config['istarget']) ? " onclick=\"this.target='_blank'\" " : "";
                $item['class'] = ($a % 2 == 0) ? 'second' : '';
                if ($title_length > 0) {
                    $item['text'] = nv_clean60($item['title'], $title_length);
                } else {
                    $item['text'] = $item['title'];
                }
                $xtpl->assign('DATA', $item);
                if ($block_config['isdescription']) {
                    $xtpl->parse('main.loop.description');
                }
                if ($block_config['ispubdate']) {
                    $xtpl->parse('main.loop.pubDate');
                }
                $xtpl->parse('main.loop');
                ++$a;
            } else {
                break;
            }
        }
        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_block_global_rss($block_config);
}