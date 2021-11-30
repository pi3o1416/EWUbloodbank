<?php
session_start(); // Starting Session
$_SESSION['error'] = ''; // Variable To Store Error Message

$connection = new mysqli("localhost", "root", "", "EWUbloodbank");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$id = $_GET['id'];
$status = $_GET['status'];
$center = $_GET['center'];
$blood = $_GET['blood'];
$h_id = $_GET['h_id'];
$rh = ($_GET['rh'] == 'plus' ? '+' : '-');
if ($status == '.approved') {
    $result = $connection->query("  SELECT MAX(d_date) , bag_id 
                                    FROM inventory , donation , donatio_result 
                                    WHERE inventory.donation_id = donation.d_id and 
                                        inventory.donation_id = donatio_result.donation_id and 
                                        donatio_result.blood_group = '$blood' and 
                                        donatio_result.rh = '$rh'");
    if ($result->num_rows > 0) {
        echo $blood . $rh;
        $sql = "UPDATE `hosp_bloodreq` SET `req_status` = 'approved' WHERE `hosp_bloodreq`.`req_id` = '$id';";
        $sql2 = "INSERT INTO withdrow VALUES(UUID() ,'$id' , '$h_id' , (SELECT donation_id
                                                                FROM (
                                                                SELECT MAX(d_date) , bag_id , donation.d_id as donation_id
                                                                FROM inventory , donation , donatio_result 
                                                                WHERE inventory.donation_id = donation.d_id and 
                                                                    inventory.donation_id = donatio_result.donation_id and 
                                                                    donatio_result.blood_group = '$blood' and 
                                                                    donatio_result.rh = '$rh') AS T1) 
                                            , (SELECT bag_id
                                              FROM (
                                                                SELECT MAX(d_date) , bag_id , donation.d_id as donation_id
                                                                FROM inventory , donation , donatio_result 
                                                                WHERE inventory.donation_id = donation.d_id and 
                                                                    inventory.donation_id = donatio_result.donation_id and 
                                                                    donatio_result.blood_group = '$blood' and 
                                                                    donatio_result.rh = '$rh') AS T1) , CURRENT_DATE() , '$center');";                  
        $sql1 = "DELETE FROM inventory 
                 WHERE bag_id IN (
                    SELECT bag_id 
                    FROM (
                        SELECT MAX(d_date) , bag_id 
                        FROM inventory , donation , donatio_result 
                        WHERE inventory.donation_id = donation.d_id and 
                                inventory.donation_id = donatio_result.donation_id and 
                                donatio_result.blood_group = '$blood' and 
                                donatio_result.rh = '$rh') AS T1);";
        if ($connection->query($sql2) == true && $connection->query($sql) == true &&  $connection->query($sql1) == true) {
            $_SESSION['success'] = "successfuly complete the operation";
        } else {
            die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
        }
    } else {
        $_SESSION['error'] = 'No blood in Current inventory';
    }
} else {
    $sql = "UPDATE `hosp_bloodreq` SET `req_status` = 'rejected' WHERE `hosp_bloodreq`.`req_id` = '$id';";
    if ($connection->query($sql) == true) {
        $_SESSION['success'] = "successfuly complete the operation";
    } else {
        die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
    }
}


$connection->close();
header('location: http://localhost/EWUbloodbank/admin/request/blood-request/current-request/');
die();
