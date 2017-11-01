<?php
  date_default_timezone_set('Europe/Tallinn');
  include 'header.php';
  include 'includes/tasks.inc.php';
?>

<head>
  <title>Grids - New Project</title>
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
        <a class="nav-link" href="#">Team</a>
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
        <a class="nav-link active dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          New <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="new-project">Project</a>
          <a class="dropdown-item" href="new-task">Task</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
    <li class="nav-item dropdown right">
      <a class="nav-link dropdown-toggle" href="settings" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php getName($conn); ?>
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
</nav>

<nav class="navbar navbar-expand-lg navbar-light second">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link active-second" href="#">All projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="team">Team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My team</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container new-project">

<div class="row">
  <div class="col">

    <h1 class="title new-project">Create a New Project</h1>

  </div>
</div>

<div class="row">
  <div class="col">
<?php
if (isset($_POST['projSubmit'])) {
  header("Location: projects");
}

echo "<form method='POST' action='".setProjects($conn)."'>
    <input type='hidden' name='uid' value='uid'>
    <input type='hidden' name='date' value='".date('d/m/Y')."'>
    <p class='project create'>Project title</p>
    <textarea rows='1' name='title' class='title'></textarea><br>
    <p class='project create'>Project description</p>
    <textarea name='description' class='description'></textarea><br>
    <p class='project create'>Contact person name</p>
    <textarea rows='1' name='contact' class='contact'></textarea><br>
    <p class='project create'>Client company</p>
    <textarea rows='1' name='company' class='company'></textarea><br>
    <p class='project create'>Deal value</p>
    <textarea rows='1' name='value' class='value'></textarea>
    <br>
      <p class='project create'>Project stage</p>
      <div class='btn-group stages' data-toggle='buttons'>
      <label class='btn btn-primary stages active'><input class='project-stage' data-title='Lead' type='radio' name='stage' value='1' checked></label>
      <label class='btn btn-primary stages'><input class='project-stage' type='radio' name='stage' value='2'></label>
      <label class='btn btn-primary stages'><input class='project-stage' type='radio' name='stage' value='3'></label>
      <label class='btn btn-primary stages'><input class='project-stage' type='radio' name='stage' value='4'></label>
      <label class='btn btn-primary stages'><input class='project-stage' type='radio' name='stage' value='5'></label>
      </span>
      </span>
      </div>
    <br><br>
      <div class='row'>
      <div class='col'>
      <div class='btn-group lock' data-toggle='buttons'>
      <label class='btn btn-primary lock'><input type='radio' name='public' value='0'> Public</label>
      <label class='btn btn-primary lock active'><input type='radio' name='public' value='1' checked> Private<br></label>
      </div>
      </div>
    <br><br>
      <div class='col'>
    <button name='projSubmit' type='submit' class='btn btn-primary project'>Create project</button>
      </div>
      </div>
</form>";
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
