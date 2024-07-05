<?php
include('header.php');
$left=3;
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
<h4 class="card-title">Income Statement</h4>
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
<div align="left" style="margin-left:10px;"><a href="income-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</td>
<td>
<div align="center" style="color:#FF0000;font-size:24px;">
<?php
$total=0;
$sqlp="SELECT * FROM `iv_member` WHERE `status`='A' ORDER BY `id` DESC";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
while($fetchp=fetcharray($resp))
{
$total=$total+getAvailableWallet($conn,$fetchp['userid']);
}
}
?>
</div>
</td>
<td>
<div align="right" style="padding:5px;">
<form name="frm1" method="post" action="income-statement.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" style="width:150px;" />
</form>
</div>
</td>
</tr>
</table>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">User_ID</th>
<th style="text-align:center;">Name</th>
<th style="text-align:center;">Total_Income</th>
<th style="text-align:center;">Withdrawal</th>
<th style="text-align:center;">Current_Wallet</th>
<th style="text-align:center;">Fund_Wallet</th>
</tr>
</thead>
<tbody>

<?php
$tname='iv_member';
$lim=100;
$tpage='income-statement.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".input($_POST['search'])."' AND `status`='A' ORDER BY `id` DESC";
}else{
$where="WHERE `status`='A' ORDER BY `id` DESC";
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
<td align="center" style="padding:3px;"><?=$i?></td>
<td align="center" style="padding:3px;"><?=$fetch['userid']?></td>
<td align="center" style="padding:3px;"><?=ucwords(getMemberUserID($conn,$fetch['userid'],'name'))?></td>
<td align="center" style="padding:3px;"><?=getTotalIncomeMember($conn,$fetch['userid'])?></td>
<td align="center" style="padding:3px;"><?=getWithdrawalMember($conn,$fetch['userid'])?></td>
<td align="center" style="padding:3px;"><?=getAvailableWallet($conn,$fetch['userid'])?></td>
<td align="center" style="padding:3px;"><?=getFundWallet($conn,$fetch['userid'])?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
