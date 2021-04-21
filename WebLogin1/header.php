<!DOCTYPE html/>
<html>
	<head>
		<link href="./css/form.css" rel="stylesheet"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	</head>
	<body>
		<?php
			session_start();
			if (isset($_SESSION['userId'])){
				echo "<ul>";
				echo "<li><a href='./includes/logout.inc.php'>Log Out</a></li>";
				echo "<li><a href='myprofile.php'>My Profile</a></li>";
				echo "</ul>";
			}
			else{
				echo "<ul>";
				echo "<li><a href='login.php'>Login</a></li>";
				echo "<li><a href='signup.php'>Sign Up</a></li>";
				echo "</ul>";
			}
			?>