<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id'])==0)
	{	
header('location:index.php');
}
else{
	?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Complaint Management System || Dashboard</title>
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom CSS for the modal */
        .modal-image {
            width: 100%;
            height: auto;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .modal-image:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="">
    <!-- [ Pre-loader ] start -->
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
                <div class="col-md-12 col-xl-6">
                    <!-- widget-success-card start -->
                    <div class="card flat-card widget-primary-card">
                        <div class="row-table">
                            <div class="col-sm-4 card-body">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php 
                                $uid=$_SESSION['id'];
                                $query5=mysqli_query($con,"select complaintNumber from tblcomplaints where userId='$uid'");
                                $totcom=mysqli_num_rows($query5);
                                ?>
                                <h4><?php echo $totcom;?></h4>
                                <h6>Total Complaints</h6>
                            </div>
                        </div>
                    </div>
                    <!-- widget-success-card end -->
                </div>
                <div class="col-md-12 col-xl-6">
                    <!-- widget-success-card start -->
                    <div class="card flat-card widget-primary-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php 
                                $query5=mysqli_query($con,"select complaintNumber from tblcomplaints where userId='$uid' and status is null");
                                $newcom=mysqli_num_rows($query5);
                                ?>
                                <h4><?php echo $newcom;?></h4>
                                <h6>Pending Complaints</h6>
                            </div>
                        </div>
                    </div>
                    <!-- widget-success-card end -->
                </div>
                <div class="col-md-12 col-xl-6">
                    <!-- widget-success-card start -->
                    <div class="card flat-card widget-primary-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php 
                                $query5=mysqli_query($con,"select complaintNumber from tblcomplaints where userId='$uid' and status='in process'");
                                $inprocesscom=mysqli_num_rows($query5);
                                ?>
                                <h4><?php echo $inprocesscom;?></h4>
                                <h6>Inprocess Complaints</h6>
                            </div>
                        </div>
                    </div>
                    <!-- widget-success-card end -->
                </div>
                <div class="col-md-12 col-xl-6">
                    <!-- widget-success-card start -->
                    <div class="card flat-card widget-primary-card">
                        <div class="row-table">
                            <div class="col-sm-3 card-body">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="col-sm-9">
                                <?php 
                                $query5=mysqli_query($con,"select complaintNumber from tblcomplaints where userId='$uid' and status='closed'");
                                $closedcom=mysqli_num_rows($query5);
                                ?>
                                <h4><?php echo $closedcom;?></h4>
                                <h6>Closed Complaints</h6>
                            </div>
                        </div>
                    </div>
                    <!-- widget-success-card end -->
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- Bootstrap Modal for Complaint Category Selection -->
    <div class="modal fade" id="complaintCategoryModal" tabindex="-1" aria-labelledby="complaintCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="complaintCategoryModalLabel">Select Complaint Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="userimages\potholes.jpg" class="modal-image" alt="Potholes" onclick="redirectToComplaint('potholes')">
                            <p><b>Potholes</b></p>
                        </div>
                        <div class="col-md-4">
                            <img src="userimages\street.jpeg" class="modal-image" alt="Street Lights" onclick="redirectToComplaint('street')">
                            <p><b>Street Lights</b></p>
                        </div>
                        <div class="col-md-4">
                            <img src="userimages\waste-management.jpg" class="modal-image" alt="Waste Management" onclick="redirectToComplaint('waste-management')">
                            <p><b>Waste Management</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Scripts -->
    <script src="../admin/assets/js/vendor-all.min.js"></script>
    <script src="../admin/assets/js/plugins/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to redirect to the lodge complaint page with the selected category
        function redirectToComplaint(category) {
            window.location.href = `register-complaint.php?category=${category}`;
        }

        // Automatically show the modal when the page loads
        $(document).ready(function() {
            $('#complaintCategoryModal').modal('show');
        });
    </script>
</body>

</html>
<?php } ?>