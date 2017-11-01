<?php
  date_default_timezone_set('Europe/Tallinn');
  include 'header.php';
  include 'includes/tasks.inc.php';
?>

<head>
  <title>Grids - Contacts</title>
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
        <a class="nav-link" href="team">Team</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Contacts <span class="sr-only">(current)</span>
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
        <a class="nav-link active-second" href="#">People</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="organizations">Organizations</a>
      </li>
    </ul>
  </div>
</nav>

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

      <h1 class="title">Add contact</h1>
      <span class="close">&times;</span>

    </div>
    <div class="row">
      <div class="col">
    <?php
    if (isset($_POST['contactSubmit'])) {
      header("Location: people");
    }

    echo "<form method='POST' action='".setPeople($conn)."'>
        <input type='hidden' name='uid' value='uid'>
        <p class='project create'>Contact person name</p>
        <textarea rows='1' name='name' class='title'></textarea><br>
        <p class='project create'>Client company</p>
        <textarea name='company' class='title'></textarea><br>
        <p class='project create'>Contact e-mail</p>
        <textarea rows='1' name='email' class='contact'></textarea><br>
        <p class='project create'>Contact phone</p>
        <textarea rows='1' name='phone' class='company'></textarea><br>
        <div class='row'><div class='col'><p class='project create'>Closed deals</p>
        <textarea rows='1' name='closeddeals' class='value'></textarea></div>
        <div class='col'><p class='project create'>Open deals</p>
        <textarea rows='1' name='opendeals' class='value'></textarea></div></div>


        <button name='contactSubmit' type='submit' class='btn btn-primary contact'>Add contact</button>

          </div>
    </form>";
    ?>
      </div>

    </div>
  </div>

</div>


<div class="container">

  <div class="row">
    <div class="col">
      <h2 class="title no-margin">My contacts</h2>
      <h4 class="sub-title">People</h4>
    </div>
    <div class="col">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button class="btn btn-secondary pointer search" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
        </span>
        <button id="myBtn" type="button" class="btn btn-primary add-people pointer">Add contact</button>
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

      <?php
      if (checkPeople($conn) == false) {
        echo "<p>Your contact list is empty.</p>";
            } else {
              echo "<table class='table table-hover'>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>CD</th>
                    <th>OD</th>
                    <th>Owner</th>
                  </tr>
                </thead>
                <tbody>";
            echo  getPeople($conn);
      }
      ?>

  	</tbody>
  </table>

</div>

<p class="footer">© 2017 PauseDigital Ltd. All rights reserved.</p>

</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Muli|Raleway');
</style>
