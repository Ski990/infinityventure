<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="paymentslip/"; 
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif' || $ext=='xlsx' || $ext=='docx' || $ext=='pdf')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}
/*-----------------------END OF file CODE-----------*/
$sqlf="SELECT * FROM `iv_member_payment` WHERE `tranid`='".trim($_POST['tranid'])."'";
$resf=query($conn,$sqlf);
$numf=numrows($resf);
if($numf<1)
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$sql="INSERT INTO `iv_member_payment`(`userid`,`amount`,`tranid`,`receipt`,`status`,`date`) values('".getMember($conn,$_SESSION['mid'],'userid')."','".trim($_POST['amount'])."','".trim($_POST['tranid'])."','".$path."','P','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('payment.php?s=1&page='.$_REQUEST['page']);

}else{
redirect('payment.php?f=1&page='.$_REQUEST['page']);

}
}

?> 