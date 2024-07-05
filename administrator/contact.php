<?php include('header.php');
$left=11;
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
<h4 class="card-title" id="basic-layout-colored-form-control">Contact</h4>
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

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already Exists !!</p><?php }?>

<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Contact Added Successfully!!</p><?php }?>

<form class="form" action="contact-process.php?case=add" method="post">
<div class="form-body">
<div class="form-group">
<label for="userinput5">Title<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Title" required id="title" name="title" value="">
</div>
<div class="form-group">
<label for="userinput5">Phone 1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone 1"  pattern="[6789][0-9]{9}"  maxlength="10" id="phone1" name="phone1" value="" required>
</div>

<div class="form-group">
<label for="userinput5">Phone 2</label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone 2" id="phone2" pattern="[6789][0-9]{9}"  maxlength="10" name="phone2" value="" >
</div>


<div class="form-group">
<label for="userinput5">Email 1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="email" placeholder="Enter Email 1" required id="email1" name="email1" value="">
</div>

<div class="form-group">
<label for="userinput5">Email 2</label>
<input class="form-control border-primary" type="email" placeholder="Enter Email 2" id="email2" name="email2" value="" >
</div>


<div class="form-group">
<label for="userinput5">Addressline 1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Address 1" required id="addline1" name="addline1" value="">
</div>

<div class="form-group">
<label for="userinput5">Addressline 2</label>
<input class="form-control border-primary" type="text" placeholder="Enter Address 2" id="addline2" name="addline2" value="" >
</div>

</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit
</button>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Contact</h4>
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

<?php if(isset($_REQUEST['p'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already Exists !!</p><?php }?>
<?php if(isset($_REQUEST['m'])==2){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Contact Update Successfully !!</p><?php }?>


<?php 
$sql="SELECT * FROM `iv_contact` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="contact-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post">
<div class="form-body">
<div class="form-group">
<label for="userinput5">Title<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text"  required id="title" name="title" value="<?=$fetch['title']?>">
</div>
<div class="form-group">
<label for="userinput5">Phone 1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone 1"  pattern="[6789][0-9]{9}"  maxlength="10" required id="phone1" name="phone1" value="<?=$fetch['phone1']?>">
</div>
<div class="form-group">
<label for="userinput5">Phone 2</label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone 2"  pattern="[6789][0-9]{9}"  maxlength="10" id="phone2" name="phone2" value="<?=$fetch['phone2']?>">
</div>


<div class="form-group">
<label for="userinput5">Email 1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Email 1" required id="email1" name="email1" value="<?=$fetch['email1']?>">
</div>

<div class="form-group">
<label for="userinput5">Email 2</label>
<input class="form-control border-primary" type="text" placeholder="Enter Email 2" id="email2" name="email2" value="<?=$fetch['email2']?>">
</div>

<div class="form-group">
<label for="userinput5">Addressline 1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Address 1" required id="addline1" name="addline1" value="<?=$fetch['addline1']?>">
</div>

<div class="form-group">
<label for="userinput5">Addressline 2</label>
<input class="form-control border-primary" type="text" placeholder="Enter Address 2" id="addline2" name="addline2" value="<?=$fetch['addline2']?>">
</div>

</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit
</button>
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
<h4 class="card-title">Contact</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">Title</th>
<th style="text-align:center;">Phone_1</th>
<th style="text-align:center;">Phone_2</th>
<th style="text-align:center;">Email_1</th>
<th style="text-align:center;">Email_2</th>
<th style="text-align:center;">Addressline_1</th>
<th style="text-align:center;">Addressline_2</th>
<th style="text-align:center;">Action</th>

</tr>
</thead>
<tbody>

<?php
$tname='iv_contact';
$lim=100;
$tpage='contact.php';
$where=" ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center" style="padding:3px;"><?=$i?></td>
<td align="center" style="padding:3px;"><?=ucwords($fetch['title'])?></td>
<td align="center" style="padding:3px;"><?=$fetch['phone1']?></td>
<td align="center" style="padding:3px;"><?=$fetch['phone2']?></td>
<td align="center" style="padding:3px;"><?=$fetch['email1']?></td>
<td align="center" style="padding:3px;"><?=$fetch['email2']?></td>
<td align="center" style="padding:3px;"><?=ucwords($fetch['addline1'])?></td>
<td align="center" style="padding:3px;"><?=ucwords($fetch['addline2'])?></td>
<td align="center" style="padding:3px;">
<a href="contact.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png"></a>&nbsp;
<a href="contact-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to delete this?')"><img src="images/delete.png" /></a></td>
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
