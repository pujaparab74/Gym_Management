 <header class="app-header"><a class="app-header__logo" href="index.php">FitLife</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
      
       
        <!-- User Menu-->
   <?php      
$sql ="SELECT name from tbladmin";
$query= $dbh -> prepare($sql);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
foreach($results as $result)

?>

        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">Welcome :<?php echo $result->name;?> <i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="change-password.php"><i class="fa fa-cog fa-lg"></i> Change Password</a></li>
            <li><a class="dropdown-item" href="profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>