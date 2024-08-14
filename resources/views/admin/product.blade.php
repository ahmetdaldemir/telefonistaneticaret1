@extends('layout.admin.admin')

@section('content')
         <div class="subbanner alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
            <div class="alert-content">
                <div>
                    <h3>Ürün Listesi</h3>
                </div>
                <div slot="left">
                    <div class="listing-limit-bar limit-info">
                        <div class="container"><p class="title">Ürün Limit Seviyesi</p>
                            <p>Seviye 1</p>
                        </div>
                        <div class="divider"></div>
                        <div class="container"><p class="title">Ürün Adeti</p>
                            <p class="supplier-limit-info"><span class="">{{$count->count()}}</span><span>/</span><span>50000</span></p></div>
                    </div>
                </div>
            </div>
            <div slot="right" class="float-right">
                <div class="grid grid-cols-4 gap-4">
                    <a href="{{route('product.create')}}" class="btn btn-sm bg-emerald-500 text-center text-white">Yeni Ürün Ekle</a>
                    <button class="btn btn-sm btn-solid text-white">Sanal Pazar Ürünleri</button>
                    <button onclick="priceStockUpdate()" class="btn btn-sm bg-orange-500 text-white">Toplu Fiyat Güncelleme</button>
                    <a href="{{route('product.index',['bestSeller'=> true])}}" class="btn btn-sm bg-rose-600 text-white">En Çok Satılanlar</a>
                </div>
            </div>
        </div>

        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div  class="export-info__container">
                <div  class="export-info__wrapper"><img  src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product-listing/assets/micro_export_world_icon.svg">
                    <div ><p class="export-info__header-text"> Mikro İhracata Açacağınız Ürünler Var! </p>
                        <p class="export-info__body-text"> Ürünlerinizi tek tıkla Mikro İhracata açarak birçok ülkede satışa başlayabilirsiniz. </p></div>
                </div>
            </div>
            @include('admin.product.search')
            <div class="container mx-auto">
                <div class="card adaptable-card">
                    <div class="card-body productList">
                        <div class="table-container">
                            <table   class="table-default table-hover">
                                <thead>
                                <tr>
                                     <th style="font-size:12px;" class="text-center">#</th>
                                     <th style="font-size:12px;" class="text-center">Urun Bilgisi</th>
                                    <th style="font-size:12px;" class="text-center">Marka</th>
                                    <th style="font-size:12px;" class="text-center">Kategori</th>
                                    <th style="font-size:12px;" class="text-center">PSF </th>
                                    <th style="font-size:12px;" class="text-center">İndirimli Fiyat</th>
                                    <th style="font-size:12px;" class="text-center">Durum/Adet</th>
                                    <th style="font-size:12px;" class="text-center">Kargo Bedava</th>
                                    <th style="font-size:12px;" class="text-center">Bundle</th>
                                    <th style="font-size:12px;" class="text-center">Desi</th>
                                    <th style="font-size:12px;" class="text-center">G. Süresi</th>
                                    <th style="font-size:12px;" class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr style="font-size: 12px">
                                        <td class="text-center">
                                            <label class="checkbox-label">
                                                <input id="product_id"  name="product_id"  class="checkbox" type="checkbox" value="{{$product->id}}">
                                            </label>
                                        </td>
                                        <td>

                                            <div class="grid grid-rows-1 grid-flow-col gap-1">

                                                <div class="row-span-3" style="display: flex;flex-direction: column;flex-wrap: nowrap;justify-content: space-around;">
                                                      <span class="avatar avatar-rounded avatar-lg">
                                                         <img class="avatar-img avatar-rounded"  src="{{ $product->images->isNotEmpty() ? $product->images[0]->image : asset('admin/img/others/upload.png') }}" loading="lazy">

                                                </span>
                                                </div>
                                                <div class="col-span-1 row-span-1"><span class="font-semibold">{{$product->product->name}}</span>
                                                </div>
                                                <div class="row-span-2 col-span-2" style="display: flex;flex-direction: column;">

                                                    <span class="grid grid-flow-col auto-cols-max">Stok Kodu:8683140727468
                                                     <svg   data-bs-toggle="tooltip" data-bs-title="Kopyala" data-bs-placement="right" width="12" height="12" class="ml-3 cursor-pointer  outline-none"  style="    float: right;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3C0 1.34315 1.34315 0 3 0H14C15.6569 0 17 1.34315 17 3V5H8C6.34315 5 5 6.34315 5 8V17H3C1.34315 17 0 15.6569 0 14V3ZM10 7C8.34315 7 7 8.34315 7 10V21C7 22.6569 8.34314 24 10 24H19.0083H21C22.6569 24 24 22.6569 24 21V10C24 8.34315 22.6569 7 21 7H10Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>

                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center"><b class="text-blue-500">{{$product->product->brandModel->name}}</b></td>
                                        <td class="text-center"><b class="text-blue-500">{{$product->product->categoryModel->name}}</b></td>
                                        <td>
                                            <span class="text-red-500">{{$product->retail_price}} ₺</span>
                                        </td>
                                        <td>
                                            <span class="text-red-500">{{$product->price}} ₺</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="flex items-center gap-2" style="font-size: 12px;">
                                                <label class="switcher">
                                                    <input type="checkbox" class="productStatus" data-id="{{$product->id}}" data-is_active="{{$product->is_active}}"  @if($product->is_active) checked @endif>
                                                    <span class="switcher-toggle"></span>
                                                </label> /
                                                    <span class="capitalize font-semibold">{{$product->quantity}}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <label class="checkbox-label">
                                                <input title="Ayın Ürünü" id="mounthdeal" data-id="{{$product->id}}"
                                                       data-bs-toggle="tooltip" data-bs-title="Ayın Ürünü"
                                                       class="checkbox" type="checkbox" value="true"
                                                       @if($product->mountlydeal) data-status="1" checked
                                                       @else data-status="0" @endif>
                                            </label>

                                        </td>
                                        <td class="text-center">
                                            <label class="checkbox-label">
                                                <input title="Kargo Bedava Urunler " id="freeShipping"
                                                       data-id="{{$product->id}}" data-bs-toggle="tooltip"
                                                       data-bs-title="Kargo Bedava Urun" class="checkbox"
                                                       type="checkbox" value="true"
                                                       @if($product->freeShipping) data-status="1" checked
                                                       @else data-status="0" @endif>
                                            </label>
                                        </td>
                                        <td class="text-center">{{$product->product->desi}}</td>
                                        <td class="text-center">{{$product->product->delivery_time}}</td>
                                        <td>

                                            <div class="grid grid-flow-row auto-rows-max">
                                                <button class="btn m-4 btn-xs bg-orange-500 hover:bg-orange-400 active:bg-orange-600 text-white" size="small"> Detaya Git </button>
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <span class="flex items-center cursor-pointer dropdownInSpan" style="justify-content: center">
                                                        <span>İşlemler</span>
                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                    </div>
                                                    <ul class="dropdown-menu">
                                                        <li class="menu-item">
                                                            <a href="{{route('product.delete',['id' => $product->id])}}">Ürünü Sil</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="{{route('product.edit',['id' => $product->id])}}">Ürünü Düzenle</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Ürün Performansını Görüntüle</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Ürünü Kopyala</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

        @include('admin.product.updatemodal')
 @endsection

@section('customJS')
    <script src="{{asset('admin/product.js?v=').rand(0,99999)}}"></script>
@endsection
@section('customCSS')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/search.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/table.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/product.css')}}"/>
@endsection