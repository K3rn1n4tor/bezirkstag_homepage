<div id='content'>
<?php

	// links: https://sessionnet.edv-obb.de/bi/kp0040.asp?__kgrnr=1 -> Liste und Kontaktinfos zu allen Mitgliedern

	function list_members()
	{
		$membersFileDir = 'texts/bezirksraete.txt';
		
		$members = array();
		
		$file = @fopen($membersFileDir, "r");
		
		if ($file)
		{
			while (($line = fgets($file, 4096)) !== false)
			{
				$line = preg_replace('/\s+/', '', $line);
				if (strcmp($line, "=====BEGIN_MEMBER=====") == 0)
				{
					$attr = array();
					while(($buffer = fgets($file, 4096)) !== false)
					{
						// in windows newline character is '\r\n'
						$str = str_replace(array("\n", "\r"), "", $buffer);
						if (strcmp($str,"=====END_MEMBER=====") == 0)
						{
							break;
						}

						list($info,$content) = explode("\t", $str);
						$attr[$info] = $content;
					}
					
					$members[] = $attr;
				}
			}
		}
		else
		{
			echo $file." not found!";
			return array("");
		}
		
		return $members;
	}

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
			<ul style='margin-left: 20px;' type="square">
				<li>Soziale Verantwortung, für Menschen mit Behinderung und Hilfe im Alter,</li>
				<li>Gesundheitsversorgung, für psychisch kranke Mitmenschen,</li>
				<li>Förderung der Jugendarbeit,</li>
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
			
			</strong></i>
			<?php
			break;
	
		case 1:
			?>
			<name>Bezirksräte</name><br><br>
			<?php			
			$members = list_members();
			
			foreach($members as $member)
			{
				// basic information
				$name = $member['Name:'];
				$img = $member['Bild:'];
				$page = $member['URL:'];
				$func = (array_key_exists("Bezirkstagsfunktion:", $member)) ? $member['Bezirkstagsfunktion:'] : $member['Beruf:'];
				
				?>
				<div id='members_left'>
				<?php
				
				echo "<img class='member_image' src=$img alt=$name>";
				?>
				</div>
				<div id='members_right'>
				<?php
				echo "<name><a href=$page>$name</a></name><br>";
				echo "<function>$func</function><br><br>";
				
				// additional information
				$stimmkreis = $member['Stimmkreis:'];
				$mail = str_replace("@", "(at)", $member['E-Mail:']);
				$town = $member['Ort:'];
				$street = $member['Straße:']
				
				?>
				<table>
				<?php
					echo "<tr><td class='attr'>Straße:</td><td>$street</td></tr>";
					echo "<tr><td class='attr'>Ort:</td><td>$town</td></tr>";
					echo "<tr><td class='attr'>Stimmkreis:</td><td>$stimmkreis</td></tr>";
					echo "<tr><td class='attr'>E-Mail:</td><td>$mail</td></tr>";
					
				?>
				</table><br>
				<?php 
					echo "<a class='details' href=$page title='Details zu $name'>Details</a>";
				?>
				</div>
				<div id='content_clear'></div>
				<div class='member_seperator'></div>
				<?php 
			}
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
