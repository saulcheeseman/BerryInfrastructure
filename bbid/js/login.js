/*
 * Script for login page.
 * Validate input fields on submit.
 */

// Document ready
$(function() {

    //
    // Functions
    //

    // Validate input fields. Used by onEnter and login button click events.
    function validateSubmit(e) {

        // Clear messages
        emptyMsg();

        // Check email validity. if email value is still username hint pass an empty string.
        var email = $('#formId\\:email').val() == usernameHint ? "" : $('#formId\\:email').val();
        var errMsg = validateEmail(email, emailLabel);

        // Check password validity
        errMsg += validatePassword($('#formId\\:password').val(), passwordLabel);

        // Check captcha if present
        if ($('#formId\\:verifyCaptcha').length) {
            errMsg += validateCaptcha($('#formId\\:verifyCaptcha').val(), captchaLabel);
        }

        if (errMsg != "") {
            // We have errors on this page. Cancel default behaviour.
            e.preventDefault();

            // Show input validation errors
            $('#errorSpan').html(errMsg);

            // Clear captcha input field and re-render captcha image.
            clearReRenderCaptcha();
        } else {
            // Prevent double click.
            $('#formId\\:logincommandLink').attr('disabled');
        }
    }

    //
    // Main login logic
    //

    // Script that is used by login page: to initialize variables if op or az
    if(rpTypeAppOrRealm && !isBBLinkCss) {
        // For BlackBerry Link, hide 'Remember Me' and 'To access'.
        // Use RP DisplayName for 'To Access' label if available
        if (rpDisplayName.length) {
            realm = rpDisplayName;
        }
        if(realm.length) {
            // Add a realm text to the realm label
            $('#realmLabel').html(unescape(realm));
            if(isOpenIdProvider) {
                // Do not display "To access" section on challenge for edit
                $('#openidRealmSection').css('display', 'inline');
            }
        }
        if (rpTypeRealm) {
            $('#rememberMe').css('display', 'inline');
        }
    }

    // Show any server error messages from previous submit.
    if ($.trim($('#formId\\:messages').html()) != '') {
        $('#msgSpan').show();
    }

    // Validate input fields before submitting the form on keypress/enter
    // event. Since Cancel button is type submit we need to cancel default
    // and fire login button click event.
    $(document).keypress(function(e) {
        if (e.which == 13 || e.KeyCode == 13) {
            $('#formId\\:logincommandLink').click();
            e.preventDefault();
            e.stopPropagation();
        }
    });

    // Validate input fields before submitting the form on login button click event.
    $('#formId\\:logincommandLink').click(function(e) {
        validateSubmit(e);
    });

    // Disable captcha on cancel button click.
    $('formId\\:cancelcommandLink').click(function() {
        $('#formId\\:verifyCaptcha').attr('disabled');

    });

    // Empty messages when captcha or password are in focus.
    $('#formId\\:password, #formId\\:verifyCaptcha').focus( function() {
        // Clear messages
        emptyMsg();
    });

    // Empty messages whenever the email field changes value
    // (and it's not readonly).
    if (!$('#formId\\:email').is('[readonly]')) {
        $('#formId\\:email').change(function() {
            // Clear messages
            emptyMsg();
        });

        // Make sure it has a placeholder
        $('#formId\\:email').attr("placeholder", usernameHint);
    }

});
