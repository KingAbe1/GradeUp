@extends('layouts/layoutMaster')

@section('title', 'Manage Users')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-user-list.js') }}"></script>
    @if (session('user_status'))
        <script>
            Swal.fire({
                title: 'Well Done!',
                text: "{{ session('user_status') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Home /</span> Manage User
    </h4>
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Total Users</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $total }}</h4>
                                {{-- <span class="text-success">(+29%)</span> --}}
                            </div>
                            {{-- <span>Total Users</span> --}}
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="ti ti-user ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Teachers</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ count($teachers) }}</h4>
                                {{-- <span class="text-danger">(-14%)</span> --}}
                            </div>
                            {{-- <span>Last week analytics</span> --}}
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="ti ti-user ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Students</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ count($students) }}</h4>
                                {{-- <span class="text-success">(+18%)</span> --}}
                            </div>
                            {{-- <span>Last week analytics </span> --}}
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="ti ti-school ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Newcomer</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ count($newcomers) }}</h4>
                                {{-- <span class="text-success">(+42%)</span> --}}
                            </div>
                            {{-- <span>Last week analytics</span> --}}
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="ti ti-user-check ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Search Filter</h5>
            <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                <div class="col-md-4 user_role"></div>
                <div class="col-md-4 user_plan"></div>
                <div class="col-md-4 user_status"></div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Mobile Number</th>
                        <th>Region</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = 1;
                    @endphp
                    @foreach ($user_lists as $total_user)
                        <tr>
                            <td>{{ $id }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3">
                                            <img src="{{ $total_user->profile_photo_url == null ? $total_user->profile_photo_url : asset('assets/img/avatars/user.png') }}"
                                                alt="Avatar" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="/pages/profile-user/{{ $total_user->id }}"
                                            class="text-body text-truncate"><span class="fw-semibold">
                                                {{ $total_user->first_name }} {{ $total_user->last_name }}
                                            </span></a>
                                        <small class="text-muted">
                                            {{ $total_user->email }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <th>+251{{ $total_user->phone }}</th>
                            <th>{{ $total_user->region }}</th>
                            <td>
                                @if ($total_user->role_name == 'Student')
                                    Student
                                @elseif($total_user->role_name == 'Teacher')
                                    Teacher
                                @endif
                            </td>

                            @if ($total_user->status == 1)
                                <td>
                                    <span class="badge bg-label-success">Active</span>
                                </td>
                            @else
                                <td>
                                    <span class="badge bg-label-danger">Inactive</span>
                                </td>
                            @endif
                            <td>{{ date('d M, Y', strtotime($total_user->created_at)) }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span data-bs-toggle='tooltip' data-bs-html='true' title='View Profile'>
                                        <a href="/pages/profile-user/{{ $total_user->id }}"
                                            class="text-body  view-record"><i class="ti ti-eye mx-2"></i></a>
                                    </span>
                                    @if ($total_user->status == 1)
                                        <a href="/app/user/list/{{ $total_user->id }}" class="text-body suspend-record">
                                            <span data-bs-toggle='tooltip' data-bs-html='true' title='Ban'>
                                                <i class="fa-solid fa-ban mt-2"></i>
                                            </span>
                                        </a>
                                    @else
                                        <a href="/app/user/list/{{ $total_user->id }}" class="text-body activate-record">
                                            <span data-bs-toggle='tooltip' data-bs-html='true' title='Activate'>
                                                <i class="fa-solid fa-check mt-2"></i>
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @php
                            $id++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Offcanvas to add new user -->
        {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label" for="add-user-fullname">Full Name</label>
                        <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe"
                            name="userFullname" aria-label="John Doe" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com"
                            aria-label="john.doe@example.com" name="userEmail" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-contact">Contact</label>
                        <input type="text" id="add-user-contact" class="form-control phone-mask"
                            placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-company">Company</label>
                        <input type="text" id="add-user-company" class="form-control" placeholder="Web Developer"
                            aria-label="jdoe1" name="companyName" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="country">Country</label>
                        <select id="country" class="select2 form-select">
                            <option value="">Select</option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="user-role">User Role</label>
                        <select id="user-role" class="form-select">
                            <option value="subscriber">Subscriber</option>
                            <option value="editor">Editor</option>
                            <option value="maintainer">Maintainer</option>
                            <option value="author">Author</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="user-plan">Select Plan</label>
                        <select id="user-plan" class="form-select">
                            <option value="basic">Basic</option>
                            <option value="enterprise">Enterprise</option>
                            <option value="company">Company</option>
                            <option value="team">Team</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </form>
            </div>
        </div> --}}
    </div>
@endsection
