<?php 

require_once '../views/forgot_password_view.php';
require_once '../config/auth.php';

redirect_if_logged_in();

if(!isset($_GET["status"])) {
    header("Location: login.php");
    die();
}

?>


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Reset Password</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="favicon.png">

    <!-- CSS Files -->
    <?php include 'css-links.php'; ?>
</head>

<body>
    <!-- Preloader Starts -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
    <!-- header -->
    <?php include 'header.php'; ?>

    <!-- breadcrumb-area -->
    <div class="banner-area breadcrumb-area padding-top-120 padding-bottom-90">
        <div class="bread-shapes">
            <span class="b-shape-1 item-bounce"><img src="../assets/images/img/5.png" alt=""></span>
            <span class="b-shape-2"><img src="../assets/images/img/6.png" alt=""></span>
            <span class="b-shape-3"><img src="../assets/images/img/7.png" alt=""></span>
            <span class="b-shape-4"><img src="../assets/images/img/9.png" alt=""></span>
            <span class="b-shape-5"><img src="../assets/images/shapes/18.png" alt=""></span>
            <span class="b-shape-6 item-animateOne"><img src="../assets/images/img/7.png" alt=""></span>
        </div>
        <div class="container padding-top-120">
            <div class="row justify-content-center">
                <nav aria-label="breadcrumb">
                    <h2 class="page-title">Password reset sent</h2>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> login page</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- contact-form-area -->
    <section class="about-area about-area2 writeto-us login-area padding-top-120 signup-area padding-bottom-60">
        <div class="form-shapes">
            <span class="fs1 item-animateOne"><img src="../assets/images/shapes/1.png" alt=""></span>
            <span class="fs2 item-bounce"><img src="../assets/images/shapes/12.png" alt=""></span>
            <span class="fs3"><img src="../assets/images/shapes/13.png" alt=""></span>
            <span class="fs4 item-bounce"><img src="../assets/images/shapes/26.png" alt=""></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12  wow fadeInUp">
                    <div class="about-left">
                        <div class="about-l-shapes">
                            <span class="als-1"><img src="../assets/images/shapes/2.png" alt=""></span>
                        </div>
                        <div class="row">
                            <div
                                class="col-lg-4 col-md-4 col-sm-4 col-4 d-flex align-items-end justify-content-end margin-bottom-20">
                                <div class="about-gallery-1">
                                    <img src="../assets/images/gallery/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-8 margin-bottom-20">
                                <div class="about-gallery-2">
                                    <img src="../assets/images/gallery/2.jpg" alt="">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="about-gallery-3">
                                    <img src="../assets/images/gallery/3.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 d-flex align-items-stretch ">
                                <div class="about-gallery-5 text-center">
                                    <img src="../assets/images/gallery/5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInUp">
                    <div class="contact-form-area login-form-area signup-form-area">
                        <h3>Reset Link <span>sent</span></h3>

                        <?php display_message(); ?> 


                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './footer.php'; ?>

</body>

</html> 