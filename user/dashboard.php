<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id'])==0)
{	
    header('location:index.php');
}
else {
    // Check if the pop-up has already been shown
    if(!isset($_SESSION['popup_shown'])) {
        $_SESSION['popup_shown'] = true;
        $showPopup = true;
    } else {
        $showPopup = false;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Complaint Management System || Dashboard</title>
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <!-- Font Awesome for Icons -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">-->
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f4f4;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card i {
            font-size: 2.5rem;
        }
        .navbar-brand strong {
            color: white;
        }
        .modal-image {
            width: 100%;
            height: auto;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .modal-image:hover {
            transform: scale(1.05);
        }
        .bg-primary {
            background: linear-gradient(45deg, #1d2b64 0%, #f8cdda 100%);
            color: white;
        }
        .bg-warning {
            background: linear-gradient(45deg, #f12711 0%, #f5af19 100%);
            color: white;
        }
        .bg-info {
            background: linear-gradient(45deg, #00c6ff 0%, #0072ff 100%);
            color: white;
        }
        .bg-success {
            background: linear-gradient(45deg, #56ab2f 0%, #a8e063 100%);
            color: white;
        }
        .page-header-title h5 {
            font-size: 1.75rem;
            color: #343a40;
        }
        .breadcrumb-item a {
            color: #007bff;
        }
        .breadcrumb-item.active {
            color: #6c757d;
        }
    </style>
</head>

<body>
    <!-- [ Pre-loader ] start -->
    <?php include('include/sidebar.php');?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php include('include/header.php');?>

    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard Analytics</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-white bg-primary mb-3" onclick="redirectToComplaintHistory('')">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fas fa-file"></i>
                                </div>
                                <div class="col-8">
                                    <?php 
                                    $uid = $_SESSION['id'];
                                    $query = mysqli_query($con, "select complaintNumber from tblcomplaints where userId='$uid'");
                                    $totalComplaints = mysqli_num_rows($query);
                                    ?>
                                    <h4><?php echo $totalComplaints; ?></h4>
                                    <h6>Total Complaints</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-warning mb-3" onclick="redirectToComplaintHistory('not processed')">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                                <div class="col-8">
                                    <?php 
                                    $query = mysqli_query($con, "select complaintNumber from tblcomplaints where userId='$uid' and status is null");
                                    $pendingComplaints = mysqli_num_rows($query);
                                    ?>
                                    <h4><?php echo $pendingComplaints; ?></h4>
                                    <h6>Pending Complaints</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-info mb-3" onclick="redirectToComplaintHistory('in process')">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fas fa-spinner"></i>
                                </div>
                                <div class="col-8">
                                    <?php 
                                    $query = mysqli_query($con, "select complaintNumber from tblcomplaints where userId='$uid' and status='in process'");
                                    $inProcessComplaints = mysqli_num_rows($query);
                                    ?>
                                    <h4><?php echo $inProcessComplaints; ?></h4>
                                    <h6>Inprocess Complaints</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-success mb-3" onclick="redirectToComplaintHistory('closed')">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="col-8">
                                    <?php 
                                    $query = mysqli_query($con, "select complaintNumber from tblcomplaints where userId='$uid' and status='closed'");
                                    $closedComplaints = mysqli_num_rows($query);
                                    ?>
                                    <h4><?php echo $closedComplaints; ?></h4>
                                    <h6>Closed Complaints</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>

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
                            <img src="userimages/potholes.jpg" class="modal-image" alt="Potholes" onclick="redirectToComplaint('potholes')">
                            <p><b>Potholes</b></p>
                        </div>
                        <div class="col-md-4">
                            <img src="userimages/street.jpeg" class="modal-image" alt="Street Lights" onclick="redirectToComplaint('street')">
                            <p><b>Street Lights</b></p>
                        </div>
                        <div class="col-md-4">
                            <img src="userimages/waste-management.jpg" class="modal-image" alt="Waste Management" onclick="redirectToComplaint('waste-management')">
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
    <script src="../admin/assets/js/pcoded.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>-->

    <script>
        function redirectToComplaint(category) {
            window.location.href = `register-complaint.php?category=${category}`;
        }
        function redirectToComplaintHistory(status) {
            window.location.href = `complaint-history.php?status=${status}`;
        }
        $(document).ready(function() {
            <?php if ($showPopup) { ?>
                $('#complaintCategoryModal').modal('show');
            <?php } ?>
        });
    </script>
</body>

</html>
<?php } ?>