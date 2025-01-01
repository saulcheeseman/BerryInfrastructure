/**
 * This file for miscellaneous javascript/jquery functions.
 */

//
// Functions
//

// Return IE version or -1 for everything else
function getIeVersion(){

    // User agent
    var ua = navigator.userAgent;
    var version = -1

    // Is browser IE
    // Note: The custom UA used between WP IDS lib & AZ will not match here
    var ieRegex = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");

    if (ieRegex.exec(ua) == null){
        return version;
    }

    // Get the current "emulated" version of IE
    version = parseFloat(RegExp.$1);

    // Check compatibility mode
    if (ua.indexOf("Trident/6.0") > -1) {
        if (ua.indexOf("MSIE 7.0") > -1) {
            version = 10;
        }
    } else if (ua.indexOf("Trident/5.0") > -1) {
        if (ua.indexOf("MSIE 7.0") > -1) {
            version = 9;
        }
    } else if (ua.indexOf("Trident/4.0") > -1) {
        if (ua.indexOf("MSIE 7.0") > -1) {
            version = 8;
        }
    } else if (ua.indexOf("MSIE 7.0") > -1){
        version = 7;
    } else{
        version = 6;
    }

    // Return the lowest of ie version or document mode.
    return (version < document.documentMode)? version: document.documentMode;
}

// Clear message elements
function emptyMsg(){
    // Clear any validation messages
    $('#errorSpan').empty();
    // Hide any messages from previous server submit
    if($('#formId\\:messages').length){
        $('#msgSpan').hide();
    }
}

// Document ready
$(function() {

    //
    // Main various logic - on document ready
    //

    // Get browser
    var browser = getIeVersion();

    // Enable placeholder support
    $('input').placeholder();

    // Disable HTML5 client validation on the forms.
    $('#formId').attr('novalidate', 'novalidate');

    // This is a workarounds for IE.
    if(browser != -1) {

        // Remove custom checkbox for IE lt 9
        if (browser < 9)  {
            if($("div[title='checkbox']").length){
                $("div[title='checkbox']").removeClass('customCheckbox');
            }
        }

        // IE9-10 to work with RichFaces Ajax
        if (browser > 8) {
            window.XMLSerializer = function() {};
            window.XMLSerializer.prototype.serializeToString = function(oNode) {
                return oNode.xml;
            };
        }
    }

    // For browsers that support type="email".
    // Ensure any active email inputText fields (that are not hidden)
    // are type="email" when field is in focus, and is type="text"
    // after it is changed.
    if(browser == -1 || browser > 9) {
        // When in focus, change email input field type to "email".
        //   KIL: Dynamic changing of fields causes a JS error on IE9 and lower.
        // Note: JSF1.2 does NOT support type="email". Even if it did,
        //   browser enforcement of email type displays non-localized messages
        //   (i.e., english only) so we don't want to ask for type="email".
        //   Instead we intentionally rely on our own server-side validation.
        if ($('#formId\\:email').length) {
            // When the email field is not readonly,
            if (!$('#formId\\:email').is('[readonly]')) {
                // Set the field type to 'email' upon page is finished loading.
                $('#formId\\:email').prop('type', 'email');

                // Remove all auto features for mobile devices
                $('#formId\\:email').attr("autocapitalize", "off")
                        .attr("autocomplete", "off").attr("autocorrect", "off").attr(
                                "spellcheck", "false");
            }
        }

        if ($('#formId\\:password').length) {
            // Remove all auto features for mobile devices
            $('#formId\\:password').attr("autocapitalize", "off")
                    .attr("autocomplete", "off").attr("autocorrect", "off").attr(
                            "spellcheck", "false");
        }

        if ($('#formId\\:cpassword').length) {
            // Remove all auto features for mobile devices
            $('#formId\\:cpassword').attr("autocapitalize", "off")
                    .attr("autocomplete", "off").attr("autocorrect", "off").attr(
                            "spellcheck", "false");
        }

        if ($('#formId\\:npassword').length) {
            // Remove all auto features for mobile devices
            $('#formId\\:npassword').attr("autocapitalize", "off")
                    .attr("autocomplete", "off").attr("autocorrect", "off").attr(
                            "spellcheck", "false");
        }

        if ($('#formId\\:opassword').length) {
            // Remove all auto features for mobile devices
            $('#formId\\:opassword').attr("autocapitalize", "off")
                    .attr("autocomplete", "off").attr("autocorrect", "off").attr(
                            "spellcheck", "false");
        }

        if ($('#formId\\:squestion').length) {
            // Remove all auto features for mobile devices
            $('#formId\\:squestion').attr("autocapitalize", "off")
                    .attr("autocomplete", "off").attr("autocorrect", "off").attr(
                            "spellcheck", "false");
        }

        if ($('#formId\\:sanswer').length) {
            // Remove all auto features for mobile devices
            $('#formId\\:sanswer').attr("autocapitalize", "off")
                    .attr("autocomplete", "off").attr("autocorrect", "off").attr(
                            "spellcheck", "false");
        }

        if ($('#formId\\:passwordRecoveryEmail').length) {
            // When the email field is not readonly,
            if (!$('#formId\\:passwordRecoveryEmail').is('[readonly]')) {
                
            	// Set the field type to 'email' upon finished loading the page.
                $('#formId\\:passwordRecoveryEmail').prop('type', 'email');

                // Remove all auto features for mobile devices
                $('#formId\\:passwordRecoveryEmail').attr("autocapitalize", "off")
                        .attr("autocomplete", "off").attr("autocorrect", "off").attr(
                                "spellcheck", "false");
            }
        }
    }

    // If password masker component exists enable it for browsers that support it.
    if($("#passwordMasker").length){
        if(browser == -1 || browser > 9) {
            // Add masking/unmasking capabilities to the password element.
            if($("#formId\\:password").length){
                $("#passwordMasker").addMasking($("#formId\\:password"));
            }
            // Add masking/unmasking capabilities to the confirmation password element.
            if($("#formId\\:cpassword").length){
                $("#passwordMasker").addMasking($("#formId\\:cpassword"));
            }
            // Add masking/unmasking capabilities to the current password element.
            if($("#formId\\:opassword").length){
                $("#passwordMasker").addMasking($("#formId\\:opassword"));
            }
            // Add masking/unmasking capabilities to the new password element.
            if($("#formId\\:npassword").length){
                $("#passwordMasker").addMasking($("#formId\\:npassword"));
            }
        } else {
            $("#passwordMasker").css('display', 'none');
        }
    }

    if(browser == -1 || browser > 7){
        // Add formnovalidate attribute to back and cancel buttons to prevent any
        // kind of html5 validation
        if($('#formId\\:back').length) {
            $('#formId\\:back').attr('formnovalidate', 'formnovalidate');
        }
        if ($('#formId\\:cancel').length) {
            $('#formId\\:cancel').attr('formnovalidate', 'formnovalidate');
        }
    }


    /*
     * Element that has confirmEmailLink id has already click event we need to bind
     * another click event. confirmEmailLink id is not jsf element so it does not
     * need 'formId\\:' part.
     */
    $('#confirmEmailLink').bind('click', function() {
        $('#formId\\:unconfirmedEmailLink').css('display', 'none');
        $('#formId\\:confirm_sent').css('display', 'inline');
        $('#confirmEmailLink').css('display', 'none');
    });

    // Prevent multiple submits
    $('#formId').submit(function() {
        if (this.submitted) {
            return false;
        } else {
            this.submitted = true;
            // Visual indication
            $('#formId\\:input').attr('readonly', true);
        }
    });

    // Preventing double click by switching spans in button component. Timeout
    // is added to switch spans back so that a link is active in case a user
    // presses Escape or clicks on browser's stop button.
    var enableLink = function(id, disabledId) {
        $(disabledId).css('display', 'none');
        $(id).css('display', 'inline');
    }
    $('.awButtonWrapper').click(function() {
        var id = '#' + this.id;
        var disabledId =  id + 'Disabled';
        $(id).css('display', 'none');
        $(disabledId).css('display', 'inline');
        setTimeout(function() { enableLink(id, disabledId) }, 500);
    });

});
