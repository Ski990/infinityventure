<?php include('header.php'); 
$left=12;
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
<h4 class="card-title">View Feedback Details</h4>
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
$sql="SELECT * FROM `iv_feedback` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0){
$fetch=fetcharray($res)
?>
<table width="954" class="table mb-0">
<thead>
<tr>
<td width="83">Name</td>
<td width="859"><?=ucwords($fetch['name'])?></td>
</tr>
</thead>
<tbody>
<tr>
<td width="83">Email</td>
<td width="859"><?=stripslashes($fetch['email'])?></td>
</tr>
<tr>
<td width="83">Phone</td>
<td width="859"><?=$fetch['phone']?></td>

</tr>
<tr>
<td width="83">Subject</td>
<td width="859"><?=ucwords(stripslashes($fetch['subject']))?></td>
</tr>
<tr>

<td width="83">Message</td>
<td width="859" colspan="3"><?=ucwords(stripslashes($fetch['message']))?></td>
</tr>

<tr>
<td width="83">Date</td>
<td width="859" colspan="3"><?=getDateConvert($fetch['date'])?></td>
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