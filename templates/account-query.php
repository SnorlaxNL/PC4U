	<?php 
		$username = $_SESSION['name'];													// De nickname die de klant heeft ingevoerd.
		$link = mysql_connect("localhost", "root", "") or die("Verbinding mislukt");	// Hij maakt verbinding met de database.
				mysql_select_db("ggg_db") or die("Database is niet beschikbaar");		// Hij kiest een bepaalde database uit.
		$query = "SELECT `KlantMail`, `Gebruikersnaam`, `Wachtwoord`, `KlantVnaam`, `KlantTussnaam`, `KlantAnaam`, `KlantTel`, `KlantLa`, `KlantPl`, `KlantStr`, `KlantHsnr`, `KlantThsnr`, `KlantPost`, `KlantIBAN` FROM `klant` WHERE `Gebruikersnaam` = '$username';"; 	// Query die naar de database wordt gestuurd en uitgevoerd.
		$result = mysql_query($query);			// Het resultaat van de query wordt in een variable verwerkt.
		$row = mysql_fetch_array($result);		// Het resultaat wordt verwerkt in een array.
	?>