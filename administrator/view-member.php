<?php include('header.php'); 
$left=3;
?>
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
<h4 class="card-title">View Member Details</h4>
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
<div class="table-responsive">
<?php
$sql="SELECT * FROM `iv_member` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<table width="954" class="table mb-0">

<tr>
<td width="169">User_ID</td>
<td width="773"><?=$fetch['userid']?></td>
</tr>

<tr>
<td width="169">Sponsor</td>
<td width="773"><?php if($fetch['sponsor']){?><?=$fetch['sponsor']?><?php }else{?>----<?php }?></td>
</tr>

<tr>
<td width="169">Name</td>
<td width="773"><?=ucwords($fetch['name'])?></td>
</tr>

<tr>
<td width="169">Package</td>
<td width="773"><?php if($fetch['package']){?><?=getSettingsPackage($conn,$fetch['package'],'package')?><?php }else{?>----<?php }?></td>
</tr>


<tr>
<td width="169">Placement</td>
<td width="773"><?php if($fetch['placement']){?><?=$fetch['placement']?><?php }else{?>----<?php }?></td>
</tr>


<tr>
<td width="169">Position</td>
<td width="773"><?php if($fetch['position']){?><?=$fetch['position']?><?php }else{?>----<?php }?></td>
</tr>



<tr>
<td width="169">Password</td>
<td width="773"><?=base64_decode($fetch['password'])?></td>
</tr>

<tr>
<td width="169">Email</td>
<td width="773"><?=$fetch['email']?></td>
</tr>
<tr>
<td width="169">Phone</td>
<td width="773"><?=$fetch['phone']?></td>
</tr>
<tr>
<td width="169">Address</td>
<td width="773"><?=$fetch['address']?></td>
</tr>

<tr>
<td width="169">Status</td>
<td width="773"><?php if($fetch['status']=='I'){?><span style="color:#FF0000;">Inactive</span><?php }else{?><span style="color:#009900;">Active</span><?php } ?></td>
</tr>

<tr>
<td width="169">Pay Status</td>
<td width="773"><?php if($fetch['paystatus']=='I'){?><span style="color:#FF0000;">Pending</span><?php }else{?><span style="color:#009900;">Paid</span><?php } ?></td>
</tr>

<tr>
<td width="169">Date</td>
<td width="773"><?=getDateConvert($fetch['date'])?></td>
</tr>

<tr>
<td width="169">Approved</td>
<td width="773"><?php if($fetch['approved']){?><?=getDateConvert($fetch['approved'])?><?php }else{?>---<?php }?></td>
</tr>

</table>
<?php } ?>
</div>
</div>

<div class="card-body collapse in">
<h3 style="padding:5px 20px;font-size:20px;"><b>Member Bank Details</b></h3>
<div class="table-responsive">
<?php
$sql="SELECT * FROM `iv_member` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<table width="954" class="table mb-0">
<thead>
<tr>
<td width="169">Bank Name</td>
<td width="773"><?php if($fetch['bname']){?><?=ucwords($fetch['bname'])?><?php }else{?>----<?php }?></td>
</tr>
<tr>
<td width="169">Branch</td>
<td width="773"><?php if($fetch['branch']){?><?=ucwords($fetch['branch'])?><?php }else{?>----<?php }?></td>
</tr>
<tr>
<td width="169">Account Name</td>
<td width="773"><?php if($fetch['accname']){?><?=ucwords($fetch['accname'])?><?php }else{?>----<?php }?></td>
</tr>
<tr>
<td width="169">Account Number</td>
<td width="773"><?php if($fetch['accno']){?><?=$fetch['accno']?><?php }else{?>----<?php }?></td>
</tr>
<tr>
<td width="169">IFSC Code</td>
<td width="773"><?php if($fetch['ifscode']){?><?=strtoupper($fetch['ifscode'])?><?php }else{?>----<?php }?></td>
</tr>

</tbody>
</table>
<?php } ?>
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
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>