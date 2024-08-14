<div class="alert alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
    <div class="alert-content">
        <span class="text-2xl text-primary-400 dark:text-primary-100">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true"
               height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
        </span>
        <div>Aşağıdaki bilgileriniz Gelir İdaresi Başkanlığı aracılığı ile doğrulanmıştır. Hatalı olduğunu düşünüyorsanız Satıcı Destek Hattı üzerinden bizimle iletişime geçebilirsiniz.
        </div>
    </div>
</div>
<div class="grid grid-flow-row-dense grid-cols-4 grid-rows-1">
    @foreach($ecommerceSettings as $item)
        @if($item->type == 'address')
                <?php $valueData = explode(';',$item->value) ?>
            <div class="p-4">
                <div class="card card-border">
                    <div class="card-header card-header-border card-header-extra info-card-wrapper">
                        <h5 style="font-size: 14px">{{$item->name}}</h5>
                        <span>
                            <span class="flex items-center">
                                <span class="mr-1 font-semibold">Durum:</span>
                                <span class="text-emerald-500 text-xl">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20"
                                         aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </span>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="overflow-x-auto">
                            <table class="table-responsive table-hover"
                                   style="font-size: 12px; word-break: break-word; border-spacing: 0 10px;">
                                <tbody>
                                <tr>
                                    <td class="w-[30%]" style="vertical-align: top;">Adres ID</td>
                                    <td style="vertical-align: top;"> :</td>
                                    <td class="w-[80%]">{{$item->id}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[30%]" style="vertical-align: top;">İl/İlçe</td>
                                    <td style="vertical-align: top;"> :</td>
                                    <td class="w-[80%]">{{$valueData[0]}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[30%]" style="vertical-align: top;">Adres</td>
                                    <td style="vertical-align: top;"> :</td>
                                    <td class="w-[80%]">{{$valueData[1]}}{{$valueData[2]}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
