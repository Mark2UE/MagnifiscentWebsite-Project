<?php
session_start();



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

include 'database/database.php';
error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['login']) === true) {
    $email = $_POST['email'];
    $user_password = $_POST['password'];

    $sqlresult = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email' AND `password`= '$user_password' ");
    $row = mysqli_fetch_array($sqlresult);



    if ($row[4] == $email && $row[1] == $user_password) {
        $_SESSION['email'] =  $email;
        $_SESSION['password'] = $user_password;

        echo '<script>
        alert("Login Successfully!"); 
        window.location.href = "index.php";
        </script>';
    } else {
        echo '<script>
        alert("Wrong Email or Password!"); 
        window.location.href = "index.php";
        </script>';
    }
} elseif (isset($_GET['logout'])) {
    session_destroy();


    echo '<script>
        alert("Account logged out successfully"); 
        window.location.href = "index.php#NotShow";
        </script>';
} elseif (isset($_POST['adminlogin'])) {

    $Admin = $_POST['user_admin'];
    $Pass = $_POST['admin_pwd'];



    if ($Admin === "Admin" && $Pass === "Admin") {
        echo '<script>
        alert("Login Admin Successfully"); 
        window.location.href = "admin/index.php";
        </script>';
    } else {
        echo '<script>
        alert("Wrong Admin username or password"); 
        window.location.href = "admin.php";
        </script>';
    }
} elseif (isset($_POST['add-to-cart'])) {


    $PERID = $_POST['PerfID'];
    $BOTID = $_POST['botID'];
    $TOTAL = $_POST['total'];
    $QTY = $_POST['quantity'];
    $USER = $_SESSION['email'];
    $status = "add to cart";


    $sqlresult = mysqli_query($conn, "SELECT COUNT(*) FROM `cart` WHERE user_email ='$USER' AND perfume_id = '$PERID' AND bottle_id = '$BOTID'");
    $row = mysqli_fetch_array($sqlresult);


    if ($row[0] === '1') {


        $sqlresult1 = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_email ='$USER' AND perfume_id = '$PERID' AND bottle_id = '$BOTID'");
        $row1 = mysqli_fetch_array($sqlresult1);


        if ($TOTAL == 0) {
            echo '<script>
        alert("Please put quantity"); 
        window.location.href = "add-to-cart.php?perfumeID=' . $PERID . '&bottleID=' . $BOTID . '";
        </script>';
        } else {

            $sqlresult = mysqli_query($conn, "UPDATE `cart` SET `bottle_qty` = `bottle_qty`+ '$QTY', `price` = `price`+ '$TOTAL' WHERE cart_id = '$row1[0]' AND user_email = '$USER' ");

            if (!$sqlresult) {
                printf("Error: %s\n", mysqli_error($conn));
            } else {


                echo '<script>
           alert("Updating your cart"); 
           window.location.href = "cart.php";
           </script>';
            }
        }
    } else {




        if ($TOTAL == 0) {
            echo '<script>
        alert("Please put quantity"); 
        window.location.href = "add-to-cart.php?perfumeID=' . $PERID . '&bottleID=' . $BOTID . '";
        </script>';
        } else {

            $sqlresult = mysqli_query($conn, "INSERT INTO `cart`(`cart_id`, `user_email`, `perfume_id`, `bottle_id`, `bottle_qty`, `price`, `status`) VALUES ('','$USER','$PERID','$BOTID','$QTY','$TOTAL','$status')");

            if (!$sqlresult) {
                printf("Error: %s\n", mysqli_error($conn));
            } else {


                echo '<script>
           alert("Product has been added to your cart"); 
           window.location.href = "cart.php";
           </script>';
            }
        }
    }
} elseif (isset($_POST['update-to-cart'])) {



    $Qty = $_POST['quantity'];
    $price = $_POST['total'];
    $CartID = $_POST['cartID'];


    if ($price == 0) {
        $sqlresult = mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$CartID'");
        echo '<script>
        alert("Deleting your cart"); 
        window.location.href = "cart.php";
        </script>';
    } else {

        if ($price == '') {
            echo '<script>
           alert("No update on cart"); 
           window.location.href = "cart.php";
           </script>';
        } else {

            $sqlresult = mysqli_query($conn, "UPDATE `cart` SET `bottle_qty`='$Qty',`price`='$price'WHERE cart_id = '$CartID'");

            if (!$sqlresult) {
                printf("Error: %s\n", mysqli_error($conn));
            } else {


                echo '<script>
           window.location.href = "cart.php";
           </script>';
            }
        }
    }
} elseif (isset($_GET['DeletecartID'])) {

    $CartID = $_GET['DeletecartID'];
    $sqlresult = mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = $CartID");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
       alert("Product has been Deleted to your cart"); 
       window.location.href = "cart.php";
       </script>';
    }
} elseif (isset($_POST['billing_prc'])) {
    function generateRandomID()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $id = '';
        for ($i = 0; $i < 8; $i++) {
            $id .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $id;
    }



    $Email =  $_SESSION['email'];
    $amount =  $_POST['amount'];




    $paymentstatus = 'PENDING';
    $paymentType = 'gcash';
    $BillStatus = 'none';
    $PendingBilling = "pending to billing";
    $card_id = $_POST['cart_id'];



    $CREATEIDBILLING = generateRandomID();

    $sqlresult = mysqli_query($conn, "INSERT INTO `billing_tbl`(`billing_id`, `customer_email`, `amount`, `payment_status`, `payment_type`,`status`,`cart_code`) 
    VALUES ('','$Email','$amount','$paymentstatus','$paymentType','$BillStatus','$CREATEIDBILLING')");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {

        $sqlresult2 = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_email = '$Email'");
        while ($row = mysqli_fetch_array($sqlresult2)) {
            $sqlresult3 = mysqli_query($conn, "INSERT INTO `cart_to_billing`(`ctb_id`, `perfume_id`, `bottle_id`, `qty`, `amount`,`user_email`) VALUES ('$CREATEIDBILLING','$row[2]','$row[3]','$row[4]','$row[5]','$Email')");
        }

        if (!$sqlresult2) {
            printf("Error: %s\n", mysqli_error($conn));
        } else {
            //$sqlresult4 = mysqli_query($conn, "DELETE FROM `cart` WHERE user_email = '$Email'");
            echo '<script>
            alert("Has been added to your billing page"); 
            window.location.href = "purchases.php";
            </script>';
        }
    }
} elseif (isset($_GET['Deletecartcode'])) {
    $cart_code = $_GET['Deletecartcode'];
    $sqlresult = mysqli_query($conn, "DELETE FROM `billing_tbl` WHERE cart_code ='$cart_code'");
    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {
        //$sqlresult4 = mysqli_query($conn, "DELETE FROM `cart` WHERE user_email = '$Email'");
        echo '<script>
        alert("Has been deleted to your billing page"); 
        window.location.href = "purchases.php";
        </script>';
    }
} elseif (isset($_POST['upload_gcash'])) {

    $b_image1 = $_FILES['image1']['tmp_name'];
    $img1 = addslashes(file_get_contents($b_image1));



    $cart_code = $_POST['cart_code'];



    $sqlresult = mysqli_query($conn, "UPDATE `billing_tbl` SET `payment_status` ='PAYMENT IS ON PROCESS', `gcash_screenshot`='$img1' WHERE `cart_code` = '$cart_code'");
    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
       alert("Your Payment is on process.."); 
       window.location.href = "purchases.php";
       </script>';
    }
} elseif (isset($_POST['user_update']) === true) {

    $address = $_POST['address'];
    $cpnumber = $_POST['cpnumber'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $birthdate = $_POST['birtdate'];
    $status = "VALID";


    $sqlresult = mysqli_query($conn, "UPDATE `user` SET `cpnumber`=' $cpnumber',`password`='$password',`firstname`='$firstname',`lastname`='$lastname',`email`='$email',`birtdate`='$birthdate',`status`='$status',`address` = '$address' WHERE `email`='$email'");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
           alert("THE USER HAS BEEN UPDATED"); 
           window.location.href = "account-settings.php";
           </script>';
    }
} elseif (isset($_POST['parcel_rcvd'])) {

    $billingID = $_POST['billing_id'];
    $sqlresult1 = mysqli_query($conn, "UPDATE `billing_tbl` SET `status`='COMPLETED' WHERE `billing_id`='$billingID'");
    $sqlresult2 = mysqli_query($conn, "UPDATE `rider` SET `driver_status`='COMPLETED',`delivery_status`='COMPLETED' WHERE `billing_id`='$billingID'");
    if (!$sqlresult1 && !$sqlresult2) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {




        $sqlresult3 = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE `billing_id` = '$billingID'");
        $row2 = mysqli_fetch_array($sqlresult3);

        $sqlresult4 = mysqli_query($conn, "SELECT * FROM `rider` WHERE `billing_id` = '$billingID'");
        $del = mysqli_fetch_array($sqlresult4);

        $mail->setFrom('MagnifiscentPerfume@gmail.com', 'MagnifiscentPerfume');

        $mail->addAddress('' .   $row2[1] . '');               //Name is optional
        $mail->addReplyTo('' .   $row2[1] . '', 'MagnifiscentPerfume');
        $mail->addCC('MagnifiscentPerfume@gmail.com');
        $mail->addBCC('MagnifiscentPerfume@gmail.com');

        $mail->Subject = 'Your cart id:' . $row2[9] . 'is Completed!';
        $mail->Body = '<body style="border: 0;
    box-sizing: content-box;
    color: black;
    font-size: 20px;
    background-color: #8BC6EC;
    background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
    list-style: none;
    padding: 50px;">
    <h1 style=" font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase;">Magnifiscent Perfume Station</h1>
    <address contenteditable>
        <p>Magnifiscent Perfume Station</p>
    </address>

    <p>Billing ID:' . $row2[0] . ' </p>
    <p>Cart Code:' . $row2[9] . ' </p>
    
    Your Transaction is Completed, Thank you for trusting Magnifiscent Perfume Station!


    <br>login to our website to get the latest  <br>updates on our Perfumes</h2>
   
</body>';



        $mail->AltBody = 'HTML messaging not supported';

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->send();

        echo '<script>
        alert("Item is Received! Thank you for trusting magnifiscent"); 
        
        window.location.href = "receiving.php?cartcode=' . $row2[9] . '";
        </script>';
    }
}
