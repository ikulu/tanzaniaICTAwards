<?php
$x = $_SESSION['USER_NAME'];
$g = "M";
if($g == 'M'){
  $g = "Mr ";
}else{
  $g = "Mrs ";
}
$true = true;
$aside = '  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../adminPages/admnHome.php" class="brand-link">
    <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Adminstrator</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../dist/img/p.jpeg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" href="#" class="d-block">'.$g. $x. '</a>
        <a href="../action.php?out_admin='.$true.'" class="d-block">Log Out</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="./admnHome.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
            Evaluation Process
            </p>
          </a>
          <ul class="nav ">
          <li class="nav-item">
          <a href="../adminPages/norminatedPerCategory.php" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p class="text">Normination</p>
          </a>
        </li>
          <li class="nav-item">
          <a href="../adminPages/confirmedNorminees.php" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p class="text">Confirmed</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../adminPages/morminees.php" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Completed/Approved</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../adminPages/announcedCompanies.php" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Announced Companies</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Tools
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="../adminPages/users.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="../adminPages/categories.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
            </ul>
          </li
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>';
?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">PROFILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../action.php" method="POST" class="mx-1 mx-md-4">
          <div class="d-flex flex-row align-items-center mb-4">
            <div class="form-outline flex-fill mb-0">
              <input type="password" name="pold" id="form3Example1c" class="form-control" required/>
              <label class="form-label" for="form3Example1c">Old Password</label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <div class="form-outline flex-fill mb-0">
              <input type="password" name="pnew" id="form3Example3c" class="form-control" required/>
              <label class="form-label" for="form3Example3c">New Password</label>
            </div>
          </div>

          <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
            <button type="submit" name="changeUserPassword" class="btn btn-primary btn-lg">Change</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        <!--li class="nav-item">
          <a href="../report/" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Reporting</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Tools
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../adminPages/awards.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Awards</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="../adminPages/awards.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
            </ul>
          </li-->