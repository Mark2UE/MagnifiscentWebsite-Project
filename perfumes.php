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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <title>PERFUMES</title>

</head>
<?php

function display()
{
    include "database/database.php";
    $sqlresult = mysqli_query($conn, "select * from perfume_tbl WHERE availability = 'ON'");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo '
           <div class="col-md-3 col-sm-6 my-3">
               <div class="product-grid2"  style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                   <div class="product-image2">
                       <a href="view-perfume.php?perfumeID=' . $row[0] . '"">
                       <img  class="pic" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"height="100"width="100"/>
                       </a>
                       <span class="product-new-label">' . $row[4] . '</span>
                       <ul class="social">
                       
                           <li><a href="view-perfume.php?perfumeID=' . $row[0] . '"" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                           <li><a href="perfume_bottle.php?perfumeID=' . $row[0] . '" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                          
                       </ul>
                       <a class="add-to-cart"  href="perfume_bottle.php?perfumeID=' . $row[0] . '">Choose This Perfume</a>
                   </div>
                   <div class="product-content bg-white">
                       <h3 class="title"><a href="view-perfume.php?perfumeID=' . $row[0] . '"></a></h3>
                       <b class="price">' . $row[1] . '</b>
                     
                       
                   </div>
               </div>
           </div>';
    }
}
?>

<body>

    <?php
    include 'includes/navbar-selector.php'; ?>






    <br><br>
    <div class="container-fluid p-5">
        <div class="card p-5" style="background-color: #fff5;">
            <div class="place-holder">
                <h3 class="display-1 text-white">PERFUMES </h3>
                <div class="row">
                    <div class="col-lg-6 p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <h1 class="text-white">Search Perfume</h1>
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-box">
                    </div>
                    <div class="container-fluid">
                        <div class="row p-5" id="search-results">
                        </div>
                    </div>
                    <div class="row">
                        <?php display() ?>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>


<script>
    $(document).ready(function() {
        $('#search-box').on('input', function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        $('#search-results').html(response);
                    }
                });
            } else {
                $('#search-results').html('');
            }
        });
    });
</script>


</html>
<?php include 'includes/scripts/preloader.php'; ?>