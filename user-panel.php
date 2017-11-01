<?php
	include 'header.php';
  include 'includes/tasks.inc.php';
  include 'upload.php';
?>

<head>
  <title>Grids - User Panel</title>
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
        <a class="nav-link" href="projects">Projects <span class="sr-only">(current)</span></a>
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
      <a class="nav-link active-second dropdown-toggle" href="settings" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<h2 class="title">My Account</h2>
	</div>
</div>

<div class="row">
	<div class="col">
<?php
  if (isset($_SESSION['id'])) {

    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

      $id = $_SESSION['id'];
      $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
      $resultImg = mysqli_query($conn, $sqlImg);
      $rowImg = mysqli_fetch_assoc($resultImg);

          if ($rowImg['status'] == 0) {
            echo "<div class='profile-pic' style='background-image: url(uploads/profile".$id.".jpg);'></div>";
          } else {
            echo "<div class='profile-pic' style='background-image: url(../grids/img/profile-pic.jpg);'></div>";
          }
  }

?>

      <div id="change-profile-pic"><a class="change-pic" href="editprofile.php">Change Picture</a></div>

    		<div id="user-info">

          <?php
            if (isset($_SESSION['id'])) {
              echo "<h4 class='welcome'>Welcome, ";
              getName($conn);
              echo "</h4>";
            } else {
              echo "You are not logged in.";
            }
          ?>

          <p>Account type: Platinum</p>

				</div>

	</div>
	<div class="col">
    <ul class="profile">
      <li class="profile"><a class="profile" href="editprofile.php">Edit Profile</a></li>
      <li class="profile"><a class="profile" href="#">Statements</a></li>
      <li class="profile"><a class="profile" href="#">Settings</a></li>
      <li class="profile"><a class="profile" href="#">Upgrade Account</a></li>
      <li class="profile"><a class="profile" href="#">Help & Support</a></li>
    </ul>
	</div>
</div>
</div>

<p class="footer">© 2017 PauseDigital Ltd. All rights reserved.</p>

</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Ubuntu');
</style>
