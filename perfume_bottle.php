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

    <script>
        $('#accordionFlushExample .accordion-collapse').collapse('hide');
    </script>
    <title>PERFUMES</title>

</head>

<body>
    <?php
    include 'includes/navbar-selector.php'; ?>

    <?php
    function display2()
    {
        $perID = $_GET['perfumeID'];
        include "database/database.php";
        $sqlresult = mysqli_query($conn, "select * from perfume_tbl WHERE perfume_id = '$perID' ");
        while ($row1 = mysqli_fetch_array($sqlresult)) {
            echo '<div class="card mb-3">';
            echo ' <div class="card-body">';
            echo '<div class="d-flex justify-content-between">';
            echo '<div class="d-flex flex-row align-items-center">';
            echo '<div>';
            echo ' <img src="data:image/jpeg;base64,' . base64_encode($row1['image']) . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
            </div>
            <div class="ms-3">
                                    <h5>' . $row1[1] . ': ' . $row1[4] . '</h5>
                                    <p class="small mb-0">' . $row1[5] . '</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div style="width: 50px;">
                                    <h5 class="fw-normal mb-0">1</h5>
                                </div>
                              
                                <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }

    function display()
    {
        $perID1 = $_GET['perfumeID'];
        include "database/database.php";
        $sqlresult = mysqli_query($conn, "select * from bottle_tbl WHERE bottle_quantity > 1");
        while ($row = mysqli_fetch_array($sqlresult)) {
            echo '<div class="col-lg-3 col-md-6 mb-4">';
            echo ' <div class="card card-border" style="borer-radius:50px;">';

            echo " <div id='myCarousel$row[0]' class='carousel slide' data-bs-ride='carousel'>
        <div class='carousel-inner'>
            <div class='carousel-item img zoom-wrapper active'>";

            echo '<img  class="customized-img" src="data:image/jpeg;base64,' . base64_encode($row['image_bottle']) . '"height="100"width="100"/>';
            echo "
            </div>
            
          
        </div>";




            echo "
      
        </div>
        <div class='card-body'>
            <h5 class='card-title'> " . $row[1] . "</h5>
            <p class='text-muted'>BOTTLE SIZE: $row[2]</p>
            <hr>
            <p class='text-muted'>BOTTLE PRICE: ₱$row[5]</p>
            <hr>
            <p class='text-muted'>$row[6]</p>
            <hr>
           
        <a href='add-to-cart.php?perfumeID=$perID1&bottleID=$row[0]' class='btn btn-default form-control'>GET THIS BOTTLE</a>
        </div>
        ";
            echo '</div>';
            echo '</div>';
        }
    }





    ?>




    <body>
        <br><br><br><br>
        <div class="container">
            <div class="card" style="background:#fff6;">
                <div class="place-holder px-5 m-5">
                    <div class="container">
                        <center>
                            <br><br>
                            <h1 class="text-white">NOW CHOOSE YOUR TYPE OF BOTTLE</h1>
                            <br><br>
                        </center>
                    </div>


                    <div class="row">

                        <?php echo display() ?>


                    </div>
                </div>

                <div class="row">
                    <div class="col m-5">
                        <center>
                            <h1 class="text-white">The perfume that you have selected.</h1>
                        </center>
                        <?php echo display2() ?>


                    </div>
                </div>
            </div>
        </div>






        <?php include 'includes/footer.php'; ?>

    </body>


</html>
<?php include 'includes/scripts/preloader.php'; ?>