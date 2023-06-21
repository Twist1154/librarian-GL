 <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "project";

 // Create connection
 $link = mysqli_connect($servername, $username, $password, $dbname);

 // Check connection
 if ($link->connect_error) {
     die("Connection failed: " . $link->connect_error);
 }

