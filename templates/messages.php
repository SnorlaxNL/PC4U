<?php
	$loginvalue = isset($_GET['loginvalue']) ? $_GET['loginvalue'] : "";			// Als er een loginvalue aanwezig is wordt die uit de link opgenomen.
	$optionsvalue = isset($_GET['optionsvalue']) ? $_GET['optionsvalue'] : "";		// Als er een options aanwezig is wordt die uit de link opgenomen.
	$mailvalue = isset($_GET['mailvalue']) ? $_GET['mailvalue'] : "";				// Als er een mailvalue aanwezig is wordt die uit de link opgenomen.
	$paymentvalue = isset($_GET['paymentvalue']) ? $_GET['paymentvalue'] : "";		// Als er een paymentvalue aanwezig is wordt die uit de link opgenomen.
	
	if($loginvalue == 1){																						// Als loginvalue gelijk is aan 1 wordt de actie uitgevoerd.
		echo "<div id='popup' class='alert alert-success text-center'>U bent succesvol ingelogd!</div>";		// Deze code zorgt ervoor dat er een message in beeld komt met de tekst.
		$_SESSION['loginresult'] = 1;																			// Loginresult wordt naar 1 gezet. Zodat mocht dat nog niet zo zijn, de gebruiker is ingelogd.
	}																											// Dit herhaalt zich zo ongeveer de komende statements.
	
	if($loginvalue == 2){
		echo "<div id='popup' class='alert alert-danger text-center'>Inloggen mislukt.</div>";
	}
	
	if($loginvalue == 3){
		echo "<div id='popup' class='alert alert-success text-center'>Je bent succesvol geregistreerd!</div>";
		$_SESSION['loginresult'] = 1;
	}
	
	if($loginvalue == 4){
		echo "<div id='popup' class='alert alert-danger text-center'>Uw gebruikersnaam is al in gebruik.</div>";
	}
	
	if($loginvalue == 5){
		echo "<div id='popup' class='alert alert-danger text-center'>Uw E-mailadres is al in gebruik.</div>";
	}
	
	if($optionsvalue == 1){
		echo "<div id='popup' class='alert alert-danger text-center'>Verandering van instellingen is mislukt.</div>";
	}
	
	if($optionsvalue == 2){
		echo "<div id='popup' class='alert alert-success text-center'>Uw instellingen zijn succesvol veranderd.</div>";
	}
	
	if($mailvalue == 1){
		echo "<div id='popup' class='alert alert-danger text-center'>Er is een fout opgetreden tijdens het versturen van het bericht.</div>";
	}
	
	if($mailvalue == 2){
		echo "<div id='popup' class='alert alert-success text-center'>Het bericht is succesvol verzonden.</div>";
	}
	
	if($mailvalue == 3){
		echo "<div id='popup' class='alert alert-danger text-center'>Er was geen data om te versturen.</div>"; // Deze error is vrijwel onmogelijk om te krijgen omdat het bericht required is en er 2 hidden value's meegaan.
	}
	
	if($paymentvalue == 1){
		echo "<div id='popup' class='alert alert-success text-center'>Uw bestelling is succesvol afgerond.</div>"; 
	}
	
	if($_SESSION['paymentprogress'] == 2){
		echo "<div id='popup' class='alert alert-danger text-center'>Tijdens het bestellen is er een fout opgetreden.</div>";
		$_SESSION['paymentprogress'] = NULL;
	}
?>