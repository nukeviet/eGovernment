<!-- BEGIN: main -->
<script src="{NV_BASE_SITEURL}themes/{NV_ADMIN_THEME}/js/colpick.js"></script>
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{NV_ADMIN_THEME}/js/colpick.css">
<div class="container">
    <div>
        <form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
            <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="img-color">
                    <img alt="NukeViet Default" src="/themes/{NV_ADMIN_THEME}/images/ePotor_VP-Chinh-Phu-Home.jpg" style="max-width: 100%">
                </div>
                <div class="text-layout">
                <span>{LANG.layout_orange}</span> <input type="checkbox" name="color_default[]">
                </div>        
            </div>
            <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="img-color">
                    <img alt="NukeViet Default" src="/themes/{NV_ADMIN_THEME}/images/ePotor_VP-Chinh-Phu-PA2-Home.jpg" style="max-width: 100%">
                </div>
                 <div class="text-layout">
                <span>{LANG.layout_blue}</span> <input type="checkbox" name="color_default[]">
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="img-color">
                    <img alt="NukeViet Default" src="/themes/{NV_ADMIN_THEME}/images/ePotor_VP-Chinh-Phu-PA3-Home.jpg" style="max-width: 100%">
                </div>
                <div class="text-layout">
                <span>{LANG.layout_green}</span> <input type="checkbox" name="color_default[]">
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="img-color">
                    <img alt="NukeViet Default" src="/themes/{NV_ADMIN_THEME}/images/ePotor_VP-Chinh-Phu-PA4-Home.jpg" style="max-width: 100%">
                </div>
                 <div class="text-layout">
                <span>{LANG.layout_light_brown}</span> <input type="checkbox" name="color_default[]">
                </div>
            </div>
            <div class="col-sm-11 col-xs-11 col-md-11"></div>
            <div class="col-sm-2 col-xs-2 col-md-2"><span class="save-layout"><input type="submit" name="submit" value="{LANG.save}" /></span></div>
            <div class="col-sm-10 col-xs-10 col-md-10"></div>            
        </form>
    </div>
</div>
<script>
$('input[type="checkbox"]').on('change', function() {
    $('input[type="checkbox"]').not(this).prop('checked', false);  
});
</script>
<!-- END:main -->