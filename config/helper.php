<?php
function validate_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function display_error($class_name, $message)
{
	echo "<div class='alert $class_name'>$message</div>";
}
function fetch_single($table, $field, $key, $value)
{
	$sql = "SELECT $field FROM $table WHERE $key = '$value' LIMIT 1";
	$result = $GLOBALS['conn']->query($sql);
	if ($result->num_rows > 0) {
		$data = $result->fetch_assoc();
		return $data;
	} else {
		return FALSE;
	}
}



function fetch_custom($sql)
{
	$result = $GLOBALS['conn']->query($sql);
	if ($result->num_rows > 0) {
		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $data;
	} else {
		return FALSE;
	}
}


function get_user_id($email)
{
	$data = fetch_single('users', 'id', 'email', $email);
	if ($data) {
		return $data;
	} else {
		return FALSE;
	}
}



function validate_user($email, $password)
{
	//encript password to md5
	$password = md5($password);
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
	$data = fetch_custom($sql);
	if ($data) {
		//fill the result to session variable
		$_SESSION['MEMBER_ID'] = $data[0]['id'];
		$_SESSION['name'] = $data[0]['name'];


		return TRUE;
	} else {
		return FALSE;
	}
}


function logout_user()
{
	unset($_SESSION['MEMBER_ID']);
	unset($_SESSION['FIRST_NAME']);
	unset($_SESSION['LAST_NAME']);
}


function active_link($page_name)
{
	if (@$_GET['action'] == $page_name) {
		echo 'active';
	}
	if (!@$_GET['action'] && $page_name == 'products') {
		echo 'active';
	}
}
