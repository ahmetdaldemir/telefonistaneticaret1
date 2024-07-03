@extends('layout.ecommerce.layout')

@section('content')
    <style>
        .gsi-material-button {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -webkit-appearance: none;
            background-color: #131314;
            background-image: none;
            border: 1px solid #747775;
            -webkit-border-radius: 20px;
            border-radius: 20px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #e3e3e3;
            cursor: pointer;
            font-family: 'Roboto', arial, sans-serif;
            font-size: 14px;
            height: 40px;
            letter-spacing: 0.25px;
            outline: none;
            overflow: hidden;
            padding: 0 12px;
            position: relative;
            text-align: center;
            -webkit-transition: background-color .218s, border-color .218s, box-shadow .218s;
            transition: background-color .218s, border-color .218s, box-shadow .218s;
            vertical-align: middle;
            white-space: nowrap;
            width: auto;
            max-width: 400px;
            min-width: min-content;
            border-color: #8e918f;
        }

        .gsi-material-button .gsi-material-button-icon {
            height: 20px;
            margin-right: 12px;
            min-width: 20px;
            width: 20px;
        }

        .gsi-material-button .gsi-material-button-content-wrapper {
            -webkit-align-items: center;
            align-items: center;
            display: flex;
            -webkit-flex-direction: row;
            flex-direction: row;
            -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
            height: 100%;
            justify-content: space-between;
            position: relative;
            width: 100%;
        }

        .gsi-material-button .gsi-material-button-contents {
            -webkit-flex-grow: 1;
            flex-grow: 1;
            font-family: 'Roboto', arial, sans-serif;
            font-weight: 500;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: top;
        }

        .gsi-material-button .gsi-material-button-state {
            -webkit-transition: opacity .218s;
            transition: opacity .218s;
            bottom: 0;
            left: 0;
            opacity: 0;
            position: absolute;
            right: 0;
            top: 0;
        }

        .gsi-material-button:disabled {
            cursor: default;
            background-color: #13131461;
            border-color: #8e918f1f;
        }

        .gsi-material-button:disabled .gsi-material-button-state {
            background-color: #e3e3e31f;
        }

        .gsi-material-button:disabled .gsi-material-button-contents {
            opacity: 38%;
        }

        .gsi-material-button:disabled .gsi-material-button-icon {
            opacity: 38%;
        }

        .gsi-material-button:not(:disabled):active .gsi-material-button-state,
        .gsi-material-button:not(:disabled):focus .gsi-material-button-state {
            background-color: white;
            opacity: 12%;
        }

        .gsi-material-button:not(:disabled):hover {
            -webkit-box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
        }

        .gsi-material-button:not(:disabled):hover .gsi-material-button-state {
            background-color: white;
            opacity: 8%;
        }
    </style>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Giris Yapin</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Giris Yapin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Giris Yap</h3>
                    <div class="theme-card">
                        <form class="theme-form">
                            <div class="form-group">
                                <label for="email">E-Posta</label>
                                <input type="text" class="form-control" id="email" placeholder="E-Posta" required="">
                            </div>
                            <div class="form-group">
                                <label for="review">Sifre</label>
                                <input type="password" class="form-control" id="review" placeholder="Sifre" required="">
                            </div>
                            <a href="#" class="btn btn-solid">Giris Yap</a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3>Uye Ol</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Hesap Olustur</h6>
                        <p>Sitemize daha once uye olmadiysaniz hemen uye olabilirsiniz<span>Teknik Servis sitemizdeki uyeliginiz ile ortak kullanilmaktadir.</span>.
                        </p>
                        <a href="{{route('register')}}" class="btn btn-solid">Hesap Olustur</a>
                        <a href="{{route('google_login')}}" class="btn btn-solid">Google Ile Giris Yap</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

