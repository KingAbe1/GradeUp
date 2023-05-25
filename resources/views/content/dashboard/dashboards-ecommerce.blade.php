@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-ecommerce.js') }}"></script>
@endsection

@section('content')
    @if (Auth::user()->role_id == 1)
        <div class="row">
            <!-- View sales -->
            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Welcome {{ Auth::user()->first_name }}
                                    {{ Auth::user()->last_name }}! 🎉</h5>
                                <p class="mb-2">
                                    {{ Auth::user()->role_id == 1 ? 'Super Admin' : (Auth::user()->role_id == 2 ? 'Student' : 'Teacher') }}
                                </p>
                                {{-- <h4 class="text-primary mb-1">$48.9k</h4>
                            <a href="javascript:;" class="btn btn-primary">View Sales</a> --}}
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}" height="140"
                                    alt="view sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View sales -->

            <!-- Statistics -->
            <div class="col-xl-8 mb-4 col-lg-7 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Statistics</h5>
                            {{-- <small class="text-muted">Updated 1 month ago</small> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                            class="ti ti-chart-pie-2 ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">230k</h5>
                                        <small>Users</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">8.549k</h5>
                                        <small>Students</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2"><i
                                            class="ti ti-shopping-cart ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">1.423k</h5>
                                        <small>Teachers</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2"><i
                                            class="ti ti-currency-dollar ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">$9745</h5>
                                        <small>Revenue</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics -->

            <div class="col-xl-4 col-12">
                <div class="row">
                    {{-- <!-- Expenses -->
                <div class="col-xl-6 mb-4 col-md-3 col-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="card-title mb-0">82.5k</h5>
                            <small class="text-muted">Expenses</small>
                        </div>
                        <div class="card-body">
                            <div id="expensesChart"></div>
                            <div class="mt-md-2 text-center mt-lg-3 mt-3">
                                <small class="text-muted mt-3">$21k Expenses more than last month</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Expenses --> --}}

                    <!-- Profit last month -->
                    <div class="col-xl-12 mb-4 col-md-3 col-6">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0">Profit</h5>
                                <small class="text-muted">Last Month</small>
                            </div>
                            <div class="card-body">
                                <div id="profitLastMonth"></div>
                                <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                                    <h4 class="mb-0">624k</h4>
                                    <small class="text-success">+8.24%</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Profit last month -->

                    <!-- Generated Leads -->
                    <div class="col-xl-12 mb-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <div class="card-title mb-auto">
                                            <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                                            <small>Monthly Report</small>
                                        </div>
                                        <div class="chart-statistics">
                                            <h3 class="card-title mb-1">4,350</h3>
                                            <small class="text-success text-nowrap fw-semibold"><i
                                                    class='ti ti-chevron-up me-1'></i> 15.8%</small>
                                        </div>
                                    </div>
                                    <div id="generatedLeadsChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Generated Leads -->
                </div>
            </div>

            <!-- Revenue Report -->
            <div class="col-12 col-xl-8 mb-4 col-lg-7">
                <div class="card">
                    <div class="card-header pb-3 ">
                        <h5 class="m-0 me-2 card-title">Yearly Revenue Report</h5>
                    </div>
                    <div class="card-body">
                        <div class="row row-bordered g-0">
                            <div class="col-md-12">
                                <div id="totalRevenueChart"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->role_id == 2)
        <div class="row">
            <!-- Last Transaction -->
            <div class="col-5">
                <div class="row">
                    <div class="col-xl-12 mb-4 col-lg-5 col-12">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-7">
                                    <div class="card-body text-nowrap">
                                        <h5 class="card-title mb-0">Welcome {{ Auth::user()->first_name }}
                                            {{ Auth::user()->last_name }}! 🎉</h5>
                                        <p class="mb-2">
                                            {{ Auth::user()->role_id == 1 ? 'Super Admin' : (Auth::user()->role_id == 2 ? 'Student' : 'Teacher') }}
                                        </p>
                                        <p>Grade {{ Auth::user()->grade }} <br>{{ Auth::user()->region }} ,Ethiopia</p>
                                    </div>
                                </div>
                                <div class="col-5 text-center text-sm-left">
                                    <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}"
                                            height="140" alt="view sales">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="badge rounded-pill p-2 bg-label-primary mb-3"><i
                                        class="ti ti-users ti-sm"></i>
                                </div>
                                <h5 class="card-title mb-3">97.8k</h5>
                                <small>Connects</small>
                                <br>
                                <small class="text-muted">Updated 1 second ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Subscription Plan Tracker</h5>
                            <small class="text-muted">Last paid on 13 Mar, 2023</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="supportTrackerMenu" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="supportTrackerMenu">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                                <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                    <h1 class="mb-0 text-danger">12</h1>
                                    <p class="mb-0">Days left before subscription expires</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                <div id="supportTracker"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title m-0 me-2">Last Transaction</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="teamMemberList" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList">
                                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless border-top">
                            <thead class="border-bottom">
                                <tr>
                                    <th>CARD</th>
                                    <th>DATE</th>
                                    <th>STATUS</th>
                                    <th>TREND</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="me-3">
                                                <img src="{{ asset('assets/img/icons/payments/visa-img.png') }}"
                                                    alt="Visa" height="30">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="mb-0 fw-semibold">*4230</p><small
                                                    class="text-muted">Credit</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <p class="mb-0 fw-semibold">Sent</p>
                                            <small class="text-muted text-nowrap">17 Mar 2022</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success">Verified</span></td>
                                    <td>
                                        <p class="mb-0 fw-semibold">+$1,678</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="me-3">
                                                <img src="{{ asset('assets/img/icons/payments/master-card-img.png') }}"
                                                    alt="Visa" height="30">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="mb-0 fw-semibold">*5578</p><small
                                                    class="text-muted">Credit</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <p class="mb-0 fw-semibold">Sent</p>
                                            <small class="text-muted text-nowrap">12 Feb 2022</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-danger">Rejected</span></td>
                                    <td>
                                        <p class="mb-0 fw-semibold">-$839</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="me-3">
                                                <img src="{{ asset('assets/img/icons/payments/american-express-img.png') }}"
                                                    alt="Visa" height="30">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="mb-0 fw-semibold">*4567</p><small
                                                    class="text-muted">Credit</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <p class="mb-0 fw-semibold">Sent</p>
                                            <small class="text-muted text-nowrap">28 Feb 2022</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success">Verified</span></td>
                                    <td>
                                        <p class="mb-0 fw-semibold">+$435</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="me-3">
                                                <img src="{{ asset('assets/img/icons/payments/visa-img.png') }}"
                                                    alt="Visa" height="30">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="mb-0 fw-semibold">*5699</p><small
                                                    class="text-muted">Credit</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <p class="mb-0 fw-semibold">Sent</p>
                                            <small class="text-muted text-nowrap">8 Jan 2022</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-secondary">Pending</span></td>
                                    <td>
                                        <p class="mb-0 fw-semibold">+$2,345</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="me-3">
                                                <img src="{{ asset('assets/img/icons/payments/visa-img.png') }}"
                                                    alt="Visa" height="30">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="mb-0 fw-semibold">*5699</p><small
                                                    class="text-muted">Credit</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <p class="mb-0 fw-semibold">Sent</p>
                                            <small class="text-muted text-nowrap">8 Jan 2022</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-danger">Rejected</span></td>
                                    <td>
                                        <p class="mb-0 fw-semibold">-$234</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
