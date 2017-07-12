<!-- BEGIN: logininfo -->
<div id="client_login">
	<form role="form" action="#" method="post" class="form-horizontal" onsubmit="return false;">
		<div class="form-group">
			<label for="{LOGIN_INPUT_NAME}" class="col-sm-6 control-label">{LOGIN_LANG}:</label>
			<div class="col-sm-18">
				<input name="{LOGIN_INPUT_NAME}" id="{LOGIN_INPUT_NAME}" type="text" maxlength="{LOGIN_INPUT_MAXLENGTH}" class="form-control"/>
			</div>
		</div>
		<div class="form-group">
			<label for="{PASS_INPUT_NAME}" class="col-sm-6 control-label">{PASSWORD_LANG}:</label>
			<div class="col-sm-18">
				<input name="{PASS_INPUT_NAME}" id="{PASS_INPUT_NAME}" type="password" autocomplete="off" maxlength="{PASS_INPUT_MAXLENGTH}" class="form-control"/>
			</div>
		</div>
		<!-- BEGIN: captcha -->
		<div class="form-group">
			<label for="{CAPTCHA_NAME}" class="col-sm-6 control-label">{CAPTCHA_LANG}:</label>
			<div class="col-sm-10">
				<input name="{CAPTCHA_NAME}" id="{CAPTCHA_NAME}" type="text" maxlength="{CAPTCHA_MAXLENGTH}" class="form-control"/>
			</div>
			<div class="col-sm-8">
				<img class="captchaImg" alt="{CAPTCHA_LANG}"src="{CAPTCHA_IMG}" />
				&nbsp;<em class="fa fa-pointer fa-refresh fa-lg" onclick="change_captcha('#{CAPTCHA_NAME}');">&nbsp;</em>
			</div>
		</div>
		<!-- END: captcha -->
        <!-- BEGIN: recaptcha -->
        <div class="form-group">
            <label class="col-sm-6 control-label">{N_CAPTCHA}:</label>
            <div class="col-xs-24">
                <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}"></div></div>
                <script type="text/javascript">
                nv_recaptcha_elements.push({
                    id: "{RECAPTCHA_ELEMENT}",
                    btn: $('[type="button"]', $('#{RECAPTCHA_ELEMENT}').parent().parent().parent().parent().parent())
                })
                </script>
            </div>
        </div>
        <!-- END: recaptcha -->
	</form>
	<div class="text-center">
		<input type="button" value="{SUBMIT_LANG}" name="{SM_BUTTON_NAME}" id="{SM_BUTTON_NAME}" onclick="{SM_BUTTON_ONCLICK}" class="btn btn-primary"/>
	</div>
</div>
<p>
	{CLIENT_LOGIN_INFO}.
</p>
<!-- END: logininfo -->