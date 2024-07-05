<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$amount=trim($_POST['amount']);
$wallet=trim($_POST['wallet']);

if($wallet=='Current Wallet')
{
$avabal=getAvailableWallet($conn,$userid);
$min=getSettingsWithdrawal($conn,'minimum');

if($amount>0)
{
if($avabal>=$amount)
{
if($amount>=$min)
{
$tds=getSettingsWithdrawal($conn,'tds');
$tdsamt=($amount*$tds)/100;

$service=getSettingsWithdrawal($conn,'service');
$adminamt=($amount*$service)/100;

$abc=$tdsamt+$adminamt;
$payout=($amount-$abc);


$sql1="INSERT INTO `iv_withdrawal` (`userid`,`wallet`,`request`,`tds`,`service`,`payout`,`bname`,`branch`,`accname`,`accno`,`ifscode`,`date`,`status`,`approved`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".$wallet."','".$amount."','".$tdsamt."','".$adminamt."','".$payout."','".getMember($conn,$_SESSION['mid'],'bname')."','".getMember($conn,$_SESSION['mid'],'branch')."','".getMember($conn,$_SESSION['mid'],'accname')."','".getMember($conn,$_SESSION['mid'],'accno')."','".getMember($conn,$_SESSION['mid'],'ifscode')."','".date('Y-m-d')."','P','')";
$res1=query($conn,$sql1);

redirect('withdrawal.php?p=1');

}else{
redirect('withdrawal.php?s=1');

}
}else{
redirect('withdrawal.php?r=1');

}
}else{
redirect('withdrawal.php?m=3');

}
}
elseif($wallet=='R-Coin Wallet')
{
$avabal=getRcoinWallet($conn,$userid);
$min=getSettingsWithdrawal($conn,'minimum');

if($amount>0)
{
if($avabal>=$amount)
{
if($amount>=$min)
{
$tds=getSettingsWithdrawal($conn,'tds');
$tdsamt=($amount*$tds)/100;

$service=getSettingsWithdrawal($conn,'rcoinservice');
$adminamt=($amount*$service)/100;

$abc=$tdsamt+$adminamt;
$payout=($amount-$abc);


$sql1="INSERT INTO `iv_withdrawal` (`userid`,`wallet`,`request`,`tds`,`service`,`payout`,`bname`,`branch`,`accname`,`accno`,`ifscode`,`date`,`status`,`approved`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".$wallet."','".$amount."','".$tdsamt."','".$adminamt."','".$payout."','".getMember($conn,$_SESSION['mid'],'bname')."','".getMember($conn,$_SESSION['mid'],'branch')."','".getMember($conn,$_SESSION['mid'],'accname')."','".getMember($conn,$_SESSION['mid'],'accno')."','".getMember($conn,$_SESSION['mid'],'ifscode')."','".date('Y-m-d')."','P','')";
$res1=query($conn,$sql1);

redirect('withdrawal.php?p=1');

}else{
redirect('withdrawal.php?s=1');

}
}else{
redirect('withdrawal.php?r=1');

}
}else{
redirect('withdrawal.php?m=3');

}

}else{

$avabal=getCTOWallet($conn,$userid);
$min=getSettingsWithdrawal($conn,'minimum');

if($amount>0)
{
if($avabal>=$amount)
{
if($amount>=$min)
{
$tds=getSettingsWithdrawal($conn,'tds');
$tdsamt=($amount*$tds)/100;

$service=getSettingsWithdrawal($conn,'ctoservice');
$adminamt=($amount*$service)/100;

$abc=$tdsamt+$adminamt;
$payout=($amount-$abc);


$sql1="INSERT INTO `iv_withdrawal` (`userid`,`wallet`,`request`,`tds`,`service`,`payout`,`bname`,`branch`,`accname`,`accno`,`ifscode`,`date`,`status`,`approved`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".$wallet."','".$amount."','".$tdsamt."','".$adminamt."','".$payout."','".getMember($conn,$_SESSION['mid'],'bname')."','".getMember($conn,$_SESSION['mid'],'branch')."','".getMember($conn,$_SESSION['mid'],'accname')."','".getMember($conn,$_SESSION['mid'],'accno')."','".getMember($conn,$_SESSION['mid'],'ifscode')."','".date('Y-m-d')."','P','')";
$res1=query($conn,$sql1);

redirect('withdrawal.php?p=1');

}else{
redirect('withdrawal.php?s=1');

}
}else{
redirect('withdrawal.php?r=1');

}
}else{
redirect('withdrawal.php?m=3');

}


}



}
?> 