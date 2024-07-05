<?php
/*-----------------Database Connection-----------------------*/
$conn=mysqli_connect('localhost','root','','infinityventure');
date_default_timezone_set('Asia/Calcutta');
/*-----------------Database Connection-----------------------*/
error_reporting(0);
$title='Infinity Venture Health';
$domain='localhost/infinityventure';
$welcome='welcome@infinityventure.com';
$support='support@infinityventure.com';
$recovery='recovery@infinityventure.com';
$prefix='IVH';
$currency='Rs.';

function redirect($url)
{ 
header('Location: '.$url);
exit();
}

function query($conn,$sql)
{
$res=mysqli_query($conn,$sql);
return $res;
}

function numrows($exe)
{
$no=mysqli_num_rows($exe);
return $no;
}

function fetcharray($res)
{
$fetch=mysqli_fetch_array($res);
return $fetch;
}

function input($string)
{
$string=addslashes(trim(strip_tags($string)));
return $string;
}

function output($string)
{
$string=stripslashes(trim(strip_tags($string)));
return $string;
} 

function getUser($conn,$id,$field)
{
$sql="SELECT * FROM `iv_admin` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getNumtoWord($conn,$number){
$no = round($number);
$decimal = round($number - ($no = floor($number)), 2) * 100;    
$digits_length = strlen($no);    
$i = 0;
$str = array();
$words = array(
0 => '',
1 => 'One',
2 => 'Two',
3 => 'Three',
4 => 'Four',
5 => 'Five',
6 => 'Six',
7 => 'Seven',
8 => 'Eight',
9 => 'Nine',
10 => 'Ten',
11 => 'Eleven',
12 => 'Twelve',
13 => 'Thirteen',
14 => 'Fourteen',
15 => 'Fifteen',
16 => 'Sixteen',
17 => 'Seventeen',
18 => 'Eighteen',
19 => 'Nineteen',
20 => 'Twenty',
30 => 'Thirty',
40 => 'Forty',
50 => 'Fifty',
60 => 'Sixty',
70 => 'Seventy',
80 => 'Eighty',
90 => 'Ninety');
$digits = array('', 'Hundred', 'Thousand', 'Lrmh', 'Crore');
while ($i < $digits_length) {
$divider = ($i == 2) ? 10 : 100;
$number = floor($no % $divider);
$no = floor($no / $divider);
$i += $divider == 10 ? 1 : 2;
if ($number) {
$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
} else {
$str [] = null;
}  
}

$Rupees = implode(' ', array_reverse($str));
$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}

function getAdminName($conn,$id,$field)
{
$sql="SELECT * FROM `iv_admin` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getModulePermission($conn,$id,$field)
{
$sql="SELECT * FROM `iv_permission` WHERE `username`='".$id."' AND `modules`='".$field."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPermissionCheck($conn,$username,$modules)
{
$sql="SELECT * FROM `iv_permission` WHERE `username`='".$username."' AND `modules`='".$modules."' ";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getContact($conn,$field)
{
$sql="SELECT * FROM `iv_contact` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getFirstMember($conn)
{
$sql="SELECT * FROM `iv_member` ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $num;
}
}

function getFirstMemberuserid($conn,$field)
{
$sql="SELECT * FROM `iv_member` ORDER BY `id` LIMIT 1 ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['userid'];
}
}

function getNoAnnouncement($conn)
{
$sql="SELECT * FROM `iv_announcement`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $num;
}
}

function getFromUserID($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getUserID($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSponsorID($conn,$userid)
{
$sql="SELECT * FROM `iv_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['sponsor'];
}
}

function getMember($conn,$id,$field)
{
$sql="SELECT * FROM `iv_member` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}



function getAgentBouns($conn,$id,$field)
{
$sql="SELECT * FROM `iv_agent` WHERE `username`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}






function getAgent($conn,$id,$field)
{
$sql="SELECT * FROM `iv_agent` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}







function getSettingsTransfer($conn,$field)
{
$sql="SELECT * FROM `iv_settings_transfer` ORDER BY `id` LIMIT 1 ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getAnnouncement($conn,$field)
{
$sql="SELECT * FROM `iv_announcement` ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getMemberUserID($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getTotalMember($conn)
{
$sql="SELECT `id` FROM `iv_member`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getTotalAgent($conn)
{
$sql="SELECT `id` FROM `iv_agent`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getApproved($conn)
{
$sql="SELECT `id` FROM `iv_member` WHERE `paystatus`='A' ";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}



function getInactiveMember($conn)
{
$sql="SELECT `id` FROM `iv_member` WHERE `paystatus`='I' ";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}



function getPendingWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `userid`='".$userid."' AND `status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}





function getPendingWithdrawalAgentView($conn,$agentid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `agentid`='".$agentid."' AND `status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}






function getPendingWithdrawalAgent($conn,$agentid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal_agent` WHERE `agentid`='".$agentid."' AND `status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}

function getApprovedWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `userid`='".$userid."' AND  `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getApprovedWithdrawalAgentView($conn,$agentid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `agentid`='".$agentid."' AND  `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getApprovedWithdrawalAgent($conn,$agentid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal_agent` WHERE `agentid`='".$agentid."' AND  `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getWalletWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `userid`='".$userid."' AND `wallet`='Current Wallet'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getCTOWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `userid`='".$userid."' AND `wallet`='CTO Wallet'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getRCoinWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `userid`='".$userid."' AND `wallet`='R-Coin Wallet'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}

function getWithdrawalAgent($conn,$agentid)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal_agent` WHERE `agentid`='".$agentid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}



function getSettingsWithdrawal($conn,$field)
{
$sql="SELECT * FROM `iv_settings_withdrawal` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getAgentWithdrawal1($conn,$field)
{
$sql="SELECT * FROM `iv_withdrawal_agent` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}




function getAddress($conn,$id,$field)
{
$sql="SELECT * FROM `iv_contact` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}



function getPendingWithdrawalAdmin($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `status`='P' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}



function getPendingWithdrawalAgentCommission($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal_agent` WHERE `status`='P' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}

function getApprovedWithdrawalAdmin($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getApprovedWithdrawalAgentCommission($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal_agent` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getNoOfFeedback($conn)
{
$sql="SELECT `id` FROM `iv_feedback`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getTotalSupport($conn)
{
$sql="SELECT `id` FROM `iv_support`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getApprovedPayment($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_member_payment` WHERE`status`='C' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getNoOfSponsor($conn,$sponsorid)
{
$sql="SELECT `id` FROM `iv_member` WHERE `sponsor`='".$sponsorid."' AND `paystatus`='A' ";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}

function getWithdrawalAdmin($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `iv_withdrawal` ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getPendingWithdrawal($conn)
{
$sql="SELECT SUM(`payout`) AS total FROM `iv_withdrawal` WHERE `status`='P' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}

function getApprovedWithdrawal($conn)
{
$sql="SELECT SUM(`payout`) AS total FROM `iv_withdrawal` WHERE `status`='A' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getCountSponsor($conn,$sponsor,$date)
{
$sql="SELECT * FROM `iv_member` WHERE `sponsor`='".$sponsor."' AND `date`<='".$date."' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getCountSponsordate($conn,$sponsor)
{ 
$sql="SELECT * FROM `iv_member` WHERE `sponsor`='".$sponsor."'  AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getMemberFirstMember($conn)
{
$sql="SELECT * FROM `iv_member` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['userid'];
}
}


function getCountSponsorPackage($conn,$sponsor,$date,$package_amount)
{
$sql="SELECT * FROM `iv_member` WHERE `sponsor`='".$sponsor."' AND `date`<='".$date."' AND `paystatus`='A' AND `package_amount`>='".$package_amount."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getMemberTopup($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_member_topup` WHERE `userid`='".$userid."'  ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getCurrentToFund($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `iv_transfer_current_fund` WHERE `userid`='".$userid."'  ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getFundTo($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `iv_transfer_fund_others` WHERE `toid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getFundFrom($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `iv_transfer_fund_others` WHERE `userid`='".$userid."'  ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberPayment($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_member_payment` WHERE `userid`='".$userid."' AND `status`='C' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDepositFundMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_deposit` WHERE `userid`='".$userid."' AND `wallet`='Fund wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDepositCurrentMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_deposit` WHERE `userid`='".$userid."' AND `wallet`='Current Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDeductCurrentMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_deduct` WHERE `userid`='".$userid."' AND `wallet`='Current Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDeductFundMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_deduct` WHERE `userid`='".$userid."' AND `wallet`='Fund Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}




function getPendingTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `iv_withdrawal` WHERE `status`='P' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getPendingTotalWithdrawalAgent($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `iv_withdrawal_agent` WHERE `status`='P' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getApprovedTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `iv_withdrawal` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getApprovedTotalWithdrawalAgent($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `iv_withdrawal_agent` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getActiveSponsor($conn,$sponsor)
{
$sql="SELECT * FROM `iv_member` WHERE `sponsor`='".$sponsor."' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getMemberSponsorByDate($conn,$userid,$fromdate,$todate)
{
$sql="SELECT `id` FROM `iv_member` WHERE `sponsor`='".$userid."' AND `paystatus`='A' AND `approved` BETWEEN '".$fromdate."' AND '".$todate."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getFirstDayWithMonth($conn,$mon,$year)
{
$currentMonth = $mon;
$currentYear = $year;
if($currentMonth == 1) {
$lastMonth = 12;
$lastYear = $currentYear - 1;
}
else {
$lastMonth = $currentMonth -1;
$lastYear = $currentYear;
}
if($lastMonth < 10) {
$lastMonth = '0' . $lastMonth;
}
$lastDayOfMonth = date('d', $lastMonth);
$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
return $lastDateOfPreviousMonth;
}

function getLastDayWithMonth($conn,$mon,$year)
{
$currentMonth = $mon;
$currentYear = $year;
if($currentMonth == 1) {
$lastMonth = 12;
$lastYear = $currentYear - 1;
}
else {
$lastMonth = $currentMonth -1;
$lastYear = $currentYear;
}
if($lastMonth < 10) {
$lastMonth = '0' . $lastMonth;
}
$lastDayOfMonth = date('t', $lastMonth);
$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
return $lastDateOfPreviousMonth;
}


function getLatestPackage($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_package` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getAvailableWallet($conn,$userid)
{
$total=(getBoostingLevelBonusCurrentWallet($conn,$userid)+getTotalIncomeMember($conn,$userid)+getDepositCurrentMember($conn,$userid)-(getDeductCurrentMember($conn,$userid)+getTransferFromCurrent($conn,$userid)+getWalletWithdrawalMember($conn,$userid)+getCurrentToBooster($conn,$userid)+getGlobal($conn,$userid)+getCTO($conn,$userid)));

return $total;
}

function getCTOWallet($conn,$userid)
{
$total=((getCTO($conn,$userid)+getCTOClosed($conn,$userid))-getCTOWithdrawalMember($conn,$userid));

return $total;
}


function getGlobalWallet($conn,$userid)
{
$total=(getGlobal($conn,$userid)-getDeductGlobal($conn,$userid));

return $total;
}



function getRcoinWallet($conn,$userid)
{
$total=(getRcoinClosed($conn,$userid)-getRCoinWithdrawalMember($conn,$userid));

return $total;
}

function getMemberPackageAmount($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_member_package` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalIncomeMember($conn,$userid)
{
$total=(getMemberDirectBonus($conn,$userid)+getMemberLevelBonus($conn,$userid)+getMemberGlobalInvestBonus($conn,$userid)+getMemberMatchingP1Bonus($conn,$userid)+getMemberMatchingP2Bonus($conn,$userid)+getMemberMatchingP3Bonus($conn,$userid)+getMemberMatchingP4Bonus($conn,$userid)+getMemberMatchingP5Bonus($conn,$userid));

return $total;
}

function getFundWallet($conn,$userid)
{
$total=(getReceivedFund($conn,$userid)+getMemberPayment($conn,$userid)+getFundTo($conn,$userid)+getDepositFundMember($conn,$userid))-(getMemberTopup($conn,$userid)+getFundFrom($conn,$userid)+getDeductFundMember($conn,$userid)+getPackageUpgrade($conn,$userid)+getGlobalInvestment($conn,$userid)+getRCoin($conn,$userid));

return $total;
}




function getReceivedFund($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `iv_transfer_current_fund` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTransferCurrent($conn,$userid)
{
$sql="SELECT SUM(`current`) AS total FROM `iv_transfer_current_fund` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberTopupAmount($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_member_topup` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getPackageStackingUpgrade($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_member_stacking_package` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getPackageUpgrade($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_member_package_upgrade` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getContactDetails($conn,$field)
{
$sql="SELECT * FROM `iv_contact` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getTransferFromCurrent($conn,$userid)
{
$sql="SELECT SUM(`current`) AS total FROM `iv_transfer_current_fund` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}
function getTransferFundOthers($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `iv_transfer_fund_others` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTransferFromCurrentToFund($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `iv_transfer_current_fund` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberFromUserid($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getTotalStackingSponsorBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_stacking_sponsor` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getStackingSponsorBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_stacking_sponsor` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getAgentProductIncome($conn,$agentid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_agent_product` WHERE `agentid`='".$agentid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getAgentIncome($conn,$agentid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_agent` WHERE `agentid`='".$agentid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalIncome($conn,$agentid){

$total=getAgentIncome($conn,$agentid)+getAgentProductIncome($conn,$agentid);

return $total;
}


function getSettingsPackage($conn,$package,$field)
{
$sql="SELECT * FROM `iv_settings_package` WHERE `id`='".$package."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}






function getSettingsPlatinumgeneration($conn,$package,$field)
{
$sql="SELECT * FROM `iv_settings_platinum_generation` WHERE `id`='".$package."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}





function getPlacementMatrix($conn,$table)
{
$sql="SELECT * FROM ".$table." ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}


function getplatinumclubCheck($conn)
{
$sql="SELECT * FROM `iv_settings_platinum_package` WHERE `clubbenefits`='Y'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['package'];
}
}




function getBlankPositionMatrix($conn,$userid,$table)
{
$sql="SELECT * FROM ".$table." WHERE `placement`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
$i=0;
$arr=array();
if($num>=4)
{
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['userid'];
$i++;
}
if(!empty($arr))
{
$count=count($arr);
if($count>=4)
{
$arr1=array();
$j=0;
for($k=0;$k<$count;$k++)
{
$sql1="SELECT * FROM ".$table." WHERE `placement`='".$arr[$k]."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>=4)
{
while($fetch1=fetcharray($res1))
{
$arr1[$j]=$fetch1['userid'];
$j++;
}
}else{
$return=$arr[$k];
break;
}
}
}
}

if(!empty($arr1))
$count1=count($arr1);
if($count1>=16)
{
$arr2=array();
$m=0;
for($l=0;$l<$count1;$l++)
{
$sql2="SELECT * FROM ".$table." WHERE `placement`='".$arr1[$l]."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>=4)
{
while($fetch2=fetcharray($res2))
{
$arr2[$m]=$fetch2['userid'];
$m++;
}
}else{
$return=$arr1[$l];
break;
}
}

}

if(!empty($arr2))
{
$count2=count($arr2);
if($count2>=64)
{
$arr3=array();
$m3=0;
for($l3=0;$l3<$count2;$l3++)
{
$sql3="SELECT * FROM ".$table." WHERE `placement`='".$arr2[$l3]."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>=4)
{
while($fetch3=fetcharray($res3))
{
$arr3[$m3]=$fetch3['userid'];
$m3++;
}
}else{
$return=$arr2[$l3];
break;
}
}
}
}

if(!empty($arr3))
{
$count3=count($arr3);
if($count3>=256)
{
$arr4=array();
$m4=0;
for($l4=0;$l4<$count3;$l4++)
{
$sql4="SELECT * FROM ".$table." WHERE `placement`='".$arr3[$l4]."'";
$res4=query($conn,$sql4);
$num4=numrows($res4);
if($num4>=4)
{
while($fetch4=fetcharray($res4))
{
$arr4[$m4]=$fetch4['userid'];
$m4++;
}
}else{
$return=$arr3[$l4];
break;
}
}
}
}

if(!empty($arr4))
{
$count4=count($arr4);
if($count4>=1024)
{
$arr5=array();
$m5=0;
for($l5=0;$l5<$count4;$l5++)
{
$sql5="SELECT * FROM ".$table." WHERE `placement`='".$arr4[$l5]."'";
$res5=query($conn,$sql5);
$num5=numrows($res5);
if($num5>=4)
{
while($fetch5=fetcharray($res5))
{
$arr5[$m5]=$fetch5['userid'];
$m5++;
}
}else{
$return=$arr4[$l5];
break;
}
}
}
}

if(!empty($arr5))
{
$count5=count($arr5);
if($count5>=4096)
{
$arr6=array();
$m6=0;
for($l6=0;$l6<$count5;$l6++)
{
$sql6="SELECT * FROM ".$table." WHERE `placement`='".$arr5[$l6]."'";
$res6=query($conn,$sql6);
$num6=numrows($res6);
if($num6>=4)
{
while($fetch6=fetcharray($res6))
{
$arr6[$m6]=$fetch6['userid'];
$m6++;
}
}else{
$return=$arr5[$l6];
break;
}
}
}

}
}else{
$return=$userid;
}

return $return;

}


function getSettingsBank($conn,$field)
{
$sql="SELECT * FROM `iv_settings_company` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}





function getSettingsLevel($conn,$package,$level,$field)
{
$sql="SELECT * FROM `iv_settings_level` WHERE `package`='".$package."' AND `level`='".$level."' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getNoOfActiveSponsor($conn,$userid)
{
$sql="SELECT `id` FROM `iv_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}







function getTotalDownline($conn,$userid)
{
$sql="SELECT * FROM `iv_total_count_downline` WHERE `userid`='".$userid."'  ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['number'];
}
}






function getSettingsSocial($conn,$field)
{
$sql="SELECT * FROM `iv_settings_social` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getUpgradePackageCheck($conn,$userid,$package)
{
$sql="SELECT `id` FROM `iv_member_topup` WHERE `topupid`='".$userid."' AND `packid`='".$package."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}




function getTotalRewardBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_reward` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}




function getTotalagentBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_agent_product` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}






function getTotalautoclubBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_autoclub` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getRewardBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_reward` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getSettingsReward($conn,$nodirect,$field)
{
$sql="SELECT * FROM `iv_settings_reward` WHERE `nodirect`='".$nodirect."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getUplineID($conn,$userid,$table)
{
$sql="SELECT * FROM ".$table." WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['placement'];
}
}

function getCountMatrix($conn,$userid,$table,$level)
{
$sql="SELECT * FROM ".$table."  WHERE `placement`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
$i=0;
$arr=array();
if($num>0)
{
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['userid'];

$i++;
}
if(!empty($arr))
{
$count=count($arr);
if($count>0)
{
$arr1=array();
$j=0;
for($k=0;$k<$count;$k++)
{
$sql1="SELECT * FROM ".$table." WHERE `placement`='".$arr[$k]."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
while($fetch1=fetcharray($res1))
{
$arr1[$j]=$fetch1['userid'];
$j++;
}
}
}
}
}
if(!empty($arr1))
{
$count1=count($arr1);

if($count1>0)
{
$arr2=array();
$m=0;
for($l=0;$l<$count1;$l++)
{
$sql2="SELECT * FROM ".$table." WHERE `placement`='".$arr1[$l]."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
$arr2[$m]=$fetch2['userid'];
$m++;
}
}
}
}
}
if(!empty($arr2))
{
$count2=count($arr2);

if($count2>0)
{
$arr3=array();
$m3=0;
for($l3=0;$l3<$count2;$l3++)
{
$sql3="SELECT * FROM ".$table." WHERE `placement`='".$arr2[$l3]."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
while($fetch3=fetcharray($res3))
{
$arr3[$m3]=$fetch3['userid'];
$m3++;
}
}
}
}
}
if(!empty($arr3))
{
$count3=count($arr3);


if($count3>0)
{
$arr4=array();
$m4=0;
for($l4=0;$l4<$count3;$l4++)
{
$sql4="SELECT * FROM ".$table." WHERE `placement`='".$arr3[$l4]."'";
$res4=query($conn,$sql4);
$num4=numrows($res4);
if($num4>0)
{
while($fetch4=fetcharray($res4))
{
$arr4[$m4]=$fetch4['userid'];
$m4++;
}
}
}
}
}
if(!empty($arr4))
{
$count4=count($arr4);

if($count4>0)
{
$arr5=array();
$m5=0;
for($l5=0;$l5<$count4;$l5++)
{
$sql5="SELECT * FROM ".$table." WHERE `placement`='".$arr4[$l5]."'";
$res5=query($conn,$sql5);
$num5=numrows($res5);
if($num5>0)
{
while($fetch5=fetcharray($res5))
{
$arr5[$m5]=$fetch5['userid'];
$m5++;
}
}
}
}
}
if(!empty($arr5))
{
$count5=count($arr5);

if($count5>0)
{
$arr6=array();
$m6=0;
for($l6=0;$l6<$count5;$l6++)
{
$sql6="SELECT * FROM ".$table." WHERE `placement`='".$arr5[$l6]."'";
$res6=query($conn,$sql6);
$num6=numrows($res6);
if($num6>0)
{
while($fetch6=fetcharray($res6))
{
$arr6[$m6]=$fetch6['userid'];
$m6++;
}
}
}
}
}
if(!empty($arr6))
{
$count6=count($arr6);

if($count6>0)
{
$arr7=array();
$m7=0;
for($l7=0;$l7<$count6;$l7++)
{
$sql7="SELECT * FROM ".$table." WHERE `placement`='".$arr6[$l7]."'";
$res7=query($conn,$sql7);
$num7=numrows($res7);
if($num7>0)
{
while($fetch7=fetcharray($res7))
{
$arr7[$m7]=$fetch7['userid'];
$m7++;
}
}
}
}
}

if(!empty($arr7)){
$count7=count($arr7);
}
}


if($level=='Level 1'){return $count;}
if($level=='Level 2'){return $count1;}
if($level=='Level 3'){return $count2;}
if($level=='Level 4'){return $count3;}
if($level=='Level 5'){return $count4;}
if($level=='Level 6'){return $count5;}
if($level=='Level 7'){return $count6;}
if($level=='Level 8'){return $count7;}
}


function getState($conn,$id)
{
$sql="SELECT * FROM `iv_state` WHERE `id`='".$id."' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['state'];
}
}


function getTotalTeamCount($conn,$userid)
{
$sql="SELECT * FROM `iv_member_downline` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getMatrixPlacementUser($conn,$userid,$table,$field)
{
$sql="SELECT * FROM ".$table." WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getMatrixNextUserIDNew($conn,$matrixid,$table)
{
$sql="SELECT * FROM ".$table." WHERE `placement`='".$matrixid."' AND `status`='I' ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}


function getSettingsOnOff($conn,$field)
{
$sql="SELECT * FROM `iv_settings_onoff` ORDER BY `id` LIMIT 1 ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getUseridAvailableChecking($conn,$userid,$table)
{
$sql="SELECT `id` FROM ".$table." WHERE `userid`='".$userid."' ";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getCbContact($conn)
{
$sql="SELECT * FROM `iv_contact`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getTotalDeposit($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_deposit` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalDeduct($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_deduct` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

//---------------//


function getTotalFranchiseBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_franchaise` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalDirectBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_direct` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getTotalGenerationBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_generation` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}





function getTotalDailyBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_daily` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDailyBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_daily` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

//------------------//




//------------------//




function getDateConvert($date)
{
if($date)
{
$date=date('d/m/Y', strtotime($date));
}
return $date;
}



function getSettingsPlatinumPackage($conn,$package,$field)
{
$sql="SELECT * FROM `iv_settings_platinum_package` WHERE `id`='".$package."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res); 

return $fetch[$field];
}
}

function getSettingsAgent($conn,$agent,$field)
{
$sql="SELECT * FROM `iv_agent` WHERE `id`='".$agent."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res); 

return $fetch[$field];
}
}

function getSettingsPlatinumPackageCheck($conn,$package,$field)
{
$sql="SELECT * FROM `iv_settings_platinum_package` WHERE `id`='".$package."'  AND `clubbenefits`='Y' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res); 

return $fetch[$field];
}
}






function getLatestPackageID($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_package` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getSettingsPlatinumpack($conn,$package,$level,$field)
{
$sql="SELECT * FROM `iv_settings_platinum_generation` WHERE `package`='".$package."' AND `level`='".$level."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getSettingsGeneration($conn,$level,$field)
{
$sql="SELECT * FROM `iv_settings_affiliate` WHERE `level`='".$level."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getCategory($conn,$id,$field)
{
$sql="SELECT * FROM `iv_category` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSize($conn,$id,$field)
{
$sql="SELECT * FROM `iv_size` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSub($conn,$id,$field)
{
$sql="SELECT * FROM `iv_subcategory` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getunit($conn,$id,$field)
{
$sql="SELECT * FROM `iv_unit` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getColor($conn,$id,$field)
{
$sql="SELECT * FROM `iv_color` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getNumrowsProductSize($conn,$id,$size,$field)
{
$arr=array();
$sql="SELECT * FROM `iv_product_size` WHERE `pid`='".$id."' AND `size`='".$size."'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;

}


function getNumrowsProductColor($conn,$id,$color,$field)
{
$arr=array();
$sql="SELECT * FROM `iv_product_color` WHERE `pid`='".$id."' AND `color`='".$color."'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;

}

function getColorProduct($conn,$id,$field)
{
$sql="SELECT * FROM `iv_product_color` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}




function getlastgallypos($conn,$id)
{
$sql="SELECT * FROM `iv_product_gallary` WHERE `pid`='".$id."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['position'];
}
}

function getProductCash($conn,$id,$field)
{
$sql="SELECT * FROM `iv_product` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}



function getColordetails($conn,$id,$field)
{
$arr=array();
$sql="SELECT * FROM `iv_product_color` WHERE `pid`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$i=0;
while($fetch=fetcharray($res))
{
$color=getColor($conn,$fetch['color'],'color');
$arr[$i]=$color;
$i++;
}

return $arr;
}
}

function getSizedetails($conn,$id,$field)
{
$arr=array();
$sql="SELECT * FROM `iv_product_size` WHERE `pid`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$i=0;
while($fetch=fetcharray($res))
{
$size=getSize($conn,$fetch['size'],'size');
$arr[$i]=$size;
$i++;
}

return $arr;
}
}
function getColor1($conn,$id,$field)
{
$arr=array();
$sql="SELECT * FROM `iv_product_color` WHERE `pid`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$i=0;
while($fetch=fetcharray($res))
{
$color=getSize($conn,$fetch['color'],'color');
$arr[$i]=$size;
$i++;
}

return $arr;
}
}

function getProductSell($conn,$pid)
{
$sql="SELECT SUM(`quantity`) AS total FROM `iv_member_purchase_product` WHERE `proid`='".$pid."' AND `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
return $total;
}
}

function getProductStockPoint($conn,$pid)
{
$sql="SELECT SUM(`quantity`) AS total FROM `iv_product_purchase` WHERE `pid`='".$pid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
return $total;
}
}

function getTotalCartQuantity($conn,$pid)
{
//$ip=$_SERVER['REMOTE_ADDR'];
$sql="SELECT SUM(`quantity`) AS total FROM `iv_tmp_cart` WHERE `pid`='".$pid."' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['total'];
}
}
function getProduct($conn,$id,$field)
{
$sql="SELECT * FROM `iv_product` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getUpdateCartProductCount($conn,$ipaddress,$productid,$color,$userid,$field)
{
$sql="SELECT * FROM `iv_tmp_cart` WHERE `ipaddress`='".$ipaddress."' AND `pid`='".$productid."' AND `color`='".$color."' AND `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getProductColor($conn,$pid,$field)
{
$sql="SELECT * FROM `iv_product_color` WHERE `id`='".$pid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getProductSize($conn,$pid,$field)
{
$sql="SELECT * FROM `iv_product_size` WHERE `id`='".$pid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getTotal($conn,$userid)
{
$ip=$_SERVER['REMOTE_ADDR'];
$sql="SELECT SUM(`total`) AS total FROM `iv_tmp_cart` WHERE `ipaddress`='".$ip."' AND `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['total'];
}
}


function getModifyTotal($conn,$ip,$userid)
{
$ip=$_SERVER['REMOTE_ADDR'];
$sql="SELECT SUM(`total`) AS total FROM `iv_tmp_cart` WHERE `ipaddress`='".$ip."' AND `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['total'];
}
}

function getOnlyModifyTotal($conn,$ip,$userid)
{
$ip=$_SERVER['REMOTE_ADDR'];
$sql="SELECT SUM(`total`) AS total FROM `iv_tmp_cart` WHERE `ipaddress`='".$ip."' AND `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['total'];
}
}


function getTotalModifyQuantity($conn,$ip,$userid)
{
$ip=$_SERVER['REMOTE_ADDR'];
$sql="SELECT SUM(`quantity`) AS total FROM `iv_tmp_cart` WHERE `ipaddress`='".$ip."' AND `userid`='".$userid."' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['total'];
}
}
function getAddressdelivery($conn,$id,$field)
{
$sql="SELECT * FROM `iv_member_delivery` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getTotalOrderMemberPurchaseBillno($conn,$userid,$billno)
{
$sql="SELECT SUM(`total`) AS total FROM `iv_member_purchase_product` WHERE `userid`='".$userid."' AND `billno`='".$billno."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberPurchaseByWallet($conn,$userid)
{
$sql="SELECT SUM(`total`) AS total FROM `iv_member_purchase_product` WHERE `userid`='".$userid."' AND `type`='Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}
function getDelivery($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_delivery` WHERE `userid`='".$userid."' ORDER BY `id` ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getPurItem($conn,$aid,$pid,$unit)
{
$sql="SELECT SUM(`quantity`) AS total FROM `iv_member_purchase_product` WHERE `agentid`='".$aid."' AND `proid`='".$pid."' AND `units`='".$unit."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
return $total;
}
}



function getMemberTransfer($conn,$aid,$pid,$uni)
{
$sql="SELECT SUM(`qty`) AS total FROM `iv_stock_transfer` WHERE `pid`='".$pid."' AND `units`='".$uni."' AND `agentid`='".$aid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
return $total;
}
}



function getAvaStockMember($conn,$sid,$pid,$uni)
{
$available=(getMemberTransfer($conn,$aid,$pid,$uni)-(getPurItem($conn,$aid,$pid,$uni)));
return $available;
}


function getAgentRequestTotal($conn,$orderid)
{
 $sql="SELECT SUM(`totalamount`) AS total FROM `iv_agent_product_request_details_tmp` WHERE `orderid`='".$orderid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
return $total;
}
}

function getAgentRequestPV($conn,$orderid,$field)
{
 $sql="SELECT SUM(`totalpv`) AS pv FROM `iv_agent_product_request_details_tmp` WHERE `orderid`='".$orderid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['pv']>0)
{
$total=$fetch['pv'];
}else{
$total=0;
}
return $total;
}
}

function getAgentRequestDetails($conn,$orderid,$field)
{
$sql="SELECT * FROM `iv_agent_product_request_details` WHERE `orderid`='".$orderid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];}
}

function getProductQuantityLatestFPrice($conn,$pid)
{
$sql="SELECT `price` AS total FROM `iv_product_purchase` WHERE `pid`='".$pid."' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
return $total;
}
}

function getAgentRequestProduct($conn,$agentid,$field)
{
$sql="SELECT * FROM `iv_member_purchase` WHERE `agentid`='".$agentid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];}
}



function getSettingsAffiliate($conn,$level,$field)
{
$sql="SELECT * FROM `iv_settings_affiliate` WHERE `level`='".$level."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


//for admin
function getTotalTeamBusiness($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_team_business` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,3);
}
}else{
$total=number_format(0,3);
}
return $total;
}

//for member//
function getTeamBusiness($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_team_business` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,3);
}
}else{
$total=number_format(0,3);
}
return $total;
}


function getTotalTeamBusinees($conn,$userid)
{
$sum=0;
$sqlrd="SELECT * FROM  `iv_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A'";
$resrd=query($conn,$sqlrd);
$numrd=numrows($resrd);
if($numrd>0)
{

while($fetchrd=fetcharray($resrd))
{
$total=getTeamBusiness($conn,$fetchrd['userid'])+getMemberPackageAmount($conn,$fetchrd['userid']);
$sum+=$total;


}

}
return $sum;
}
function getMemberFirstleg($conn,$userid)
{
$sqlrd="SELECT * FROM  `iv_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A'";
$resrd=query($conn,$sqlrd);
$numrd=numrows($resrd);
if($numrd>0)
{
$arr=array();
$i=0;
while($fetchrd=fetcharray($resrd))
{
$total=getTeamBusiness($conn,$fetchrd['userid']);
if($total>0)
{
$arr[$i]=$total;
$i++;
}
}
}

if(!empty($arr))
{
$maxval=max($arr);
}else{
$maxval=0;
}

return $maxval;
}


function getteamcalculation($conn,$userid)
{
$sum=0;
$sqlrd="SELECT * FROM  `iv_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A'";
$resrd=query($conn,$sqlrd);
$numrd=numrows($resrd);
if($numrd>0)
{
$arr=array();
$i=0;
while($fetchrd=fetcharray($resrd))
{
$total=getTeamBusiness($conn,$fetchrd['userid'])+getMemberPackageAmount($conn,$fetchrd['userid']);

$arr[$i]=$total;
$sum+=$total;
$i++;

}
}

if(!empty($arr))
{
if($arr[0]){$firstbusiness=$arr[0];}else{$firstbusiness=0;}
if($arr[1]){$secondbusiness=$arr[1];}else{$secondbusiness=0;}
if($arr[2]){$thirdbusiness=$sum-($firstbusiness+$secondbusiness);}else{$thirdbusiness=0;}
}
return array($firstbusiness,$secondbusiness,$thirdbusiness);

}
function TotalRewardAcheive($conn)
{
$achieve=(getTotalAffiliateBonus($conn)+getTotalIntroducerBonus($conn)+getPerformanceBonus($conn,$userid));

}


function getTotalTopupByDate($conn,$fromdate,$todate)
{
$sql="SELECT COALESCE(SUM(`amount`),0) AS total FROM `iv_member_package` WHERE `date` BETWEEN '".$fromdate."' AND '".$todate."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['total'];

}
}

function getRoyalty($conn)
{
$sql="SELECT * FROM `iv_settings_royalty`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['ctoper'];
}
}


function getTotalLevelBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_level` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberDirectBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_direct` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getMemberGlobalInvestBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_global_investment` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberLevelBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_level` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getSettingsGlobalInvestment($conn,$id,$field)
{
$sql="SELECT * FROM `iv_settings_global_investment` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}

}

function getGlobalInvestment($conn,$userid)
{
$sql="SELECT SUM(`total`) AS total FROM `iv_member_global_investment` WHERE `userid`='".$userid."' AND `wallet`='Fund Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getGlobalInvestmentPackage($conn,$id,$field)
{
$sql="SELECT * FROM `iv_settings_global_investment` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getMemberGlobalInvestmentBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_global_investment` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalGlobalInvestmentBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_global_investment` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getSettingsPackagename($conn,$package,$field)
{
$sql="SELECT * FROM `iv_settings_package` WHERE `package`='".$package."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getMemberSettingsPackagename($conn,$package,$field)
{
$sql="SELECT * FROM `iv_settings_package` WHERE `package`='".$package."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getTotalMatchingP1Bonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p1` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalMatchingP2Bonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p2` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalMatchingP3Bonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p3` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalMatchingP4Bonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p4` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalMatchingP5Bonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p5` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberMatchingP1Bonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p1` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getMemberMatchingP2Bonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p2` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getMemberMatchingP3Bonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p3` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getMemberMatchingP4Bonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p4` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getMemberMatchingP5Bonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p5` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDownlineCountP1($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p1_count` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}


function getDownlineCount($conn,$table,$userid,$field)
{
$sql="SELECT * FROM ".$table." WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}


function getDownlineByPositionP1($conn,$placement,$position)
{
$sql="SELECT * FROM `iv_genealogy_p1` WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res); 
return $fetch['userid'];
}
}

function getDownlineCountP2($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p2_count` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getDownlineCountP2Pair($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p2_count_pair` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}



function getDownlineCountP3Pair($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p3_count_pair` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}


function getDownlineCountP4Pair($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p4_count_pair` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}



function getDownlineCountP5Pair($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p5_count_pair` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getDownlineByPositionP2($conn,$placement,$position)
{
$sql="SELECT * FROM `iv_genealogy_p2` WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res); 
return $fetch['userid'];
}
}


function getDownlineCountP3($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p3_count` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getDownlineByPositionP3($conn,$placement,$position)
{
$sql="SELECT * FROM `iv_genealogy_p3` WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res); 
return $fetch['userid'];
}
}


function getDownlineCountP4($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p4_count` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getDownlineByPositionP4($conn,$placement,$position)
{
$sql="SELECT * FROM `iv_genealogy_p4` WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res); 
return $fetch['userid'];
}
}

function getDownlineCountP5($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p5_count` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getDownlineByPositionP5($conn,$placement,$position)
{
$sql="SELECT * FROM `iv_genealogy_p5` WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res); 
return $fetch['userid'];
}
}


function getDownlineByPositionBoosting($conn,$placement,$position)
{
$sql="SELECT * FROM `iv_genealogy_boosting` WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res); 
return $fetch['userid'];
}
}

function getBoostingWallet($conn,$userid)
{
$total=(getBoosterFromCurrent($conn,$userid)+getBoostingLevelBonusBoostingWallet($conn,$userid))-(getBoosterUpgrade($conn,$userid));
return $total;
}

function getBoosterFromCurrent($conn,$userid)
{
$sql="SELECT SUM(`booster`) AS total FROM `iv_transfer_current_booster` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getBoosterUpgrade($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_member_boosting_upgrade` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getBoostingLevelBonusBoostingWallet($conn,$userid)
{
$sql="SELECT SUM(`boosting`) AS total FROM `iv_commission_boosting_level` WHERE `orguserid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getSettingsBoosting($conn,$field)
{
$sql="SELECT * FROM `iv_settings_boosting` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getCurrentToBooster($conn,$userid)
{
$sql="SELECT SUM(`current`) AS total FROM `iv_transfer_current_booster` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getBoostUpgradeTimeByDate($conn,$userid,$date)
{
$sql="SELECT `id` FROM `iv_member_boosting_upgrade` WHERE `userid`='".$userid."' AND `date`='".$date."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getSettingsBoostLimit($conn,$field)
{
$sql="SELECT * FROM `iv_settings_boosting_limit` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getNoMemberBoostUpgrade($conn,$userid)
{
$sql="SELECT `id` FROM `iv_genealogy_boosting` WHERE `orguserid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPlacementIDBoostingUpgrade($conn)
{
$sql="SELECT * FROM `iv_genealogy_boosting_placement` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getPoolPosition($conn,$table,$placement)
{
$sql="SELECT * FROM ".$table." WHERE `placement`='".$placement."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getTotalBoostingLevelBonus($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_commission_boosting_level` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getBoostingLevelBonus($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_commission_boosting_level` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getBoostingLevelIncomeBonus($conn,$userid)
{
$sql="SELECT SUM(`boosting`) AS total FROM `iv_commission_boosting_level` WHERE `orguserid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberBoostGeneologyUserID($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_genealogy_boosting` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}





function getSettingsBoostingLevel($conn,$level,$field)
{
$sql="SELECT * FROM `iv_settings_boosting_level` WHERE `level`='".$level."'  ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getBoostingLevelBonusCurrentWallet($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_boosting_level` WHERE `orguserid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getDownlineByPosition($conn,$placement,$table,$position)
{
$sql="SELECT * FROM ".$table." WHERE `placement`='".$placement."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}


function getMemberBoostingUpgrade($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `iv_member_boosting_upgrade` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getSettingsMatching($conn,$field)
{
$sql="SELECT * FROM `iv_settings_package` ORDER BY `id` DESC LIMIT 1 ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}



function getTotalPairTodayp1($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p1` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getTotalPairTodayp2($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p2` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalPairTodayp3($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p3` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalPairTodayp4($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p4` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalPairTodayp5($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `iv_commission_matching_p5` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDownlinePosition($conn,$table,$userid,$placement)
{
$sql1="SELECT * FROM ".$table." WHERE `userid`='".$userid."' AND `placement`='".$placement."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);

return $fetch1['position'];
}
}

function getDownlineCountPairP1($conn,$userid,$field)
{
$sql="SELECT * FROM `iv_member_p1_count_pair` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getUpline($conn,$table,$userid)
{
$sql="SELECT * FROM ".$table." WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['placement'];
}
}


function getSettingsRcoin($conn,$field)
{
$sql="SELECT * FROM `iv_settings_rcoin` ORDER BY `id` LIMIT 1 ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getRCoin($conn,$userid)
{
$sql="SELECT SUM(`totalamount`) AS total FROM `iv_member_rcoin` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getCloseRcoin($conn,$id,$field)
{
$sql="SELECT * FROM `iv_member_rcoin` WHERE `id`='".$id."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getRcoinClosed($conn,$userid)
{
$sql="SELECT SUM(`closeamount`) AS total FROM `iv_member_rcoin` WHERE `userid`='".$userid."' AND `status`='C' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getGlobal($conn,$userid)
{
$sql="SELECT SUM(`globalamount`) AS total FROM `iv_commission_global_investment` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getDeductGlobal($conn,$userid)
{
$sql="SELECT SUM(`total`) AS total FROM `iv_member_global_investment` WHERE `userid`='".$userid."' AND `wallet`='Global Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getCTO($conn,$userid)
{
$sql="SELECT SUM(`withdarawalamount`) AS total FROM `iv_commission_global_investment` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getCTOClosed($conn,$userid)
{
$sql="SELECT SUM(`closeamount`) AS total FROM `iv_member_global_investment` WHERE `userid`='".$userid."' AND `status`='C' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalMemberPackageAmount($conn,$fromdate,$todate)
{
$sql="SELECT SUM(`total`) AS total FROM `iv_member_global_investment` WHERE `date` BETWEEN '".$fromdate."' AND '".$todate."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getAllTotalGlobalPackageAmount($conn)
{
$sql="SELECT SUM(`total`) AS total FROM `iv_member_global_investment` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getSettingsGlobalPercentage($conn,$field)
{
$sql="SELECT * FROM `iv_settings_global_investment_percentage` ORDER BY `id` LIMIT 1 ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getCloseGlobal($conn,$id,$field)
{
$sql="SELECT * FROM `iv_member_global_investment` WHERE `id`='".$id."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getPlacementID($conn,$table)
{
$sql="SELECT * FROM ".$table." ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getDownlineCountPair($conn,$table,$userid,$field)
{
$sql="SELECT * FROM ".$table." WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

?>