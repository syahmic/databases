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
    // output data of each row
 echo "<table border='1'>
		<tr>
			<th> Student Id</th>
			<th> Student Name</th>
			<th>Address</th>
			<th>Subject</th>
		</tr>";
    while($row = $result->fetch_array()) {
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
?>

<?php
include 'footer.php';

?>


</body>
</html>