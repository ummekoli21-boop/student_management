<?php
require_once 'config.php';

$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; text-align: center; }
        .container { max-width: 1100px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #fff; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #eef2f3; color: #333; font-weight: bold; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .btn-add { display: inline-block; padding: 10px 20px; background-color: #5cb85c; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 20px; font-weight: bold; }
        .btn-add:hover { background-color: #4cae4c; }
        .btn-edit { color: #0275d8; text-decoration: none; font-weight: bold; }
        .btn-edit:hover { text-decoration: underline; }
        .btn-delete { color: #d9534f; text-decoration: none; font-weight: bold; }
        .btn-delete:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h1>Student Management System</h1>
    
    <a href="add.php" class="btn-add">Add New Student</a>

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
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['department']); ?></td>
                        <td><?php echo htmlspecialchars($row['semester']); ?></td>
                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['Address']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo urlencode($row['student_id']); ?>" class="btn-edit">Edit</a> | 
                            <a href="delete.php?id=<?php echo urlencode($row['student_id']); ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='9' style='text-align:center;'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>