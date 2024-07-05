<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}


if($_SESSION['sid'])
{
if($_REQUEST['case']=='add')
{
$sql2="SELECT * FROM `iv_settings_boosting_level` WHERE `level`='".mysqli_real_escape_string($conn,$_POST['level'])."' ";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2<1)
{
$sql3="INSERT INTO `iv_settings_boosting_level` (`level`,`team`,`bonus`,`total`) VALUES('".mysqli_real_escape_string($conn,$_POST['level'])."','".mysqli_real_escape_string($conn,$_POST['team'])."','".mysqli_real_escape_string($conn,$_POST['bonus'])."','".mysqli_real_escape_string($conn,$_POST['total'])."')";
$res=query($conn,$sql3);

redirect('settings-boosting-level.php?case=add&m=1');
}else{
redirect('settings-boosting-level.php?case=add&e=1');
}
}


if($_REQUEST['case']=='edit')
{
$sql2="SELECT * FROM `iv_settings_boosting_level` WHERE `level`='".$_REQUEST['level']."' AND  `id`!='".$_REQUEST['id']."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
redirect('settings-boosting-level.php?case=edit&f=1&id='.$_REQUEST['id']);
}else{
$sql1="UPDATE `iv_settings_boosting_level` SET `level`='".mysqli_real_escape_string($conn,$_POST['level'])."',`team`='".mysqli_real_escape_string($conn,$_POST['team'])."',`bonus`='".mysqli_real_escape_string($conn,$_POST['bonus'])."',`total`='".mysqli_real_escape_string($conn,$_POST['total'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);
}
redirect('settings-boosting-level.php');
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_settings_boosting_level` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('settings-boosting-level.php');
}
}
?> 