<?php
  date_default_timezone_set('Europe/Tallinn');
  include 'header.php';
  include 'includes/tasks.inc.php';
?>

<head>
  <title>Grids - Projects</title>
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
        <a class="nav-link active" href="projects">Projects <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="team">Team</a>
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
    </ul>
  </div>
    <li class="nav-item dropdown right">
      <a class="nav-link dropdown-toggle" href="settings" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php getName($conn); ?>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="user-panel">User Panel</a>
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
        <a class="nav-link" href="#">Public</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Personal</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">

  <div class="table-wrapper">

    <div class="btn-group projectBtn" role="group" aria-label="Button group with nested dropdown">
      <button type="button" class="btn btn-secondary pointer"><i class="fa fa-random" aria-hidden="true"></i></button>
      <button type="button" class="btn btn-secondary pointer"><i class="fa fa-code-fork" aria-hidden="true"></i></button>

      <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gridflow
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <a class="dropdown-item" href="#">Graph view</a>
          <a class="dropdown-item" href="#">List view</a>
        </div>
      </div>
    </div>

    <!-- Trigger/Open The Modal -->
  <button id="myBtn" class="btn btn-primary projectBtn pointer">Add Project</button>

  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <?php
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        if (strpos($url, 'error=empty') !==false) {
            echo "<script>var modal = document.getElementById('myModal');</script>";
            echo "<script>modal.style.display = 'block';</script>";
            echo "<div class='alert alert-danger' role='alert'><strong>Oops!</strong> Title cannot be empty.</div>";
        }
        ?>

        <h1 class="title">Create a New Project</h1>
        <span class="close">&times;</span>

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
          <div class='input-group'>
          <textarea rows='1' name='value' class='value'></textarea>
          <span class='input-group-addon value' id='basic-addon1'>€</span>
          </div>
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

  </div>

    <script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

  <div class="projects">
    <div class="row">
      <div class="col proj header">
        <h3 class="project-header"><i class="fa fa-user" aria-hidden="true"></i> Leads</h3>
      </div>
      <div class="col proj header">
        <h3 class="project-header"><i class="fa fa-calendar" aria-hidden="true"></i> Meeting arranged</h3>
      </div>
      <div class="col proj header">
        <h3 class="project-header"><i class="fa fa-list" aria-hidden="true"></i> Needs defined</h3>
      </div>
      <div class="col proj header">
        <h3 class="project-header"><i class="fa fa-file-text" aria-hidden="true"></i> Proposal made</h3>
      </div>
      <div class="col proj header">
        <h3 class="project-header"><i class="fa fa-check" aria-hidden="true"></i> Ongoing</h3>
      </div>
    </div>

    <div class="row">
      <div class="col proj">
        <?php
        getProjects1($conn);
        ?>
      </div>
      <div class="col proj">
        <?php
        getProjects2($conn);
        ?>
      </div>
      <div class="col proj">
        <?php
        getProjects3($conn);
        ?>
      </div>
      <div class="col proj">
        <?php
        getProjects4($conn);
        ?>
      </div>
      <div class="col proj">
        <?php
        getProjects5($conn);
        ?>
      </div>
    </div>
  </div>

  </div>

</div>

<p class="footer">© 2017 PauseDigital Ltd. All rights reserved.</p>

</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Muli|Raleway');
</style>
