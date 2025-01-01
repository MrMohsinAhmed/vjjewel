<?php 
session_start();
error_reporting(0);
include('includes/config.php');

// Redirect if already logged in
if (isset($_SESSION['jsmsuid'])) {
    header('location:index.php');
    exit();
}

if (isset($_POST['login'])) {
    $emailcon = $_POST['emailcont'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT ID FROM users WHERE (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password'");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['jsmsuid'] = $ret['ID'];
        header('location:index.php');
    } else {
        echo "<script>alert('Invalid Details.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from caketheme.com/html/mojuri/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2024 17:33:14 GMT -->
<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login - VJ Jewel</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="media/favicon.png">
		
		<!-- Dependency Styles -->
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="libs/feather-font/css/iconfont.css" type="text/css">
		<link rel="stylesheet" href="libs/icomoon-font/css/icomoon.css" type="text/css">
		<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.css" type="text/css">
		<link rel="stylesheet" href="libs/wpbingofont/css/wpbingofont.css" type="text/css">
		<link rel="stylesheet" href="libs/elegant-icons/css/elegant.css" type="text/css">
		<link rel="stylesheet" href="libs/slick/css/slick.css" type="text/css">
		<link rel="stylesheet" href="libs/slick/css/slick-theme.css" type="text/css">
		<link rel="stylesheet" href="libs/mmenu/css/mmenu.min.css" type="text/css">
		<link rel="stylesheet" href="libs/slider/css/jslider.css">

		<!-- Site Stylesheet -->
		<link rel="stylesheet" href="assets/css/app.css" type="text/css">
		<link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- Google Web Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&amp;display=swap" rel="stylesheet">
	</head>
	
	<body class="page">
		<div id="page" class="hfeed page-wrapper">
        <?php include_once('includes/header.php');?>

			<div id="site-main" class="site-main">
				<div id="main-content" class="main-content">
					<div id="primary" class="content-area">
						<div id="title" class="page-title">
							<div class="section-container">
								<div class="content-title-heading">
									<h1 class="text-title-heading">
										Login
									</h1>
								</div>
								<div class="breadcrumbs">
									<a href="index.html">Home</a><span class="delimiter"></span>Login
								</div>
							</div>
						</div>

<div id="content" class="site-content" role="main" >
    <div class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-12" style='border: 1px solid grey; border-radius: 10px; background-image: url("media/banner/bg-img-1.jpg")' >
                    <div class="card shadow-sm p-4">
                        <h2 class="text-center mb-4">Login</h2><BR></BR>
                        <div class="card-body" style="color:black;">
                            <form method="post" action="#" class="login">
                                <div class="form-group">
                                    <label for="username">Registered Email or Contact Number <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="emailcont" id="username" placeholder="Enter your email or contact number">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span class="required">*</span></label>
                                    <input class="form-control" type="password" name="password" placeholder="Enter your password">
                                </div><br>
                                <div class="form-group d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme">
                                        <label class="form-check-label" for="rememberme">Remember me</label>
                                    </div><br><br>
                                    <div>
                                        <a href="page-forgot-password.html">Lost your password?</a>
                                    </div>
                                </div><br> 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block" name="login">LOGIN</button>
                                </div>
                                <div class="form-group text-center">
                                    <a href="signup.php"><span>Don't have an account? Click here to register</span></a>
                                    
                                </div>
                            </form>
							<style>
								button{
									height:50px;
									background-color: black;
									color: white;
								}
								button:hover{
									background-color: goldenrod;
								}
							</style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


				</div><!-- #main-content -->
			</div>

			<footer >
				<?php 
					include_once('includes/footer.php')
				?>
			</footer>
		</div>

		<!-- Back Top button -->
		<div class="back-top button-show">
			<i class="arrow_carrot-up"></i>
		</div>

		

		<!-- Page Loader -->
		<div class="page-preloader">
	    	<div class="loader">
	    		<div></div>
	    		<div></div>
	    	</div>
	    </div>

		<!-- Dependency Scripts -->
		<script src="libs/popper/js/popper.min.js"></script>
		<script src="libs/jquery/js/jquery.min.js"></script>
		<script src="libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="libs/slick/js/slick.min.js"></script>
		<script src="libs/mmenu/js/jquery.mmenu.all.min.js"></script>
		<script src="libs/slider/js/tmpl.js"></script>
		<script src="libs/slider/js/jquery.dependClass-0.1.js"></script>
		<script src="libs/slider/js/draggable-0.1.js"></script>
		<script src="libs/slider/js/jquery.slider.js"></script>
		
		<!-- Site Scripts -->
		<script src="assets/js/app.js"></script>
	</body>

<!-- Mirrored from caketheme.com/html/mojuri/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2024 17:33:14 GMT -->
</html>