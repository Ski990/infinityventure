<?php 
session_start();
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{

$sql="SELECT * FROM `iv_member` WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_POST['sponsor']))."' AND `status`='A' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$sqlp="SELECT * FROM `iv_member` WHERE `phone`='".trim(mysqli_real_escape_string($conn,$_POST['phone']))."' OR `email`='".trim(mysqli_real_escape_string($conn, $_POST['email'])) . "'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump<999)
{
$fetch=fetcharray($res);
$userid=$prefix.rand(1111111,9999999);

$sqltc="SELECT * FROM `iv_member` WHERE `userid`='".$userid."'";
$restc=query($conn,$sqltc);
$numtc=numrows($restc);
if($numtc<1)
{
$sql="INSERT INTO `iv_member`(`userid`,`sponsor`,`name`,`position`,`password`,`phone`,`email`,`address`,`date`,`status`) VALUES('".trim($userid)."','".trim($_POST['sponsor'])."','".trim($_POST['name'])."','".trim($_POST['position'])."','".base64_encode(trim($_POST['password']))."','".trim($_POST['phone'])."','".trim($_POST['email'])."','".trim($_POST['address'])."','".date('Y-m-d')."','A')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
if($id)
{

//--------------Total Team List--------------------//
function getDownlineCheck($conn,$userid,$sponsor)
{
$sql="INSERT INTO `iv_member_downline`(`userid`,`fromid`,`paystatus`,`date`) VALUES('".$sponsor."','".$userid."','I','".date('Y-m-d')."')";
$res=query($conn,$sql);

$sponsor1=getMemberUserID($conn,$sponsor,'sponsor');
if($sponsor1)
{
getDownlineCheck($conn,$userid,$sponsor1);
}
}

$sponsor=getMemberUserID($conn,$userid,'sponsor');
if($sponsor)
{
getDownlineCheck($conn,$userid,$sponsor);
}
//-----------------------------------//
if($_POST['email'])
{
$headers="From:".$support."\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);
$subject="Welcome to ".$title.". Your registration is successfully completed!";

$message="Dear ".trim($_POST['name'])." ,<br/> Welcome to ".$title.". <br/>User ID: ".$userid." <br/>Password: ".trim($_POST['password'])." <br/>Visit us ".$title.". to login into your account. <br/><br/>Thanks & Regards<br/>".$title.".";


if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&msg=4&id='.$id);
}else{
redirect('registration.php?intr='.trim($_POST['sponsor']).'&msg=4&id='.$id);
}

mail($to,$subject,$message,$headers);
}
}
}
}else{

if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&e=1');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&e=1');
}
}

}else{

if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&q=4');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&q=4');
}
}
}
?>