<?php

/**
 * Delete a user
 */

require "config.php";
require "common.php";

if (isset($_GET["student_id"])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $student_id = $_GET["student_id"];

        $sql = "DELETE FROM student WHERE student_id = :student_id";

        $statement = $connection->prepare($sql);
        $statement->bindValue(':student_id', $student_id);
        $statement->execute();

        $success = "User successfully deleted";
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

try {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM student";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "header.php"; ?>

<h2>Delete student</h2>

<table>
    <thead>
        <tr>
            <th>student_id</th>
            <th>student_name</th>
            <th>address</th>
            <th>subject</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row) : ?>
            <tr>
                <td><?php echo escape($row["student_id"]); ?></td>
                <td><?php echo escape($row["student_name"]); ?></td>
                <td><?php echo escape($row["address"]); ?></td>
                <td><?php echo escape($row["subject"]); ?></td>
                <td><a href="delete.php?student_id=<?php echo escape($row["student_id"]); ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "footer.php"; ?>