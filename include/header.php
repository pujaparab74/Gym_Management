	
	<header class="header-section">
		<div class="header-top">
			<div class="row m-0">

				<div class="col-md-6 d-none d-md-block p-0">
					
					
					<!-- <div class="header-info">
						<i class="material-icons">map</i>
						<p>184 Main Collins Street</p>
					</div>
					<div class="header-info">
						<i class="material-icons">phone</i>
						<p>(965) 436 3274</p>
					</div> -->
				</div>

				<div class="col-md-12 text-left text-md-right p-0">
                 <?php if(strlen($_SESSION['uid'])==0): ?>
					<div class="header-info d-none d-md-inline-flex">
						<i class="material-icons">account_circle</i>
						<a href="login.php"><p>Login</p></a>
					</div>
					<?php else :?>

					
					<div class="header-info d-none d-md-inline-flex">
						<i class="material-icons">account_circle</i>
						<a href="profile.php"><p>My Profile</p></a>
					</div>
					<div class="header-info d-none d-md-inline-flex">
						<i class="material-icons">brightness_7</i>
						<a href="changepassword.php"><p>Change Password</p></a>
					</div>
					<div class="header-info d-none d-md-inline-flex">
						<i class="material-icons">logout</i>
						<a href="logout.php"><p>Logout</p></a>
					</div>

					<div class="header-info d-none d-md-inline-flex">
	
					<?php 
			session_start();
			error_reporting(0);
			require_once('include/config.php');
			if(strlen( $_SESSION["uid"])==0)
				{   
			header('location:login.php');
			}
			else{
			$uid=$_SESSION['uid'];	}	
									
$sql ="SELECT id,fname from tbluser where id='$uid'";
$query= $dbh -> prepare($sql);
$query-> execute();
$results = $query ->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
foreach($results as $result)
								
?>

<i class="fa fa-user fa-lg">Welcome :<?php echo $result->fname;?></i>
					</div>
	
	  <!-- User Menu-->
 
					
											<?php endif;?>
				</div>
			</div>
		</div>
		<div class="header-bottom">
		<a href="index.php" class="site-logo" style="color:#fff; font-weight:bold; font-size:35px;font-family:Niconne">
				<ion-icon name="barbell-sharp" aria-hidden="true"></ion-icon>
				FitLife<br />
			</a>

			<div class="container">
				<ul class="main-menu">
					<li><a href="index.php" class="active">Home</a></li>
					<li><a href="package.php">Packages</a></li>
					<li><a href="bmi.php">BMI Calculator</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="feedbacks.php">ContactUs</a></li>
					
					<?php if(strlen($_SESSION['uid'])==0): ?>
			<li><a href="admin/">Admin</a></li>
					<?php else :?>
						<li><a href="booking-history.php">Booking History</a></li>
						<?php endif;?>
				</ul>
			</div>

		</div>
	</header>