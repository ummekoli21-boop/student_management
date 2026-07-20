<?php
require_once 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $Address = mysqli_real_escape_string($conn, $_POST['Address']);

    $query = "INSERT INTO students (student_id, student_name, department, semester, gender, phone, email, Address) 
              VALUES ('$student_id', '$student_name', '$department', '$semester', '$gender', '$phone', '$email', '$Address')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .box { max-width: 500px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        input, select, textarea { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { background: #5cb85c; color: white; padding: 10px; border: none; width: 100%; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
<div class="box">
    <h2>Add New Student</h2>
    <form method="post">
        ID: <input type="text" name="student_id" required>
        Name: <input type="text" name="student_name" required>
        Department: <input type="text" name="department">
        Semester: <input type="text" name="semester">
        Gender: <select name="gender"><option value="Male">Male</option><option value="Female">Female</option></select>
        Phone: <input type="tel" name="phone" required>
        Email: <input type="email" name="email" required>
        Address: <textarea name="Address"></textarea>
        <button type="submit">Save Student</button>
        <a href="index.php" style="display:block; text-align:center; margin-top:10px; color:#555;">Cancel</a>
    </form>
</div>
</body>
</html>