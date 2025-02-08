<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['resetpwd']))
{
    $email=$_POST['email'];
    $mobile=$_POST['mobileno'];
    $newpassword=md5($_POST['newpassword']);
    $sql =mysqli_query($con,"SELECT id FROM users WHERE userEmail='$email' and contactNo='$mobile'");
    $rowcount=mysqli_num_rows($sql);

    if($rowcount >0)
    {
        $query=mysqli_query($con,"update users set password='$newpassword' where userEmail='$email' and contactNo='$mobile'");
        if($query){
            echo "<script>alert('Your Password successfully changed');</script>";
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        } else {
            echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS | User Password Recovery</title>
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Lato', sans-serif;
            background-color: #f8f9fa;
        }
        .auth-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url('images/background.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .auth-content {
            background-color: rgba(1, 68, 33, 0.9); /* Add transparency to the background color */
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: white;
        }
        .auth-content h4 {
            color: white;
        }
        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #014421;
            border: none;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #013b1e;
        }
        .text-muted a {
            color: #014421;
        }
        .text-muted a:hover {
            text-decoration: underline;
        }
        .fa-home a {
            color: white;
            text-decoration: none;
        }
        .fa-home a:hover {
            text-decoration: underline;
        }
    </style>
    <script type="text/javascript">
        function valid()
        {
            if(document.passwordrecovery.newpassword.value != document.passwordrecovery.confirmpassword.value)
            {
                alert("New Password and Confirm Password Field do not match  !!");
                document.passwordrecovery.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <h4>Complaint Management System <hr /><span style="color:#fff;"> User Password Recovery</span></h4>
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <form method="post" name="passwordrecovery" onSubmit="return valid();">
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">Reset Password</h4>
                            <hr>
                            <div class="form-group mb-3">
                                <input class="form-control" id="email" name="email" type="text" placeholder="Enter Your Email" required />
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Mobile Number" name="mobileno" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="newpassword" id="newpassword" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" required>
                            </div>
                            
                            <button class="btn btn-block btn-primary mb-4" type="submit" name="resetpwd">Reset</button>
                            <hr>
                            <p class="mb-2 text-muted"><a href="index.php" class="f-w-400">Back to Sign in 🔐</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script src="../admin/assets/js/pcoded.min.js"></script>

</body>
</html>