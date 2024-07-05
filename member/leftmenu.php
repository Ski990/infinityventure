<div class="sidebar">

<div class="sidebar-background" ></div>
<div class="sidebar-wrapper scrollbar-inner">
<div class="sidebar-content">


<div class="user" style="margin-top:60px;">	
<div class="avatar-sm float-left mr-2" >
<?php
if(getMember($conn,$_SESSION['mid'],'profile'))
{
?>
<img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" alt="..." class="avatar-img rounded-circle" />
<?php }else{?>
<img src="images/profile.jpg" alt="..." class="avatar-img rounded-circle" />
<?php }?>
</div>
<div class="info">
<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
<span>
<?=ucwords(getMember($conn,$_SESSION['mid'],'name'))?>
<span class="user-level"><?=getMember($conn,$_SESSION['mid'],'userid')?></span>
<span class="caret" style="color:#FFFFFF;"></span>
</span>
</a>
<div class="clearfix"></div>

<div class="collapse in" id="collapseExample" >
<ul class="nav">
<li class="nav-item "><a href="edit-profile.php"><img src="icon/icons8-user-profile-20.png" style="height:20px;width:20px;" /><p>    &nbsp; Profile</p></a></li>
<li class="nav-item "><a href="change-password.php"><img src="icon/icons8-password-50.png" style="height:20px;width:20px;" /><p> &nbsp; Change Password</p></a></li>
<li class="nav-item "><a href="letter.php"><img src="icon/icons8-letter-20.png" style="height:20px;width:20px;" /><p> &nbsp; Welcome Letter </p></a></li>
<li class="nav-item "><a href="i-card.php"><img src="icon/icons8-id-verified-20.png" style="height:20px;width:20px;" /><p> &nbsp; I-Card  </p></a></li>
</ul>
</div>


</div>
</div>

<ul class="nav">

<li class="nav-item active"><a href="dashboard.php"><i><img src="icon/icons8-home-64.png" style="height:20px;width:20px;" /></i><p>Dashboard</p></a></li>



<li class="nav-item">
<a data-toggle="collapse" href="#base">
<i><img src="icon/icons8-banner-50.png" style="height:20px;width:20px;" /></i>
<p>Sponsor & Team</p>
<span class="caret" style="color:#FFFFFF;"></span>
</a>
<div class="collapse" id="base">
<ul class="nav nav-collapse">

<li class="nav-item "><a href="member-direct-downline.php"><i class="fas fa-key" style="color:#FFFFFF;"></i><p>My Sponsor</p></a></li>

<li class="nav-item "><a href="member-team-downline.php"><i class="fas fa-key" style="color:#FFFFFF;"></i><p>My Team</p></a></li>
</ul>
</div>
</li>




<li class="nav-item">
<a data-toggle="collapse" href="#forms">
<i><img src="icon/icons8-add-20.png" style="height:20px;width:20px;" /></i>
<p>Commission</p>
<span class="caret" style="color:#FFFFFF;"></span>
</a>
<div class="collapse" id="forms">
<ul class="nav nav-collapse">
<li class="nav-item "><a href="commission-direct.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p>Direct Bonus</p></a></li>

<li class="nav-item "><a href="commission-level.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p>Level Bonus</p></a></li>

<li class="nav-item "><a href="commission-global-investment.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p>Global Investment Bonus</p></a></li>

<li class="nav-item "><a href="commission-boosting-level-bonus.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p>Boosting Level Bonus</p></a></li>


<li class="nav-item "><a href="commission-matching-p1.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P1','packagename')?> Bonus</p></a></li>

<li class="nav-item "><a href="commission-matching-p2.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P2','packagename')?> Bonus</p></a></li>

<li class="nav-item "><a href="commission-matching-p3.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P3','packagename')?> Bonus</p></a></li>

<li class="nav-item "><a href="commission-matching-p4.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P4','packagename')?> Bonus</p></a></li>

<li class="nav-item "><a href="commission-matching-p5.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P5','packagename')?> Bonus</p></a></li>
</ul>
</div>
</li>





<li class="nav-item">
<a data-toggle="collapse" href="#inv">
<i><img src="icon/icons8-right-arrow-64.png" style="height:20px;width:20px;" /></i>
<p>Total Investment</p>
<span class="caret" style="color:#FFFFFF;"></span>
</a>
<div class="collapse" id="inv">
<ul class="nav nav-collapse">
<li class="nav-item "><a href="global-investment-statement.php"><i class="fas fa-clock" style="color:#FFFFFF;"></i><p>Global Investment</p></a></li>
<li class="nav-item "><a href="payment-statement.php"><i class="fas fa-wallet" style="color:#FFFFFF;"></i><p>Payment Statement</p></a></li>
<li class="nav-item "><a href="topup-statement.php"><i class="fas fa-box" style="color:#FFFFFF;"></i><p>Topup Statement</p></a></li>
</ul>
</div>
</li>





<li class="nav-item">
<a data-toggle="collapse" href="#tabs5">
<i><img src="icon/icons8-view-30.png"s style="height:20px;width:20px;" /></i>
<p>Package Upgrade</p>
<span class="caret" style="color:#FFFFFF;"></span>
</a>
<div class="collapse" id="tabs5">
<ul class="nav nav-collapse">

<li class="nav-item "><a href="package-upgrade-statement.php"><i class="fas fa-box" style="color:#FFFFFF;"></i><p>Upgrade Statement</p></a></li>

<li class="nav-item "><a href="boosting-upgrade-statement.php"><i class="fas fa-box" style="color:#FFFFFF;"></i><p>Booster Upgrade Statement</p></a></li>
</ul>
</div>
</li>






<li class="nav-item">
<a data-toggle="collapse" href="#tabs6">
<i><img src="icon/icons8-news-20.png" style="height:20px;width:20px;" /></i>
<p>R-Coin</p>
<span class="caret" style="color:#FFFFFF;"></span>
</a>
<div class="collapse" id="tabs6">
<ul class="nav nav-collapse">

<li class="nav-item "><a href="rcoin-statement.php"><i class="fas fa-box" style="color:#FFFFFF;"></i><p>Statement</p></a></li>
</ul>
</div>
</li>













<li class="nav-item">
<a data-toggle="collapse" href="#form1">
<i><img src="icon/icons8-popup-50.png" style="height:20px;width:20px;" /></i>
<p>P2P Tranfer</p>
<span class="caret" style="color:#FFFFFF;"></span>
</a>
<div class="collapse" id="form1">
<ul class="nav nav-collapse">
<li  class="nav-item "><a href="current-statement.php"><i class="fas fa-wallet" style="color:#FFFFFF;"></i><p>Current To Fund </p></a></li>
<li class="nav-item "><a href="boosting-statement.php"><i class="fas fa-box" style="color:#FFFFFF;"></i><p>Current To Boosting</p></a></li>
<li class="nav-item "><a href="fund-statement.php"><i class="fas fa-wallet" style="color:#FFFFFF;"></i><p>Fund To Others</p></a></li>
</ul>
</div>
</li>




<li class="nav-item">
<a data-toggle="collapse" href="#submenu">
<i><img src="icon/icons8-feedback-50.png" style="height:20px;width:20px;" /></i>
<p>Withdrawal</p>
<span class="caret" style="color:#FFFFFF;"></span>
</a>
<div class="collapse" id="submenu">
<ul class="nav nav-collapse">
<li class="nav-item "><a href="withdrawal-statement.php"><i class="fas fa-wallet" style="color:#FFFFFF;"></i><p>Withdrawal </p></a></li>
</ul>
</div>
</li>





<li class="nav-item">
<a data-toggle="collapse" href="#maps">
<i><img src="icon/icons8-client-50.png" style="height:20px;width:20px;" /></i>
<p>Genealogy</p>
<span class="caret" style="color:#FFFFFF;"></span>
</a>
<div class="collapse" id="maps">
<ul class="nav nav-collapse">
<li class="nav-item "><a href="grid-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p>Grid View</p></a></li>
<li class="nav-item "><a href="p1-tree-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P1','packagename')?> Tree View</p></a></li>
<li class="nav-item "><a href="p1-level-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P1','packagename')?> Level View</p></a></li>
<li class="nav-item "><a href="p2-tree-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P2','packagename')?> Tree View</p></a></li>
<li class="nav-item "><a href="p2-level-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P2','packagename')?> Level View</p></a></li>
<li class="nav-item "><a href="p3-tree-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P3','packagename')?> Tree View</p></a></li>
<li class="nav-item "><a href="p3-level-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P3','packagename')?> Level View</p></a></li>
<li class="nav-item "><a href="p4-tree-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P4','packagename')?> Tree View</p></a></li>
<li class="nav-item "><a href="p4-level-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P4','packagename')?> Level View</p></a></li>
<li class="nav-item "><a href="p5-tree-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P5','packagename')?> Tree View</p></a></li>
<li class="nav-item "><a href="p5-level-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p><?=getMemberSettingsPackagename($conn,'P5','packagename')?> Level View</p></a></li>
<li class="nav-item "><a href="boost-tree-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p> Boost Tree View</p></a></li>
<li class="nav-item "><a href="boost-level-view.php"><i class="fas fa-tree" style="color:#FFFFFF;"></i><p> Boost Level View</p></a></li>
</ul>
</div>
</li>


<!--
<li class="nav-item "><a href="grid-view.php"><i class="fas fa-print"></i><p>Grid View</p></a></li>
<li class="nav-item "><a href="withdrawal-statement.php"><i class="fas fa-print"></i><p>View Statement</p></a></li>
-->


<li class="nav-item">
<a data-toggle="collapse" href="#charts">
<i><img src="icon/icons8-service-50.png" style="height:20px;width:20px;" /></i>
<p>Support</p>
<span class="caret" style="color:#FFFFFF;"></span>
</a>
<div class="collapse" id="charts">
<ul class="nav nav-collapse">
<li class="nav-item "><a href="support-statement.php"><i class="fas fa-phone" style="color:#FFFFFF;"></i><p> Support</p></a></li>
</ul>
</div>
</li>



<li class="nav-item active">
<a href="logout.php" onclick="return confirm('Are you sure want to logout now?');"><i><img src="icon/icons8-logout-50.png" style="height:20px;width:20px;" /></i><p>Logout</p></a>
</li>
</ul>

<div>&nbsp;</div>
<div>&nbsp;</div>
</div>
</div>
</div>