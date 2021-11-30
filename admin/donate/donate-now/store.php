<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['center_id'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $email = $_POST['email'];
        $center_id = $_POST['center_id'];
        $status = 'pending';
        $mach = $connection->query("SELECT email , donor_id FROM donor1 WHERE email='$email'");
        if($mach->num_rows == 1){
            $row = $mach->fetch_assoc();
            $temp = $row['donor_id'];
            $sql = "INSERT INTO donation (d_id, donor_id , drive_id, status,  d_date)
                VALUES (UUID(), '$temp', '$center_id', '$status', CURRENT_DATE())";
            if($connection->query($sql) == TRUE){
                $_SESSION['success'] = "Successfull add donation";
            } else{
                die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
            }
        } else{
            $_SESSION['error'] = "Please become a donor first";
        }
        
        
        $connection->close();
    }
    header('location: http://localhost/EWUbloodbank/admin/donate/donate-now/');
    die();
}

 