@extends('layout.admin.admin')

@section('content')
    <div class="modal fade" id="brandBasic" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog dialog">
             <div class="dialog-content">
                     <span class="close-btn absolute z-10 ltr:right-6 rtl:left-6" role="button" data-bs-dismiss="modal">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                 <h5 class="mb-4" id="ModalTitle">Marka Ekle</h5>
                <form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input class="input" type="hidden" id="id" name="id" value="0">

                    <div class="form-container horizontal">
                        <div class="form-item horizontal">
                            <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">Marka Adi:</label>
                            <div class="w-full flex flex-col justify-center relative">
                                <input class="input" id="name" type="text" name="name" placeholder="Please enter your name">
                            </div>
                        </div>
                        <div class="form-item horizontal">
                            <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">Fotograf:</label>
                            <div class="w-full flex flex-col justify-center relative">
                                <input class="input" id="img" type="file" name="img" placeholder="Please enter your name">
                            </div>
                        </div>
                        <div class="form-item horizontal">
                            <label class="form-label min-w-[100px]"></label>
                            <div class="w-full flex flex-col justify-center relative">
                                <button id="saveFormButton" class="btn btn-default" type="submit">
                                    Kaydet
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="subbanner alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
        <div class="alert-content">
            <div>
                <h3>Markalar</h3>
            </div>
            <div slot="left">

            </div>
        </div>
        <div slot="right" class="float-right">
            <div class="grid grid-cols-1 gap-1">
                <button  class="btn btn-sm bg-rose-600 text-white" data-bs-toggle="modal" data-bs-target="#brandBasic">
                                <span class="flex items-center justify-center gap-2">
                                    <span class="text-lg">
                                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </span>
                                    <span id="brandBasic">Yeni Marka Ekle</span>
                                </span>
                </button>
            </div>
        </div>
    </div>

    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="container mx-auto">
                <div class="card adaptable-card">
                    <div class="card-body brandList">
                        <div class="lg:flex items-center justify-between mb-4">

                        </div>
                        <div class="overflow-x-auto">
                            <table id="product-list-data-table" class="table-default table-hover">
                                <thead>
                                <tr>
                                    <th style="font-size:12px;width: 5%" class="text-center">ID</th>
                                    <th style="font-size:12px;width: 5%" class="text-center">Resim</th>
                                    <th style="font-size:12px;width: 80%" class="text-center">Marka Adi</th>
                                    <th style="font-size:12px;width: 5%" class="text-center">Status</th>
                                    <th style="font-size:12px;width: 5%" class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                <tr>

                                    <td style="text-align: center">#{{$brand->id}}</td>
                                        <td>
                                            <div class="flex items-center">
                                                <span class="avatar avatar-rounded avatar-xs" style="margin: 0 auto">
                                                    @if($brand->img)
                                                    <img class="avatar-img avatar-rounded" src="{{asset('storage/brand/'.$brand->img)}}"  loading="lazy">
                                                    @else
                                                        <img class="avatar-img avatar-rounded" src="{{asset('admin/img/others/upload.png')}}"  loading="lazy">
                                                    @endif
                                                </span>
                                            </div>
                                        </td>
                                    <td>
                                        <span>{{$brand->name}}</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-2" style="justify-content: space-around;">
                                            <label class="switcher">
                                                <input type="checkbox" class="brandStatus" data-id="{{$brand->id}}" data-is_status="{{$brand->is_status}}"  @if($brand->is_status) checked @endif>
                                                <span class="switcher-toggle"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex justify-end text-lg">
                                            <span class="cursor-pointer p-2 hover:text-indigo-600" onclick="brandEdit({{$brand->id}})">
                                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                </svg>
                                            </span>
                                            <span class="cursor-pointer p-2 hover:text-red-500">
                                                <a href="{{route('brand.delete',['id' => $brand->id])}}">
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


@endsection

@section('customJS')
    <script src="{{asset('admin/brand.js')}}"></script>
@endsection
@section('customCSS')

    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/table.css')}}"/>
    <style>
        .table-default thead > tr > th {
            padding-top: 0.75rem !important;
            padding-bottom: .75rem !important;
        }
    </style>
@endsection