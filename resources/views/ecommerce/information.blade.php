@extends('layout.ecommerce.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Bilgilendirme</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Bilgilendirme</a></li>
                            <li class="breadcrumb-item active">{{$information->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="about-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4>{{$information->name}}</h4>
                    {!! $information->value !!}
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection

@section('customJS')
    <script src="{{asset('ecommerce/home.js')}}"></script>
@endsection
