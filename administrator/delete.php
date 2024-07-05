<?php
session_start();
include('includes/function.php');

if($_SESSION['sid'])
{

if($_REQUEST['case']=='feedback')
{
$sql="DELETE FROM `iv_feedback` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('feedback.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='imps')
{
$sql="DELETE FROM `iv_withdrawal_imps` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('imps-withdrawal.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='recharge')
{
$sql="DELETE FROM `iv_recharge` WHERE `id`='".trim($_REQUEST['id'])."' AND `status`='Failed'";
$res=query($conn,$sql);

redirect('member-recharge-statement.php?page='.$_REQUEST['page']);
}
}
?>