
<?php
	
	// contact items
	$firstname = (isset($_POST["firstname"])) ? $_POST["firstname"] : "";
	$name = (isset($_POST["lastname"])) ? $_POST["lastname"] : "";
	$address = (isset($_POST["address"])) ? $_POST["address"] : "";
	$town = (isset($_POST["town"])) ? $_POST["town"] : "";
	$mail = (isset($_POST["e-mail"])) ? $_POST["e-mail"] : "";
	$phone = (isset($_POST["phone"])) ? $_POST["phone"] : "";
	$message = (isset($_POST["message"])) ? $_POST["message"] : "";
	
	// fake items
	$fakeMail = (isset($_POST["email"])) ? $_POST["email"] : "";
	$fakeHomepage = (isset($_POST["homepage"])) ? $_POST["homepage"] : "";

	// gather all items
	$formItems = array(
			"firstname" => $firstname,
			"lastname" => $name,
			"address" => $address,
			"town" => $town,
			"email" => $fakeMail,
			"e-mail" => $mail,
			"phone" => $phone,
			"homepage" => $fakeHomepage,
			"message" => $message
		);
	
	$fakes = array("email", "homepage");
	
	$fakeItems = array(
			"email" => $fakeMail,
			"homepage" => $fakeHomepage
		);
	
	$formLabels = array(
			"firstname" => "Vorname",
			"lastname" => "Name",
			"address" => "Anschrift",
			"town" => "PLZ, Ort",
			"e-mail" => "E-Mail",
			"phone" => "Telefon",
			"message" => "Ihre Nachricht"
		);
	
	$fakeLabel = "Bitte füllen sie dieses Feld nicht aus!";

	(!isset($_POST["submit"])) ? displayContactForm() : checkContactItems();

	function checkContactItems()
	{
		global $formItems, $fakes, $fakeItems;
		
		//$missingValue = false;
		
		foreach($fakeItems as $key => $value)
		{
			if (!empty($value))
			{
				echo "This is fake. =(";
				return;
			}
		}
		
		foreach($formItems as $key => $value)
		{
			if (in_array($key, $fakes))
				continue;
			
			if (empty($value))
			{
				displayContactForm();
				echo "Error. Values are missing";
				return;
			}
			
		}
		
		
		echo "Dankeschön.";
		
	}

	function displayContactForm()
	{
		global $formItems, $formLabels, $fakeLabel, $fakes;
		
		$submitDone = isset($_POST["submit"]);
		
		?>
		<div id='contact_div' align='center'>
			<strong><p>Nehmen Sie mit uns hier schnell und einfach Kontakt auf.</p>
			<p>Wir freuen uns über jede Anfrage!</p></strong><br>
			<form action='?page=2' method='post'>
				<table class='contact'>
		<?php
		
		foreach($formItems as $key => $value)
		{
			$isFake = in_array($key, $fakes);
			
			echo ($isFake) ? "<tr class='highlight'>" : "<tr>";
			
			// display label
			echo ($submitDone && !$isFake && empty($value)) ? "<td class='missing'>" : "<td>";
			$label = ($isFake) ? $fakeLabel : $formLabels[$key];
			echo "<label for='$key'>$label</label></td>";
			
			// display input
			echo ($submitDone && !$isFake && empty($value)) ? "<td class='missing'>" : "<td>";
			
			if ($key == "message")
				echo "<textarea id='$key' name='$key' rows='10' cols='25' value='$value'></textarea>";
			else
				echo "<input type='text' id='$key' name='$key' size='30' maxlength='40' value='$value'>";
			
			echo "</td></tr>";
		}
		
		?>
		
		<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Absenden'></td></tr>
				</table>
			</form>
		</div>
		
		<?php
	}
?>
