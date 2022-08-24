@extends('layouts.admin.app')
@section('page_title') الرئيسية @endsection
@section('content')

    <!-- ROW -->
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$admin_count}}</h2>
                            <p class="text-white mb-0">المشرفين </p>
                        </div>
                        <div class="mr-auto"> <i class="fa fa-user text-white fs-30 ml-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-blue img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$user_count}}</h2>
                            <p class="text-white mb-0">المستخدمين </p>
                        </div>
                        <div class="mr-auto"> <i class="fa fa-user text-white fs-30 ml-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info img-card box-info-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$order_count}}</h2>
                            <p class="text-white mb-0">الطلبات</p>
                        </div>
                        <div class="mr-auto"> <i class="fa fa-cart-plus text-white fs-30 ml-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-warning img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$contact_count}}</h2>
                            <p class="text-white mb-0">رسائل التواصل </p>
                        </div>
                        <div class="mr-auto"> <i class="fa fa-user text-white fs-30 ml-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-secondary img-card box-secondary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$offer_count}}</h2>
                            <p class="text-white mb-0">العروض</p>
                        </div>
                        <div class="mr-auto"> <i class="fa fa-bar-chart text-white fs-30 ml-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card  bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$product_count}}</h2>
                            <p class="text-white mb-0">المنتجات</p>
                        </div>
                        <div class="mr-auto"> <i class="fa fa-shopping-basket text-white fs-30 ml-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card  bg-green img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$category_count}}</h2>
                            <p class="text-white mb-0">الاقسام</p>
                        </div>
                        <div class="mr-auto"> <i class="fa fa-shopping-basket text-white fs-30 ml-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card  bg-info img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$brand_count}}</h2>
                            <p class="text-white mb-0">الشركات</p>
                        </div>
                        <div class="mr-auto"> <i class="fa fa-shopping-basket text-white fs-30 ml-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- ROW -->

    <!-- ROW-2 -->
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xl-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">طلبات الاسبوع </h3>
                </div>
                <div class="card-body">
                    <div class="">
                        <canvas id="canvasDoughnut" class="chartsh"></canvas>
                    </div>
                    <div class="mt-5 fs-12">
                        <div class="float-right ml-3"><span class="dot-label bg-info  ml-1"></span><span class="">جديد</span></div>
                        <div class="float-right ml-3"><span class="dot-label bg-primary secondary ml-1"></span><span class="">جارى التحضير</span></div>
                        <div class="float-right ml-3"><span class="dot-label bg-canvas1 ml-1"></span><span class="">جارى التوصيل</span></div>
                        <div class="float-right ml-3"><span class="dot-label bg-secondary1 ml-1"></span><span class="">منتهى</span></div>
                        <div class="float-right"><span class="dot-label bg-canvas2 ml-1"></span><span class="">ملغى</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xl-9">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title">الطلبات المنتهية لهذا الاسبوع</h3>
                </div>
                <div class="card-body pb-0">
                    <div class="">
                        <div class="d-flex">
                            <div class="">
                                <p class="mb-1">طلبات الاسبوع</p>
                                <h2 class="mb-1  number-font">{{$order1 + $order2 + $order3 + $order4 + $order5 + $order6 + $order7}}</h2>
{{--                                <p class="text-muted  mb-0"><span class="text-muted fs-13 ml-2">(+43%)</span> than Last week</p>--}}
                            </div>
{{--                            <div class="mr-auto">--}}
{{--                                <i class="bx bxs-dollar-circle fs-40 text-secondary"></i>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="widgetChart1"  class=""></canvas>
                </div>
            </div>
{{--            <div class="card overf">--}}
{{--                <div class="card-header">--}}
{{--                    <h3 class="card-title">Monthly Sales Statistics</h3>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div id="sales" class=""></div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <!-- ROW-2 END -->

@endsection
@push('admin_js')
    <script>
        var ctx = document.getElementById("widgetChart1");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['{{$date1}}', '{{$date2}}', '{{$date3}}', '{{$date4}}', '{{$date5}}', '{{$date6}}', '{{$date7}}'],
                type: 'line',
                datasets: [{
                    data: [{{$order1}}, {{$order2}}, {{$order3}}, {{$order4}}, {{$order5}}, {{$order6}}, {{$order7}}],
                    label: '',
                    backgroundColor: 'rgba(156, 82, 253,0.8)',
                    borderColor: '#9c52fd',
                },]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                responsive: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    cornerRadius: 0,
                    intersect: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: 'transparent',
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            fontSize: 2,
                            fontColor: 'transparent'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        ticks: {
                            display: false,
                        }
                    }]
                },
                title: {
                    display: false,
                },
                elements: {
                    line: {
                        borderWidth: 2
                    },
                    point: {
                        radius: 0,
                        hitRadius: 10,
                        hoverRadius: 4
                    }
                }
            }
        });

        //*********************************************//
        /*-----canvasDoughnut-----*/
        if ($('#canvasDoughnut').length) {
            var ctx = document.getElementById("canvasDoughnut").getContext("2d");
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['جديد', 'جارى التحضير', 'جارى التوصيل', 'منتهى', 'ملغى'],
                    datasets: [{
                        data: [{{$new_order_count}}, {{$on_going_order_count}}, {{$delivery_order_count}}, {{$ended_order_count}}, {{$canceled_order_count}}],
                        backgroundColor: ['#2f89f5', '#525ce5', '#f18238', "#24e4ac", "#ec5444"],
                        borderColor:'transparent',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 65,
                }
            });
        }
        /*-----canvasDoughnut-----*/
    </script>
@endpush
