<?php
$_SESSION['error'] = "";
$_SESSION['eligible'] = FALSE;
if (isset($_POST['submit'])) {
    if (empty($_POST['gender']) || empty($_POST['weight']) || empty($_POST['height']) || empty($_POST['age']) || empty($_POST['health']) || empty($_POST['donate'])) {
        $_SESSION['error'] = "<h6 class='text-danger'>Please complete the form properly</h6> ";
    } else {
        if ($_POST['gender'] == 'male' && $_POST['health'] == 'yes' && $_POST['donate'] == 'yes') {
            if ($_POST['weight'] >= 130 || $_POST['age'] >= 17 || $_POST['height'] >= "5'1''") {
                $_SESSION['eligible'] = TRUE;
                header('location: http://localhost/EWUbloodbank/admin/donate/donate-now/donate.php');
            }
        } else if ($_POST['gender'] == 'female' && $_POST['health'] == 'yes' && $_POST['donate'] == 'yes') {
            if ($_POST['weight'] >= 150 || $_POST['age'] >= 19 || $_POST['height'] >= "5'5''") {
                $_SESSION['eligible'] = TRUE;
                header('location: http://localhost/EWUbloodbank/admin/donate/donate-now/donate.php');
            }
        } else {
            $_SESSION['error'] = "<h6 class='text-danger'><strong>Sorry!!!</strong> currently you are not eligible for blood donation</h6> ";
        }
    }
}
