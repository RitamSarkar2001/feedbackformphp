<?php
$insert = false;
if (isset($_POST['name'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `ustrip`.`ustrip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if ($con->query($sql) == true) {
        if (empty($_POST['name'])) {
            echo '<script>alert("Please enter a valid name")</script>';
        } elseif (empty($_POST['gender'])) {
            echo '<script>alert("Please enter a valid gender")</script>';
        } elseif (empty($_POST['age'])) {
            echo '<script>alert("Please enter a valid age")</script>';
        } elseif (empty($_POST['email'])) {
            echo '<script>alert("Please enter a valid email")</script>';
        } elseif (empty($_POST['phone'])) {
            echo '<script>alert("Please enter a valid number")</script>';
        } elseif (empty($_POST['desc'])) {
            echo '<script>alert("Please give your feedback")</script>';
        } else {
            $insert = true;
        }
    } else {
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <img class="bg" src="puns.jpg" alt="Rthad">
    <div class="container">
        <h1>Your feedback is our topmost priority</h3>
            <p>Kindly give us your feedback to help us grow more</p>
            <?php

            if ($insert == true) {
                echo "<p class='submitMsg'>Thanks for the feedback!!We will be back to you as soon as possible</p>";
            }
            ?>
            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="age" id="age" placeholder="Enter your Age">
                <input type="text" name="gender" id="gender" placeholder="Enter your gender">
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your feedback here"></textarea>
                <button class="btn">Submit</button>
            </form>
    </div>
    <script src="index.js"></script>

</body>

</html>