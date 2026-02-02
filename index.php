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
 <!-- 
        - #HERO
      -->
	  <section class="section hero bg-dark has-after has-bg-image" id="home" aria-label="hero" data-section
        style="background-image: url('./assets/images/hero-bg.png')">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">
              <strong class="strong">The Best</strong>Fitness Club
            </p>

            <h1 class="h1 hero-title">Work Hard To Get Better Life</h1>
            

          </div>

          <div class="hero-banner">

            <img src="./assets/images/hero-banner.png" width="660" height="753" alt="hero banner" class="w-100">

            <img src="./assets/images/hero-circle-one.png" width="666" height="666" aria-hidden="true" alt=""
              class="circle circle-1">
            <img src="./assets/images/hero-circle-two.png" width="666" height="666" aria-hidden="true" alt=""
              class="circle circle-2">

            <img src="./assets/images/heart-rate.svg" width="255" height="270" alt="heart rate"
              class="abs-img abs-img-1">
            <img src="./assets/images/calories.svg" width="348" height="224" alt="calories" class="abs-img abs-img-2">
          </div>
        </div>
      </section>
      
	<!-- Pricing Section -->
	<section class="pricing-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h2>Pricing plans</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			<div class="row">
				        <?php 
$packageid=$_GET['packageid'];

$sql =  $sql="SELECT t1.id as packageid,t2.*,t3.*,t1.* FROM tbladdpackage as t1
join tblcategory as t2
on t1.category=t2.id
join tblpackage as t3
on t1.PackageType=t3.id";//"SELECT id, category, titlename, PackageType, PackageDuratiobn, Price,type, Description, create_date from tbladdpackage";
$query= $dbh -> prepare($sql);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
				<div class="col-lg-3 col-sm-6">
					<div class="pricing-item begginer">
						<div class="pi-top">
							<h4><?php echo $result->titlename;?></h4>
						</div>
						<div class="pi-price">
							<h3><?php echo htmlentities($result->Price);?></h3>
							<p>	<?php echo $result->PackageDuratiobn;?></p>
						</div>
						<ul>
            
							<?php echo $result->Description;?>
							
						</ul>
						<?php if(strlen($_SESSION['uid'])==0): ?>
						<a href="login.php" class="site-btn sb-line-gradient">Booking Now</a>
						<?php else :?>
							<!-- <a href="#" class="site-btn sb-line-gradient">Booking Now</a> -->
							 <form method='post'>
                            <input type='hidden' name='packageid' value='<?php echo htmlentities($result->packageid);?>'>
                        <a href ="book.php?packageid=<?php echo htmlentities($result->packageid);?>"><span class="site-btn sb-line-gradient">Booking Now</span></a> 
                        <!--<input class='site-btn sb-line-gradient' type='submit' name='submit' value='Booking Now' onclick="return confirm('Do you really want to book this package.');">--> 
                       
                      </form> 
							 <?php endif;?>
					</div>
				</div>
				<?php  $cnt=$cnt+1; } } ?>
			</div>
		</div>
	</section>


	 <!-- 
        - #CLASS
      -->

      <section class="section class bg-dark has-bg-image" id="class" aria-label="class"
        style="background-image: url('./assets/images/classes-bg.png')">
        <div class="container">

          <p class="section-subtitle">Our Classes</p>

          <h3 class="h2 section-title text-center">Fitness Classes For Every Goal</h3>

          <ul class="class-list has-scrollbar">

            <li class="scrollbar-item">
              <div class="class-card">

                <figure class="card-banner img-holder" style="--width:416; --height: 240;">
                  <img src="./assets/images/class-1.jpg" width="416" height="240" loading="lazy" alt="Weight Lifting"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="title-wrapper">
                    <img src="./assets/images/class-icon-1.png" width="52" height="52" aria-hidden="true" alt=""
                      class="title-icon">

                    <h3 class="h3">
                      <a href="#" class="card-title">Weight Lifting</a>
                    </h3>
                  </div>

                  <p class="card-text">
                  It develops good strength endurance and balance.
                  </p>
                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="class-card">

                <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                  <img src="./assets/images/class-2.jpg" width="416" height="240" loading="lazy" alt="Cardio & Strenght"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="title-wrapper">
                    <img src="./assets/images/class-icon-2.png" width="52" height="52" aria-hidden="true" alt=""
                      class="title-icon">

                    <h3 class="h3">
                      <a href="#" class="card-title">Cardio & Strenght</a>
                    </h3>
                  </div>

                  <p class="card-text">
                  Cardio will improve your muscle endurance, while weights will increase your strength.
                  </p>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="class-card">

                <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                  <img src="./assets/images/class-3.jpg" width="416" height="240" loading="lazy" alt="Power Yoga"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="title-wrapper">
                    <img src="./assets/images/class-icon-3.png" width="52" height="52" aria-hidden="true" alt=""
                      class="title-icon">

                    <h3 class="h3">
                      <a href="#" class="card-title">Power Yoga</a>
                    </h3>
                  </div>

                  <p class="card-text">
                  Relieves stress,reduces levels of stress hormones in your body.
						</p>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="class-card">

                <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                  <img src="./assets/images/class-4.jpg" width="416" height="240" loading="lazy" alt="The Fitness Pack"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="title-wrapper">
                    <img src="./assets/images/class-icon-4.png" width="52" height="52" aria-hidden="true" alt=""
                      class="title-icon">

                    <h3 class="h3">
                      <a href="#" class="card-title">The Fitness Pack</a>
                    </h3>
                  </div>

                  <p class="card-text">
                  The Fitness pack is curated especially curated as ayurvedic medicine for muscle strength and immunity.
            </p>
                </div>

              </div>
            </li>

          </ul>

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
