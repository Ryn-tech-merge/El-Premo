<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('targets.update',$target->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-0">
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">عدد النقاط </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="عدد النقاط"></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="عدد النقاط" name="gifts_for" value="{{$target->gifts_for}}"/>
        </div>
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">السعر </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="السعر"></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="السعر" name="gifts_price" value="{{$target->gifts_price}}"/>
        </div>


    </div>

</form>
<!--end::Form-->

