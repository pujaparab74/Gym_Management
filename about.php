<?php 
session_start();
error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];

if(isset($_POST['submit']))
{ 
$pid=$_POST['pid'];


$sql="INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

$query = $dbh -> prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Package has been booked.');</script>";
echo "<script>window.location.href='booking-history.php'</script>";

}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Gym Management System</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
	<!-- Page Preloder -->
	

	<!-- Header Section -->
	<?php include 'include/header.php';?>
	<!-- Header Section end -->

	

	                                                                              
	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>About</h2>
				</div>
			</div>
		</div>
	</section>



	<!-- Pricing Section -->
	 <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <div class="about-banner has-after">
            <img src="./assets/images/about-banner.png" width="660" height="648" loading="lazy" alt="about banner"
              class="w-100">

            <img src="./assets/images/about-circle-one.png" width="660" height="534" loading="lazy" aria-hidden="true"
              alt="" class="circle circle-1">
            <img src="./assets/images/about-circle-two.png" width="660" height="534" loading="lazy" aria-hidden="true"
              alt="" class="circle circle-2">

            <img src="./assets/images/fitness.png" width="650" height="154" loading="lazy" alt="fitness"
              class="abs-img w-100">
          </div>

          <div class="about-content">

            <h2 class="h2 section-title">Welcome To Our Fitness Gym</h2>

            <p class="section-text">
				GYM management is a professional gym platform. Here we will provide you only interesting content, which your will like very much. we're dedicated to providing you the best of gym, with a focus on dependability and membership. we're working to turn our passion for gym into a booming website. We hope you enjoy our gym aa much as we enjoy offering them to you. I will keep posting more important posts on my website for all of you. Please give your support and love.
</p>
			<!--
            <div class="wrapper">

              <div class="about-coach">

                <figure class="coach-avatar">
                  <img src="./assets/images/about-coach.jpg" width="65" height="65" loading="lazy" alt="Trainer">
                </figure>

                <div>
                  <h3 class="h3 coach-name">Denis Robinson</h3>

                  <p class="coach-title">Our Coach</p>
                </div>

              </div>

              <a href="#" class="btn btn-primary">Explore More</a>

            </div>
-->

          </div>

        </div>
      </section>

	

	<!-- Footer Section -->
	<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
