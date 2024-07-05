<?php
$sqldt="SELECT * FROM `iv_date_global_investment` WHERE `date`='".date('Y-m-d')."'";
$resdt=query($conn,$sqldt);
$numdt=numrows($resdt);
if($numdt<1)
{
$sqlr="SELECT * FROM `iv_member_global_investment` WHERE `status`='R'";
$resr=query($conn,$sqlr);
$numr=numrows($resr);
if($numr>0)
{
while($fetchr=fetcharray($resr))
{
$userid2=$fetchr['userid'];
$dailyper=$fetchr['dailyper'];
$amount =$fetchr['amount'];

$package=$fetchr['package'];
$memglobalid=$fetchr['id'];

//-------------------Trading Bonus---------------//

$sqlic="SELECT * FROM `iv_commission_global_investment` WHERE `userid`='".$userid2."' AND `memglobalid`='".$memglobalid."' ORDER BY 'id' LIMIT 1";
$resic=query($conn,$sqlic);
$numic=numrows($resic);
if($numic>0)
{
$fetchic=fetcharray($resic);

$memglobalid=$fetchic['id'];
$date=$fetchic['date'];
}else{
$date=$fetchr['date'];
}


$now=strtotime(date('Y-m-d'));
$your_date = strtotime($date);
if($now>$your_date)
{

$datediff = $now - $your_date;
$nodays=round($datediff / (60 * 60 * 24));
if($nodays>0)
{
for($i=1;$i<=$nodays;$i++)
{
$stdate=date('Y-m-d',strtotime('+'.$i.' days',$your_date));


$sqlt1="SELECT * FROM `iv_commission_global_investment` WHERE `userid`='".$userid2."' AND `date`='".$stdate."' AND `memglobalid`='".$memglobalid."'";
$rest1=query($conn,$sqlt1);
$numt1=numrows($rest1);
if($numt1<1)
{
$bonus=($amount*$dailyper)/100;

$sql62="INSERT INTO `iv_commission_global_investment` (`userid`,`memglobalid`,`package`,`bonus`,`date`) VALUES('".$userid2."','".$memglobalid."','".$package."','".$bonus."','".$stdate."')";
$res62=query($conn,$sql62);
}

}
}
}
}
}

$sql12="INSERT INTO `iv_date_global_investment` (`date`) VALUES('".date('Y-m-d')."')";
$res12=query($conn,$sql12);
}
?>