
//Password match check

<script type="text/javascript"> 
	document.addEventListener("DOMContentLoaded", function() { 
	// JavaScript form validation 
	var checkPassword = function(str) { 
		var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/; 
		return re.test(str); 
	}; 
 
	var myForm = document.getElementById("signup"); 
	myForm.addEventListener("rbtn", checkForm, true); 

	// HTML5 form validation 

	var supports_input_validity = function() { 
		var i = document.createElement("input"); 
		return "setCustomValidity" in i; 
	} 
	if(supports_input_validity()) { 
		var usernameInput = document.getElementById("uname"); 
		usernameInput.setCustomValidity(usernameInput.title); 
		var pwd1Input = document.getElementById("pass"); 
		pwd1Input.setCustomValidity(pwd1Input.title); 
		var pwd2Input = document.getElementById("cpass"); 

		// input key handlers 

		usernameInput.addEventListener("keyup", function() { 
			this.setCustomValidity(this.validity.patternMismatch ? usernameInput.title : ""); 
		}, false); 

		pwd1Input.addEventListener("keyup", function() { 
			this.setCustomValidity(this.validity.patternMismatch ? pwd1Input.title : ""); 
			if(this.checkValidity()) { 
				pwd2Input.pattern = this.value; 
				pwd2Input.setCustomValidity(pwd2Input.title); 
			}
			else {
			 pwd2Input.pattern = this.pattern; pwd2Input.setCustomValidity(""); 
			} 
		}, false);

		 pwd2Input.addEventListener("keyup", function() { 
		 	this.setCustomValidity(this.validity.patternMismatch ? pwd2Input.title : ""); }, false);
		 } 
	}, false); 


//disable double form submission 

	var submitting = false; 
	function checkForm(signup) { 
		if(signup.fname.value == "") { 
			alert("Please enter your first name"); 
			signup.fname.focus(); return false; 
		} 
		if(signup.lname.value == "") { 
			alert("Please enter your last name"); 
			signup.lname.focus(); 
			return false; 
		} 
		return true; 
	} 
	function resetForm(signup) { 
		signup.rbtn.disabled = false; 
		signup.rbtn.value = "Register"; 
		submitting = false; 
	} 
</script>