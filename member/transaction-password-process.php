<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}


if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_SESSION['mid'])
{
$sql="SELECT * FROM `iv_member` WHERE `id`='".$_SESSION['mid']."' AND `tranpass`='".base64_encode(trim($_POST['tranpass']))."'";
$res=query($conn,$sql); 
$num=numrows($res);
if($num>0)
{
if(trim($_POST['newpass'])==trim($_POST['conpass']))
{
$sql="UPDATE `iv_member` SET `tranpass`='".base64_encode(trim($_POST['newpass']))."' WHERE `id`='".$_SESSION['mid']."'";
$res=query($conn,$sql);

redirect('transaction-password.php?n=2');
}else{
redirect('transaction-password.php?p=3');
}

}else{
redirect('transaction-password.php?m=1');
}
}
}
?>