<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $student_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM students WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $query);
    $student = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

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
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Edit Student Information</h2>
    <form method="POST">
        <div class="form-group">
            <label>Student ID (Read-only):</label>
            <input type="text" value="<?php echo $student['student_id']; ?>" disabled>
        </div>
        <div class="form-group">
            <label>Student Name:</label>
            <input type="text" name="student_name" value="<?php echo $student['student_name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Department:</label>
            <input type="text" name="department" value="<?php echo $student['department']; ?>" required>
        </div>
        <div class="form-group">
            <label>Semester:</label>
            <input type="text" name="semester" value="<?php echo $student['semester']; ?>" required>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <select name="gender" required>
                <option value="Male" <?php if($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                <option value="Other" <?php if($student['gender'] == 'Other') echo 'selected'; ?>>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $student['phone']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
        </div>
        <div class="form-group">
            <label>Address:</label>
            <textarea name="address" rows="3"><?php echo $student['address']; ?></textarea>
        </div>
        <button type="submit" class="btn">Update Student</button>
        <a href="index.php" class="btn btn-warning">Cancel</a>
    </form>
</div>
</body>
</html>