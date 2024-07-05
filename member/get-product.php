<?php
session_start();
include('../administrator/includes/function.php');

if($_REQUEST['cat']!='' || $_REQUEST['subcat']!='')
{
?>
<div class="row">
<?php
if(trim($_REQUEST['cat'])!='' && trim($_REQUEST['subcat'])=='')
{
$sql="SELECT * FROM `iv_product` WHERE `status`='A' AND `category`='".trim($_REQUEST['cat'])."'";
}else{
$sql="SELECT * FROM `iv_product` WHERE `status`='A' AND `category`='".trim($_REQUEST['cat'])."' AND `subcategory`='".trim($_REQUEST['subcat'])."'";
}
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{

$sqlimg="SELECT * FROM `iv_product_gallary` WHERE `pid`='".$fetch['id']."' ORDER BY `position` LIMIT 1";
$resimg=query($conn,$sqlimg);
$numimg=numrows($resimg);
$fetchimg=fetcharray($resimg);
?>                                    
<div class="col-md-3">
<div style="background:#FCFCFC;border:1px solid #333333;margin:10px;min-height:350px;padding:10px;">
<img src="../administrator/product/<?=$fetchimg['images']?>" height="200" width="100%" />
<div>&nbsp;</div>
<h4 align="center" ><?=$fetch['title']?>(<?=$fetch['procode']?>)</h4>
<div>&nbsp;</div>

<div class="form-actions right" align="center">
<a href="details.php?pid=<?=$fetch['id']?>"><button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>View More</button></a>
</div>


</div>
</div>
<?php }}else{?>
<div class="col-md-12">
<div align="center" style="color:red;margin-top:15px;">No Records Found!</div>
</div>
<?php }?>
</div>
<?php }else{?>

<div class="row">
<?php
$sql="SELECT * FROM `iv_product` WHERE `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
$sqlimg="SELECT * FROM `iv_product_gallary` WHERE `pid`='".$fetch['id']."' ORDER BY `position` LIMIT 1";
$resimg=query($conn,$sqlimg);
$numimg=numrows($resimg);
$fetchimg=fetcharray($resimg);
?> 
                                   
<div class="col-md-3">
<div style="background:#FCFCFC;border:1px solid #333333;margin:10px;min-height:350px;padding:10px;">
<img src="../administrator/product/<?=$fetchimg['images']?>" height="200" width="100%" />
<h4 align="center" ><?=$fetch['title']?>(<?=$fetch['procode']?>)</h4>
<h4 align="center" >Description:<?=$fetch['description']?></h4>
<?php /*?><h4 align="center" >Color:<?=stripslashes(strip_tags(getColor($conn,$fetch['color'],'color')))?></h4><?php */?>
<h4 align="center" >Size :<?=stripslashes(strip_tags(getSize($conn,$fetch['size'],'size')))?></h4>
<h2 align="center" style="color:#FF0000;font-weight:bold;">Rs.<?=$fetch['price']?></h2>
<form class="form" action="cart-process.php?pid=<?=$fetch['id']?>" method="post"> 
<div class="form-group">
<input class="form-control border-primary" type="number" placeholder="Enter Quantity" required id="quantity" name="quantity" value="1" min="1">

</div>

<div class="form-actions right" align="center">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>ADD TO CART</button>
</div>
</form>

</div>
</div>
<?php }} else {?>
<div class="col-md-12">
<div align="center" style="color:red;margin-top:15px;">No Records Found!</div>
</div>
<?php }?>
</div>

<?php }?>