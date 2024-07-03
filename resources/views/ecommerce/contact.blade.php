@extends('layout.ecommerce.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Iletisim</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Iletisim</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="contact-page section-b-space">
        <div class="container">
            <div class="row section-b-space">
                <div class="col-lg-7 map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.671816257025!2d28.65676477611456!3d41.01055581928455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b55f773d5a82ff%3A0x4bff8aa9359c7333!2sPHONE%20HOSPITAL!5e0!3m2!1sen!2str!4v1714905326758!5m2!1sen!2str"
                        allowfullscreen></iframe>

                 </div>
                <div class="col-lg-5">
                    <div class="contact-right">
                        <ul>
                            <li>
                                <div class="contact-icon">
                                    <img src="{{asset('ecommerce/images/icon/phone.png')}}"  alt="{{ecommerce_setting('title')->value}}">
                                    <h6>ILETISIM</h6>
                                </div>
                                <div class="media-body">
                                    <p>{{ecommerce_setting('phone')->value}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h6>Adres</h6>
                                </div>
                                <div class="media-body">
                                    <p>{{ecommerce_setting('adresse')->value}}</p>
                                 </div>
                            </li>
                            <li>
                                <div class="contact-icon">
                                    <img src="{{asset('ecommerce/images/icon/email.png')}}"  alt="{{ecommerce_setting('title')->value}}">
                                    <h6>E-Posta</h6>
                                </div>
                                <div class="media-body">
                                    <p>{{ecommerce_setting('email')->value}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form" method="post" action="{{route('sendMail')}}">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="name">Isim</label>
                                <input type="text" class="form-control"  id="firstname" name="firstname" placeholder="Isim"
                                       required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Soyisim</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Soyisim" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Telefon</label>
                                <input type="text" class="form-control" id="phone"  name="phone" placeholder="05555555555"
                                       required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email">E-Posta</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@examle.com" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="review">Mesaj</label>
                                <textarea class="form-control" placeholder="Mesaj" name="message"
                                          id="message" rows="6"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid" type="submit">Gonder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection

@section('customJS')
    <script src="{{asset('ecommerce/home.js')}}"></script>
@endsection
