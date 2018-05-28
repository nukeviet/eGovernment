<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{SELECTTHEMES}/css/system_config.css">
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <ul class="nav nav-tabs" role="tablist" id="cfgThemeTabs">
        <li role="presentation" class="{TAB0_ACTIVE}"><a href="#configThemeColor" aria-controls="configThemeColor" role="tab" data-toggle="tab">{LANG.themeCfgColor}</a></li>
        <li role="presentation" class="{TAB1_ACTIVE}"><a href="#configThemeCSS" aria-controls="configThemeCSS" role="tab" data-toggle="tab">{LANG.themeCfgCss}</a></li>
    </ul>
    <div class="tab-content theme-config-tabpanel">
        <div role="tabpanel" class="tab-pane{TAB0_ACTIVE}" id="configThemeColor">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td style="padding-left: 50px; width: 50%">
                                    <div class="img-color">
                                        <img data-toggle="choosetheme" data-target="#ctheme1" alt="{LANG.layout_orange}" src="{NV_BASE_SITEURL}themes/{SELECTTHEMES}/images/ePotor_VP-Chinh-Phu-Home.jpg" style="max-width: 100%">
                                    </div>
                                    <br />
                                    <div class="text-layout">
                                        <label><span>{LANG.layout_orange}</span> <input id="ctheme1" type="radio" name="color_default" value="1"{THEME_COLOR_CHECKED_1}></label>
                                    </div>
                                </td>
                                <td style="padding-left: 50px; width: 50%;">
                                    <div class="img-color">
                                        <img data-toggle="choosetheme" data-target="#ctheme2" alt="{LANG.layout_blue}" src="{NV_BASE_SITEURL}themes/{SELECTTHEMES}/images/ePotor_VP-Chinh-Phu-PA2-Home.jpg" style="max-width: 100%">
                                    </div>
                                    <br />
                                    <div class="text-layout">
                                        <label><span>{LANG.layout_blue}</span> <input id="ctheme2" type="radio" name="color_default" value="2"{THEME_COLOR_CHECKED_2}></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 50px; width: 50%">
                                    <div class="img-color">
                                        <img data-toggle="choosetheme" data-target="#ctheme3" alt="{LANG.layout_green}" src="{NV_BASE_SITEURL}themes/{SELECTTHEMES}/images/ePotor_VP-Chinh-Phu-PA3-Home.jpg" style="max-width: 100%">
                                    </div>
                                    <br />
                                    <div class="text-layout">
                                        <label><span>{LANG.layout_green}</span> <input id="ctheme3" type="radio" name="color_default" value="3"{THEME_COLOR_CHECKED_3}></label>
                                    </div>
                                </td>
                                <td style="padding-left: 50px; width: 50%">
                                    <div class="img-color">
                                        <img data-toggle="choosetheme" data-target="#ctheme4" alt="{LANG.layout_light_brown}" src="{NV_BASE_SITEURL}themes/{SELECTTHEMES}/images/ePotor_VP-Chinh-Phu-PA4-Home.jpg" style="max-width: 100%">
                                    </div>
                                    <br />
                                    <div class="text-layout">
                                        <label><span>{LANG.layout_light_brown}</span> <input id="ctheme4" type="radio" name="color_default" value="4"{THEME_COLOR_CHECKED_4}></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane{TAB1_ACTIVE}" id="configThemeCSS">
            <div class="panel-body">
                <div class="alert alert-warning">
                    <i class="fa fa-fw fa-info-circle"></i>{LANG.themeCfgCssNote}.
                </div>
                <textarea class="form-control" name="generalcss" rows="22">{GENERALCSS}</textarea>
            </div>
        </div>
    </div>
    <div class="theme-config-submit-area">
        <input type="hidden" name="selectedtab" value="{SELECTEDTAB}" />
        <button type="submit" name="submit" value="submit" class="btn btn-primary">
            <i class="fa fa-fw fa-save"></i>{LANG.save}
        </button>
    </div>
</form>
<script type="text/javascript">
$(function() {
    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
    $('#cfgThemeTabs a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        if ($(this).attr('aria-controls') == 'configThemeCSS') {
            $('[name="selectedtab"]').val('1');
        } else {
            $('[name="selectedtab"]').val('0');
        }
    });
    $('[data-toggle="choosetheme"]').click(function() {
        $($(this).data('target')).click();
    });
});
</script>
<!-- END:main -->