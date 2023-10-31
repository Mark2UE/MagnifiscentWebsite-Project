<nav class="navbar navbar-expand-lg  fixed-top" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; background-color: #1c2331;
">
    <div class="container py-1 fs-2">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand fs-2 text-white" style="text-shadow: -1px 7px 15px rgba(0,0,0,0.33);" href="index.php"><b>MAGNIFISCENT PERFUME</b></a>

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
                    <li class="nav-item mx-1">
                        <a class="nav-link active text-white" aria-current="page" href="perfumes.php">Shop</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-white" href="contacts.php">Contacts</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Log in</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>

</nav>



<div class="modal fade" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark">
            <div class="modal-header">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active  text-white" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Login in</button>
                        <button class="nav-link text-white" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Register</button>

                    </div>
                </nav>


            </div>
            <div class="modal-body">
                <div class="card-body p-5 shadow-5 text-center text-white">

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                            <form action="validation.php" method="post">
                                <h2 class="fw-bold mb-5">LOGIN NOW</h2>
                                <div class="form-floating mx-5 m-2">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                                    <label for="floatingInput" class="text-dark">Email address</label>
                                </div>
                                <div class="form-floating mx-5 m-2">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                                    <label for="floatingPassword" class="text-dark">Password</label>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-default" name="login" value="submit" placeholder="Sign in">Sign in </button>
                            </form>

                        </div>

                        <div class="tab-pane fade p-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <?php include "includes/remain.php"; ?>
                            <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                <b>

                                    <center>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="firstname" required />
                                                <label class="form-label" for="form3Example9">First Name</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="lastname" required />
                                                <label class="form-label" for="form3Example9">Last name</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <input type="text" id="form3Example99" class="form-control form-control-lg" name="address" required />
                                                <label class="form-label" for="form3Example99">Address</label>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col">
                                                <input type="date" id="form3Example99" class="form-control form-control-lg" name="birth" max="2003-12-31" min="1942-01-01" required />
                                                <label class="form-label" for="form3Example99">Birthdate</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" id="form3Example99" class="form-control form-control-lg" name="phoneno" required />
                                                <label class="form-label" for="form3Example99">Phone Number</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
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
                                            </div>
                                        </div>

                                        <input type="text" class="form-control txtbox1" id="code" value="text" name="code" hidden>
                                        <div class="d-flex justify-content-end pt-3">
                                            <div class="d-flex justify-content-end pt-3">
                                                <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                                                <button type="submit" id="button" name="Register" class="btn btn-default btn-lg ms-2" onClick='return confirmSubmit()'>Register</button>
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





            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>








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







<script>
    var modalButton = document.getElementById("modal-button");
    var myModal = new bootstrap.Modal(document.getElementById("exampleModal2"));


    var modalButton2 = document.getElementById("modal-button2");
    var myModal2 = new bootstrap.Modal(document.getElementById("exampleModal"));

    modalButton.addEventListener("click", function() {
        myModal.show();
        myModal2.hide();

    });

    modalButton2.addEventListener("click", function() {
        myModal2.show();
        myModal.hide();

    });


    var myModal_1 = new bootstrap.Modal(document.getElementById('myModal'));
    var myModal2_1 = new bootstrap.Modal(document.getElementById('myModal2'));

    function closeModal() {
        // Code to be executed when button is clicked

        myModal_1.hide();
        myModal2_1.hide();
    }
</script>