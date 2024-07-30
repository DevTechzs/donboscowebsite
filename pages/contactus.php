<!Doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from themephi.net/template/eduan/eduan/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2024 05:27:21 GMT -->
<?php
include_once('basic/header.php');
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .justified-text {
        text-align: justify;
    }

    .customize-icons {
        font-size: 24px;
        color: white;
        /* Set the icon color to white */
        background-color: #131842;
        /* Set the background color to black */
        padding: 10px;
        /* Add padding if needed */
        border-radius: 0;
        /* Ensure no rounded corners */
    }
</style>

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
        <!-- card start -->
        <section class="category-area pt-120 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="h2_course-item mb-30">
                            <div class="h2_course-item-img">
                            <!-- <i class="fas fa-phone fa-rotate-90"></i> -->
                                <a href="#"><img src="assets/img/course/phone1.jpg" alt="" style="height:200px;"></a>
                            </div>
                            <div class="h2_course-content">
                                <div class="h2_course-content-top">
                                </div>
                                <h5 class="h2_course-content-title"><a href="course-details.html">Call Us</a></h5>

                                <p class="h2_course-content-text">
                                    0988
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="h2_course-item mb-30">
                            <div class="h2_course-item-img">
                                <a href="#"><img src="assets/img/course/2/location.png" style="height:200px;" alt=""></a>
                            </div>
                            <div class="h2_course-content">
                                <div class="h2_course-content-top">
                                </div>
                                <h5 class="h2_course-content-title"><a href="course-details.html">Address</a></h5>
                                <p class="h2_course-content-text">
                                    Test </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="h2_course-item mb-30">
                            <div class="h2_course-item-img">
                                <a href="#"><img src="assets/img/course/2/mail.png" style="height:200px;" alt=""></a>
                            </div>
                            <div class="h2_course-content">
                                <div class="h2_course-content-top">
                                </div>
                                <h5 class="h2_course-content-title"><a href="course-details.html">Email</a></h5>
                                <p class="h2_course-content-text">
                                    Test </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-area pt-120 pb-120">
        <div class="container">
            <div class="contact-wrap">
                <div class="row">
                    <div class="col-xl-8 col-md-8">
                        <div class="contact-content pr-80 mb-20">
                            <h3 class="contact-title mb-25">Send  Message</h3>
                            <form action="#" class="contact-form">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
                                        <div class="contact-form-input mb-30">
                                            <input type="text" placeholder="Your Name">
                                            <span class="inner-icon"><i class="fa-thin fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
                                        <div class="contact-form-input mb-30">
                                            <input type="email" placeholder="Email Address">
                                            <span class="inner-icon"><i class="fa-thin fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
                                        <div class="contact-form-input mb-30">
                                            <input type="text" placeholder="Your Number">
                                            <span class="inner-icon"><i class="fa-thin fa-phone-volume"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 ">
                                        <div class="contact-form-input">
                                            <span class="inner-icon inner-icon-select"><i class="fa-thin fa-circle-exclamation"></i></span>
                                            <select name="select" class="contact-form-list has-nice-select mb-30">
                                                <option value="1">Select Subject</option>
                                                <option value="2">Art & Design</option>
                                                <option value="3">Graphic Design</option>
                                                <option value="4">Web Design</option>
                                                <option value="5">UX/UI Design</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact-form-input mb-50 contact-form-textarea">
                                            <textarea name="message" cols="30" rows="10" placeholder="Feel free to get in touch!"></textarea>
                                            <span class="inner-icon"><i class="fa-thin fa-pen"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact-form-submit mb-30">
                                            <div class="contact-form-btn">
                                                <a href="#" class="theme-btn contact-btn">Send Message</a>
                                            </div>
                                            <div class="contact-form-condition">
                                                <label class="condition_label">I agree that my data is collected and stored.
                                                    <input type="checkbox">
                                                    <span class="check_mark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="contact-info ml-50 mb-20">
                            <h3 class="contact-title mb-40">Get In Touch</h3>
                            <div class="contact-info-item">
                                <span><i class="fa-thin fa-location-dot"></i>Address</span>
                                <p>Lumkynsai, Smit, Shillong East Khasi Hills, Meghalaya – 793015</p>
                            </div>
                            <div class="contact-info-item">
                                <span><i class="fa-thin fa-mobile-notch"></i>Phone</span>
                                <a href="tel:9436179949">+91 9436179949</a>
                            </div>
                            <div class="contact-info-item">
                                <span><i class="fa-thin fa-envelope"></i>Email</span>
                                <a href="mailto:dbshmitgmail.com/albertlongly@gmail.com">dbshmitgmail.com/albertlongly@gmail.com</a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3598.7422307814013!2d91.89086077445538!3d25.58024131608131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37507ff883033991%3A0x50876f85f9a62f36!2sPRIME%20Startup%20Hub%20Shillong!5e0!3m2!1sen!2sin!4v1720615697179!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
        </section>
        <!-- end card -->
    </main>

    <!-- footer area start -->

    <!-- footer area end -->

    <!-- JS here -->
    <?php
    include_once('basic/footer.php');
    ?>
</body>

<!-- Mirrored from themephi.net/template/eduan/eduan/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2024 05:27:21 GMT -->

</html>