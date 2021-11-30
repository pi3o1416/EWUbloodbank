<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['hos_name']) || empty($_POST['center_name']) || empty($_POST['amount']) || empty($_POST['blood']) || empty($_POST['rh']) || empty($_POST['text'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $sel = $_POST['hos_name'];
        $id = $_POST['center_name'];
        $amount = $_POST['amount'];
        $blood = $_POST['blood'];
        $rh = $_POST['rh'];
        $text = $_POST['text'];
        $status = "pending";
        $sql = "INSERT INTO `hosp_bloodreq` (`req_id`, `req_h_id`, `req_center`, `req_blood_g`, `req_rh`, `req_amount`, `req_msg`, `req_status`, `req_date`)
                VALUES (UUID() , '$sel', '$id', '$blood', '$rh', '$amount', '$text', '$status', CURRENT_DATE());";
        if($connection->query($sql) == TRUE){
            $_SESSION['success'] = "successfull add request from hospital";
        }
        else{
            die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
        }
        $connection->close();
    }
    header('location: http://localhost/EWUbloodbank/admin/request/blood-request/');
    die();
}

 