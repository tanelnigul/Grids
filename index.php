<?php
  include 'header.php';
  include 'includes/tasks.inc.php';
?>

<head>
  <title>Grids - Inbox</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light first">
  <a class="navbar-brand" href="#"><img class="logo2" src="img/logo.svg"></img></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link active" href="index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="projects">Projects</a>
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

<div class="container">

  <div class="row">
    <div class="col">

      <h2 class="title">Projects</h2>
      <p>You haven't been included in any projects :-(</p>

    </div>
    <div class="col">

      <h2 class="title">My tasks</h2>
      <h5 class="index">Today</h5>
        <?php
        if (checkTasks($conn) == false) {
          echo "<p>You have no tasks, yay!</p>";
              } else {
              echo  getTasks($conn);
        }
        ?>
                <a id="myBtn" class="nav-link add-task"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add task</a>
    </div>

  </div>

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

        <h1 class="title">Add task</h1>
        <span class="close">&times;</span>

      </div>
      <div class="row">
        <div class="col">
      <?php
      if (isset($_POST['taskSubmit'])) {
        header("Location: index");
      }

      echo "<form method='POST' action='".setTasks($conn)."'>
          <input type='hidden' name='uid' value='uid'>
          <input type='hidden' name='date' value='date'>
          <p class='project create'>Task</p>
          <textarea rows='1' name='task' class='task'></textarea><br>

          <button name='taskSubmit' type='submit' class='btn btn-primary contact'>Add task</button>

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

</div>

<p class="footer">© 2017 PauseDigital Ltd. All rights reserved.</p>

</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Muli|Raleway');
</style>
