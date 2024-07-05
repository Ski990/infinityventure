<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$sqlp = "SELECT * FROM `iv_member` WHERE (`phone`='" . trim($_POST['phone']) . "' OR `email`='" . trim($_POST['email']) . "') AND `id`!='" . trim($_SESSION['mid']) . "'";
$resp = query($conn, $sqlp);
$nump = numrows($resp);
if ($nump < 999)
{
if ($_FILES['file']['name'])
{ 
if (strpos($_FILES['file']['name'], 'php') == false)
{
$rand = rand(1, 999999);
$target = "profile/";
$path = $rand . $_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'gif')
{
$target = $target . basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);

$sql="UPDATE `iv_member` SET `name`='".trim($_POST['name'])."',`phone`='".trim($_POST['phone'])."',`email`='".trim($_POST['email'])."',`address`='".trim($_POST['address'])."',`profile`='".$path."',`bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`branch`='".trim(mysqli_real_escape_string($conn,$_POST['branch']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."' WHERE `id`='" . trim($_SESSION['mid']) . "'";
$res=query($conn,$sql);

redirect('edit-profile.php?m=1');
}
}
}
else
{
$sql = "UPDATE  `iv_member` SET `name`='".trim($_POST['name'])."',`phone`='".trim($_POST['phone'])."',`email`='".trim($_POST['email'])."',`address`='".trim($_POST['address'])."',`bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`branch`='".trim(mysqli_real_escape_string($conn,$_POST['branch']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."' WHERE `id`='".trim($_SESSION['mid'])."'";
$res = query($conn, $sql);

redirect('edit-profile.php?m=1');
}
}
else
{
redirect('edit-profile.php?e=1');
}
}
?>