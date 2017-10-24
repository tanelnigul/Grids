<?php

include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM user WHERE uid='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hash_pwd = $row['pwd'];
$hash = password_verify($pwd, $hash_pwd);

if ($hash == 0) {
	header("Location: ../front.php?error=login");
	exit();
} else {

	$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$hash_pwd'";
	$result = mysqli_query($conn, $sql);

	if (!$row = mysqli_fetch_assoc($result)) {
		echo "<p class='register'>Username or password incorrect.</p>";
		header("Location: ../front");
	} else {
		$_SESSION['id'] = $row['id'];
		$_SESSION["login"] = "OK";
		header("Location: ../index");
		}
}

?>
