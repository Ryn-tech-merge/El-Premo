<!--begin::Form-->
<link href="{{url('admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('categories.store')}}">
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

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> الصورة </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7  text-primary" title="الصورة"></i>
            </label>
            <!--end::Label-->
            <input accept="image/*" type='file' id="imgInp" name="image"  class="form-control form-control-solid" />
            <img width="100" height="100" id="blah" src="#" alt="your image" />
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> الشركات </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7  text-primary" title="الشركات"></i>
            </label>
            <!--end::Label-->
            <select class="form-control select2" name="brands[]" data-placeholder="اختر الشركات " multiple>
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}"> {{$brand->name}} </option>
                @endforeach
            </select>
        </div>

    </div>
</form>
<!--end::Form-->

<script>
    $(document).ready(function (){
        $('#blah').hide()
    })
    imgInp.onchange = evt => {
        $('#blah').show()
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
<!-- INTERNAL SELECT2 CSS -->
<script src="{{url('admin')}}/assets/plugins/select2/select2.full.min.js"></script>
<script src="{{url('admin')}}/assets/js/select2.js"></script>

