<?php

/**
  * List all users with a link to edit
  */

try {
  require "config.php";
  require "common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM student";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "header.php"; ?>

<h2>Update Student</h2>

<table>
  <thead>
    <tr>
      <th>Student id</th>
      <th>Student Name</th>
      <th>Address</th>
      <th>Subject</th>
      <th>Edit</th>
    </tr>
  </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo escape($row["student_id"]); ?></td>
        <td><?php echo escape($row["student_name"]); ?></td>
        <td><?php echo escape($row["address"]); ?></td>
        <td><?php echo escape($row["subject"]); ?></td>

        <td><a href="update-single.php?student_id=<?php echo escape($row["student_id"]); ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "footer.php"; ?>