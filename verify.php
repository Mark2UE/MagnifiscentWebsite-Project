<?php
session_start();
include "database/database.php";

include "includes/remain.php";

$EMAIL = $_SESSION['lemail'];
$phone =  $_SESSION['lfname'];

?>

<html>

<head>
    <title>Enter your OTP Code</title>

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

</head>


<body>
    <section class="container p-5" style="margin-top: 200px;">
        <div class="p-5" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <form method="post">

                <center>
                    <h1>Email Code Has been sent to:</h1>
                    <h2 class="p4"><?php echo "$EMAIL"; ?></h2>
                </center>
                <input type="number" name="verifycode" class="form-control"><br>
                <CENter>
                    <input type="submit" name="verify" value="Verify" class="btn btn-default btn-lg">
                    <input type="submit" class="btn btn-default btn-lg" name="resend" value="Resend">
                </CENter>
                <?php include 'includes/insert.php'; ?>
            </form>
        </div>
    </section>






</body>

</html>

<?php include 'includes/scripts/preloader.php'; ?>