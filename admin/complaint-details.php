<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['aid'])==0)
{   
    header('location:index.php');
}
else{
    date_default_timezone_set('Asia/Kolkata'); // Change according to your timezone
    $currentTime = date( 'd-m-Y h:i:s A', time() );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS || Complaint Details</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <script language="javascript" type="text/javascript">
    var popUpWin = 0;
    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + width + ',height=' + height + ',left=' + left + ', top=' + top);
    }
    </script>
    <script>
    function initMap() {
        var lat = parseFloat(document.getElementById('latitude').textContent);
        var lng = parseFloat(document.getElementById('longitude').textContent);
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: lat, lng: lng},
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: map
        });
    }
    </script>
</head>
<body class="">
    <?php include('include/sidebar.php');?>
    <?php include('include/header.php');?>
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Complaint Details</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="all-complaint.php">Complaint Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>View Complaint Details</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <?php 
                                        $st = 'closed';
                                        $cid = $_GET['cid'];
                                        $query = mysqli_query($con,"SELECT tblcomplaints.*, users.fullName as name, category.categoryName as catname, city.cityName as cityname FROM tblcomplaints JOIN users ON users.id=tblcomplaints.userId JOIN category ON category.id=tblcomplaints.category JOIN city ON city.id=tblcomplaints.city WHERE tblcomplaints.complaintNumber='$cid'");
                                        while($row = mysqli_fetch_array($query))
                                        {
                                        ?>                                  
                                        <tr>
                                            <td><b>Complaint Number</b></td>
                                            <td><?php echo htmlentities($row['complaintNumber']);?></td>
                                            <td><b>Complainant Name</b></td>
                                            <td><?php echo htmlentities($row['name']);?></td>
                                            <td><b>Reg Date</b></td>
                                            <td><?php echo htmlentities($row['regDate']);?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Category</b></td>
                                            <td><?php echo htmlentities($row['catname']);?></td>
                                            <td><b>SubCategory</b></td>
                                            <td><?php echo htmlentities($row['subcategory']);?></td>
                                            <td><b>Complaint Type</b></td>
                                            <td><?php echo htmlentities($row['complaintType']);?></td>
                                        </tr>
                                        <tr>
                                            <td><b>State</b></td>
                                            <td><?php echo htmlentities($row['state']);?></td>
                                            <td><b>City</b></td>
                                            <td><?php echo htmlentities($row['cityname']);?></td>
                                            <td><b>Address</b></td>
                                            <td><?php echo htmlentities($row['address']);?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Nature of Complaint</b></td>
                                            <td colspan="5"><?php echo htmlentities($row['noc']);?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Complaint Details</b></td>
                                            <td colspan="5"><?php echo htmlentities($row['complaintDetails']);?></td>
                                        </tr>
                                        <tr>
                                            <td><b>File (if any)</b></td>
                                            <td colspan="5">
                                                <?php 
                                                $cfile = $row['complaintFile'];
                                                if($cfile == "" || $cfile == "NULL")
                                                {
                                                    echo "File NA";
                                                }
                                                else
                                                {
                                                    ?>
                                                    <a href="../user/complaintdocs/<?php echo htmlentities($row['complaintFile']);?>" target="_blank">View File</a>
                                                    <?php 
                                                } 
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Latitude</b></td>
                                            <td id="latitude"><?php echo htmlentities($row['latitude']);?></td>
                                            <td><b>Longitude</b></td>
                                            <td id="longitude"><?php echo htmlentities($row['longitude']);?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <div id="map" style="height: 400px; width: 100%;"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Final Status</b></td>
                                            <td colspan="5">
                                                <?php 
                                                $status = $row['status'];
                                                if($status == ''): ?>
                                                <span class="badge badge-danger">Not Processed Yet</span>
                                                <?php elseif($status=='under review'):?>
                                                <span class="badge badge-secondary">Under Review</span>
                                                <?php elseif($status=='in process'):?>
                                                <span class="badge badge-warning">In Process</span>
                                                <?php elseif($status=='closed'):?>
                                                <span class="badge badge-success">Complaint Resolved</span>
                                                <?php elseif($status=='complaint rejected'):?>
                                                <span class="badge badge-dark">Complaint Rejected</span>
                                                <?php endif;?>
                                            </td>
                                        </tr>
                                        <hr>
                                        <?php 
                                        $ret = mysqli_query($con,"SELECT complaintremark.remark as remark, complaintremark.status as sstatus, complaintremark.remarkDate as rdate FROM complaintremark JOIN tblcomplaints ON tblcomplaints.complaintNumber=complaintremark.complaintNumber WHERE complaintremark.complaintNumber='$cid'");
                                        $cnt = 1;
                                        $count = mysqli_num_rows($ret);
                                        if($count):
                                        ?>
                                        <tr>
                                            <th>S.No</th>
                                            <th colspan="3">Remark</th>
                                            <th>Status</th>
                                            <th>Updation Date</th>
                                        </tr>
                                        <?php 
                                        while($rw = mysqli_fetch_array($ret))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td colspan="3"><?php echo htmlentities($rw['remark']); ?></td>
                                            <td><?php echo htmlentities($rw['sstatus']); ?></td>
                                            <td><?php echo htmlentities($rw['rdate']); ?></td>
                                        </tr>
                                        <?php 
                                        $cnt = $cnt + 1; 
                                        } 
                                        endif; 
                                        ?>
                                        <tr>
                                            <td>
                                                <?php if($row['status'] == "closed") {
                                                } else {?>
                                                    <a href="javascript:void(0);" onClick="popUpWindow('updatecomplaint.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Update order">
                                                        <button type="button" class="btn btn-primary">Take Action</button>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                            <td colspan="4">
                                                <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?uid=<?php echo htmlentities($row['userId']);?>');" title="Update order">
                                                    <button type="button" class="btn btn-primary">View User Details</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php  
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
</body>
</html>
<?php } ?>