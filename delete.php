<!DOCTYPE html>
<html>
<head>
	<title>Tuition Center</title>
</head>
<body>

<?php
require 'config.php'; // include file connect to db
include 'menu.php'; //include menu list from menu.php, you may edit accordingly

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 6) {
    // output data of each row if record found
 echo "<table border='1'>
		<tr>
			<th>Student Id</th>
			<th>Student Name</th>
			<th>Address</th>
			<th>Subject</th>
		</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
			<td> ". $row["student_id"]. " </td>
			<td> ". $row["student_name"]. " </td>
			<td>" . $row["address"] . "</td>
			<td>" . $row["subject"] . "</td>
	     </tr>";
    }
} else {
    echo "0 results";
}

$conn->close();



 if(empty(trim(isset($_POST["padamData"])))){
	  

        echo "<br><br><br> Masukkan ID Data yang Hendak Di Padam";
    } else
	{
       	$padamData = trim($_POST['padamData']);
	
		
		//SQL, change into your table name and columnid
   
		$sql2 = "DELETE FROM student WHERE student_id=$padamData ";			

if ($conn2->query($sql2) === TRUE) {
  echo "<br><br>Rekod telah berjaya dipadam";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn2->error;
}

$conn2->close();
        
    	}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


   <table>
		<br>
		<tr>
			<td>No ID Data Yang Hendak Di Padam</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>
				<label for="padamData">Student ID:</label>
				<input type="text" name="padamData" required>
			</td>
		</tr>
    

		<tr>
			
			<td>
				<input type="submit" value="Submit">
				<input type="reset" value="Semula">
			</td>
		</tr>
		</table>

</form>




<?php
include 'footer.php';
?>

</body>
</html>