<?php
	session_start();

	$name = $_SESSION['name'] = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$tussenvoegsel = $_POST['tussenvoegsel'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];														// Waardes worden naar makkelijkere variables omgezet.
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	$street = $_POST['street'];
	$hnumber = $_POST['hnumber'];
	$anumber = $_POST['anumber'];
	$postcode = $_POST['postcode'];
	$iban = $_POST['iban'];
	
	$link = mysql_connect("localhost", "root", "") or die("Verbinding mislukt");	// Er wordt verbinding gemaakt met de database.
			mysql_select_db("ggg_db") or die("Database is niet beschikbaar");
			
	$sql = "SELECT * FROM `klant` WHERE Gebruikersnaam = '$name'";
	$output = mysql_query($sql) or die($sql);										// Er wordt gekeken of de gebruikersnaam niet al bezet is.
	if(mysql_num_rows($output) > 0){
		header('Location: index.php?loginvalue=4');
	} else{
		$sql = "SELECT * FROM `klant` WHERE KlantMail = '$email'";
		$output = mysql_query($sql) or die($sql);									// Er wordt gekeken of het emailadres niet al bezet is.
		if(mysql_num_rows($output) > 0){
			header('Location: index.php?loginvalue=5');
		} else{
		$query = "INSERT INTO `klant` (`gebruikersnaam`, `wachtwoord`, `klantvnaam`, `klanttussnaam`, `klantanaam`, `klantmail`, `klanttel`, `klantla`, `klantpl`, `klantstr`, `klantHsnr`, `klantThsnr`, `klantpost`, `klantiban`) VALUES ('$name', '$password', '$firstname', '$tussenvoegsel', '$lastname', '$email', '$phone', '$country', '$town', '$street', '$hnumber', '$anumber', '$postcode', '$iban');";
		$result = mysql_query($query) or die($query);								
		header('Location: index.php?loginvalue=3');									// Uiteindelijk wordt de klant aan de database toegevoegd.
		$_SESSION['loginresult'] = 1;
		}	
	}
?>
