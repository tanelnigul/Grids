<?php
  date_default_timezone_set('Europe/Tallinn');
  include 'header.php';
  include 'includes/tasks.inc.php';
?>

<head>
  <title>Grids - New Task</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light first">
  <a class="navbar-brand" href="#"><img class="logo2" src="img/logo2.png"></img></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="projects">Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Team</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span class="sr-only">(current)</span>New
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="new-project">Project</a>
          <a class="dropdown-item" href="new-task">Task</a>
          <a class="dropdown-item" href="#">Reminder</a>
        </div>
      </li>
    </ul>
  </div>
  <ul class="nav navbar-nav navbar-right">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="settings" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      My Account
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Settings</a>
        <?php

      if (isset($_SESSION['id'])) {
      echo "<a class='dropdown-item' href='#'><form action='includes/logout.inc.php'/><button class='btn btn-link logout'>Log out</button></form></a>";
      }

      ?>
      </div>
    </li>
  </ul>
</nav>

<div class="container">

  <div class="row">
    <div class="col">

      <h1>Create a New Task</h1>

      <?php
      echo "<form method='POST' action='".setTasks($conn)."'>
          <input type='hidden' name='uid' value='uid'>
          <input type='hidden' name='date' value='".date('d/m/Y')."'>
          <textarea name='task' class='task' placeholder='Task description'></textarea><br>

          <button name='taskSubmit' type='submit' class='task'>Add task</button></form>";

      if (isset($_POST['taskSubmit'])) {
          header("Location: index");
        }
      ?>

    </div>
  </div>

</div>

<p class="footer">© 2017 PauseDigital Ltd. All rights reserved.</p>

</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Ubuntu');
</style>
