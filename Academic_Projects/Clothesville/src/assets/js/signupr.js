//signupr.js


	  //var nameNode = document.getElementById("myName");
	  var emailNode = document.getElementById("myEmail");
	  var addressNode = document.getElementById("myHome");
	  var pwd1Node = document.getElementById("myPassword");  
	  var pwd2Node = document.getElementById("retypePassword");	  
      
      	// nameNode.addEventListener("change", validateName, false);
        // addressNode.addEventListener("change", validateAddress, false);
	  emailNode.addEventListener("change", validateEmail, false);
	  pwd1Node.addEventListener("change", validatePassword, false);
      	  pwd2Node.addEventListener("change", validatePassword, false);