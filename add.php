<!DOCTYPE html>
<html>
<head>
	<title>Basic CRUD</title>
</head>
<body>

<?php
require 'config.php'; // include file connect to db
include 'menu.php'; //include menu list from menu.php, you may edit accordingly

 
  if(empty(trim(isset($_POST["namaSendiri"])))){
	  

        echo "<br><br><br>";
    } else
	{
       	$namaSendiri = trim($_POST['namaSendiri']);
		$namaBapa= trim($_POST['namaBapa']); 
		
		//SQL, change into your table name and column
       	$sql = "INSERT INTO pelanggan (namaSendiri, namaBapa)
			VALUES ('$namaSendiri','$namaBapa')";	

if ($conn->query($sql) === TRUE) {
  echo "<br><br>New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
        
    	}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <table>
		<tr>
			<td>
				<label for="namaSendiri">Nama:</label>
				<input type="text" name="namaSendiri" required>
			</td>
		</tr>
    
		<tr>
			<td>
				<label for="namaBapa">Nama Family:</label>
				<input type="text" name="namaBapa" required>
			</td>
		</tr>

		<tr>
			<td>
				<input type="submit" value="Submit">
			</td>
		</tr>
		</table>

</form>

<?php

include 'footer.php';
?>

</body>
</html>