<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
   $email=$_POST['emailid'];
   $password=md5($_POST['inputuserpwd']);
$query=mysqli_query($con,"SELECT id,fullName FROM users WHERE userEmail='$email' and password='$password'");
$num=mysqli_fetch_array($query);
//If Login Successful
if($num>0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
}
//If Login Failed
else{
    echo "<script>alert('Invalid login details');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS | User login</title>
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        .registration a {
            background-color: #014421;
            color: white;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            text-decoration: none;
        }
        .registration a:hover {
            background-color: #013b1e;
        }
        .back-home-container {
            text-align: center; /* Center the link */
            margin-top: 1rem; /* Add some spacing */
        }
        .back-home-container a {
            color: #014421; /* Link color */
            text-decoration: none;
        }
        .back-home-container a:hover {
            text-decoration: underline; /* Underline on hover */
        }
        .back-home-container a i {
            margin-right: 0.5rem; /* Add spacing between icon and text */
        }
    </style>
</head>

<body>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <h4>Complaint Management System <hr /><span style="color:#fff;"> User Login</span></h4>
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <form method="post">
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">Signin</h4>
                            <hr>
                            <div class="form-group mb-3">
                                <input type="email" name="emailid" id="emailid" class="form-control" onBlur="emailAvailability()" required placeholder="Enter Registered Email ID">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="inputuserpwd" class="form-control" required placeholder="Enter Password">
                            </div>
                            <button class="btn btn-block btn-primary mb-4" type="submit" name="submit">Signin</button>
                            <hr>
                            <p class="mb-2 text-muted">Forgot password? <a href="reset-password.php" class="f-w-400">Reset</a></p>
                            <div class="registration">
                                Don't have an account yet?<br/><br/>
                                <a class="badge badge-primary" href="registration.php">
                                    Create an account
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- Centered "Back Home" link -->
                    <div class="back-home-container">
                        <a href="../index.php"><i class="fas fa-home"></i> Back Home</a>
                    </div>
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

</body>

</html>