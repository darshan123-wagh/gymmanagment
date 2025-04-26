<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
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

        input {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border-radius: 5px;
            border: none;
        }

        button {
            padding: 10px;
            background: #ffcc00;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #e6b800;
        }
    </style>
</head>
<body>
      <div class="login-container">
        <h2>Forgot Password</h2>
        <form action="forgotpassword.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="enter password for reset" required><br><br>
            <button type="submit" name="submit">Submit</button>
            
        </form>  

</body>
</html>
<?php

include 'db_connect.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE admin SET password='$password' WHERE username='$username'";
    $result = pg_query($conn, $sql);
    if($result){
        echo "<script>alert('Password updated successfully'); window.location.href='admin.php';</script>";
    }else{
        echo "<script>alert('Failed to update password')</script>";
    }


}