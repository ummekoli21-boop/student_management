<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $student_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM students WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $hidden_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $Address = mysqli_real_escape_string($conn, $_POST['Address']);

    $update_query = "UPDATE students SET 
        student_name = '$student_name', 
        department = '$department', 
        semester = '$semester', 
        gender = '$gender', 
        phone = '$phone', 
        email = '$email', 
        Address = '$Address' 
        WHERE student_id = '$hidden_id'";

    if (mysqli_query($conn, $update_query)) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .box { max-width: 500px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        input, select, textarea { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { background: #0275d8; color: white; padding: 10px; border: none; width: 100%; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
<div class="box">
    <h2>Edit Student Details</h2>
    <form method="post">
        <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($row['student_id']); ?>">
        ID: <input type="text" value="<?php echo htmlspecialchars($row['student_id']); ?>" disabled>
        Name: <input type="text" name="student_name" value="<?php echo htmlspecialchars($row['student_name']); ?>" required>
        Department: <input type="text" name="department" value="<?php echo htmlspecialchars($row['department']); ?>">
        Semester: <input type="text" name="semester" value="<?php echo htmlspecialchars($row['semester']); ?>">
        Gender: <select name="gender">
            <option value="Male" <?php if($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        </select>
        Phone: <input type="tel" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
        Address: <textarea name="Address"><?php echo htmlspecialchars($row['Address']); ?></textarea>
        <button type="submit" name="update">Update Student</button>
        <a href="index.php" style="display:block; text-align:center; margin-top:10px; color:#555;">Cancel</a>
    </form>
</div>
</body>
</html>