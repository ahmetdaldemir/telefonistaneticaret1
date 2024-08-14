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
        <div>Sözleşmelerin firmanıza uygun şekilde yapılandırılmış olması öncelikle firmanızı koruma altına almaktadır.
            Müşteri ile yaşayacağınız uyuşmamazlıklarda sözleşmelerinizin dikkate alınacağınız unutmayınız
        </div>
    </div>
</div>


<table class="table-default table-hover table-compact">
    <thead>
    <tr>
        <th style="width: 15%">Sözleşme Adı</th>
        <th style="width: 80%">İçerik</th>
        <th style="width: 5%">Düzenle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ecommerceSettings as $item)
        @if($item->type == 'information')
            <tr>
                <td>{{$item->name}}</td>
                <td>{!! \Illuminate\Support\Str::limit($item->value, 100, '...') !!}</td>
                <td>Düzenle</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>