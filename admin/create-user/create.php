<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['pswd']) || empty($_POST['rpswd']) || empty($_POST['city']) || empty($_POST['date'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else if(strcasecmp($_POST['pswd'] , $_POST['rpswd']) != 0){
        $_SESSION['error'] = 'please type exact same password(case sensitive)';
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $email = $_POST['email'];
        $pass = $_POST['pswd'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $date = $_POST['date'];
        $city = $_POST['city'];
        $role = 'user';
        $mach = $connection->query("SELECT email FROM user WHERE email='$email'");
        if($mach->num_rows > 0){
            $_SESSION['error'] = 'The email address you have entered already exists in our system';
        }
        else{
            $sql = "INSERT INTO user (user_id, email, password, fname, lname, d_of_b, city, role) VALUES (UUID(), '$email', '$pass', '$fname', '$lname', '$date', '$city', '$role')";
            if($connection->query($sql) == TRUE){
                $_SESSION['success'] = "successfull create user $fname $lname";
            }
            else{
                die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
            }
        }
        $connection->close();
    }
    header('location: http://localhost/EWUbloodbank/admin/create-user/');
    die();
}

 