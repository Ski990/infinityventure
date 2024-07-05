<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='edit')
{
 $sql1="UPDATE `iv_settings_rcoin` SET `coinvalue`='".trim($_POST['coinvalue'])."',`lockingdays`='".trim($_POST['lockingdays'])."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('settings-rcoin.php');
}
}
?>