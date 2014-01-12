<div id='content'>
<?php

	// links: https://sessionnet.edv-obb.de/bi/kp0040.asp?__kgrnr=1 -> Liste und Kontaktinfos zu allen Mitgliedern

	$textdir = "texts/";
	$imgdir = "images/";
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
	}
?>
</div>
