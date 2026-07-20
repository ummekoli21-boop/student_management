<?php
require_once 'config.php';
if (isset($_GET['id'])) {
    $student_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE FROM students WHERE student_id = '$student_id'";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    }
}
?>