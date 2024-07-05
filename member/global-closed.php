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
$actualamount=getCloseGlobal($conn,$_REQUEST['id'],'total');
$lockexpire=getCloseGlobal($conn,$_REQUEST['id'],'lockexpire');
$date=date('Y-m-d');
if($date>=$lockexpire)
{
if($actualamount>0)
{
$sqlt="UPDATE `iv_member_global_investment` SET `closeamount`='".$actualamount."' WHERE `id`='".trim($_REQUEST['id'])."' AND `userid`='".$userid."'";
$rest=query($conn,$sqlt);
}
$sqlu="UPDATE `iv_member_global_investment` SET `status`='C' WHERE `id`='".trim($_REQUEST['id'])."' AND `userid`='".$userid."'";
$resu=query($conn,$sqlu);

}


redirect('global-investment-statement.php');



}
?>