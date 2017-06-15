// JavaScript Document

function formcomplaints(form, option) {
	if (option != 6) {
		var a = confirm("Are you sure you wish to submit");
		if (a == false) {
			return false;
		}
	}

	//document.getElementById("ReportedYes").checked
	//alert(document.getElementById("ReportedtoOtherInstitution").value); //return false;

	if (!form.Anonymous.checked) {
		if (form.LastName == '' || form.FirstName == '' || form.GenderID == '' || form.GenderID == '0' ||
			form.AgeCategoryID == '' || form.AgeCategoryID == '0' || form.ReferenceID == '' || form.ReferenceID == '0') {
			document.getElementById('msg').innerHTML = 'Fill in all the required fields';
			document.getElementById('msg1').innerHTML = 'Fill in all the required fields';
			return false;
		}
	}
	/*
	 if (form.NatureofComplaintID == '' || form.NatureofComplaintID == '0' ||
	 form.IncidentCountyID == '' || form.IncidentCountyID == '0' ||
	 form.InstitutionID == '' || form.InstitutionID == '0' ||
	 form.Individual == '' || form.IncidentPlace == '' || form.IncidentDate || ComplaintSummary == '')
	 {
	 document.getElementById('msg').innerHTML = 'Fill in all the required fields';
	 document.getElementById('msg1').innerHTML = 'Fill in all the required fields';
	 return false;
	 }

	 if (document.getElementById("ReportedYes").checked == true && form.InstitutionOutcome == '')
	 {
	 document.getElementById('msg').innerHTML = 'Fill in all the required fields';
	 document.getElementById('msg1').innerHTML = 'Fill in all the required fields';
	 return false;
	 }
	 if (document.getElementById("ReportedOtherYes").checked == true && form.Organization == '')
	 {
	 document.getElementById('msg').innerHTML = 'Fill in all the required fields';
	 document.getElementById('msg1').innerHTML = 'Fill in all the required fields';
	 return false;
	 }
	 */
	var p = document.createElement("input");
	form.appendChild(p);
	p.name = "ComplaintStatusID";
	p.type = "hidden";
	p.value = option;

	// Finally submit the form.
	form.submit();
}

function formhash(form) {
	// Create a new element input, this will be our hashed password field.
	Password = form.Password.value;
	var p = document.createElement("input");

	// Add the new element to our form.
	form.appendChild(p);
	p.name = "p";
	p.type = "hidden";
	p.value = hex_sha512(Password);

	// Make sure the plaintext password doesn't get sent.
	Password.value = "";

	// Finally submit the form.
	form.submit();
}

function changephash(form, OldPassword, NewPassword, ConfirmPassword) {
	// Create a new element input, this will be our hashed password field.
	if (OldPassword.value == '' || NewPassword.value == '' || ConfirmPassword.value == '') {
		document.getElementById('msg').innerHTML = 'You must provide all the requested details. Please try again';
		//alert('You must provide all the requested details. Please try again');
		return false;
	}
	//alert(NewPassword.value+' ' + ConfirmPassword.value);

	// Check password and confirmation are the same
	if (NewPassword.value != ConfirmPassword.value) {
		document.getElementById('msg').innerHTML = 'Your password and confirmation do not match. Please try again';
		form.NewPassword.focus();
		return false;
	}

	// Check that the password is sufficiently long (min 6 chars)
	// The check is duplicated below, but this is included to give more
	// specific guidance to the user
	if (NewPassword.value.length < 6) {
		document.getElementById('msg').innerHTML = 'Passwords must be at least 6 characters long.  Please try again';
		form.password.focus();
		return false;
	}

	// At least one number, one lowercase and one uppercase letter
	// At least six characters

	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	if (!re.test(NewPassword.value)) {
		document.getElementById('msg').innerHTML = 'Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again';
		return false;
	}

	var op = document.createElement("input");
	var np = document.createElement("input");
	var cp = document.createElement("input");

	// Add the new element to our form.
	form.appendChild(op);
	op.name = "op";
	op.type = "hidden";
	op.value = hex_sha512(OldPassword.value);

	form.appendChild(np);
	np.name = "np";
	np.type = "hidden";
	np.value = hex_sha512(NewPassword.value);

	form.appendChild(cp);
	cp.name = "cp";
	cp.type = "hidden";
	cp.value = hex_sha512(ConfirmPassword.value);


	// Make sure the plaintext password doesn't get sent.
	OldPassword.value = "";
	NewPassword = "";
	ConfirmPassword = "";

	// Finally submit the form.
	form.submit();
	console.log($(form).submit());
}

function resetphash(form, NewPassword, ConfirmPassword) {
	// Create a new element input, this will be our hashed password field.
	if (NewPassword.value == '' || ConfirmPassword.value == '') {
		document.getElementById('msg').innerHTML = 'You must provide all the requested details. Please try again';
		//alert('You must provide all the requested details. Please try again');
		return false;
	}

	// Check password and confirmation are the same
	if (NewPassword.value != ConfirmPassword.value) {
		document.getElementById('msg').innerHTML = 'Your password and confirmation do not match. Please try again';
		form.NewPassword.focus();
		return false;
	}

	// Check that the password is sufficiently long (min 6 chars)
	// The check is duplicated below, but this is included to give more
	// specific guidance to the user
	if (NewPassword.value.length < 6) {
		document.getElementById('msg').innerHTML = 'Passwords must be at least 6 characters long.  Please try again';
		form.password.focus();
		return false;
	}

	// At least one number, one lowercase and one uppercase letter
	// At least six characters

	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	if (!re.test(NewPassword.value)) {
		document.getElementById('msg').innerHTML = 'Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again';
		return false;
	}

	var np = document.createElement("input");
	var cp = document.createElement("input");

	// Add the new element to our form.
	form.appendChild(np);
	np.name = "np";
	np.type = "hidden";
	np.value = hex_sha512(NewPassword.value);

	form.appendChild(cp);
	cp.name = "cp";
	cp.type = "hidden";
	cp.value = hex_sha512(ConfirmPassword.value);


	// Make sure the plaintext password doesn't get sent.
	NewPassword = "";
	ConfirmPassword = "";

	// Finally submit the form.
	form.submit();
	//console.log($(form).submit());
}

function regformhash(form) {
	username = form.UserName.value;
	password = form.Password.value;
	confpass = form.ConfirmPassword.value;

	// Check each field has a value
	if (password == '' || confpass == '' || username == '') {
		alert('You must provide all the requested details. Please try again');
		return false;
	}

	re = /^\w+$/;
	if (!re.test(form.UserName.value)) {
		alert("Username must contain only letters, numbers and underscores. Please try again");
		form.UserName.focus();
		return false;
	}

	// Check that the password is sufficiently long (min 6 chars)
	// The check is duplicated below, but this is included to give more
	// specific guidance to the user
	if (password.length < 6) {
		alert('Passwords must be at least 6 characters long.  Please try again');
		form.Password.focus();
		return false;
	}

	// At least one number, one lowercase and one uppercase letter
	// At least six characters

	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	if (!re.test(password)) {
		alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
		return false;
	}

	// Check password and confirmation are the same
	if (password != confpass) {
		alert('Your Password and Confirmed Password do not match. Please try again');
		return false;
	}
	// Create a new element input, this will be our hashed password field.
	var p = document.createElement("input");

	// Add the new element to our form.
	form.appendChild(p);
	p.name = "p";
	p.type = "hidden";
	p.value = hex_sha512(password);

	// Make sure the plaintext password doesn't get sent.
	form.Password.value = "";
	form.ConfirmPassword.value = "";

	// Finally submit the form.
	form.submit();
	return true;
}

function regbusformhash(form) {
	var Password = form.Password.value;
	var BusinessID = form.BusinessID.value;
	var BusinessName = form.BusinessName.value;
	var FirstName = form.FirstName.value;
	var LastName = form.LastName.value;
	var Email = form.Email.value;
	var Mobile = form.Mobile.value;
	var CountyID = form.CountyID.value;
	var CategoryID = form.CategoryID.value;

	// Check each field has a value
	if (Password == '' || BusinessName == '' || FirstName == '' || LastName == '' || Email == '' || Mobile == '' || CountyID == '' || CountyID == '0' || CategoryID == '' || CategoryID == '0') {
		alert('You must provide all the requested details. Please try again');
		return false;
	}

	re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!re.test(form.Email.value)) {
		alert("Please enter a valid Email Address");
		form.Email.focus();
		return false;
	}

	// Check that the password is sufficiently long (min 6 chars)
	// The check is duplicated below, but this is included to give more
	// specific guidance to the user
	if (Password.length < 6) {
		alert('Passwords must be at least 6 characters long.  Please try again');
		form.Password.focus();
		return false;
	}

	// At least one number, one lowercase and one uppercase letter
	// At least six characters

	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	if (!re.test(Password)) {
		alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
		return false;
	}

	// Create a new element input, this will be our hashed password field.
	var p = document.createElement("input");

	// Add the new element to our form.

	form.appendChild(p);
	p.name = "p";
	p.type = "hidden";
	p.value = hex_sha512(Password);

	// Make sure the plaintext password doesn't get sent.
	form.Password.value = "";

	// Finally submit the form.
	form.submit();
	return true;
}

function workflowreview(form) {
	if (form.editorText) {
		//alert(editor.getData()); 
		if (!form.TemplateText) {
			var TemplateText = document.createElement("input");
		}
		// Add the new element to our form. 
		form.appendChild(TemplateText);
		TemplateText.name = "Letter";
		TemplateText.type = "hidden";
		TemplateText.value = editor.getData();
	}
	// Finally submit the form. 
	form.submit();
	return true;
}