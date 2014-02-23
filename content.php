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
			<img class="homepage_image" src="images/Josef_Loy.jpg" alt="Josef Loy">
			
			<p>Ein herzliches Gr�� Gott auf unserer Internetseite.</p>
			<br>
			<p>Die CSU-Fraktion im Bezirkstag von Oberbayern ist mit 30 Mitgliedern die st�rkste Fraktion.</p>
			<br>
			<p>Mit  Josef Mederer als unserem Bezirkstagspr�sidenten, Friederike Steinberger als 
			   Vizepr�sidentin und einer  starken Fraktion mit Fachkompetenz in den bezirklichen Sachthemen, 
			   bestimmen und gestalten wir die Arbeit und die Zukunft im Bezirk Oberbayern.</p>
			<br>
			<p>Besonders wichtig sind dabei die Bereiche:</p>
			<br>
			<ul style='margin-left: 20px;' type="square">
				<li>Soziale Verantwortung, f�r Menschen mit Behinderung und Hilfe im Alter,</li>
				<li>Gesundheitsversorgung, f�r psychisch kranke Mitmenschen,</li>
				<li>F�rderung der Jugendarbeit,</li>
				<li>Pflege der oberbayerischen Kultur, Heimat, Brauchtum, Volksmusik, Trachten, Denkmalpflege, Museeumsarbeit, Umwelt,</li>
				<li>Bildung in besonderen F�rdereinrichtungen</li>
				<li>Solide Finanzwirtschaft mit ausgeglichenem Haushalt.</li>
			</ul>
			<br>
			<p>All diese Bereiche sind in unseren Schwerpunkten der Bezirksarbeit der CSU-Fraktion zusammengefasst und detailliert
			   dargestellt. Dort k�nnen Sie sich einen vertieften Einblick in unsere umf�ngliche, notwendige und wichtige Arbeit 
			   als dritte kommunale Ebene in Oberbayern verschaffen.</p>
			 
			<p>Danke f�r Ihr Interesse und bei Fragen wenden Sie sich bitte an </p>
			<br>
			<p>Josef Loy,</p>
			<br>
			<p>Fraktionsvorsitzender der CSU im Bezirkstag von Oberbayern.</p>
			
			
			<?php
			break;
	
		case 1:
			echo "<div id='div_center'><headline>Bezirksr�te</headline></div><br>";
						
			include "members.php";
			
			break;
				
		case 2:
			echo "<div id='div_center'><headline>Kontakt</headline></div><br>";
			
			include "contact_form.php";
			
			break;
			
		case 3:

			break;
			
		case 4:
			
			include "impressum.php";
			
			break;
	}

	
	
	
?>
</div>
