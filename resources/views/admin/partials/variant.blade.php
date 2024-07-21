@php
    $rand = rand(999,9999999999);
    if(isset($variants))
    {
        $slicer = array_filter($variants, function($variant) {
            return $variant['slicer'] == true;
        });
        $nonSlicer = array_filter($variants, function($variant) {
            return $variant['slicer'] == false;
        });

        $slicer = array_values($slicer)[0] ?? null;
        $nonSlicer = array_values($nonSlicer)[0] ?? null;
    } else {
        $slicer = null;
        $nonSlicer = null;
    }
@endphp

<div class="g-table-wrapper single-product-table">
    <div class="g-table">
        <table>
            <colgroup>
                <col width="48px">
                <col width="80px">
                <col>
                @if($nonSlicer)
                    <col>
                @endif
                <col width="140px">
                <col width="120px">
                <col width="120px">
                <col width="90px">
                <col width="90px">
                <col width="110px">
                <col width="52px">
            </colgroup>
            <thead>
            <tr>
                <th class="" style="min-width: 48px; max-width: 48px;"></th>
                <th class="" style="min-width: 80px; max-width: 80px;"> Görsel</th>
                @if($slicer)
                    <th class="" style="min-width: 100px; max-width: 100px;">{{ $slicer['name'] }}</th>
                @endif
                @if($nonSlicer)
                    <th class="" style="min-width: 100px; max-width: 100px;">{{ $nonSlicer['name'] }}</th>
                @endif
                <th class="" style="min-width: 140px; max-width: 140px;"> Barkod</th>
                <th class="" style="min-width: 120px; max-width: 120px;">
                    <div class="g-tooltip tooltip-with-link" show-placement="true"> Piyasa Satış Fiyatı <i class="icon-exclamation-circle"></i></div>
                </th>
                <th class="" style="min-width: 120px; max-width: 120px;">Satış Fiyatı</th>
                <th class="" style="min-width: 90px; max-width: 90px;"> Stok</th>
                <th class="" style="min-width: 90px; max-width: 90px;"> KDV</th>
                <th class="" style="min-width: 110px; max-width: 110px;"> Stok Kodu</th>
                <th class="" style="min-width: 52px; max-width: 52px;"> İşlem</th>
            </tr>
            </thead>
            <tbody>
            @if($dataset == 0)
                <tr>
                    <td colspan="11">
                        <div class="not_found">
                            <div class="g-image" alt="empty-table">
                                <img alt="empty-table" src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/single-product-empty-table.svg">
                            </div>
                            <div class="data-table_warning-title"> Henüz hiçbir varyant bulunmuyor.</div>
                            <p> Satış bilgilerini girmek için ürün bilgilerinizi doldurmalısınız. Doldurmanız gereken alanlar:
                                @foreach($variants as $variant)
                                    <a class="scroll-to-content font-weight-bold">{{ $variant['value'] }}</a>
                                @endforeach
                            </p>
                        </div>
                    </td>
                </tr>
            @else
                @if($dataset == 1 && $slicer == null && $nonSlicer == null)
                    <tr>
                        <td rowspan="1">ID</td>
                        <td rowspan="1">
                            <div class="g-tooltip add-media-tooltip">
                                <div class="add-media-container data-table-image">
                                    <div class="no-image-container" id="cat_{{$categoryId}}_{{$rand}}">
                                        <div class="g-image" alt="no image" data-id="cat_{{$categoryId}}_{{$rand}}">
                                            <img src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/single-product-add-image-orange.svg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="cat_{{$categoryId}}_{{$rand}}" name='variant[0][image]'/>

                        </td>
                        <td><input class="input" name='variant[0][barcode]'/></td>
                        <td><input class="input" name='variant[0][retail_price]'/></td>
                        <td><input class="input" name='variant[0][price]'/></td>
                        <td><input class="input" name='variant[0][quantity]'/></td>
                        <td><input class="input" name='variant[0][tax]'/></td>
                        <td><input class="input" name='variant[0][stock_code]'/></td>
                        <td>
                            <button class="btn btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @else
                    @php $i = 0; @endphp
                    @foreach($slicer['data'] as $slicerIndex => $slicerData)
                        @php $i++; @endphp
                        @if($nonSlicer)
                            @php $j = 0; @endphp
                            @foreach($nonSlicer['data'] as $nonSlicerIndex => $nonSlicerData)
                                @php $j++; @endphp
                                <tr>
                                    @if ($nonSlicerIndex == 0)
                                        <td rowspan="{{ count($nonSlicer['data']) }}">ID</td>
                                        <td rowspan="{{ count($nonSlicer['data']) }}">
                                            <div class="g-tooltip add-media-tooltip">
                                                <div class="add-media-container data-table-image">
                                                    <div class="no-image-container" id="cat_{{$categoryId}}_{{$nonSlicerIndex}}_{{$rand}}">
                                                        <div class="g-image" alt="no image" data-id="cat_{{$categoryId}}_{{$nonSlicerIndex}}_{{$rand}}">
                                                            <img src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/single-product-add-image-orange.svg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="cat_{{$categoryId}}_{{$nonSlicerIndex}}_{{$rand}}" name='variant[{{$i}}][{{$j}}][image]'/>
                                        </td>
                                        <td rowspan="{{ count($nonSlicer['data']) }}">{{ $slicerData }}</td>
                                    @endif
                                    <td>{{ $nonSlicerData }}</td>
                                    <td><input class="input" name='variant[{{$i}}][{{$j}}][barcode]'/></td>
                                    <td><input class="input" name='variant[{{$i}}][{{$j}}][retail_price]'/></td>
                                    <td><input class="input" name='variant[{{$i}}][{{$j}}][price]'/></td>
                                    <td><input class="input" name='variant[{{$i}}][{{$j}}][quantity]'/></td>
                                    <td><input class="input" name='variant[{{$i}}][{{$j}}][tax]'/></td>
                                    <td><input class="input" name='variant[{{$i}}][{{$j}}][stock_code]'/></td>
                                    <td>
                                        <button class="btn btn-default">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>ID</td>
                                <td>
                                    <div class="g-tooltip add-media-tooltip">
                                        <div class="add-media-container data-table-image">
                                            <div class="no-image-container" id="cat_{{$categoryId}}_{{$slicerIndex}}_{{$rand}}">
                                                <div class="g-image" alt="no image" data-id="cat_{{$categoryId}}_{{$slicerIndex}}_{{$rand}}">
                                                    <img src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/single-product-add-image-orange.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="cat_{{$categoryId}}_{{$slicerIndex}}_{{$rand}}" name='variant[{{$i}}][image]'/>

                                </td>
                                <td>{{ $slicerData }}</td>
                                <td><input class="input" name='variant[{{$i}}][barcode]'/></td>
                                <td><input class="input" name='variant[{{$i}}][retail_price]'/></td>
                                <td><input class="input" name='variant[{{$i}}][price]'/></td>
                                <td><input class="input" name='variant[{{$i}}][quantity]'/></td>
                                <td><input class="input" name='variant[{{$i}}][tax]'/></td>
                                <td><input class="input" name='variant[{{$i}}][stock_code]'/></td>
                                <td>
                                    <button class="btn btn-default">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @endif
            </tbody>
        </table>
    </div>
    <div class="g-mt-15 g-d-flex g-d-justify-end g-pr-0"></div>
</div>
