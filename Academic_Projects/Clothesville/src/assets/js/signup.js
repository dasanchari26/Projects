//var check_name = 1;
var check_email = 1;
var check_pwd = 1;

/*function validateName(event){
	var name = event.currentTarget;
	// /^[A-Za-z ]+$/ or /^[A-Za-z\s]+$/
	var pos = name.value.search(/^[A-Za-z0-9]+$/);
	if (pos != 0) {
		alert("The name you entered (" + name.value + ") is not valid.");
		name.focus();
		name.select();
		check_name = 0;
		return false;
	}
	else {check_name = 1;}
}*/

function validateEmail(event){
	var email = event.currentTarget;
	var pos = email.value.search(/^\w+([\.-]?\w+)*@\w+(([\.]?\w+){0,2})(\.\w{2,3})/);

	if (pos != 0){
		alert("The email you entered (" + email.value + ") is not valid.");
		email.focus();
		email.select();
		check_email = 0;
		return false;
	}
	else {check_email = 1;}
}

function validatePassword(event){

	//alert ("hi");
	var sec = document.getElementById("retypePassword");
	var init = document.getElementById("myPassword");
  	if (init.value == "") {
    		alert("You did not enter a password \n" +"Please enter one now");
    		init.focus();
		check_pwd = 0;
    		return false;
	} else if (init.value != sec.value && sec.value!="") {
        		alert("The two passwords you entered are not the same \n" + "Please re-enter both now");
        		init.focus();
        		init.select();
        		check_pwd = 0;
        		return false;
    	} else {
		check_pwd = 1;
		//return true;
    	}
}

function checkVal(){
	if(!(check_email && check_pwd)) { //&& check_name
	
		if(!check_email) {alert("The email you entered is not valid.");}

		//else
		//if(!check_name) { alert("The name you entered is not valid."); }

		//else 
		if(!check_pwd) {alert ("The password you entered is not valid."); }
			
		return false; }
}
