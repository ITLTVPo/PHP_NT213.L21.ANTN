<?php
	include_once 'header.php';
?>	
	<form action='./includes/login.inc.php' method='post'>
		<input type="text" name = "uid" placeholder="Username or email"/>
		<input type="password" name = "pwd" placeholder="Password"/>
		<button type="submit" name="submit">Login</button>
	</form>
	<?php
	if (isset($_GET["error"])){
		if($_GET["error"]=="emptyInputLogin"){
			echo "<bold>Please fill in all the fields</bold>";
		}
		if($_GET["error"]=="WrongLogin"){
			echo "<bold>Failed login please try again!</bold>";
		}
		if($_GET["error"]=="stmtfailed"){
			echo "<bold>Something is wrong, please contact your admin!!</bold>";
		}
	}
	?>
<?php
	include_once 'footer.php';
?>