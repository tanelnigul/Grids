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

	if (empty($contact)) {
		header('Location: ../grids/projects');
	} else {
	$sql = "INSERT INTO contacts (name, company, owner) VALUES ('$contact', '$company', '$uid')";
	$result = mysqli_query($conn, $sql);
}

	}
}

function setPeople($conn) {
	if (isset($_POST['contactSubmit'])) {
	$uid = $_SESSION['id'];
	$contact = $_POST['name'];
	$company = $_POST['company'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$closeddeals = $_POST['closeddeals'];
	$opendeals = $_POST['opendeals'];

	$sql = "INSERT INTO contacts (name, company, email, phone, closeddeals, opendeals, owner) VALUES ('$contact', '$company', '$email', '$phone', '$closeddeals', '$opendeals', '$uid')";
	$result = mysqli_query($conn, $sql);
	}
}

function getTasks($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM tasks WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class='form-check'>";
		echo "<div class='checkbox'>";
		echo "<label class='custom-control custom-checkbox'>";
		echo "<input type='checkbox' class='custom-control-input'>";
		echo "<span class='custom-control-indicator'></span>";
		echo "<span class='custom-control-description'>";
		echo nl2br($row['task']);
		echo "</span>";
		echo "</label>";
		echo "</div>";
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

function checkTeams($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM teams WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if (!$row) {
		return false;
	} else {
		return true;
	}
}

function checkPeople($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM contacts WHERE owner='$uid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if (!$row) {
		return false;
	} else {
		return true;
	}
}

function getContacts($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM projects WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);
	$contact = $row['contact'];
	$company = $row['company'];
	$owner = $row['uid'];

	$sql = "INSERT INTO contacts (name, company, owner) VALUES ('$contact', '$company', '$owner')";
	$result = mysqli_query($conn, $sql);
}

function getPeople($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM contacts WHERE owner='$uid'";

	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {

		echo "<tr>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['name']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['company']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['email']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['phone']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['closeddeals']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['opendeals']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['owner']);
		echo "</p>";
		echo "</td>";
		echo "</tr>";

		echo "<form class='delete-contact' method='POST' action='".deleteContacts($conn)."'>
						<input type='hidden' name='name' value='".$row['name']."'>
						<button class='btn btn-link delete' type='submit' name='contactDelete' onclick='return checkDelete()'><i class='fa fa-trash' aria-hidden='true'></i></button>
					</form>
					<form class='edit-contact' method='POST' action='editcontact'>
						<input type='hidden' name='name' value='".$row['name']."'>
						<input type='hidden' name='company' value='".$row['company']."'>
						<input type='hidden' name='email' value='".$row['email']."'>
						<input type='hidden' name='phone' value='".$row['phone']."'>
						<input type='hidden' name='closeddeals' value='".$row['closeddeals']."'>
						<input type='hidden' name='opendeals' value='".$row['opendeals']."'>
						<input type='hidden' name='owner' value='".$row['owner']."'>
						<button class='btn btn-link edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
					</form>";
	}
}

function getOrganizations($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM contacts WHERE owner='$uid'";

	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {

		echo "<tr>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['company']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['name']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['email']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['phone']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['closeddeals']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['opendeals']);
		echo "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p class='contacts'>";
		echo ($row['owner']);
		echo "</p>";
		echo "</td>";
		echo "</tr>";

		echo "<form class='delete-contact' method='POST' action='".deleteContacts($conn)."'>
						<input type='hidden' name='name' value='".$row['name']."'>
						<button class='btn btn-link delete' type='submit' name='contactDelete' onclick='return checkDelete()'><i class='fa fa-trash' aria-hidden='true'></i></button>
					</form>
					<form class='edit-contact' method='POST' action='editcontact'>
						<input type='hidden' name='name' value='".$row['name']."'>
						<input type='hidden' name='company' value='".$row['company']."'>
						<input type='hidden' name='email' value='".$row['email']."'>
						<input type='hidden' name='phone' value='".$row['phone']."'>
						<input type='hidden' name='closeddeals' value='".$row['closeddeals']."'>
						<input type='hidden' name='opendeals' value='".$row['opendeals']."'>
						<input type='hidden' name='owner' value='".$row['owner']."'>
						<button class='btn btn-link edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
					</form>";
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
	$sql = "SELECT * FROM user WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);
	$sql = "SELECT * FROM projects WHERE stage='1' AND uid='$uid' OR stage='1' AND public='0' AND team='teamId'";
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

function deleteContacts($conn) {
	if (isset($_POST['taskContacts'])) {

		$name = $_POST['name'];

		$sql = "DELETE FROM contacts WHERE name='$name'";
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

function setTeams($conn) {
	if (isset($_POST['teamSubmit'])) {
	$uid = $_SESSION['id'];
	$date = $_POST['date'];
	$team = $_POST['team'];
	$description = $_POST['description'];
	$members = $_POST['members'];
	$primary = $_POST['isdefault'];

	if (empty($team)) {
		header('Location: ../grids/create-team.php?error=empty');
	exit();
	}

	$sql = "INSERT INTO teams (uid, date, team, description, members, isdefault) VALUES ('$uid', '$date', '$team', '$description', '$members', '$primary')";
	$result = mysqli_query($conn, $sql);
	}
}

function getTeams($conn) {
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM teams WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class='team'>";
		echo "<h4 class='team'>";
		echo nl2br($row['team'])."</button><br>";
		echo "</h3>";
		echo "<p class='team-desc'>";
		echo nl2br($row['description'])."<br>";
		echo "</p>";

		if ($row['isdefault'] = '1') {
			$primary ='Primary';
		} else if ($row['isdefault'] = '0') {
			$primary = 'Not primary';
		}

		echo "<p class='primary'>";
		echo $primary."<br>";
		echo "</p>";
		echo "<p class='team-members'>";
		echo $row['members'];
		echo "</p>";
		echo "</div>";
	}
}

function getName($conn) {
	$id = $_SESSION['id'];
	$sql = "SELECT first, last FROM user WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	echo $row['first']." ".$row['last'];
}

?>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
   	return confirm('Are you sure?');
}
</script>
