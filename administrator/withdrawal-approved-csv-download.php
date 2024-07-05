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
$arr[0][3]="Wallet";
$arr[0][4]="Request";
$arr[0][5]="TDS";
$arr[0][6]="Service";
$arr[0][7]="Payout";
$arr[0][8]="Bank_Name";
$arr[0][9]="Branch";
$arr[0][10]="Account_Holder_Name";
$arr[0][11]="Account_No";
$arr[0][12]="IFS_Code.";
$arr[0][13]="Status";
$arr[0][14]="Date";
$arr[0][15]="Approved";

$sqlm="SELECT * FROM `iv_withdrawal` WHERE `status`='C' ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['status']=='C'){$status='Approved';}
$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=ucwords(getMemberUserid($conn,$fetchm['userid'],'name'));
$arr[$i][3]=$fetchm['wallet'];

$arr[$i][4]=$fetchm['request'];
$arr[$i][5]=$fetchm['tds'];
$arr[$i][6]=$fetchm['service'];
$arr[$i][7]=$fetchm['payout'];
$arr[$i][8]=$fetchm['bname'];
$arr[$i][9]=$fetchm['branch'];
$arr[$i][10]=$fetchm['accname'];
$arr[$i][11]=$fetchm['accno'];
$arr[$i][12]=$fetchm['ifscode'];
$arr[$i][13]=$status;
$arr[$i][14]=$fetchm['date'];
$arr[$i][15]=$fetchm['approved'];

$i++;
}}

$name='Approved-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>