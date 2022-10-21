@extends('layouts.admin.app')
@section('page_title') العملاء @endsection
<link href="{{url('admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" >عملاء البريمو</h3>
                    <div class="mr-auto pageheader-btn">
                        @if(in_array(7,admin()->user()->permission_ids))
                            <a href="#" id="multiDeleteBtn" class="btn btn-danger btn-icon text-white">
                                            <span>
                                                <i class="fa fa-trash-o"></i>
                                            </span> حذف المحدد
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card ">
                            <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                            <div class="card-header">
                                <div class="card-title">المحافظة</div>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="mg-b-20 mg-sm-b-40">اختر محافظة .</p>
                                <div class="wd-200 mg-b-30">
                                    <div class="input-group">
                                        <select class="form-control select2 custom-select filter" id="governorate" data-placeholder="اختر محافظة ... ">
                                            <option label=" اختر محافظة ... ">
                                            </option>
                                            <option value="all">الكل</option>
                                            @foreach($governorates as $governorate)
                                                <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->
                    <div class="col-lg-6">
                        <div class="card ">
                            <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                            <div class="card-header">
                                <div class="card-title">المدينة</div>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="mg-b-20 mg-sm-b-40">اختر مدينة .</p>
                                <div class="wd-200 mg-b-30">
                                    <div class="input-group">
                                        <select class="form-control select2 custom-select filter" id="city" data-placeholder="اختر مدينة ... ">
                                            <option label=" اختر مدينة ... "></option>
                                            <option value="all">الكل</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white"><input type="checkbox" id="master"></th>
                                <th class="text-white">#</th>
                                <th class="text-white">الاسم</th>
                                <th class="text-white">رقم الهاتف</th>
{{--                                <th class="text-white">العنوان</th>--}}
                                <th class="text-white">المحافظة </th>
                                <th class="text-white">المدينة </th>
{{--                                <th class="text-white">الصورة </th>--}}
{{--                                <th class="text-white">اسم المحل</th>--}}
{{--                                <th class="text-white">عنوان المحل</th>--}}
                                <th class="text-white"> المبيعات</th>
                                <th class="text-white">المحفظة</th>
                                <th class="text-white">الحالة</th>
                                <th class="text-white">حظر</th>
                                <th class="text-white">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('admin_js')
    <script>
        var  columns =[
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            // {data: 'address', name: 'address'},
            {data: 'governorate', name: 'governorate'},
            {data: 'city', name: 'city'},
            // {data: 'image', name: 'image'},
            // {data: 'shop_name', name: 'shop_name'},
            // {data: 'shop_address', name: 'shop_address'},
            {data: 'points', name: 'points'},
            {data: 'wallet', name: 'wallet'},
            {data: 'is_active', name: 'is_active'},
            {data: 'block', name: 'block'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'users'])
    @include('Admin.User.parts.block',['url'=>'users'])

    <script>
        $(document).on('click', '.change_active', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                type: 'GET',
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.success == 'true') {
                        my_toaster(data.message)
                        $('#exportexample').DataTable().ajax.reload(null, false);
                    }
                }, error: function (data) {
                    // $('#global-loader').hide()
                    var error = Object.values(data.responseJSON.errors);
                    $( error ).each(function(index, message ) {
                        my_toaster(message,'error')
                    });
                }
            });
        });
    </script>

    <script>
        function reload_table(){
            var governorate = $('#governorate').val();
            var city = $('#city').val();
            var url = window.location.href+"?governorate=" + governorate + "&city=" + city ;
            $('#exportexample').DataTable().ajax.url(url).draw();
        }

        $(document).on('change','.filter', function () {
            reload_table()
        })

        $(document).on('change','#governorate', function (e) {
            e.preventDefault();
            var id = $(this).val();
            var url = "{{route('getGovernorateCities')}}?id="+id;
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    window.setTimeout(function () {
                        if (data.success === 'true') {
                            // alert(1)
                            $('#city').html(data.html);
                        }else {
                            var messages = Object.values(data.messages);
                            $( messages ).each(function(index, message ) {
                                my_toaster(message,'error')
                            });
                        }
                    }, 1000);
                },
                error: function (data) {
                    console.log(data)
                    if (data.status === 500) {
                        my_toaster('هناك خطأ ما','error')
                    }
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    my_toaster(value, 'error')
                                });
                            }
                        });
                    }
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        })
    </script>


    <script src="{{url('admin')}}/assets/js/select2.js"></script>
    <script src="{{url('admin')}}/assets/plugins/select2/select2.full.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.card-options-collapse').click();
        })
    </script>
@endpush
