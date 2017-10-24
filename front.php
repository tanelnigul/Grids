<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<body style="background-image:url(img/bg.jpg)">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Grids">
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
  <title>Grids - Welcome!</title>
</head>

<a href="front.php"><img class="logo" src="img/logo.png"></img></a>

<div class="container">

<?php

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, 'error=login') !==false) {
    echo "<div class='alert alert-danger' role='alert'>Incorrect username or password!</div>";
}

if (strpos($url, 'registered_user') !==false) {
    echo "<div class='alert alert-success' role='alert'>Successfully registered! Please log in.</div>";
}

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, 'error=not_logged_in') !==false) {
    echo "<div class='alert alert-danger' role='alert'>You have to be logged in first!</div>";
}

?>

<form action="includes/login.inc.php" method="post" />
  <input type="text" name="uid" placeholder="Username"/><br>
  <input type="password" name="pwd" placeholder="Password"/><br>
  <button class="submit" type="Submit">Log In</button>
</form>

<p class="register">or <a href="sign-up">create an account</a></p>

</div>

<p class="copyright">© 2017 PauseDigital Ltd. All rights reserved.</p>

</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Ubuntu');
</style>

<script type="text/javascript">
if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0) {
$(window).load(function(){
    $('input:-webkit-autofill').each(function(){
        var text = $(this).val();
        var name = $(this).attr('name');
        $(this).after(this.outerHTML).remove();
        $('input[name=' + name + ']').val(text);
    });
});}
</script>
