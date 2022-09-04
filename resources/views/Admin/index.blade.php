@extends('layouts.admin.app')
@section('page_title') الرئيسية @endsection
<link href="{{url('admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>
@section('content')
    @if(in_array(51,admin()->user()->permission_ids))

        <!-- ROW -->
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header">
                        <div class="card-title">البحث بالتاريخ </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="mg-b-20 mg-sm-b-40">اختر تاريخ البداية و النهاية</p>
                        <form class="wd-200 mg-b-30 row" action="{{route('home')}}">
                            <div class="input-group col-5">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                    </div>
                                </div>
                                <input class="form-control fc-datepicker order_filter" name="created_from" value="{{$created_from}}" placeholder="تاريخ البداية " type="text">
                            </div>
                            <div class="input-group col-5">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                    </div>
                                </div>
                                <input class="form-control fc-datepicker order_filter" name="created_to" value="{{$created_to}}" placeholder="تاريخ النهاية " type="text">
                            </div>
                            <input type="submit" class="btn btn-success-light col-2" value="بحث">
                        </form>
                    </div>
                </div>
                </div>
            </div><!-- COL END -->

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
                                <p class="text-white mb-0">العملاء </p>
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
                                <p class="text-white mb-0">اجمالى الطلبات</p>
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
                            <div class="mr-auto"> <i class="fa fa-bars text-white fs-30 ml-2 mt-2"></i> </div>
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
                                <p class="text-white mb-0">الاقسام الفرعية</p>
                            </div>
                            <div class="mr-auto"> <i class="fa fa-building text-white fs-30 ml-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </div><!-- COL END -->
        </div>
        <!-- ROW -->

        <!-- ROW-2 -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="card overflow-hidden" {{--style="height: 95%;"--}}>
                    <div class="card-header">
                        <h3 class="card-title">الطلبات المنتهية لهذا الشهر</h3>
                    </div>
                    <div class="card-body pb-0">
                        <div class="">
                            <div class="d-flex">
                                <div class="">
                                    <p class="mb-1">طلبات الشهر</p>
                                    <h2 class="mb-1  number-font">{{$chart_order_count}}</h2>
                                    <p class="text-muted  mb-0"><span class="text-muted fs-13 ml-2">(+{{$total_income}})</span> اجمالى المبيعات </p>
                                    <p class="text-muted  mb-0"><span class="text-muted fs-13 ml-2">(+{{$total_profit}})</span> اجمالى الربح </p>
                                </div>
{{--                                <div class="mr-auto">--}}
{{--                                    <i class="bx bxs-dollar-circle fs-40 text-secondary"></i>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="widgetChart1"  class=""></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="card " style="height: 95%!important;">
                    <div class="card-header">
                        <h3 class="card-title">طلبات حسب الحالة </h3>
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
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6 ">
{{--            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
                <div class="card">
                    <div class="card-header text-center"><h2 class="card-title">العملاء لكل المحافظات</h2></div>
                    <div class="card-body">
                        <div id="main6" style="height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" _echarts_instance_="ec_1662227484439"><div style="position: relative; width: 462px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="462" height="400" style="position: absolute; left: 0px; top: 0px; width: 462px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; transition: opacity 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, visibility 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, transform 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgb(255, 255, 255); border-width: 1px; border-radius: 4px; color: rgb(102, 102, 102); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 10px; top: 0px; left: 0px; transform: translate3d(289px, 100px, 0px); border-color: rgb(84, 112, 198); pointer-events: none; visibility: hidden; opacity: 0;"><div style="margin: 0px 0 0;line-height:1;"><div style="font-size:14px;color:#666;font-weight:400;line-height:1;">عدد العملاء</div><div style="margin: 10px 0 0;line-height:1;"><div style="margin: 0px 0 0;line-height:1;"><span style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#5470c6;"></span><span style="font-size:14px;color:#666;font-weight:400;margin-left:2px">مصر</span><span style="float:right;margin-left:20px;font-size:14px;color:#666;font-weight:900">191</span><div style="clear:both"></div></div><div style="clear:both"></div></div><div style="clear:both"></div></div></div></div>
                    </div>
                </div>
            </div>

{{--            <div class="col-lg-8 col-md-12 col-sm-12 col-xl-9">--}}
{{--                <div class="card overf">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">Monthly Sales Statistics</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div id="sales" class=""></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <!-- ROW-2 END -->
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">المنتجات الاكثر مبيعا</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table border table-vcenter text-nowrap align-items-center">
                                <thead class="">
                                <tr>
                                    <th>اسم المنتج</th>
                                    <th>عدد مرات البيع</th>
                                    <th>اجمالى المبيع</th>
                                    <th>اجمالى الربح</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($most_sell_products as $product)
                                        <tr>
                                            <td>
                                                <img src="{{$product->image}}" alt="img" class="h-7 w-7">
                                                <p class="d-inline-block align-middle mb-0 mr-1">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">{{$product->name}}</a>
                                                    <br>
                                                    <span class="text-muted fs-13">{{$product->brand->name??''}}</span>
                                                </p>
                                            </td>
                                            <td>{{$product->count}}</td>
                                            <td class="font-weight-semibold fs-15">{{$product->total_income}}</td>
                                            <td class="font-weight-semibold fs-15">{{$product->total_profit}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">العملاء الاكثر مبيعا</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table border table-vcenter text-nowrap align-items-center">
                                <thead class="">
                                <tr>
                                    <th>اسم العميل</th>
                                    <th>رقم الهاتف</th>
                                    <th>عدد مرات الشراء</th>
                                    <th>اجمالى المشتريات </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($most_purchase_clients as $client)
                                    <tr>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->phone}}</td>
                                        <td class="font-weight-semibold fs-15">{{$client->purchase_num}}</td>
                                        <td class="font-weight-semibold fs-15">{{$client->total_purchases}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection
@push('admin_js')

    {{--    #######################  filter ##############################--}}
    <script src="{{url('admin')}}/assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
    <script src="{{url('admin')}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- INTERNAL  TIMEPICKER JS -->
    <script src="{{url('admin')}}/assets/plugins/time-picker/jquery.timepicker.js"></script>
    <script src="{{url('admin')}}/assets/plugins/time-picker/toggles.min.js"></script>

    <!-- INTERNAL DATEPICKER JS-->
    <script src="{{url('admin')}}/assets/plugins/date-picker/spectrum.js"></script>
    <script src="{{url('admin')}}/assets/plugins/date-picker/jquery-ui.js"></script>
    <script src="{{url('admin')}}/assets/plugins/input-mask/jquery.maskedinput.js"></script>

    <!--INTERNAL  FORMELEMENTS JS -->
    <script src="{{url('admin')}}/assets/js/form-elements.js"></script>
    <script src="{{url('admin')}}/assets/js/select2.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{url('admin')}}/assets/plugins/select2/select2.full.min.js"></script>

    {{--    #######################  charts ##############################--}}

    <script>
        var ctx = document.getElementById("widgetChart1");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($chart_day_array as $day)
                    '{{$day}}' ,
                    @endforeach
                ],
                type: 'line',
                datasets: [{
                    data:[
                        @foreach($chart_order_array as $order)
                            {{$order}} ,
                        @endforeach
                    ],
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

{{--    ########################### governorate chart ############################--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.2/echarts.min.js"></script>
    <script type="text/javascript">
        // Initialize the echarts instance based on the prepared dom
        var myChart = echarts.init(document.getElementById('main6'));

        // Specify the configuration items and data for the chart
        option = {
            tooltip: {
                trigger: 'item'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [
                {
                    name: 'عدد العملاء',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    itemStyle: {
                        borderRadius: 10,
                        borderColor: '#fff',
                        borderWidth: 2
                    },
                    label: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: '40',
                            fontWeight: 'bold'
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: [
                            @foreach($governorates_array as $governorate)
                        {
                            value: {{$governorate->user_count}},
                            name: '{{$governorate->name}}'
                        },
                        @endforeach
                    ]
                }
            ]
        };

        // Display the chart using the configuration items and data just specified.
        myChart.setOption(option);
    </script>

    {{--    ########################### end governorate chart ############################--}}


{{--    <script>--}}
{{--        /*-----Sales-----*/--}}
{{--        var options1 = {--}}
{{--        	chart: {--}}
{{--        		height: 300,--}}
{{--        		type: 'area',--}}
{{--        		zoom: {--}}
{{--        			enabled: false--}}
{{--        		},--}}
{{--        		dropShadow: {--}}
{{--        			enabled: true,--}}
{{--        			opacity: 0.2,--}}
{{--        		},--}}
{{--        		toolbar: {--}}
{{--        		  show: false--}}
{{--        		},--}}
{{--        		events: {--}}
{{--        		  mounted: function(ctx, config) {--}}
{{--        			const highest1 = ctx.getHighestValueInSeries(0);--}}
{{--        			const highest2 = ctx.getHighestValueInSeries(1);--}}
{{--        			ctx.addPointAnnotation({--}}
{{--        			  x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),--}}
{{--        			  y: highest1,--}}
{{--        			  label: {--}}
{{--        					style: {--}}
{{--        					  cssClass: 'd-none'--}}
{{--        					}--}}
{{--        				},--}}
{{--        				  customSVG: {--}}
{{--        					  SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#661fd6" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',--}}
{{--        					  cssClass: undefined,--}}
{{--        					  offsetX: -8,--}}
{{--        					  offsetY: 5--}}
{{--        					}--}}
{{--        				})--}}
{{--        				ctx.addPointAnnotation({--}}
{{--        				  x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),--}}
{{--        				  y: highest2,--}}
{{--        				  label: {--}}
{{--        					style: {--}}
{{--        					  cssClass: 'd-none'--}}
{{--        					}--}}
{{--        				  },--}}
{{--        				  customSVG: {--}}
{{--        					  SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#f7b731" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',--}}
{{--        					  cssClass: undefined,--}}
{{--        					  offsetX: -8,--}}
{{--        					  offsetY: 5--}}
{{--        				  }--}}
{{--        				})--}}
{{--        			},--}}
{{--        		}--}}
{{--        	},--}}
{{--        	colors: ['#525ce5', '#fd5261'],--}}
{{--        	dataLabels: {--}}
{{--        	  enabled: false--}}
{{--        	},--}}
{{--        	stroke: {--}}
{{--        	  show: true,--}}
{{--        	  curve: 'smooth',--}}
{{--        	  width: 2,--}}
{{--        	  lineCap: 'square'--}}
{{--        	},--}}
{{--        	series: [{--}}
{{--        	  name: 'Total Income',--}}
{{--        	  data: [47, 45, 154, 38, 156, 24, 65, 31, 137, 39, 162, 51, 35, 141, 35, 27, 93, 53, 167,47, 45, 154, 38, 156]--}}
{{--        	}, {--}}
{{--        	  name: 'Total Expenses',--}}
{{--        	  data: [ 37, 39, 62, 51, 35, 141,61, 27, 54, 143, 119, 46, 47, 45, 54, 138, 56, 24, 165, 31, 37, 39, 62, 51, 35]--}}
{{--        	}],--}}
{{--        	labels: ['1','2','3',4,'2','3','1','2','3','1','2','3','1','2','3','1','2','3','1','2','3','1','2','3',],--}}
{{--        	xaxis: {--}}
{{--        		axisBorder: {--}}
{{--        		  show: false--}}
{{--        		},--}}
{{--        		axisTicks: {--}}
{{--        		  show: false--}}
{{--        		},--}}
{{--        		crosshairs: {--}}
{{--        		  show: true--}}
{{--        		},--}}
{{--        		labels: {--}}
{{--        		  offsetX: 0,--}}
{{--        		  offsetY: 5,--}}
{{--        		}--}}
{{--        	},--}}
{{--        	yaxis: {--}}
{{--        		labels: {--}}
{{--        		  offsetX: -2,--}}
{{--        		  offsetY: 0,--}}
{{--        		}--}}
{{--        	},--}}
{{--        	grid: {--}}
{{--        		borderColor: 'rgba(112, 131, 171, .1)',--}}
{{--        		xaxis: {--}}
{{--        			lines: {--}}
{{--        				show: true--}}
{{--        			}--}}
{{--        		},--}}
{{--        		yaxis: {--}}
{{--        			lines: {--}}
{{--        				show: false,--}}
{{--        			}--}}
{{--        		},--}}
{{--        		padding: {--}}
{{--        		  top: 0,--}}
{{--        		  right: 0,--}}
{{--        		  bottom: 0,--}}
{{--        		  left: 0--}}
{{--        		},--}}
{{--        	},--}}
{{--        	legend: {--}}
{{--        		position: 'top',--}}
{{--        	},--}}
{{--        	tooltip: {--}}
{{--        		theme: 'dark',--}}
{{--        		marker: {--}}
{{--        		  show: true,--}}
{{--        		},--}}
{{--        		x: {--}}
{{--        		  show: false,--}}
{{--        		}--}}
{{--        	},--}}
{{--        	fill: {--}}
{{--        	  type:"gradient",--}}
{{--        	  gradient: {--}}
{{--        		  type: "vertical",--}}
{{--        		  shadeIntensity: 1,--}}
{{--        		  inverseColors: !1,--}}
{{--        		  opacityFrom: .28,--}}
{{--        		  opacityTo: .05,--}}
{{--        		  stops: [45, 100]--}}
{{--        	  }--}}
{{--        	},--}}
{{--        }--}}
{{--        var chart1 = new ApexCharts(document.querySelector("#sales"), options1);--}}
{{--        chart1.render();--}}
{{--        /*-----Sales-----*/--}}

{{--    </script>--}}

@endpush
