<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if($_POST['current']>0)
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$percent=getSettingsTransfer($conn,'charge');


$current=trim($_POST['current']);
$charge=($current*$percent)/100;
$boost=($current-$charge);

$avabal=getAvailableWallet($conn,$userid);
if($avabal>=$current)
{ 
$minimum=getSettingsTransfer($conn,'minimum');
$maximum=getSettingsTransfer($conn,'maximum');
if($current<=$maximum)
{
if($current>=$minimum)
{
$sql3="INSERT INTO `iv_transfer_current_booster` (`userid`,`current`,`charge`,`booster`,`date`) VALUES('".trim($userid)."','".$current."','".$charge."','".$boost."','".date('Y-m-d')."')";
$res3=query($conn,$sql3);
redirect('boosting.php?m=1');
}

else{
redirect('boosting.php?s=1');
}
}

else{
redirect('boosting.php?k=1');
}
}
else{
redirect('boosting.php?e=2');
}
}else{
redirect('boosting.php?e=1');
}
}

?>