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
if($_REQUEST['case']=='add')
{
$sql1="INSERT INTO `iv_announcement` (`announcement`,`date`) VALUES('".addslashes(trim(mysqli_real_escape_string($conn,$_POST['announcement'])))."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);  
    
redirect('notice.php?case=add&m=1');
}
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_announcement` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('notice.php');
}
}
?>