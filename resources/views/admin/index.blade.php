@extends('layout.admin.admin')

@section('content')

    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="flex flex-col gap-4 h-full">
            <div class="section g-col-lg-12" style="box-shadow: 1px 2px 8px 1px #ccc;">
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
                                        <div class="seller-name"> PH Accessories</div>
                                        <div class="seller-id"> (ID: 478570)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-info-budgets-wrapper">
                        <div class="profile-budgets-wrapper">
                            <div class="first-group">
                                <a target="_blank" href="#"
                                   class="sc-link profile-info-budget-wrapper fixed-with">
                                    <div class="label-wrapper">
                                        <div class="label highlight"> Güncel Termin Süresi</div>
                                        <div class="value highlight"> 2 Gün</div>
                                    </div>
                                </a>
                                <a target="_blank" href="#"
                                   class="sc-link profile-info-budget-wrapper operation-status success fixed-with">
                                    <div class="label-wrapper">
                                        <div class="label highlight success"> Operasyon Durumu</div>
                                        <div class="value highlight success"> Normal
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:items-center gap-3">



                            <span class="input-wrapper">
                                      <div class="input-group input-daterange">
                                          <div >
                                              <label>Başlangıç Tarihi</label>
                                            <input type="text"
                                                   class="input p-4 rounded-md text-left font-semibold shadow-lg"
                                                   name="start_date"
                                                   value="{{\Carbon\Carbon::today()->subDay(7)->format('d-m-Y')}}">
                                        </div>
                                          <div class="ml-2">
                                               <label>Bitiş Tarihi</label>
                                             <input type="text"
                                                    class="input p-4 rounded-md text-left font-semibold shadow-lg"
                                                    name="end_date"
                                                    value="{{\Carbon\Carbon::today()->format('d-m-Y')}}">
                                     </div>
                                        </div>

                            </span>
                        <button class="btn bg-rose-600 hover:bg-rose-500 active:bg-rose-700 text-white" id="filter" >
                            <span class="flex items-center justify-center">
                                <span class="text-lg">
                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                         aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                    </svg>
                                </span>
                                <span class="ltr:ml-1 rtl:mr-1">Filtrele</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="card card-layout-frame">
                    <div class="card-body">
                        <h6 class="font-semibold mb-4 text-sm">Toplam Satış Tutarı</h6>
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-bold">
                                    <span>{{\App\Models\Order::sum('total_price')}}  ₺</span>
                                </h3>
                            </div>
                            <div class="tag gap-1 font-bold border-0 text-emerald-600 dark:text-emerald-400 bg-emerald-100 dark:bg-emerald-500/20 dark:text-emerald-100">
                                     <span>
                                         <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                              viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em"
                                              xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd"
                                                   d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                                                   clip-rule="evenodd"></path>
                                         </svg>
                                     </span>
                                <span>11.4%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-layout-frame">
                    <div class="card-body">
                        <h6 class="font-semibold mb-4 text-sm">Toplam Sipariş Adedi</h6>
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-bold">
                                    <span>{{\App\Models\Order::all()->count()}}</span>
                                </h3>
                            </div>
                            <div class="tag gap-1 font-bold border-0 text-red-600 dark:text-red-500 bg-red-100 dark:bg-red-500/20 dark:text-red-100">
                                  <span>
                                      <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                           viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em"
                                           xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd"
                                                d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                      </svg>
                                  </span>
                                <span>-3.2%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-layout-frame">
                    <div class="card-body">
                        <h6 class="font-semibold mb-4 text-sm">Yeni Sipariş Adedi</h6>
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-bold">
                                    <span>{{\App\Models\Order::where('order_status','WAIT')->count()}}</span>
                                </h3>
                            </div>
                            <div class="tag gap-1 font-bold border-0 text-red-600 dark:text-red-500 bg-red-100 dark:bg-red-500/20 dark:text-red-100">
                                  <span>
                                      <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                           viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em"
                                           xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd"
                                                d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                      </svg>
                                  </span>
                                <span>-3.2%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="card card-layout-frame col-span-2">
                    <div class="card-body">
                        <div class="flex items-center justify-between mb-6">
                            <h4>Son Siparişler</h4>
                            <button class="btn btn-sm btn-default">Tüm Siparişler</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table-default table-hover">
                                <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Profile Progress</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="cursor-pointer select-none font-semibold hover:text-indigo-600">#95954</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="badge-dot bg-emerald-500"></span>
                                            <span class="ml-2 rtl:mr-2 capitalize font-semibold text-emerald-500">Paid</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span>10/08/2022</span>
                                    </td>
                                    <td>Ron Vargas</td>
                                    <td>
                                        <span>$168.00</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="cursor-pointer select-none font-semibold hover:text-indigo-600">#95423</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="badge-dot bg-emerald-500"></span>
                                            <span class="ml-2 rtl:mr-2 capitalize font-semibold text-emerald-500">Paid</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span>30/07/2022</span>
                                    </td>
                                    <td>Carolyn Hanso</td>
                                    <td>
                                        <span>$523.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="cursor-pointer select-none font-semibold hover:text-indigo-600">#92903</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="badge-dot bg-amber-500"></span>
                                            <span class="ml-2 rtl:mr-2 capitalize font-semibold text-amber-500">Pending</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span>18/07/2022</span>
                                    </td>
                                    <td>Gabriella May</td>
                                    <td>
                                        <span>$81.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="cursor-pointer select-none font-semibold hover:text-indigo-600">#92627</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="badge-dot bg-red-500"></span>
                                            <span class="ml-2 rtl:mr-2 capitalize font-semibold text-red-500">Failed</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span>09/07/2022</span>
                                    </td>
                                    <td>Tara Fletcher</td>
                                    <td>
                                        <span>$279.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="cursor-pointer select-none font-semibold hover:text-indigo-600">#89332</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="badge-dot bg-emerald-500"></span>
                                            <span class="ml-2 rtl:mr-2 capitalize font-semibold text-emerald-500">Paid</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span>02/06/2022</span>
                                    </td>
                                    <td>Eileen Horton</td>
                                    <td>
                                        <span>$597.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="cursor-pointer select-none font-semibold hover:text-indigo-600">#86497</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="badge-dot bg-red-500"></span>
                                            <span class="ml-2 rtl:mr-2 capitalize font-semibold text-red-500">Failed</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span>19/03/2022</span>
                                    </td>
                                    <td>Lloyd Obrien</td>
                                    <td>
                                        <span>$189.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="cursor-pointer select-none font-semibold hover:text-indigo-600">#86212</span>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="badge-dot bg-emerald-500"></span>
                                            <span class="ml-2 rtl:mr-2 capitalize font-semibold text-emerald-500">Paid</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span>09/03/2022</span>
                                    </td>
                                    <td>Tara Fletcher</td>
                                    <td>
                                        <span>$672.00</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-layout-frame col-span-1">
                    <div class="card-body">
                        <div class="g-bg-white g-rad-md notification-wrapper g-d-flex g-d-direction-column">
                            <div class="notification-title-wrapper g-pb-10">
                                <span class="g-text-main-grey-500 notification-title"> Duyurularım <span
                                            class="unread-notification-count"> (5) </span></span>
                                <a target="_blank" href="/notification-center/all" class="sc-link">
                                    <div class="cta-link g-text-dark-grey-500 -body g-text">
                                        Tüm Duyurular
                                    </div>
                                </a>
                            </div>
                            <ul class="notification-list">
                                <li class="notification-item"><a
                                            target="_blank"
                                            href="/notification-center/marketing_tools?id=232658243"
                                            class="sc-link dashboard-notification-item">
                                        <section class="notification-detail">
                                            <div class="notification-header"><span

                                                        class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                        class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                            </div>
                                            <p
                                                    class="notification-short-desc unread-notification-short-desc">
                                                📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                            <p class="notification-read-more"> Devamını
                                                Oku </p></section>
                                    </a></li>
                                <li class="notification-item"><a
                                            target="_blank"
                                            href="/notification-center/marketing_tools?id=232658243"
                                            class="sc-link dashboard-notification-item">
                                        <section class="notification-detail">
                                            <div class="notification-header"><span

                                                        class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                        class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                            </div>
                                            <p
                                                    class="notification-short-desc unread-notification-short-desc">
                                                📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                            <p class="notification-read-more"> Devamını
                                                Oku </p></section>
                                    </a></li>
                                <li class="notification-item"><a
                                            target="_blank"
                                            href="/notification-center/marketing_tools?id=232658243"
                                            class="sc-link dashboard-notification-item">
                                        <section class="notification-detail">
                                            <div class="notification-header"><span

                                                        class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                        class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                            </div>
                                            <p
                                                    class="notification-short-desc unread-notification-short-desc">
                                                📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                            <p class="notification-read-more"> Devamını
                                                Oku </p></section>
                                    </a></li>
                                <li class="notification-item"><a
                                            target="_blank"
                                            href="/notification-center/marketing_tools?id=232658243"
                                            class="sc-link dashboard-notification-item">
                                        <section class="notification-detail">
                                            <div class="notification-header"><span

                                                        class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                        class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                            </div>
                                            <p
                                                    class="notification-short-desc unread-notification-short-desc">
                                                📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                            <p class="notification-read-more"> Devamını
                                                Oku </p></section>
                                    </a></li>
                                <li class="notification-item"><a
                                            target="_blank"
                                            href="/notification-center/marketing_tools?id=232658243"
                                            class="sc-link dashboard-notification-item">
                                        <section class="notification-detail">
                                            <div class="notification-header"><span

                                                        class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                        class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                            </div>
                                            <p
                                                    class="notification-short-desc unread-notification-short-desc">
                                                📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                            <p class="notification-read-more"> Devamını
                                                Oku </p></section>
                                    </a></li>
                                <li class="notification-item"><a
                                            target="_blank"
                                            href="/notification-center/marketing_tools?id=232658243"
                                            class="sc-link dashboard-notification-item">
                                        <section class="notification-detail">
                                            <div class="notification-header"><span

                                                        class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                        class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                            </div>
                                            <p
                                                    class="notification-short-desc unread-notification-short-desc">
                                                📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                            <p class="notification-read-more"> Devamını
                                                Oku </p></section>
                                    </a></li>
                                <li class="notification-item"><a
                                            target="_blank"
                                            href="/notification-center/marketing_tools?id=232658243"
                                            class="sc-link dashboard-notification-item">
                                        <section class="notification-detail">
                                            <div class="notification-header"><span

                                                        class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                        class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                            </div>
                                            <p
                                                    class="notification-short-desc unread-notification-short-desc">
                                                📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                            <p class="notification-read-more"> Devamını
                                                Oku </p></section>
                                    </a></li>
                                <li class="notification-item"><a
                                            target="_blank"
                                            href="/notification-center/marketing_tools?id=232658243"
                                            class="sc-link dashboard-notification-item">
                                        <section class="notification-detail">
                                            <div class="notification-header"><span

                                                        class="notification-label unread-notification-label"> Pazarlama Araçları </span><span

                                                        class="notification-date unread-notification-date"> 14.07.2024 14:02 </span>
                                            </div>
                                            <p
                                                    class="notification-short-desc unread-notification-short-desc">
                                                📢 ⏳ Hediye Bakiyenizi Kullanmayı Unutmayın! </p>
                                            <p class="notification-read-more"> Devamını
                                                Oku </p></section>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="card card-layout-frame col-span-2">
                    <div class="card-body">
                        <div class="flex items-center justify-between">
                            <h4>Satış Grafiği</h4>
                        </div>
                        <div id="sales-chart" style="min-height: 395px;"></div>
                    </div>
                </div>
                <div class="card card-layout-frame">
                    <div class="card-body">
                        <div class="grid grid-cols-1 gap-1   mx-auto">
                            <img src="{{asset('admin/img/update-product-easy-v1.webp')}}" alt=""/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('customCSS')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/dashboard.css')}}">
    <style>
        #SvgjsSvg1185 {
            width: 100% !important;
        }
    </style>
@endsection
@section('customJS')
    <script>

        $('.input-daterange input').each(function () {
            $(this).datepicker({
                language: 'tr',
                format: 'dd-mm-yyyy',
                autoclose: true
            });
        });

    </script>
    <!-- Other Vendors JS -->
    <script src="{{asset('admin/vendors/apexcharts/apexcharts.js')}}"></script>

    <!-- Page js -->
    <script src="{{asset('admin/dashboard.js')}}"></script>

@endsection
