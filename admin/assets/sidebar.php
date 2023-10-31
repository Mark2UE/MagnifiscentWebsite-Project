<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark ">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 sticky-top">
                    <a href="index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline" id="time">Magnifiscent | Admin</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline ">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="perfume_options.php" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-gear"></i> <span class="ms-1 d-none d-sm-inline">Perfume Options</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="bottle_options.php" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-gear"></i> <span class="ms-1 d-none d-sm-inline">Bottle Options</span> </a>
                        </li>
                        <li>
                            <a href="user_option.php" class="nav-link px-0 align-middle text-white ">
                                <i class="fs-4 bi-people-fill"></i> <span class="ms-1 d-none d-sm-inline">Account Options</span></a>

                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-credit-card-2-back"></i> <span class="ms-1 d-none d-sm-inline">Billing</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="gcash-confirmation.php" class="nav-link px-0 text-white"><i class="bi bi-cash"></i> <span class="d-none d-sm-inline">Gcash Audit</span></a>
                                </li>
                                <li>
                                    <a href="billing-table-view.php" class="nav-link px-0 text-white"><i class="bi bi-table"></i> <span class="d-none d-sm-inline">Accepted Billing</span></a>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="#rider" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-truck"></i> <span class="ms-1 d-none d-sm-inline">Parcel Options</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="rider" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="prepare-parcel.php" class="nav-link px-0 text-white"><i class="bi bi-box-seam"></i> <span class="d-none d-sm-inline">Active Parcels</span></a>
                                </li>
                                <li class="w-100">
                                    <a href="completed-parcels.php" class="nav-link px-0 text-white"><i class="bi bi-arrow-90deg-down"></i> <span class="d-none d-sm-inline">Completed Parcels</span></a>
                                </li>


                            </ul>
                        </li>





                        <li>
                            <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi bi-clock-history"></i><span class="ms-1 d-none d-sm-inline">LOGS</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="View-Billing.php" class="nav-link px-0 text-white"><i class="bi bi-table"></i> <span class="d-none d-sm-inline">View Billing Table</span></a>
                                </li>
                                <li>
                                    <a href="view-active-cart.php" class="nav-link px-0 text-white"><i class="bi bi-table"></i> <span class="d-none d-sm-inline">View Active Cart</span></a>
                                </li>
                                <li>
                                    <a href="cart-billing.php" class="nav-link px-0 text-white"><i class="bi bi-table"></i> <span class="d-none d-sm-inline">View Cart To billing Table</span></a>
                                </li>
                                <li>
                                    <a href="logs-courier.php" class="nav-link px-0 text-white"><i class="bi bi-table"></i> <span class="d-none d-sm-inline">View Courier Table</span></a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <hr>
                    <div class="dropdown pb-4 text-white">

                    </div>


                </div>
            </div>

            <div class="col py-3 background-default">




                <script>
                    // JavaScript code
                    const updateTime = () => {
                        const now = new Date();
                        let hours = now.getHours();
                        let amPm = 'AM';
                        if (hours > 12) {
                            hours -= 12;
                            amPm = 'PM';
                        }
                        const minutes = now.getMinutes();
                        const seconds = now.getSeconds();
                        const time = `${hours}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds} ${amPm}`;
                        document.getElementById("time").textContent = time;
                    };

                    setInterval(updateTime, 1000);
                </script>