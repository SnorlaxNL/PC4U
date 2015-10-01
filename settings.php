<?php
	session_start();
	
	$password = $_SESSION['Opassword'] = $_POST['Opassword'];
	$firstname = $_SESSION['Ofirstname'] = $_POST['Ofirstname'];
	$tussenvoegsel = $_SESSION['Otussenvoegsel'] = $_POST['Otussenvoegsel'];
	$lastname = $_SESSION['Olastname'] = $_POST['Olastname'];
	$phone = $_SESSION['Ophone'] = $_POST['Ophone'];												// Alle gegevens die via de instellingen modal zijn binnengekomen worden verwerkt in beide variables. 1 voor hier de ander voor de homepage.
	$country = $_SESSION['Ocountry'] = $_POST['Ocountry'];
	$town = $_SESSION['Otown'] = $_POST['Otown'];
	$street = $_SESSION['Ostreet'] = $_POST['Ostreet'];
	$hnumber = $_SESSION['Ohnumber'] = $_POST['Ohnumber'];
	$anumber = $_SESSION['Oanumber'] = $_POST['Oanumber'];
	$postcode = $_SESSION['Opostcode'] = $_POST['Opostcode'];

	$username = $_SESSION['name'];
	$link = mysql_connect("localhost", "root", "") or die("Verbinding mislukt");		// Er wordt contact gemaakt met de database en de query wordt uitgevoerd.
			mysql_select_db("ggg_db") or die("Database is niet beschikbaar");
	$query = "UPDATE `klant` SET `Wachtwoord`='$password',`KlantVnaam`='$firstname',`KlantTussnaam`='$tussenvoegsel',`KlantAnaam`='$lastname',`KlantTel`='$phone',`KlantIBAN`='onbekend',`KlantPost`='$postcode',`KlantLa`='$country',`KlantPl`='$town',`KlantStr`='$street',`KlantHsnr`='$hnumber',`KlantThsnr`='$anumber' WHERE `Gebruikersnaam` = '$username';";
	
	header('Location: changecheck.php');	// Je wordt doorgestuurd naar changecheck om te checken of de data goed is verwerkt. Dit had ook hier gekunt. Maar op dat moment was het gemakkelijker om een aparte pagina voor te gebruiken. De klant merkt hier toch (waarschijnlijk) niks van.
?>