<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/scripts/essentials.php' ?>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">



    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>REGISTER</title>

</head>
<style>
    .card {
        background-image: url('css/IMAGE/signupback.jpg');

        background-repeat: no-repeat;
        background-size: cover;
        position: static;
    }
</style>

<body>
    <?php
    include 'includes/navbar-selector.php';
    ?>
    <section class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="css/IMAGE/logo1.png" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h1 class="mb-5 text-uppercase">User Registration</h1>
                                    <?php include "includes/remain.php"; ?>
                                    <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                        <b>

                                            <center>
                                                <div class="form-outline mb-4">
                                                    <input type="text" id="form3Example9" class="form-control form-control-lg" name="firstname" required />
                                                    <label class="form-label" for="form3Example9">First Name</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="text" id="form3Example9" class="form-control form-control-lg" name="lastname" required />
                                                    <label class="form-label" for="form3Example9">Last name</label>
                                                </div>



                                                <div class="form-outline mb-4">
                                                    <input type="text" id="form3Example99" class="form-control form-control-lg" name="address" required />
                                                    <label class="form-label" for="form3Example99">Address</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="date" id="form3Example99" class="form-control form-control-lg" name="birth" max="2003-12-31" min="1942-01-01" required />
                                                    <label class="form-label" for="form3Example99">Birthdate</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="text" id="form3Example99" class="form-control form-control-lg" name="phoneno" required />
                                                    <label class="form-label" for="form3Example99">Phone Number</label>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <input type="text" id="form3Example97" class="form-control form-control-lg" name="email" required />
                                                    <label class="form-label" for="form3Example97">Email</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="password" id="password" class="form-control form-control-lg" required />
                                                    <label class="form-label" for="form3Example90">Password</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="password" name="PassWord" id="confirm_password" class="form-control form-control-lg" onkeyup='check();' required />
                                                    <label class="form-label" for="form3Example90">Confirm Password</label>
                                                    <span id='message'></span>
                                                </div>
                                                <input type="text" class="form-control txtbox1" id="code" value="text" name="code" hidden>
                                                <div class="d-flex justify-content-end pt-3">
                                                    <div class="d-flex justify-content-end pt-3">
                                                        <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                                                        <button type="submit" id="button" name="Register" class="btn btn-warning btn-lg ms-2" onClick='return confirmSubmit()'>Register</button>
                                                    </div><!-- form-group// -->

                                                    <?php
                                                    include "includes/insert.php";

                                                    include "includes/remain.php";
                                                    ?>

                                                </div>
                                            </center>

                                        </b>
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
        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matched';
                document.getElementById('button').disabled = false;
            } else {
                document.getElementById('button').disabled = true;
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matched';
            }
        }
    </script>
    <script>
        let text = "";

        for (let i = 0; i < 6; i++) {
            text += Math.floor(Math.random() * 10);
        }

        document.getElementById("code").value = text;
    </script>
    <?php include 'includes/footer.php'; ?>
</body>


</html>
<?php include 'includes/scripts/preloader.php'; ?>