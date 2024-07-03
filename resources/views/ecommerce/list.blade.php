@extends('layout.ecommerce.layout')

@section('content')
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <a href="#"><img src="{{asset("ecommerce/images/mega-menu/2.jpg")}}" class="img-fluid blur-up lazyloaded" alt=""></a>
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="product-page-per-view">
                                                            <select>
                                                                <option value="#">Filtrele</option>
                                                                <option value="Low to High">50 Products Par Page</option>
                                                                <option value="Low to High">100 Products Par Page</option>
                                                            </select>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <select>
                                                                <option value="High to low">Sirala</option>
                                                                <option value="Low to High">Azalan Fiyat</option>
                                                                <option value="Low to High">Artan Fiyat</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">
                                                @foreach($products as $item)
                                                <div class="col-xl-3 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#" class="bg-size blur-up lazyloaded" style="background-image: url({{$item->img}}); background-size: cover; background-position: center center; display: block;">
                                                                    <img src="{{$item->img}}" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#" class="bg-size blur-up lazyloaded" style="background-image: url({{$item->img}}); background-size: cover; background-position: center center; display: block;">
                                                                    <img src="{{$item->img}}" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                            </div>
                                                            <div class="cart-info cart-wrap">
                                                                <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Sepete Ekle"><i class="ti-shopping-cart"></i></button>
                                                                <a href="javascript:void(0)" title="Begen">
                                                                    <i class="ti-heart" data-id="{{$item->id}}" aria-hidden="true"></i>
                                                                </a>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                                                <a href="#" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>
                                                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                <a href="{{route('detail',['slug',$item->slug])}}">
                                                                    <h6>{{$item->name}}</h6>
                                                                </a>

                                                                <h4>{{$item->bulkDiscountPrice}} ₺</h4>
                                                                <ul class="color-variant">
                                                                    <li class="bg-light0"></li>
                                                                    <li class="bg-light1"></li>
                                                                    <li class="bg-light2"></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJS')
    <script src="{{asset('ecommerce/home.js')}}"></script>
@endsection
