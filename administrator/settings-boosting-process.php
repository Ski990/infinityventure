<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{

if($_SERVER['REQUEST_METHOD']=='POST')
{

if($_REQUEST['case']=='edit')
{
$sql2="UPDATE `iv_settings_boosting` SET `boostamt`='".mysqli_real_escape_string($conn,$_POST['boostamt'])."',`boostlevel`='".mysqli_real_escape_string($conn,$_POST['boostlevel'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2);

redirect('settings-boosting.php');
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_settings_boosting` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-boosting.php');
}
}

?>