<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php

function display()
{
    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "select * from `billing_tbl` WHERE `status` = 'none'");
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
        if ($row[3] == 'PENDING') {

            echo "<td><a href='validation.php?Accept=$row[0]' class='btn btn-default form-control disabled' disabled>Accept</a></td>";
            echo "<td><a href='validation.php?Reject=$row[0]' class='btn btn-default form-control disabled' disabled>Reject</a></td>";
        } elseif ($row[3] == 'REJECT') {
            echo "<td><a href='validation.php?Accept=$row[0]' class='btn btn-default form-control disabled' disabled>Accept</a></td>";
            echo "<td><a href='validation.php?Reject=$row[0]' class='btn btn-default form-control disabled' disabled>Reject</a></td>";
        } else {
            echo "<td><a href='validation.php?Accept=$row[0]' class='btn btn-default form-control' disabled>Accept</a></td>";
            echo "<td><a href='validation.php?Reject=$row[0]' class='btn btn-default form-control' disabled>Reject</a></td>";
            echo "<td><a href='view-gcash.php?View=$row[0]' class='btn btn-warning form-control'>View</a></td>";
        }


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
                        <th class="border-top-0">Amount</th>
                        <th class="border-top-0">Payment Status</th>
                        <th class="border-top-0">Payment Type</th>
                        <th class="border-top-0">Created At</th>
                        <th class="border-top-0">Updated At</th>
                        <th class="border-top-0">Gcash Screenshot</th>
                        <th class="border-top-0">Action</th>
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