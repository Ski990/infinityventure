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
.imgSil {
    margin-top: 5px;
    z-index: 999;
    border-radius: 25px;
    height: 45px;
    width: 45px;
    margin: 0 auto;
	border:3px solid #00FF00;
}
.imgred {
    margin-top: 5px;
    z-index: 999;
    border-radius: 25px;
    height: 45px;
    width: 45px;
    margin: 0 auto;
	border:3px solid #FF0000;
}
.imgGold {
    margin-top: 5px;
    z-index: 999;
    border-radius: 25px;
    height: 45px;
    width: 45px;
    margin: 0 auto;
	border:3px solid #FFD700;
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
<h4 class="card-title"><?=getSettingsPackagename($conn,'P3','packagename')?> Tree View</h4>
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
$sqlfist="SELECT * FROM `iv_genealogy_p3` WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_REQUEST['userid']))."'";
}else{
$sqlfist="SELECT * FROM `iv_genealogy_p3` ORDER BY `id` LIMIT 1";
}
$resfirst=query($conn,$sqlfist);
$numfirst=numrows($resfirst);
if($numfirst>0)
{
$fetchfirst=fetcharray($resfirst);
$userid=$fetchfirst['userid'];
?>

<table width="800" align="center">
<tr><td align="center" colspan="2">
<table align="center" width="50%">

<td align="center" colspan="2"><a href="tree-view-p3.php?userid=<?=$userid?>" style="text-decoration:none;">
<div class="boxDiv" align="center">

<div class="tooltip1">


<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>


<!---<img src="genealogy.png" width="35" height="35"/>-->

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?php if(getMemberUserID($conn,$userid,'placement')){?><?=getMemberUserID($conn,$userid,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid,'right')?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>	
</tr>

</table>

</span>
</div>
<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid,'name')))?><br /> (<?=$userid?>)

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
$userid1=getDownlineByPositionP3($conn,$userid,'Left');
if($userid1)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid1?>" style="text-decoration:none;">
<div class="boxDiv" align="center">
<br /><div class="tooltip1">


<?php if(getMemberUserID($conn,$userid1,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35"/>--->
<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid1,'sponsor')){?><?=getMemberUserID($conn,$userid1,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid1,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid1,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid1,'right')?></td>

</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid1,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid1,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid1,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid1,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid1,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>

</table>

</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid1,'name')))?><br /> (<?=$userid1?>)


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
$userid3=getDownlineByPositionP3($conn,$userid1,'Left');
if($userid3)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid3?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid3,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid3,'sponsor')){?><?=getMemberUserID($conn,$userid3,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid3,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid3,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid3,'right')?></td>

</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid3,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid3,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid3,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid3,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid3,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid3,'name')))?></br> (<?=$userid3?>)
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
$userid7=getDownlineByPositionP3($conn,$userid3,'Left');
if($userid7)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid7?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br /><div class="tooltip1">

<?php if(getMemberUserID($conn,$userid7,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid7,'sponsor')){?><?=getMemberUserID($conn,$userid7,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid7,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid7,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid7,'right')?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid7,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid7,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid7,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid7,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid7,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>

<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid7,'name')))?> <br /> (<?=$userid7?>)

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
$userid8=getDownlineByPositionP3($conn,$userid3,'Right');
if($userid8)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid8?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid7,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid8,'sponsor')){?><?=getMemberUserID($conn,$userid8,'sponsor')?><?php }else{?>----<?php }?></td>

<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid8,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid8,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid8,'right')?></td>

</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid8,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid8,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid8,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid8,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid8,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid8,'name')))?> <br /> (<?=$userid8?>)
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
$userid4=getDownlineByPositionP3($conn,$userid1,'Right');
if($userid4)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid4?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid4,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->

<span class="tooltiptext1">

<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid4,'sponsor')){?><?=getMemberUserID($conn,$userid4,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid4,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid4,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid4,'right')?></td>

</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid4,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid4,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid4,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid4,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid4,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid4,'name')))?> <br /> (<?=$userid4?>)

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
$userid9=getDownlineByPositionP3($conn,$userid4,'Left');
if($userid9)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid9?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid9,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid9,'sponsor')){?><?=getMemberUserID($conn,$userid9,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid9,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid9,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid9,'right')?></td>

</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid9,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid9,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid9,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid9,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid9,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid9,'name')))?> <br /> (<?=$userid9?>)
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
$userid10=getDownlineByPositionP3($conn,$userid4,'Right');
if($userid10)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid10?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid10,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid10,'sponsor')){?><?=getMemberUserID($conn,$userid10,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid10,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid10,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid10,'right')?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid10,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid10,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid10,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid10,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid10,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid10,'name')))?><br /> (<?=$userid10?>)
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
$userid2=getDownlineByPositionP3($conn,$userid,'Right');
if($userid2)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid2?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid2,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid2,'sponsor')){?><?=getMemberUserID($conn,$userid2,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid2,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid2,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid2,'right')?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid2,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid2,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid2,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid2,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid2,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>


<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid2,'name')))?> <br /> (<?=$userid2?>)

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
$userid5=getDownlineByPositionP3($conn,$userid2,'Left');
if($userid5)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid5?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid5,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->
<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid5,'sponsor')){?><?=getMemberUserID($conn,$userid5,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid5,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid5,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid5,'right')?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid5,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid5,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid5,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid5,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid5,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid5,'name')))?><br /> (<?=$userid5?>)
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
$userid11=getDownlineByPositionP3($conn,$userid5,'Left');
if($userid11)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid11?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />


<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid11,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->
<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid11,'sponsor')){?><?=getMemberUserID($conn,$userid11,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid11,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid11,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid11,'right')?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid11,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid11,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid11,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>




<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid11,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid11,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>


</span>
</div>

<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid11,'name')))?><br /> (<?=$userid11?>)

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
$userid12=getDownlineByPositionP3($conn,$userid5,'Right');
if($userid12)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid12?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid12,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid12,'sponsor')){?><?=getMemberUserID($conn,$userid12,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid12,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid12,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid12,'right')?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid12,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid12,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid12,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid12,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid12,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>


</span>
</div>



<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid12,'name')))?> <br /> (<?=$userid12?>)

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
$userid6=getDownlineByPositionP3($conn,$userid2,'Right');
if($userid6)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid6?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid6,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->
<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid6,'sponsor')){?><?=getMemberUserID($conn,$userid6,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid6,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid6,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid6,'right')?></td>

</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid6,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid6,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid6,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>


<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid6,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid6,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>

</div>


<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid6,'name')))?><br /> (<?=$userid6?>)

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
$userid13=getDownlineByPositionP3($conn,$userid6,'Left');
if($userid13)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid13?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">

<?php if(getMemberUserID($conn,$userid13,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid13,'sponsor')){?><?=getMemberUserID($conn,$userid13,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid13,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid13,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid13,'right')?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid13,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid13,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid13,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid13,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid13,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>

</table>

</span>

</div>

<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid13,'name')))?><br /> (<?=$userid13?>)
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
$userid14=getDownlineByPositionP3($conn,$userid6,'Right');
if($userid14)
{
?>
<a href="tree-view-p3.php?userid=<?=$userid14?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />


<div class="tooltip1">
<?php if(getMemberUserID($conn,$userid14,'paystatus')=='A'){?>
<img src="genealogygreen.png" width="35" height="35" class="imgSil"/>
<?php }else{?>
<img src="genealogyred.png" width="35" height="35" class="imgred"/>
<?php }?>


<!--<img src="genealogy.png" width="35" height="35" />-->
<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserID($conn,$userid14,'sponsor')){?><?=getMemberUserID($conn,$userid14,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Latest Package :&nbsp;<?=getSettingsPackage($conn,getLatestPackage($conn,$userid14,'package'),'package')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Left Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid14,'left')?></td>
<td align="left">Right Team :&nbsp;<?=getDownlineCountP3Pair($conn,$userid14,'right')?></td>

</tr>



<tr height="20">
<td>&nbsp;</td>
<td align="left">Joining Date:&nbsp;<?=getDateConvert(getMemberUserID($conn,$userid14,'date'))?></td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserID($conn,$userid14,'approved')){?><?=getDateConvert(getMemberUserID($conn,$userid14,'approved'))?><?php }else{?>----<?php } ?></td>

</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserID($conn,$userid14,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserID($conn,$userid14,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>

<br /><?=ucwords(strtolower(getMemberUserID($conn,$userid14,'name')))?> <br /> (<?=$userid14?>)


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