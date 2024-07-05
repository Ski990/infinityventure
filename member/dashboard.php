<?php
session_start();
include('../administrator/includes/function.php');

if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
include('calculate-boost-level.php');
include('calculate-rcoin-auto-closed.php');
include('calculate-global-invest-bonus.php');
include('calculate-global-expire.php');

$nodirect=getNoOfActiveSponsor($conn,$userid);

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
<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
<script type="text/javascript" src="assets/js/ajax.js"></script>

</head>
<body style="background:#fff;">

<div class="wrapper">
<?php include('header.php');?>
<!--Sidebar -->
<?php include('leftmenu.php');?>

<!--End Sidebar -->

<div class="main-panel">
<div class="content">

<div class="page-inner">
<div class="card" style="z-index:9999; margin-top:50px; ">
<div class="card-header">
<div class="card-title"><a href="javascript:history.go(-1)"><img src="images/back-page.png" height="16" width="20"> &nbsp; Dashboard</a>   </div>
</div>
</div>


<div class="card-body" style="overflow:auto;background:#FFFFFF; min-height:1200px;">


<div>&nbsp;</div>
<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='I')
{
?>
<h3 align="center" style="font-size:18px;color:#FF0000;"><br /><a href="activation.php">Click here</a> to activate your account!</h3>
<?php }?>
<?php if($_REQUEST['m']==1){?>
<p align="center" style="color:#009900; padding-bottom:8px; font-size:16px;"><strong>Your account is successfully activated!</strong></p>
<?php }?>
<?php if($_REQUEST['m']==2){?>
<p align="center" style="color:#009900; padding-bottom:8px; font-size:16px;"><strong>Upgrade successfully!</strong></p>
<?php }?>
<?php if($_REQUEST['e']==1){?><div align="center" style="margin:0;padding:0;color:#FF0000;  background:#FFFFFF;font-size:16px; border-radius:15px;"><strong>Insufficient Wallet Balance!</strong></div><?php }?>

<?php if($_REQUEST['f']==1){?><div align="center" style="margin:0;padding:0;color:#00CC00;  background:#FFFFFF;font-size:16px;"><strong>Successfully Invested!</strong></div><?php }?>

<?php if($_REQUEST['p']==1){?><div align="center" style="margin:0;padding:0;color:#FF0000;  background:#FFFFFF;font-size:16px; border-radius:15px;"><strong>Please enter correct amount!</strong></div><?php }?>


<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="myBtn" style="visibility:hidden;"></button>
<div class="modal fade" id="myModal" role="dialog" style="z-index:9999;">
<div class="modal-dialog">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal"><span style="color:#000;">&times;</span></button></div>
<div class="modal-body">
<?php
$sqlp="SELECT * FROM `iv_popup` ORDER BY `id` DESC LIMIT 1";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
while($fetchp=fetcharray($resp))
{
?>
<img src="../administrator/popup/<?=$fetchp['banner']?>" width="100%"  />
<?php }}?>
</div>
</div>

<script>
function myFunction()
{
document.getElementById("myBtn").click();
}
</script>
</div>
</div>



<?php
$sql="SELECT * FROM `iv_announcement` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
?>
<marquee scrollamount="5"  align="center" style="background-color:#2d132c;color:#FFFFFF;border-radius:10px; padding:5px 15px;" direction="left">
<?php 
while($fetch=fetcharray($res))
{
?>
<span style="font-size:18px"><?=ucfirst(strip_tags(stripslashes($fetch['announcement'])))?></span>
<?php }?>
</marquee>
<div>&nbsp;</div>

<?php }?>

<?php
$sqlb="SELECT * FROM `iv_banner` WHERE `status`='A' ORDER BY `id` DESC LIMIT 1";
$resb=query($conn,$sqlb);
$numb=numrows($resb);
if($numb>0)
{
while($fetchb=fetcharray($resb))
{
?>
<div align="center">
<img src="../administrator/banner/<?=$fetchb['banner']?>" style="border-radius: 15px;"  width="100%">
</div>
<?php }}?>
<p align="center" style="color:#FF0000; padding-bottom:8px;font-size:22px; font-weight:bold;">1 R-Coin =&nbsp;<?=$currency?> <?=getSettingsRcoin($conn,'coinvalue')?></p>

<div>&nbsp;</div>
<div class="row">
<div class="col-md-6">
<div class="card" style=" background-image: radial-gradient(circle, #1a92aa, #00739d, #00538c, #003374, #0f1054);width:100%;">
<h5 align="center" style=" background:#822659; height:25px; color:#FFFFFF;font-size:18px;"><strong>Congratulation! </strong></h5>
<div class="row">
<div class="col-12">
<div style="padding:20px; height:310px">
<div align="center"><?php if(getMember($conn,$_SESSION['mid'],'profile')){?><img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" height="100" width="100" style="border-radius:50px;" /><?php }else{?><img src="images/profile.jpg" height="100" width="100" style="border-radius:50px;" /><?php }?></div>
<h3 align="center" style="color:#FFFF00;font-size:36px;font-weight:bold;font-family:Trebuchet MS;"><?=strtoupper(getSettingsPackage($conn,getLatestPackageID($conn,$userid,'package'),'package'))?></h3>
<div align="center" class="card-category"><span style="font-size:24px; font-weight:600; color:#fff;"> <?=$userid?> </span></div>
<div align="center" class="card-category" style="color:#fff; font-size:12px;"><?=getMember($conn,$_SESSION['mid'],'name')?> <?php if($paystatus=='A'){?><span style="color:#009900;background:#FFFFFF;padding:3px 5px;border-radius:10px; font-size:12px;">Active</span><?php }else{?><span style="color:#FF0000;background:#FFFFFF;padding:3px 5px;border-radius:10px; font-size:12px;">Pending</span><?php }?></div>
<?php if(getDateConvert(getMember($conn,$_SESSION['mid'],'approved'))){?><div align="center" class="card-category"><span style="font-size:15px; font-weight:600;color:#fff;"> Active Date: <?=getDateConvert(getMember($conn,$_SESSION['mid'],'approved'))?></span></div><?php }?>
<div align="center" class="card-category"><span style="font-size:15px; font-weight:600;color:#fff;"> Joining Date: <?=getDateConvert(getMember($conn,$_SESSION['mid'],'date'))?></span></div>
</div>
</div>
</div>
</div>
</div>

<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='A')
{?>
<div class="col-md-6">
<div class="card" style="height:340px">
<h5 align="center" style="background:#822659; height:25px; color:#FFFFFF;font-size:18px;"><strong>Joining Link</strong></h5>
<div class="card-body">
<div align="center">
<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://<?=$domain?>/introducer.php?intr=<?=$userid?>&choe=UTF-8" title="<?=$title?>" />
</div>
<h5 align="center" id="p1" style="color:#000">http://<?=$domain?>/introducer.php?intr=<?=$userid?></h5>
<div align="center"><button onClick="copyToClipboard('#p1')" id="cpbutton" class="btn btn-primary">Copy Link</button></div>
</div>
</div>
</div>
<?php }?>

</div>


<div>&nbsp;</div>



<div class="row">

<div class="col-6 col-md-6 col-lg-3">
<div class=" card-stats card-round" >
<div class="card-body" style="background:#07054d;border-radius:10px; margin-bottom:10px;" >
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/user.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff; font-size:15px;">User ID</p>
<h4 align="center" class="card-title" style="font-size:22px;; color:#fff;"><?=$userid?>&nbsp;<?php if($paystatus=='A'){?>
<span style="color:#009900;background:#FFFFFF;padding:3px 5px;border-radius:10px; font-size:14px;">Active</span><?php }else{?><span style="color:#FF0000;background:#FFFFFF;padding:3px 5px;border-radius:10px; font-size:14px;">Pending</span><?php }?></h4>
</div>
</div>
</div>
</div>
</div>
</div>




<?php if(getMember($conn,$_SESSION['mid'],'sponsor')){?>
<div class="col-6 col-md-6 col-lg-3">
<div class=" card-stats card-round" >
<div class="card-body"   style="background:#07054d;border-radius:10px;" >
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/user.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff; font-size:15px;">Sponsor ID</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=getMember($conn,$_SESSION['mid'],'sponsor')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<?php }?>






<div class="col-6 col-md-6 col-lg-3">
<div class=" card-stats card-round">
<div class="card-body"  style="background:#07054d;border-radius:10px;" >
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff; font-size:15px;">Total Income</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=number_format(getTotalIncomeMember($conn,$userid),2)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="col-6 col-md-6 col-lg-3">
<div class=" card-stats card-round">
<div class="card-body"  style="background:#07054d;border-radius:10px;" >
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff; font-size:15px;">Direct Bonus</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getMemberDirectBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center"><img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;">Level Pair Bonus</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getMemberLevelBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;">Global Investment Bonus</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getMemberGlobalInvestmentBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;"><?=getMemberSettingsPackagename($conn,'P1','packagename')?> Bonus</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getMemberMatchingP1Bonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;"><?=getMemberSettingsPackagename($conn,'P2','packagename')?> Bonus</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getMemberMatchingP2Bonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;"><?=getMemberSettingsPackagename($conn,'P3','packagename')?> Bonus</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?>  <?=getMemberMatchingP3Bonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;"><?=getMemberSettingsPackagename($conn,'P4','packagename')?> Bonus</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getMemberMatchingP4Bonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;"><?=getMemberSettingsPackagename($conn,'P5','packagename')?> Bonus</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getMemberMatchingP5Bonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>




<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;">Boosting Level Bonus</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getBoostingLevelBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>




<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;">Boosting Upgrade Deduct</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getMemberBoostingUpgrade($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/withh.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;">Pending Withdrawal</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"> <?=$currency?> <?=getPendingWithdrawalMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>




<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/withh.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff; font-size:15px;">Approved Withdrawal</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"> <?=$currency?> <?=getApprovedWithdrawalMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>





<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/withh.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff; font-size:15px;">Current Wallet</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getAvailableWallet($conn,$userid)?></span></h4>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center"> <img src="images/withh.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;  font-size:15px;">Fund Wallet</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getFundWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center"> <img src="images/withh.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;  font-size:15px;">R-Coin Wallet</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getRcoinWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center"> <img src="images/withh.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;  font-size:15px;">CTO Wallet</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getCTOWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center"> <img src="images/withh.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;  font-size:15px;">Global Wallet</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getGlobalWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center"> <img src="images/withh.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;  font-size:15px;">Boosting Wallet</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getBoostingWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-6 col-md-6 col-lg-3">
<div class="card card-stats card-round">
<div class="card-body" style="background:#07054d;border-radius:10px;">
<div class="row align-items-center">
<div class="col-md-12">
<p align="center" > <img src="images/bonus.png" width="30px"/> </p>
</div>
<div class="col-md-12">
<div class="numbers">
<p align="center" class="card-category" style="color:#fff;font-size:15px;">Team Business</p>
<h4 align="center" class="card-title" style="font-size:22px; color:#fff;"><?=$currency?> <?=getTotalTeamBusinees($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


</div>


<div class="row">
<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='A')
{
?>
<?php 
$sql="SELECT * FROM `iv_settings_global_investment` ORDER BY `package`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>

<div class="col-md-4">
<div style="background:#fff; width:100%; min-height:400px; border:solid #666666 1px; border-radius:10px;">


<p align="center"><img src="../administrator/investment/<?=$fetch['image']?>" width="100%" style="border-radius:10px; padding:6px;"/></p>

<p align="center" style="padding:0; margin:0; font-size:16px; color:#000000;"><strong style="color:#000066;"> Package: </strong> <?=$fetch['package']?></p>

<p align="center" style="padding:0; margin:0; font-size:16px; color:#000000;"><strong style="color:#000066;"> Rs: </strong> <?=$fetch['amount']?></p>

<form class="form" action="service-process.php?package=<?=$fetch['id']?>" method="post">
<div class="col-md-12">
<div class="form-group form-group-default">
<label>Wallet<span style="color:#CC0000;">*</span></label>
<select class="form-control" name="wallet" required>
<option value="">Select Wallet</option>
<option value="Fund Wallet">Fund Wallet</option>
<option value="Global Wallet">Global Wallet</option>
</select>
</div>
</div>
<div class="col-md-12">
<div class="form-group form-group-default">
<label>No of Quantity<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="noquantity" placeholder="Enter No of Quantity" value="" required>
</div>
</div>
<div class="col-md-12">
<div class="form-group form-group-default">
<label>Amount<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="amount" placeholder="Enter Amount" value="" required>
</div>
</div>

<div class="row mt-3">
<div class="col-md-12">
<div class="text-center mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-info">Invest Now</button>
</div>
</div>
</div>
</form>


</div>



</div>




<?php }} ?>
<?php }?>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>




</div>


</div>




</div>
</div>




</div>
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



<?php
$sqlp="SELECT * FROM `iv_popup` ORDER BY `id` LIMIT 1";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
?>
<script>myFunction()</script>
<?php }?>


</body>
</html>