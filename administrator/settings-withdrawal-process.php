<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='edit')
{
$sql1="UPDATE `iv_settings_withdrawal` SET `minimum`='".trim(mysqli_real_escape_string($conn,$_POST['minimum']))."',`tds`='".trim(mysqli_real_escape_string($conn,$_POST['tds']))."',`service`='".trim(mysqli_real_escape_string($conn,$_POST['service']))."',`ctoservice`='".trim(mysqli_real_escape_string($conn,$_POST['ctoservice']))."',`rcoinservice`='".trim(mysqli_real_escape_string($conn,$_POST['rcoinservice']))."',`nodirect`='".trim(mysqli_real_escape_string($conn,$_POST['nodirect']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('settings-withdrawal.php');
}
}
?>