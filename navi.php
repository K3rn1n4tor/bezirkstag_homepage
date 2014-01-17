<div id='navi' align='center'>
	<?php
	
	$page = 0;
	
	if (isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	
	$naviItems = array("Startseite", "Bezirksräte", "Links", "Kontakt");
	
	$counter = 0;
	foreach ($naviItems as $item)
	{
		$class = ($counter == $page) ? "focussed" : "default";
		$textClass = ($counter == $page) ? "tabFocussed" : "tabDefault";
		echo "<tab class='$class'><a class='$textClass' href='?page=$counter'>$item</a></tab>";
		$counter++;
	}
	?>

</div>