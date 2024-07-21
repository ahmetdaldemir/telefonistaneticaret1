@extends('layout.admin.admin')

@section('content')
    <style>
        .category-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
        }

        .select2-container {
            width: 100% !important; /* Genişliği ayarlar */
        }

        .select2-selection {
            height: auto !important; /* Yüksekliği otomatik yapar */
            min-height: 34px; /* Minimum yüksekliği belirler */
        }
    </style>

    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="flex flex-col gap-4">
            <h3 class="mb-4">Yeni Urun Ekle</h3>

            <div data-v-2b03f412="" class="product-banner"
                 style="background: linear-gradient(109deg, rgb(194, 10, 121) 0%, rgb(255, 170, 0) 100%);">
                <div class="product-banner__wrapper">
                    <div>
                        <div data-v-1dc67076="" data-v-7fd4b0aa=""
                             class="g-image product-banner__image" alt="">
                            <img data-v-1dc67076="" alt=""
                                 src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/product-desc-icon.svg">
                        </div>
                    </div>
                    <div class="product-banner__info">
                        <p class="product-banner__info--title"> Ürün
                            Açıklaması </p>
                        <p class="product-banner__info--desc"> Ürün açıklamasını detaylandırarak
                            müşteriye daha fazla bilgi verebilir, satış adedinizi ve ürün değerlendirmelerinizi
                            artırarak
                            iade oranınızı iyileştirebilirsiniz. </p></div>
                </div>
            </div>
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input value="@if(isset($product->id)) {{$product->id}}@else 0 @endif" name="id" type="hidden">
                <input type="hidden" id="productBrand" value="{{ isset($product) ? $product->brand : 0 }}">
                <input type="hidden" id="productModel" value="{{ isset($product) ? $product->version : 0 }}">

                <div class="form-container vertical">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div class="lg:col-span-3">
                            <div class="card adaptable-card !border-b pb-6 py-4 rounded-br-none rounded-bl-none">
                                <div class="card-body">
                                    <h5>Urun Bilgileri</h5>
                                    <p class="mb-6">Urune Ait Temel Bilgiler</p>
                                    <div class="form-item vertical">
                                        <label class="form-label mb-2">Urun Adi</label>
                                        <div>
                                            <input class="input"  type="text" name="name" value="{{old('name')}}"  autocomplete="off" placeholder="Urun Adi" required>
                                        </div>
                                    </div>
                                    <div class="form-item vertical">
                                        <label class="form-label mb-2">Kategori</label>
                                        <div>
                                            <select id="categories" name="categories" class="form-control select2 product-categories" required>
                                                <!-- Trendyol kategorileri buraya gelecek -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-item vertical">
                                        <label class="form-label mb-2">Model Kodu</label>
                                        <input class="input" type="text" name="modelcode" autocomplete="off"
                                               placeholder="Model Kodu Giriniz"  value="{{old('modelcode')}}" >
                                    </div>
                                    <div class="form-item vertical">
                                        <label class="form-label mb-2">Barkod</label>
                                        <input class="input" type="text" name="barcode" autocomplete="off" placeholder="Barkod Giriniz"  value="{{old('barcode')}}" >
                                    </div>
                                    <div class="form-item vertical">
                                        <label class="form-label mb-2">Marka</label>
                                        <select class="input" id="brand" name="brand">
                                            <option>Seciniz</option>
                                            @foreach($brands as $item)
                                                <option value="{{$item->id}}"
                                                        @if(isset($product) && $item->id == $product->brand) selected
                                                        @endif oninput="getModel({{ isset($product) ? $product->brand : 0 }}, {{ isset($product) ? $product->version : 0 }})">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-item vertical" id="required-true">
                                        <!-- Javascript İle Güncellenecek --></div>

                                    <div class="form-item vertical">
                                        <label class="form-label mb-2">Aciklama</label>
                                        <textarea name="description">@if(isset($product))
                                                {{$product->description}}
                                            @endif</textarea>
                                    </div>


                                    <div class="form-item vertical">
                                        <label class="form-label mb-2">Etiketler</label>
                                        <div>
                                            <input  data-role="tagsinput"  class="input" type="text"   name="tags" value="@if(isset($product)) {{$product->tags}} @endif" autocomplete="off" placeholder="Etiketler">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="lg:col-span-3">
                            <div data-v-2b03f412="" class="product-banner"
                                 style="background:linear-gradient(90deg, rgb(35, 114, 231) 0%, rgb(25, 81, 164) 100%)">
                                <div class="product-banner__wrapper">
                                    <div>
                                        <div data-v-1dc67076="" data-v-7fd4b0aa=""
                                             class="g-image product-banner__image" alt="">
                                            <img data-v-1dc67076="" alt=""
                                                 src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/product-desc-icon.svg">
                                        </div>
                                    </div>
                                    <div class="product-banner__info">
                                        <p class="product-banner__info--title"> Ürün Özellikleri</p>
                                        <p class="product-banner__info--desc"> Ürün açıklamasını detaylandırarak
                                            müşteriye daha fazla bilgi verebilir, satış adedinizi ve ürün
                                            değerlendirmelerinizi artırarak iade oranınızı iyileştirebilirsiniz. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-3">
                            <div class="card adaptable-card mb-4">
                                <div class="card-body">
                                    <h5>Satış ve Varyant Bilgileri</h5>
                                    <div class="form-item vertical">
                                        <div id="category-details"></div>
                                        <div id="required-true-preview" class="flex-container required-false-preview-category">
                                            <div class="g-image" alt="hourglass loader">
                                                <img data-v-1dc67076="" alt="hourglass loader" src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/hourglass_loader.svg">
                                            </div>
                                            <span class="sub-title"> Kategori Seçimi </span>
                                            <p class="description"> Satış ve Varyant bilgilerini doldurmak için öncelikle bir kategori seçin. </p>
                                            <button class="g-button -primary">
                                                <div class="content -medium">Kategori Seç</div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-3">
                            <div data-v-2b03f412="" class="product-banner"
                                 style="background: linear-gradient(134deg, rgb(117, 62, 255) 0%, rgb(40, 118, 255) 97.57%);">
                                <div class="product-banner__wrapper">
                                    <div>
                                        <div data-v-1dc67076="" data-v-7fd4b0aa="" class="g-image product-banner__image"
                                             alt="">
                                            <img data-v-1dc67076="" alt=""
                                                 src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/product-image-icon.svg">
                                        </div>
                                    </div>
                                    <div class="product-banner__info">
                                        <p class="product-banner__info--title"> Ürün Görselleri </p>
                                        <p class="product-banner__info--desc"> Görsel sayısı fazla
                                            olan ürünler müşterilerin daha çok ilgisini çekmektedir, ürünlerinize görsel
                                            yükleyerek içeriğinizi zenginleştirebilir ve ilgili üründe satış
                                            oranlarınızı artırabilirsiniz. </p></div>
                                </div>
                                <div>
                                    <button class="g-mt-8 product-banner__button g-button -fluid -secondary -outline">
                                        <div class="content -big"> Detaylı Bilgi</div>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-3">
                            <div class="card adaptable-card mb-4">
                                <div class="card-body">
                                    <h5>Ürün Özellikleri</h5>
                                    <div class="form-item vertical">
                                        <div id="required-false" class="grid grid-cols-1 md:grid-cols-2 gap-4"></div>
                                        <div class="flex-container required-false-preview text-center">
                                            <div class="g-image" style="margin: 0 auto" alt="hourglass loader">
                                                <img alt="hourglass loader"
                                                     src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/hourglass_loader.svg">
                                            </div>
                                            <span class="sub-title"> Kategori Seçimi </span>
                                            <p class="description"> Satış ve Varyant bilgilerini
                                                doldurmak için öncelikle bir kategori seçin. </p>
                                            <button class="g-button -primary">
                                                <div class="content -medium">Kategori Seç</div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="lg:col-span-3">
                            <div class="card adaptable-card mb-4">

                                <div class="card-body">
                                    <h5>Ürün Ayarları</h5>
                                    <div class="form-item vertical">
                                        <label class="form-label"></label>
                                        <div>
                                            <label class="checkbox-label">
                                                <input class="checkbox" type="checkbox" value="true" name="bundle"  @if(isset($product) && $item->bundle == 1) checked @endif>
                                                <span>Bundle</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-item vertical">
                                        <label class="form-label"></label>
                                        <div>
                                            <label class="checkbox-label">
                                                <input class="checkbox" type="checkbox" value="true" name="bundle"  @if(isset($product) && $item->bundle == 1) checked @endif>
                                                <span>KArgo Bedava</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="stickyFooter"
                         class="sticky -bottom-1 -mx-8 px-8 flex items-center justify-end py-4  dark:bg-gray-800 border-gray-200 dark:border-gray-700">
                        <div class="md:flex items-center">
                            <a href="{{route('product.index')}}" class="btn btn-default btn-sm ltr:mr-2 rtl:ml-2"
                               type="button">Kapat</a>
                            <button class="btn btn-solid btn-sm" type="submit">
                                    <span class="flex items-center justify-center">
                                        <span class="text-lg">
                                            <svg stroke="currentColor" fill="currentColor"
                                                 stroke-width="0" viewBox="0 0 1024 1024"
                                                 height="1em" width="1em"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M893.3 293.3L730.7 130.7c-7.5-7.5-16.7-13-26.7-16V112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V338.5c0-17-6.7-33.2-18.7-45.2zM384 184h256v104H384V184zm456 656H184V184h136v136c0 17.7 14.3 32 32 32h320c17.7 0 32-14.3 32-32V205.8l136 136V840zM512 442c-79.5 0-144 64.5-144 144s64.5 144 144 144 144-64.5 144-144-64.5-144-144-144zm0 224c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80z"></path>
                                            </svg>
                                        </span>
                                        <span class="ltr:ml-1 rtl:mr-1">Save</span>
                                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog dialog md:max-w-[700px]">
            <div class="dialog-content">
                <input type="hidden" name="hiddenImgId" id="hiddenImgId" />
                     <span class="close-btn absolute z-10 ltr:right-6 rtl:left-6" role="button" data-bs-dismiss="modal">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                <h5 class="mb-4">Ürün Görseli Ekle (0 / 8)</h5>
                <input type="file" name="files" data-fileuploader-extensions="jpg, png, gif" data-fileuploader-limit="8" data-upload-url="{{ route('product.image-upload') }}" data-upload-token="{{ csrf_token() }}">
            </div>
        </div>
    </div>

@endsection

@section('customCSS')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">
    <style>
        .fileuploader {
            max-width: 650px;
            margin: 15px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/product.css')}}">
    <style>
        .required-false-preview-hide {
            display: none !important;
        }
    </style>

    <link href="../../dist/font/font-fileuploader.css" rel="stylesheet">

    <!-- styles -->
    <link href="{{asset('admin/fileuploader/jquery.fileuploader.min.css')}}" media="all" rel="stylesheet">
    <link href="{{asset('admin/product/upload.css')}}" media="all" rel="stylesheet">
@endsection
@section('customJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script src="{{asset('admin/fileuploader/jquery.fileuploader.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/product/upload.js')}}" type="text/javascript"></script>

    <script src="{{asset('admin/product.js')}}"></script>
    <script>
        $('#tags').tagsinput({
            confirmKeys: [44,32],
            tagClass: 'badge bg-info',
            allowDuplicates: true,
            cancelConfirmKeysOnEmpty: true

        });
    </script>
    <script src="{{asset('vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('js/pages/new-product.js')}}"></script>

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/oj6zyoqfb6eqi7142vqs78p5k23x3vdo28svzv867z9cd3fu/tinymce/7/tinymce.min.js"
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
        $('body').on('click','.g-image',function () {
             $('#uploadModal').modal('show');
             alert($(this).data('id'));
             $('#uploadModal').find('input#hiddenImgId').val($(this).data('id'));
             localStorage.setItem('setImageDataId', $(this).data('id'));
        })
    </script>



@endsection

