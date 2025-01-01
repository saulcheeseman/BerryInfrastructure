function validateEmail( field, label ) {
	var errMsg = new String("");
	
	if( !validateNotEmpty(field) ) {
		errMsg += errMsg_mandatoryFieldEmpty + "<br/>";
		errMsg = errMsg.replace( "%1", label );
	}
	return errMsg;
}

function validatePassword( field, label ) {
	var errMsg = new String("");
	
	if( !validateNotEmpty(field) ) {
		errMsg += errMsg_mandatoryFieldEmpty + "<br/>";
		errMsg = errMsg.replace( "%1", label );	
	}
	return errMsg;	
}

function validatePasswordChars( field, label) {
	var errMsg = new String("");
	for (var i=0;i<field.length;i++) {
		var asciiNum = field.charCodeAt(i);
		if (asciiNum < 33 || asciiNum > 126) {
			errMsg += errMsg_invalidchar + "<br/>";
			errMsg = errMsg.replace( "%1", label );
			break;
		}		
	}
	return errMsg
}

function validateConfirmPassword( confirmpassword, password, label ) {
	var errMsg = new String("");
	
	if( !validateNotEmpty(confirmpassword) ) {
		errMsg += errMsg_mandatoryFieldEmpty + "<br/>";
		errMsg = errMsg.replace( "%1", label );	
	}
	else if( confirmpassword != password ) {
		errMsg += errMsg_invalidcpassword + "<br/>";
	}
	return errMsg;	
}

function validateSecurityQues( field, label ) {
	var errMsg = new String("");

	if( !validateNotEmpty(field) ) {
		errMsg += errMsg_mandatoryFieldEmpty + "<br/>";
		errMsg = errMsg.replace( "%1", label );
	}
	else if( field.length < 2 ) {
		errMsg += errMsg_invalidFieldLength +  "<br/>";
		errMsg = errMsg.replace( "%1", label );
	}	
	return errMsg;
}

function validateSecurityAns( field, label ) {
	var errMsg = new String("");

	if( !validateNotEmpty(field) ) {
		errMsg += errMsg_mandatoryFieldEmpty + "<br/>";
		errMsg = errMsg.replace( "%1", label );
	}
	else if( field.length < 2 ) {
		errMsg += errMsg_invalidFieldLength +  "<br/>";
		errMsg = errMsg.replace( "%1", label );
	}	
	return errMsg;
}

function validateFirstname( field, label ) {
	//No Validation here, not mandatory
	return new String("");
}

function validateLastname( field, label ) {
	//No Validation here, not mandatory
	return new String("");
}

function validateNickname( field, label ) {
	var errMsg = validateBasic( field, label );

	return errMsg;
}

function validateNotEmpty( field ) {
	var valid = true;
	if(field == null || field == "") {
		valid = false;
	}
	return valid;
}

function validateBasic( field, label ) {
	var errMsg = new String("");
	
	if( !validateNotEmpty(field) ) {
		errMsg += errMsg_mandatoryFieldEmpty + "<br/>";
		errMsg = errMsg.replace( "%1", label );
	}

	return errMsg;
}

function validateCaptcha( field, label ) {
	var errMsg = new String("");

	if( !validateNotEmpty(field) ) {
		errMsg += errMsg_mandatoryFieldEmpty + "<br/>";
		errMsg = errMsg.replace( "%1", label );
	}
	
	return errMsg;
}

function clearReRenderCaptcha() {
	if (document.getElementById("formId:verifyCaptcha") != null) {
		document.getElementById("formId:verifyCaptcha").value = "";
		
		// This functions is created by a4j:jsFunction component. It is used to 
		// re-render captcha on any js validation errors. 
		reRenderCaptcha();
	}
}
