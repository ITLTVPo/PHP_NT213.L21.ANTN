<?php
function emptyInputSignup($name,$email,$uid,$pwd,$pwd2){
	$result;
	if(empty($name) || empty($email) || empty($uid) || empty($pwd) || empty($pwd2)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invalidEmail($email){
	$result;
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invalidUid($uid){
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/",$uid)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function UidExists($conn, $uid) {
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt,'ss',$uid,$uid);
	mysqli_stmt_execute($stmt);
	$stmt = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_assoc($stmt)){
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function PwdMismatch($pwd,$pwd2){
	$result;
	if($pwd !== $pwd2){
		$result = true;
	}
	else{ 
		$result = false;
	}
	return $result;
}

function CreateUser($conn, $name,$email,$uid,$pwd){
	$sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES (?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../signup.php?error=stmtfailed1");
		exit();
	}
	$pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,'ssss',$name,$email,$uid,$pwdHash);
	mysqli_stmt_execute($stmt);
	header("location: ../login.php");
	mysqli_stmt_close($stmt);
}

function emptyInputLogin($uid,$pwd){
	$result;
	if (empty($uid)||empty($pwd)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function UserLogin($conn,$uid,$pwd){
	$user = UidExists($conn,$uid,$uid);
	if ($user===false){
		header("location: ../login.php?error=WrongLogin");
		exit();
	}
	$check_pwd = password_verify($pwd,$user["usersPwd"]);
	if ($check_pwd !== true){
		header("location: ../login.php?error=WrongLogin");
		exit();
	}
	else if ($check_pwd ==true){
		session_start();
		$_SESSION["userId"] = $user["usersId"];
		$_SESSION["userUid"] = $user["usersUid"];
		header("location: ../index.php");
		exit();
	}
}

