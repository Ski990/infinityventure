<?php
$sqlvt1="SELECT * FROM `iv_genealogy_boosting` WHERE `orguserid`='".$userid."' ORDER BY `id`";
$resvt1=query($conn,$sqlvt1);
$numvt1=numrows($resvt1);
if($numvt1>0)
{
while($fetchvt1=fetcharray($resvt1))
{
$team=getCountMatrix($conn,$fetchvt1['userid'],'iv_genealogy_boosting','Level 2');
$noTeam=getSettingsBoostingLevel($conn,'Level 2','team');
if($team>=$noTeam)
{
$boostlevelper=getSettingsBoosting($conn,'boostlevel');
$boostamount=getSettingsBoosting($conn,'boostamt');
$totalamount=$boostamount*6;
$boostlevel=($totalamount*$boostlevelper)/100;

if($boostlevel>0)
{
$sqlt="SELECT * FROM `iv_commission_boosting_level` WHERE `userid`='".$fetchvt1['userid']."'";
$rest=query($conn,$sqlt);
$numt=numrows($rest);
if($numt<1)
{
$currentper=getSettingsBoostLimit($conn,'currentper');
$boostingper=getSettingsBoostLimit($conn,'boostingper');
$bonus=($boostlevel*$currentper)/100;
$boosting=($boostlevel*$boostingper)/100;

$sql3="INSERT INTO `iv_commission_boosting_level`(`userid`,`orguserid`,`amount`,`currentper`,`bonus`,`boostingper`,`boosting`,`date`) VALUES ('".$fetchvt1['userid']."','".$userid."','".$boostlevel."','".$currentper."','".$bonus."','".$boostingper."','".$boosting."','".date('Y-m-d')."')";
$res3=query($conn,$sql3);
}
}
}
}
}

?>