<?php
  date_default_timezone_set('Europe/Tallinn');
  include 'header.php';
  include 'includes/tasks.inc.php';
?>

<head>
  <title>Grids - Edit Contact</title>
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
  <ul class="nav navbar-nav navbar-right">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="settings" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      My Account
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
  </ul>
</nav>

<nav class="navbar navbar-expand-lg navbar-light second">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link active-second" href="#">All projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My team</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">

<div class="row">

<div class="col-sm-12">

<h2 class="title">Edit contact</h2>

<?php
  $uid = $_SESSION['id'];
  $name = $_POST['name'];
  $company = $_POST['company'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $closeddeals = $_POST['closeddeals'];
  $opendeals = $_POST['opendeals'];
  $owner = $_POST['owner'];

echo "
    <form id='edit-form' method='POST' action='".editContact($conn)."'>
    <input type='hidden' name='uid' value='".$uid."'>
    <div class='row'><div class='col-sm-6'><textarea name='name' class='title'>".$name."</textarea><br></div>
    <div class='col-sm-6'><textarea name='company' class='contact'>".$company."</textarea><br></div></div>
    <div class='row'><div class='col-sm-12'><textarea name='email' class='description'>".$email."</textarea><br></div></div>
    <textarea name='phone' class='company'>".$phone."</textarea>
    <textarea name='closeddeals' class='value'>".$closeddeals."</textarea>
    <textarea name='opendeals' class='stage'>".$opendeals."</textarea>
    <textarea name='owner' class='public'>".$owner."</textarea>
    <button type='submit' name='contactSubmit' class='project'>Save</button>
    </form>
    </div>";

function editContact($conn) {
  if (isset($_POST['contactSubmit'])) {
    $uid = $_SESSION['id'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $closeddeals = $_POST['closeddeals'];
    $opendeals = $_POST['opendeals'];
    $owner = $_POST['owner'];

  $sql = "UPDATE contacts
            SET name = '$name', company = '$company', email = '$email', phone = '$phone', closeddeals = '$closeddeals', opendeals = '$opendeals', owner = '$owner'
          WHERE name='$name'";
  $result = mysqli_query($conn, $sql);
  header("Location: people.php");
  }
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
