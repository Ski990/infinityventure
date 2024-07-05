<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
$left=2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!--<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>-->
 
<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script src="js/ajax.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
<div class="wrapper">

<?php include('header.php')?>

<!-- Sidebar -->
<?php include('leftmenu.php')?>
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card">
<div class="card-header">
<div class="card-title">New Member Joining</div>
</div>
<div class="card-body" style="background:#FFFFFF;">

<?php if($_REQUEST['msg']==4){?>
<div align="center" style="color:green;font-size:16px;">New member enrollment successfully completed!</div>
<h4 align="center" style="color:green;font-weight:bold;">User ID: <?=getMember($conn,$_REQUEST['id'],'userid')?>&nbsp; Name: <?=ucwords(getMember($conn,$_REQUEST['id'],'name'))?></h4>
<div>&nbsp;</div>
<?php }?>

<?php if($_REQUEST['e']==3){?>
<div align="center" style="margin:0;padding:0;color:#FF0000; font-size:16px;"><strong>Invalid Epin!</strong></div>
<?php }?>
<?php if($_REQUEST['e']==2){?>
<div align="center" style="margin:0;padding:0;color:#FF0000; font-size:16px;"><strong>Invalid Sponsor ID !</strong></div>
<?php }?>

<?php if($_REQUEST['e']==1){?>
<div align="center" style="margin:0;padding:0;color:#FF0000; font-size:16px;"><strong>Phone number or Email Id already used!</strong></div>
<?php }?>

<?php if($paystatus=='A'){?>

<form class="form" action="member-joining-process.php" method="post">
<div class="row mt-3">

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Sponsor ID</label>
<input type="text" class="form-control" name="sponsor" placeholder="Sponsor" value="<?=$userid?>"  required onChange="getSponcheck(this.value)" onBlur="getSponcheck(this.value)" onKeyUp="getSponcheck(this.value)"><strong><div id="sponDiv" style="color:#FF0000; font-size:14px;"><?=getMemberUserid($conn,$userid,'name')?></div></strong>
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Name<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="name" placeholder="Name" value="" required />
</div>
</div>


</div>

<div class="row mt-3">

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Phone<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" id="phone" name="phone" value="" placeholder="Phone" required maxlength="10" pattern="[6-9]{1}[0-9]{9}" />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Email<span style="color:#CC0000;">*</span></label>
<input type="email" class="form-control" id="email" name="email" value="" placeholder="Email" required />
</div>
</div>


</div>

<div class="row mt-3">


<div class="col-md-6">
<div class="form-group form-group-default">
<label>Password<span style="color:#CC0000;">*</span></label>
<input type="password" class="form-control" name="password" placeholder="Password" value="" required />
</div>
</div>


<div class="col-md-6">
<div class="form-group form-group-default">
<label>Address<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" placeholder="Address" name="address" id="address" required />
</div>
</div
</div>


<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-1 mb-1">
<button class="btn btn-success">REGISTER NOW</button>
</div>
</div>
</div>
</form>

<?php }else{?>
<h3 align="center" style="font-size:18px;color:#FF0000;"><br /><a href="activation.php">Click here</a> to activate your account!</h3>
<?php }?>

</div>
</div>

</div>
</div>
</div>

</div>

<!-- End Custom template -->
</div>

</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script><!-- DateTimePicker -->
<script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>
<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script>
$('#datepicker').datetimepicker({
format: 'MM/DD/YYYY',
});
</script>
</body>
</html>