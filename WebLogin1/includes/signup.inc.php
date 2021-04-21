<?php
if (isset($_POST["submit"]))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$pwd2 = $_POST['pwd2'];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if(emptyInputSignup($name,$email,$uid,$pwd,$pwd2) !== false){
		header("location: ../signup.php?error=emptyInputSignup");
		exit();
	}
	if(invalidEmail($email) !== false){
		header("location: ../signup.php?error=invalidEmail");
		exit();
	}
	if(invalidUid($uid) !== false){
		header("location: ../signup.php?error=invalidUid");
		exit();
	}
	if(UidExists($conn, $uid) !==false){
		header("location: ../signup.php?error=UidExists");
		exit();
	}
	if(PwdMismatch($pwd,$pwd2)){
		header("location: ../signup.php?error=pwdnotmatch");
		exit();
	}

	CreateUser($conn, $name,$email,$uid,$pwd);

}
else{
	header("location: ../signup.php");
	exit();
}