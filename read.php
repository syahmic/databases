<?php

/**
  * Function to query information based on
  * a parameter: in this case, location.
  *
  */

if (isset($_POST['submit'])) {
  try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * 
    FROM student
    WHERE student_id = :student_id";

    $student = $_POST['student'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':student_id', $student, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "header.php"; ?>

<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

    <table>
      <thead>
<tr>
  <th>Student_id</th>
  <th>Student Name</th>
  <th>Address</th>
  <th>Subject</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["student_id"]); ?></td>
<td><?php echo escape($row["student_name"]); ?></td>
<td><?php echo escape($row["address"]); ?></td>
<td><?php echo escape($row["subject"]); ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
    > No results found for <?php echo escape($_POST['student']); ?>.
  <?php }
} ?>

<h2>Find user based on Student id</h2>

<form method="post">
  <label for="student">Student</label>
  <input type="text" id="student" name="student">
  <input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>

<?php require "footer.php"; ?>