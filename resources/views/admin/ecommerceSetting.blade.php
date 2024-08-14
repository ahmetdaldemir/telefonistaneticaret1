@extends('layout.admin.admin')

@section('content')

    <div class="subbanner alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
        <div class="alert-content">
            <div>
                <h3>Hesap Bilgileri / Ayarlar</h3>
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
                <div class="card-body">
                    <div class="tabs">
                        <div role="tablist" class="tab-list tab-list-underline">
                            <a href="{{route('ecommerceSetting.index',['tab' => 'CompanyInformation'])}}" class="tab-nav tab-nav-underline active" data-bs-toggle="tab" data-bs-target="#CompanyInformation-home-tab-pane" role="tab" aria-selected="true" tabindex="0">
                                Firma Bilgileri
                            </a>
                            <a href="{{route('ecommerceSetting.index',['tab' => 'contractAndDocuments'])}}"  class="tab-nav tab-nav-underline" data-bs-toggle="tab" data-bs-target="#contractAndDocuments-profile-tab-pane" role="tab" aria-selected="false" tabindex="0">
                                Sözleşmeler
                            </a>
                            <a href="{{route('ecommerceSetting.index',['tab' => 'AddressAndContact'])}}"  class="tab-nav tab-nav-underline" data-bs-toggle="tab" data-bs-target="#AddressAndContact-contact-tab-pane" role="tab" aria-selected="false" tabindex="0">
                                Adres Ve İletişim Bilgileri
                            </a>
                            <a href="{{route('ecommerceSetting.index',['tab' => 'imageResize'])}}"  class="tab-nav tab-nav-underline" data-bs-toggle="tab" data-bs-target="#imageResize-contact-tab-pane" role="tab" aria-selected="false" tabindex="0">
                                Resim Ölçüleri
                            </a>
                            <a href="{{route('ecommerceSetting.index',['tab' => 'siteInformation'])}}"  class="tab-nav tab-nav-underline" data-bs-toggle="tab" data-bs-target="#siteInformation-contact-tab-pane" role="tab" aria-selected="false" tabindex="0">
                                Site Bilgileri
                            </a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="CompanyInformation-home-tab-pane" role="tabpanel" aria-labelledby="CompanyInformation-tab" tabindex="0">
                                  @include('admin.settings.companyInformation')
                             </div>
                            <div class="tab-pane fade" id="contractAndDocuments-profile-tab-pane" role="tabpanel" aria-labelledby="contractAndDocuments-tab" tabindex="0">
                                @include('admin.settings.contractAndDocuments')
                            </div>
                            <div class="tab-pane fade" id="AddressAndContact-contact-tab-pane" role="tabpanel" aria-labelledby="AddressAndContact-tab" tabindex="0">
                                @include('admin.settings.addressAndContact')
                            </div>
                            <div class="tab-pane fade" id="imageResize-contact-tab-pane" role="tabpanel" aria-labelledby="imageResize-tab" tabindex="0">
                                @include('admin.settings.imageResize')
                            </div>
                            <div class="tab-pane fade" id="siteInformation-contact-tab-pane" role="tabpanel" aria-labelledby="siteInformation-tab" tabindex="0">
                                @include('admin.settings.siteInformation')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customCSS')
    <style>
        .info-card-wrapper  {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #f1f2f7;
            border-radius: 6px 6px 0 0;
        }
        .alert {
            position: relative;
            margin-bottom: 1rem;
            display: flex;
            border-radius: 0.5rem;
            padding: 1rem;
            font-weight: 600;
            border: 1px solid #0095ff;
            font-size: 12px;
        }
    </style>
@endsection
@section('customJS')
    <script type="module" src="{{asset('admin/ecommerceSetting.js')}}"></script>
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
