<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/9/2010 23:25
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

if (!nv_function_exists('nv_block_hloawegov')) {
    /**
     * nv_block_config_new_egovlaws()
     *
     * @param mixed $module
     * @param mixed $data_block
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_new_egovlaws($module, $data_block, $lang_block)
    {
        global $nv_Cache, $site_mods, $nv_Request;

        // Xuất nội dung khi có chọn module
        if ($nv_Request->isset_request('loadajaxdata', 'get')) {
            $module = $nv_Request->get_title('loadajaxdata', 'get', '');

            $html = '';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['numrow'] . '</td>';
            $html .= '<td><input type="text" class="form-control w200" name="config_numrow" value="' . $data_block['numrow'] . '" /></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['title_length'] . '</td>';
            $html .= '<td><input type="text" class="form-control w200" name="config_title_length" value="' . $data_block['title_length'] . '" /><span class="help-block">' . $lang_block['title_note'] . '</span></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['show_code'] . '</td>';
            $ck = $data_block['show_code'] ? 'checked="checked"' : '';
            $html .= '<td><input type="checkbox" name="config_show_code" value="1" ' . $ck . ' /></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['direction'] . '</td>';
            $html .= '<td><select name="config_direction" class="form-control">';
            $sl = $data_block['direction'] == 'none' ? 'selected="selected"' : '';
            $html .= '<option value="none" ' . $sl . ' >' . $lang_block['direction_none'] . '</option>';
            $sl = $data_block['direction'] == 'up' ? 'selected="selected"' : '';
            $html .= '<option value="up" ' . $sl . ' >' . $lang_block['direction_up'] . '</option>';
            $sl = $data_block['direction'] == 'down' ? 'selected="selected"' : '';
            $html .= '<option value="down" ' . $sl . ' >' . $lang_block['direction_down'] . '</option>';
            $html .= '</select></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['duration'] . '</td>';
            $html .= '<td><input type="text" class="form-control" name="config_duration" value="' . $data_block['duration'] . '" /></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['pauseOnHover'] . '</td>';
            $ck = $data_block['pauseOnHover'] ? 'checked="checked"' : '';
            $html .= '<td><input type="checkbox" name="config_pauseOnHover" value="1" ' . $ck . ' /></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $lang_block['duplicated'] . '</td>';
            $ck = $data_block['duplicated'] ? 'checked="checked"' : '';
            $html .= '<td><input type="checkbox" name="config_duplicated" value="1" ' . $ck . ' /></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td>' . $lang_block['order'] . '</td>';
            $html .= '<td><select name="config_order" class="form-control">';
            $sel = $data_block['order'] == '1' ? 'selected="selected"' : '';
            $html .= '<option value="1" ' . $sel . ' >' . $lang_block['order_pub_new'] . '</option>';
            $sel = $data_block['order'] == '2' ? 'selected="selected"' : '';
            $html .= '<option value="2" ' . $sel . ' >' . $lang_block['order_pub_old'] . '</option>';
            $sel = $data_block['order'] == '3' ? 'selected="selected"' : '';
            $html .= '<option value="3" ' . $sel . ' >' . $lang_block['order_addtime_new'] . '</option>';
            $sel = $data_block['order'] == '4' ? 'selected="selected"' : '';
            $html .= '<option value="4" ' . $sel . ' >' . $lang_block['order_addtime_old'] . '</option>';
            $html .= '</select></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td>' . $lang_block['textdisplay'] . '</td>';
            $html .= '<td><input type="text" class="form-control w300" name="config_textdisplay" value="' . $data_block['textdisplay'] . '" /></td>';
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
            if ($mod['module_file'] == 'laws') {
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
     * nv_block_config_new_egovlaws_submit()
     *
     * @param mixed $module
     * @param mixed $lang_block
     * @return
     */
    function nv_block_config_new_egovlaws_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['selectmod'] = $nv_Request->get_title('config_selectmod', 'post', '');
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 0);
        $return['config']['title_length'] = $nv_Request->get_int('config_title_length', 'post', 0);
        $return['config']['show_code'] = $nv_Request->get_int('config_show_code', 'post', 0);
        $return['config']['direction'] = $nv_Request->get_title('config_direction', 'post', 'none');
        $return['config']['duration'] = $nv_Request->get_int('config_duration', 'post', 0);
        $return['config']['pauseOnHover'] = $nv_Request->get_int('config_pauseOnHover', 'post', 0);
        $return['config']['duplicated'] = $nv_Request->get_int('config_duplicated', 'post', 0);
        $return['config']['order'] = $nv_Request->get_int('config_order', 'post', 1);
        $return['config']['textdisplay'] = $nv_Request->get_title('config_textdisplay', 'post', '');
        return $return;
    }

    /**
     * nv_block_hloawegov()
     *
     * @param mixed $block_config
     * @return
     */
    function nv_block_hloawegov($block_config)
    {
        global $site_mods;

        $block_config['module'] = $block_config['selectmod'];
        $module = $block_config['module'];

        if (isset($site_mods[$module])) {
            global $module_info, $lang_module, $global_config, $site_mods, $db, $my_head, $module_name, $nv_laws_listcat, $nv_Cache;

            $module = $block_config['module'];
            $data = $site_mods[$module]['module_data'];
            $modfile = $site_mods[$module]['module_file'];

            $numrow = (isset($block_config['numrow'])) ? $block_config['numrow'] : 10;
            $title_length = (isset($block_config['title_length'])) ? $block_config['title_length'] : 0;
            $show_code = (isset($block_config['show_code'])) ? $block_config['show_code'] : 1;

            $order = ($block_config['order'] == 2 or $block_config['order'] == 4) ? "ASC" : "DESC";
            $order_param = ($block_config['order'] == 1 or $block_config['order'] == 2) ? "publtime" : "addtime";

            $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $data . '_row WHERE status=1 ORDER BY ' . $order_param . ' ' . $order . ' LIMIT 0,' . $numrow;
            $result = $db->query($sql);
            $numrow = $result->rowCount();

            if (!empty($numrow)) {
                if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.laws.tpl')) {
                    $block_theme = $global_config['module_theme'];
                } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.laws.tpl')) {
                    $block_theme = $global_config['site_theme'];
                } else {
                    $block_theme = 'default';
                }
                if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/css/laws.css')) {
                    $block_css = $global_config['module_theme'];
                } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/css/laws.css')) {
                    $block_css = $global_config['site_theme'];
                } else {
                    $block_css = 'default';
                }

                if ($module_name != $module) {
                    $sql = "SELECT id, parentid, alias, title, introduction, keywords, newday FROM " . NV_PREFIXLANG . "_" . $data . "_cat ORDER BY parentid,weight ASC";
                    $nv_laws_listcat = $nv_Cache->db($sql, 'id', $module);

                    $my_head .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . NV_BASE_SITEURL . "themes/" . $block_css . "/css/laws.css\" />";

                    $temp_lang_module = $lang_module;
                    $lang_module = array();
                    include NV_ROOTDIR . '/modules/' . $site_mods[$module]['module_file'] . '/language/' . NV_LANG_INTERFACE . '.php';
                    $lang_block_module = $lang_module;
                    $lang_module = $temp_lang_module;
                } else {
                    $lang_block_module = $lang_module;
                }

                include NV_ROOTDIR . '/themes/' . $block_theme . '/language/' . NV_LANG_INTERFACE . '.php';

                $xtpl = new XTemplate('global.laws.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
                $xtpl->assign('LANG', $lang_block_module);
                $xtpl->assign('MLANG', $lang_module);
                $xtpl->assign('TEMPLATE', $block_css);
                $xtpl->assign('MODULE_LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module);

                while ($row = $result->fetch()) {
                    $newday = $row['publtime'] + (86400 * $nv_laws_listcat[$row['cid']]['newday']);

                    $link = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $site_mods[$module]['alias']['detail'] . '/' . $row['alias'];
                    $row['link'] = $link;

                    if ($title_length > 0) {
                        $row['stitle'] = nv_clean60($row['title'], $title_length);
                    } else {
                        $row['stitle'] = $row['title'];
                    }

                    $row['publtime'] = nv_date('d/m/Y', $row['publtime']);

                    $xtpl->assign('ROW', $row);

                    if ($show_code) {
                        $xtpl->parse('main.loop.code');
                    }

                    if ($newday >= NV_CURRENTTIME) {
                        $xtpl->parse('main.loop.newday');
                    }

                    $xtpl->parse('main.loop');
                }

                if ($block_config['direction'] != 'none') {
                    $block_config['pauseOnHover'] = $block_config['pauseOnHover'] ? 'true' : 'false';
                    $block_config['duplicated'] = $block_config['duplicated'] ? 'true' : 'false';
                    $xtpl->assign('DATA', $block_config);
                    $xtpl->parse('main.marquee_data');
                    $xtpl->parse('main.marquee_js');
                }

                if (!empty($block_config['textdisplay'])) {
                    $xtpl->assign('TEXTDISPLAY', $block_config['textdisplay']);
                    $xtpl->parse('main.textdisplay');
                }

                $xtpl->parse('main');
                return $xtpl->text('main');
            }
        }
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_block_hloawegov($block_config);
}
