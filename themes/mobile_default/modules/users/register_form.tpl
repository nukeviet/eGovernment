<form action="{USER_REGISTER}" method="post" onsubmit="return reg_validForm(this);" autocomplete="off" novalidate>
    <div class="nv-info margin-bottom" data-default="{LANG.info}">{LANG.info}</div>

    <div class="form-detail">
        <!-- BEGIN: name_show_0 -->
        <!-- BEGIN: show_last_name-->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="last_name" maxlength="{FIELD.max_length}" onkeypress="validErrorHidden(this);" data-mess="">
            </div>
        </div>
        <!-- END: show_last_name-->
        <!-- BEGIN: show_first_name-->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="first_name" maxlength="{FIELD.max_length}" onkeypress="validErrorHidden(this);" data-mess="">
            </div>
        </div>
        <!-- END: show_first_name-->
        <!-- END: name_show_0 -->

        <!-- BEGIN: name_show_1 -->
        <!-- BEGIN: show_first_name-->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="first_name" maxlength="{FIELD.max_length}" onkeypress="validErrorHidden(this);" data-mess="">
            </div>
        </div>
        <!-- END: show_first_name-->
        <!-- BEGIN: show_last_name-->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="last_name" maxlength="{FIELD.max_length}" onkeypress="validErrorHidden(this);" data-mess="">
            </div>
        </div>
        <!-- END: show_last_name-->
        <!-- END: name_show_1 -->

        <div class="form-group">
            <div>
                <input type="text" class="required form-control" placeholder="{LANG.account}" value="" name="username" maxlength="{NICK_MAXLENGTH}" data-pattern="/^(.){{NICK_MINLENGTH},{NICK_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{USERNAME_RULE}">
            </div>
        </div>

        <div class="form-group">
            <div>
                <input type="email" class="required form-control" placeholder="{LANG.email}" value="" name="email" maxlength="100" onkeypress="validErrorHidden(this);" data-mess="{GLANG.email_empty}">
            </div>
        </div>

        <div class="form-group">
            <div>
                <input type="password" autocomplete="off" class="password required form-control" placeholder="{LANG.password}" value="" name="password" maxlength="{PASS_MAXLENGTH}" data-pattern="/^(.){{PASS_MINLENGTH},{PASS_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{PASSWORD_RULE}">
            </div>
        </div>

        <div class="form-group">
            <div>
                <input type="password" autocomplete="off" class="re-password required form-control" placeholder="{LANG.re_password}" value="" name="re_password" maxlength="{PASS_MAXLENGTH}" data-pattern="/^(.){{PASS_MINLENGTH},{PASS_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.re_password_empty}">
            </div>
        </div>

        <!-- BEGIN: show_gender -->
        <div>
            <div>
                <div class="form-group clearfix radio-box {FIELD.required} {FIELD.class}" data-mess="">
                    <label class="col-sm-8 control-label {FIELD.required} {FIELD.class}" title="{FIELD.description}"> {FIELD.title} </label>
                    <div class="btn-group col-sm-16">
                        <!-- BEGIN: gender -->
                        <label class="radio-box"> <input type="radio" name="gender" value="{GENDER.key}" class="{FIELD.class}" onclick="validErrorHidden(this,5);" {GENDER.checked}> {GENDER.title} </label>
                        <!-- END: gender -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END: show_gender -->

        <!-- BEGIN: show_birthday -->
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control datepicker {FIELD.required} {FIELD.class}" data-provide="datepicker" placeholder="{FIELD.title}" value="{FIELD.value}" name="birthday" readonly="readonly" onchange="validErrorHidden(this);" onfocus="datepickerShow(this);" data-mess=""/>
                <span class="input-group-addon pointer" onclick="button_datepickerShow(this);"> <em class="fa fa-calendar"></em> </span>
            </div>
        </div>
        <!-- END: show_birthday -->

        <!-- BEGIN: show_sig -->
        <div class="form-group">
            <div>
                <textarea class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" name="sig" onkeypress="validErrorHidden(this);" data-mess="">{FIELD.value}</textarea>
            </div>
        </div>
        <!-- END: show_sig -->

        <!-- BEGIN: show_question -->
        <div class="form-group rel">
            <div class="input-group">
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="question" maxlength="{FIELD.max_length}" data-pattern="/^(.){{FIELD.min_length},}$/" onkeypress="validErrorHidden(this);" data-mess="{LANG.your_question_empty}">
                <span class="input-group-addon pointer" title="{LANG.select_question}" onclick="showQlist(this);"><em class="fa fa-caret-down fa-lg"></em></span>
            </div>
            <div class="qlist" data-show="no">
                <ul>
                    <!-- BEGIN: frquestion -->
                    <li>
                        <a href="#" onclick="addQuestion(this);">{QUESTION}</a>
                    </li>
                    <!-- END: frquestion -->
                </ul>
            </div>
        </div>
        <!-- END: show_question -->

        <!-- BEGIN: show_answer -->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="answer" maxlength="{FIELD.max_length}" data-pattern="/^(.){{FIELD.min_length},}$/" onkeypress="validErrorHidden(this);" data-mess="{LANG.answer_empty}">
            </div>
        </div>
        <!-- END: show_answer -->

        <!-- BEGIN: field -->
        <!-- BEGIN: loop -->
        <!-- BEGIN: textbox -->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="custom_fields[{FIELD.field}]" onkeypress="validErrorHidden(this);" data-mess=""/>
            </div>
        </div>
        <!-- END: textbox -->

        <!-- BEGIN: date -->
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control datepicker {FIELD.required} {FIELD.class}" data-provide="datepicker" placeholder="{FIELD.title}" value="{FIELD.value}" name="custom_fields[{FIELD.field}]" readonly="readonly" onchange="validErrorHidden(this);" onfocus="datepickerShow(this);" data-mess=""/>
                <span class="input-group-addon pointer" onclick="button_datepickerShow(this);"> <em class="fa fa-calendar"></em> </span>
            </div>
        </div>
        <!-- END: date -->

        <!-- BEGIN: textarea -->
        <div class="form-group">
            <div>
                <textarea class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" name="custom_fields[{FIELD.field}]" onkeypress="validErrorHidden(this);" data-mess="">{FIELD.value}</textarea>
            </div>
        </div>
        <!-- END: textarea -->

        <!-- BEGIN: editor -->
        <div class="form-group">
            {EDITOR}
        </div>
        <!-- END: editor -->

        <!-- BEGIN: select -->
        <div class="form-group">
            <div>
                <select name="custom_fields[{FIELD.field}]" class="form-control {FIELD.required} {FIELD.class}" onchange="validErrorHidden(this);" data-mess="">
                    <!-- BEGIN: loop -->
                    <option value="{FIELD_CHOICES.key}" {FIELD_CHOICES.selected}> {FIELD_CHOICES.value} </option>
                    <!-- END: loop -->
                </select>
            </div>
        </div>
        <!-- END: select -->

        <!-- BEGIN: radio -->
        <div>
            <div>
                <div class="form-group clearfix radio-box {FIELD.required}" data-mess="">
                    <label for="custom_fields[{FIELD.field}]" class="col-sm-8 control-label {FIELD.required}" title="{FIELD.description}"> {FIELD.title} </label>
                    <div class="btn-group col-sm-16">
                        <!-- BEGIN: loop -->
                        <label for="lb_{FIELD_CHOICES.id}" class="radio-box"> <input type="radio" name="custom_fields[{FIELD.field}]" value="{FIELD_CHOICES.key}" class="{FIELD.class}" onclick="validErrorHidden(this,5);" {FIELD_CHOICES.checked}> {FIELD_CHOICES.value} </label>
                        <!-- END: loop -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END: radio -->

        <!-- BEGIN: checkbox -->
        <div>
            <div>
                <div class="form-group clearfix check-box {FIELD.required}" data-mess="">
                    <label for="custom_fields[{FIELD.field}]" class="col-sm-8 control-label {FIELD.required}" title="{FIELD.description}"> {FIELD.title} </label>
                    <div class="btn-group col-sm-16">
                        <!-- BEGIN: loop -->
                        <label for="lb_{FIELD_CHOICES.id}" class="check-box"> <input type="checkbox" name="custom_fields[{FIELD.field}][]" value="{FIELD_CHOICES.key}" class="{FIELD.class}" onclick="validErrorHidden(this,5);" {FIELD_CHOICES.checked}> {FIELD_CHOICES.value} </label>
                        <!-- END: loop -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END: checkbox -->

        <!-- BEGIN: multiselect -->
        <div class="form-group">
            <div>
                <select name="custom_fields[{FIELD.field}][]" multiple="multiple" class="{FIELD.class} {FIELD.required} form-control" onchange="validErrorHidden(this);" data-mess="">
                    <!-- BEGIN: loop -->
                    <option value="{FIELD_CHOICES.key}" {FIELD_CHOICES.selected}>{FIELD_CHOICES.value}</option>
                    <!-- END: loop -->
                </select>
            </div>
        </div>
        <!-- END: multiselect -->
        <!-- END: loop -->
        <!-- END: field -->

        <!-- BEGIN: agreecheck -->
        <div>
            <div>
                <div class="form-group text-center check-box required" data-mess="">
                    <input type="checkbox" name="agreecheck" value="1" class="fix-box" onclick="validErrorHidden(this,3);"/>{LANG.accept2} <a onclick="usageTermsShow('{LANG.usage_terms}');" href="javascript:void(0);"><span class="btn btn-default btn-xs">{LANG.usage_terms}</span></a>
                </div>
            </div>
        </div>
        <!-- END: agreecheck -->

        <!-- BEGIN: reg_captcha -->
        <div class="form-group">
            <div class="middle text-center clearfix">
                <img class="captchaImg display-inline-block" src="{SRC_CAPTCHA}" width="{GFX_WIDTH}" height="{GFX_HEIGHT}" alt="{N_CAPTCHA}" title="{N_CAPTCHA}" />
                <em class="fa fa-pointer fa-refresh margin-left margin-right" title="{CAPTCHA_REFRESH}" onclick="change_captcha('.rsec');"></em>
                <input type="text" style="width:100px;" class="rsec required form-control display-inline-block" name="nv_seccode" value="" maxlength="{GFX_MAXLENGTH}" placeholder="{GLANG.securitycode}" data-pattern="/^(.){{GFX_MAXLENGTH},{GFX_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.securitycodeincorrect}" />
            </div>
        </div>
        <!-- END: reg_captcha -->
        <!-- BEGIN: reg_recaptcha -->
        <div class="form-group">
            <div class="middle text-center clearfix">
                <div class="nv-recaptcha-default">
                    <div id="{RECAPTCHA_ELEMENT}" data-toggle="recaptcha"></div>
                </div>
                <script type="text/javascript">
                    nv_recaptcha_elements.push({
                        id : "{RECAPTCHA_ELEMENT}",
                        btn : $('[type="submit"]', $('#{RECAPTCHA_ELEMENT}').parent().parent().parent().parent()),
                        pnum : 4,
                        btnselector : '[type="submit"]'
                    })
                </script>
            </div>
        </div>
        <!-- END: reg_recaptcha -->
        <div class="text-center margin-bottom-lg">
            <input type="hidden" name="checkss" value="{CHECKSS}" />
            <!-- BEGIN: redirect --><input name="nv_redirect" value="{REDIRECT}" type="hidden" /><!-- END: redirect -->
            <input type="button" value="{GLANG.reset}" class="btn btn-default" onclick="validReset(this.form);return!1;" />
            <input type="submit" class="btn btn-primary" value="{LANG.register}" />
        </div>
        <!-- BEGIN: lostactivelink -->
        <div class="text-center">
            <a href="{LOSTACTIVELINK_SRC}">{LANG.resend_activelink}</a>
        </div>
        <!-- END: lostactivelink -->
    </div>
</form>
