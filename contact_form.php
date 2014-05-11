<div id='contact_div' align='center'>
<?php
	
	// contact items
	
	// htmlspecialchars: convert html special chars to html code
	// strip_tags: remove xhtml tags
	$firstname = (isset($_POST["firstname"])) ? htmlspecialchars(strip_tags($_POST["firstname"], ENT_QUOTES)) : "";
	$name = (isset($_POST["lastname"])) ? htmlspecialchars(strip_tags($_POST["lastname"], ENT_QUOTES)) : "";
	$address = (isset($_POST["address"])) ? htmlspecialchars(strip_tags($_POST["address"], ENT_QUOTES)) : "";
	$town = (isset($_POST["town"])) ? htmlspecialchars(strip_tags($_POST["town"], ENT_QUOTES)) : "";
	$mail = (isset($_POST["e-mail"])) ? htmlspecialchars(strip_tags($_POST["e-mail"], ENT_QUOTES)) : "";
	$phone = (isset($_POST["phone"])) ? htmlspecialchars(strip_tags($_POST["phone"], ENT_QUOTES)) : "";
	$message = (isset($_POST["message"])) ? htmlspecialchars(strip_tags($_POST["message"], ENT_QUOTES)) : "";
	
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
	
	$fakeLabel = "Bitte f�llen sie dieses Feld nicht aus!";

	(!isset($_POST["submit"])) ? displayContactForm() : checkContactItems();

	function checkContactItems()
	{
		global $formItems, $fakes, $fakeItems;
		
		
		// search for fakes!
		foreach($fakeItems as $key => $value)
		{
			if (!empty($value))
			{
				echo "This is fake. =(";
				return;
			}
		}
		
		// check false email?
		// with filter_var($mail, FILTER_VALIDATE_MAIL | FILTER_SANITIZE_MAIL);
		
		// search for missing entries
		foreach($formItems as $key => $value)
		{
			if (in_array($key, $fakes))
				continue;
			
			if (empty($value))
			{
				displayContactForm();
				echo "<err>Sie haben vergessen, alle Felder auszufüllen.<br> Bitte füllen Sie alle rot markierten Felder aus!</err>";
				return;
			}
			
		}
		
		sendMail();	
	}

	function displayContactForm()
	{
		global $formItems, $formLabels, $fakeLabel, $fakes;
		
		$submitDone = isset($_POST["submit"]);
		
		?>
			<strong><p>Nehmen Sie mit uns hier schnell und einfach Kontakt auf.</p>
			<p>Wir freuen uns über jede Anfrage!</p></strong><br>
			<form action='Kontakt' method='post' accept-charset="UTF-8">
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
			{
				echo "<textarea id='$key' name='$key' rows='10' cols='25' value=''>$value</textarea>";
			}
			else
			{
				echo "<input type='text' id='$key' name='$key' size='30' maxlength='40' value='$value'>";
			}
			
			echo "</td></tr>";
		}
		
		?>
		
		<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Absenden'></td></tr>
				</table>
			</form>
		
		<?php
	}
	
	function sendMail()
	{
		global $firstname, $name, $address, $town, $mail, $phone, $message;
		
		require 'import/class.phpmailer.php';
		
		$requester = $firstname." ".$name;
		
		$mailMessage = "Sehr geehrter Bezirkstags,<br>
						eine neue Anfrage ist eingetroffen!<br><br>
						<strong>$requester</strong> schreibt:<br>

						=========================================<br>
						$message<br>
						=========================================<br>

						<strong>Kontaktdaten:</strong><br><ul>
						<li>Adresse: $address, $town</li>
						<li>Telefon: $phone</li>
						<li>E-Mail: $mail</li>
						</ul>";

		$mailSubject = "[csu-bezirkstag-obb.de] Neue Anfrage von $requester";
		
		// create new mail service
		$mailer = new PHPMailer();
		// set mail service settings
		//$mailer->IsSMTP();
		//$mailer->Host = "mrvnet.kundenserver.de";
		// smtp settings
		//$mailer->IsSMTP();
		//$mailer->SMTPDebug = 1;
		// sender
		$mailer->FromName = "CSU Bezirkstag Oberbayern";
		//$mailer->From = "michi.kern@kabelmail.de";
		//$mailer->From = "noreply@csu-bezirkstag-obb.de";
		//$mailer->FromName = "CSU Bezirkstagsfraktion Oberbayern";
		// smtp security settings SMTP with authentication
		$mailer->IsSendmail();
		//$mailer->SMTPAuth = true;
		//$mailer->Host = "smtp.kabelmail.de";
		//$mailer->Port = 25;
		// authentication data
		//$mailer->Username = "michi.kern@kabelmail.de";
		//$mailer->Password = "M12345678";
		// receiver
		//$mailer->AddAddress("kernm@in.tum.de");
		$mailer->AddAddress("csubezirkstagsfraktion@t-online.de");
		// mail content
		$mailer->CharSet = 'utf-8';
		$mailer->Subject = $mailSubject;
		$mailer->Body = $mailMessage;
		$mailer->IsHTML(true);
		
		if ($mailer->Send())
			echo "<strong><p>Ihre Anfrage wurde erfolgreich gesendet. Vielen Dank.</p></strong>";
		else
			echo $mailer->ErrorInfo."<br><strong><p>Leider ist ein unerwarteter Fehler beim Senden der Anfrage eingetreten!<br>Bitte probieren Sie es sp�ter nochmal. Wir bitten um Ihr Verst�ndnis.</p></strong>";
		
	}
?>

</div>
