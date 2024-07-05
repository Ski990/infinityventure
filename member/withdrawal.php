<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
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
<script src="assets/js/ajax.js"></script>

<script src="assets/js/ajax.js"></script>

<script>
function getAgent(val)
{
console.log(val)

xmlhttp.open('GET','get-agent.php?username='+val);
xmlhttp.onreadystatechange=getAgentIDRequest;
xmlhttp.send();
}
function getAgentIDRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{

var response=xmlhttp.responseText;

document.getElementById('agentfullname').innerHTML=response;
}
}
}
</script>

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
<body style="background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd);">
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">
<div class="card" style="z-index:9999; margin-top:50px;">
<div class="card-header">
<div class="card-title"><a href="javascript:history.go(-1)"><img src="images/back-page.png" height="16" width="20"> &nbsp; Withdrawal </a>  </div>
</div>
</div>
<div class="row">
<div class="col-md-2"></div>

<div class="col-md-8">

<div class="card" >


<div class="card-body" style="background:#FFFFFF;">

<?php if($_REQUEST['p']==1){?><p align="center" style="color:#009900; padding-bottom:8px;font-size:16px;">Your withdrawal request sent to blockchain for approval!</p><?php }?>
<?php if($_REQUEST['m']==3){?><p align="center" style="color:#FF3300; padding-bottom:8px;">Amount must be greater than zero!</p><?php }?>
<?php if($_REQUEST['r']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Insufficient wallet balance!</p><?php }?>
<?php if($_REQUEST['t']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">One direct sponsor mandatory after every 5000 withdrawal!</p><?php }?>
<?php if($_REQUEST['s']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Minimum withdrawal amount is <?=$currency?> <?=getSettingsWithdrawal($conn,'minimum')?> </p><?php }?>
<div class="col-md-12">
<div class="row">
<div class="col-md-4">
<h3 align="center" style="color:#660000;">Current Wallet: <?=$currency?> <?=getAvailableWallet($conn,$userid)?></h3>
</div>
<div class="col-md-4">
<h3 align="center" style="color:#660000;">CTO Wallet: <?=$currency?> <?=getCTOWallet($conn,$userid)?></h3>
</div>
<div class="col-md-4">
<h3 align="center" style="color:#660000;">R-Coin Wallet: <?=$currency?> <?=getRcoinWallet($conn,$userid)?></h3>
</div>
</div>
</div>
<div>&nbsp;</div>
<?php 



if(getSettingsOnoff($conn,'manual')=='A'){

$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
$nodirect=getSettingsWithdrawal($conn,'nodirect');
$nosponsor=getNoOfActiveSponsor($conn,$userid);
if($paystatus=='A')
{
if($nosponsor >= $nodirect){


$current=getAvailableWallet($conn,$userid);
$min=getSettingsWithdrawal($conn,'minimum');
$cto=getCTOWallet($conn,$userid);
$rcoin=getRcoinWallet($conn,$userid);

if($current>=$min || $cto>=$min || $rcoin>=$min)
{
if(getMember($conn,$_SESSION['mid'],'bname')!='' && getMember($conn,$_SESSION['mid'],'branch')!='' && getMember($conn,$_SESSION['mid'],'accname')!='' && getMember($conn,$_SESSION['mid'],'accno')!='' && getMember($conn,$_SESSION['mid'],'ifscode')!='')
{
?>



<form class="form" action="withdrawal-process.php" method="post">
<div class="form-group">
<label for="userinput1">Wallet<b style="color:#FF0000;"> *</b></label>
<select name="wallet" id="wallet" class="form-control" required>
<option value="">Select Wallet </option>
<option value="Current Wallet">Current Wallet</option>
<option value="R-Coin Wallet">R-Coin Wallet</option>
<option value="CTO Wallet">CTO Wallet</option>

</select>
</div>

<div class="form-group">
<label for="pillInput"><strong style="color:#660033;">Amount<span style="color:#CC0000;">*</span></strong></label>
<input type="text" class="form-control input-pill" id="amount" name="amount" placeholder="Enter Amount" required />
</div>

<div class="card-action" >
<button class="btn btn-success" style="width:100%;">Submit</button>
</div>
</form>
<?php }else{?><div>&nbsp;</div>
<div align="center"><a href="edit-profile.php" style="text-decoration:none; color:#FF3300;" title="Go to Bank Details">
<span style="height:30px; border:1px solid #FF6600; padding:10px;font-size:13px;">
<strong>Please click here and fill up your Bank Details!</strong>
</span>
</a></div>
<div>&nbsp;</div><?php }}else{?>
<h5 align="center" style="color:#FF0000;font-size:16px;"><strong>You don't have minimum balance for withdrawal!</strong></h5>

<?php }}else{?>
<h5 align="center" style="color:#FF0000;font-size:16px;"><strong>You must have <?=$nodirect?> Direct for withdrawal!</strong></h5>

<?php }}else{?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;"><br />Click here <a href="activation.php">Activation</a> to Activate your account!</h3>

<?php } ?>

</div>
</div>
<?php }else{?>
<h2 align="center" style="color:#FF0000">Software is under maintenance!</h2>
<?php }?>
</div>



</div>
</div>

</div>

<!-- Custom template | don't include it in your project! -->
<!-- End Custom template -->
</div>
<?php include('footer.php')?>
</div>
<script>
function copyToClipboard(element) {
var $temp = $("<input>");
$("body").append($temp);
$temp.val($(element).text()).select();
document.execCommand("copy");
$temp.remove();
document.getElementById('cpbutton').innerHTML='COPIED';
}
</script>
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