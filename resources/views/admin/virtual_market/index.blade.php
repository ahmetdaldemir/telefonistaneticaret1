@extends('layout.admin.admin')

@section('content')
    <div class="modal fade" id="virtualMarketBasic" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog dialog">
            <div class="dialog-content">
                     <span class="close-btn absolute z-10 ltr:right-6 rtl:left-6" role="button" data-bs-dismiss="modal">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                <h5 class="mb-4">Sanal Pazar Ekle</h5>
                <form method="post" action="{{route('virtual_market.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input class="input" type="hidden" id="id" name="id" value="0">

                    <div class="form-container horizontal">
                        <div class="form-item horizontal">
                            <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">Adi:</label>
                            <div class="w-full flex flex-col justify-center relative">
                                <input class="input" id="name" type="text" name="name" placeholder="Please enter your name">
                            </div>
                        </div>
                        <div class="form-item horizontal">
                            <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">Ayarlar:</label>
                            <div class="w-full flex flex-col justify-center relative">
                                <textarea class="input input-textarea" id="settingFields"  name="settingFields">{}</textarea>
                            </div>
                        </div>

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
    <main class="h-full">
        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="container mx-auto">
                <div class="card adaptable-card">
                    <div class="card-body">
                        <div class="lg:flex items-center justify-between mb-4">
                            <h3 class="mb-4 lg:mb-0">Sanal Pazarlar</h3>
                            <button class="btn btn-two-tune btn-sm" data-bs-toggle="modal" data-bs-target="#virtualMarketBasic">
                                <span class="flex items-center justify-center gap-2">
                                    <span class="text-lg">
                                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </span>
                                    <span>Yeni Sanal Pazar</span>
                                </span>
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table id="virtualMarket-list-data-table" class="table-default table-hover data-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Adi</th>
                                    <th>Ayarlar</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($virtualMarkets as $virtualMarket)
                                    <tr>

                                        <td>{{$virtualMarket->id}}</td>
                                        <td>{{$virtualMarket->virtualMarket->name}}</td>
                                        <td>
                                            <div class="flex-container">
                                                <div class="flex-item"> {{json_encode($virtualMarket->settings)}}</div>
                                            </div>
                                           </td>
                                        <td>
                                            <div class="flex justify-end text-lg">

                                            <span class="cursor-pointer p-2 hover:text-red-500">
                                                <a href="{{route('virtual_market.show',['id' => $virtualMarket->id])}}">
                                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
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
    <script type="module" src="{{asset('admin/virtualMarket.js')}}"></script>

@endsection
