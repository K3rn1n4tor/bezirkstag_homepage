<div id='content'>

<?php
	// links: https://sessionnet.edv-obb.de/bi/kp0040.asp?__kgrnr=1 -> Liste und Kontaktinfos zu allen Mitgliedern

	$page = 0;
	if (isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	
	switch($page)
	{
		case 0:?>
		
			<div id='div_center'><headline>Startseite</headline></div><br>
			<img class="homepage_image" src="images/Josef_Loy_new_small.jpg" alt="Josef Loy">
			<br>
			<p>Ein herzliches Grüß Gott auf unserer Internetseite.</p>
			<br>
			<p>Die CSU-Fraktion im Bezirkstag von Oberbayern ist mit 30 Mitgliedern die stärkste Fraktion.</p>
			<br>
			<p>Mit  Josef Mederer als unserem Bezirkstagspräsidenten, Friederike Steinberger als 
			   Vizepräsidentin und einer  starken Fraktion mit Fachkompetenz in den bezirklichen Sachthemen, 
			   bestimmen und gestalten wir die Arbeit und die Zukunft im Bezirk Oberbayern.</p>
			<br>
			<p>Besonders wichtig sind dabei die Bereiche:</p>
			<br>
			<br>
			<ul style='margin-left: 20px;' type="square">
				<li>Soziale Verantwortung, für Menschen mit Behinderung und Hilfe im Alter,</li>
				<li>Gesundheitsversorgung, für psychisch kranke Mitmenschen,</li>
				<li>Forderung der Jugendarbeit,</li>
				<li>Pflege der oberbayerischen Kultur, Heimat, Brauchtum, Volksmusik, Trachten, Denkmalpflege, Museeumsarbeit, Umwelt,</li>
				<li>Bildung in besonderen Fördereinrichtungen</li>
				<li>Solide Finanzwirtschaft mit ausgeglichenem Haushalt.</li>
			</ul>
			<br>
			<p>All diese Bereiche sind in unseren Schwerpunkten der Bezirksarbeit der CSU-Fraktion zusammengefasst und detailliert
			   dargestellt. Dort können Sie sich einen vertieften Einblick in unsere umfängliche, notwendige und wichtige Arbeit 
			   als dritte kommunale Ebene in Oberbayern verschaffen.</p>
			 
			<p>Danke für Ihr Interesse und bei Fragen wenden Sie sich bitte an </p>
			<br>
			<p>Josef Loy,</p>
			<br>
			<p>Fraktionsvorsitzender der CSU im Bezirkstag von Oberbayern.</p>
			<br>
			<p><strong>Hier ist unser Flyer zur Bezirkstagswahl 2018. Zum Download einfach auf das Bild klicken:</strong></p>
			<br>
			<a href="docs/CSU_Flyer_Wahl2018.pdf">
				<img border="0" src="images/Flyer_Wahl2018.png" alt="Flyer Wahl 2018" width="720px">
			</a>
			
			<?php
			break;
	
		// Members
		case 1:
			echo "<div id='div_center'><headline>Bezirksräte</headline></div><br>";
						
			include "members.php";
			
			break;
		// Contact
		case 2:
			echo "<div id='div_center'><headline>Kontakt</headline></div><br>";
			
			include "contact_form.php";
			
			break;
			
		case 3:
			echo "<div id='div_center'><headline>Dokumente</headline></div><br>";
			
			include "documents.php";
			break;
			
		// Impressum
		case 10:
			echo "<div id='div_center'><headline>Impressum</headline></div><br>";
			
			include "impressum.php";
			
			break;
			
		// LogIn
		case 110:
			echo "<div id='div_center'><headline>Anmeldung</headline></div><br>";
			
			include "login.php";
			
			break;
	}

	
	
	
?>
</div>
