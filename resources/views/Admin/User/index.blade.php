@extends('layouts.admin.app')
@section('page_title') المستخدمين @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" >مستخدمين البريمو</h3>
{{--                    <div class="mr-auto pageheader-btn">--}}
{{--                        <a href="#"  id="addBtn" class="btn btn-primary btn-icon text-white">--}}
{{--                                        <span>--}}
{{--                                            <i class="fe fe-plus"></i>--}}
{{--                                        </span> اضافة جديد--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
                <div class="card-body">
                    <div class="{{--table-responsive--}}">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">الاسم</th>
                                <th class="text-white">رقم الهاتف</th>
                                <th class="text-white">العنوان</th>
                                <th class="text-white">الصورة </th>
{{--                                <th class="text-white">اسم المحل</th>--}}
{{--                                <th class="text-white">عنوان المحل</th>--}}
                                <th class="text-white">المحفظة</th>
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
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'address', name: 'address'},
            {data: 'image', name: 'image'},
            // {data: 'shop_name', name: 'shop_name'},
            // {data: 'shop_address', name: 'shop_address'},
            {data: 'wallet', name: 'wallet'},
            {data: 'block', name: 'block'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'users'])
    @include('Admin.User.parts.block',['url'=>'users'])

@endpush
