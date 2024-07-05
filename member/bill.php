<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$left=3;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
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
<body>
<div class="wrapper">
<!--
Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
-->
<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">


<div class="row">

<div class="col-lg-12">
<div style="min-height:850px;">
<div align="center" class="">
	<p align="center" style="color:#FF0000; font-size:22px; padding-top:5px;"><a onClick="printDivList()" style="text-decoration:none;">TAKE A PRINT OUT</a>
	
	</p>
	<p align="center"><a onClick="printDivList()" style="cursor:pointer;"><img src="images/print.png" border="0" style="height:16px; width:16px;"/></a>
	<!--<a onClick="captureCurrentDiv()" style="cursor:pointer;"><img src="images/download.png" border="0" style="height:16px; width:16px;"/></a></p>-->

</div>
<?php
$sql="SELECT * FROM `iv_member_purchase_product` WHERE `billno`='".$_REQUEST['billno']."' AND `userid`='".$_REQUEST['userid']."'";
$res=query($conn,$sql); $num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
}
?>
<div class="col-md-12 col-md-offset-2 col-md-offset-2" align="center" >
<div id="printdiv" style="background:#FFFFFF;border:1px solid #000000;padding:10px; overflow:auto;">

<table width="98%" border="0" cellspacing="0" cellpadding="0" >
<tr height="30">
<td align="left" valign="middle" colspan="2"><p style="color:#000000;font-size:18px;"><img src="images/logo.png" border="0" style="height:50px; width:120px;"/></p></td>
<td align="right" valign="middle" colspan="2"><p style="color:#000000;font-size:18px;">Tax Invoice/Bill of Supply/Cash Memo</p></td>
</tr>
 
</table>

<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr height="20">
<td align="left" valign="middle" colspan="2"><p style="font-size:18px;color:#000000;">Member Details:</p></td>
<td align="right" valign="middle" colspan="2"><p style="font-size:18px;color:#000000;">Company Details:</p></td>

</tr>
<tr height="20">
<td align="left" valign="top" colspan="2"><p style="color:#000000;font-size:14px;">
<p style="color:#000000;font-size:14px;">
Bill No : <?=$fetch['billno']?><br>
Bill Date : <?=getDateConvert($fetch['date'])?> <br>
Userid : <?=$fetch['userid']?><br>
Name : <?=ucwords(getMemberUserid($conn,$fetch['userid'],'name'))?><br>
Phone : <?=ucwords(getMemberUserid($conn,$fetch['userid'],'phone'))?><br>
Email : <?=ucwords(getMemberUserid($conn,$fetch['userid'],'email'))?><br><?=ucwords(getMemberUserid($conn,$fetch['userid'],'address'))?>
Pay Method: <?=$fetch['type']?></p></p></td>


</tr>

</table>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr >
<td width="5%" align="center" valign="middle" class="header" style="color:#000000;">Sl_No.</td>
<td width="17%" align="center" valign="middle" class="header" style="color:#000000;">Title</td>
<td width="15%" align="center" valign="middle" class="header" style="color:#000000;">Original_Amount</td>

<td width="15%" align="center" valign="middle" class="header" style="color:#000000;">Discounted_Amount</td>
<!--<td width="10%" align="center" valign="middle" class="header" style="color:#000000;">MRP</td>-->
<td width="11%" align="center" valign="middle" class="header" style="color:#000000;">Quantity</td>
<td width="16%" align="center" valign="middle" class="header" style="color:#000000;">Amount</td>

<td width="16%" align="center" valign="middle" class="header" style="color:#000000;">Total_Amount</td>
</tr>
<?php
$sql1="SELECT * FROM `iv_member_purchase_product` WHERE `billno`='".$_REQUEST['billno']."'AND `userid`='".$_REQUEST['userid']."' ORDER BY `id` DESC";
	$res1=query($conn,$sql1);
	$num1=numrows($res1);
	$i=1;
	if($num1>0)
	{
	while($fetch1=fetcharray($res1))
{
?>

<tr >
<td align="center" valign="middle" class="<?=$class?>"><?=$i?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=stripslashes(getProduct($conn,$fetch1['proid'],'title'))?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=stripslashes(getProduct($conn,$fetch1['proid'],'price'))?></td>

<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=$fetch1['price']?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=$fetch1['quantity']?></pre></td>

<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=$fetch1['total']?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?= $fetch1['total']?></td>

</tr>
<?php $i++; }}?>
<tr >


</tr>
<tr >


<td width="16%" align="center"  valign="middle" ><p style="color:#000000;font-size:18px;"><?=getTotalOrderMemberPurchaseBillno($conn,$fetch['userid'],$fetch['billno'])?></p></td>
</tr>
<tr>
<td align="left" valign="middle" colspan="9" ><p style="color:#000000;font-size:18px;">Amount In Words:&nbsp;<?=getNumtoWord($conn,getTotalOrderMemberPurchaseBillno($conn,$fetch['userid'],$fetch['billno']))?></p></td>
</tr>







</table>
<div>&nbsp;</div>
<div>Please Check our Website</div>
<div> <?=$domain?></div>



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
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
Metronic.init(); // init metronic core componets
Layout.init(); // init layout
Demo.init(); // init demo features 
Index.init();   
TableAdvanced.init();
});
</script>

<script type="text/javascript" language="javascript">
function printDivList()
{
var divToPrint=document.getElementById('printdiv');
var newWin=window.open('','Print-Window','width=900,mheight=800');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
newWin.document.close();
}
</script>
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript" src="js/html2canvas.js"></script> 
<script type="text/javascript">
function captureCurrentDiv()
{
html2canvas([document.getElementById('printdiv')], {   
onrendered: function(canvas)  
{
var img = canvas.toDataURL()
$.post("save.php", {data: img}, function (file) {
window.location.href =  "download-print.php?path="+file});   
}
});
}

</script>

</body>
</html>
 