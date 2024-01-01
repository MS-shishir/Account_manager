<!-- DB start -->
<?php
include "inc/db.php"
?>
<!-- DB end -->

<!-- Header start -->
<?php
include "inc/header.php"
?>
<!-- Header end -->

<!-- partial:partials/_sidebar.html -->
<?php
include "inc/sidebar.php"
?>
<!-- partial -->

<!-- partial:partials/_navbar.html -->
<?php
include "inc/navbar.php"
?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <?php
                  $sql = "SELECT * FROM user_table";
                  if ($result = mysqli_query($conn, $sql)) {
                    $rowcount = mysqli_num_rows($result);
                  ?>
                    <h3 class="mb-0"><span class="mdi mdi-account-heart text-success "></span>  <?php echo $rowcount ?></h3>
                  <?php
                  }
                  ?>
                  <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            
            <h6 class="text-muted font-weight-normal">Total Member</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <?php
                  $sql = "SELECT * FROM `user_table` WHERE status='0'";
                  if ($result = mysqli_query($conn, $sql)) {
                    $rowcount = mysqli_num_rows($result);
                  ?>

                    <h3 class="mb-0"><span class="mdi mdi-account-alert" style="color:#ffab00"></span> <?php echo $rowcount ?></h3>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Request Member</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">$12.34</h3>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-danger">
                  <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Daily Income</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">$31.53</h3>
                  <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Expense current</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Total Amount</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                 <?php
                  $sql = "SELECT SUM(amount) as total FROM `user_balance`"; // Using alias to give the result a name
                  $dbcke = mysqli_query($conn, $sql);

                  if ($dbcke) {
                    $row = mysqli_fetch_assoc($dbcke); // Fetch the result
                    $totalCount = $row['total'];
                    
                  ?>
                    <h2 class="mb-0"><i class="mdi mdi-currency-bdt" style="color: #fc424a;"></i><?php echo $totalCount;?></h2>
                  <?php
                  } else {
                    // Handle the query error here
                    echo "Error: " . mysqli_error($conn);
                  }
                 
                  ?>
                 
                </div>
                <h6 class="text-muted font-weight-normal">Total Amount</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Expenditure</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                <?php
                  $sql = "SELECT SUM(amount) AS amountall FROM `credit_teble`"; // Using alias to give the result a name
                  $uscke = mysqli_query($conn, $sql);

                  if ($uscke) {
                    $row = mysqli_fetch_assoc($uscke); // Fetch the result
                    $allcredit = $row['amountall'];
                    
                  ?>
                    <h2 class="mb-0"><i class="mdi mdi-currency-bdt" style="color: #fc424a;"></i><?php echo $allcredit;?></h2>
                  <?php
                  } else {
                    // Handle the query error here
                    echo "Error: " . mysqli_error($conn);
                  }
                 
                  ?>
                  <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p> -->
                </div>
                <h6 class="text-muted font-weight-normal">All Expenditure</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-wallet-travel text-info ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Purchase</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">$2039</h2>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
                </div>
                <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <div id="audience-map" class="vector-map"></div>
      </div>
      <div class="col-md-12 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">To do list</h4>
            <div class="add-items d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="enter task..">
              <button class="add btn btn-primary todo-list-add-btn">Add</button>
            </div>
            <div class="list-wrapper">
              <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Create invoice </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Meeting with Alita </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li class="completed">
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Plan weekend outing </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include "inc/footer.php"
  ?>