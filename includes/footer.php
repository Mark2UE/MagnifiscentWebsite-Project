<!-- Remove the container if you want to extend the Footer to full width. -->


<!-- Footer -->
<footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
        <!-- Left -->
        <div class="me-5">
            <span id="time" class="fs-4">Follow our Socials</span>
        </div>



    </section>

    <section class="">
        <div class="container text-center text-md-start mt-5">

            <div class="row mt-3">

                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold">Magnifiscent Perfume Station</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p>
                        Address:
                        Blk 24 Lot 84 Tuna Street Maypajo Brgy.28 1409 Caloocan, Philippines
                        <hr>
                        High Quality Eau De Parfum inspired by branded scents, 20% oil based and guaranteed long lasting scent.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Perfumes</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p>
                        <a href="Index.php" class="text-white">Home</a>
                    </p>
                    <p>
                        <a href="perfumes.php" class="text-white">Perfume List</a>
                    </p>


                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Social Medias</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p>
                        <a href="https://www.facebook.com/magnifiscentperfumestation" class="text-white">Facebook</a>
                    </p>
                    <p>
                        <a href="https://www.instagram.com/magnifiscentperfume.ph" class="text-white">Instagram</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->

                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2023 Copyright:
        <a class="text-white" href="">Magnifiscent Perfume Station</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- HTML for the preloader or spinner -->
<div id="preloader">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bold-and-dark.js"></script>
<script>
    function deleteAllCookies() {
        const cookies = document.cookie.split(";");

        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i];
            const eqPos = cookie.indexOf("=");
            const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }
</script>



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