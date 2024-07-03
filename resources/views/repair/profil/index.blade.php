@extends('layout.repair')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .clearfix {
            width: 100%;
            height: 20px;
        }
    </style>
    <div class="clearfix"></div>

    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10"><h1>Sn. {{auth()->user()->fullname}}</h1></div>
        </div>
        <div class="row">
            <div class="col-sm-3"><!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-muted">Aktiviteler <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Cihazlar</strong></span> 0
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Satın Almalar</strong></span>
                        0
                    </li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-heading"><a class="btn btn-danger" href="{{route('logoutmypage')}}"> Çıkış Yap</a>
                    </div>
                </div>
            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Profil Bilgileri</a></li>
                    <li><a data-toggle="tab" href="#messages">Teknik Servis Cihazları</a></li>
                    <li><a data-toggle="tab" href="#settings">Satın Alınan Ürünler</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <input type="hidden" name="id" value="{{auth()->id()}}">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>İsim Soyisim</h4></label>
                                    <input type="text" class="form-control" name="fullname" id="fullname"
                                           value="{{auth()->user()->fullname}}">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name"><h4>Email</h4></label>
                                    <input type="text" class="form-control" name="email" id="email"
                                           value="{{auth()->user()->email}}">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone"><h4>Telefon</h4></label>
                                    <input type="text" class="form-control" name="phone" id="phone1"
                                           value="{{auth()->user()->phone}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="mobile"><h4>Şifre</h4></label>
                                    <input type="text" class="form-control" name="password" id="password"
                                           placeholder="Değiştirmeyecekseniz boş bırakın">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email"><h4>İl</h4></label>

                                    <select class="form-control form-select-sm" id="city_id" name="city_id" required>
                                        <option value="0">Şehir Seçiniz</option>
                                        @foreach($cities as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email"><h4>İlçe</h4></label>
                                    <select id="town_id" class="form-control form-select-sm" name="town_id" required>
                                        <option value="0">Şehir Seçiniz</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-23">
                                    <label for="address"><h4>Adres</h4></label>
                                    <textarea type="address" class="form-control" name="address"
                                              id="address">{{auth()->user()->address}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i
                                            class="glyphicon glyphicon-ok-sign"></i> Kaydet
                                    </button>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>
                                        Resetle
                                    </button>
                                </div>
                            </div>
                        </form>

                        <hr>

                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="messages">
                        <h2></h2>
                        <hr>
                        <table class="table table-bordered" style="font-size: 13px">
                            <thead>
                            <tr>
                                <td>Tipi</td>
                                <td>Marka / Model</td>
                                <td>Cihaz Durumu</td>
                                <td>Tahmini Servis Ücreti</td>
                                <td>Belirlenen Servis Ücreti</td>
                                <td>Ücret Onayla</td>
                                <td>Ücret Durumu</td>
                                <td>İşlemler</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td><span
                                            class="badge badge-danger"> {{\App\Models\RepairOrder::TYPE_STRINGS[$order->type]}}</span>
                                    </td>
                                    <td>{{$order->brand->name}} / {{$order->version->name}}</td>
                                    <td><span
                                            class="badge badge-info"> {{\App\Models\RepairOrder::ORDER_STATUS_STRINGS[$order->status]}}</span>
                                    </td>
                                    <td style="color: #f00;    font-weight: 700;"
                                        class="text-right font-weight-bold">{{$order->proforma_total_price}} ₺
                                    </td>
                                    <td style="color: #f00;    font-weight: 700;"
                                        class="text-right font-weight-bold">{{$order->reel_total_price}} ₺
                                    </td>

                                    <td>
                                        @if($order->status == 'PAYMENT_WAIT')
                                            <a href="{{route('repairOrderStatusChange',['id' => $order->id,'type' => 'PAYMENT_CONFIRM'])}}"
                                               class="btn btn-sm btn-success">
                                                <svg style="width: 15px;height: 15px;filter: invert(100%) sepia(0%) saturate(0) hue-rotate(0deg) brightness(100%) contrast(100%);
" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                     y="0px" width="122.877px" height="101.052px"
                                                     viewBox="0 0 122.877 101.052"
                                                     enable-background="new 0 0 122.877 101.052" xml:space="preserve"><g>
                                                        <path
                                                            d="M4.43,63.63c-2.869-2.755-4.352-6.42-4.427-10.11c-0.074-3.689,1.261-7.412,4.015-10.281 c2.752-2.867,6.417-4.351,10.106-4.425c3.691-0.076,7.412,1.255,10.283,4.012l24.787,23.851L98.543,3.989l1.768,1.349l-1.77-1.355 c0.141-0.183,0.301-0.339,0.479-0.466c2.936-2.543,6.621-3.691,10.223-3.495V0.018l0.176,0.016c3.623,0.24,7.162,1.85,9.775,4.766 c2.658,2.965,3.863,6.731,3.662,10.412h0.004l-0.016,0.176c-0.236,3.558-1.791,7.035-4.609,9.632l-59.224,72.09l0.004,0.004 c-0.111,0.141-0.236,0.262-0.372,0.368c-2.773,2.435-6.275,3.629-9.757,3.569c-3.511-0.061-7.015-1.396-9.741-4.016L4.43,63.63 L4.43,63.63z"/>
                                                    </g></svg>
                                            </a>
                                            <a href="{{route('repairOrderStatusChange',['id' => $order->id,'type' => 'REJECT'])}}"
                                               class="btn btn-sm btn-danger">
                                                <svg style="width: 15px;height: 15px;filter: invert(100%) sepia(0%) saturate(0) hue-rotate(0deg) brightness(100%) contrast(100%);
" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                     y="0px" width="121.31px" height="122.876px"
                                                     viewBox="0 0 121.31 122.876"
                                                     enable-background="new 0 0 121.31 122.876" xml:space="preserve"><g>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M90.914,5.296c6.927-7.034,18.188-7.065,25.154-0.068 c6.961,6.995,6.991,18.369,0.068,25.397L85.743,61.452l30.425,30.855c6.866,6.978,6.773,18.28-0.208,25.247 c-6.983,6.964-18.21,6.946-25.074-0.031L60.669,86.881L30.395,117.58c-6.927,7.034-18.188,7.065-25.154,0.068 c-6.961-6.995-6.992-18.369-0.068-25.397l30.393-30.827L5.142,30.568c-6.867-6.978-6.773-18.28,0.208-25.247 c6.983-6.963,18.21-6.946,25.074,0.031l30.217,30.643L90.914,5.296L90.914,5.296z"/>
                                                    </g></svg>
                                            </a>
                                        @elseif($order->status == 'PAYMENT_CONFIRM')
                                            <button class="btn btn-md btn-success" data-id="{{$order->id}}"
                                                    data-price="{{$order->reel_total_price}}" id="paymentForm">Odeme Yap
                                            </button>
                                        @else
                                            <span class="badge badge-info"> İşlem Yapılamaz</span>
                                        @endif
                                    </td>
                                    <td>İşlemler</td>
                                    <td>İşlemler</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        <div class="modal fade" id="paymentFormModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="width: 100%">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Odeme Sayfasi</h4>
                                    </div>
                                    <div class="modal-body" style="width: 100%">
                                        <div class="mt-4 mx-4">
                                             <div class="form mt-3">
                                                <div class="inputbox">
                                                    <input type="text" name="name" class="form-control"
                                                           required="required">
                                                    <span>Kart Uzerindeki Ad Soyad</span>
                                                </div>
                                                <div class="inputbox">
                                                    <input type="text" name="name" min="1" max="999"
                                                           class="form-control" required="required">
                                                    <span>Kart Numarasi</span> <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="d-flex flex-row">
                                                    <div class="inputbox">
                                                        <input type="text" name="name" min="1" max="999"
                                                               class="form-control" required="required"> <span>Son Kullanma Tarihi</span>
                                                    </div>
                                                    <div class="inputbox"><input type="text" name="name" min="1"
                                                                                 max="999" class="form-control"
                                                                                 required="required"> <span>CVV</span>
                                                    </div>
                                                </div>
                                                <div class="px-5 pay">
                                                    <button class="btn btn-success btn-block">Odemeyi Tamamla</button>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <style>
                        .btn-group-sm > .btn, .btn-sm {
                            padding: 4px 6px;
                            font-size: 12px;
                            line-height: 0.5;
                            border-radius: 3px;
                        }
                    </style>
                </div><!--/tab-pane-->
                <div class="tab-pane" id="settings">


                    <hr>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>Sipariş No</td>
                            <td>Sipariş Durumu</td>
                            <td>Fiyat</td>
                            <td>Teslimat Kodu / Zamanı</td>
                            <td>İşlemler</td>
                        </tr>
                        </thead>
                    </table>
                </div>

            </div><!--/tab-pane-->
        </div><!--/tab-content-->

    </div><!--/col-9-->
    </div><!--/row-->
    <div class="clearfix"></div>
@endsection


@section('custom-js')
    <script>
        $('#city_id').change(function () {
            var row = "";

            $("#town_id").empty();
            var value = $(this).val();
            $.ajax({
                url: '{{route('getTown')}}',
                data: {city: value},
                method: 'GET',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    $.each(data, function (index, value) {
                        row += '<option value="' + value.id + '">' + value.name + '</option>';
                        $("#town_id").append(row);
                    });
                    $("#town_id").focus().trigger('select');
                }
            });
        })
    </script>
    <script>

        $(document).on('click', '#paymentForm', function () {

            $('#paymentFormModal').modal('show');
        })
    </script>

@endsection
