<?php session_start();
error_reporting(0);
include  'include/config.php'; 
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive">
  
    <title>Admin | Manage Trainer </title>
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
            <div class="tile-body">
               <h3>Manage Trainer</h3>
              <hr />
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Mobile</th>
                    <th>Type</th>
                    <th>Experience</th>
                    <th>Salary</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
              
                   <?php
                   
                   include  'include/config.php';
                  $sql="SELECT * FROM trainer";
                    /*join tblcategory as t2
                    on t1.category=t2.id
                    join tblpackage as t3
                    on t1.PackageType=t3.id";*/
                    
                  $query= $dbh->prepare($sql);
  
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {

                    //Delete Record Data

if(isset($_REQUEST['del']))
{
$tid=intval($_GET['del']);
$sql = "delete from trainer WHERE  id=:id";
$query = $dbh->prepare($sql);
$query-> bindParam(':id',$tid, PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Record Delete successfully');</script>";
echo "<script>window.location.href='manage-trainer.php'</script>";
}
                  ?>
            
                <tbody>
                  <tr>
                    <td><?php echo($cnt);?></td>
                    <td><?php echo htmlentities($result->fname);?></th>
                  <td><?php echo htmlentities($result->email);?></td>
                  <td><?php echo htmlentities($result->age);?></td>
                  <td><?php echo htmlentities($result->mobile);?></td>
                  <td><?php echo htmlentities($result->type);?></td>
                  <td><?php echo htmlentities($result->experience);?></td>
                  <td><?php echo htmlentities($result->salary);?></td>
                  <?php $id=$result->email;?>
                  <td>

                   <a href="edit-trainer.php?tid=<?php echo htmlentities($result->id);?>"><span class="btn btn-success">Edit</span>
                   
                   <a href="manage-trainer.php?del=<?php echo htmlentities($result->id);?>"><span class="btn btn-danger" >Delete</span></td>
                  </tr>

                  <?php  $cnt=$cnt+1; } } ?>
                 
                </tbody>
                
     <!--    // end modal popup code........ -->
              </table>
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
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
   
  </body>
</html>
<?php } ?>