<?php session_start();
error_reporting(0);
include  'include/config.php'; 
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

$eid=$_GET['eid'];
if(isset($_POST['submit']))
{
$eqtitle = $_POST['eqtitle'];
$type = $_POST['type'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$status = $_POST['status'];
//$photo = $_POST['photo'];
//$description = $_POST['description'];
$sql="update equipment set eqtitle=:eqtitle,type=:type,quantity=:quantity,price=:price,status=:status where id=:eid";

$query = $dbh -> prepare($sql);
$query->bindParam(':eqtitle',$eqtitle,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
//$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query -> execute();
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='manage-equipment.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Form Samples - Vali Admin</title>
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

          <h3 class="tile-title">Update Equipment</h3>
          <?php
          
                   include  'include/config.php';
                  $sql="SELECT * FROM equipment where id=:eid";
                  $query= $dbh->prepare($sql);
                  $query->bindParam('eid',$eid, PDO::PARAM_STR);
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {
                  ?>
                   <div class="tile-body">
              <form class="row" method="post">
                <div class="form-group col-md-6">
                  <label class="control-label">Equipment Title</label>
                  <input class="form-control" name="eqtitle" id="eqtitle" type="text" placeholder="Enter Equipment Name" value="<?php echo $result->eqtitle;?>">
                </div>
                 <div class="form-group col-md-6">
                  <label class="control-label">Type</label>
                  <input class="form-control" name="type" id="type" type="text" placeholder="Enter type" value="<?php echo $result->type;?>">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Quantity</label>
                  <input class="form-control" name="quantity" id="quantity" type="number" placeholder="Enter Quantity" value="<?php echo $result->quantity;?>">
                </div>

                 <div class="form-group col-md-6">
                  <label class="control-label">Price</label>
                  <input class="form-control" type="number" name="price" id="price" placeholder="Price" value="<?php echo $result->price;?>">
                </div>

                  <div class="form-group col-md-6">
                  <label class="control-label">Status</label>
                  <input class="form-control" type="text" name="status" id="status" placeholder="" value="<?php echo $result->status;?>">
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
            <?php  $cnt=$cnt+1; } } ?>
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
<?php }?>