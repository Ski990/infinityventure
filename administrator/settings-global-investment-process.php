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


$sql="INSERT INTO `iv_settings_global_investment` (`package`,`amount`,`lockingdays`,`ctoper`,`validdays`,`image`) VALUES('".trim($_POST['package'])."','".trim($_POST['amount'])."','".trim($_POST['lockingdays'])."','".trim($_POST['ctoper'])."','".trim($_POST['validdays'])."','".$path."')";
$res=query($conn,$sql);
redirect('settings-global-investment.php?case=add&m=1');
}

if($_REQUEST['case']=='edit')
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

$sql1="UPDATE `iv_settings_global_investment` SET `package`='".trim($_POST['package'])."',`amount`='".trim($_POST['amount'])."',`lockingdays`='".trim($_POST['lockingdays'])."',`ctoper`='".trim($_POST['ctoper'])."',`validdays`='".trim($_POST['validdays'])."',`image`='".$path."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);
}
}
}else{
$sql2="UPDATE `iv_settings_global_investment` SET `package`='".trim($_POST['package'])."',`amount`='".trim($_POST['amount'])."',`lockingdays`='".trim($_POST['lockingdays'])."',`ctoper`='".trim($_POST['ctoper'])."',`validdays`='".trim($_POST['validdays'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2);

}
/*-----------------------END OF file CODE-----------*/
redirect('settings-global-investment.php');
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `iv_settings_global_investment` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
redirect('settings-global-investment.php');
}



?> 