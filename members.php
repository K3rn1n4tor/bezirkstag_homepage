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
		
		echo "<img class='member_image' src='$img' alt='$name'>";
		
		?>
		
		</div>
		<div id='members_right'>
		
		<?php
		echo "<name><a href='$page'>$name</a></name><br>";
		echo "<function>$func</function><br><br>";
		
		// additional information
		$stimmkreis = $member['Stimmkreis:'];
		$mail = str_replace("@", "(at)", $member['E-Mail:']);
		$town = $member['Ort:'];
		$street = $member['Stra�e:'];
		
		echo "<table>";
			echo "<tr><td class='attr'>Stra�e:</td><td>$street</td></tr>";
			echo "<tr><td class='attr'>Ort:</td><td>$town</td></tr>";
			echo "<tr><td class='attr'>Stimmkreis:</td><td>$stimmkreis</td></tr>";
			echo "<tr><td class='attr'>E-Mail:</td><td>$mail</td></tr>";
		echo "</table><br>";
	
			echo "<a class='details' href='$page' title='Details zu $name'>Details</a>";
		?>
		</div>
		<div id='content_clear'></div>
		<div class='member_seperator'></div>
		<?php 
	}


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

?>