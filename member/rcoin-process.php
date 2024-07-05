<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if($_POST['amount']>0)
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$coinvalue=getSettingsRcoin($conn,'coinvalue');
$lockingdays=getSettingsRcoin($conn,'lockingdays');


$avabal=getFundWallet($conn,$userid);
if($avabal>=$_POST['amount'])
{ 
 $amount=$_POST['amount'];
 $nocoin=$_POST['nocoin'];
$total=($coinvalue*$nocoin);

if($_POST['amount']==$total)
{
$date=strtotime(date('Y-m-d'));
$expire=date('Y-m-d',strtotime('+'.$lockingdays.' days',$date));


$sql3="INSERT INTO `iv_member_rcoin` (`userid`,`nocoin`,`coinvalue`,`totalamount`,`status`,`expire`,`date`) VALUES('".trim($userid)."','".$_POST['nocoin']."','".$coinvalue."','".$total."','R','".$expire."','".date('Y-m-d')."')";
$res3=query($conn,$sql3);



redirect('rcoin.php?m=1');
}

else{
redirect('rcoin.php?s=1');
}
}



else{
redirect('rcoin.php?e=2');
}
}else{
redirect('rcoin.php?e=1');
}
}

?>