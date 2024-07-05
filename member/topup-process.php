<?php
session_start();
include ('../administrator/includes/function.php');
if (!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=trim($_POST['userid']);
$loginuser=getMember($conn,$_SESSION['mid'],'userid');
$package=trim($_POST['package']);
$amount=getSettingsPackage($conn,$package,'amount');
$available=getFundWallet($conn,$loginuser);
if($available>=$amount)
{
$sql1 = "UPDATE `iv_member` SET `paystatus`='A',`package`='".$package."',`approved`='".date('Y-m-d')."' WHERE `userid`='".$userid."'";
$res1 = query($conn, $sql1);


if($amount>0)
{
$sql2="INSERT INTO `iv_member_package` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package. "','".$amount."','".date('Y-m-d')."')";
$res2=query($conn,$sql2);
}

$sqlb="INSERT INTO `iv_member_topup` (`userid`,`topupid`,`package`,`amount`,`date`) VALUES ('".$loginuser."','".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$resb=query($conn,$sqlb);

$sqlc = "UPDATE `iv_member_downline` SET `paystatus`='A' WHERE `fromid`='".$userid."'";
$resc=query($conn,$sqlc);

$sql21="INSERT INTO `iv_member_p1_count` (`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res21=query($conn,$sql21);

$sql22="INSERT INTO `iv_member_p1_count_pair` (`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res22=query($conn,$sql22);
//------------------Direct Bonus--------------------//
$sponsor=getMemberUserID($conn,trim($_POST['userid']),'sponsor');
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

//--------------Calculate team business---------------//
function getDownline($conn,$userid,$sponsor,$amount)
{
$sql12="INSERT INTO `iv_team_business`(`userid`,`fromid`,`amount`,`date`) VALUES('".$sponsor."','".$userid."','".$amount."','".date('Y-m-d')."')";
$res12=query($conn,$sql12);

$sponsor1= getMemberUserID($conn,$sponsor,'sponsor');
if($sponsor1)
{
getDownline($conn,$userid,$sponsor1,$amount);
}
}
if($sponsor)
{
getDownline($conn,$userid,$sponsor,$amount);
}

//---------------Level Bonus-----------//
include('calculate-level-bonus.php');
//------------------------------------//


$position=getMemberUserid($conn,$userid,'position');
$sponchek=getMemberUserid($conn,$userid,'sponsor');
function getXtremeDownline($conn,$userid,$placement,$position)
{
$sql="SELECT * FROM `iv_genealogy_p1` WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['userid'])
{
getXtremeDownline($conn,$userid,$fetch['userid'],$position);
}
}else{
$sqlch="SELECT * FROM `iv_genealogy_p1` WHERE `userid`='".$userid."'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch<1)
{
$sqls="INSERT INTO `iv_genealogy_p1` (`userid`,`placement`,`position`,`date`) VALUES('".$userid."','".$placement."','".$position."','".date('Y-m-d')."')";
$ress=query($conn,$sqls);

$sql6="UPDATE `iv_member` SET `placement`='".$placement."' WHERE `userid`='".$userid."'";
$res6=query($conn,$sql6);
}
}
}

if($sponchek!='' && $position!='')
{
getXtremeDownline($conn,$userid,$sponchek,$position);
}
//-----------------------------------------//



//-------------Count Calculation------------//
$sponmain=getMemberUserID($conn,$userid,'sponsor');
$placement=getUpline($conn,'iv_genealogy_p1',$userid);

function getSalesDistribute($conn,$userid,$placement,$k,$sponmain,$activeid)
{
$pos=getDownlinePosition($conn,'iv_genealogy_p1',$userid,$placement);
if($pos=='Left')
{
$lbal=getDownlineCountP1($conn,$placement,'left');
$tleft=($lbal+1);

$sqls="UPDATE `iv_member_p1_count` SET `left`='".$tleft."' WHERE `userid`='".$placement."'";
$ress=query($conn,$sqls);


$lcpair=getDownlineCountPairP1($conn,$placement,'left');
$tlcpair=($lcpair+1);
$sqlu="UPDATE `iv_member_p1_count_pair` SET `left`='".$tlcpair."' WHERE `userid`='".$placement."'";
$resu=query($conn,$sqlu);

}

if($pos=='Right')
{
$rbal=getDownlineCountP1($conn,$placement,'right');
$tright=($rbal+1);

$sqls="UPDATE `iv_member_p1_count` SET `right`='".$tright."' WHERE `userid`='".$placement."'";
$ress=query($conn,$sqls);

$rcpair=getDownlineCountPairP1($conn,$placement,'right');
$trcpair=($rcpair+1);
$sqlv="UPDATE `iv_member_p1_count_pair` SET `right`='".$trcpair."' WHERE `userid`='".$placement."'";
$resv=query($conn,$sqlv);
}

$k=$k+1;
$upline=getUpline($conn,'iv_genealogy_p1',$placement);
if($upline)
{
getSalesDistribute($conn,$placement,$upline,$k,$sponmain,$activeid);
}
}

$k=1;
$upline=getUpline($conn,'iv_genealogy_p1',$userid);
if($upline)
{
getSalesDistribute($conn,$userid,$upline,$k,$sponmain,$userid);
}

//---------------Matching Bonus-----------//
include('calculate-matching-bonus-p1.php');

//------------------------------------//



redirect('topup.php?case=check&m=1');
}else{
redirect('topup.php?e=4&case=check');
}
}
?>