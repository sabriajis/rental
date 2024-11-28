<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

        <!-- title of site -->
        <title>Rental FI</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="{{asset('assets/logo/rental.jpg')}}"/>

        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

        <!--linear icon css-->
		<link rel="stylesheet" href="{{asset('assets/css/linearicons.css')}}">

        <!--flaticon.css-->
		<link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">

		<!--animate.css-->
        <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

		<!-- bootsnav -->
		<link rel="stylesheet" href="{{asset('assets/css/bootsnav.css')}}" >

        <!--style.css-->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

        <!--responsive.css-->
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <style>
   .featured-cars-content .single-featured-cars {
    height: 200px; /* Tinggi tetap untuk semua kotak */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border: 1px solid #ddd; /* Opsional: Memberikan border agar lebih rapi */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Opsional: Efek bayangan */
    border-radius: 10px; /* Opsional: Sudut kotak */
    padding: 15px;
}

.featured-cars-content .featured-img-box {
    height: 60%; /* Bagian gambar mengambil 60% tinggi */
    text-align: center;
}

.featured-cars-content .featured-cars-img img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain; /* Menyesuaikan gambar dalam kotak */
}

.featured-cars-content .featured-cars-txt {
    height: 40%; /* Bagian teks mengambil 40% tinggi */
    text-align: center;
    display: flex; /* Enable Flexbox */
    align-items: center; /* Vertically center the text */
    justify-content: center; /* Horizontally center the text */
    overflow: hidden; /* Hide any overflowing text */
    white-space: nowrap; /* Prevent text from breaking into multiple lines */
    text-overflow: ellipsis; /* Add ellipsis if text overflows */
}

    </style>

	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <div class="container">

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="index.html">Rental FI<span></span></a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" scroll active"><a href="#home">home</a></li>
				                    <li class="scroll"><a href="#service">Layanan</a></li>
				                    <li class="scroll"><a href="#featured-cars">Model Mobil</a></li>
				                    <li class="scroll"><a href="#new-cars">Mobil Terbaru</a></li>
				                    <li class="scroll"><a href="#brand">brand</a></li>
				                    <li class="scroll"><a href="#contact">Kontak</a></li>
				                </ul><!--/.nav --
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</div><!-- /.top-area-->
			<!-- top-area End -->

			<div class="container">
				<div class="welcome-hero-txt">
					<h2>Selamat Datang Di Website Kami</h2>
					<p>
						Kami dengan senang hati menyambut Anda di platform resmi kami, tempat terbaik untuk memenuhi kebutuhan transportasi Anda.
					</p>
					<button class="welcome-btn" onclick="window.location.href='{{route('login')}}'">Masuk</button>
				</div>
			</div>


				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--service start -->
		<section id="service" class="service">
			<div class="container">
				<div class="service-content">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<i class="flaticon-car"></i>
								</div>
								<h2><a href="#">Rental Mobil Harian <span> </span> </a></h2>
								<p>
									Penyewaan mobil untuk keperluan sehari-hari.
                                    Pilihan kendaraan sesuai kebutuhan.
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<i class="flaticon-car-repair"></i>
								</div>
								<h2><a href="#">Penyediaan Mesin</a></h2>
								<p>

Setiap kendaraan yang kami sewakan memiliki mesin yang aman dan berkualitas baik.
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<i class="flaticon-car-1"></i>
								</div>
								<h2><a href="#">Penyediaan Surat</a></h2>
								<p>
									Kami memahami pentingnya keamanan dan kenyamanan dalam perjalanan Anda.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.service-->
		<!--service end-->

		<!--new-cars start -->
		<section id="new-cars" class="new-cars">
			<div class="container">
				<div class="section-header">
					<p> <span></span> </p>
					<h2>mobil terbaru</h2>
				</div><!--/.section-header-->
				<div class="new-cars-content">
					<div class="owl-carousel owl-theme" id="new-cars-carousel">
						<div class="new-cars-item">
							<div class="single-new-cars-item">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="new-cars-img">
											<img src="{{asset('assets/images/new-cars-model/agya.jpg')}}" alt="img"/>
										</div><!--/.new-cars-img-->
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="new-cars-txt">
											<h2><a href="#">Agya <span> 2019</span></a></h2>
											<p>

											</p>
											<p class="new-cars-para2">
												Dilengkapi teknologi canggih, Toyota Agya siap memberikan pengalaman berkendara modern yang memudahkan hidupmu
											</p>
											<button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
												view details
											</button>
										</div><!--/.new-cars-txt-->
									</div><!--/.col-->
								</div><!--/.row-->
							</div><!--/.single-new-cars-item-->
						</div><!--/.new-cars-item-->
						<div class="new-cars-item">
							<div class="single-new-cars-item">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="new-cars-img">
											<img src="{{asset('assets/images/new-cars-model/avanza.jpg')}}" alt="img"/>
										</div><!--/.new-cars-img-->
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="new-cars-txt">
											<h2><a href="#">Avanza</a></h2>
											<p>

											</p>
											<p class="new-cars-para2">
												Desain elegan, kabin luas, dan fitur keselamatan lengkap. Avanza hadir untuk melengkapi gaya hidup Anda.
											</p>
											<button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
												view details
											</button>
										</div><!--/.new-cars-txt-->
									</div><!--/.col-->
								</div><!--/.row-->
							</div><!--/.single-new-cars-item-->
						</div><!--/.new-cars-item-->
						<div class="new-cars-item">
							<div class="single-new-cars-item">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="new-cars-img">
											<img src="{{asset('assets/images/new-cars-model/ayla.jpg')}}" alt="img"/>
										</div><!--/.new-cars-img-->
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="new-cars-txt">
											<h2><a href="#">Ayla</a></h2>
											<p>

											</p>
											<p class="new-cars-para2">
												Nikmati fitur canggih dengan harga bersahabat! Ayla dilengkapi teknologi modern untuk pengalaman berkendara yang lebih nyaman dan aman.
											</p>
											<button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
												view details
											</button>
										</div><!--/.new-cars-txt-->
									</div><!--/.col-->
								</div><!--/.row-->
							</div><!--/.single-new-cars-item-->
						</div><!--/.new-cars-item-->
					</div><!--/#new-cars-carousel-->
				</div><!--/.new-cars-content-->
			</div><!--/.container-->

		</section><!--/.new-cars-->
		<!--new-cars end -->

		<!--featured-cars start -->
		<section id="featured-cars" class="featured-cars">
			<div class="container">
				<div class="section-header">
					<p> <span></span> </p>
					<h2>Model Mobil </h2>
				</div><!--/.section-header-->
				<div class="featured-cars-content">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="{{asset('assets/images/featured-cars/avanza.jpg')}}" alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2017
											<span class="featured-mi-span"> 3100 mi</span>
											<span class="featured-hp-span"> 240HP</span>
											 Manual
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">Avanza 2017</a></h2>

									<p>

									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="{{asset('assets/images/featured-cars/ayla.jpg')}}" alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2020
											<span class="featured-mi-span"> 3100 mi</span>
											<span class="featured-hp-span"> 240HP</span>
											 automatic
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">Ayla <span>wmv20</span></a></h2>

									<p>

									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="{{asset('assets/images/featured-cars/agya.jpg')}}" alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2019
											<span class="featured-mi-span"> 3100 mi</span>
											<span class="featured-hp-span"> 240HP</span>
											 automatic
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">Agya <span>v520</span></a></h2>
										<p>

									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="{{asset('assets/images/featured-cars/Xenia.png')}}" alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2019
											<span class="featured-mi-span"> 3100 mi</span>
											<span class="featured-hp-span"> 240HP</span>
											 Manual
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">Xenia <span> a3</span> </a></h2>

									<p>

									</p>
								</div>
							</div>
						</div>
					</div>
					{{-- <div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="assets/images/featured-cars/fc4.png" alt="cars">
									</div> --}}
									{{-- <div class="featured-model-info">
										<p>
											model: 2017
											<span class="featured-mi-span"> 3100 mi</span>
											<span class="featured-hp-span"> 240HP</span>
											 automatic
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">infiniti <span>z5</span></a></h2>

									<p>

									</p>
								</div>
							</div>
						</div> --}}
						{{-- <div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="assets/images/featured-cars/fc5.png" alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2017
											<span class="featured-mi-span"> 3100 mi</span>
											<span class="featured-hp-span"> 240HP</span>
											 automatic
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">porsche <span>718</span> cayman</a></h2>

									<p>

									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="assets/images/featured-cars/fc7.png" alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2017
											<span class="featured-mi-span"> 3100 mi</span>
											<span class="featured-hp-span"> 240HP</span>
											 automatic
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#"><span>bmw 8-</span>series coupe</a></h2>

									<p>

									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="assets/images/featured-cars/fc8.png" alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2017
											<span class="featured-mi-span"> 3100 mi</span>
											<span class="featured-hp-span"> 240HP</span>
											 automatic
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">BMW <span> x</span>series-6</a></h2>

									<p>

									</p>
								</div> --}}
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.featured-cars-->
		<!--featured-cars end -->



		<!--brand strat -->
		<section id="brand"  class="brand">
			<div class="container">
				<div class="brand-area">
					<div class="owl-carousel owl-theme brand-item">
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br1.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br2.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br3.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br4.png" alt="brand-image" />
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br5.png" alt="brand-image" />
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br6.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
					</div><!--/.owl-carousel-->
				</div><!--/.clients-area-->

			</div><!--/.container-->

		</section><!--/brand-->
		<!--brand end -->

		<!--blog start -->
		<section id="blog" class="blog"></section><!--/.blog-->
		<!--blog end -->

		<!--contact start-->
<footer id="contact" class="contact" style="background-color: #222; color: #fff; padding: 40px 0;">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <!-- Footer Column 1 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-logo">
                            <a href="index.html" style="font-size: 24px; font-weight: bold; color: #fff;">Rental FI</a>
                        </div>
                        <p style="margin-top: 15px;">Rental aman dan nyaman.</p>
                        <div class="footer-contact" style="margin-top: 20px;">
                            <p><i class="fa fa-envelope"></i> Fajri@gmail.com</p>
                            <p><i class="fa fa-phone"></i> 089678980</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Column 2 -->
                <div class="col-md-3 col-xs-12">
                    <div class="single-footer-widget">
                        <h2 style="color: #fff; font-size: 18px; margin-bottom: 20px;">Mobil</h2>
                        <ul style="list-style: none; padding-left: 0;">
                            <li><a href="#" style="color: #ddd;">Avanza</a></li>
                            <li><a href="#" style="color: #ddd;">Xenia</a></li>
                            <li><a href="#" style="color: #ddd;">Agya</a></li>
                            <li><a href="#" style="color: #ddd;">Ayla</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Column 3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h2 style="color: #fff; font-size: 18px; margin-bottom: 20px;">Newsletter</h2>
                        <div class="footer-newsletter">
                            <p style="color: #ddd;">Subscribe to get the latest news, updates, and information.</p>
                            <!-- Optional: Add subscription form here -->
                        </div>
                    </div>
                </div>

                <!-- Footer Column 4 (Empty Column) -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h2 style="color: #fff; font-size: 18px; margin-bottom: 20px;">Follow Us</h2>
                        <div class="footer-social">
                            <a href="#" style="color: #ddd; margin-right: 10px; font-size: 20px;"><i class="fa fa-facebook"></i></a>
                            <a href="#" style="color: #ddd; margin-right: 10px; font-size: 20px;"><i class="fa fa-instagram"></i></a>
                            <a href="#" style="color: #ddd; margin-right: 10px; font-size: 20px;"><i class="fa fa-linkedin"></i></a>
                            <a href="#" style="color: #ddd; margin-right: 10px; font-size: 20px;"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#" style="color: #ddd; margin-right: 10px; font-size: 20px;"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Copyright -->
        <div class="footer-copyright" style="border-top: 1px solid #444; padding-top: 20px; margin-top: 30px;">
            <div class="row">
                <div class="col-sm-6">
                    <p style="font-size: 14px;">&copy; 2024 Rental FI. Designed and developed by <a href="" style="color: #ddd;">Fajri Iyeng</a>.</p>
                </div>
                <div class="col-sm-6">
                    <div class="footer-social" style="text-align: right;">
                        <a href="#" style="color: #ddd; margin-left: 10px; font-size: 20px;"><i class="fa fa-facebook"></i></a>
                        <a href="#" style="color: #ddd; margin-left: 10px; font-size: 20px;"><i class="fa fa-instagram"></i></a>
                        <a href="#" style="color: #ddd; margin-left: 10px; font-size: 20px;"><i class="fa fa-linkedin"></i></a>
                        <a href="#" style="color: #ddd; margin-left: 10px; font-size: 20px;"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#" style="color: #ddd; margin-left: 10px; font-size: 20px;"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <div id="scroll-Top">
        <div class="return-to-top">
            <i class="fa fa-angle-up" id="scroll-top" data-toggle="tooltip" data-placement="top" title="Back to Top" aria-hidden="true"></i>
        </div>
    </div>
</footer>
<!--contact end-->




		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="{{asset('assets/js/jquery.js')}}"></script>

        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

		<!--bootstrap.min.js-->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

		<!-- bootsnav js -->
		<script src="{{asset('assets/js/bootsnav.js')}}"></script>

		<!--owl.carousel.js-->
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--Custom JS-->
        <script src="{{asset('assets/js/custom.js')}}"></script>

    </body>

</html>
