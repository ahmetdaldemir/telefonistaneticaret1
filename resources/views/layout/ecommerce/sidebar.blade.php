<div class="bottom-part bottom-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="category-menu d-none d-xl-block h-100">
                    <div id="toggle-sidebar" class="toggle-sidebar">
                        <i class="fa fa-bars sidebar-bar"></i>
                        <h5 class="mb-0">KATEGORİLER</h5>
                    </div>
                </div>
                <div class="sidenav fixed-sidebar marketplace-sidebar">
                    <nav>
                        <div>
                            <div class="sidebar-back text-start d-xl-none d-block"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> GERİ</div>
                        </div>

                        <?php
                        echo '<ul id="sub-menu" class="sm pixelstrap sm-vertical">';

                        echo printCategoryMenu();
                        echo '</ul>';
                        ?>


                    </nav>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="main-nav-center">
                    <nav class="text-start">
                        <!-- Sample menu definition -->
                        <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                            <li>
                                <div class="mobile-back text-end">GERİ<i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>
                            <li><a href="{{url('/')}}">ANASAYFA</a></li>
                            <li><a href="{{url('/')}}">BUNDLE ÜRÜNLER</a></li>
                            <li><a href="{{url('/')}}">KAMPANYALAR</a></li>
                            <li><a href="{{url('kargo_bedava')}}">KARGO BEDAVA ÜRÜNLER</a></li>
                                <li><a href="{{url('iletisim')}}">İLETİŞİM</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
