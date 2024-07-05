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
$arr[0][3]="Sponsor";
$arr[0][4]="Email";
$arr[0][5]="Phone";
$arr[0][6]="Address";
$arr[0][7]="Bank_Name";
$arr[0][8]="Branch";
$arr[0][9]="Acc_Name";
$arr[0][10]="Acc_No";
$arr[0][11]="IFSCode";
$arr[0][12]="Status";
$arr[0][13]="Paystatus";
$arr[0][14]="Approved";
$arr[0][15]="Date";

$sqlm="SELECT * FROM `iv_member` ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['status']=='A'){$status='Active';}else{$status='Pending';}
if($fetchm['paystatus']=='A'){$paystatus='Approved';}else{$paystatus='Pending';}

$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=ucwords(getMemberUserid($conn,$fetchm['userid'],'name'));
$arr[$i][3]=$fetchm['sponsor'];

$arr[$i][4]=$fetchm['email'];
$arr[$i][5]=ucwords($fetchm['phone']);
$arr[$i][6]=ucwords($fetchm['address']);
$arr[$i][7]=ucwords($fetchm['bname']);
$arr[$i][8]=ucwords($fetchm['branch']);
$arr[$i][9]=ucwords($fetchm['accname']);
$arr[$i][10]=ucwords($fetchm['accno']);
$arr[$i][11]=ucwords($fetchm['ifscode']);
$arr[$i][12]=$status;
$arr[$i][13]=$paystatus;
$arr[$i][14]=$fetchm['approved'];
$arr[$i][15]=$fetchm['date'];
$i++;
}}

$name='member-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>