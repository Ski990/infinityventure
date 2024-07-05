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
<h4 class="card-title">Bank Statement</h4>
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
<div align="left" style="margin-left:10px;"><a href="member-bankdetails-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</td>
<td>
<div align="right" style="padding:5px;"><form name="frm1" method="post" action="bank-details.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID, Name" style="width:250px;" />
</form></div>
</td>
</tr>
</table>

<div class="table-responsive">
<table class="table table-bordered table-striped" align="center">
<thead class="bg-teal bg-lighten-4" align="center">
<tr align="center">
<th width="82" align="center">Sl_No.</th>							
<th width="168" align="center">User_ID</th>				
<th width="182" align="center">Name</th>					
<th width="186" align="center">Bank_Name</th>
<th width="186" align="center">Branch</th>
<th width="186" align="center">Account_Name</th>
<th width="186" align="center">Account_Number</th>
<th width="186" align="center">IFSC_Code</th>
</tr>
</thead>
<tbody>

<?php
$tname='iv_member';
$lim=100;
$tpage='bank-details.php';
if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim($_POST['search'])."' OR `name` LIKE '".trim($_POST['search'])."' ORDER BY `id` DESC";
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
<td style="padding:3px;"><?=ucwords(strtolower($fetch['name']))?></td>
<td style="padding:3px;"><?=$fetch['bname']?></td>
<td style="padding:3px;"><?=$fetch['branch']?></td>
<td style="padding:3px;"><?=$fetch['accname']?></td>
<td style="padding:3px;"><?=$fetch['accno']?></td>
<td style="padding:3px;"><?=$fetch['ifscode']?></td>
</tr>              
<?php $i++;}}else{?>
<tr><td colspan="8" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
