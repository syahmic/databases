<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit'])) {
    require "config.php";
    require "common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $student = array(
            "student_id" => $_POST['student_id'],
            "student_name"  => $_POST['student_name'],
            "address"     => $_POST['address'],
            "subject"       => $_POST['subject'],
        );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "student",
                implode(", ", array_keys($student)),
                ":" . implode(", :", array_keys($student))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($student);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['student_id']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add a user</h2>

<form method="post">
    <label for="student_id">Student id</label>
    <input type="text" name="student_id" id="student_id">
    <label for="student_name">Student Name</label>
    <input type="text" name="student_name" id="student_name">
    <label for="address">Address</label>
    <input type="text" name="address" id="address">
    <label for="subject">Subject</label>
    <input type="text" name="subject" id="subject">
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "footer.php"; ?>