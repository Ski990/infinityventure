<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}
 
if($_SESSION['sid'])
{
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_support` WHERE `id` = '".mysqli_real_escape_string($conn,$_REQUEST['id'])."' ";
$res=query($conn,$sql);

redirect('support.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='P'){$st='C';}else{$st='P';}

$sql="UPDATE `iv_support` SET `status`='".$st."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('support.php?page='.$_REQUEST['page']);
}
}
?>