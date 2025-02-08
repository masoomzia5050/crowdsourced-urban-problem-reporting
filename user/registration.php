<?php
include('include/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $contactno=$_POST['contactno'];
    $status=1;
    $query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
    
    echo "<script>alert('Registration successful. Now you can login');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS | User Registrations</title>
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
    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function(data){
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function(){}
            });
        }
    </script>
</head>
<body>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <h4>Complaint Management System <hr /><span style="color:#fff;"> User Registration</span></h4>
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <form method="post">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" class="form-control" placeholder="Email ID" id="email" onBlur="userAvailability()" name="email" required="required">
                                <span id="user-availability-status1" style="font-size:12px;"></span>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Contact No" required="required" autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" required="required" name="password"><br>
                            </div>
                            <button class="btn btn-block btn-primary mb-4" type="submit" name="submit">Register</button>
                            <hr>
                            <p class="mb-2 text-muted"><a href="index.php" class="f-w-400">Back to Sign in 🔐</a></p>
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