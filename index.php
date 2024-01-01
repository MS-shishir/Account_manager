<?php
//ob_start();
include "inc/db.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <script src="js/switealart.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Team In Batch-3</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form action="" method="POST">
                <div class="form-group">
                  <label>Username or email *</label>
                  <input type="text" name="Email" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" name="password" class="form-control p_input">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"> Remember me </label>
                  </div>
                  <a href="forgot.php" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <div class="d-flex">
                  <button class="btn btn-facebook mr-2 col">
                    <i class="mdi mdi-facebook"></i> Facebook </button>
                  <button class="btn btn-google col">
                    <i class="mdi mdi-google-plus"></i> Google plus </button>
                </div>
                <p class="sign-up">Don't have an Account?<a href="register.php"> Sign Up</a></p>
              </form>
              <?php


              if (isset($_POST['login'])) {
                $email = mysqli_real_escape_string($conn, $_POST['Email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $hassed = sha1($password);
                $sql = "SELECT * FROM user_table WHERE Email='$email'";
                $connction = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($connction)) {
                  $_SESSION['users_id'] = $row['users_id'];
                  $_SESSION['name'] = $row['name'];
                  $_SESSION['Email'] = $row['Email'];
                  $_SESSION['password'] = $row['password'];
                   $_SESSION['user_code'] = $row['user_code'];
                  // $_SESSION['phone'] = $row['phone'];
                  $_SESSION['role'] = $row['role'];
                  $_SESSION['status'] = $row['status'];
                  $_SESSION['image'] = $row['image'];
                  // $_SESSION['join_date'] = $row['join_date'];

                  if (
                    $email == $_SESSION['Email'] && $hassed == $_SESSION['password'] && $_SESSION['status'] == 1
                  ) {
                    // header("Location:dashboard.php");
                    echo '<script>
        swal({
            title: "Successfully Login",
            text: "Welcome to the Dashboard!",
            icon: "success",
        }).then(function() {
            window.location.href = "dashboard.php";
        });
    </script>';
                  } elseif ($email = $_SESSION['Email'] && $hassed == $_SESSION['password'] && $_SESSION['status'] != 1) {
                    //header("Location:dashboard.php");
                    echo '<script>
        swal({
            title: "Diend Acsess",
            text: "Please Wait for Acsess Permission",
            icon: "info",
        }).then(function() {
            window.location.href = "index.php";
        });
    </script>';
                  }
              if ($email = $_SESSION['Email'] && $hassed != $_SESSION['password'] && $_SESSION['status'] == 1) {
                    // header("Location:dashboard.php");
                    echo '<script>
        swal({
            title: "Invalid Password",
            text: "Please enter correct Password",
            icon: "warning",
        }).then(function() {
            window.location.href = "index.php";
        });
    </script>';
                  } 
                }
              }
              ?>

            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>