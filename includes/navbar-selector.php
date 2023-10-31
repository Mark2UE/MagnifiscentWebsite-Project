<?php

session_start();


if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    include 'includes/navbar-user.php';
} else {

    include 'includes/navigationBar-noaccount.php';
}
