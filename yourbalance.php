<!-- DB start -->
<?php
include "inc/db.php";

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
        if ($do == "diposit") {
        ?>
            <div class="col-md-8 grid-margin stretch-card offset-sm-2 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Team In Batch-3</h4>
                        <p class="card-description"> Add New Diposit</p>
                        <form class="forms-sample" action="yourbalance.php?do=insert" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Users Code</label>
                                <div class="col-sm-9">

                                    <select class="form-control" name="user_code">
                                        <option value="">Select User code</option>
                                        <?php
                                        $sql = "SELECT* FROM `user_table`
                        ";
                                        $all_user = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($all_user)) {
                                            $user_code = $row['user_code'];
                                        ?>
                                            <option value="<?php echo $user_code ?>">
                                                <?php echo $user_code ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea type="text" name="user_desc" class="form-control" id="exampleInputUsername2" placeholder="Description" row="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="number" name="amount" class="form-control" id="exampleInputEmail2" placeholder="Amount">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mounth</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="mounth">
                                        <option>Select Mounth</option>
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>
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
                $user_code = $_POST["user_code"];
                $user_desc = $_POST["user_desc"];
                $amount = $_POST["amount"];
                $mounth = $_POST["mounth"];
                $sql = "INSERT INTO `user_balance` (`description`, `amount`, `mounth`,`user_code`,`date`) VALUES ('$user_desc','$amount','$mounth','$user_code',now())";
                if ($conn->query($sql) === TRUE) {
                    header("Location:yourbalance.php?do=Manage");
                } else {
                    die("Error" . mysqli_error($conn));
                }
            }
        }
        if ($do == 'Manage') {
        ?>
            <div class="row">
                <?php
                $sql = "SELECT * FROM `user_table` ORDER BY users_id ASC";
                $all_posts = mysqli_query($conn, $sql);
                $i = 0;
                while ($row = mysqli_fetch_assoc($all_posts)) {
                    $users_id = $row['users_id'];
                    $name = $row['name'];
                    $image = $row['image'];
                    $user_code = $row['user_code'];
                    $role=$row['role'];
                    $status = $row['status'];
                    $i++;
                    if ($status == 1) {
                      
                ?>
                        <div class="col-md-6 col-xl-3 grid-margin stretch-card">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex py-4">
                                        <div class="preview-list w-100">
                                            <div class="preview-item p-0">
                                                <div class="preview-thumbnail">
                                                    <img src="assets/useriamge/<?php echo $image ?>" class="rounded-circle" alt="">
                                                </div>
                                                <div class="preview-item-content d-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                            <h6 class="preview-subject"><?php echo $name ?></h6>
                                                        </div>
                                                        <p class="text-muted">Active member</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted">Chake your diposit amount.</p>
                                    <a href="yourbalance.php?do=tabile&result=<?php echo $user_code ?>"> <button type="button" class="btn btn-info btn-fw">See more..</button></a>

                                </div>
                            </div>
                        </div>

                <?php }
                
                } ?>
            </div>
        <?php
        }
        if ($do == 'tabile') {
        ?>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if (isset($_GET['result'])) {
                                $tbname = $_GET['result'];
                                $user_select = "SELECT* FROM user_table WHERE user_code='$tbname'";
                                $user_conn = mysqli_query($conn, $user_select);
                                while ($row = mysqli_fetch_assoc($user_conn)) {
                                    $user_name = $row['name'];
                            ?>
                                    <h4 class="card-title"><?php echo $user_name ?></h4>
                            <?php
                                }
                            }
                            ?>

                            <p class="card-description"> Balance<code>.table</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Mounth</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        //   if (isset($_GET['update'])) {
                                        //     $update_info = $_GET['update'];
                                        //     $sql_update = "SELECT* FROM post WHERE post_id='$update_info'";
                                        //     $edit = mysqli_query($conn, $sql_update);
                                        //     while ($row = mysqli_fetch_assoc($edit)) {
                                        //       $ill = $row['post_id'];
                                        //       $title = $row['title'];
                                        //       $description = $row['description'];
                                        //       $image = $row['image'];
                                        //       $category_id = $row['category_type'];
                                        //       $status = $row['status'];
                                        //       $author_id = $row['author_name'];
                                        //       $tag = $row['tag'];
                                        //       // $post_date = $row['post_date'];
                                        //     }
                                        //   }




                                        if (isset($_GET['result'])) {
                                            $result = $_GET['result'];
                                            $B_id = "";
                                            //$sql = "SELECT * FROM user_balance WHERE user_code IN (echo $result)";
                                            $sql = "SELECT* FROM user_balance  WHERE user_code IN ('$result') ";
                                            $sqlconn = mysqli_query($conn, $sql);
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($sqlconn)) {
                                                //   $bid  = $row["B_id "];
                                                $description = $row["description"];
                                                $amount = $row["amount"];
                                                $mounth = $row["mounth"];
                                                $user_code = $row["user_code"];
                                                $date = $row["date"];

                                                // $post_id = $row["id"];
                                                $i++;
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td>
                                                        <i class="mdi mdi-currency-bdt" style="font-size: 15px; color:#fc424a;"></i>
                                                        <?php echo $amount ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $description ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mounth ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $date ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
                                    }

                                    if ($do == "credit") {
        ?>
        <div class="col-md-8 grid-margin stretch-card offset-sm-2 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Team In Batch-3</h4>
                    <p class="card-description"> Credit your balance</p>
                    <form class="forms-sample" action="yourbalance.php?do=insert_credit" method="POST">

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="credit_desc" class="form-control" id="exampleInputUsername2" placeholder="Description" row="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="number" name="credit_amount" class="form-control" id="exampleInputEmail2" placeholder="Amount">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mounth</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="credit_mounth">
                                    <option>Select Mounth</option>
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                            </div>

                        </div>
                        <button type="submit" name="cr_sub" class="btn btn-primary mr-2">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    <?php } elseif ($do == "insert_credit") {
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            $user_descrip = $_POST["credit_desc"];
                                            $amount_no = $_POST["credit_amount"];
                                            $mounth_nam = $_POST["credit_mounth"];
                                            $sql = "INSERT INTO `credit_teble` (`description`, `amount`, `mounth`,`cr_date`) VALUES ('$user_descrip','$amount_no','$mounth_nam',now())";
                                            if ($conn->query($sql) === TRUE) {
                                                header("Location:dashboard.php");
                                            } else {
                                                die("Error" . mysqli_error($conn));
                                            }
                                        }
                                    }
    ?>
</div>

<?php
include "inc/footer.php"
?>