@extends('layout.ecommerce.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Destek Talebi</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Destek Talebi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <section class="authentication-page">
        <div class="container">
            <section class="search-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form class="form-header" action="{{route('support_request_store')}}">
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Destek Talebi" placeholder="SeriNo/Imei" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-solid"><i class="fa fa-search"></i>Kayit Olustur</button>
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

@section('customJS')
    <script src="{{asset('ecommerce/home.js')}}"></script>
@endsection
