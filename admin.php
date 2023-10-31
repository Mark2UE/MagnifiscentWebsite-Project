<html>

<head>
    <title>Admin Login</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <?php include 'includes/scripts/essentials.php' ?>
</head>

<style>
    body {
        background-image: url('css/IMAGE/adminlogin.jpg');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: static;
    }

    .card {
        background-image: url('css/IMAGE/signupback.jpg');



        background-size: cover;

    }

    .card {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    }
</style>

<body>
    <section class="container p-5" style="margin-top: 100px;">
        <div class="card p-5">
            <form method="post" action="validation.php">

                <center>
                    <h1>ADMIN LOGIN:</h1>

                </center>
                <div class="form-outline mb-4">
                    <center>
                        <b>
                            <input type="text" id="form3Example9" class="form-control form-control-lg" name="user_admin" required />
                            <label class="form-label" for="form3Example9">Admin Username</label>
                            <input type="password" id="form3Example9" class="form-control form-control-lg" name="admin_pwd" required />
                            <label class="form-label" for="form3Example9">Admin Password</label>
                        </b>
                    </center>
                </div>

                <CENter>
                    <input type="submit" name="adminlogin" class="btn btn-primary btn-lg">

                </CENter>

            </form>
        </div>
    </section>






</body>

</html>
<?php include 'includes/scripts/preloader.php'; ?>