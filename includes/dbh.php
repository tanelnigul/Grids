<?php

session_start();

$conn =  mysqli_connect("localhost", "root", "", "pauseapp");

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

// echo "Connection successful!";

?>
