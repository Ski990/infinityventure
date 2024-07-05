<?php
//--------------------- Team Building Calculation---------------------//
function getLevelCalcuation($conn,$userid,$k,$actuser,$amount,$package )
{
if($k<=7)
{
$level='Level '.$k;
$bonus=getSettingsLevel($conn,$package,$level,'bonus');
$sponsor1=getMemberUserID($conn,$userid,'sponsor');
if($sponsor1)
{


if($bonus>0)
{
$sql1="INSERT INTO `iv_commission_level` (`userid`,`fromid`,`level`,`package`,`bonus`,`date`) VALUES ('".$sponsor1."','".$actuser."','".$level."','".$package ."','".$bonus."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);
}
}


$k=$k+1;
getLevelCalcuation($conn,$sponsor1,$k,$actuser,$amount,$package);
}
}

$k=1;
$actuser=$userid;
getLevelCalcuation($conn,$userid,$k,$actuser,$amount,$package);
?>
