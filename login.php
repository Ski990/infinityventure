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
	<script src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>

<body style="background:url(images/slider-minimal-slide-2-1920x968.png); width:100%; min-height:750px; background-size:cover;">
    
    
<div >
<!-- RD Google Map-->
	  
<!--Header Start-->
   
<div style="min-height:300px;">
<div class="container">

<div>&nbsp;</div>

<div class="container">
<div class="col-md-12 mx-auto" >
<div class="row">
<div class="col-md-3" ></div>
<div class="col-md-6" style="padding-top:10px;">

<div class="block" style="padding:5px 20px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28);background-image: radial-gradient(circle, #051937, #08152f, #0a1027, #08091f, #030218); border-radius: 20px 20px; min-height:450px;">
<div>&nbsp;</div>

<div align="center" ><a href="index.php"><img src="images/logo.png" alt="ADM PVT LTD " style="font-size:26px; color:#000; background:#fff; border-radius:10px;"></a>
</div>



<h2 class="text-center" style="color:#fff; padding:10px; font-size:25px;">Sign In</h2>

<?php if($_REQUEST['e']==1){?> <p align="center" style="color:#FF0000; background:#FFFFFF"><strong>Invalid UserID/Password</strong></p> <br><?php }?>

<?php if(getSettingsOnOff($conn,'login')=='A'){?>


<form name="form1"  action="login-process.php" method="post" >

<div>&nbsp;</div>
<input type="hidden" name="security" id="security" value="" />
<div style="margin-bottom:8px">
<input type="text" style="background:#FFFFFF;" class="form-control"  name="userid" id="userid"  placeholder="Enter User ID"  required />
</div>


<div style="margin-bottom:8px">
<input type="password" style="background:#FFFFFF;" class="form-control" name="password" id="password" placeholder="Enter Password"  required />
</div>


<div class="form-group">
<div class="col-md-4 col-xs-12 text-xs-center text-md-left" style="margin-left:0px;">
</div>
</div>

<input type="submit" class="btn btn-primary" style="width:100%; height:50px;  border-radius:10px;" value="Sign In" />

</form>

<?php }else{?>
<h2 align="center" style="color: #FFFFFF; font-size:28px; padding-top:30px; padding-bottom:30px">Software is under maintenance!</h2>
<?php }?>
<p class="mt-1" style="text-align:center; color:#FFFF00; padding:10px; font-size:18px;">Forgot Password? <a href="forgot.php"><span style="color:#fff;"><strong> Click here</strong></span></a></p>
<p class="mt-1" style="text-align:center; color:#FFFF00; padding:0px; font-size:18px;">Create an account? <a href="registration.php"><span style="color:#fff;"><strong> Click here</strong></span></a></p>




</div>
</div>


</div>
</div>
</div>


</div>
</div>
    
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
   <!-- jQuery Frameworks
    ============================================= -->
 <!-- JS here -->
   
   <!--====== jquery js ======-->


<!-- JS here -->
<!-- JS============================================ -->
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