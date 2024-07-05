<?php include('header.php');
$left=9;
?>
<!-- main menu-->
<style>
.button
{ 
background:#FF6600;
color:#FFFFFF;
border:1px solid #FF3300;
margin-bottom:5px;
padding:3px 10px;
border-radius:5px;
}
.button:hover
{
background:#009900;
color:#FFFFFF;
border:1px solid #FF3300;
margin-bottom:5px;
}
.tooltip1 {
    position: relative;
    display: inline-block;
   /* border-bottom: 1px dotted black;*/
}

.tooltip1 .tooltiptext1 {
    visibility: hidden;
    width: 400px;
    background-color: #000000;
    color: #FFFFFF;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    
    left: 50%;
	top: 120%;
    margin-left: -200px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip1 .tooltiptext1::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
  
}

.tooltip1:hover .tooltiptext1 {
    visibility: visible;
    opacity: 1;
}
</style>
<?php include('leftpanel.php'); ?>

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">


<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title" align="left">Boost  Tree View</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in">
<div class="table-responsive" style="overflow:auto;">
<p>&nbsp;</p>
<?php
if($_REQUEST['userid'])
{
$sqlfist="SELECT * FROM `iv_genealogy_boosting` WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_REQUEST['userid']))."'";
}else{
$sqlfist="SELECT * FROM `iv_genealogy_boosting` ORDER BY `id` LIMIT 1";
}
$resfirst=query($conn,$sqlfist);
$numfirst=numrows($resfirst);
if($numfirst>0)
{
$fetchfirst=fetcharray($resfirst);
$userid=$fetchfirst['userid'];

$table='iv_genealogy_boosting';

?>

<table width="800" align="center">
<tr><td align="center" colspan="2">
<table align="center" width="50%">

<td align="center" colspan="2"><a href="genealogy-boost-tree.php?userid=<?=$userid?>" style="text-decoration:none;">
<div class="boxDiv" align="center">

<div class="tooltip1">

<img src="genealogy.png" width="35" height="35"/>

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid,'orguserid'),'name')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>
<br /> <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid,'orguserid'),'name')?> <br /> (<?=$userid?>)

</div>
</a></td>

</table>
</td></tr>
<tr><td align="center" colspan="2" style="text-align:center;"><img src="line1.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid1=getDownlineByPosition($conn,$userid,$table,'Left');
if($userid1)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid1?>" style="text-decoration:none;">
<div class="boxDiv" align="center">
<br /><div class="tooltip1">

<img src="genealogy.png" width="35" height="35"/>
<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid1,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid1,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid1,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid1,'orguserid'),'name')?></td>
</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid1,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid1,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>


<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid1,'orguserid'),'name')?> <br /> (<?=$userid1?>)


</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid3=getDownlineByPosition($conn,$userid1,$table,'Left');
if($userid3)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid3?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">

<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid3,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid3,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid3,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid3,'orguserid'),'name')?></td>
</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid3,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid3,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid3,'orguserid'),'name')?>   </br> (<?=$userid3?>)
</div>
</a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid7=getDownlineByPosition($conn,$userid3,$table,'Left');
if($userid7)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid7?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br /><div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">

<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid7,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid7,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid7,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid7,'orguserid'),'name')?></td>
</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid7,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid7,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>

<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid7,'orguserid'),'name')?>   <br /> (<?=$userid7?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid8=getDownlineByPosition($conn,$userid3,$table,'Right');
if($userid8)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid8?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid8,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid8,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid8,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid8,'orguserid'),'name')?></td>
</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid8,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid8,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>


<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid8,'orguserid'),'name')?>  <br /> (<?=$userid8?>)
</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid4=getDownlineByPosition($conn,$userid1,$table,'Right');
if($userid4)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid4?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid4,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid4,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid4,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid4,'orguserid'),'name')?></td>
</tr>



<tr height="20">
<td>&nbsp;</td>

<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid4,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid4,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid4,'orguserid'),'name')?>  <br /> (<?=$userid4?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid9=getDownlineByPosition($conn,$userid4,$table,'Left');
if($userid9)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid9?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid9,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid9,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid9,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid9,'orguserid'),'name')?></td>
</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid9,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid9,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,getMemberBoostGeneologyUserID($conn,$userid9,'orguserid'),'orguserid'),'name')?> <br /> (<?=$userid9?>)
</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid10=getDownlineByPosition($conn,$userid4,$table,'Right');
if($userid10)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid10?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid10,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid10,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid10,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid10,'orguserid'),'name')?></td>
</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid10,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid10,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br />   <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid10,'orguserid'),'name')?>  <br /> (<?=$userid10?>)
</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid2=getDownlineByPosition($conn,$userid,$table,'Right');
if($userid2)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid2?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid2,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid2,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid2,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid2,'orguserid'),'name')?></td>
</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid2,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid2,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>


<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid2,'orguserid'),'name')?> <br /> (<?=$userid2?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid5=getDownlineByPosition($conn,$userid2,$table,'Left');
if($userid5)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid5?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid5,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid5,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid5,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid5,'orguserid'),'name')?></td>
</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid5,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid5,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid5,'orguserid'),'name')?>  <br /> (<?=$userid5?>)
</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid11=getDownlineByPosition($conn,$userid5,$table,'Left');
if($userid11)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid11?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />


<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid11,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid11,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid11,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid11,'orguserid'),'name')?></td>
</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid11,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid11,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>

<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid11,'orguserid'),'name')?> <br /> (<?=$userid11?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid12=getDownlineByPosition($conn,$userid5,$table,'Right');
if($userid12)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid12?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid12,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid12,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid12,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid12,'orguserid'),'name')?></td>
</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid12,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid12,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>



<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid12,'orguserid'),'name')?> <br /> (<?=$userid12?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid6=getDownlineByPosition($conn,$userid2,$table,'Right');
if($userid6)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid6?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid6,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid6,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid6,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid6,'orguserid'),'name')?></td>
</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid6,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid6,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>

</div>


<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid6,'orguserid'),'name')?> <br /> (<?=$userid6?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid13=getDownlineByPosition($conn,$userid6,$table,'Left');
if($userid13)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid13?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid13,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid13,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid13,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid13,'orguserid'),'name')?></td>
</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid13,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid13,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>

</div>

<br />  <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid13,'orguserid'),'name')?>  <br /> (<?=$userid13?>)
</div></a>
<?php }else{?>
<p>&nbsp;</p>
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
$userid14=getDownlineByPosition($conn,$userid6,$table,'Right');
if($userid14)
{
?>
<a href="genealogy-boost-tree.php?userid=<?=$userid14?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />


<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid14,'orguserid'),'sponsor')?></td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid14,'orguserid'),'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid14,'orguserid'),'approved')?></td>
<td align="left">Name:&nbsp;<?=getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid14,'orguserid'),'name')?></td>
</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid14,'orguserid'),'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">Pay_Status:&nbsp;<?php if(getMemberUserid($conn,getMemberBoostGeneologyUserID($conn,$userid14,'orguserid'),'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>

<br /> <?=getMemberUserID($conn,getMemberBoostGeneologyUserID($conn,$userid14,'orguserid'),'name')?> <br /> (<?=$userid14?>)


</div></a>
<?php }else{?>
<p>&nbsp;</p>
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

<?php include('footer.php') ?>

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>