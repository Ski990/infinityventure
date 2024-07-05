<?php
include('administrator/includes/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title><?=$title?></title>
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/venobox.min.css" />
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/animated_barfiller.css" />
    <link rel="stylesheet" href="css/select2.min.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/utilities.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>

    <!--============================
        HEADER START
    =============================-->
    <?php include('header.php')?>
    <!--============================
        HEADER END
    =============================-->


  

 <!--============================
        BREADCRUMB START
    =============================-->
    <section class="breadcrumb_area" style="background: url(images/breadcrumb_bg.jpg);">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_text">
                            <h1>Contact Us</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    =============================-->


     <!--=============================
        CONTACT PAGE START
    ==============================-->
    <section class="contact mt_120 xs_mt_80 mb_120 xs_mb_80">
        <div class="container">
            <div class="contact_form_area">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 wow fadeInUp" data-wow-duration="1s">
                        <div class="contact_info_area">
                            <div class="contact_info">
                                <h3>call</h3>
                                <p><?=getContact($conn,'phone1')?></p>
                                <p><?=getContact($conn,'phone2')?></p>
                            </div>
                            <div class="contact_info">
                                <h3>mail</h3>
                                <p><?=getContact($conn,'email1')?></p>
                                <p><?=getContact($conn,'email2')?></p>
                            </div>
                            <div class="contact_info border-0 p-0 m-0">
                                <h3>location</h3>
                                <p><?=getContact($conn,'addline1')?></p>
								<p><?=getContact($conn,'addline2')?></p>
                            </div>
                        </div>
                    </div>

				<div class="col-xl-7 col-lg-7 wow fadeInUp" data-wow-duration="1s">
					<form class="contact_form" action="contact-process.php" method="post">
<?php
if($_REQUEST['m']==1)
{?>
<p style="text-align:center; color:#0033FF">Your message has been sent successfully!</p>
<?php }?>

						<h3>contact us</h3>
						<div class="row">
							<div class="col-xl-12">
								<div class="contact_form_input">
									<span><i class="fas fa-user"></i></span>
									<input type="text" name="name" id="name" required="" placeholder="Name">
								</div>
							</div>
							<div class="col-xl-6">
								<div class="contact_form_input">
									<span><i class="fas fa-envelope"></i></span>
									<input type="email" name="email" id="email" required="" placeholder="Email">
								</div>
							</div>
							<div class="col-xl-6">
								<div class="contact_form_input">
									<span><i class="fas fa-phone-alt"></i></span>
									<input type="text" name="phone" id="phone" required="" placeholder="Phone">
								</div>
							</div>
							<div class="col-xl-12">
								<div class="contact_form_input">
									<span><i class="fas fa-book"></i></span>
									<input type="text" name="subject" id="subject" required="" placeholder="Subject">
								</div>
							</div>
							<div class="col-xl-12">
								<div class="contact_form_input textarea">
									<span><i class="fas fa-pen"></i></span>
									<textarea rows="5" name="message" id="message" required="" placeholder="Message"></textarea>
								</div>
								<button class="common_btn mt_15" type="submit">send message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
			

</section>
   


    <!--==============================
        FOOTER START
    ===============================-->
    <?php include('footer.php')?>
    <!--==============================
        FOOTER END
    ===============================-->


   


    <!--jquery library js-->
    <script src="js/jquery-3.7.0.min.js"></script>
    <!--bootstrap js-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--font-awesome js-->
    <script src="js/Font-Awesome.js"></script>
    <!--venobox js-->
    <script src="js/venobox.min.js"></script>
    <!--isotope js-->
    <script src="js/isotope.pkgd.min.js"></script>
    <!--slick js-->
    <script src="js/slick.min.js"></script>
    <!--jquery.marquee js-->
    <script src="js/jquery.marquee.min.js"></script>
    <!--animated_barfiller js-->
    <script src="js/animated_barfiller.js"></script>
    <!--sticky_sidebar js-->
    <script src="js/sticky_sidebar.js"></script>
    <!--select2 js-->
    <script src="js/select2.min.js"></script>
    <!--counter js-->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.countup.min.js"></script>
    <!--wow js-->
    <script src="js/wow.min.js"></script>
    <!--main/custom js-->
    <script src="js/main.js"></script>
</body>

</html>