<?php
  ob_start();
  include 'includes/dbh.php';

  if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: front.php?error=not_logged_in");
    exit;
}
?>

<!DOCTYPE html>
<html>
  <meta http-equiv="Cache-control" content="no-cache">
  <meta charset="UTF-8">
  <meta name="description" content="PauseApp">
  <meta name="keywords" content="Team Productivity App">
  <meta name="author" content="PauseDigital">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="icon" href="img/favicon.png" type="image/png"/>
  <link rel="shortcut icon" href="img/favicon.png" type="image/png"/>
  <script src="https://use.fontawesome.com/cd3d33bd0e.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
  <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
  <script src="js/custom.js"></script>
  <!--<body style="background-image:url(img/bg4.jpg); background-attachment: fixed">-->
  <body style="background-color: #f1f5fa">
    <div id="root"></div>
