<?php
	session_start();

	$ArtikelNr = isset($_GET['ArtikelNr']) ? $_GET['ArtikelNr'] : "";
	$ArtikelOm = isset($_GET['ArtikelOm']) ? $_GET['ArtikelOm'] : "";		// Waardes worden uit de dynamic link opgehaald.
	$RemoveAll = isset($_GET['RemoveAll']) ? $_GET['RemoveAll'] : "";
	
	if($RemoveAll == 1 || $RemoveAll == 2){									// Als je de hele winkelwagen wilt legen worden alle waardes naar nul gezet. Dit om een verkeerde totaal prijs te voorkomen.
		$_SESSION['cart_items'] = NULL;
		$_SESSION['skyrimQuantity'] = 0;
		$_SESSION['fifa15Quantity'] = 0;
		$_SESSION['fifa14Quantity'] = 0;
		$_SESSION['farcry4Quantity'] = 0;
		$_SESSION['farcry3Quantity'] = 0;
		$_SESSION['gtavQuantity'] = 0;
		$_SESSION['gtaivQuantity'] = 0;
		$_SESSION['mw2Quantity'] = 0;
		$_SESSION['mw3Quantity'] = 0;
	}
	
	if($ArtikelNr == 1){
		$_SESSION['skyrimQuantity'] = 0;
	} else if($ArtikelNr == 2){
		$_SESSION['fifa15Quantity'] = 0;
	} else if($ArtikelNr == 3){
		$_SESSION['fifa14Quantity'] = 0;
	} else if($ArtikelNr == 4){
		$_SESSION['farcry4Quantity'] = 0;
	} else if($ArtikelNr == 5){												// Als je 1 artikel verwijderd zal ook 1 quantity gereset moeten worden. Dit wordt hier gedaan.
		$_SESSION['farcry3Quantity'] = 0;
	} else if($ArtikelNr == 6){
		$_SESSION['gtavQuantity'] = 0;
	} else if($ArtikelNr == 7){
		$_SESSION['gtaivQuantity'] = 0;
	} else if($ArtikelNr == 8){
		$_SESSION['mw2Quantity'] = 0;
	} else if($ArtikelNr == 9){
		$_SESSION['mw3Quantity'] = 0;
	}
	
	unset($_SESSION['cart_items'][$ArtikelNr]);								// Het artikel dat verwijderd moet worden wordt uit de cart_items array gehaald.
	
	if($RemoveAll == 1){
		header('Location: index.php?action=removeall');
	} elseif($RemoveAll == 2){
		header('Location: index.php?paymentvalue=1'); 						// Verschillende locaties zodat je verschillende berichten krijgt op de homepage.
	} else{
	header('Location: index.php?action=removed&ArtikelNr=' . $ArtikelNr . '&ArtikelOm=' . $ArtikelOm);
	}
?>