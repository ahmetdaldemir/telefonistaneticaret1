@extends('layout.admin.admin')

@section('content')
    <div class="subbanner alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
        <div class="alert-content">
            <div>
                <h3>Kategoriler</h3>
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
            <div>Binlerce Kategori arasından kategorilerinizi dakikalar içerisinde ekleyebilirsiniz. Özellik ve varyant sistemi kategorilerinize göre otomatik olarak optimize edilecektir.</div>
        </div>
    </div>

    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <form>
               <div class="grid grid-cols-3 gap-4">
                   <div class="grid grid-rows-2 col-span-2 gap-4">
                       <div class="card adaptable-card">
                           <div class="card-body">
                               <div class="flex flex-col gap-4">
                                   <label for="category_search">Kategori Adı</label>
                                   <input class="input input-lg" id="category_search" type="text" placeholder="Kategori Ara">
                               </div>
                           </div>
                       </div>
                       <div class="card adaptable-card">
                           <div class="card-body">
                               <div class="flex flex-col gap-4">
                                   <label for="seo_name">Seo Optimizasyonu</label>
                                   <input class="input input-lg" id="seo_name" type="text">
                                   <label>
                                       <textarea class="input input-textarea" placeholder="Açıklama"></textarea>
                                       <textarea class="input input-textarea" placeholder="Anahtar Kelimeler"></textarea>

                                   </label>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="grid grid-rows-4 gap-4">
                       <div class="card adaptable-card">
                           <div class="card-body">
                               <div class="flex flex-col gap-4">
                                   <label for="category_search">Durum</label>
                                   <label class="switcher">
                                       <input type="checkbox"  checked>
                                       <span class="switcher-toggle"></span>
                                   </label>
                               </div>
                           </div>
                       </div>
                       <div class="card adaptable-card">
                           <div class="card-body">
                               <div class="flex flex-col gap-4">
                                   <label for="category_search">Üst Kategori</label>
                                   <div class="input-group mb-4">
                                       <input class="input" type="text" placeholder="Kategori Ara">
                                       <button class="button bg-white border border-gray-300 dark:bg-gray-700 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 active:bg-gray-100 dark:active:bg-gray-500 dark:active:border-gray-500 text-gray-600 dark:text-gray-100 radius-round h-11 w-11 inline-flex items-center justify-center text-xl">
                                           <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
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
                                   <input class="input input-lg" id="category_search" type="file" placeholder="Kategori Ara">
                               </div>
                           </div>
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
