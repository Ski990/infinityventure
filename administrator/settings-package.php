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
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Package</h4>
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

<form class="form" action="settings-package-process.php?case=add" method="post" enctype="multipart/form-data">
<div class="form-body">

<div class="form-group">
<label for="userinput1">Package<b style="color:#FF0000;"> *</b></label>
<select type="text" id="package"  class="form-control border-primary"  name="package"  required>
<option value="">Select Package</option>
<option value="P1">P1</option>
<option value="P2">P2</option> 
<option value="P3">P3</option>
<option value="P4">P4</option>
<option value="P5">P5</option>
</select>
</div>

<div class="form-group">
<label for="userinput1">Package Name<b style="color:#FF0000;"> *</b></label>
<input type="text" id="packagename"  class="form-control border-primary" placeholder="Enter Package Name" name="packagename" value="" required />
</div>


<div class="form-group">
<label for="userinput1">Amount<b style="color:#FF0000;"> *</b></label>
<input type="text" id="amount"  class="form-control border-primary" placeholder="Enter Amount" name="amount" value="" required />
</div>

<div class="form-group">
<label for="userinput1">Direct Bonus(%)<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" id="directper" placeholder="Enter Direct Bonus(%)"  name="directper" required />
</div>

<div class="form-group">
<label for="userinput1">Matching Bonus<b style="color:#FF0000;"> *</b></label>
<input type="text" id="matchingbonus"  class="form-control border-primary" placeholder="Enter Matching Bonus" name="matchingbonus" value="" required />
</div>

<div class="form-group">
<label for="userinput1">Daily Capping<b style="color:#FF0000;"> *</b></label>
<input type="text" id="dailycapping"  class="form-control border-primary" placeholder="Enter Daily Capping" name="dailycapping" value="" required />
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
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Edit Package</h4>
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
<?php if($_REQUEST['f']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Package already exists!</p><?php }?>
<?php if($_REQUEST['m']=='1'){?><p align="center" style=" color:#FF0000;">Already Exists!</p><?php }?>
<?php if($_REQUEST['m']=='2'){?><p align="center" style=" color:#00CC33;">Updated Successfully !</p><?php }?>
<?php 
$sql="SELECT * FROM `iv_settings_package` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="settings-package-process.php?case=edit&id=<?=$_REQUEST['id']?>" method="post">
<div class="form-body">


<div class="form-group">
<label for="userinput5">Package<b style="color:#FF0000;">*</b></label>
<select type="text" id="package" class="form-control border-primary" name="package" required>
<option value="">Select Package</option>
<option value="P1"<?php if($fetch['package']=='P1'){echo 'selected';}?>>P1</option>
<option value="P2"<?php if($fetch['package']=='P2'){echo 'selected';}?>>P2</option>
<option value="P3"<?php if($fetch['package']=='P3'){echo 'selected';}?>>P3</option>
<option value="P4"<?php if($fetch['package']=='P4'){echo 'selected';}?>>P4</option>
<option value="P5"<?php if($fetch['package']=='P5'){echo 'selected';}?>>P5</option>
</select>                           
</div>

<div class="form-group">
<label for="userinput1">Package Name<b style="color:#FF0000;"> *</b></label>
<input type="text" id="packagename"  class="form-control border-primary" placeholder="Enter Package Name" name="packagename" value="<?=$fetch['packagename']?>" required />
</div>

<div class="form-group">
<label for="userinput1">Amount<b style="color:#FF0000;"> *</b></label>
<input type="text" id="amount"  class="form-control border-primary" placeholder="Enter Amount" name="amount" value="<?=$fetch['amount']?>" required />
</div>

<div class="form-group">
<label for="userinput1">Direct Bonus(%)<b style="color:#FF0000;"> *</b></label>
<input type="text" id="directper"  class="form-control border-primary" placeholder="Enter Direct Bonus(%)" name="directper" value="<?=$fetch['directper']?>" required />
</div>


<div class="form-group">
<label for="userinput1">Matching Bonus<b style="color:#FF0000;"> *</b></label>
<input type="text" id="matchingbonus"  class="form-control border-primary" placeholder="Enter Matching Bonus" name="matchingbonus" value="<?=$fetch['matchingbonus']?>" required />
</div>

<div class="form-group">
<label for="userinput1">Daily Capping<b style="color:#FF0000;"> *</b></label>
<input type="text" id="dailycapping"  class="form-control border-primary" placeholder="Enter Daily Capping" name="dailycapping" value="<?=$fetch['dailycapping']?>" required />
</div>
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
<h4 class="card-title">Settings Package</h4>
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
<a href="settings-package.php?case=add"><button type="submit" class="btn btn-primary"><i class="icon-plus"></i>ADD</button></a>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">Package</th>
<th style="text-align:center;">Package_Name</th>
<th style="text-align:center;">Amount</th>
<th style="text-align:center;">Direct_Bonus(%)</th>
<th style="text-align:center;">Matching_Bonus</th>
<th style="text-align:center;">Daily_Capping</th>
<th style="text-align:center;">Status</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>
<?php
$tname='iv_settings_package';
$lim=100;
$tpage='settings-package.php';
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
<td align="center" style="padding:5px;"><?=$fetch['package']?></h5></td>
<td align="center" style="padding:5px;"><?=$fetch['packagename']?></h5></td>
<td align="center" style="padding:5px;"><?=$fetch['amount']?></td>
<td align="center" style="padding:5px;"><?=$fetch['directper']?> % </td>
<td align="center" style="padding:5px;"><?=$fetch['matchingbonus']?></td>
<td align="center" style="padding:5px;"><?=$fetch['dailycapping']?></td>
<td align="center" style="padding:2px;">
<?php if($fetch['status']=='I'){?><a href="settings-package-process.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#CC0000;">Inactive</span></a>
<?php }else{?>
<a href="settings-package-process.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#00CC00;">Active</span></a>
<?php }?>
</td>
<td align="center" style="padding:2px;">
<a href="settings-package.php?case=edit&id=<?=$fetch['id']?>" onclick="return confirm('Are you sure want to edit?')"><img src="images/edit.png"></a>&nbsp;
<a href="settings-package-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you sure want to delete?')"><img src="images/delete.png" /></a></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
