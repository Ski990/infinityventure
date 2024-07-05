<?php
session_start();
include('../administrator/includes/function.php');

if($_REQUEST['userid']!='' && $_REQUEST['password']!='')
{
$sql="SELECT * FROM `iv_member` WHERE `userid`='".mysqli_real_escape_string($conn,$_REQUEST['userid'])."' AND `password`='".base64_encode(mysqli_real_escape_string($conn,$_REQUEST['password']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$_SESSION['mid']=$fetch['id'];

redirect('dashboard.php');
}else{
redirect('index.php?e=1');
}
}
?> 