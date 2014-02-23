<!DOCTYPE html>
<html lang=de>
<head>
	<meta name="author" content="Barbara Kuhn" />
	<meta name="keywords" content="CSU, Bezirkstag" />
	<meta name="description" content="Die offizielle Homepage der CSU Bezirkstagsfraktion Oberbayern" />
	<meta http-equiv="content-type" content="text/html; charset=uft-8" /> <!-- defines charset of file -->
	<meta name="robots" content="index" /> <!-- claims search machine indexing -->
	<meta http-equiv="expires" content="0" /> <!-- prevents proxy caching -->
	<title>CSU Bezirkstagsfraktion Oberbayern</title>
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
				<img class='obb_logo' src='images/OBBWappen2.gif' alt='OBB Logo'>
			</div>
			<?php  include "navi.php"; ?>
			
			
		</div>
			
			
		<div id='right_section'>
		
		<div id="header_content">
		<?php
			echo "<h1>Fraktion im Bezirkstag Oberbayern</h1>";
			echo "<p class='right_bound'><a class='link_url_un' href='?page=4'>Impressum</a></p>"
			
		?>
		
		</div>
		
			<?php
				include "content.php";
			?>
			&nbsp;<br>
			<p class='footer'>&#xa9; CSU-Bezirkstagsfraktion Oberbayern, 2014</p><br>
			&nbsp;<br>
		</div>
		
	</div>
</body>
</html>
