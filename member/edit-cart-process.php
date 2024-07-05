<?php
session_start();
include('../administrator/includes/function.php');
$ip=$_SERVER['REMOTE_ADDR'];
$userid=getMember($conn,$_SESSION['mid'],'userid');



if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='edit')
{

$sql="SELECT * FROM `iv_tmp_cart` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$price=$fetch['price'];
$quantity=$_POST['quantity'];
$ty=$price*$quantity;
 $sql1="UPDATE `iv_tmp_cart` SET  `quantity`='".trim($_POST['quantity'])."',`total`='".$ty."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('view-cart.php');
}
}
}
?>
