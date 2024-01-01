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
    <di class="content-wrapper">
        <?php
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
        if ($do == "newuser") {
        ?>
            <div class="col-md-8 grid-margin stretch-card offset-sm-2 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Team In Batch-3</h4>
                        <p class="card-description"> Add New Member </p>
                        <form class="forms-sample" action="users.php?do=insert" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail2" placeholder="Name">
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail2" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">User_code</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ucode" class="form-control" id="exampleInputEmail2" placeholder="User_code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role">
                                        <option>select Role</option>
                                        <option value="0">Admin</option>
                                        <option value="1">Editior</option>
                                        <option value="2">Genarel</option>

                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status">
                                        <option>select status</option>
                                        <option value="1">Aprove</option>
                                        <option value="0">Panding</option>

                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Profile uplode</label>
                                <div class="col-sm-9">
                                    <input type="file" name="profile" class="fileuplode" placeholder="Profile iamge">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            <?php } elseif ($do == "insert") {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // isset($_POST['submit']
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = sha1($_POST["password"]);
                $ucode = $_POST["ucode"];
                $role = $_POST["role"];
                $status = $_POST["status"];
                // $post_date = $_POST["post_date"];

                $imagename = $_FILES['profile']['name'];
                $imageSize = $_FILES['profile']['size'];
                $imageTmp = $_FILES['profile']['tmp_name'];
                $exploded = explode('.', $_FILES['profile']['name']);
                $lastElement = end($exploded);
                $imageExtention = strtolower($lastElement);
                $imageAllowExtantion = array('jpg', 'jpeg', 'png');
                $fromerror = array();
                // if(strlen($name)<3){
                //   $fromerror="plase enter name 4 character";
                //   echo $fromerror;
            ?>

            <?php
            }
            if (!empty($imagename)) {
                if (!empty($imagename) && !in_array($imageExtention, $imageAllowExtantion)) {
                    $fromerror = "Invlid Image";
                }
                if (!empty($imageSize) && $imageSize > 2097152) {
                    $fromerror = "Invlid Image size. Allow size 2 MB";
                }
            }
            if (empty($fromerror)) {
                $image = rand(0, 999999) . '_' . $imagename;
                move_uploaded_file($imageTmp, "assets/useriamge\\" . $image);


                $sql = "INSERT INTO  `user_table` (`image`, `name`, `Email`,`password`,`user_code`,`role`,`status`) VALUES ('$image','$name','$email','$password','$ucode','$role','$status')";
                if ($conn->query($sql) === TRUE) {
                    header("Location:users.php?do=Manage");
                } else {
                    die("Error" . mysqli_error($conn));
                }
            }
        }
        if ($do == 'Manage') {
            ?>
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Our Team Member</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th> Member Name </th>
                                            <th> Email </th>
                                            <th> Role </th>
                                            <th> Status </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT* FROM user_table ORDER BY users_id";
                                        $result = mysqli_query($conn, $sql);
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $users_id = $row["users_id"];
                                            $name = $row["name"];
                                            $email = $row["Email"];
                                            $role = $row["role"];
                                            $status = $row["status"];
                                            $image = $row["image"];
                                            $i++;
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td>

                                                    <img src="assets/useriamge/<?php echo $image ?>" alt="image" />
                                                    <span class="pl-2"><?php echo $name ?></span>
                                                </td>
                                                <td> <?php echo $email ?> </td>
                                                <td>
                                                    <?php
                                                    $Administrator = 0;
                                                    $editor = 1;
                                                    $genarel = 2;
                                                    if ($role == $Administrator) { ?>
                                                        <p class="badge badge-outline-success">Administrator</p>

                                                    <?php }
                                                    if ($role == $editor) { ?>
                                                        <p class="badge badge-outline-info">Editor</p>

                                                    <?php }
                                                    if ($role == $genarel) { ?>

                                                        <p class="badge badge-outline-warning">Genarel</p>
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <?php $stat = 1;
                                                    if ($status == $stat) { ?>
                                                        <div class="badge badge-outline-success">Approved</div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="badge badge-outline-warning">Pending</div>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                                <td>
                                                    <?php if ($role == 0) {
                                                    ?>
                                                        <div class="badge badge-outline-success">Admin</div>
                                                    <?php

                                                    } else { ?>
                                                    <a href="users.php?do=edit&update=<?php echo $users_id ?>"> <button type="button" class="btn btn-outline-info  btn-icon-text"> Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                                                     </button></a>
                                                       <a href="users.php?do=Delete&delete=<?php echo $users_id; ?>"><button type="button" class="btn btn-outline-danger btn-icon-text"> Delete <i class="mdi mdi-delete btn-icon-append"></i>
                                                        </button></a>
                                                        
                                                </td>

                                            <?php } ?>

                                            </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        if ($do == 'edit') {
            ?>
      
              <!-- Update modal -->
              <?php
              //  if($do=='edit'){
      
              if (isset($_GET['update'])) {
                $update_info = $_GET['update'];
                $sql_update = "SELECT* FROM  `user_table` WHERE users_id='$update_info'";
                $edit = mysqli_query($conn, $sql_update);
                while ($row = mysqli_fetch_assoc($edit)) {
                    $name = $row["name"];
                    $email = $row["Email"];
                   // $password = $row["password"];
                    $role = $row["role"];
                    $status = $row["status"];
                    $image = $row["image"];
                  // $post_date = $row['post_date'];
                }
              }
              ?>
           
           <div class="col-md-8 grid-margin stretch-card offset-sm-2 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Team In Batch-3</h4>
                        <p class="card-description"> Add New Member </p>
                        <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?php echo $name ?>" name="nameup" class="form-control" id="exampleInputEmail2" placeholder="Name">
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" value="<?php echo $email ?>" name="emailup" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" value="<?php //echo $password ?>" name="passwordup" class="form-control" id="exampleInputEmail2" placeholder="Password">
                                </div>
                            </div> -->

                            <!-- <div class="form-group row">
                                <label class="col-sm-3 col-form-label">User_code</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?php // echo $name ?>" name="ucodeup" class="form-control" id="exampleInputEmail2" placeholder="User_code">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="form-control"  name="roleup">
                                        <option><?php echo $role ?></option>
                                        <option value="0">Admin</option>
                                        <option value="1">Editior</option>
                                        <option value="2">Genarel</option>

                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="statusup">
                                        <option><?php echo $status ?></option>
                                        <option value="1">Aprove</option>
                                        <option value="0">Panding</option>

                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Profile uplode</label>
                                <div class="col-sm-9">
                                    <input type="file" value="<?php echo $image ?>" name="profileup" class="fileuplode" placeholder="Profile iamge">
                                </div>
                            </div>
                            <button type="submit" name="Updated" class="btn btn-primary mr-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
      
                <!-- modal -->
              <?php
              if (isset($_POST['Updated'])) {
                $nameup = $_POST["nameup"];
                $emailup = $_POST["emailup"];
                //$password = sha1($_POST["password"]);
                //$ucode = $_POST["ucode"];
                $roleup = $_POST["roleup"];
                $statusup = $_POST["statusup"];
                // $post_date = $_POST['post_date'];
      
                $imagename = $_FILES['profileup']['name'];
                $imageSize = $_FILES['profileup']['size'];
                $imageTmp = $_FILES['profileup']['tmp_name'];
                $exploded = explode('.', $_FILES['profileup']['name']);
                $lastElement = end($exploded);
                $imageExtention = strtolower($lastElement);
                $imageAllowExtantion = array('jpg', 'jpeg', 'png');
                $fromerror = array();
      
                if (!empty($imagename)) {
                  if (!empty($imagename) && !in_array($imageExtention, $imageAllowExtantion)) {
                    $fromerror = "Invlid Image";
                  }
                  if (!empty($imageSize) && $imageSize > 2097152) {
                    $fromerror = "Invlid Image size. Allow size 2 MB";
                  }
                }
                if (!empty($fromerror)) {
                  header("Location:post.php?do=newuser");
                  exit();
                }
                if (empty($fromerror)) {
                  $deleteImageSQL = "SELECT * FROM `user_table` WHERE users_id='$update_info'";
                  $data = mysqli_query($conn, $deleteImageSQL);
                  while ($row = mysqli_fetch_assoc($data)) {
                    $existingImage = $row['image'];
                    unlink('assets/useriamge/' . $existingImage);
                  }
      
                  $image = rand(0, 999999) . '_' . $imagename;
                  move_uploaded_file($imageTmp, "assets/useriamge\\" . $image);
                  // data update
      
                  $update_sql = "UPDATE  `user_table` SET image='$image', name='$nameup',Email='$emailup',role='$roleup',status='$statusup' WHERE users_id='$update_info'";
      
                  $Update_entry = mysqli_query($conn, $update_sql);
      
                  if ($Update_entry) {
                    header("Location:users.php?do=Manage");
                  } else {
                    die("Mysqli Error" . mysqli_error($conn));
                  }
                }
              }
            }
            else if ($do == 'Delete') {
                if (isset($_GET['delete'])) {
                  $deleteid = $_GET['delete'];
        
                  // Retrieve existing image name before deleting
                  $getImageQuery = "SELECT image FROM user_table WHERE users_id='$deleteid'";
                  $getImageResult = mysqli_query($conn, $getImageQuery);
        
                  if ($getImageResult) {
                    $row = mysqli_fetch_assoc($getImageResult);
                    $existingImage = $row['image'];
                    unlink('assets/useriamge/' . $existingImage); // Delete the image file
                  } else {
                    die("Mysqli Error" . mysqli_error($conn));
                  }
        
                  // Delete the record from the database
                  $deleteQuery = "DELETE FROM user_table WHERE users_id='$deleteid'";
                  $deleteResult = mysqli_query($conn, $deleteQuery);
        
                  if ($deleteResult) {
                    header("location:users.php?do=Manage");
                  } else {
                    die("Mysqli Error" . mysqli_error($conn));
                  }
                }
              }
            ?>



<?php
include "inc/footer.php"
?>