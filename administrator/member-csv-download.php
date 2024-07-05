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
$arr[0][3]="Sponsor";
$arr[0][4]="Package";
$arr[0][5]="Position";
$arr[0][6]="Email";
$arr[0][7]="Phone";
$arr[0][8]="Address";
$arr[0][9]="Bank Name";
$arr[0][10]="Branch";
$arr[0][11]="Account Name";
$arr[0][12]="Account Number";
$arr[0][13]="IFSC Code";
$arr[0][14]="Status";
$arr[0][15]="Paystatus";
$arr[0][16]="Approved";
$arr[0][17]="Date";

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
$arr[$i][2]=ucwords(getMemberUserID($conn,$fetchm['userid'],'name'));
$arr[$i][3]=$fetchm['sponsor'];
$arr[$i][4]=ucwords(getSettingsPackage($conn,$fetchm['package'],'package'));
$arr[$i][5]=$fetchm['position'];
$arr[$i][6]=$fetchm['email'];
$arr[$i][7]=ucwords($fetchm['phone']);
$arr[$i][8]=ucwords($fetchm['address']);
$arr[$i][9]=$fetchm['bname'];
$arr[$i][10]=$fetchm['branch'];
$arr[$i][11]=$fetchm['accname'];
$arr[$i][12]=$fetchm['accno'];
$arr[$i][13]=$fetchm['ifscode'];
$arr[$i][14]=$status;
$arr[$i][15]=$paystatus;
$arr[$i][16]=getDateConvert($fetchm['approved']);
$arr[$i][17]=getDateConvert($fetchm['date']);
$i++;
}}

$name='Msember-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>