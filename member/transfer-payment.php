<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

$userid=getMember($conn,$_SESSION['mid'],'userid');

include"setting.php";

$sqlc="SELECT * FROM `iv_withdrawal_imps` WHERE `userid`='".$userid."' AND `date`='".date('Y-m-d')."'";
$resc=query($conn,$sqlc);
$numc=numrows($resc);
if($numc<1)
{
$avabal=getAvailableWallet($conn,$userid);
if($avabal>=trim($_POST['amount']))
{
$min=getSettingsWithdrawal($conn,'minimum');
$amt=trim($_POST['amount']);

if($amt>=$min)
{
$tds=getSettingsWithdrawal($conn,'tds');
$service=getSettingsWithdrawal($conn,'service');
$imps=getSettingsWithdrawal($conn,'imps');

$tdsamt=(trim($_POST['amount']) * $tds)/100;
$serviceamt=(trim($_POST['amount']) * $service)/100;

$payout=(trim($_POST['amount'])-($tdsamt+$serviceamt+$imps));

if(isset($_POST["beneficiary_account_no"])){
$beneficiary_account_no=$_POST["beneficiary_account_no"];
}
if(empty($beneficiary_account_no)){
echo "beneficiary_account_no is empty.";
exit;
}
if(isset($_POST["beneficiary_ifsc"])){
$beneficiary_ifsc=$_POST["beneficiary_ifsc"];
}
if(empty($beneficiary_ifsc)){
echo "beneficiary_ifsc is empty.";
exit;
}
if(isset($_POST["amount"])){
$amount=$payout;
}
if(empty($amount)){
echo "Amount is empty.";
exit;
}
if(isset($_POST["purpose"])){
$purpose=$_POST["purpose"];
}
if(empty($purpose)){
echo "purpose is empty.";
exit;
}
if(isset($_POST["remarks"])){
$remarks=$_POST["remarks"];
}
if(isset($_POST["mobileno"])){
$mobileno=$_POST["mobileno"];
}

//generating unique random order id
$myorderid= substr(number_format(time() * rand(),0,'',''),0,10);
if(empty($myorderid)){
echo "Client order ID not generated.";
exit;
}


//build payload in json
$paramList = array();
$paramList["apikey"] = $apikey;
$paramList["mobileno"] = $mobileno;
$paramList["beneficiary_account_no"] = $beneficiary_account_no;
$paramList["beneficiary_ifsc"] = $beneficiary_ifsc;
$paramList["amount"] = $amount;
$paramList["orderid"] = $myorderid;
$paramList["purpose"] = $purpose;
$paramList["remarks"] = $remarks;
$paramList["callbackurl"] = $callbackurl;
$payload = json_encode($paramList, true);

$ch = curl_init("$baseurl/transfer.php");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, 0);
$file_contents = curl_exec ($ch); // execute
$err = curl_error($ch);
curl_close($ch);
//echo "$file_contents";//show response
//exit;
if(!empty($file_contents)){
$jsondata = json_decode($file_contents, true);
$rcstatus = $jsondata['status'];
$errormsg = $jsondata['error'];
}else{
 //handle empty or timeout
 //set status as PENDING at your end
 $rcstatus="PENDING";
}

if($rcstatus=='ACCEPTED' || $rcstatus=='SUCCESS'){
//COLLECT MORE PARAMETERS HERE
$txid = $jsondata['txid'];//jolo order id
$desc = $jsondata['desc'];
$beneficiaryid = $jsondata['beneficiaryid'];

$sql1="INSERT INTO `iv_withdrawal_imps` (`userid`,`request`,`tds`,`service`,`imps`,`payout`,`rcstatus`,`errormsg`,`operatorid`,`tracker`,`actualname`,`date`) VALUES('".$userid."','".trim($_POST['amount'])."','".$tdsamt."','".$serviceamt."','".$imps."','".$payout."','".$rcstatus."','".$errormsg."','".$txid."','".$beneficiaryid."','".$desc."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);

$message="order id: $txid <br/> detail: $desc <br/> Status: $rcstatus <br/> beneficiaryid: $beneficiaryid";

redirect('imps-withdrawal.php?mes='.$message);
}

if($rcstatus=='FAILED'){
//show error    

$message="$errormsg <br/> Status: $rcstatus";
redirect('imps-withdrawal.php?mes='.$message);
}

if($rcstatus=='PENDING'){
//check status using "Transfer money status API" after 24hrs only
$message="No api response or timeout. Status: $rcstatus";

redirect('imps-withdrawal.php?mes='.$message);
}

}else{
redirect('imps-withdrawal.php?e=1');
}
}else{
redirect('imps-withdrawal.php?e=2');
}

}else{
redirect('imps-withdrawal.php?e=3');
}
?>