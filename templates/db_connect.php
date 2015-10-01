<?php 
	$host = "localhost";		// Geeft de host een waarde (string). Deze waardes worden gegeven zodat het makkelijker te veranderen is en de waarde van $con iets overzichtelijker is.
	$db_name = "ggg_db";		// Geeft db_name een waarde (string).
	$username = "root";			// Geeft username een waarde (string).
	$password = "";				// Geeft password een waarde (lege string, er is dus geen wachtwoord nodig).
	
	try {
		$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password); // Er wordt geprobeerd een verbinding te krijgen met de database.
	}
	
	catch(PDOException $exception){
		echo "Connection error: " . $exception->getMessage();		// Als er een verbindingserror is wordt die opgehaald en getoond.
	}
?>