@extends('layouts.admin.app')
@section('page_title') المنتجات @endsection
<style>
    button.btn.btn-light.buttons-collection.dropdown-toggle.buttons-colvis {
        width: 235px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">منتجات البريمو</h3>
                    @if(in_array(34,admin()->user()->permission_ids)) {
                    <div class="mr-auto pageheader-btn">
                        <a href="#"  id="addBtn" class="btn btn-primary btn-icon text-white">
                                        <span>
                                            <i class="fe fe-plus"></i>
                                        </span> اضافة جديد
                        </a>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">الاسم</th>
                                <th class="text-white">الصورة</th>
                                <th class="text-white">القسم</th>
                                <th class="text-white">الشركة</th>
                                <th class="text-white">الكمية</th>
                                <th class="text-white">الوحدة الصغرى</th>
                                <th class="text-white">الحد الادنى للوحدة الصغرى</th>
                                <th class="text-white">الحد الاقصى للوحدة الصغرى</th>
                                <th class="text-white">الوحدة الكبرى</th>
                                <th class="text-white">الحد الادنى للوحدة الكبرى</th>
                                <th class="text-white">الحد الاقصى للوحدة الكبرى</th>
                                <th class="text-white">سعر الوحدة الصغرى</th>
                                <th class="text-white">سعر الوحدة الكبرى</th>
                                <th class="text-white">كمية الوحدة الكبرى من الصغرى</th>
                                <th class="text-white">سعر الشراء</th>
                                <th class="text-white">الحالة</th>
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

    <div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-lg mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content" id="modalContent">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>المنتجات</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" style="cursor: pointer" data-dismiss="modal" aria-label="Close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                      fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-3" id="form-load">

                </div>
                <!--end::Modal body-->
                <div class="modal-footer">
                    <div class=" ">
                        <input  form="form" value="حفظ" type="submit" id="submit" class="btn btn-primary " style="width: 100px">
{{--                            <span class="indicator-label ">حفظ</span>--}}

                    </div>
                    <div class=" ">
                        <button type="reset" data-dismiss="modal" class="btn btn-light me-3 " style="width: 100px">غلق</button>
                    </div>
                </div>
            </div>

            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

@endsection
@push('admin_js')

    <script>
        var  columns =[
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'image', name: 'image'},
            {data: 'category', name: 'category'},
            {data: 'brand', name: 'brand'},
            {data: 'sm_unit_price', name: 'sm_unit_price'},
            {data: 'lg_unit_price', name: 'lg_unit_price'},
            {data: 'amount', name: 'amount'},
            {data: 'sm_unit', name: 'sm_unit'},
            {data: 'min_sm_amount', name: 'min_sm_amount'},
            {data: 'max_sm_amount', name: 'max_sm_amount'},
            {data: 'lg_unit', name: 'lg_unit'},
            {data: 'min_lg_amount', name: 'min_lg_amount'},
            {data: 'max_lg_amount', name: 'max_lg_amount'},
            {data: 'lg_sm_amount', name: 'lg_sm_amount'},
            {data: 'purchase_price', name: 'purchase_price'},
            {data: 'is_available', name: 'is_available'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'products'])

@endpush
