<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='status')
{
$userid=getMember($conn,$_SESSION['sid'],'userid');
$sql="UPDATE `iv_withdrawal` SET `status`='C',`approved`='".date('Y-m-d')."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);





redirect('pending-withdrawal.php?page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_withdrawal` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql); 

redirect('pending-withdrawal.php?page='.mysqli_real_escape_string($conn,$_REQUEST['page']));
}

}
?>