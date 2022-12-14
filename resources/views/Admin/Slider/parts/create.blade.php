<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('sliders.store')}}">
    @csrf
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">النوع </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="النوع"></i>
            </label>
            <!--end::Label-->
            <div class="d-flex align-items-center mb-3">
                <div class="form-check m-0 ">
                    <input class="form-check-input type" type="radio" name="type" value="product" checked>
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        منتج
                    </label>
                </div>
                <div class="form-check m-0  ms-3" style="margin-right: 30px!important">
                    <input class="form-check-input type" type="radio" name="type" value="offer">
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        عرض
                    </label>
                </div>
                <div class="form-check m-0  ms-3" style="margin-right: 30px!important">
                    <input class="form-check-input type" type="radio" name="type" value="brand">
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        شركة
                    </label>
                </div>
            </div>
            {{--            <input type="radio" class="form-control form-control-solid" placeholder="النوع" name="name" value=""/>--}}
        </div>
        <!--end::Input group-->
        <div class=" mb-2 fv-row col-sm-12 mt-0 product_show" id="product">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">المنتج </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="المنتج"></i>
            </label>
            <select class="form-control " name="product_id">
                <option value="" selected disabled> اختر المنتج ...</option>
                @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        <div class=" mb-2 fv-row col-sm-12 mt-0 product_show" style="display: none!important;" id="offer">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">العرض </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="العرض"></i>
            </label>
            <select class="form-control " name="offer_id">
                <option value="" selected disabled> اختر العرض ...</option>
                @foreach($offers as $offer)
                    <option value="{{$offer->id}}">{{$offer->name}}</option>
                @endforeach
            </select>
        </div>
        <div class=" mb-2 fv-row col-sm-6 mt-0 product_show " style="display: none!important;" id="category">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">القسم الرئيسى </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="القسم الرئيسى"></i>
            </label>
            <select class="form-control " id="category_change" name="category_id">
                <option value="" selected disabled> اختر القسم الرئيسى ...</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class=" mb-2 fv-row col-sm-6 mt-0 product_show " style="display: none!important;" id="brand">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الشركة </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الشركة"></i>
            </label>
            <select class="form-control " id="brand_change" name="brand_id">
                <option value="" selected disabled> اختر الشركة ...</option>
{{--                @foreach($brands as $brand)--}}
{{--                    <option value="{{$brand->id}}">{{$brand->name}}</option>--}}
{{--                @endforeach--}}
            </select>
        </div>

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> الصورة </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7  text-primary" title="الصورة"></i>
            </label>
            <!--end::Label-->
            <input accept="image/*" type='file' id="imgInp" name="image" class="form-control form-control-solid"/>
            <img width="100" height="100" id="blah" src="#" alt="your image"/>
        </div>
        <!--end::Input group-->


    </div>
</form>
<!--end::Form-->

<script>
    $(".type").on("change", function (e) {
        $('.product_show').hide();
        if (this.value == 'product') {
            $('#product').show();
        } else if (this.value == 'offer') {
            $('#offer').show();
        } else {
            $('#category').show();
            $('#brand').show();
        }
    });
</script>

<script>
    $(document).ready(function () {
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

<script>
    $(document).on('change',"#category_change",function (e) {
        e.preventDefault();
        var id = $(this).val();
        // alert(id)
        var url = "{{route('get_category_brands')}}?id="+id;
        // alert(url)
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                window.setTimeout(function () {
                    if (data.success === 'true') {
                        $('#brand_change').html(data.html);
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
                                my_toaster(value,'error')
                            });

                        } else {

                        }
                    });
                }

            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>

