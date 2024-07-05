<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
$package=getMember($conn,$_SESSION['mid'],'package');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>
<script>
function getEpinSet(val)
{
alert()document.frm2.epin.value=val;
}
</script>
<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd);">
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<div>&nbsp;</div>
<div>&nbsp;</div>
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">
<div></div>
<div class="row">
<div class="col-md-3 mt-2"></div>
<div class="col-md-6">
<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title">Member Activation</div>
</div>
<div>&nbsp;</div>
<?php if($_REQUEST['e']==1){?><div align="center" style="color:#FF0000; padding-bottom:8px;">Insufficient Balance!</div><?php }?>

<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='I')
{
$userid=getMember($conn, $_SESSION['mid'], 'userid');
?>




<p align="center" style="color:#000066;font-size:16px;">Fund  Wallet :&nbsp;&nbsp;<?=getFundWallet($conn,$userid)?></p>
<form class="form" name="frm2" action="activation-process.php" method="post">
<div class="row">
<div class="col-md-12" style="padding-right:30px; padding-left:30px;">
<div class="form-group form-group-default">
<label>Package<span style="color:#CC0000;">*</span></label>
<select name="package" id="package" class="form-control" required>
<option value="">Select Package</option>

<?php
$sqlst="SELECT * FROM `iv_settings_package` WHERE `status`='A' ORDER BY `id` LIMIT 1";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0)
{
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords($fetchst['package'])?> (<?=$fetchst['amount']?>)</option>
<?php }}?>


</select>
</div>
</div>
</div>

<div class="card-action" align="center">
<button class="btn btn-success">Activate Now</button>
</div>
</form>

<?php }else{?>
<h2 align="center" style="color:#009900;">You are active member!</h2>
<?php }?>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
</div>


</div>
</div>
</div>
</div>

</div>

<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>


<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
</body>
</html>