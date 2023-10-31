<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>



<?php function totalSales()
{

    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "SELECT SUM(amount) FROM `billing_tbl` WHERE payment_status = 'ACCEPTED';");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo $row[0];
    }
}
?>


<?php function Transaction()
{

    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "SELECT COUNT(*) FROM `billing_tbl` WHERE `status` = 'COMPLETED'");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo $row[0];
    }
}
?>


<?php function ActiveTransactions()
{

    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "SELECT COUNT(*) FROM `billing_tbl` WHERE `status` != 'COMPLETED'");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo $row[0];
    }
}
?>


<?php function PendingPayment()
{

    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "SELECT COUNT(*) FROM `billing_tbl` WHERE `payment_status` != 'ACCEPTED'");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo $row[0];
    }
}
?>

<section style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
    <div class="container py-5">
        <div class="mx-auto">
            <div class="row  justify-content-center">
                <div class="col mb-4">
                    <div class="card" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div class="card-body text-center px-4 py-5 px-md-5">
                            <p class="fw-bold card-text mb-2 fs-5 text-success">Total Sales Accepted</p>
                            <h1>₱<?php totalSales() ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div class="card-body text-center px-4 py-5 px-md-5">
                            <p class="fw-bold card-text mb-2 fs-5 text-success">Total Completed Transactions</p>
                            <h1><?php Transaction() ?></h1>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col mb-4">
                    <div class="card" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div class="card-body text-center px-4 py-5 px-md-5">
                            <p class="fw-bold card-text mb-2 fs-5 text-success">Active Transactions</p>
                            <h1><?php ActiveTransactions() ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div class="card-body text-center px-4 py-5 px-md-5">
                            <p class="fw-bold card-text mb-2 fs-5 text-success">Gcash Pending Payments</p>
                            <h1><?php PendingPayment() ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<br><br>
<section style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
    <div class="container py-5">
        <div class="mx-auto">
            <div class="row  justify-content-center">
                <div class="col mb-4">
                    <div class="card" style="background-color: #0008;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

                        <div class="card-body text-center px-4 py-5 px-md-5">
                            <div class="spinner-grow text-success" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            <p class="fw-bold card-text mb-2 fs-5 text-success">Active Transaction Controller</p>
                            <p>This is where you can update parcels.</p>
                            <a href="prepare-parcel.php" class="btn btn-default">CLICK HERE!</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card" style="background-color: #0008;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div class="card-body text-center px-4 py-5 px-md-5">
                            <div class="spinner-grow text-success" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="fw-bold card-text mb-2 fs-5 text-success">Active Pending Payments</p>
                            <p>This is where you can Accept or Reject a Gcash Payment.</p>
                            <a href="gcash-confirmation.php" class="btn btn-default">CLICK HERE!</a>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col mb-4">
                    <div class="card" style="background-color: #0008;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div class="card-body text-center px-4 py-5 px-md-5">
                            <p class="fw-bold card-text mb-2 fs-5 text-success">Completed Transaction</p>
                            <p>This is where you can VIEW completed transactions or Completed delivered parcels</p>
                            <a href="completed-parcels.php" class="btn btn-default">CLICK HERE!</a>


                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card" style="background-color: #0008;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div class="card-body text-center px-4 py-5 px-md-5">

                            <p class="fw-bold card-text mb-2 fs-5 text-success">Total Completed Transactions</p>
                            <p>This is where you can VIEW accepted payments</p>
                            <a href="billing-table-view.php" class="btn btn-default">CLICK HERE!</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>















































<?php include 'assets/footer.php'; ?>