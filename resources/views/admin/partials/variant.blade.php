@php
    $rand = rand(999, 9999999999);
    $variants = collect($variants ?? [])->sortByDesc('is_main');

    $mainVariant = $variants->firstWhere('is_main', true);
    $nonMainVariants = $variants->filter(function($variant) {
        return $variant['is_main'] == false;
    })->values();

    function combineVariants($variants)
    {
        $result = [[]];
        foreach ($variants as $variant) {
            $newResult = [];
            foreach ($result as $resultItem) {
                foreach ($variant as $value) {
                    $newResult[] = array_merge($resultItem, [$value]);
                }
            }
            $result = $newResult;
        }
        return $result;
    }

    $combinations = combineVariants($nonMainVariants->pluck('data')->toArray());
 @endphp

<div class="g-table-wrapper single-product-table">
    <div class="g-table">
        <table>
            <colgroup>
                <col width="48px">
                <col width="80px">
                <col>
                @if($nonMainVariants->isNotEmpty())
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
                <th style="min-width: 48px; max-width: 48px;"></th>
                <th style="min-width: 80px; max-width: 80px;">Görsel</th>
                @if($mainVariant)
                    <th style="min-width: 100px; max-width: 100px;">{{ $mainVariant['name'] }}</th>
                @endif
                @foreach($nonMainVariants as $variant)
                    <th style="min-width: 100px; max-width: 100px;">{{ $variant['name'] }}</th>
                @endforeach
                <th style="min-width: 140px; max-width: 140px;">Barkod</th>
                <th style="min-width: 120px; max-width: 120px;">Piyasa Satış Fiyatı</th>
                <th style="min-width: 120px; max-width: 120px;">Satış Fiyatı</th>
                <th style="min-width: 90px; max-width: 90px;">Stok</th>
                <th style="min-width: 90px; max-width: 90px;">KDV</th>
                <th style="min-width: 110px; max-width: 110px;">Stok Kodu</th>
                <th style="min-width: 52px; max-width: 52px;">İşlem</th>
            </tr>
            </thead>
            <tbody>
            @if($mainVariant)
                @foreach($mainVariant['data'] as $mainIndex => $mainValue)

                    @foreach($combinations as $index => $combination)
                        @php
                              $nonMainVariantsData = collect($nonMainVariants)->pluck('id')->zip($combination)->mapWithKeys(function($pair) {
                                  return [$pair[0] => $pair[1]];
                              });

                              $mainVariantDescription = collect([$mainVariant['id'] => $mainValue])->map(function($value, $key) {
                                  return $key . ':' . $value;
                              })->implode(', ');

                              $nonMainVariantsDescription = $nonMainVariantsData->map(function($value, $key) {
                                  return $key . ':' . $value;
                              })->implode(', ');

                              $variantDescription = $mainVariantDescription . ', ' . $nonMainVariantsDescription;
                        @endphp
                        <tr>
                            @if($index == 0)
                                <td rowspan="{{ count($combinations) }}">ID</td>
                                <td rowspan="{{ count($combinations) }}">
                                    <div class="g-tooltip add-media-tooltip">
                                        <div class="add-media-container data-table-image">
                                            <div class="no-image-container" id="cat_{{$categoryId}}_{{$mainIndex}}_0_{{$rand}}">
                                                <div class="g-image" alt="no image" data-id="cat_{{$categoryId}}_{{$mainIndex}}_0_{{$rand}}">
                                                    <img src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/single-product-add-image-orange.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="cat_{{$categoryId}}_{{$mainIndex}}_0_{{$rand}}" name='variant[{{$mainIndex}}][0][image]'/>
                                </td>
                                <td rowspan="{{ count($combinations) }}">{{ $mainValue }}</td>
                            @endif

                            @foreach($combination as $variantIndex => $variant)
                                <td><input class="input" type="hidden" name='variant[{{$mainIndex}}][{{$index}}][slicer][{{$variantIndex}}]' value='{{$variant}}'/>{{ $variant }}</td>
                            @endforeach
                            <td><input class="input" pattern="^[a-zA-Z0-9ğĞşŞüÜöÖçÇıİ.-_]*$" max="40" name='variant[{{$mainIndex}}][{{$index}}][barcode]'/></td>
                            <td><input class="input" type="text" id="priceInput" inputmode="numeric" name='variant[{{$mainIndex}}][{{$index}}][retail_price]'/></td>
                            <td><input class="input" type="text" id="priceInput" inputmode="numeric" name='variant[{{$mainIndex}}][{{$index}}][price]'/></td>
                            <td><input class="input" type="number" name='variant[{{$mainIndex}}][{{$index}}][quantity]'/></td>
                            <td>
                                <select class="input" name='variant[{{$mainIndex}}][{{$index}}][tax]'>
                                    <option value="1">1</option>
                                    <option value="8">8</option>
                                    <option value="18">18</option>
                                    <option value="20">20</option>
                                </select>
                            </td>
                            <td><input class="input" name='variant[{{$mainIndex}}][{{$index}}][stock_code]'/></td>
                            <td>
                                <button class="btn btn-default">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                    </svg>
                                </button>
                            </td>
                            <input type="hidden" name='variant[{{$mainIndex}}][{{$index}}][description]' value='{{ $variantDescription }}'/>
                        </tr>
                    @endforeach
                @endforeach
            @else
                @foreach($combinations as $index => $combination)
                    @php
                        $variantDescription = collect($nonMainVariants)->pluck('name')->zip($combination)->mapWithKeys(function($pair) {
                            return [$pair[0] => $pair[1]];
                        })->map(function($value, $key) {
                            return $key . ': ' . $value;
                        })->implode(', ');
                    @endphp
                    <tr>
                        <td>ID</td>
                        <td>
                            <div class="g-tooltip add-media-tooltip">
                                <div class="add-media-container data-table-image">
                                    <div class="no-image-container" id="cat_{{$categoryId}}_0_{{$index}}_{{$rand}}">
                                        <div class="g-image" alt="no image" data-id="cat_{{$categoryId}}_0_{{$index}}_{{$rand}}">
                                            <img src="https://cdn.dsmcdn.com/seller-center/spm/seller-center-product/assets/single-product-add-image-orange.svg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="cat_{{$categoryId}}_0_{{$index}}_{{$rand}}" name='variant[0][{{$index}}][image]'/>
                        </td>

                        @foreach($combination as $variantIndex => $variant)
                            <td><input class="input" type="hidden" name='variant[0][{{$index}}][slicer][{{$variantIndex}}]' value='{{$variant}}'/>{{ $variant }}</td>
                        @endforeach
                        <td><input class="input" pattern="^[a-zA-Z0-9ğĞşŞüÜöÖçÇıİ.-_]*$" max="40" name='variant[0][{{$index}}][barcode]'/></td>
                        <td><input class="input" type="text" id="priceInput" inputmode="numeric" name='variant[0][{{$index}}][retail_price]'/></td>
                        <td><input class="input" type="text" id="priceInput" inputmode="numeric" name='variant[0][{{$index}}][price]'/></td>
                        <td><input class="input" type="number" name='variant[0][{{$index}}][quantity]'/></td>
                        <td>
                            <select class="input" name='variant[0][{{$index}}][tax]'>
                                <option value="1">1</option>
                                <option value="8">8</option>
                                <option value="18">18</option>
                                <option value="20">20</option>
                            </select>
                        </td>
                        <td><input class="input" name='variant[0][{{$index}}][stock_code]'/></td>
                        <td>
                            <button class="btn btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                </svg>
                            </button>
                        </td>
                        <input type="hidden" name='variant[0][{{$index}}][description]' value='{{ $variantDescription }}'/>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="g-mt-15 g-d-flex g-d-justify-end g-pr-0"></div>
</div>
