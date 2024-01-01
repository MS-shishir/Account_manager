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

        if ($do == "Manage") {
        ?>
            <div class="col-md-8 grid-margin stretch-card offset-sm-2 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Team In Batch-3</h4>
                        <p class="card-description"> Credit your balance</p>
                        <form class="forms-sample" action="Balance_Details.php?do=table" method="POST">

                            <!-- <div class="form-group row">
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
                                </div> -->

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Month</label>
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
        <?php }
        if ($do == 'table') {
        ?>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> All Details</h4>
                            <p class="card-description"> Balance Details<code>.table</code>
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
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            $result = $_POST['credit_mounth'];
                                            $B_id = "";
                                            //$sql = "SELECT * FROM user_balance WHERE user_code IN (echo $result)";
                                            $sql = "SELECT* FROM credit_teble  WHERE mounth IN ('$result') ";
                                            $sqlconn = mysqli_query($conn, $sql);
                                            $counttable = mysqli_num_rows($sqlconn);
                                            if ($counttable == 0) { ?>
                                                
                                                <div class="alert text-danger ">No Result Found</div>
                                                <?php
                                            }else{
                                                $i = 0;
                                                while ($row = mysqli_fetch_assoc($sqlconn)) {
                                                // $bid = $row["B_id "];
                                                $description1 = $row["description"];
                                                $amount1 = $row["amount"];
                                                $mounth1 = $row["mounth"];
                                                $date1 = $row["cr_date"];

                                                // $post_id = $row["id"];
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td>
                                                        <i class="mdi mdi-currency-bdt" style="font-size: 15px; color:#fc424a;"></i>
                                                        <?php echo $amount1 ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $description1 ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mounth1 ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $date1 ?>
                                                    </td>
                                                </tr>
                                            <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
                                    }
    ?>
</div>

<?php
include "inc/footer.php"
?>