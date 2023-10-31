<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php

function display()
{
    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "SELECT * FROM `cart`");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";

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
                        <th class="border-top-0">Cart ID</th>
                        <th class="border-top-0">Customer Email</th>
                        <th class="border-top-0">Perfume ID</th>
                        <th class="border-top-0">Bottle ID</th>
                        <th class="border-top-0">Bottle QTY</th>
                        <th class="border-top-0">Price</th>
                        <th class="border-top-0">Status</th>



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