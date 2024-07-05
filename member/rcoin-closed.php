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
$nocoin=getCloseRcoin($conn,$_REQUEST['id'],'nocoin');
$coinvalue=getSettingsRcoin($conn,'coinvalue');


$actualamount=($coinvalue*$nocoin);

if($actualamount>0)
{
$sqlt="UPDATE `iv_member_rcoin` SET `closeamount`='".$actualamount."' WHERE `id`='".trim($_REQUEST['id'])."' AND `userid`='".$userid."'";
$rest=query($conn,$sqlt);
}
$sqlu="UPDATE `iv_member_rcoin` SET `status`='C' WHERE `id`='".trim($_REQUEST['id'])."' AND `userid`='".$userid."'";
$resu=query($conn,$sqlu);




redirect('rcoin-statement.php');



}
?>