<?php
require("config/session.php");
require("config/helper.php");
require("config/database.php");
require("config/constant.php");
confirm_logged_in();
?>


<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css?v=2">
  <link rel="stylesheet" href="assets/css/custom.css?v=2">
  <title>نظام إدارة المنتجات | كلية تقنية المعلومات</title>
  <link rel="icon" type="image/x-icon" href="https://uot.edu.ly/resources/img/logo/it-logo_1583787298.png">

</head>

<body>
  <div class="app-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <div class="app-icon">
          <img src="assets/images/primary-logo.svg" width="170" alt="">
        </div>
      </div>

      <ul class="sidebar-list">

        <li class="sidebar-list-item <?php active_link('products'); ?>">
          <a href="home.php">
            <span>المنتجات</span>
          </a>
        </li>
        <li class="sidebar-list-item <?php active_link('users'); ?>">
          <a href="home.php?action=users">
            <span>المستخدمين</span>
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="process_logout.php">
            <span>تسيجل الخروج</span>
          </a>
        </li>

      </ul>
      <div class="account-info">

        <div class="account-info-name"><?php echo $_SESSION['name']; ?></div>

      </div>
    </div>
    <div class="app-content">

      <?php
      $error_code = $_GET['error'];
      if ($error_code == ERROR_CODE_LOGIN) {
        display_error('alert-danger', ERROR_MSG_LOGIN);
      } elseif ($error_code == ERROR_CODE_BLOCKED) {
        display_error('alert-danger', ERROR_MSG_BLOCKED);
      } elseif ($error_code == ERROR_INVALID_INPUT) {
        display_error('alert-danger', ERROR_MSG_INVALID_INPUT);
      }
      ?>
      <?php
      if ($_GET['f']) {
      ?>
        <div class="alert alert-success">مرحباً بعودتك مجدداً <?php echo $_SESSION['name']; ?></div>
      <?php
      }
      ?>

      <br>
      <?php
      $action = @$_GET['action'];
      switch ($action) {
        case "":
        case "products":
          include("views/products.php");
          break;
        case "create_product":
          include("views/create_product.php");
          break;
        case "users":
          include("views/users.php");
          break;
        case "create_user":
          include('views/create_user.php');
          break;
        default:
          echo "Invalid Action";
      }
      ?>
    </div>
  </div>

  <script src="assets/js/main.js?v=33"></script>
</body>

</html>