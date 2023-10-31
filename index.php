<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/scripts/essentials.php' ?>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/IndexParallax.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">



    <title>Home</title>

</head>
<style>
    .map-responsive {
        overflow: hidden;
        padding-bottom: 50%;
        position: relative;
        height: 0;
    }

    .map-responsive iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }



    .righties {

        transform: translateX(100%);
        transition: all .75s ease;
    }

    .righties.active {
        transform: translateX(0%);
    }

    .lefties {

        transform: translateX(-100%);
        transition: all .75s ease;
        opacity: 0;
    }

    .lefties.active {
        transform: translateX(0%);
        opacity: 1;
    }

    .BetaMation {


        transform: translateY(100%);
        transition: all .75s ease;
        opacity: 0;


    }

    .BetaMation.active {

        transform: translateY(0%);
        opacity: 1;
    }
</style>

<body>
    <?php
    include 'includes/navbar-selector.php'; ?>



    <body>

















        <div class="row ">
            <div class="col-lg-12 banner">
            </div>
        </div>

        <div class="text-white fs-1" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <marquee behavior="loop" direction="left">magnifiscentperfume Perfume Station | Magnificent Perfume Station | Magnificent Perfume Station | Magnificent Perfume Station | Magnificent Perfume Station | Magnificent Perfume Station</marquee>
        </div>

        <header class="banner2">
            <div class="p-5" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">


                <div class="row pt-5">
                    <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto ">
                        <div class="text-center">
                            <p class="fw-bold mb-2 fs-1">Magnifiscent Perfume Station</p>
                            <h1 class="fw-bold">Best Perfume for a Long Lasting and Oil Based Fragrances</h1>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="position-relative" style="display: flex;flex-wrap: wrap;justify-content: flex-end;">
                            <div style="position: relative;flex: 0 0 45%;transform: translate3d(-15%, 35%, 0);"><img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.8" src="assets/img/products/3.jpg"></div>
                            <div style="position: relative;flex: 0 0 45%;transform: translate3d(-5%, 20%, 0);"><img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.4" src="assets/img/products/2.jpg"></div>
                            <div style="position: relative;flex: 0 0 60%;transform: translate3d(0, 0%, 0);"><img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.25" src="assets/img/products/1.jpg"></div>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <section class="py-5 BetaMation">
            <div class="text-center py-5">
                <p class="mb-4" style="font-size: 1.6rem;">Like and Follow our Social Media to keep in touch with our perfumes</p>
                <a href="https://www.instagram.com/magnifiscentperfume.ph" class="fs-1 mx-5"><i class="bi bi-instagram"></i>&nbsp;Instagram</a>
                <a href="https://www.facebook.com/magnifiscentperfumestation" class="fs-1 mx-5"><i class="bi bi-facebook"></i>&nbsp;Facebook</a>
            </div>
        </section>

        <section style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <div class="container-fluid py-5">
                <div class="row">
                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                        <p class="fw-bold text-success mb-2">Our Branches</p>
                        <h3 class="fw-bold">We have physical store!</h3>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                    <div class="col mb-5 lefties">
                        <div class="" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="card-body px-4 py-5 px-md-5 ">

                                <h5 class="fw-bold card-title">Tutuban Branch&nbsp;</h5>
                                <p class="text-muted card-text mb-4">We have two branches in tutuban mall

                                <ul>
                                    <li>
                                        Tutuban main 1
                                    </li>
                                    <li>
                                        Tutuban branch 2
                                    </li>
                                </ul>

                                </p>

                                <div class="container-fluid">
                                    <div class="map-responsive">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1083.4100039261432!2d120.97246374346484!3d14.60850530841999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca0ce2555559%3A0x322c377e80b267e8!2sTutuban%20Shopping%20Mall!5e0!3m2!1sen!2sph!4v1684151655696!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col mb-5 righties">
                        <div class="" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="card-body px-4 py-5 px-md-5">

                                <h5 class="fw-bold card-title">Divisoria Mall&nbsp;</h5>
                                <p class="text-muted card-text mb-4">Divisoria Mall is one of the most bustling and vibrant shopping destinations in the heart of Manila. Located in the heart of the city, our branch offers a wide variety of high-quality products at affordable prices.</p>
                                <div class="container-fluid">
                                    <div class="map-responsive">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2045.2596578781!2d120.96882873250993!3d14.60271247497824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c913ee97cc0b%3A0xfc8da072b970463b!2sDivisoria%20Shopping%20Mall!5e0!3m2!1sen!2sph!4v1684151970832!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 lefties">
                        <div class="" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="card-body px-4 py-5 px-md-5">

                                <h5 class="fw-bold card-title">Quiapo Underpass&nbsp;</h5>
                                <p class="text-muted card-text mb-4">
                                <ul>
                                    <li>Quipo main 1</li>
                                    <li>Quiapo underpass branch 2</li>
                                </ul>
                                </p>
                                <div class="container-fluid">
                                    <div class="map-responsive">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2045.2588621231723!2d120.98535324219658!3d14.602798039315372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cb4f537f014d%3A0xa77a0aa7ca0a1e33!2sRecto%20Ave-Quezon%20Blvd%20Underpass!5e0!3m2!1sen!2sph!4v1684154073930!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 righties">
                        <div class="" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="card-body px-4 py-5 px-md-5">

                                <h5 class="fw-bold card-title">Victory Mall&nbsp;</h5>
                                <p class="text-muted card-text mb-4">Victory Mall is a premier shopping destination located in the bustling city of Caloocan. With its convenient location and diverse range of stores, Victory Mall offers shoppers a one-stop-shop for all their needs.</p>
                                <div class="container-fluid">
                                    <div class="map-responsive">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2045.2588621231723!2d120.98535324219658!3d14.602798039315372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cb4f537f014d%3A0xa77a0aa7ca0a1e33!2sRecto%20Ave-Quezon%20Blvd%20Underpass!5e0!3m2!1sen!2sph!4v1684154073930!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>

            </div>
        </section>

        <div class="text-white fs-1" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <marquee behavior="loop" direction="left">Magnificent Perfume Station | Magnificent Perfume Station | Magnificent Perfume Station | Magnificent Perfume Station | Magnificent Perfume Station | Magnificent Perfume Station</marquee>
        </div>
        <section style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" class="p-3">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2 fs-2">About us</p>
            </div>
            <br>
            <div class="row row-cols-1 row-cols-md-2 d-flex justify-content-center BetaMation">
                <div class="col mb-4">

                    <h5 class="text-center">Magnificent Perfume is a premier fragrance retailer that has been providing the finest quality fragrances since 2012. Our business was founded by Dinio Manliclic, who has a passion for creating luxurious and long-lasting scents that are perfect for any occasion.

                        Over the years, Magnificent Perfume has grown to become a leading fragrance brand, with four different branches located in key cities throughout the Philippines. <br><br> Each of our stores is designed to provide a unique and enjoyable shopping experience, with a wide variety of high-quality fragrances to choose from.

                        At Magnificent Perfume, we believe that a great fragrance can enhance your mood and boost your confidence, which is why we take pride in offering only the best scents from around the world. From classic and timeless fragrances to modern and trendy scents, we have something for everyone.

                        Our team of experts is dedicated to providing exceptional customer service, with a wealth of knowledge and expertise in the fragrance industry. <br><br>Whether you're looking for a signature scent or need help finding the perfect gift for a loved one, we are always here to help.

                        At Magnificent Perfume, we are committed to providing the highest quality products at affordable prices. We believe that everyone deserves to feel confident and stylish, and our fragrances are designed to help you do just that. Come visit us at one of our branches and discover the magic of Magnificent Perfume!</h5>


                </div>


            </div>


        </section>



        <section class="p-3" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">


            <center>
                <p class="fw-bold text-success mb-2 fs-2">Products</p>
            </center>
            <div class="row m-auto">
                <div class="col-lg-6 p-5 lefties">
                    <h1 class="text-light text-end" style="text-shadow: 2px 2px 4px #000000;">Magnificent Perfume offers a wide range of high-quality fragrances that are perfect for any occasion. Our fragrances are expertly crafted using only the finest ingredients, ensuring that each scent is long-lasting and luxurious.</h1>
                </div>


                <div class="col-lg-6 p-5 righties">
                    <div id="carouselExampleFade1" class="carousel slide carousel-fade" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="css/IMAGE/car5.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="css/IMAGE/car6.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="css/IMAGE/car7.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>


        </section>
        <section class="py-5 banner1">
            <div class="container p-5" style="background-color: #0005;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <div class="row mb-5">
                    <div class="col-md-8 col-xl-6 text-center mx-auto BetaMation">
                        <p class="fw-bold text-success mb-2">
                        </p>
                        <h2 class="fw-bold">How is Long Lasting Perfume made?</h2>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-xl-4 lefties">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="css/IMAGE/car1.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="css/IMAGE/car2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="css/IMAGE/car3.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 d-flex justify-content-center justify-content-xl-start">
                        <div class="d-flex flex-wrap flex-md-column justify-content-md-start align-items-md-start h-100 righties">
                            <h5>Long lasting perfumes are typically made by combining fragrant oils, solvents, and fixatives to create a stable and long-lasting scent. Here is a general overview of the process:</h5>

                            <p>
                            <ul>
                                <li>
                                    Fragrant oils: The first step in making a perfume is to select and mix the fragrant oils that will create the desired scent. These oils can come from a variety of natural and synthetic sources and are typically blended together in specific ratios to create a unique fragrance.
                                </li>
                                <li>
                                    Packaging and storage: Once the perfume is filtered and ready, it is bottled and packaged for sale. Long lasting perfumes are typically stored in dark glass bottles to protect them from light and heat, which can cause the fragrance to degrade over time.
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>

    <script type="text/javascript">
        window.addEventListener("scroll", reveal);

        function reveal() {
            var reveals = document.querySelectorAll(".righties");

            for (var i = 0; i < reveals.length; i++) {
                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 150;

                if (revealtop < windowheight - revealpoint) {
                    reveals[i].classList.add("active");
                }
            }
        }
    </script>

    <script type="text/javascript">
        window.addEventListener("scroll", reveal);

        function reveal() {
            var reveals = document.querySelectorAll(".lefties");

            for (var i = 0; i < reveals.length; i++) {
                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 150;

                if (revealtop < windowheight - revealpoint) {
                    reveals[i].classList.add("active");
                }
            }
        }
    </script>

    <script type="text/javascript">
        window.addEventListener('scroll', reveal);

        function reveal() {
            var reveals = document.querySelectorAll('.BetaMation');

            for (var i = 0; i < reveals.length; i++) {

                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 150;

                if (revealtop < windowheight - revealpoint) {
                    reveals[i].classList.add('active')
                }
            }
        }
    </script>


    <script type="text/javascript">
        window.addEventListener('scroll', reveal);

        function reveal() {
            var reveals = document.querySelectorAll('.opacity');

            for (var i = 0; i < reveals.length; i++) {

                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 150;

                if (revealtop < windowheight - revealpoint) {
                    reveals[i].classList.add('active')
                }
            }
        }
    </script>


    <?php include 'includes/footer.php'; ?>
</body>


</html>
<?php include 'includes/scripts/preloader.php'; ?>