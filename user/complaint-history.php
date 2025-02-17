
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['id'])==0)
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

    // Fetch filter values
    $statusFilter = isset($_GET['status']) ? $_GET['status'] : '';
    $categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS || Complaint History</title>

    <!-- vendor css -->
    <link rel="stylesheet" href="../admin/assets/css/style.css">
     
    <script language="javascript" type="text/javascript">
    var popUpWin=0;
    function popUpWindow(URLStr, left, top, width, height)
    {
        if(popUpWin)
        {
            if(!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
    }
    </script>   

</head>
<body class="">
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
                                <h5 class="m-b-10">Complaint History</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="complaint-history.php">Complaint History</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ filter form ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Filter Complaints</h5>
                        </div>
                        <div class="card-body">
                            <form method="get" action="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">All</option>
                                                <option value="in process" <?php if($statusFilter == 'in process') echo 'selected'; ?>>In Process</option>
                                                <option value="closed" <?php if($statusFilter == 'closed') echo 'selected'; ?>>Closed</option>
                                                <option value="not processed" <?php if($statusFilter == 'not processed') echo 'selected'; ?>>Not Processed Yet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="">All</option>
                                                <?php 
                                                $categories=mysqli_query($con,"select id,categoryName from category");
                                                while ($row=mysqli_fetch_array($categories)) {
                                                    ?>
                                                    <option value="<?php echo htmlentities($row['id']);?>" <?php if($categoryFilter == $row['id']) echo 'selected'; ?>><?php echo htmlentities($row['categoryName']);?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-primary form-control">Apply Filters</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- [ filter form ] end -->

                <!-- [ complaint table ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>View Complaint History</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Complaint No</th>
                                                            <th>Complainant Name</th>
                                                            <th>Complaint Category</th>
                                                            <th>Reg Date</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $uid=$_SESSION['id'];
                                                        $queryStr = "select tblcomplaints.*,users.fullName as name, category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.userId='$uid'";
                                                        if($statusFilter) {
                                                            if($statusFilter == 'not processed') {
                                                                $queryStr .= " and tblcomplaints.status is null";
                                                            } else {
                                                                $queryStr .= " and tblcomplaints.status='$statusFilter'";
                                                            }
                                                        }
                                                        if($categoryFilter) {
                                                            $queryStr .= " and tblcomplaints.category='$categoryFilter'";
                                                        }
                                                        $query=mysqli_query($con, $queryStr);
                                                        $cnt=1;
                                                        while($row=mysqli_fetch_array($query))
                                                        {
                                                        ?>  
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt);?></td>
                                                            <td><?php echo htmlentities($row['complaintNumber']);?></td>
                                                            <td><?php echo htmlentities($row['name']);?></td>
                                                            <td><?php echo htmlentities($row['catname']);?></td>
                                                            <td><?php echo htmlentities($row['regDate']);?></td>
                                                            <td>
                                                                <?php $status=$row['status'];
                                                                if($status==''): ?>
                                                                <span class="badge badge-danger">Not Processed Yet</span>
                                                                <?php elseif($status=='in process'):?>
                                                                <span class="badge badge-warning">In Process</span>
                                                                <?php elseif($status=='closed'):?>
                                                                <span class="badge badge-success">Closed</span>
                                                                <?php endif;?>
                                                            </td>
                                                            <td>
                                                                <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>" class="btn btn-primary btn-sm"> View Details</a>
                                                            </td>
                                                        </tr>
                                                        <?php $cnt=$cnt+1; } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ complaint table ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>

    <!-- Required Js -->
    <script src="../admin/assets/js/vendor-all.min.js"></script>
    <script src="../admin/assets/js/plugins/bootstrap.min.js"></script>
    <script src="../admin/assets/js/pcoded.min.js"></script>

</body>

</html>
<?php } ?>