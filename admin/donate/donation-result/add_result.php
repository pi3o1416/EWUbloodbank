<!---admin page-->
<?php
require 'admin_session.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood donation-Home</title>
    <link rel="stylesheet" href="http://localhost/EWUbloodbank/bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="http://localhost/EWUbloodbank/jquary/jquery.min.js"></script>
    <script src="http://localhost/EWUbloodbank/jquary/popper.min.js"></script>
    <script src="http://localhost/EWUbloodbank/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <style>
        .user-container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: 0px;
            margin-left: 0px;
        }

        .navbar-nav>li {

            padding-left: 16px;
            padding-right: 16px;
            margin-left: 16px;
            margin-right: 16px;
        }

        .dropdown-menu {
            width: 400px !important;
            height: auto !important;
        }
    </style>
</head>

<body>

    <header>
        <div class="container-fluid ifty bg-light">
            <div class="row">
                <div class="col-sm-10">
                    <a class="navbar-brand" href="http://localhost/EWUbloodbank/">
                        <img src="http://localhost/EWUbloodbank/blood2.jpg" alt="logo">
                        <span class="text-dark" style="vertical-align: bottom; font-size:250%"><strong>EWU</strong><small class="text-warning">bloodbank</small></span>
                    </a>

                </div>
                <div class="col-sm-2 text-right" style="height:70px">
                    <br>
                    <button type="button" class="btn btn-outline-primary btn-sx">
                        <a class="text-dark" href="http://localhost/EWUbloodbank/logout.php"><b>Log Out</b></a>
                    </button>
                </div>
            </div>

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="height:50px">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost/EWUbloodbank/admin/"><b>Admin-Home</b> </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><b>User</b></a>
                        <div class="dropdown-menu bg-light">
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/create-user/">Create User</a>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/create-donor/">Create Donor</a>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/search-donor/">Search Donor</a>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/search-user/">Search User</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><b>Donation</b> </a>
                        <div class="dropdown-menu bg-light">
                            <h6 class="dropdown-header">Donation center</h6>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/donation/create-donation-center/">Create a Donation Center</a>
                            <a class="dropdown-item" href="#">View Donation Center</a>
                            <a class="dropdown-item" href="#">Delete Donation Center</a>
                            <a class="dropdown-item" href="#"></a>
                            <h6 class="dropdown-header">Blood Drive</h6>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/donation/create-blood-drive/">Create Blood Drive</a>
                            <a class="dropdown-item" href="#">On going Blood Drive</a>
                            <a class="dropdown-item" href="#">Future Blood Drive</a>
                            <a class="dropdown-item" href="#">Preveous Blood Drive</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><b>Request</b> </a>
                        <div class="dropdown-menu bg-light">
                            <h6 class="dropdown-header">Request for Blood</h6>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/request/blood-request/">Create Request</a>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/request/blood-request/current-request/">Current Request</a>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/request/blood-request/preveous-request/">Preveous Request</a>
                            <h6 class="dropdown-header">Other</h6>
                            <a class="dropdown-item" href="#">Blood Drive Request</a>
                            <a class="dropdown-item" href="#">Blog Request</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><b>Hospital</b> </a>
                        <div class="dropdown-menu bg-light">
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/hospital/create_h/">Add a Hospital</a>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/hospital/view_h/">View Hospital</a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><b>Donation</b> </a>
                        <div class="dropdown-menu bg-light">
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/donate/donate-now/">Donate Now</a>
                            <a class="dropdown-item" href="http://localhost/EWUbloodbank/admin/donate/donation-result/">Donation Result</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/EWUbloodbank/admin/inventory/"><b>Inventory</b> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>Blog/News</b> </a>
                    </li>

                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="text-info">
            <?php
            echo '<br><strong>PATH</strong>';
            $link = $_SERVER['REQUEST_URI'];
            $links = explode("/", $link);
            foreach ($links as $item) {
                if (strlen($item) > 0) {
                    echo ' -> <strong>' . $item . "</strong>";
                }
            }
            ?>
            <br><br>
            <h3 class="text-dark"><strong>Add Donation Result</strong></h3>
            <h5 class="text-secondary">Complete the form below</h5>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-sm-6">
                <?php
                $link = "http://localhost/EWUbloodbank/admin/donate/donation-result/add_database.php?id=" . $_GET['id'];

                echo "<form name='create_account' action='$link' class='needs-validated' method='post'>";
                ?>
                <div class=" form-group">
                    <label for="hospital"><strong>Hospital*</strong></label>
                    <select class="form-control" id="hospital" name="hospital" required>
                        <?php
                        $sql = "SELECT h_id , h_name  from hospital";
                        $result = $connection->query($sql);
                        if ($result == false) {
                            die("SOMETHING WRONG WITH DATABASE CONNECTION " . $connection->error);
                        } else {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['h_id'] . "'>" . $row['h_name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Please fill out this field</div>
                </div>

                <div class="form-group">
                    <label><strong>Result Date*</strong></label>
                    <input class="form-control" type="date" max="3000-12-31" min="1000-01-01" name="date" required>
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Please fill out this field</div>
                </div>

                <div class=" form-group">
                    <h6><b>Blood Group*</b></h6>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadio" name="blood" value="A">
                        <label class="custom-control-label" for="customRadio">A</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadio2" name="blood" value="B">
                        <label class="custom-control-label" for="customRadio2">B</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadio3" name="blood" value="O">
                        <label class="custom-control-label" for="customRadio3">O</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadio4" name="blood" value="AB">
                        <label class="custom-control-label" for="customRadio4">AB</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>Type RH*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="custom" name="rh" value="+">
                        <label class="custom-control-label" for="custom">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="custom1" name="rh" value="-">
                        <label class="custom-control-label" for="custom1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>sysphilis*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="sysphilis" name="sys" value='yes'>
                        <label class="custom-control-label" for="sysphilis">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="sysphilis1" name="sys" value='no'>
                        <label class="custom-control-label" for="sysphilis1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>hepatitis B*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="hepatitis_B_virus" name="hep_b" value='yes'>
                        <label class="custom-control-label" for="hepatitis_B_virus">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="hepatitis_B_virus1" name="hep_b" value='no'>
                        <label class="custom-control-label" for="hepatitis_B_virus1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>human immunodeficiency virus*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="human_immu" name="immu" value='yes'>
                        <label class="custom-control-label" for="human_immu">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="human_immu1" name="immu" value='no'>
                        <label class="custom-control-label" for="human_immu1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>hepatitis C*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="hepatitis_C_virus" name="hep_c" value='yes'>
                        <label class="custom-control-label" for="hepatitis_C_virus">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="hepatitis_C_virus1" name="hep_c" value='no'>
                        <label class="custom-control-label" for="hepatitis_C_virus1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>t cruzi*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="t_cruzi" name="t_cruzi" value='yes'>
                        <label class="custom-control-label" for="t_cruzi">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="t_cruzi1" name="t_cruzi" value='no'>
                        <label class="custom-control-label" for="t_cruzi1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>malaria*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="malaria" name="mal" value='yes'>
                        <label class="custom-control-label" for="malaria">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="malaria1" name="mal" value='no'>
                        <label class="custom-control-label" for="malaria1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>human T lymphotropic virus*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="T_lympho" name="t_lympho" value='yes'>
                        <label class="custom-control-label" for="T_lympho">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="T_lympho1" name="t_lympho" value='no'>
                        <label class="custom-control-label" for="T_lympho1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>west mile virus*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="west" name="west" value='yes'>
                        <label class="custom-control-label" for="west">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="west1" name="west" value='no'>
                        <label class="custom-control-label" for="west1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>cytomegalo virus*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="cyto" name="cyto" value='yes'>
                        <label class="custom-control-label" for="cyto">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="cyto1" name="cyto" value='no'>
                        <label class="custom-control-label" for="cyto1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <h6><b>hepatitis E virus*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline col-sm-5">
                        <input type="radio" class="custom-control-input" id="hep_e" name="hep_e" value='yes'>
                        <label class="custom-control-label" for="hep_e">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="hep_e1" name="hep_e" value='no'>
                        <label class="custom-control-label" for="hep_e1">Negative</label>
                    </div>
                </div>


                <button name="submit" type="submit" class="btn btn-primary">Add Result</button>

                <?php
                        if ($_SESSION['error']) {
                            echo "<h6 class ='text-danger'> " . $_SESSION['error'] . "</h6>";
                            $_SESSION['error'] = "";
                        }
                        ?>
                </form>
                <br><br><br>
            </div>
        </div>

    </div>


</body>

</html>