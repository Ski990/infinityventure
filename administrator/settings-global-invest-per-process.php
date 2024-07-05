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
 $sql1="UPDATE `iv_settings_global_investment_percentage` SET `withdrawalper`='".trim($_POST['withdrawalper'])."',`globalper`='".trim($_POST['globalper'])."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('settings-global-invest-per.php');
}
}
?>