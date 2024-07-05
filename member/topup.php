<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid = getMember($conn,$_SESSION['mid'],'userid');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>
<script>
function getEpinSet(val)
{
document.frm2.epin.value=val;
}
</script>
<script src="assets/js/ajax.js"></script>

<script>
function getSponcheck(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getSponRequest;
xmlhttp.send();
}
function getSponRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{

var response=xmlhttp.responseText;
document.getElementById('username').innerHTML=response;
}
}
}
</script>
<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd);">
<div class="wrapper">
<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">
<div class="card" style="z-index:9999; margin-top:50px;">
<div class="card-header">
<div class="card-title"><a href="javascript:history.go(-1)"><img src="images/back-page.png" height="16" width="20"> &nbsp; Other Member Activation</a>  <span style="float:right;background:;padding:3px 5px;color:#333333;"><a href="topup.php?case=check" style="text-decoration:none;margin-buttom:10px;">+ New Record</a></span> </div>
</div>
</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="card" style="background:#FFFFFF;">

<div>&nbsp;</div>
<?php if($_REQUEST['case']=='check'){?>

<?php if($_REQUEST['m']=='1'){?><p align="center" style="color:#009900;font-weight:bold;">Member account is successfully activated!</p><?php } ?>
<?php if($_REQUEST['e']=='2'){?><div align="center" style="color:#FF0000;">Invalid User ID OR User ID is already activated!</div><?php } ?>
<?php if($_REQUEST['e']=='5'){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Something wrong please contact with technical team. Placement ID is missing!</p><?php }?>
<?php if($_REQUEST['e']==4){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Insufficient wallet balance!</p><?php }?>

<div class="card-body" style="background-color:#FFFFFF">
<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='A')
{
?>
<form class="form" action="check-process.php?case=check" method="post">

<div class="form-group">
<label for="pillInput">User ID<span style="color:#FF0000;">*</span></label>
<input type="text" class="form-control input-pill" id="userid" name="userid" placeholder="Enter User ID" onKeyUp="getSponcheck(this.value);" onBlur="getSponcheck(this.value);" required>
</div>
<strong><div id="username" style="color:#FF0000;padding-right:25px; font-size:14px;">&nbsp;&nbsp;</div></strong>

<div class="card-action">
<button class="btn btn-success">Check</button>
</div>
</form>
<?php }else{?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;"><br />Click here <a href="activation.php">Activation</a> to Activate your account!</h3>
<?php }?>
</div>


<?php }else if($_REQUEST['case']=='add'){?>

<?php if($_REQUEST['m']=='1'){?><p align="center" style="color:#009900;font-weight:bold;">Member account is successfully activated!</p><?php } ?>
<?php if($_REQUEST['e']=='2'){?><div align="center" style="color:#FF0000;">Invalid User ID OR User ID is already activated!</div><?php } ?>
<div class="card-body">
<?php if($_REQUEST['m']=='1'){?><p align="center" style="color:#009900;font-weight:bold;">Member account is successfully activated!</p><?php } ?>
<?php if($_REQUEST['e']==4){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Insufficient wallet balance!</p><?php }?>

<h4 class="form-section" style="color:#0033FF;" align="center"><i class="icon-wallet"></i>Fund Wallet:&nbsp; <?=getFundWallet($conn,$userid);?> </h4>
<p align="center" style="color:#009900; padding-bottom:8px;"><?=ucwords(getMemberUserID($conn,$_REQUEST['userid'],'name'))?></p>

<form class="form" action="topup-process.php?case=add" method="post">
<input type="hidden" name="userid" id="userid" class="form-control" placeholder="Enter Userid" value="<?=trim($_REQUEST['userid'])?>" required /> 


<div class="form-group">
<select name="package" id="package" class="form-control" style="border-radius:10px;" required>
<option value="" >Select Package</option>
<?php
$sqlst="SELECT * FROM `iv_settings_package` WHERE `status`='A' ORDER BY `id` LIMIT 1";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0)
{
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords(strtolower($fetchst['package']))?> (<?=$fetchst['amount']?>)</option>
<?php }}?>
</select>
</div> 



<div class="card-action" align="center">
<button class="btn btn-success" onClick="return confirm('Are you sure want to activate now?');">Activate Now</button>
</div>
</form>


</div>   
</div>
</div>   
<div class="col-md-2"></div>
  </div>
                   
<?php }?>


</div>
</div>

<!-- Custom template | don't include it in your project! -->
<!-- End Custom template -->
</div>
</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>
<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>
<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>
<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
</body>
</html>