<div id='login_div' align='center'>
<?php

	function showLoginForm()
	{
		?><form method='post' action='Anmelden'>
				<table class='contact'>
				<tr>
					<td>Benutzername:</td>
					<td><input type='text' name='username'></td>
				</tr>
				<tr>
					<td>Passwort:</td>
					<td><input type='password' name='password'></td>
				</tr>
				<tr>
					<td colspan=2 align='center'><input type='submit' value='Anmelden'></td>
				</tr>
				</table>
				
			</form>
	<?php 	
	}

	// check if user has tried to authenticate
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if ($username == 'r00t' && $password == "master")
		{
			$_SESSION['authenticated'] = true;
			$_SESSION['username'] = "r00t";
			
			header("Location: Startseite");
		}
		else
		{
			$_SESSION['authenticated'] = false;	
			
			showLoginForm();
			
			echo "<err>Authorisierung fehlgeschlagen. Benutzername oder Passwort ist nicht korrekt!</err>";
		}
	}
	else 
	{
		showLoginForm();
	}

?>
</div>