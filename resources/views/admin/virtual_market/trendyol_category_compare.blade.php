@extends('layout.admin.admin')

@section('content')
    <style>
        .category-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
        }
        .select2-container {
            width: 100% !important; /* Genişliği ayarlar */
        }
        .select2-selection {
            height: auto !important; /* Yüksekliği otomatik yapar */
            min-height: 34px; /* Minimum yüksekliği belirler */
        }
    </style>
    <main class="h-full">
        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="container mx-auto">
                <div class="card adaptable-card">
                    <div class="card-body">
                        <div class="lg:flex items-center justify-between mb-4">
                            <h3 class="mb-4 lg:mb-0">Sanal Pazarlar</h3>
                        </div>
                        <div class="overflow-x-auto">


                            <div class="grid grid-flow-row-dense grid-cols-2 grid-rows-2">
                                <div
                                    class="card hover:shadow-lg transition duration-150 ease-in-out card-border cursor-pointer user-select-none"
                                    role="presentation">

                                    <div class="col-span-2">
                                        <div class="card-body">
                                            <h5>Sanalpazar KAtegorileri</h5>
                                            <select id="trendyol-categories" class="form-control select2">
                                                <!-- Trendyol kategorileri buraya gelecek -->
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="card hover:shadow-lg transition duration-150 ease-in-out card-border cursor-pointer user-select-none"
                                    role="presentation">

                                    <div class="col-span-2">
                                        <div class="card-body">
                                            <h5>Site Kategorileri</h5>
                                            <select id="my-categories" class="form-control select2">
                                                <!-- Kullanıcı kategorileri buraya gelecek -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button id="match-categories" class="btn btn-sm bg-rose-600 text-white">KAYDET</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="DataTable" class="overflow-x-auto">

                            <table id="datatable" class="table-default table-hover data-table dataTable no-footer">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>Üst Kategori</th>
                                    <th>V. Kat. ID</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
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

     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script type="module" src="{{asset('admin/virtualMarket.js')}}"></script>

@endsection
