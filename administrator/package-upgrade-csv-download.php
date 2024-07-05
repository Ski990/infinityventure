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
$arr[0][3]="Package";
$arr[0][4]="Amount";
$arr[0][5]="Date";

$sqlm="SELECT * FROM `iv_member_package_upgrade` ORDER BY `id` DESC";
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
$arr[$i][3]=getSettingsPackage($conn,$fetchm['package'],'package');
$arr[$i][4]=$fetchm['amount'];
$arr[$i][5]=getDateConvert($fetchm['date']);
$i++;
}}

$name='Member-Package-Upgrade-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>