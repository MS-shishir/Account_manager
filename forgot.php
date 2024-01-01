<?php
include "inc/db.php";
ob_start();
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
              <h3 class="card-title text-left mb-3">Forgot Password</h3>
              <form action="" method="POST">
                <div class="form-group">
                  <label>Enter your email *</label>
                  <input type="email" name="email" class="form-control p_input">
                </div>
               
               
                <div class="text-center">
                  <button type="submit" name="forgot" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <p class="sign-up">Don't have an Account?<a href="register.php"> Sign Up</a></p>
              </form>
        <?php
        
        if (isset($_POST['forgot'])) {
          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $sql = "SELECT * FROM `user_table` WHERE Email='$email'";
          $connction = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($connction)) {
            $_SESSION['email'] = $row['Email'];
            $_SESSION['status'] = $row['status'];
            if (
              $email == $_SESSION['email'] && $_SESSION['status'] == 1
            ) {
                echo '<script>
                  swal({
                      title: "Successfully Resset",
                      text: "Enter your new password!",
                      icon: "success",
                  }).then(function() {
                      window.location.href = "password.php";
                  });
              </script>';
              //header("location:password.php");
            } else {
              header("location:forgot.php");
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
<?php ob_end_flush(); ?>
