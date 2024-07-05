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
$amount=getSettingsPlatinumPackage($conn,$package,'amount');
$avafund=getFundWallet($conn,$userid);
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');

if($avafund>=$amount)
{
$sqla="INSERT INTO `iv_member_platinum_package_upgrade` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$resa=query($conn,$sqla);

$sql2="INSERT INTO `iv_member_platinum_package` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$res2=query($conn,$sql2);

//  platinum-monthly//

$sqlm="SELECT * FROM `iv_settings_platinum_monthly` WHERE `package`='".$package."'";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
$i=1;
if($numm>0)
{
while($fetchm=fetcharray($resm))
{
$days=$i*30;

$date=strtotime(date('Y-m-d'));
$stdate=date('Y-m-d',strtotime('+'.$days.' days',$date));

$sqlmt="INSERT INTO `iv_commission_platinum_monthly`(`userid`,`package`,`month`,`bonus`,`status`,`date`) VALUES('".$userid."','".$package."','".$fetchm['month']."','".$fetchm['bonus']."','H','".$stdate."')";
$resmt=query($conn,$sqlmt);

$i++;
}
}

$sqlml="SELECT * FROM `iv_settings_platinum_package` WHERE `clubbenefits`='Y' ";
$resml=query($conn,$sqlml);
$numml=numrows($resml);
if($numml>0)
{
$sqlms="INSERT INTO `iv_member_platinum_club`(`userid`,`package`,`date`) VALUES('".$userid."','".$package."','".date('Y-m-d')."')";
$resml=query($conn,$sqlms);
}


 
//------------------------------------//
include('calculate-platinum-generation-bonus.php');
//--------------------------------//

redirect('platinum-package-upgrade.php?m=1');
}else{
redirect('platinum-package-upgrade.php?e=2');
}
}
?> 