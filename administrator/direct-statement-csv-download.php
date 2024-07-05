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
$arr[0][0]="Sl_No";
$arr[0][1]="User_ID";
$arr[0][2]="Name";
$arr[0][3]="From_ID";
$arr[0][4]="Name";
$arr[0][5]="Package";
$arr[0][6]="Amount";
$arr[0][7]="Direct_Bonus(%)";
$arr[0][8]="Bonus";
$arr[0][9]="Date";


$sqlm="SELECT * FROM `iv_commission_introducer` ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{

$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=ucwords(getMemberUserid($conn,$fetchm['userid'],'name'));
$arr[$i][3]=$fetchm['fromid']; 
$arr[$i][4]=ucwords(getMemberUserid($conn,$fetchm['fromid'],'name'));
$arr[$i][5]=getSettingsPackage($conn,$fetchm['package'],'package');
$arr[$i][6]=$fetchm['amount'];
$arr[$i][7]=$fetchm['directper'];
$arr[$i][8]=$fetchm['bonus'];
$arr[$i][9]=$fetchm['date'];
$i++;
}}

$name='direct-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>