<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
$sql="UPDATE `iv_settings_onoff` SET `registration`='".trim($_POST['registration'])."',`login`='".trim($_POST['login'])."',`manual`='".trim($_POST['manual'])."',`current_to_fund`='".trim($_POST['current_to_fund'])."',`fund_to_others`='".trim($_POST['fund_to_others'])."',`current_to_boosting`='".trim($_POST['current_to_boosting'])."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-onoff.php');
}
?>