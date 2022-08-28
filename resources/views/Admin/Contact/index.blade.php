@extends('layouts.admin.app')
@section('page_title') تواصل معنا @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تواصل معنا</h3>
                </div>
                <div class="card-body">
                    <div class="{{--table-responsive--}}">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">الهاتف</th>
                                <th class="text-white">البريد الالكترونى</th>
                                <th class="text-white">الموضوع</th>
                                <th class="text-white">الرسالة</th>
                                <th class="text-white">حذف</th>
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
            {data: 'phone', name: 'phone'},
            {data: 'mail', name: 'mail'},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'contacts'])

@endpush
