<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
<div class="main-menu-content">
<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<li class=" nav-item"><a href="#"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a>
<ul class="menu-content">
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="dashboard.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-home"></i>Dashboard</a></li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="change-password.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-ios-locked"></i>Change Password</a></li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="logout.php" data-i18n="nav.dash.main" class="menu-item" onclick="return confirm('Are you sure want to logout?');"><i class="icon-power3"></i>Logout</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-gear"></i><span data-i18n="nav.dash.main" class="menu-title">Settings</span></a>
<ul class="menu-content">

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-package.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Package</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-level.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Level</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-global-investment.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Global Investment</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-global-invest-per.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Global Percentage </a></li>


<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-boosting.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Boosting</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-boosting-level.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Boosting Level</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-boosting-limit.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Boosting Limit</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-rcoin.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>R-Coin</a></li>


<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-bankdetails.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Bank Details</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-transfer.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Transfer</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Withdrawal</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-onoff.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>On Off</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-group"></i><span data-i18n="nav.dash.main" class="menu-title">Member</span></a>
<ul class="menu-content">
<?php if(getTotalMember($conn)<1){ ?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Member</a></li>
<?php }?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Member</a></li>

<li class="<?php if($left=='3'){?> active<?php }?>"><a href="bank-details.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Bank Statement</a></li>

<li class="<?php if($left=='3'){?> active<?php }?>"><a href="income-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Income Statement</a></li>

<li class="<?php if($left=='3'){?> active<?php }?>"><a href="global-investment-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Global Investment</a></li>


<li class="<?php if($left=='3'){?> active<?php }?>"><a href="boosting-upgrade-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Boosting Upgrade Statement</a></li>


<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-rcoin-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>R-Coin Statement</a></li>

<?php /*?><li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-reward.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Reward Statement</a></li><?php */?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-package-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Package Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="package-upgrade-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Package Upgrade</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="topup-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Topup Statement</a></li>



</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Commission</span></a>
<ul class="menu-content">
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-direct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Direct Bonus</a></li>

<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-level.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Level Bonus</a></li>

<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-global-investment.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Global Investment Bonus</a></li>


<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-boosting-level-bonus.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Boosting Level</a></li>


<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-matching-p1.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P1','packagename')?> Bonus</a></li>

<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-matching-p2.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P2','packagename')?> Bonus</a></li>

<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-matching-p3.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P3','packagename')?> Bonus</a></li>

<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-matching-p4.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P4','packagename')?> Bonus</a></li>

<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-matching-p5.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P5','packagename')?> Bonus</a></li>




</ul>
</li>



<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Deposit</span></a>
<ul class="menu-content">
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deposit</a></li>
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deposit</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Deduct</span></a>
<ul class="menu-content">
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="deduct.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deduct</a></li>
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="deduct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deduct</a></li>
</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Payment Request</span></a>
<ul class="menu-content">
<li class="<?php if($left=='8'){?> active<?php }?>"><a href="payment.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Statement</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">P2P Transfer</span></a>
<ul class="menu-content">
<li class="<?php if($left=='51'){?> active<?php }?>"><a href="transfer-current.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Current To Fund</a></li>

<li class="<?php if($left=='51'){?> active<?php }?>"><a href="transfer.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Fund To Others</a></li>

<li class="<?php if($left=='51'){?> active<?php }?>"><a href="transfer-boosting.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Current To Boosting</a></li>

</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Withdrawal</span></a>
<ul class="menu-content">
<li class="<?php if($left=='41'){?> active<?php }?>"><a href="pending-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Pending Withdrawal</a></li>

<li class="<?php if($left=='41'){?> active<?php }?>"><a href="approved-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Approved Withdrawal</a></li>


</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-group"></i><span data-i18n="nav.dash.main" class="menu-title">Genealogy</span></a>
<ul class="menu-content">

<li class="<?php if($left=='9'){?> active<?php }?>"><a href="grid-view.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Grid View</a></li>


<li class="<?php if($left=='9'){?> active<?php }?>"><a href="tree-view-p1.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P1','packagename')?> Tree View</a></li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="genealogy-level-p1.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P1','packagename')?> Level View</a></li>


<li class="<?php if($left=='9'){?> active<?php }?>"><a href="tree-view-p2.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P2','packagename')?> Tree View</a></li>

<li class="<?php if($left=='9'){?> active<?php }?>"><a href="genealogy-level-p2.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P2','packagename')?> Level View</a></li>


<li class="<?php if($left=='9'){?> active<?php }?>"><a href="tree-view-p3.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P3','packagename')?> Tree View</a></li>

<li class="<?php if($left=='9'){?> active<?php }?>"><a href="genealogy-level-p3.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P3','packagename')?> Level View</a></li>



<li class="<?php if($left=='9'){?> active<?php }?>"><a href="tree-view-p4.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P4','packagename')?> Tree View</a></li>

<li class="<?php if($left=='9'){?> active<?php }?>"><a href="genealogy-level-p4.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P4','packagename')?> Level View</a></li>


<li class="<?php if($left=='9'){?> active<?php }?>"><a href="tree-view-p5.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P5','packagename')?> Tree View</a></li>

<li class="<?php if($left=='9'){?> active<?php }?>"><a href="genealogy-level-p5.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i><?=getSettingsPackagename($conn,'P5','packagename')?> Level View</a></li>


<li class="<?php if($left=='9'){?> active<?php }?>"><a href="genealogy-boost-tree.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Boost Tree View</a></li>

<li class="<?php if($left=='9'){?> active<?php }?>"><a href="genealogy-boost-level.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Boost Level View</a></li>


</ul>
</li>    

<li class=" nav-item"><a href="#"><i class="icon-phone"></i><span data-i18n="nav.dash.main" class="menu-title">Contact</span></a>
<ul class="menu-content">

<?php if(getCbContact($conn)<1) { ?>
<li class="<?php if($left=='11'){?> active<?php }?>"><a href="contact.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Contact</a></li>
<?php } ?>

<li class="<?php if($left=='11'){?> active<?php }?>"><a href="contact.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Contact</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Feedback</span></a>
<ul class="menu-content">
<li class="<?php if($left=='12'){?> active<?php }?>"><a href="feedback.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Feedback</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-th"></i><span data-i18n="nav.dash.main" class="menu-title">Message</span></a>
<ul class="menu-content">
<li class="<?php if($left=='29'){?> active<?php }?>"><a href="announcement.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Message</a></li>
<li class="<?php if($left=='29'){?> active<?php }?>"><a href="announcement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Message</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-th"></i><span data-i18n="nav.dash.main" class="menu-title">Popup</span></a>
<ul class="menu-content">
<li class="<?php if($left=='27'){?> active<?php }?>"><a href="popup.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Popup</a></li>
<li class="<?php if($left=='27'){?> active<?php }?>"><a href="popup.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Popup</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-th"></i><span data-i18n="nav.dash.main" class="menu-title">Banner</span></a>
<ul class="menu-content">
<li class="<?php if($left=='30'){?> active<?php }?>"><a href="banner.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Banner</a></li>
<li class="<?php if($left=='30'){?> active<?php }?>"><a href="banner.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Banner</a></li>
</ul>
</li>

<li class="nav-item"><a href="#"><i class="icon-gear"></i><span data-i18n="nav.dash.main" class="menu-title">Support</span></a>
<ul class="menu-content">
<li class="<?php if($left=='13'){?> active<?php }?>"><a href="support.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Support</a></li>
</ul>
</li>

<li class=" nav-item"><a href="logout.php"  onclick="return confirm('Are you sure want to logout?');"><i class="icon-power3"></i><span data-i18n="nav.dash.main" class="menu-title">Logout</span></a></li>
</ul>
</div>
</div>
