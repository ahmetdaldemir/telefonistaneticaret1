@extends('layout.repair')

@section('content')
<section class="cpr__banner-welcome">
    <img class="cpr__banner-background-phone"
         src="{{asset('repair/assets/repairImg/home/backgroundSlider1.png')}}" alt="Phone"
         id="image_home_0">
    <div class="cpr__banner-background">
        <div class="cpr__banner-t-s">
            <h2 class="cpr__banner-t" id="home_0">Teknik serviste lider</h2>
            <h3 class="cpr__banner-s" type-tag="h3" id="home_1">Telefon ve tablet tedavi merkezi</h3><label class="cpr__banner-t-cp" id="home_2">Telefonun son durumunu
                sorgula</label>
            <div class="cpr__banner-postc">
                <input id="imei" class="cpr__banner-postc-input no-highlight"  aria-label="IMEI NUMBER" maxlength="10" placeholder="FORM NUMARASI" type="text">
                <div class="cpr__banner-postc-btn" onclick="checkStatus()">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.521 18.0498L14.5654 14.0872M16.7574 8.79132C16.7574 10.7791 15.9678 12.6855 14.5622 14.091C13.1567 15.4966 11.2503 16.2863 9.26251 16.2863C7.27473 16.2863 5.36837 15.4966 3.96279 14.091C2.55722 12.6855 1.76758 10.7791 1.76758 8.79132C1.76758 6.80354 2.55722 4.89718 3.96279 3.4916C5.36837 2.08603 7.27473 1.29639 9.26251 1.29639C11.2503 1.29639 13.1567 2.08603 14.5622 3.4916C15.9678 4.89718 16.7574 6.80354 16.7574 8.79132V8.79132Z"
                            stroke="white" stroke-width="2.09417" stroke-linecap="round"></path>
                    </svg>
                </div>
            </div>
            <div class="cpr__location-wrap">
                <button type="button" class="cpr__location-link link--default link--light">
                    <span class="cpr__location-label location-default"><span>Sadece Numara Kısmını Yazınız ÖRN : 2022</span></span>
                </button>
                <div class="cpr__location-link link--active link--light link--hide"
                     onclick="handleAutoLocation('/location-results')" id="home_a5b3b95a-1bcc-4ffd-af8a-e57996c4703d">
                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.520943 5.69485C0.506935 5.6738 0.499638 5.64901 0.500014 5.62373H0.500024C0.500416 5.59829 0.508521 5.57358 0.523267 5.55285C0.537971 5.53218 0.55859 5.51644 0.582407 5.50771C0.582472 5.50769 0.582537 5.50767 0.582602 5.50764L14.3322 0.507788L14.3328 0.507578C14.3552 0.49941 14.3794 0.497806 14.4027 0.502956C14.4259 0.508105 14.4472 0.519794 14.4641 0.536646C14.4809 0.553498 14.4926 0.57481 14.4977 0.598073C14.5028 0.621339 14.5012 0.645584 14.493 0.667953L14.4927 0.668895L9.49271 14.4188C9.48406 14.4426 9.46838 14.4632 9.44775 14.4779C9.42778 14.4921 9.4041 14.5002 9.37964 14.501H9.37508H9.3749C9.3499 14.501 9.32547 14.4935 9.30477 14.4795C9.28407 14.4655 9.26805 14.4456 9.25877 14.4224L9.25869 14.4222L6.85807 8.42094L6.77849 8.222L6.57955 8.14241L0.578929 5.74179L0.578642 5.74167C0.555108 5.73228 0.534985 5.71595 0.520943 5.69485Z"
                            stroke="#545454"></path>
                    </svg>
                    <span class="cpr__location-label location-default"><span>Mevcut konumumu kullan</span></span> <span
                        class="cpr__location-label location-error">Şu anda konumunuz getirilemiyor. <i>Tekrar Deneyiniz</i></span>
                </div>
            </div>

        </div>

    </div>

</section>
<section class="cpr__device-fixes">
    <h2 class="cpr__device-fixes-t" id="home_5">Fark yaratan onarım hizmetlerimiz</h2><a
        page-type="BOOKING" language="English" class="cpr__btn cpr__btn-primary fit" id="home_6" href="{{route('cihazimi-tamir-et')}}"
        title="Cihazimi Tamir Et" aria-label="Cihazimi Tamir Et">

        <label class="cpr__btn-lbl" type-tag="label">Cihazimi Tamir Et</label>

        <svg class="cpr__btn-icon" width="12" height="16" viewBox="0 0 12 16" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path
                d="M7.94581 11.5873L3.6784 15.7491L0.00130729 12.1625L4.26807 8.00066L0 3.83821L3.6784 0.250994L7.94647 4.41344L11.6236 8.00004L7.94581 11.5873Z"
                fill="white"></path>
        </svg>
    </a>
    <div class="cpr__device-fixes-list--container">
        <div class="swiper mySwiper1" name="swipers" id="mySwiper1">
            <div class="swiper-wrapper cpr__device-fixes-list">
                <div class="cpr__device-fixes-item swiper-slide mobile first-cover-mobile"
                     title="Swipe left check out our repair services">
                    <img class="cpr__device-fixes-item-img" width="242" height="366"
                         src="repair/assets/img/home/card-phones%EF%B9%96v=1706635941210.webp"
                         alt="Swipe left check out our repair services" id="image_home_2" aria-hidden="true">
                    <svg width="57" height="40" viewBox="0 0 57 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                         aria-hidden="true">
                        <path
                            d="M18.5 15V10H20V12.025C21.1667 11.075 22.471 10.3333 23.913 9.8C25.3543 9.26667 26.8833 9 28.5 9C31.2667 9 33.5333 9.63733 35.3 10.912C37.0667 12.1873 38.1333 13.55 38.5 15H36.925C36.5417 14 35.6377 13 34.213 12C32.7877 11 30.8833 10.5 28.5 10.5C26.9833 10.5 25.5543 10.7667 24.213 11.3C22.871 11.8333 21.6667 12.5667 20.6 13.5H23.5V15H18.5ZM26.2 31L20.45 25.25L22.625 23L25.5 23.65V15.5C25.5 14.8 25.7417 14.2083 26.225 13.725C26.7083 13.2417 27.3 13 28 13C28.7 13 29.2917 13.2417 29.775 13.725C30.2583 14.2083 30.5 14.8 30.5 15.5V19.8H31.3L36.6 22.375L35.175 31H26.2ZM27.05 29H33.45L34.4 23.55L30.25 21.5H28.5V15.5C28.5 15.35 28.4543 15.229 28.363 15.137C28.271 15.0457 28.15 15 28 15C27.85 15 27.729 15.0457 27.637 15.137C27.5457 15.229 27.5 15.35 27.5 15.5V26.1L23.25 25.2L27.05 29Z"
                            fill="#4E4E50"></path>
                        <rect x="1" y="0.5" width="55" height="39" rx="19.5" stroke="#F15F5E"></rect>
                    </svg>
                    <label class="cpr__device-fixes-item--swipe" id="home_7">Swipe left</label> <label
                        class="cpr__device-fixes-item--check" id="home_8">and check out our repair
                        services</label>
                </div>
                <a class="cpr__device-fixes-item swiper-slide" href="{{route('markalar',['type' => 'phone'])}}"
                   title="iPhone Repair Services Phone Hospital technicians are professionally trained to repair the latest Apple iPhone models. From smaller repairs like cracked screens, broken home buttons, muffled audio and broken charging ports to more complex issues such as broken LCDs, water damage, and jailbreaking, Phone Hospital Cell Phone Repair can fix your broken iPhone. Cihazimi Tamir Et"
                   aria-label="iPhone Repair Services Phone Hospital technicians are professionally trained to repair the latest Apple iPhone models. From smaller repairs like cracked screens, broken home buttons, muffled audio and broken charging ports to more complex issues such as broken LCDs, water damage, and jailbreaking, Phone Hospital Cell Phone Repair can fix your broken iPhone. Cihazimi Tamir Et"><img
                        class="cpr__device-fixes-item-img" aria-hidden="true" width="155" height="115"
                        src="repair/assets/client/repairs/2/mobile%EF%B9%96v=1706635941210.webp"
                        alt="iPhone Repair Services" id="image_home_card_2">
                    <h2 class="cpr__device-fixes-item-t">Telefon Teknik Servis</h2>
                    <section class="cpr__device-fixes-item-d">
                        Mobil dünyanın vazgeçilmez parçası olan telefonlarınızda yaşanan sorunlar için buradayız.
                        Ekran değişimi, pil sorunları, yazılım güncellemeleri ve daha fazlası için profesyonel telefon
                        tamiri hizmetimizle sizi bekliyoruz. Hızlı, güvenilir ve uygun fiyatlarla çözüme ulaşın!


                    </section>
                    <div class="cpr__device-fixes-item-more-btn">
                        <span class="cpr__device-more-link">Cihazimi Tamir Et</span>
                        <div aria-hidden="true">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.63429 11.3362L4.36687 15.498L0.689784 11.9114L4.95654 7.74962L0.688477 3.58718L4.36687 -4.3869e-05L8.63494 4.1624L12.312 7.749L8.63429 11.3362Z"
                                    fill="#F15F5E"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                <a class="cpr__device-fixes-item swiper-slide" href="#"
                   title="Smartphones Repair Services At Phone Hospital, we fix smartphones of all makes and models including devices by Samsung, Google Pixel, Motorola, BlackBerry, and more. Our technicians are here to save your mobile life when your smartphone has a cracked screen, malfunctioning charging port, water damage, or any issue that prevents you from getting the most out of your device. Cihazimi Tamir Et"
                   aria-label="Smartphones Repair Services At Phone Hospital, we fix smartphones of all makes and models including devices by Samsung, Google Pixel, Motorola, BlackBerry, and more. Our technicians are here to save your mobile life when your smartphone has a cracked screen, malfunctioning charging port, water damage, or any issue that prevents you from getting the most out of your device. Cihazimi Tamir Et"><img
                        class="cpr__device-fixes-item-img" aria-hidden="true" width="155" height="115"
                        src="{{asset('repair/assets/repairImg/repair/watch/iPhone6-05ss.png')}}" alt="Smartphone Repair"
                        id="image_home_card_1">
                    <h2 class="cpr__device-fixes-item-t">Apple Watch Teknik Servis</h2>
                    <section class="cpr__device-fixes-item-d">
                        Apple Watch'unuzda meydana gelen her türlü sorun için uzman teknik ekibimizle size destek
                        oluyoruz.
                        Ekran çatlakları, şarj sorunları, sensör hataları ve yazılım güncellemeleri gibi konularda
                        güvenilir ve hızlı tamir hizmeti sunuyoruz. Apple Watch'unuzu en üst performansta tutmak için
                        bize ulaşın.


                    </section>
                    <div class="cpr__device-fixes-item-more-btn">
                        <span class="cpr__device-more-link">Cihazimi Tamir Et</span>
                        <div aria-hidden="true">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.63429 11.3362L4.36687 15.498L0.689784 11.9114L4.95654 7.74962L0.688477 3.58718L4.36687 -4.3869e-05L8.63494 4.1624L12.312 7.749L8.63429 11.3362Z"
                                    fill="#F15F5E"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                <a class="cpr__device-fixes-item swiper-slide" href="#"
                   title="iPad Repair Services At Phone Hospital, our technicians are trained to professionally and quickly repair iPads of all generations. Whether you have a broken digitizer, shattered screen, broken microphones or speakers, charging issues or water damage, Phone Hospital can repair your iPad. Cihazimi Tamir Et"
                   aria-label="iPad Repair Services At Phone Hospital, our technicians are trained to professionally and quickly repair iPads of all generations. Whether you have a broken digitizer, shattered screen, broken microphones or speakers, charging issues or water damage, Phone Hospital can repair your iPad. Cihazimi Tamir Et"><img
                        class="cpr__device-fixes-item-img" aria-hidden="true" width="155" height="115"
                        src="repair/assets/client/repairs/300/mobile%EF%B9%96v=1706635941210.webp"
                        alt="iPad Repair Services" id="image_home_card_300">
                    <h2 class="cpr__device-fixes-item-t">Tablet Teknik Servis</h2>
                    <section class="cpr__device-fixes-item-d">
                        Tabletlerinizde yaşanan teknik sorunlar artık sorun olmaktan çıkıyor.
                        Ekran çatlamaları, şarj sorunları, donma ve hız sorunları gibi tablet
                        problemleriyle ilgili uzman ekibimizle hızlı ve güvenilir onarımlar yapıyoruz.
                        Tabletlerinizin performansını artırmak için bizimle iletişime
                    </section>
                    <div class="cpr__device-fixes-item-more-btn">
                        <span class="cpr__device-more-link">Cihazimi Tamir Et</span>
                        <div aria-hidden="true">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.63429 11.3362L4.36687 15.498L0.689784 11.9114L4.95654 7.74962L0.688477 3.58718L4.36687 -4.3869e-05L8.63494 4.1624L12.312 7.749L8.63429 11.3362Z"
                                    fill="#F15F5E"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                <a class="cpr__device-fixes-item swiper-slide" href="#"
                   title="Mac Repair Services From laptops to desktops, our experienced technicians are equipped to repair all makes and models of Apple MacBook computers. Whether it’s a small glitch or major issue, Phone Hospital is the best in the business when it comes to fast and affordable fixes. Cihazimi Tamir Et"
                   aria-label="Mac Repair Services From laptops to desktops, our experienced technicians are equipped to repair all makes and models of Apple MacBook computers. Whether it’s a small glitch or major issue, Phone Hospital is the best in the business when it comes to fast and affordable fixes. Cihazimi Tamir Et"><img
                        class="cpr__device-fixes-item-img" aria-hidden="true" width="155" height="115"
                        src="repair/assets/client/repairs/388/mobile%EF%B9%96v=1706635941210.webp" alt="Mac Repair"
                        id="image_home_card_388">
                    <h2 class="cpr__device-fixes-item-t">Mac Teknik Servis</h2>
                    <section class="cpr__device-fixes-item-d">
                        Mac cihazlarınızda yaşanan her türlü teknik sorunu çözmek için buradayız.
                        Yazılım güncellemeleri, donanım onarımları, performans artırma ve bakım hizmetlerimizle Mac
                        cihazlarınızı en üst düzeyde tutuyoruz.
                        Profesyonel destek için bize güvenebilirsiniz.
                    </section>
                    <div class="cpr__device-fixes-item-more-btn">
                        <span class="cpr__device-more-link">Cihazimi Tamir Et</span>
                        <div aria-hidden="true">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.63429 11.3362L4.36687 15.498L0.689784 11.9114L4.95654 7.74962L0.688477 3.58718L4.36687 -4.3869e-05L8.63494 4.1624L12.312 7.749L8.63429 11.3362Z"
                                    fill="#F15F5E"></path>
                            </svg>
                        </div>
                    </div>
                </a>


            </div>
            <div class="swiper-pagination swiper-pagination-mySwiper1"></div>
        </div>
    </div>
</section>
<section class="cpr__view-all-devices desktop tablet">
    <span class="cpr__view-all-device-divisor"></span>
</section>
<section class="cpr__repair-services">
    <header class="cpr__repair-head">
        <div class="cpr__repair-tab" data-target="#tab1">
            <label class="cpr__repair-tab-lbl" id="home_11">Telefon Servisi</label>
            <svg class="cpr__repair-tab-selected" width="67" height="5" viewBox="0 0 67 5" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.22168" width="66" height="4" rx="2" fill="#404245"></rect>
            </svg>
        </div>
        <div class="cpr__repair-tab" data-target="#tab2">
            <label class="cpr__repair-tab-lbl" id="home_12">Saat Servisi</label>
            <svg class="cpr__repair-tab-selected" width="67" height="5" viewBox="0 0 67 5" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.22168" width="66" height="4" rx="2" fill="#404245"></rect>
            </svg>
        </div>
        <div class="cpr__repair-tab" data-target="#tab3">
            <label class="cpr__repair-tab-lbl" id="home_13">iPad Servisi</label>
            <svg class="cpr__repair-tab-selected" width="67" height="5" viewBox="0 0 67 5" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.22168" width="66" height="4" rx="2" fill="#404245"></rect>
            </svg>
        </div>
        <div class="cpr__repair-tab" data-target="#tab4">
            <label class="cpr__repair-tab-lbl" id="home_14">Mac Servisi</label>
            <svg class="cpr__repair-tab-selected" width="67" height="5" viewBox="0 0 67 5" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.22168" width="66" height="4" rx="2" fill="#404245"></rect>
            </svg>
        </div>
    </header>
    <h2 class="cpr__accordion--t mobile">Learn more about the most popular devices</h2>
    <div class="cpr__repair-content">
        <div class="cpr__accordion-header mobile">
            <label class="cpr__accordion-header--lbl">Telefon</label> <span
                class="cpr__accordion-icon">
      <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
       <path
           d="M11.7034 4.29686L16 8.70247L12.2972 12.4987L8.00064 8.09371L3.70339 12.5L-5.88804e-06 8.70248L4.29724 4.29619L8 0.5L11.7034 4.29686Z"
           fill="#F15F5E"></path>
      </svg></span>
        </div>
        <div id="tab1" class="cpr__repair-tab-content cpr__accordion-content">
            <div class="cpr__repair-tab-left">
                <picture class="img coffe-phone-picture">
                    <!-- Desktop version -->
                    <source media="(min-width: 1294px)" srcset="repair/assets/img/home/coffee-phone.webp">
                    <!-- Desktop tablet version -->
                    <source media="(min-width: 763px) and (max-width: 1293px)"
                            srcset="repair/assets/img/home/coffee-phone.webp"> <!-- Mobile version -->
                    <source media="(min-width: 1px) and (max-width: 762px)"
                            srcset="repair/assets/img/home/coffee-phone-mobile.webp">
                    <!-- Fallback for browsers that don't support srcset -->
                    <img loading="lazy" class="animate__fadeOut animate__slideInUp animate__animated animate__bounce"
                         src="repair/assets/img/home/coffee-phone.webp?v=1706635941210" alt="Img services"
                         id="image_home_4" width="331" height="569">
                </picture>
            </div>
            <div class="cpr__repair-tab-right animate__fadeInLeft animate__animated">
                <div class="cpr__repair-tab-details">
                    @foreach($site_technical_category as $item)
                        @if($item->category == 'phone')

                    <div class="cpr__repair-detail-service-item">
                        <header class="cpr__repair-detail-service-header">
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.29661 8.20314L-1.65995e-07 3.79753L3.70275 0.00134979L7.99936 4.40629L12.2966 5.37502e-07L16 3.79753L11.7028 8.20382L8 12L4.29661 8.20314Z"
                                    fill="#F15F5E"></path>
                            </svg>
                            <h2 class="cpr__repair-detail-service-t"><a href="{{route('tecnicalServicedetail',['id' => $item->id])}}">{{$item->title}}</a></h2>
                        </header>
                        <et class="cpr__repair-detail-service-lbl" type-tag="et">
                             {{\Illuminate\Support\Str::limit($item->sort_description,125)}}
                        </et>
                    </div>
                        @endif
                    @endforeach

                </div>
                <div class="cpr__repair-tab-footer">
                    <a class="cpr__btn cpr__btn-primary" href="{{route('allrepairs')}}" title="TEKNİK SERVİS HAKKINDA BİLGİ ALIN" aria-label="TEKNİK SERVİS HAKKINDA BİLGİ ALIN"> <label
                            class="cpr__btn-lbl" type-tag="label">TEKNİK SERVİS HAKKINDA BİLGİ ALIN</label>
                        <svg class="cpr__btn-icon" width="12" height="16" viewBox="0 0 12 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.94581 11.5873L3.6784 15.7491L0.00130729 12.1625L4.26807 8.00066L0 3.83821L3.6784 0.250994L7.94647 4.41344L11.6236 8.00004L7.94581 11.5873Z"
                                fill="white"></path>
                        </svg>
                    </a>
                    <span style="border-bottom: 1px solid #F15F5E;width: 100%;"></span>
                </div>
            </div>
        </div>
        <div class="cpr__accordion-header mobile">
            <label class="cpr__accordion-header--lbl" id="home_30">Saat</label> <span
                class="cpr__accordion-icon">
      <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
       <path
           d="M11.7034 4.29686L16 8.70247L12.2972 12.4987L8.00064 8.09371L3.70339 12.5L-5.88804e-06 8.70248L4.29724 4.29619L8 0.5L11.7034 4.29686Z"
           fill="#F15F5E"></path>
      </svg></span>
        </div>
        <div id="tab2" class="cpr__repair-tab-content cpr__accordion-content">
            <div class="cpr__repair-tab-left">
                <picture class="img">
                    <!-- Desktop version -->
                    <source media="(min-width: 1294px)" srcset="repair/assets/img/home/flex-phone.webp">
                    <!-- Desktop tablet version -->
                    <source media="(min-width: 763px) and (max-width: 1293px)"
                            srcset="repair/assets/img/home/flex-phone.webp"> <!-- Mobile version -->
                    <source media="(min-width: 1px) and (max-width: 762px)"
                            srcset="repair/assets/img/home/flex-phone-mobile.webp">
                    <!-- Fallback for browsers that don't support srcset -->
                    <img loading="lazy" class="animate__fadeOut animate__slideInUp animate__animated animate__bounce"
                         src="repair/assets/img/home/flex-phone.webp?v=1706635941210" alt="Img services"
                         id="image_home_6">
                </picture>
            </div>
            <div class="cpr__repair-tab-right animate__fadeInLeft animate__animated">
                <div class="cpr__repair-tab-details">

                    @foreach($site_technical_category as $item)
                        @if($item->category == 'watch')
                    <div class="cpr__repair-detail-service-item">
                        <header class="cpr__repair-detail-service-header">
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.29661 8.20314L-1.65995e-07 3.79753L3.70275 0.00134979L7.99936 4.40629L12.2966 5.37502e-07L16 3.79753L11.7028 8.20382L8 12L4.29661 8.20314Z"
                                    fill="#F15F5E"></path>
                            </svg>
                            <h2 class="cpr__repair-detail-service-t" id="home_{{$item->id}}"><a href="{{route('tecnicalServicedetail',['id' => $item->id])}}">{{$item->title}}</a></h2>
                        </header>
                        <label class="cpr__repair-detail-service-lbl" id="home_{{$item->id}}">
                            {{\Illuminate\Support\Str::limit($item->sort_description,125)}}

                        </label>
                    </div>
                        @endif
                    @endforeach

                </div>
                <div class="cpr__repair-tab-footer">
                    <a render-type="ROUTES" page-type="MODEL_LIST" p-id="SAMSUNG" type-tag="a"
                       class="cpr__btn cpr__btn-primary" id="home_43" href="smartphone-repair/samsung.html"
                       title="LEARN ABOUT SAMSUNG REPAIRS" aria-label="LEARN ABOUT SAMSUNG REPAIRS"> <label
                            class="cpr__btn-lbl" type-tag="label">Akilli Saat Servisinde Neler Yapiyoruz ?</label>
                        <svg class="cpr__btn-icon" width="12" height="16" viewBox="0 0 12 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.94581 11.5873L3.6784 15.7491L0.00130729 12.1625L4.26807 8.00066L0 3.83821L3.6784 0.250994L7.94647 4.41344L11.6236 8.00004L7.94581 11.5873Z"
                                fill="white"></path>
                        </svg>
                    </a> <span style="border-bottom: 1px solid #F15F5E;width: 100%;"></span>
                </div>
            </div>
        </div>
        <div class="cpr__accordion-header mobile">
            <label class="cpr__accordion-header--lbl" id="home_44">iPad</label> <span
                class="cpr__accordion-icon">
      <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
       <path
           d="M11.7034 4.29686L16 8.70247L12.2972 12.4987L8.00064 8.09371L3.70339 12.5L-5.88804e-06 8.70248L4.29724 4.29619L8 0.5L11.7034 4.29686Z"
           fill="#F15F5E"></path>
      </svg></span>
        </div>
        <div id="tab3" class="cpr__repair-tab-content cpr__accordion-content">
            <div class="cpr__repair-tab-left">
                <picture class="img">
                    <!-- Desktop version -->
                    <source media="(min-width: 1294px)" srcset="repair/assets/img/home/ipad-pen.webp">
                    <!-- Desktop tablet version -->
                    <source media="(min-width: 763px) and (max-width: 1293px)"
                            srcset="repair/assets/img/home/ipad-pen.webp"> <!-- Mobile version -->
                    <source media="(min-width: 1px) and (max-width: 762px)"
                            srcset="repair/assets/img/home/ipad-pen-mobile.webp">
                    <!-- Fallback for browsers that don't support srcset -->
                    <img loading="lazy" class="animate__fadeOut animate__slideInUp animate__animated animate__bounce"
                         src="repair/assets/img/home/ipad-pen%EF%B9%96v=1706635941210.webp" alt="Img services"
                         id="image_home_9">
                </picture>
            </div>
            <div class="cpr__repair-tab-right animate__fadeInLeft animate__animated">
                <div class="cpr__repair-tab-details">
                    @foreach($site_technical_category as $item)
                        @if($item->category == 'ipad')
                    <div class="cpr__repair-detail-service-item">
                        <header class="cpr__repair-detail-service-header">
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.29661 8.20314L-1.65995e-07 3.79753L3.70275 0.00134979L7.99936 4.40629L12.2966 5.37502e-07L16 3.79753L11.7028 8.20382L8 12L4.29661 8.20314Z"
                                    fill="#F15F5E"></path>
                            </svg>
                            <h2 class="cpr__repair-detail-service-t" id="home_{{$item->id}}"><a href="{{route('tecnicalServicedetail',['id' => $item->id])}}">{{$item->title}}</a></h2>
                        </header>
                        <label class="cpr__repair-detail-service-lbl" id="home_{{$item->id}}">
                            {{\Illuminate\Support\Str::limit($item->sort_description,125)}}

                        </label>
                    </div>
                        @endif
                    @endforeach
                </div>
                <div class="cpr__repair-tab-footer">
                    <a render-type="ROUTES" page-type="MODEL_LIST" p-id="IPAD" type-tag="a"
                       class="cpr__btn cpr__btn-primary" id="home_57" href="tablet-repair/ipad.html"
                       title="LEARN ABOUT IPAD REPAIRS" aria-label="LEARN ABOUT IPAD REPAIRS"> <label
                            class="cpr__btn-lbl" type-tag="label">iPad Servisinde Neler Yapiyoruz ?</label>
                        <svg class="cpr__btn-icon" width="12" height="16" viewBox="0 0 12 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.94581 11.5873L3.6784 15.7491L0.00130729 12.1625L4.26807 8.00066L0 3.83821L3.6784 0.250994L7.94647 4.41344L11.6236 8.00004L7.94581 11.5873Z"
                                fill="white"></path>
                        </svg>
                    </a> <span style="border-bottom: 1px solid #F15F5E;width: 100%;"></span>
                </div>
            </div>
        </div>
        <div class="cpr__accordion-header mobile">
            <label class="cpr__accordion-header--lbl" id="home_58">Mac</label> <span
                class="cpr__accordion-icon">
      <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
       <path
           d="M11.7034 4.29686L16 8.70247L12.2972 12.4987L8.00064 8.09371L3.70339 12.5L-5.88804e-06 8.70248L4.29724 4.29619L8 0.5L11.7034 4.29686Z"
           fill="#F15F5E"></path>
      </svg></span>
        </div>
        <div id="tab4" class="cpr__repair-tab-content cpr__accordion-content">
            <div class="cpr__repair-tab-left">
                <picture class="img">
                    <!-- Desktop version -->
                    <source media="(min-width: 1294px)" srcset="repair/assets/img/home/smile-coffee.webp">
                    <!-- Desktop tablet version -->
                    <source media="(min-width: 763px) and (max-width: 1293px)"
                            srcset="repair/assets/img/home/smile-coffee.webp"> <!-- Mobile version -->
                    <source media="(min-width: 1px) and (max-width: 762px)"
                            srcset="repair/assets/img/home/smile-coffee-mobile.webp">
                    <!-- Fallback for browsers that don't support srcset -->
                    <img loading="lazy" class="animate__fadeOut animate__slideInUp animate__animated animate__bounce"
                         src="repair/assets/img/home/smile-coffee%EF%B9%96v=1706635941210.webp" alt="Img services"
                         id="image_home_10">
                </picture>
            </div>
            <div class="cpr__repair-tab-right animate__fadeInLeft animate__animated">
                <div class="cpr__repair-tab-details">
                    @foreach($site_technical_category as $item)
                        @if($item->category == 'mac')
                            <div class="cpr__repair-detail-service-item">
                                <header class="cpr__repair-detail-service-header">
                                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.29661 8.20314L-1.65995e-07 3.79753L3.70275 0.00134979L7.99936 4.40629L12.2966 5.37502e-07L16 3.79753L11.7028 8.20382L8 12L4.29661 8.20314Z"
                                            fill="#F15F5E"></path>
                                    </svg>
                                    <h2 class="cpr__repair-detail-service-t" id="home_{{$item->id}}"><a href="{{route('tecnicalServicedetail',['id' => $item->id])}}">{{$item->title}}</a></h2>
                                </header>
                                <label class="cpr__repair-detail-service-lbl" id="home_{{$item->id}}">
                                    {{\Illuminate\Support\Str::limit($item->sort_description,125)}}

                                </label>
                            </div>

                        @endif
                    @endforeach
                </div>
                <div class="cpr__repair-tab-footer">
                    <a render-type="ROUTES" page-type="MODEL_LIST" p-id="COMPUTER-REPAIR" type-tag="a"
                       class="cpr__btn cpr__btn-primary" id="home_71" href="computer-repair.html"
                       title="LEARN ABOUT COMPUTER REPAIRS" aria-label="LEARN ABOUT COMPUTER REPAIRS"> <label
                            class="cpr__btn-lbl" type-tag="label">Mac Servisinde Neler Yapiyoruz ?</label>
                        <svg class="cpr__btn-icon" width="12" height="16" viewBox="0 0 12 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.94581 11.5873L3.6784 15.7491L0.00130729 12.1625L4.26807 8.00066L0 3.83821L3.6784 0.250994L7.94647 4.41344L11.6236 8.00004L7.94581 11.5873Z"
                                fill="white"></path>
                        </svg>
                    </a> <span style="border-bottom: 1px solid #F15F5E;width: 100%;"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cpr__repair-info">
    <div class="cpr__repair-info-item">
        <picture>
            <!-- Desktop version -->
            <source media="(min-width: 1294px)" srcset="repair/assets/img/home/carrefour.jpeg">
            <!-- Desktop tablet version -->
            <source media="(min-width: 763px) and (max-width: 1293px)"
                    srcset="repair/assets/img/home/carrefour.jpeg"> <!-- Mobile version -->
            <source media="(min-width: 1px) and (max-width: 762px)"
                    srcset="repair/assets/img/home/carrefour-mobile.jpeg">
            <!-- Fallback for browsers that don't support srcset -->
            <img loading="lazy" class="cpr__repair-info-item-img"
                 src="repair/assets/img/home/carrefour.jpeg" alt="" id="image_home_12">
        </picture>
        <div class="cpr__repair-info-item-details">
            <h2 class="cpr__repair-info-item-t" id="home_72">Güvenebileceğiniz gerçek teknik servis lokasyonu. Güvenebileceğiniz Hizmet.</h2>
            <p class="cpr__repair-info-item-d" type-tag="p" id="home_73">Marmarapark AVM ile iç içe olan Carrefour İçerisinde -1. Kat Otopark girişinde bulunan teknik servis hizmeti , telefon ve aksesuar
            satışı yaptığımız mağazamız ile hizmetinizdeyiz.</p>

            <div class="cpr__location-wrap">
                <button type="button"  onclick="handleAutoLocation('/location-results')" class="cpr__location-link link--default">
                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.520943 5.69485C0.506935 5.6738 0.499638 5.64901 0.500014 5.62373H0.500024C0.500416 5.59829 0.508521 5.57358 0.523267 5.55285C0.537971 5.53218 0.55859 5.51644 0.582407 5.50771C0.582472 5.50769 0.582537 5.50767 0.582602 5.50764L14.3322 0.507788L14.3328 0.507578C14.3552 0.49941 14.3794 0.497806 14.4027 0.502956C14.4259 0.508105 14.4472 0.519794 14.4641 0.536646C14.4809 0.553498 14.4926 0.57481 14.4977 0.598073C14.5028 0.621339 14.5012 0.645584 14.493 0.667953L14.4927 0.668895L9.49271 14.4188C9.48406 14.4426 9.46838 14.4632 9.44775 14.4779C9.42778 14.4921 9.4041 14.5002 9.37964 14.501H9.37508H9.3749C9.3499 14.501 9.32547 14.4935 9.30477 14.4795C9.28407 14.4655 9.26805 14.4456 9.25877 14.4224L9.25869 14.4222L6.85807 8.42094L6.77849 8.222L6.57955 8.14241L0.578929 5.74179L0.578642 5.74167C0.555108 5.73228 0.534985 5.71595 0.520943 5.69485Z"
                            stroke="#545454"></path>
                    </svg>
                    <span class="cpr__location-label location-default"><span>Konumu Haritada Görüntüle</span></span> <span
                        class="cpr__location-label location-blocked">Please check your location settings to use this feature</span>
                </button>
                <div page-type="LOCATION_RESULTS" class="cpr__location-link link--active link--hide"
                     onclick="handleAutoLocation('/location-results')" id="home_e726cab0-00a8-42dc-8168-ecbc8ecfe9d6">
                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.520943 5.69485C0.506935 5.6738 0.499638 5.64901 0.500014 5.62373H0.500024C0.500416 5.59829 0.508521 5.57358 0.523267 5.55285C0.537971 5.53218 0.55859 5.51644 0.582407 5.50771C0.582472 5.50769 0.582537 5.50767 0.582602 5.50764L14.3322 0.507788L14.3328 0.507578C14.3552 0.49941 14.3794 0.497806 14.4027 0.502956C14.4259 0.508105 14.4472 0.519794 14.4641 0.536646C14.4809 0.553498 14.4926 0.57481 14.4977 0.598073C14.5028 0.621339 14.5012 0.645584 14.493 0.667953L14.4927 0.668895L9.49271 14.4188C9.48406 14.4426 9.46838 14.4632 9.44775 14.4779C9.42778 14.4921 9.4041 14.5002 9.37964 14.501H9.37508H9.3749C9.3499 14.501 9.32547 14.4935 9.30477 14.4795C9.28407 14.4655 9.26805 14.4456 9.25877 14.4224L9.25869 14.4222L6.85807 8.42094L6.77849 8.222L6.57955 8.14241L0.578929 5.74179L0.578642 5.74167C0.555108 5.73228 0.534985 5.71595 0.520943 5.69485Z"
                            stroke="#545454"></path>
                    </svg>
                    <span class="cpr__location-label location-default"><span>Use my current location</span></span> <span
                        class="cpr__location-label location-error">Unable to fetch your location at this moment. <i>Try again</i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="cpr__repair-info-item row-reverse">
        <picture>
            <!-- Desktop version -->
            <source media="(min-width: 1294px)" srcset="repair/assets/img/home/iPhone-parts.webp">
            <!-- Desktop tablet version -->
            <source media="(min-width: 763px) and (max-width: 1293px)"
                    srcset="repair/assets/img/home/iPhone-parts.webp"> <!-- Mobile version -->
            <source media="(min-width: 1px) and (max-width: 762px)"
                    srcset="repair/assets/img/home/iPhone-parts-mobile.webp">
            <!-- Fallback for browsers that don't support srcset -->
            <img loading="lazy" class="cpr__repair-info-item-img"
                 src="repair/assets/img/home/iPhone-parts%EF%B9%96v=1706635941210.webp" alt="" id="image_home_15">
        </picture>
        <div class="cpr__repair-info-item-details">
            <h2 class="cpr__repair-info-item-t" >Phone Hospital mağazalarında artık Apple®'ın orijinal yedek parçaları mevcut!
            </h2>
            <div class="cpr__repair-info-item-d">
                <et type-tag="et" id="home_76">
                    Phone Hospital, iPhone onarımlarında orijinal Apple parçaları, Apple teşhis yazılımı, araçları ve işlemleri kullanarak iPhone'unuzun güvenilir ve güvenli bir şekilde tamir edilmesini sağlar. Orijinal Apple parça seçenekleri ve bulunurluğu hakkında bilgi almak için mağaza çalışanına mutlaka danışın.
                </et>
            </div>
            <img loading="lazy" class="cpr__repair-info-item-genuine mobile"
                 src="repair/assets/img/main/genuine-parts%EF%B9%96v=1706635941210.webp" alt="" id="image_home_18">

        </div>
    </div>
    <div class="cpr__repair-info-assurant">
        <picture>
            <!-- Desktop version -->
            <source media="(min-width: 1294px)" srcset="repair/assets/img/home/assurant-device-care.webp">
            <!-- Desktop and tablet version -->
            <source media="(min-width: 763px)" srcset="repair/assets/img/home/assurant-device-care.webp">
            <!-- Mobile version -->
            <source media="(min-width: 1px) and (max-width: 762px)"
                    srcset="repair/assets/img/home/assurant-device-care-mobile.webp">
            <!-- Fallback for browsers that don't support srcset -->
            <img loading="lazy" class="cpr__repair-info--img" width="420" height="338.5"
                 src="repair/assets/img/home/assurant-device-care%EF%B9%96v=1706635941210.webp"
                 alt="PhoneHospital" id="image_home_19">
        </picture>
        <div class="cpr__repair-info-assurant-details">
            <h2 class="cpr__repair-info-assurant-t" id="home_79">Yüksek onarım maliyetleri sizi finansal olarak zorlamamalı.</h2>
            <p class="cpr__repair-info-assurant-d" type-tag="p">
                PhoneHospital ile telefonunuzun en sık karşılaşılan tamirleri sadece aylık 200 TL karşılığında kapsama altına alınıyor,
                böylece beklenmedik masraflarla karşılaşma endişenizi azaltıyoruz.

            </p>
            <a class="cpr__btn cpr__btn-primary fit cpr__btn-lbl"
               href="{{route('index')}}" title="Cihaz Bakımı Hakkında Bilgi Alın" aria-label=" CİHAZ BAKIMI HAKKINDA BİLGİ EDİNİN"> CİHAZ BAKIMI HAKKINDA BİLGİ EDİNİN
                <svg class="cpr__btn-icon" width="12" height="16" viewBox="0 0 12 16" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.94581 11.5873L3.6784 15.7491L0.00130729 12.1625L4.26807 8.00066L0 3.83821L3.6784 0.250994L7.94647 4.41344L11.6236 8.00004L7.94581 11.5873Z"
                        fill="white"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
<section class="cpr__locate">
    <div class="cpr__locate-details">
        <h2 class="cpr__locate-details-t" id="home_90">New Phone Hospital stores!</h2>
        <div class="cpr__locate-details-bullets">
            <div class="cpr__locate-details-item">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.55991 9.63031C8.03082 9.63031 7.5136 9.47342 7.07368 9.17947C6.63375 8.88552 6.29088 8.46772 6.0884 7.9789C5.88592 7.49009 5.83295 6.9522 5.93617 6.43328C6.03939 5.91435 6.29417 5.43769 6.6683 5.06356C7.04242 4.68944 7.51909 4.43465 8.03801 4.33143C8.55694 4.22821 9.09482 4.28119 9.58364 4.48366C10.0725 4.68614 10.4903 5.02902 10.7842 5.46894C11.0782 5.90887 11.2351 6.42608 11.2351 6.95517C11.2342 7.6644 10.9521 8.34434 10.4506 8.84585C9.94908 9.34735 9.26914 9.62946 8.55991 9.63031ZM8.55991 5.35009C8.24245 5.35009 7.93213 5.44422 7.66817 5.62059C7.40422 5.79696 7.19849 6.04764 7.077 6.34093C6.95552 6.63422 6.92373 6.95695 6.98566 7.26831C7.0476 7.57966 7.20047 7.86566 7.42494 8.09014C7.64942 8.31461 7.93542 8.46748 8.24677 8.52942C8.55813 8.59135 8.88086 8.55956 9.17415 8.43808C9.46744 8.31659 9.71812 8.11086 9.89449 7.84691C10.0709 7.58296 10.165 7.27263 10.165 6.95517C10.1646 6.52961 9.99533 6.12159 9.69441 5.82068C9.39349 5.51976 8.98547 5.35051 8.55991 5.35009Z"
                        fill="#F15F5E"></path>
                    <path
                        d="M8.56012 16.0509L4.04662 10.7279C3.98391 10.6479 3.92184 10.5675 3.86043 10.4866C3.08945 9.47097 2.67294 8.23047 2.67481 6.95538C2.67481 5.3945 3.29487 3.89755 4.39858 2.79384C5.50229 1.69013 6.99924 1.07007 8.56012 1.07007C10.121 1.07007 11.618 1.69013 12.7217 2.79384C13.8254 3.89755 14.4454 5.3945 14.4454 6.95538C14.4473 8.22989 14.031 9.46982 13.2603 10.485L13.2598 10.4866C13.2598 10.4866 13.0993 10.6974 13.0752 10.7257L8.56012 16.0509ZM4.71434 9.84186C4.71541 9.84186 4.83954 10.0066 4.86789 10.042L8.56012 14.3966L12.2572 10.0361C12.2807 10.0066 12.4059 9.84079 12.4064 9.84025C13.0362 9.01048 13.3766 7.9971 13.3754 6.95538C13.3754 5.6783 12.8681 4.45352 11.965 3.55048C11.062 2.64744 9.83721 2.14013 8.56012 2.14013C7.28304 2.14013 6.05826 2.64744 5.15522 3.55048C4.25219 4.45352 3.74487 5.6783 3.74487 6.95538C3.74374 7.99774 4.08449 9.01171 4.71487 9.84186H4.71434Z"
                        fill="#F15F5E"></path>
                </svg>
                <h3 class="cpr__locate-details-item-t">Phone Hospital Marmara Park</h3>
            </div>
            <div class="cpr__locate-details-item">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.55991 9.63031C8.03082 9.63031 7.5136 9.47342 7.07368 9.17947C6.63375 8.88552 6.29088 8.46772 6.0884 7.9789C5.88592 7.49009 5.83295 6.9522 5.93617 6.43328C6.03939 5.91435 6.29417 5.43769 6.6683 5.06356C7.04242 4.68944 7.51909 4.43465 8.03801 4.33143C8.55694 4.22821 9.09482 4.28119 9.58364 4.48366C10.0725 4.68614 10.4903 5.02902 10.7842 5.46894C11.0782 5.90887 11.2351 6.42608 11.2351 6.95517C11.2342 7.6644 10.9521 8.34434 10.4506 8.84585C9.94908 9.34735 9.26914 9.62946 8.55991 9.63031ZM8.55991 5.35009C8.24245 5.35009 7.93213 5.44422 7.66817 5.62059C7.40422 5.79696 7.19849 6.04764 7.077 6.34093C6.95552 6.63422 6.92373 6.95695 6.98566 7.26831C7.0476 7.57966 7.20047 7.86566 7.42494 8.09014C7.64942 8.31461 7.93542 8.46748 8.24677 8.52942C8.55813 8.59135 8.88086 8.55956 9.17415 8.43808C9.46744 8.31659 9.71812 8.11086 9.89449 7.84691C10.0709 7.58296 10.165 7.27263 10.165 6.95517C10.1646 6.52961 9.99533 6.12159 9.69441 5.82068C9.39349 5.51976 8.98547 5.35051 8.55991 5.35009Z"
                        fill="#F15F5E"></path>
                    <path
                        d="M8.56012 16.0509L4.04662 10.7279C3.98391 10.6479 3.92184 10.5675 3.86043 10.4866C3.08945 9.47097 2.67294 8.23047 2.67481 6.95538C2.67481 5.3945 3.29487 3.89755 4.39858 2.79384C5.50229 1.69013 6.99924 1.07007 8.56012 1.07007C10.121 1.07007 11.618 1.69013 12.7217 2.79384C13.8254 3.89755 14.4454 5.3945 14.4454 6.95538C14.4473 8.22989 14.031 9.46982 13.2603 10.485L13.2598 10.4866C13.2598 10.4866 13.0993 10.6974 13.0752 10.7257L8.56012 16.0509ZM4.71434 9.84186C4.71541 9.84186 4.83954 10.0066 4.86789 10.042L8.56012 14.3966L12.2572 10.0361C12.2807 10.0066 12.4059 9.84079 12.4064 9.84025C13.0362 9.01048 13.3766 7.9971 13.3754 6.95538C13.3754 5.6783 12.8681 4.45352 11.965 3.55048C11.062 2.64744 9.83721 2.14013 8.56012 2.14013C7.28304 2.14013 6.05826 2.64744 5.15522 3.55048C4.25219 4.45352 3.74487 5.6783 3.74487 6.95538C3.74374 7.99774 4.08449 9.01171 4.71487 9.84186H4.71434Z"
                        fill="#F15F5E"></path>
                </svg>
                <h3 class="cpr__locate-details-item-t">Phone Hospital Courfoure</h3>
            </div>
            <div class="cpr__locate-details-item">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.55991 9.63031C8.03082 9.63031 7.5136 9.47342 7.07368 9.17947C6.63375 8.88552 6.29088 8.46772 6.0884 7.9789C5.88592 7.49009 5.83295 6.9522 5.93617 6.43328C6.03939 5.91435 6.29417 5.43769 6.6683 5.06356C7.04242 4.68944 7.51909 4.43465 8.03801 4.33143C8.55694 4.22821 9.09482 4.28119 9.58364 4.48366C10.0725 4.68614 10.4903 5.02902 10.7842 5.46894C11.0782 5.90887 11.2351 6.42608 11.2351 6.95517C11.2342 7.6644 10.9521 8.34434 10.4506 8.84585C9.94908 9.34735 9.26914 9.62946 8.55991 9.63031ZM8.55991 5.35009C8.24245 5.35009 7.93213 5.44422 7.66817 5.62059C7.40422 5.79696 7.19849 6.04764 7.077 6.34093C6.95552 6.63422 6.92373 6.95695 6.98566 7.26831C7.0476 7.57966 7.20047 7.86566 7.42494 8.09014C7.64942 8.31461 7.93542 8.46748 8.24677 8.52942C8.55813 8.59135 8.88086 8.55956 9.17415 8.43808C9.46744 8.31659 9.71812 8.11086 9.89449 7.84691C10.0709 7.58296 10.165 7.27263 10.165 6.95517C10.1646 6.52961 9.99533 6.12159 9.69441 5.82068C9.39349 5.51976 8.98547 5.35051 8.55991 5.35009Z"
                        fill="#F15F5E"></path>
                    <path
                        d="M8.56012 16.0509L4.04662 10.7279C3.98391 10.6479 3.92184 10.5675 3.86043 10.4866C3.08945 9.47097 2.67294 8.23047 2.67481 6.95538C2.67481 5.3945 3.29487 3.89755 4.39858 2.79384C5.50229 1.69013 6.99924 1.07007 8.56012 1.07007C10.121 1.07007 11.618 1.69013 12.7217 2.79384C13.8254 3.89755 14.4454 5.3945 14.4454 6.95538C14.4473 8.22989 14.031 9.46982 13.2603 10.485L13.2598 10.4866C13.2598 10.4866 13.0993 10.6974 13.0752 10.7257L8.56012 16.0509ZM4.71434 9.84186C4.71541 9.84186 4.83954 10.0066 4.86789 10.042L8.56012 14.3966L12.2572 10.0361C12.2807 10.0066 12.4059 9.84079 12.4064 9.84025C13.0362 9.01048 13.3766 7.9971 13.3754 6.95538C13.3754 5.6783 12.8681 4.45352 11.965 3.55048C11.062 2.64744 9.83721 2.14013 8.56012 2.14013C7.28304 2.14013 6.05826 2.64744 5.15522 3.55048C4.25219 4.45352 3.74487 5.6783 3.74487 6.95538C3.74374 7.99774 4.08449 9.01171 4.71487 9.84186H4.71434Z"
                        fill="#F15F5E"></path>
                </svg>
                <h3 class="cpr__locate-details-item-t">Phone Hospital Toirum</h3>
            </div>
            <div class="cpr__locate-details-item">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.55991 9.63031C8.03082 9.63031 7.5136 9.47342 7.07368 9.17947C6.63375 8.88552 6.29088 8.46772 6.0884 7.9789C5.88592 7.49009 5.83295 6.9522 5.93617 6.43328C6.03939 5.91435 6.29417 5.43769 6.6683 5.06356C7.04242 4.68944 7.51909 4.43465 8.03801 4.33143C8.55694 4.22821 9.09482 4.28119 9.58364 4.48366C10.0725 4.68614 10.4903 5.02902 10.7842 5.46894C11.0782 5.90887 11.2351 6.42608 11.2351 6.95517C11.2342 7.6644 10.9521 8.34434 10.4506 8.84585C9.94908 9.34735 9.26914 9.62946 8.55991 9.63031ZM8.55991 5.35009C8.24245 5.35009 7.93213 5.44422 7.66817 5.62059C7.40422 5.79696 7.19849 6.04764 7.077 6.34093C6.95552 6.63422 6.92373 6.95695 6.98566 7.26831C7.0476 7.57966 7.20047 7.86566 7.42494 8.09014C7.64942 8.31461 7.93542 8.46748 8.24677 8.52942C8.55813 8.59135 8.88086 8.55956 9.17415 8.43808C9.46744 8.31659 9.71812 8.11086 9.89449 7.84691C10.0709 7.58296 10.165 7.27263 10.165 6.95517C10.1646 6.52961 9.99533 6.12159 9.69441 5.82068C9.39349 5.51976 8.98547 5.35051 8.55991 5.35009Z"
                        fill="#F15F5E"></path>
                    <path
                        d="M8.56012 16.0509L4.04662 10.7279C3.98391 10.6479 3.92184 10.5675 3.86043 10.4866C3.08945 9.47097 2.67294 8.23047 2.67481 6.95538C2.67481 5.3945 3.29487 3.89755 4.39858 2.79384C5.50229 1.69013 6.99924 1.07007 8.56012 1.07007C10.121 1.07007 11.618 1.69013 12.7217 2.79384C13.8254 3.89755 14.4454 5.3945 14.4454 6.95538C14.4473 8.22989 14.031 9.46982 13.2603 10.485L13.2598 10.4866C13.2598 10.4866 13.0993 10.6974 13.0752 10.7257L8.56012 16.0509ZM4.71434 9.84186C4.71541 9.84186 4.83954 10.0066 4.86789 10.042L8.56012 14.3966L12.2572 10.0361C12.2807 10.0066 12.4059 9.84079 12.4064 9.84025C13.0362 9.01048 13.3766 7.9971 13.3754 6.95538C13.3754 5.6783 12.8681 4.45352 11.965 3.55048C11.062 2.64744 9.83721 2.14013 8.56012 2.14013C7.28304 2.14013 6.05826 2.64744 5.15522 3.55048C4.25219 4.45352 3.74487 5.6783 3.74487 6.95538C3.74374 7.99774 4.08449 9.01171 4.71487 9.84186H4.71434Z"
                        fill="#F15F5E"></path>
                </svg>
                <h3 class="cpr__locate-details-item-t">Phone Hospital Turkcell</h3>
            </div>
        </div>
        <a page-type="LOCATOR" class="cpr__btn cpr__btn-secondary desktop " href="{{route('contact')}}"
           title=" Size En yakin Phone Hospital Bulun"
           aria-label=" Size En yakin Phone Hospital Bulun"><label class="cpr__btn-lbl"> Size En yakin Phone Hospital
                Bulun </label>
            <svg class="cpr__btn-icon" width="12" height="16" viewBox="0 0 12 16" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.94581 11.5873L3.6784 15.7491L0.00130729 12.1625L4.26807 8.00066L0 3.83821L3.6784 0.250994L7.94647 4.41344L11.6236 8.00004L7.94581 11.5873Z"
                    fill="white"></path>
            </svg>
        </a>

        <picture class="location-map-picture">
            <!-- Desktop version -->
            <source media="(min-width: 1294px)" srcset="repair/assets/img/home/location-map.webp">
            <!-- Desktop and tablet version -->
            <source media="(min-width: 763px)" srcset="repair/assets/img/home/location-map.webp"><!-- Mobile version -->
            <source media="(min-width: 1px) and (max-width: 762px)"
                    srcset="repair/assets/img/home/location-map-mobile.webp">
            <!-- Fallback for browsers that don't support srcset -->
            <img loading="lazy" class="cpr__locate-details-map"
                 src="repair/assets/img/home/location-map.webp?v=1706635941210" alt="Location map" id="image_home_24">
        </picture>
    </div>
</section>
@endsection

