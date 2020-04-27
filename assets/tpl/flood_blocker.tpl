<!-- BEGIN: main -->
<!DOCTYPE html>
<html lang="{LANG.Content_Language}" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{PAGE_TITLE}</title>
        <style type="text/css">
            .floodblocker {
                font: normal 14px/25px Arial, Helvetica, sans-serif;
                margin: 50px;
                padding: 50px;
                text-align: center
            }

            .floodblocker span {
                font: bold 14px/25px Arial, Helvetica, sans-serif;
            }

            #secField {
                color: #FF5B0D;
                font: bold 18px/25px Arial, Helvetica, sans-serif
            }

            .g-recaptcha {
                width: 304px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="floodblocker">
            <img alt="{PAGE_TITLE}" src="{IMG_SRC}" width="{IMG_WIDTH}" height="{IMG_HEIGHT}" />
            <br/>
            {FLOOD_BLOCKER_INFO1}.
            <br/>
            <span>{FLOOD_BLOCKER_INFO2} <span id="secField">{FLOOD_BLOCKER_TIME}</span> {FLOOD_BLOCKER_INFO3}...</span>

            <!-- BEGIN: captchapass -->
            <form method="post" action="{NV_BASE_SITEURL}" id="formPassFlood">
                <p>{GLANG.flood_captcha_pass}.</p>
                <script src="https://www.google.com/recaptcha/api.js?hl={CATPCHA_LANG}&amp;onload=buildRecaptcha&amp;render=explicit" async defer></script>
                <script type="text/javascript">
                function buildRecaptcha() {
                    grecaptcha.render('g-recaptcha', {
                        'sitekey' : '{SITE_KEY}',
                        'callback' : function(code) {
                            if (code) {
                                document.getElementById("formPassFlood").submit();
                            }
                        },
                        'type' : '{CATPCHA_TYPE}'
                    });
                }
                </script>
                <div class="g-recaptcha" id="g-recaptcha"></div>
                <input type="hidden" name="captcha_pass_flood" value="1">
                <input type="hidden" name="tokend" value="{TOKEND}">
                <input type="hidden" name="redirect" value="{REDIRECT}">
            </form>
            <!-- END: captchapass -->
        </div>
        <script type="text/javascript">
            var Timeout = '{FLOOD_BLOCKER_TIME}';
            var timeBegin = new Date();
            var msBegin = timeBegin.getTime();
            function showSeconds() {
                var timeCurrent = new Date();
                var msCurrent = timeCurrent.getTime();
                var ms = Math.round((msCurrent - msBegin) / 1000);
                document.getElementById('secField').innerHTML = Timeout - ms;
                if (Timeout <= ms) {
                    location.reload();
                }
            }

            timerID = setInterval("showSeconds()", 1000);
        </script>
    </body>
</html>
<!-- END: main -->
