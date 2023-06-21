<?php
session_start();
if (!isset($_SESSION["username"])) {
    // Redirect the user to the login page if not logged in
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
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
                        <span class="disabled">display books</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dbooks">
                    <table id="dtBasicExample" class="table table-striped table-dark text-center">
                        <thead>
                        <tr>
                            <th>Books image</th>
                            <th>Books name</th>
                            <th>Author name</th>
                            <th>Publication name</th>
                            <th>Purchase date</th>
                            <th>Books price</th>
                            <th>Books quantity</th>
                            <th>Books availability</th>
                            <th>Delete book</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Fetch book information from the database
                        $res = mysqli_query($link, "SELECT * FROM add_book");
                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td><img src='" . $row["books_image"] . "' height='100' width='100' alt=''></td>";
                            echo "<td>" . $row["books_name"] . "</td>";
                            echo "<td>" . $row["books_author_name"] . "</td>";
                            echo "<td>" . $row["books_publication_name"] . "</td>";
                            echo "<td>" . $row["books_purchase_date"] . "</td>";
                            echo "<td>" . $row["books_price"] . "</td>";
                            echo "<td>" . $row["books_quantity"] . "</td>";
                            echo "<td>" . $row["books_availability"] . "</td>";
                            echo "<td><a href='delete-book.php?id=" . $row["id"] . "'><i class='fas fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>
<script>
    $(document).ready(function () {
        // Initialize the DataTable plugin for the table
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
