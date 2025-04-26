<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          body{
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

          }
           form{
            width: 35%;
            margin: auto;
            padding: 25px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           }
           form h2{
            text-align: center;
            margin-bottom: 20px;
           }
              .form-group{
                margin-bottom: 10px;
              }
                label{
                    margin-bottom: 5px;
                    display: block;
                    font-weight: bold;
                    font-size: 18px;
                }
                input{
                    width: 90%;
                    padding: 10px;
                    border-radius: 5px;
                    border: 1px solid #ccc;
                }
                button{
                    padding: 10px 15px;
                    border: none;
                    border-radius: 5px;
                    background-color: #333;
                    color: white;
                    cursor: pointer;
                    margin-top: 5px;
                }
                button:hover{
                    background-color: #555;
                }
                a{
                    text-decoration: none;
                    color: #333;
                    font-weight: bold;
                    margin-top: 10px;
                    display: inline-block;
                    margin-left: 5px;
                }
    </style>
</head>
<body>

</body>
</html>

<?php

        $server = "localhost";
        $username = "postgres";
        $password = "123";
        $database = "gymdb";
    
        $conn = pg_connect("host=$server dbname=$database user=$username password=$password");
    
        if (!$conn) {
            die("Database Connection Failed: " . pg_last_error());
        }
        else{
            
        if (isset($_GET['email']) && isset($_GET['resettoken']))
        {
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d H:i:s'); 

            $query = "SELECT * FROM minfo WHERE email = $1 AND resettoken = $2 AND resettokenexpire >= $3";
            $result = pg_query_params($conn, $query, array($_GET['email'], $_GET['resettoken'], $date));

            if ($result === false) {
                echo "<script>alert('Database error: " . pg_last_error($conn) . "');</script>";
            } else {
                if (pg_num_rows($result) > 0) {
                    echo "<form method='POST'>
                        <h2>Reset Password</h2>
                        <div class='form-group'>
                            <label for='password'>New Password</label>
                            <input type='password' id='password' name='password' placeholder='Enter your new password' required>
                        </div>
                        <button type='submit' class='reset-button' name='resetbtn'>Reset Password</button> 
                        <a href='memberlogin.php'>Back to Login</a>
                        <input type='hidden' name='email' value='" . $_GET['email'] . "'>            
                    </form>";
                    

                } else {
                    echo "<script>alert('Reset link is invalid or expired!');</script>";
                }
            }
        } else {
            echo "<script>alert('Invalid URL!');</script>";
        }
    }  
?>
<?php
     if(isset($_POST['resetbtn'])) {

        $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $update_query = "UPDATE minfo SET password = $1, resettoken = NULL, resettokenexpire = NULL WHERE email = $2";
        $update_result = pg_query_params($conn, $update_query, array($password, $_POST['email']));  
        if ($update_result) {
            echo "<script>alert('Password reset successfully!');</script>";
        } else {
            echo "<script>alert('Failed to reset password: ');</script>";
        }

     }
        pg_close($conn);
?>