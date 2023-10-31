<?php
include 'database-admin/database.php';
session_start();
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


















if (isset($_POST['c_add']) === true) {

    $image1 = $_FILES['image1']['tmp_name'];
    $img1 = addslashes(file_get_contents($image1));
    $gender = $_POST['p_gender'];
    $name = $_POST['p_name'];
    $availability = "ON";
    $desc = $_POST['s_description'];

    //check duplication of name
    $sqlresult = mysqli_query($conn, "select * from perfume_tbl WHERE perfume_name = '$name'");
    $row = mysqli_fetch_array($sqlresult);
    if ($row[1] === $name) {
        echo '<script>
        alert("THE PERFUME NAME IS ALREADY EXISTING PLEASE TRY AGAIN"); 
        window.location.href = "perfume_options.php";
        </script>';
    } else {
        $sqlresult = mysqli_query($conn, "INSERT INTO `perfume_tbl`(`perfume_id`, `perfume_name`, `availability`, `image`,`p_gender`,`perfume_descrition`) 
        VALUES ('','$name','$availability','$img1','$gender','$desc')");
        if (!$sqlresult) {
            printf("Error: %s\n", mysqli_error($conn));
        } else {

            echo '<script>
            alert("THE PERFUME HAS BEEN REGISTERED TO THE SYSTEM"); 
            window.location.href = "perfume_options.php";
            </script>';
        }
    }
} elseif (isset($_GET['deleteID']) === true) {

    $deletecode =  $_GET['deleteID'];
    $sqlresult = mysqli_query($conn, "DELETE FROM `perfume_tbl` WHERE perfume_id =  $deletecode");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
       alert("THE PERFUME HAS BEEN DELETED"); 
       window.location.href = "perfume_options.php";
       </script>';
    }
} elseif (isset($_POST['update_perfume']) === true) {

    $perfumeID =  $_POST['perfumeID'];
    $perfume_name =  $_POST['update_name'];
    $availability = $_POST['p_avail'];
    $gender = $_POST['p_gender'];
    $desc = $_POST['update_desc'];

    $image1 = $_FILES['image1']['tmp_name'];
    $img1 = addslashes(file_get_contents($image1));

    if ($image1 == "") {
        $sqlresult = mysqli_query($conn, "UPDATE `perfume_tbl` SET `perfume_name`='$perfume_name',`availability`='$availability',`p_gender` = '$gender', `perfume_descrition`=' $desc' WHERE `perfume_id` = $perfumeID");
    } else {
        $sqlresult = mysqli_query($conn, "UPDATE `perfume_tbl` SET `perfume_name`='$perfume_name',`availability`='$availability',`image`='$img1',`p_gender` = '$gender',`perfume_descrition`=' $desc' WHERE `perfume_id` = $perfumeID");
    }


    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
           alert("THE PERFUME HAS BEEN UPDATED"); 
           window.location.href = "perfume_options.php";
           </script>';
    }
} elseif (isset($_POST['c_addBottle']) === true) {

    $b_image1 = $_FILES['b_image1']['tmp_name'];
    $img1 = addslashes(file_get_contents($b_image1));

    $b_name = $_POST['b_name'];
    $b_size = $_POST['b_size'];
    $b_qty = $_POST['b_qty'];
    $availability = "ON";
    $price = $_POST['b_prc'];
    $desc = $_POST['b_desc'];



    //check duplication of name
    $sqlresult = mysqli_query($conn, "select * from bottle_tbl WHERE bottle_name = '$b_name'");
    $row = mysqli_fetch_array($sqlresult);
    if ($row[1] === $b_name) {
        echo '<script>
        alert("THE BOTTLE NAME IS ALREADY EXISTING PLEASE TRY AGAIN"); 
        window.location.href = "add-bottle.php";
        </script>';
    } else {
        $sqlresult = mysqli_query($conn, "INSERT INTO `bottle_tbl`(`bottle_id`,`bottle_name`,`bottle_size`,`bottle_quantity`,`image_bottle`,`bottle_price`, `bottle_desc`) 
        VALUES ('','$b_name ','$b_size','$b_qty','$img1','$price','$desc')");
        if (!$sqlresult) {
            printf("Error: %s\n", mysqli_error($conn));
        } else {
            echo '<script>
            alert("THE BOTTLE HAS BEEN REGISTERED TO THE SYSTEM"); 
            window.location.href = "bottle_options.php";
            </script>';
        }
    }
} elseif (isset($_POST['update_bottle']) === true) {

    $b_image1 = $_FILES['image_bottle']['tmp_name'];
    $img1 = addslashes(file_get_contents($b_image1));

    $bottle_id = $_POST['bottleID'];
    $bottle_name = $_POST['bottle_name'];
    $bottle_size = $_POST['update_size'];
    $bottle_qty = $_POST['update_qty'];
    $price = $_POST['bottle_price'];
    $desc = $_POST['bottle_desc'];


    if ($b_image1 == "") {
        $sqlresult = mysqli_query($conn, "UPDATE `bottle_tbl` SET `bottle_name`='$bottle_name',`bottle_size`='$bottle_size',`bottle_quantity`='$bottle_qty' ,`bottle_price`='$price',`bottle_desc`='$desc' WHERE `bottle_id`='$bottle_id'");
    } else {
        $sqlresult = mysqli_query($conn, "UPDATE `bottle_tbl` SET `bottle_name`='$bottle_name',`bottle_size`='$bottle_size',`bottle_quantity`='$bottle_qty' ,`image_bottle`='$img1',`bottle_price`='$price',`bottle_desc`='$desc' WHERE `bottle_id`='$bottle_id'");
    }


    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
           alert("THE BOTTLE HAS BEEN UPDATED"); 
           window.location.href = "bottle_options.php";
           </script>';
    }
} elseif (isset($_GET['Bottle_deleteID']) === true) {

    $bottle_id = $_GET['Bottle_deleteID'];
    $sqlresult = mysqli_query($conn, "DELETE FROM `bottle_tbl`  WHERE `bottle_id`='$bottle_id'");


    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
           alert("THE BOTTLE HAS BEEN DELETED"); 
           window.location.href = "bottle_options.php";
           </script>';
    }
} elseif (isset($_POST['user_add']) === true) {

    $address = $_POST['address'];
    $cpnumber = $_POST['cpnumber'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $birthdate = $_POST['birtdate'];
    $status = "ADMIN REGISTERED";


    $sqlresult = mysqli_query($conn, "INSERT INTO `user` (`cpnumber`, `password`, `firstname`, `lastname`, `email`, `birtdate`, `status`,`address`) VALUES ('$cpnumber', '$password', '$firstname', '$lastname', '$email', '$birthdate', '$status',' $address')");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
           alert("THE USER HAS BEEN ADDED"); 
           window.location.href = "user_option.php;
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
           window.location.href = "user_option.php";
           </script>';
    }
} elseif (isset($_GET['user_delete_email']) === true) {

    $deletecodeEmail =  $_GET['user_delete_email'];
    $sqlresult = mysqli_query($conn, "DELETE FROM `user` WHERE `email` = '$deletecodeEmail'");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
       alert("THE USER HAS BEEN DELETED"); 
       window.location.href = "user_option.php";
       </script>';
    }
} elseif (isset($_GET['Accept'])) {

    $AcceptedGcash = $_GET['Accept'];


    $sqlresult = mysqli_query($conn, "UPDATE `billing_tbl` SET `payment_status`='ACCEPTED',`status`='preparing' WHERE `billing_id` = '$AcceptedGcash'");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {







        $sqlresult2 = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE `billing_id` = '$AcceptedGcash' ");
        $row2 = mysqli_fetch_array($sqlresult2);


        //assign rider table


        $rider = mysqli_query($conn, "INSERT INTO `rider`(`rider_id`, `billing_id`, `cart_id`) VALUES ('','$AcceptedGcash','$row2[9]')");










        $Email = $_SESSION['email'];
        $cartID = $row2[9];

        include "database/database.php";





        $AcceptedGcash = $_GET['Accept'];
        $sqlresult1 = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE `billing_id` = '$AcceptedGcash' ");
        $row1 = mysqli_fetch_array($sqlresult1);





        //Recipients
        $mail->setFrom('MagnifiscentPerfume@gmail.com', 'MagnifiscentPerfume');

        $mail->addAddress('' .   $row1[1] . '');               //Name is optional
        $mail->addReplyTo('' .   $row1[1] . '', 'MagnifiscentPerfume');
        $mail->addCC('MagnifiscentPerfume@gmail.com');
        $mail->addBCC('MagnifiscentPerfume@gmail.com');

        $mail->Subject = 'Your Receipt';
        $mail->Body = '<body style="border: 0;
    box-sizing: content-box;
    color: black;
    font-size: 20px;
    background-color: #8BC6EC;
    background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
    list-style: none;
    padding: 50px;">
    <h1 style=" font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase;">Magnifiscent Perfume Station Email</h1>
    <address contenteditable>
        <p>Magnifiscent Perfume Station Receipt</p>
    </address>
    <p>Billing ID:' . $row1[0] . ' </p>
    <p>Cart Code:' . $row1[9] . ' </p>

    <h5>Hello ' . $row1[1] . ' This is your Receipt</h5>
    <table style = "border: 1px solid black;
    border-collapse: collapse;">
        <tr  style = "border: 1px solid black;
        border-collapse: collapse;">
            <th  style = "border: 1px solid black;
            border-collapse: collapse;">Perfume Name</th>
            <th  style = "border: 1px solid black;
            border-collapse: collapse;">Bottle Name</th>
            <th  style = "border: 1px solid black;
            border-collapse: collapse;">Bottle Size</th>
            <th  style = "border: 1px solid black;
            border-collapse: collapse;">Quantity</th>
            <th  style = "border: 1px solid black;
            border-collapse: collapse;">Amount</th>
        </tr>';
        $sqlresult = mysqli_query($conn, "SELECT * FROM `cart_to_billing`,`perfume_tbl`,`bottle_tbl`
        WHERE cart_to_billing.user_email = '$Email' AND perfume_tbl.perfume_id = cart_to_billing.perfume_id  AND bottle_tbl.bottle_id = cart_to_billing.bottle_id AND cart_to_billing.ctb_id = '$cartID'");

        while ($row = mysqli_fetch_array($sqlresult)) {
            $mail->Body .= '<tr  style = "border: 1px solid black;
            border-collapse: collapse;">
        <td  style = "border: 1px solid black;
        border-collapse: collapse;">' . $row[7] . '</td>
        <td  style = "border: 1px solid black;
        border-collapse: collapse;">' . $row[13] . '</td>
        <td  style = "border: 1px solid black;
        border-collapse: collapse;">' . $row[14] . '</td>
        <td  style = "border: 1px solid black;
        border-collapse: collapse;">x' . $row[3] . '</td>
        <td  style = "border: 1px solid black;
        border-collapse: collapse;">' . $row[17] . '</td>
    </tr>';
        }
        $mail->Body .= '</table>  
    <aside>
        <h1><span contenteditable>TOTAL AMOUNT OF: ₱' . $row1[2] . '</span></h1>
        <p>Please Proceed to "My Purchases > to SHIP" to confirm your delivering process</p>
    </aside>
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












        //NEED TO UPDATE THE QUANTITY BOTTLE BASED ON
        $crt = mysqli_query($conn, "SELECT * FROM `cart_to_billing` WHERE `ctb_id` = '$row2[9]'");
        while ($crt_qty = mysqli_fetch_array($crt)) {
            $upd_qty = mysqli_query($conn, "UPDATE `bottle_tbl` SET `bottle_quantity`= `bottle_quantity` - '$crt_qty[3]' WHERE `bottle_id` = '$crt_qty[2]'");
        }







        echo '<script>
       alert("ACCEPTED"); 
       window.location.href = "gcash-confirmation.php";
       </script>';
    }
} elseif (isset($_GET['Reject'])) {

    $AcceptedGcash = $_GET['Reject'];


    $sqlresult = mysqli_query($conn, "UPDATE `billing_tbl` SET `payment_status`='REJECT', `gcash_screenshot`= '' WHERE `billing_id` = '$AcceptedGcash'");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
       alert("REJECTED"); 
       window.location.href = "gcash-confirmation.php";
       </script>';
    }
} elseif (isset($_GET['Delete_process'])) {

    $delete_billing = $_GET['Delete_process'];


    $sqlresult = mysqli_query($conn, "DELETE FROM `billing_tbl` WHERE  `billing_id` = '$delete_billing'");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {


        echo '<script>
       alert("DELETED!"); 
       window.location.href = "prepare-parcel.php";
       </script>';
    }
} elseif (isset($_GET['update_status_preparing'])) {
    //UPDATING PREPARING TO  SEARCHING
    $code_update = $_GET['update_status_preparing'];


    $sqlresult = mysqli_query($conn, "UPDATE `billing_tbl` SET `status`='searching' WHERE`billing_id` = '$code_update'");

    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {

        $sqlresult1 = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE`billing_id` = '$code_update'");
        $row2 = mysqli_fetch_array($sqlresult1);




        $mail->setFrom('MagnifiscentPerfume@gmail.com', 'MagnifiscentPerfume');

        $mail->addAddress('' .   $row2[1] . '');               //Name is optional
        $mail->addReplyTo('' .   $row2[1] . '', 'MagnifiscentPerfume');
        $mail->addCC('MagnifiscentPerfume@gmail.com');
        $mail->addBCC('MagnifiscentPerfume@gmail.com');

        $mail->Subject = 'Searching for Delivery Driver';
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
    <center> 
    <h2>Hello ' . $row2[1] . ' your Billing ID:' . $row2[0] . ' <br> is now Searching for Delivery Driver. <br> Please prepare for delivery fee, <br> we will notify you via email again.<br><br>
    <br>login to our website to get the latest  <br>updates on your transaction</h2>
    </center>
    <aside>
        <p>Please Proceed to "My Purchases > to SHIP" to Check your transaction</p>
    </aside>
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
       alert("Parcel Preparing Done!"); 
       window.location.href = "prepare-parcel.php";
       </script>';
    }
} elseif (isset($_POST['rider_update'])) {


    $delfee = $_POST['delfee'];
    $deltype = $_POST['deliverytype'];
    $drivername = $_POST['drivername'];
    $drivercontact = $_POST['drivercont'];
    $billingID = $_POST['billingid'];


    $sqlresult = mysqli_query($conn, "UPDATE `rider` SET `delivery_type`='$deltype',`delivery_fee`='$delfee',`driver_status`='forpickup',`driver_name`='$drivername',`driver_contact`='$drivercontact',`delivery_status`='forpickup' WHERE billing_id = '$billingID'");
    $sqlresult1 = mysqli_query($conn, "UPDATE `billing_tbl` SET `status`='OTW' WHERE `billing_id` = '$billingID'");




    if (!$sqlresult) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {

        $sqlresult1 = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE`billing_id` = '$billingID'");
        $row2 = mysqli_fetch_array($sqlresult1);



        $mail->setFrom('MagnifiscentPerfume@gmail.com', 'MagnifiscentPerfume');

        $mail->addAddress('' .   $row2[1] . '');               //Name is optional
        $mail->addReplyTo('' .   $row2[1] . '', 'MagnifiscentPerfume');
        $mail->addCC('MagnifiscentPerfume@gmail.com');
        $mail->addBCC('MagnifiscentPerfume@gmail.com');

        $mail->Subject = 'You Have a delivery driver!';
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
 
    <h2>Hello ' . $row2[1] . '<br> your Billing ID:' . $row2[0] . ' is for pick up,<br> please contact delivery driver: mr. ' . $drivername . '<br> and prepare for delivery fee ₱' . $delfee . '.
    <br>Delivery Driver Contact number: ' . $drivercontact . '
    <br>Delivery Driver Courier Type: ' . $deltype . '




    <br>login to our website to get the latest  <br>updates on your transaction</h2>

    <aside>
        <p>Please Proceed to "My Purchases > to SHIP" to Check your transaction</p>
    </aside>
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
       alert("You updated driver information"); 
       window.location.href = "prepare-parcel.php";
       </script>';
    }
} elseif (isset($_GET['pickup'])) {

    $pickupID = $_GET['pickup'];

    $sqlresult1 = mysqli_query($conn, "UPDATE `billing_tbl` SET `status`='ATTEMPTODELIVER' WHERE `billing_id`='$pickupID'");
    $sqlresult2 = mysqli_query($conn, "UPDATE `rider` SET `driver_status`='ATTEMPTODELIVER',`delivery_status`='ON-THE-WAY' WHERE `billing_id`='$pickupID'");
    if (!$sqlresult1 && !$sqlresult2) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {




        $sqlresult3 = mysqli_query($conn, "SELECT * FROM `billing_tbl` WHERE `billing_id` = '$pickupID'");
        $row2 = mysqli_fetch_array($sqlresult3);

        $sqlresult4 = mysqli_query($conn, "SELECT * FROM `rider` WHERE `billing_id` = '$pickupID'");
        $del = mysqli_fetch_array($sqlresult4);

        $mail->setFrom('MagnifiscentPerfume@gmail.com', 'MagnifiscentPerfume');

        $mail->addAddress('' .   $row2[1] . '');               //Name is optional
        $mail->addReplyTo('' .   $row2[1] . '', 'MagnifiscentPerfume');
        $mail->addCC('MagnifiscentPerfume@gmail.com');
        $mail->addBCC('MagnifiscentPerfume@gmail.com');

        $mail->Subject = 'Your cart id:' . $row2[9] . 'is on the way!';
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
 
    <h2>Hello ' . $row2[1] . '<br> your Billing ID:' . $row2[0] . ' your parcel is on the way to your home soon...</h2>

    <br>delivery driver: mr.' . $del[6] . '
    <br>delivery fee ₱' . $del[4] . '.
    <br>Delivery Driver Contact number: ' . $del[7] . '
    <br>Delivery Driver Courier Type: ' . $del[3] . '


    <br>login to our website to get the latest  <br>updates on your transaction</h2>
    <aside>
        <p>Please Proceed to "My Purchases > to RECEIVE" to Check your transaction</p>
    </aside>
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
        alert("Updating forms.."); 
        window.location.href = "prepare-parcel.php";
        </script>';
    }
}
