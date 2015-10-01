<?php
session_start();
	
	$ArtikelNr = isset($_GET['ArtikelNr']) ? $_GET['ArtikelNr'] : "";
	$ArtikelOm = isset($_GET['ArtikelOm']) ? $_GET['ArtikelOm'] : "";											// Waardes worden uit dynamic links gehaald.
	$ArtikelA = isset($_GET['Quantity']) ? $_GET['Quantity'] : "";
	
	if($ArtikelNr == 1){
		$_SESSION['skyrimQuantity'] += $ArtikelA;
	} else if($ArtikelNr == 2){
		$_SESSION['fifa15Quantity'] += $ArtikelA;
	} else if($ArtikelNr == 3){
		$_SESSION['fifa14Quantity'] += $ArtikelA;
	} else if($ArtikelNr == 4){
		$_SESSION['farcry4Quantity'] += $ArtikelA; 																// ArtikelA wordt in _SESSION quantities gezet. Als er al een aantal was besteld maar de klant wilde meer wordt die door += erbij toegevoegd.
	} else if($ArtikelNr == 5){
		$_SESSION['farcry3Quantity'] += $ArtikelA;
	} else if($ArtikelNr == 6){
		$_SESSION['gtavQuantity'] += $ArtikelA;
	} else if($ArtikelNr == 7){
		$_SESSION['gtaivQuantity'] += $ArtikelA;
	} else if($ArtikelNr == 8){
		$_SESSION['mw2Quantity']  += $ArtikelA;
	} else if($ArtikelNr == 9){
		$_SESSION['mw3Quantity'] += $ArtikelA;
	}
	
	if(!isset($_SESSION['cart_items'])){
		$_SESSION['cart_items'] = array();																	// Als er geen cart_items array was wordt die aangemaakt.
	} if(array_key_exists($ArtikelNr, $_SESSION['cart_items'])){
		header('Location: index.php?action=added&ArtikelNr' . $ArtikelNr . '&ArtikelOm=' . $ArtikelOm);		// Artikel nummer wordt in de array toegevoegd.
	} else{
		$_SESSION['cart_items'][$ArtikelNr]=$ArtikelOm;														// Artikel nummer wordt vervangen door artikelomschrijving.
		header('Location: index.php?action=added&ArtikelNr' . $ArtikelNr . '&ArtikelOm=' . $ArtikelOm);
	}
?>
	