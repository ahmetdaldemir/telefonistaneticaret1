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
                        <div class="overflow-x-auto">
                            <table   class="table-default table-hover">
                                <thead>
                                <tr>
                                    <th style="font-size:12px;width: 5%" class="text-center">Barcode</th>
                                    <th style="font-size:12px;width: 41%" class="text-center">Urun Adi</th>
                                    <th style="font-size:12px;width: 10%" class="text-center">Model K</th>
                                    <th style="font-size:12px;width: 10%" class="text-center">PSF </th>
                                    <th style="font-size:12px;width: 10%" class="text-center">İndirimli Fiyat</th>
                                    <th style="font-size:12px;width: 2%" class="text-center">Durum/Adet</th>
                                    <th style="font-size:12px;width: 3%" class="text-center">Kargo Bedava</th>
                                    <th style="font-size:12px;width: 3%" class="text-center">Bundle</th>
                                    <th style="font-size:12px;width: 3%" class="text-center">Desi</th>
                                    <th style="font-size:12px;width: 3%" class="text-center">G. Süresi</th>
                                    <th style="font-size:12px;width: 10%" class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr style="font-size: 12px">
                                        <td style="font-size: 12px">
                                            <label class="checkbox-label">
                                                <input id="product_id"  name="product_id"  class="checkbox" type="checkbox" value="{{$product->id}}">
                                            </label>
                                            {{$product->product->barcode}}
                                        </td>

                                        <td>
                                            <div class="flex items-center"><span
                                                        class="avatar avatar-rounded avatar-xs"><img
                                                            class="avatar-img avatar-rounded"
                                                            src="{{ $product->images->isNotEmpty() ? $product->images[0]->image : asset('admin/img/others/upload.png') }}"
                                                            loading="lazy"></span><span
                                                        class="ml-2 rtl:mr-2 font-semibold">{{$product->product->name}}</span>
                                            </div>
                                        </td>
                                        <td><b class="text-blue-500">{{$product->stock_code}}</b></td>
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
                                            <div class="flex justify-end text-lg">

                                            <span class="cursor-pointer p-2 hover:text-red-500">
                                                <a href="{{route('product.edit',['id' => $product->id])}}">
                                                 <svg stroke="currentColor" fill="none" stroke-width="2"
                                                      viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em"
                                                      xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                </svg>
                                                    </a>
                                            </span>
                                                <span class="cursor-pointer p-2 hover:text-red-500">
                                                <a href="{{route('product.delete',['id' => $product->id])}}">
                                                <svg stroke="currentColor" fill="none" stroke-width="2"
                                                     viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                    </a>
                                            </span>
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