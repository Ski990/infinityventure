<?php include('header.php');?>
<?php $pageid=8 ?>
<!-- END HEADER -->
<div class="col-md-12">

<div class="page-">
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
<!-- BEGIN SIDEBAR MENU -->
<?php include('leftpanel.php');?>
<!-- END SIDEBAR MENU -->
</div>
</div>
<!-- END SIDEBAR --> 
<!-- BEGIN CONTENT -->
<div class="row">
<div class="col-lg-12">
<div style="min-height:850px;">
<div align="center" class="row">
    <p align="center" style="color:#FF0000; font-size:22px; padding-top:5px;"><a onClick="printDivList()" style="text-decoration:none;">TAKE A PRINT OUT</a>
	</p>
    <p align="center"><a onClick="printDivList()" style="cursor:pointer;"><img src="images/print.png" title="print" border="0" style="height:16px;       width:16px;"></a>
	  <a onClick="captureCurrentDiv1()" style="cursor:pointer;"><img src="images/download.png" border="0" title="download" style="height:16px; width:      16px;"></a>
	</p>
</div>
 <div class="col-md-2"></div>
<?php  
$sql="SELECT * FROM `iv_member_purchase_product` WHERE `billno`='".$_REQUEST['billno']."' AND `userid`='".$_REQUEST['userid']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0){
$fetch=fetcharray($res);
}?>
<div class="col-md-8 col-md-offset-2 col-md-offset-2" align="center" >
<div id="printdiv" style="background:#FFFFFF;border:1px solid #000000;padding:10px; overflow:auto;">
<table width="98%" border="0" cellspacing="0" cellpadding="0" >
<tr height="30">
<td align="left" valign="middle" colspan="2"><p style="color:#000000;font-size:18px;"><img src="images/logo.png" border="0" style="height:50px; width:120px;"/></p></td>
<td align="right" valign="middle" colspan="2"><p style="color:#000000;font-size:18px;">Tax Invoice/Bill of Supply/Cash Memo</p></td>
</tr>
</table>

<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr height="20">
<td align="left" valign="middle" colspan="2"><p style="font-size:18px;color:#000000;">Member Details:</p></td>
 
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr >
<td width="5%" align="center" valign="middle" class="header" style="color:#000000;">Sl_No.</td>
<td width="17%" align="center" valign="middle" class="header" style="color:#000000;">Title</td>
<td width="13%" align="center" valign="middle" class="header" style="color:#000000;">BV</td>
<td width="13%" align="center" valign="middle" class="header" style="color:#000000;">Subtotal_BV</td>

<td width="10%" align="center" valign="middle" class="header" style="color:#000000;">MRP</td>
<td width="11%" align="center" valign="middle" class="header" style="color:#000000;">Quantity</td>
<td width="16%" align="center" valign="middle" class="header" style="color:#000000;">Total_Amount</td>

</tr>
<?php
$sql1="SELECT * FROM `iv_member_purchase_product` WHERE `billno`='".$_REQUEST['billno']."' AND `userid`='".$_REQUEST['userid']."' ORDER BY `id` DESC";
	$res1=query($conn,$sql1);
	$num1=numrows($res1);
	$i=1;
	if($num1>0)
	{
	while($fetch1=fetcharray($res1))
{	
?>

<tr >
<td align="center" valign="middle" class="<?=$class?>"><?=$i?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=stripslashes(getProduct($conn,$fetch1['proid'],'title'))?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=$fetch1['bvalue']?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=$fetch1['totalbv']?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=$fetch1['mrp']?></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=$fetch1['quantity']?></pre></td>
<td align="center" valign="middle" class="<?=$class?>" style="padding:5px;color:#000000;"><?=$fetch1['total']?></td>
</tr>      
<?php $i++; }}?>
<tr >
<td align="left" valign="middle" colspan="6"><p style="color:#000000;font-size:18px;">TOTAL:</p></td>

<td width="16%" align="center"  valign="middle" ><p style="color:#000000;font-size:18px;"><?=getTotalOrderMemberPurchaseBillno($conn,$fetch['userid'],$fetch['billno'])?></p></td>
</tr>     
<tr>
<td align="left" valign="middle" colspan="9" ><p style="color:#000000;font-size:18px;">Amount In Words:&nbsp;<?=getNumtoWord($conn,getTotalOrderMemberPurchaseBillno($conn,$fetch['userid'],$fetch['billno']))?></p></td>
</tr>
</table>
<div>&nbsp;</div>
<div>Please Check our Website</div>
<div> <?=$domain?></div>



</div>
</div>
</div>

</div>


<!-- END CONTENT -->
<!-- END CONTAINER -->

<!-- BEGIN FOOTER --></div>

<!-- END FOOTER -->
<script src="global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="global/scripts/metronic.js" type="text/javascript"></script>
<script src="layout2/scripts/layout.js" type="text/javascript"></script>
<script src="layout2/scripts/demo.js" type="text/javascript"></script>
<script src="pages/scripts/index.js" type="text/javascript"></script>
<script src="pages/scripts/tasks.js" type="text/javascript"></script>
<script src="pages/scripts/table-advanced.js"></script>
<link href="pagination.css" rel="stylesheet" type="text/css">
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
Metronic.init(); // init metronic core componets
Layout.init(); // init layout
Demo.init(); // init demo features 
Index.init();   
TableAdvanced.init();
});
</script>

<script type="text/javascript" language="javascript">
function printDivList()
{
var divToPrint=document.getElementById('printdiv');
var newWin=window.open('','Print-Window','width=900,mheight=800');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
newWin.document.close();
}
</script>
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript" src="js/html2canvas.js"></script> 
<script type="text/javascript">

function captureCurrentDiv1()
{
html2canvas([document.getElementById('printdiv')], {   
onrendered: function(canvas)  
{
var img = canvas.toDataURL()
$.post("save.php", {data: img}, function (file) {
window.location.href =  "download-print.php?path="+file});   
}
});
}

</script>


<!-- END JAVASCRIPTS -->
</body>
<style>

</style>
<!-- END BODY -->
</html>