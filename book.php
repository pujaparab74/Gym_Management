<?php 
session_start();
error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];

if(isset($_POST['submit']))
{ 
$packid=$_POST['packid'];


$sql="INSERT INTO tblbooking (package_id,userid) Values(:packid,:uid)";

$query = $dbh -> prepare($sql);
$query->bindParam(':packid',$packid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Package has been booked.');</script>";
echo "<script>window.location.href='booking-history.php'</script>";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Package Details</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <div class="booking-form">
            <h2>Package Details</h2>
            <?php $packid =$_GET['packageid'];
                   $sql="SELECT t1.id as packageid ,t2.*,t3.*,t1.* FROM tbladdpackage as t1
                   join tblcategory as t2
                   on t1.category=t2.id
                   join tblpackage as t3
                   on t1.PackageType=t3.id
                   where t1.id=:packid";
                  $query= $dbh->prepare($sql);
                  $query-> bindParam(':packid',$packid, PDO::PARAM_STR);
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {
                
                  ?>
            <form action="book.php" method="post">

            <!--<label for="return-date">Booking Date</label>
                <input type="text" name="create_date" id="create_date" value="<?php echo $result->create_date;?>" readonly>-->

                <label for="email">Category</label>
                <input type="text" name="category_name" id="category_name" value="<?php echo $result->category_name;?>" readonly>
           
                <label for="destination">Package Name</label>
                <input type="text" name="PackageName" id="PackageName" value="<?php echo $result->PackageName;?>" readonly>
           
                <label for="departure-date">Title</label>
                <input type="text" name="titlename" id="titlename" value="<?php echo $result->titlename;?>" readonly >
               
                <label for="return-date">PackageDuratiobn</label>
                <input type="text" name="PackageDuratiobn" id="PackageDuratiobn" value="<?php echo $result->PackageDuratiobn;?>" readonly>

                <label for="return-date">Price</label>
                <input type="text" name="Price" id="Price" value="<?php echo $result->Price;?>" readonly>

                <label for="return-date">Trainer Type</label>
                <input type="text" name="type" id="type" value="<?php echo $result->type;?>" readonly>

                <label for="return-date">Description</label>
                <textarea name="Description" id="Description" cols="4" rows="4" readonly><?php echo $result->Description?></textarea>

                
                    
                
                <?php  $cnt=$cnt+1; } } ?>
                
                    
                <input type='hidden' name='packid' value='<?php echo htmlentities($result->id);?>'>
                <button type="submit" name="submit" value='Booking Now' onclick="return confirm('Do you really want to book this package.');">Book Now</button>
            
              
            </form>

        </div>
    </div>
</body>
</html