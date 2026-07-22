<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // ডাটাবেজ আপডেট করার কোয়েরি
    $update_query = "UPDATE students SET 
                    student_name='$student_name', 
                    department='$department', 
                    semester='$semester', 
                    gender='$gender', 
                    phone='$phone', 
                    email='$email', 
                    address='$address' 
                    WHERE student_id='$student_id'";

    if (mysqli_query($conn, $update_query)) {
        // সফলভাবে আপডেট হলে index.php পেজে ফেরত যাবে
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    // সরাসরি এক্সেস করলে index.php-তে পাঠিয়ে দেবে
    header("Location: index.php");
    exit();
}
?>
