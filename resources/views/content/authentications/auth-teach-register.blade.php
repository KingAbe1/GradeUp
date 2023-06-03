@php
    $customizerHidden = 'customizer-hide';
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Registration')

@section('vendor-style')
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('vendor-script')
    <script>
        $(document).ready(function() {
            // Get the select element
            var selectElement = $("#multiStepsTeachBefore");
            var selectElemen2 = $("#choice_education");

            $("#grade_teach").hide();
            $("#school_teach_name").hide();

            $("#edu_level").hide();
            $("#major").hide();
            $("#up_temp").hide();
            $("#uni_coll_name").hide();


            // Add a change event listener
            selectElement.on("change", function() {

                // Get the value of the selected option
                var value = $(this).val();

                // Do something with the value
                if (value == 'no') {
                    $("#grade_teach").hide();
                    $("#school_teach_name").hide();
                } else if (value == 'yes') {
                    $("#grade_teach").show();
                    $("#school_teach_name").show();
                } else {
                    $("#grade_teach").hide();
                    $("#school_teach_name").hide();
                }
            });


            selectElemen2.on("change", function() {

                // Get the value of the selected option
                var value = $(this).val();

                // Do something with the value
                if (value == 'no') {
                    $("#edu_level").hide();
                    $("#major").hide();
                    $("#uni_coll_name").hide();
                    $("#up_temp").hide();
                } else if (value == 'yes') {
                    $("#edu_level").show();
                    $("#major").show();
                    $("#uni_coll_name").show();
                    $("#up_temp").show();
                } else {
                    $("#edu_level").hide();
                    $("#major").hide();
                    $("#uni_coll_name").hide();
                    $("#up_temp").hide();
                }
            });

        });
    </script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-auth-teach-multisteps.js') }}"></script>
@endsection

@section('content')
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">

            <!-- Left Text -->
            <div
                class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center p-5 auth-cover-bg-color position-relative auth-multisteps-bg-height">
                <img src="{{ asset('assets/img/illustrations/auth-register-multisteps-illustration.png') }}"
                    alt="auth-register" class="img-fluid" width="280">

                <img src="{{ asset('assets/img/illustrations/bg-shape-image-' . $configData['style'] . '.png') }}"
                    alt="auth-register" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"
                    data-app-dark-img="illustrations/bg-shape-image-dark.png">
            </div>
            <!-- /Left Text -->

            <!--  Multi Steps Registration -->
            <div class="d-flex col-lg-8 align-items-center justify-content-center p-sm-5 p-3">
                <div class="w-px-700 ">
                    <div id="multiStepsValidation" class="bs-stepper shadow-none">
                        <div class="bs-stepper-header border-bottom-0 align-items-center justify-content-center">
                            <div class="step" data-target="#accountDetailsValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="ti ti-smart-home ti-sm"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Account</span>
                                        <span class="bs-stepper-subtitle">Account Details</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="ti ti-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#personalInfoValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="ti ti-users ti-sm"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Personal</span>
                                        <span class="bs-stepper-subtitle">Enter Information</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form method="POST" action="{{ route('auth-register-students') }}" id="multiStepsForm"
                                onSubmit="return false">
                                @csrf
                                <!-- Account Details -->
                                <div id="accountDetailsValidation" class="content">
                                    <div class="content-header mb-4">
                                        <h3 class="mb-1">Account Information</h3>
                                        <p>Enter Your Account Details</p>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsUsername">Username</label>
                                            <input type="text" name="multiStepsUsername" id="multiStepsUsername"
                                                class="form-control" placeholder="AbelLe" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsEmail">Email</label>
                                            <input type="email" name="multiStepsEmail" id="multiStepsEmail"
                                                class="form-control" placeholder="abelle@gmail.com" aria-label="john.doe" />
                                        </div>
                                        <div class="col-sm-6 form-password-toggle">
                                            <label class="form-label" for="multiStepsPass">Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="multiStepsPass" name="multiStepsPass"
                                                    class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="multiStepsPass2" />
                                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i
                                                        class="ti ti-eye-off"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-password-toggle">
                                            <label class="form-label" for="multiStepsConfirmPass">Confirm Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="multiStepsConfirmPass"
                                                    name="multiStepsConfirmPass" class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="multiStepsConfirmPass2" />
                                                <span class="input-group-text cursor-pointer"
                                                    id="multiStepsConfirmPass2"><i class="ti ti-eye-off"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev" disabled> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next"> <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                                                <i class="ti ti-arrow-right ti-xs"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal Info -->
                                <div id="personalInfoValidation" class="content">
                                    <div class="content-header mb-4">
                                        <h3 class="mb-1">Personal Information</h3>
                                        <p>Enter Your Personal Information</p>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsFirstName">First Name</label>
                                            <input type="text" id="multiStepsFirstName" name="multiStepsFirstName"
                                                class="form-control" placeholder="Abel" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsLastName">Last Name</label>
                                            <input type="text" id="multiStepsLastName" name="multiStepsLastName"
                                                class="form-control" placeholder="Legesse" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsMobile">Mobile Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text">ET (+251)</span>
                                                <input type="text" id="multiStepsMobile" name="multiStepsMobile"
                                                    class="form-control" placeholder="956395579" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsCity">Region</label>
                                            <select id="multiStepsCity" name="multiStepsCity"
                                                class="select2 form-control">
                                                <option value="Addis Ababa">Addis Ababa Region</option>
                                                <option value="Tigray">Tigray Region</option>
                                                <option value="Amhara">Amhara Region</option>
                                                <option value="Somali">Somali Region</option>
                                                <option value="Afar">Afar Region</option>
                                                <option value="Oromia">Oromia Region</option>
                                                <option value="Sidama">Sidama Region</option>
                                                <option value="Benishangul-Gumuz">Benishangul-Gumuz Region</option>
                                                <option value="Harari">Harari Region</option>
                                                <option value="Gambela">Gambela Region</option>
                                                <option value="Dire Dawa">Dire Dawa Region</option>
                                                <option value="South West Ethiopia Peoples">South West Ethiopia Peoples'
                                                    Region</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsTeachBefore">Have you teached someone
                                                before</label>
                                            <select name="multiStepsTeachBefore" id="multiStepsTeachBefore"
                                                class="select3 form-select" data-allow-clear="true">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" id="grade_teach">
                                            <label class="form-label" for="grade">Which grade have you taught</label>
                                            <select name="grade" id="grade" class="select4 form-select"
                                                data-allow-clear="true">
                                                <option value="">Select</option>
                                                <option value="9">Grade 9</option>
                                                <option value="10">Grade 10</option>
                                                <option value="11">Grade 11</option>
                                                <option value="12">Grade 12</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" id="school_teach_name">
                                            <label class="form-label" for="multiStepsSchool">Name of school you have
                                                taught before</label>
                                            <input type="text" id="multiStepsSchool" name="multiStepsSchool"
                                                class="form-control" placeholder="Enter your school name" />
                                        </div>
                                        <div class="col-md-6" id="grade_tobe_teach">
                                            <label class="form-label" for="grade_future">Which grade are you comfortable
                                                teaching</label>
                                            <select name="grade_future" id="grade_future" class="select5 form-select"
                                                data-allow-clear="true">
                                                <option value="">Select</option>
                                                <option value="9">Grade 9</option>
                                                <option value="10">Grade 10</option>
                                                <option value="11">Grade 11</option>
                                                <option value="12">Grade 12</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label" for="choice_education">Have you graduated from
                                                university or college</label>
                                            <select name="choice_education" id="choice_education"
                                                class="select3 form-select" data-allow-clear="true">
                                                <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6" id="edu_level">
                                            <label class="form-label" for="educational_level">Select your
                                                educational level</label>
                                            <select name="educational_level" id="educational_level"
                                                class="select6 form-select" data-allow-clear="true">
                                                <option value="">Select</option>
                                                <option value="Bachelor of Science (B.S)">Bachelor of Science (B.S)
                                                </option>
                                                <option value="Bachelor of Arts (B.A)">Bachelor of Arts (B.A)</option>
                                                <option value="Master of Arts (M.A)">Master of Arts (M.A)</option>
                                                <option value="Doctor of Philosophy (Ph.D)">Doctor of Philosophy (Ph.D)
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-6" id="major">
                                            <label class="form-label" for="graduation_subject">What did you major
                                                in</label>
                                            <input type="text" id="graduation_subject" name="graduation_subject"
                                                class="form-control" placeholder="Enter your major" />
                                        </div>

                                        <div class="col-md-6" id="uni_coll_name">
                                            <label class="form-label" for="uni_coll_name">Which university or college
                                                did you learn</label>
                                            <input type="text" id="uni_coll_name" name="uni_coll_name"
                                                class="form-control"
                                                placeholder="Enter your university or college name" />
                                        </div>
                                        <div class="col-md-6" id="up_temp">
                                            <label class="form-label" for="tempo">Upload Tempo</label>
                                            <input type="file" name="tempo" id="tempo" class="form-control">
                                        </div>

                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button type="submit"
                                                class="btn btn-success btn-next btn-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Billing Links -->
                                <div id="billingLinksValidation" class="content">

                                    <div class="row g-3">
                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button type="submit"
                                                class="btn btn-success btn-next btn-submit">Submit</button>
                                        </div>
                                    </div>
                                    <!--/ Credit Card Details -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Multi Steps Registration -->
        </div>
    </div>

    <script>
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();
    </script>
@endsection
