<?php
	session_start();

	$_SESSION['paymentprogress'] = 2;																// De waarde wordt naar 2 gezet zodat mocht het ergens stoppen/mislukken je op de homepage de foutmelding krijgt dat er fouten zijn opgetreden.
	$date = date('Y-m-d');																			// De datum wordt verkregen (is nodig voor de factuur).
	$username = $_SESSION['name'];
	
	$link = mysql_connect("localhost", "root", "") or die("Verbinding mislukt");					// Er wordt verbinding gemaakt met de database.
			mysql_select_db("ggg_db") or die("Database is niet beschikbaar");
	
	$sql = "SELECT `KlantNr` FROM `klant` WHERE Gebruikersnaam = '$username'";
	$output = mysql_query($sql) or die($sql);														// Query wordt uitgevoer om de KlantNr te achterhalen.
	$result = mysql_fetch_array($output) or die(mysql_error());
	
	$KlantNr = $result['KlantNr'];
	
	$sql = "INSERT INTO `factuur`(`KlantNr`, `FactuurDt`) VALUES ('$KlantNr','$date');";			// Er wordt een factuur aangemaakt.
			mysql_query($sql) or die($sql);
	
	$query = "SELECT `FactuurNr` FROM `factuur` WHERE `KlantNr` = '$KlantNr' AND `FactuurDt` = '$date';";
	$output = mysql_query($query) or die($query);													// FactuurNr wordt opgehaald uit de database.
	$result = mysql_fetch_array($output) or die(mysql_error());										// Het aantal facturen per dag per klant wordt beperkt tot 1. Want de datum gaat per dagen.
	
	$FactuurNr = $result['FactuurNr'];
	$ids = "";
	
	foreach($_SESSION['cart_items'] as $ArtikelNr => $value){										// Elke ArtikelNr word aan $ids toegevoegd.
		$ids = $ids . $ArtikelNr . ",";
	}
	
	$skyrimQuantity = $_SESSION['skyrimQuantity'];
	$fifa15Quantity = $_SESSION['fifa15Quantity'];
	$fifa14Quantity = $_SESSION['fifa14Quantity'];													// Quantitie waarde worden aan makkelijkere variables gegeven.
	$farcry4Quantity = $_SESSION['farcry4Quantity'];
	$farcry3Quantity = $_SESSION['farcry3Quantity'];
	$gtavQuantity = $_SESSION['gtavQuantity'];
	$gtaivQuantity = $_SESSION['gtaivQuantity'];
	$mw2Quantity = $_SESSION['mw2Quantity'];
	$mw3Quantity = $_SESSION['mw3Quantity'];
	
	if(strpos($ids, '1') !== false){
		$sql = "INSERT INTO `factuurregel`(`FactuurNr`, `ArtikelNr`, `ArtikelA`) VALUES ('$FactuurNr','1','$skyrimQuantity');";		// Als dit Artikel werd besteld wordt het artikel en het aantal in de database ingevoerd.
		mysql_query($sql) or die($sql);																								// Dit herhaalt zich voor alle artikelen hieronder.
	}
	
	if(strpos($ids, '2') !== false){
		$sql = "INSERT INTO `factuurregel`(`FactuurNr`, `ArtikelNr`, `ArtikelA`) VALUES ('$FactuurNr','2','$fifa15Quantity');";
		mysql_query($sql) or die($sql);
	}
	
	if(strpos($ids, '3') !== false){
		$sql = "INSERT INTO `factuurregel`(`FactuurNr`, `ArtikelNr`, `ArtikelA`) VALUES ('$FactuurNr','3','$fifa14Quantity');";
		mysql_query($sql) or die($sql);
	}
	
	if(strpos($ids, '4') !== false){
		$sql = "INSERT INTO `factuurregel`(`FactuurNr`, `ArtikelNr`, `ArtikelA`) VALUES ('$FactuurNr','4','$farcry4Quantity');";
		mysql_query($sql) or die($sql);
	}
	
	if(strpos($ids, '5') !== false){
		$sql = "INSERT INTO `factuurregel`(`FactuurNr`, `ArtikelNr`, `ArtikelA`) VALUES ('$FactuurNr','5','$farcry3Quantity');";
		mysql_query($sql) or die($sql);
	}
	
	if(strpos($ids, '6') !== false){
		$sql = "INSERT INTO `factuurregel`(`FactuurNr`, `ArtikelNr`, `ArtikelA`) VALUES ('$FactuurNr','6','$gtavQuantity');";
		mysql_query($sql) or die($sql);
	}
	
	if(strpos($ids, '7') !== false){
		$sql = "INSERT INTO `factuurregel`(`FactuurNr`, `ArtikelNr`, `ArtikelA`) VALUES ('$FactuurNr','7','$gtaivQuantity');";
		mysql_query($sql) or die($sql);
	}
	
	if(strpos($ids, '8') !== false){
		$sql = "INSERT INTO `factuurregel`(`FactuurNr`, `ArtikelNr`, `ArtikelA`) VALUES ('$FactuurNr','8','$mw2Quantity');";
		mysql_query($sql) or die($sql);
	}
	
	if(strpos($ids, '9') !== false){
		$sql = "INSERT INTO `factuurregel`(`FactuurNr`, `ArtikelNr`, `ArtikelA`) VALUES ('$FactuurNr','9','$mw3Quantity');";
		mysql_query($sql) or die($sql);
	}
	
	$_SESSION['paymentprogress'] = 1;																								// Waarde wordt naar 1 gezet. Dit zorgt ervoor dat er geen foutmelding op de homepage komt. Het factuur is immers in de database gezet.
	header('Location: remove-cart.php?RemoveAll=2');																				// Alle artikelen worden uit de winkelmand gehaald. Er is immers al afgerekent.
?>