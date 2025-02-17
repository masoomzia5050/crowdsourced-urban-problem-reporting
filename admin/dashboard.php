<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
    header('location:index.php');
}
else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Complaint Management System || Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <!-- Font Awesome for Icons -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">-->
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .widget-primary-card {
            background-color: #007bff;
            color: white;
        }
        .widget-warning-card {
            background-color: #ffc107;
            color: white;
        }
        .widget-success-card {
            background-color: #28a745;
            color: white;
        }
        .widget-danger-card {
            background-color: #dc3545;
            color: white;
        }
        .widget-purple-card {
            background-color: #6f42c1;
            color: white;
        }
    </style>
</head>
<body>
    <?php include('include/sidebar.php');?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php include('include/header.php');?>
    <!-- [ Header ] end -->
    
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Dashboard Analytics</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-12 col-xl-4">
                    <!-- widget-primary-card start -->
                    <div class="card flat-card widget-primary-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="feather icon-users"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php $query1 = mysqli_query($con, "select id from users");
                                $totusers = mysqli_num_rows($query1);
                                ?>
                                <h4><?php echo $totusers;?></h4>
                                <a href="manage-users.php" style="color: white;"><h6>Total Users</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget-primary-card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- widget-warning-card start -->
                    <div class="card flat-card widget-warning-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-list-alt"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php $query2 = mysqli_query($con, "select id from category");
                                $totcategory = mysqli_num_rows($query2);
                                ?>
                                <h4><?php echo $totcategory;?></h4>
                                <a href="category.php" style="color: white;"><h6>Total Category</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget-warning-card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- widget-success-card start -->
                    <div class="card flat-card widget-success-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-list"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php $query3 = mysqli_query($con, "select id from subcategory");
                                $totsubcategory = mysqli_num_rows($query3);
                                ?>
                                <h4><?php echo $totsubcategory;?></h4>
                                <a href="subcategory.php" style="color: white;"><h6>Total Subcategory</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget-success-card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- widget-danger-card start -->
                    <div class="card flat-card widget-danger-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-city"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php $query4 = mysqli_query($con, "select id from city");
                                $totcity = mysqli_num_rows($query4);
                                ?>
                                <h4><?php echo $totcity;?></h4>
                                <a href="add-city.php" style="color: white;"><h6>Total Cities</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget-danger-card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- widget-purple-card start -->
                    <div class="card flat-card widget-purple-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php $query5 = mysqli_query($con, "select id from state");
                                $totstate = mysqli_num_rows($query5);
                                ?>
                                <h4><?php echo $totstate;?></h4>
                                <a href="state.php" style="color: white;"><h6>Total States</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget-purple-card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- widget-primary-card start -->
                    <div class="card flat-card widget-primary-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php $query6 = mysqli_query($con, "select complaintNumber from tblcomplaints");
                                $totcom = mysqli_num_rows($query6);
                                ?>
                                <h4><?php echo $totcom;?></h4>
                                <a href="all-complaint.php" style="color: white;"><h6>Total Complaints</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget-primary-card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- widget-warning-card start -->
                    <div class="card flat-card widget-warning-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php $query7 = mysqli_query($con, "select complaintNumber from tblcomplaints where status is null");
                                $newcom = mysqli_num_rows($query7);
                                ?>
                                <h4><?php echo $newcom;?></h4>
                                <a href="notprocess-complaint.php" style="color: white;"><h6>Pending Complaints</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget-warning-card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- widget-success-card start -->
                    <div class="card flat-card widget-success-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-spinner"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php $query8 = mysqli_query($con, "select complaintNumber from tblcomplaints where status='in process'");
                                $inprocesscom = mysqli_num_rows($query8);
                                ?>
                                <h4><?php echo $inprocesscom;?></h4>
                                <a href="inprocess-complaint.php" style="color: white;"><h6>Inprocess Complaints</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget-success-card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- widget-danger-card start -->
                    <div class="card flat-card widget-danger-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php $query9 = mysqli_query($con, "select complaintNumber from tblcomplaints where status='closed'");
                                $closedcom = mysqli_num_rows($query9);
                                ?>
                                <h4><?php echo $closedcom;?></h4>
                                <a href="closed-complaint.php" style="color: white;"><h6>Closed Complaints</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget-danger-card end -->
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
</body>
</html>
<?php } ?>