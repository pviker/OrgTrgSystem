/** confirms 2nd passwd with 1st passwd **/
function validatePwd() {
	passwd = document.getElementById( "password" ).value;
	confirmPasswd = document.getElementById( "confirmPassword" ).value;
	
	if (passwd == confirmPasswd){
		formValid(true);
		document.getElementById( "spanPassword" ).innerHTML = "Passwords match!";
	}  else if (passwd != confirmPasswd){
		formValid(false);
		document.getElementById( "spanPassword" ).innerHTML = "Passwords do not match!";
	}
}

/** Flags submit button if fields are invald **/
function formValid(flag) {
	if (flag == true){
		document.getElementById( "submit" ).type = "submit";
		document.getElementById( "submit" ).style.opacity = 1;
	} else if (flag == false){
		document.getElementById( "submit" ).type = "button";
		document.getElementById( "submit" ).style.opacity = .5;
	}
}