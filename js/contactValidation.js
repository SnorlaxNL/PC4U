	function contactForm(contactForm){
		var error = "";
		
		error += validateCName(contactForm.Cname);
		error += validateCEmail(contactForm.Cemail);							// Verkorte versie van registerValidation. Kijk daar voor uitleg.
		
		if(error != ""){
			alert("De volgende foutmeldingen zijn opgetreden:\n" + error);
			return false;
		}
		alert("Alle velden zijn goed ingevuld.");
		return true;
	}
	
	function validateCName(input){
		var error = "";
		var usernameExp = /^\w+$/;
 
		if(input.value == ""){
			document.getElementById("c-name").className += " has-error";
			error = "U heeft geen naam ingevoerd.\n";
		} else if(input.value.length < 2){
			document.getElementById("c-name").className += " has-error";
			error = "Uw naam moet minstens 2 tekens bevatten.\n";
		} else if(input.value.length > 25){
			document.getElementById("c-name").className += " has-error";
			error = "Uw naam mag maximaal 25 tekens bevatten.\n";
		} else if(!(input.value.match(usernameExp))) {
			document.getElementById("c-name").className += " has-error";
			error = "Uw naam mag alleen letters, nummers en underscores bevatten.\n";
		} else{
			document.getElementById("c-name").className += " has-success";
		}
		return error;
	}
	
	function validateCEmail(input){
		var error = "";
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
   
		if(input.value == ""){
			document.getElementById("c-email").className += " has-error";
			error = "U heeft geen E-mailadres ingevoerd.\n";
		} else if(!(input.value.match(emailExp))) {
			document.getElementById("c-email").className += " has-error";
			error = "Voer een geldig E-mailadres in.\n";
		} else{
			document.getElementById("c-email").className += " has-success";
		}
		return error;
	}