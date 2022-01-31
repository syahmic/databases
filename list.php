<!DOCTYPE html>
<html>
<head>
	<title>Tuition Center</title>
</head>
<body>

<?php
require 'config.php'; // include file connect to db
include 'menu.php'; //include menu list from menu.php, you may edit accordingly

$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
 echo "<table border='1'>
		<tr>
			<th>Hire log</th>
			<th>Student Id</th>
			<th>Teacher Id</th>
		</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
			<td> ". $row["hire_log"]. " </td>
			<td> ". $row["student_id"]. " </td>
			<td> ". $row["teacher_id"]. "</td>
	     </tr>";
    }
} else {
    echo "0 results";
}

$conn->close();

include 'footer.php';
?>

</body>
</html>