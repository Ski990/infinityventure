<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl No";
$arr[0][1]="User ID";
$arr[0][2]="Name";
$arr[0][3]="Wallet";
$arr[0][4]="Package";
$arr[0][5]="Amount";
$arr[0][6]="No_Of_Quantity";
$arr[0][7]="Total_Amount";
$arr[0][8]="Closed_Amount";
$arr[0][9]="Status";
$arr[0][10]="Date";
$arr[0][11]="Lock_Expire_Date";
$arr[0][12]="Valid_Date";

$sqlm="SELECT * FROM `iv_member_global_investment` ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['status']=='R'){$status='Running';}else{$status='Closed';}

$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=ucwords(getMemberUserID($conn,$fetchm['userid'],'name'));
$arr[$i][3]=$fetchm['wallet'];
$arr[$i][4]=ucwords(getGlobalInvestmentPackage($conn,$fetchm['package'],'package'));
$arr[$i][5]=$fetchm['amount'];
$arr[$i][6]=$fetchm['noquantity'];
$arr[$i][7]=$fetchm['total'];
$arr[$i][8]=$fetchm['closeamount'];
$arr[$i][9]=$status;
$arr[$i][10]=getDateConvert($fetchm['date']);
$arr[$i][11]=getDateConvert($fetchm['lockexpire']);
$arr[$i][12]=getDateConvert($fetchm['validdate']);

$i++;
}}

$name='Global-Investment-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>