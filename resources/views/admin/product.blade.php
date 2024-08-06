@extends('layout.admin.admin')

@section('content')
    <main class="h-full">
        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="container mx-auto">
                <div class="card adaptable-card">
                    <div class="card-body">
                        <div class="lg:flex items-center justify-between mb-4">
                            <h3 class="mb-4 lg:mb-0">Urunler</h3>
                            <span class="flex items-center justify-center gap-2">
                                    <span>Ayın Fırsatı</span>
                                </span>
                            <a class="btn btn-two-tune btn-sm" href="{{route('product.create')}}">
                                <span class="flex items-center justify-center gap-2">
                                    <span class="text-lg">
                                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                             aria-hidden="true" height="1em" width="1em"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </span>
                                    <span>Yeni Urun</span>
                                </span>
                            </a>
                        </div>
                        <div class="overflow-x-auto">
                            <table id="product-list-data-table" class="table-default table-hover data-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Urun Adi</th>
                                    <th>Fiyat</th>
                                    <th>I. Fiyat</th>
                                    <th>Status</th>
                                    <th>Ayarlar</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                         <td>{{$product->product->id}}</td>

                                        <td>
                                            <div class="flex items-center"><span class="avatar avatar-rounded avatar-md"><img class="avatar-img avatar-rounded" src="{{ $product->images->isNotEmpty() ? $product->images[0]->image : asset('admin/img/others/upload.png') }}" loading="lazy"></span><span class="ml-2 rtl:mr-2 font-semibold">{{$product->name}}</></div>
                                        </td>
                                        <td>
                                            <span>{{$product->retail_price}} ₺</span>
                                        </td>
                                        <td>
                                            <span>{{$product->price}} ₺</span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2">
                                                <span class="badge-dot bg-emerald-500"></span>
                                                <span class="capitalize font-semibold text-emerald-500">{{$product->stock}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="checkbox-label">
                                                <input title="Ayın Ürünü" id="mounthdeal" data-id="{{$product->product->id}}"
                                                       data-bs-toggle="tooltip" data-bs-title="Ayın Ürünü"
                                                       class="checkbox" type="checkbox" value="true"
                                                       @if($product->mountlydeal) data-status="1" checked
                                                       @else data-status="0" @endif>
                                            </label>
                                            <label class="checkbox-label">
                                                <input title="Kargo Bedava Urunler " id="freeShipping"
                                                       data-id="{{$product->product->id}}" data-bs-toggle="tooltip"
                                                       data-bs-title="Kargo Bedava Urun" class="checkbox"
                                                       type="checkbox" value="true"
                                                       @if($product->freeShipping) data-status="1" checked
                                                       @else data-status="0" @endif>
                                            </label>
                                        </td>
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
                </div>
            </div>
        </div>
    </main>

@endsection

@section('customJS')
    <script src="{{asset('admin/product.js')}}"></script>
@endsection
