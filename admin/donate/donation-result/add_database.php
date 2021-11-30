<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['hospital']) || empty($_POST['date']) || empty($_POST['blood']) || empty($_POST['rh']) || empty($_POST['sys']) || empty($_POST['hep_b']) || empty($_POST['immu']) || empty($_POST['hep_c']) || empty($_POST['t_cruzi']) || empty($_POST['mal']) || empty($_POST['t_lympho']) || empty($_POST['west']) || empty($_POST['cyto']) || empty($_POST['hep_e'])) {
        $_SESSION['error'] = "Please complete the form properly";
    } else {
        $connection = new mysqli("localhost", "root", "", "EWUbloodbank");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $id = $_GET['id'];
        $hosp = $_POST['hospital'];
        $date = $_POST['date'];
        $blood = $_POST['blood'];
        $rh = $_POST['rh'];
        $sys = $_POST['sys'];
        $immu = $_POST['immu'];
        $hep_b = $_POST['hep_b'];
        $hep_c = $_POST['hep_c'];
        $hep_e = $_POST['hep_e'];
        $west = $_POST['west'];
        $cyto = $_POST['cyto'];
        $tlympho = $_POST['t_lympho'];
        $mal = $_POST['mal'];
        $tcruzi = $_POST['t_cruzi'];
        $sql = "INSERT INTO `donatio_result` (`donation_id`, `hospital_id`, `result_date`, `blood_group`, `rh`, `sysphilis`, `hep_b`, `hep_c`, `hep_e`, `immu`, `t_cruzi`, `malaria`, `t_lympho`, `west`, `cytomegalo`) 
                VALUES ('$id', '$hosp', '$date', '$blood', '$rh', '$sys', '$hep_b', '$hep_c', '$hep_e', '$immu', '$tcruzi', '$mal', '$tlympho', '$west', '$cyto');";
        $sql1 = "UPDATE donation SET status = 'get' WHERE donation.d_id = '$id';";
        $sql2 = "INSERT INTO `inventory` (`bag_id`, `donation_id`, `center_id`) 
                VALUES ( UUID() , '$id', (SELECT donation_center.center_id 
                                        FROM donation , blood_drive, donation_center 
                                        WHERE donation.drive_id = blood_drive.bd_id and blood_drive.center_id = donation_center.center_id and donation.d_id = '$id'));";
        if($connection->query($sql1) == TRUE && $connection->query($sql) == TRUE){
            if($sys == 'no' && $immu == 'no' && $hep_b== 'no' && $hep_c == 'no' &&  $hep_e == 'no' && $west == 'no' && $cyto == 'no' && $tlympho == 'no' && $tcruzi =='no' && $mal == 'no'){
                if($connection->query($sql2) == TRUE){
                    $_SESSION['success'] = "Successfuly add donation result";
                }
                else{
                    die("database error : ". $connection->error);
                }
            }
            else{
                $_SESSION['error'] = "corrupted blood";
            }
        } else{
            die("database error : ". $connection->error);
        }

        $connection->close();
    }
    header('location:http://localhost/EWUbloodbank/admin/donate/donation-result/ ');
    die();
}
