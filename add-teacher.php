<<?php
session_start();

// Check if the username session variable is not set
if (!isset($_SESSION["username"])) {
    // Redirect the user to the login page
    header("Location: dashboard.php");
    exit(); // Terminate the current script
}

include 'inc/header.php';
include 'inc/connection.php';
require_once 'inc/tfunction.php';// Include necessary functions for teacher-related operations

$error_m = $error_ua = $error_uname = $error_p = $error_email = $error_phone = $error_reg = $e_msg = ""; // Initialize error variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $dept = $_POST["dept"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $regno = $_POST["regno"];
    $address = $_POST["address"];

    // Perform server-side validation
    $error = false; // Initialize error flag

    // Validate name
    if (empty($name)) {
        $error = true;
        $error_m = "Name is required.";
    }

    // Validate username
    if (empty($username)) {
        $error = true;
        $error_ua = "Username is required.";
    } else {
        // Check if the username already exists
        $existingUsername = checkExistingUsername($link, $username);
        if ($existingUsername) {
            $error = true;
            $error_uname = "Username already exists.";
        }
    }

    // Validate password
    if (empty($password)) {
        $error = true;
        $error_p = "Password is required.";
    }

    // Validate email
    if (empty($email)) {
        $error = true;
        $error_email = "Email is required.";
    } else {
        // Check if the email already exists
        $existingEmail = checkExistingEmail($link, $email);
        if ($existingEmail) {
            $error = true;
            $error_email = "Email already exists.";
        }
    }

    // Validate phone
    if (empty($phone)) {
        $error = true;
        $error_phone = "Phone number is required.";
    }

    // Validate reg number
    if (empty($regno)) {
        $error = true;
        $error_reg = "ID number is required.";
    }

    // If no errors, proceed with registration
    if (!$error) {
        $result = registerTeacher($link, $name, $username, $password, $dept, $email, $phone, $regno, $address);
        if ($result) {
            // Registration successful, redirect to a success page
            if (mysqli_query($link, $result)) {
                // Send verification email
                sendVerificationEmail($email, $verificationCode);
                return true;
            } else {
                return false;
            }
            header("Location: registration.php");
            exit(); // Terminate the current script
        } else {
            // Registration failed, show error message
            $e_msg = "Registration failed. Please try again.";
        }
    }
}
?>
<!--dashboard area-->
<div class="dashboard-content">
    <div class="dashboard-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left">
                        <p><span>dashboard</span>Control panel</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right text-right">
                        <a href="dashboard.php"><i class="fas fa-home"></i>home</a>
                        <a href="add-student.php"><i class="fas fa-user"></i>Add student</a>
                        <span class="disabled">add teacher</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="addUser">
            <div class="gap-40"></div>
            <div class="reg-body user-content">
                <?php if (isset($error_m)): ?>
                    <span class="errort"><?php echo $error_m; ?></span>
                <?php endif ?>

                <h4 style="text-align: center; margin-bottom: 25px;">Teacher registration form</h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-inline" method="post">
                    <div class="form-group">
                        <label for="name" class="text-right">Name <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Full Name" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="username">Username <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Username" name="username" />
                    </div>
                    <?php if (isset($error_ua)): ?>
                        <span class="error"><?php echo $error_ua; ?></span>
                    <?php endif ?>
                    <?php if (isset($error_uname)): ?>
                        <span class="error"><?php echo $error_uname; ?></span>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="password">Password <span>*</span></label>
                        <input type="password" class="form-control custom" placeholder="Password" name="password" />
                    </div>
                    <div class="form-group">
                        <label for="dept">Department <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Department" name="dept" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Email" name="email" />
                    </div>
                    <?php if (isset($e_msg)): ?>
                        <span class="error"><?php echo $e_msg; ?> </span>
                    <?php endif ?>
                    <?php if (isset($error_email)): ?>
                        <span class="error"><?php echo $error_email; ?> </span>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="phone">Phone No <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Phone No" name="phone" />
                    </div>
                    <?php if (isset($error_phone)): ?>
                        <span class="error"><?php echo $error_phone; ?></span>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="session">Reg no <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Reg no" name="regno" />
                    </div>
                    <?php if (isset($error_reg)): ?>
                        <span class="error"><?php echo $error_reg; ?></span>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="address">Address <span>*</span></label>
                        <textarea name="address" id="address" class="form-control custom"
                                  placeholder="Your address"></textarea>
                    </div>
                    <div class="submit">
                        <input type="submit" value="Register" class="btn change" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="gap-40"></div>

<?php
include 'inc/footer.php';
?>
