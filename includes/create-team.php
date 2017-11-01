<?php
  date_default_timezone_set('Europe/Tallinn');
  include 'header.php';
  include 'includes/tasks.inc.php';
?>

<head>
  <title>Grids - Create Team</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light first">
  <a class="navbar-brand" href="#"><img class="logo2" src="img/logo.svg"></img></a>
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
        <a class="nav-link active" href="team">Team <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Contacts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="people"><i class="fa fa-user" aria-hidden="true"></i> People</a>
          <a class="dropdown-item" href="organizations"><i class="fa fa-building" aria-hidden="true"></i> Organizations</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          New
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="new-project">Project</a>
          <a class="dropdown-item" href="new-task">Task</a>
          <a class="dropdown-item" href="#">Reminder</a>
        </div>
      </li>
    </ul>
  </div>
    <li class="nav-item dropdown right">
      <a class="nav-link dropdown-toggle" href="settings" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php getName($conn); ?>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">User Panel</a>
        <a class="dropdown-item" href="#">Settings</a>
        <?php
      if (isset($_SESSION['id'])) {
      echo "<a class='dropdown-item' href='#'><form action='includes/logout.inc.php'/><button class='btn btn-link logout'>Log out</button></form></a>";
      }
      ?>
      </div>
    </li>
</nav>

<nav class="navbar navbar-expand-lg navbar-light second">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="team">My teams</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active-second" href="create-team">Create team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="join-team">Join team</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">

  <div class="row">
    <div class="col">
      <h2 class="title">Create a Team</h2>
    </div>
  </div>

  <div class="row">
    <div class="col">

      <?php
      if (isset($_POST['teamSubmit'])) {
        header("Location: team");
      }

    echo "<form method='POST' action='".setTeams($conn)."'>
          <input type='hidden' name='teamId' value='teamId'>
          <input type='hidden' name='date' value='".date('d/m/Y')."'>
          <p class='project create'>Team name</p>
          <textarea rows='1' name='team' class='title'></textarea><br>
          <p class='project create'>Team description</p>
          <textarea name='description' class='description' placeholder='e.g. Marketing, Engineering or Finance'></textarea><br>
          <p class='project create'>Members</p>
          <textarea rows='1' name='members' class='contact'></textarea><br>
          <br>
          <button name='teamSubmit' type='submit' class='btn btn-primary project'>Create team</button>
        </div>
      </form>";
      ?>

    </div>
</div>


<p class="footer">© 2017 PauseDigital Ltd. All rights reserved.</p>

</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Muli|Raleway');
</style>
