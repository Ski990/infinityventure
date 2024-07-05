<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="feedback/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif' || $ext=='xlsx' || $ext=='docx' || $ext=='pdf')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}


$sqlc="SELECT * FROM `iv_member_purchase` WHERE `userid`='".$userid."' AND `id`='".trim($_POST['purchaseid'])."'";
$resc=query($conn,$sqlc);
$numc=numrows($resc);
if($numc>0)
{
$fetchc=fetcharray($resc);

$sql="INSERT INTO `iv_member_purchase_feedback`(`userid`,`purchaseid`,`orderid`,`feedback`,`documents`,`date`) values('".$userid."','".trim($_POST['purchaseid'])."','".$fetchc['orderid']."','".addslashes(trim($_POST['feedback']))."','".$path."','".date('Y-m-d')."')";
$res=query($conn,$sql);

}
redirect('product-purchase.php?page='.$_REQUEST['page']);
}
?> 