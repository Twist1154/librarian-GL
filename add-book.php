<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

include 'inc/header.php';
include 'inc/connection.php';
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
                        <span class="disabled">add book</span>
                    </div>
                </div>
            </div>
            <div class="bstore">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="booksname" placeholder="Books name" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Books image
                                <input type="file" class="form-control" name="f1" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Books file
                                <input type="file" class="form-control" name="file" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bauthorname" placeholder="Books author name" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bpubname" placeholder="Books publication name" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bpurcdate" placeholder="Books purchase date" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bprice" placeholder="Books price" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bquantity" placeholder="Books quantity" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="bavailability" placeholder="Books availability" required="">
                            </td>
                        </tr>
                    </table>
                    <div class="submit mt-20">
                        <input type="submit" name="submit" class="btn btn-info submit" value="Add Book">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $image_name = $_FILES['f1']['name'];
    $file_name = $_FILES['file']['name'];
    $temp = explode(".", $image_name);
    $temp2 = explode(".", $file_name);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $newfilename2 = round(microtime(true)) . '.' . end($temp2);
    $imagepath = "books-image/" . $newfilename;
    $filepath = "books-file/" . $newfilename2;

    if (move_uploaded_file($_FILES["f1"]["tmp_name"], $imagepath) && move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
        $booksname = $_POST['booksname'];
        $bauthorname = $_POST['bauthorname'];
        $bpubname = $_POST['bpubname'];
        $bpurcdate = $_POST['bpurcdate'];
        $bprice = $_POST['bprice'];
        $bquantity = $_POST['bquantity'];
        $bavailability = $_POST['bavailability'];
        $username = $_SESSION['username'];

        $insertQuery = "INSERT INTO add_book VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $insertQuery);
        mysqli_stmt_bind_param($stmt, "sssssssss", $booksname, $imagepath, $bauthorname, $bpubname, $bpurcdate, $bprice, $bquantity, $bavailability, $username);
        if (mysqli_stmt_execute($stmt)) {
            $bookId = mysqli_insert_id($link);
            mysqli_stmt_close($stmt);
            $fileInsertQuery = "INSERT INTO add_book_file VALUES (?, ?)";
            $fileStmt = mysqli_prepare($link, $fileInsertQuery);
            mysqli_stmt_bind_param($fileStmt, "is", $bookId, $filepath);
            mysqli_stmt_execute($fileStmt);
            mysqli_stmt_close($fileStmt);
        } else {
            die('Query Error: ' . mysqli_error($link));
        }
    }
}
?>

<?php
include 'inc/footer.php';
?>
