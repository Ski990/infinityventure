<?php
session_start();
include('../administrator/includes/function.php');

 $sql1="SELECT * FROM `iv_tmp_cart` WHERE `id`='".trim($_REQUEST['pid'])."' AND `userid`='".getMember($conn,$_SESSION['mid'],'userid')."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);
$quantity=trim($_REQUEST['quantity']);
$pid=$fetch1['pid'];
$price=getProduct($conn,$pid,'offerprice');


$total=$quantity*$price;

$sql2="UPDATE `iv_tmp_cart` SET `quantity`='".$quantity."',`total`='".$total."' WHERE `id`='".trim($_REQUEST['pid'])."' AND `userid`='".getMember($conn,$_SESSION['mid'],'userid')."' ";
$res2=query($conn,$sql2);
/*echo '<script>window.location.reload()</script>';*/
}
?>

                    
