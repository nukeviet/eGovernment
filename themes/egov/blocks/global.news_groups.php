<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 10 Dec 2011 06:46:54 GMT
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (! nv_function_exists('nv_block_news_egovgroups')) {
    /**
     * nv_block_config_news_egovgroups()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_news_egovgroups($module, $data_block, $lang_block)
    {
        global $nv_Cache, $site_mods, $nv_Request;

        // Xuất nội dung khi có chọn module
        if ($nv_Request->isset_request('loadajaxdata', 'get')) {
            $module = $nv_Request->get_title('loadajaxdata', 'get', '');

            $html_input = '';
            $html = '';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['blockid'] . '</td>';
            $html .= '<td><select name="config_blockid" class="form-control w200">';
            $html .= '<option value="0"> -- </option>';
            $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_block_cat ORDER BY weight ASC';
            $list = $nv_Cache->db($sql, '', $module);
            foreach ($list as $l) {
                $html_input .= '<input type="hidden" id="config_blockid_' . $l['bid'] . '" value="' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $site_mods[$module]['alias']['groups'] . '/' . $l['alias'] . '" />';
                $html .= '<option value="' . $l['bid'] . '" ' . (($data_block['blockid'] == $l['bid']) ? ' selected="selected"' : '') . '>' . $l['title'] . '</option>';
            }
            $html .= '</select>';
            $html .= $html_input;
            $html .= '<script type="text/javascript">';
            $html .= '	$("select[name=config_blockid]").change(function() {';
            $html .= '		$("input[name=title]").val($("select[name=config_blockid] option:selected").text());';
            $html .= '		$("input[name=link]").val($("#config_blockid_" + $("select[name=config_blockid]").val()).val());';
            $html .= '	});';
            $html .= '</script>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['title_length'] . '</td>';
            $html .= '<td><input type="text" class="form-control w200" name="config_title_length" size="5" value="' . $data_block['title_length'] . '"/></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['numrow'] . '</td>';
            $html .= '<td><input type="text" class="form-control w200" name="config_numrow" size="5" value="' . $data_block['numrow'] . '"/></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['showtooltip'] . '</td>';
            $html .= '<td>';
            $html .= '<input type="checkbox" value="1" name="config_showtooltip" ' . ($data_block['showtooltip'] == 1 ? 'checked="checked"' : '') . ' /><br /><br />';
            $tooltip_position = array( 'top' => $lang_block['tooltip_position_top'], 'bottom' => $lang_block['tooltip_position_bottom'], 'left' => $lang_block['tooltip_position_left'], 'right' => $lang_block['tooltip_position_right'] );
            $html .= '<span class="text-middle pull-left">' . $lang_block['tooltip_position'] . '&nbsp;</span><select name="config_tooltip_position" class="form-control w100 pull-left">';
            foreach ($tooltip_position as $key => $value) {
                $html .= '<option value="' . $key . '" ' . ($data_block['tooltip_position'] == $key ? 'selected="selected"' : '') . '>' . $value . '</option>';
            }
            $html .= '</select>';
            $html .= '&nbsp;<span class="text-middle pull-left">' . $lang_block['tooltip_length'] . '&nbsp;</span><input type="text" class="form-control w100 pull-left" name="config_tooltip_length" size="5" value="' . $data_block['tooltip_length'] . '"/>';
            $html .= '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td>' . $lang_block['show_type'] . '</td>';
            $html .= '<td><select name="config_show_type" class="form-control w200">';

            for ($i = 0; $i <= 1; $i++) {
                $html .= '<option value="' . $i . '"' . ($i == $data_block['show_type'] ? ' selected="selected"' : '') . '>' . $lang_block['show_type' . $i] . '</option>';
            }

            $html .= '</select></td>';
            $html .= '</tr>';

            nv_htmlOutput($html);
        }

        $html = '';
        $html .= '<tr>';
        $html .= '<td>' . $lang_block['selectmod'] . '</td>';
        $html .= '<td>';
        $html .= '<select name="config_selectmod" class="form-control w300">';
        $html .= '<option value="">--</option>';

        foreach ($site_mods as $title => $mod) {
            if ($mod['module_file'] == 'news') {
                $html .= '<option value="' . $title . '"' . ($title == $data_block['selectmod'] ? ' selected="selected"' : '') . '>' . $mod['custom_title'] . '</option>';
            }
        }

        $html .= '</select>';

        $html .= '
        <script type="text/javascript">
        $(\'[name="config_selectmod"]\').change(function() {
            var mod = $(this).val();
            var file_name = $("select[name=file_name]").val();
            var module_type = $("select[name=module_type]").val();
            var blok_file_name = "";
            if (file_name != "") {
                var arr_file = file_name.split("|");
                if (parseInt(arr_file[1]) == 1) {
                    blok_file_name = arr_file[0];
                }
            }
            if (mod != "") {
                $.get(script_name + "?" + nv_name_variable + "=" + nv_module_name + \'&\' + nv_lang_variable + "=" + nv_lang_data + "&" + nv_fc_variable + "=block_config&bid=" + bid + "&module=" + module_type + "&selectthemes=" + selectthemes + "&file_name=" + blok_file_name + "&loadajaxdata=" + mod + "&nocache=" + new Date().getTime(), function(theResponse) {
        			$("#block_config").append(theResponse);
        		});
            }
        });
        $(function() {
            $(\'[name="config_selectmod"]\').change();
        });
        </script>
        ';

        $html .= '</td>';
        $html .= '</tr>';

        return $html;
    }

    /**
     * nv_block_config_news_egovgroups_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_news_egovgroups_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['selectmod'] = $nv_Request->get_title('config_selectmod', 'post', '');
        $return['config']['blockid'] = $nv_Request->get_int('config_blockid', 'post', 0);
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 0);
        $return['config']['title_length'] = $nv_Request->get_int('config_title_length', 'post', 20);
        $return['config']['showtooltip'] = $nv_Request->get_int('config_showtooltip', 'post', 0);
        $return['config']['tooltip_position'] = $nv_Request->get_string('config_tooltip_position', 'post', 0);
        $return['config']['tooltip_length'] = $nv_Request->get_string('config_tooltip_length', 'post', 0);
        $return['config']['show_type'] = $nv_Request->get_int('config_show_type', 'post', 0);
        return $return;
    }

    /**
     * nv_block_news_egovgroups()
     *
     * @param mixed $block_config
     * @return
     */
    function nv_block_news_egovgroups($block_config)
    {
        global $site_mods;

        $block_config['module'] = $block_config['selectmod'];
        $module = $block_config['module'];

        if (isset($site_mods[$module])) {
            global $global_array_cat, $module_name, $db, $global_config, $nv_Cache, $module_config;

            $module_array_cat = array();
            $module_data = $site_mods[$module]['module_data'];
            $module_upload = $site_mods[$module]['module_upload'];
            $show_no_image = $module_config[$module]['show_no_image'];
            $blockwidth = $module_config[$module]['blockwidth'];

            // Xác định danh sách chuyên mục
            if ($module_name == $module) {
                $module_array_cat = $global_array_cat;
            } else {
                $sql = 'SELECT catid, parentid, title, alias, viewcat, subcatid, numlinks, description, status, keywords, groups_view FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cat WHERE status=1 OR status=2 ORDER BY sort ASC';
                $list = $nv_Cache->db($sql, 'catid', $module);
                if (!empty($list)) {
                    foreach ($list as $l) {
                        $module_array_cat[$l['catid']] = $l;
                        $module_array_cat[$l['catid']]['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $l['alias'];
                    }
                }
            }

            $db->sqlreset()
                ->select('t1.id, t1.catid, t1.title, t1.alias, t1.homeimgfile, t1.homeimgthumb,t1.hometext,t1.publtime,t1.external_link')
                ->from(NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_rows t1')
                ->join('INNER JOIN ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_block t2 ON t1.id = t2.id')
                ->where('t2.bid= ' . $block_config['blockid'] . ' AND t1.status= 1')
                ->order('t2.weight ASC')
                ->limit($block_config['numrow']);

            $list = $nv_Cache->db($db->sql(), '', $module);

            if (!empty($list)) {
                if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.news_groups.tpl')) {
                    $block_theme = $global_config['module_theme'];
                } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.news_groups.tpl')) {
                    $block_theme = $global_config['site_theme'];
                } else {
                    $block_theme = 'default';
                }

                include NV_ROOTDIR . '/themes/' . $block_theme . '/language/' . NV_LANG_INTERFACE . '.php';

                $xtpl = new XTemplate('global.news_groups.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
                $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
                $xtpl->assign('TEMPLATE', $block_theme);
                $xtpl->assign('LANG', $lang_module);

                foreach ($list as $l) {
                    $l['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $module_array_cat[$l['catid']]['alias'] . '/' . $l['alias'] . '-' . $l['id'] . $global_config['rewrite_exturl'];
                    if ($l['homeimgthumb'] == 1) {
                        $l['thumb'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $l['homeimgfile'];
                    } elseif ($l['homeimgthumb'] == 2) {
                        $l['thumb'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $l['homeimgfile'];
                    } elseif ($l['homeimgthumb'] == 3) {
                        $l['thumb'] = $l['homeimgfile'];
                    } elseif (! empty($show_no_image)) {
                        $l['thumb'] = NV_BASE_SITEURL . $show_no_image;
                    } else {
                        $l['thumb'] = '';
                    }

                    $l['blockwidth'] = $blockwidth;

                    $l['hometext_clean'] = strip_tags($l['hometext']);
                    $l['hometext_clean'] = nv_clean60($l['hometext_clean'], $block_config['tooltip_length'], true);

                    if (! $block_config['showtooltip']) {
                        $xtpl->assign('TITLE', 'title="' . $l['title'] . '"');
                    }

                    $l['title_clean'] = nv_clean60($l['title'], $block_config['title_length']);

                    if ($l['external_link']) {
                        $l['target_blank'] = 'target="_blank"';
                    }

                    $xtpl->assign('ROW', $l);

                    if (! empty($l['thumb'])) {
                        $xtpl->parse('main.type' . $block_config['show_type'] . '.loop.img');
                    }

                    $xtpl->parse('main.type' . $block_config['show_type'] . '.loop');
                }

                $xtpl->parse('main.type' . $block_config['show_type']);

                if ($block_config['showtooltip']) {
                    $xtpl->assign('TOOLTIP_POSITION', $block_config['tooltip_position']);
                    $xtpl->parse('main.tooltip');
                }

                $xtpl->parse('main');
                return $xtpl->text('main');
            }
        }
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_block_news_egovgroups($block_config);
}