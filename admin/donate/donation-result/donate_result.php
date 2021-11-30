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
        </div>
        <br><br>
        <h3><strong>Donation results on pending</strong></h3>
        <div class="container mt-3">
            <h2>All Pending Donation</h2>
            <p>Type donation id in the search box to filtered out the expected result:</p>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
            <?php
            if ($_SESSION['success']) {
                echo "<h6 class ='text-success'><strong>Congratulation!!!</strong> " . $_SESSION['success'] . "</h6>";
                $_SESSION['success'] = "";
            }
            if ($_SESSION['error']) {
                echo "<h6 class ='text-danger'> " . $_SESSION['error'] . "</h6>";
                $_SESSION['error'] = "";
            }
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>Donor</th>
                        <th>Donation Center</th>
                        <th>Date</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    $sql = "SELECT donation.d_id , donation.d_date , donation.status , donation_center , fname , lname
                        from donation , (SELECT d_id , bd_name as donation_center FROM donation , blood_drive WHERE donation.drive_id = blood_drive.bd_id) as center , 
                                        (SELECT d_id , fname , lname FROM donation , donor1 , user WHERE donation.donor_id = donor1.donor_id and donor1.email = user.email) as donor
                        WHERE donation.d_id = center.d_id and donation.d_id = donor.d_id and donation.status = 'pending';";
                    $result = $connection->query($sql);
                    if ($result == true) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row['d_id'] . "</td>
                                        <td>" . $row['fname'] . " " . $row['lname'] . "</td>
                                        <td>" . $row['donation_center'] . "</td>
                                        <td>" . $row['d_date'] . "</td>";
                                if ($row['status'] == 0) {
                                    $id = $row['d_id'];
                                    $link = "http://localhost/EWUbloodbank/admin/donate/donation-result/add_result.php?id=" . $id;
                                    echo "<td><a class = 'text-dark' href='$link'>Pending</a></td>";
                                } else {
                                    echo "<td>Published</td>";
                                }
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
        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </div>


</body>

</html>