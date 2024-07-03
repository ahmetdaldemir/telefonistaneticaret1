<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="repair/assets/img/main/favicon%EF%B9%96v=1706635941210.webp" type="image/png">
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="repair/assets/img/main/favicon%EF%B9%96v=1706635941210.webp">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <title>Phone Hospital Cell Phone Repair | iPhone, iPad &amp; Computer Repair Services</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="description"
          content="When you're in need of fast, reliable repair services for your phone, tablet, computer or other electronics, depend on the experts at Phone Hospital Cell Phone Repair.">
    <link rel="canonical" href="index.html">
    <meta property="og:title" content="Phone Hospital Cell Phone Repair | iPhone, iPad &amp; Computer Repair Services">
    <meta property="og:description"
          content="When you're in need of fast, reliable repair services for your phone, tablet, computer or other electronics, depend on the experts at Phone Hospital Cell Phone Repair.">
    <meta property="og:url" content="https://www.phonehospital.com.tr">
    <meta property="og:site_name"
          content="Phone Hospital Cell Phone Repair | iPhone, iPad &amp; Computer Repair Services">
    <meta property="og:image" content="https://www.phonehospital.com.tr/repair/assets/client/pages/default/default-seo.webp">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <meta property="article:modified_time" content="2023-03-01T12:33:34+00:00">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="https://www.phonehospital.com.tr">
    <meta name="twitter:image" content="https://www.phonehospital.com.tr/repair/assets/client/pages/default/default-seo.webp">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </noscript>
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    </noscript>
    <script defer src="repair/assets/js/sanitize-html%EF%B9%96v=1706635941210.js"></script>
    <script defer src="repair/assets/js/index.js"></script>
    <link rel="stylesheet" href="{{asset('repair/assets/css/allcss.css')}}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function checkStatus() {
            var as_alert_default = document.getElementById('default');

            var imei = $('input#imei').val();
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
    <script>
        const AD_CODE = "Web:Social:Ad"
        const DEFAULT_CODE = "Direct"

        function setSavedLead(date) {
            localStorage.setItem("acad-lead", date)
        }

        function getSavedLeadDate() {
            const savedData = localStorage.getItem("acad-lead")
            if (!savedData) {
                return null
            }

            return new Date(savedData)
        }

        function deleteSavedLead() {
            localStorage.removeItem("acad-lead")
        }

        function differenceInMonths(date1, date2) {
            if (!date1)
                return null
            if (!date2)
                return null
            // Calculating the difference in years
            const yearsDiff = date2.getFullYear() - date1.getFullYear();

            // Calculating the difference in months
            const monthsDiff = (date2.getMonth() + 1) - (date1.getMonth() + 1);

            // Total months difference
            const totalMonthsDiff = yearsDiff * 12 + monthsDiff;

            return totalMonthsDiff;
        }

        function clearAd() {
            deleteSavedLead()
        }

        function isValidAd() {
            const savedLeadDate = getSavedLeadDate()
            const currentDate = new Date()
            const diferenceInMonths = differenceInMonths(savedLeadDate, currentDate)

            return diferenceInMonths != null && diferenceInMonths === 0
        }


        function getReferralCode() {

            if (!isValidAd()) {
                clearAd()
                return DEFAULT_CODE
            }
            return AD_CODE
        }

        function getParameterByName(name, url) {
            if (!url) {
                url = window.location.href;
            }
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        window.addEventListener("DOMContentLoaded", function () {
            const adParam = getParameterByName('ad');

            if (!(typeof adParam == "string")) {
                return
            }

            if (!isValidAd()) {
                setSavedLead(new Date())
            }

        })
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9V7HGHJRPH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-9V7HGHJRPH');
    </script>

    @yield('custom-css')

</head>
<body>

@include('repair.nav')

@yield('content')


@include('layout.script')
<footer class="cpr__footer" id="widget-cpr-main-widgets-footer">
    <div class="cpr__footer--details">
        <div class="cpr__footer--brand">
            <a href="{{route('anasayfa')}}" title="Link to  page"><img class="cpr__footer--logo"
                                                                    src="repair/assets/repairImg/logo/phonehospital_logo.png"
                                                                    alt="Phone Hospital logo" loading="lazy"
                                                                    width="222"></a> <!--<div class="cpr__footer--brand-questions">
                <ac-static-text class="cpr__footer--have-question" type-tag="label">Have a
                    Question?</ac-static-text>
                <ac-static-text render-type="ROUTES" page-type="CONTACT_US" p-id="" group-id=""
                    class="cpr__footer--contact-us">Contact Us</ac-static-text>
            </div>--> <a type="button" class="cpr__btn cpr__btn-primary--rounded" data-acsb-custom-trigger="true"
                         href="https://eticaret.phonehospital.com.tr" title="Accessibility Adjustments" aria-label="Accessibility Adjustments"> <label
                    class="cpr__btn-primary--rounded-lbl" type-tag="label">Ürun Satın Al</label> </a>
        </div>
        <div class="cpr__footer--services">
            <div class="cpr__footer--service-column">
                <label class="cpr__footer--services-t">Teknik Servis</label>
                <ul id="repairs-list">
                    @foreach(pageList('2') as $item)
                        <li><a class="cpr__footer--services-link" href="{{route('page')}}?slug={{$item->slug}}" title="{{$item->title}}"  aria-label="{{$item->title}}">{{$item->title}}</a></li>
                    @endforeach


                </ul>
            </div>
            <div class="cpr__footer--service-column">
                <label class="cpr__footer--services-t" type-tag="label">Bilgilendirme</label>
                <ul>
                    <li><a class="cpr__footer--services-link" href="#" title="Kurumsal"
                           aria-label="Kurumsal">Kurumsal</a></li>
                    <li><a class="cpr__footer--services-link" href="#" title="Odeme Islemleri"
                           aria-label="Odeme Islemleri">Odeme Islemleri</a></li>
                    <li><a class="cpr__footer--services-link" href="#" title="Teknik Servis" aria-label="Teknik Servis">Teknik
                            Servis</a></li>
                    <li><a class="cpr__footer--services-link" href="{{route('contact')}}" title="Iletisim"
                           aria-label="Iletisim">İletişim</a></li>

                </ul>
            </div>
            <div class="cpr__footer--legal">

                <div class="cpr__footer--legal-policy">
                    <div class="cpr__footer--legal-policy-top">

                        @foreach(pageList('1') as $item)
                        <a class="cpr__footer--legal-lbl" href="{{route('page')}}?slug={{$item->slug}}" title="{{$item->title}}" aria-label="{{$item->title}}">{{$item->title}}</a>
                        @endforeach


                    </div>
                    <div class="cpr__footer--legal-policy-bottom">
                        <div id="irmlink"></div>
                        <div id="teconsent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cpr__footer--partners">
        <div class="cpr__footer--certificate">
            <div class="cpr__footer--certificate-sm">
                <a href="https://www.facebook.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16ZM16 8C20.4 8 24 11.6 24 16C24 20 21.1 23.4 17.1 24V18.3H19L19.4 16H17.2V14.5C17.2 13.9 17.5 13.3 18.5 13.3H19.5V11.3C19.5 11.3 18.6 11.1 17.7 11.1C15.9 11.1 14.7 12.2 14.7 14.2V16H12.7V18.3H14.7V23.9C10.9 23.3 8 20 8 16C8 11.6 11.6 8 16 8Z"
                              fill="#4E4E50"></path>
                    </svg>
                </a> <a href="https://twitter.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M16 0C7.16344 0 0 7.16344 0 16C0 24.8366 7.16344 32 16 32C24.8366 32 32 24.8366 32 16C32 7.16344 24.8366 0 16 0ZM13.472 16.9281L6.04689 7H11.7696L16.6374 13.5087L22.6619 7H24.3436L17.3887 14.5135L25.2316 25H19.5089L14.2234 17.9329L7.68164 25H6L13.472 16.9281ZM11.1489 8.2387H8.51987L20.1292 23.7611H22.7582L11.1489 8.2387Z"
                              fill="#4E4E50"></path>
                    </svg>
                </a> <a href="https://www.linkedin.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16ZM8.2 13.3V24H11.6V13.3H8.2ZM8 9.9C8 11 8.8 11.8 9.9 11.8C11 11.8 11.8 11 11.8 9.9C11.8 8.8 11 8 9.9 8C8.9 8 8 8.8 8 9.9ZM20.6 24H23.8V17.4C23.8 14.1 21.8 13 19.9 13C18.2 13 17 14.1 16.7 14.8V13.3H13.5V24H16.9V18.3C16.9 16.8 17.9 16 18.9 16C19.9 16 20.6 16.5 20.6 18.2V24Z"
                              fill="#4E4E50"></path>
                    </svg>
                </a> <a href="https://www.instagram.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path
                            d="M16 18.8C14.5 18.8 13.2 17.6 13.2 16C13.2 14.5 14.4 13.2 16 13.2C17.5 13.2 18.8 14.4 18.8 16C18.8 17.5 17.5 18.8 16 18.8Z"
                            fill="#4E4E50"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M19.4 9.2H12.6C11.8 9.3 11.4 9.4 11.1 9.5C10.7 9.6 10.4 9.8 10.1 10.1C9.86261 10.3374 9.75045 10.5748 9.61489 10.8617C9.57916 10.9373 9.5417 11.0166 9.5 11.1C9.48453 11.1464 9.46667 11.1952 9.44752 11.2475C9.34291 11.5333 9.2 11.9238 9.2 12.6V19.4C9.3 20.2 9.4 20.6 9.5 20.9C9.6 21.3 9.8 21.6 10.1 21.9C10.3374 22.1374 10.5748 22.2495 10.8617 22.3851C10.9374 22.4209 11.0165 22.4583 11.1 22.5C11.1464 22.5155 11.1952 22.5333 11.2475 22.5525C11.5333 22.6571 11.9238 22.8 12.6 22.8H19.4C20.2 22.7 20.6 22.6 20.9 22.5C21.3 22.4 21.6 22.2 21.9 21.9C22.1374 21.6626 22.2495 21.4252 22.3851 21.1383C22.4209 21.0626 22.4583 20.9835 22.5 20.9C22.5155 20.8536 22.5333 20.8048 22.5525 20.7525C22.6571 20.4667 22.8 20.0762 22.8 19.4V12.6C22.7 11.8 22.6 11.4 22.5 11.1C22.4 10.7 22.2 10.4 21.9 10.1C21.6626 9.86261 21.4252 9.75045 21.1383 9.61488C21.0627 9.57918 20.9833 9.54167 20.9 9.5C20.8536 9.48453 20.8048 9.46666 20.7525 9.44752C20.4667 9.3429 20.0762 9.2 19.4 9.2ZM16 11.7C13.6 11.7 11.7 13.6 11.7 16C11.7 18.4 13.6 20.3 16 20.3C18.4 20.3 20.3 18.4 20.3 16C20.3 13.6 18.4 11.7 16 11.7ZM21.4 11.6C21.4 12.1523 20.9523 12.6 20.4 12.6C19.8477 12.6 19.4 12.1523 19.4 11.6C19.4 11.0477 19.8477 10.6 20.4 10.6C20.9523 10.6 21.4 11.0477 21.4 11.6Z"
                              fill="#4E4E50"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16ZM12.6 7.7H19.4C20.3 7.8 20.9 7.9 21.4 8.1C22 8.4 22.4 8.6 22.9 9.1C23.4 9.6 23.7 10.1 23.9 10.6C24.1 11.1 24.3 11.7 24.3 12.6V19.4C24.2 20.3 24.1 20.9 23.9 21.4C23.6 22 23.4 22.4 22.9 22.9C22.4 23.4 21.9 23.7 21.4 23.9C20.9 24.1 20.3 24.3 19.4 24.3H12.6C11.7 24.2 11.1 24.1 10.6 23.9C10 23.6 9.6 23.4 9.1 22.9C8.6 22.4 8.3 21.9 8.1 21.4C7.9 20.9 7.7 20.3 7.7 19.4V12.6C7.8 11.7 7.9 11.1 8.1 10.6C8.4 10 8.6 9.6 9.1 9.1C9.6 8.6 10.1 8.3 10.6 8.1C11.1 7.9 11.7 7.7 12.6 7.7Z"
                              fill="#4E4E50"></path>
                    </svg>
                </a>
            </div>
            <span class="cpr__footer--certificate-divisor"></span>
            <label class="cpr__footer--legal-rights" type-tag="label">© <span class="current-year">2024</span> Phone
                Hospital® All Rights Reserved.</label>

        </div>

        <div class="cpr__notice-container">
            <label class="cpr__notice-lbl" type-tag="label">Phone Hospital teknik servisleri bağımsız olarak işletilen
                işletmelerdir ve bu web sitesinde listelenen tüm onarım ve garanti türlerini sunmayabilirler.
                Belirli onarım yetenekleri ve garanti koşulları için yerel mağazanızla iletişime geçin.
                Phone Hospital Mağazalarında satılan belirli aksesuarlar veya cihazlar için üçüncü taraflar tarafından
                verilen garanti sorumluluğunda değillerdir.
                Tüm ürün ve şirket adları, ilgili sahiplerinin ticari markalarıdır.
                iPhone, iPad, iPod, iPod touch, Mac ve iMac, Apple, Inc.'in tescilli ticari markaları ve mülkiyetidir.
                Phone Hospital, üçüncü taraf bir onarım şirketidir ve Apple ile bağlantılı değildir.</label>
        </div>
    </div>
</footer>

@yield('custom-js')

</body>
</html>
