<?php
require("config/session.php");
require("config/database.php");
require("config/helper.php");


$name = validate_input(isset($_POST['name']) ? $_POST['name'] : '');
$email = validate_input(isset($_POST['email']) ? $_POST['email'] : '');
$password = validate_input(isset($_POST['password']) ? $_POST['password'] : '');
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && is_array($_POST) && !empty($name) && !empty($email) && !empty($password)) {


    $password = md5($password);
    // Prepare the SQL statement
    $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password')";

    // Execute the statement
    if ($conn->query($sql) === TRUE) {
        header("Location: home.php?action=users");
        exit();
    } else {
        header("Location: home.php?action=create_product&error=bG9n4554aW4gYmxvY2tlZA==");
        exit();
    }

    // Close the connection
    $conn->close();
} else {
    header("Location: home.php?action=create_product&error=bG9n4554aW4gYmxvY2tlZA==");
    die;
}


