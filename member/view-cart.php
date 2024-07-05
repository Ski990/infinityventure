<?php
session_start();
include('../administrator/includes/function.php');
$ip=$_SERVER['REMOTE_ADDR'];
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>
<script>
function printDivList()
{
var divToPrint=document.getElementById('printdiv');
var newWin=window.open('','Print-Window','width=900,height=800');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
newWin.document.close();
}
</script>
<script src="assets/js/ajax.js"></script>
<script>
function getCash(id)
{

xmlhttp.open('GET','get-cash.php?type='+id);
xmlhttp.onreadystatechange=getsendRequestKeyword22;
xmlhttp.send();
}
function getsendRequestKeyword22()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('viewCash').innerHTML=response;

}
}
}
</script>


<script>
function getcountprice(id,pid,productid)
{
var quantity=document.getElementById("quantity"+id).value;
var price=document.getElementById("price"+id).innerHTML;
var total=(quantity*price);
modifytotal=total.toFixed(2);
var total=(total+gst);
total=total.toFixed(2);
document.getElementById("total"+id).innerHTML=modifytotal;

//alert(document.getElementById("mybtn").innerHTML);
//document.getElementById("mybtn").innerHTML=parseFloat(document.getElementById("mybtn").innerHTML)+parseFloat(finaltotal);
//document.getElementById("mybtn")





if(pid!='' && quantity!='')
{
xmlhttp.open('GET','get-updatecart.php?pid='+pid+'&quantity='+quantity+'&productid='+productid);
xmlhttp.onreadystatechange=getupdatecart;
xmlhttp.send();
}
}






function getupdatecart()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
//alert(response);
}
}
}
</script>

<script>
function getSublocation(id)
{
xmlhttp.open('GET','get-stockid.php?id='+id);

xmlhttp.onreadystatechange=getsendRequestKeyword1;
xmlhttp.send();
}
function getsendRequestKeyword1()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('locDiv').innerHTML=response;
}
}
}
</script>
<script>
function getStockid(id)
{
var loc=document.getElementById('location').value;
var subloc=document.getElementById('subloc').value;

xmlhttp.open('GET','get-stockid1.php?loc='+loc+'&subloc='+subloc);
xmlhttp.onreadystatechange=getsendRequestKeyword12;
xmlhttp.send();
}
function getsendRequestKeyword12()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;

document.getElementById('stockpoint1').innerHTML=response;

}
}
}
</script>


<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
<div class="wrapper">


<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="card" style="z-index:9999; margin-top:50px;">
<div class="card-header">
<div class="card-title"><a href="javascript:history.go(-1)"><img src="images/back-page.png" height="16" width="20"> &nbsp;  Cart Statement</a>  </div>
</div>
</div>
<div class="row">

<div class="col-md-12">

<div class="card">

<div class="card-body" style="overflow:auto; background-color:#FFFFFF">
<?php if($_REQUEST['m']==1){?><div align="center"><div id="norecord" style="color:#009900;">Your order successfully placed!</div></div><?php }?>
<?php if($_REQUEST['e']==1){?><div align="center"><div id="norecord" style="color:#009900;">Added Sucessfully !!</div></div><?php }?>
<?php if($_REQUEST['e']==2){?><div align="center"><div id="norecord" style="color:#FF0000;">Insufficient fund!</div></div><?php }?>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">Product_Item</th>
<th align="center">Color</th>
<th align="center">Size</th>
<th align="center">Quantity</th>
<th align="center">Original_Amount </th>
<th align="center">Price </th>
<th align="center">Total</th>
<th align="center">Action</th>

</tr>
</thead>
<tbody>
<?php
$tname='iv_tmp_cart';
$lim=100;
$tpage='view-cart.php';
$where="WHERE `ipaddress`='".$ip."' AND `userid`='".$userid."' ORDER BY `id` DESC";
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
$uid=$fetch['id'];
$productid=$fetch['pid'];

$ts=getProductSell($conn,$fetch['pid']);

$originalamt=getProduct($conn,$fetch['pid'],'price');
$discountedamt=getProduct($conn,$fetch['pid'],'offerprice');

$cartquantity=getTotalCartQuantity($conn,$fetch['pid']);

$avs=($ts-$cartquantity);
?>
<td align="center"><?=$i?></td>
<td align="center"><?=output(stripslashes(getProduct($conn,$fetch['pid'],'title')))?></td>
<td align="center"><?=stripslashes(strip_tags(getColor($conn,$fetch['color'],'color')))?></td>
<td align="center"><?=stripslashes(strip_tags(getSize($conn,$fetch['size'],'size')))?></td>
<td align="center"><input type="number" style="width:40%; border:none" value="<?=trim($fetch['quantity'])?>" min="1" max="<?=$avs?>" id="quantity<?=$i?>"  onChange="getcountprice(<?=$i?>,<?=$uid?>,<?=$productid?>)" ></td>

<td align="center" id="originalamt<?=$i?>"><?=output($originalamt)?></td>
<td align="center" id="price<?=$i?>"><?=output($fetch['price'])?></td>
<td align="center" id="total<?=$i?>"><?=output($fetch['total'])?></td>

<td align="center" class="tborder">

<a href="edit-cart.php?case=edit&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to edit?')"><img src="images/edit.png"></a>&nbsp;

<a href="cart-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" style="cursor:pointer;" onClick="return confirm('Are you sure want to Delete this');"><img src="images/delete.png" title="Delete"></a>



</td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">Your Cart is empty!</td></tr>
<?php }?>
</tbody>
</table>

<?php 
$a=getTotal($conn,$userid);
if($a>0)
{
?>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-4">
<div align="center"><?php if(getSettingsBank($conn,'qrcode')){?><img src="../administrator/plan/<?=getSettingsBank($conn,'qrcode')?>" width="100%" height="250px" alt="QR Code Image" /><?php }?></div>
<h3 align="center">Bank Name : <?=getSettingsBank($conn,'bname')?></h3>
<h3 align="center">Account Holder Name : <?=getSettingsBank($conn,'accname')?></h3>
<h3 align="center">Account No : <?=getSettingsBank($conn,'accno')?></h3>
<h3 align="center">IFSC Code : <?=getSettingsBank($conn,'ifscode')?></h3>
<?php if(getSettingsBank($conn,'phonepay')){?><h3 align="center">Phone Pe : <?=getSettingsBank($conn,'phonepay')?></h3><?php }?>
<?php if(getSettingsBank($conn,'googlepay')){?><h3 align="center">Google Pay : <?=getSettingsBank($conn,'googlepay')?></h3><?php }?>
<?php if(getSettingsBank($conn,'paytm')){?><h3 align="center">Paytm : <?=getSettingsBank($conn,'paytm')?></h3><?php }?>
<?php if(getSettingsBank($conn,'upiid')){?><h3 align="center">Other UPI ID : <?=getSettingsBank($conn,'upiid')?></h3><?php }?>
</div>
<div class="col-md-4">



<form class="form" action="order-process.php" method="post"  enctype="multipart/form-data">
<h3 align="center" style="color:#FF0000;font-weight:bold;">Fund Wallet: <?=getFundWallet($conn,$userid)?></h3>
<h3 align="center" style="color:#009900" > Total Amount: <span id="mybtn"><?=getTotal($conn,$userid)?></span></h3>

<div class="form-group">
<select name="address" id="address" class="form-control border-primary" required>
<option value="">Select Delivery Address</option>
<?php 
$sql="SELECT * FROM `iv_member_delivery` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=$fetch['addline1']?>(<?=$fetch['addline2']?>,<?=$fetch['landmark']?>,<?=$fetch['city']?>,<?=$fetch['pincode']?>)</option>
<?php }}?>
</select>
</div>


<div class="form-group">
<label for="userinput1">Agent Name<b style="color:#FF0000;"> *</b></label>
<select name="agentid" id="agentid" class="form-control" required tabindex="1" o>
<option value="">Select Agent Name </option>
<?php
$sqlst1="SELECT * FROM `iv_agent` WHERE `status`='A' ORDER BY 	`id` DESC ";
$resst1=query($conn,$sqlst1);
$numst1=numrows($resst1);
if($numst1>0)
{
while($fetchst1=fetcharray($resst1))
{
?>
<option value="<?=$fetchst1['id']?>"><?=$fetchst1['username']?></option>
<?php }}?>
</select>
</div>



<div class="form-group">
<label for="userinput1">Payment Method<b style="color:#FF0000;"> *</b></label>
<select name="type" id="type" required   align="center" class="form-control border-primary" onChange="getCash(this.value);">
<option value="">Payment Option</option>
<option value="Wallet">Wallet</option>
<option value="Cash On Delivery">Cash On Delivery</option>
</select>
</div>

<div id="viewCash" align="center"></div>

<div class="form-actions right" align="center">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>ORDER  NOW</button>
<div>&nbsp;&nbsp;</div>
<div>&nbsp;&nbsp;</div>
</div>

</form>
</div>
</div>
<?php }?> 
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<?php include('footer.php')?>
<script>
function copyToClipboard(element) {
var $temp = $("<input>");
$("body").append($temp);
$temp.val($(element).text()).select();
document.execCommand("copy");
$temp.remove();
document.getElementById('cpbutton').innerHTML='COPIED';
}
</script>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>


<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
</body>
</html>
