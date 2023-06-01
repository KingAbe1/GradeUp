@extends('layouts/layoutMaster')

@section('title', 'View Invoice')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-invoice.css') }}" />
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/offcanvas-add-payment.js') }}"></script>
    <script src="{{ asset('assets/js/offcanvas-send-invoice.js') }}"></script>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('content')

    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                        <div class="mb-xl-0 mb-4">
                            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                @include('_partials.macros', ['height' => 20, 'withbg' => ''])
                                <span class="app-brand-text fw-bold fs-4">
                                    {{ config('variables.templateName') }}
                                </span>
                            </div>
                            <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
                            <p class="mb-2">Colorado, CA 91905, USA</p>
                            <p class="mb-0">+13202824903, +251947431170</p>
                        </div>
                        <div>
                            <h4 class="fw-semibold mb-2">#{{ $invoices[0]->id }}</h4>
                            <div class="mb-2 pt-1">
                                <span>Date Issues:</span>
                                <span class="fw-semibold">{{ date('d M, Y', strtotime($invoices[0]->created_at)) }}</span>
                            </div>
                            {{-- <div class="pt-1">
                                <span>Date Due:</span>
                                <span class="fw-semibold">May 25, 2021</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row p-sm-3 p-0">
                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                            <h6 class="mb-3">Invoice To:</h6>
                            <p class="mb-1">Michael Legesse</p>
                            <p class="mb-1">GradeUp P.L.C</p>
                            <p class="mb-1">Colorado, USA</p>
                            <p class="mb-1">+1 320-282-4903</p>
                            <p class="mb-0">gradeupsupport@gmail.com</p>
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                            <h6 class="mb-4">Bill To:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-4">Total Due:</td>
                                        <td><strong>{{ $invoices[0]->price }} ETB</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="pe-4">Bank name:</td>
                                        <td>Commercial Bank of Ethiopia</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-4">Country:</td>
                                        <td>Ethiopia</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-4">Transaction ID:</td>
                                        <td>ETD95476213874685</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="pe-4">SWIFT code:</td>
                                        <td>BR91905</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-responsive border-top">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-nowrap">{{ $invoices[0]->name }}</td>
                                <td class="text-nowrap">HTML Admin Template</td>
                                <td>{{ $invoices[0]->price }} ETB</td>
                                <td>{{ $invoices[0]->price }} ETB</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end pe-3 py-4">
                                    <p class="mb-2 pt-3">Subtotal:</p>
                                    <p class="mb-2">Discount:</p>
                                    <p class="mb-2">Tax:</p>
                                    <p class="mb-0 pb-3">Total:</p>
                                </td>
                                <td class="ps-2 py-4">
                                    <p class="fw-semibold mb-2 pt-3">{{ $invoices[0]->price }} ETB</p>
                                    <p class="fw-semibold mb-2">00.00 ETB</p>
                                    <p class="fw-semibold mb-2">0.00 ETB</p>
                                    <p class="fw-semibold mb-0 pb-3">{{ $invoices[0]->price }} ETB</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body mx-3">
                    <div class="row">
                        <div class="col-12 text-center">
                            <span>It was a pleasure working with you. Thank You!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice -->

        <!-- Invoice Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary btn-label-secondary d-grid w-100 mb-2 pb-3 pt-3" target="_blank"
                        href="{{ url('app/invoice/print') }}">Print Invoice
                    </a>
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>

    <!-- Offcanvas -->
    {{-- @include('_partials/_offcanvas/offcanvas-send-invoice') --}}
    {{-- @include('_partials/_offcanvas/offcanvas-add-payment') --}}
    <!-- /Offcanvas -->
@endsection
