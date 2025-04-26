<?php
session_start();
include 'db_connect.php'; // Include database connection file

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin.php"); // Redirect to login if not authenticated
    exit();
}

// Fetch all members from the database
$query = "SELECT * FROM minfo";
$result = pg_query($conn, $query);

if (!$result) {
    die("Error fetching members: " . pg_last_error($conn));
}

// Handle member deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM minfo WHERE id = $1";
    $stmt = pg_prepare($conn, "delete_member", $deleteQuery);
    $deleteResult = pg_execute($conn, "delete_member", array($id));

    if ($deleteResult) {
        echo "<script>alert('Member deleted successfully!'); window.location='Manage_member.php';</script>";
    } else {
        echo "<script>alert('Error deleting member');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members</title>
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this member?")) {
                window.location.href = 'Manage_member.php?delete=' + id;
            }
        }
    </script>
    <style>   
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }

        a:hover {
            opacity: 0.8;
        }

        a[href*="edit_member"] {
            background-color: #28a745;
            color: white;
        }

        a[href*="#"] {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <a href="dashboard.php">Back to Dashboard</a>
    <a href="logout.php" style="float: right;">Logout</a>
    <br><br>
    <h2>Manage Members</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = pg_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <a href="edit_member.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="#" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
