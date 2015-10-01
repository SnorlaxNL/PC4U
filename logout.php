<?php
	session_start();
	session_destroy();					// De sessie wordt gedestroyed. Hierdoor zijn er geen gegevens meer over van toen je was ingelogd.
	header('Location: index.php');
?>
