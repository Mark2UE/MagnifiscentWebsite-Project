<?php

$email = $_SESSION['email'];
include 'database/database.php';


$sqlresult = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'");
$row = mysqli_fetch_array($sqlresult);

function displayCart()
{
    $email = $_SESSION['email'];
    include 'database/database.php';
    $sqlresult1 = mysqli_query($conn, "select * from cart,bottle_tbl,perfume_tbl WHERE cart.user_email = '$email' AND bottle_tbl.bottle_id = cart.bottle_id AND perfume_tbl.perfume_id = cart.perfume_id and cart.status = 'add to cart'");
    while ($row1 = mysqli_fetch_array($sqlresult1)) {
        echo '

        <a href="update-cart.php?cartID=' . $row1[0] . '" class="card" style="width:500px;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                        <div>
                            <img src="data:image/jpeg;base64,' . base64_encode($row1[17]) . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div>
                            <img src="data:image/jpeg;base64,' . base64_encode($row1[11]) . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        
                        <div class="ms-3">
                            <h5>' . $row1[15] . '</h5>
                            <p class="small mb-0">' . $row1[8] . '</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <div style="width: 80px;">
                            <h5 class="mb-0">₱' . $row1[5] . '</h5>
                        </div>
                    </div>
                </div>
            </div>
        </a>';
    }
}

?>

<nav class="navbar navbar-expand-lg fixed-top background-nav" style="box-shadow: 1px 21px 39px -13px rgba(142,123,255,0.72);
-webkit-box-shadow: 1px 21px 39px -13px rgba(142,123,255,0.72);
-moz-box-shadow: 1px 21px 39px -13px rgba(142,123,255,0.72); background-color: #1c2331;">
    <div class="container py-1 fs-4">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand fs-2  text-white" href="index.php" id="liveToastBtn"><b>MAGNIFISCENT PERFUME</b></a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">

                </li>
                <li class="nav-item">

                </li>
                <li class="nav-item"> </li>
            </ul>
            <form class="d-flex" role="search">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item  text-white mx-1">
                        <a class="nav-link  text-white" aria-current="page" href="perfumes.php" id="liveToastBtn">Shop</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link  text-white" href="contacts.php" id="liveToastBtn">Contacts</a>
                    </li>


                    <li class="nav-item dropdown  text-white mx-1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle  text-white"></i>
                        </a>

                        <ul class="dropdown-menu" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <li class="px-5 text-dark"> <b><?php echo $row[4] ?></b></li>
                            <li><a class="dropdown-item" href="account-settings.php">Account Settings</a></li>
                            <li><a class="dropdown-item" href="purchases.php">My Purchases</a></li>
                            <li><a class="dropdown-item" href="validation.php?logout=true">Log out</a></li>


                        </ul>
                    </li>

                    <li class="nav-item dropdown  text-white mx-1">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-cart text-white"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end bg-dark text-white" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

                            <?php echo displayCart() ?>
                            <li><a class="dropdown-item text-white" href="cart.php">View Cart</a></li>


                        </ul>
                    </li>



                </ul>
            </form>
        </div>

    </div>

</nav>