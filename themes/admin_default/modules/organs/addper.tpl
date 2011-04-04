<!-- BEGIN: main -->
<div id="edit">
    <!-- BEGIN: error -->
    <div class="quote" style="width:98%; margin:auto">
    	<blockquote class="error"><span>{error}</span></blockquote>
    </div>
    <div class="clear"></div>
    <!-- END: error -->
    <form action="" method="post">
    <input type="hidden" name ="personid" value="{DATA.personid}" />
    <input type="hidden" name ="organid_old" value="{DATA.organid_old}" />
    <input name="save" type="hidden" value="1" />
    <table summary="" class="tab1">
      <tbody>
        <tr bgcolor="#EFEFEF">
        <td align="right" width="140px" ><strong>{LANG.organ_person_name}</strong></td>
        <td><input style="width: 400px" name="name" type="text" value="{DATA.name}" maxlength="255" /> (*)</td>
        </tr>
      </tbody>
      <tbody>
        <tr>
        <td align="right"><strong>{LANG.addper_organ_title}</strong></td>
        <td>
        	<select name="organid">
              <!-- BEGIN: parent_loop -->
                <option value="{ROW.organid}" {ROW.select}>{ROW.title}</option>
              <!-- END: parent_loop -->
            </select> (*)
        </td>
        </tr>
      </tbody>
      <tbody>
        <tr bgcolor="#EFEFEF">
        <td align="right"><strong>{LANG.organ_phone_title}: </strong></td>
        <td><input style="width: 200px" name="phone" type="text" value="{DATA.phone}" maxlength="255" /></td>
        </tr>
      </tbody>
      <tbody>
        <tr>
        <td align="right"><strong>{LANG.organ_email_title}: </strong></td>
        <td><input style="width: 200px" name="email" type="text" value="{DATA.email}" maxlength="255" /></td>
        </tr>
      </tbody>
      <tbody>
        <tr bgcolor="#EFEFEF">
        <td align="right"><strong>{LANG.addper_position_title}: </strong></td>
        <td><input style="width: 400px" name="position" type="text" value="{DATA.position}" maxlength="255" /></td>
        </tr>
      </tbody>
      <tbody>
        <tr>
        <td align="right"><strong>{LANG.addper_address_title} : </strong></td>
        <td><input style="width: 400px" name="address" type="text" value="{DATA.address}" maxlength="255" /></td>
        </tr>
      </tbody>
      <tbody>
      	<tr bgcolor="#EFEFEF">
        <td align="right"><strong>{LANG.addper_photo_title} : </strong></td>
        <td>
        	<input style="width: 400px" name="photo" id="photo" type="text" value="{DATA.photo}" maxlength="255" />
    		<input type="button" value="Browse server" name="selectimg"/>
        </td>
        </tr>
      </tbody>
    </table>
    <table summary="" class="tab1" style="margin:0">
      <tbody>
      	<tr bgcolor="#EFEFEF">
        	<td style="padding:10px"><strong>{LANG.addper_decription_title} </strong></td>
        </tr>
        <tr>
        	<td>{NV_EDITOR}</td>
        </tr>
      </tbody>
    </table>
    <table summary="" class="tab1" style="margin:0; margin-top:2px">
      <tbody>
        <tr bgcolor="#EFEFEF">
        	<td align="right" width="80"><strong>{LANG.organ_active_title}</strong></td>
        	<td>
				<input type="checkbox" name="active" value="1" {DATA.active_check}> 
			</td>
        </tr>
      </tbody>
  	</table>
    <table summary="" class="tab1" style="margin-top:2px">
      <tbody>
        <tr bgcolor="#EFEFEF">
        	<td>
				<center><input name="submit" type="submit" value="{LANG.save}"/></center>
			</td>
        </tr>
      </tbody>
  	</table>
	</form>
</div>
<script type="text/javascript">
//<![CDATA[
	$("input[name=selectimg]").click(function(){
		var area = "photo";
		var path= "{NV_UPLOADS_DIR}/{module_name}";	
		var currentpath= "{UPLOAD_CURRENT}";						
		var type= "image";
		nv_open_browse_file(script_name + "?" + nv_name_variable + "=upload&popup=1&area=" + area+"&path="+path+"&type="+type+"&currentpath="+currentpath, "NVImg", "850", "420","resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
		return false;
	});
//]]>
</script>	
<!-- END: main -->
