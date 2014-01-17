<!DOCTYPE html>
<html lang=de>
<head>
	<meta name="author" content="Harald Schwab" />
	<meta name="keywords" content="CSU, Bezirkstag" />
	<meta name="description" content="This is a description of Haralds's homepage" />
	<meta http-equiv="content-type" content="text/html; charset=uft-8" /> <!-- defines charset of file -->
	<meta name="robots" content="index" /> <!-- claims search machine indexing -->
	<meta http-equiv="expires" content="0" /> <!-- prevents proxy caching -->
	<title>Bezirkstag</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id='header_back'>
		<div id='container' align='center'>
		<?php
			include "header.php";
		?>
		</div>
	</div>
	<div id='container'>
		<div id='navi' align='center'>
		<tab class='default'><a href=''>Startseite</a></tab>
		<tab class='default'><a href=''>Bezirksräte</a></tab>
		<tab class='default'><a href=''>Links</a></tab>
		<tab class='default'><a href=''>Kontakt</a></tab>
		</div>
		<div id='container' align='center'>
			<?php
				include "content.php";
			?>
		</div>
	</div>
</body>
</html>