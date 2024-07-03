@extends('layout.view')

@section('content')

    <!-- Hero Start -->
    <section class="apihu-port-hero-area" id="apihu-port-hero">

        <!-- Hero bg shape -->
        <img class="apihu-port-hero-shape-1" src="{{asset('Saasio')}}/assets/img/port-img-31/hero-shape.png" alt="Shape">
        <img class="apihu-port-hero-shape-2" src="{{asset('Saasio')}}/assets/img/port-img-31/hero-figma-logo.png" alt="Shape">
        <img class="apihu-port-hero-shape-3" src="{{asset('Saasio')}}/assets/img/port-img-31/hero-ai-logo.png" alt="Shape">
        <img class="apihu-port-hero-shape-4" src="{{asset('Saasio')}}/assets/img/port-img-31/hero-ps-logo.png" alt="Shape">

        <span class="apihu-port-hero-side-style-text">Phone</span>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="row" style="margin: 100px 0 0 0">
                        <div class=" mx-sm-3 mb-2" style="    height: 80px;width:100%;box-shadow: -6px -6px 10px #5f6163, 4px 3px 15px rgba(127, 163, 199, 0.3);">
                        <form id="ImeiForm" style="margin: 10px">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="inputPassword2" class="sr-only">IMEI</label>
                                        <input type="text" style="height: 63px" class="form-control imei" id="inputPassword2" placeholder="IMEI">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button onclick="checkStatus()" type="button" style="    width: 100%;"  class="apihu-port-hero-btn-white">Sorgula</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="apihu-port-hero-left">

                        <p class="apihu-port-hero-subtitle wow slideInDown">Hoşgeldiniz Phone Hospital</p>
                        <h1 class="apihu-port-hero-title cd-headline clip is-full-width">Hi I’m iRepair<br/> <span class="apihu-port-hero-title-color cd-words-wrapper">
								<b class="is-visible">Ekran Değişimi</b>
								<b>Batarya Değişimi</b>
								<b>Kamera Değişimi</b>
								<b>Anakart Tamiri</b>
							</span>
                            <span class="apihu-port-hero-title-small-text">Yapabiliyorum</span>
                        </h1>
                        <p class="apihu-port-hero-text wow slideInUp">
                            Tamir fiyatlarımızı öğrenmek ve cihazınızı onarıma göndermek <br>için aşağıdaki yönlendirme butonu ile adımları takip ediniz.
                        </p>
                        <ul class="apihu-port-hero-btn-wrap wow slideInUp">
                            <li><a class="apihu-port-primary-btn apihu-port-hero-btn-gradient" href="#">Cihazımı Tamir Et+</a></li>
                            <li><a class="apihu-port-secondary-btn apihu-port-hero-btn-white" href="#">Fiyat Listesi İndir <i class="fas fa-download"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!-- hero area social -->
                    <div class="apihu-port-hero-social">
                        <ul>
                            <li><a href="https://www.facebook.com/phonehospital.com.tr/"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/phonehospital.com.tr/"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="apihu-port-hero-right wow slideInRight">
                        <div class="apihu-port-hero-right-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/hero-right.png" alt="Hero Area">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- About Start -->
    <section class="apihu-port-about-area" id="apihu-port-resume">
        <img src="{{asset('Saasio')}}/assets/img/port-img-31/about-shape-1.png" alt="" class="apihu-port-about-shape">

        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="apihu-port-about-left wow slideInLeft">
                        <div class="apihu-port-about-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/about-left.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="apihu-port-about-right">
                        <h3 class="apihu-port-about-subtitle">Phone Hospital Kimdir</h3>
                        <h2 class="apihu-port-about-title">2013'ten bu yana sizlere hizmet vermekteyiz.</h2>
                        <p class="apihu-port-about-text">2013 yılında büyükçekmecede başlayan serüvenimiz, sonrasında marmarapark ,carrefourSA ve Torium AVM lerde Teknik servis ve parça satışı yapılabilmektedir.</p>
                        <div class="apihu-port-about-expertise">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Telefon</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Aksesuar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Teknik Servis</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <ul>
                                        <li>
                                            <span class="apihu-port-expertise-title">User Experience Design - UI/UX</span>
                                            <span class="apihu-port-expertise-text">Delight the user and make it work.</span>
                                        </li>
                                        <li>
                                            <span class="apihu-port-expertise-title">Web & User Interface Design - Development</span>
                                            <span class="apihu-port-expertise-text">Websites, web experiences, ...</span>
                                        </li>
                                        <li>
                                            <span class="apihu-port-expertise-title">Interaction Design - Animation</span>
                                            <span class="apihu-port-expertise-text">I like to move it move it.</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <ul>
                                        <li>
                                            <span class="apihu-port-expertise-title">UX Design Awards 2021</span>
                                            <span class="apihu-port-expertise-text">Design Center Berlin</span>
                                        </li>
                                        <li>
                                            <span class="apihu-port-expertise-title">Web Development Awards 2021</span>
                                            <span class="apihu-port-expertise-text">CSS Design Awards</span>
                                        </li>
                                        <li>
                                            <span class="apihu-port-expertise-title">Mobile App Designer Award 2021</span>
                                            <span class="apihu-port-expertise-text">Design Studio USA</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <ul>
                                        <li>
                                            <span class="apihu-port-expertise-title">Bachelor of Arts (B.A.)</span>
                                            <span class="apihu-port-expertise-text">Stanford university USA</span>
                                        </li>
                                        <li>
                                            <span class="apihu-port-expertise-title">UX design Course</span>
                                            <span class="apihu-port-expertise-text">UK UX design schools</span>
                                        </li>
                                        <li>
                                            <span class="apihu-port-expertise-title">UI Design Course</span>
                                            <span class="apihu-port-expertise-text">Austin Center for Design</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->

    <!-- Service Start -->
    <section class="apihu-port-service-area" id="apihu-port-feature">
        <img class="apihu-port-service-shape-1" src="{{asset('Saasio')}}/assets/img/port-img-31/service-shape-1.png" alt="Service Shape">
        <img class="apihu-port-service-shape-2" src="{{asset('Saasio')}}/assets/img/port-img-31/service-shape-2.png" alt="Service Shape">

        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="apihu-port-section-heading">
                        <p class="apihu-port-section-subtitle">Neden Biz ?</p>
                        <h2 class="apihu-port-section-title">Bizi tercih etmeniz için geçerli sebeplerimiz </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="apihu-port-single-service wow fadeInUp" data-wow-delay="0.2s">
                        <div class="apihu-port-service-icon-box">
                            <i class="flaticon-social-media-marketing"></i>
                        </div>
                        <h3 class="apihu-port-single-service-title">Gerçek Arıza Tespiti</h3>
                        <p class="apihu-port-single-service-text">Marka'da uzman ekibimiz , yüksek teknoloji arıza tespit cihazlarımız ve yapay zeka destekli doğru %99 gerçek azıra tespiti yapmaktayız</p>
                        <a class="apihu-port-single-service-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="apihu-port-single-service wow fadeInUp" data-wow-delay="0.4s">
                        <div class="apihu-port-service-icon-box">
                            <i class="flaticon-social-media-marketing"></i>
                        </div>
                        <h3 class="apihu-port-single-service-title">24 Saatte tamir garantisi</h3>
                        <p class="apihu-port-single-service-text">Arıza tespiti yapılarak tarafınızdan onay aldıktan sonra cihazlarınız ortalama 24 saat sonra kargoya teslim edilir.</p>
                        <a class="apihu-port-single-service-btn" href="#">Devamını Oku<i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="apihu-port-single-service wow fadeInUp" data-wow-delay="0.6s">
                        <div class="apihu-port-service-icon-box">
                            <i class="flaticon-social-media-marketing"></i>
                        </div>
                        <h3 class="apihu-port-single-service-title">180 Gün tamir garantisi</h3>
                        <p class="apihu-port-single-service-text">Değişimi veya arızası yapılan parçalar tarafımızca 180 gün garantilidir. 180 gün içerisinde arıza yapar ise ücretsiz arıza tamiri yapılır.</p>
                        <a class="apihu-port-single-service-btn" href="#">Devamını Oku <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="apihu-port-single-service wow fadeInUp" data-wow-delay="0.8s">
                        <div class="apihu-port-service-icon-box">
                            <i class="flaticon-social-media-marketing"></i>
                        </div>
                        <h3 class="apihu-port-single-service-title">Verileriniz Silinmez</h3>
                        <p class="apihu-port-single-service-text">Tamir esnasında veri kaybı yaşamazsınız</p>
                        <a class="apihu-port-single-service-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Service End -->

    <!-- CTA Start -->
    <section class="apihu-port-cta-area">
        <img class="apihu-port-cta-shape" src="{{asset('Saasio')}}/assets/img/port-img-31/cta-bg.png" alt="Cta shape">

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="apihu-port-cta-content-wrap">

                        <img class="apihu-port-cta-container-shape" src="{{asset('Saasio')}}/assets/img/port-img-31/cta-bg-shape.png" alt="Cta container shape">

                        <div class="row">
                            <div class="col-xl-8 col-lg-8">
                                <div class="apihu-port-cta-content-text">
                                    <p>Tamire Başlayın</p>
                                    <h2>Tamir edilecek cihazınızı ve arızanızı seçin</h2>
                                    <a href="#">Contact Me +</a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="apihu-port-cta-content-img">
                                    <img src="{{asset('Saasio')}}/assets/img/port-img-31/cta-right.png" alt="Call to action area">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA End -->

    <!-- Testimonial Start -->
    <section class="apihu-port-testimonial-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="apihu-port-section-heading">
                        <p class="apihu-port-section-subtitle">Yorumlar</p>
                        <h2 class="apihu-port-section-title">Mutlu Müşteriler</h2>
                        <p class="apihu-port-section-text">
                            iRepair'e cihazını tamir ettiren müşterimizin mutluluğu bizim mutluluğumuzdur.<br/>
                            Sizde cihazınızı tamir ettirmek istiyorsanız, bizi tercih etmekte geç kalmayın
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="apihu-port-testimonial-slider owl-carousel">
                        <div class="apihu-port-single-testimonial">
                            <ul class="apihu-port-testimonial-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                            </ul>
                            <p class="apihu-port-testimonial-text">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum cumsan lacus vel facilisis.’’</p>
                            <div class="apihu-port-testimonial-meta">
                                <div class="apihu-port-testimonial-meta-text">
                                    <h3>Jonah D. Kwon</h3>
                                    <p>CEO / Founder</p>
                                </div>
                                <div class="apihu-port-testimonial-meta-img">
                                    <img src="{{asset('Saasio')}}/assets/img/port-img-31/testimonial-author-1.png" alt="Testimonial Author">
                                </div>
                            </div>
                        </div>
                        <div class="apihu-port-single-testimonial">
                            <ul class="apihu-port-testimonial-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                                <li><i class="far fa-star"></i></li>
                            </ul>
                            <p class="apihu-port-testimonial-text">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum cumsan lacus vel facilisis.’’</p>
                            <div class="apihu-port-testimonial-meta">
                                <div class="apihu-port-testimonial-meta-text">
                                    <h3>Jonah D. Kwon</h3>
                                    <p>CEO / Founder</p>
                                </div>
                                <div class="apihu-port-testimonial-meta-img">
                                    <img src="{{asset('Saasio')}}/assets/img/port-img-31/testimonial-author-2.png" alt="Testimonial Author">
                                </div>
                            </div>
                        </div>
                        <div class="apihu-port-single-testimonial">
                            <ul class="apihu-port-testimonial-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                            </ul>
                            <p class="apihu-port-testimonial-text">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum cumsan lacus vel facilisis.’’</p>
                            <div class="apihu-port-testimonial-meta">
                                <div class="apihu-port-testimonial-meta-text">
                                    <h3>Jonah D. Kwon</h3>
                                    <p>CEO / Founder</p>
                                </div>
                                <div class="apihu-port-testimonial-meta-img">
                                    <img src="{{asset('Saasio')}}/assets/img/port-img-31/testimonial-author-1.png" alt="Testimonial Author">
                                </div>
                            </div>
                        </div>
                        <div class="apihu-port-single-testimonial">
                            <ul class="apihu-port-testimonial-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                                <li><i class="far fa-star"></i></li>
                            </ul>
                            <p class="apihu-port-testimonial-text">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum cumsan lacus vel facilisis.’’</p>
                            <div class="apihu-port-testimonial-meta">
                                <div class="apihu-port-testimonial-meta-text">
                                    <h3>Jonah D. Kwon</h3>
                                    <p>CEO / Founder</p>
                                </div>
                                <div class="apihu-port-testimonial-meta-img">
                                    <img src="{{asset('Saasio')}}/assets/img/port-img-31/testimonial-author-2.png" alt="Testimonial Author">
                                </div>
                            </div>
                        </div>
                        <div class="apihu-port-single-testimonial">
                            <ul class="apihu-port-testimonial-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                            </ul>
                            <p class="apihu-port-testimonial-text">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum cumsan lacus vel facilisis.’’</p>
                            <div class="apihu-port-testimonial-meta">
                                <div class="apihu-port-testimonial-meta-text">
                                    <h3>Jonah D. Kwon</h3>
                                    <p>CEO / Founder</p>
                                </div>
                                <div class="apihu-port-testimonial-meta-img">
                                    <img src="{{asset('Saasio')}}/assets/img/port-img-31/testimonial-author-1.png" alt="Testimonial Author">
                                </div>
                            </div>
                        </div>
                        <div class="apihu-port-single-testimonial">
                            <ul class="apihu-port-testimonial-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                                <li><i class="far fa-star"></i></li>
                            </ul>
                            <p class="apihu-port-testimonial-text">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum cumsan lacus vel facilisis.’’</p>
                            <div class="apihu-port-testimonial-meta">
                                <div class="apihu-port-testimonial-meta-text">
                                    <h3>Jonah D. Kwon</h3>
                                    <p>CEO / Founder</p>
                                </div>
                                <div class="apihu-port-testimonial-meta-img">
                                    <img src="{{asset('Saasio')}}/assets/img/port-img-31/testimonial-author-2.png" alt="Testimonial Author">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <section class="apihu-port-contact-area"  id="apihu-port-clients">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-left">
                    <div class="apihu-port-section-heading">
                        <p class="apihu-port-section-subtitle">İletişim</p>
                        <h2 class="apihu-port-section-title">Bize mail ile ulaşabilrsiniz</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="apihu-port-section-heading">
                        <p class="apihu-port-section-text">
                            Ekibimiz en kısa süre sizin ile iletişime geçecek.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="apihu-port-contact-left">
                        <form>
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="text" placeholder="First Name">
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <input type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <input type="text" placeholder="Subject">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <textarea placeholder="Message"></textarea>
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit">Submit Now <i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="apihu-port-contact-right">
                        <div class="apihu-port-contact-right-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/contact-right.jpg" alt="Contact Right">
                        </div>
                        <div class="apihu-port-contact-right-content">
                            <div class="apihu-port-contact-icon-box">
                                <i class="flaticon-help"></i>
                            </div>
                            <div class="apihu-port-contact-text">
                                <span class="apihu-port-contact-number">+90 212 444 2370</span>
                                <span class="apihu-port-contact-email"><a href="mailto:destek@phonehospital.com.tr">destek@phonehospital.com.tr</a></span>
                                <span class="apihu-port-contact-email"><a href="mailto:info@phonehospital.com.tr">info@phonehospital.com.tr</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->

    <!-- Blog Start -->
    <section class="apihu-port-blog-area" id="apihu-port-blog">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="apihu-port-section-heading">
                        <p class="apihu-port-section-subtitle">Blog</p>
                        <h2 class="apihu-port-section-title">Our Latest News & Post</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 owl-carousel apihu-port-blog-carousel">
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-1.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-2.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-3.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-1.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-2.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-3.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-1.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-2.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-3.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-1.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-2.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                    <div class="apihu-port-single-blog">
                        <div class="apihu-port-single-blog-img">
                            <img src="{{asset('Saasio')}}/assets/img/port-img-31/blog-3.jpg" alt="Single Blog Post">
                        </div>
                        <div class="apihu-port-single-blog-text">
                            <div class="apihu-port-single-blog-meta-info">
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#">App Development</a>
                                </div>
                                <div class="apihu-port-blog-meta-single">
                                    <div class="apihu-port-blog-meta-icon-box">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <a href="#">5 Comments</a>
                                </div>
                            </div>
                            <a href="#">
                                <h3>Mobile app Landing page Design
                                    & app Maintain</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')

    <script>
        var as_alert_default,as_alert_error,
            as_alert_warning,as_alert_success,
            btn_as_alert_default,btn_as_alert_error,
            btn_as_alert_warning,btn_as_alert_success;

        as_alert_default = document.getElementById('default');
        as_alert_error = document.getElementById('error');
        as_alert_warning = document.getElementById('warning');
        as_alert_success = document.getElementById('success');
        // ----------------------------------------------------------
        btn_as_alert_default = document.getElementById('btn-default');
        btn_as_alert_error = document.getElementById('btn-error');
        btn_as_alert_warning = document.getElementById('btn-warning');
        btn_as_alert_success = document.getElementById('btn-success');
    </script>
    <script>
        function checkStatus() {
            var as_alert_default = document.getElementById('default');

            var imei = $("#ImeiForm").find('input.imei').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo e(route('checkStatus')); ?>?imei='+imei+'',
                type: 'POST',
                success: function (gelenveri) {
                    console.log(gelenveri);
                    Swal.fire({
                        title: 'Sonuç!',
                        text: gelenveri.message,
                        icon: 'success',
                        confirmButtonText: 'KAPAT'
                    })
                },
                error: function (hata) {

                }
            });
        }
    </script>
@endsection
