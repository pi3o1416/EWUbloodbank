<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['center_id'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $center_id = $_POST['center_id'];
        $bag_id = $_GET['bagid'];
        $sql = "UPDATE inventory SET center_id = '$center_id' WHERE bag_id = '$bag_id'";
        if($connection->query($sql) == TRUE){
            $_SESSION['success'] = "successfuly move to new location";
        }
        else{
            die('database connection error' . $connection->error);
        }
        $connection->close();
    }
    header('location: http://localhost/EWUbloodbank/admin/inventory/');
    die();
}

 