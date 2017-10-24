	<?php

	include 'dbh.php';

	$first = $_POST['first'];
	$last = $_POST['last'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$cnfrm_pwd = $_POST['cnfrm_pwd'];

	// error handling 

	// check if any fields are empty
	if (empty($uid) or empty($pwd) or empty($cnfrm_pwd)) {
	header('Location: ../sign-up.php?error=empty');
	exit();
	}

	// check if user already exists
	$sql = "SELECT uid FROM user WHERE uid='$uid'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);

	if (mysqli_num_rows($result) > 0) {
	header("Location: ../sign-up.php?error=username");
	exit();
	}

	// check if passwords match
	if ($_POST["pwd"] !== $_POST["cnfrm_pwd"]) {
	header("Location: ../sign-up.php?error=password");
	exit();
	}

	else {
	$encrypted_password = password_hash($pwd, PASSWORD_DEFAULT);
	$sql = "INSERT INTO user (first, last, uid, pwd) 
	VALUES ('$first', '$last', '$uid', '$encrypted_password')";
	mysqli_query($conn, $sql);

	// assign id to profileimg table
	$sql = "SELECT * FROM user WHERE uid='$uid'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$userid = $row['id'];
	$sql = "INSERT INTO profileimg (userid, status) 
	VALUES ('$userid', 1)";
	mysqli_query($conn, $sql);

	header("Location: ../front.php?registered_user");
	}