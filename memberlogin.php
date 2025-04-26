<?php
session_start();
if (isset($_POST['btn'])) {
    $server = "localhost";
    $username = "postgres";
    $password = "123";
    $database = "gymdb";


    $conn = pg_connect("host=$server dbname=$database user=$username password=$password");

    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }


    $member_email = pg_escape_string($conn, $_POST['username']);
    $member_password = $_POST['password']; 

    // Use pg_query_params with placeholders to prevent SQL injection
    $query = "SELECT * FROM minfo WHERE email = $1";
    $result = pg_query_params($conn, $query, array($member_email));  // Proper parameter binding

    if ($result === false) {
        // If query failed
        echo "Query failed: " . pg_last_error($conn);
    } else {
        // If query was successful, check the result
        if (pg_num_rows($result) > 0) {
            $user = pg_fetch_assoc($result);

            // Verify password using password_verify
            if (password_verify($member_password, $user['password'])) {

                $_SESSION["member"] = $user['email'];
                header("Location:memberdash.php");
                exit();
            } else {
                echo "<script>alert('Invalid Password!');</script>";
            }
        } else {
            echo "<script>alert('Invalid Email!');</script>";
        }
    }

    pg_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login</title>
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
    margin-bottom: 20px;
    color: #ffcc00;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: none;
    border-radius: 5px;
    background: #333;
    color: white;
}

input::placeholder {
    color: #bbb;
}

.login-button {
    width: 100%;
    padding: 10px;
    background: #ffcc00;
    border: none;
    color: black;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    transition: background 0.3s;
}

.login-button:hover {
    background: #e6b800;
}

p {
    margin-top: 10px;
    font-size: 14px;
}

a{
    color:white;
    text-decoration: none;
    font-size: 15px;
}

a:hover {
    text-decoration: underline;
}

#m-b-btn {
    position: absolute;
    top: 20px;
    left: 20px;
}

#m-b-btn button {
    background: #ffcc00;;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
}
#m-b-btn button a {
    color: black;
    text-decoration: none;
}

#m-b-btn button:hover {
    background: #cc0000;
}

    </style>    
</head>
<body>
<div id="m-b-btn"> <button><a href="index.html">Back</a></button>
</div>
    <div class="login-container">
        <h2>Member Login</h2>
        <form action="memberlogin.php" method="POST">
            <div class="form-group">
                <label for="username">enter your email</label>
                <input type="text" id="username" name="username" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-button" name="btn">Login</button>
        </form>
        <p>Are you an admin? <a href="admin.php">Click here to login</a></p>
        <p><a href="forget_pass.php">Forgot Password?</a></p>

    </div>       
</body>
</html>