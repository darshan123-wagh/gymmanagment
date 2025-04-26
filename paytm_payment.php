<?php
$email = $_GET['email'];
$amount = $_GET['amount'];
$plan = $_GET['plan'];
$name = $_GET['name'];
$phone = $_GET['phone'];
$A_date = $_GET['adate'];
$e_date = $_GET['expiry_date'];
?>
<!DOCTYPE html>
<html>
<head>
    <title> Payment Receipt</title>
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

        h3 {
            color: white;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .invoice-container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: left;
            width: 350px;
            color: white;
            margin-bottom: 20px;
        }

        .invoice-container h4 {
            margin: 0 0 10px;
            color: #ffcc00;
        }

        .invoice-container p {
            margin: 5px 0;
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

        form {
            text-align: center;
        }
    </style>
</head>
<body>
    <h3>Payment Details</h3>

    <!-- Invoice Section -->
    <div class="invoice-container">
        <h4>Invoice Details</h4>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
        <p><strong>Plan:</strong> <?php echo htmlspecialchars($plan); ?></p>
        <p><strong>Amount:</strong> ₹<?php echo htmlspecialchars($amount); ?></p>
        <p><strong>Activation Date:</strong> <?php echo htmlspecialchars($A_date); ?></p>
        <p><strong>Expiry_date :</strong> <?php echo htmlspecialchars($e_date); ?></p>
        
    </div>

    <!-- Confirmation Form -->
    <form action="paytm_success.php" method="POST">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <input type="hidden" name="amount" value="<?php echo htmlspecialchars($amount); ?>">
        <input type="hidden" name="plan" value="<?php echo htmlspecialchars($plan); ?>">
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <input type="hidden" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
        <input type="hidden" name="A_date" value="<?php echo htmlspecialchars($A_date); ?>">
        <input type="hidden" name="e_date" value="<?php echo htmlspecialchars($e_date); ?>">
        <button type="submit">Download</button>
        <button type="button" onclick="window.location.href='index.html'">Go Back</button>
    </form>
</body>
</html>
