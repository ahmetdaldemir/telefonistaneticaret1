@extends('layout.admin.admin')

@section('content')
        <div class="subbanner alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
            <div class="alert-content">
                <div>
                    <h3>Sanal Pazarlar</h3>
                </div>
                <div slot="left">

                </div>
            </div>
            <div slot="right" class="float-right">
                <div class="grid grid-cols-1 gap-1">
                </div>
            </div>
        </div>
        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="container mx-auto">
                <div class="card adaptable-card">
                    <div class="card-body virtualMarketList">

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
                                        <td>{{$virtualMarket->name}}</td>
                                        <td>
                                            <label class="switcher">
                                                <input type="checkbox" class="virtualMarketStatus" name="is_active"
                                                       data-id="{{ $virtualMarket->id }}"
                                                       data-is_active="{{ optional($virtualMarket->virtual_market_setting->first())->is_active}}"
                                                       @if(optional($virtualMarket->virtual_market_setting->first())->is_active) checked @endif>
                                                <span class="switcher-toggle"></span>
                                            </label>
                                        </td>
                                        <td>
                                            @if(optional($virtualMarket->virtual_market_setting->first())->is_active)
                                                <div class="flex justify-end text-lg">
                                                    <a class="cursor-pointer p-2 hover:text-indigo-600" href="{{route('virtual_market.virtual_market_setting.edit',['id' => $virtualMarket->id])}}">
                                                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                        </svg>
                                                    </a>
                                                    @endif
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


@endsection

@section('customJS')
    <script type="module" src="{{asset('admin/virtualMarket.js')}}"></script>

@endsection
