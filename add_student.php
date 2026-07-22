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

    $sql = "INSERT INTO students (student_id, student_name, department, semester, gender, phone, email, address) 
            VALUES ('$student_id', '$student_name', '$department', '$semester', '$gender', '$phone', '$email', '$address')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Add New Student</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <div class="form-group">
            <label>Student ID:</label>
            <input type="text" name="student_id" placeholder="e.g. 242-115-227" required>
        </div>
        <div class="form-group">
            <label>Student Name:</label>
            <input type="text" name="student_name" required>
        </div>
        <div class="form-group">
            <label>Department:</label>
            <input type="text" name="department" required>
        </div>
        <div class="form-group">
            <label>Semester:</label>
            <input type="text" name="semester" required>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="text" name="phone" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Address:</label>
            <textarea name="address" rows="3"></textarea>
        </div>
        <button type="submit" class="btn">Save Student</button>
        <a href="index.php" class="btn btn-warning">Back</a>
    </form>
</div>
</body>
</html>