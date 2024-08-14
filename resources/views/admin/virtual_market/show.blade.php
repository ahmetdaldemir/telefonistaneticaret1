@extends('layout.admin.admin')

@section('content')
     <main class="h-full">
        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="container mx-auto">
                <div class="card adaptable-card">
                    <div class="card-body">
                        <div class="lg:flex items-center justify-between mb-4">
                            <h3 class="mb-4 lg:mb-0">Sanal Pazarlar</h3>
                            <button class="btn btn-sm bg-rose-600 text-white" data-bs-toggle="modal" data-bs-target="#virtualMarketBasic">
                                <span class="flex items-center justify-center gap-2">
                                    <span class="text-lg">
                                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </span>
                                    <span>Yeni Slider</span>
                                </span>
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                             <form method="post" action="{{route('virtual_market.virtual_market_setting.store')}}" enctype="multipart/form-data">
                                @csrf
                                <input class="input" type="hidden" id="id" name="id" value="{{$virtualMarket->id}}">

                                <div class="form-container horizontal">
                                    <div class="form-item horizontal">
                                        <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">Adi:</label>
                                        <div class="w-full flex flex-col justify-center relative">
                                            <input class="input" id="name" type="text" name="name" value="{{$virtualMarket->name}}" readonly>
                                        </div>
                                    </div>
                                    @foreach(json_decode($virtualMarket->settingFields,TRUE) as $item)
                                     <div class="form-item horizontal">
                                        <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">{{$item}}:</label>
                                        <div class="w-full flex flex-col justify-center relative">
                                            <input class="input" id="name" type="text" name="settings[{{$item}}]" value="{{$virtualMarket->virtual_market_setting?$virtualMarket->virtual_market_setting->settings[$item]:''}}" required>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="form-item horizontal">
                                        <label class="form-label min-w-[100px]"></label>
                                        <div class="w-full flex flex-col justify-center relative">
                                            <button class="btn btn-default" type="submit">
                                                Kaydet
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('customJS')
    <script type="module" src="{{asset('admin/virtualMarket.js')}}"></script>

@endsection
