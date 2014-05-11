<div id='docs_div' align='center'>

<?php
// this script searches for all files and lists all pdf links

	// search for all pdf files
	
	$files = scandir("docs");
	
	foreach ($files as $file)
	{		
		$fileExt = end(explode('.',$file));
		$fileName = reset(explode('.',$file));
		
	
		if ($fileExt == "pdf")
		{
			echo "<a href='docs/$file' class='link_url_un'>$fileName</a><br><br>";
		}
	}

?>

</div>