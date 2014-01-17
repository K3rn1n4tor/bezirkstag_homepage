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
	<link rel="stylesheet" type="text/css" href="styles/page.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
	<link rel="stylesheet" type="text/css" href="styles/logos.css">
	<link rel="stylesheet" type="text/css" href="styles/context.css">
	<link rel="stylesheet" type="text/css" href="styles/navi.css">
	<link rel="stylesheet" type="text/css" href="styles/elements.css">
</head>
<body>
	<div id='container' align='center'>
		<div id='left_section' align='center'>
			<div id='logo_content'>
				<img class='csu_logo' src='images/csu_mittelfranken_logo.png' alt='CSU Logo'>
				<img class='obb_logo' src='images/obb-wappen.png' alt='OBB Logo'>
			</div>
			<?php  include "navi.php"; ?>
			
			
		</div>
			
			
		<div id='right_section'>
		
		<div id="header_content">
		<?php
			echo "<h1>Bezirkstagsfraktion Oberbayern</h1>";
		?>
		</div>
		
			<?php
				include "content.php";
			?>
		</div>
		
			
	</div>
</body>
</html>