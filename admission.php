<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_submission']))
 {
    $server = "localhost";
    $username = "postgres";
    $password = "123";
    $database = "gymdb";

    $conn = pg_connect("host=$server dbname=$database user=$username password=$password");

    if (!$conn) {
        die("Database Connection Failed: " . pg_last_error());
    }

   else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['number'];
        $B_Date =$_POST['Bdate'];
        $A_Date = $_POST['Adate'];    
        $plan_duration = $_POST['plan-d'];
        $plan = $_POST['plan'];
        $message = $_POST['message'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $gender = $_POST['gender'];
        $illness = $_POST['illness'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $check_sql = "SELECT phone FROM minfo WHERE phone = '$phone' OR email = '$email'";
        $check_result = pg_query($conn, $check_sql);

        if (pg_num_rows($check_result) > 0)
         {

            echo "<script>alert('Phone number and email is already exists. Please use a different number.'); window.history.back();</script>";
            exit();
        }
        $amount = 0;
        $expiry_date = null;
        if ($plan_duration == "one-month" && $plan == "basic") {
            $amount = 700;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +1 month'));
        } elseif ($plan_duration == "three-month" && $plan == "basic") {
            $amount = 2000;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +3 months'));
        } elseif ($plan_duration == "six-month" && $plan == "basic") {
            $amount = 4000;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +6 months'));
        } elseif ($plan_duration == "one-year" && $plan == "basic") {
            $amount = 7000;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +1 year'));
        } elseif ($plan_duration == "one-month" && $plan == "premium") {
            $amount = 1000;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +1 month'));
        } elseif ($plan_duration == "three-month" && $plan == "premium") {
            $amount = 3000;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +3 months'));
        } elseif ($plan_duration == "six-month" && $plan == "premium") {
            $amount = 6000;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +6 months'));
        } elseif ($plan_duration == "one-year" && $plan == "premium") {
            $amount = 10000;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +1 year'));
        } elseif ($plan_duration == "one-month" && $plan == "vip") {
            $amount = 1200;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +1 month'));
        } elseif ($plan_duration == "three-month" && $plan == "vip") {
            $amount = 3600;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +3 months'));
        } elseif ($plan_duration == "six-month" && $plan == "vip") {
            $amount = 7200;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +6 months'));
        } elseif ($plan_duration == "one-year" && $plan == "vip") {
            $amount = 12000;
            $expiry_date = date('Y-m-d', strtotime($A_Date . ' +1 year'));
        }

        $sql = "INSERT INTO minfo(name, email, phone, bdate, adate, plan, message, weight, height, gender, illness, plan_duration, expiry_date, password, amount) 
                VALUES (
                    '$name', 
                    '$email', 
                    '$phone', 
                    '$B_Date',
                    '$A_Date',
                    '$plan', 
                    '$message', 
                    '$weight', 
                    '$height', 
                    '$gender', 
                    '$illness', 
                    '$plan_duration', 
                    '$expiry_date', 
                    '$password', 
                    '$amount'
                )";

        $result = pg_query($conn, $sql);

        if (!$result) {
            echo "Error: " . pg_last_error($conn);
        } else {
            ?>
            <script>
                alert("Form submitted successfully!");
                window.location.href ="paytm_payment.php?email=<?php echo $email; ?>&amount=<?php echo $amount;?>&plan=<?php echo $plan;?> &plan_duration=<?php echo $plan_duration;?>&expiry_date=<?php echo $expiry_date;?> &name=<?php echo $name;?>&phone=<?php echo $phone;?> &adate=<?php echo $A_Date;?>";
            </script>
            <?php
        }

        pg_close($conn);
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Our Gym</title>
    <link rel="stylesheet" href="index.css">
    <script>
        function confirmSubmission(event) {
            event.preventDefault(); // Prevent default form submission

            var confirmation = confirm("Are you sure you want to submit this form and proceed to payment/?");
            
            if (confirmation) {
                // If user confirms, add hidden input and submit form
                let hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "confirm_submission";
                hiddenInput.value = "1";
                document.getElementById("gym-admission-form").appendChild(hiddenInput);
                document.getElementById("gym-admission-form").submit();
            } else {
                // Reset the form if the user cancels
                document.getElementById("gym-admission-form").reset();
            }
        }
    </script>
</head>
<body>
    <section class="admission-form">
        <h2>JOIN OUR GYM</h2>
        <p><b>Sign up today and take the first step toward achieving your fitness goals.</b></p>
        
        <?php $selected_plan = isset($_GET['plan']) ? $_GET['plan'] : ''; ?>
        
        <form id="gym-admission-form" action="admission.php" method="POST" onsubmit="confirmSubmission(event)">
            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="name" placeholder="Enter your full name" required />
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required />
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="number" placeholder="Enter your phone number" required />
            </div>
            <div class="form-group">
                <label for="Bdate">Birth Date</label>
                <input type="date" id="Bdate" name="Bdate" required />
            </div>
            <div class="form-group">
                <label for="Adate">Admission Date</label>
                <input type="date" id="Adate" name="Adate" required />
            </div>
            <div class="form-group">
                <label for="password">Create Password for member login</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required />
            </div>
            <div class="form-group">
                <label for="plan-duration">Plan-Duration</label>
                <select id="plan-duration" name="plan-d" required>
                    <option value="">Choose the duration</option>
                    <option value="one-month">One Month</option>
                    <option value="three-month">Three Month</option>
                    <option value="six-month">Six Month</option>
                    <option value="one-year">One Year</option>
                </select>
            </div>
            <div class="form-group">
                <label for="plan">Choose a Plan</label>
                <select id="plan" name="plan" required>
                    <option value="" <?= $selected_plan == '' ? 'selected' : ''; ?>>Select a plan</option>
                    <option value="basic" <?= $selected_plan == 'basic' ? 'selected' : ''; ?>>Basic Plan</option>
                    <option value="premium" <?= $selected_plan == 'premium' ? 'selected' : ''; ?>>Premium Plan</option>
                    <option value="vip" <?= $selected_plan == 'vip' ? 'selected' : ''; ?>>VIP Plan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message (Optional)</label>
                <textarea id="message" name="message" rows="4" placeholder="Any specific goals or preferences?"></textarea>
            </div>
            <div class="form-group">
                <label><h3><u>PHYSICAL INFORMATION</u></h3></label>
                <br>
                <br>
                <label><h4>Weight:kg</h4></label>
                <input type="number" id="weight" name="weight" required placeholder="Enter your weight">
                <label><h4>Height:cm</h4></label>
                <input type="number" id="height" name="height" required placeholder="Enter your height">
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <label for="male">
                    <input type="radio" id="male" name="gender" value="male"> Male
                </label>
                <label for="female">
                    <input type="radio" id="female" name="gender" value="female"> Female
                </label>
                <label for="other">
                    <input type="radio" id="other" name="gender" value="other"> Other
                </label>
            </div>
            <div class="form-group">
                <label>Do you have any kind of illness?</label>
                <select id="illness" name="illness" required>
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                </select>    
            </div>
            <button type="submit" class="submit-button" name="btn">Submit</button>
            <button type="button" class="Back"><a href="index.html">Back</a></button>
        </form>
    </section>
</body>
</html>

