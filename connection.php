<?php
    $servername='localhost';
    $username='root';
    $password='syahmi1310';
    $dbname = "tuition_centre";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>