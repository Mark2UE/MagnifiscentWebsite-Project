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

    function display()
    {
        $email = $_SESSION['email'];
        include 'database/database.php';
        $sqlresult = mysqli_query($conn, "select * from cart,bottle_tbl,perfume_tbl WHERE cart.user_email = '$email' AND bottle_tbl.bottle_id = cart.bottle_id AND perfume_tbl.perfume_id = cart.perfume_id and cart.status = 'add to cart'");
        while ($row = mysqli_fetch_array($sqlresult)) {

            echo '  <div class="" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
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

                        <div style="containter">
                        <a href="update-cart.php?cartID=' . $row[0] . '" class = "" style="decoration:none;">
                        <div class="form-control btn btn-warning"> 
                        <i class="bi bi-gear"></i>
                        </div>
                       </a>
                        </div>

                        <div style="containter">
                        <a href="validation.php?DeletecartID=' . $row[0] . '" class = "" style="decoration:none;">
                        <div class="form-control btn btn-danger"> 
                        <i class="bi bi-trash"></i>
                        </div>
                       </a>
                        </div>




                    </div>
                </div>
            </div>
        </div> ';
        }
    }

    function showTotal()
    {
        $email = $_SESSION['email'];
        include 'database/database.php';
        $sqlresult = mysqli_query($conn, "SELECT SUM(price) FROM cart WHERE user_email = '$email' AND status = 'add to cart';");
        $row = mysqli_fetch_array($sqlresult);
        echo $row[0];
        echo '<input type="hidden" name="total_overall" value="' . $row[0] . '">';
    }

    function EnableButton()
    {
        $email = $_SESSION['email'];
        include 'database/database.php';
        $sqlresult = mysqli_query($conn, "SELECT SUM(price) FROM cart WHERE user_email = '$email' AND status = 'add to cart';");
        $row = mysqli_fetch_array($sqlresult);
        if ($row[0] == '') {
            echo 'You must add to cart first before check out';
        } else {
            echo '    <button type="submit" class="form-control btn btn-danger">
           <b><i class="bi bi-bag-check"></i> Check out</b>
       </button>
';
        }
    }



    ?>




    <body ">
        <form action=" billing.php" method="post">


        <section class="h-100 h-custom m-5" style="padding-top: 100px;">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div class="card-body p-4" style="height:100vh;">

                            <div class="row">

                                <div class="col-lg-12">
                                    <h5 class="mb-3 text-white"><a href="perfumes.php" class="text-white">Continue shopping</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1 text-white">Shopping cart</p>
                                        </div>
                                        <div class="text-white">
                                            <p class="mb-1 text-white">Total Cart Amount: <b>₱<?php showTotal() ?> </b> </p>

                                            <?php EnableButton() ?>
                                        </div>
                                    </div>

                                    </form>
                                    <?php display() ?>


                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>




        <?php include 'includes/footer.php'; ?>
    </body>


</html>
<?php include 'includes/scripts/preloader.php'; ?>