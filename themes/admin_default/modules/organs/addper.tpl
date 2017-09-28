<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css">

<div id="edit">
    <!-- BEGIN: error -->
    <div class="alert alert-danger">
        {error}
    </div>
    <!-- END: error -->

    <form action="" method="post">
        <input type="hidden" name ="personid" value="{DATA.personid}" />
        <input type="hidden" name ="organid_old" value="{DATA.organid_old}" />
        <input name="save" type="hidden" value="1" />
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <td><strong>{LANG.organ_person_name}</strong> <span class="red">(*)</span></td>
                    <td>
                        <input class="form-control w400" name="name" type="text" value="{DATA.name}" maxlength="255" />
                    </td>
                </tr>
                <tr class="form-inline">
                    <td>
                        <strong>{LANG.addper_birthday}</strong> <span class="red"></span>
                    </td>
                    <td>
                        <span class="text-middle">
                            <input class="form-control" name="birthday" id="birthday" value="{DATA.birthday}" style="width: 100px;" maxlength="10" type="text" />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>{LANG.addper_place_birth}</strong> <input class="form-control" style="width: 210px" name="place_birth" type="text" value="{DATA.place_birth}" maxlength="255" />
                        </span>
                    </td>
                </tr>
                <tr class="form-inline">
                    <td><strong>{LANG.addper_dayparty}: </strong></td>
                    <td>
                        <span class="text-middle">
                            <input class="form-control" name="dayparty" id="dayparty" value="{DATA.dayparty}" style="width: 100px;" maxlength="10" type="text" />
                        </span>
                    </td>
                </tr>
                <tr class="form-inline">
                    <td><strong>{LANG.addper_dayinto}: </strong></td>
                    <td>
                        <input class="form-control" name="dayinto" id="dayinto" value="{DATA.dayinto}" style="width: 100px;" maxlength="10" type="text" />
                    </td>
                </tr>
                <tr class="form-inline">
                    <td><strong>{LANG.addper_organ_title}</strong></td>
                    <td>
                        <span class="text-middle">
                            <select class="form-control w200" name="organid">
                                <!-- BEGIN: parent_loop -->
                                <option value="{ROW.organid}" {ROW.select}>{ROW.title}</option>
                                <!-- END: parent_loop -->
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {LANG.organ_phone_ext_title}
                            <input class="form-control" style="width: 100px" name="phone_ext" type="text" value="{DATA.phone_ext}" maxlength="255" />
                        </span>
                    </td>
                </tr>
                <tr class="form-inline">
                    <td><strong>{LANG.organ_phonehome_title}: </strong></td>
                    <td>
                    <input class="form-control" name="phone" type="text" value="{DATA.phone}" maxlength="255" placeholder="{LANG.organ_title}" />
                    <input class="form-control" name="mobile" type="text" value="{DATA.mobile}" maxlength="255" placeholder="{LANG.organ_mobile_title}" />
                    </td>
                </tr>
                <tr>
                    <td><strong>{LANG.organ_email_title}: </strong></td>
                    <td>
                    <input class="form-control w400" name="email" type="text" value="{DATA.email}" maxlength="255" />
                    </td>
                </tr>
                <tr>
                    <td><strong>{LANG.addper_position_title}: </strong><span class="red">(*)</span></td>
                    <td>
                    <input class="form-control w400" name="position" type="text" value="{DATA.position}" maxlength="255" />
                    </td>
                </tr>
                <tr>
                    <td><strong>{LANG.addper_position_other_title}: </strong></td>
                    <td>
                    <input class="form-control w400" name="position_other" type="text" value="{DATA.position_other}" maxlength="255" />
                    </td>
                </tr>
                <tr>
                    <td><strong>{LANG.addper_professional} : </strong></td>
                    <td><textarea name="professional" class="form-control w400">{DATA.professional}</textarea></td>
                </tr>
                <tr>
                    <td><strong>{LANG.addper_political} : </strong></td>
                    <td><textarea name="political" class="form-control w400">{DATA.political}</textarea></td>
                </tr>
                <tr>
                    <td><strong>{LANG.addper_address_title} : </strong></td>
                    <td>
                    <input class="form-control w400" name="address" type="text" value="{DATA.address}" maxlength="255" />
                    </td>
                </tr>
                <tr>
                    <td><strong>{LANG.addper_marital_status} : </strong></td>
                    <td>
                    <input class="form-control w400" name="marital_status" type="text" value="{DATA.marital_status}" maxlength="255" />
                    </td>
                </tr>
                <tr>
                    <td><strong>{LANG.addper_photo_title} : </strong></td>
                    <td>
                    <input class="form-control w400 pull-left" style="margin-right: 5px" name="photo" id="photo" type="text" value="{DATA.photo}" maxlength="255" />
                    <input type="button" class="btn btn-primary" value="Browse server" name="selectimg"/>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-striped table-bordered table-hover" style="margin:0">
            <tbody>
                <tr>
                    <td style="padding:10px"><strong>{LANG.addper_decription_title} </strong></td>
                </tr>
                <tr>
                    <td>{NV_EDITOR}</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-striped table-bordered table-hover" style="margin-top:2px">
            <tbody>
                <tr>
                    <td class="text-center">
                        <input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<script type="text/javascript">
    //<![CDATA[
    var area = "photo";
    var path = "{NV_UPLOADS_DIR}/{module_name}";
    var currentpath = "{UPLOAD_CURRENT}";
    var type = "image";

    $("#birthday,#dayinto,#dayparty").datepicker({
        showOn : "both",
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        showOtherMonths : true,
        buttonImage : nv_base_siteurl + "assets/images/calendar.gif",
        buttonImageOnly : true,
        yearRange: "-90:+0"
    });
    //]]>
</script>
<!-- END: main -->