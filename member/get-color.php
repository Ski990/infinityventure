<?php
include('../administrator/includes/function.php');
?>
<select name="color" id="color" class="form-control" required >
<option value="">Select Color</option>
<?php
$sql="SELECT * FROM `iv_product_color` WHERE `pid`='".mysqli_real_escape_string($conn,$_REQUEST['pid'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=ucwords(strtolower(getColor($conn,$fetch['color'],'color')))?></option>
<?php }}?>
</select>   
