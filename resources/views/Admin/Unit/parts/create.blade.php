<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('units.store')}}">
    @csrf
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الإسم </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الإسم"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="الإسم" name="name" value=""/>
        </div>
        <!--end::Input group-->



    </div>
</form>
<!--end::Form-->


