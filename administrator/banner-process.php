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
/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="banner/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}
/*-----------------------END OF file CODE-----------*/

$sql="INSERT INTO `iv_banner` (`banner`,`status`) VALUES('".$path."','A')";
$res=query($conn,$sql);

redirect('banner.php?case=add&m=1');
}

if($_REQUEST['case']=='edit')
{
/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="banner/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);

$sql1="UPDATE `iv_banner` SET `banner`='".$path."' WHERE `id`='".mysqli_escape_string($conn,input($_REQUEST['id']))."'";
$res1=query($conn,$sql1);
}
}
}
/*-----------------------END OF file CODE-----------*/
redirect('banner.php');
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_banner` WHERE `id`='".input(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('banner.php');
}

if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql="UPDATE `iv_banner` SET `status`='".$st."' WHERE `id`='".mysqli_real_escape_string($conn,output($_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('banner.php?page='.$_REQUEST['page']);
}
}
?> 