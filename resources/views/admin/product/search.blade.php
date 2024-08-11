<div class="product-listing-top-view">
    <div>
        <ul class="tabs-container">
            <li class="tab-container selected">
                <div class="content" disabled="false">
                    <a class="title"><a href="{{route('product.index')}}">Tüm Ürünler</a></p>
                    <p class="caption">{{$count->count()}} Ürün(ler)</p>
                </div>
            </li>
            <li class="tab-container">
                <div class="content" disabled="false">
                    <p class="title">Aktif Ürünler</p>
                    <p class="caption">{{$count->where('status',1)->count()}} Ürün(ler)</p>
                </div>
            </li>
            <li class="tab-container">
                <div class="content" disabled="false">
                    <p class="title">Pasif Ürünler</p>
                    <p class="caption">{{$count->where('status',0)->count()}} Ürün(ler)</p>
                </div>
            </li>
        </ul>
        <div class="content"></div>
    </div>
    <div class="filter">
        <form action="{{route('product.index')}}">
            @csrf
            <div class="product-listing">
                <div class="product-listing__action-filter">
                    <div class="product-listing__action-filter__row">
                        <div class="grid grid-cols-4 gap-4">
                            <input class="input p-4 rounded-md text-left font-semibold shadow-lg" name="barcode" type="text" value="{{ old('barcode') }}"  placeholder="Barkod" label="Barkod"/>
                            <input class="input p-4 rounded-md text-left font-semibold shadow-lg" name="name" type="text" value="{{ old('name') }}"  placeholder="Ürün Adı" label="Ürün Adı"/>
                            <input class="input p-4 rounded-md text-left font-semibold shadow-lg" name="modelcode" type="text" value="{{ old('modelcode') }}"  placeholder="Model Kodu" label="Model Kodu"/>
                            <input class="input p-4 rounded-md text-left font-semibold shadow-lg" name="stockcode" type="text" value="{{ old('stockcode') }}"    placeholder="Stok Kodu" label="Stok Kodu"/>
                        </div>
                    </div>
                    <div class="product-listing__action-filter__row--category">
                        <div class="grid grid-cols-4 gap-4 mt-2">
                        <div class="select-box">
                            <div>
                                <div class="select-box__input">
                                    <label class="select-box__input--label">Kategori</label>
                                    <div>
                                        <select id="categories" name="categories"  class="form-control select2 product-categories">
                                            <!-- Trendyol kategorileri buraya gelecek -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="select-box">
                            <div>
                                <div class="select-box__input">
                                    <label class="select-box__input--label">Marka</label>
                                    <div class="select-box__selected-options">
                                        <select class="form-control select2" id="brand" name="brand">
                                            <option value="">Seçiniz</option>
                                            @foreach($brands as $item)
                                                <option value="{{$item->id}}"
                                                        @if(isset($product) && $item->id == $product->brand) selected
                                                        @endif oninput="getModel({{ isset($product) ? $product->brand : 0 }}, {{ isset($product) ? $product->version : 0 }})">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-listing__button-handler mt-2">
                                <div class="product-listing__button-handler__row mt-3">
                                    <button class="btn btn-sm btn-two-tune">Temizle</button>
                                    <button class="btn btn-sm btn-solid w-50">Filtrele</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

