<?php include('header.php');
$left=13;
?>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Support</h4>
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
<div align="right" style="padding:5px;"><form name="frm1" method="post" action="support.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" style="width:150px;" />
</form></div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">User_ID</th>
<th style="text-align:center;">Type</th>
<th style="text-align:center;">Subject</th>
<th style="text-align:center;">Message</th>
<th style="text-align:center;">Reply</th>
<th style="text-align:center;">Status</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='iv_support';
$lim=100;
$tpage='support.php';
if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim($_POST['search'])."' ORDER BY `id` DESC";
}else{
$where="ORDER BY `id` DESC";
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
<td align="center" style="padding:2px;"><?=$i?></td>
<td align="center" style="padding:2px;"><?=$fetch['userid']?></td>
<td align="center" style="padding:2px;"><?=$fetch['type']?></td>
<td align="center" style="padding:2px;"><?=ucwords($fetch['subject'])?></td>
<td align="center" style="padding:2px;"><?=ucfirst($fetch['message'])?></td>
<td align="center" style="padding:2px;"><?php if($fetch['reply']){?><?=ucfirst($fetch['reply'])?><?php }else{?><a href="reply.php?id=<?=$fetch['id']?>">Reply</a><?php }?></td>
<td align="center" style="padding:2px;"><?php if($fetch['status']=='C'){?><span class="label label-info" style="color:#009900;font-weight:bold;">Completed</span><?php }else{?><a href="support-process.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#FF0000;">Pending</span></a><?php }?></td>
<td align="center" style="padding:2px;"><?=getDateConvert($fetch['date'])?></td>

<td align="center" style="padding:2px;">
<?php if($fetch['status']=='C'){?><span style="color:#009900;"><strong>--</strong></span><?php }else{?><span style="color:#FF0000;"><strong><a href="support-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you sure want to delete')"><img src="images/delete.png" /></a></strong></span><?php }?>
</td>
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