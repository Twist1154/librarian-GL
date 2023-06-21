<?php
session_start();
if (!isset($_SESSION["username"])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
include 'inc/header.php';
include 'inc/connection.php';
include 'inc/function.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the form data
    $errors = validateForm($_POST);

    // Check if there are any validation errors
    if (count($errors) === 0) {
        // No errors, proceed with saving the data to the database
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sem = $_POST['sem'];
        $dept = $_POST['dept'];
        $session = $_POST['session'];
        $regno = $_POST['regno'];
        $address = $_POST['address'];
        // Set utype as "student"
        $utype = "student";

        // Insert data into the database
        $sql = "INSERT INTO std_registration (name, username, password, email, phone, sem, dept, session, regno, address, utype)
                    VALUES ('$name', '$username', '$password', '$email', '$phone', '$sem', '$dept', '$session', '$regno', '$address', '$utype')";

        if (mysqli_query($link, $sql)) {
            $s_msg = "Student registered successfully.";
        } else {
            $error_m = "Error: " . mysqli_error($link);
             $error_m = "Failed to add student. Please try again.";
        }
    }
}

// Function to validate form data
function validateForm($formData) {
    $errors = [];

    // Perform your form validation logic here
    // Example validation: Check if the name field is empty
    if (empty($formData['name'])) {
        $errors['name'] = "Name field is required.";
    }

    // Add more validation rules as needed

    return $errors;
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
                        <a href="add-teacher.php"><i class="fas fa-user"></i>add teacher</a>
                        <span class="disabled">add student</span>
                    </div>
                </div>
            </div>
            <div class="addUser">
                <div class="gap-40"></div>
                <div class="reg-body user-content">
                    <?php if (isset($s_msg)) : ?>
                        <span class="success"> <?php echo $s_msg; ?></span>
                    <?php endif ?>
                    <?php if (isset($error_m)) : ?>
                        <span class="error"> <?php echo $error_m; ?></span>
                    <?php endif ?>
                    <h4 style="text-align: center; margin-bottom: 25px;">Student registration form</h4>
                    <form action="" class="form-inline" method="post">
                        <div class="form-group">
                            <label for="name" class="text-right">Name <span>*</span></label>
                            <input type="text" class="form-control custom" placeholder="Your Name" name="name" />
                            <?php if (isset($errors['name'])) : ?>
                                <span class="error"><?php echo $errors['name']; ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Username <span>*</span></label>
                            <input type="text" class="form-control custom" placeholder="Username" name="username" />
                            <?php if (isset($errors['username'])) : ?>
                                <span class="error"><?php echo $errors['username']; ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span>*</span></label>
                            <input type="password" class="form-control custom" placeholder="Password" name="password" />
                            <?php if (isset($errors['password'])) : ?>
                                <span class="error"><?php echo $errors['password']; ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span>*</span></label>
                            <input type="text" class="form-control custom" placeholder="Email" name="email" />
                            <?php if (isset($errors['email'])) : ?>
                                <span class="error"><?php echo $errors['email']; ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone No <span>*</span></label>
                            <input type="text" class="form-control custom" placeholder="Phone No" name="phone" />
                            <?php if (isset($errors['phone'])) : ?>
                                <span class="error"><?php echo $errors['phone']; ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="sem">Select Semester <span>*</span></label>
                            <select class="form-control custom" name="sem">
                                <option>1st</option>
                                <option>2nd</option>
                                <option>3rd</option>
                                <option>4th</option>
                                <option>5th</option>
                                <option>6th</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dept">Department <span>*</span></label>
                            <select class="form-control custom" name="dept">
                                <option>CSE</option>
                                <option>EEE</option>
                                <option>ECE</option>
                                <option>BBA</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="session">Session <span>*</span></label>
                            <input type="text" class="form-control custom" placeholder="14/15" name="session" />
                            <?php if (isset($errors['session'])) : ?>
                                <span class="error"><?php echo $errors['session']; ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="regno">Registration No <span>*</span></label>
                            <input type="text" class="form-control custom" placeholder="Registration No" name="regno" />
                            <?php if (isset($errors['regno'])) : ?>
                            <span class="error><?php echo $errors['regno']; ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address <span>*</span></label>
                            <textarea name="address" id="address" class="form-control custom" placeholder="Your address"></textarea>
                            <?php if (isset($errors['address'])) : ?>
                                <span class="error"><?php echo $errors['address']; ?></span>
                            <?php endif ?>
                        </div>
                        <div class="submit">
                            <input type="submit" value="Add Student" name="submit" class="btn change text-center">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="gap-40"></div>
<?php
include 'inc/footer.php';
?>
