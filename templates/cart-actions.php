<?php
		$action = isset($_GET['action']) ? $_GET['action'] : "";				// Als er een dynamic link is verstuurd met action + waarde zal die in $action worden opgeslagen.
		$ArtikelNr = isset($_GET['ArtikelNr']) ? $_GET['ArtikelNr'] : "1";		// Als er een dynamic link is verstuurd met ArtikelNr + waarde zal die in $ArtikelNr worden opgeslagen.
		$ArtikelOm = isset($_GET['ArtikelOm']) ? $_GET['ArtikelOm'] : "";		// Als er een dynamic link is verstuurd met ArtikelOm + waarde zal die in $Artikelom worden opgeslagen.
		
		if($action == 'added'){																														// Als de action waarde 'added' is zal de actie worden uitgevoerd.
			echo "<div id='popup' class='alert alert-success text-center'><strong>{$ArtikelOm}</strong> is aan uw winkelwagen toegevoegd!</div>";	// Je krijgt op je scherm een soort van popup met een bericht.
		}																																			// Dit wordt herhaalt bij de andere 4 alleen dan met andere waardes en berichten.
		
		if($action == 'exists'){
			echo "<div id='popup' class='alert alert-info text-center'><strong>{$ArtikelOm}</strong> staat al in uw winkelwagen.</div>";
		}
		
		if($action == 'updated'){
			echo "<div id='popup' class='alert alert-info text-center'><strong>{$ArtikelOm}'s</strong> aantal is veranderd.</div>";
		}
		
		if($action == 'removed'){
			echo "<div id='popup' class='alert alert-danger text-center'><strong>{$ArtikelOm}</strong> is van je winkelwagen verwijderd!</div>";
		}
		
		if($action == 'removeall'){
			echo "<div id='popup' class='alert alert-danger text-center'>Alle artikelen zijn van uw winkelwagen verwijderd.</div>";
		}
?>