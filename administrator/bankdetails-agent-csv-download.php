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
$arr[0][1]="Agent_Username";
$arr[0][2]="Name";
$arr[0][3]="Bank_Name";
$arr[0][4]="Branch";
$arr[0][5]="Acc_Name";
$arr[0][6]="Acc_No";
$arr[0][7]="IFSC_Code";

$sqlm="SELECT * FROM `iv_agent` ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['username'];
$arr[$i][2]=ucwords($fetchm['name']);
$arr[$i][3]=ucwords($fetchm['bname']);
$arr[$i][4]=ucwords($fetchm['branch']);
$arr[$i][5]=ucwords($fetchm['accname']);
$arr[$i][6]=ucwords($fetchm['accno']);
$arr[$i][7]=ucwords($fetchm['ifscode']);
$i++;
}}

$name='bankdetails-agent-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>