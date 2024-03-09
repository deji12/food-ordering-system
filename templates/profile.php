<?php

session_start();

require_once '../views/profile_view.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Profile - HTML 5 Template</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="favicon.png">

    <!-- CSS Files -->
    <?php include_once 'css-links.php'; ?>
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
    <?php include_once 'header.php'; ?>

    <!-- breadcrumb-area -->
    <div class="banner-area breadcrumb-area padding-top-120 padding-bottom-90">
        <div class="bread-shapes">
            <span class="b-shape-1 item-bounce"><img src="assets/images/img/5.png" alt=""></span>
            <span class="b-shape-2"><img src="assets/images/img/6.png" alt=""></span>
            <span class="b-shape-3"><img src="assets/images/img/7.png" alt=""></span>
            <span class="b-shape-4"><img src="assets/images/img/9.png" alt=""></span>
            <span class="b-shape-5"><img src="assets/images/shapes/18.png" alt=""></span>
            <span class="b-shape-6 item-animateOne"><img src="assets/images/img/7.png" alt=""></span>
        </div>
        <div class="container padding-top-120">
            <div class="row justify-content-center">
                <nav aria-label="breadcrumb">
                    <h2 class="page-title">Profile Page</h2>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Profile Page</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- profile-area -->
    <section class="profile-area padding-top-120 padding-bottom-120">
        <div class="container">
            <div class="row align-items-start">
                <!-- tab-buttons -->
                <div class="col-md-4 col-lg-3">
                    <div class="profile-tabs nav flex-column nav-pills me-3" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active text-start" id="dahoboard-tab" data-bs-toggle="pill"
                            data-bs-target="#dahoboard" type="button" role="tab" aria-controls="dahoboard"
                            aria-selected="true">
                            <i class="fa-solid fa-sliders inline-block"></i>
                            Dashboard
                        </button>
                        <button class="nav-link text-start" id="order-tab" data-bs-toggle="pill" data-bs-target="#order"
                            type="button" role="tab" aria-controls="order" aria-selected="false">
                            <i class="fa-solid fa-cart-plus"></i>
                            Orders
                        </button>
                        <button class="nav-link text-start" id="track-order-tab" data-bs-toggle="pill"
                            data-bs-target="#track-order" type="button" role="tab" aria-controls="track-order"
                            aria-selected="false">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Track Order
                        </button>
                        <button class="nav-link text-start" id="address-tab" data-bs-toggle="pill"
                            data-bs-target="#address" type="button" role="tab" aria-controls="address"
                            aria-selected="false">
                            <i class="fa-solid fa-location-dot"></i>
                            My Address
                        </button>
                        <button class="nav-link text-start" id="account-details-tab" data-bs-toggle="pill"
                            data-bs-target="#account-details" type="button" role="tab" aria-controls="account-details"
                            aria-selected="false">
                            <i class="fa-regular fa-user"></i>
                            Account Details
                        </button>
                    </div>
                </div>
                <!-- tab-content -->
                <div class="col-md-8 col-lg-9">
                    <div class="tab-content">
                        <!-- dahoboard-tab -->
                        <div class="tab-pane fade show active" id="dahoboard" role="tabpanel"
                            aria-labelledby="dahoboard-tab" tabindex="0">
                            <h5 class="tab-title"> <?php echo $_SESSION["user"]["user_name"]; ?> </h5>
                            <?php 
                                display_message();
                            ?>
                            <p>
                                From your account dashboard. you can easily check &amp; view your recent
                                orders,<br> manage your shipping and billing addresses and edit your password and
                                account details.
                            </p>
                            <div class="recent-orders margin-top-40">
                                <h5 class="margin-bottom-30">Recent Orders</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Branch</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Kesar Royal Milkshake</td>
                                                <td>March 45, 2020</td>
                                                <td>Processing</td>
                                                <td>Uttara Branch</td>
                                                <td>$125.00</td>
                                                <td><a href="#" class="btn-small d-block">Cancel Order</a></td>
                                            </tr>
                                            <tr>
                                                <td>Double Cheese pizza</td>
                                                <td>June 29, 2020</td>
                                                <td>Completed</td>
                                                <td>Dhaka Branch</td>
                                                <td>$364.00</td>
                                                <td><a href="#" class="btn-small d-block">Cancel Order</a></td>
                                            </tr>
                                            <tr>
                                                <td> Indian Fries</td>
                                                <td>August 02, 2020</td>
                                                <td>Completed</td>
                                                <td>USA Branch</td>
                                                <td>$280.00</td>
                                                <td><a href="#" class="btn-small d-block">Cancel Order</a></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="pagination order-pagination">
                                    <ul>
                                        <li class="prev"><a href="#">Prev</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="pagination-dot">...</li>
                                        <li><a href="#">10</a></li>
                                        <li class="next"><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- order-tab -->
                        <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab" tabindex="0">
                            <h5 class="margin-bottom-30">Your Orders</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Branch</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Kesar Royal Milkshake</td>
                                            <td>March 45, 2020</td>
                                            <td>Processing</td>
                                            <td>Uttara Branch</td>
                                            <td>$125.00</td>
                                            <td><a href="#" class="btn-small d-block">Cancel Order</a></td>
                                        </tr>
                                        <tr>
                                            <td>Double Cheese pizza</td>
                                            <td>June 29, 2020</td>
                                            <td>Completed</td>
                                            <td>Dhaka Branch</td>
                                            <td>$364.00</td>
                                            <td><a href="#" class="btn-small d-block">Cancel Order</a></td>
                                        </tr>
                                        <tr>
                                            <td> Indian Fries</td>
                                            <td>August 02, 2020</td>
                                            <td>Completed</td>
                                            <td>USA Branch</td>
                                            <td>$280.00</td>
                                            <td><a href="#" class="btn-small d-block">Cancel Order</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination order-pagination">
                                <ul>
                                    <li class="prev"><a href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="pagination-dot">...</li>
                                    <li><a href="#">10</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- track-order-tab -->
                        <div class="tab-pane fade" id="track-order" role="tabpanel" aria-labelledby="track-order-tab"
                            tabindex="0">
                            <h5 class="tab-title">Orders tracking</h5>
                            <p>To track your order please enter your OrderID in the box below and press "Track" button.
                                This
                                was given to you on your
                                receipt and in the confirmation email you should have received.
                            </p>
                            <form>
                                <div class="mb-3">
                                    <label for="order-id" class="form-label">Order Id</label>
                                    <input type="text" class="form-control" id="order-id"
                                        aria-describedby="helpingLine">
                                    <div id="helpingLine" class="form-text">Found in your order confirmation email</div>
                                </div>
                                <div class="mb-3">
                                    <label for="billing-email" class="form-label">Billing email</label>
                                    <input type="email" class="form-control" id="billing-email">
                                </div>
                                <button type="submit" class="btn btn-primary">Track</button>
                            </form>
                        </div>
                        <!-- address-tab -->
                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab"
                            tabindex="0">
                            <div class="front-address" id="front-address">
                                <div class="row">
                                    
                                    <?php render_billing_address(); ?>
                                    
                                </div>
                            </div>
                            <div class="edit-address-form" id="edit-address-form">
                            
                                <?php render_billing_address_form(); ?>

                            </div>
                        </div>
                        <!-- account-details -->
                        <div class="tab-pane fade" id="account-details" role="tabpanel"
                            aria-labelledby="account-details-tab" tabindex="0">

                            <?php render_account_details_form(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>