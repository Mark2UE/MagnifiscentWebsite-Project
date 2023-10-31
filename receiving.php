<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/scripts/essentials.php' ?>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/shop.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" />

    <title>PERFUMES</title>

</head>
<style>
    .file-upload {


        margin: 0 auto;
        padding: 20px;
    }



    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    /* PLACEHOLDER */
    .file-upload-preview {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .file-upload-placeholder {
        margin-top: 20px;
        border: 4px dashed #ffffff;
        position: relative;
    }

    .image-dropping,
    .file-upload-placeholder:hover {
        background-color: #ffffff19;
        border: 4px dashed #ffffff;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #ffffff;
        padding: 60px 0;
    }

    /* PREVIEW */
    .file-upload-image {
        max-height: 500px;
        max-width: 500px;
        margin: auto;
        padding: 20px;
    }

    /* REMOVE */
    .file-upload-remove {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .remove-image {
        width: 500px;
        margin: 0;
        color: #ffffff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }

    .form-range::-webkit-slider-thumb {
        background-color: #fff;
        /* set the background color of the dot */
        border: 2px solid #333;
        /* set the border properties of the dot */
        height: 50px;
        /* set the height of the dot */
        width: 50px;
        /* set the width of the dot */
        border-radius: 50%;
        /* set the border-radius of the dot to make it circular */
        -webkit-appearance: none;
        /* remove the default appearance of the thumb */
        margin-top: -20px;
        /* adjust the position of the dot on the slider */
    }
</style>

<body>
    <?php
    include 'includes/navbar-selector.php';
    $Email = $_SESSION['email'];
    $cartID = $_GET['cartcode'];
    include "database/database.php";
    $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE cart_code = '$cartID' AND customer_email = '$Email'");
    $row = mysqli_fetch_array($sqlresult);

    function ShowCart()
    {
        $Email = $_SESSION['email'];
        $cartID = $_GET['cartcode'];

        include "database/database.php";
        $sqlresult = mysqli_query($conn, "SELECT * FROM `cart_to_billing`,`perfume_tbl`,`bottle_tbl`
        WHERE cart_to_billing.user_email = '$Email' AND perfume_tbl.perfume_id = cart_to_billing.perfume_id  AND bottle_tbl.bottle_id = cart_to_billing.bottle_id AND cart_to_billing.ctb_id = '$cartID'");



        while ($row = mysqli_fetch_array($sqlresult)) {
            echo '<tr>
            <td> <img src="data:image/jpeg;base64,' . base64_encode($row[9]) . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;"></td>
            <td> <img src="data:image/jpeg;base64,' . base64_encode($row[16]) . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;"></td>
            <td>' . $row[7] . '</td>
            <td>' . $row[13] . '</td>
            <td>' . $row[14] . '</td>
            <td>x' . $row[3] . '</td>
            <td>' . $row[17] . '</td>
          
        </tr>';
        }
    }


    function ShowInfoUser()
    {
        $Email = $_SESSION['email'];
        $cartID = $_GET['cartcode'];
        include "database/database.php";
        $sqlresult = mysqli_query($conn, "SELECT * FROM `user` WHERE email ='$Email'");



        while ($row = mysqli_fetch_array($sqlresult)) {
            echo '<div class="col-lg-8">
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
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row[4] . '</p>
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


    function ShowBillingInfo()
    {
        $Email = $_SESSION['email'];
        $cartID = $_GET['cartcode'];
        include "database/database.php";
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE customer_email ='$Email' and cart_code = '$cartID'");



        while ($row = mysqli_fetch_array($sqlresult)) {
            echo '<tr>
            <td>' . $row[2] . '</td>
            <td>' . $row[3] . '</td>
            <td>' . $row[4] . '</td>
            <td>' . $row[5] . '</td>
           
        </tr>';
        }
    }




    function Status()
    {
        $Email = $_SESSION['email'];
        $cartID = $_GET['cartcode'];
        include "database/database.php";
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE customer_email ='$Email' and cart_code = '$cartID'");
        while ($row = mysqli_fetch_array($sqlresult)) {

            if ($row[8] == 'ATTEMPTODELIVER') {
                echo '<p>Delivery will Attemp today...</p>
                <br>
<div class="col">
<center>
                    <h1><span id="words">Hi ' . $row[1] . ', Your Delivery is on the way!</span></h1>
                    <br>
                    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </center>
</div>
                ';

                $delguy = mysqli_query($conn, "SELECT * FROM `rider` WHERE `billing_id` ='$row[0]'");
                $del = mysqli_fetch_array($delguy);


                echo '<div class="col">
                <h1 class="mb-0">Delivery Fee: ₱' . $del[4] . '</h1>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Delivery Driver name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $del[6] . '</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Contact Number</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $del[7] . '</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Delivery Type</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $del[3] . '</p>
                  </div>
                </div>
               
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Status</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $del[8] . '</p>
                  </div>

                  <hr>
                  
              
             
            </div>';
            } elseif ($row[8] == 'COMPLETED') {
            }
        }
    }


    function Tracking()
    {
        $Email = $_SESSION['email'];
        $cartID = $_GET['cartcode'];
        include "database/database.php";
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE customer_email ='$Email' and cart_code = '$cartID'");
        while ($row = mysqli_fetch_array($sqlresult)) {

            if ($row[8] == 'ATTEMPTODELIVER') {
                echo ' <label for="customRange3" class="form-label">Track your shipping Status</label>
                <input type="range" class="form-range " min="1" max="3" value ="2" id="customRange3" disabled>

                <div class="hstack gap-1">
                <div class="p-2 text-success"><i class="bi bi-arrow-up-square"></i>&nbsp;DRIVER IS FOR PICKUP<i class="bi bi-check"></i></div>
                    <div class="p-2 ms-auto bold fs-3 text-warning"><i class="bi bi-truck"></i>&nbsp;Delivery is on The way</div>

                    <div class="p-2 ms-auto"><i class="bi bi-check-square"></i>&nbsp;Completed</div>

                    
                </div>';
            } elseif ($row[8] == 'COMPLETED') {

                echo '<script>
                alert("Updating Forms.."); 
                window.location.href = "completed.php?cartcode=' . $row[9] . '";
                </script>';
            } else {
            }
        }
    }




    ?>

    <br><br>
    <section class="m-5 p-5" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
        <div class="row m-1">

            <div class="col-lg-6">
                <div class="row">
                    <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

                        <h1>Receiving page</h1>

                        <h4>Your Billing ID: <?php echo $row[0] ?></h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <h2>Your Information Here:</h2>
                        <hr>
                        <?php ShowInfoUser() ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="row mx-2">
                <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                    <h2>Your Cart Here:</h2>
                    <div class="table-responsive">
                        <table class="table text-white" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <thead>
                                <tr>
                                    <th scope="col">Perfume Image</th>
                                    <th scope="col">Bottle Image</th>
                                    <th scope="col">Perfume Name</th>
                                    <th scope="col">Bottle Name</th>
                                    <th scope="col">Bottle Size</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php ShowCart() ?>

                            </tbody>
                        </table>
                    </div>
                    <h5 class="text-end">TOTAL: <b>₱<?php echo $row[2] ?></b></h5>
                </div>


                <div class="col-lg-12 my-3">
                    <div class="row">
                        <div class="col  p-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <form action="validation.php" method="post">
                                <h4>Parcel Receiving</h4>
                                <p>Once the Item/Parcel is receive please click the ITEM RECEIVED below</p>
                                <hr>
                                <input type="hidden" value="<?php echo $row[0] ?>" name="billing_id">
                                <input type="submit" class="btn btn-default" name="parcel_rcvd" value="ITEM RECEIVED">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div class="col-lg-12 my-4">
            <div class="row">
                <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

                    <?php Tracking() ?>
                </div>
            </div>
        </div>

        <br>

        <div class="col-lg-12 my-4">
            <div class="row">
                <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                    <?php Status() ?>

                </div>
            </div>
        </div>





    </section>
    <br><br><br><br>

    <?php include 'includes/footer.php'; ?>
</body>
<script type="text/javascript">
    (function() {
        var words = ["Prepare the Exact amount for your Delivery Fee!", "Hit the ITEM RECEIVED button once you receive your parcel", "Thank you for trusting us!.", "Driver will call you once your driver is near"],
            i = 0;
        setInterval(function() {
            $('#words').fadeOut(function() {
                $(this).html(words[(i = (i + 1) % words.length)]).fadeIn();
            });
        }, 4000)
    })();
</script>


</html>

<?php include 'includes/scripts/preloader.php'; ?>