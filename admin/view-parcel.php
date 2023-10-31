<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>




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

    $Email = $_GET['Email'];
    $cartID = $_GET['cartcode'];
    include "database-admin/database.php";
    $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE cart_code = '$cartID' AND customer_email = '$Email'");
    $row = mysqli_fetch_array($sqlresult);

    function ShowCart()
    {
        $Email = $_GET['Email'];
        $cartID = $_GET['cartcode'];

        include "database-admin/database.php";
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
        $Email = $_GET['Email'];
        $cartID = $_GET['cartcode'];
        include "database-admin/database.php";
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
        $Email = $_GET['Email'];
        $cartID = $_GET['cartcode'];
        include "database-admin/database.php";
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
        $Email = $_GET['Email'];
        $cartID = $_GET['cartcode'];
        include "database-admin/database.php";
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE customer_email ='$Email' and cart_code = '$cartID'");
        while ($row = mysqli_fetch_array($sqlresult)) {

            if ($row[8] == 'preparing') {
                echo '<p>Parcel is preparing please wait...</p>
                <br>

                <center>
                    <h1><span id="words">Hi ' . $row[1] . ', Preparing your parcel...</span></h1>
                    <br>
                    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </center>';
            } elseif ($row[8] == 'searching') {
                echo '<p>Your Parcel is ready, We are searching for delivery driver</p>
                <br>

                <center>
                    <h1><span id="delivery">Hi ' . $row[1] . ', Your parcel is ready, we are now searching for delivery driver.</span></h1>
                    <br>
                    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </center>';
            } else {
                $delguy = mysqli_query($conn, "SELECT * FROM `rider` WHERE `billing_id` ='$row[0]'");
                $del = mysqli_fetch_array($delguy);


                echo '<div class="col-lg-8">
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
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Message:</p>
                    </div>
                    <div class="col-sm-9">
                    <p><span id="pickup">Hi ' . $row[1] . ', You have a driver that is on the way to pick up your parcel</span></p>
                    </div>
              
             
            </div>';
            }
        }
    }


    function Tracking()
    {
        $Email = $_GET['Email'];
        $cartID = $_GET['cartcode'];
        include "database-admin/database.php";
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE customer_email ='$Email' and cart_code = '$cartID'");
        while ($row = mysqli_fetch_array($sqlresult)) {

            if ($row[8] == 'preparing') {
                echo ' <label for="customRange3" class="form-label">Track shipping Status</label>
                <input type="range" class="form-range disablerange" min="4" max="4" step="2"  id="customRange3">

                <div class="hstack gap-1">
                    <div class="p-2 bold fs-3 text-warning"><i class="bi bi-box-seam"></i>&nbsp;Preparing Parcel</div>

                    <div class="p-2 ms-auto"><i class="bi bi-search"></i>&nbsp;Searching Driver</div>

                    <div class="p-2 ms-auto"><i class="bi bi-arrow-up-square"></i>&nbsp;Driver is for pick up</div>
                </div>';
            } elseif ($row[8] == 'searching') {
                echo ' <label for="customRange3" class="form-label">Track shipping Status</label>
                <input type="range" class="form-range disablerange" min="0" max="4" step="2" id="customRange3">

                <div class="hstack gap-1">
                <div class="p-2 text-success"><i class="bi bi-box-seam"></i>&nbsp;Preparing Parcel completed<i class="bi bi-check"></i></div>

                <div class="p-2 ms-auto bold fs-3 text-warning"><i class="bi bi-search"></i>&nbsp;Searching Driver</div>

                <div class="p-2 ms-auto"><i class="bi bi-arrow-up-square"></i>&nbsp;Driver is for pick up</div>
                </div>';
            } elseif ($row[8] == 'OTW') {
                echo ' <label for="customRange3" class="form-label">Track shipping Status</label>
                <input type="range" class="form-range disablerange" min="2" max="4" step="2" id="customRange3">

                <div class="hstack gap-1">
                <div class="p-2 text-success"><i class="bi bi-box-seam"></i>&nbsp;Preparing Parcel completed<i class="bi bi-check"></i></div>

                <div class="p-2 ms-auto text-success"><i class="bi bi-search"></i>&nbsp;Searching Driver completed<i class="bi bi-check"></i></div>

                <div class="p-2 ms-auto bold fs-3 text-warning"><i class="bi bi-arrow-up-square"></i>&nbsp;Driver is for pick up</div>
                </div>';
            } elseif ($row[8] == 'ATTEMPTODELIVER') {

                echo ' <label for="customRange3" class="form-label">Track your shipping Status</label>
                <input type="range" class="form-range " min="1" max="3" value ="2" id="customRange3" disabled>

                <div class="hstack gap-1">
                <div class="p-2 text-success"><i class="bi bi-arrow-up-square"></i>&nbsp;DRIVER IS FOR PICKUP<i class="bi bi-check"></i></div>
                    <div class="p-2 ms-auto bold fs-3 text-warning"><i class="bi bi-truck"></i>&nbsp;Delivery is on The way</div>

                    <div class="p-2 ms-auto"><i class="bi bi-check-square"></i>&nbsp;Completed</div>

                    
                </div>';
            } elseif ($row[8] == 'COMPLETED') {
                echo '<label for="customRange3" class="form-label">Track your shipping Status</label>
                <input type="range" class="form-range " min="1" max="3" value ="3" id="customRange3" disabled>

                <div class="hstack gap-1">
                <div class="p-2 text-success"><i class="bi bi-arrow-up-square"></i>&nbsp;DRIVER IS FOR PICKUP<i class="bi bi-check"></i></div>
                    <div class="p-2 ms-auto text-success"><i class="bi bi-truck"></i>&nbsp;Delivery is on The way<i class="bi bi-check"></i></div>

                    <div class="p-2 ms-auto bold text-success"><i class="bi bi-check-square"></i>&nbsp;Completed<i class="bi bi-check"></i></div>

                    
                </div>';
            }
        }
    }




    ?>

    <br><br>


    <?php


    function Update()
    {
        $Email = $_GET['Email'];
        $cartID = $_GET['cartcode'];
        include "database-admin/database.php";
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE customer_email ='$Email' and cart_code = '$cartID'");
        while ($row = mysqli_fetch_array($sqlresult)) {

            if ($row[8] == 'preparing') {
                echo "<div class='hstack gap-1'>
                <div class='p-2'>Preparing Parcel<br>
                <a href='validation.php?update_status_preparing=$row[0]'class='btn btn-default'>DONE</a>
                </div>

                <div class='p-2 ms-auto'>Searching Driver<br>
                <a href='view-parcel.php' class='btn btn-default disabled'>DONE</a>
                </div>

                <div class='p-2 ms-auto'>Driver is for pick up <br>
                <a href='view-parcel.php' class='btn btn-default disabled'>DONE</a>
                </div>
               
                </div>";
            } elseif ($row[8] == 'searching') {
                echo "<div class='hstack gap-1'>
                <div class='p-2 text-success'>Preparing Parcel<i class='bi bi-check2'></i><br>
                <a href='view-parcel.php?update_status_preparing=$row[9]'class='btn btn-default disabled'>DONE</a>
                </div>

                <div class='p-2 ms-auto'>Searching Driver<br>
                <a href='#' class='btn btn-default' data-bs-toggle='modal' data-bs-target='#modalfordriver'>DONE</a>
                </div>

                <div class='p-2 ms-auto'>Driver is for pick up <br>
                <a href='view-parcel.php' class='btn btn-default disabled'>DONE</a>
                </div>
               
                </div>";
            } elseif ($row[8] == 'OTW') {
                echo "<div class='hstack gap-1'>
                <div class='p-2 text-success'>Preparing Parcel<i class='bi bi-check2'></i><br>
                <a href='view-parcel.php?update_status_preparing=$row[9]'class='btn btn-default disabled'>DONE</a>
                </div>

                <div class='p-2 ms-auto text-success'>Searching Driver<i class='bi bi-check2'></i><br>
                <a href='view-parcel.php?update_status_preparing=$row[9]'class='btn btn-default disabled'>DONE</a>
                </div>

                <div class='p-2 ms-auto'>Driver is for pick up <br>
                <a href='validation.php?pickup=$row[0]' class='btn btn-default'>DONE</a>
                </div>
               
                </div>";
            } elseif ($row[8] == 'ATTEMPTODELIVER') {
                echo 'Wait until the user click the item received button. if the user did not respond, wait for 3 days to automatic update';
            } elseif ($row[8] == 'COMPLETED') {
                echo 'Transaction is completed!';
            }
        }
    }



    ?>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content  bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Transaction</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row  m-3">
                        <div class="col p-2" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

                            <?php Tracking() ?>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col p-5" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

                            <?php Update() ?>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalfordriver" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content  bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delivery Driver Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="validation.php" method="post" class="needs-validation" novalidate>

                        <div class="row">

                            <div class="col m-5 p-5" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                                <h2>Delivery Information</h2>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <label class="input-group-text" id="basic-addon1">Delivery Fee</label>
                                            <input type="number" class="form-control" id="validationCustom01" placeholder="Delivery fee" aria-describedby="basic-addon1" name="delfee" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col">
                                        <select class="form-select" name="deliverytype" required>
                                            <option selected value="" readonly hidden>Select Courier type</option>
                                            <option value="LALAMOVE">LALAMOVE</option>
                                            <option value="GRABEXPRESS">GRABEXPRESS</option>
                                            <option value="TOKTOK">TOKTOK</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col m-5 p-5" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                                <h2>Driver Information</h2>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" id="basic-addon1">Driver Name</label>
                                    <input type="text" class="form-control" placeholder="Driver Name" aria-label="Username" aria-describedby="basic-addon1" name="drivername" required>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" id="basic-addon1">Contact#</label>
                                    <input type="text" class="form-control" placeholder="Contact#" aria-label="Contact" aria-describedby="basic-addon1" name="drivercont" required>
                                </div>

                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $row[0] ?>" name="billingid">
                        <div class="input-group mb-3 p-5">
                            <button type="submit" name="rider_update" class="btn btn-default form-control">Save</button>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <div class="row mx-5 px-5">
        <div class="col p-5 " style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <h3>Update Client Parcel</h3>
            <hr>
            <p>Preparing a perfume item involves several steps to ensure that it is ready for shipment to the customer. First, the item is carefully inspected to ensure that it meets the quality standards of the business. The item is then carefully packaged to prevent any damage during shipping. This may involve wrapping the item in protective material or placing it in a secure container.

            </p>

        </div>
        <div class="col p-5 " style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <p>Once the perfume item is ready to be shipped, the business will typically search for a delivery driver to transport the item to the customer. The delivery driver will be responsible for ensuring that the item is delivered to the correct address and in a timely manner. The business may use various delivery services, such as couriers or postal services, to transport the item.</p>
            <hr>
            <center>
                <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="bi bi-gear"></i> Update This Transaction
                </button>
            </center>

        </div>
    </div>




    <section class="m-5 p-5" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
        <div class="row m-1">

            <div class="col-lg-6">
                <div class="row">
                    <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

                        <h1>Shipping page</h1>

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


</body>
<script type="text/javascript">
    (function() {
        var words = ["We will notify you via email: <?php echo $row[1] ?>.", "We will make sure your parcel is safe!", "Please bear with us and remain patient.", "“Patience is the road to wisdom.”", "“Have patience with all things but first of all with yourself.”"],
            i = 0;
        setInterval(function() {
            $('#words').fadeOut(function() {
                $(this).html(words[(i = (i + 1) % words.length)]).fadeIn();
            });
        }, 4000)
    })();
</script>
<script type="text/javascript">
    (function() {
        var words = ["Searching for driver", "Please wait...", "Delivery fee may change due to your location", "Malapit na to, Pramis!", "Konte nalang.. XD"],
            i = 0;
        setInterval(function() {
            $('#delivery').fadeOut(function() {
                $(this).html(words[(i = (i + 1) % words.length)]).fadeIn();
            });
        }, 4000)
    })();












    (() => {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>


<script type="text/javascript">
    (function() {
        var words = ["Congratulations!, you made this far...", "Courier driver will pick up your parcel from our office.", "the driver is here any minute now", "Malapit na to, Pramis!", "Konte nalang.. XD"],
            i = 0;
        setInterval(function() {
            $('#pickup').fadeOut(function() {
                $(this).html(words[(i = (i + 1) % words.length)]).fadeIn();
            });
        }, 4000)
    })();
</script>









<?php include 'assets/footer.php'; ?>