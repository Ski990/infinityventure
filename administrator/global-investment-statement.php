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
<h4 class="card-title">Global Investment Statement</h4>
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
<div align="left" style="margin-left:10px;"><a href="global-investment-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</td>

<td>
<div align="right" style="padding:5px;">
<form name="frm1" method="post" action="global-investment-statement.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" style="width:150px;" />
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
<th style="text-align:center;">Wallet</th>
<th style="text-align:center;">Package</th>
<th style="text-align:center;">Amount</th>
<th style="text-align:center;">No_Of_Quantity</th>
<th style="text-align:center;">Total_Amount</th>
<th style="text-align:center;">Closed_Amount</th>
<th style="text-align:center;">Status</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Lock_Expire_Date</th>
<th style="text-align:center;">Valid_Date</th>

</tr>
</thead>
<tbody>

<?php
$tname='iv_member_global_investment';
$lim=100;
$tpage='global-investment-statement.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".input($_POST['search'])."' ORDER BY `id` DESC";
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
<td align="center" style="padding:3px;"><?=$i?></td>
<td align="center" style="padding:3px;"><?=$fetch['userid']?></td>
<td align="center" style="padding:3px;"><?=ucwords(getMemberUserID($conn,$fetch['userid'],'name'))?></td>
<td align="center" style="padding:3px;"><?=$fetch['wallet']?></td>

<td align="center" style="padding:2px;"><?=getSettingsGlobalInvestment($conn,$fetch['package'],'package')?></td>

<td align="center" style="padding:3px;"><?=$fetch['amount']?></td>
<td align="center" style="padding:3px;"><?=$fetch['noquantity']?></td>
<td align="center" style="padding:3px;"><?=$fetch['total']?></td>
<td align="center" style="padding:3px;"><?=$fetch['closeamount']?></td>

<td align="center" style="padding:3px;"><?php if($fetch['status']=='R'){?><span style="color:#00CC00">Running</span><?php }else{?><span style="color:#FF0000">Complete</span><?php } ?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['lockexpire'])?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['validdate'])?></td>


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
