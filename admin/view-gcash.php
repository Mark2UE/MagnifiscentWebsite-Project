<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>

<?php


include "database-admin/database.php";
$billingCode = $_GET['View'];
$sqlresult = mysqli_query($conn, "select * from `billing_tbl` WHERE `status` = 'none' AND `billing_id`= '$billingCode'");
$row = mysqli_fetch_array($sqlresult);



function ShowInfoUser()
{
    include "database-admin/database.php";
    $billingCode = $_GET['View'];
    $sqlresult1 = mysqli_query($conn, "select * from `billing_tbl` WHERE `status` = 'none' AND `billing_id`= '$billingCode'");
    $row1 = mysqli_fetch_array($sqlresult1);

    $sqlresult = mysqli_query($conn, "SELECT * FROM `user` WHERE email ='$row1[1]'");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo '
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $row[2] . '' . $row[3] . '</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $row[0] . '</p>
              </div>
            </div>
           
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $row[7] . '</p>
              </div>
          
         
        </div>';
    }
}

function ViewBill()
{
    include "database-admin/database.php";
    $billingCode = $_GET['View'];
    $sqlresult = mysqli_query($conn, "select * from `billing_tbl` WHERE `status` = 'none' AND `billing_id`= '$billingCode'");



    while ($row = mysqli_fetch_array($sqlresult)) {
        echo '
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Billing ID</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $row[0] . '</p>
              </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Cart Code</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">' . $row[9] . '</p>
            </div>
          </div>
          <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $row[1] . '</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Amount</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $row[2] . '</p>
              </div>
            </div>
           
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Payment Type</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $row[4] . '</p>
              </div>     
            </div>
            <hr>
            <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Created at</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">' . $row[5] . '</p>
            </div>     
          </div>
          <hr>
          ';
        if ($row[3] == 'PENDING') {
            echo "<td><a href='validation.php?Accept=$row[0]' class='btn btn-default form-control disabled' disabled>Accept</a></td>";
            echo "<td><a href='validation.php?Reject=$row[0]' class='btn btn-default form-control disabled' disabled>Reject</a></td>";
        } elseif ($row[3] == 'REJECT') {
            echo "<td><a href='validation.php?Accept=$row[0]' class='btn btn-default form-control disabled' disabled>Accept</a></td>";
            echo "<td><a href='validation.php?Reject=$row[0]' class='btn btn-default form-control disabled' disabled>Reject</a></td>";
        } else {
            echo "<td><a href='validation.php?Accept=$row[0]' class='btn btn-default form-control' disabled>Accept</a></td>";
            echo "<td><a href='validation.php?Reject=$row[0]' class='btn btn-default form-control' disabled>Reject</a></td>";
        }
    }
}

?>





<section>
    <div class="row m-3 p-5" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
        <div class="col-lg-6">
            <div class="container p-4 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <?php echo '<td><img class="img-fluid" src="data:image/jpeg;base64,' . base64_encode($row['gcash_screenshot']) . '"/> </td>'; ?>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="container p-4 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <?php ShowInfoUser() ?>
            </div>
            <div class="container p-4 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <?php ViewBill() ?>
            </div>
        </div>
    </div>
</section>
































<?php include 'assets/footer.php'; ?>