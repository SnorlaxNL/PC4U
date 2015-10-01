	function addcartSkyrim(){
		var input = document.getElementById('quantitySkyrim').value;
		
		if(input == ""){
			location.href = "add-cart.php?ArtikelNr=1&ArtikelOm=Skyrim&Quantity=1";			// Deze functie wordt uitgevoerd als je op de bestelbutton drukt. De waarde wordt opgehaald uit de input en daarna met de link verstuurd. Als er geen waarde is opgegeven wordt er 1 besteld. Als er iets anders dan een waarde wordt opgegeven wordt dat moeilijk optellen en resulteert het in 1 artikel.
		} else{																				// Dit herhaalt zich het hele script door.
			location.href = "add-cart.php?ArtikelNr=1&ArtikelOm=Skyrim&Quantity=" + input;	
		}
	}
	
	function addcartFifa15(){
		var input = document.getElementById('quantityFifa15').value;
		
		if(input == ""){
			location.href = "add-cart.php?ArtikelNr=2&ArtikelOm=FIFA 15&Quantity=1";
		} else{
			location.href = "add-cart.php?ArtikelNr=2&ArtikelOm=FIFA 15&Quantity=" + input;
		}
	}
	
	function addcartFifa14(){
		var input = document.getElementById('quantityFifa14').value;
		
		if(input == ""){
			location.href = "add-cart.php?ArtikelNr=3&ArtikelOm=FIFA 14&Quantity=1";
		} else{
			location.href = "add-cart.php?ArtikelNr=3&ArtikelOm=FIFA 14&Quantity=" + input;
		}
	}
	
	function addcartFarcry4(){
		var input = document.getElementById('quantityFarcry4').value;
		
		if(input == ""){
			location.href = "add-cart.php?ArtikelNr=4&ArtikelOm=Far Cry 4&Quantity=1";
		} else{
			location.href = "add-cart.php?ArtikelNr=4&ArtikelOm=Far Cry 4&Quantity=" + input;
		}
	}
	
	function addcartFarcry3(){
		var input = document.getElementById('quantityFarcry3').value;
		
		if(input == ""){
			location.href = "add-cart.php?ArtikelNr=5&ArtikelOm=Far Cry 3&Quantity=1";
		} else{
			location.href = "add-cart.php?ArtikelNr=5&ArtikelOm=Far Cry 3&Quantity=" + input;
		}
	}
	
	function addcartGtav(){
		var input = document.getElementById('quantityGtav').value;
		
		if(input == ""){
			location.href = "add-cart.php?ArtikelNr=6&ArtikelOm=GTA V&Quantity=1";
		} else{
		location.href = "add-cart.php?ArtikelNr=6&ArtikelOm=GTA V&Quantity=" + input;
		}
	}
	
	function addcartGtaiv(){
		var input = document.getElementById('quantityGtaiv').value;
		
		if(input == ""){
			location.href = "add-cart.php?ArtikelNr=7&ArtikelOm=GTA IV&Quantity=1";
		} else{
			location.href = "add-cart.php?ArtikelNr=7&ArtikelOm=GTA IV&Quantity=" + input;
		}
	}
	
	function addcartMw2(){
		var input = document.getElementById('quantityMw2').value;
		
		if(input == ""){
			location.href = "add-cart.php?ArtikelNr=8&ArtikelOm=Call of Duty Modern Warfare 2&Quantity=1"; 
		} else {
			location.href = "add-cart.php?ArtikelNr=8&ArtikelOm=Call of Duty Modern Warfare 2&Quantity=" + input;
		}
	}
	
	function addcartMw3(){
		var input = document.getElementById('quantityMw3').value;
		
		if(input == ""){
			location.href = "add-cart.php?ArtikelNr=9&ArtikelOm=Call of Duty Modern Warfare 3&Quantity=1";
		} else{
			location.href = "add-cart.php?ArtikelNr=9&ArtikelOm=Call of Duty Modern Warfare 3&Quantit=" + input;
		}
	}