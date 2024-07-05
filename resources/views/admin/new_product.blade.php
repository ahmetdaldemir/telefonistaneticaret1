@extends('layout.admin.admin')

@section('content')
    <main class="h-full">
        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="container mx-auto">
                <h3 class="mb-4">Yeni Urun Ekle</h3>
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input value="@if(isset($product->id)) {{$product->id}}@else 0 @endif" name="id" type="hidden">
                    <input type="hidden" id="productBrand" value="{{ isset($product) ? $product->brand : 0 }}">
                    <input type="hidden" id="productModel" value="{{ isset($product) ? $product->version : 0 }}">

                    <div class="form-container vertical">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                            <div class="lg:col-span-2">
                                <div class="card adaptable-card !border-b pb-6 py-4 rounded-br-none rounded-bl-none">
                                    <div class="card-body">
                                        <h5>Urun Bilgileri</h5>
                                        <p class="mb-6">Urune Ait Temel Bilgiler</p>
                                        <div class="form-item vertical">
                                            <label class="form-label mb-2">Urun Adi</label>
                                            <div>
                                                <input class="input"
                                                       value="@if(isset($product)) {{$product->name}} @endif"
                                                       type="text" name="name" autocomplete="off" placeholder="Urun Adi"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="form-item vertical">
                                            <label class="form-label mb-2">Stok Kodu</label>
                                            <input class="input" type="text" name="productCode" autocomplete="off"
                                                   placeholder="Code"
                                                   value="@if(isset($product)){{$product->productCode}}@endif">
                                        </div>
                                        <div class="form-item vertical">
                                            <label class="form-label mb-2">Aciklama</label>
                                            <textarea name="description">@if(isset($product))
                                                    {{$product->description}}
                                                @endif</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card adaptable-card !border-b pb-6 py-4 rounded-br-none rounded-bl-none">
                                    <div class="card-body">
                                        <h5>Fiyat Bilgileri</h5>
                                        <p class="mb-6">Urun Fiyat Bilgileri</p>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="col-span-1">
                                                <div class="form-item vertical">
                                                    <label class="form-label mb-2">SKT(<small>Son Kullanma
                                                            Tarihi</small>)</label>
                                                    <div>
                                                        <input class="input" type="text" name="exp" autocomplete="off"  placeholder="Stock" value="@if(isset($product)) {{$product->exp}} @else 0 @endif" inputmode="numeric">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-1">
                                                <div class="form-item vertical">
                                                    <label class="form-label mb-2">Fiyat</label>
                                                    <div>
                                                        <span class="input-wrapper undefined">
                                                            <div class="input-suffix-start">₺</div>
                                                            <input class="input pl-8" type="text" name="price" autocomplete="off" placeholder="Price"
                                                                   value="@if(isset($product)){{$product->price}}@else 0 @endif"
                                                                   inputmode="numeric">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="col-span-1">
                                                <div class="form-item vertical">
                                                    <label class="form-label mb-2">Stok</label>
                                                    <div>
                                                        <span class="input-wrapper undefined">
                                                            <input class="input pl-8" type="text" name="stock"
                                                                   autocomplete="off" placeholder="Adet"
                                                                   value="@if(isset($product)){{$product->stock}}@else 0 @endif"
                                                                   inputmode="numeric">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-1">
                                                <div class="form-item vertical">
                                                    <label class="form-label mb-2">Indirimli Fiyat</label>
                                                    <div>
                                                        <span class="input-wrapper undefined">
                                                            <div class="input-suffix-start">₺</div>
                                                            <input class="input pl-8" type="text"
                                                                   name="bulkDiscountPrice" autocomplete="off"
                                                                   value="@if(isset($product)){{$product->bulkDiscountPrice}}@else 0 @endif"
                                                                   inputmode="numeric">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-1">
                                                <div class="form-item vertical">
                                                    <label class="form-label mb-2">KDV(%)</label>
                                                    <div>
                                                        <input class="input" type="text" name="taxRate"
                                                               autocomplete="off" placeholder="Tax Rate"
                                                               value="@if(isset($product)){{$product->taxRate}}@else 20 @endif"
                                                               inputmode="numeric">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card adaptable-card pb-6 py-4 ">
                                    <div class="card-body">
                                        <h5>Listelenme Bilgileri</h5>
                                        <p class="mb-6">Urune ait kategor marka model</p>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="col-span-1">
                                                <div class="form-item vertical">
                                                    <label class="form-label mb-2">Kategori</label>
                                                    <div>
                                                        <select class="input" name="category">
                                                            @foreach($categories as $item)
                                                                <option value="{{$item->id}}"
                                                                        @if(isset($product) && $item->category == $product->category) selected @endif>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-1">
                                                <div class="form-item vertical">
                                                    <label class="form-label mb-2">Marka</label>
                                                    <div>
                                                        <select class="input" id="brand" name="brand">
                                                            <option>Seciniz</option>
                                                            @foreach($brands as $item)
                                                                <option value="{{$item->id}}" @if(isset($product) && $item->id == $product->brand) selected @endif oninput="getModel({{ isset($product) ? $product->brand : 0 }}, {{ isset($product) ? $product->version : 0 }})">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="col-span-1">
                                                <div class="form-item vertical">
                                                    <label class="form-label mb-2">Etiketler</label>
                                                    <div>
                                                        <input class="input" type="text" name="tags"
                                                               value="@if(isset($product)) {{$product->tags}} @endif"
                                                               autocomplete="off" placeholder="Etiketler">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-1">
                                                <div class="form-item vertical">
                                                    <label class="form-label mb-2">Model</label>
                                                    <div>
                                                        <select class="input" id="model" name="version" ></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <div class="card adaptable-card mb-4">
                                    <div class="card-body">
                                        <h5>Urun Resimleri</h5>
                                        <p class="mb-6">Oncelikle varsayilan resim yukleyiniz</p>
                                        <div class="form-item vertical">
                                            <label class="form-label"></label>
                                            <div>
                                                <div class="upload upload-draggable hover:border-primary-600">
                                                    <input class="upload-input draggable" type="file" title=""  name="img" value="">
                                                    <div class="my-16 text-center">
                                                        <img src="img/others/upload.png" alt="" class="mx-auto">
                                                        <p class="font-semibold">
                                                            <span class="text-gray-800 dark:text-white">Varsayilan Fotograf</span>
                                                            <span class="text-blue-500">browse</span>
                                                        </p>
                                                        <p class="mt-1 opacity-60 dark:text-white">Desteklenen: jpeg,png</p>
                                                    </div>
                                                </div>
                                                <div class="form-item vertical"><label class="form-label"></label>
                                                    <div class="">
                                                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3 gap-4">

                                                            <div class="group relative rounded border p-2 flex">
                                                                   <img  class="rounded max-h-[140px] max-w-full"  src="@if(isset($product))  {{$product->img}} @else {{asset('admin/img/others/upload.png')}} @endif" alt="image-2">
                                                                  <div  class="absolute inset-2 bg-gray-900/[.7] group-hover:flex hidden text-xl items-center justify-center">
                                                                </div>
                                                            </div>

                                                            <?php if(isset($product) && !empty($product->imgList)){  foreach ($product->imgList as $imgItem) {?>
                                                            <div class="group relative rounded border p-2 flex">
                                                                <img  class="rounded max-h-[140px] max-w-full" src="{{asset('storage/images/' . $imgItem)}}" alt="image-2">
                                                                <div  class="absolute inset-2 bg-gray-900/[.7] group-hover:flex hidden text-xl items-center justify-center">
                                                                </div>
                                                            </div>
                                                            <?php }} ?>
                                                            <div class="upload upload-draggable hover:border-indigo-600 min-h-fit">
                                                                <input class="upload-input draggable" type="file"  name="imgList[]" value="" multiple>
                                                                <div class="max-w-full flex flex-col px-4 py-2 justify-center items-center">
                                                                    <img src="/img/others/upload.png" alt="">
                                                                    <p class="font-semibold text-center text-gray-800 dark:text-white">Diger Fotograflar</p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5>Urun Ayarlari</h5>
                                        <div class="form-item vertical">
                                            <label class="form-label"></label>
                                            <div>
                                                <label class="checkbox-label">
                                                    <input class="checkbox" type="checkbox" value="true" name="bundle" @if(isset($product) && $item->bundle == 1) checked @endif>
                                                    <span>Bundle</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5>Urun Ozellikleri</h5>
                                        <div class="form-item vertical">
                                            <label class="form-label"></label>
                                            <div class="grid grid-cols-6 gap-4">
                                                @foreach($attributeGroups as $attributeGroup)
                                                    <div class="col-start-1 col-end-7">
                                                        <label class="checkbox-label">
                                                            <span>{{$attributeGroup->name}}</span>
                                                        </label>
                                                        <select name="product_attribute[{{$attributeGroup->id}}][attribute_id]"  class="input" style="    float: right;width: 70%;">
                                                            <option value="">Seciniz</option>
                                                            @foreach($attributeGroup->attribute as $item)
                                                                <option value="{{$item->id}}" @if(isset($product) && isset($product->product_attribute) && !empty($product->product_attribute) && isset($product->product_attribute[$attributeGroup->id]) && $item->id == $product->product_attribute[$attributeGroup->id]['attribute_id']) selected @endif>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="stickyFooter"
                             class="sticky -bottom-1 -mx-8 px-8 flex items-center justify-end py-4  dark:bg-gray-800 border-gray-200 dark:border-gray-700">
                            <div class="md:flex items-center">
                                <a href="{{route('product.index')}}" class="btn btn-default btn-sm ltr:mr-2 rtl:ml-2" type="button">Kapat</a>
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
    </main>

@endsection

@section('customJS')
    <script src="{{asset('admin/product.js')}}"></script>
    <script src="{{asset('vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('js/pages/new-product.js')}}"></script>

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/oj6zyoqfb6eqi7142vqs78p5k23x3vdo28svzv867z9cd3fu/tinymce/7/tinymce.min.js"  referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
    <script src="{{asset('admin/js/bootstrap-tagsinput.js')}}"></script>

    <script>
        // Required For Bootstrap 5 & 4
        $('#tags').tagsinput({
            tagClass: 'badge bg-info',
        });

    </script>
@endsection
