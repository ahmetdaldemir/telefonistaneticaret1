@extends('layout.admin.admin')

@section('content')

    <div class="subbanner alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
        <div class="alert-content">
            <div>
                <h3>Supervisor / Firmalar</h3>
            </div>
            <div slot="left">

            </div>
        </div>
        <div slot="right" class="float-right">
            <div class="grid grid-cols-1 gap-1">

            </div>
        </div>
    </div>
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <div class="grid grid-flow-col justify-stretch ">
                     <div class="card adaptable-card">
                        <div class="card-body">
                            <form class="needs-validation" method="post" action="{{route('supervisor.update',['id' => $company->id])}}" novalidate>
                                @csrf
                                <div class="form-container vertical">
                                    <div class="grid grid-flow-row-dense grid-cols-2 grid-rows-1">
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomEmail">Mağaza Adı</label>
                                            <input id="validationCustomEmail" class="input form-control" name="title" value="{{old('title',$company->title)}}" type="text">
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">Kep Adresi</label>
                                            <input id="validationCustomUsername" class="input form-control" name="kep_address" value="{{old('kep_address',$company->kep_address)}}"  type="text">
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">Mersis No</label>
                                            <input id="validationCustomUsername" class="input form-control"  name="mersis_address" value="{{old('mersis_address',$company->mersis_address)}}"  type="text">
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">Vergi Dairesi</label>
                                            <input id="validationCustomUsername" class="input form-control"  name="tax_office" value="{{old('tax_office',$company->tax_office)}}"  type="text">
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">Vergi No</label>
                                            <input id="validationCustomUsername" class="input form-control" name="tax_number" value="{{old('tax_number',$company->tax_number)}}"  type="text">
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">Şirket Ünvanı</label>
                                            <input id="validationCustomUsername" class="input form-control" name="company_name" value="{{old('company_name',$company->company_name)}}"  type="text">
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">Şirket Türü</label>
                                            <input id="validationCustomUsername" class="input form-control" name="company_type" value="{{old('company_type',$company->company_type)}}"  type="text">
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">Site Adresi</label>
                                            <input id="validationCustomUsername" class="input form-control" name="website" value="{{old('website',$company->website)}}"  type="text">
                                        </div>
                                    </div>
                                    <div class="grid grid-flow-row-dense grid-cols-1 grid-rows-3">
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomEmail">Fatura Adresi</label>
                                            <input id="validationCustomUsername" class="input form-control"  name="invoice_address" value="{{old('invoice_address',$company->invoice_address)}}"  />
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">Sevkiyat Adresi</label>
                                            <input id="validationCustomUsername" class="input form-control"  name="shipping_address" value="{{old('shipping_address',$company->shipping_address)}}"  />
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">İade Adresi</label>
                                            <input id="validationCustomUsername" class="input form-control"  name="return_address" value="{{old('return_address',$company->return_address)}}"  />
                                        </div>
                                    </div>
                                    <div class="grid grid-flow-row-dense grid-cols-3 grid-rows-1">
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomEmail">Slider Ölçüsü</label>
                                            <select id="slider_size" name="slider_size" class="input form-control">
                                                <option value="1920*600" {{ old('slider_size', $company->slider_size) == '1920*600' ? 'selected' : '' }}>Full-Width - 1920*600</option>
                                                <option value="1920*800" {{ old('slider_size', $company->slider_size) == '1920*800' ? 'selected' : '' }}>Full-Width - 1920*800</option>
                                                <option value="1200*400" {{ old('slider_size', $company->slider_size) == '1200*400' ? 'selected' : '' }}>Standart - 1200*400</option>
                                                <option value="1200*600" {{ old('slider_size', $company->slider_size) == '1200*600' ? 'selected' : '' }}>Standart - 1200*600</option>
                                            </select>

                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomEmail">Ürün Ölçüsü</label>
                                            <select id="validationCustomEmail" name="product_size" class="input form-control">
                                                <option {{ old('product_size', $company->product_size) == '1000*1000' ? 'selected' : '' }} value="1000*1000">1000*1000</option>
                                                <option {{ old('product_size', $company->product_size) == '1200*1200' ? 'selected' : '' }} value="1200*1200">1200*1200</option>
                                                <option {{ old('product_size', $company->product_size) == '2000*2000' ? 'selected' : '' }} value="2000*2000">2000*2000</option>
                                                <option {{ old('product_size', $company->product_size) == '800*600' ? 'selected' : '' }} value="800*600">800*600</option>
                                            </select>
                                        </div>
                                        <div class="p-4">
                                            <label class="form-label mb-2" for="validationCustomUsername">Lisans Süresi</label>
                                            <select id="validationCustomEmail" name="licence_finish" class="input form-control">
                                                <option {{ old('licence_finish', $company->licence_finish) == '1' ? 'selected' : '' }} value="1">1</option>
                                                <option {{ old('licence_finish', $company->licence_finish) == '2' ? 'selected' : '' }} value="2">2</option>
                                                <option {{ old('licence_finish', $company->licence_finish) == '3' ? 'selected' : '' }} value="3">3</option>
                                                <option {{ old('licence_finish', $company->licence_finish) == '4' ? 'selected' : '' }} value="4">4</option>
                                                <option {{ old('licence_finish', $company->licence_finish) == '5' ? 'selected' : '' }} value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-item vertical">
                                        <div>
                                            <button class="btn btn-solid float-right">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                <div class="ml-5 card adaptable-card">
                    <div class="card-body">
                        <div class="overflow-x-auto">
                            <table class="table-default table-hover">
                            <thead>
                              <tr>
                                  <td>Firma Adı</td>
                                  <td>Lisans Başlangıç</td>
                                  <td>Lisans Bitiş</td>
                                  <td>İşlem</td>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->title}}</td>
                                    <td>{{\Carbon\Carbon::parse($company->created_at)->format('d-m-Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($company->created_at)->addYears($company->licence_finish)->format('d-m-Y')}}</td>
                                    <td><a href="{{route('supervisor.edit',['id' => $company->id])}}">Düzenle</a></td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('customCSS')
    <style>
        .info-card-wrapper  {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #f1f2f7;
            border-radius: 6px 6px 0 0;
        }
        .alert {
            position: relative;
            margin-bottom: 1rem;
            display: flex;
            border-radius: 0.5rem;
            padding: 1rem;
            font-weight: 600;
            border: 1px solid #0095ff;
            font-size: 12px;
        }
    </style>
@endsection
@section('customJS')
    <script type="module" src="{{asset('admin/ecommerceSetting.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/oeyw4fczbgzgtessykwa9j2ow3stvtz54fnla42oahw3aosa/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
    <script>
        (function () {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
