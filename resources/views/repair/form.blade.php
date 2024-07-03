@extends('layout.repair')

@section('content')
    <!-- Latest compiled and minified CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        /*Customer form*/
        .cpr__booking--customer-form {
            display: flex;
            flex-direction: column;
            width: 1170px;
            margin: auto;
            margin-bottom: 0px !important;
        }

        .cpr__booking-customer-form--content {
            row-gap: 18px;
            margin: 0 auto;
        }

        .cpr__booking-customer-form--content .cpr__form--input.textarea {
            height: 120px;
        }

        .cpr__booking--customer-form .cpr__btn {
            margin: 0 auto;
            margin-top: 37px;
            width: min-content;
        }

        /*Customer form*/
    </style>
    <main class="cpr__models-repairs">
        <section class="cpr__breadcrumb__container">
            <div class="cpr__breadcrumb-content__container">
                <a onclick="goBack()" class="cpr__breadcrumb-btn" aria-label="BACK" title="BACK">
                    <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.25537 2.80157L4.87067 0.250976L7.1242 2.44904L4.50929 4.99964L7.125 7.55062L4.87067 9.74907L2.25497 7.19809L0.00143534 5.00002L2.25537 2.80157Z"
                            fill="#F15F5E"></path>
                    </svg>
                    <label class="cpr__btn-lbl" id="models_repairs_0">GERİ</label> </a>
            </div>
        </section>

        <section id="cpr__booking--customer-form" class="cpr__step--content cpr__booking--customer-form cpr__book-customer-form--step" style="display: flex;">

            <div style="width: 100%;    margin: 15px 0 15px 0;">
                <form class="form-control" method="post" action="{{route('formadd')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div id="cpr__booking-customer-form" class="cpr__booking-customer-form--content cpr__form">
                                <div class="cpr__form--input-group">
                                    <div class="cpr__form--lbl-content">
                                        * <label class="cpr__form--lbl" id="booking_34">İsim</label>
                                    </div>
                                    <input type="text" id="input-first-name" aria-label="first name" name="firstname" class="cpr__form--input" autocomplete="off" required>
                                    <label class="cpr__form--error-lbl">İsim alanı zorunludur</label>
                                    <div data-lastpass-icon-root="true"
                                         style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                                </div>
                                <div class="cpr__form--input-group">
                                    <div class="cpr__form--lbl-content">
                                        * <label class="cpr__form--lbl" id="booking_36">Soyisim</label>
                                    </div>
                                    <input type="text" id="input-last-name" aria-label="last name" name="lastname"
                                           class="cpr__form--input" autocomplete="off" required>
                                    <label class="cpr__form--error-lbl">Soyisim alanı zorunludur</label>
                                </div>
                                <div class="cpr__form--input-group">
                                    <div class="cpr__form--lbl-content">
                                        * <label class="cpr__form--lbl">Telefon Numarası</label>
                                    </div>
                                    <input type="tel" id="input-phone" class="cpr__form--input" name="phone"
                                           aria-label="Phone" autocomplete="off">
                                    <label class="cpr__form--error-lbl">Telefon format: (###) ###-#### <br>
                                        Telefon Alanı Zorunludur</label>
                                </div>
                                <div class="cpr__form--input-group">
                                    <div class="cpr__form--lbl-content">
                                        * <label class="cpr__form--lbl">Eposta</label>
                                    </div>
                                    <input type="email" id="input-email" class="cpr__form--input" name="email"
                                           aria-label="Email" autocomplete="off"> <label class="cpr__form--error-lbl">Eposta
                                        alanı zorunludur</label>
                                </div>
                                <div class="cpr__form--input-group">
                                    <div class="cpr__form--lbl-content">
                                        * <label class="cpr__form--lbl">Ekran Parolasi</label>
                                    </div>
                                    <input type="text" id="input-password" class="cpr__form--input" name="password" aria-label="password" autocomplete="off">
                                    <label class="cpr__form--error-lbl">Parola alanı zorunludur</label>
                                </div>
                                <div class="cpr__form--input-group">
                                    <div class="cpr__form--lbl-content">
                                        * <label class="cpr__form--lbl">IMEI/SERİ</label>
                                    </div>
                                    <input type="text" id="input-imei" class="cpr__form--input" name="imei"
                                           aria-label="IMEI" autocomplete="off">
                                    <label class="cpr__form--error-lbl">IMEI/SERİ alanı zorunludur</label>
                                </div>
                                <div class="cpr__form--input-group width-100">
                                    <div class="cpr__form--lbl-content with-notice">
                                        * <label class="cpr__form--lbl">Probleminizi Detaylı Yazınız</label>
                                        <label class="cpr__form--notice">300 characters left</label>
                                    </div>
                                    <textarea id="input-comments" class="cpr__form--input textarea" name="description"
                                              autocomplete="off"></textarea>
                                    <label class="cpr__form--error-lbl">Açıklama alanı zorunludur</label>
                                </div>
                                <div class="clearfix" style="    width: 100%;border: 1px solid #ccc;"></div>
                                <div class="cpr__form--input-group">
                                    <div class="cpr__form--lbl-content">
                                        * <label class="cpr__form--lbl">İL</label>
                                    </div>
                                    <select class="form-select form-select-sm" id="city_id" name="city_id" required>
                                        <option value="0">Şehir Seçiniz</option>
                                        @foreach($cities as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="cpr__form--input-group">
                                    <div class="cpr__form--lbl-content">
                                        * <label class="cpr__form--lbl">İLÇE</label>
                                    </div>
                                    <select id="town_id" class="form-select form-select-sm" name="town_id" required>
                                        <option value="0">Şehir Seçiniz</option>
                                    </select>
                                </div>
                                <div class="cpr__form--input-group width-100">
                                    <div class="cpr__form--lbl-content with-notice">
                                        * <label class="cpr__form--lbl">ADRES</label>
                                        <label class="cpr__form--notice">300 characters left</label>
                                    </div>
                                    <textarea id="input-comments" class="cpr__form--input textarea" name="address"
                                              autocomplete="off"></textarea>
                                    <label class="cpr__form--error-lbl">Adres</label>
                                </div>
                                <div class="cpr__form--row-notice">
                                    <label class="cpr__form--row-label" style="font-weight: 600;font-size: 11px;"> *Bu talebi göndererek talebime ilişkin
                                        bir e-posta, kısa mesaj veya telefon araması alabileceğimi anlıyorum.
                                        Yukarıda seçmiş olduğunuz arızalar doğrultusunda verilen fiyat tahmini fiyattır.
                                        Cihazınız bize ulaştıktan sonra uzman ekibimiz gerekli incelemeleri yaparak
                                        tarafınıza arıza ve ücret bilgisiniz bildirecektir.
                                        Onarılamaz durumda olan cihazlar tarafımızda size detaylı şekilde
                                        bilgilendirildikten sonra işlem yapılmadan tarafınıza iletilecektir.
                                        Kabul etmeniz doğrultusunda ileteceğimiz link ile online olarak ödemenizi
                                        gerçekleştirebilir veya hesap numaralamıza havale gerçekleştirebilirsiniz.
                                        Ödeme sonrası cihazınızın arıza veya arızaları giderildikten sonra tarafınıza
                                        kargo ile güvenli şekilde gönderilecektir.
                                        Servisimizde tamir edilen her cihazın adeğiştirilen arızalı parçaları
                                        tarafımızda 15 gün garantilidir.
                                        Cihazınızın bize ulaştığı ve size gönderildiği süreçlerin tamamı kamera ve
                                        fotogram altına alınarak sizlerin ve bizlerin hak mahrumiyeti engellenmektedir.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label style="    border-bottom: 1px solid #CCB;margin-bottom: 30px;">Arıza
                                Seçenekleri</label>

                            <ul class="list-group">
                                @foreach($site_technical_category as $item)
                                    <li class="list-group-item">{{$item->title}} <label style="float: right">{{number_format($item->price,2,",",".")}} ₺ <input type="checkbox" class="repairccategory" name="repaircategory[]" value="{{$item->id}}" data-price="{{$item->price}}"/></label></li>
                                @endforeach
                            </ul>
                            <div class="clearfix" style=" margin: 10px 0 10px 0; width: 100%;border: 1px solid #ccc;"></div>

                            <div class="cpr__form--input-group w-100">
                                <div class="cpr__form--lbl-content">
                                    * <label class="cpr__form--lbl">KARGO FİRMASI</label>
                                </div>
                                <select id="cargo" name="shippingCompany" class="form-select form-select-sm" required>
                                    <option value="1">Kendim Teslim Edeceğim</option>
                                    <option value="2">Mng Kargo</option>
                                    <option value="3">Yurtiçi Kargo</option>
                                </select>
                            </div>
                            <div class="clearfix" style="  margin: 10px 0 10px 0;width: 100%;border: 1px solid #ccc;"></div>

                            <div class="form-check">
                                <label class="form-check-label" style="    font-size: 13px;color: #f00;">
                                    <input type="checkbox" name="confirm" class="form-check-input" required>
                                    Tüm sözleşme metinlerini Okudum,Anladım Onaylıyorum</a>
                                </label>
                            </div>
                            <button id="customer-form-submit-button" role="button"
                                    class="cpr__btn cpr__btn-primary fit form-button">
                                <label class="cpr__btn-lbl" id="booking_45">Tamamla</label>
                                <svg class="cpr__btn-icon" width="12" height="16" viewBox="0 0 12 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.94581 11.5873L3.6784 15.7491L0.00130729 12.1625L4.26807 8.00066L0 3.83821L3.6784 0.250994L7.94647 4.41344L11.6236 8.00004L7.94581 11.5873Z"
                                        fill="white"></path>
                                </svg>
                            </button>
                            <p id="submit-confirmation-error" style="
                        display:none;
                        color: #F15F5E !important;
                        text-align: center;
                        padding-top: 8px;">Submit application failed, please try again</p>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection

@section('custom-js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

    <script>
        $('#city_id').change(function () {
            var value = $(this).val();
            $.ajax({
                url: '{{route('getTown')}}',
                data: {city: value},
                method: 'GET',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    $.each(data, function(index, value){
                        var row="";
                        row +='<option value="'+value.id+'">'+value.name+'</option>';
                        $("#town_id").append(row);
                    });
                    $("#town_id").focus().trigger('select');
                }
            });
        })
    </script>
@endsection
