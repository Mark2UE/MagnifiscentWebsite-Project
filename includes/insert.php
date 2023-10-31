<?php



error_reporting(E_ERROR | E_PARSE);
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'andalucia0922@gmail.com';
$mail->Password = 'riislwoqdjaapzsb';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

include 'database/database.php';


if (isset($_POST['Register'])) {

    $lowerf = strtolower($_POST['firstname']);
    $lowerl = strtolower($_POST['lastname']);

    $lFIRSTNAME = ucwords($lowerf);
    $lLASTNAME = ucwords($lowerl);
    $lEMAIL = $_POST['email'];
    $lBIRTHDAY = $_POST['birth'];
    $lPASSWORD = $_POST['PassWord'];
    $lCODE = $_POST['code'];
    $lPHONENO = $_POST['phoneno'];
    $VERIFY = $_POST['verified'];
    $ADDRESS = $_POST['address'];




    //$lPRONO = $_POST['prodno'];
    $_SESSION['address'] = $ADDRESS;
    $_SESSION['status'] = $VERIFY;
    $_SESSION['lfname'] = $lFIRSTNAME;
    $_SESSION['llname'] = $lLASTNAME;
    $_SESSION['lemail'] = $lEMAIL;
    $_SESSION['lbday'] = $lBIRTHDAY;
    $_SESSION['lpass'] = $lPASSWORD;
    $_SESSION['lphone'] = $lPHONENO;
    $_SESSION['code'] = $lCODE;
    $_SESSION['id'] = '';
    $_SESSION['firstname'] = '';

    $sql = "SELECT email FROM user WHERE email = '$lEMAIL'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo '<script>
    alert("Sorry, Email already registered")
</script>';
    } else {
        $sql = "SELECT email FROM user WHERE email = '$lEMAIL'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            echo '<script>
    alert("Email is already registered")
</script>';
        } else {

            $EMAIL = $_SESSION['lemail'];
            $NAME = $_SESSION['lfname'];
            $CODE = $_SESSION['code'];
            date_default_timezone_set('Hongkong');
            $datenow = date("Y-m-d");

            include 'email.php';

            echo '<script>
    window.location.href = "verify.php";
</script>';
        }
    }
}

if (isset($_POST['resend'])) {
    $EMAIL = $_SESSION['lemail'];
    $NAME = $_SESSION['lfname'];
    $CODE = $_SESSION['code'];


    date_default_timezone_set('Hongkong');
    $datenow = date("Y-m-d");

    include 'email-resend.php';

    echo '<script> 
              
                window.location.href = "verify.php";
                </script>';
}


if (isset($_POST['verify'])) {


    $CODE = $_SESSION['code'];
    $VERIFY = $_SESSION['status'];
    $FIRSTNAME =  $_SESSION['lfname'];
    $LASTNAME = $_SESSION['llname'];
    $EMAIL = $_SESSION['lemail'];
    $BIRTHDAY = $_SESSION['lbday'];

    $PASSWORD = $_SESSION['lpass'];

    $ADDRESS = $_SESSION['address'];

    $PHONE = $_SESSION['lphone'];
    //$PRONO = $_POST['prodno'];



    $vercode = $_POST['verifycode'];
    if ($vercode == $CODE) {

        $sql = "INSERT INTO `user`(`cpnumber`,`password`,`firstname`,`lastname`,`email`,`birtdate`,`status`,`address`) 
    VALUES ('" .  $PHONE . "','" .  $PASSWORD . "','" . $FIRSTNAME . "','" .  $LASTNAME . "','" .  $EMAIL . "','" . $BIRTHDAY . "','" . $VERIFY . "','" . $ADDRESS . "') ";

        if ($conn->query($sql) === TRUE) {

            $sql = "SELECT * FROM user WHERE email = '$EMAIL' AND password = '$PASSWORD'";
            $result = mysqli_query($conn, $sql);

            while ($row = $result->fetch_assoc()) {
                $_SESSION['id'] = $row["email"];
            }


            $_SESSION['email'] =  $_SESSION['lemail'];
            $_SESSION['password'] = $_SESSION['lpass'];

            echo '<script>
                 alert("Register Successful!"); 
                 window.location.href = "index.php";
                 </script>';
        } else {
            echo "<font style='font-size:16px; color:#bc4749; margin-top:20px'>Error Inserting Data: " . $conn->error . "</font>";
        }
    } else {
        echo '<script>alert("Incorrect Verification code");</script>';
    }
}
