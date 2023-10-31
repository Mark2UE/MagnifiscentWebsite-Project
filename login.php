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

    <title>LOGIN</title>

</head>

<body>
    <?php
    include 'includes/navbar-selector.php'; ?>

    <section class="text-center text-lg-start" style="height:100vh; padding-top:100px;">
        <style>
            .cascading-right {
                margin-right: -50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
                }
            }
        </style>

        <!-- Jumbotron -->
        <div class="container py-4">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card cascading-right" style="
            background: hsla(0, 0%, 50%, 0.55);
            backdrop-filter: blur(.1px);
            ">
                        <div class="card-body p-5 shadow-5 text-center text-white">
                            <h2 class="fw-bold mb-5">LOGIN NOW</h2>
                            <form action="validation.php" method="post">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example1" class="form-control" name="email" required />
                                            <label class="form-label" for="form3Example1">EMAIL</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4" class="form-control" name="password" required />
                                    <label class="form-label" for="form3Example4">PASSWORD</label>
                                </div>




                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="submit">
                                    Sign up
                                </button>

                                <!-- Register buttons -->

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="css/IMAGE/thrifty.jpg" class="w-100 rounded-4 shadow-4" alt="" />
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

    <?php include 'includes/footer.php'; ?>
</body>


</html>
<?php include 'includes/scripts/preloader.php'; ?>