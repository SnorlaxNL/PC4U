Hallo rickhoofd<!DOCTYPE html>
<html>
	<head>
	<!-- Character set -->
		<meta charset="UTF-8">
		
		<!-- SEO -->
		<meta name="keywords" content="">
	    <meta name="description" content="">
		<meta name="author" content="G">
		
		<!-- Maakt in zoomen op mobiel mogelijk (zorgt er ook voor dat de website er goed en responsive uitziet op de mobiel/tablet/laptop) -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Title -->
		<title>PC4U | Uw computer specialist</title> <!-- Slagzin zit er ook in voor SEO -->
		
		<!-- Icon -->
		<link rel="icon" type="image/jpg" href="img/GGG.png"> <!-- Eventueel de icon verbeteren -->

		<!-- CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> <!-- Dit laat vaak sneller bij mensen, omdat dit op meerdere site's wordt gezet en dus is er een grote kans dat deze CSS al op de machine van een gebruiker staat waardoor ze het alleen maar van de machine hoeven op te vragen wat tijd scheelt. Verder zal het je eigen hosting server niet belasten -->
		<link rel="stylesheet" href="css/bootstrap-theme.min.css"> <!-- Kan niet zoals hierboven geïmporteerd worden want ik heb de class names moeten veranderen wegens een confrontatie in de button-layout tussen de buttons in de header en in de footer -->
		<link rel="stylesheet" href="css/custom.css"> <!-- Hier bevindt zich alle zelfgemaakte CSS -->
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> <!-- Dit wordt gebruikt voor bepaalde buttons, bjvoorbeeld de "share buttons" in de footer -->
		
	</head>
	<body>
<!-- Navigation Bar -->
	<nav class="navbar navbar-default navbar-fixed-top topnav">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#page-top" data-id="page-top"><div class="hidden-xs"></div><div class="visible-xs-block">plaatje :)</div></a>
				<ul class="visible-xs-block xs-basket nav navbar-nav pull-right">
					<li><a href="#winkelwagen" data-toggle="modal"><img class="cart" src="img/winkelwagen.png" alt="Winkelwagen" width="20" height="20"><span class="badge" id="comparison-count"><?php print_r(count($_SESSION['cart_items'])); ?></span></a></li>
				</ul>
			</div>
			<!-- Alles dat geactiveerd wordt wanneer je op de button klikt hier: -->
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-center hidden-xs">
					<li><a href="#Componenten">Componenten</a></li>
					<li><a href="#Randapparatuur">Randapparatuur</a></li>
					<li><a href="#Contact">Contact</a></li>
					<li class="dropdown">
						<?php include 'templates/login-form.php'; ?>
					</li>
					<li class="hidden-xs"><a href="#winkelwagen" data-toggle="modal"><img class="cart" src="img/winkelwagen.png" alt="Winkelwagen" width="20" height="20"><span class="badge" id="comparison-count"><?php print_r(count($_SESSION['cart_items'])); ?></span></a></li> <!-- Dit zal laten zien wat je allemaal gaat bestellen, momenteel is alleen een winkelwagen tekentje nodig -->
				</ul><ul class="nav navbar-nav visible-xs-block">
					<li><a href="#Componenten">Componenten</a></li>
					<li><a href="#Randapparatuur">Randapparatuur</a></li>
					<li><a href="#Contact">Contact</a></li>
					<li class="dropdown">
						<?php include 'templates/login-form.php'; ?>
					</li>
					<li class="hidden-xs"><a href="#winkelwagen" data-toggle="modal"><img class="cart" src="img/winkelwagen.png" alt="Winkelwagen" width="20" height="20"><span class="badge" id="comparison-count"><?php print_r(count($_SESSION['cart_items'])); ?></span></a></li> <!-- Dit zal laten zien wat je allemaal gaat bestellen, momenteel is alleen een winkelwagen tekentje nodig -->
				</ul>
			</div>
		</div>
	</nav>
<!-- Header -->
	<section id="header">
		<header>
			<div class="container">
				<img src="img/winkel.jpg">
			</div>
		</header>
	</section>
		
<!-- JavaScript (& jQuery) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script type="text/javascript">
// jQuery for page scrolling feature - requires jQuery Easing plugin
	$(function() {
		$('body').on('click', '.page-scroll a', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
	});
	</script>
	<script type="text/javascript">
	$(document).ready(function(){       
		var scroll_start = 0;
		var startchange = $('#navbar-change');
		var offset = startchange.offset();
		
		if (startchange.length){
			$(document).scroll(function() { 
			scroll_start = $(this).scrollTop();
			if(scroll_start > offset.top) {
				$(".navbar-visible").css('display', 'block');
			} else {
				$('.navbar-visible').css('display', 'none');
			}
			});
		}
	});
	</script>
	</body>
</html>