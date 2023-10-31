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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>PERFUMES</title>

</head>


<body>
    <?php
    include 'includes/navbar-selector.php'; ?>

    <?php

    function showYourBilling()
    {
        include 'database/database.php';
        $email = $_SESSION['email'];
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE customer_email = '$email' AND `status` = 'none' ");
        while ($row = mysqli_fetch_array($sqlresult)) {



            if ($row[3] ==  'PENDING') {
                echo '
                <div class="col-auto m-1 p-3" style="background-color: #fff5; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" >
                <div class="product-grid3">
                
                    <div class="product-image3">
                    <span class="product-new-label">' . $row[4] . '</span>
                        <a href="payment.php?cartcode=' . $row[9] . '">
                            <img class="pic" src="css/IMAGE/yourBILLING.png">
                        </a>
                        <ul class="social">
                            <li><a href="payment.php?cartcode=' . $row[9] . '"><i class="bi bi-credit-card-2-back fa-beat"></i></a></li>
                            <li><a href="validation.php?Deletecartcode=' . $row[9] . '"><i class="bi bi-trash3 fa-beat"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                    <span class="product-new-label">PENDING PAYMENT</span>
                    <br>
                    
                        <div class="price">
                        TOTAL AMOUNT:   ₱' . $row[2] . '
                        </div>
                        <br>
                        <div class="price">
                         BILLING ID:' . $row[0] . '
                         </div>
                    </div>

                   
        
                </div>
            </div> ';
            } elseif ($row[3] ==  'PAYMENT IS ON PROCESS') {
                echo '
                <div class="col-auto m-1 p-3" style="background-color: #fff5; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" >
                
                <div class="product-grid3">
                
                    <div class="product-image3">
                    <span class="product-new-label">' . $row[4] . '</span>
                        <a href="payment.php?cartcode=' . $row[9] . '">
                            <img class="pic" src="css/IMAGE/yourBILLING.png">
                        </a>
                        <ul class="social">
                            <li><a href="payment.php?cartcode=' . $row[9] . '"><i class="bi bi-credit-card-2-back fa-beat"></i></a></li>
                           
                        </ul>
                    </div>
                    <div class="product-content">
                    <span class="product-new-label">PAYMENT IS ON PROCESS</span>
                    <br>
                
                    
                        <div class="price">
                        TOTAL AMOUNT:   ₱' . $row[2] . '
                        </div>
                        <br>
                        <div class="price">
                         BILLING ID:' . $row[0] . '
                         </div>
                    </div>
                    
           
                </div>
            </div> ';
            } else {
                echo '
                <div class="col-auto m-1 p-3" style="background-color: #fff5; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" >
                <div class="product-grid3">
                
                    <div class="product-image3">
                    <span class="product-new-label">' . $row[4] . '</span>
                   
                        <a href="payment.php?cartcode=' . $row[9] . '">
                            <img class="pic" src="css/IMAGE/yourBILLING.png">
                        </a>
                        <ul class="social">
                            <li><a href="payment.php?cartcode=' . $row[9] . '"><i class="bi bi-credit-card-2-back fa-beat"></i></a></li>
                            <li><a href="validation.php?Deletecartcode=' . $row[9] . '"><i class="bi bi-trash3 fa-beat"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                    <span class="product-new-label">REJECTED</span>
                    <br>
                    
                        <div class="price">
                        TOTAL AMOUNT:   ₱' . $row[2] . '
                        </div>
                       <br>
                       <div class="price">
                        BILLING ID:' . $row[0] . '
                        </div>
                    </div>
                    
            
                </div>
            </div> ';
            }
        }
    }



    function toSHIP()
    {
        include 'database/database.php';
        $email = $_SESSION['email'];
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE `status` ='searching' AND `customer_email` = '$email' or `status` = 'preparing' AND `customer_email` = '$email' or `status` ='OTW' AND `customer_email` = '$email'");
        while ($row = mysqli_fetch_array($sqlresult)) {

            if ($row[8] == 'searching') {
                echo '
                <div class="col-auto m-1 p-3" style="background-color: #fff5; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" >
                <div class="product-grid3">
                
                    <div class="product-image3">
                    <span class="product-new-label">' . $row[4] . '</span>
                        <a href="shipping.php?cartcode=' . $row[9] . '">
                            <img class="pic" src="css/IMAGE/toSHIP.png">
                        </a>
                        <ul class="social">
                            <li><a href="shipping.php?cartcode=' . $row[9] . '"><i class="bi bi-credit-card-2-back fa-beat"></i></a></li>
                          
                        </ul>
                    </div>
                    <div class="product-content">
                    <span class="product-new-label">searching for driver</span>
                    <br>
                    
                        <div class="price">
                        TOTAL AMOUNT:   ₱' . $row[2] . '
                        </div>
                        <br>
                        <div class="price">
                         BILLING ID:' . $row[0] . '
                         </div>
                    </div>
                  
            
                </div>
            </div> ';
            } elseif ($row[8] == 'preparing') {
                echo '
                <div class="col-auto m-1 p-3" style="background-color: #fff5; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" >
                <div class="product-grid3">
                
                    <div class="product-image3">
                    <span class="product-new-label">' . $row[4] . '</span>
                        <a href="shipping.php?cartcode=' . $row[9] . '">
                            <img class="pic" src="css/IMAGE/preparing.png">
                        </a>
                        <ul class="social">
                            <li><a href="shipping.php?cartcode=' . $row[9] . '"><i class="bi bi-credit-card-2-back fa-beat"></i></a></li>
                          
                        </ul>
                    </div>
                    <div class="product-content">
                    <span class="product-new-label">PREPARING</span>
                    <br>
                    
                        <div class="price">
                        TOTAL AMOUNT:   ₱' . $row[2] . '
                        </div>
                        <br>
                        <div class="price">
                         BILLING ID:' . $row[0] . '
                         </div>
                    </div>
                   
        
                </div>
            </div> ';
            } else {
                echo '
                <div class="col-auto m-1 p-3" style="background-color: #fff5; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" >
                <div class="product-grid3">
                
                    <div class="product-image3">
                    <span class="product-new-label">' . $row[4] . '</span>
                        <a href="shipping.php?cartcode=' . $row[9] . '">
                        <img class="pic" src="css/IMAGE/toSHIP.png">
                        </a>
                        <ul class="social">
                            <li><a href="shipping.php?cartcode=' . $row[9] . '"><i class="bi bi-credit-card-2-back fa-beat"></i></a></li>
                          
                        </ul>
                    </div>
                    <div class="product-content">
                    <span class="product-new-label">PARCEL IS FOR PICK UP</span>
                    <br>
                    
                        <div class="price">
                        TOTAL AMOUNT:   ₱' . $row[2] . '
                        </div>
                        <br>
                        <div class="price">
                         BILLING ID:' . $row[0] . '
                         </div>
                    </div>
                   
            
                </div>
            </div> ';
            }
        }
    }




    function toRecieve()
    {
        include 'database/database.php';
        $email = $_SESSION['email'];
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE `status` ='ATTEMPTODELIVER' AND `customer_email` = '$email'");
        while ($row = mysqli_fetch_array($sqlresult)) {
            echo '
            <div class="col-auto m-1 p-3" style="background-color: #fff5; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" >
            <div class="product-grid3">
            
                <div class="product-image3">
                <span class="product-new-label">' . $row[4] . '</span>
                    <a href="receiving.php?cartcode=' . $row[9] . '">
                    <img class="pic" src="css/IMAGE/toReceive.png">
                    </a>
                    <ul class="social">
                        <li><a href="receiving.php?cartcode=' . $row[9] . '"><i class="bi bi-credit-card-2-back fa-beat"></i></a></li>
                      
                    </ul>
                </div>
                <div class="product-content">
                <span class="product-new-label">PARCEL IS ON THE WAY</span>
                <br>
                
                    <div class="price">
                    TOTAL AMOUNT:   ₱' . $row[2] . '
                    </div>
                    <br>
                    <div class="price">
                     BILLING ID:' . $row[0] . '
                     </div>
                </div>
               
        
            </div>
        </div> ';
        }
    }



    function Completed()
    {
        include 'database/database.php';
        $email = $_SESSION['email'];
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE `status` ='COMPLETED' AND `customer_email` = '$email'");
        while ($row = mysqli_fetch_array($sqlresult)) {
            echo '
            <div class="col-auto m-1 p-3" style="background-color: #fff5; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" >
            <div class="product-grid3">
            
                <div class="product-image3">
                <span class="product-new-label">' . $row[4] . '</span>
                    <a href="completed.php?cartcode=' . $row[9] . '">
                    <img class="pic" src="css/IMAGE/Completed.png">
                    </a>
                    <ul class="social">
                        <li><a href="completed.php?cartcode=' . $row[9] . '"><i class="bi bi-bag-check fa-beat"></i></a></li>
                      
                    </ul>
                </div>
                <div class="product-content">
                <span class="product-new-label">COMPLETED</span>
                <br>
                
                    <div class="price">
                    TOTAL AMOUNT:   ₱' . $row[2] . '
                    </div>
                    <br>
                    <div class="price">
                     BILLING ID:' . $row[0] . '
                     </div>
                </div>
               
        
            </div>
        </div> ';
        }
    }
















    ?>

    <br> <br> <br> <br>
    <section class="m-5 p-5" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

        <nav>

            <div class="nav nav-tabs p-1" id="nav-tab" role="tablist" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;background-color: #0005; height:100%;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <button class="nav-link active text-white px-5 fs-5 bi bi-credit-card-2-back" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">to Pay</button>
                <button class="nav-link  text-white px-5 fs-5 bi bi-truck" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">to Ship</button>
                <button class="nav-link  text-white px-5 fs-5 bi bi-dropbox" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">to Receive</button>
                <button class="nav-link  text-white px-5 fs-5 bi-check-circle" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Completed</button>
            </div>

        </nav>



        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active p-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    <?php showYourBilling() ?>
                </div>


            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="tab-pane fade show active p-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php toSHIP() ?>
                    </div>


                </div>
            </div>
            <div class="tab-pane fade p-5" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                    <?php toRecieve() ?>
                </div>

            </div>
            <div class="tab-pane fade p-5" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">
                <div class="row">
                    <?php Completed() ?>
                </div>
            </div>
        </div>



    </section>


    <?php include 'includes/footer.php'; ?>
</body>
<script>
    const triggerTabList = document.querySelectorAll('#myTab a')
    triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', event => {
            event.preventDefault()
            tabTrigger.show()
        })
    })
</script>

</html>
<?php include 'includes/scripts/preloader.php'; ?>