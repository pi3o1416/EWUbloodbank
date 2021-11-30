<!----login---->

<?php
session_start();
error_reporting(0); //       mute error
$connection = new mysqli("localhost", "root", "", "EWUbloodbank");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
if ($_SESSION['login']) {
    if ($_SESSION['role'] == 'superadmin' || $_SESSION['admin']) {
        header('location: http://localhost/EWUblooddonation/admin/');
    } else {
        header('location: http://localhost/EWUbloodbank/');
    }
}
 