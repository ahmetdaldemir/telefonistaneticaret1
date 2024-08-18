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

            </div>
        </div>
    </div>

    <div class="mt-3 alert alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
        <div class="alert-content">
        <span class="text-2xl text-primary-400 dark:text-primary-100">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true"
               height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
        </span>
            <div>Binlerce Kategori arasından kategorilerinizi dakikalar içerisinde ekleyebilirsiniz. Özellik ve varyant
                sistemi kategorilerinize göre otomatik olarak optimize edilecektir.
            </div>
        </div>
    </div>
    <style>
        .select2-container {
            width: 100% !important; /* Genişliği ayarlar */
        }

        .select2-selection {
            height: auto !important; /* Yüksekliği otomatik yapar */
            min-height: 34px; /* Minimum yüksekliği belirler */
        }
    </style>
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <div class="grid grid-rows-2 col-span-2 gap-4">
                        <div class="card adaptable-card">
                            <div class="card-body">

                                <div class="flex flex-col gap-4">
                                    <h4>Kategori Bilgisi</h4>
                                    <div>
                                        <label for="categories">Kategori Ara</label>
                                        <select id="categories" name="categories" class="form-control select2 product-categories">
                                            <!-- Trendyol kategorileri buraya gelecek -->
                                        </select>
                                    </div>
                                    <div class="mt-10">
                                        <label for="category_search">Kategori Adı</label>
                                        <input type="text" class="input" name="category_name" id="category_name">
                                        <p><small class="text-red-500">Seçtiğiniz kategorinin adını buradan değiştirebilirsiniz</small></p>
                                    </div>
                                    <div>
                                        <label for="category_search">Sıra</label>
                                        <input type="text" class="input" name="order" id="order" value="1">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card adaptable-card">
                            <div class="card-body">
                                <div class="flex flex-col gap-4">
                                    <h4>Seo Optimizasyonu</h4>

                                    <label for="seo_url">Seo URL</label>
                                    <input class="input input-lg" id="slug" name="slug" type="text">
                                    <label>
                                        <textarea class="input input-textarea" name="description" id="description" placeholder="Açıklama"></textarea>
                                        <textarea class="input input-textarea" name="labels" id="labels" placeholder="Anahtar Kelimeler"></textarea>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="columns-2">
                            <div class="card adaptable-card">
                                <div class="card-body">
                                    <div class="basis-1/2   grid justify-center content-between place-items-center">
                                        <label for="category_search">Harici Kategori</label>
                                        <label class="switcher place-items-center ">
                                            <input type="checkbox" id="out_category" name="out_category" value="1">
                                            <span class="switcher-toggle"></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="card adaptable-card">
                                <div class="card-body">
                                    <div class="basis-1/2   grid justify-center content-between place-items-center">
                                        <label for="category_search">Durum</label>
                                        <label class="switcher">
                                            <input type="checkbox" name="is_active" id="is_active" checked>
                                            <span class="switcher-toggle"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card adaptable-card">
                            <div class="card-body">
                                <div class="flex flex-col gap-4">
                                    <label for="category_search">Üst Kategori</label>
                                    <div class="input-group mb-4">
                                        <select class="parent_id" name="parent_id" id="parent_id"></select>

                                        <button class="button bg-white border border-gray-300 dark:bg-gray-700 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 active:bg-gray-100 dark:active:bg-gray-500 dark:active:border-gray-500 text-gray-600 dark:text-gray-100 radius-round h-11 w-11 inline-flex items-center justify-center text-xl">
                                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                                 aria-hidden="true" class="text-xl" height="1em" width="1em"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card adaptable-card">
                            <div class="card-body">
                                <div class="flex flex-col gap-4">
                                    <label for="category_search">Resim</label>
                                    <input class="input input-lg" id="image" name="image" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="stickyFooter" class="sticky col-span-3 -bottom-1 -mx-8 px-8 flex items-center justify-end py-4">
                        <div class="md:flex items-center">
                            <a class="btn btn-default btn-sm ltr:mr-2 rtl:ml-2" href="{{route('category.index')}}">Vazgeç</a>
                            <button class="btn btn-solid btn-sm" type="submit">
                                <span class="flex items-center justify-center">
                                    <span class="text-lg">
                                        <svg stroke="currentColor" fill="currentColor"
                                             stroke-width="0" viewBox="0 0 1024 1024"
                                             height="1em" width="1em"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M893.3 293.3L730.7 130.7c-7.5-7.5-16.7-13-26.7-16V112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V338.5c0-17-6.7-33.2-18.7-45.2zM384 184h256v104H384V184zm456 656H184V184h136v136c0 17.7 14.3 32 32 32h320c17.7 0 32-14.3 32-32V205.8l136 136V840zM512 442c-79.5 0-144 64.5-144 144s64.5 144 144 144 144-64.5 144-144-64.5-144-144-144zm0 224c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80z"></path>
                                        </svg>
                                    </span>
                                    <span class="ltr:ml-1 rtl:mr-1">Kaydet</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('customCSS')
    <style>
        textarea {
            min-height: 100px;
            max-height: 300px;
            height: auto;
            overflow-y: auto;
        }
    </style>
@endsection
@section('customJS')

    <script src="{{asset('admin/category.js')}}"></script>

@endsection
