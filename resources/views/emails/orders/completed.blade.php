@component('mail::message')
    # Sipariş Durumu {{ $order->status() }} !

    <br/>

   <b> Merhaba {{ $order->customer->fullname }}, </b>

    Siparişinizi aldık ve işleme koyduk. Sipariş detaylarınız aşağıdadır:

    @component('mail::table')
        | Ürün Adı       | Adet         | Fiyat         |
        | -------------- |:------------:| -------------:|
        @foreach($order->items as $item)
            | {{ $item->product->name }} | {{ $item->quantity }} | {{ $item->price }} TL |
        @endforeach
        | **Toplam**     |              | **{{ $order->total_price }} TL** |
    @endcomponent


    # Kargo Bilgileri: <br/>
    - Kargo Takip Numarası: <b> {{ $order->shipment_tracking_number ?? 'Hazirlik Aşamasında' }} </b> <br/>
    - Kargo Şirketi: {{ $order->shipment->title }} <br/>
    - Kargo Adresi: {{ $order->shipment->title }} <br/>

    <br/> <br/> <br/>

    # Müşteri Bilgileri:  <br/>
    - Ad Soyad: {{ $order->customer->fullname }} <br/>
    - Email: {{ $order->customer->email }} <br/>
    - Telefon: {{ $order->customer->phone }} <br/>
    - Adres: {{ $order->customer->address }} <br/>
    - Il / Ilce: {{ $order->customer->city }} / {{ $order->customer->district }} <br/>

    <br/> <br/>

    Siparişinizle ilgili herhangi bir sorunuz olursa, lütfen bizimle iletişime geçmekten çekinmeyin.

    Teşekkürler,<br>


    @component('mail::subcopy')
        Bu e-postayı almak istemiyorsanız, <a href="{{route('unsubscribe-link-here',['email' => base64_encode($order->customer->email)])}}">mail listemizden çıkabilirsiniz</a>.
    @endcomponent


    @slot('footer')
        © {{ date('Y') }} {{ config('app.name') }}. Tüm hakları saklıdır. <br>
        <a href="{{ route('information',['slug' => 'kvkk'])}}">KVKK Metni</a> | <a href="{{ route('information',['slug' => 'siparis-sozlesmesi']) }}">Sipariş Sözleşmesi</a>
    @endslot

 @endcomponent
