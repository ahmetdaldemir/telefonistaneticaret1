@extends('layout.admin.admin')

@section('content')
     <div class="subbanner alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
        <div class="alert-content">
            <div>
                <h3>Yeni Kategori</h3>
            </div>
            <div slot="left">

            </div>
        </div>
        <div slot="right" class="float-right">
            <div class="grid grid-cols-1 gap-1">
                <a href="{{route('category.create')}}" class="btn btn-sm bg-rose-600 text-white">
                    <span class="flex items-center justify-center gap-2">
                        <span class="text-lg">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                 aria-hidden="true" height="1em" width="1em"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                        <span>Yeni Kategori</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <div class="card adaptable-card">
                <div class="card-body">
                    <div class="lg:flex items-center justify-between mb-4"></div>
                    <div id="DataTable" class="overflow-x-auto">
                        <table id="datatable" class="table-default table-hover data-table dataTable no-footer">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Üst Kategori</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>


                    <div class="grid grid-cols-2" id="no-data-image">
                        <div class="empty-state-content"><h1>Kategori Ekle</h1>
                            <p>Müşterilerinizin aradıkları ürünleri kolayca bulabilmeleri adına ürünlerinizi kategoriler halinde düzenleyin.</p>
                        </div>
                        <img src="{{asset('admin/img/svg/categories.svg')}}" alt="No Data Available">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('customCSS')
    <style>
        .empty-state-content h1 {
            font-size: 3.6rem;
            font-weight: 500;
            line-height: 4.3rem;
            color: #004b82;
            margin-bottom: 3rem;
        }
        .empty-state-content p  {
            font-size: 1.6rem;
            font-weight: 300;
            line-height: 2.4rem;
            margin-bottom: 4.5rem;
        }
    </style>
@endsection
@section('customJS')

    <script src="{{asset('admin/category.js')}}"></script>

@endsection
