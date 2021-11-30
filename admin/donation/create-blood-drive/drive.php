<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['drive_name']) || empty($_POST['center_name']) || empty($_POST['date']) || empty($_POST['address'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $drive_name = $_POST['drive_name'];
        $center_id = $_POST['center_name'];
        $address = $_POST['address'];
        $date = $_POST['date'];
        $createby = 'admin';
        $mach = $connection->query("SELECT email FROM user WHERE email='$email'");
        $sql = "INSERT INTO blood_drive (bd_id, user_id , bd_name, bd_address, center_id, start_date, end_date)
                VALUES (UUID(), '$createby', '$drive_name', '$address', '$center_id', '$date', NULL)";
        if($connection->query($sql) == TRUE){
            $_SESSION['success'] = "successfull create Blood Drive $drive_name";
        } else{
            die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
        }
        $connection->close();
    }
    header('location: http://localhost/EWUbloodbank/admin/donation/create-blood-drive/');
    die();
}

 