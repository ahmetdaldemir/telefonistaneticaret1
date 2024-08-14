@extends('layout.admin.admin')

@section('content')
    <div class="modal fade" id="orderBasic" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  dialog  md:max-w-[1100px]">
            <div class="dialog-content">
                     <span class="close-btn absolute z-10 ltr:right-6 rtl:left-6" role="button" data-bs-dismiss="modal">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                <h5 class="mb-4">Teknik Servis Guncelleme</h5>
                <form method="post" action="{{route('order.update')}}" id="updateForm" enctype="multipart/form-data">
                    @csrf
                    <input class="input" type="hidden" id="id" name="id" value="0">

                    <div class="form-container horizontal">
                        <div class="form-item horizontal">
                            <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">Fiyat:</label>
                            <div class="w-full flex flex-col justify-center relative">
                                <input class="input" id="price" type="text" name="price" placeholder="Fiyat">
                            </div>
                        </div>
                        <div class="form-item horizontal">
                            <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">Acıklama:</label>
                            <div class="w-full flex flex-col justify-center relative">
                                <textarea name="value" id="value"></textarea>
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
            <div class="card adaptable-card">
                <div class="card-body">
                    <h3 class="mb-4">Siparişler</h3>
                    <div class="overflow-x-auto">
                        <table id="order-list-table" class="table-default table-hover">
                            <thead>
                            <th>
                                <label class="checkbox-label mb-0">
                                    <input id="indeterminate-checkbox" class="checkbox" type="checkbox" value="">
                                </label>
                            </th>
                            <th>Sipariş N</th>
                            <th>Tarih</th>
                            <th>Müşteri</th>
                            <th>Sipariş D</th>
                            <th>Toplam T.</th>
                            <th>Aciklama</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <label class="checkbox-label mb-0">
                                            <input class="checkbox order-checkbox" type="checkbox" value="">
                                        </label>
                                    </td>
                                    <td>
                                        <span
                                            class="cursor-pointer select-none font-semibold hover:text-indigo-600">#{{date('Y')}}{{$order->id}}</span>
                                    </td>
                                    <td>
                                        <span>{{$order->created_at}}</span>
                                    </td>
                                    <td>
                                        {{$order->customer->fullname}}<br/>
                                        <small>{{$order->customer->email}}<br/>{{$order->customer->phone}}</small>
                                    </td>
                                    <td>
                                        <select style="background-color:  {{$order->getStatusColor()}};color: #fff" class="input input-sm" data-id="{{$order->id}}" id="statusSelect" {{$order->getStatusDisableCheck()}}>
                                            @foreach($status as $key => $value)
                                                <option value="{{$key}}" @if($order->order_status == $key) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td class="text-right">
                                        <span class="text-red-600">{{$order->total_price}} ₺</span>
                                    </td>
                                    <td class="text-right">
                                        <span class=" btn btn-sm bg-rose-600 text-white btn-icon rounded-full" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="{!! $order->description !!} <br>{!! $order->description_price !!} ">
                                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path>
                                            </svg>
                                        </span>

                                    </td>
                                    <td>
                                        <div class="flex justify-end text-lg">
                                            <a href="{{route('order.detail',['id' => $order->id])}}" class="cursor-pointer p-2 hover:text-indigo-600" data-bs-toggle="tooltip" data-bs-title="Goruntule">
                                                <svg stroke="currentColor" fill="none"
                                                     stroke-width="2" viewBox="0 0 24 24"
                                                     aria-hidden="true" height="1em" width="1em"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </a>

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
    </main>

@endsection

@section('customJS')
    <script src="{{asset('admin/ecommerce.js')}}"></script>

    <script src="{{asset('vendors/quill/quill.min.js')}}"></script>

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/oeyw4fczbgzgtessykwa9j2ow3stvtz54fnla42oahw3aosa/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endsection
