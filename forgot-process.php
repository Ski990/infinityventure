<?php
session_start();
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
$sqlp="SELECT * FROM `iv_member` WHERE `userid`='".mysqli_real_escape_string($conn,trim($_POST['userid']))."' AND `email`='".mysqli_real_escape_string($conn,trim($_POST['email']))."' AND `status`='A'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
$fetchp=fetcharray($resp);

/*----------------------SMS---------------------*/
$headers="From:".$recovery."\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);
$subject="Welcome to ".$title.".";

$message.="User ID ".$_POST['userid']."<br/>";
$message.="Password ".base64_decode($fetchp['password'])."<br/>";
$message.="<br /><br />Thanks <br />Support Team";

mail($to,$subject,$message,$headers);
//-------------SMS-------------------//

redirect('forgot.php?m=1');
}else{
redirect('forgot.php?e=2');
}
}
?>