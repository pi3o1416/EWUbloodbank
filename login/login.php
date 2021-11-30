<?php
session_start(); // Starting Session
error_reporting(0)
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['uemail']) || empty($_POST['upswd'])) {
        $error = "Username or Password is invalid";
        fwrite(fopen("error", "w"), $error);
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $email = $_POST['uemail'];
        $password = $_POST['upswd'];
        $email = stripslashes($email);
        $password = stripslashes($password);
        $result = $connection->query("select * from user where password='$password' AND email='$email'");
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['role'] = $row['role'];
            if ($_SESSION['role'] == 'superadmin' || $_SESSION['role'] == 'admin') {
                header('location: http://localhost/EWUbloodbank/admin/');
            } else {
                header('location: http://localhost/EWUbloodbank/');
            }
           
        } else {
            $error = "Username or Password is invalid";
            fwrite(fopen("error", "w"), $error);
            header("location: http://localhost/EWUbloodbank/login/");
        }
        $connection->close();
        die();
    }
}
 