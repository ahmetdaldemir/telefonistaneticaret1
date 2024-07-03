@extends('layout.repair')

@section('content')

    <main class="cpr__models-repairs">
        <section class="cpr__breadcrumb__container">
            <div class="cpr__breadcrumb-content__container">
                <a onclick="goHome()" class="cpr__breadcrumb-btn" aria-label="BACK" title="BACK">
                    <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.25537 2.80157L4.87067 0.250976L7.1242 2.44904L4.50929 4.99964L7.125 7.55062L4.87067 9.74907L2.25497 7.19809L0.00143534 5.00002L2.25537 2.80157Z"
                            fill="#F15F5E"></path>
                    </svg>
                    <label class="cpr__btn-lbl" id="models_repairs_0">GERİ</label> </a>
            </div>
        </section>

        <section id="cpr__booking--customer-form" class="cpr__step--content cpr__booking--customer-form cpr__book-customer-form--step"
                 style="  border-top: 1px solid #ccc;  display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;">

  <div class="col-sm-6 text-right" style="margin-top: 10px;margin-bottom: 10px">
    <div class="ticket light">
      <div class="ticket-head text-center" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/bg_15.png)">
        <div class="layer"></div>
        <div class="from-to">Teknik Servis Formu</div>
      </div>
      <div class="ticket-body">
        <div class="passenger">
          <p>Sayın</p>
          <h4>{{$order->firstname}}  {{$order->lastname}}</h4>
        </div>
        <div class="flight-info row">
          <div class="col-xs-6">
            <p>Servis N</p>
            <h4>{{date('D').date('Y').date('m').$id}}</h4>
          </div>
          <div class="col-xs-6">
            <p>FİYAT</p>
            <h4>{{$order->price ?? 'BELİRLENMEDİ'}}</h4>
          </div>
        </div>
        <div class="flight-date">{{$order->created_at}}</div>
        <div class="barcode" style="    text-align: center;
    line-height: 5;">5465767890</div>
      </div>
      <div class="ticket-footer">
        <div class="disclaimer"></div>
          Bu bilet mail adresinize gönderilmiştir. Cihazınız tarafımızdan teslim alındıktan sonra fiyat bilgilendirmesi yapılacaktır.
          Buraya Cihaz teslim durumuna gore bilgi yazılşacak
      </div>
    </div>
  </div>

        </section>
    </main>
@endsection

@section('custom-js')

@endsection

@section('custom-css')
<style>

    .ticket {
        border-radius: 4px;
        display: inline-block;
        max-width: 320px;
        text-align: left;
        text-transform: uppercase;
        width: 100%;
    }
    .ticket.dark {
        background-color: #161616;
        color: white;
    }
    .ticket.light {
        background-color: white;
        color: #161616;
    }
    .ticket.light .ticket-body {
        border-color: #161616;
    }
    .ticket-head {
        background-position: center;
        background-size: cover;
        border-radius: 4px 4px 0 0;
        color: white;
        height: 140px;
        position: relative;
    }
    .ticket-head .from-to {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateY(-50%) translateX(-50%);
        font-size: 24px;
        font-weight: 600;
        width: 100%;
        z-index: 2;
        text-align: center;
    }
    .ticket-head .icon {
        display: inline-block;
        margin: 0 40px;
        transform: rotate(135deg) translate(25%, 25%);
    }
    .ticket-body {
        border-bottom: 1px dashed white;
        padding: 15px 45px;
        position: relative;
    }
    .ticket-body p {
        color: #A2A2A2;
        font-size: 12px;
    }
    .ticket-body .flight-info {
        margin-top: 15px;
    }
    .ticket-body .flight-date {
        font-size: 12px;
        margin-top: 15px;
    }
    .ticket-body:before,
    .ticket-body:after {
        background-color: #FFB563;
        border-radius: 100%;
        content: "";
        height: 15px;
        position: absolute;
        top: 100%;
        width: 20px;
    }
    .ticket-body:before {
        left: 0;
        transform: translate(-70%, -45%);
    }
    .ticket-body:after {
        right: 0;
        transform: translate(70%, -45%);
    }
    .ticket-footer{
        font-size: 10px;
    }
    .barcode {
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        box-shadow: 1px 0 0 1px,
        5px 0 0 1px,
        10px 0 0 1px,
        11px 0 0 1px,
        15px 0 0 1px,
        18px 0 0 1px,
        22px 0 0 1px,
        23px 0 0 1px,
        26px 0 0 1px,
        30px 0 0 1px,
        35px 0 0 1px,
        37px 0 0 1px,
        41px 0 0 1px,
        44px 0 0 1px,
        47px 0 0 1px,
        51px 0 0 1px,
        56px 0 0 1px,
        59px 0 0 1px,
        64px 0 0 1px,
        68px 0 0 1px,
        72px 0 0 1px,
        74px 0 0 1px,
        77px 0 0 1px,
        81px 0 0 1px,
        85px 0 0 1px,
        88px 0 0 1px,
        92px 0 0 1px,
        95px 0 0 1px,
        96px 0 0 1px,
        97px 0 0 1px,
        101px 0 0 1px,
        105px 0 0 1px,
        109px 0 0 1px,
        110px 0 0 1px,
        113px 0 0 1px,
        116px 0 0 1px,
        120px 0 0 1px,
        123px 0 0 1px,
        127px 0 0 1px,
        130px 0 0 1px,
        131px 0 0 1px,
        134px 0 0 1px,
        135px 0 0 1px,
        138px 0 0 1px,
        141px 0 0 1px,
        144px 0 0 1px,
        147px 0 0 1px,
        148px 0 0 1px,
        151px 0 0 1px,
        155px 0 0 1px,
        158px 0 0 1px,
        162px 0 0 1px,
        165px 0 0 1px,
        168px 0 0 1px,
        173px 0 0 1px,
        176px 0 0 1px,
        177px 0 0 1px,
        180px 0 0 1px;
        display: inline-block;
        height: 30px;
        margin-right: 85px;
        margin-top: 25px;
        transform: translateX(-90px);
        width: 0;
    }
    .disclaimer {
        color: #A2A2A2;
        font-family: "IM Fell French Canon";
        font-size: 14px;
        font-style: italic;
        line-height: 1.25;
        padding: 15px 25px;
        text-transform: none;
    }
    .layer {
        -webkit-transition: all 0.2s ease;
        -moz-transition: all 0.2s ease;
        -ms-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        background-color: rgba(0, 0, 0, 0.4);
        border-radius: 4px 4px 0 0;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1;
    }
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0;
        padding: 0;
    }

</style>
@endsection
