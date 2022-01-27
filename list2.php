<!DOCTYPE html>
<html>
<head>
	<title>Basic CRUD</title>
</head>
<body>

<?php
require 'config.php'; // include file connect to db
include 'menu.php'; //include menu list from menu.php, you may edit accordingly

$sql = "SELECT * FROM pelanggan, kereta WHERE pelanggan.idPelanggan = kereta.idPelanggan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
 echo "<table border='1'>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Bapa</th>
			<th>Kereta</th>
			<th>Plat</th>
		</tr>";
    while($row = $result->fetch_array()) {
        echo "<tr>
			<td> ". $row["idPelanggan"]. " </td>
			<td> ". $row["namaSendiri"]. " </td>
			<td>" . $row["namaBapa"] . "</td>
			<td>" . $row["kereta"] . "</td>
			<td>" . $row["plat"] . "</td>
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
