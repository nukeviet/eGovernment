<!-- BEGIN: main -->
<div id="edit">
    <!-- BEGIN: error -->
    <div class="quote" style="width:98%; margin:auto">
    	<blockquote class="error"><span>{error}</span></blockquote>
    </div>
    <div class="clear"></div>
    <!-- END: error -->
    <form action="" method="post">
    <input type="hidden" name ="organid" value="{DATA.organid}" />
    <input type="hidden" name ="parentid_old" value="{DATA.parentid_old}" />
    <input name="save" type="hidden" value="1" />
    <table summary="" class="tab1">
      <tbody>
        <tr bgcolor="#EFEFEF">
        <td align="right" width="140px" ><strong>{LANG.organ_name}</strong></td>
        <td><input style="width: 400px" name="title" type="text" value="{DATA.title}" maxlength="255" /> (*)</td>
        </tr>
      </tbody>
      <tbody>
        <tr>
        <td align="right" width="140px" ><strong>{LANG.organ_alias}</strong></td>
        <td><input style="width: 400px" name="alias" type="text" value="{DATA.alias}" maxlength="255" /></td>
        </tr>
      </tbody>
      <tbody>
        <tr>
        <td align="right"><strong>{LANG.organ_other_title}</strong></td>
        <td>
        	<select name="parentid">
              <option value="0">{LANG.organ_nothing_title}</option>
              <!-- BEGIN: parent_loop -->
                <option value="{ROW.organid}" {ROW.select}>{ROW.title}</option>
              <!-- END: parent_loop -->
            </select>
        </td>
        </tr>
      </tbody>
      <tbody>
        <tr>
        <td align="right"><strong>{LANG.organ_phone_title}: </strong></td>
        <td>
        	<input style="width: 200px" name="phone" type="text" value="{DATA.phone}" maxlength="255" />
            <strong>{LANG.phone_ext_title} : </strong>
            <input style="width: 100px" name="phone_ext" type="text" value="{DATA.phone_ext}" maxlength="255" />
        </td>
        </tr>
      </tbody>
      <tbody>
        <tr>
        <td align="right"><strong>{LANG.organ_fax_title}: </strong></td>
        <td><input style="width: 200px" name="fax" type="text" value="{DATA.fax}" maxlength="255" /></td>
        </tr>
      </tbody>
      <tbody>
        <tr>
        <td align="right"><strong>{LANG.organ_email_title}: </strong></td>
        <td><input style="width: 200px" name="email" type="text" value="{DATA.email}" maxlength="255" /></td>
        </tr>
      </tbody>
      <tbody>
        <tr>
        <td align="right"><strong>{LANG.organ_website_title}: </strong></td>
        <td><input style="width: 400px" name="website" type="text" value="{DATA.website}" maxlength="255" />
        	eg : www.domain1.vn; www.domain2.vn
        </td>
        </tr>
      </tbody>
      <tbody>
        <tr bgcolor="#EFEFEF">
        <td align="right"><strong>{LANG.organ_address_title} : </strong></td>
        <td><input style="width: 400px" name="address" type="text" value="{DATA.address}" maxlength="255" /></td>
        </tr>
      </tbody>
    </table>
    <table summary="" class="tab1" style="margin:0; margin-top:2px">
      <tbody>
      	<tr bgcolor="#EFEFEF">
        	<td style="padding:10px"><strong>{LANG.organ_description_title} </strong></td>
        </tr>
        <tr>
        	<td>{NV_EDITOR}</td>
        </tr>
      </tbody>
    </table>
    <table summary="" class="tab1" style="margin-top:2px;">
      <tbody class="second">
        <tr bgcolor="#EFEFEF">
        	<td align="right" width="80"><strong>{LANG.view_active_title}</strong></td>
        	<td>
				<input type="checkbox" name="view" value="1" {DATA.view_check}> 
				{LANG.view_active_title_note}
			</td>
        </tr>
      </tbody>
      <tbody>
        <tr bgcolor="#EFEFEF">
        	<td align="right" width="180"><strong>{LANG.organ_active_title}</strong></td>
        	<td>
				<input type="checkbox" name="active" value="1" {DATA.active_check}> 
			</td>
        </tr>
      </tbody>
  	</table>
    <center><input name="submit" type="submit" value="{LANG.save}"/></center><br>
	</form>
</div>
<!-- END: main -->
