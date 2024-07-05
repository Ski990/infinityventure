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
$charge=($_POST['current']*$percent)/100;
$fund=($_POST['current']-$charge);

$avabal=getAvailableWallet($conn,$userid);
if($avabal>=$_POST['current'])
{ 
$minimum=getSettingsTransfer($conn,'minimum');
$maximum=getSettingsTransfer($conn,'maximum');

 $current=$_POST['current'];
 
if($_POST['current']<=$maximum)
{


if($_POST['current']>=$minimum)
{

$trpass = base64_encode(trim($_POST['tranpass']));
$transpass = getMemberUserID($conn,$userid,'tranpass');
if($transpass == $trpass)
{
$sql3="INSERT INTO `iv_transfer_current_fund` (`userid`,`current`,`charge`,`fund`,`date`) VALUES('".trim($userid)."','".$_POST['current']."','".$charge."','".$fund."','".date('Y-m-d')."')";
$res3=query($conn,$sql3);

}else{
redirect('current.php?s=4&page='.$_REQUEST['page']);
}

redirect('current.php?m=1');
}

else{
redirect('current.php?s=1');
}

}

else{
redirect('current.php?y=1');
}
}



else{
redirect('current.php?e=2');
}
}else{
redirect('current.php?e=1');
}
}

?>