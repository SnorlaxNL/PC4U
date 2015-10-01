	function checkForm(registerForm){
		var error = "";

		error += validateEmail(registerForm.email);
		error += validateUsername(registerForm.username);
		error += validatePassword(registerForm.password);
		error += confirmPassword(registerForm.password, registerForm.confirmpassword);
		error += validateFirstname(registerForm.firstname);
		error += validateTussenvoegsel(registerForm.tussenvoegsel);								// Alle functies worden bijlangsgegaan om te kijken of het klopt. Als dat niet zo is wordt de fout aan de error variable toegevoegd.
		error += validateLastname(registerForm.lastname);
		error += validatePhone(registerForm.phone);
		error += validateCountry(registerForm.country);
		error += validateTown(registerForm.town);
		error += validateStreet(registerForm.street);
		error += validateHnumber(registerForm.hnumber);
		error += validateAnumber(registerForm.anumber);
		error += validatePostcode(registerForm.postcode);
		error += validateIBAN(registerForm.iban);
      
		if (error != ""){
			alert("De volgende foutmeldingen zijn opgetreden:\n" + error);						// Als de error variable niet leeg is betekent het dus dat er fouten zijn. Deze worden weergeven in een popupbox.
			return false;																		// Omdat de fouten aanwezig zijn wordt er false verstuurd zodat het form niet verzonden kan worden.
		}
		return true;																			// Als er geen fouten zijn wordt er true verstuurd zodat het form verzonden kan worden.
	}
	
	function validateEmail(input){
		var error = "";	
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;						// Dit is een validatie regel. Dit verschilt bij bijna elke input omdat bijna elke input andere eisen heeft. 
   
		if(input.value == ""){
			document.getElementById("r-email").className += " has-error";						// Deze error wordt verstuurd als er niks is ingevoerd. Ook wordt er een form-group class toegevoegd. Hierdoor wordt de form-group class rood.
			error = "U heeft geen E-mailadres ingevoerd.\n";
		} else if(!(input.value.match(emailExp))) {              	
			document.getElementById("r-email").className += " has-error";						// Er wordt gekeken of het ingevoerde emailadres voldoet aan de eerder gemaakte validatie. 
			error = "Voer een geldig E-mailadres in.\n";
		} else{
			document.getElementById("r-email").className += " has-success";						// Als er geen fouten zijn gevonden wordt het email-adres goed gekeurd en wordt de input groen.
		}
		return error;																			// De gevonden errors worden verstuurd naar de checkform functie. Als er geen erros zijn zal de error een lege string bevatten.
	}

	function validateUsername(input){
		var error = "";
		var usernameExp = /^\w+$/; // allow letters, numbers, and underscores
 
		if(input.value == ""){
			document.getElementById("r-username").className += " has-error";
			error = "U heeft geen gebruikersnaam ingevoerd.\n";
		} else if(input.value.length < 5){
			document.getElementById("r-username").className += " has-error";				// Er wordt gekeken of de input niet te kort is. Is dat wel zo dan geeft wordt er een error verzonden.
			error = "Uw gebruikersnaam moet minstens 5 tekens bevatten.\n";
		} else if(input.value.length > 15){
			document.getElementById("r-username").className += " has-error";				// Hetzelfde geldt voor als een input te lang is.
			error = "Uw gebruikersnaam mag maximaal 15 tekens bevatten.\n";
		} else if(!(input.value.match(usernameExp))) {
			document.getElementById("r-username").className += " has-error"; 
			error = "Gebruikersnaam mag alleen letters, nummers en underscores bevatten.\n";
		} else{
			document.getElementById("r-username").className += " has-success";				// Alles wat is uitgelegd zal op bijna dezelfde manier terugkomen in de onderstaande functies. Bij die terugkomende dingen zal geen uitleg staan.
		}
		return error;
	}
	
	function validatePassword(input){
		var error = "";
		var passwordExp = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}/; // Minstens 7 tekens, 1 cijfer, 1 kleine letter en 1 grote letter. 
 
		if(input.value == ""){
			document.getElementById("r-password").className += " has-error";
			error = "U heeft geen wachtwoord ingevoerd.\n";
		} else if(input.value.length < 7){
			error = "Uw wachtwoord moet minstens 7 tekens bevatten.\n";
			document.getElementById("r-password").className += " has-error";
		} else if(input.value.length > 50){
			error = "Uw wachtwoord mag maximaal 50 tekens bevatten.\n";
			document.getElementById("r-password").className += " has-error";
		} else if(!(input.value.match(passwordExp))){
			error = "Het wachtwoord moet bestaan uit minstens 1 cijfer, 1 kleine letter en 1 grote letter.\n";
			document.getElementById("r-password").className += " has-error";
		} else {
			document.getElementById("r-password").className += " has-success";
		}
		return error;
	}
	
	function confirmPassword(input1, input2){
		var error = "";
		
		if(!(input1.value == input2.value)){
			error = "De wachtwoorden komen niet overeen.\n";										// Er wordt gekeken of de 2 ingevoerde wachtwoorden met elkaar overeen komen.
			document.getElementById("r-password").className += " has-error";
			document.getElementById("r-confirmpassword").className += " has-error";
		} else{
			document.getElementById("r-confirmpassword").className += " has-success";
		}
		return error;
	}
	
	function validateFirstname(input){
		var error = "";
		var firstnameExp = /^[a-zA-Z]+$/;
		
		if(input.value == ""){
			error = "U heeft geen voornaam ingevoerd.\n";
			document.getElementById("r-firstname").className += " has-error";
		} else if(input.value.length < 2){
			error = "Uw voornaam moet minstens 2 letters bevatten.\n";
			document.getElementById("r-firstname").className += " has-error";
		} else if(input.value.length > 40){
			error = "Uw voornaam kan niet meer dan 40 tekens bevatten.\n";
			document.getElementById("r-firstname").className += " has-error";
		} else if(!(input.value.match(firstnameExp))){
			error = "Uw voornaam mag alleen uit letters bestaan.\n";
			document.getElementById("r-firstname").className += " has-error";
		} else{
			document.getElementById("r-firstname").className += " has-success";
		}
		return error;
	}
	
	function validateTussenvoegsel(input){
		var error = "";
		var tussenvoegselExp = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
		
		if(input.value == ""){
			document.getElementById("r-tussenvoegsel").className += " has-success";
		} else if(input.value.length < 2){
			error = "Uw tussenvoegsel moet minstens 2 letters bevatten.\n";
			document.getElementById("r-tussenvoegsel").className += " has-error";
		} else if(input.value > 20){
			error = "Uw tussenvoegsel mag maximaal 20 letters bevatten.\n";
			document.getElementById("r-tussenvoegsel").className += " has-error";
		} else if(!(input.value.match(tussenvoegselExp))){
			error = "Uw tussenvoegsel mag alleen uit letters (en spaties) bestaan.\n";
			document.getElementById("r-tussenvoegsel").className += " has-error";
		} else{
			document.getElementById("r-tussenvoegsel").className += " has-success";
		}
		return error;
	}
	
	function validateLastname(input){
		var error = "";
		var lastnameExp = /^[a-zA-Z]+$/;
		
		if(input.value == ""){
			error = "U heeft geen achternaam ingevoerd.\n";
			document.getElementById("r-lastname").className += " has-error";
		} else if(input.value.length < 2){
			error = "Uw achternaam moet minstens 2 letters bevatten.\n";
			document.getElementById("r-lastname").className += " has-error";
		} else if(input.value.length > 40){
			error = "Uw achternaam mag maximaal 40 letters bevatten.\n";
			document.getElementById("r-lastname").className += " has-error";
		} else if(!(input.value.match(lastnameExp))){
			error = "Uw achternaam mag alleen maar letters bevatten.\n";
			document.getElementById("r-lastname").className += " has-error";
		} else{
			document.getElementById("r-lastname").className += " has-success";
		}
		return error;
	}
	
	function validatePhone(input){
		var error = "";
		var phoneExp = /^[0-9]+$/; 
		var tinput = input.value.replace(/\s+/g, ''); 												// Alle eventuele spaties worden eruitgehaald.

		if(input.value == ""){
			error = "U heeft geen telefoonnummer ingevoerd.\n";
			document.getElementById("r-phone").className += " has-error";
		} else if(!(tinput.match(phoneExp))){
			error = "U heeft geen geldig telefoonnummer ingevoerd.\n";
			document.getElementById("r-phone").className += " has-error";
		} else if(!(tinput.length == 10)){
			error = "Het telefoonnummer moet uit 10 cijfers bestaan (gebruik geen spaties).\n";		// Het telefoonnummer mag maar 10 cijfers bevatten omdat alle 06-nummers 10 cijfers bevatten.
			document.getElementById("r-phone").className += " has-error";
		} else{
			document.getElementById("r-phone").className += " has-success";
		}
		return error;
	}
	
	function validateCountry(input){
		var error = "";
		var countryExp = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
	
		if(input.value == ""){
			error = "U heeft geen land ingevoerd.\n";
			document.getElementById("r-country").className += " has-error";
		} else if(input.value.length < 4){
			error = "Uw land moet minstens 4 letters bevatten.\n";
			document.getElementById("r-country").className += " has-error";
		} else if(input.value.length > 40){
			error = "Uw land mag maximaal 40 letters (en spaties) bevatten.\n";
			document.getElementById("r-country").className += " has-error";
		} else if(!(input.value.match(countryExp))){
			error = "Uw land mag alleen maar letters (en spaties) bevatten.\n";
			document.getElementById("r-country").className += " has-error";
		} else{
			document.getElementById("r-country").className += " has-success";
		}
		return error;
	}
	
	function validateTown(input){
		var error = "";
		var townExp = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
		
		if(input.value == ""){
			error = "U heeft geen plaats ingevoerd.\n";
			document.getElementById("r-town").className += " has-error";
		} else if(input.value.length < 4){
			error = "Uw plaats moet minstens 4 letters bevatten.\n";
			document.getElementById("r-town").className += " has-error";
		} else if(input.value.length > 40){
			error = "Uw plaats mag maximaal 40 letters (en spaties) bevatten.\n";
			document.getElementById("r-town").className += " has-error";
		} else if(!(input.value.match(townExp))){
			error = "Uw plaats mag alleen maar letters (en spaties) bevatten.\n";
			document.getElementById("r-town").className += " has-error";
		} else{
			document.getElementById("r-town").className += " has-success";
		}
		return error;
	}
	
	function validateStreet(input){
		var error = "";
		var streetExp = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
		
		if(input.value == ""){
			error = "U heeft geen straatnaam ingevoerd.\n";
			document.getElementById("r-street").className += " has-error";
		} else if(input.value.length < 4){
			error = "Uw straatnaam moet minstens 4 letters bevatten.\n";
			document.getElementById("r-street").className += " has-error";
		} else if(input.value.length > 40){
			error = "Uw straatnaam mag maximaal 40 letters (en spaties) bevatten.\n";
			document.getElementById("r-street").className += " has-error";
		} else if(!(input.value.match(streetExp))){
			error = "Uw straatnaam mag alleen maar letters en (en spaties) bevatten.\n";
			document.getElementById("r-street").className += " has-error";
		} else{
			document.getElementById("r-street").className += " has-success";
		}
		return error;
	}
	
	function validateHnumber(input){
		var error = "";
		var hnumberExp = /^[0-9]+$/;
		
		if(input.value == ""){
			error = "U heeft geen huisnummer ingevoerd.\n";
			document.getElementById("r-hnumber").className += " has-error";
		} else if(input.value.length > 4){
			error = "Uw huisnummer mag maximaal 4 cijfers lang zijn.\n";
			document.getElementById("r-hnumber").className += " has-error";
		} else if(!(input.value.match(hnumberExp))){
			error = "Uw huisnummer mag alleen maar cijfers bevatten\n";
			document.getElementById("r-hnumber").className += " has-error";
		} else{
			document.getElementById("r-hnumber").className += " has-success";
		}
		return error;
	}
	
	function validateAnumber(input){
		var error = "";
		var anumberExp = /^[A-Z]+$/;
		
		if(input.value == ""){
			document.getElementById("r-anumber").className += " has-success";
		} else if(input.value.length > 1){
			error = "De toevoeging aan uw huisnummer mag niet meer zijn dan één teken.\n";
			document.getElementById("r-anumber").className += " has-error";
		} else if(!(input.value.match(anumberExp))){
			error = "De toevoeging aan uw huisnummer mag alleen maar uit een hoofdletter bestaan.\n";
			document.getElementById("r-anumber").className += " has-error";
		} else{
			document.getElementById("r-anumber").className += " has-success";
		}
		return error;
	}
	
	function validatePostcode(input){
		var error = "";
		var postcodeExp = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i;
		var tinput = input.value.replace(/\s+/g, '');

		if(input.value == ""){
			error = "U heeft geen postcode ingevoerd.\n";
			document.getElementById("r-postcode").className += " has-error";
		} else if(!(input.value.match(postcodeExp))){
			error = "U heeft een ongeldige postcode ingevoerd.\n";
			document.getElementById("r-postcode").className += " has-error";
		} else if(!(tinput.length == 6)){
			error = "Het telefoonnummer moet uit 6 tekens bestaan.\n";
			document.getElementById("r-postcode").className += " has-error";
		} else{
			document.getElementById("r-postcode").className += " has-success";
		}
		return error;
	}
	
	function validateIBAN(input){
		var error = "";
		var ibanExp = /^[A-Z]{2}[0-9A-Z]*$/;
		
		if(input.value == ""){
			error = "U heeft geen postcode ingevoerd.\n";
			document.getElementById("r-iban").className += " has-error";
		} else if(input.value.length < 4){
			error = "Uw IBAN moet minstens 4 tekens bevatten.\n"
			document.getElementById("r-iban").className += " has-error"; 
		} else if(input.value.length > 34){
			error = "Uw IBAN mag maximaal 34 tekens bevatten.\n"
			document.getElementById("r-iban").className += " has-error";						// Een IBAN is moeilijk te valideren en op internet vind je ook een aantal uitgebreide scripts voor een goede validatie.
		} else if(!(input.value.match(ibanExp))){												// Daarintegen heb ik zelf een simpele validatie gemaakt omdat dit een schoolproject is en er dus niet echt betaald hoeft te worden.
			error = "U heeft een ongeldige IBAN ingevoerd.\n"									// Iets wat mijn validatie wel in de weg zag was dat ik niet veel van de IBAN snapte :/
			document.getElementById("r-iban").className += " has-error";
		} else{
			document.getElementById("r-iban").className += " has-success";
		}
		return error;
	}