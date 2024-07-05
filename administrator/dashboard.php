<?php
include('header.php');
$left=1;
include('calculate-rcoin-auto-closed.php');
include('calculate-global-expire.php');

?>
<!-- main menu-->
<?php include('leftpanel.php');?>
<!-- / main menu-->

<div class="app-content content container-fluid" style="background:#fff;">
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body" style="min-height:510px;">

<div class="row">

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#277BC0; min-height:115px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4 style="color:#fff; font-size:16px;">Total Member</h4>
<span style="color:#FFFFFF;"><?=getTotalMember($conn)?></span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member-active.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#FFB200; min-height:115px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4 style="color:#fff; font-size:16px;">Active Member</h4>
<span style="color:#fff;"><?=getApproved($conn)?></span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member-inactive.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#293462; min-height:115px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;">Inactive Member</h4>
<span style="color:#fff;"><?=getInactiveMember($conn)?></span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-direct.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#4F091D; min-height:115px; border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;">Direct Bonus</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getTotalDirectBonus($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

</div>
<div class="row">


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-level.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#293462; min-height:115px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;">Level Bonus</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getTotalLevelBonus($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>



<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-global-investment.php" style="color:#000; font-size:18px;">
<div class="card-body"  style="background:#4F091D; min-height:115px; border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;">Global Investment Bonus</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getTotalGlobalInvestmentBonus($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>



<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-matching-p1.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#FFB200; min-height:115px;border-radius:10px;"> 
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;"><?=getSettingsPackagename($conn,'P1','packagename')?> Bonus</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getTotalMatchingP1Bonus($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-matching-p2.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#293462; min-height:115px;border-radius:10px;"> 
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;"><?=getSettingsPackagename($conn,'P2','packagename')?> Bonus</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getTotalMatchingP2Bonus($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


</div>



<div class="row">



<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-matching-p3.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#4F091D; min-height:115px;border-radius:10px;"> 
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;"><?=getSettingsPackagename($conn,'P3','packagename')?> Bonus</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getTotalMatchingP3Bonus($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-matching-p4.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#277BC0; min-height:115px;border-radius:10px;"> 
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;"><?=getSettingsPackagename($conn,'P4','packagename')?> Bonus</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getTotalMatchingP4Bonus($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-matching-p5.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#277BC0; min-height:115px;border-radius:10px;"> 
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;"><?=getSettingsPackagename($conn,'P5','packagename')?> Bonus</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getTotalMatchingP5Bonus($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>



<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-boosting-level-bonus.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#4F091D; min-height:115px; border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;">Boosting Level Bonus</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getTotalBoostingLevelBonus($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>



</div>

<div class="row">






<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="pending-withdrawal.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#FFB200; min-height:115px; border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;">Pending Withdrawal</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getPendingWithdrawalAdmin($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>



<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="approved-withdrawal.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#293462; min-height:115px; border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;">Approved Withdrawal</h4>
<span style="color:#FFFFFF;"><?=$currency?> <?=getApprovedWithdrawalAdmin($conn)?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="support.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#4F091D; min-height:115px; border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;">Total Support</h4>
<span style="color:#FFFFFF;"><?=getTotalSupport($conn);?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="feedback.php" style="color:#000; font-size:18px;">
<div class="card-body" style="background:#277BC0; min-height:115px; border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h4  style="color:#fff; font-size:16px;">Total Feedback</h4>
<span style="color:#FFFFFF;"><?=getNoOfFeedback($conn);?></span>
</div><div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>



</div>
</div>

</div>
</div>

</div>


<?php include('footer.php');?>

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
