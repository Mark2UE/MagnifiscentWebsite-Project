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
    <link rel="stylesheet" type="text/css" href="css/IndexParallax.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <title>PERFUMES</title>

</head>

<body>
    <?php
    include 'includes/navbar-selector.php'; ?>

    <?php

    function display()
    {
        include "database/database.php";
        $sqlresult = mysqli_query($conn, "select * from perfume_tbl WHERE availability = 'ON'");
        while ($row = mysqli_fetch_array($sqlresult)) {
            echo ' <div class="col-md-3 col-sm-6">
            <div class="product-grid2" >
                <div class="product-image2">
                    <a href="#">
                    <img  class="pic" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"height="100"width="100"/>
                    </a>
                    <ul class="social">
                        <li><a href="view-perfume.php?perfumeID=' . $row[0] . '"" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="perfume_bottle.php?perfumeID=' . $row[0] . '" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <a class="add-to-cart" href="">Choose This Perfume</a>
                </div>
                <div class="product-content bg-white">
                    <h3 class="title"><a href="view-perfume.php?perfumeID=' . $row[0] . '"></a></h3>
                    <b class="price">' . $row[1] . '</b>
                </div>
            </div>
        </div>';
            '';
        }
    }

    include "database/database.php";
    $PerfumeID = $_GET['perfumeID'];
    $sqlresult = mysqli_query($conn, "select * from perfume_tbl WHERE perfume_id = '$PerfumeID'");
    $row = mysqli_fetch_array($sqlresult);
    ?>

    <body>
        <br><br> <br><br>
        <!-- Product section-->
        <section class="py-5 m-5" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <div class="container px-4 px-lg-5 my-5 text-white">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <?php echo '<img class="card-img-top mb-5 mb-md-0" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="..." /></div>' ?>

                        <div class="col-md-6">
                            <h1 class="display-5 fw-bolder"> <?php echo $row[1] ?>
                                <div class="fs-5 mb-5">

                                    <span><?php echo $row[4] ?></span>
                                </div>
                                <p class="lead"><?php echo $row[5] ?></p>
                                <div class="d-flex">
                                    <a class="btn btn-outline-dark flex-shrink-0 text-white" type="button" href='perfume_bottle.php?perfumeID=<?php echo $row[0] ?>'>
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
        </section>


        
        <hr>
        <section class="py-5 banner1">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4 text-light">Other Perfumes</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php display() ?>
                </div>

            </div>
        </section>




        <?php include 'includes/footer.php'; ?>
    </body>


</html>
<?php include 'includes/scripts/preloader.php'; ?>