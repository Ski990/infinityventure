<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$package=trim($_POST['package']);
$amount=getSettingsPackage($conn,$package,'amount');
$avafund=getFundWallet($conn,$userid);
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
if($avafund>=$amount)
{
$sqla="INSERT INTO `iv_member_package_upgrade` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$resa=query($conn,$sqla);

$sql2="INSERT INTO `iv_member_package` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$res2=query($conn,$sql2);



//------------------Direct Bonus--------------------//
if($sponsor)
{
$dirper=getSettingsPackage($conn,$package,'directper');
$bonus=($amount*$dirper)/100;
if($bonus>0)
{
$sqld="INSERT INTO `iv_commission_direct` (`userid`,`fromid`,`package`,`amount`,`directper`,`bonus`,`date`) VALUES ('".$sponsor."','".$userid."','".$package."','".$amount."','".$dirper."','".$bonus."','".date('Y-m-d')."')";
$resd=query($conn,$sqld);
}
}

//--------Daily  Bonus------------//
$dailyper=getSettingsPackage($conn,$package,'dailyper');
$mempackid=mysqli_insert_id($conn);
$nodays=getSettingsPackage($conn,$package,'nodays');
if($dailyper>0)
{
$sql61="INSERT INTO `iv_member_daily`(`userid`,`package`,`dailyper`,`nodays`,`status`,`date`) VALUES('".$userid."','".$package."','".$dailyper."','".$nodays."','R','".date('Y-m-d')."')";
$res61=query($conn,$sql61);

$dailybonus=($amount*$dailyper)/100;
if($dailybonus>0)
{
$date=strtotime(date('Y-m-d'));
$stdate=date('Y-m-d',strtotime('+1 days',$date));

if($nodays>0)
{
for($i=0;$i<$nodays;$i++)
{
$stdate1=date('Y-m-d',strtotime('+'.$i.' days',strtotime($stdate)));
$day=date('l',strtotime($stdate1));

$sql7="INSERT INTO `iv_commission_daily`(`userid`,`mempackid`,`package`,`bonus`,`status`,`date`) VALUES('".$userid."','".$mempackid."','".$package."','".$dailybonus."','H','".$stdate1."')";
$res7=query($conn,$sql7);
}
}
}
}
//-------------------------//



 
//------------------------------------//
include('calculate-generation-bonus.php');
//--------------------------------//

redirect('package-upgrade.php?m=1');
}else{
redirect('package-upgrade.php?e=2');
}
}
?> 