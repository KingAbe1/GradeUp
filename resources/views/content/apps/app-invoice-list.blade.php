@extends('layouts/layoutMaster')

@section('title', 'Manage Invoice')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-invoice-list.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Home /</span> Manage Invoice
    </h4>

    <!-- Invoice List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="invoice-list-table table border-top">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>#ID</th>
                        <th>Client</th>
                        <th>Plan</th>
                        <th class="text-truncate">Issued Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = 1;
                    @endphp
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $id }}</td>
                            <td><a href="/app/invoice/preview/{{ $invoice->id }}">#{{ $invoice->id }}</a></td>
                            <td>{{ $invoice->first_name }} {{ $invoice->last_name }}</td>
                            <td>{{ $invoice->plan_name }}</td>
                            <td>{{ date('d M, Y', strtotime($invoice->created_date)) }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="/app/invoice/preview/{{ $invoice->id }}" data-bs-toggle="tooltip"
                                        class="text-body" data-bs-placement="top" title="Preview Invoice"><i
                                            class="ti ti-eye mx-2 ti-sm"></i></a>
                                </div>
                            </td>
                        </tr>
                        @php
                            $id;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
