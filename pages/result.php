<!Doctype html>
<html class="no-js" lang="zxx">
<style>
    .h6_single-banner {
        position: relative;
        background-size: cover;
        background-position: center;
    }

    .h6_banner-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
    }

    .welcome-text {
        margin-bottom: 300px;
        margin-right: 100px;
        color: white;
        font-size: 40px;
    }
</style>
<!-- Mirrored from themephi.net/template/eduan/eduan/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2024 05:26:39 GMT -->
<?php
include_once('basic/header.php');
?>

<body>
    <!-- sidebar-information-area-start -->
    <div class="sidebar-info side-info">
        <div class="sidebar-logo-wrapper mb-25">
            <div class="row align-items-center">
                <div class="col-xl-6 col-8">
                    <div class="sidebar-logo">
                        <a href="index.html"><img src="assets/img/logo/logo-white.png" alt="logo-img"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-4">
                    <div class="sidebar-close-wrapper text-end">
                        <button class="sidebar-close side-info-close"><i class="fal fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrapper fix">
            <div class="mobile-menu"></div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- sidebar-information-area-end -->

    <!-- header area start -->
    <?php
    include_once('basic/navbar.php');
    ?>
    <!-- header area end -->

    <main>
        <!-- banner area start -->
        <section class="h6_banner-area">
            <div class="swiper banner_6_active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="height:300px;">
                        <div class="h6_single-banner bg-default" data-background="assets/img/banner/6/1.jpg">
                            <div class="h6_banner-content">

                                <p class="welcome-text">Results</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="innerPage_gallery-area pt-110 pb-90">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-5 col-lg-6">
                        <div class="section-area-2">
                            <h2 class="section-title mb-50">Test
                                <br> Exclusive <span>Gallery <img src="assets/img/banner/2/line.png" alt=""></span>
                            </h2>
                        </div>
                    </div>

                </div>
                <div class="innerPage_gallery-wrap">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-lg-10">
                                    <div class="innerPage_gallery-item mb-30">
                                        <div class="innerPage_gallery-img">
                                            <img src="assets/img/gallery/innerPage/1.jpg" alt="">
                                        </div>
                                        <div class="innerPage_gallery-content">
                                            <a href="assets/img/gallery/innerPage/1.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-lg-10">
                                    <div class="innerPage_gallery-item mb-30">
                                        <div class="innerPage_gallery-img">
                                            <img src="assets/img/gallery/innerPage/2.jpg" alt="">
                                        </div>
                                        <div class="innerPage_gallery-content">
                                            <a href="assets/img/gallery/innerPage/2.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
        </section>
    </main>

    <?php
    include_once('basic/footer.php');
    ?>
</body>

<!-- Mirrored from themephi.net/template/eduan/eduan/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2024 05:26:42 GMT -->

</html>