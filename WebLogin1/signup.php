<?php
	include_once 'header.php';
?>
	<form action="./includes/signup.inc.php" method="post">
		<input type = "text" name="name" placeholder="Your Name..."/>
		<input type = "text" name="email" placeholder="Your Email..."/>
		<input type = "text" name="uid" placeholder="Your Username..."/>
		<input type = "password" name="pwd" placeholder="Your password... "/>
		<input type = "password" name="pwd2" placeholder="Confirm your password...  "/>
		<button type="submit" name="submit">Submit</button>
	</form>

	<?php
		if(isset($_GET["error"])){
			if ($_GET["error"]!== "none"){
				if ($_GET["error"] == "emptyInputSignup"){
					echo "<bold>Please fill in all fields!</bold>";
				}
				else if ($_GET["error"] == "invalidEmail"){
					echo "<bold>Wrong email format!</bold>";
				}
				else if ($_GET["error"] == "invalidUid"){
					echo "<bold>Wrong Username format!</bold>";
				}
				else if ($_GET["error"] == "UidExists"){
					echo "<bold>The username has been taken!</bold>";
				}
				else if ($_GET["error"] == "pwdnotmatch"){
					echo "<bold>Your password is not match!</bold>";
				}
				else if ($_GET["error"] == "stmtfailed"){
					echo "<bold>Something is wrong, please contact your admin!</bold>";
				}
			}
		}
	?>
<?php
	include_once 'footer.php';
?>