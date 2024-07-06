@extends('layout.admin.admin')

@section('content')
    <main class="h-full">
        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="flex flex-col gap-4">
                <div>
                    <h4 class="mb-1">Merhabalar {{auth()->guard('admin')->user()->name}}!</h4>
                </div>
                <div class="flex flex-col xl:flex-row gap-4">
                    <div class="flex flex-col gap-4 flex-auto">
                        <div class="card card-layout-frame">
                            <div class="card-body">
                                <div class="flex sm:flex-row flex-col md:items-center justify-between mb-6 gap-4">
                                    <h4>Task Overview</h4>
                                    <div class="segment segment-sm">
                                        <button class="segment-item">Aylik</button>
                                        <button class="segment-item segment-item-active">Haftalik</button>
                                        <button class="segment-item">Gunluk</button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <div class="flex gap-2">
                                            <div>
                                                <h5 class="font-bold">213</h5>
                                                <p>Toplam Siparis</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-x-6">
                                        <div class="flex gap-2">
                                            <span class="badge-dot bg-indigo-600 mt-2.5"></span>
                                            <div>
                                                <h5 class="font-bold">126</h5>
                                                <p>Beklemede Siparis</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2">
                                            <span class="badge-dot bg-emerald-500 mt-2.5"></span>
                                            <div>
                                                <h5 class="font-bold">87</h5>
                                                <p>Tamamlanan Siparisler</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div id="task-overview-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-layout-frame">
                            <div class="card-body">
                                <div class="flex items-center justify-between mb-6">
                                    <h4>Yeni Siparişler</h4>
                                    <button class="btn btn-default btn-sm">Tumunu Goruntule</button>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="table-default table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="1">Siparis ID</th>
                                            <th colspan="1">Isim Soyisim</th>
                                            <th colspan="1">Toplam Tutar</th>
                                            <th colspan="1">Durum</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <a class="hover:underline font-semibold" href="#">{{$order}}</a>
                                            </td>
                                            <td>Design sign up flow</td>
                                            <td>
                                                <div class="tag text-red-600 bg-red-100 dark:text-red-100 dark:bg-red-500/20 rounded border-0">
                                                    High
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group avatar-group-chained">
                                                                                <span class="avatar avatar-circle avatar-sm" data-avatar-size="30" data-bs-toggle="tooltip" data-bs-title="Carolyn Perkins">
                                                                                    <img class="avatar-img avatar-circle" src="img/avatars/thumb-1.jpg" loading="lazy">
                                                                                </span>
                                                    <span class="avatar avatar-circle avatar-sm" data-avatar-size="30" data-bs-toggle="tooltip" data-bs-title="Terrance Moreno">
                                                                                    <img class="avatar-img avatar-circle" src="img/avatars/thumb-2.jpg" loading="lazy">
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
                    <div class="flex flex-col gap-4">
                        <div class="xl:w-[380px]">
                            <div class="card card-layout-frame mb-4">
                                <div class="card-body">
                                    <div class="project-calendar" inline-datepicker data-date=""></div>
                                    <hr class="my-6">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('customJS')

<!-- Other Vendors JS -->
<script src="{{asset('admin/vendors/apexcharts/apexcharts.js')}}"></script>

<!-- Page js -->
<script src="{{asset('admin/js/pages/project-dashboard.js')}}"></script>
@endsection
