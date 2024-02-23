<?php
require("config/session.php");
require("config/constant.php");
require("config/helper.php");

//redirect to template page if the user is logged in
if (logged_in()) {
    header("Location: products.php");
    die;
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
    <title>تسجيل الدخول | كلية تقنية المعلومات</title>
    <link rel="icon" type="image/x-icon" href="https://uot.edu.ly/resources/img/logo/it-logo_1583787298.png">

</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="process_login.php" method="POST" class="sign-in-form">
                    <img src="assets/images/primary-logo.svg" width="400" alt="">
                    <h2 class="title">تسجيل الدخول</h2>
                    <br>
                    <!-- start display error message -->
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
                    <!-- end display error message -->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="email" placeholder="البريد الإلكتروني" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="كلمة المرور" required />
                    </div>
                    <button type="submit" class="btn solid">تسجيل الدخول</button>

                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">

                <img src="assets/images/login.svg" height="500" class="image" alt="" />
            </div>

        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>

</html>