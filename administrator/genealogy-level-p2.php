<?php include('header.php');
$left=9;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<!-- / main menu-->
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title" align="left"><?=getSettingsPackagename($conn,'P2','packagename')?> Level View</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in" style="padding:5px">
<div class="portlet box blue-hoki">
<div class="portlet-title">

<div class="portlet-body" style="overflow:auto;">
<div align="center">&nbsp;</div>


<?php if($_REQUEST['placement']){?><h3 align="center" style="color:#FF0000;font-size:20px;line-height:20px;">User ID: <?=$_REQUEST['placement']?>&nbsp;&nbsp;&nbsp;Name: <?=ucwords(strtolower(getMemberUserID($conn,$_REQUEST['placement'],'name')))?></h3><?php }?>


<h2 style="color:#FF0000;font-size:20px;padding-left:20px;">Genealogy - Level 1</h2>

<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr class="headback">
<td align="center">Sl_No</td>
<td align="center">User_ID</td>
<td align="center">Name</td>
<td align="center">Placement</td>
<td align="center">Name</td>
<td align="center">Position</td>
<td align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
if($_REQUEST['placement'])
{
$sql="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".trim($_REQUEST['placement'])."'";
}else{
$sql="SELECT * FROM `iv_genealogy_p2` ORDER BY `id` LIMIT 1";
}
$res=query($conn,$sql);
$num=numrows($res);
$i=0;
$arr=array();
if($num>0)
{
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['userid'];
?>
<tr>
<td align="center" style="padding:3px;"><?=($i+1)?></td>
<td align="center" style="padding:5px;"><a href="genealogy-level-p2.php?placement=<?=$fetch['userid']?>"><?=$fetch['userid']?></a></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch['placement']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch['placement'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch['position']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch['date'])?></td>
</tr>
<?php $i++;}}?>
</tbody>
</table>
<?php
if(!empty($arr))
{
$count=count($arr);
if($count>0)
{?>
<h2 style="color:#FF0000;font-size:20px;padding-left:20px;">Genealogy - Level 2</h2>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr class="headback">
<td align="center">Sl_No</td>
<td align="center">User_ID</td>
<td align="center">Name</td>
<td align="center">Placement</td>
<td align="center">Name</td>
<td align="center">Position</td>
<td align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr1=array();
for($k=0;$k<$count;$k++)
{
$sql1="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".$arr[$k]."'";
$res1=query($conn,$sql1);
$num1=numrows($res1); 
if($num1>0)
{
while($fetch1=fetcharray($res1))
{
$arr1[$i]=$fetch1['userid'];
?>
<tr>
<td align="center" style="padding:3px;"><?=($i+1)?></td>
<td align="center" style="padding:5px;"><a href="genealogy-level-p2.php?placement=<?=$fetch1['userid']?>"><?=$fetch1['userid']?></a></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch1['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch1['placement']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch1['placement'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch1['position']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch1['date'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }}?>
<?php
if(!empty($arr1))
{
$count1=count($arr1);
if($count1>0)
{?>

<h2 style="color:#FF0000;font-size:20px;padding-left:20px;">Genealogy - Level 3</h2>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr class="headback">
<td align="center">Sl_No</td>
<td align="center">User_ID</td>
<td align="center">Name</td>
<td align="center">Placement</td>
<td align="center">Name</td>
<td align="center">Position</td>

<td align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr2=array();
for($k=0;$k<$count1;$k++)
{
$sql2="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".$arr1[$k]."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
$arr2[$i]=$fetch2['userid'];
?>
<tr>
<td align="center" style="padding:3px;"><?=($i+1)?></td>
<td align="center" style="padding:5px;"><a href="genealogy-level-p2.php?placement=<?=$fetch2['userid']?>"><?=$fetch2['userid']?></a></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch2['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch2['placement']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch2['placement'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch2['position']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch2['date'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }}?>
<?php
if(!empty($arr2))
{
$count2=count($arr2);
if($count2>0)
{?>
<h2 style="color:#FF0000;font-size:20px;padding-left:20px;">Genealogy - Level 4</h2>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr class="headback">
<td align="center">Sl_No</td>
<td align="center">User_ID</td>
<td align="center">Name</td>
<td align="center">Placement</td>
<td align="center">Name</td>
<td align="center">Position</td>

<td align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr3=array();
for($k=0;$k<$count2;$k++)
{
$sql3="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".$arr2[$k]."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
while($fetch3=fetcharray($res3))
{
$arr3[$i]=$fetch3['userid'];
?>
<tr>
<td align="center" style="padding:3px;"><?=($i+1)?></td>
<td align="center" style="padding:5px;"><a href="genealogy-level-p2.php?placement=<?=$fetch3['userid']?>"><?=$fetch3['userid']?></a></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch3['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch3['placement']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch3['placement'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch3['position']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch3['date'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }}?>
<?php
if(!empty($arr3))
{
$count3=count($arr3);
if($count3>0)
{?>
<h2 style="color:#FF0000;font-size:20px;padding-left:20px;">Genealogy - Level 5</h2>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr class="headback">
<td align="center">Sl_No</td>
<td align="center">User_ID</td>
<td align="center">Name</td>
<td align="center">Placement</td>
<td align="center">Name</td>
<td align="center">Position</td>

<td align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr4=array();
for($k=0;$k<$count3;$k++)
{
$sql4="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".$arr3[$k]."'";
$res4=query($conn,$sql4);
$num4=numrows($res4);
if($num4>0)
{
while($fetch4=fetcharray($res4))
{
$arr4[$i]=$fetch4['userid'];
?>
<tr>
<td align="center" style="padding:3px;"><?=($i+1)?></td>
<td align="center" style="padding:5px;"><a href="genealogy-level-p2.php?placement=<?=$fetch4['userid']?>"><?=$fetch4['userid']?></a></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch4['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch4['placement']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch4['placement'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch4['position']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch4['date'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }}?>
<?php
if(!empty($arr4))
{
$count4=count($arr4);
if($count4>0)
{?>
<h2 style="color:#FF0000;font-size:20px;padding-left:20px;">Genealogy - Level 6</h2>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr class="headback">
<td align="center">Sl_No</td>
<td align="center">User_ID</td>
<td align="center">Name</td>
<td align="center">Placement</td>
<td align="center">Name</td>
<td align="center">Position</td>

<td align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr5=array();
for($k=0;$k<$count4;$k++)
{
$sql5="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".$arr4[$k]."'";
$res5=query($conn,$sql5);
$num5=numrows($res5);
if($num5>0)
{
while($fetch5=fetcharray($res5))
{
$arr5[$i]=$fetch5['userid'];
?>
<tr>
<td align="center" style="padding:3px;"><?=($i+1)?></td>
<td align="center" style="padding:5px;"><a href="genealogy-level-p2.php?placement=<?=$fetch5['userid']?>"><?=$fetch5['userid']?></a></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch5['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch5['placement']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch5['placement'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch5['position']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch5['date'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>

<?php }}?>
<?php
if(!empty($arr5))
{
$count5=count($arr5);
if($count5>0)
{?>
<h2 style="color:#FF0000;font-size:20px;padding-left:20px;">Genealogy - Level 7</h2>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr class="headback">
<td align="center">Sl_No</td>
<td align="center">User_ID</td>
<td align="center">Name</td>
<td align="center">Placement</td>
<td align="center">Name</td>
<td align="center">Position</td>

<td align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr6=array();
for($k=0;$k<$count5;$k++)
{
$sql6="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".$arr5[$k]."'";
$res6=query($conn,$sql6);
$num6=numrows($res6);
if($num6>0)
{
while($fetch6=fetcharray($res6))
{
$arr6[$i]=$fetch6['userid'];
?>
<tr>
<td align="center" style="padding:3px;"><?=($i+1)?></td>
<td align="center" style="padding:5px;"><a href="genealogy-level-p2.php?placement=<?=$fetch6['userid']?>"><?=$fetch6['userid']?></a></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch6['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch6['placement']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch6['placement'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch6['position']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch6['date'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>

<?php }}?>
<?php
if(!empty($arr6))
{
$count6=count($arr6);
if($count6>0)
{?>
<h2 style="color:#FF0000;font-size:20px;padding-left:20px;">Genealogy - Level 8</h2>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr class="headback">
<td align="center">Sl_No</td>
<td align="center">User_ID</td>
<td align="center">Name</td>
<td align="center">Placement</td>
<td align="center">Name</td>
<td align="center">Position</td>

<td align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr7=array();
for($k=0;$k<$count6;$k++)
{
$sql7="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".$arr6[$k]."'";
$res7=query($conn,$sql7);
$num7=numrows($res7);
if($num7>0)
{
while($fetch7=fetcharray($res7))
{
$arr7[$i]=$fetch7['userid'];
?>
<tr>
<td align="center" style="padding:3px;"><?=($i+1)?></td>
<td align="center" style="padding:5px;"><a href="genealogy-level-p2.php?placement=<?=$fetch7['userid']?>"><?=$fetch7['userid']?></a></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch7['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch7['placement']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch7['placement'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch7['position']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch7['date'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }}?>
<?php
if(!empty($arr7))
{
$count7=count($arr7);
if($count7>0)
{?>
<h2 style="color:#FF0000;font-size:20px;padding-left:20px;">Genealogy - Level 9</h2>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr class="headback">
<td align="center">Sl_No</td>
<td align="center">User_ID</td>
<td align="center">Name</td>
<td align="center">Placement</td>
<td align="center">Name</td>
<td align="center">Position</td>

<td align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr8=array();
for($k=0;$k<$count7;$k++)
{
$sql8="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".$arr7[$k]."'";
$res8=query($conn,$sql8);
$num8=numrows($res8);
if($num8>0)
{
while($fetch8=fetcharray($res8))
{
$arr8[$i]=$fetch8['userid'];
?>
<tr>
<td align="center" style="padding:3px;"><?=($i+1)?></td>
<td align="center" style="padding:5px;"><a href="genealogy-level-p2.php?placement=<?=$fetch8['userid']?>"><?=$fetch8['userid']?></a></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch8['userid'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch8['placement']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserID($conn,$fetch8['placement'],'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch8['position']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch8['date'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }}?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include('footer.php');?>

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
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>
