<!Doctype html>
<html class="no-js" lang="zxx">
<style>
	.justified-text {
		text-align: justify;
	}

	.course-area {
		margin-top: -200px;
		/* Adjust this value as needed */
	}


	.swiper-slide {
		position: relative;
		/* Ensure this container is positioned */
	}
	.swiper-slide2 {
		position: relative;
		/* Ensure this container is positioned */
	}


	.overlay-div {
		position: absolute;
		top: 600px;
		/* Adjust this value to move the overlay down */
		right: 40px;
		/* Adjust this value to move the overlay further to the left */
		width: 10px;
		/* Reduce the width */
		height: 750px;
		/* Set a specific height */
		z-index: 10;
		/* Ensure it is on top */
		overflow: hidden;
		/* Ensure content doesn't overflow if necessary */
	}

	.overlay-div1 {
		position: absolute;
		top: 600px;
		/* Adjust this value to move the overlay down */
		left: 40px;
		/* Adjust this value to move the overlay further to the left */
		width: 10px;
		/* Reduce the width */
		height: 750px;
		/* Set a specific height */
		z-index: 10;
		/* Ensure it is on top */
		overflow: hidden;
		/* Ensure content doesn't overflow if necessary */
	}

	@media (max-width: 1200px) {
		.overlay-div1 {
			width: 350px;
			/* Adjust width for smaller screens */
			left: 30px;
			/* Adjust left position */
		}
	}

	.overlay-div3 {
		position: absolute;
		top: 600px;
		/* Adjust this value to move the overlay down */
		left: 480px;
		/* Adjust this value to move the overlay further to the left */
		width: 10px;
		/* Reduce the width */
		height: 750px;
		/* Set a specific height */
		z-index: 10;
		/* Ensure it is on top */
		overflow: hidden;
		/* Ensure content doesn't overflow if necessary */
	}

	.h3_teacher-img img {
		margin-top: 30px;
		width: 250px;
		/* Adjust the size as needed */
		height: auto;
		display: block;
		margin-left: auto;
		margin-right: auto;
		/* position: relative; */
	}

	.h3_teacher-content {
		display: flex;
		justify-content: center;
		margin-top: -20px;
		margin-bottom: 20px;
		/* position: absolute; */
		/* text-align: center; */
		/* margin-left:70vh; */
	}

	@media screen and (max-width:100px) {
		.h3_teacher-content {
			font-size: 30px;
		}
	}
</style>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


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
						<a href="index.html"><img src="assets/img/logo/dbsmitlogo.jpg" alt="logo-img"></a>
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

	<!-- header area end -->
	<?php
	include_once('basic/navbar.php');
	?>
	<main>
		<!-- banner area start -->
		<section class="slider-area fix ">
			<div class="swiper h7_slider-active">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="h7_single-banner bg-default" data-background="assets/img/banner/7/dbsmit1.jpg" style="height: 20px;">
							<div class="container">
								<div class="row">
									<div class="">
										<div class="h7_banner-content">
											<p class="h7_banner-content-text" data-animation="fadeInUp" data-delay="0.5s">The key to progress is at your fingertips; make the wisest choice to realize your potential.</p>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="h7_single-banner bg-default" data-background="assets/img/banner/7/dbsmit2.jpg" style="height: 20px;">
							<div class="container">
								<div class="row">
									<div class="col-xl-7 col-lg-8 col-md-11">
										<div class="h7_banner-content">

											<p class="h7_banner-content-text" data-animation="fadeInUp" data-delay="0.5s">Since 1984, Don Bosco School has offered students a rich and diverse learning environment. Our exceptional teaching methods empower students to achieve the successful future they envision. We continually encourage both staff and students to grow, learn, and innovate every day.</p>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="h7_slider-navigation d-none d-md-grid">
					<div class="h7_slider-prev"><i class="fa-regular fa-arrow-down-left"></i>
					</div>
					<div class="h7_slider-next"><i class="fa-regular fa-arrow-up-right"></i>
					</div>
				</div>
			</div>
		</section>
		<section class="h7_slider-thumb">
			<div class="swiper h7_slider-active-nav">
			</div>
		</section>
		<section class="course-area">
			<div class="container-fluid container-custom-1 p-0">
				<div class="course-wrap pt-120 pb-90">
					<div class="container">
						<div class="course-inner">
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
									<!-- Overlapping Content -->
									<div class="row">
										<div class="col-lg-4 col-md-12 col-sm-12 overlay-div1" style="width:400px;">
											<div class="course-item mb-30">
												<div class="course-img">
													<img src="assets/img/mission/objectives.png" alt="" style="height: 220px;">
												</div>
												<div class="course-content">
													<div class="course-content-top">
														<div class="course-top-title">
														</div>
													</div>
													<h5 class="course-content-title" style="text-align:center;">
														<a href="#">Our Objective</a>
													</h5>
													<div class="course-content-bottom">
														<div class="course-bottom-info">
														</div>
														<div class="course-bottom-price">
														</div>
													</div>
												</div>
												<div class="course-hover-content">
													<div class="course-hover-content-top">
														<div>
															<h6 style="text-align:center;">Our Objective</h6>
														</div>
													</div>
													<h5 class="course-hover-content-title justified-text">Create a fun learning environment with a diverse and engaging curriculum.Build strong character traits like responsibility and citizenship.Provide essential skills and knowledge for positive contributions to society.Foster a supportive, friendly atmosphere for lifelong learning and personal growth.Highlight education's importance for personal and national development.</h5>

													<div class="course-hover-content-btn">
														<div class="course-hover-cart-btn">
															<a href="#"></a>
														</div>
														<div>
															<a href="#"><i></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-xxl-3 col-lg-4 col-md-6 overlay-div" style="width:400px;">
											<div class="course-item mb-30">
												<div class="course-img">
													<img src="assets/img/mission/mNv.jpg" alt="" style="height: 220px;">
												</div>
												<div class="course-content">
													<div class="course-content-top">
														<div class="course-top-title">
														</div>
													</div>
													<h5 class="course-content-title" style="text-align:center;"><a href="#">Mission and Vision</a></h5>
													<div class="course-content-bottom">
														<div class="course-bottom-info">

														</div>
														<div class="course-bottom-price">

														</div>
													</div>
												</div>
												<div class="course-hover-content">
													<div class="course-hover-content-top">

														<div>
															<h6 style="text-align:center;">Mission and Vision</h6>
														</div>
													</div>
													<h5 class="course-hover-content-title justified-text"> Foster joyful learning through a rich, stimulating curriculum.Cultivate a friendly, supportive school environment that nurtures life, love, and learning, ensuring each child embraces a meaningful legacy.Empowering every child to thrive in a joyful, enriched learning journey within a caring and supportive school community.
														.</h5>

													<div class="course-hover-content-btn">
														<div class="course-hover-cart-btn">
															<a href="#"></a>
														</div>
														<div>
															<a href="#"><i></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-xxl-3 col-lg-4 col-md-6 overlay-div3" style="width:400px;">
											<div class="course-item mb-30">
												<div class="course-img">
													<img src="assets/img/mission/anthem.jpg" alt="" style="height: 220px;">
												</div>
												<div class="course-content">
													<div class="course-content-top">

														<div class="course-top-title">

														</div>
													</div>
													<h5 class="course-content-title" style="text-align:center;"><a href="#">Anthem</a></h5>
													<div class="course-content-bottom">
														<div class="course-bottom-info">

														</div>
														<div class="course-bottom-price">

														</div>
													</div>
												</div>
												<div class="course-hover-content">
													<div class="course-hover-content-top">

														<div>
															<h6 style="text-align:center;">Anthem</h6>
														</div>
													</div>
													<h5 class="course-hover-content-title justified-text">Let us sing of our Father the Glory With our hearts full of love & devotion.Let us tell the magnificent story of his life and his wonderful deeds.Chorus; O Don Bosco, thy name is a vision O Don Bosco, thy cry is a slogan, O Don Bosco, your students are legion. And thou art their example & light .All his children his altar surrounding, Lift their hearts to their guide &their Father And their strain is a hymn never ending That resounds through the lands & the sea.</h5>

													<div class="course-hover-content-btn">
														<div class="course-hover-cart-btn">
															<a href="#"></a>
														</div>
														<div>
															<a href="#"><i></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<br>
										<br>
										<br>
										<br>
										<br>
										<br>
										<br>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="h7_about-area pt-120 pb-50">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6">
						<div class="h7_about-wrap mb-50 mr-70">
							<div class="section-area-6 mb-55">

								<h4 class="section-title mb-20" style="font-size:40px;">WELCOME TO DON BOSCO SCHOOL</h4>
								<h2 class="section-title mb-20">SMIT - DEFINE YOUR <span>FUTURE</h2>

								<p><i>"The key to progress is at your fingertips; make the wisest choice to realize your potential."</i></p>
								<p class="section-text">
									Since 1984, Don Bosco School has offered students a rich and diverse learning environment. Our exceptional teaching methods empower students to achieve the successful future they envision. We continually encourage both staff and students to grow, learn, and innovate every day.
								</p>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="h7_about-img w_img mb-50">
							<img src="assets/img/mission/dbsmit4.jpg" alt="">

							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="h3_teacher-area pt-135 pb-140">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="section-area-3 text-center mb-60">
							<h2 class="section-title mb-0">Happy Birthday</h2>
						</div>
					</div>
				</div>
				<!-- <div class="teacher-active swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="card h3_teacher-item mb-25">
								<div class="h3_teacher-img card-img-top">
									<img src="assets/img/teacher/3/1.jpg" alt="Eleanor Fant">
								</div>
								<div class="card-body h3_teacher-content">
									<h5 class="card-title h3_teacher-content-title">
										<a href="#">Eleanor Fant</a><br>
										<a href="#">Class V</a>
									</h5>
								</div>
							</div>
						</div>

					</div>

					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div> -->
				<div class="teacher-active swiper">
					<div class="swiper-wrapper" id="birthday-slider">
						<!-- Slides will be appended here dynamically -->
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="teacher-pagination mt-45"></div>
			</div>
		</section>

		<div class="counter-area pt-120 pb-110">
			<div class="container">
				<div class="counter-wrap">
					<div class="row g-0">
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="counter-item">
								<div class="counter-icon">
									<!-- <i class="fa-thin fa-globe"></i> -->
									<i class="fa-solid fa-face-smile"></i> <!-- Solid smile -->

								</div>
								<div class="counter-info">
									<h3 class="counter-info-title">
										<span class="odometer count_one" data-count="2,900">00</span>
										<span></span>
									</h3>
									<span class="counter-info-text">
										+ HAPPY STUDENTS</span>
								</div>
							</div>
						</div>
						<!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="counter-item">
								<div class="counter-icon">
									<i class="fa-thin fa-book-open"></i>
								</div>
								<div class="counter-info">
									<h3 class="counter-info-title">
										<span class="odometer count_one" data-count="12">00</span>
										<span>k</span>
									</h3>
									<span class="counter-info-text">Classes complete</span>
								</div>
							</div>
						</div> -->
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="counter-item">
								<div class="counter-icon">
									<i class="fa-solid fa-user-group"></i>
								</div>
								<div class="counter-info">
									<h3 class="counter-info-title">
										<span class="odometer count_one" data-count="130"></span>

									</h3>
									<span class="counter-info-text">EMPLOYEES</span>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="counter-item">
								<div class="counter-icon">
									<i class="fa-solid fa-trophy"></i> <!-- Trophy icon -->

								</div>
								<div class="counter-info">
									<h3 class="counter-info-title">
										<span class="odometer count_one" data-count="100"></span>

									</h3>
									<span class="counter-info-text"> + AWARDS WON</span>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
							<div class="counter-item">
								<div class="counter-icon">
									<i class="fa-solid fa-medal"></i>
								</div>
								<div class="counter-info">
									<h3 class="counter-info-title">
										<span class="odometer count_one" data-count="1"></span>
										<!-- <span>k</span> -->
									</h3>
									<span class="counter-info-text">World Record</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <section class="h7_about-area pt-120 pb-50">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6">
						<div class="h7_about-wrap mb-50 mr-70">
							<div class="section-area-6 mb-55">
								<span class="section-subtitle" style="text-align:center;">OUR MOTO</span>
								<br>
								<h2 class="section-title mb-10" style="font-size:25px;">GOALS</h2>
								<p class="section-text">We strive to better our students through educational experiences both in and out of the classroom. Don Bosco School aims to create a haven where students feel safe to tackle their fears and accomplish all of their goals. We offer a variety of services designed to help students be the best version of themselves, while having a fun along the way.</p>
								<br>
								<h2 class="section-title mb-10" style="font-size:25px;">STANDARDS</h2>
								<p class="section-text">With years of experience as educators, we know just what it takes to engage students. Our unique teaching approach makes our students feel valued, respected and appreciated. At Don Bosco School, we believe in fostering a creative, collaborative, and engaging experience to help our students reach their full potential and help them pursue their dreams. Contact us to learn what we can do for you.</p>

							</div>

						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="h7_about-img w_img mb-50">
							<img src="assets/img/about/7/1.png" alt="">
							<a href="https://www.youtube.com/watch?v=dMlASgogxo4" class="popup-video">
								<svg width="131" height="132" viewBox="0 0 131 132" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="65" cy="66" r="64" stroke="white" stroke-opacity="0.14" stroke-width="2" />
									<path d="M65 131C100.899 131 130 101.899 130 66C130 30.1015 100.899 1 65 1" stroke="#B1040E" stroke-width="2" />
								</svg>
								<i class="fa-solid fa-play"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section> -->
	</main>

	<!-- footer area start -->
	<?php
	include_once('basic/footer.php');
	?>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src="assets/js/md5.js"></script>
	<script src="assets/js/CallService.js"></script>
	<script src="assets/js/commonfunctions.js"></script>
	<script src="assets/js/loader/loadingoverlay.js"></script>

	<script>
		$(function() {
			getTodayBirthdayList();

		});

		function getTodayBirthdayList() {

			var obj = new Object();
			obj.Module = "Student";
			obj.Page_key = "getTodayBirthdayList";
			var json = new Object();
			obj.JSON = json;
			TransportCall(obj);
		}
		var swiper = new Swiper('.teacher-active', {
			loop: true,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			pagination: {
				el: '.teacher-pagination',
				clickable: true,
			},
		});






		// function getVehicleModel() {
		//     var obj = new Object();
		//     obj.Module = "Vehicle";
		//     obj.Page_key = "getVehicleModel";
		//     var json = new Object();
		//     obj.JSON = json;
		//     SilentTransportCall(obj);
		// }


		function onSuccess(rc) {
			if (rc.return_code) {
				switch (rc.Page_key) {
					case "getTodayBirthdayList":
						loadBirthdayCards(rc.return_data);
						break;


					default:
						notify("error", rc.Page_key);
				}
			} else {
				notify("warning", rc.return_data);
			}
		}

		function loadBirthdayCards(data) {

			var sliderContainer = $("#birthday-slider");
			sliderContainer.empty(); // Clear existing slides

			$.each(data, function(index, student) {
				var slide = `
            <div class="swiper-slide">
                <div class="card h3_teacher-item mb-25">
                    <div class="h3_teacher-img card-img-top">
                        <img src="${student.Photo}" alt="${student.StudentName}">
                    </div>
                    <div class="card-body h3_teacher-content">
                        <h5 class="card-title h3_teacher-content-title">
                            <a href="#">${student.StudentName}</a><br>
                            <a href="#">${student.Class}</a>
                        </h5>
                    </div>
                </div>
            </div>
        `;
				sliderContainer.append(slide);
			});

			// Initialize or update Swiper instance
			new Swiper('.swiper', {
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
			});
		}

		function onError() {

		}
	</script>
</body>

</html>