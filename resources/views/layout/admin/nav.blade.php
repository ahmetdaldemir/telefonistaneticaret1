<header class="header border-b border-gray-200 dark:border-gray-700">
    <div class="header-wrapper h-13  mx-auto">
        <!-- Header Nav Start start -->
        <div class="header-action header-action-start">
            <div class="side-nav-toggle-mobile header-action-item header-action-item-hoverable" data-bs-toggle="modal" data-bs-target="#mobile-nav-drawer">
                <div class="text-sm">
                    <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg>
                </div>
            </div>
            <div class="logo px-6 hidden md:flex">
                <img src="https://adminnew.phonehospital.com.tr/admin/img/logo/logo-light-full.png" alt="logo">
            </div>
        </div>
        <!-- Header Nav Start edn -->
        <!-- Header Nav Middle start -->
        <div class="header-action header-action-middle hidden md:flex">
            <div class="flex items-center horizontal-nav">
                <div>
                    <div data-menu-item="simple-documentation" class="menu-item">
                            <span class="menu-item-icon">
                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </span>
                        <a class="h-full w-full flex items-center" href="{{route('dashboard')}}">
                            <span>Anasayfa</span>
                        </a>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="dropdown-toggle">
                        <div class="menu-item menu-item-hoverable">

                            <span>Katalog</span>
                        </div>
                    </div>
                    <ul class="dropdown-menu">
                        <li data-menu-item="simple-welcome" class="menu-item menu-item-single">
                            <a class="h-full w-full flex items-center" href="{{route('product.index')}}">
                                <span>Urunler</span>
                            </a>
                        </li>
                        <li data-menu-item="simple-welcome" class="menu-item menu-item-single">
                            <a class="h-full w-full flex items-center" href="{{route('brand.index')}}">
                                <span>Marka</span>
                            </a>
                        </li>

                        <li data-menu-item="simple-welcome" class="menu-item menu-item-single">
                            <a class="h-full w-full flex items-center" href="{{route('category.index')}}">
                                <span>Kategoriler</span>
                            </a>
                        </li>
                        <li data-menu-item="simple-welcome" class="menu-item menu-item-single">
                            <a class="h-full w-full flex items-center" href="{{route('product_attribute.group.index')}}">
                                <span>Urun Ozellikleri</span>
                            </a>
                        </li>

                        <li data-menu-item="simple-welcome" class="menu-item menu-item-single">
                            <a class="h-full w-full flex items-center" href="{{route('customer.index')}}">
                                <span>Musteri Hizmetleri</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="dropdown">
                    <div class="dropdown-toggle">
                        <div class="menu-item menu-item-hoverable">

                            <span>Siparişler</span>
                        </div>
                    </div>
                    <ul class="dropdown-menu">

                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="h-full w-full flex items-center" href="{{route('order.ecommerce')}}">
                                <span>Siparişler</span>
                            </a>
                        </li>
                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="h-full w-full flex items-center" href="{{route('shippings.index')}}">
                                <span>Kargo Yonetimi</span>
                            </a>
                        </li>
                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="h-full w-full flex items-center" href="{{route('customer.index')}}">
                                <span>Musteriler</span>
                            </a>
                        </li>
                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="h-full w-full flex items-center" href="{{route('transaction.index')}}">
                                <span>Ödeme Logu</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <div class="dropdown-toggle">
                        <div class="menu-item menu-item-hoverable">

                            <span>Sanal Pazar İşlemleri</span>
                        </div>
                    </div>
                    <ul class="dropdown-menu">
                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="h-full w-full flex items-center" href="{{route('virtual_market.trendyol_attribute_compare')}}">
                                <span>Ürünler</span>
                            </a>
                        </li>
                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="h-full w-full flex items-center" href="{{route('virtual_market.trendyol_category_compare')}}">
                                <span>Trendyol Kategori Eşleştirme</span>
                            </a>
                        </li>

                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="h-full w-full flex items-center" href="{{route('virtual_market.trendyol_attribute_compare')}}">
                                <span>Trendyol Özellik Eşleştirme</span>
                            </a>
                        </li>
                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="h-full w-full flex items-center" href="{{route('virtual_market.trendyol_attribute_compare')}}">
                                <span>Hepsiburada Özellik Eşleştirme</span>
                            </a>
                        </li>
                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="h-full w-full flex items-center" href="{{route('virtual_market.trendyol_attribute_compare')}}">
                                <span>Hepsiburada Kategori Eşleştirme</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <div>
                    <div data-menu-item="simple-documentation" class="menu-item">

                        <a class="h-full w-full flex items-center" href="{{route('user.index')}}" target="_blank">
                            <span>Kullanıcılar</span>
                        </a>
                    </div>
                </div>
                <div>
                    <div data-menu-item="simple-documentation" class="menu-item">

                        <a class="h-full w-full flex items-center" href="{{route('ecommerceSetting.index')}}" target="_blank">
                            <span>Ayarlar</span>
                        </a>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="dropdown-toggle">
                        <div class="menu-item menu-item-hoverable">

                            <span>Yönetim</span>
                        </div>
                    </div>
                    <ul class="dropdown-menu">

                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="menu-item-link" href="{{route('slider.index')}}">
                                <span class="menu-item-text">Slider</span>
                            </a>
                        </li>
                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="menu-item-link" href="{{route('banner.index')}}">
                                <span class="menu-item-text">Banner</span>
                            </a>
                        </li>


                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="menu-item-link" href="{{route('faq.index')}}">
                                <span class="menu-item-text">Faq</span>
                            </a>
                        </li>

                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="menu-item-link" href="{{route('virtual_market.index')}}">
                                <span class="menu-item-text">Sanal Pazar Ayarları</span>
                            </a>
                        </li>
                        <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                            <a class="menu-item-link" href="{{route('virtual_market.index')}}">
                                <span class="menu-item-text">Sanal Pos Ayarları</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- Header Nav Middle end -->
        <!-- Header Nav End start -->
        <div class="header-action header-action-end">

            <!-- User Dropdown-->
            <div class="dropdown">
                <div class="dropdown-toggle" id="user-dropdown" data-bs-toggle="dropdown">
                    <div class="header-action-item flex items-center gap-2">
						 <span class="avatar avatar-circle" data-avatar-size="32"
                                style="width: 32px">
						 <img class="avatar-img avatar-circle" src="{{asset('admin/img/avatars/thumb-1.jpg')}}"
                               loading="lazy" alt=""></span>
                        <div class="hidden md:block">
                            <div class="text-xs capitalize">admin</div>
                            <div class="font-bold">{{auth()->guard('admin')->user()->name}}</div>
                        </div>
                    </div>
                </div>
                <ul class="dropdown-menu bottom-end min-w-[240px]">
                    <li class="menu-item-header">
                        <div class="py-2 px-3 flex items-center gap-2">
								 <span class="avatar avatar-circle avatar-md">
								 	<img class="avatar-img avatar-circle"
                                          src="{{asset('admin/img/avatars/thumb-1.jpg')}}" loading="lazy" alt="">
								 </span>
                            <div>
                                <div class="font-bold text-gray-900 dark:text-gray-100">{{auth()->guard('admin')->user()->name}}</div>
                                <div class="text-xs">{{auth()->guard('admin')->user()->email}}</div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item-divider"></li>
                    <li class="menu-item menu-item-hoverable mb-1 h-[35px]">
                        <a class="flex gap-2 items-center" href="#">
													<span class="text-xl opacity-50">
														<svg stroke="currentColor" fill="none" stroke-width="0"
                                                             viewBox="0 0 24 24" height="1em" width="1em"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
														</svg>
													</span>
                            <span>Profil</span>
                        </a>
                    </li>

                    <li class="menu-item menu-item-hoverable mb-1 h-[35px]">
                        <a class="flex gap-2 items-center" href="classic-activity-log.html">
													<span class="text-xl opacity-50">
														<svg stroke="currentColor" fill="none" stroke-width="2"
                                                             viewBox="0 0 24 24" stroke-linecap="round"
                                                             stroke-linejoin="round" height="1em" width="1em"
                                                             xmlns="http://www.w3.org/2000/svg">
															<polyline
                                                                    points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
														</svg>
													</span>
                            <span>Aktivite Logu</span>
                        </a>
                    </li>
                    <li id="menu-item-29-2VewETdxAb" class="menu-item-divider"></li>
                    <li class="menu-item menu-item-hoverable gap-2 h-[35px]">
												<span class="text-xl opacity-50">
													<svg stroke="currentColor" fill="none" stroke-width="0"
                                                         viewBox="0 0 24 24" height="1em" width="1em"
                                                         xmlns="http://www.w3.org/2000/svg">
														<path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
													</svg>
												</span>
                        <span>Çıkış Yap</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Nav End end -->
    </div>
</header>
