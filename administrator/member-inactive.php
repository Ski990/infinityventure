<?php include('header.php');
$left=3;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div>&nbsp;</div>
<div class="col-xs-12">
<div class="card">
<div class="card-header">

<h4 class="card-title">Inactive Member List</h4>
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
<table width="100%">
<tr>
<td>
<div align="left" style="margin-left:10px;"><a href="member-inactive-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</td>
<td>
<div align="right" style="padding:10px;"><form name="frm1" method="post" action="member-inactive.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID, Name, Phone" style="width:170px;" />
</form></div>
</td>
</tr>
</table>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>

<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">User_ID</th>
<th style="text-align:center;">Sponsor</th>
<th style="text-align:center;">Name</th>
<th style="text-align:center;">Phone</th>
<th style="text-align:center;">Email</th>
<th style="text-align:center;">Password</th>
<th style="text-align:center;">Status</th>
<th style="text-align:center;">Pay_Status</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Approved</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='iv_member';
$lim=100;
$tpage='member-inactive.php';

if($_REQUEST['act']=='search')
{
$where="WHERE (`userid` LIKE '%".trim($_POST['search'])."%' OR `name` LIKE '%".trim($_POST['search'])."%' OR `phone` LIKE '%".trim($_POST['search'])."%') AND `paystatus`='I' ORDER BY `id` DESC";
}else{
$where="WHERE `paystatus`='I' ORDER BY `id` DESC";
}

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td style="padding:2px;" align="center"><?=$i?></td>
<td style="padding:2px;" align="center"><a href="../member/admin-login-process.php?userid=<?=$fetch['userid']?>&password=<?=base64_decode($fetch['password'])?>&ch=sc" target="_blank" style="text-decoration:none;"><strong><?=$fetch['userid']?></strong></a></td>
<td align="center" style="padding:2px;"><?php if($fetch['sponsor']){?><?=$fetch['sponsor']?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:2px;"><?=ucwords($fetch['name'])?></td>
<td align="center" style="padding:2px;"><?=$fetch['phone']?></td>
<td align="center" style="padding:2px;"><?=$fetch['email']?></td>
<td align="center" style="padding:2px;"><?=base64_decode($fetch['password'])?></td>
<td align="center" style="padding:2px;">
<?php if($fetch['status']=='I'){?><a href="member-process.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#CC0000;">Inactive</span></a>
<?php }else{?>
<a href="member-process.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#00CC00;">Active</span></a>
<?php }?>
</td>
<td align="center" class="tborder" style="padding:2px;">
<?php if($fetch['paystatus']=='I'){?><span style="color:#FF0000;">Pending</span>
<?php } else{?><span style="color:#009900;">Paid</span><?php } ?></td>
<td align="center" style="padding:2px;"><?=getDateConvert($fetch['date'])?></td>
<td align="center" style="padding:2px;"><?php if($fetch['approved']){?><?=$fetch['approved']?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:2px;">
<a href="view-member.php?id=<?=$fetch['id']?>" target="_blank"><img src="images/view.png" title="Inquiry Details" height="22" width="22"></a>
<a href="member.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png" title="Edit"></a>&nbsp;
<?php if($fetch['status']=='I'){  if($fetch['paystatus']=='I'){ ?>
<a href="member-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to delete this?')"><img src="images/delete.png" /></a><?php } }?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="13" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>