<?php
require("config/session.php");
require("config/database.php");
require("config/helper.php");


$name = validate_input(isset($_POST['name']) ? $_POST['name'] : '');
$description = validate_input(isset($_POST['description']) ? $_POST['description'] : '');
$price = validate_input(isset($_POST['price']) ? $_POST['price'] : '');
$qty = validate_input(isset($_POST['qty']) ? $_POST['qty'] : '');
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && is_array($_POST) && !empty($name) && !empty($description) && !empty($price) && !empty($qty)) {


    // Prepare the SQL statement
    $sql = "INSERT INTO `products` (`id`, `name`, `description`, `price`, `qty`, `created_at`) VALUES (NULL, '$name', '$description', '$price', '$qty', NOW())";

    // Execute the statement
    if ($conn->query($sql) === TRUE) {
        header("Location: home.php?action=products");
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


