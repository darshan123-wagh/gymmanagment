<?php
session_start();

if (isset($_POST['login'])) {
    
    include 'db_connect.php';

    $admin_username = pg_escape_string($conn, $_POST['username']);
    $admin_password = pg_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username = '$admin_username' AND password = '$admin_password'";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) > 0) {
        $_SESSION['admin'] = $admin_username; // Store session
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }

    pg_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        
body {
    font-family: Arial, sans-serif;
    background: url('img/main.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    flex-direction: column;
}

#backbtn {
    position: absolute;
    top: 20px;
    left: 20px;
}

#backbtn button {
    padding: 10px;
    background: #ffcc00;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#backbtn button a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.login-container {
    background: rgba(0, 0, 0, 0.8);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    text-align: center;
    width: 350px;
    color: white;
}

h2 {
    margin-bottom: 10px;
    color: #ffcc00;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    font-weight: bold;
    color: white;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background: #333;
    color: white;
}

input::placeholder {
    color: #bbb;
}

button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s;
}

.login-button {
    background: #ffcc00;
    color: black;
}

.login-button:hover {
    background: #e6b800;
}

.reset-button {
    background: #ff4d4d;
    color: white;
}

.reset-button:hover {
    background: #cc0000;
}

p {
    font-size: 14px;
    color: #ccc;
}

a {
    color: #ffcc00;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

    </style>    
</head>
<body>
    <div id="backbtn"><button><a href="index.html">Back</a></button></div>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="admin.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-button" name="login">Login</button>
            <button type="reset" class="reset-button">Reset</button>
        </form>
        <p>Are you a user? <a href="memberlogin.php">Click here to login</a></p>
        <p>forgot password? <a href="forgotpassword.php">Click here</a></p>
    </div>
</body>
</html>
