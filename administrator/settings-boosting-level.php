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
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Boosting Level</h4>
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

<form class="form" action="settings-boosting-level-process.php?case=add" method="post" enctype="multipart/form-data">
<div class="form-body">
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label for="userinput1">Level<b style="color:#FF0000;">*</b></label>
<select id="level"  class="form-control border-primary"  name="level"  required>
<option value="">Select Level</option>
<option value="Level 1">Level 1</option>
<option value="Level 2">Level 2</option> 

</select>
</div>


<div class="form-group">
<label for="userinput1">Team<b style="color:#FF0000;"> *</b></label>
<input type="text" id="team"  class="form-control border-primary" placeholder="Enter Team" name="team" value="" required />
</div>



<div class="form-group">
<label for="userinput1">Bonus<b style="color:#FF0000;"> *</b></label>
<input type="text" id="bonus"  class="form-control border-primary" placeholder="Enter Bonus" name="bonus" value="" required />
</div>

<div class="form-group">
<label for="userinput1">Total<b style="color:#FF0000;"> *</b></label>
<input type="text" id="total"  class="form-control border-primary" placeholder="Enter Total" name="total" value="" required />
</div>

</div>

</div>
<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
</div>
<div>
</div>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Edit Boosting Level</h4>
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
<?php if($_REQUEST['f']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Level already exists!</p><?php }?>
<?php if($_REQUEST['m']=='1'){?><p align="center" style=" color:#FF0000;">Already Exists!</p><?php }?>
<?php if($_REQUEST['m']=='2'){?><p align="center" style=" color:#00CC33;">Updated Successfully !</p><?php }?>
<?php 
$sql="SELECT * FROM `iv_settings_boosting_level` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="settings-boosting-level-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post" enctype="multipart/form-data">

<div class="form-body">


<div class="form-group">
<label for="userinput5">Level<b style="color:#FF0000;">*</b></label>
<select id="level" class="form-control border-primary" name="level" required>
<option value="">Select Level</option>
<option value="Level 1"<?php if($fetch['level']=='Level 1'){echo 'selected';}?>>Level 1</option>
<option value="Level 2"<?php if($fetch['level']=='Level 2'){echo 'selected';}?>>Level 2</option>
</select>                           
</div>

<div class="form-group">
<label for="userinput1">Team<b style="color:#FF0000;"> *</b></label>
<input type="text" id="team"  class="form-control border-primary" placeholder="Enter Team" name="team" value="<?=$fetch['team']?>" required />
</div>


<div class="form-group">
<label for="userinput1">Bonus<b style="color:#FF0000;"> *</b></label>
<input type="text" id="bonus"  class="form-control border-primary" placeholder="Enter Bonus" name="bonus" value="<?=$fetch['bonus']?>" required />
</div>

<div class="form-group">
<label for="userinput1">Total<b style="color:#FF0000;"> *</b></label>
<input type="text" id="total"  class="form-control border-primary" placeholder="Enter Total" name="total" value="<?=$fetch['total']?>" required />
</div>

</div>
   
<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
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

<?php }else{ ?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Settings Boosting Level</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>

</ul>
</div>
</div>
<div class="card-body collapse in" style="padding:5px;">
<div align="right"><a href="settings-boosting-level.php?case=add" style="text-decoration:none;margin-top:10px;"><input type="button" name="button" value="New Level" class="btn btn-info"/></a></div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No.</th>
<th style="text-align:center;">Level</th>
<th style="text-align:center;">Team</th>
<th style="text-align:center;">Bonus</th>
<th style="text-align:center;">Total</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='iv_settings_boosting_level';
$lim=100;
$tpage='settings-boosting-level.php';
$where="ORDER BY `id` ASC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr  style="text-align:center;">
<td align="center" style="padding:5px;"><?=$i?></td>
<td align="center" style="padding:5px;"><?=$fetch['level']?></td>
<td align="center" style="padding:5px;"><?=$fetch['team']?></td>
<td align="center" style="padding:5px;"><?=$fetch['bonus']?></td>
<td align="center" style="padding:5px;"><?=$fetch['total']?></td>
<td><a href="settings-boosting-level.php?case=edit&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to edit?');"><img src="images/edit.png" /></a>&nbsp;<a href="settings-level-process.php?case=delete&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to delete?');"><img src="images/delete.png" /></a></td>
</td>
</tr> 
<?php $i++;}}else{?>
<tr><td colspan="6" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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