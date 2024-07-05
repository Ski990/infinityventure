<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_SESSION['mid'])
{
if($_REQUEST['case']=='add')
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$sql="INSERT INTO `iv_support` (`userid`,`type`,`subject`,`message`,`date`,`status`) VALUES ('".getMember($conn,$_SESSION['mid'],'userid')."','".$_POST['type']."','".addslashes($_POST['subject'])."','".addslashes(trim($_POST['description']))."','".date('Y-m-d')."','P')";
$res=query($conn,$sql);

redirect('support.php?case=add&m=1');
}
}
}

?> 