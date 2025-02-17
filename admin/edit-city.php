<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['aid'])==0)
{   
    header('location:index.php');
}
else{
    $cityid=intval($_GET['id']);
    if(isset($_POST['submit']))
    {
        $stateID=$_POST['state'];
        $cityName=$_POST['city'];
        $query=mysqli_query($con,"update city set stateID='$stateID',cityName='$cityName' where id='$cityid'");
        if($query)
        {
            echo "<script>alert('City updated successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'add-city.php'; </script>";
        }
        else{
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Edit City</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include('include/sidebar.php');?>
    <?php include('include/header.php');?>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Edit City</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="add-city.php">Manage Cities</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit City</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit City</h5>
                        </div>
                        <div class="card-body">
                            <?php 
                            $query=mysqli_query($con,"select * from city where id='$cityid'");
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>
                            <form method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select name="state" class="form-control" required>
                                        <option value="">Select State</option>
                                        <?php 
                                        $query=mysqli_query($con,"select * from state");
                                        while($row1=mysqli_fetch_array($query))
                                        {
                                        ?>
                                        <option value="<?php echo $row1['id'];?>" <?php if($row1['id'] == $row['stateID']) echo 'selected';?>><?php echo $row1['stateName'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city">City Name</label>
                                    <input type="text" name="city" class="form-control" value="<?php echo $row['cityName'];?>" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
</body>
</html>
<?php } ?>