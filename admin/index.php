<?php
session_start();
include("include/config.php");
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $_SESSION['alogin']=$_POST['username'];
        $_SESSION['aid']=$num['id'];
        header("location:dashboard.php");
    }else{
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS | Admin login</title>
    <link rel="stylesheet" href="assets/css/style.css">
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
        .fa-home a {
            color: #014421; /* Change this to a color that contrasts with the background */
            text-decoration: none;
        }
        .fa-home a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <h4>Complaint Management System <hr /><span style="color:#fff;"> Admin Login</span></h4>
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <form method="post">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
                            </div>
                            <div class="form-group mb-4">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
                            </div>
                            <button class="btn btn-block btn-primary mb-4" type="submit" name="submit">Signin</button>
                            <hr>
                            <p class="mb-2 text-muted">Forgot password? <a href="reset-password.php" class="f-w-400">Reset</a></p>
                        </div>
                    </form>
                    <div class="back-home-container">
                        <a href="../index.php"><i class="fas fa-home"></i> Back Home</a>
                    </i>
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

<script src="assets/js/pcoded.min.js"></script>

</body>
</html>