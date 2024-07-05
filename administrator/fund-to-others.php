<?php include('header.php'); 
$left=3;
?>
<style>
table,
thead,
tr,
tbody,
th,
td {
text-align: center;
}
</style>
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
<h4 class="card-title">Fund to Others Transfer Statement</h4>
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
<div align="center" style="padding:5px;"><form name="frm1" method="post" action="fund-to-others.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" style="width:250px;" />
</form></div>

<div class="table-responsive">
<table class="table table-bordered table-striped" align="center">
<thead class="bg-teal bg-lighten-4" align="center">
<tr align="center">
<th width="82" align="center">Sl_No.</th>							
<th width="168" align="center">User_ID</th>				
<th width="182" align="center">Name</th>						
<th width="176" align="center">To_ID</th>	
<th width="182" align="center">Name</th>						
<th width="406" align="center">Fund</th>
<th width="406" align="center">Date</th>
</tr>
</thead>
<tbody>

<?php
$tname='iv_transfer_fund_others';
$lim=100;
$tpage='fund-to-others.php';
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
<tr align="center">
<td style="padding:3px;"><?=$i?></td>
<td style="padding:3px;"><?=$fetch['userid']?></td>
<td style="padding:3px;"><?=ucwords(getFromUserID($conn,$fetch['userid'],'name'))?></td>
<td style="padding:3px;"><?=$fetch['toid']?></td>
<td style="padding:3px;"><?=ucwords(getFromUserID($conn,$fetch['toid'],'name'))?></td>
<td style="padding:3px;"><?=$fetch['fund']?></td>
<td style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>


</tr>              
<?php $i++;}}else{?>
<tr><td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
<div align="center"><?=$pagination?></div>
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
