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
    {{-- <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script> --}}
    @if ($current_plans[0]['plan_trail'] == null)
        <script>
            'use strict';

            (function() {
                let cardColor, headingColor, labelColor, shadeColor, grayColor;
                if (isDarkStyle) {
                    cardColor = config.colors_dark.cardColor;
                    labelColor = config.colors_dark.textMuted;
                    headingColor = config.colors_dark.headingColor;
                    shadeColor = 'dark';
                    grayColor = '#5E6692'; // gray color is for stacked bar chart
                } else {
                    cardColor = config.colors.cardColor;
                    labelColor = config.colors.textMuted;
                    headingColor = config.colors.headingColor;
                    shadeColor = '';
                    grayColor = '#817D8D';
                }

                // swiper loop and autoplay
                // --------------------------------------------------------------------
                const swiperWithPagination = document.querySelector('#swiper-with-pagination-cards');
                if (swiperWithPagination) {
                    new Swiper(swiperWithPagination, {
                        loop: true,
                        autoplay: {
                            delay: 2500,
                            disableOnInteraction: false
                        },
                        pagination: {
                            clickable: true,
                            el: '.swiper-pagination'
                        }
                    });
                }

                // Revenue Generated Area Chart
                // --------------------------------------------------------------------
                const revenueGeneratedEl = document.querySelector('#revenueGenerated'),
                    revenueGeneratedConfig = {
                        chart: {
                            height: 130,
                            type: 'area',
                            parentHeightOffset: 0,
                            toolbar: {
                                show: false
                            },
                            sparkline: {
                                enabled: true
                            }
                        },
                        markers: {
                            colors: 'transparent',
                            strokeColors: 'transparent'
                        },
                        grid: {
                            show: false
                        },
                        colors: [config.colors.success],
                        fill: {
                            type: 'gradient',
                            gradient: {
                                shade: shadeColor,
                                shadeIntensity: 0.8,
                                opacityFrom: 0.6,
                                opacityTo: 0.1
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            width: 2,
                            curve: 'smooth'
                        },
                        series: [{
                            data: [300, 350, 330, 380, 340, 400, 380]
                        }],
                        xaxis: {
                            show: true,
                            lines: {
                                show: false
                            },
                            labels: {
                                show: false
                            },
                            stroke: {
                                width: 0
                            },
                            axisBorder: {
                                show: false
                            }
                        },
                        yaxis: {
                            stroke: {
                                width: 0
                            },
                            show: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    };
                if (typeof revenueGeneratedEl !== undefined && revenueGeneratedEl !== null) {
                    const revenueGenerated = new ApexCharts(revenueGeneratedEl, revenueGeneratedConfig);
                    revenueGenerated.render();
                }

                // Earning Reports Bar Chart
                // --------------------------------------------------------------------
                const weeklyEarningReportsEl = document.querySelector('#weeklyEarningReports'),
                    weeklyEarningReportsConfig = {
                        chart: {
                            height: 202,
                            parentHeightOffset: 0,
                            type: 'bar',
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {
                            bar: {
                                barHeight: '60%',
                                columnWidth: '38%',
                                startingShape: 'rounded',
                                endingShape: 'rounded',
                                borderRadius: 4,
                                distributed: true
                            }
                        },
                        grid: {
                            show: false,
                            padding: {
                                top: -30,
                                bottom: 0,
                                left: -10,
                                right: -10
                            }
                        },
                        colors: [
                            config.colors_label.primary,
                            config.colors_label.primary,
                            config.colors_label.primary,
                            config.colors_label.primary,
                            config.colors.primary,
                            config.colors_label.primary,
                            config.colors_label.primary
                        ],
                        dataLabels: {
                            enabled: false
                        },
                        series: [{
                            data: [40, 65, 50, 45, 90, 55, 70]
                        }],
                        legend: {
                            show: false
                        },
                        xaxis: {
                            categories: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            labels: {
                                style: {
                                    colors: labelColor,
                                    fontSize: '13px',
                                    fontFamily: 'Public Sans'
                                }
                            }
                        },
                        yaxis: {
                            labels: {
                                show: false
                            }
                        },
                        tooltip: {
                            enabled: false
                        },
                        responsive: [{
                            breakpoint: 1025,
                            options: {
                                chart: {
                                    height: 199
                                }
                            }
                        }]
                    };
                if (typeof weeklyEarningReportsEl !== undefined && weeklyEarningReportsEl !== null) {
                    const weeklyEarningReports = new ApexCharts(weeklyEarningReportsEl, weeklyEarningReportsConfig);
                    weeklyEarningReports.render();
                }

                // Support Tracker - Radial Bar Chart
                // --------------------------------------------------------------------
                const supportTrackerEl = document.querySelector('#supportTracker'),
                    supportTrackerOptions = {
                        series: [85],
                        labels: ['Completed Task'],
                        chart: {
                            height: 360,
                            type: 'radialBar'
                        },
                        plotOptions: {
                            radialBar: {
                                offsetY: 10,
                                startAngle: -140,
                                endAngle: 130,
                                hollow: {
                                    size: '65%'
                                },
                                track: {
                                    background: cardColor,
                                    strokeWidth: '100%'
                                },
                                dataLabels: {
                                    name: {
                                        offsetY: -20,
                                        color: labelColor,
                                        fontSize: '13px',
                                        fontWeight: '400',
                                        fontFamily: 'Public Sans'
                                    },
                                    value: {
                                        offsetY: 10,
                                        color: headingColor,
                                        fontSize: '38px',
                                        fontWeight: '600',
                                        fontFamily: 'Public Sans'
                                    }
                                }
                            }
                        },
                        colors: [config.colors.primary],
                        fill: {
                            type: 'gradient',
                            gradient: {
                                shade: 'dark',
                                shadeIntensity: 0.5,
                                gradientToColors: [config.colors.primary],
                                inverseColors: true,
                                opacityFrom: 1,
                                opacityTo: 0.6,
                                stops: [30, 70, 100]
                            }
                        },
                        stroke: {
                            dashArray: 10
                        },
                        grid: {
                            padding: {
                                top: -20,
                                bottom: 5
                            }
                        },
                        states: {
                            hover: {
                                filter: {
                                    type: 'none'
                                }
                            },
                            active: {
                                filter: {
                                    type: 'none'
                                }
                            }
                        },
                        responsive: [{
                                breakpoint: 1025,
                                options: {
                                    chart: {
                                        height: 330
                                    }
                                }
                            },
                            {
                                breakpoint: 769,
                                options: {
                                    chart: {
                                        height: 280
                                    }
                                }
                            }
                        ]
                    };
                if (typeof supportTrackerEl !== undefined && supportTrackerEl !== null) {
                    const supportTracker = new ApexCharts(supportTrackerEl, supportTrackerOptions);
                    supportTracker.render();
                }

                // Total Earning Chart - Bar Chart
                // --------------------------------------------------------------------
                const totalEarningChartEl = document.querySelector('#totalEarningChart'),
                    totalEarningChartOptions = {
                        series: [{
                                name: 'Earning',
                                data: [15, 10, 20, 8, 12, 18, 12, 5]
                            },
                            {
                                name: 'Expense',
                                data: [-7, -10, -7, -12, -6, -9, -5, -8]
                            }
                        ],
                        chart: {
                            height: 230,
                            parentHeightOffset: 0,
                            stacked: true,
                            type: 'bar',
                            toolbar: {
                                show: false
                            }
                        },
                        tooltip: {
                            enabled: false
                        },
                        legend: {
                            show: false
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '18%',
                                borderRadius: 5,
                                startingShape: 'rounded',
                                endingShape: 'rounded'
                            }
                        },
                        colors: [config.colors.primary, grayColor],
                        dataLabels: {
                            enabled: false
                        },
                        grid: {
                            show: false,
                            padding: {
                                top: -40,
                                bottom: -20,
                                left: -10,
                                right: -2
                            }
                        },
                        xaxis: {
                            labels: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            axisBorder: {
                                show: false
                            }
                        },
                        yaxis: {
                            labels: {
                                show: false
                            }
                        },
                        responsive: [{
                                breakpoint: 1468,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            columnWidth: '22%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 1197,
                                options: {
                                    chart: {
                                        height: 228
                                    },
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 8,
                                            columnWidth: '26%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 783,
                                options: {
                                    chart: {
                                        height: 232
                                    },
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 6,
                                            columnWidth: '28%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 589,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            columnWidth: '16%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 520,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 6,
                                            columnWidth: '18%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 426,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 5,
                                            columnWidth: '20%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 381,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            columnWidth: '24%'
                                        }
                                    }
                                }
                            }
                        ],
                        states: {
                            hover: {
                                filter: {
                                    type: 'none'
                                }
                            },
                            active: {
                                filter: {
                                    type: 'none'
                                }
                            }
                        }
                    };
                if (typeof totalEarningChartEl !== undefined && totalEarningChartEl !== null) {
                    const totalEarningChart = new ApexCharts(totalEarningChartEl, totalEarningChartOptions);
                    totalEarningChart.render();
                }

                //  For Datatable
                // --------------------------------------------------------------------
                var dt_projects_table = $('.datatables-projects');

                if (dt_projects_table.length) {
                    var dt_project = dt_projects_table.DataTable({
                        ajax: assetsPath + 'json/user-profile.json',
                        columns: [{
                                data: ''
                            },
                            {
                                data: 'id'
                            },
                            {
                                data: 'project_name'
                            },
                            {
                                data: 'project_leader'
                            },
                            {
                                data: ''
                            },
                            {
                                data: 'status'
                            },
                            {
                                data: ''
                            }
                        ],
                        columnDefs: [{
                                // For Responsive
                                className: 'control',
                                searchable: false,
                                orderable: false,
                                responsivePriority: 2,
                                targets: 0,
                                render: function(data, type, full, meta) {
                                    return '';
                                }
                            },
                            {
                                // For Checkboxes
                                targets: 1,
                                orderable: false,
                                searchable: false,
                                responsivePriority: 3,
                                checkboxes: true,
                                render: function() {
                                    return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                                },
                                checkboxes: {
                                    selectAllRender: '<input type="checkbox" class="form-check-input">'
                                }
                            },
                            {
                                // Avatar image/badge, Name and post
                                targets: 2,
                                responsivePriority: 4,
                                render: function(data, type, full, meta) {
                                    var $user_img = full['project_img'],
                                        $name = full['project_name'],
                                        $date = full['date'];
                                    if ($user_img) {
                                        // For Avatar image
                                        var $output =
                                            '<img src="' + assetsPath + 'img/icons/brands/' + $user_img +
                                            '" alt="Avatar" class="rounded-circle">';
                                    } else {
                                        // For Avatar badge
                                        var stateNum = Math.floor(Math.random() * 6);
                                        var states = ['success', 'danger', 'warning', 'info', 'primary',
                                            'secondary'
                                        ];
                                        var $state = states[stateNum],
                                            $name = full['project_name'],
                                            $initials = $name.match(/\b\w/g) || [];
                                        $initials = (($initials.shift() || '') + ($initials.pop() || ''))
                                            .toUpperCase();
                                        $output = '<span class="avatar-initial rounded-circle bg-label-' +
                                            $state + '">' + $initials + '</span>';
                                    }
                                    // Creates full output for row
                                    var $row_output =
                                        '<div class="d-flex justify-content-left align-items-center">' +
                                        '<div class="avatar-wrapper">' +
                                        '<div class="avatar me-2">' +
                                        $output +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="d-flex flex-column">' +
                                        '<span class="text-truncate fw-semibold">' +
                                        $name +
                                        '</span>' +
                                        '<small class="text-truncate text-muted">' +
                                        $date +
                                        '</small>' +
                                        '</div>' +
                                        '</div>';
                                    return $row_output;
                                }
                            },
                            {
                                // Teams
                                targets: 4,
                                orderable: false,
                                searchable: false,
                                render: function(data, type, full, meta) {
                                    var $team = full['team'],
                                        $output;
                                    $output = '<div class="d-flex align-items-center avatar-group">';
                                    for (var i = 0; i < $team.length; i++) {
                                        $output +=
                                            '<div class="avatar avatar-sm">' +
                                            '<img src="' +
                                            assetsPath +
                                            'img/avatars/' +
                                            $team[i] +
                                            '" alt="Avatar" class="rounded-circle pull-up">' +
                                            '</div>';
                                    }
                                    $output += '</div>';
                                    return $output;
                                }
                            },
                            {
                                // Label
                                targets: -2,
                                render: function(data, type, full, meta) {
                                    var $status_number = full['status'];
                                    return (
                                        '<div class="d-flex align-items-center">' +
                                        '<div class="progress w-100 me-3" style="height: 6px;">' +
                                        '<div class="progress-bar" style="width: ' +
                                        $status_number +
                                        '" aria-valuenow="' +
                                        $status_number +
                                        '" aria-valuemin="0" aria-valuemax="100"></div>' +
                                        '</div>' +
                                        '<span>' +
                                        $status_number +
                                        '</span></div>'
                                    );
                                }
                            },
                            {
                                // Actions
                                targets: -1,
                                searchable: false,
                                title: 'Actions',
                                orderable: false,
                                render: function(data, type, full, meta) {
                                    return (
                                        '<div class="d-inline-block">' +
                                        '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>' +
                                        '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                        '<a href="javascript:;" class="dropdown-item">Details</a>' +
                                        '<a href="javascript:;" class="dropdown-item">Archive</a>' +
                                        '<div class="dropdown-divider"></div>' +
                                        '<a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a>' +
                                        '</div>' +
                                        '</div>'
                                    );
                                }
                            }
                        ],
                        order: [
                            [2, 'desc']
                        ],
                        dom: '<"card-header pb-0 pt-sm-0"<"head-label text-center"><"d-flex justify-content-center justify-content-md-end"f>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                        displayLength: 5,
                        lengthMenu: [5, 10, 25, 50, 75, 100],
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function(row) {
                                        var data = row.data();
                                        return 'Details of "' + data['project_name'] + '" Project';
                                    }
                                }),
                                type: 'column',
                                renderer: function(api, rowIdx, columns) {
                                    var data = $.map(columns, function(col, i) {
                                        return col.title !==
                                            '' // ? Do not show row in modal popup if title is blank (for check box)
                                            ?
                                            '<tr data-dt-row="' +
                                            col.rowIndex +
                                            '" data-dt-column="' +
                                            col.columnIndex +
                                            '">' +
                                            '<td>' +
                                            col.title +
                                            ':' +
                                            '</td> ' +
                                            '<td>' +
                                            col.data +
                                            '</td>' +
                                            '</tr>' :
                                            '';
                                    }).join('');

                                    return data ? $('<table class="table"/><tbody />').append(data) : false;
                                }
                            }
                        }
                    });
                    $('div.head-label').html('<h5 class="card-title mb-0">Projects</h5>');
                }

                // Filter form control to default size
                // ? setTimeout used for multilingual table initialization
                setTimeout(() => {
                    $('.dataTables_filter .form-control').removeClass('form-control-sm');
                    $('.dataTables_length .form-select').removeClass('form-select-sm');
                }, 300);
            })();
        </script>
    @else
        <script>
            'use strict';

            (function() {
                let cardColor, headingColor, labelColor, shadeColor, grayColor;
                if (isDarkStyle) {
                    cardColor = config.colors_dark.cardColor;
                    labelColor = config.colors_dark.textMuted;
                    headingColor = config.colors_dark.headingColor;
                    shadeColor = 'dark';
                    grayColor = '#5E6692'; // gray color is for stacked bar chart
                } else {
                    cardColor = config.colors.cardColor;
                    labelColor = config.colors.textMuted;
                    headingColor = config.colors.headingColor;
                    shadeColor = '';
                    grayColor = '#817D8D';
                }


                // Support Tracker - Radial Bar Chart
                // --------------------------------------------------------------------
                let value = Math.round((document.querySelector('#day-left').innerText / 14) * 100);
                console.log(value);
                const supportTrackerEl = document.querySelector('#supportTracker'),
                    supportTrackerOptions = {
                        series: [value],
                        labels: ['Free Trail Left'],
                        chart: {
                            height: 360,
                            type: 'radialBar'
                        },
                        plotOptions: {
                            radialBar: {
                                offsetY: 10,
                                startAngle: -140,
                                endAngle: 130,
                                hollow: {
                                    size: '65%'
                                },
                                track: {
                                    background: cardColor,
                                    strokeWidth: '100%'
                                },
                                dataLabels: {
                                    name: {
                                        offsetY: -20,
                                        color: labelColor,
                                        fontSize: '13px',
                                        fontWeight: '400',
                                        fontFamily: 'Public Sans'
                                    },
                                    value: {
                                        offsetY: 10,
                                        color: headingColor,
                                        fontSize: '38px',
                                        fontWeight: '600',
                                        fontFamily: 'Public Sans'
                                    }
                                }
                            }
                        },
                        colors: [config.colors.primary],
                        fill: {
                            type: 'gradient',
                            gradient: {
                                shade: 'dark',
                                shadeIntensity: 0.5,
                                gradientToColors: [config.colors.primary],
                                inverseColors: true,
                                opacityFrom: 1,
                                opacityTo: 0.6,
                                stops: [30, 70, 100]
                            }
                        },
                        stroke: {
                            dashArray: 10
                        },
                        grid: {
                            padding: {
                                top: -20,
                                bottom: 5
                            }
                        },
                        states: {
                            hover: {
                                filter: {
                                    type: 'none'
                                }
                            },
                            active: {
                                filter: {
                                    type: 'none'
                                }
                            }
                        },
                        responsive: [{
                                breakpoint: 1025,
                                options: {
                                    chart: {
                                        height: 330
                                    }
                                }
                            },
                            {
                                breakpoint: 769,
                                options: {
                                    chart: {
                                        height: 280
                                    }
                                }
                            }
                        ]
                    };
                if (typeof supportTrackerEl !== undefined && supportTrackerEl !== null) {
                    const supportTracker = new ApexCharts(supportTrackerEl, supportTrackerOptions);
                    supportTracker.render();
                }

                // Filter form control to default size
                // ? setTimeout used for multilingual table initialization
                setTimeout(() => {
                    $('.dataTables_filter .form-control').removeClass('form-control-sm');
                    $('.dataTables_length .form-select').removeClass('form-select-sm');
                }, 300);
            })();
        </script>
    @endif
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
                                <h5 class="card-title mb-3">{{ count($connects) }}</h5>
                                <small>Connects</small>
                                <br>
                                <small class="text-muted">Updated 1 second ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($current_plans[0]['plan_trail'] == null)
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
                                        <p class="mb-0">Days left before subscription plan expires</p>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                    <div id="supportTracker"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-7 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="mb-0">Free 14 Days Trial Tracker</h5>
                                <small class="text-muted">Account created on
                                    {{ date('d M, Y', strtotime($current_plans[0]['created_at'])) }}</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                                    <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                        <h1 id="day-left"
                                            class="mb-0 {{ $current_plans[0]['plan_trail'] < 5 ? 'text-danger' : '' }}">
                                            {{ $current_plans[0]['plan_trail'] }}</h1>
                                        <p class="mb-0">Days left before free trail expires</p>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                    <div id="supportTracker"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title m-0 me-2">Recent Transaction</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless border-top">
                            <thead class="border-bottom">
                                <tr>
                                    <th>#</th>
                                    <th>Transaction ID</th>
                                    <th>DATE</th>
                                    <th>STATUS</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($transactions) == 0)
                                    <tr>
                                        <td style="padding-top: 2%" colspan='4' class="text-center">No Transaction
                                            Made</td>
                                    </tr>
                                @else
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
