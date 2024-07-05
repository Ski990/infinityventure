<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="author" content="">
<title>ADMINISTRATOR</title>
<link rel="apple-touch-icon" sizes="60x60" href="app-assets/images/ico/apple-icon-60.png">
<link rel="apple-touch-icon" sizes="76x76" href="app-assets/images/ico/apple-icon-76.png">
<link rel="apple-touch-icon" sizes="120x120" href="app-assets/images/ico/apple-icon-120.png">
<link rel="apple-touch-icon" sizes="152x152" href="app-assets/images/ico/apple-icon-152.png">
<!--<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
<link rel="shortcut icon" type="image/png" href="app-assets/images/ico/favicon-32.png">-->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
<!-- font icons-->
<link rel="stylesheet" type="text/css" href="app-assets/fonts/icomoon.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/pagination.css">
<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar"> 

<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
<div class="navbar-wrapper">
<div class="navbar-header" style="background:#fff;">
<ul class="nav navbar-nav">
<li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>

<li class="nav-item" >
<a href="dashboard.php" class="navbar-brand nav-link" style="padding:;font-size:; margin:0px; padding:0px;">
<p style="padding-top:8px;"><img src="images/logo.png" height="40px" width="90%"> </p>
</a>
 </li>


<li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
</ul>
</div>
<div class="navbar-container content container-fluid">
<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
<ul class="nav navbar-nav">
<li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>


</ul>
<ul class="nav navbar-nav float-xs-right">

<li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="images/member.png" alt="avatar"><i></i></span><span class="user-name"><?php if($_SESSION['sid']){ ?><?=ucwords(strtolower(base64_decode(getUser($conn,$_SESSION['sid'],'username'))))?><?php }else{ ?><?=ucwords(strtolower(base64_decode(getUser($conn,$_SESSION['fid'],'username'))))?><?php } ?></span></a>
<div class="dropdown-menu dropdown-menu-right"><a href="dashboard.php" class="dropdown-item"><i class="icon-library"></i>Home</a>
  <div class="dropdown-divider"></div><a href="logout.php" class="dropdown-item" onClick="return confirm('Are you sure want to logout?');"><i class="icon-power3"></i> Logout</a>
</div>
</li>
</ul>
</div>
</div>
</div>
</nav>