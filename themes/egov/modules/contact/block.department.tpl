<!-- BEGIN: main -->
    <div class="text-center">
        <span style="font-size: 20px; text-transform: uppercase;">
            <strong>{DEPARTMENT.full_name}</strong>
        </span>
        <!-- BEGIN: address -->
            <p>{LANG.address}: {DEPARTMENT.address}</p>
        <!-- END: address -->
        <!-- BEGIN: phone -->
            <p>{LANG.phone}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><!-- BEGIN: href --><a href="tel:{PHONE.href}"><!-- END: href -->{PHONE.number}<!-- BEGIN: href2 --></a><!-- END: href2 --><!-- END: item --></p>
        <!-- END: phone -->
        <!-- BEGIN: fax -->
            <p>{LANG.fax}: {DEPARTMENT.fax}</p>
        <!-- END: fax -->
        <!-- BEGIN: email -->
            <p>{LANG.email}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><a href="{DEPARTMENT.emailhref}">{EMAIL}</a><!-- END: item --></p>
        <!-- END: email -->
        <!-- BEGIN: yahoo -->
            <p>{YAHOO.name}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><a href="ymsgr:SendIM?{YAHOO.value}" title="{YAHOO.name}">{YAHOO.value}</a><!-- END: item --></p>
        <!-- END: yahoo -->
        <!-- BEGIN: skype -->
            <p>{SKYPE.name}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><a href="skype:{SKYPE.value}?call" title="{SKYPE.name}">{SKYPE.value}</a><!-- END: item --></p>
        <!-- END: skype -->
        <!-- BEGIN: viber -->
            <p>{VIBER.name}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma -->{VIBER.value}<!-- END: item --></p>
        <!-- END: viber -->
        <!-- BEGIN: icq -->
            <p>{ICQ.name}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><a href="icq:message?uin={ICQ.value}" title="{ICQ.name}">{ICQ.value}</a><!-- END: item --></p>
        <!-- END: icq -->
    </div>
<!-- END: main -->