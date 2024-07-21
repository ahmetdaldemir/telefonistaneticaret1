@extends('layout.admin.admin')

@section('content')
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="flex flex-col gap-4 dashboard">
            <div class="section g-col-lg-12">
                <div class="seller-profile-wrapper">
                    <div class="g-d-flex g-d-direction-column">
                        <div class="g-d-flex g-d-align-center g-d-direction-row">
                            <div class="g-d-flex g-d-align-center">
                                <div class="g-image brand-logo">
                                    <img data-v-63c7921a="" width="50" height="50"
                                         src="https://cdn.dsmcdn.com/seller-center/shared/header/assets/trendyol-avatar.png">
                                </div>
                                <div class="seller-info g-d-flex g-d-justify-center g-d-direction-column g-px-20">
                                    <div class="seller-name-wrapper">
                                        <span class="seller-name"> PH Accessories </span>
                                        <span class="seller-id"> (ID: 478570) </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-info-budgets-wrapper">
                        <div class="profile-budgets-wrapper">
                            <div class="first-group">
                                <a target="_blank" href="/fast-delivery/settings"
                                   class="sc-link profile-info-budget-wrapper fixed-with">
                                    <div class="label-wrapper">
                                        <div class="label highlight"> Güncel Termin Süresi</div>
                                        <div class="value highlight"> 2 Gün</div>
                                    </div>
                                </a>
                            </div>
                            <a target="_blank" href="/account/sso/lms?url=/Elearning?TrainingId=2807"
                               class="sc-link profile-info-budget-wrapper operation-status success fixed-with">
                                <div class="label-wrapper">
                                    <div class="label highlight success"> Operasyon Durumu</div>
                                    <div class="value highlight success"> Normal
                                    </div>
                                </div>
                                <div class="sub-title-wrapper"><b>0</b> siparişi bugün kargolaman gerekiyor</div>
                            </a>
                        </div>
                    </div>
                </div>
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
                                                                                <span class="avatar avatar-circle avatar-sm"
                                                                                      data-avatar-size="30"
                                                                                      data-bs-toggle="tooltip"
                                                                                      data-bs-title="Carolyn Perkins">
                                                                                    <img class="avatar-img avatar-circle"
                                                                                         src="img/avatars/thumb-1.jpg"
                                                                                         loading="lazy">
                                                                                </span>
                                                    <span class="avatar avatar-circle avatar-sm" data-avatar-size="30"
                                                          data-bs-toggle="tooltip" data-bs-title="Terrance Moreno">
                                                                                    <img class="avatar-img avatar-circle"
                                                                                         src="img/avatars/thumb-2.jpg"
                                                                                         loading="lazy">
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
                                <div class="g-bg-white g-rad-md notification-wrapper g-d-flex g-d-direction-column"
                                     style="height: 320px;">
                                    <div  class="notification-title-wrapper g-pb-10">
                                        <span  class="g-text-main-grey-500 notification-title"> Duyurularım <span class="unread-notification-count"> (5) </span></span>
                                        <a target="_blank" href="/notification-center/all" class="sc-link"   >
                                            <div class="cta-link g-text-dark-grey-500 -body g-text"  >
                                                Tüm Duyurular
                                            </div>
                                        </a>
                                    </div>
                                    <ul   class="notification-list"   >

                                        <li  class="notification-item"><a
                                                                                            target="_blank"
                                                                                            href="/notification-center/marketing_tools?id=232658243"
                                                                                            class="sc-link dashboard-notification-item">
                                                <section   class="notification-detail">
                                                    <div   class="notification-header"><span
                                                                 
                                                                class="notification-label unread-notification-label"> Pazarlama Araçları </span><span
                                                                 
                                                                class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                                    </div>
                                                    <p  
                                                       class="notification-short-desc unread-notification-short-desc">
                                                        📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                                    <p   class="notification-read-more"> Devamını
                                                        Oku </p>  </section>
                                            </a></li>
                                        <li  class="notification-item"><a
                                                    target="_blank"
                                                    href="/notification-center/marketing_tools?id=232658243"
                                                    class="sc-link dashboard-notification-item">
                                                <section   class="notification-detail">
                                                    <div   class="notification-header"><span

                                                                class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                                class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                                    </div>
                                                    <p
                                                            class="notification-short-desc unread-notification-short-desc">
                                                        📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                                    <p   class="notification-read-more"> Devamını
                                                        Oku </p>  </section>
                                            </a></li>
                                        <li  class="notification-item"><a
                                                    target="_blank"
                                                    href="/notification-center/marketing_tools?id=232658243"
                                                    class="sc-link dashboard-notification-item">
                                                <section   class="notification-detail">
                                                    <div   class="notification-header"><span

                                                                class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                                class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                                    </div>
                                                    <p
                                                            class="notification-short-desc unread-notification-short-desc">
                                                        📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                                    <p   class="notification-read-more"> Devamını
                                                        Oku </p>  </section>
                                            </a></li>
                                        <li  class="notification-item"><a
                                                    target="_blank"
                                                    href="/notification-center/marketing_tools?id=232658243"
                                                    class="sc-link dashboard-notification-item">
                                                <section   class="notification-detail">
                                                    <div   class="notification-header"><span

                                                                class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                                class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                                    </div>
                                                    <p
                                                            class="notification-short-desc unread-notification-short-desc">
                                                        📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                                    <p   class="notification-read-more"> Devamını
                                                        Oku </p>  </section>
                                            </a></li>
                                        <li  class="notification-item"><a
                                                    target="_blank"
                                                    href="/notification-center/marketing_tools?id=232658243"
                                                    class="sc-link dashboard-notification-item">
                                                <section   class="notification-detail">
                                                    <div   class="notification-header"><span

                                                                class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                                class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                                    </div>
                                                    <p
                                                            class="notification-short-desc unread-notification-short-desc">
                                                        📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                                    <p   class="notification-read-more"> Devamını
                                                        Oku </p>  </section>
                                            </a></li>
                                        <li  class="notification-item"><a
                                                    target="_blank"
                                                    href="/notification-center/marketing_tools?id=232658243"
                                                    class="sc-link dashboard-notification-item">
                                                <section   class="notification-detail">
                                                    <div   class="notification-header"><span

                                                                class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                                class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                                    </div>
                                                    <p
                                                            class="notification-short-desc unread-notification-short-desc">
                                                        📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                                    <p   class="notification-read-more"> Devamını
                                                        Oku </p>  </section>
                                            </a></li>
                                        <li  class="notification-item"><a
                                                    target="_blank"
                                                    href="/notification-center/marketing_tools?id=232658243"
                                                    class="sc-link dashboard-notification-item">
                                                <section   class="notification-detail">
                                                    <div   class="notification-header"><span

                                                                class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                                class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                                    </div>
                                                    <p
                                                            class="notification-short-desc unread-notification-short-desc">
                                                        📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                                    <p   class="notification-read-more"> Devamını
                                                        Oku </p>  </section>
                                            </a></li>
                                        <li  class="notification-item"><a
                                                    target="_blank"
                                                    href="/notification-center/marketing_tools?id=232658243"
                                                    class="sc-link dashboard-notification-item">
                                                <section   class="notification-detail">
                                                    <div   class="notification-header"><span

                                                                class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                                class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                                    </div>
                                                    <p
                                                            class="notification-short-desc unread-notification-short-desc">
                                                        📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                                    <p   class="notification-read-more"> Devamını
                                                        Oku </p>  </section>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

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

@endsection
@section('customCSS')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/dashboard.css')}}">

@endsection
@section('customJS')

    <!-- Other Vendors JS -->
    <script src="{{asset('admin/vendors/apexcharts/apexcharts.js')}}"></script>

    <!-- Page js -->
    <script src="{{asset('admin/js/pages/project-dashboard.js')}}"></script>
@endsection
