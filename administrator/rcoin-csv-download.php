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
$arr[0][3]="No_Of_Coin";
$arr[0][4]="Coin_Amount";
$arr[0][5]="Total_Amount";
$arr[0][6]="Closed_Amount";

$arr[0][7]="Status";
$arr[0][8]="Expire";
$arr[0][9]="Date";

$sqlm="SELECT * FROM `iv_member_rcoin` ORDER BY `id` DESC";
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
$arr[$i][3]=$fetchm['nocoin'];
$arr[$i][4]=$fetchm['coinvalue'];
$arr[$i][5]=$fetchm['totalamount'];
$arr[$i][6]=$fetchm['closeamount'];

$arr[$i][7]=$status;
$arr[$i][8]=getDateConvert($fetchm['expire']);
$arr[$i][9]=getDateConvert($fetchm['date']);
$i++;
}}

$name='Member-R-Coin-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>