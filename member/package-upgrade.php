<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
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

<div class="card" style="z-index:9999;">
<div class="card-header">
<div class="card-title"><a href="javascript:history.go(-1)"><img src="images/back-page.png" height="16" width="20"> &nbsp; Package Upgrade</a>   </div>
</div>
</div>

<!-- Sidebar -->
<?php include('leftmenu.php')?>
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">

<div class="card">

<div class="card-body" style="overflow:auto;background:#FFFFFF;">
<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='A')
{
?>
<div><?php if($_REQUEST['m']=='1'){?><div align="center" style="color:#009900;background:#FFFFFF;font-size:16px;">Upgrade successfull!</div><?php } ?></div>
<div><?php if($_REQUEST['e']=='3'){?><div align="center" style="color:#FF0000;background:#FFFFFF;font-size:16px;">Please Upgrade Previous Package!</div><?php } ?></div>
<div><?php if($_REQUEST['e']=='2'){?><div align="center" style="color:#FF0000;background:#FFFFFF;font-size:16px;">Insufficient Wallet Balance!</div><?php } ?></div>
<div><?php if($_REQUEST['e']=='1'){?><div align="center" style="color:#FF0000;background:#FFFFFF;font-size:16px;">You are already upgraded in this package!</div><?php } ?></div>


<div align="center" style="color:#00CC00;font-size:16px;">Fund Wallet: <?=getFundWallet($conn,$userid)?></div>
<div>&nbsp;</div>

<form class="form" action="package-upgrade-process.php" method="post">

<div class="row">
<div class="col-md-12">
<div class="form-group form-group-default">
<label>Package<span style="color:#CC0000;">*</span></label>
<select name="package" id="package" class="form-control" required>
<option value="">Select Package</option>
<?php
$sqlst="SELECT * FROM `iv_settings_package` WHERE `amount`>(SELECT `amount` FROM `iv_member_package` WHERE `userid`='".$userid."' ORDER BY `amount` DESC LIMIT 1 ) ORDER BY `amount` LIMIT 1";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0)
{
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords(strtolower($fetchst['package']))?> (<?=$fetchst['amount']?>)</option>
<?php }}?>
</select>
</div>
</div>
</div>


<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-1 mb-1">
<button class="btn btn-success">Upgrade</button>
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

</div>

<!-- Custom template | don't include it in your project! -->

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