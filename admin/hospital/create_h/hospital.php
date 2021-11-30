<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['addr']) || empty($_POST['phn'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $addr = $_POST['addr'];
        $phn = $_POST['phn'];
        $sql = "INSERT INTO `hospital` (`h_id`, `h_name`, `address`, `h_email`, `h_phn` , `status`) 
                VALUES (UUID(), '$name', '$addr', '$email', '$phn' , 'running');";
        if($connection->query($sql) == TRUE){
            $_SESSION['success'] = "successfull add hospital $name";
        } else{
            die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
        }
        $connection->close();
    }
    header('location: http://localhost/EWUbloodbank/admin/hospital/create_h/');
    die();
}

 