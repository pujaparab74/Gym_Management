<?php session_start();
error_reporting(0);
include  'include/config.php'; 
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{
$eqtitle = $_POST['eqtitle'];
$type = $_POST['type'];
$quantity= $_POST['quantity'];
$price= $_POST['price'];
$status = $_POST['status'];
//$photo=$_POST['photo'];

$sql="INSERT INTO equipment (eqtitle,type,quantity,price,status) 
Values(:eqtitle,:type,:quantity,:price,:status)";
$query = $dbh -> prepare($sql);
$query->bindParam(':eqtitle',$eqtitle,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
//$query->bindParam(':photo',$photo,PDO::PARAM_STR);
$query -> execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId>0)
{
echo "<script>alert('Equipment Added successfully.');</script>";
echo "<script> window.location.href='manage-equipment.php';</script>";
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
   <title>Admin | Add Equipment</title>
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
      <h3> Add Equipment </h3>
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
                  <label class="control-label">Equipment Title</label>
                  <input class="form-control" name="eqtitle" id="eqtitle" type="text" placeholder="Enter Equipment Name">
                </div>
                 <div class="form-group col-md-6">
                  <label class="control-label">Type</label>
                  <input class="form-control" name="type" id="type" type="text" placeholder="Enter type">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Quantity</label>
                  <input class="form-control" name="quantity" id="quantity" type="number" placeholder="Enter Quantity">
                </div>

                 <div class="form-group col-md-6">
                  <label class="control-label">Price</label>
                  <input class="form-control" type="number" name="price" id="price" placeholder="Price">
                </div>

                  <div class="form-group col-md-6">
                  <label class="control-label">Status</label>
                  <input class="form-control" type="text" name="status" id="status" placeholder="">
          </div>

              <!--  <div class="form-group col-md-6">
                  <label class="control-label">Upload Image</label>
                  <input class="form-control" type="file" name="photo" id="photo">
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