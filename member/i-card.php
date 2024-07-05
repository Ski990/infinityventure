<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
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
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript" src="js/html2canvas.js"></script>
<script> 
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>
<script type="text/javascript">
function captureCurrentDiv()
{
html2canvas([document.getElementById('printdiv')], {   
onrendered: function(canvas)  
{
var img = canvas.toDataURL()
$.post("save.php", {data: img}, function (file) {
window.location.href = "download-icard.php?path="+ file});   
}
});
}
</script>
<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background-image: ">
<div class="wrapper">
<?php include('header.php')?>

<!-- Sidebar -->
<?php include('leftmenu.php');?>
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner">
<div class="card" style="z-index:9999; margin-top:50px; ">
<div class="card-header">
<div class="card-title"><a href="javascript:history.go(-1)"><img src="images/back-page.png" height="16" width="20"> &nbsp; I-Card</a>   </div>
</div>
</div>
<div class="row">
<div class="col-md-12">

<div class="card">

<div class="card-body" style="background:#FFFFFF;">
<div style="text-align:center;margin-bottom:10px;">
<img src="images/download.png" onClick="captureCurrentDiv()" style="cursor:pointer;" />
</div>

<div class="row">
<div class="col-md-12">

<div align="center" style="overflow:auto;background:#FFFFFF;">

<div id="printdiv" style="height:390px;width:280px;border:1px solid #333;background: linear-gradient(to top left, #33ccff 0%, #ffffff 100%);">
<table width="90%" align="center" style="margin-bottom:10px;">
<tr height="60" align="center" valign="middle"><td><img src="images/logo.png" style="height:50px;"></td></tr>
<tr height="80" valign="middle"><td align="center"><?php if(getMember($conn,$_SESSION['mid'],'profile')){?><img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" style="height:95px;width:95px; border-radius:50%;" alt="image profile" /><?php }else{?>
<img src="images/profile.jpg" alt="image profile" style="height:95px;width:95px; border-radius:50%;">
<?php }?></td></tr>
</table>
<table width="90%" align="center" border="0" cellpadding="4">
<tr height="30"><td>User ID</td><td><?=getMember($conn,$_SESSION['mid'],'userid')?></td></tr>
<tr height="30"><td>Name</td><td><?=getMember($conn,$_SESSION['mid'],'name')?></td></tr>
<tr height="30"><td>Email ID</td><td><?=getMember($conn,$_SESSION['mid'],'email')?></td></tr>
<tr height="30"><td>Mobile No.</td><td><?=getMember($conn,$_SESSION['mid'],'phone')?></td></tr>
<tr height="30"><td>Address</td><td><?=getMember($conn,$_SESSION['mid'],'address')?></td></tr>
</table>
<div align="center">&nbsp;</div>
<!--<div align="center"><?=$domain?></div>
<div align="center"><?=$support?></div>-->
</div>
</div>

<p>&nbsp;</p>

</div>
</div>


</div>
</div>

</div>
</div>
</div>

</div>


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