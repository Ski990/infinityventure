<?php
$sqlr="SELECT * FROM `iv_member_global_investment` WHERE `status`='R'";
$resr=query($conn,$sqlr);
$numr=numrows($resr);
if($numr>0)
{
while($fetchr=fetcharray($resr))
{
$useridr=$fetchr['userid'];
$id=$fetchr['id'];
$validdate=$fetchr['validdate'];
$date=date('Y-m-d');

if($date>$validdate)
{
$sqlt="UPDATE `iv_member_global_investment` SET `status`='C' WHERE `id`='".$id."' AND `userid`='".$useridr."'";
$rest=query($conn,$sqlt);
}
}
}
?>