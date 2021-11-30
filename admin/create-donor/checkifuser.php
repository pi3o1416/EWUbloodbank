<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['pswd']) || empty($_POST['blood']) || empty($_POST['rh']) || empty($_POST['gender'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $email = $_POST['email'];
        $pass = $_POST['pswd'];
        $blood_g = $_POST['blood'];
        $rh = $_POST['rh'];
        $gender = $_POST['gender'];
        $role = 'donor';
        $mach = $connection->query("SELECT email FROM user WHERE email='$email' and password = '$pass'");
        if($mach->num_rows == 0){
            $_SESSION['error'] = 'email or password is incorrect';
        }
        else{
            $sql = "INSERT INTO donor1 (donor_id, email, gender, blood_g, rh) VALUES (UUID(), '$email' , '$gender', '$blood_g', '$rh')";
            $sql2 = "UPDATE `user` SET `role` = '$role' WHERE `user`.`email` = '$email'";
            $a = $connection->query($sql);

            $b = $connection->query($sql2);
            if($a && $b){
                $_SESSION['success'] = "successfull create user $fname $lname";
            }
            else{
                die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
            }
        }
        $connection->close();
    }
    header('location: http://localhost/EWUbloodbank/admin/create-donor/');
    die();
}

 