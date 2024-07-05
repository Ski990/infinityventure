<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{

if($_SERVER['REQUEST_METHOD']=='POST')
{

if($_REQUEST['case']=='edit')
{
$sql2="UPDATE `iv_settings_boosting_limit` SET `notime`='".mysqli_real_escape_string($conn,$_POST['notime'])."',`currentper`='".mysqli_real_escape_string($conn,$_POST['currentper'])."',`boostingper`='".mysqli_real_escape_string($conn,$_POST['boostingper'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2);

redirect('settings-boosting-limit.php');
}
}

}

?>