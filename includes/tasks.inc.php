<?php

function setTasks($conn) {
	if (isset($_POST['taskSubmit'])) {
	$uid = $_SESSION['id'];
	$date = $_POST['date'];
	$task = $_POST['task'];

	$sql = "INSERT INTO tasks (uid, date, task) VALUES ('$uid', '$date', '$task')";
	$result = mysqli_query($conn, $sql);
	}
}

function setProjects($conn) {
	if (isset($_POST['projSubmit'])) {
	$uid = $_SESSION['id'];
	$date = $_POST['date'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$contact = $_POST['contact'];
	$company = $_POST['company'];
	$value = $_POST['value'];
	$stage = $_POST['stage'];
	$public = $_POST['public'];

	if (empty($title)) {
		header('Location: ../grids/projects.php?error=empty');
	exit();
	}

	$sql = "INSERT INTO projects (uid, date, title, description, contact, company, value, stage, public) VALUES ('$uid', '$date', '$title', '$description', '$contact', '$company', '$value', '$stage', '$public')";
	$result = mysqli_query($conn, $sql);
	}
}

function getTasks($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM tasks WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {

		echo "<div class='checkbox'>";
		echo "<label class='custom-control custom-checkbox'>";
		echo "<input type='checkbox' class='custom-control-input'>";
		echo "<span class='custom-control-indicator'></span>";
		echo "<span class='custom-control-description'>";
		echo nl2br($row['task']);
		echo "</span>";
		echo "</label>";
		echo "</div>";
	}
}

function checkTasks($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM tasks WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if (!$row) {
		return false;
	} else {
		return true;
	}
}

function checkProjects($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM projects WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if (!$row) {
		return false;
	} else {
		return true;
	}
}

function getProjects1($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM projects WHERE stage='1' AND uid='$uid' OR stage='1' AND public='0'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
	echo "<div class='project'>";
		echo "<h3 class='project'>";
		echo nl2br($row['title'])."<br>";
		echo "</h3>";
		echo "<p class='description'>";
		echo nl2br($row['description'])."<br>";
		echo "</p>";
		echo "<p class='company'>";
		echo $row['company']."<br>";
		echo "</p>";
		echo "<p class='value'>";
		echo $row['value']." €";
		echo "</p>


		<form class='delete-form' method='POST' action='".deleteProjects($conn)."'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<button class='btn btn-link delete' type='submit' name='projDelete' onclick='return checkDelete()'><i class='fa fa-trash' aria-hidden='true'></i></button>
		</form>
		<form class='edit-form' method='POST' action='editproject'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<input type='hidden' name='uid' value='".$row['uid']."'>
			<input type='hidden' name='date' value='".$row['date']."'>
			<input type='hidden' name='title' value='".$row['title']."'>
			<input type='hidden' name='description' value='".$row['description']."'>
			<input type='hidden' name='contact' value='".$row['contact']."'>
			<input type='hidden' name='company' value='".$row['company']."'>
			<input type='hidden' name='value' value='".$row['value']."'>
			<input type='hidden' name='stage' value='".$row['stage']."'>
			<input type='hidden' name='public' value='".$row['public']."'>
			<button class='btn btn-link edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
		</form>
		</div>";
	}
}

function getProjects2($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM projects WHERE stage='2' AND uid='$uid' OR stage='2' AND public='0'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
	echo "<div class='project'>";
		echo "<h3 class='project'>";
		echo nl2br($row['title'])."<br>";
		echo "</h3>";
		echo "<p class='description'>";
		echo nl2br($row['description'])."<br>";
		echo "</p>";
		echo "<p class='company'>";
		echo $row['company']."<br>";
		echo "</p>";
		echo "<p class='value'>";
		echo $row['value']." €";
		echo "</p>


		<form class='delete-form' method='POST' action='".deleteProjects($conn)."'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<button class='btn btn-link delete' type='submit' name='projDelete' onclick='return checkDelete()'><i class='fa fa-trash' aria-hidden='true'></i></button>
		</form>
		<form class='edit-form' method='POST' action='editproject.php'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<input type='hidden' name='uid' value='".$row['uid']."'>
			<input type='hidden' name='date' value='".$row['date']."'>
			<input type='hidden' name='title' value='".$row['title']."'>
			<input type='hidden' name='description' value='".$row['description']."'>
			<input type='hidden' name='contact' value='".$row['contact']."'>
			<input type='hidden' name='company' value='".$row['company']."'>
			<input type='hidden' name='value' value='".$row['value']."'>
			<input type='hidden' name='stage' value='".$row['stage']."'>
			<input type='hidden' name='public' value='".$row['public']."'>
			<button name='projEdit' class='btn btn-link edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
		</form>
		</div>";
	}
}

function getProjects3($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM projects WHERE stage='3' AND uid='$uid' OR stage='3' AND public='0'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
	echo "<div class='project'>";
		echo "<h3 class='project'>";
		echo nl2br($row['title'])."<br>";
		echo "</h3>";
		echo "<p class='description'>";
		echo nl2br($row['description'])."<br>";
		echo "</p>";
		echo "<p class='company'>";
		echo $row['company']."<br>";
		echo "</p>";
		echo "<p class='value'>";
		echo $row['value']." €";
		echo "</p>


		<form class='delete-form' method='POST' action='".deleteProjects($conn)."'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<button class='btn btn-link delete' type='submit' name='projDelete' onclick='return checkDelete()'><i class='fa fa-trash' aria-hidden='true'></i></button>
		</form>
		<form class='edit-form' method='POST' action='editproject.php'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<input type='hidden' name='uid' value='".$row['uid']."'>
			<input type='hidden' name='date' value='".$row['date']."'>
			<input type='hidden' name='title' value='".$row['title']."'>
			<input type='hidden' name='description' value='".$row['description']."'>
			<input type='hidden' name='contact' value='".$row['contact']."'>
			<input type='hidden' name='company' value='".$row['company']."'>
			<input type='hidden' name='value' value='".$row['value']."'>
			<input type='hidden' name='stage' value='".$row['stage']."'>
			<input type='hidden' name='public' value='".$row['public']."'>
			<button name='projEdit' class='btn btn-link edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
		</form>
		</div>";
	}
}

function getProjects4($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM projects WHERE stage='4' AND uid='$uid' OR stage='4' AND public='0'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
	echo "<div class='project'>";
		echo "<h3 class='project'>";
		echo nl2br($row['title'])."<br>";
		echo "</h3>";
		echo "<p class='description'>";
		echo nl2br($row['description'])."<br>";
		echo "</p>";
		echo "<p class='company'>";
		echo $row['company']."<br>";
		echo "</p>";
		echo "<p class='value'>";
		echo $row['value']." €";
		echo "</p>


		<form class='delete-form' method='POST' action='".deleteProjects($conn)."'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<button class='btn btn-link delete' type='submit' name='projDelete' onclick='return checkDelete()'><i class='fa fa-trash' aria-hidden='true'></i></button>
		</form>
		<form class='edit-form' method='POST' action='editproject.php'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<input type='hidden' name='uid' value='".$row['uid']."'>
			<input type='hidden' name='date' value='".$row['date']."'>
			<input type='hidden' name='title' value='".$row['title']."'>
			<input type='hidden' name='description' value='".$row['description']."'>
			<input type='hidden' name='contact' value='".$row['contact']."'>
			<input type='hidden' name='company' value='".$row['company']."'>
			<input type='hidden' name='value' value='".$row['value']."'>
			<input type='hidden' name='stage' value='".$row['stage']."'>
			<input type='hidden' name='public' value='".$row['public']."'>
			<button name='projEdit' class='btn btn-link edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
		</form>
		</div>";
	}
}

function getProjects5($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM projects WHERE stage='5' AND uid='$uid' OR stage='5' AND public='0'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class='project'>";
		echo "<h3 class='project'>";
		echo nl2br($row['title'])."</button><br>";
		echo "</h3>";
		echo "<p class='description'>";
		echo nl2br($row['description'])."<br>";
		echo "</p>";
		echo "<p class='company'>";
		echo $row['company']."<br>";
		echo "</p>";
		echo "<p class='value'>";
		echo $row['value']." €";
		echo "</p>


		<form class='delete-form' method='POST' action='".deleteProjects($conn)."'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<button class='btn btn-link delete' type='submit' name='projDelete' onclick='return checkDelete()'><i class='fa fa-trash' aria-hidden='true'></i></button>
			</form>
			<form class='edit-form' method='POST' action='editproject.php'>
			<input type='hidden' name='pid' value='".$row['pid']."'>
			<input type='hidden' name='uid' value='".$row['uid']."'>
			<input type='hidden' name='date' value='".$row['date']."'>
			<input type='hidden' name='title' value='".$row['title']."'>
			<input type='hidden' name='description' value='".$row['description']."'>
			<input type='hidden' name='contact' value='".$row['contact']."'>
			<input type='hidden' name='company' value='".$row['company']."'>
			<input type='hidden' name='value' value='".$row['value']."'>
			<input type='hidden' name='stage' value='".$row['stage']."'>
			<input type='hidden' name='public' value='".$row['public']."'>
			<button name='projEdit' class='btn btn-link edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
		</form>
		</div>";
	}
}

function deleteTasks($conn) {
	if (isset($_POST['taskDelete'])) {

		$tid = $_POST['tid'];

		$sql = "DELETE FROM tasks WHERE tid='$tid'";
		$result = mysqli_query($conn, $sql);
		header("Refresh:0");
}
}


function deleteProjects($conn) {
	if (isset($_POST['projDelete'])) {
		$pid = $_POST['pid'];

		$sql = "DELETE FROM projects WHERE pid='$pid'";
		$result = mysqli_query($conn, $sql);
		header("Refresh:0");
}
}

function getName($conn) {
	$id = $_SESSION['id'];
	$sql = "SELECT first FROM user WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	echo $row['first'];
}

?>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
   	return confirm('Are you sure?');
}
</script>
