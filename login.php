<?php
	session_start();
	
	$_SESSION['name'] = $name = $_POST["username"];				// De username die in de hele website gebruikt wordt.
	$password = $_POST["password"];								// Wachtwoord die de gebruiker heeft ingevoerd om in te loggen.
	$checkbox = $_SESSION['checkbox'] =  $_POST["remember"];	// De waarde die je terugkrijgt van het wel op niet aanvinken van de "onthouden" checkbox.
		
	$link = mysql_connect("localhost", "root", "") or die("Verbinding mislukt");					// Verbind met de alle databases
			mysql_select_db("ggg_db") or die("Database is niet beschikbaar");						// Selecteer een bepaalde database.
	$query = "SELECT * FROM klant WHERE gebruikersnaam = '$name' AND wachtwoord = '$password'";		// Er wordt naar rijen gezocht met de ingevoerde username en password.
	$result = mysql_query($query) or die($query);													// Het resultaat wordt verwerkt zodat php er wat mee kan.
		
	if(mysql_num_rows($result) == 1) {								// De actie wordt uitgevoerd als het aantal rijen in $result gelijk is aan 1.
		$_SESSION['loginresult'] = 1;								// De waarde van loginresult wordt naar 1 gezet. Hierdoor weet de site dat de gebruiker is ingelogd.
		if($checkbox == "on"){										// De actie wordt uitgevoerd als de checkbox was aangevinkt (daardoor geeft hij de waarde 'on').
			$year = time() + 31536000;								// Dit is het aantal seconden dat er in een jaar zit. We willen de cookie voor een jaar laten bestaan.
			setcookie('remember_me_GGG', $name, $year, "/");		// Er wordt een cookie aangemaakt. Hiervoor wordt een naam, een waarde en een tijd gekozen.
			header('Location: index.php?loginvalue=1');				// Je wordt automatisch doorgestuurd naar de website.
		} else{														// Als er niet aan de voowaarde wordt voldaan wordt de volgende actie uitgevoerd.
			if(isset($_COOKIE['remember_me_GGG'])){					// Als er een cookie bestaat zal de actie uitgevoerd worden.
				$past = time() - 100;								// De tijd wordt naar -100 seconden gezet. Hierdoor wordt straks de cookie gekilld.
				setcookie('remember_me_GGG', '', $past);			// De bestaande cookie wordt aangepast de tijd wordt gezet naar het verleden waardoor de cookie ongeldig wordt.
				header('Location: index.php?loginvalue=1');			// Je wordt doorgestuurd naar de website.
			} else{
			header('Location: index.php?loginvalue=1');				// Wat er voor waarde je ook had, als je bij else terecht bent gekomen word je nu doorgestuurd naar de website.
			}
		}
	} else{															// Als je niet aan de voorwaarde voldoet (aantal rows is 1) dan zal je hier terecht komen.
		header('Location: index.php?loginvalue=2');					// Je wordt doorgestuurd naar de website
	}
	
	// Achteraf gezien zijn de comments misschien iets te uitgebreidt...
?>