<?php
//-----------------Placement Logic--------------------------//
$position=getMemberUserID($conn,$userid,'position');
$sponchek=getMemberUserID($conn,$userid,'sponsor');

function getXtremeDownline($conn,$userid,$placement,$position)
{
$sql="SELECT * FROM `rg_genealogy` WHERE `placement`='".$placement."' AND `position`='".$position."'";
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
$sqlch="SELECT * FROM `rg_genealogy` WHERE `userid`='".$userid."'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch<1)
{
$sqls="INSERT INTO `rg_genealogy` (`userid`,`placement`,`position`,`date`) VALUES('".$userid."','".$placement."','".$position."','".date('Y-m-d')."')";
$ress=query($conn,$sqls);

$sqlj2="UPDATE `rg_member` SET `placement`='".$placement."' WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$resj2=query($conn,$sqlj2);
}
}
}

if($sponchek!='' && $position!='')
{
getXtremeDownline($conn,$userid,$sponchek,$position);
}

?>
