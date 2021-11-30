<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['h_name']) || empty($_POST['address']) || empty($_POST['h_email']) || empty($_POST['h_phn'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $h_name = $_POST['h_name'];
        $address = $_POST['address'];
        $h_email = $_POST['h_email'];
        $h_phn = $_POST['h_phn'];
        $id = $_GET['id'];
        $result = $connection->query("SELECT * FROM hospital WHERE h_id = '$id'");
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['h_name'] != $h_name) {
                $connection->query("UPDATE hospital SET h_name = '$h_name' WHERE h_id = '$id'");
            }
            if ($row['address'] != $address) {
                $connection->query("UPDATE hospital SET address = '$address' WHERE h_id = '$id'");
            }
            if ($row['h_email'] != $h_email) {
                $connection->query("UPDATE hospital SET h_email = '$h_email' WHERE h_id = '$id'");
            }
            if ($row['h_phn'] != $h_phn) {
                $connection->query("UPDATE hospital SET h_phn = '$h_phn' WHERE h_id = '$id'");
            }
        }

        $connection->close();
    }
    header('location: http://localhost/EWUbloodbank/admin/hospital/view_h/');
    die();
}
