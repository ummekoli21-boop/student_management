<?php
require_once 'config.php';

// সার্চ টার্ম রিসিভ করা
$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    // ID, Name অথবা Department দিয়ে ফিল্টার করার কুয়েরি
    $query = "SELECT * FROM students WHERE 
              student_id LIKE '%$search%' OR 
              student_name LIKE '%$search%' OR 
              department LIKE '%$search%'";
} else {
    $query = "SELECT * FROM students";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Student Management System</h2>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <a href="add_student.php" class="btn" style="margin-bottom: 0;">Add New Student</a>
        
        <!-- সার্চ ফর্ম -->
        <form method="GET" action="index.php" style="display: flex; gap: 5px;">
            <input type="text" name="search" placeholder="Search ID, Name, Dept..." value="<?php echo htmlspecialchars($search); ?>" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; outline: none;">
            <button type="submit" class="btn" style="margin-bottom: 0; background-color: #007bff;">Search</button>
            <?php if (!empty($search)) { ?>
                <a href="index.php" class="btn btn-warning" style="margin-bottom: 0;">Reset</a>
            <?php } ?>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { 
            ?>
            <tr>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['student_name']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <?php echo isset($row['address']) ? $row['address'] : ''; ?>
                <td>
                    <a href="edit.php?id=<?php echo $row['student_id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete_student.php?id=<?php echo $row['student_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                </td>
            </tr>
            <?php 
                } 
            } else { 
            ?>
            <tr>
                <td colspan="9" style="text-align: center; color: red;">No student records found!</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>