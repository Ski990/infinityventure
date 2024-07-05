<?php include('header.php');
$left=2;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- main menu-->
<?php include('leftpanel.php'); ?>

<!-- / main menu-->
<?php if($_REQUEST['case']=='add'){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Reward</h4>
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
<div class="card-block">

<?php if($_REQUEST['e']==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already Exists!!</p><?php }?>
<?php if($_REQUEST['m']==1){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Added Successfully!!</p><?php }?>

<form class="form" action="settings-reward-process.php?case=add" method="post">
<div class="form-body">
<div class="form-group">
<label for="userinput1">Rank<b style="color:#FF0000;">*</b></label>
<input type="text" id="rank"  class="form-control border-primary" placeholder="Enter Rank" name="rank" value="" required />
</div>

<div class="form-group">
<label for="userinput1">Teama<b style="color:#FF0000;">*</b></label>
<input type="text" id="teama"  class="form-control border-primary" placeholder="Enter Teama" name="teama" value="" required />
</div>

<div class="form-group">
<label for="userinput1">Teamb<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" id="teamb" placeholder="Enter Teamb" name="teamb" required />
</div>


<div class="form-group">
<label for="userinput1">Teamc<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" id="teamc" placeholder="Enter Teamc" name="teamc" required />
</div>

<div class="form-group">
<label for="userinput1">Bonus<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" id="bonus" placeholder="Bonus" name="bonus" required />
</div>
<div class="form-group">
<label for="userinput1">Reward<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" id="reward" placeholder="Reward" name="reward" required />
</div>




</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

<?php }else if($_REQUEST['case']=='edit'){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Edit Reward</h4>
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
<?php if($_REQUEST['f']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Reward already exists!</p><?php }?>
<?php if($_REQUEST['m']=='1'){?><p align="center" style=" color:#FF0000;">Already Exists!</p><?php }?>
<?php if($_REQUEST['m']=='2'){?><p align="center" style=" color:#00CC33;">Updated Successfully !</p><?php }?>

<div class="card-block">

<?php 
$sql="SELECT * FROM `iv_settings_reward` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="settings-reward-process.php?case=edit&id=<?=$_REQUEST['id']?>" method="post">
<div class="form-body">

<div class="form-group">
<label for="userinput1">Rank<b style="color:#FF0000;"> *</b></label>
<input type="text" id="rank" class="form-control border-primary" placeholder="Enter Rank" name="rank" value="<?=$fetch['rank']?>" required />
</div>

<div class="form-group">
<label for="userinput1">Teama<b style="color:#FF0000;">*</b></label>
<input type="text" id="teama"  class="form-control border-primary" placeholder="Enter Teama" name="teama" value="<?=$fetch['teama']?>" required />
</div>
<div class="form-group">
<label for="userinput1">Teamb<b style="color:#FF0000;">*</b></label>
<input type="text" id="teamb"  class="form-control border-primary" placeholder="Enter Teamb" name="teamb" value="<?=$fetch['teamb']?>" required />
</div>
<div class="form-group">
<label for="userinput1">Teamc<b style="color:#FF0000;">*</b></label>
<input type="text" id="teamc"  class="form-control border-primary" placeholder="Enter Teamc" name="teamc" value="<?=$fetch['teamc']?>" required />
</div>

<div class="form-group">
<label for="userinput1">Bonus<b style="color:#FF0000;">*</b></label>
<input type="text" id="bonus"  class="form-control border-primary" placeholder="Enter Bonus" name="bonus" value="<?=$fetch['bonus']?>" required />
</div>

<div class="form-group">
<label for="userinput1">Reward<b style="color:#FF0000;">*</b></label>
<input type="text" id="reward"  class="form-control border-primary" placeholder="Enter reward" name="reward" value="<?=$fetch['reward']?>" required />
</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
</div>
</form>
<?php }?>
</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

<?php }else if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Settings Reward</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in" align="right" style="padding:10px;margin-bottom:10px;">
<a href="settings-reward.php?case=add"><button type="submit" class="btn btn-primary"><i class="icon-plus"></i>ADD</button></a>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">Rank</th>
<th style="text-align:center;">Team_A</th>
<th style="text-align:center;">Team_B</th>
<th style="text-align:center;">Team_C</th>
<th style="text-align:center;">Bonus</th>
<th style="text-align:center;">Reward</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>
<?php
$tname=' iv_settings_reward';
$lim=100;
$tpage='settings-reward.php';
$where="ORDER BY `id` ASC";
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr height="40">
<td align="center" style="padding:2px;"><?=$i?></td>
<td align="center" style="padding:2px;"><?=$fetch['rank']?></td>
<td align="center" style="padding:2px;"><?=$fetch['teama']?></td>
<td align="center" style="padding:2px;"><?=$fetch['teamb']?></td>
<td align="center" style="padding:2px;"><?=$fetch['teamc']?></td>
<td align="center" style="padding:5px;"><?=$fetch['bonus']?></td>
<td align="center" style="padding:2px;"><?=$fetch['reward']?></td>

<td align="center" style="padding:2px;">
<a href="settings-reward.php?case=edit&id=<?=$fetch['id']?>" onclick="return confirm('Are you sure want to edit?')"><img src="images/edit.png"></a>&nbsp;
<a href="settings-reward-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you sure want to delete?')"><img src="images/delete.png" /></a></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="8" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
</div>
<div align="center"><?=$pagination?></div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>
<?php }?>

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

