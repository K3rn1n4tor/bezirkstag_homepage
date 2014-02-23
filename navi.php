<div id='navi' align='center'>
	<?php
	
	$page = 0;
	
	if (isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	
	$naviItems = array("Startseite", "Bezirksräte", "Kontakt");
	
	$counter = 0;
	foreach ($naviItems as $item)
	{
		$class = ($counter == $page) ? "focussed" : "default";
		$textClass = ($counter == $page) ? "tabFocussed" : "tabDefault";
		echo "<tab class='$class'><a class='$textClass' href='?page=$counter'>$item</a></tab>";
		$counter++;
	}
	?>
	&nbsp;<br><br><br>
	<headline_navi>Links:</headline_navi><br><br>
	<strong>
			<ul style='text-align: left;'>
			<li style='margin-left: 20px;' type="square"><a class='link_url' href='http://www.csu.de'>CSU – Christlich-Soziale Union</a></li><br>
			<li style='margin-left: 20px;' type="square"><a class='link_url' href='http://www.csu-landtag.de'>Die Fraktion der CSU im Bayerischen Landtag</a></li><br>
			<li style='margin-left: 20px;' type="square"><a class='link_url' href='http://www.csu-landesgruppe.de'>Die CSU Abgeordneten im Deutschen Bundestag</a></li><br>
			<li style='margin-left: 20px;' type="square"><a class='link_url' href='http://www.csu-europagruppe.de'>Die CSU Abgeordneten im Europäischen Parlament</a></li><br>
			<li style='margin-left: 20px;' type="square"><a class='link_url' href='http://www.bezirk-oberbayern.de'>Bezirk Oberbayern</a></li><br>
			<li style='margin-left: 20px;' type="square"><a class='link_url' href='http://www.bezirk-oberbayern.de/index.phtml?La=1&NavID=360.80.1&MNavID=1.2,Navigation%20Bezirk-Oberbayern'>Pressemitteilungen Bezirk Oberbayern</a></li><br>
			</ul>
	</strong>

</div>
