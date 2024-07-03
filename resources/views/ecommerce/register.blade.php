@extends('layout.ecommerce.layout')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Uye Ol</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Uye Ol</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Hesap Olustur</h3>
                    <div class="theme-card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="    display: list-item;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="theme-form" method="post" action="{{route('registerStore')}}">
                            @csrf
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="email">Isim</label>
                                    <input type="text" class="form-control" id="fname" name="firstname" placeholder="First Name" required">
                                </div>
                                <div class="col-md-6">Soyisim</label>
                                    <input type="password" class="form-control" id="lname" name="lastname" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="email">E-Posta</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-Posta" required="required">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Sifre</label>
                                    <input type="password" class="form-control" id="review" name="password" placeholder="Enter your password" required>
                                </div>
                                <button type="submit" class="btn btn-solid w-auto">Hesap Olustur</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

