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
			<img src="images/Josef_Loy.jpg" style="float:left; margin-right: 20px; margin-top: 12px;" alt="Josef Loy">
			<strong><i>
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
			
			</strong></i>
			<?php
			break;
	
		case 1:
			
			?>
			<name>Bezirksr�te</name><br><br>
			<img class='member_image' src='https://sessionnet.edv-obb.de/bi/im/pe7.jpg' alt='Steinberger'>
			<name>Josef Mederer</name><br>
			<function>Bezirkstagspr�sident</function><br><br>
			<info>Test1: </info>Test
			<div id='content_clear'></div>
			<div class='member_seperator'></div>
			<img class='member_image' src='https://sessionnet.edv-obb.de/bi/im/pe9.jpg' alt='Steinberger'>
			<name>Friederike Steinberger</name><br>
			<function>Stellvertretende CSU-Bezirksvorsitzende</function><br><br>
			<info>Test1: </info>Test
			<div id='content_clear'></div>
			<div class='member_seperator'></div>
			<?php 
			break;
			
		case 2:
			echo "Links";
			break;
				
		case 3:
			echo "Kontakt";
			break;
	}

	
	
	/*$textdir = "texts/";
	$imgdir = "images/";
	
	// code to read text files in a given directory
	if (is_dir($textdir))
	{
		if ($dh = opendir($textdir))
		{
			while (($file = readdir($dh)) != false)
			{
				if ($file == "." || $file == "..")
				{
					continue;
				}
				
				$fh = fopen($textdir.$file, "r");
				
				$img = "";
				$name = "";
				$descr = "";
				
				while (($line = fgets($fh, 4096)) != false) {
					$split = explode(":",$line);
					if ($split[0] == "img")
					{
						$img = $imgdir.$split[1];
						//echo "img: ".$img;
					}
					elseif ($split[0] == "name")
					{
						$name = $split[1];
						//echo "name: ".$name;
					}
					else
					{
						$descr .= $line;
						//echo "img: ".$img;
					}
				}
				
				?>
				<div id='content_img'>
				<?php echo "<img src='$img'></img>"?>
				</div>
				<div id='content_txt'>
				<?php 
				echo "<name>$name</name><br><br>".$descr;
				?>
				</div>
				<div id='content_clear'>
				</div>
				<br><br>
				<?php 
				
				fclose($fh);
			}
		}
	}*/
?>
</div>
