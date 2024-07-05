<?php
include('administrator/includes/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title><?=$title?></title>
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/venobox.min.css" />
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/animated_barfiller.css" />
    <link rel="stylesheet" href="css/select2.min.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/utilities.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body style="background:url(images/slider-minimal-slide-2-1920x968.png); width:100%;  background-size:cover; min-height:750px;">
    
    
<div >
<!-- RD Google Map-->
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>  
<!--Header Start-->
    
<div style="">
<div class="container">


<div class="col-md-12 mx-auto" >
<div class="row">
<div class="col-md-3" ></div>
<div class="col-md-6" style="padding-top:10px;">


<div class="block" style="padding:5px 20px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28);background-image: radial-gradient(circle, #051937, #08152f, #0a1027, #08091f, #030218); border-radius: 20px 20px; height:600px;">
<div>&nbsp;</div>
<div align="center" ><a href="index.php"><img src="images/logo.png" alt="ADM PVT LTD " style="font-size:26px; color:#000; background:#fff; border-radius:10px;"></a>
</div>



<h2 class="text-center" style="color:#fff; padding:10px; font-size:25px;">Forgot Password </h2>

<?php if(isset($_REQUEST['m'])=='1'){?><p align="center" style="background:#FFFFFF; color:#00CC00"><strong>Password Sent to your E-mail ID. Please Check Your E-mail!</strong></p><?php }?>

<?php if(isset($_REQUEST['e'])=='2'){?><p align="center" style="background:#FFFFFF; color:#FF0000"><strong>Invalid Email ID/UserID</strong></p><?php }?>


<div>&nbsp;</div>
<form name="form1"  action="forgot-process.php" method="post" >

<input type="hidden" name="security" id="security" value="" />
<div style="margin-bottom:8px">
<input type="text" style="background:#FFFFFF;" class="form-control"  name="userid" id="userid"  placeholder="Enter User ID"  required />
</div>


<div style="margin-bottom:8px">
<input type="email" style="background:#FFFFFF;" class="form-control" name="email" id="email" placeholder="Enter Email"  required />
</div>




<input type="submit" class="btn btn-primary" style="width:100%; height:50px; border-radius:10px;" value="Submit" />

<div>&nbsp;</div>
<p class="mt-1" style="text-align:center; color:#FFFF00; padding:0px; font-size:18px;">Create an account? <a href="registration.php"><span style="color:#fff;"><strong> Click here</strong></span></a></p>

</form>
</div>
</div>


</div>
</div>
</div>
<div>&nbsp;</div>  
</div>
</div>

    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
   <!-- jQuery Frameworks
    ============================================= -->
  <!--====== jquery js ======-->




      <!-- JS here -->
     <!-- JS
    ============================================ -->
    <!-- JS here -->
       <!-- All JS Files -->
  <!--jquery library js-->
    <script src="js/jquery-3.7.0.min.js"></script>
    <!--bootstrap js-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--font-awesome js-->
    <script src="js/Font-Awesome.js"></script>
    <!--venobox js-->
    <script src="js/venobox.min.js"></script>
    <!--isotope js-->
    <script src="js/isotope.pkgd.min.js"></script>
    <!--slick js-->
    <script src="js/slick.min.js"></script>
    <!--jquery.marquee js-->
    <script src="js/jquery.marquee.min.js"></script>
    <!--animated_barfiller js-->
    <script src="js/animated_barfiller.js"></script>
    <!--sticky_sidebar js-->
    <script src="js/sticky_sidebar.js"></script>
    <!--select2 js-->
    <script src="js/select2.min.js"></script>
    <!--counter js-->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.countup.min.js"></script>
    <!--wow js-->
    <script src="js/wow.min.js"></script>
    <!--main/custom js-->
    <script src="js/main.js"></script>


</body>

</html>




