<!-- BEGIN: main -->
<script src="{NV_BASE_SITEURL}themes/{NV_ADMIN_THEME}/js/colpick.js"></script>
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{NV_ADMIN_THEME}/js/colpick.css">
<div class="container">
    <div>
        <form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td style="padding-left: 50px; width: 50%">
                                <div class="img-color">
                                    <img alt="{LANG.layout_orange}" src="{NV_BASE_SITEURL}themes/{SELECTTHEMES}/images/ePotor_VP-Chinh-Phu-Home.jpg" style="max-width: 100%">
                                </div> <br />
                                <div class="text-layout">
                                    <label><span>{LANG.layout_orange}</span> <input type="radio" name="color_default" value="1"{THEME_COLOR_CHECKED_1}></label>
                                </div>
                            </td>
                            <td style="padding-left: 50px; width: 50%;">
                                <div class="img-color">
                                    <img alt="{LANG.layout_blue}" src="{NV_BASE_SITEURL}themes/{SELECTTHEMES}/images/ePotor_VP-Chinh-Phu-PA2-Home.jpg" style="max-width: 100%">
                                </div> <br />
                                <div class="text-layout">
                                    <label><span>{LANG.layout_blue}</span> <input type="radio" name="color_default" value="2"{THEME_COLOR_CHECKED_2}></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 50px; width: 50%"><div class="img-color">
                                    <img alt="{LANG.layout_green}" src="{NV_BASE_SITEURL}themes/{SELECTTHEMES}/images/ePotor_VP-Chinh-Phu-PA3-Home.jpg" style="max-width: 100%">
                                </div> <br />
                                <div class="text-layout">
                                    <label><span>{LANG.layout_green}</span> <input type="radio" name="color_default" value="3"{THEME_COLOR_CHECKED_3}></label>
                                </div></td>
                            <td style="padding-left: 50px; width: 50%">
                                <div class="img-color">
                                    <img alt="{LANG.layout_light_brown}" src="{NV_BASE_SITEURL}themes/{SELECTTHEMES}/images/ePotor_VP-Chinh-Phu-PA4-Home.jpg" style="max-width: 100%">
                                </div> <br />
                                <div class="text-layout">
                                    <label><span>{LANG.layout_light_brown}</span> <input type="radio" name="color_default" value="4"{THEME_COLOR_CHECKED_4}></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center"><input type="submit" name="submit" value="{LANG.save}" /></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<script>
	$('input[type="checkbox"]').on('change', function() {
		$('input[type="checkbox"]').not(this).prop('checked', false);
	});
</script>
<!-- END:main -->