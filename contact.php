<?php

      include 'db_connect.php';

if (isset($_POST['btn']))
 {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject =$_POST['subject'];
    $message = $_POST['message'];

  //echo $name;

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message))
     {

        $query = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    
        $result = pg_query($conn, $query);

        if ($result) {
            echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>".pg_last_error($conn);
        } else 
        {
            echo " ". pg_last_error($conn);
    
         }
    }   
     else
      {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
      }
 
}

pg_close($conn);
?>
