<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='add')
{
$userid=$prefix.rand(1111111,9999999);

$sql="INSERT INTO `iv_member` (`package`,`userid`,`name`,`phone`,`email`,`address`,`password`,`bname`,`branch`,`accname`,`accno`,`ifscode`,`status`,`paystatus`,`date`,`approved`) VALUES('".trim($_POST['package'])."','".$userid."','".trim(mysqli_real_escape_string($conn,$_POST['name']))."','".trim(mysqli_real_escape_string($conn,$_POST['phone']))."','".trim(mysqli_real_escape_string($conn,$_POST['email']))."','".trim(mysqli_real_escape_string($conn,$_POST['address']))."','".base64_encode(trim(mysqli_real_escape_string($conn,$_POST['password'])))."','".trim(mysqli_real_escape_string($conn,$_POST['bname']))."','".mysqli_real_escape_string($conn,$_POST['branch'])."','".trim(mysqli_real_escape_string($conn,$_POST['accname']))."','".trim(mysqli_real_escape_string($conn,$_POST['accno']))."','".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."','A','A','".date('Y-m-d')."','".date('Y-m-d')."')";
$res=query($conn,$sql);

$sql1="INSERT INTO `iv_genealogy_p1`(`userid`,`placement`,`position`,`date`) VALUES ('".$userid."','','','".date('Y-m-d')."')"; 
$res1=query($conn,$sql1);

$package=trim($_POST['package']);
$amount=getSettingsPackage($conn,$package,'amount');
if($amount>0)
{
$sqlp="INSERT INTO `iv_member_package` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package."','".$amount."','".date('Y-m-d')."')"; 
$resp=query($conn,$sqlp);
$mempackid=mysqli_insert_id($conn);
}

$sql21="INSERT INTO `iv_member_p1_count` (`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res21=query($conn,$sql21);

$sql22="INSERT INTO `iv_member_p1_count_pair` (`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res22=query($conn,$sql22);

//--------Daily  Bonus------------//
$bonus=getSettingsPackage($conn,$package,'dailybonus');
//$bonus=($amount*$dailyper)/100;
if($bonus>0)
{
$sql61="INSERT INTO `iv_member_daily`(`userid`,`package`,`dailybonus`,`status`,`date`) VALUES('".$userid."','".$package."','".$bonus."','R','".date('Y-m-d')."')";
$res61=query($conn,$sql61);

}

redirect('member.php');
}
//---------------------------------------------------//
if($_REQUEST['case']=='edit')
{
$sql3="UPDATE `iv_member` SET `name`='".trim($_POST['name'])."',`email`='".mysqli_real_escape_string($conn,$_POST['email'])."',`phone`='".mysqli_real_escape_string($conn,$_POST['phone'])."',`password`='".base64_encode($_POST['password'])."',`address`='".mysqli_real_escape_string($conn,$_POST['address'])."',`bname`='".mysqli_real_escape_string($conn,$_POST['bname'])."',`branch`='".mysqli_real_escape_string($conn,$_POST['branch'])."',`accname`='".mysqli_real_escape_string($conn,$_POST['accname'])."',`accno`='".mysqli_real_escape_string($conn,$_POST['accno'])."',`ifscode`='".mysqli_real_escape_string($conn,$_POST['ifscode'])."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res3=query($conn,$sql3);

redirect('member.php?m=1&page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql2="UPDATE `iv_member` SET `status`='".$st."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2); 

redirect('member.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_member` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql); 

redirect('member.php?'.mysqli_real_escape_string($conn,$_REQUEST['page']));
}
}


?>