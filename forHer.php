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
        include "database/database.php";
        $sqlresult = mysqli_query($conn, "select * from perfume_tbl WHERE availability = 'ON' AND p_gender = 'for HER'");
        while ($row = mysqli_fetch_array($sqlresult)) {
            echo '<div class="col-lg-3 col-md-6 mb-4">';
            echo ' <div class="card card-border" style="borer-radius:50px;">';

            echo " <div id='myCarousel$row[0]' class='carousel slide' data-bs-ride='carousel'>
        <div class='carousel-inner'>
            <div class='carousel-item img zoom-wrapper active'>";

            echo '<img  class="customized-img" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"height="100"width="100"/>';
            echo "
            </div>
            
          
        </div>";




            echo "
      
        </div>
        <div class='card-body'>
            <h5 class='card-title'> " . $row[1] . "</h5>
            <p class='text-muted'>$row[5] </p>
            <hr>
            <p class='text-muted'>$row[4] </p>
           <div class='d-flex flex-row'>
           <a href='perfume_bottle.php?perfumeID=$row[0]' class='btn btn-danger form-control'>SELECT</b></a>
           <a href='view-perfume.php?perfumeID=$row[0]' class='btn btn-warning form-control'>CATALOG</a>
           </div>
      
        </div>
        ";
            echo '</div>';
            echo '</div>';
        }
    }





    ?>




    <body>


        <div class="place-holder px-5 m-5">
            <div class="row">
                <?php echo display() ?>



            </div>
        </div>




        <?php include 'includes/footer.php'; ?>
    </body>


</html>