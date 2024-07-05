<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$sqlp="SELECT * FROM `iv_member` WHERE `phone`='".trim($_POST['phone'])."' OR `email`='".trim(mysqli_real_escape_string($conn,$_POST['email']))."'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump<1)
{    
$userid=$prefix.rand(1111111,9999999);
 

$sql="INSERT INTO `iv_member` (`userid`,`sponsor`,`password`,`name`,`email`,`phone`,`address`,`status`,`date`) VALUES('".trim($userid)."','".trim($_POST['sponsor'])."','".base64_encode(trim($_POST['password']))."','".trim($_POST['name'])."','".trim($_POST['email'])."','".trim($_POST['phone'])."','".trim($_POST['address'])."','A','".date('Y-m-d')."')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
if($id)
{

/*---------------mail-------------------*/

if($_POST['email'])
{
$headers="From: ".$welcome."\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);
$subject="Welcome To ".$title."Your registration is completed ";

$message="Dear ".trim($_POST['name'])." ,<br/> Welcome to ".$title.".<br/> User ID: ".$userid." <br/> Password: ".trim($_POST['password'])."<br/> Visit us ".$domain."to login into your account. <br/><br/>Thanks ".$title.".";

mail($to,$subject,$message,$headers);
}

//-------------------------SMS Code----------------------------//
}
redirect('member-joining.php?msg=4&id='.$id);
}else{
redirect('member-joining.php?id='.$id.'&e=1');
}

}
?>