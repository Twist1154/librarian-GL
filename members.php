<?php 
    session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'members';
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
                        <span class="disabled">issued books</span>
                    </div>
                </div>
            </div>
            <div class="issued-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="members-info status">
                            <table id="dtBasicExample" class="table table-striped table-dark text-center">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>User type</th>
                                    <th>User Email</th>
                                    <th>Phone</th>
                                    <th>Verified</th>
                                    <th>Department</th>
                                    <th>Reg no</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $res = mysqli_query($link, "SELECT * FROM t_registration");
                                if (!$res) {
                                    die('Query Error: ' . mysqli_error($link));
                                }

                                $res2 = mysqli_query($link, "SELECT * FROM std_registration");
                                if (!$res2) {
                                    die('Query Error: ' . mysqli_error($link));
                                }
                                while ($row=mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                    echo "<td>"; echo $row["username"]; echo "</td>";
                                    echo "<td>"; echo $row["utype"]; echo "</td>";
                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                    echo "<td>"; echo $row["phone"]; echo "</td>";
                                    echo "<td>"; echo $row["verified"]; echo "</td>";
                                    echo "<td>"; echo $row["dept"]; echo "</td>";
                                    echo "<td>"; echo $row["regno"]; echo "</td>";
                                    echo "<td>";
                                    ?>
                                    <ul>
                                        <li><a href="delete.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-trash"></i></a></li>
                                    </ul>
                                    <?php
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                while ($row=mysqli_fetch_array($res2)) {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                    echo "<td>"; echo $row["username"]; echo "</td>";
                                    echo "<td>"; echo $row["utype"]; echo "</td>";
                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                    echo "<td>"; echo $row["phone"]; echo "</td>";
                                    echo "<td>"; echo $row["verified"]; echo "</td>";
                                    echo "<td>"; echo $row["dept"]; echo "</td>";
                                    echo "<td>"; echo $row["regno"]; echo "</td>";
                                    echo "<td>";
                                    ?>
                                    <ul>
                                        <li><a href="delete.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-trash"></i></a></li>
                                    </ul>
                                    <?php
                                    echo "</td>";
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
    </div>
</div>
<?php
include 'inc/footer.php';
?>
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>