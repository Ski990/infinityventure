<?php
$day=date('l');
if($day=='Monday')
{
$date=date('Y-m-d');
$fdate=date('Y-m-d',strtotime('- 7 days',strtotime($date)));
$todate=date('Y-m-d',strtotime('- 1 days',strtotime($date)));


$sqlch="SELECT * FROM `iv_date_global_investment` WHERE `fromdate`='".$fdate."' AND `todate`='".$todate."'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch<1)
{
$totalamnt=getTotalMemberPackageAmount($conn,$fromdate,$todate);
$alltotal=getAllTotalGlobalPackageAmount($conn);

$withdrawalper=getSettingsGlobalPercentage($conn,'withdrawalper');
$globalper=getSettingsGlobalPercentage($conn,'globalper');

if($totalamnt>0)
{

$sql21="SELECT * FROM `iv_member_global_investment` WHERE `status`='R'";
$res21=query($conn,$sql21);
$num21=numrows($res21);
if($num21>0)
{

while($fetch21=fetcharray($res21))
{
$package=$fetch21['package'];
$pamt=$fetch21['total'];

$ctoper=getGlobalInvestmentPackage($conn,$package,'ctoper');
$amtmem=($totalamnt*$ctoper)/100;

$ratiamt=$amtmem/$alltotal;
$amtpermem=$ratiamt*$pamt;

$withdarawalamount=($amtpermem*$withdrawalper)/100;
$globalamount=($amtpermem*$globalper)/100;

if($amtpermem>0)
{
$sqlc="INSERT INTO `iv_commission_global_investment` (`userid`,`memglobalid`,`totalcto`,`ctoper`,`totalamount`,`totalinvest`,`ratio`,`investamount`,`bonus`,`withdarawalamount`,`globalamount`,`date`) VALUES('".$fetch21['userid']."','".$fetch21['id']."','".$totalamnt."','".$ctoper."','".$amtmem."','".$alltotal."','".$ratiamt."','".$pamt."','".$amtpermem."','".$withdarawalamount."','".$globalamount."','".date('Y-m-d')."')";
$resc=query($conn,$sqlc);
}
}
}
}

$sqlin="INSERT INTO `iv_date_global_investment` (`fromdate`,`todate`,`date`) VALUES('".$fdate."','".$todate."','".date('Y-m-d')."')";
$resin=query($conn,$sqlin);
}
}
?>
