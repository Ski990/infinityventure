<?php include('header.php');
$left=2;
?>

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<script src="assets/js/ajax.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="pagination.css">
<link rel="stylesheet" href="assets/css/style.css">


<?php if($_REQUEST['case']=='edit'){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body">
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Edit Company Bank Details</h4>
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
<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC00; padding-bottom:8px;">Update Successfully!</p><?php }?>

<?php 
$sql="SELECT * FROM `iv_settings_company` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>

<form class="form" action="settings-bankdetails-process.php?case=edit&id=<?=$_REQUEST['id']?>" method="post" enctype="multipart/form-data">

<div class="form-body">
<div class="form-group">
<label for="userinput5">Bank Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="bname" name="bname" class="form-control  border-primary" placeholder="Bank Name" value="<?=$fetch['bname']?>" required />         
</div>

<div class="form-group">
<label for="userinput5">Account Name<b style="color:#FF0000;">*</b></label>
<input type="text" id="accname" name="accname" class="form-control  border-primary" placeholder="Account Name" value="<?=$fetch['accname']?>" required />                  
</div>

<div class="form-group">
<label for="userinput5">Account Number<b style="color:#FF0000;">*</b></label>
<input type="text" id="accno" name="accno" class="form-control  border-primary" placeholder="Account Number" value="<?=$fetch['accno']?>" required />                            
</div>  
     
<div class="form-group">
<label for="userinput5">IFSC Code<b style="color:#FF0000;">*</b></label>
<input type="text" id="ifscode" name="ifscode" class="form-control  border-primary" placeholder="IFSC Code" value="<?=$fetch['ifscode']?>" required />                            
</div>

<div class="form-group">
<label for="userinput5">UPI ID<b style="color:#FF0000;">*</b></label>
<input type="text" id="upiid" name="upiid" class="form-control  border-primary" placeholder="UPI ID" value="<?=$fetch['upiid']?>" required />
</div>

<div class="form-group">
<label for="userinput5">QR Code<b style="color:#FF0000;">*</b></label>
<div><img src="qrcode/<?=$fetch['qrcode']?>" height="80" width="80"/></div>
<div>&nbsp;</div>
<div><input type="file" id="file" name="file" placeholder="QR Code" accept=".jpg,.png,.jpeg,.pjp" /></div>
</div>
</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
</div>

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
<h4 class="card-title">Settings Company Bank Details</h4>
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
<th style="text-align:center;">Bank_Name</th>
<th style="text-align:center;">Account_Name</th>
<th style="text-align:center;">Account_Number</th>
<th style="text-align:center;">IFSC_Code</th>
<th style="text-align:center;">UPI_ID</th>
<th style="text-align:center;">QR_Code</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='iv_settings_company';
$lim=100;
$tpage='settings-bankdetails.php';
$where="ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr style="text-align:center;">
<td style="text-align:center;"><?=$i?></td>
<td style="text-align:center;"><?=$fetch['bname']?></td>
<td style="text-align:center;"><?=$fetch['accname']?></td>
<td style="text-align:center;"><?=$fetch['accno']?></td>
<td style="text-align:center;"><?=$fetch['ifscode']?></td>
<td style="text-align:center;"><?=$fetch['upiid']?></td>
<td style="text-align:center;"><?php if($fetch['qrcode']){?><img src="qrcode/<?=$fetch['qrcode']?>" height="80" width="80" /><?php }?></td>

<td align="center">
<a href="settings-bankdetails.php?case=edit&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to edit?');"><img src="images/edit.png" /></a>&nbsp;
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
<!-- END VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>
