<nav class="sidebar sidebar-offcanvas " id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/useriamge/<?php echo $_SESSION['image'] ?>" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['name'] ?></h5>
                  <span>
                    <?php if( $_SESSION['role']==0){
                      echo "Administrator";
                    }elseif($_SESSION['role']==1){
                      echo "Edititor";
                    } else{
                      echo "Genarel";
                    }
                     ?>
                  </span>
                </div>
              </div>
            </div>
                  </li>


          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-currency-bdt"></i>
              </span>
              <span class="menu-title">Balance</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="yourbalance.php?do=Manage">Your Balance</a></li>
                <?php
                if($_SESSION['role']==0 OR $_SESSION['role']==1){?>
                <li class="nav-item"> <a class="nav-link" href="yourbalance.php?do=diposit">Deposit</a></li>
                <li class="nav-item"> <a class="nav-link" href="yourbalance.php?do=credit">Credit</a></li>
                <?php } ?>
              </ul>
            </div>
          </li>
          <?php
          if($_SESSION['role']==0){?>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
              <span class="menu-icon">
                <i class="mdi mdi-account"></i>
              </span>
              <span class="menu-title">Team Member</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="users.php?do=Manage">All Team Member</a></li>
                <li class="nav-item"> <a class="nav-link" href="users.php?do=newuser">Add Member</a></li>
              </ul>
            </div>
          </li>
          <?php } ?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="Balance_Details.php?do=Manage">
              <span class="menu-icon">
                <i class="mdi mdi-details"></i>
              </span>
              <span class="menu-title">Balance Details</span>
            </a>
          </li>
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Users</span>
            </a>
          </li> -->
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">