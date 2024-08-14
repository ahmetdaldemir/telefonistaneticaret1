@extends('layout.admin.admin')

@section('content')
    <div class="subbanner alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
        <div class="alert-content">
            <div>
                <h3>Kargo Firmaları / Ayarları</h3>
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
            <div class="card adaptable-card">
                <div class="card-body">

                    <div class="overflow-x-auto">
                        <form class="needs-validation" method="post" action="{{route('shippings.companyStore')}}"
                              enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="id" value="{{$shipping->id}}">
                            <div class="p-4">
                                <label class="form-label mb-2" for="validationCustomEmail">Kargo Ücreti</label>
                                <input
                                        id="validationCustomEmail"
                                        class="input form-control"
                                        value="{{ optional($shipping->companyShipping->first())->price ?? '' }}"
                                        name="price"
                                        type="text">

                            </div>
                            @foreach (json_decode($shipping->settings_fields) as $field)
                                @php
                                    $companyShipping = $shipping->companyShipping->first(); // İlk öğeyi al
                                 @endphp
                                <div class="p-4">
                                    <label for="payload[{{ $field }}]">{{ __(strtr(Str::title(Str::snake($field)), '_', ' ')) }}</label>
                                    <input
                                            class="input form-control"
                                            value="{{ old('payload[' . $field . ']', optional($companyShipping)->payload[$field] ?? '') }}"
                                            name="payload[{{ $field }}]"
                                            id="payload[{{ $field }}]"
                                            type="text"
                                    >
                                </div>
                            @endforeach
                            <div class="form-item vertical">
                                <div>
                                    <button class="btn btn-solid float-right">Kaydet</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJS')
    <script src="{{asset('admin/shippings.js')}}"></script>
@endsection
