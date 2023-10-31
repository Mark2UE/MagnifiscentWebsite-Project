<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php

function display()
{
    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "select * from `billing_tbl`");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        echo "<td>$row[8]</td>";
        echo "<td>$row[9]</td>";
        echo "</tr>";
    }
}


?>

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
                        <th class="border-top-0">Status</th>
                        <th class="border-top-0">Cart Code</th>


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