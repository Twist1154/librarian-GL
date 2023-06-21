<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Management System</title>
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="inc/css/pro1.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
    <style>
        .login {
            background-image: url(inc/img/3.jpg);
            margin-bottom: 30px;
            padding: 50px 50px 150px;
        }

        .reg-header h2 {
            color: #DDDDDD;
            z-index: 999999;
        }

        .login-body h4 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="login registration">
        <div class="wrapper">
            <div class="reg-header text-center">
                <h2>Growth Learning Library</h2>
                <div class="gap-30"></div>
                <div class="gap-30"></div>
            </div>
            <div class="gap-30"></div>
            <div class="login-content">
                <div class="login-body">
                    <h4>Librarian Login Form</h4>
                    <form action="login.php" method="post">
                        <div class="mb-20">
                            <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div class="mb-20">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div class="mb-20">
                            <input class="btn btn-info submit" type="submit" name="login" value="Login">

                        </div>
                    </form>
                </div>
                <?php
                session_start();
                include 'inc/connection.php';

                if (isset($_POST["login"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    // Prepare the SQL statement
                    $sql = "SELECT * FROM lib_registration WHERE username = ? AND password = ?";
                    $stmt = $link->prepare($sql);

                    if ($stmt) {
                        // Bind parameters and execute the query
                        $stmt->bind_param("ss", $username, $password);
                        $stmt->execute();

                        // Check if a row is returned
                        if ($stmt->fetch()) {
                            $_SESSION["username"] = $username;
                            header("Location: dashboard.php");
                            exit();
                        } else {
                            echo '<div class="alert alert-warning">
                    <strong style="color:#333">Invalid!</strong> <span style="color: red;font-weight: bold; ">Username or Password.</span>
                  </div>';
                        }
                        // Close the statement
                        $stmt->close();
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