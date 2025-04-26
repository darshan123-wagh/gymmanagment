<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail($resettoken, $email) 
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);
    try {
        // SMTP Configuration  
        $mail->SMTPDebug = SMTP::DEBUG_OFF;  
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'darshawagh.1997@gmail.com';  // Use your Gmail
        $mail->Password   = 'ljhkndblazhziqly';  // Use Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
    
        // Email Headers
        $mail->setFrom('your-email@gmail.com', 'Fitpro Gym');
        $mail->addAddress($email);
    
        // Email Content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Link';
        $mail->Body    = "Click on the link to reset your password: 
        <a href='http://localhost/gym/reset_pass.php?email=$email&resettoken=$resettoken'>Reset Password</a>";                   

        return $mail->send();
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['submit'])) 
{
    // Database Connection
    $server = "localhost";
    $username = "postgres";
    $password = "123";
    $database = "gymdb";

    $conn = pg_connect("host=$server dbname=$database user=$username password=$password");

    if (!$conn) {
        die("Database Connection Failed: " . pg_last_error());
    }

    
    $email = $_POST['email'];
    
    // Check if Email Exists in Database
    $query = "SELECT * FROM minfo WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));

    if ($result === false) {
        echo "<script>alert('Database error: " . pg_last_error($conn) . "');</script>";
    } else {
        if (pg_num_rows($result) > 0) {
            // Delete any existing token to avoid conflicts
            pg_query_params($conn, "UPDATE minfo SET resettoken = NULL, resettokenexpire = NULL WHERE email = $1", array($email));

            // Generate Token and Set Expiry Time (15 Minutes)
            $resettoken = bin2hex(random_bytes(16));
            $resettime = gmdate("Y-m-d H:i:s", time() + (15 * 60));  // Store in UTC

            // Update Database with Token and Expiry Time
            $query = "UPDATE minfo SET resettoken = $1, resettokenexpire = $2 WHERE email = $3";
            $update_result = pg_query_params($conn, $query, array($resettoken, $resettime, $email));

            if ($update_result) {
                if (send_mail($resettoken, $email)) {
                    echo "<script>alert('Reset link sent to your email!');</script>";
                } else {
                    echo "<script>alert('Failed to send email. Please try again later.');</script>";
                }
            } else {
                echo "<script>alert('Failed to update token: " . pg_last_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('No user found with this email!');</script>";
        }
    }

    pg_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forget.css">
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <p>Enter your email, and we'll send you a reset link.</p>
        <form action="forget_pass.php" method="POST">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit" name="submit">Send Reset Link</button>
        </form>
        <p><a href="memberlogin.php">Back to Login</a></p>
    </div>
</body>
</html>
