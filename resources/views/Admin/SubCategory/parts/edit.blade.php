<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('sub_categories.update',$sub_category->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row  col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required">القسم الرئيسى</span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="القسم الرئيسى"></i>
            </label>
            <!--end::Label-->
            <select class="form-control selectSearch" name="category_id">
                <option value=""  disabled> القسم الرئيسى ...</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $sub_category->category_id ?'selected':''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الإسم </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الإسم"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="الإسم" name="name" value="{{$sub_category->name}}"/>
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
            <img width="100" height="100" id="blah" src="{{$sub_category->image}}" alt="your image" />
        </div>
        <!--end::Input group-->


    </div>

</form>
<!--end::Form-->


<script>
    imgInp.onchange = evt => {
        $('#blah').show()
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
