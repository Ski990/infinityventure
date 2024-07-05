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
$arr[0][3]="Topup ID";
$arr[0][4]="Name";
$arr[0][5]="Package";
$arr[0][6]="Amount";
$arr[0][7]="Date";

$sqlm="SELECT * FROM `iv_member_topup` ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{

$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=ucwords(getMemberUserID($conn,$fetchm['userid'],'name'));
$arr[$i][3]=$fetchm['topupid'];
$arr[$i][4]=ucwords(getMemberUserID($conn,$fetchm['topupid'],'name'));
$arr[$i][5]=getSettingsPackage($conn,$fetchm['package'],'package');
$arr[$i][6]=$fetchm['amount'];
$arr[$i][7]=getDateConvert($fetchm['date']);
$i++;
}}

$name='Topup-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>