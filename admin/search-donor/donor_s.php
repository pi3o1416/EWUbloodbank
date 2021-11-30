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

            padding-left: 17px;
            padding-right: 17px;
            margin-left: 17px;
            margin-right: 17px;
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
        </div>
        <br><br><br>

        <form name="create_account" action="http://localhost/EWUbloodbank/admin/search-donor/" class="needs-validated" method="post">

            <div class=row>
                <div class=" form-group col-sm-4">
                    <label for="email"><strong>Email</strong></label>
                    <input type="email" class="form-control" id="email" placeholder="Efti@gmail.com" name="email">
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Please fill out this field</div>
                </div>
            </div>

            <div class="row">
                <div class=" form-group col">
                    <h6><b>Blood Group*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio" name="blood" value="A">
                        <label class="custom-control-label" for="customRadio">A</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio2" name="blood" value="B">
                        <label class="custom-control-label" for="customRadio2">B</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio3" name="blood" value="O">
                        <label class="custom-control-label" for="customRadio3">O</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio4" name="blood" value="AB">
                        <label class="custom-control-label" for="customRadio4">AB</label>
                    </div>
                </div>

                <div class=" form-group col">
                    <h6><b>Type RH*</b></h6>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="custom" name="rh" value="+">
                        <label class="custom-control-label" for="custom">Positive</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="custom1" name="rh" value="-">
                        <label class="custom-control-label" for="custom1">Negative</label>
                    </div>
                </div>

                <div class=" form-group">
                    <label for="address"><strong>Address*</strong></label>
                    <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Please fill out this field</div>
                </div>
            </div>

            <button name="submit" type="submit" class="btn btn-primary">Search</button>

            <?php
            if ($_SESSION['error']) {
                echo "<h6 class ='text-danger'> " . $_SESSION['error'] . "</h6>";
                $_SESSION['error'] = "";
            }
            ?>
        </form>
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Blood Group</th>
                        <th>Last Donation</th>
                        <th>DATE OF BIRTH</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    $sql = "";
                    $email = $_POST['email'];
                    $blood = $_POST['blood'];
                    $rh = $_POST['rh'];
                    $address = $_POST['address'];
                    if(empty($_POST['email']) && empty($_POST['blood']) && empty($_POST['rh']) && empty($_POST['address'])){
                        $sql = "SELECT * 
                                FROM (
                                    SELECT donor1.donor_id , max(d_Date) AS last_date 
                                    FROM donor1 NATURAL join donation 
                                    GROUP BY donor1.donor_id) AS T1 , donor1 , user 
                                WHERE donor1.donor_id = T1.donor_id and donor1.email = user.email ";
                    } else if(!empty($_POST['email'])){
                        
                        $sql = "SELECT * 
                                FROM (
                                    SELECT donor1.donor_id , max(d_Date) AS last_date 
                                    FROM donor1 NATURAL join donation 
                                    GROUP BY donor1.donor_id) AS T1 , donor1 , user 
                                WHERE donor1.donor_id = T1.donor_id and donor1.email = user.email and donor1.email = '$email'";
                    } else if(!empty($_POST['blood']) && !empty($_POST['rh'])){
                        $email = $_POST['email'];
                        $sql = "SELECT * 
                                FROM (
                                    SELECT donor1.donor_id , max(d_Date) AS last_date 
                                    FROM donor1 NATURAL join donation 
                                    GROUP BY donor1.donor_id) AS T1 , donor1 , user 
                                WHERE donor1.donor_id = T1.donor_id and donor1.email = user.email and donor1.blood_g = '$blood' and  donor1.rh = '$rh'";
                    } else if(!empty($_POST['blood']) && !empty($_POST['rh']) && !empty($_POST['address'])){
                        $email = $_POST['email'];
                        $sql = "SELECT * 
                                FROM (
                                    SELECT donor1.donor_id , max(d_Date) AS last_date 
                                    FROM donor1 NATURAL join donation 
                                    GROUP BY donor1.donor_id) AS T1 , donor1 , user 
                                WHERE donor1.donor_id = T1.donor_id and donor1.email = user.email and blood_g = '$blood' and rh = '$rh'  and city = '$address'";
                    } else if(!empty($_POST['address'])){
                        $email = $_POST['email'];
                        $sql = "SELECT * 
                                FROM (
                                    SELECT donor1.donor_id , max(d_Date) AS last_date 
                                    FROM donor1 NATURAL join donation 
                                    GROUP BY donor1.donor_id) AS T1 , donor1 , user 
                                WHERE donor1.donor_id = T1.donor_id and donor1.email = user.email and city = '$address'";
                    } 

                    $result = $connection->query($sql);
                    if ($result == true) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row['fname'] ." " .$row['lname']. "</td>
                                        <td>" . $row['city'] . " </td>
                                        <td>" . $row['email'] . "</td>
                                        <td>" . $row['gender'] . "</td>
                                        <td>" . $row['blood_g'] ."".$row['rh']. "</td>
                                        <td>" . $row['last_date'] . "</td>
                                        <td>" . $row['d_of_b']. "</td>";
                                echo   "<td><a href='#'>edit</a></td>
                                    </tr>";
                            }
                        } else {
                            echo "NO PENDING RESULT";
                        }
                    } else {
                        die("error with database connection" . $connection->error);
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br><br><br>

    </div>
    </div>


</body>

</html> 