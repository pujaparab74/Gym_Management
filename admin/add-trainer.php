<?php session_start();
error_reporting(0);
include  'include/config.php'; 
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
    
if(isset($_POST['submit']))
{
$fname = $_POST['fname'];
$email= $_POST['email'];
$age = $_POST['age'];
$mobile = $_POST['mobile'];
$type=$_POST['type'];
$experience = $_POST['experience'];
$salary=$_POST['salary'];


$sql="INSERT INTO trainer (fname,email,age,mobile,type,experience,salary) Values(:fname,:email,:age,:mobile,:type,:experience,:salary)";
$query = $dbh -> prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':experience',$experience,PDO::PARAM_STR);
$query->bindParam(':salary',$salary,PDO::PARAM_STR);
$query -> execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId>0)
{
  //$msg="Trainer Add Successfully";
echo "<script>alert('Trainer Added successfully.');</script>";
echo "<script> window.location.href='manage-trainer.php'</script>";
 }
else {

$errormsg= "Data not insert successfully";
 }
}
}
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Admin | Add Trainer</title>
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
      <h3> Add Trainer </h3>
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

              <form class="row" method="post">

                <div class="form-group col-md-6">
                  <label class="control-label">Full Name</label>
                  <input class="form-control" name="fname" id="fname" type="text" placeholder="Enter your Full Name">
                </div>
            
                <div class="form-group col-md-6">
                  <label class="control-label">Email</label>
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter your Email">
                </div>
                
                 <div class="form-group col-md-6">
                  <label class="control-label">Age</label>
                  <input class="form-control" type="number" name="age" id="age" placeholder="Enter your Age">
                </div>

                  <div class="form-group col-md-6">
                  <label class="control-label">Mobile</label>
                  <input class="form-control" type="number" name="mobile" id="mobile" placeholder="Enter your Mobile">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Trainer Type</label>
                  
                  <input class="form-control" type="text" name="type" id="type" placeholder="Trainer Type">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Experience(In year)</label>
                  <input class="form-control" type="text" name="experience" id="experience" placeholder="Enter Experience">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Salary</label>
                  <input class="form-control" type="number" name="salary" id="salary" placeholder="Enter Salary">
                </div>
<!--
                <div class="form-group col-md-6">
                  <label class="control-label">Upload Image</label>
                  <input class="form-control" type="file" name="compfile" id="compfile">
                </div> 
          -->
                <div class="form-group col-md-4 align-self-end">
                  <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
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
<!--
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
-->
<?php ?>