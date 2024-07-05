<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$amount=getSettingsBoosting($conn,'boostamt');
$boostwallet=getBoostingWallet($conn,$userid);
if($boostwallet>=$amount)
{
$date=date('Y-m-d');
$numzt1=getBoostUpgradeTimeByDate($conn,$userid,$date);
$setnotime=getSettingsBoostLimit($conn,'notime');
if($numzt1<$setnotime)
{
$sql2="INSERT INTO `iv_member_boosting_upgrade` (`userid`,`amount`,`date`) VALUES ('".$userid."','".$amount."','".date('Y-m-d')."')";
$res2=query($conn,$sql2);
$boostid=mysqli_insert_id($conn);

$nopresent=getNoMemberBoostUpgrade($conn,$userid);
if($nopresent>=1)
{
$userid=$userid.'-'.$nopresent;
}else{
$userid=getMember($conn,$_SESSION['mid'],'userid');
}

 
//--------------Genealogy Pool 1 Placement Logic----------------//
$sqlc2="SELECT * FROM `iv_genealogy_boosting`";
$resc2=query($conn,$sqlc2);
$numc2=numrows($resc2);
if($numc2>0)
{
$sqld2="SELECT * FROM `iv_genealogy_boosting` WHERE `userid`='".$userid."'";
$resd2=query($conn,$sqld2);
$numd2=numrows($resd2);
if($numd2<1)
{
$autoplace1=getPlacementIDBoostingUpgrade($conn);

$pvalue=getPoolPosition($conn,'iv_genealogy_boosting',$autoplace1);
if($pvalue<1){$position='Left';}else{$position='Right';}

$sqle2="INSERT INTO `iv_genealogy_boosting`(`userid`,`placement`,`orguserid`,`position`,`date`,`boostid`) VALUES('".$userid."','".$autoplace1."','".getMember($conn,$_SESSION['mid'],'userid')."','".$position."','".date('Y-m-d')."','".$boostid."')";
$resje2=query($conn,$sqle2);

$sqlf2="SELECT * FROM `iv_genealogy_boosting` WHERE `placement`='".$autoplace1."'";
$resf2=query($conn,$sqlf2);
$numf2=numrows($resf2);
if($numf2>=2)
{

$sqlh2="SELECT * FROM `iv_genealogy_boosting` WHERE `userid`='".$autoplace1."'";
$resh2=query($conn,$sqlh2);
$numh2=numrows($resh2);
if($numh2>0)
{
$fetchh2=fetcharray($resh2);

$sqli2="SELECT * FROM `iv_genealogy_boosting` WHERE `id`>'".$fetchh2['id']."' ORDER BY `id` LIMIT 1";
$resi2=query($conn,$sqli2);
$numi2=numrows($resi2);
if($numi2>0)
{
$fetchi2=fetcharray($resi2);

$sqlj2="UPDATE `iv_genealogy_boosting_placement` SET `placement`='".$fetchi2['userid']."' ORDER BY `id` LIMIT 1";
$resj2=query($conn,$sqlj2);
}

}
}
}
}else{
$sqlc1="INSERT INTO `iv_genealogy_boosting` (`userid`,`orguserid`,`placement`,`position`,`date`,`boostid`) VALUES ('".$userid."','".getMember($conn,$_SESSION['mid'],'userid')."','','','".date('Y-m-d')."','".$boostid."')";
$resc1=query($conn,$sqlc1);

$sqlc1="INSERT INTO `iv_genealogy_boosting_placement` (`placement`) VALUES ('".$userid."')";
$resc1=query($conn,$sqlc1);
}

redirect('booster-upgrade.php?m=1');
}else{
redirect('booster-upgrade.php?s=1');
}
}else{
redirect('booster-upgrade.php?e=1');
}
}
}
?> 