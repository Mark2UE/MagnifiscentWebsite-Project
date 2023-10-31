<?php
if (empty($_POST['firstname'])) {
    $refirstname = '';
} else {
    if (isset($_POST['Register'])) {
        $refirstname = $_POST['firstname'];
    }
}
?>
<?php

if (empty($_POST['lastname'])) {
    $relastname = '';
} else {
    if (isset($_POST['Register'])) {
        $relastname = $_POST['lastname'];
    }
}
?>
<?php
if (empty($_POST['email'])) {
    $reemail = '';
} else {
    if (isset($_POST['Register'])) {
        $reemail = $_POST['email'];
    }
}
?>
<?php
if (empty($_POST['birth'])) {
    $rebirth = '';
} else {
    if (isset($_POST['Register'])) {
        $rebirth = $_POST['birth'];
    }
}
?>
<?php
if (empty($_POST['phoneno'])) {
    $rephoneno = '';
} else {
    if (isset($_POST['Register'])) {
        $rephoneno = $_POST['phoneno'];
    }
}

?>

<?php
if (empty($_POST['address'])) {
    $address = '';
} else {
    if (isset($_POST['Register'])) {
        $address = $_POST['address'];
    }
}

?>