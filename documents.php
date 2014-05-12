<div id='docs_div' align='center'>

<script>

	function confirmDelete(filename)
	{
		if (confirm("Wollen Sie die Datei <" + filename + "> wirklich löschen?"))
		{
			var params = "delFile=test";

			//! TODO: handle delete request
			xmlhttp=new XMLHttpRequest();
			xmlhttp.open("POST","documents.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", params.length);
			xmlhttp.send(params);
		}
	}

	function confirmUpload()
	{
		var fileUpload = document.getElementById("file");
		var submitButton = document.getElementById("submit");
		
		if (fileUpload.value != "" && confirm("Wollen Sie die ausgewählte Datei wirklich hinzufügen?"))
		{
			submitButton.submit();
		}

		return false;
	}

</script>

<?php
// this script searches for all files and lists all pdf links
// it also allows to upload new files

	function showPDFLink($file)
	{
		echo "<a href='docs/$file' class='link_url_un'>$file</a>";
	}
	
	function uploadForm()
	{
	?>
		<div style='border-width:2px; border-style:solid; padding:10px; width:400px;'>
		<strong>Neues Dokument hochladen:</strong><br><br>
		<form name="Upload" action="Dokumente" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="file"><br><br>
			<input type="submit" name="submit" value="Hochladen" id="submit" class='buttonStyle' onclick='return confirmUpload();'">
		</form>
		</div>
	<?php 
	}
	
	function printUploadError($error)
	{
		switch($error)
		{
			case 1:
				echo "File size is too big!";
				break;
		}
		
	}
	
	$uploadFileError = 0;
	
	// handle upload of new files
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (isset($_POST['delFile']))
		{
			echo $_POST['delFile'];
		}
		else
		{
		
		
			$allowedExts = array("pdf" , "txt", "doc", "docx", "xls", "xlsx");
			$filename = $_FILES['file']['name'];
			$filetype = $_FILES['file']['type'];
			$uploadFileError = $_FILES['file']['error'];
			
			if ($uploadFileError == 0)
			{
				$extension = end(explode(".", $filename));
				
				echo "$filetype<br>";
				echo "$extension<br>";
				
				if (($filetype == "text/plain" ||
					 $filetype == "application/pdf") && 
					 in_array($extension, $allowedExts))
				{
					move_uploaded_file($_FILES['file']['tmp_name'], "docs/".$filename);
					
					?>
					<script type="text/javascript">
					window.location.reload();
					</script>
					<?php 
				}
				
				echo "request!!<br>";
			}
		}
	}

	// search for all pdf files
	
	$files = scandir("docs");
	
	if ($sessionLoggedIn)
	{
		echo "<table>";
	}
	
	$counter = 0;
	foreach ($files as $file)
	{		
		$fileExt = end(explode('.',$file));
		$fileName = reset(explode('.',$file));
		
	
		if ($fileExt == "pdf" || $fileExt == "txt" || $fileExt == "docx")
		{			
			if ($sessionLoggedIn)
			{
				echo "<tr>";
				echo "<td>";
				showPDFLink($file);
				echo "</td>";
				echo "<td><button name='DeleteItem$counter' type='button' onclick=\"confirmDelete('$file');\" value='deleteItem' style='margin-left:40px; height:auto;'>";
				echo " <p><img src='images/DeleteButton.png' alt='Delete Icon'></p>";
				echo "</button></td>";
				echo "</tr>";
			}
			else
			{
				showPDFLink($file);
				echo "<br>";
			}
			
			$counter++;
		}
	}
	
	if ($sessionLoggedIn)
	{
		echo "</table>";
		
		echo "<br><br>";
		uploadForm();
		
		printUploadError($uploadFileError);
	}

?>

</div>