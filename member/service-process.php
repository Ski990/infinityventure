<?php
session_start();
include ('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$package=trim($_REQUEST['package']);
$amount=$_POST['amount'];
$noquantity=$_POST['noquantity'];
$wallet=$_POST['wallet'];

$Packamt=getSettingsGlobalInvestment($conn,$package,'amount');
$lockingdays=getSettingsGlobalInvestment($conn,$package,'lockingdays');
$validdays=getSettingsGlobalInvestment($conn,$package,'validdays');
$ava=getFundWallet($conn,$userid);
$global=getGlobalWallet($conn,$userid);


$actamount=($Packamt*$noquantity);


$date=strtotime(date('Y-m-d'));
$lockexpire=date('Y-m-d',strtotime('+'.$lockingdays.' days',$date));
$validdate=date('Y-m-d',strtotime('+'.$validdays.' days',$date));
if($wallet=='Fund Wallet')
{
if($actamount==$amount)
{

if($ava>=$amount)
{
if($amount>0)
{
$sql2="INSERT INTO `iv_member_global_investment` (`userid`,`wallet`,`package`,`amount`,`noquantity`,`total`,`validdate`,`lockexpire`,`status`,`date`) VALUES ('".$userid."','".$wallet. "','".$package. "','".$Packamt."','".$noquantity."','".$amount."','".$validdate."','".$lockexpire."','R','".date('Y-m-d')."')";
$res2=query($conn,$sql2);
}

redirect("dashboard.php?f=1");
}
else
{
redirect("dashboard.php?e=1");
}
}else
{
redirect("dashboard.php?p=1");
}
}else{
if($actamount==$amount)
{

if($global>=$amount)
{
if($amount>0)
{
$sql2="INSERT INTO `iv_member_global_investment` (`userid`,`wallet`,`package`,`amount`,`noquantity`,`total`,`validdate`,`lockexpire`,`status`,`date`) VALUES ('".$userid."','".$wallet. "','".$package. "','".$Packamt."','".$noquantity."','".$amount."','".$validdate."','".$lockexpire."','R','".date('Y-m-d')."')";
$res2=query($conn,$sql2);
}

redirect("dashboard.php?f=1");
}
else
{
redirect("dashboard.php?e=1");
}
}else
{
redirect("dashboard.php?p=1");
}
}
}
?>