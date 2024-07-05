<?php
$coinvalue=getSettingsRcoin($conn,'coinvalue');

$sqlr="SELECT * FROM `iv_member_rcoin` WHERE `status`='R'";
$resr=query($conn,$sqlr);
$numr=numrows($resr);
if($numr>0)
{
while($fetchr=fetcharray($resr))
{
$useridr=$fetchr['userid'];
$nocoin=$fetchr['nocoin'];
$id=$fetchr['id'];
$expire=$fetchr['expire'];
$date=date('Y-m-d');

$actualamount=($coinvalue*$nocoin);
if($date>$expire) 
{
if($actualamount>0)
{
$sqlt="UPDATE `iv_member_rcoin` SET `closeamount`='".$actualamount."',`status`='C' WHERE `id`='".$id."' AND `userid`='".$useridr."'";
$rest=query($conn,$sqlt);
}
}
}
}
?>