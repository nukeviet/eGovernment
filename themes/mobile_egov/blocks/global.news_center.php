<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/9/2010 23:25
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (! nv_function_exists('nv_block_news_center')) {
    /**
     * nv_block_config_news_center()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_news_center($module, $data_block, $lang_block)
    {
        global $nv_Cache, $site_mods, $nv_Request;

        // Xuất nội dung khi có chọn module
        if ($nv_Request->isset_request('loadajaxdata', 'get')) {
            $module = $nv_Request->get_title('loadajaxdata', 'get', '');

            $html = '<tr>';
            $html .= '	<td>' . $lang_block['numrow'] . '</td>';
            $html .= '	<td><input type="text" name="config_numrow" class="form-control w100 pull-left" size="5" value="' . $data_block['numrow'] . '"/>';
            $html .= '	<span class="text-middle pull-left">&nbsp; ' . $lang_block['width'] . '&nbsp; </span>';
            $html .= '	<input type="width" name="config_width" class="form-control w100 pull-left" value="' . $data_block['width'] . '"/>';
            $html .= '	<span class="text-middle pull-left">&nbsp; ' . $lang_block['height'] . '&nbsp; </span>';
            $html .= '	<input type="height" name="config_height" class="form-control w100 pull-left" value="' . $data_block['height'] . '"/>';
            $html .= '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '	<td>' . $lang_block['length_title'] . '</td>';
            $html .= '	<td>';
            $html .= '	<input type="text" class="form-control w100 pull-left" name="config_length_title" size="5" value="' . $data_block['length_title'] . '"/>';
            $html .= '	<span class="text-middle pull-left">&nbsp;' . $lang_block['length_hometext'] . '&nbsp;</span><input type="text" class="form-control w100 pull-left" name="config_length_hometext" size="5" value="' . $data_block['length_hometext'] . '"/>';
            $html .= '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '	<td>' . $lang_block['length_othertitle'] . '</td>';
            $html .= '	<td>';
            $html .= '	<input type="text" class="form-control w100" name="config_length_othertitle" size="5" value="' . $data_block['length_othertitle'] . '"/>';
            $html .= '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td>' . $lang_block['showtooltip'] . '</td>';
            $html .= '<td>';
            $html .= '<div class="text-middle pull-left" ><input type="checkbox" value="1" name="config_showtooltip" ' . ($data_block['showtooltip'] == 1 ? 'checked="checked"' : '') . ' /></div>';
            $tooltip_position = array(
                'top' => $lang_block['tooltip_position_top'],
                'bottom' => $lang_block['tooltip_position_bottom'],
                'left' => $lang_block['tooltip_position_left'],
                'right' => $lang_block['tooltip_position_right'] );
            $html .= '<span class="text-middle pull-left">' . $lang_block['tooltip_position'] . '&nbsp;</span><select name="config_tooltip_position" class="form-control w100 pull-left">';
            foreach ($tooltip_position as $key => $value) {
                $html .= '<option value="' . $key . '" ' . ($data_block['tooltip_position'] == $key ? 'selected="selected"' : '') . '>' . $value . '</option>';
            }
            $html .= '</select>';
            $html .= '	<span class="text-middle pull-left">&nbsp;' . $lang_block['tooltip_length'] . '&nbsp;</span><input type="text" class="form-control w100 pull-left" name="config_tooltip_length" size="5" value="' . $data_block['tooltip_length'] . '"/>';
            $html .= '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td>' . $lang_block['nocatid'] . '</td>';
            $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_cat ORDER BY sort ASC';
            $list = $nv_Cache->db($sql, '', $module);
            $html .= '<td>';
            $html .= '<div style="height: 160px; overflow: auto">';
            foreach ($list as $l) {
                $xtitle_i = '';
                if ($l['lev'] > 0) {
                    for ($i = 1; $i <= $l['lev']; ++$i) {
                        $xtitle_i .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    }
                }
    			$data_block['nocatid'] = !empty( $data_block['nocatid'] ) ? $data_block['nocatid'] : array();
                $html .= $xtitle_i . '<label><input type="checkbox" name="config_nocatid[]" value="' . $l['catid'] . '" ' . ((in_array($l['catid'], $data_block['nocatid'])) ? ' checked="checked"' : '') . '</input>' . $l['title'] . '</label><br />';
            }
            $html .= '</div>';
            $html .= '</td>';
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
     * nv_block_config_news_center_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_news_center_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['selectmod'] = $nv_Request->get_title('config_selectmod', 'post', '');
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 0);
        $return['config']['showtooltip'] = $nv_Request->get_int('config_showtooltip', 'post', 0);
        $return['config']['tooltip_position'] = $nv_Request->get_title('config_tooltip_position', 'post', 0);
        $return['config']['tooltip_length'] = $nv_Request->get_title('config_tooltip_length', 'post', 0);
        $return['config']['length_title'] = $nv_Request->get_int('config_length_title', 'post', 0);
        $return['config']['length_hometext'] = $nv_Request->get_int('config_length_hometext', 'post', 0);
		$return['config']['length_othertitle'] = $nv_Request->get_int('config_length_othertitle', 'post', 0);
        $return['config']['width'] = $nv_Request->get_int('config_width', 'post', '');
        $return['config']['height'] = $nv_Request->get_int('config_height', 'post', '');
        $return['config']['nocatid'] = $nv_Request->get_typed_array('config_nocatid', 'post', 'int', array());
        return $return;
    }

    /**
     * nv_block_news_center()
     *
     * @param mixed $block_config
     * @return
     */
    function nv_block_news_center($block_config)
    {
        global $site_mods;

        $block_config['module'] = $block_config['selectmod'];
        $module = $block_config['module'];

        if (isset($site_mods[$module])) {
            global $global_array_cat, $module_name, $db, $global_config, $nv_Cache, $module_config;

            $module_array_cat = array();
            $module_data = $site_mods[$module]['module_data'];
            $module_upload = $site_mods[$module]['module_upload'];

            // Xác định danh sách chuyên mục
            if ($module_name == $module) {
                $module_array_cat = $global_array_cat;
            } else {
                $sql = 'SELECT catid, parentid, title, alias, viewcat, subcatid, numlinks, description, inhome, keywords, groups_view FROM
                ' . NV_PREFIXLANG . '_' . $module_data . '_cat ORDER BY sort ASC';
                $list = $nv_Cache->db($sql, 'catid', $module);
                if (!empty($list)) {
                    foreach ($list as $l) {
                        $module_array_cat[$l['catid']] = $l;
                        $module_array_cat[$l['catid']]['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $l['alias'];
                    }
                }
            }

            $db->sqlreset()
                ->select('id, catid, publtime, title, alias, hometext, homeimgthumb, homeimgfile, external_link')
                ->from(NV_PREFIXLANG . '_' . $module_data . '_rows')->order('publtime DESC')->limit($block_config['numrow']);
            if (empty($block_config['nocatid'])) {
                $db->where('status= 1');
            } else {
                $db->where('status= 1 AND catid NOT IN ('.implode(',', $block_config['nocatid']) . ')');
            }

            $list = $nv_Cache->db($db->sql(), 'id', $module);

            if (!empty($list)) {
                if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.news_center.tpl')) {
                    $block_theme = $global_config['module_theme'];
                } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.news_center.tpl')) {
                    $block_theme = $global_config['site_theme'];
                } else {
                    $block_theme = 'default';
                }

                $xtpl = new XTemplate('global.news_center.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
                $xtpl->assign('TEMPLATE', $block_theme);

                $_first = true;
                foreach ($list as $row) {
                    $row['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $module_array_cat[$row['catid']]['alias'] . '/' . $row['alias'] . '-' . $row['id'] . $global_config['rewrite_exturl'];
                    $row['titleclean60'] = nv_clean60($row['title'], $block_config['length_title']);

                    if ($row['external_link']) {
                        $row['target_blank'] = 'target="_blank"';
                    }

                    if ($_first) {
                        $_first = false;
                        $width = isset($block_config['width']) ? $block_config['width'] : 400;
                        $height = isset($block_config['height']) ? $block_config['height'] : 268;

                        if ($row['homeimgfile'] != '' and ($imginfo = nv_is_image(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $row['homeimgfile'])) != array()) {
                            $image = NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $row['homeimgfile'];

                            if ($imginfo['width'] <= $width and $imginfo['height'] <= $height) {
                                $row['imgsource'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['homeimgfile'];
                                $row['width'] = $imginfo['width'];
                            } else {
                                $basename = preg_replace('/(.*)(\.[a-z]+)$/i', $module . '_' . $row['id'] . '_\1_' . $width . '-' . $height . '\2', basename($image));
                                if (file_exists(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $basename)) {
                                    $imginfo = nv_is_image(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $basename);
                                    $row['imgsource'] = NV_BASE_SITEURL . NV_TEMP_DIR . '/' . $basename;
                                    $row['width'] = $imginfo['width'];
                                } else {
                                    $_image = new NukeViet\Files\Image($image, NV_MAX_WIDTH, NV_MAX_HEIGHT);
                                    $_image->resizeXY($width, $height);
                                    $_image->save(NV_ROOTDIR . '/' . NV_TEMP_DIR, $basename);
                                    if (file_exists(NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $basename)) {
                                        $row['imgsource'] = NV_BASE_SITEURL . NV_TEMP_DIR . '/' . $basename;
                                        $row['width'] = $_image->create_Image_info['width'];
                                    }
                                }
                            }
                        } elseif (nv_is_url($row['homeimgfile'])) {
                            $row['imgsource'] = $row['homeimgfile'];
                            $row['width'] = $width;
                        } elseif (! empty($module_config[$module]['show_no_image'])) {
                            $row['imgsource'] = NV_BASE_SITEURL . $module_config[$module]['show_no_image'];
                            $row['width'] = $width;
                        } else {
                            $row['imgsource'] = NV_BASE_SITEURL . 'themes/' . $global_config['site_theme'] . '/images/no_image.gif';
                            $row['width'] = $width;
                        }

                        if (!empty($block_config['length_hometext'])) {
                            $row['hometext'] = nv_clean60(strip_tags($row['hometext']), $block_config['length_hometext']);
                        }

                        $xtpl->assign('main', $row);
                    } else {
                        if ($row['homeimgthumb'] == 1) {
                            $row['imgsource'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $row['homeimgfile'];
                        } elseif ($row['homeimgthumb'] == 2) {
                            $row['imgsource'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['homeimgfile'];
                        } elseif ($row['homeimgthumb'] == 3) {
                            $row['imgsource'] = $row['homeimgfile'];
                        } elseif (! empty($module_config[$module]['show_no_image'])) {
                            $row['imgsource'] = NV_BASE_SITEURL . $module_config[$module]['show_no_image'];
                        } else {
                            $row['imgsource'] = NV_BASE_SITEURL . 'themes/' . $global_config['site_theme'] . '/images/no_image.gif';
                        }

                        if ($block_config['showtooltip']) {
                            $row['hometext_clean'] = strip_tags($row['hometext']);
                            $row['hometext_clean'] = nv_clean60($row['hometext_clean'], $block_config['tooltip_length'], true);
                        }
    					$row['titleclean60'] = nv_clean60($row['title'], $block_config['length_othertitle']);
                        $xtpl->assign('othernews', $row);

                        if ($block_config['showtooltip']) {
                            $xtpl->assign('TOOLTIP_POSITION', $block_config['tooltip_position']);
                            $xtpl->parse('main.othernews.tooltip');
                        }

                        $xtpl->parse('main.othernews');
                    }
                }

                $xtpl->parse('main');
                return $xtpl->text('main');
            }
        }
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_block_news_center($block_config);
}
