<?php

/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */

require "config.php";
require "common.php";
if (isset($_POST['Update'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $student =[
        "student_id" => $_POST['student_id'],
        "student_name"  => $_POST['student_name'],
        "address"   => $_POST['address'],
        "subject" => $_POST['subject'],
      ];

      $sql = "UPDATE student
      SET student_id = :student_id,
      student_name = :student_name,
      address = :address,
      subject = :subject 
        WHERE student_id =:student_id";

     $statement = $connection->prepare($sql);
     $statement->execute($student);

    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
  }

if (isset($_GET['student_id'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $student_id = $_GET['student_id'];
        $sql = "SELECT * FROM student WHERE student_id = :student_id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':student_id', $student_id);
        $statement->execute();

        $student_id = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    echo $_GET['student_id']; // for testing purposes
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "header.php"; ?>

<h2>Edit a book</h2>

<form method="post">
    <?php foreach ($student_id as $key => $value) : ?>
        <label for="<?php echo $key; ?>">
            <?php echo ucfirst($key); ?>
        </label>
        <input type="text" name="<?php echo $key; ?>" student_id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'student_id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="Update" value="Update">
</form>

<a href="index.php">Back to home</a>

<?php require "footer.php"; ?>