@extends('layout.admin.admin')

@section('content')
    <main class="h-full">
        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="container mx-auto">
                <div class="mb-6">
                    <div class="flex items-center mb-2">
                        <h3>
                            <span>Siparis</span>
                            <span class="ltr:ml-2 rtl:mr-2">#{{date('Y')}}{{$order->id}}</span>
                        </h3>
                        <div class="tag border-0 rounded-md ltr:ml-2 rtl:mr-2 bg-emerald-100 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-100">
                            {{\App\Models\Order::ORDER_STATUS_STRINGS[''.$order->order_status.'']}}
                        </div>

                    </div>
                    <span class="flex items-center">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" class="text-lg" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="ltr:ml-1 rtl:mr-1">{{$order->created_at}}</span>
                    </span>
                </div>
                <div class="xl:flex gap-4">
                    <div class="w-full">

                        <div class="xl:grid grid-cols-2 gap-4">
                            <div class="card-layout-frame">
                                <div class="card-body">
                                    <h5 class="mb-4">Kargo Firmasi</h5>
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center">
                                                <span class="avatar avatar-rounded avatar-lg" data-avatar-size="60" style="width: 60px; height: 60px; min-width: 60px; line-height: 60px;">
                                                    <img class="avatar-img avatar-rounded" src="img/others/img-11.jpg" loading="lazy">
                                                </span>
                                            <div class="ltr:ml-2 rtl:mr-2">
                                                <h6>FedEx</h6><span>Delivery in 1 ~ 3 days</span>
                                            </div>
                                        </div>
                                        <span class="font-semibold"><span>$15.00</span></span>
                                    </div>
                                    <button class="btn btn-default w-full">View Carrier Details</button>
                                </div>
                            </div>
                            <div class="card-layout-frame">
                                <div class="card-body">
                                    <h5 class="mb-4">Odeme Bilgileri</h5>
                                    <ul>
                                        <li class="flex items-center justify-between mb-3">
                                            <span>Teknik Servis Toplami</span>
                                            <span class="font-semibold">
                                            <span>{{$order->total_price}} ₺</span>
                                        </span>
                                        </li>
                                        <li class="flex items-center justify-between mb-3">
                                            <span>Tax(6%)</span>
                                            <span class="font-semibold">
                                                <span>$105.72</span>
                                            </span>
                                        </li>
                                        <hr class="mb-3">
                                        <li class="flex items-center justify-between">
                                            <span>To</span>
                                            <span class="font-semibold">
                                                <span>$1,870.72</span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card card-layout-frame">
                            <div class="card-body">
                                <h5 class="mb-4">Hareketler</h5>
                                <div class="mb-8">

                                     <ul class="timeline">
                                         @foreach($order_histories as $order_history)
                                        <li class="timeline-item">
                                            <div class="timeline-item-wrapper">
                                                <div class="timeline-item-media">
                                                    <div class="timeline-item-media-content">
                                                        <div class="flex mt-1.5"><span class="badge-dot bg-emerald-500"></span>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-connect"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    <div class="font-semibold mb-1 text-base text-emerald-500">{{\App\Models\Order::ORDER_STATUS_STRINGS[$order_history->value]}}</div>
                                                    <div class="mb-1">Sistem</div>
                                                    <div>{{\Carbon\Carbon::parse($order_history->created_at)->format('d-m-Y H:i')}}</div>
                                                </div>
                                            </div>
                                        </li>
                                         @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="xl:max-w-[360px] w-full">
                        <div class="card card-layout-frame" role="presentation">
                            <div class="card-body">
                                <h5 class="mb-4">Musteri</h5>
                                <a class="group flex items-center justify-between" href="#">
                                    <div class="flex items-center">
                                        <span class="avatar avatar-circle avatar-md">
                                            <img class="avatar-img avatar-circle" src="img/avatars/thumb-11.jpg" loading="lazy">
                                        </span>
                                        <div class="ltr:ml-2 rtl:mr-2">
                                            <div class="font-semibold group-hover:text-gray-900 group-hover:dark:text-gray-100">
                                               {{$order->firstname}} {{$order->lastname}}
                                            </div>
                                            <span>
                                            <span class="font-semibold">11 </span>
                                            Toplam Siparis
                                        </span>
                                        </div>
                                    </div>
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" class="text-xl hidden group-hover:block" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"> </path>
                                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                                    </svg>
                                </a>
                                <hr class="my-5">
                                <span class="flex items-center gap-2 mb-4">
                                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" class="text-xl opacity-70" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                                            </svg>
                                                            <span class="font-semibold">{{$order->email}}</span>
                                                        </span>
                                <span class="flex items-center gap-2">
                                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" class="text-xl opacity-70" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                                            </svg>
                                                            <span class="font-semibold">{{$order->phone}}</span>
                                                        </span>
                                <hr class="my-5">
                                <h6 class="mb-4">Kargo Adresi</h6>
                                <address class="not-italic">
                                    <div class="mb-1">{{$order->address}}</div>
                                    <div>{{$order->customerAddress->city}} / {{$order->customerAddress->district}}</div>
                                </address>
                                <hr class="my-5">
                                <h6 class="mb-4">Fatura Adresi</h6>
                                <address class="not-italic">
                                    <div class="mb-1">{{$order->address}}</div>
                                    <div>{{$order->customerInvoice->city}} / {{$order->customerInvoice->district}}</div>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('customJS')

@endsection
