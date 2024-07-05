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
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Global Investment</h4>
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

<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC00; padding-bottom:8px;">Global Investment Added Successfully</p><?php }?>

<form class="form" action="settings-global-investment-process.php?case=add" method="post" enctype="multipart/form-data">
<div class="form-body">


<div class="form-group">
<label for="userinput5">Package<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Package" required id="package" name="package"/>
</div>

<div class="form-group">
<label for="userinput5">Amount<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Amount" required id="amount" name="amount"/>
</div>
<div class="form-group">
<label for="userinput5">Locking Days<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Locking Days" required id="lockingdays" name="lockingdays"/>
</div>
<div class="form-group">
<label for="userinput5">CTO(%)<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter CTO(%)" required id="ctoper" name="ctoper"/>
</div>

<div class="form-group">
<label for="userinput5">Valid Days<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Valid Days" required id="validdays" name="validdays"/>
</div>


<div class="form-group">
<label for="userinput5">Image<span style="color:#FF0000;">*</span></label>
<input  type="file" placeholder="Upload Image" id="file" name="file" value="" accept=".jpg,.png,.jpeg,.pjp" required />
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
<?php } else if($_REQUEST['case']=='edit'){
$sql="SELECT * FROM `iv_settings_global_investment` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Edit  Global Investment</h4>
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


<?php if($_REQUEST['e']=='1'){?><p align="center" style=" color:#FF0000;">Already Exists!</p><?php }?>
<?php if($_REQUEST['m']=='2'){?><p align="center" style=" color:#00CC33;">Updated Successfully !</p><?php }?>


<form class="form" action="settings-global-investment-process.php?case=edit&id=<?=$_REQUEST['id']?>" method="post" enctype="multipart/form-data">
<div class="form-body">


<div class="form-group">
<label for="userinput5">Package<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Package" required id="package" name="package" value='<?=stripslashes($fetch['package'])?>' />
</div>

<div class="form-group">
<label for="userinput5">Amount<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Amount" required id="amount" name="amount" value='<?=stripslashes($fetch['amount'])?>' />
</div>

<div class="form-group">
<label for="userinput5">Locking Days<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Locking Days" required id="lockingdays" name="lockingdays" value="<?=$fetch['lockingdays']?>"/>
</div>
<div class="form-group">
<label for="userinput5">CTO(%)<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter CTO(%)" required id="ctoper" name="ctoper" value="<?=$fetch['ctoper']?>"/>
</div>

<div class="form-group">
<label for="userinput5">Valid Days<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Valid Days" required id="validdays" name="validdays" value="<?=$fetch['validdays']?>"/>
</div>


<div class="form-group">
<label for="userinput5"></label>
<img src="investment/<?=$fetch['image']?>" height="120" width="180">
</div>

<div class="form-group">
<label for="userinput5">Image<span style="color:#FF0000;">*</span></label>
<input type="file" placeholder="Upload image" id="file" name="file" value="" accept=".jpg,.png,.jpeg,.pjp">
</div>


</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>UPDATE</button>
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
<?php }?>
<?php } else{ ?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Settings Global Investment</h4>
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

<div class="card-body collapse in" style="padding:5px;">
<div align="right"><a href="settings-global-investment.php?case=add" style="text-decoration:none;margin-top:10px;"><input type="button" name="button" value="ADD" class="btn btn-info"/></a></div></div>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No.</th>
<th style="text-align:center;">Package</th>
<th style="text-align:center;">Amount</th>
<th style="text-align:center;">Locking_Days</th>
<th style="text-align:center;">CTO(%)</th>
<th style="text-align:center;">Valid_Days</th>
<th style="text-align:center;">Image</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='iv_settings_global_investment';
$lim=100;
$tpage='settings-global-investment.php';
$where="ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center"><?=$i?></td>
<td align="center" style="padding:2px;"><?=ucwords(output($fetch['package']))?></td>
<td align="center" style="padding:2px;"><?=ucwords(output($fetch['amount']))?></td>
<td align="center" style="padding:2px;"><?=ucwords(output($fetch['lockingdays']))?></td>
<td align="center" style="padding:2px;"><?=ucwords(output($fetch['ctoper']))?> %</td>
<td align="center" style="padding:2px;"><?=ucwords(output($fetch['validdays']))?></td>

<td align="center"><img src="investment/<?=output($fetch['image'])?>" height="90" width="150" title="Service" /></td>

<td align="center">
<a href="settings-global-investment.php?case=edit&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to Edit?');"><img src="images/edit.png" /></a>&nbsp;<a href="settings-global-investment-process.php?case=delete&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to delete?');"><img src="images/delete.png" /></a>
</td>


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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>