
<!-- footer section start -->
<footer class="dark-footer footer-style-1">
    <section class="section-b-space darken-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6 sub-title">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo"><img width="100px" src="{{asset('storage/setting/'.ecommerce_setting('logo')->value)}}" alt=""></div>
                        <p>{!! ecommerce_setting('shortText')->value !!}</p>
                        <ul class="contact-list">
                            <li><i class="fa fa-map-marker"></i>{{ecommerce_setting('adresse')->value}}
                            </li>
                            <li><i class="fa fa-phone"></i>Telefon: {{ecommerce_setting('phone')->value}}</li>
                            <li><i class="fa fa-envelope"></i>E-Posta: <a href="mail:{{ecommerce_setting('email')->value}}">{{ecommerce_setting('email')->value}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Hesabim</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <ul>
                                    <li><a href="/user" title="Üyeliğim" rel="nofollow">Üyeliğim</a></li>
                                    <li><a href="{{route('siparis-takip')}}" title="Sipariş Takibi">Sipariş Takibi</a></li>
                                    <li><a href="https://phonehospital.com.tr/contact" target="_blank" title="Mağazalar">Mağazalar</a></li>
                                    <li><a href="{{route('iletisim')}}" title="İletişim">İletişim</a></li>
                                    <li><a href="{{route('sss')}}" title="Sıkça Sorulan Sorular">Sıkça Sorulan Sorular</a></li>
                                    <li><a href="{{route('iletisim')}}" title="Destek Talepleri">Destek Talepleri</a></li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Bilgilendirme</h4>
                        </div>
                        <div class="footer-contant">
                            <?php $information = \App\Models\EcommerceSetting::where('type','information')->get(); ?>
                            <ul>
                                <?php foreach ($information as $item){ ?>
                                <li><a href="{{route('information',['slug' => $item->slug])}}">{{$item->name}}</a></li>
                              <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>BİZİ TAKİP ET</h4>
                        </div>
                        <div class="footer-contant">
                            <p class="mb-cls-content">İndirim,kampanya ve güncek haberlerden haberar olmak için kayıt ol</p>
                            <form method="post" class="form-inline" id="subscribe">
                                {{ csrf_field() }}

                                <div class="form-group me-sm-3 mb-2">
                                    <label for="inputPassword2" class="sr-only">E-Posta Adresı</label>
                                    <input type="email" class="form-control" id="inputPassword2"
                                           placeholder="Eposta Adresi" name="email">
                                </div>
                                <button type="button"  class="btn btn-solid mb-2">Kaydet</button>
                            </form>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer dark-subfooter">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i>
                           2016 - {{date('Y')}} Phone Hospital</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href="#"><img src="../assets/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/mastercard.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/american-express.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/discover.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer section end -->


<!--modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body modal1">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-bg">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <div class="offer-content"> <img src="../assets/images/Offer-banner.png"
                                                                 class="img-fluid blur-up lazyload" alt="">
                                    <h2>E-Bulten Uyeligi</h2>
                                    <form action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                                        class="auth-form needs-validation" method="post"
                                        id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                        target="_blank">
                                        <div class="form-group mx-sm-3">
                                            <input type="email" class="form-control" name="EMAIL" id="mce-EMAIL" placeholder="Mail adresinizi giriniz" required="required">
                                            <button type="submit" class="btn btn-solid"
                                                    id="mc-submit">Gonder</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal popup end-->


<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="quick-view-img"><img src="../assets/images/pro3/1.jpg" alt=""
                                                         class="img-fluid blur-up lazyload"></div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>Women Pink Shirt</h2>
                            <h3>$32.96</h3>
                            <ul class="color-variant">
                                <li class="bg-color1"></li>
                                <li class="bg-color3"></li>
                            </ul>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium</p>
                            </div>
                            <div class="product-description border-product">
                                <div class="size-box">
                                    <ul>
                                        <li class="active"><a href="javascript:void(0)">s</a></li>
                                        <li><a href="javascript:void(0)">m</a></li>
                                        <li><a href="javascript:void(0)">l</a></li>
                                        <li><a href="javascript:void(0)">xl</a></li>
                                    </ul>
                                </div>
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                                                                       class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number"
                                               value="1"> <span class="input-group-prepend"><button type="button"
                                                                                                    class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons"><a href="#" class="btn btn-solid">add to cart</a> <a
                                    href="#" class="btn btn-solid">view detail</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->




<!-- tap to top -->
<div class="tap-top top-cls">
    <div>
        <i class="fa fa-angle-double-up"></i>
    </div>
</div>
<!-- tap to top end -->
