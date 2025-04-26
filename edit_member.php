<?php
session_start();
include 'db_connect.php';

// Check if ID is set
if (!isset($_GET['id'])) {
    echo "Invalid request.";
    exit();
}

$id = $_GET['id'];

// Fetch existing member data
$query = "SELECT * FROM minfo WHERE id = $1";
$stmt = pg_prepare($conn, "fetch_member", $query);
$result = pg_execute($conn, "fetch_member", array($id));

if (!$result || pg_num_rows($result) == 0) {
    echo "Member not found.";
    exit();
}

$member = pg_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $updateQuery = "UPDATE minfo SET name = $1, email = $2, phone = $3 WHERE id = $4";
    $stmt = pg_prepare($conn, "update_member", $updateQuery);
    $updateResult = pg_execute($conn, "update_member", array($name, $email, $phone, $id));

    if ($updateResult) {
        echo "<script>alert('Member updated successfully!'); window.location='Manage_member.php';</script>";
    } else {
        echo "Error updating member.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Member</title>
    <link rel="stylesheet" href="edit_member.css">
</head>
<body>
    <h2>Edit Member</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($member['name']); ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($member['email']); ?>" required><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($member['phone']); ?>" required><br>
        <div id="btn">
             <button type="submit">Update</button>
          <button><a href="Manage_member.php">Cancel</a></button>
        </div>
    </form>
</body>
</html>
