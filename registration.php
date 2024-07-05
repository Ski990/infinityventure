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
<script src="administrator/js/ajax.js" type="text/javascript"></script>

<script>
function getUserIDcheck(val)
{ 

xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getUserIDRequest;
xmlhttp.send();
}
function getUserIDRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;

document.getElementById('sponname').value=response;
}
}
}
</script>
</head>
<body style="background:url(images/slider-minimal-slide-2-1920x968.png); height:1000px; width:100%; background-size:cover;">


<div >
<!-- RD Google Map-->

<!--Header Start-->

<div style="min-height:600px;">
<div>&nbsp;</div>

<div class="container">
<div class="col-md-12 mx-auto" >
<div class="row">
<div class="col-md-3" > </div>
<div class="col-md-6" >
<div class="block" style="background-image: radial-gradient(circle, #051937, #08152f, #0a1027, #08091f, #030218); padding:5px 20px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28); border-radius: 20px 20px;">

<div>&nbsp;</div>
<div align="center" ><a href="index.php"><img src="images/logo.png" alt="ADM PVT LTD " style="font-size:26px; color:#000; background:#fff; border-radius:10px;"></a>
</div>

<h3 class="text-center" style="color:#fff; padding:10px; font-size:25px;">Registration</h3>

<?php if($_REQUEST['q']==4){?><div align="center" style="margin:0;padding:0;color:#FF0000;  background:#FFFFFF;font-size:16px; border-radius:15px;"><strong>Invalid/Inactive Sponsor ID!</strong></div><?php }?>
<?php if($_REQUEST['e']==1){?><div align="center" style="margin:0;padding:0;color:#FF0000;  background:#FFFFFF;font-size:16px;"><strong>Phone Number/Email ID Already Used!</strong></div><?php }?>
<?php if($_REQUEST['msg']==4){?>
<div align="center" style="background:#FFFFFF; border-radius:25px;">
<div align="center" style="margin:0;padding:0;color:#009933;  background:;font-size:18px;   "><strong>Your Registration is Successfully Completed!</strong></div>
<h6 align="center" style="color:#009933;font-size:18px; background:; font-family:Arial, Helvetica, sans-serif; margin-bottom:5px;border-radius:15px;  ">User ID: <?=getMember($conn,$_REQUEST['id'],'userid')?></h6>
<h6 align="center" style="color:#009933;font-size:18px; background:; font-family:Arial, Helvetica, sans-serif; margin-bottom:5px;border-radius:15px; ">Name:<?=getMember($conn,$_REQUEST['id'],'name')?></h6>
</div>
<?php }?>

<?php if(getSettingsOnOff($conn,'registration')=='A'){?>

<div>&nbsp;</div>
<form name="form1"  action="registration-process.php" method="post">
<div style="margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Sponsor ID" name="sponsor" id="sponsor" required onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);"  />
</div>
<div style="color:#000000;margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Sponsor Name" name="sponname" id="sponname"  readonly="" style="color:#000000;" required />
</div>


<div style="margin-bottom:8px">
<select id="position" class="form-control" name="position" required>
<option value="">Select Position</option>
<option value="Left">Left</option>
<option value="Right">Right</option> 
</select>
</div>




<div style="margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Name" name="name" id="name" required />
</div>
<div style="margin-bottom:8px">
<input type="tel" class="form-control"  placeholder="Phone No" name="phone" id="phone" pattern="[6789][0-9]{9}" maxlength="10" required />
</div>
<div style="margin-bottom:8px">
<input type="email" name="email" id="email" class="form-control"  placeholder="Email" required />
</div>
<div style="margin-bottom:8px">
<input type="password" class="form-control"  placeholder="Password" name="password" id="password" required />
</div>

<div style="margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Address" name="address" id="address" required />
</div>

<div style="margin-bottom:8px">
<input type="checkbox" class="border-primary mr-1" style="height:18px; width:18px" name="checkbox" id="checkbox" required />
<a href="about.php" style="font-size:16px; text-decoration:none; color:#1ee9e9" target="_blank"><strong>I agree to the terms and conditions</strong></a>
</div>

<div>&nbsp;</div>
<input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" style="width:100%; height:50px;  border-radius:10px;" value="Sign Up" />

</form>

<?php }else{?>
<h2 align="center" style="color: #FFFFFF; font-size:28px; padding-top:30px; padding-bottom:30px">Software is under maintenance!</h2>
<?php }?>
<br>
<p class="mt-8" style="text-align:center; color:#FFFF00; padding:10px; font-size:18px;">Already have an account ?&nbsp;<a href="login.php" style="color:#fff;"><strong>Login</strong></a></p>

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
<!-- JS here -->





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