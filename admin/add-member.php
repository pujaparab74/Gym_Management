<?php session_start();
error_reporting(0);
include  'include/config.php'; 
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
include  'include/config.php';
if(isset($_POST['Submit'])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $password=md5($_POST['password']);
    $repeatpassword = md5($_POST['repeatpassword']);
   

$sql="INSERT INTO tbladdmember (fname,lname,email,mobile,state,city,password,repeatpassword) 
Values(:fname,:lname,:email,:mobile,:state,:city,:password,:repeatpassword)";
$query = $dbh -> prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':repeatpassword',$repeatpassword,PDO::PARAM_STR);

$query -> execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId>0)
{
echo "<script>alert('Member Added successfully.');</script>";
echo "<script> window.location.href='add-member.php';</script>";
 }
else {

$errormsg= "Data not insert successfully";
 }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Admin | Add Member</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
   <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'include/sidebar.php'; ?>
    <main class="app-content">
      <h3> Add Member </h3>
      <hr/>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
             <!---Success Message--->  
          <?php if($msg){ ?>
          <div class="alert alert-success" role="alert">
          <strong>Well done!</strong> <?php echo htmlentities($msg);?>
          </div>
          <?php } ?>

          <!---Error Message--->
          <?php if($errormsg){ ?>
          <div class="alert alert-danger" role="alert">
          <strong>Oh snap!</strong> <?php echo htmlentities($errormsg);?></div>
          <?php } ?>
            <div class="tile-body">
              <form class="row" method="post">
                <div class="form-group col-md-6">
                  <label class="control-label">First Name</label>
                  <input class="form-control" name="fname" id="fname" type="text" placeholder="Enter your First Name">
                </div>
                 <div class="form-group col-md-6">
                  <label class="control-label">Last Name</label>
                  <input class="form-control" name="lname" id="lname" type="text" placeholder="Enter your Last Name">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Email</label>
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter your Email">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Mobile</label>
                  <input class="form-control" type="number" name="mobile" id="mobile" placeholder="Enter your Mobile">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">State</label>
                  <input class="form-control" type="text" name="state" id="state" placeholder="Enter your State">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">City</label>
                  <input class="form-control" type="text" name="city" id="city" placeholder="Enter your City">
                </div>

                 <div class="form-group col-md-6">
                  <label class="control-label">Password</label>
                  <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password">
                </div>

                 <div class="form-group col-md-6">
                  <label class="control-label">Conform Password</label>
                  <input class="form-control" type="password" name="repeatpassword" id="repeatpassword" placeholder="Enter Conform Password">
                </div>

                <!--<div class="form-group col-md-6">
                  <label class="control-label">Upload Image</label>
                  <input class="form-control" type="file" name="photo" id="photo">
                </div> -->

                <div class="form-group col-md-4 align-self-end">
                  <input type="Submit" name="Submit" id="Submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
  <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
  </body>
</html>

<!-- Script -->
 <script>
function getdistrict(val) {
$.ajax({
type: "POST",
url: "ajaxfile.php",
data:'category='+val,
success: function(data){
$("#package").html(data);
}
});
}
</script>
<?php } ?>