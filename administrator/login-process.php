<?php
session_start(); 
include('includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_POST['captcha']==$_POST['security'])
{
$sql="SELECT * FROM `iv_admin` WHERE `username`='".base64_encode(mysqli_real_escape_string($conn,$_POST['username']))."' AND `password`='".base64_encode(mysqli_real_escape_string($conn,$_POST['password']))."' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$_SESSION['sid']=$fetch['id'];

redirect('dashboard.php');
}else{
redirect('index.php?e=1');
}

}else{
redirect('index.php?m=2');
}
}
?>