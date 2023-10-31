<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/scripts/essentials.php' ?>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">

    <title>PERFUMES</title>

</head>

<body>
    <?php include 'includes/navbar-selector.php'; ?>
    <?php

    function display()
    {
        $email = $_SESSION['email'];
        include 'database/database.php';
        $sqlresult = mysqli_query($conn, "select * from cart,bottle_tbl,perfume_tbl WHERE cart.user_email = '$email' AND bottle_tbl.bottle_id = cart.bottle_id AND perfume_tbl.perfume_id = cart.perfume_id AND status = 'add to cart'");
        while ($row = mysqli_fetch_array($sqlresult)) {

            echo '  <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div>
                        <img src="data:image/jpeg;base64,' . base64_encode($row[17]) . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                    </div>
                    <div>
                    <img src="data:image/jpeg;base64,' . base64_encode($row[11]) . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                </div>
                    <div class="ms-3">
                        <h5>' . $row[15] . '</h5>
                        <p class="small mb-0">' . $row[8] . '</p>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center">
                
                    <div style="width: 50px;">
                        <h5 class="fw-normal mb-0">X' . $row[4] . '</h5>
                    </div>

                    <div style="width: 80px;">
                        <h5 class="mb-0">₱' . $row[5] . '</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> ';
        }
    }


    function display2()
    {
        $email = $_SESSION['email'];
        include 'database/database.php';
        $sqlresult = mysqli_query($conn, "select * from cart,bottle_tbl,perfume_tbl WHERE cart.user_email = '$email' AND bottle_tbl.bottle_id = cart.bottle_id AND perfume_tbl.perfume_id = cart.perfume_id AND status = 'add to cart'");
        while ($row = mysqli_fetch_array($sqlresult)) {
            echo '
           
            <tbody>
              <tr>
              <td> ' . $row[15] . ' </td>
                <td> ' . $row[9] . ' </td>
                <td> x' . $row[4] . ' </td>
                <td> ₱' . $row[5] . ' </td>
              </tr>';
        }
    }
    function showTotal()
    {
        $email = $_SESSION['email'];
        include 'database/database.php';
        $sqlresult = mysqli_query($conn, "SELECT SUM(price) FROM cart WHERE user_email = '$email' AND status = 'add to cart';");
        $row = mysqli_fetch_array($sqlresult);
        echo $row[0];
    }


    include 'database/database.php';
    $billing = $_POST['total_overall'];
    $email = $_SESSION['email'];

    $sqlresult = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
    $row = mysqli_fetch_array($sqlresult);



    $cart_id = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_email = '$email'");
    $cart = mysqli_fetch_array($cart_id);



    $cart_id2 = mysqli_query($conn, "SELECT SUM(cart_id) FROM cart WHERE user_email = '$email' AND status = 'add to cart';");
    $cart_id_billing = mysqli_fetch_array($cart_id2);

    ?>
    <br><br><br>
    <form action="validation.php" enctype="multipart/form-data" method="post">
        <section>
            <div class="container py-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center pb-5">
                            <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
                                <div class="py-4 d-flex flex-row">
                                    <h5><span class="far fa-check-square pe-2"></span><b>MAGNIFISCENT</b> |</h5>
                                    <span class="ps-2">billing page</span>
                                </div>
                                <h4>Magnifiscent Perfume Station</h4>
                                <div class="d-flex pt-2">
                                    <div>
                                        <p>
                                            <b></b>
                                        </p>
                                    </div>

                                </div>


                                <hr />
                                <div class="pt-2">
                                    <div class="d-flex pb-2">
                                        <div>
                                            <p>
                                                <b>Gcash Account <span class="text-warning">Activated</span></b>
                                            </p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="account-settings.php" class="text-primary">
                                                <i class="fas fa-plus-circle text-primary pe-1"></i>Update Your Gcash Number
                                            </a>
                                        </div>
                                    </div>
                                    <p>
                                        We are excited to announce that we now offer GCASH as a payment option for our customers. To use GCASH as a payment method, simply select it at checkout and follow the prompts to complete your payment.
                                        <hr>
                                    <table class="table">
                                        <p>This is the estimated value for Delivery Courier</p>
                                        <b class="text-danger">NOTE: Delivery Fee may change depeding on the drop off location and Package Weight</b>
                                        <thead>
                                            <tr>
                                                <th scope="col">Courier Type</th>
                                                <th scope="col">METRO-MANILA</th>
                                                <th scope="col">OUTSIDE METRO-MANILA</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="https://www.lalamove.com/en-ph/all-delivery-pricing-detail"> Lalamove:</a> </th>
                                                <td><b> ₱100 </b> (0-5km: P18/km)+(>5km: P15/km)</td>
                                                <td><b> ₱102 </b> (>1km: P18/km)</td>

                                            </tr>
                                            <tr>
                                                <th scope="row">GrabExpress:</th>
                                                <td><b>₱80</b>(0-5km: P18/km)+(>5km: P15/km)</td>
                                                <td><b> ₱80++ </b> (>1km: P18/km)</td>

                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="https://toktok.ph/faqs/toktokdelivery"> TokTok PH:</a></th>
                                                <td> <b>₱49.00 </b> (1st KM) + Php6.00 (for every succeeding KM)</td>


                                            </tr>
                                        </tbody>
                                    </table>






                                    </p>
                                    <hr>









                                    <b class="text-danger">Make sure your cellphone number is Registered</b>
                                    <div class="pb-3">
                                        <div class="d-flex flex-row pb-3">

                                            <div class="d-flex align-items-center pe-2">
                                                <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1" value="" aria-label="..." checked />
                                            </div>
                                            <div class="rounded border d-flex w-100 p-3 align-items-center">

                                                <p class="mb-0">
                                                    <i class="fab fa-cc-visa fa-lg text-primary pe-2"></i>Gcash

                                                </p>

                                                <div class="ms-auto"><?php echo $row[0] ?></div>

                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                            <div class="col-md-5 col-xl-4 offset-xl-1 text-dark">
                                <div class="py-4 d-flex justify-content-end">
                                    <h6><a href="perfumes.php">Cancel and return to website</a></h6>
                                </div>
                                <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
                                    <div class="p-2 me-3">
                                        <h4>Billing | Invoice</h4>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <center>
                                            <b class="col">Personal Information</b>
                                        </center>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">Name:</div>
                                        <div class="ms-auto"><?php echo $row[2], $row[3] ?></div>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">Email</div>
                                        <div class="ms-auto"><?php echo $row[4] ?></div>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">Cellphone Number</div>
                                        <div class="ms-auto"><?php echo $row[0] ?></div>
                                    </div>
                                    <div class="p-2 d-flex">
                                        <div class="col-8">Address</div>
                                        <div class="ms-auto"><?php echo $row[7] ?></div>
                                    </div>
                                    <div class="border-top px-2 mx-2"></div>
                                    <div class="p-2 d-flex">
                                        <center>
                                            <b class="col">Payment Summary</b>

                                        </center>
                                    </div>
                                    <table class="table  text-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">Perfume Name</th>
                                                <th scope="col">Bottle Size</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <?php display2() ?>
                                    </table>
                                    <div class="p-2 d-flex p-2">

                                        <div class="col-8">
                                            Total Checkout <span class="fa fa-question-circle text-dark"></span>
                                        </div>
                                        <div class="ms-auto"><b>₱<?php echo showTotal() ?></b>
                                        </div>

                                    </div>
                                    <input type="hidden" name="amount" value="<?php echo $billing ?>">
                                    <input type="hidden" name="cart_id" value="<?php echo $cart_id_billing[0]  ?>">



                                    <input type="submit" name="billing_prc" class="btn btn-default btn-block btn-lg" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <?php include 'includes/footer.php'; ?>
</body>


</html>
<?php include 'includes/scripts/preloader.php'; ?>