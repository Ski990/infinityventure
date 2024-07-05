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
$sql2="SELECT * FROM `iv_settings_package` WHERE `package`='".mysqli_real_escape_string($conn,$_POST['package'])."' OR `packagename`='".mysqli_real_escape_string($conn,$_POST['packagename'])."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2<1)
{
$sql1="INSERT INTO `iv_settings_package` (`package`,`packagename`,`amount`,`directper`,`matchingbonus`,`dailycapping`) VALUES('".mysqli_real_escape_string($conn,trim($_POST['package']))."','".mysqli_real_escape_string($conn,trim($_POST['packagename']))."','".mysqli_real_escape_string($conn,trim($_POST['amount']))."','".mysqli_real_escape_string($conn,trim($_POST['directper']))."','".mysqli_real_escape_string($conn,trim($_POST['matchingbonus']))."','".mysqli_real_escape_string($conn,trim($_POST['dailycapping']))."')";
$res1=query($conn,$sql1);      

redirect('settings-package.php?case=add&m=1');
}else{
redirect('settings-package.php?case=add&e=1');
}
}

if($_REQUEST['case']=='edit')
{
$sql2="SELECT * FROM `iv_settings_package` WHERE (`package`='".trim($_POST['package'])."' OR `packagename`='".trim($_POST['packagename'])."') AND `id`!='".$_REQUEST['id']."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
redirect('settings-package.php?case=edit&f=1&id='.$_REQUEST['id']);
}else{
$sql1="UPDATE `iv_settings_package` SET `package`='".mysqli_real_escape_string($conn,trim($_POST['package']))."',`packagename`='".mysqli_real_escape_string($conn,trim($_POST['packagename']))."',`amount`='".mysqli_real_escape_string($conn,trim($_POST['amount']))."',`directper`='".mysqli_real_escape_string($conn,trim($_POST['directper']))."',`matchingbonus`='".mysqli_real_escape_string($conn,trim($_POST['matchingbonus']))."',`dailycapping`='".mysqli_real_escape_string($conn,trim($_POST['dailycapping']))."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res1=query($conn,$sql1);
}
redirect('settings-package.php');
}


if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql2="UPDATE `iv_settings_package` SET `status`='".$st."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2); 

redirect('settings-package.php');
}



if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_settings_package` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('settings-package.php');
}
}
?>
