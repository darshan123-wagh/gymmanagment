<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin.php"); 
    exit();
}
$admin_name = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Gym Management</title>
    <link rel="stylesheet" href="dash.css"> <!-- Link to your CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
        }
        .header a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            background-color: #ff4d4d;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .header a:hover {
            background-color: #ff1a1a;
        }
        .container {
            padding: 20px;
        }
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card h2 {
            margin: 0;
            margin-bottom: 10px;
            font-size: 20px;
            color: black;
        }
        .card p {
            margin: 0;
            color: #555;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .actions a {
            text-decoration: none;
            color: white;
            background: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
        }
        .actions a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <div class="card">
            <h2>Welcome, <?php echo htmlspecialchars($admin_name); ?>!</h2>
            <p>Manage your gym efficiently from this dashboard.</p>
        </div>

        <div class="card">
            <h2>Members Management</h2>
            <p>View, add, and manage gym members.</p>
            <div class="actions">
                <a href="view_member.php">View Members</a>
                <a href="Manage_member.php">Manage member</a>
            </div>
        </div>

        <div class="card">
            <h2>View contact as message</h2>
            <p>view users messsge</p>
            <div class="actions">
                <a href="messges.php">View message</a>
         </div>
    </div>
</body>
</html>
