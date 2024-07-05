<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_REQUEST['case']=='add')
{
/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="investment/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}
/*-----------------------END OF file CODE-----------*/

$userid=getMemberUserID($conn,$userid,$field); 
$status=



$sql="INSERT INTO `iv_member_global_investment` (`userid`,`package`,`amount`,`dailyper`,`status`,`date`) VALUES('".$userid)."','".trim($_POST['package'])."','".trim($_POST['amount'])."','".trim($_POST['dailyper'])."','".$path."''".date('Y-m-d')."')";
$res=query($conn,$sql);
redirect('global-investment-statement.php?case=add&m=1');
}