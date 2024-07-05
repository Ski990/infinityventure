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
<div class="card-title"><a href="javascript:history.go(-1)"><img src="images/back-page.png" height="16" width="20"> &nbsp; Payment</a>   </div>
</div>
</div>

<!-- Sidebar -->
<?php include('leftmenu.php')?>
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">

<div class="col-md-6">



<div class="card-body" style="overflow:auto;background:#FFFFFF;">
<div class="card-header">
<div class="card-title"  style="color:#000000;">Bank Details</div>
</div>
<div>&nbsp;&nbsp;</div>
<?php if(getSettingsBank($conn,'bname')){?><h3 align="center" style="font-weight:bold;">Bank : <?=getSettingsBank($conn,'bname')?></h3><?php }?>
<?php if(getSettingsBank($conn,'accname')){?><h3 align="center" style="font-weight:bold;">Account Holder Name : <?=getSettingsBank($conn,'accname')?></h3><?php }?>
<?php if(getSettingsBank($conn,'accno')){?><h3 align="center" style="font-weight:bold;">Account No : <?=getSettingsBank($conn,'accno')?></h3><?php }?>
<?php if(getSettingsBank($conn,'ifscode')){?><h3 align="center" style="font-weight:bold;">IFSC Code : <?=getSettingsBank($conn,'ifscode')?></h3><?php }?>

<?php if(getSettingsBank($conn,'upiid')){?><h3 align="center" style="font-weight:bold;">UPI ID : <?=getSettingsBank($conn,'upiid')?></h3><?php }?>


<div align="center">
<?php if(getSettingsBank($conn,'qrcode')){?>
<h3 ><img src="../administrator/qrcode/<?=getSettingsBank($conn,'qrcode')?>" width="71%" /></h3>
<?php }?>
</div>
</div>
</div>

<div class="col-md-6">
<div class="card-body" style="overflow:auto;background:#FFFFFF;">
<div class="card-header">
<div class="card-title" style="color:#000000;">Payment Request</div>
</div>
<div>&nbsp;&nbsp</div>
<div class="card-body" style="overflow:auto;background:#FFFFFF;">
<?php if($_REQUEST['f']==1){?><div align="center" style="margin:0;padding:0;color:#FF0000; font-size:14px;"><strong>Trancaction ID already exist!!</strong></div><?php }?>
<?php if($_REQUEST['s']==1){?><div align="center" style="margin:0;padding:0;color:#00CC00; font-size:14px;"><strong>Your payment request has been sent for approval!</strong></div><?php }?>

<?php if($_REQUEST['s']==4){?><div align="center" style="margin:0;padding:0;color: #FF0000; font-size:14px;"><strong>Wrong Transaction Password!</strong></div><?php }?>

<div>&nbsp;&nbsp;</div>

<form class="form" action="payment-process.php" method="post" enctype="multipart/form-data">

<div class="col-md-12">
<div class="form-group form-group-default">
<label>Transaction ID<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="tranid" placeholder="Transaction ID" value="" required />
</div>
</div>


<div class="col-md-12">
<div class="form-group form-group-default">
<label>Amount<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="amount" placeholder="Amount" value="" required />
</div>
</div>

 
<div class="col-md-12">
<div class="form-group form-group-default">
<label>Receipt<span style="color:#CC0000;">*</span></label>
<input type="file" placeholder="" id="file" name="file" value="" accept=".png,.jpeg,.jpg,.pdf,.pjp" required />
</div>
</div>



<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-success">Send Now</button>
</div>
</div>
</div>

</form>

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