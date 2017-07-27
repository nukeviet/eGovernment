<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Mr.Thinh (thinhwebhp@gmail.com)
 * @Copyright (C) 2017 Thinhweb Blog. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mar 9, 2017 11:34:27 AM
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (! nv_function_exists('nv_block_block_news_category_primary')) {
    function nv_block_config_block_news_category_primary($module, $data_block, $lang_block)
    {
		global $db_config, $nv_Cache, $site_mods;

		$html = $block = '';

		$html .= "<tr>";
		$html .= "	<td>" . $lang_block['module'] . "</td>";
		$html .= "	<td><select name=\"config_module_name\" id=\"config_module_name\" class=\"w200 form-control\">\n";
		$sql = "SELECT title, module_data, custom_title FROM " . $db_config['prefix'] . "_" . NV_LANG_DATA . "_modules WHERE module_file = 'news'";
		$list = $nv_Cache->db( $sql, 'title', $module );

		foreach( $list as $l )
		{
			$sel = ( $data_block['module_name'] == $l['title'] ) ? ' selected' : '';
			$html .= "<option value=\"" . $l['title'] . "\" " . $sel . ">" . $l['custom_title'] . "</option>\n";
			$block .= nv_get_category_news_primary( $l['title'] );
		}

		$html .= "	</select>";
		$html .= "	<div style='display: none'>" . $block . "</div>";
		$html .= "	</td>\n";
		$html .= "</tr>";

        $html .= '<script type="text/javascript">';
		$html .= '	$("#div-catid").html( $("#select_" + $(\'#config_module_name\').val() ).html() ).find("select").attr("name", "config_catid");';
        $html .= '	$("#config_module_name").change(function() {';
        $html .= '		$("#div-catid").html("<img src=\'' . NV_BASE_SITEURL . NV_ASSETS_DIR . '/images/load_bar.gif\' />").html( $("#select_" + $(this).val() ).html() ).find("select").attr("name", "config_catid");';
        $html .= '	});';
        $html .= '</script>';

		$html .= '<tr>';
        $html .= '<td>' . $lang_block['catid'] . '</td>';
        $html .= '<td id="div-catid"></td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td>' . $lang_block['numrow'] . '</td>';
        $html .= '<td><input type="text" class="form-control w200" name="config_numrow" size="5" value="' . $data_block['numrow'] . '"/></td>';
        $html .= '</tr>';

		$html .= '<tr>';
        $html .= '<td>' . $lang_block['title_length'] . '</td>';
        $html .= '<td><input type="text" class="form-control w200" name="config_title_length" size="5" value="' . $data_block['title_length'] . '"/></td>';
        $html .= '</tr>';

		$html .= '<tr>';
        $html .= '<td>' . $lang_block['content_length'] . '</td>';
        $html .= '<td><input type="text" class="form-control w200" name="config_content_length" size="5" value="' . $data_block['content_length'] . '"/></td>';
        $html .= '</tr>';

        return $html;
    }

	function nv_get_category_news_primary( $module )
	{
		global $site_mods, $data_block, $nv_Cache, $lang_block, $block_config;

		$html = '';
		$html .= '<div id="select_' . $module . '">';

		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_cat ORDER BY sort ASC';
        $list = $nv_Cache->db($sql, '', $module);

        foreach ($list as $l) {
            $xtitle_i = '';

            if ($l['lev'] > 0) {
                for ($i = 1; $i <= $l['lev']; ++$i) {
                    $xtitle_i .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                }
            }
            $html .= $xtitle_i . '<label><input type="radio" name="config_catid" value="' . $l['catid'] . '" ' . (($l['catid'] == $data_block['catid']) ? ' checked="checked"' : '') . '</input>' . $l['title'] . '</label><br />';
        }
		$html .= '</div>';

		return $html;
	}

    function nv_block_config_block_news_category_primary_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
		$return['config']['catid'] = $nv_Request->get_int('config_catid', 'post', 0);
		$return['config']['module_name'] = $nv_Request->get_title('config_module_name', 'post', 'news');
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 0);
        $return['config']['title_length'] = $nv_Request->get_int('config_title_length', 'post', 20);
		$return['config']['content_length'] = $nv_Request->get_int('config_content_length', 'post', 100);
        return $return;
    }

    function nv_block_block_news_category_primary($block_config)
    {
        global $module_array_cat, $module_info, $site_mods, $module_config, $global_config, $nv_Cache, $db;
        $module = $block_config['module_name'];
        $show_no_image = $module_config[$module]['show_no_image'];
        $blockwidth = $module_config[$module]['blockwidth'];

        $db->sqlreset()
            ->select('id, catid, title, alias, homeimgfile, homeimgthumb, hometext, publtime, hitscm, hitstotal')
            ->from(NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_rows')
            ->where('status= 1 AND catid = ' . $block_config['catid'])
            ->order('publtime DESC')
            ->limit($block_config['numrow']);
        $list = $nv_Cache->db($db->sql(), '', $module);

        if (! empty($list)) {
            if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.category_news_primary.tpl')) {
                $block_theme = $global_config['module_theme'];
            } else {
                $block_theme = 'default';
            }
            $xtpl = new XTemplate('global.category_news_primary.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks');
            $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
            $xtpl->assign('TEMPLATE', $block_theme);

			foreach ($list as $l) {
				$l['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $module_array_cat[$l['catid']]['alias'] . '/' . $l['alias'] . '-' . $l['id'] . $global_config['rewrite_exturl'];

                $l['blockwidth'] = $blockwidth;

                $l['hometext_clean'] = strip_tags($l['hometext']);
                $l['hometext_clean'] = nv_clean60($l['hometext_clean'], $block_config['content_length']);

                $l['title_clean'] = nv_clean60($l['title'], $block_config['title_length']);

				$xtpl->assign('ROW', $l);
				$xtpl->parse('main.loop');
			}

            $xtpl->parse('main');
            return $xtpl->text('main');
        }
    }
}
if (defined('NV_SYSTEM')) {
    global $site_mods, $module_name, $global_array_cat, $module_array_cat, $nv_Cache, $db;
    $module = $block_config['module_name'];
    if (isset($site_mods[$module])) {
        if ($module == $module_name) {
            $module_array_cat = $global_array_cat;
            unset($module_array_cat[0]);
        } else {
            $module_array_cat = array();
            $sql = 'SELECT catid, parentid, title, alias, viewcat, subcatid, numlinks, description, inhome, keywords, groups_view FROM ' . NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'] . '_cat ORDER BY sort ASC';
            $list = $nv_Cache->db($sql, 'catid', $module);
            if(!empty($list))
            {
                foreach ($list as $l) {
                    $module_array_cat[$l['catid']] = $l;
                    $module_array_cat[$l['catid']]['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $l['alias'];
                }
            }
        }
        $content = nv_block_block_news_category_primary($block_config);
    }
}
