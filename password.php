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
              <h3 class="card-title text-left mb-3">Change Password</h3>
              </form>
              <?php
              //  if($do=='edit'){

              if (isset($_SESSION['email'])) {
                $update_info = $_SESSION['email'];

                $sql_update = "SELECT* FROM `user_table` WHERE Email='$update_info'";
                $edit = mysqli_query($conn, $sql_update);
                while ($row = mysqli_fetch_assoc($edit)) {
                  $password = $row['password'];
                  $status = $row['status'];
                }
              }

              ?>
              <form action="" method="POST">
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" name="user_pass" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Re-Password *</label>
                  <input type="password" name="user_repass" class="form-control p_input">
                </div>
                
                <div class="text-center">
                  <button type="submit" name="Updated" class="btn btn-primary btn-block enter-btn">Change Password</button>
                </div>
                
                <p class="sign-up">Don't have an Account?<a href="index.php">Back Home</a></p>


                <?php
                if (isset($_POST['Updated'])) {
                  // $user_name = $_POST['user_name'];
                  // $user_mail = $_POST['user_mail'];
                  $user_pass = sha1($_POST['user_pass']);

                  $user_repass = sha1($_POST['user_repass']);
                  if ($user_pass == $user_repass) {

                    $update_sql = "UPDATE `user_table` SET password='$user_pass' WHERE Email='$update_info'";

                    $Update_entry = mysqli_query($conn, $update_sql);

                    if ($Update_entry) {
                      echo '<script>
                  swal({
                      title: "Your password is change",
                      text: "Login your Dashboard!",
                      icon: "success",
                  }).then(function() {
                      window.location.href = "index.php";
                  });
              </script>';
                      // header("Location:index.php");
                    } elseif ($user_pass != $user_repass) {
                      echo '<script>
                  swal({
                      title: "Wrong password",
                      text: "Confurm password invalid!",
                      icon: "success",
                  }).then(function() {
                      window.location.href = "password.php";
                  });
              </script>';
                    } else {
                      die("Mysqli Error" . mysqli_error($conn));
                    }
                  }
                }

                ?>
                
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
        <!-- /.login-box -->
        
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
<?php ob_end_flush(); ?>