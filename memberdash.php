<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['member'])) {
    header("Location: memberlogin.php"); // Redirect to login if not authenticated
    exit();
}
$member_email = $_SESSION['member'];
$conn = pg_connect("host=localhost dbname=gymdb user=postgres password=123");

if (!$conn) {
    die("Database connection failed: " . pg_last_error());
}


$query = "SELECT  name,email,phone,adate,plan,plan_duration,expiry_date  FROM minfo where email='$member_email'"; 
$result = pg_query($conn, $query);

if (!$result) {
    die("Error in query: " . pg_last_error());
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table thead {
            background-color: #007bff;
            color: white;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
   <h2>Welcome, <?php echo htmlspecialchars($member_email); ?>!</h2>
    <a class="back-button" href="Mlogout.php">Logout</a>
    <h1>Member Information</h1>
    <p>Here is your membership information:</p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Join Date</th>
                <th>expiry_date</th>
                <th>Membership Type</th>
                <th>Plan-Durtion</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['adate']); ?></td>
                    <td><?php echo htmlspecialchars($row['expiry_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['plan']); ?></td>
                    <td><?php echo htmlspecialchars($row['plan_duration']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>