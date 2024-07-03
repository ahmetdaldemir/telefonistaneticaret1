@extends('layout.ecommerce.layout')

@section('content')
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick slick-initialized slick-slider">
                            <button class="slick-prev slick-arrow" aria-label="Previous" type="button"
                                    style="display: block;">Previous
                            </button>
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 2704px;">

                                    <div class="slick-slide slick-current slick-active" data-slick-index="0"  aria-hidden="false"  style="width: 676px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                        <div>
                                            <div style="width: 100%; display: inline-block;"><img src="{{$product->img}}" alt="" style="width: 100%;" class="img-fluid blur-up image_zoom_cls-0 lazyloaded"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <button class="slick-next slick-arrow" aria-label="Next" type="button"
                                    style="display: block;">Next
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track"  style="opacity: 1; width: 2574px; transform: translate3d(-702px, 0px, 0px);">
                                             <div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 234px;">
                                                <div>
                                                    <div style="width: 100%; display: inline-block;"><img src="{{$product->img}}" alt=""  class="img-fluid blur-up lazyloaded"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">

                            <h2>{{$product->name}}</h2>
                            <div class="rating-section">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <h6>120 ratings</h6>
                            </div>
                            <div class="label-section">
                                <span class="badge badge-grey-color">#Phone Hospital</span>
                            </div>
                            <h3 class="price-detail">{{$product->buldDiscountPrice}}  ₺
                                <del>{{$product->price}}  ₺</del>
                                <span>{{ round(($product->price - $product->bulkDiscountPrice) / $product->price * 100)  }} % </span></h3>
                            <ul class="color-variant">
                                <li class="bg-light0 active"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                            <div id="selectSize" class="addeffect-section product-description border-product">
                                <h6 class="product-title size-text">select size <span><a href="" data-bs-toggle="modal"
                                                                                         data-bs-target="#sizemodal">size
                                            chart</a></span></h6>
                                <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sheer
                                                    Straight Kurta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body"><img src="../assets/images/size-chart.jpg" alt=""
                                                                         class="img-fluid blur-up lazyload"></div>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="error-message">please select size</h6>
                                <div class="size-box">
                                    <ul>
                                        <li><a href="javascript:void(0)">s</a></li>
                                        <li><a href="javascript:void(0)">m</a></li>
                                        <li><a href="javascript:void(0)">l</a></li>
                                        <li><a href="javascript:void(0)">xl</a></li>
                                    </ul>
                                </div>
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                                                                       class="btn quantity-left-minus"
                                                                                                       data-type="minus"
                                                                                                       data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button"
                                                                                  class="btn quantity-right-plus"
                                                                                  data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons">
                                <a href="javascript:void(0)" id="cartEffect"  class="btn btn-solid hover-solid btn-animation">
                                    <i  class="fa fa-shopping-cart me-1" aria-hidden="true"></i>Sepete Ekle</a>
                                @if(!$product->wishlist)
                                 <a href="#" class="btn btn-solid">
                                     <i class="ti-heart fz-16 me-2" data-id="{{$product->id}}" aria-hidden="true"></i>
                                     Begen</a>
                                @endif
                            </div>
                            <div class="product-count">
                                <ul>
                                    <li>
                                        <img src="{{asset('ecommerce/images/icon/truck.png')}}" class="img-fluid" alt="image">
                                        <span class="lang">500 TL daha urun eklerseniz kargo ucretsiz !</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- div class="border-product">
                                <h6 class="product-title">share it</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tab-product m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-selected="true">
                                <i class="icofont icofont-ui-home"></i>Aciklama</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" id="profile-top-tab"
                                                                    data-bs-toggle="tab" href="#top-profile" role="tab"
                                                                    aria-selected="false" tabindex="-1"><i
                                    class="icofont icofont-man-in-glasses"></i>Ozellikler</a>
                            <div class="material-border"></div>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="review-top-tab"  data-bs-toggle="tab" href="#top-review" role="tab" aria-selected="false" tabindex="-1">
                                <i class="icofont icofont-contacts"></i>Yorumlar</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                             aria-labelledby="top-home-tab">
                            <div class="product-tab-discription">
                                <div class="part">
                                     {{$product->description}}
                                </div>



                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <div class="single-product-tables">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Sleeve Length</td>
                                        <td>Sleevless</td>
                                    </tr>
                                    <tr>
                                        <td>Neck</td>
                                        <td>Round Neck</td>
                                    </tr>
                                    <tr>
                                        <td>Occasion</td>
                                        <td>Sports</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Fabric</td>
                                        <td>Polyester</td>
                                    </tr>
                                    <tr>
                                        <td>Fit</td>
                                        <td>Regular Fit</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <form class="theme-form">
                                <div class="form-row row">
                                    <div class="col-md-12">
                                        <label for="review">Baslik</label>
                                        <input type="text" class="form-control" id="review"  placeholder="Baslik" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">Aciklama</label>
                                        <textarea class="form-control" placeholder="Yorum Yaziniz" id="exampleFormControlTextarea1" rows="6"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-solid" type="submit">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>related products</h2>
                </div>
            </div>

            <div class="row search-product">
                @foreach($product->related as $item)
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="{{route('detail',['slug',$item->slug])}}" class="bg-size blur-up lazyloaded"
                                   style="background-image: url({{$item->img}}); background-size: cover; background-position: center center; display: block;"><img
                                        src="{{$item->img}}" class="img-fluid blur-up lazyload bg-img"
                                        alt="" style="display: none;"></a>
                            </div>
                            <div class="back">
                                <a href="{{route('detail',['slug',$item->slug])}}" class="bg-size blur-up lazyloaded"
                                   style="background-image: url({{$item->img}}); background-size: cover; background-position: center center; display: block;"><img
                                        src="{{$item->img}}" class="img-fluid blur-up lazyload bg-img"
                                        alt="" style="display: none;"></a>
                            </div>
                            <div class="cart-info cart-wrap">
                                <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Sepete Ekle"><i class="ti-shopping-cart"></i></button>
                                <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i  class="ti-search" aria-hidden="true"></i></a>
                                <a href="#"  title="Compare"><i  class="ti-reload" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="{{route('detail',['slug',$item->slug])}}">
                                <h6>{{$item->name}}</h6>
                            </a>
                            <h4>{{$item->bulkDiscountPrice}}  ₺</h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('customJS')
    <script src="{{asset('ecommerce/home.js')}}"></script>
@endsection
