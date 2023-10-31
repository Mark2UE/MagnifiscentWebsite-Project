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
    <?php
    include 'includes/navbar-selector.php'; ?>

    <?php

    $user = $_SESSION['email'];
    $cartID = $_GET['cartID'];
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

        include "database/database.php";
        $sqlresult = mysqli_query($conn, "select * from cart where cart_id = '$cartID' and user_email = '$user'  ");
        if (!$sqlresult) {
            echo "<H1>ERROR OCCURED</H1>";
        } else {
            $row1  = mysqli_fetch_array($sqlresult);
            $showPerfume = mysqli_query($conn, "select * from perfume_tbl WHERE perfume_id = $row1[2]");
            $perfume  = mysqli_fetch_array($showPerfume);

            $showBottle = mysqli_query($conn, "select * from bottle_tbl WHERE bottle_id = $row1[3]");
            $bottle  = mysqli_fetch_array($showBottle);
        }
    } else {
        echo '<script>
        alert("Login First"); 
        window.location.href = "index.php";
        </script>';
    }

    function showPerfumeImage()
    {


        include "database/database.php";
        $user = $_SESSION['email'];
        $cartID = $_GET['cartID'];
        $sqlresult = mysqli_query($conn, "select * from cart where cart_id = '$cartID' and user_email = '$user'");
        $row1  = mysqli_fetch_array($sqlresult);


        $showPerfume = mysqli_query($conn, "select * from perfume_tbl WHERE perfume_id = $row1[2]");
        while ($perfume  = mysqli_fetch_array($showPerfume)) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($perfume['image']) . '" class="img-fluid rounded-3">';
        }
    }


    function showBottleImage()
    {


        include "database/database.php";
        $user = $_SESSION['email'];
        $cartID = $_GET['cartID'];
        $sqlresult = mysqli_query($conn, "select * from cart where cart_id = '$cartID' and user_email = '$user'");
        $row1  = mysqli_fetch_array($sqlresult);


        $showBottle = mysqli_query($conn, "select * from bottle_tbl WHERE bottle_id = $row1[3]");
        while ($bottle  = mysqli_fetch_array($showBottle)) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($bottle['image_bottle']) . '" class="img-fluid rounded-3">';
        }
    }


    ?>




    <body>
        <br><br> <br><br> <br>
        <section class="h-custom ">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px; ">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-white">CART INFORMATION</h1>
                                                <h6 class="mb-0 text-muted">UPDATE QUANTITY</h6>
                                            </div>


                                            <hr class="my-4">
                                            <form action="validation.php" method="post">
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <?php showPerfumeImage() ?>

                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <?php showBottleImage() ?>

                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3 text-white">
                                                        <h6 class="text-muted"><?php echo  $perfume[1] ?></h6>
                                                        <h6 class="text-white mb-0"><?php echo  $bottle[1] ?> : <?php echo $bottle[2] ?></h6>
                                                        <h6 class="text-white mb-0">₱<?php echo  $bottle[5] ?> / <?php echo  $bottle[2]  ?></h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3 ">
                                                        <div class="input-group">
                                                            <input type="button" value="-" class="button-minus btn btn-default " data-field="quantity">
                                                            <input type="number" step="1" max="10" value="<?php echo $row1[4] ?>" name="quantity" class="quantity-field border-0 text-center w-25" id="quantity-field" readonly>
                                                            <input type="button" value="+" class="button-plus btn btn-default" data-field="quantity">
                                                        </div>



                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        ₱
                                                        <h1 id="_price"><?php echo $row1[5] ?></h1>



                                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">







                                                            <input id="input2" value="<?php echo $bottle[5] ?>" readonly hidden></input>
                                                            <input type="hidden" name="total" value="" id="total_input">
                                                            <input type="hidden" name="cartID" value="<?php echo $row1[0] ?>" id="total_input">

                                                        </div>

                                                    </div>

                                                    <hr class="my-4">
                                                    <button type="submit" id="button" name="update-to-cart" class="btn btn-danger">Update Cart</button>


                                                    <div class="pt-5">
                                                        <h6 class="mb-0"><a href="cart.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to Cart</a></h6>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <script>
            function incrementValue(e) {
                e.preventDefault();

                // Get the value of the second input field and convert it to a number
                const inputValue2 = parseFloat(document.getElementById("input2").value);

                // Get the name of the input field and its parent element
                const fieldName = $(e.target).data('field');
                const parent = $(e.target).closest('div');

                // Get the current value of the input field and convert it to a number
                let currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10) || 0;

                // Increment the value of the input field by 1
                currentVal++;
                parent.find('input[name=' + fieldName + ']').val(currentVal);

                // Calculate the new price based on the current quantity and the value of the second input field
                const newPrice = currentVal * inputValue2;

                // Update the price display element with the new price
                document.getElementById("_price").textContent = newPrice;
                document.getElementById("total_input").value = newPrice;
            }

            function decrementValue(e) {
                e.preventDefault();

                // Get the value of the second input field and convert it to a number
                const inputValue2 = parseFloat(document.getElementById("input2").value);

                // Get the name of the input field and its parent element
                const fieldName = $(e.target).data('field');
                const parent = $(e.target).closest('div');

                // Get the current value of the input field and convert it to a number
                let currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10) || 0;

                // Decrement the value of the input field by 1, but do not allow negative values
                if (currentVal > 0) {
                    currentVal--;
                }
                parent.find('input[name=' + fieldName + ']').val(currentVal);

                // Calculate the new price based on the current quantity and the value of the second input field
                const newPrice = currentVal * inputValue2;

                // Update the price display element with the new price
                document.getElementById("_price").textContent = newPrice;
                document.getElementById("total_input").value = newPrice;
            }


            $('.input-group').on('click', '.button-plus', function(e) {
                incrementValue(e);

            });

            $('.input-group').on('click', '.button-minus', function(e) {
                decrementValue(e);
            });
        </script>


        <?php include 'includes/footer.php'; ?>

    </body>


</html>
<?php include 'includes/scripts/preloader.php'; ?>