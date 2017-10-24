<?php
  date_default_timezone_set('Europe/Tallinn');
  include 'header.php';
  include 'includes/tasks.inc.php';
?>

<head>
  <title>Grids - Edit Project</title>
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
        <a class="nav-link active" href="projects">Projects <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Team</a>
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

<h1>Edit Project</h1>

<?php
  $pid = $_POST['pid'];
  $uid = $_SESSION['id'];
  $date = $_POST['date'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $contact = $_POST['contact'];
  $company = $_POST['company'];
  $value = $_POST['value'];
  $stage = $_POST['stage'];
  $public = $_POST['public'];

echo "</p>
    <form id='edit-form' method='POST' action='".editProject($conn)."'>
    <input type='hidden' name='pid' value='".$pid."'>
    <input type='hidden' name='uid' value='".$uid."'>
    <input type='hidden' name='date' value='".$date."'>
    <div class='row'><div class='col-sm-6'><textarea name='title' class='title'>".$title."</textarea><br></div>
    <div class='col-sm-6'><textarea name='contact' class='contact'>".$contact."</textarea><br></div></div>
    <div class='row'><div class='col-sm-12'><textarea name='description' class='description'>".$description."</textarea><br></div></div>
    <textarea name='company' class='company'>".$company."</textarea>
    <textarea name='value' class='value'>".$value."</textarea>
    <textarea name='stage' class='stage'>".$stage."</textarea>
    <textarea name='public' class='public'>".$public."</textarea>
    <button type='submit' name='projSubmit' class='project'>Save</button>
    </form>
    </div>";

function editProject($conn) {
  if (isset($_POST['projSubmit'])) {
  $uid = $_SESSION['id'];
  $pid = $_POST['pid'];
  $date = $_POST['date'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $contact = $_POST['contact'];
  $company = $_POST['company'];
  $value = $_POST['value'];
  $stage = $_POST['stage'];
  $public = $_POST['public'];

  $sql = "UPDATE projects
            SET title = '$title', description = '$description', contact = '$contact', company = '$company', value = '$value', stage = '$stage', public = '$public'
          WHERE pid='$pid'";
  $result = mysqli_query($conn, $sql);
  header("Location: projects.php");
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
