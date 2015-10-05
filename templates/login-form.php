<?php
	$cookiename = $_COOKIE['remember_me_GGG'];																											// De variable cookiename krijgt de waarde die de cookie heeft (als die bestaat)
	if($_SESSION['loginresult'] == 1){																									// Als loginresult 1 is zal de website worden aangepast omdat je dan bent ingelogd.
		echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>{$_SESSION['name']}<b class='caret'></b></a>";					// Er wordt een dropdown-toggle gemaakt. Doormiddel van JS zul je een dropdown zien als je erop klikt.
			echo "<ul class='dropdown-menu'>";																								// Dit is het dropdown menu. Alles wat hierin staat zal je te zien krijgen als je op de dropdown klikt.
				echo "<li><a href='#instellingen' data-toggle='modal'>Instellingen</a></li>";												
				echo "<li><a href='#support' data-toggle='modal'>Support</a></li>";															// Verschillende opties in het dropdown menu.
				echo "<li><a href='logout.php'>Uitloggen</a></li>";																			
			echo "</ul>";																													
		} else{																																// Wat je te zien krijgt als je niet bent ingelogd.
			echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Login<b class='caret'></b></a>";								// Een login-form dropdown.
			echo "<ul class='dropdown-menu login-menu'>";																					
				echo "<li>";																											
					echo "<form method='post' action='login.php' role='form'>";																// Zodra het form is ingevuld zal de data (en de gebruiker) naar login.php worden gestuurd.
						echo "<div class='form-group'>";																					
						if(isset($_COOKIE['remember_me_GGG'])){																				// Als de cookie op de computer aanwezig is zal de actie uitgevoerd worden.
							echo "<input type='text' class='form-control form-control-sm' name='username' placeholder='Gebruikersnaam' value='$cookiename' required>";		// Gebruikersnaam input. name voor de php post method en required is een html5 voorwaarde zodat de input ingevuld moet worden voordat het wordt verzonden. De value is er zodat een gebruiker niet steeds zijn gebruikersnaam hoeft in te vullen als hij op onthouden heeft gedrukt.
						} else{																												// Als de cookie niet zich op de computer bevindt zal deze actie uitgevoerd worden.
							echo "<input type='text' class='form-control form-control-sm' name='username' placeholder='Gebruikersnaam' required>";							// Hetzelfde als bij de cookie. Alleen hier zonder een value.
						}
						echo "</div>";																										
						echo "<div class='form-group'>";																					
							echo "<input type='password' class='form-control form-control-sm' name='password' placeholder='Wachtwoord' required>";							// Bijna hetzelfde als de gebruikersnaam.
							if(isset($_COOKIE['remember_me_GGG'])){																											// De actie wordt uitgevoerd als de juiste cookie zich op de pc bevindt.
								echo "<div class='hidden-xs'><input type='checkbox' name='remember' checked='checked'><label for='checkbox'>&nbsp;Onthouden</label></div>";	// De checkbox is automatisch gecheckd zodat mensen die graag hun gebruikersnaam automatisch ingevoerd willen hebben er niet steeds weer op hoeven te klikken.
							} else{																											
								echo "<div class='hidden-xs'><input type='checkbox' name='remember'><label for='checkbox'>&nbsp;Onthouden</label></div>";					// De checkbox wordt zich nu niet gechecked weergeven omdat het of de eerste keer is dat mensen inloggen of mensen waarschijnlijk niet onthouden willen worden.
							}
							echo "<input href='#register' data-toggle='modal' class='login-button' type='button' value='Registreren'>";										// Brengt je naar de registreren modal, handig als je nog geen account hebt.
							echo "<input type='submit' class='login-button' role='button' value='Login'>";																	// Checkt of je alle required forms hebt ingevuld en stuurt je dan door naar login.php
					echo "</div>";																										
				echo "</form>";																											
			echo "</li>";																												// Alle geopende tags worden uiteindelijk weer gesloten.
		echo "</ul>";																													
	}
?>