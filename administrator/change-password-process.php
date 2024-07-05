<?php
session_start(); 
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
$sql="SELECT * FROM `iv_admin` WHERE `id`='".trim($_SESSION['sid'])."' AND `password`='".trim(base64_encode(trim(addslashes($_POST['current']))))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
if(trim($_POST['newpass'])==trim($_POST['conpass']))
{
$sql="UPDATE `iv_admin` SET `password`='".trim(base64_encode(trim(trim(addslashes($_POST['conpass'])))))."' WHERE `id`='".trim($_SESSION['sid'])."'";
$res=query($conn,$sql);

redirect('change-password.php?n=2');
}else{
redirect('change-password.php?p=3');
}
}else{
redirect('change-password.php?m=1');
}
}
?>