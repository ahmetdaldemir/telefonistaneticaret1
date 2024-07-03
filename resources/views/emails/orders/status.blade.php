@component('mail::message')
    # Sipariş Durumu {{ $order->status() }} !

    <br/>

    <b> Merhaba {{ $order->customer->fullname }}, </b>

    Sipariş durumunuz Guncellenmistir.

    <br/> <br/>

    Siparişinizle ilgili herhangi bir sorunuz olursa, lütfen bizimle iletişime geçmekten çekinmeyin.

    Teşekkürler,<br>

    @slot('footer')
        © {{ date('Y') }} {{ config('app.name') }}. Tüm hakları saklıdır. <br>
        <a href="{{ route('information',['slug' => 'kvkk'])}}">KVKK Metni</a> | <a href="{{ route('information',['slug' => 'siparis-sozlesmesi']) }}">Sipariş Sözleşmesi</a>
    @endslot

@endcomponent
