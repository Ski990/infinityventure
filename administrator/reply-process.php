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
if($_REQUEST['case']=='add')
{
$sql1="UPDATE `iv_support` SET `reply`='".trim(addslashes(strip_tags($_POST['reply'])))."' WHERE `id`='".trim($_POST['msgid'])."'";
$res1=query($conn,$sql1);  
    
redirect('support.php');
}
}

}
?>