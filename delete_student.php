<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $student_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM students WHERE student_id = '$student_id'";
    mysqli_query($conn, $sql);
}

header("Location: index.php");
exit();
?>
