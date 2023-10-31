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



    function tracking()
    {
        $Email = $_SESSION['email'];
        $cartID = $_GET['cartcode'];
        include "database/database.php";
        $sqlresult = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE customer_email ='$Email' and cart_code = '$cartID'");
        while ($row = mysqli_fetch_array($sqlresult)) {
            if ($row[3] == 'PAYMENT IS ON PROCESS' && $row[8] == 'none') {
                echo ' <label for="customRange3" class="form-label">Track your shipping Status</label>
                <input type="range" class="form-range disablerange" min="1" max="4" value="1" id="customRange3" disabled>

                <div class="hstack gap-1">
                    <div class="p-2 text-success  bold fs-3 text-warning"><i class="bi bi-credit-card"></i>&nbsp;Pending Payment</div>
                    <div class="p-2 ms-auto"><i class="bi bi-box-seam"></i>&nbsp;Preparing Parcel</div>

                    <div class="p-2 ms-auto"><i class="bi bi-search"></i>&nbsp;Searching Driver</div>

                    <div class="p-2 ms-auto"><i class="bi bi-arrow-up-square"></i>&nbsp;Driver is for pick up</div>
                </div>';
            } elseif ($row[3] == 'REJECT' && $row[8] == 'none') {
                echo ' <label for="customRange3" class="form-label">Track your shipping Status</label>
                <input type="range" class="form-range disablerange" min="1" max="4" value="1" id="customRange3" disabled>

                <div class="hstack gap-1">
                    <div class="p-2 text-danger bold fs-3 text-warning"><i class="bi bi-credit-card"></i>&nbsp;Payment Rejected</div>
                    <div class="p-2 ms-auto"><i class="bi bi-box-seam"></i>&nbsp;Preparing Parcel</div>

                    <div class="p-2 ms-auto"><i class="bi bi-search"></i>&nbsp;Searching Driver</div>

                    <div class="p-2 ms-auto"><i class="bi bi-arrow-up-square"></i>&nbsp;Driver is for pick up</div>
                </div>';
            } elseif ($row[3] == 'ACCEPTED' && $row[8] == 'preparing') {
                echo '<script>
                alert("Updating Forms.."); 
                window.location.href = "shipping.php?cartcode=' . $row[9] . '";
                </script>';
            } else {
                echo ' <label for="customRange3" class="form-label">Track your shipping Status</label>
                <input type="range" class="form-range disablerange" min="1" max="4" value="1" id="customRange3" disabled>

                <div class="hstack gap-1">
                    <div class="p-2 text-success  bold fs-3 text-warning"><i class="bi bi-credit-card"></i>&nbsp;Pending Payment</div>
                    <div class="p-2 ms-auto"><i class="bi bi-box-seam"></i>&nbsp;Preparing Parcel</div>

                    <div class="p-2 ms-auto"><i class="bi bi-search"></i>&nbsp;Searching Driver</div>

                    <div class="p-2 ms-auto"><i class="bi bi-arrow-up-square"></i>&nbsp;Driver is for pick up</div>
                </div>';
            }
        }
    }
    ?>

    <br><br>
    <section class="m-5 p-5" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
        <div class="row m-1 text-white">
            <div class="col-lg-6">



                <div class="row">
                    <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

                        <h1>Billing page</h1>
                        <h4>Your Billing ID: <?php echo $row[0] ?></h4>
                    </div>

                </div>
                <br>




                <div class="row my-2">
                    <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <h2>Your Cart Here:</h2>

                        <br>
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
            <div class="row">
                <div class="col p-4 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                    <h2>Your Billing Information Here:</h2>

                    <div class="table-responsive">
                        <table class="table text-white" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <thead>
                                <tr>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Date of Billing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php ShowBillingInfo() ?>
                            </tbody>
                        </table>
                    </div>

                </div>


                <div class="row">
                    <div class="col p-4 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <h2>Upload Your Gcash Account Here:</h2>

                        <div class="d-grid gap-2">
                            <?php
                            if ($row[7] == '') {
                                echo ' <button class="btn btn-default p-3 " type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" disable><i class="bi bi-upload"></i>&nbsp;Upload Here</button>';
                            } else {
                                echo ' <button class="btn btn-default p-3 disabled" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-upload"></i>&nbsp;You already uploaded</button>';
                            }



                            ?>

                        </div>

                    </div>
                </div>

                <!-- Modal -->
                <form action="validation.php" method="post" enctype="multipart/form-data">
                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl ">
                            <div class="modal-content bg-dark" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Your Gcash Payment to process</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-outline mb-4">
                                        <div class="file-upload">
                                            <div class="file-upload-placeholder">
                                                <input class="file-upload-input" type='file' name="image1" id="image1" onchange="readURL(this);" accept="image/*" required />
                                                <div class="drag-text">
                                                    <h3>UPLOAD/DRAG GCASH SCREENSHOT HERE</h3>
                                                </div>
                                            </div>

                                            <div class="file-upload-preview">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="file-upload-remove">
                                                    <button type="button" onclick="removeUpload()" class="btn btn-default">Remove <span class="image-title">Uploaded Image</span></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="cart_code" value="<?php echo  $row[9] ?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="upload_gcash" class="btn btn-default">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>










            </div>
            <div class="row m-5">
                <div class="col-lg-12 p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                    <?php tracking() ?>
                </div>
            </div>
        </div>





        </div>


    </section>
    <br><br><br><br>

    <?php include 'includes/footer.php'; ?>
</body>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) { // if input is file, files has content
            var inputFileData = input.files[0]; // shortcut
            var reader = new FileReader(); // FileReader() : init
            reader.onload = function(e) {
                /* FileReader : set up ************** */
                console.log('e', e)
                $('.file-upload-placeholder').hide(); // call for action element : hide
                $('.file-upload-image').attr('src', e.target.result); // image element : set src data.
                $('.file-upload-preview').show(); // image element's container : show
                $('.image-title').html(inputFileData.name); // set image's title
            };
            console.log('input.files[0]', input.files[0])
            reader.readAsDataURL(inputFileData); // reads target inputFileData, launch `.onload` actions
        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        var $clone = $('.file-upload-input').val('').clone(true); // create empty clone
        $('.file-upload-input').replaceWith($clone); // reset input: replaced by empty clone
        $('.file-upload-placeholder').show(); // show placeholder
        $('.file-upload-preview').hide(); // hide preview
    }

    // Style when drag-over
    $('.file-upload-placeholder').bind('dragover', function() {
        $('.file-upload-placeholder').addClass('image-dropping');
    });
    $('.file-upload-placeholder').bind('dragleave', function() {
        $('.file-upload-placeholder').removeClass('image-dropping');
    });
</script>

</html>

<?php include 'includes/scripts/preloader.php'; ?>