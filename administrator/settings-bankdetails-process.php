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

if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="qrcode/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
$sql1="UPDATE `iv_settings_company` SET `qrcode`='".$path."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);
}

if($_FILES['otherqr']['name'])
{
if(strpos($_FILES['otherqr']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="plan/";
$path=$rand.$_FILES['otherqr']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['otherqr']['tmp_name'], $target);
}
}
$sql1="UPDATE `iv_settings_company` SET `qrcode`='".$path."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);
}

$sql1="UPDATE `iv_settings_company` SET `bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."',`upiid`='".trim(mysqli_real_escape_string($conn,$_POST['upiid']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

/*-----------------------END OF file CODE-----------*/
redirect('settings-bankdetails.php');
}
}
?>