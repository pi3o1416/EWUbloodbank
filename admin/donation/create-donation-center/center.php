<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['addr']) || empty($_POST['cap']) || empty($_POST['phn'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $name = $_POST['name'];
        $edit_name = str_replace(' ' , '' , $name);
        $email = $_POST['email'];
        $cap = $_POST['cap'];
        $addr = $_POST['addr'];
        $phn = $_POST['phn'];
        $sql = "INSERT INTO `donation_center` (`center_id`, `center_name`, `center_addr`, `center_cap`, `center_email`, `center_phn`)
                VALUES ( UUID(), '$name', '$addr', '$cap', '$email', '$phn');";
        if($connection->query($sql) == TRUE){
            $_SESSION['success'] = "successfull create center $name";
        } else{
            die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
        }      
        $sql2=  "INSERT INTO `blood_drive` (`bd_id`, `user_id` ,`bd_name`, `bd_address`, `center_id`, `start_date`, `end_date`)
                VALUES ( UUID(), NULL ,'$name', '$addr', (SELECT center_id from donation_center where center_name = '$name') , CURRENT_DATE() , NULL);";
        if($connection->query($sql2) == TRUE){
            $_SESSION['success'] = "successfull create center $name";
        } else{
            die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
        }
        $connection->close();
    }
    header('location: http://localhost/EWUbloodbank/admin/donation/create-donation-center/');
    die();
}


 