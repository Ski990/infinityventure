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

$sql1="INSERT INTO `iv_contact` (`title`,`phone1`,`phone2`,`email1`,`email2`,`addline1`,`addline2`,`date`) VALUES('".$_POST['title']."','".$_POST['phone1']."','".mysqli_escape_string($conn,$_POST['phone2'])."','".mysqli_escape_string($conn,$_POST['email1'])."','".mysqli_escape_string($conn,$_POST['email2'])."','".mysqli_escape_string($conn,$_POST['addline1'])."','".mysqli_escape_string($conn,$_POST['addline2'])."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);
   
redirect('contact.php?case=add&m=1');
}

}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='edit')
{
$sql2="UPDATE `iv_contact` SET `title`='".$_POST['title']."',`phone1`='".$_POST['phone1']."',`phone2`='".mysqli_real_escape_string($conn,$_POST['phone2'])."',`email1`='".mysqli_real_escape_string($conn,$_POST['email1'])."',`email2`='".mysqli_real_escape_string($conn,$_POST['email2'])."',`addline1`='".mysqli_real_escape_string($conn,$_POST['addline1'])."',`addline2`='".mysqli_real_escape_string($conn,$_POST['addline2'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2);

redirect('contact.php');
}

}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_contact` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('contact.php');
}
}
?>