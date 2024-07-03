<!-- loader start -->
<div class="loader_skeleton">
    <header class="header-style-5">
        <div class="top-header top-header-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>{{ecommerce_setting('title')->value}}</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>{{ecommerce_setting('phone')->value}}</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="navbar d-block d-xl-none">
                                <a href="javascript:void(0)">
                                    <div class="bar-style" id="toggle-sidebar-res">
                                        <i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="brand-logo">
                                <a href="{{route('index')}}">
                                    <img src="{{asset('storage/setting/'.ecommerce_setting('logo')->value)}}" class="img-fluid blur-up lazyload"  style="width: 200px" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <form class="form_search" role="form">
                                <input id="query search-autocomplete" type="search"
                                       placeholder="Search any Device or Gadgets..."
                                       class="nav-search nav-search-field" aria-expanded="true">
                                <button type="submit" name="nav-submit-button" class="btn-search">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="menu-right pull-right">
                            <nav class="text-start">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                            </nav>
                            <div>
                                <div class="icon-nav d-none d-sm-block">
                                    <ul>
                                        <li class="onhover-div d-xl-none d-inline-block mobile-search">
                                            <div><img src="{{asset('ecommerce/images/icon/search.png')}}"
                                                      class="img-fluid blur-up lazyload" alt=""> <i
                                                    class="ti-search"></i></div>
                                        </li>
                                        <li class="onhover-div mobile-setting">
                                            <div><img src="../assets/images/icon/setting.png"
                                                      class="img-fluid blur-up lazyload" alt=""> <i
                                                    class="ti-settings"></i></div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div><img src="{{asset('ecommerce/images/icon/cart.png')}}"
                                                      class="img-fluid blur-up lazyload" alt=""> <i
                                                    class="ti-shopping-cart"></i></div>
                                            <span class="cart_qty_cls">2</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part bottom-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="category-menu d-none d-xl-block h-100">
                            <div class="toggle-sidebar">
                                <i class="fa fa-bars sidebar-bar"></i>
                                <h5 class="mb-0">shop by category</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="main-nav-center">
                            <nav class="text-start">
                                <!-- Sample menu definition -->
                                <ul class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                                                 aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="{{route('index')}}">Anasayfa</a></li>
                                    <li><a href="#">Bundle Urunler</a></li>
                                    <li><a href="#">KAMPANYALAR</a> </li>
                                    <li><a href="#">KARGO BEDAVA URUNLER</a> </li>
                                    <li><a href="#">ILETISIM</a> </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="small-section small-slider pt-res-0">
        <div class="container">
            <div class="home-slider">
                <div class="home"></div>
            </div>
        </div>
    </section>
    <section class="service-w-bg pt-0 tools-service">
        <div class="container">
            <div class="service p-0 ">
                <div class="row margin-default">
                    <div class="col-xl-3 col-sm-6 service-block">
                        <div class="media">
                            <svg class="bg-white"></svg>
                            <div class="media-body">
                                <h4></h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 service-block">
                        <div class="media">
                            <svg class="bg-white"></svg>
                            <div class="media-body">
                                <h4></h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 service-block">
                        <div class="media">
                            <svg class="bg-white"></svg>
                            <div class="media-body">
                                <h4></h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 service-block">
                        <div class="media">
                            <svg class="bg-white"></svg>
                            <div class="media-body">
                                <h4></h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ratio_square">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-basic">
                        <h2 class="title">
                    </div>
                    <div class="product-5 product-m no-arrow">
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- loader end -->


<!-- header start -->
<header class="header-style-5">
    <div class="mobile-fix-option"></div>
    <div class="top-header top-header-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>{{ecommerce_setting('title')->value}}</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>{{ecommerce_setting('title')->phone}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <ul class="header-dropdown">

                        @if(!auth()->guard('web')->check())
                        <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i>
                            Hesabim
                            <ul class="onhover-show-div">
                                <li><a href="{{route('login')}}">Giris Yap</a></li>
                                <li><a href="{{route('register')}}">Kayit Ol</a></li>
                            </ul>
                        </li>
                        @else
                            <li> <a href="{{route('profil')}}"> <i class="fa fa-user" aria-hidden="true"></i>Hesabim</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="navbar d-block d-xl-none">
                            <a href="javascript:void(0)">
                                <div class="bar-style" id="toggle-sidebar-res">
                                    <i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                </div>
                            </a>
                        </div>
                        <div class="brand-logo">
                            <a href="{{route('index')}}">
                                <img src="{{asset('storage/setting/'.ecommerce_setting('logo')->value)}}"
                                                      class="img-fluid blur-up lazyload" alt="" style="width: 200px"></a>
                        </div>
                    </div>
                    <div>
                        <form class="form_search" role="form">
                            <input id="query search-autocomplete" type="search"
                                   placeholder="Search any Device or Gadgets..." class="nav-search nav-search-field"
                                   aria-expanded="true">
                            <button type="submit" name="nav-submit-button" class="btn-search">
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="menu-right pull-right">
                        <nav class="text-start">
                            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                        </nav>
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div d-xl-none d-inline-block mobile-search">
                                        <div><img src="{{asset('ecommerce/images/icon/search.png')}}" onclick="openSearch()"
                                                  class="img-fluid blur-up lazyload" alt="">
                                            <i class="ti-search" onclick="openSearch()"></i>
                                        </div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div> <span class="closebtn" onclick="closeSearch()"
                                                        title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                               id="exampleInputPassword1"
                                                                               placeholder="Search a Product">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="fa fa-search"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-div mobile-cart">
                                        <div>
                                            <img src="{{asset('ecommerce/images/icon/cart.png')}}"  class="img-fluid blur-up lazyload" alt="">
                                            <i  class="ti-shopping-cart"></i>
                                        </div>
                                        <span class="cart_qty_cls">
                                            <?php $cart = cart(); if($cart){ ?> {{$cart['count']}} <?php }else{ ?> 0 <?php } ?>
                                        </span>
                                        <ul class="show-div shopping-cart">
                                            <?php $cart = cart(); if($cart){ foreach ($cart['items'] as $item){ $product = \App\Models\Product::find($item->product_id); ?>
                                            <li>
                                                <div class="media">
                                                    <a href="{{route('detail',$product->slug)}}"><img alt="" class="me-3"  src="{{$product->img}}"></a>
                                                    <div class="media-body">
                                                        <a href="{{route('detail',$product->slug)}}">
                                                            <h4>{{$item->description}}</h4>
                                                        </a>
                                                        <h4><span>{{$item->quantity}} x {{$item->price}}</span></h4>
                                                    </div>
                                                </div>
                                                <?php if($cart){ ?>
                                                    <div class="close-circle">
                                                        <a href="{{route('cart_delete',['cart_id'=>$item->cart_id,'product_id' =>$product->id])}}">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </li>
                                            <?php }} ?>
                                            <div>
                                                <a href="{{route('sepet')}}" class="btn btn-success">SEPETE GIT</a>
                                            </div>
                                        </ul>

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @include('layout.ecommerce.sidebar')
</header>
<!-- header end -->
