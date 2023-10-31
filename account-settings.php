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
    include 'includes/navbar-selector.php';
    $email = $_SESSION['email'];




    ?>


















    <br> <br>
    <section class="m-5 p-5" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
        <div class="row">

            <div class="col-lg-6">
                <div class="row m-4">
                    <div class="col p-5 m-1" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <h2 class="display-1"> Data Privacy Act</h2>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="col p-5 m-1" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <p>The purpose of this Data Privacy Act is to protect the personal data and privacy of the users of Magnificent Perfume's website, who provide their information, including but not limited to Email, First Name, Last Name, Address, and Date of Birth, when creating an account on the website.</p>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="col p-5 m-1" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <p>Use of Personal Data: <br> Magnificent Perfume's website will use personal data only for the purposes for which it was collected and will not use it for any other purpose without the user's consent. Personal data will be used for the following purposes:</p>
                    </div>
                </div>



            </div>












            <div class="col-lg-6">
                <form action="validation.php" method="post" enctype="multipart/form-data">
                    <div class="row  m-4">
                        <div class="col p-5  m-1" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">FIRST NAME</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="firstname" value="<?php echo $row[2] ?>" required />

                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">LAST NAME</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="lastname" value="<?php echo $row[3] ?>" required />

                            </div>
                        </div>

                        <div class="col p-5 m-1" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">PASSWORD</label>
                                <input type="password" id="form3Example9" class="form-control form-control-lg" name="password" value="<?php echo $row[1] ?>" required />

                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">EMAIL</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="email" value="<?php echo $row[4] ?>" readonly />

                            </div>
                        </div>

                    </div>


                    <div class="row m-4">
                        <div class="col p-5" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">DATE</label>
                                <input type="date" id="form3Example9" class="form-control form-control-lg" name="birtdate" value="<?php echo $row[5] ?>" required />

                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">PHONE</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="cpnumber" value="<?php echo $row[0] ?>" required />

                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">ADDRESS</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="address" value="<?php echo $row[7] ?>" required />

                            </div>
                        </div>
                    </div>



                    <input type="submit" class="btn btn-default form-control" name="user_update">
                </form>

            </div>

        </div>


    </section>


    <?php include 'includes/footer.php'; ?>
</body>

</html>
<?php include 'includes/scripts/preloader.php'; ?>