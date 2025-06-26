<?php
// --- Database Connection ---
$conn = new mysqli("localhost", "root", "", "webteam_intern");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Delete Functionality ---
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $conn->query("DELETE FROM students WHERE id = $id");
    header("Location: index.php"); // Redirect to refresh the list
    exit();
}

// --- Fetch Data from Database ---
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin: 20px auto; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        a.delete-btn { color: red; text-decoration: none; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Student Records</h2>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['course']) ?></td>
            <td><a class="delete-btn" href="index.php?delete_id=<?= $row['id'] ?>" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>
        <?php endwhile; ?>

    </table>
</body>
</html>
