@extends('layout.admin.admin')

@section('content')
    <div class="modal fade" id="customerBasic" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog dialog">
            <div class="dialog-content">
                     <span class="close-btn absolute z-10 ltr:right-6 rtl:left-6" role="button" data-bs-dismiss="modal">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20"
                             aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </span>
                <h5 class="mb-4" id="ModalTitle">Yeni Müşteri Ekle</h5>
                <form method="post" id="customerForm" action="{{route('customer.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input class="input" type="hidden" id="id" name="id" value="0">

                    <div class="form-container horizontal">
                        <div class="form-item horizontal">
                            <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">Müşteri Adı:</label>
                            <div class="w-full flex flex-col justify-center relative">
                                <input class="input" id="name" type="text" name="name">
                            </div>
                        </div>
                        <div class="form-item horizontal">
                            <label class="form-label ltr:pr-2 rtl:pl-2 min-w-[100px]">Üst Müşteri:</label>
                            <div class="w-full flex flex-col justify-center relative">
                                <select class="input" id="parent_id" name="parent_id">
                                    <option value="0">Ana Müşteri</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-item horizontal">
                            <label class="form-label min-w-[100px]"></label>
                            <div class="w-full flex flex-col justify-center relative">
                                <button class="btn btn-default" id="saveFormButton" type="submit">
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
                <h3>Müşteriler Listesi</h3>
            </div>
            <div slot="left">

            </div>
        </div>
        <div slot="right" class="float-right">
            <div class="grid grid-cols-1 gap-1">
                <button class="btn btn-sm bg-rose-600 text-white" data-bs-toggle="modal"
                        data-bs-target="#customerBasic">
                                <span class="flex items-center justify-center gap-2">
                                    <span class="text-lg">
                                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                             aria-hidden="true" height="1em" width="1em"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </span>
                                    <span id="userBasic">Yeni Faq</span>
                                </span>
                </button>
            </div>
        </div>
    </div>
        <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
            <div class="container mx-auto">
                <div class="card adaptable-card">
                    <div class="card-body">

                        <div id="DataTable" class="overflow-x-auto">
                            <table id="datatable" class="table-default table-hover data-table dataTable no-footer">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Adı Soyadı</th>
                                    <th>Telefon</th>
                                    <th>Eposta</th>
                                    <th>Durum</th>
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


@endsection

@section('customJS')

    <script src="{{asset('admin/customer.js')}}"></script>
<script>
    $('#datatable').DataTable();
</script>
@endsection
