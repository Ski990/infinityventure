<?php
session_start();
include ('../administrator/includes/function.php');
if (!isset($_SESSION['mid']))
{ 
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$package=trim($_POST['package']);
$pname=getSettingsPackage($conn,$package,'package');
$ava=getFundWallet($conn,$userid);
$amount=getSettingsPackage($conn,$package,'amount');
if($package>0)
{
if($ava>=$amount)
{
$sqlh="SELECT * FROM `iv_member_package_upgrade` WHERE `userid`='".$userid."' AND `package`='".$package."'";
$resh=query($conn,$sqlh);
$numh=numrows($resh);
if($numh<1)
{

if($amount>0)
{
$sqlp="INSERT INTO `iv_member_package_upgrade` (`userid`,`package`,`amount`,`date`) VALUES('".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$resp=query($conn,$sqlp);


$sql51="INSERT INTO `iv_member_package` (`userid`,`package`,`amount`,`date`) VALUES('".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$res51=query($conn,$sql51);



//------------------Direct Bonus--------------------//
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
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
//--------------calculate team business---------------//

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

if($pname=='P2')
{
$genealogy='iv_genealogy_p2';
$placement='iv_genealogy_p2_placement';
$count='iv_member_p2_count';
$countpair='iv_member_p2_count_pair';

}else if($pname=='P3')
{
$genealogy='iv_genealogy_p3';
$placement='iv_genealogy_p3_placement';
$count='iv_member_p3_count';
$countpair='iv_member_p3_count_pair';

}else if($pname=='P4')
{
$genealogy='iv_genealogy_p4';
$placement='iv_genealogy_p4_placement';
$count='iv_member_p4_count';
$countpair='iv_member_p4_count_pair';

}else{
$genealogy='iv_genealogy_p5';
$placement='iv_genealogy_p5_placement';
$count='iv_member_p5_count';
$countpair='iv_member_p5_count_pair';

}

$sql21="INSERT INTO ".$count." (`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res21=query($conn,$sql21);

$sql22="INSERT INTO ".$countpair." (`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$res22=query($conn,$sql22);
//-----------------------------------------//

//-------------------Genealogy Calcuation----------------------//
$sqlw="SELECT * FROM ".$genealogy."";
$resw=query($conn,$sqlw);
$numw=numrows($resw);
if($numw>0)
{
$sqlq="SELECT * FROM ".$genealogy." WHERE `userid`='".$userid."'";
$resq=query($conn,$sqlq);
$numq=numrows($resq);
if($numq<1)
{
$basicplace=getPlacementID($conn,$placement);

$pvalue=getPoolPosition($conn,$genealogy,$basicplace);
if($pvalue<1){$position='Left';}else{$position='Right';}

$sqlr="INSERT INTO ".$genealogy." (`userid`,`placement`,`position`,`status`,`date`) VALUES('".$userid."','".$basicplace."','".$position."','I','".date('Y-m-d')."')";
$resr=query($conn,$sqlr);

$sqls="SELECT * FROM ".$genealogy." WHERE `placement`='".$basicplace."'";
$ress=query($conn,$sqls);
$nums=numrows($ress);
if($nums>=2)
{
$sql19="UPDATE ".$genealogy." SET status='C' WHERE userid='".$basicplace."'";
$res19=query($conn,$sql19);

$sqlt="SELECT * FROM ".$genealogy." WHERE `userid`='".$basicplace."'";
$rest=query($conn,$sqlt);
$numt=numrows($rest);
if($numt>0)
{
$fetcht=fetcharray($rest);

$sqlu="SELECT * FROM ".$genealogy." WHERE `id`>'".$fetcht['id']."' ORDER BY `id` LIMIT 1";
$resu=query($conn,$sqlu);
$numu=numrows($resu);
if($numu>0)
{
$fetchu=fetcharray($resu);

$sqlv="UPDATE ".$placement." SET `placement`='".$fetchu['userid']."' ORDER BY `id` LIMIT 1";
$resv=query($conn,$sqlv);
}
}
}

}
}else{
$sqlc1="INSERT INTO ".$genealogy." (`userid`,`placement`,`position`,`status`,`date`) VALUES ('".$userid."','','','I','".date('Y-m-d')."')";
$resc1=query($conn,$sqlc1);

$sqlc1="INSERT INTO ".$placement." (`placement`) VALUES ('".$userid."')";
$resc1=query($conn,$sqlc1);
}

//-------------Count Calculation------------//
$placement=getUpline($conn,$genealogy,$userid);

function getSalesDistribute($conn,$genealogy,$count,$countpair,$userid,$placement,$k,$activeid)
{
$pos=getDownlinePosition($conn,$genealogy,$userid,$placement);
if($pos=='Left')
{
$lbal=getDownlineCount($conn,$count,$placement,'left');
$tleft=($lbal+1);

$sqls="UPDATE ".$count." SET `left`='".$tleft."' WHERE `userid`='".$placement."'";
$ress=query($conn,$sqls);


$lcpair=getDownlineCountPair($conn,$countpair,$placement,'left');
$tlcpair=($lcpair+1);
$sqlu="UPDATE ".$countpair." SET `left`='".$tlcpair."' WHERE `userid`='".$placement."'";
$resu=query($conn,$sqlu);

}

if($pos=='Right')
{
$rbal=getDownlineCount($conn,$count,$placement,'right');
$tright=($rbal+1);

$sqls="UPDATE ".$count." SET `right`='".$tright."' WHERE `userid`='".$placement."'";
$ress=query($conn,$sqls);

$rcpair=getDownlineCountPair($conn,$countpair,$placement,'right');
$trcpair=($rcpair+1);
$sqlv="UPDATE ".$countpair." SET `right`='".$trcpair."' WHERE `userid`='".$placement."'";
$resv=query($conn,$sqlv);
}

$k=$k+1;
$upline=getUpline($conn,$genealogy,$placement);
if($upline)
{
getSalesDistribute($conn,$genealogy,$count,$countpair,$placement,$upline,$k,$activeid);
}
}

$k=1;
$upline=getUpline($conn,$genealogy,$userid);
if($upline)
{
getSalesDistribute($conn,$genealogy,$count,$countpair,$userid,$upline,$k,$userid);
}



if($pname=='P2')
{
include('calculate-matching-bonus-p2.php');


}else if($pname=='P3')
{
include('calculate-matching-bonus-p3.php');

}else if($pname=='P4')
{
include('calculate-matching-bonus-p4.php');


}else{
include('calculate-matching-bonus-p5.php');


}


//---------------Level Bonus---------------//
include('calculate-level-bonus.php');
//------------------------------------//

redirect('upgrade.php?m=1');
}else{
redirect('upgrade.php?e=2');
}
}else{
redirect('upgrade.php?e=3');
}
}else{
redirect('upgrade.php?e=1');
}
}
}
?>