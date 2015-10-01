					<?php
						if(count($_SESSION['cart_items']) > 0){								// Telt het aantal waardes in de cart_items array in _SESSION
							$ids = "";														// Maakt een nieuwe variable aan.
							foreach($_SESSION['cart_items'] as $ArtikelNr => $value){		// Voor elke artikel die groter of gelijk is aan value wordt de actie uitgevoerd. 
								$ids = $ids . $ArtikelNr . ",";								// Aan ids wordt de huides ids + het artikelnr + een komma toegevoegd.
							}
							
							$ids = rtrim($ids, ',');										// Trimt de komma's
							
							echo "<table class='table table-hover table-responsive table-bordered'>";	
								echo "<tr>";															
									echo "<th class='textAlignLeft'>Productnaam</th>";						// De bovenste row + header in de tabel wordt hier aangemaakt.
									echo "<th>Prijs (USD)</th>";										
									echo "<th>Actie</th>"; 												
								echo "</tr>";															
								
								$query = "SELECT ArtikelNr, ArtikelOm, ArtikelPr FROM artikel WHERE ArtikelNr IN ({$ids}) ORDER BY ArtikelOm";			// Query die in de database wordt uitgevoerd.
								
								$stmt = $con->prepare($query);								// Query wordt klaargemaakt.
								$stmt->execute();											// Query wordt uitgevoerd.
								
								$total_price = 0;											// Er wordt een variable gemaakt met de waarde (in integers) 0.
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){				// Zolang de row nog niet helemaal is afgewerkt zal de actie opnieuw worden uitgevoerd.
									extract($row);											// row wordt 'uitgepakt' hierdoor kan hieronder gewone variables gebruikt worden.
									
									echo "<tr>";											
										echo "<td>{$ArtikelOm}</td>";						
										echo "<td>&#36;{$ArtikelPr}</td>";					// De informatie over de artikelen wordt weergeven. De informatie komt rechtstreeks uit de database.
										echo "<td>";										
											echo "<a href='remove-cart.php?ArtikelNr={$ArtikelNr}&ArtikelOm={$ArtikelOm}' class='btn btn-danger'>";		
												echo "<span class='glyphicon glyphicon-remove'></span> Verwijderen";									// Er wordt een anchor gemaakt die de artikel verwijderd zodra je erop klikt.
											echo "</a>";																							
										echo "</td>";																									
									echo "</tr>";																										
									
									$total_price = $_SESSION['skyrimQuantity'] * 50;							// Aan de totale prijs wordt het bedrag van skyrim x het aantal dat er van skyrim wordt besteld toegevoegd.
									$total_price += $_SESSION['fifa15Quantity'] * 65;							// Dit herhaalt zich maar dan met andere aantallen en producten.
									$total_price += $_SESSION['fifa14Quantity'] * 33;							
									$total_price += $_SESSION['farcry4Quantity'] * 43;							
									$total_price += $_SESSION['farcry3Qauntity'] * 37;
									$total_price += $_SESSION['gtavQuantity'] * 86;
									$total_price += $_SESSION['gtaivQuantity'] * 29;
									$total_price += $_SESSION['mw2Quantity'] * 12;
									$total_price += $_SESSION['mw3Quantity'] * 92;
								}
								
								echo "<tr>";
									echo "<td><b>Total</b></td>";
									echo "<td>&#36;{$total_price}</td>";									// De totale prijs wordt hier weergeven.
									echo "<td>";
										echo "<a href='remove-cart.php?RemoveAll=1' class='btn btn-danger'>";
											echo "<span class='glyphicon glyphicon-remove'></span> Verwijder alles"; // Deze actie zorgt ervoor dat je winkelwagen weer leeg wordt.
										echo "</a>";
									echo "</td>";
								echo "</tr>";
							echo "</table>";
						} else{
							echo "<div class='alert alert-danger text-center'>Er zijn <strong>geen producten gevonden</strong> in je winkelwagen!</div>";	// Als er zich geen items in de winkelwagen bevinden zal dit worden weergeven.
						}
					?>