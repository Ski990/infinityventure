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
$sql2="SELECT * FROM `iv_settings_level` WHERE `package`='".mysqli_real_escape_string($conn,$_POST['package'])."' AND `level`='".mysqli_real_escape_string($conn,$_POST['level'])."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2<1)
{
$sql3="INSERT INTO `iv_settings_level` (`package`,`level`,`bonus`) VALUES('".mysqli_real_escape_string($conn,$_POST['package'])."','".mysqli_real_escape_string($conn,$_POST['level'])."','".mysqli_real_escape_string($conn,$_POST['bonus'])."')";
$res=query($conn,$sql3);

redirect('settings-level.php?case=add&m=1');
}else{
redirect('settings-level.php?case=add&e=1');
}
}


if($_REQUEST['case']=='edit')
{
$sql2="SELECT * FROM `iv_settings_level` WHERE `package`='".trim($_POST['package'])."' AND `level`='".trim($_POST['level'])."' AND  `id`!='".$_REQUEST['id']."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
redirect('settings-level.php?case=edit&f=1&id='.$_REQUEST['id']);
}else{
$sql2="UPDATE `iv_settings_level` SET `package`='".mysqli_real_escape_string($conn,$_POST['package'])."',`level`='".mysqli_real_escape_string($conn,$_POST['level'])."',`bonus`='".mysqli_real_escape_string($conn,$_POST['bonus'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2);
}
redirect('settings-level.php');
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_settings_level` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('settings-level.php');
}
}
?> 