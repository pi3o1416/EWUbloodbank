<!----admin---->

<?php

session_start();
error_reporting(0);
$connection = new mysqli("localhost", "root", "", "EWUbloodbank");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
if ($_SESSION['login']) {
    if ($_SESSION['role'] == 'donor' || $_SESSION['role'] == 'user') {
        header('location: http://localhost/EWUbloodbank/');
    }
} else {
    header('location: http://localhost/EWUbloodbank/login/');
}
