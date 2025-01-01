<?php
// login page for blackberry link, currently does nothing
?>
<!DOCTYPE html >


    <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
            <meta name="viewport" content="initial-scale=1, minimum-scale=1.0" />
            <script src="/bbid/a4j/g/3_3_3.Finalorg.ajax4jsf.javascript.AjaxScript" type="text/javascript"></script><script id="org.ajax4jsf.queue_script" type="text/javascript">if (typeof A4J != 'undefined') { if (A4J.AJAX) { with (A4J.AJAX) {if (!EventQueue.getQueue('org.richfaces.queue.global')) { EventQueue.addQueue(new EventQueue('org.richfaces.queue.global',null,null)) };}}};</script><link rel="shortcut icon" href="/bbid/img/favicon.ico" />
            <link type="text/css" href="/bbid/css/general.css" rel="stylesheet" />
            <script src="/bbid/js/jquery-min.js" type="text/javascript"></script>
            <script src="/bbid/js/jquery.placeholder.min.js" type="text/javascript"></script>
            <script src="/bbid/js/validation.js" type="text/javascript"></script>
            <script src="/bbid/js/various.js" type="text/javascript"></script>

            <title>Sign In to BlackBerry ID</title>
            <script type="text/javascript">
                var name = "bbidcchk";
                document.cookie = name + " = 1; secure; path=/bbid";
                if (document.cookie.indexOf(name) == -1 || !navigator.cookieEnabled) {
                    window.location = "/bbid/nocookies.seam";
                }
            </script>
        <link href="/bbid/css/login.css" type="text/css" rel="stylesheet" />
        <link href="/bbid/css/inlineList.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript">
            // The following variables are used by login, various, and validation javascripts.
            var rpTypeAppOrRealm = false;
            var rpTypeRealm = false;
            var realm = "";
            var rpDisplayName = "";
            var isBBLinkCss = false;
            var isOpenIdProvider = false;
            var popup = false;
            var cssId = "";
            var errMsg_mandatoryFieldEmpty = "%1 is required.";
            var errMsg_invalidEmailFormat = "%1 is an invalid email format.  Please provide a valid email address to continue.";
            var errMsg_invalidPwdFormat = "%1 does not meet either the length or security requirements.  Please enter a password that has a minimum of 6 characters.";
            var errMsg_invalidCaptcha = "The text entered does not match the verification code. Please try again.";
            var emailLabel = "Username";
            var passwordLabel = "Password";
            var captchaLabel = "Verification code";
            var usernameHint = " Email Address";
        </script>
        <script src="/bbid/js/login.js" type="text/javascript"></script>
        </head>
        <body>
    <noscript>
        <meta http-equiv="Refresh" content="10; URL=/bbid/nojs.seam" />
    </noscript><div id="banner">
        <h1>
            <img src="/bbid/img/images/blackberryLogo.png" alt="BlackBerry" />
        </h1></div>
            <div id="content"><div id="pageTitle">
                    <h1>Sign In to BlackBerry ID
                    </h1></div>
        <div id="signInSection" class="section">
<form id="formId" name="formId" method="post" action="/bbid/login" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="formId" value="formId" />

                <dl id="openidRealmSection" class="required">
                    <dt>To access:
                    </dt>
                    <dd>
                        <div id="realmLabel"></div>
                    </dd>
                </dl>
                <span id="errorSpan"></span>
                <span id="msgSpan">
                </span><label for="formId:email">
Username</label><input id="formId:email" type="text" name="formId:email" autocomplete="off" value="" class="directionLtr" maxlength="256" /><label for="formId:password">
Password</label><input id="formId:password" type="password" name="formId:password" autocomplete="off" value="" maxlength="20" onfocus="" />
                <p id="rememberMe"><input id="formId:stayloggedin" type="checkbox" name="formId:stayloggedin" />Remember me 
                </p>
                <p>
<script type="text/javascript" src="/bbid/com_sun_faces_sunjsf.js.seam"></script>
<a id="formId:forgotPassword" href="#" onclick="if(typeof jsfcljs == 'function'){jsfcljs(document.getElementById('formId'),{'formId:forgotPassword':'formId:forgotPassword'},'');}return false">Forgot password?</a>
                </p>
                <p>
                </p>
                <div class="legal">
                </div>
                <p id="actions"><input id="formId:logincommandLink" type="submit" name="formId:logincommandLink" value="Sign In" onclick="" /><script language="JavaScript" type="text/javascript">var cp_logincommandLink = new Function("event", "{if (document.getElementById){var form = document.getElementById('formId');var input = document.createElement('input');if (document.all){ input.type = 'hidden';input.name = 'conversationPropagation';input.value = 'join';}else if (document.getElementById) {input.setAttribute('type', 'hidden');input.setAttribute('name', 'conversationPropagation');input.setAttribute('value', 'join');}form.appendChild(input);return true;}}");if (document.getElementById('formId:logincommandLink')){document.getElementById('formId:logincommandLink').onclick = new Function("event", "{if (document.getElementById){var form = document.getElementById('formId');var input = document.createElement('input');if (document.all){ input.type = 'hidden';input.name = 'conversationPropagation';input.value = 'join';}else if (document.getElementById) {input.setAttribute('type', 'hidden');input.setAttribute('name', 'conversationPropagation');input.setAttribute('value', 'join');}form.appendChild(input);return true;}}");}</script>
                </p>
   <input type="hidden" name="callbackuri" id="callbackuri" value="" />
   <input type="hidden" name="userdata" id="userdata" value="" />
   <input type="hidden" name="authtype" id="authtype" value="" />
   <input type="hidden" name="openidmode" id="openidmode" value="" />
   <input type="hidden" name="css" id="css" value="" />
   <input type="hidden" name="realm" id="realm" value="" />
   <input type="hidden" name="requireConfirmedEmail" id="requireConfirmedEmail" value="" />
   <input type="hidden" name="username" value="" />
   <input type="hidden" name="rpid" value="" />
   <input type="hidden" name="sig" value="" />
   <input type="hidden" name="azEdit" value="false" /><input type="hidden" name="csrfToken" value="ZmQ3MDhjMGMtYjkwYy00NzcxLWI4ZTgtNGM2NDgwNmIyMGZm" /><input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="j_id1" />
</form>
        </div><div id="productDescription" class="section">
            <p>BlackBerry ID is your single sign in to BlackBerry sites, services, and applications. Sign in with your existing BlackBerry ID and get more from your BlackBerry experience.
            </p>
            <p id="createNew"><a href="/bbid/login?authtype=&amp;userdata=&amp;openidmode=&amp;azEdit=false&amp;realm=&amp;requireConfirmedEmail=&amp;rpid=&amp;callbackuri=&amp;css=&amp;sig=&amp;actionMethod=main%2Flogin.xhtml%3Aaccountmanager.toCreate&amp;i=308639" id="toCreate2">Don't have a BlackBerry ID? Create one.</a>
            </p></div>
            </div><div id="footer">
        <ul id="contactInformation">
            <li>
                <a href="http://na.blackberry.com/contact/" target="_blank">Contact Us
                </a>
            </li>
            <li>
                <a href="http://na.blackberry.com/legal/privacy_policy.jsp" target="_blank">Privacy Policy
                </a>
            </li>
            <li>
                <a href="http://na.blackberry.com/legal/" target="_blank">Legal
                </a>
            </li>
        </ul>
        <p id="copyright">Copyright &copy; 2014 Research In Motion Limited, unless otherwise noted. Version 1.7.0-SNAPSHOT-20170320_1610
        </p></div>
        </body>
    </html>