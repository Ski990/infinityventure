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
$sql1="UPDATE `iv_settings_social` SET `whatsapp`='".trim(mysqli_real_escape_string($conn,$_POST['whatsapp']))."',`telegram`='".trim(mysqli_real_escape_string($conn,$_POST['telegram']))."',`instagram`='".trim(mysqli_real_escape_string($conn,$_POST['instagram']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('settings-social.php');
}
}
?>