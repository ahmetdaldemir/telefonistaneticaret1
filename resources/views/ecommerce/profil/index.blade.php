@extends('layout.ecommerce.layout')

@section('content')
    <section class="dashboard-section section-b-space user-dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image">
                                <img src="../assets/images/avtar.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="profile-detail">
                                <h5>{{auth()->guard('web')->user()->fullname}}</h5>
                                <h6>{{auth()->guard('web')->user()->email}}</h6>
                            </div>
                        </div>
                        <div class="faq-tab">
                            <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                <li class="nav-item" role="presentation"><a data-bs-toggle="tab" data-bs-target="#info"
                                                                            class="nav-link active" aria-selected="true"
                                                                            role="tab">Kullanici Bilgiler</a></li>
                                <li class="nav-item" role="presentation"><a data-bs-toggle="tab"
                                                                            data-bs-target="#address" class="nav-link"
                                                                            aria-selected="false" tabindex="-1"
                                                                            role="tab">Adres Defteri</a></li>
                                <li class="nav-item" role="presentation"><a data-bs-toggle="tab"
                                                                            data-bs-target="#orders" class="nav-link"
                                                                            aria-selected="false" tabindex="-1"
                                                                            role="tab">Siparisler</a></li>
                                <li class="nav-item" role="presentation"><a data-bs-toggle="tab"
                                                                            data-bs-target="#wishlist" class="nav-link"
                                                                            aria-selected="false" tabindex="-1"
                                                                            role="tab">Begendiklerim</a></li>
                                <li class="nav-item" role="presentation"><a data-bs-toggle="tab"
                                                                            data-bs-target="#profile" class="nav-link"
                                                                            aria-selected="false" tabindex="-1"
                                                                            role="tab">Profil</a></li>

                                <li class="nav-item" role="presentation"><a href="{{route('logout')}}" class="nav-link"
                                                                            aria-selected="false" tabindex="-1"
                                                                            role="tab">Cikis Yap</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="faq-content tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="counter-section">
                                <div class="welcome-msg">
                                    <h4>Merhabalar, {{auth()->guard('web')->user()->fullname}} !</h4>
                                    <p>Bu panelde bilgilerinizi duzenleyebilir. Siparislerinizi ve detaylarini
                                        inceleyebilir.
                                        Devam eden siparislerinizin iptal sureclerini yonetebilirsiniz</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="counter-box">
                                            <img src="{{asset('ecommerce/images/icon/sale.png')}}" class="img-fluid">
                                            <div>
                                                <h3>25</h3>
                                                <h5>Toplam Siparis Sayisi</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="counter-box">
                                            <img src="{{asset('ecommerce/images/icon/homework.png')}}"
                                                 class="img-fluid">
                                            <div>
                                                <h3>5</h3>
                                                <h5>Bekleyen Siparisler</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="box-account box-info">
                                    <div class="box-head">
                                        <h4>Kisisel Bilgileriniz</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>Iletisim Bilgileriniz</h3><a href="#">Duzenle</a>
                                                </div>
                                                <div class="box-content">
                                                    <h6>{{auth()->guard('web')->user()->fullname}}</h6>
                                                    <h6>{{auth()->guard('web')->user()->email}}</h6>
                                                    <h6><a href="#">Sifre Degistir</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>E-Bulten Uyeligi</h3><a href="#">Duzenle</a>
                                                </div>
                                                <div class="box-content">
                                                    <p>E-Bulten Uyeligi ile kampanyalardan haberdar olabilirsiniz.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="address" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Adresler</h3>
                                                <a href="javascript:void(0)" onclick="openPanel()" style="position: absolute;float: right;right: 0;">
                                                    <div class="setting-sidebar btn btn-sm btn-solid" id="setting-icon">
                                                        <h5>+ Yeni Ekle</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="address-book-section">
                                                <div class="row g-4">
                                                    <div class="select-box active col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="top">
                                                                <h6>mark jecno <span>home</span></h6>
                                                            </div>
                                                            <div class="middle">
                                                                <div class="address">
                                                                    <p>549 Sulphur Springs Road</p>
                                                                    <p>Downers Grove, IL</p>
                                                                    <p>60515</p>
                                                                </div>
                                                                <div class="number">
                                                                    <p>mobile: <span>+91 123 - 456 - 7890</span></p>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                   data-bs-target="#edit-address" data-bs-toggle="modal"
                                                                   class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="select-box col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="top">
                                                                <h6>mark jecno <span>office</span></h6>
                                                            </div>
                                                            <div class="middle">
                                                                <div class="address">
                                                                    <p>549 Sulphur Springs Road</p>
                                                                    <p>Downers Grove, IL</p>
                                                                    <p>60515</p>
                                                                </div>
                                                                <div class="number">
                                                                    <p>mobile: <span>+91 123 - 456 - 7890</span></p>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                   data-bs-target="#edit-address" data-bs-toggle="modal"
                                                                   class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
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
                        <div class="tab-pane fade" id="orders" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">
                                            <div class="top-sec">
                                                <h3>My Orders</h3>
                                            </div>
                                            <div class="table-responsive-xl">
                                                <table class="table cart-table order-table">
                                                    <thead>
                                                    <tr class="table-head">
                                                        <th scope="col">image</th>
                                                        <th scope="col">Order Id</th>
                                                        <th scope="col">Product Details</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">View</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/1.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span class="mt-0">#125021</span>
                                                        </td>
                                                        <td>
                                                            <span class="fs-6">Purple polo tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded-pill bg-success custom-badge">Shipped</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/2.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span class="mt-0">#125367</span>
                                                        </td>
                                                        <td>
                                                            <span class="fs-6">Sleevless white top</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded-pill bg-danger custom-badge">Pending</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/27.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <p>#125948</p>
                                                        </td>
                                                        <td>
                                                            <p class="fs-6">multi color polo tshirt</p>
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded-pill bg-success custom-badge">Shipped</span>
                                                        </td>
                                                        <td>
                                                            <p class="theme-color fs-6">$49.54</p>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/28.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <p>#127569</p>
                                                        </td>
                                                        <td>
                                                            <p class="fs-6">Candy red solid tshirt</p>
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded-pill bg-success custom-badge">Shipped</span>
                                                        </td>
                                                        <td>
                                                            <p class="theme-color fs-6">$49.54</p>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/33.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <p>#125753</p>
                                                        </td>
                                                        <td>
                                                            <p class="fs-6">multicolored polo tshirt</p>
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded-pill bg-secondary custom-badge">Canceled</span>
                                                        </td>
                                                        <td>
                                                            <p class="theme-color fs-6">$49.54</p>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/34.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#125021</span>
                                                        </td>
                                                        <td>
                                                            <span class="fs-6">Men's Sweatshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge rounded-pill bg-secondary custom-badge">Canceled</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="wishlist" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">
                                            <div class="top-sec">
                                                <h3>My Wishlist</h3>
                                            </div>
                                            <div class="table-responsive-xl">
                                                <table class="table cart-table wishlist-table">
                                                    <thead>
                                                    <tr class="table-head">
                                                        <th scope="col">image</th>
                                                        <th scope="col">Order Id</th>
                                                        <th scope="col">Product Details</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/1.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span class="mt-0">#125021</span>
                                                        </td>
                                                        <td>
                                                            <span>Purple polo tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/2.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span class="mt-0">#125367</span>
                                                        </td>
                                                        <td>
                                                            <span>Sleevless white top</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/27.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#125948</span>
                                                        </td>
                                                        <td>
                                                            <span>multi color polo tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/28.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#127569</span>
                                                        </td>
                                                        <td>
                                                            <span>Candy red solid tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/33.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#125753</span>
                                                        </td>
                                                        <td>
                                                            <span>multicolored polo tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/34.jpg"
                                                                     class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#125021</span>
                                                        </td>
                                                        <td>
                                                            <span>Men's Sweatshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Saved Cards</h3>
                                                <a href="#" class="btn btn-sm btn-solid">+ add new</a>
                                            </div>
                                            <div class="address-book-section">
                                                <div class="row g-4">
                                                    <div class="select-box active col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="bank-logo">
                                                                <img src="../assets/images/bank-logo.png"
                                                                     class="bank-logo">
                                                                <img src="../assets/images/visa.png"
                                                                     class="network-logo">
                                                            </div>
                                                            <div class="card-number">
                                                                <h6>Card Number</h6>
                                                                <h5>6262 6126 2112 1515</h5>
                                                            </div>
                                                            <div class="name-validity">
                                                                <div class="left">
                                                                    <h6>name on card</h6>
                                                                    <h5>Mark Jecno</h5>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>validity</h6>
                                                                    <h5>XX/XX</h5>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                   data-bs-target="#edit-address" data-bs-toggle="modal"
                                                                   class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="select-box col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="bank-logo">
                                                                <img src="../assets/images/bank-logo1.png"
                                                                     class="bank-logo">
                                                                <img src="../assets/images/visa.png"
                                                                     class="network-logo">
                                                            </div>
                                                            <div class="card-number">
                                                                <h6>Card Number</h6>
                                                                <h5>6262 6126 2112 1515</h5>
                                                            </div>
                                                            <div class="name-validity">
                                                                <div class="left">
                                                                    <h6>name on card</h6>
                                                                    <h5>Mark Jecno</h5>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>validity</h6>
                                                                    <h5>XX/XX</h5>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                   data-bs-target="#edit-address" data-bs-toggle="modal"
                                                                   class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
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
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>profile</h4>
                                                    <a class="edit-link" href="#">edit</a>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>company name</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>Fashion Store</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>email address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>mark.jecno@gmail.com</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Country / Region</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>Downers Grove, IL</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Year Established</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>2018</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Total Employees</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>101 - 200 People</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>category</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>clothing</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>street address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>549 Sulphur Springs Road</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>city/state</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>Downers Grove, IL</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>zip</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>60515</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dashboard-title mt-lg-5 mt-3">
                                                    <h4>login details</h4>
                                                    <a class="edit-link" href="#">edit</a>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Email Address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>mark.jecno@gmail.com <a class="edit-link"
                                                                                                href="#">edit</a></h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Phone No.</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>+01 4485 5454<a class="edit-link"
                                                                                        href="#">Edit</a></h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Password</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>******* <a class="edit-link" href="#">Edit</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="security" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>settings</h4>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <div class="account-setting">
                                                        <h5>Notifications</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios"
                                                                           id="exampleRadios1" value="option1"
                                                                           checked="">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios1">
                                                                        Allow Desktop Notifications
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios"
                                                                           id="exampleRadios2" value="option2">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios2">
                                                                        Enable Notifications
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios"
                                                                           id="exampleRadios3" value="option3">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios3">
                                                                        Get notification for my own activity
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios"
                                                                           id="exampleRadios4" value="option4">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios4">
                                                                        DND
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-setting">
                                                        <h5>deactivate account</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios1"
                                                                           id="exampleRadios4" value="option4"
                                                                           checked="">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios4">
                                                                        I have a privacy concern
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios1"
                                                                           id="exampleRadios5" value="option5">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios5">
                                                                        This is temporary
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios1"
                                                                           id="exampleRadios6" value="option6">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios6">
                                                                        other
                                                                    </label>
                                                                </div>
                                                                <button type="button" class="btn btn-solid btn-xs">
                                                                    Deactivate
                                                                    Account
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-setting">
                                                        <h5>Delete account</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios3"
                                                                           id="exampleRadios7" value="option7"
                                                                           checked="">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios7">
                                                                        No longer usable
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios3"
                                                                           id="exampleRadios8" value="option8">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios8">
                                                                        Want to switch on other account
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                           type="radio" name="exampleRadios3"
                                                                           id="exampleRadios9" value="option9">
                                                                    <label class="form-check-label"
                                                                           for="exampleRadios9">
                                                                        other
                                                                    </label>
                                                                </div>
                                                                <button type="button" class="btn btn-solid btn-xs">
                                                                    Delete Account
                                                                </button>
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
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div id="setting_box" class="setting-box">
        <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
        <div class="setting_box_body">
            <div onclick="closeSetting()">
                <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back
                </div>
            </div>
            <div class="setting-body">
                <div class="setting-contant">
                    <div class="row demo-section">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="email">Isim</label>
                                <input type="text" class="form-control" id="fname" placeholder="First Name" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Soyisim</label>
                                <input type="password" class="form-control" id="lname" placeholder="Last Name"
                                       required="">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-12">
                                <label for="email">Telefon</label>
                                <input type="text" class="form-control" id="fname" placeholder="First Name" required="">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="customerAccount-AddressTypeSelectContainer">
                                <div class="col-md-6 customerAccount-AddressTypeElement">
                                    <input type="radio" class="radio_animated" id="fname" placeholder="First Name"
                                           required="">
                                    <label for="email">Ev<i class="ti ti-home"></i></label>

                                </div>
                                <div class="col-md-6 customerAccount-AddressTypeElement">
                                    <input type="radio" class="radio_animated" id="fname" placeholder="First Name"
                                           required="">
                                    <label for="email">Is<i class="ti ti-bar-chart"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-12">
                                <label for="email">Il</label>
                                <input type="text" class="form-control" id="fname" placeholder="First Name" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="review">Ilce</label>
                                <input type="password" class="form-control" id="lname" placeholder="Last Name"
                                       required="">
                            </div>
                            <div class="col-md-12">
                                <label for="review">Mahalle</label>
                                <input type="password" class="form-control" id="lname" placeholder="Last Name"
                                       required="">
                            </div>
                            <div class="col-md-12">
                                <label for="review">Adres</label>
                                <input type="password" class="form-control" id="lname" placeholder="Last Name"
                                       required="">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-12">
                                <label for="email">Adres Basligi</label>
                                <input type="text" class="form-control" id="fname" placeholder="First Name" required="">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="email">Bireysel</label>
                                <input type="text" class="form-control" id="fname" placeholder="First Name" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Kurumsal</label>
                                <input type="password" class="form-control" id="lname" placeholder="Last Name"
                                       required="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>

        .setting-box {
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            width: 460px;
            right: -660px;
            background-color: white;
            top: 0;
            z-index: 999;
            -webkit-box-shadow: 0 15px 5px 0 rgba(77, 77, 77, 0.28);
            box-shadow: 0 15px 5px 0 rgba(77, 77, 77, 0.28);
            -webkit-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }
    </style>
@endsection
<!-- stylesheet -->


<!-- script -->

@section('customJS')
    <script>
        function openPanel() {
            document.getElementById("setting_box").classList.add('open-setting');
            document.getElementById("setting-icon").classList.add('open-icon');
        }

        function closeSetting() {
            document.getElementById("setting_box").classList.remove('open-setting');
            document.getElementById("setting-icon").classList.remove('open-icon');
        }
    </script>
@endsection
