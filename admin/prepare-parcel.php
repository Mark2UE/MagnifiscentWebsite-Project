<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php

function display()
{
    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "select * from `billing_tbl` WHERE `payment_status` = 'ACCEPTED' and `status` != 'COMPLETED'");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";

        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        echo "<td>$row[8]</td>";

        echo "<td><a href='view-parcel.php?cartcode=$row[9]&Email=$row[1]' class='btn btn-default'>Update</a></td>";

        echo "<td><a href='validation.php?Delete_process=$row[0]' class='btn btn-warning'>delete</a></td>";
        echo "</tr>";
    }
}


?>



<div id="content-wrapper p-5" class="d-flex flex-column text-white" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
    <div id="content">


        <div class="table-responsive">
            <table class="table no-wrap text-white">
                <thead>
                    <tr>
                        <th class="border-top-0">Billing ID</th>
                        <th class="border-top-0">Customer Email</th>

                        <th class="border-top-0">Created At</th>
                        <th class="border-top-0">Updated At</th>
                        <th class="border-top-0">Status</th>


                        <th class="border-top-0">Action</th>
                        <th class="border-top-0">Action</th>


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