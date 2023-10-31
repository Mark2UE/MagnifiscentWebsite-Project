<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php

function display()
{
    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "select * from `billing_tbl` WHERE `payment_status` = 'ACCEPTED'");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        echo '<td><img class="custom-image" src="data:image/jpeg;base64,' . base64_encode($row['gcash_screenshot']) . '"/> </td>';

        echo "</tr>";
    }
}
function totalSales()
{

    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "SELECT SUM(amount) FROM `billing_tbl` WHERE payment_status = 'ACCEPTED';");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo $row[0];
    }
}

?>


<div class="row m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
    <div class="col-lg-12 p-5">




        <h2>Total amount paid: ₱<?php totalSales() ?></h2>
        <p>This is all the accepted payments</p>
    </div>
</div>

<div id="content-wrapper p-5" class="d-flex flex-column text-white" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
    <div id="content">

        <hr>
        <div class="table-responsive">
            <table class="table no-wrap text-white">
                <thead>
                    <tr>
                        <th class="border-top-0">Billing ID</th>
                        <th class="border-top-0">Customer Email</th>
                        <th class="border-top-0">Amount</th>
                        <th class="border-top-0">Payment Status</th>
                        <th class="border-top-0">Payment Type</th>
                        <th class="border-top-0">Created At</th>
                        <th class="border-top-0">Updated At</th>
                        <th class="border-top-0">Gcash Screenshot</th>



                    </tr>
                </thead>
                <tbody>
                    <?php echo display(); ?>
                </tbody>
            </table>
        </div>

    </div>
</div>







































<?php include 'assets/footer.php'; ?>