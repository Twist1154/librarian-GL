<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'inc/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Growth Learning</title>
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="inc/css/pro1.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
    <style>
        .login{
            background-image: url(inc/img/3.jpg);
            margin-bottom: 30px;
            padding: 50px 50px 70px;
        }
        .reg-header h2{
            color: #DDDDDD;
            z-index: 999999;
        }
        .login-body h4{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="login registration">
    <div class="wrapper">
        <div class="reg-header text-center">
            <h2>Growth Learning</h2>
            <div class="gap-30"></div>
            <div class="gap-30"></div>
        </div>
        <div class="gap-30"></div>
        <div class="login-content">
            <div class="login-body">
                <h4>Librarian Login Form</h4>
                <form action="login.php" method="post">
                    <div class="mb-20">
                        <input type="text" name="username" class="form-control" placeholder="Username" required=""/>
                    </div>
                    <div class="mb-20">
                        <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
                    </div>
                    <div class="mb-20">
                        <input class="btn btn-info submit" type="submit" name="login" value="Login">

                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST["login"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                // Prepare the SQL statement
                $sql = "SELECT * FROM lib_registration WHERE username = ? AND password = ?";
                $stmt = mysqli_prepare($link, $sql);

                if ($stmt) {
                    // Bind parameters and execute the query
                    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    // Check the number of rows returned
                    $count = mysqli_stmt_num_rows($stmt);

                    if ($count == 0) {
                        $usernameQuery = mysqli_query($link, "SELECT * FROM lib_registration WHERE username = '$username'");
                        $passwordQuery = mysqli_query($link, "SELECT * FROM lib_registration WHERE password = '$password'");

                    if (mysqli_num_rows($usernameQuery) == 0) {
                        // Incorrect username
                        ?>
                        <div class="alert alert-warning">
                            <strong style="color:#333">Invalid!</strong> <span style="color: red;font-weight: bold; ">Incorrect Username.</span>
                        </div>
                        <?php
                    } elseif (mysqli_num_rows($passwordQuery) == 0) {
                        // Incorrect password
                        ?>
                        <div class="alert alert-warning">
                            <strong style="color:#333">Invalid!</strong> <span style="color: red;font-weight: bold; ">Incorrect Password.</span>
                        </div>
                    <?php
                    }
                    } else {
                    session_start();
                    $_SESSION["username"] = $username;
                    ?>
                        <script type="text/javascript">
                            window.location = "dashboard.php";
                        </script>
                        <?php
                    }

                    // Close the statement
                    mysqli_stmt_close($stmt);
                }
            }
            ?>

        </div>
    </div>
</div>
<div class="footer text-center">
    <p>&copy; All rights reserved cput</p>
</div>

<script src="inc/js/jquery-2.2.4.min.js"></script>
<script src="inc/js/bootstrap.min.js"></script>
<script src="inc/js/custom.js"></script>
</body>
</html>