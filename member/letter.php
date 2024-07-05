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
function printDivList()
{
var divToPrint=document.getElementById('printdiv');
var newWin=window.open('','Print-Window','width=900,height=800');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
newWin.document.close();
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
<!--
Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
-->
<?php include('header.php')?><!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">
<div class="card" style="z-index:9999; margin-top:50px; ">
<div class="card-header">
<div class="card-title"><a href="javascript:history.go(-1)"><img src="images/back-page.png" height="16" width="20"> &nbsp; Welcome Letter</a>   </div>
</div>
</div>
<div class="row">

<div class="col-md-12">

<div class="card">

<div class="card-body" style="background:#FFFFFF;">

<p align="center"><a onClick="printDivList();" style="cursor:pointer;"> <img src="print.png" title="Print Letter" /></a></p>
<div id="printdiv" >
<div style="border:1px solid #000000;padding:10px;width:100%;min-height:650px;">

<table width="100%" border="0" style="padding:20px; font-size:16px;">
<tr height="50"><td colspan="2" style="font-size:18px; font-weight:bold;" align="center">You have registered successfully</td></tr>
<tr height="10">
<td height="37" align="center" valign="top" style="font-size:16px;margin-top:10px;">Welcome To <?=$title?></td>
</tr>

<tr>
<td align="center" valign="middle" style="font-size:18px;margin-top:150px;color:#663399;"><strong>A WAY TO UNLIMITED INCOME</strong></td></tr>
<tr>
<td height="34" align="center" valign="middle" style="font-size:18px;color:#663399;"><strong>INDEPENDENT BUSINESS PROGRAM</strong></td>
</tr>

<tr><td height="37" align="left" valign="middle" style="font-size:18px;"><strong>Welcome <?=$title?></strong></td>
</tr>

<tr height="50"><td height="28" align="left" valign="middle" style="font-size:16px;font-weight:bold;color:#663399;">Date: <?=getMember($conn,$_SESSION['mid'],'date')?> </td>
</tr>
<tr><td align="left" valign="middle" style="font-size:16px;">Dear <?=ucwords(getMember($conn,$_SESSION['mid'],'name'))?></td></tr>
<tr><td height="72" align="left" valign="middle" style="font-size:16px;">Thank you for choosing <?=$title?> a self employment business program. You can now be a part of a way to earn unlimited income and services provided the same to any destination in India..</td>
</tr>


<tr><td align="left" valign="middle" colspan="2" style="font-size:18px;font-weight:bold;">Your New User Account Details are as follows:</td></tr>
<tr><td align="left" valign="middle" colspan="2" style="font-size:16px;">
<table width="100%" border="1" cellpadding="0" cellspacing="0">
<tr align="center" style="font-weight:bold;">
<td>Name of Applicant</td>
<td>User ID</td>
<td>Password</td>
<td>Sponsor ID</td>
</tr>
<tr align="center">
<td><?=ucwords(getMember($conn,$_SESSION['mid'],'name'))?></td>
<td><?=getMember($conn,$_SESSION['mid'],'userid')?></td>
<td><?=base64_decode(getMember($conn,$_SESSION['mid'],'password'))?></td>
<td><?php if(getMember($conn,$_SESSION['mid'],'sponsor')){ ?><?=getMember($conn,$_SESSION['mid'],'sponsor')?><?php }else{?>----<?php }?></td>
</tr>
</table>


</td></tr>
<tr><td height="37">&nbsp;</td>
</tr>
<tr><td height="66" colspan="2" align="justify" valign="middle" style="font-size:16px;">
As a member of <?=$title?>. you shall avall all the facilities and services provided by the Company. To track your ID please visit <a href="http://<?=$domain?>/" target="_blank"><?=$domain?></a>
<div>&nbsp;</div></td>
</tr>
<tr>
<td height="62" colspan="2" align="justify" valign="middle" style="font-size:16px;">We once again thank you for considering <?=$title?>. and look forward to mutually beneficial relationship. Assuring you our best services at all times.
<div style="height:10px;">&nbsp;</div></td>
</tr>

</table>

<div style="width:100%;">
<table width="100%" border="0" style="font-size:14px; line-height:16px;">

<tr>
<td align="center" valign="middle" colspan="2" style="font-size:16px;padding-left:20px;">&nbsp;</td>
</tr>

<tr>
<td align="left" valign="middle" style="font-size:16px;padding-left:20px;"></td>
<td align="right" valign="middle" style="font-size:16px;">Yours Sincerely</td>
</tr>

<tr ><td colspan="2">&nbsp;</td></tr>
<tr>
<td align="left" valign="middle" style="font-size:16px;padding-left:20px;"></td>
<td align="right" valign="middle" style="font-size:16px;"></td>
</tr>
<tr>
<td align="left" valign="middle" style="font-size:16px;padding-left:20px;"></td>
<td align="right" valign="middle" style="font-size:16px;"><strong><?=$title?></strong> </td>

</tr>
<tr height="60"><td colspan="2">&nbsp;</td></tr>
</table>

<table width="100%" border="0" style="font-size:14px;">
<tr>
<td align="left" valign="middle" style="font-size:16px;"></td>
<td align="left" valign="middle" style="font-size:16px;"><strong style="color:#3399CC;"><?=$title?></strong> &copy;&nbsp;2020-2021</td>
</tr>

<tr height="60"><td colspan="2">&nbsp;</td></tr>

</table>
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

<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<?php include('footer.php')?>
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