<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='add')
{
$sql1="SELECT * FROM `iv_member` WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_POST['userid']))."' AND `status`='A'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
if(trim($_POST['amount'])>0)
{
$userid=trim($_POST['userid']);
$email=getMember($conn,$_SESSION['sid'],'email');
$name=getMember($conn,$_SESSION['sid'],'name');

$sql2="INSERT INTO `iv_deposit` (`userid`,`wallet`,`amount`,`remarks`,`date`) VALUES('".trim($_POST['userid'])."','".trim($_POST['wallet'])."','".trim($_POST['amount'])."','".addslashes(strip_tags($_POST['remarks']))."','".date('Y-m-d')."')";
$res2=query($conn,$sql2); 



/*if($_POST['wallet']=='Fund Wallet')
{
$sql2="SELECT * FROM `iv_settings_franchaise` WHERE `amount`='".trim($_POST['amount'])."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
$fetch2=fetcharray($res2);
$percentage=$fetch2['percentage'];
$bonus=($_POST['amount']*$percentage)/100;

echo $sql2="INSERT INTO `iv_commission_franchaise` (`userid`,`amount`,`percentage`,`bonus`,`date`) VALUES('".trim($_POST['userid'])."','".trim($_POST['amount'])."','".$percentage."','".$bonus."','".date('Y-m-d')."')";
$res2=query($conn,$sql2);
}
}*/

redirect('deposit.php?case=add&m=1');
}else{
redirect('deposit.php?case=add&e=1');
}
}else{
redirect('deposit.php?case=add&f=2');
}
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_deposit` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('deposit.php');
}
?>