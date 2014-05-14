<div id='docs_div' align='center'>

<script type="text/javascript">

	var deleteButton = document.getElementById("deleteButton");
	
	function confirmDelete(filename)
	{
		if (confirm("Wollen Sie die Datei <" + filename + "> wirklich löschen?"))
		{
			deleteButton.submit();
		}

		return false;
	}

	function performRename(filename, index)
	{
		var renameButton = document.getElementById("renameButton" + index);
		var newFilenameInput = document.getElementById("new_filename" + index);

		var oldFilename = filename.substr(0, filename.lastIndexOf('.'));
		var oldExtension =  filename.substr(filename.lastIndexOf('.') + 1);
		
		var newFilename = prompt("Geben Sie den neuen Dateinamen ein: ", oldFilename);

		//alert(newFilename);
		
		if (newFilename == filename)
		{
			alert("Datei wird nicht umbenannt. Der eingegebene Dateiname und der alte Dateiname sind gleich.");
			return false;
		}

		if (newFilename == null || newFilename == "")
		{
			return false;
		}

		newFilenameInput.value = newFilename + "." + oldExtension;
		renameButton.submit();
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

	$uploadFileError = 0;
	$allowedExts = array("pdf" , "txt", "doc", "docx", "xls", "xlsx");

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
			<input type="submit" name="submit" value="Hochladen" id="submit" class='buttonStyle' onclick='return confirmUpload();'
					title="Ausgewählte Datei hochladen">
		</form>
		</div>
	<?php 
	}
	
	function printUploadError($error)
	{
		if ($error == 0)
			return;
		
		echo "<err>";
		echo "Datei kann nicht hochgeladen werden.";
		switch($error)
		{
			case 1:
				echo " Die Datei ist zu groß (> 40 MB)!";
				break;
				
			case 101:
				echo " Der Dateityp ist nicht zugelassen!";
				break;
				
			default:
				echo " Unbehandelter Fehler ist aufgetreten!";
				break;
		}
		
		echo "</err>";
		
	}
	
	// handle upload of new files
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (isset($_POST['deleting']) && $_POST['deleting'])
		{
			$delFile = $_POST['filename'];
			
			if (unlink("docs/".$delFile))
			{
				echo "<done>Datei '".$delFile."' wurde gelöscht.</done>";
			}
			else
			{
				echo "<err>Datei '".$delFile."' konnte nicht gelöscht werden.</err>";
			}
			
			echo "<br>";
		}
		else if (isset($_POST['renaming']) && $_POST['renaming'])
		{
			$index = $_POST['index'];
			$oldFilename = $_POST['old_filename'];
			$newFilename = $_POST['new_filename'.$index];
			
			//echo $newFilename."<br>";
			
			if (rename("docs/".$oldFilename, "docs/".$newFilename))
			{
				echo "<done>Datei '".$oldFilename."' wurde in <br> '".$newFilename."' umbenannt.</done>";
			}
			else
			{
				echo "<err>Datei '".$oldFilename."' konnte nicht umbenannt werden.</err>";
			}
			
			echo "<br>";
			
		}

		else
		{		
			$filename = $_FILES['file']['name'];
			$filetype = $_FILES['file']['type'];
			$uploadFileError = $_FILES['file']['error'];
			
			if ($uploadFileError == 0)
			{
				$extension = end(explode(".", $filename));
				
				//echo "Uploading <".$filename.">...<br>";
				//echo "$filetype<br>";
				//echo "$extension<br>";
				
				if (($filetype == "text/plain" || // txt
					 $filetype == "application/pdf" || // pdf
					 $filetype == "application/msword" || // doc
					 $filetype == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ||
					 $filetype == "application/vnd.ms-excel" || // xls
					 $filetype == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") && // xlsx
					 in_array($extension, $allowedExts))
				{
					if (move_uploaded_file($_FILES['file']['tmp_name'], "docs/".$filename))
					{
						echo "<done>Datei '".$filename."' wurde hochgeladen.</done>";
					}
					else
					{
						echo "<err>Datei '<".$filename."' konnte nicht hochgeladen werden.</err>";
					}
				}
				else {
					$uploadFileError = 101; // error for no allowed extension
				}
				
				/*?>
				<script type="text/javascript">
					window.location.reload();
				</script>
				<?php */
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
		
	
		if (in_array($fileExt, $allowedExts))
		{			
			if ($sessionLoggedIn)
			{
				echo "<tr>";
				echo "<td>";
				showPDFLink($file);
				echo "</td>";
				?>
				<td>
				<form name="Deletion" action="Dokumente" method="post">
					<input type="hidden" name="deleting" value="true">
					<input type="hidden" name="filename" value="<?php echo "$file"; ?>">
					<button name='DeleteItem$counter' type='submit' onclick="return confirmDelete('<?php echo "$file"; ?>');" 
							value='deleteItem' id='deleteButton' style='margin-left:40px; height:auto;'
							title="Datei löschen">
					<p><img src='images/DeleteButton.png' alt='Delete Icon'></p>
					</button>
				</form>
				</td>
				<td>
				<form name="Renaming" action="Dokumente" method="post">
					<input type="hidden" name="renaming" value="true">
					<input type="hidden" name="index" value="<?php echo "$counter"; ?>">
					<input type="hidden" name="old_filename" id='old_filename' value="<?php echo "$file"; ?>">
					<input type="hidden" name="new_filename<?php echo "$counter"; ?>" id='new_filename<?php echo "$counter"; ?>'>
					<button name='RenameItem<?php echo "$counter"; ?>' type='submit' 
							onclick="return performRename('<?php echo "$file"; ?>','<?php echo "$counter"; ?>');" 
							value='renameItem' id='renameButton<?php echo "$counter"; ?>' style='margin-left:40px; height:auto;'
							title="Datei umbenennen">
					<p><img src='images/EditButton.png' alt='Edit Icon'></p>
					</button>
				</form>
				</td>
				</tr>
				<?php 
			}
			else
			{
				showPDFLink($file);
				echo "<br><br>";
			}
			
			$counter++;
		}
	}
	
	if ($sessionLoggedIn)
	{
		echo "</table>";
		
		echo "<br><br>";
		uploadForm();
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			printUploadError($uploadFileError);
		}
	}

?>

</div>