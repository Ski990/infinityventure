<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
 $productid=$_REQUEST['pid'];

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

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">


<link rel="stylesheet" href="assets1/css/bootstrap.min.css">
<link rel="stylesheet" href="assets1/css/animate.min.css">
<link rel="stylesheet" href="assets1/css/boxicons.min.css">
<link rel="stylesheet" href="assets1/css/flaticon.css">
<link rel="stylesheet" href="assets1/css/magnific-popup.min.css">
<link rel="stylesheet" href="assets1/css/nice-select.min.css">
<link rel="stylesheet" href="assets1/css/slick.min.css">
<link rel="stylesheet" href="assets1/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets1/css/meanmenu.min.css">
<link rel="stylesheet" href="assets1/css/rangeSlider.min.css">
<link rel="stylesheet" href="assets1/css/style.css">
<link rel="stylesheet" href="assets1/css/responsive.css">




<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
<script src="js/ajax.js" type="text/javascript"></script>
<script>
function getCategory1(id)
{

xmlhttp.open('GET','get-category1.php?cid='+id);
xmlhttp.onreadystatechange=getsendRequestCategory;
xmlhttp.send();
}
function getsendRequestCategory()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('catDiv').innerHTML=response;
//getProduct();
}
}
}
</script>
<script>
function getProduct()
{
var cat=document.getElementById('category').value;
xmlhttp.open('GET','get-product.php?cat='+cat);
xmlhttp.onreadystatechange=getsendRequestKeywordProduct1;
xmlhttp.send();
}
function getsendRequestKeywordProduct1()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('productDiv').innerHTML=response;
}
}
}
</script>

<script>
function refreshpage(color,pid)
alert(color,pid)
{
//alert(color);
//alert(pid);
if(color!=''&& pid!='')
{
window.location.href="details.php?pid="+pid+"&color="+color;
}
}
</script>


</head>
<body style="background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd);">
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">

<div class="col-md-12">
<div>&nbsp;</div>
<div>&nbsp;</div>
<div class="card">
<div class="card-header">
<div class="card-title">Product Details</div>
</div>
<div class="card-body" style="background:#FFFFFF;">
<div class="container">
<section class="product-details-area pt-100 pb-70">
<div class="container">
<div class="row">
<?php
$sql="SELECT * FROM `iv_product` WHERE `id`='".trim($_REQUEST['pid'])."' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
$title=$fetch['title'];
$id=$fetch['id'];
$agentper=$fetch['agentper'];
$price=$fetch['price'];
$discount=$fetch['offerprice'];
$tq=getProductStockPoint($conn,$fetch['id']);
$ts=getProductSell($conn,$fetch['id']);
$cartquantity=getTotalCartQuantity($conn,$fetch['id']);
$avs=($tq-($ts+$cartquantity));
?>


<div class="col-lg-5 col-md-12">
<div class="products-details-image">
<ul class="products-details-image-slides">

<?php
if(trim($_REQUEST['color']))
{
$color=trim($_REQUEST['color']);
$sqlimg="SELECT * FROM `iv_product_gallary` WHERE `pid`='".$fetch['id']."' AND `color`='".$color."' ";
 }
 else
 {
$sqlimg="SELECT * FROM `iv_product_gallary` WHERE `pid`='".$fetch['id']."'";
 }
 $resimg=query($conn,$sqlimg);
$numimg=numrows($resimg);
if($numimg>0)
{
while($fetchimg=fetcharray($resimg))
{
?> 
<li style="width:200px;height:250px;"><img src="../administrator/product/<?=$fetchimg['images']?>" alt="" ></li>

<?php }}?>
</ul>
<div class="slick-thumbs">
<ul>

<?php

if(trim($_REQUEST['color']))
{
$color=trim($_REQUEST['color']);
$sqlimg1="SELECT * FROM `iv_product_gallary` WHERE `pid`='".$fetch['id']."' AND `color`='".$color."' ";
 }
 else
 {
$sqlimg1="SELECT * FROM `iv_product_gallary` WHERE `pid`='".$fetch['id']."'";
 }
$resimg1=query($conn,$sqlimg1);
$numimg1=numrows($resimg1);
if($numimg1>0)
{
while($fetchimg1=fetcharray($resimg1))
{
?> 
<li style="width:80px;height:60px;"><img src="../administrator/product/<?=$fetchimg1['images']?>" alt=""></li>

<?php }}?>
</ul>
</div>
</div>
</div>
<!--------------------end of product details left------------------>

<div class="col-lg-7 col-md-12">
<div class="products-details-desc">
<h3><?=$fetch['title']?>(<?=$fetch['procode']?>)</h3>
<form class="form" action="cart-process.php?pid=<?=$fetch['id']?>" method="post">

<div class="price">
<span class="new-price"><?=$fetch['offerprice']?></span>
<span class="old-price"><?=$fetch['price']?></span>
<br>
<span class="new-price" style="color:#33FF33"><?=(($fetch['price'])-($fetch['offerprice']))?>  off</span>

</div>
<!--<div class="products-review">
<a href="#" class="rating-count">3 reviews</a>
</div>-->


<div class="products-color-switch">
<?php if($avs>0){ ?>
<select name="color" id="color" class="form-control" onChange="refreshpage(this.value,<?=$productid?>)"  required>
<option value="" >Select Color</option>
<?php
$sqlst="SELECT * FROM `iv_product_color` WHERE `pid`='".$fetch['id']."' ";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0)
{
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>" style="color:#333333;" <?php if($fetchst['id']==$_REQUEST['color']){echo 'Selected';}?>><?=getColor($conn,$fetchst['color'],'color')?> 
</option>
<?php }}?>
</select>
<?php }else if($avs<1){ ?>
<select  class="form-control" name="color" id="color" onChange="refreshpage(this.value,<?=$productid?>)"  required>
<option value="" >Select Color</option>
<?php
$sqlstm="SELECT * FROM `iv_product_color` WHERE `pid`='".$fetch['id']."' ";
$resstm=query($conn,$sqlstm);
$numstm=numrows($resstm);
if($numstm>0)
{
while($fetchstm=fetcharray($resstm))
{
?>
<option value="<?=$fetchstm['id']?>" style="color:#333333;" <?php if($fetchstm['id']==$_REQUEST['color']){echo 'Selected';}?>><?=getColor($conn,$fetchstm['color'],'color')?> 
</option>
<?php }}?>
</select>
<?php }?>
</div>

<div class="products-size-wrapper">
<?php if($avs>0){ ?>
<select name="size" id="size" class="form-control"  required />
<option value="">Select Size</option>
<?Php
$sqlp="SELECT * FROM `iv_product_size` WHERE `pid`='".$fetch['id']."'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
while($fetchp=fetcharray($resp))
{
?>
<option value="<?=$fetchp['id']?>" style="color:#333333;"><?=getSize($conn,$fetchp['size'],'size')?> 
</option>
<?php }}?>
</select>

<?php }else if($avs<1){ ?>
<select  class="form-control" name="size" id="size" required />
<option value="">Select Size</option>
<?Php
$sqlpm="SELECT * FROM `iv_product_size` WHERE `pid`='".$fetch['id']."'";
$respm=query($conn,$sqlpm);
$numpm=numrows($respm);
if($numpm>0)
{
while($fetchpm=fetcharray($respm))
{
?>
<option value="<?=$fetchpm['id']?>" style="color:#333333;"><?=getSize($conn,$fetchpm['size'],'size')?> 
</option>
<?php }}?>

</select>
<?php }?>
</div>

<div class="products-color-switch">
<input class="form-control" type="number" placeholder="Enter Quantity" required id="quantity" name="quantity" value="1" min="1">
</div>


<div class="products-add-to-cart" align="center">
<br>

<button align="center" type="submit" class="default-btn center"> Add to Cart</button>
</div>

</form>


<!--<div class="buy-checkbox-btn">
<div class="item">
<input class="inp-cbx" id="cbx" type="checkbox">
<label class="cbx" for="cbx">
<span>
<svg width="12px" height="10px" viewbox="0 0 12 10">
 <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
</svg>
</span>
</label>
</div>
<div class="item">
<a href="view-cart.php" class="default-btn">Buy it now!</a>
</div>
</div>-->

</div>
</div>
</div>

</div>
<div>&nbsp;</div>


<div class="li-product-tab">
<ul class="nav li-product-menu">
<li><a class="active" data-toggle="tab" href="#description"><span><b>Product Details</b></span></a></li>

</ul>               
</div>
<hr/>
<div id="description" class="tab-pane active show" role="tabpanel">
<div class="product-description">
<ul>
<li><?=$fetch['description']?></li>
</ul>
</div>
</div>


</section>
</div>


<?php }}?>





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


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets1/js/bootstrap.bundle.min.js"></script>
<script src="assets1/js/owl.carousel.min.js"></script>
<script src="assets1/js/magnific-popup.min.js"></script>
<script src="assets1/js/parallax.min.js"></script>
<script src="assets1/js/rangeSlider.min.js"></script>
<script src="assets1/js/nice-select.min.js"></script>
<script src="assets1/js/meanmenu.min.js"></script>
<script src="assets1/js/isotope.pkgd.min.js"></script>
<script src="assets1/js/slick.min.js"></script>
<script src="assets1/js/sticky-sidebar.min.js"></script>
<script src="assets1/js/wow.min.js"></script>
<script src="assets1/js/form-validator.min.js"></script>
<script src="assets1/js/contact-form-script.js"></script>
<script src="assets1/js/ajaxchimp.min.js"></script>
<script src="assets1/js/main.js"></script>


</body>
</html>