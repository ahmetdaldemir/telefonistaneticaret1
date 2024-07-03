@extends('layout.ecommerce.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Siparis Takibi</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Siparis Takibi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <section  class="contact-page section-b-space">
        <div class="container">
            <section class="search-block">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 offset-lg-3">

                            <div class="content"></div>
                            <form class="form-header" id="orderTrackingForm" action="{{route('order_tracking_get')}}" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="orderNumber"  aria-label="Siparis No" placeholder="Siparis No? KArgo Takip No" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-solid" type="submit" id="orderTrackingButton"><i class="fa fa-search"></i>Sorgula</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection

