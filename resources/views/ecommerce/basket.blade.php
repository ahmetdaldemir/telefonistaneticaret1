@extends('layout.ecommerce.layout')

@section('content')
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form method="post" action="{{route('checkout')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12 user-dashboard-section">

                                @if(auth()->guard('web')->check())
                                    <div class="address-book-section">
                                        <div class="row g-4">
                                            <div class="select-box active col-xl-6 col-md-6">
                                                <div class="address-box">
                                                    <div class="top">
                                                        <h6>mark jecno <span><input type="radio" class="input" name="addressSelected" id="addressSelected" /></span></h6>
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
                                                        <a href="javascript:void(0)" data-bs-target="#edit-address"
                                                           data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                        <a href="#" class="bottom_btn">remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="checkout-title">
                                        <h3>Kargo Bilgileri</h3>
                                    </div>
                                    <div class="row check-out">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Isim</div>
                                            <input type="text" name="firstname" id="firstname" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Soyisim</div>
                                            <input type="text" name="lastname" id="lastname" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Phone</div>
                                            <input type="text" name="phone" id="phone" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Email Address</div>
                                            <input type="text" name="email" id="email" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <div class="field-label">Il</div>
                                            <select name="city_id" id="city_id">
                                                    <?php foreach ($cities as $city){ ?>
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                            <div class="field-label">Ilce</div>
                                            <input type="text" name="town_id" id="town_id" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                            <div class="field-label">Posta Kodu</div>
                                            <input type="text" name="post_code" id="post_code" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <div class="field-label">Adres</div>
                                            <input type="text" name="address" id="address" value=""
                                                   placeholder="Street address">
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="checkout-title">
                                        <h3>Kurumsal Fatura</h3>
                                    </div>
                                    <div class="row check-out">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">VKN *</div>
                                            <input type="text" name="invoice_tax" id="invoice_tax" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Vergi Dairesi*</div>
                                            <input type="text" name="invoice_tax_office" id="invoice_tax_office" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Firma Adi</div>
                                            <input type="text" name="invoice_company_name" id="invoice_company_name" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12" style="    display: flex; justify-content: space-around;">
                                            <div class="einvoice">
                                            <input type="checkbox" name="invoice_e_invoce" value="1" id="invoice_e_invoce"> &ensp;
                                            <label for="account-option">E-Fatura Mukkellefiyim </label>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Urun Adi <span>Toplam Tutar</span></div>
                                        </div>
                                        <ul class="qty">
                                            <?php foreach ($carts['items'] as $item){ ?>
                                            <li>{{$item->description}} × {{$item->quantity}} <span>{{$item->price * $item->quantity}} ₺ </span>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <ul class="sub-total">
                                            <li>Ara Toplam <span class="count">{{$total}} ₺ </span></li>
                                            <li>Kargo
                                                <div class="shipping">
                                                    @foreach($shippings as $shipping)
                                                     <div class="shopping-option">
                                                        <input type="radio" name="shipping_id" value="{{$shipping->id}}" id="local-pickup" checked>
                                                        <label for="local-pickup">{{$shipping->shipping->title}} {{$shipping->price}} ₺</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="total">
                                            <li>Toplam Tutar <span class="count" id="totalPrice">{{$total}} ₺</span></li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_type" id="payment-1" value="credit_card" checked="checked" onchange="togglePaymentForm()">
                                                            <label for="payment-1">Kredi Karti Ile Odeme</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_type" id="payment-2"  value="pay_at_door" onchange="togglePaymentForm()">
                                                            <label for="payment-2">Kapida Odeme</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="credit-card-form" style="display: none;">
                                                <div class="form-group">
                                                    <label for="card-number">Kart Üzerindeki İsim:</label>
                                                    <input type="text" id="card-name" name="card-name" maxlength="50" placeholder="Isım Soyısım">
                                                </div>
                                                <div class="form-group">
                                                    <label for="card-number">Kart Numarası:</label>
                                                    <input type="text" id="card-number" name="card-number" maxlength="19" placeholder="1234 5678 9012 3456">
                                                </div>
                                                <div class="form-group">
                                                    <label for="expiry-date">Son Kullanma Tarihi:</label>
                                                    <div class="expiry-date">
                                                        <input type="text" id="expiry-month" name="expiry-month" maxlength="2" placeholder="AA">
                                                        <span>/</span>
                                                        <select id="expiry-year" name="expiry-year"></select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cvv">CVV:</label>
                                                    <input type="text" id="cvv" name="cvv" maxlength="3" placeholder="123">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end"><button  class="btn-solid btn">Odemeyi Tamamla</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"], select {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .expiry-date {
        display: flex;
        align-items: center;
    }

    .expiry-date input {
        width: 50px;
        margin-right: 5px;
        text-align: center;
    }
        .hidden {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease-in-out;
    }

    .visible {
        max-height: 500px; /* Formun yüksekliği kadar olmalı */
        transition: max-height 0.5s ease-in-out;
        display: block !important;
        overflow: hidden;
    }
    .einvoice{
        vertical-align: middle;
        display: flex;
        align-content: center;
        flex-wrap: wrap;
        align-items: flex-end;
    }
</style>
@section('customJS')
    <script src="{{asset('ecommerce/home.js')}}"></script>
@endsection
