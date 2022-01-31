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

if ($result->num_rows > 0) {
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


//isset to check form data is empty 
 if(empty(trim(isset($_POST["student_id"])))){
	  

        echo "<br><br><br>";
    } else
	{
       	$student_id= trim($_POST['student_id']);
       	$student_name= trim($_POST['student_name']);
       	$address= trim($_POST['address']);	
		$subject= trim($_POST['subject']);   	
		
		//SQL, change into your table name and columnid
   
	$sql2 = "UPDATE student SET student_name='$student_name', address='$address', subject='$subject', WHERE student_id='$student_id'";			

if ($conn2->query($sql2) === TRUE) {
  echo "<br><br>Rekod telah berjaya Dikemaskini";
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
			<th>No ID Data Yang Hendak Di Kemaskini</th>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>
				<label for="student_id">Student ID:</label>
				<input type="int" name="student_id" required>
			</td>
		</tr>
 		<tr>
			<td>
				<label for="student_name">Student Nama:</label>
				<input type="text" name="student_name" required>
			</td>
		</tr>  
		
		 		<tr>
			<td>
				<label for="address">Address:</label>
				<input type="text" name="address" required>
			</td>
		</tr>  
		<tr>
			<td>
				<label for="subject">Subject:</label>
				<input type="text" name="subject" required>
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