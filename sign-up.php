<?php
  include 'includes/dbh.php';
?>

<!DOCTYPE html>
<html>
<body style="background-image:url(img/bg.jpg)">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="PauseApp">
  <meta name="keywords" content="Team Productivity App">
  <meta name="author" content="PauseDigital">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom-front.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="icon" href="img/favicon.png" type="image/png"/>
  <link rel="shortcut icon" href="img/favicon.png" type="image/png"/>
  <script src="https://use.fontawesome.com/cd3d33bd0e.js"></script>
  <title>Grids - Create an Account</title>
</head>

<a href="front"><img class="logo" src="img/logo.png"></img></a>

<div class="container">

<div class="row">

<?php

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, 'error=empty') !==false) {
    echo "<div class='alert alert-danger' role='alert'>Please fill out all fields.</div>";
}

else if (strpos($url, 'error=username') !==false) {
    echo "<div class='alert alert-danger' role='alert'><strong>Sorry!</strong> This username already exists.</div>";
}

else if (strpos($url, 'error=password') !==false) {
    echo "<div class='alert alert-danger' role='alert'>Passwords don't match.</div>";
}

	if (isset($_SESSION['id'])) {
		echo "<h3>You are already logged in!</h3>
          <br><a href='index'><button class='continue'>Continue</button></a>";
	} else {
		echo "<h2>Create an Account</h2>

    <div class='col-sm-12'>

  <form action='includes/signup.inc.php' method='post' />
  <input type='text' name='first' placeholder='First Name'/><br>
  <input type='text' name='last' placeholder='Last Name'/><br>
  <input type='text' name='uid' placeholder='Choose username*'/><br>
  <input type='password' name='pwd' placeholder='Password*'/><br>
  <input type='password' name='cnfrm_pwd' placeholder='Confirm password*'/><br>
  <button class='submit' type='Submit'>Sign Up</button>
  </form>

  <p class='register'>or<a href='front'> go back</a></p>

</div>";
	}

?>

</div>


</div>
</div>

<p class="copyright">© 2017 PauseDigital Ltd. All rights reserved.</p>

</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Ubuntu');
</style>
