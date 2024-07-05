<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background:#fff;">
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">

<div class="col-md-12">

<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title" style="color:#000000;">Tree View</div>
</div>
<div class="card-body">
<div class="portlet-body" style="overflow:auto;min-height:500px;">

<?php
if($_REQUEST['userid'])
{
$sqlfist="SELECT * FROM `iv_genealogy_p1` WHERE `userid`='".trim($_REQUEST['userid'])."'";
}else{
$sqlfist="SELECT * FROM `iv_genealogy_p1` WHERE `userid`='".getMember($conn,$_SESSION['mid'],'userid')."'";
}
$resfist=query($conn,$sqlfist);
$numfist=numrows($resfist);
if($numfist>0)
{
$fetchfist=fetcharray($resfist);
$userid=$fetchfist['userid'];
?>

<table width="800" align="center">
<tr><td align="center" colspan="2">
<table align="center" width="50%">

<td align="center" colspan="2"><a href="tree-view.php?userid=<?=$userid?>" style="text-decoration:none;">
<div class="boxDiv" align="center">

<div class="tooltip1">


<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>

<!--<img src="genealogy.png" width="50" height="50"/>-->
<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?php if(getMemberUserid($conn,$userid,'sponsor')){?><?=getMemberUserid($conn,$userid,'sponsor')?><?php }else{?>----<?php }?>
</td>

<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>

<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>
<br />
<table width="100%">
<tr>
<td align="left"></td>
<td align="center">
<?=ucwords(strtolower(getMemberUserid($conn,$userid,'name')))?><br /> (<?=$userid?>)
</td>
<td align="right"></td>
</tr>
</table>
</div>
</a>
</td>

</table>
</td></tr>
<tr><td align="center" colspan="2" style="text-align:center;"><img src="line1.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid1=getDownlineByPosition($conn,$userid,'Left');
if($userid1)
{
?>
<a href="tree-view.php?userid=<?=$userid1?>" style="text-decoration:none;">
<div class="boxDiv" align="center">
<br /><div class="tooltip1">


<?php if(getMemberUserID($conn,$userid1,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>

<!--<img src="genealogygreen.png" width="50" height="50"/> -->
<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid1,'sponsor')){?><?=getMemberUserid($conn,$userid1,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid1,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid1)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid1,'left')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid1,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid1,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid1,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid1,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid1,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid1,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid1,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid1,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>

</table>

</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid1,'name')))?><br /> (<?=$userid1?>)


</div></a>
<?php }else{?>
<p></p>
<?php if($userid){?>
<a onClick="newJoinMember('<?=$userid?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line2.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center" width="200">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid3=getDownlineByPosition($conn,$userid1,'Left');
if($userid3)
{
?>
<a href="tree-view.php?userid=<?=$userid3?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid3,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="50" height="50" />-->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid3,'sponsor')){?><?=getMemberUserid($conn,$userid3,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid3,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid3)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid3,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid3,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid3,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid3,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid3,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid3,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid3,'approved'))?><?php }else{?>----<?php } ?></td>


</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid3,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid3,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>
<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid3,'name')))?></br> (<?=$userid3?>)
</div>

</a>
<?php }else{?>
<p></p>
<?php if($userid1){?>
<a onClick="newJoinMember('<?=$userid1?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td></tr>
<tr><td width="99" align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid7=getDownlineByPosition($conn,$userid3,'Left');
if($userid7)
{
?>
<a href="tree-view.php?userid=<?=$userid7?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br /><div class="tooltip1">


<?php if(getMemberUserID($conn,$userid7,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>

<!--<img src="genealogy.png" width="50" height="50" />-->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid7,'sponsor')){?><?=getMemberUserid($conn,$userid7,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid7,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid7)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid7,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid7,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid7,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid7,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid7,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid7,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid7,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid7,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid7,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid7,'name')))?> <br /> (<?=$userid7?>)

</div></a>
<?php }else{?>
<p></p>
<?php if($userid3){?>
<a onClick="newJoinMember('<?=$userid3?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td><td width="87" align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid8=getDownlineByPosition($conn,$userid3,'Right');
if($userid8)
{
?>
<a href="tree-view.php?userid=<?=$userid8?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid8,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>

<!--<img src="genealogy.png" width="50" height="50" />-->

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid8,'sponsor')){?><?=getMemberUserid($conn,$userid8,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid8,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid8)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid8,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid8,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid8,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid8,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid8,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid8,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid8,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid8,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid8,'name')))?> <br /> (<?=$userid8?>)
</div></a>
<?php }else{?>
<p></p>
<?php if($userid3){?>
<a onClick="newJoinMember('<?=$userid3?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td></tr>

</table>
</td><td align="center" valign="top">
<table align="center" width="200">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid4=getDownlineByPosition($conn,$userid1,'Right');
if($userid4)
{
?>
<a href="tree-view.php?userid=<?=$userid4?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">


<?php if(getMemberUserID($conn,$userid4,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>

<!--<img src="genealogy.png" width="50" height="50" />-->

<span class="tooltiptext1">

<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid4,'sponsor')){?><?=getMemberUserid($conn,$userid4,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid4,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid4)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid4,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid4,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid4,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid4,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid4,'date'))?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid4,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid4,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid4,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid4,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid4,'name')))?> <br /> (<?=$userid4?>)

</div></a>
<?php }else{?>
<p></p>
<?php if($userid1){?>
<a onClick="newJoinMember('<?=$userid1?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid9=getDownlineByPosition($conn,$userid4,'Left');
if($userid9)
{
?>
<a href="tree-view.php?userid=<?=$userid9?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid9,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>



<!----<img src="genealogy.png" width="50" height="50" />-->

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid9,'sponsor')){?><?=getMemberUserid($conn,$userid9,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid9,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid9)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid9,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid9,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid9,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid9,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid9,'date'))?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid9,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid9,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid9,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid9,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>

</table>

</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid9,'name')))?> <br /> (<?=$userid9?>)

</div></a>
<?php }else{?>
<p></p>
<?php if($userid4){?>
<a onClick="newJoinMember('<?=$userid4?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>

</table>
</td><td align="center">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid10=getDownlineByPosition($conn,$userid4,'Right');
if($userid10)
{
?>
<a href="tree-view.php?userid=<?=$userid10?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid10,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!---<img src="genealogy.png" width="50" height="50" />---->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid10,'sponsor')){?><?=getMemberUserid($conn,$userid10,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid10,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid10)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid10,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid10,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid10,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid10,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid10,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid10,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid10,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid10,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid10,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid10,'name')))?><br /> (<?=$userid10?>)


</div></a>
<?php }else{?>
<p></p>
<?php if($userid4){?>
<a onClick="newJoinMember('<?=$userid4?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td></tr>
</table>
</td></tr>

</table>
</td><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid2=getDownlineByPosition($conn,$userid,'Right');
if($userid2)
{
?>
<a href="tree-view.php?userid=<?=$userid2?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid2,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>



<!---<img src="genealogy.png" width="50" height="50" />--->

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid2,'sponsor')){?><?=getMemberUserid($conn,$userid2,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid2,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid2)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid2,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid2,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid2,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid2,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid2,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid2,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid2,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid2,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid2,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid2,'name')))?> <br /> (<?=$userid2?>)

</div></a>
<?php }else{?>
<p></p>
<?php if($userid){?>
<a onClick="newJoinMember('<?=$userid?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line2.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center" width="200">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid5=getDownlineByPosition($conn,$userid2,'Left');
if($userid5)
{
?>
<a href="tree-view.php?userid=<?=$userid5?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid5,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="50" height="50" />--->

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid5,'sponsor')){?><?=getMemberUserid($conn,$userid5,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid5,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid5)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid5,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid5,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid5,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid5,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid5,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid5,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid5,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid5,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid5,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid5,'name')))?><br /> (<?=$userid5?>)


</div></a>
<?php }else{?>
<p></p>
<?php if($userid2){?>
<a onClick="newJoinMember('<?=$userid2?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid11=getDownlineByPosition($conn,$userid5,'Left');
if($userid11)
{
?>
<a href="tree-view.php?userid=<?=$userid11?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />


<div class="tooltip1">


<?php if(getMemberUserID($conn,$userid11,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!----<img src="genealogy.png" width="50" height="50" />--->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid11,'sponsor')){?><?=getMemberUserid($conn,$userid11,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid11,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid11)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid11,'left')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid11,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid11,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid11,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid11,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid11,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid11,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid11,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid11,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>


</span>
</div>

<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid11,'name')))?><br /> (<?=$userid11?>)

</div></a>
<?php }else{?>
<p></p>
<?php if($userid5){?>
<a onClick="newJoinMember('<?=$userid5?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>

</table>
</td><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid12=getDownlineByPosition($conn,$userid5,'Right');
if($userid12)
{
?>
<a href="tree-view.php?userid=<?=$userid12?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid12,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!----<img src="genealogy.png" width="50" height="50" />--->

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid12,'sponsor')){?><?=getMemberUserid($conn,$userid12,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid12,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid12)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid12,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid12,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid12,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid12,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid12,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid12,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid12,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid12,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid12,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>


</span>
</div>



<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid12,'name')))?> <br /> (<?=$userid12?>)

</div></a>
<?php }else{?>
<p></p>
<?php if($userid5){?>
<a onClick="newJoinMember('<?=$userid5?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td></tr>
</table>
</td><td align="center" valign="top">
<table align="center" width="200">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid6=getDownlineByPosition($conn,$userid2,'Right');
if($userid6)
{
?>
<a href="tree-view.php?userid=<?=$userid6?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">


<?php if(getMemberUserID($conn,$userid6,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!----<img src="genealogy.png" width="50" height="50" />--->

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid6,'sponsor')){?><?=getMemberUserid($conn,$userid6,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid6,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid6)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid6,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid6,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid6,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid6,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid6,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid6,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid6,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid6,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid6,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>

</div>


<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid6,'name')))?><br /> (<?=$userid6?>)

</div></a>
<?php }else{?>
<p></p>
<?php if($userid2){?>
<a onClick="newJoinMember('<?=$userid2?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid13=getDownlineByPosition($conn,$userid6,'Left');
if($userid13)
{
?>
<a href="tree-view.php?userid=<?=$userid13?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid13,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!---<img src="genealogy.png" width="50" height="50" />---->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid13,'sponsor')){?><?=getMemberUserid($conn,$userid13,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid13,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid13)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid13,'left')?></td>
</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid13,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid13,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid13,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid13,'date'))?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid13,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid13,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid13,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid13,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>

</table>

</span>

</div>



<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid13,'name')))?><br /> (<?=$userid13?>)
</div></a>
<?php }else{?>
<p></p>
<?php if($userid6){?>
<a onClick="newJoinMember('<?=$userid6?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>

</table>
</td><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid14=getDownlineByPosition($conn,$userid6,'Right');
if($userid14)
{
?>
<a href="tree-view.php?userid=<?=$userid14?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />


<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid14,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>



<!----<img src="genealogy.png" width="50" height="50" />---->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid14,'sponsor')){?><?=getMemberUserid($conn,$userid14,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid14,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Total BV :&nbsp;<?=getTotalMemberBV($conn,$userid14)?></td>
<td align="left">Left Team :&nbsp;<?=getDownlineCount($conn,$userid14,'left')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right Team :&nbsp;<?=getDownlineCount($conn,$userid14,'right')?></td>
<td align="left">Left BV :&nbsp;<?=getLeftBv($conn,$userid14,'leftbv')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Right BV:&nbsp;<?=getRightBv($conn,$userid14,'rightbv')?></td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid14,'date'))?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid14,'approved')){?><?=getDateConvert(getMemberUserid($conn,$userid14,'approved'))?><?php }else{?>----<?php } ?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid14,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid14,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>

<br /><?=ucwords(strtolower(getMemberUserid($conn,$userid14,'name')))?> <br /> (<?=$userid14?>)


</div></a>
<?php }else{?>
<p></p>
<?php if($userid6){?>
<a onClick="newJoinMember('<?=$userid6?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />

<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td></tr>
</table>
</td></tr>
</table>
</td></tr>
</table>

<?php }?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<?php include('footer.php')?>
<script>
function copyToClipboard(element) {
var $temp = $("<input>");
$("body").append($temp);
$temp.val($(element).text()).select();
document.execCommand("copy");
$temp.remove();
document.getElementById('cpbutton').innerHTML='COPIED';
}
</script>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>


<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
</body>
</html>