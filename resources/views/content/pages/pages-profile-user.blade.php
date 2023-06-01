@extends('layouts/layoutMaster')

@section('title', 'View Profile')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
@endsection

<!-- Page -->
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
@endsection


@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-profile.js') }}"></script>
@endsection

@section('content')
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="{{ asset('assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ asset('assets/img/avatars/14.png') }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $profile_infos[0]->first_name }} {{ $profile_infos[0]->last_name }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item">
                                        <i class='ti ti-user'></i> {{ $roles[0]->name }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class='ti ti-map-pin'></i> {{ $profile_infos[0]->region }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class='ti ti-calendar'></i>
                                        {{ date('d M, Y', strtotime($profile_infos[0]->created_at)) }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="card-text text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">Full
                                Name:</span> <span>{{ $profile_infos[0]->first_name }}
                                {{ $profile_infos[0]->last_name }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span
                                class="fw-bold mx-2">Status:</span>
                            <span>{{ $profile_infos[0]->status == 1 ? 'Active' : 'Inactive' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span
                                class="fw-bold mx-2">Role:</span> <span>{{ $roles[0]->name }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-flag"></i><span
                                class="fw-bold mx-2">Region:</span> <span>{{ $profile_infos[0]->region }}</span></li>
                    </ul>
                    <small class="card-text text-uppercase">Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span
                                class="fw-bold mx-2">Contact:</span> <span>+251{{ $profile_infos[0]->phone_number }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Email:</span> <span>{{ $profile_infos[0]->email }}</span></li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Overview -->

            <!--/ Profile Overview -->
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
            <!--/ Activity Timeline -->
            <div class="row">
                <!-- Connections -->
                <div class="col-lg-12 col-xl-12">
                    <div class="card card-action mb-4">
                        <div class="card-header align-items-center">
                            <h5 class="card-action-title mb-0">Connections</h5>
                            {{-- <div class="card-action-element">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle hide-arrow p-0"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="ti ti-dots-vertical text-muted"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="javascript:void(0);">Share connections</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <div class="d-flex align-items-start">
                                            <div class="avatar me-2">
                                                <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="me-2 ms-1">
                                                <h6 class="mb-0">Cecilia Payne</h6>
                                                <small class="text-muted">45 Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-label-primary btn-icon btn-sm"><i
                                                    class="ti ti-user-check ti-xs"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <div class="d-flex align-items-start">
                                            <div class="avatar me-2">
                                                <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="me-2 ms-1">
                                                <h6 class="mb-0">Curtis Fletcher</h6>
                                                <small class="text-muted">1.32k Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-primary btn-icon btn-sm"><i
                                                    class="ti ti-user-x ti-xs"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <div class="d-flex align-items-start">
                                            <div class="avatar me-2">
                                                <img src="{{ asset('assets/img/avatars/10.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="me-2 ms-1">
                                                <h6 class="mb-0">Alice Stone</h6>
                                                <small class="text-muted">125 Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-primary btn-icon btn-sm"><i
                                                    class="ti ti-user-x ti-xs"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <div class="d-flex align-items-start">
                                            <div class="avatar me-2">
                                                <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="me-2 ms-1">
                                                <h6 class="mb-0">Darrell Barnes</h6>
                                                <small class="text-muted">456 Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-label-primary btn-icon btn-sm"><i
                                                    class="ti ti-user-check ti-xs"></i></button>
                                        </div>
                                    </div>
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <div class="d-flex align-items-start">
                                            <div class="avatar me-2">
                                                <img src="{{ asset('assets/img/avatars/12.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="me-2 ms-1">
                                                <h6 class="mb-0">Eugenia Moore</h6>
                                                <small class="text-muted">1.2k Connections</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button class="btn btn-label-primary btn-icon btn-sm"><i
                                                    class="ti ti-user-check ti-xs"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li class="text-center">
                                    <a href="javascript:;">View all connections</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ User Profile Content -->
@endsection
